<?php
// public/index.php (FRONT CONTROLLER)

// 1. Setup Autoloading dan Koneksi Database
// Semua file PHP yang berisi class harus dimuat di sini
require_once '../config/connection.php'; 
require_once '../models/LecturerModel.php';
require_once '../models/CourseModel.php';
require_once '../models/ScheduleModel.php';
require_once '../controllers/LecturerController.php';
require_once '../controllers/CourseController.php';
require_once '../controllers/ScheduleController.php';

// Inisialisasi Koneksi
$database = new Database();
$db = $database->getConnection();

// 2. Routing: Tentukan Controller dan Action
$controllerName = $_GET['controller'] ?? 'lecturer'; // Default: lecturer
$action = $_GET['action'] ?? 'index'; 
$id = $_GET['id'] ?? null;

// Ubah nama controller menjadi format ClassNameController
$controllerClass = ucfirst($controllerName) . 'Controller';

// Fallback jika controller tidak ditemukan
if (!class_exists($controllerClass)) {
    $controllerClass = 'LecturerController';
    $action = 'index';
}

// 3. Inisialisasi dan Eksekusi Controller
$controller = new $controllerClass($db);

if (method_exists($controller, $action)) {
    // Panggil method dengan atau tanpa ID
    if ($id) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    // Jika action tidak ada, panggil index (list)
    $controller->index();
}