<?php // views/schedule/create.php 
// $lecturers dan $courses datang dari ScheduleController
?>
<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Create Schedule</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?controller=schedule&action=create">
      <br><br>
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create New Schedule</h1>
        </div><br>

        <label> LECTURER: </label>
        <select name="lecturer_id" class="form-control" required>
            <option value="">-- Pilih Dosen --</option>
            <?php while ($l = $lecturers->fetch_assoc()): ?>
                <option value="<?php echo $l['id']; ?>"><?php echo $l['name']; ?></option>
            <?php endwhile; ?>
        </select> <br>

        <label> COURSE: </label>
        <select name="course_id" class="form-control" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            <?php while ($c = $courses->fetch_assoc()): ?>
                <option value="<?php echo $c['id']; ?>"><?php echo $c['course_code'] . ' - ' . $c['name']; ?></option>
            <?php endwhile; ?>
        </select> <br>

        <label> DAY: </label>
        <select name="day_of_week" class="form-control" required>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select> <br>
        
        <div class="row">
            <div class="col-6">
                <label> START TIME: </label>
                <input type="time" name="start_time" class="form-control" required> <br>
            </div>
            <div class="col-6">
                <label> END TIME: </label>
                <input type="time" name="end_time" class="form-control" required> <br>
            </div>
        </div>

        <label> ROOM NUMBER: </label>
        <input type="text" name="room_number" class="form-control"> <br>

        <button class="btn btn-success" type="submit" name="submit">Submit </button><br>
        <a class="btn btn-info" href="index.php?controller=schedule"> Cancel </a><br>

      </div>
    </form>
  </div>
</body>
</html>