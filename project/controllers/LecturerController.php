<?php
// app/Controllers/LecturerController.php

class LecturerController {
    private $model;

    public function __construct($db) {
        $this->model = new LecturerModel($db);
    }

    public function index() {
        $lecturers = $this->model->getAll();
        // Memuat file views/lecturer/list.php
        require '../views/lecturer/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $nidn = $_POST['nidn'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $join_date = $_POST['join_date'] ?? '';

            if ($this->model->create($name, $nidn, $phone, $join_date)) {
                header('Location: index.php?controller=lecturer');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error creating lecturer.</div>";
            }
        }
        require '../views/lecturer/create.php';
    }

    public function edit($id) {
        $lecturer = $this->model->getById($id);

        if (!$lecturer) {
            header('Location: index.php?controller=lecturer');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $nidn = $_POST['nidn'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $join_date = $_POST['join_date'] ?? '';

            if ($this->model->update($id, $name, $nidn, $phone, $join_date)) {
                header('Location: index.php?controller=lecturer');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error updating lecturer.</div>";
            }
        }
        require '../views/lecturer/edit.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?controller=lecturer');
        exit;
    }
}