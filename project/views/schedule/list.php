<?php // views/schedule/list.php 
// $schedules datang dari ScheduleController
?>
<!doctype html>
<html lang="en">
<head>
    <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Schedule List</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="container my-4">
    <h2>Data Jadwal Mengajar</h2>
    <a type="button" class="btn btn-primary my-3" href="index.php?controller=schedule&action=create">Add New Schedule</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>COURSE (CODE)</th>
          <th>LECTURER</th>
          <th>DAY</th>
          <th>TIME</th>
          <th>ROOM</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($schedules && $schedules->num_rows > 0): ?>
          <?php while ($row = $schedules->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['course_name'] . " (" . $row['course_code'] . ")"; ?></td>
              <td><?php echo $row['lecturer_name']; ?></td>
              <td><?php echo $row['day_of_week']; ?></td>
              <td><?php echo date('H:i', strtotime($row['start_time'])) . " - " . date('H:i', strtotime($row['end_time'])); ?></td>
              <td><?php echo $row['room_number']; ?></td>
              <td>
                <a class="btn btn-success btn-sm" href="index.php?controller=schedule&action=edit&id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn btn-danger btn-sm" href="index.php?controller=schedule&action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus Jadwal ini?');">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center">Data Jadwal tidak ditemukan.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>