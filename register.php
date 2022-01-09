<?php
include 'func.php';
include 'includes/header.php';
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
  $query = "INSERT INTO `users` (`id`, `username`, `password`, `Name`) VALUES (NULL, '$username', '$hashedPassword', '$name');";
  $test = query($query);
  var_dump($test);
  header("Location:login.php");
}
?>
<div class="container">
  <div class="d-block">
    <div class="border rounded-3 p-3">
      <h3 class="text-center p-3">REGISTRESON</h3>
      <form action="" method="POST">
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Username</label>
          </div>
          <div class="col-9">
            <input type="text" name="username" class="form-control" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Name</label>
          </div>
          <div class="col-9">
            <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Password</label>
          </div>
          <div class="col-9">
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>
        <div class="d-flex justify-content-center mb-3">
          <button type="submit" name="register" class="btn btn-outline btn-primary mx-3">Register</button>
          <button type="reset" class="btn btn-outline btn-danger">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'includes/footer.php' ?>
