<?php // views/lecturer/edit.php 
// $lecturer datang dari LecturerController
?>
<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Update Lecturer</title>
</head>
<body>
  <?php include '../views/includes/navbar.php'; ?>
  <div class="col-lg-6 m-auto">
    <form method="post" action="index.php?controller=lecturer&action=edit&id=<?php echo $lecturer['id']; ?>">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Lecturer </h1>
        </div><br>
        <input type="hidden" name="id" value="<?php echo $lecturer['id']; ?>">
        <label> NAME: </label>
        <input type="text" name="name" value="<?php echo $lecturer['name']; ?>" class="form-control"> <br>
        <label> NIDN: </label>
        <input type="text" name="nidn" value="<?php echo $lecturer['nidn']; ?>" class="form-control"> <br>
        <label> PHONE: </label>
        <input type="text" name="phone" value="<?php echo $lecturer['phone']; ?>" class="form-control"> <br>
        <label> JOIN DATE: </label>
        <input type="date" name="join_date" value="<?php echo $lecturer['join_date']; ?>" class="form-control"> <br>
        <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
        <a class="btn btn-info" href="index.php?controller=lecturer"> Cancel </a><br>
      </div>
    </form>
  </div>
</body>
</html>