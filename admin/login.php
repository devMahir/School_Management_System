<?php
session_start(); //start a session so that computer can recognize the user
require_once('dbcon.php'); //connect database
if (isset($_SESSION['user_login'])) {
  header('location: index.php'); //login kora thakle login page e asha jabe nh
}
if (isset($_POST['login'])) {
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $password = md5($password);
  $username_checker_sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $username_check = mysqli_query($dbcon,$username_checker_sql);
  if (mysqli_num_rows($username_check) > 0) {
    $row = mysqli_fetch_assoc($username_check);
    if ($row['password'] == $password) {
      if ($row['status'] == 'online') {
        $_SESSION['user_login'] = $username;
        header ('location: index.php');
      }else {
        $activity_status = "Your Status is Offline";
      }
    }else {
      $wrong_password = "This password is wrong";
    }
  }else {
    $username_not_found = "This Username Not Found";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css2/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/animate.min.css"/>

    <title>School Managemant System</title>
  </head>
  <body><br/>
    <div class="container">
      <br/><br/><br/>
      <h1 class="text-center">Student Managemant System</h1><br/><br/><br/>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <?php if (isset($_SESSION['data_insert_success'])) { echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}; ?>
          <h2 class="text-center">Admin Login Form</h2><br/>
          <form action="login.php" method="POST">
            <div>
              <input type="text" placeholder="Username" name="username" required="" class="form-control" value = "<?php if (isset($username)){ echo $username;}?>"><br>
              <input type="password" placeholder="Password" required="" name="password" class="form-control" value = "<?php if (isset($password)){ echo $password;}?>"><br>
              <div class="float-end"><input type="submit" value="Login" name="login" class="btn btn-info"></input></div>
            </div>
          </form>
        </div>
      </div><br/><br/>
      <?php if(isset($username_not_found)){ echo '<div class="alert alert-danger col-sm-4 offset-4">'.$username_not_found.'</div>'; } ?>
      <?php if(isset($wrong_password)){ echo '<div class="alert alert-danger col-sm-4 offset-4">'.$wrong_password.'</div>'; } ?>
      <?php if(isset($activity_status)){ echo '<div class="alert alert-danger col-sm-4 offset-4">'.$activity_status.'</div>'; } ?>
      <div class="text-center">
            <p>If you dont have an account? then please</p>
            <a href="registration.php" class="btn btn-success">Registration</a>
        </div>
    </div>
    <div class="container text-center">
        <br/><br/><br/><p>Copyright & copy; 2016 <?php date('Y')?> All Right Reserved</p>
    </div>
  </body>
</html>