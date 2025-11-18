<?php // views/course/list.php 
// $courses datang dari CourseController
?>
<!doctype html>
<html lang="en">
<head>
    <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Course List</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="container my-4">
    <h2>Data Mata Kuliah</h2>
    <a type="button" class="btn btn-primary my-3" href="index.php?controller=course&action=create">Add New Course</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>CODE</th>
          <th>NAME</th>
          <th>SKS</th>
          <th>SEMESTER</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($courses): ?>
          <?php while ($row = $courses->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['course_code']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['sks']; ?></td>
              <td><?php echo $row['semester']; ?></td>
              <td>
                <a class="btn btn-success btn-sm" href="index.php?controller=course&action=edit&id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn btn-danger btn-sm" href="index.php?controller=course&action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus Mata Kuliah ini?');">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6" class="text-center">Data Mata Kuliah tidak ditemukan.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>