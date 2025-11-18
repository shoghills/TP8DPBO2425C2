<?php
// app/Models/ScheduleModel.php

class ScheduleModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "
            SELECT 
                s.id, s.day_of_week, s.start_time, s.end_time, s.room_number,
                l.name AS lecturer_name, 
                c.name AS course_name, c.course_code
            FROM schedules s
            JOIN lecturers l ON s.lecturer_id = l.id
            JOIN courses c ON s.course_id = c.id
            ORDER BY FIELD(s.day_of_week, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'), s.start_time
        ";
        $result = $this->conn->query($sql);
        return $result ?: false;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("
            SELECT * FROM schedules 
            WHERE id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function create($lecturer_id, $course_id, $day, $start_time, $end_time, $room) {
        $stmt = $this->conn->prepare("INSERT INTO `schedules` (`lecturer_id`, `course_id`, `day_of_week`, `start_time`, `end_time`, `room_number`) VALUES (?, ?, ?, ?, ?, ?)");
        
        // KOREKSI BARIS 31: Ganti 'iissst' menjadi 'iissss'
        $stmt->bind_param("iissss", $lecturer_id, $course_id, $day, $start_time, $end_time, $room); 
        
        return $stmt->execute();
    }

    public function update($id, $lecturer_id, $course_id, $day, $start_time, $end_time, $room) {
        $stmt = $this->conn->prepare("UPDATE `schedules` SET lecturer_id=?, course_id=?, day_of_week=?, start_time=?, end_time=?, room_number=? WHERE id=?");
        
        // KOREKSI BARIS 36: Ganti 'iisssti' menjadi 'iissssi'
        $stmt->bind_param("iissssi", $lecturer_id, $course_id, $day, $start_time, $end_time, $room, $id);
        
        return $stmt->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM `schedules` WHERE id = $id";
        return $this->conn->query($sql);
    }
}