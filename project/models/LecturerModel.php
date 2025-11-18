<?php
// app/Models/LecturerModel.php

class LecturerModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM lecturers ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result ?: false;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($name, $nidn, $phone, $join_date) {
        $stmt = $this->conn->prepare("INSERT INTO `lecturers` (`name`, `nidn`, `phone`, `join_date`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $nidn, $phone, $join_date);
        return $stmt->execute();
    }

    public function update($id, $name, $nidn, $phone, $join_date) {
        $stmt = $this->conn->prepare("UPDATE `lecturers` SET name=?, nidn=?, phone=?, join_date=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $nidn, $phone, $join_date, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM `lecturers` WHERE id = $id";
        return $this->conn->query($sql);
    }
    
    public function getAvailableLecturers() {
        $sql = "SELECT id, name FROM lecturers ORDER BY name ASC";
        $result = $this->conn->query($sql);
        return $result ?: false;
    }
}