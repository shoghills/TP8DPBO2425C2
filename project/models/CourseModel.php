<?php
// app/Models/CourseModel.php

class CourseModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM courses ORDER BY course_code ASC";
        $result = $this->conn->query($sql);
        return $result ?: false;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($code, $name, $sks, $semester) {
        $stmt = $this->conn->prepare("INSERT INTO `courses` (`course_code`, `name`, `sks`, `semester`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $code, $name, $sks, $semester);
        return $stmt->execute();
    }

    public function update($id, $code, $name, $sks, $semester) {
        $stmt = $this->conn->prepare("UPDATE `courses` SET course_code=?, name=?, sks=?, semester=? WHERE id=?");
        $stmt->bind_param("ssiii", $code, $name, $sks, $semester, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM `courses` WHERE id = $id";
        return $this->conn->query($sql);
    }
    
    public function getAvailableCourses() {
        $sql = "SELECT id, course_code, name FROM courses ORDER BY course_code ASC";
        $result = $this->conn->query($sql);
        return $result ?: false;
    }
}