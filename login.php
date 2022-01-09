<?php
session_start();
include 'includes/header.php';
include 'func.php';

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = query($query);
  // $hasil = mysqli_fetch_assoc($result);
  // var_dump($result);
  var_dump($hasil);
  echo $hasil['username'];
  if(mysqli_num_rows($result) === 1){

    $row = mysqli_fetch_assoc($result);
    if(password_verify($password,$row['password'])){
      
      //set session
      $_SESSION['login'] = true;
      header("Location:admin.php");

    }
    else{

      echo "Password Salah";

    }

  }
  else{

    echo "Username tidak ditemukan";

  }

}

?>
<div class="container">
  <div class="d-block">
    <div class="border rounded-3 p-3">
      <h3 class="text-center p-3">Lomgin</h3>
      <form action="" method="POST">
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Username</label>
          </div>
          <div class="col-9">
            <input type="text" name="username" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="" class="form-label">Password</label>
          </div>
          <div class="col-9">
            <input type="text" name="password" class="form-control">
          </div>
        </div>
        <p>
          <a href="register.php">didn't have account?</a>
        </p>
        <div class="d-flex justify-content-center">
          <button class="btn btn-outline btn-danger" type="reset">Reset</button>
          <button name="submit" class="btn btn-outline btn-primary mx-3" type="submit">Login!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>