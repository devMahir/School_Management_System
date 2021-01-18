<?php
session_start();
require_once('dbcon.php');
if (!isset($_SESSION['user_login'])) {
  header('location: login.php'); //login kora nh thakle ei page e asha jabe nh
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Dashboard</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand menubar_text" href="index.php?page=dashboard"><strong style="font-size:20px;">School Management System</strong></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?page=user_profile" class="menubar_text"><i class="fas fa-user"></i> Welcome 
          <?php
          $admin_username = $_SESSION['user_login'];
          $admin_username = ucwords($admin_username);
          echo "<strong> $admin_username </strong>";
          ?></a></li>
          <li><a href="registration.php" class="menubar_text"><i class="fas fa-user-plus"></i> Add User</a></li>
          <li><a href="index.php?page=user_profile" class="menubar_text"><i class="fas fa-user"></i> Profile</a></li>
          <li><a href="logout.php" class="menubar_text"><i class="fas fa-power-off"></i> Log Out</a></li>
        </ul>
      </div>
    </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="list-group">
          <a href="index.php?page=dashboard" class="list-group-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          <a href="index.php?page=addstudent" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
          <a href="index.php?page=allstudent" class="list-group-item"><i class="fa fa-users"></i> All Student</a>
          <a href="index.php?page=all_users_info" class="list-group-item"><i class="fas fa-users"></i></i> All users</a>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="content">
          <?php 
            if (isset($_GET['page'])) {
              $page = $_GET['page'].'.php';
            }else {
              $page = "dashboard.php";
            }
            if (file_exists($page)) {
              require_once $page;
            }else {
              require_once('404.php');
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer_area">
    <p class="text-center">Copyright & copy; 2020 <?php date('Y')?> Developer Mahir All Right Reserved</p>
  </footer>
  </body>
</html>