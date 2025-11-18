<?php
// app/Controllers/CourseController.php

class CourseController {
    private $model;

    public function __construct($db) {
        $this->model = new CourseModel($db);
    }

    public function index() {
        $courses = $this->model->getAll();
        // Memuat file views/course/list.php
        require '../views/course/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = $_POST['course_code'] ?? '';
            $name = $_POST['name'] ?? '';
            $sks = $_POST['sks'] ?? 0;
            $semester = $_POST['semester'] ?? 0;

            if ($this->model->create($code, $name, $sks, $semester)) {
                header('Location: index.php?controller=course');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error creating course.</div>";
            }
        }
        require '../views/course/create.php';
    }

    public function edit($id) {
        $course = $this->model->getById($id);

        if (!$course) {
            header('Location: index.php?controller=course');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $code = $_POST['course_code'] ?? '';
            $sks = $_POST['sks'] ?? 0;
            $semester = $_POST['semester'] ?? 0;

            if ($this->model->update($id, $code, $name, $sks, $semester)) {
                header('Location: index.php?controller=course');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error updating course.</div>";
            }
        }
        require '../views/course/edit.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?controller=course');
        exit;
    }
}