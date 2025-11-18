<?php // views/course/edit.php 
// $course datang dari CourseController
?>
<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Update Course</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?controller=course&action=edit&id=<?php echo $course['id']; ?>">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Course</h1>
        </div><br>
        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
        <label> COURSE CODE: </label>
        <input type="text" name="course_code" value="<?php echo $course['course_code']; ?>" class="form-control" required> <br>
        <label> NAME: </label>
        <input type="text" name="name" value="<?php echo $course['name']; ?>" class="form-control" required> <br>
        <label> SKS: </label>
        <input type="number" name="sks" value="<?php echo $course['sks']; ?>" class="form-control" required min="1" max="6"> <br>
        <label> SEMESTER: </label>
        <input type="number" name="semester" value="<?php echo $course['semester']; ?>" class="form-control" required min="1" max="8"> <br>
        <button class="btn btn-success" type="submit" name="submit">Submit </button><br>
        <a class="btn btn-info" href="index.php?controller=course"> Cancel </a><br>
      </div>
    </form>
  </div>
</body>
</html>