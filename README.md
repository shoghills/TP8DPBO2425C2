# TP8DPBO2425C2

Saya Rifa Muhammad Danindra dengan Nim 2405981 mengerjakan tugas praktikum 8 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan Aamiin.

      ├── Config/                 
      │   └── connection.php          
      ├── Controllers/            
      │   ├── CourseController.php
      │   ├── LecturerController.php
      │   └── ScheduleController.php
      └── Models/                 
      │   ├── CourseModel.php
      │   ├── LecturerModel.php
      │   └── ScheduleModel.php
      ├── public/                     
      │   ├── index.php
      │   ├── bootstrap.min.css
      │   └── ... (semua aset publik)
      └── views/                      
          ├── course/
          │   ├── list.php
          │   ├── create.php
          │   └── edit.php
          ├── includes/
          │   └── navbar.php
          ├── lecturer/
          │   ├── list.php
          │   ├── create.php
          │   └── edit.php
          └── schedule/
              ├── list.php
              ├── create.php
              └── edit.php


Penjelasan Alur

1. Front Controller
   pertama tama akan masuk ke index php yang di public di situ lalu akan disambungkan ke model, controller lalu koneksi ke database

2. Controller
   di controller akan memproses request dan memilih view ada request get untuk menampilkan data dan ada request post untuk menyimpan data

3. Model
   model ini adalah yang berinteraksi langusng dengan database pertama akan ada penerimaan koneksi untuk setiap model lalu ada query CRUD dan terkahir penegmbalian hasil
4. View
   pertama ada pemuatan view lalu ada dilakukan rendereing data untuk menampilkan data ke layar pengguna terkahir ada output untuk menggabungkan template view dengan data yang ada


https://github.com/user-attachments/assets/78eebe3d-6e2f-4e1c-a7cd-2d84d5833e6b

