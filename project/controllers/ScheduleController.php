<?php
// app/Controllers/ScheduleController.php

class ScheduleController {
    private $model;
    private $lecturerModel;
    private $courseModel;

    public function __construct($db) {
        $this->model = new ScheduleModel($db);
        // Inisialisasi Model lain yang dibutuhkan untuk form dropdown
        $this->lecturerModel = new LecturerModel($db);
        $this->courseModel = new CourseModel($db);
    }

    public function index() {
        $schedules = $this->model->getAll();
        // Memuat file views/schedule/list.php
        require '../views/schedule/list.php';
    }

    public function create() {
        // Ambil data untuk dropdown di form
        $lecturers = $this->lecturerModel->getAvailableLecturers();
        $courses = $this->courseModel->getAvailableCourses();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lecturer_id = $_POST['lecturer_id'] ?? 0;
            $course_id = $_POST['course_id'] ?? 0;
            $day = $_POST['day_of_week'] ?? '';
            $start_time = $_POST['start_time'] ?? '';
            $end_time = $_POST['end_time'] ?? '';
            $room = $_POST['room_number'] ?? '';

            if ($this->model->create($lecturer_id, $course_id, $day, $start_time, $end_time, $room)) {
                header('Location: index.php?controller=schedule');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error creating schedule.</div>";
            }
        }
        require '../views/schedule/create.php';
    }

    public function edit($id) {
        $schedule = $this->model->getById($id);

        if (!$schedule) {
            header('Location: index.php?controller=schedule');
            exit;
        }

        // Ambil data untuk dropdown di form
        $lecturers = $this->lecturerModel->getAvailableLecturers();
        $courses = $this->courseModel->getAvailableCourses();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lecturer_id = $_POST['lecturer_id'] ?? 0;
            $course_id = $_POST['course_id'] ?? 0;
            $day = $_POST['day_of_week'] ?? '';
            $start_time = $_POST['start_time'] ?? '';
            $end_time = $_POST['end_time'] ?? '';
            $room = $_POST['room_number'] ?? '';

            if ($this->model->update($id, $lecturer_id, $course_id, $day, $start_time, $end_time, $room)) {
                header('Location: index.php?controller=schedule');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error updating schedule.</div>";
            }
        }
        require '../views/schedule/edit.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?controller=schedule');
        exit;
    }
}