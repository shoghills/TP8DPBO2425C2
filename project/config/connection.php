<?php
// app/Core/connection.php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tp_mvc25";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Menggunakan MySQLi untuk koneksi
            $this->conn = new mysqli(
                $this->servername,
                $this->username,
                $this->password,
                $this->db_name
            );
            
            // Cek error koneksi
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $exception) {
            echo "Database connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}