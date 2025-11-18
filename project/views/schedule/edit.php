<?php // views/schedule/edit.php 
// $schedule, $lecturers, dan $courses datang dari ScheduleController
?>
<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Update Schedule</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?controller=schedule&action=edit&id=<?php echo $schedule['id']; ?>">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Schedule</h1>
        </div><br>

        <input type="hidden" name="id" value="<?php echo $schedule['id']; ?>">

        <label> LECTURER: </label>
        <select name="lecturer_id" class="form-control" required>
            <?php while ($l = $lecturers->fetch_assoc()): ?>
                <option value="<?php echo $l['id']; ?>" 
                    <?php echo $l['id'] == $schedule['lecturer_id'] ? 'selected' : ''; ?>>
                    <?php echo $l['name']; ?>
                </option>
            <?php endwhile; ?>
        </select> <br>

        <label> COURSE: </label>
        <select name="course_id" class="form-control" required>
            <?php while ($c = $courses->fetch_assoc()): ?>
                <option value="<?php echo $c['id']; ?>" 
                    <?php echo $c['id'] == $schedule['course_id'] ? 'selected' : ''; ?>>
                    <?php echo $c['course_code'] . ' - ' . $c['name']; ?>
                </option>
            <?php endwhile; ?>
        </select> <br>

        <label> DAY: </label>
        <select name="day_of_week" class="form-control" required>
            <?php $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
            foreach ($days as $day): ?>
                <option value="<?php echo $day; ?>" 
                    <?php echo $day == $schedule['day_of_week'] ? 'selected' : ''; ?>>
                    <?php echo $day; ?>
                </option>
            <?php endforeach; ?>
        </select> <br>
        
        <div class="row">
            <div class="col-6">
                <label> START TIME: </label>
                <input type="time" name="start_time" class="form-control" value="<?php echo $schedule['start_time']; ?>" required> <br>
            </div>
            <div class="col-6">
                <label> END TIME: </label>
                <input type="time" name="end_time" class="form-control" value="<?php echo $schedule['end_time']; ?>" required> <br>
            </div>
        </div>

        <label> ROOM NUMBER: </label>
        <input type="text" name="room_number" class="form-control" value="<?php echo $schedule['room_number']; ?>"> <br>

        <button class="btn btn-success" type="submit" name="submit">Submit </button><br>
        <a class="btn btn-info" href="index.php?controller=schedule"> Cancel </a><br>

      </div>
    </form>
  </div>
</body>
</html>