<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Create Course</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?controller=course&action=create">
      <br><br>
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create New Course</h1>
        </div><br>
        <label> COURSE CODE: </label>
        <input type="text" name="course_code" class="form-control" required> <br>
        <label> NAME: </label>
        <input type="text" name="name" class="form-control" required> <br>
        <label> SKS: </label>
        <input type="number" name="sks" class="form-control" required min="1" max="6"> <br>
        <label> SEMESTER: </label>
        <input type="number" name="semester" class="form-control" required min="1" max="8"> <br>
        <button class="btn btn-success" type="submit" name="submit">Submit </button><br>
        <a class="btn btn-info" href="index.php?controller=course"> Cancel </a><br>
      </div>
    </form>
  </div>
</body>
</html>