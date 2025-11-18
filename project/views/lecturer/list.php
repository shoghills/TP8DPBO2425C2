<?php // views/lecturer/list.php 
// $lecturers datang dari LecturerController
?>
<!doctype html>
<html lang="en">
<head>
    <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Dosen List</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="container my-4">
    <h2>Data Dosen</h2>
    <div class="col-1 my-3">
      <a type="button" class="btn btn-primary nav-link active" 
         href="index.php?controller=lecturer&action=create">Add New</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>NIDN</th>
          <th>PHONE</th>
          <th>JOIN DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($lecturers) {
          while ($row = $lecturers->fetch_assoc()) {
            echo "
              <tr>
                <th>{$row['id']}</th>
                <td>{$row['name']}</td>
                <td>{$row['nidn']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['join_date']}</td>
                <td>
                    <a class='btn btn-success btn-sm' href='index.php?controller=lecturer&action=edit&id={$row['id']}'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='index.php?controller=lecturer&action=delete&id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus data Dosen ini?');\">Delete</a>
                </td>
              </tr>
            ";
          }
        } else {
            echo "<tr><td colspan='6' class='text-center'>Data Dosen tidak ditemukan.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>