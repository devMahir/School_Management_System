<?php
require_once('dbcon.php'); //database connection
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
    //get the photo
    $photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.'.'.$photo;
    //From Vlidation array
    $input_error = array();
    if(empty($name)){
        $input_error['name'] = "Required Name.";
    }
    if(empty($email)){
        $input_error['email'] = "Required Email.";
    }
    if(empty($username)){
        $input_error['username'] = "Required Username.";
    }
    if(empty($password)){
        $input_error['password'] = "Required Password.";
    }
    if(empty($cPassword)){
        $input_error['cPassword'] = "Enter The Password Again.";
    }
    if(count($input_error)==0){
        $email_check = mysqli_query($dbcon,"SELECT * FROM `users` WHERE `email` = '$email'");
        if (mysqli_num_rows($email_check)==0) {
            $username_check = mysqli_query($dbcon,"SELECT * FROM `users` WHERE `username` = '$username'");
            if (mysqli_num_rows($username_check)==0) {
                if(strlen($username) > 7){
                    if (strlen($password) > 7){
                        if($password == $cPassword){
                            $password = md5($password);
                            $sql_for_insert = "INSERT INTO `users`(`name`, `email`, `number`, `username`, `password`, `photo`, `status`) 
                            VALUES ('$name','$email','$number','$username','$password','$photo_name','online')";
                            $insert_data = mysqli_query($dbcon,$sql_for_insert);
                            if ($insert_data) {
                                $_SESSION['data_insert_success'] = "Registration Completed";
                                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                                header('location: login.php');
                            }else {
                                $_SESSION['data_insert_error'] = "Data Insert Error";
                            }
                        }else{
                            $password_different = "Please Enter The Same Password";
                        }
                    }else {
                        $password_lenth = "Password More Then * Characters Long";
                    }
                }else {
                    $username_lenth = "Username More Then 8 Characters Long";
                }
            }else {
                $username_error ="This Username Already Exists";
            }
        }else {
            $email_error = "This Email Address Already Exists";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/animate.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css">

    <title>School Managemant System</title>
  </head>
  <body>
    <div class="container"><br/>
        <h1 class="text-center" style="margin-left:81px">User Registration Form</h1>
        <?php   
            if (isset($_SESSION['data_insert_error'])) { echo '<div class="alert alert-danger">'.$_SESSION['data_insert_error'].'</div>';}
            if (isset($_SESSION['data_insert_success'])) { echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';};
        ?>
        <hr/><br/><br/>
        <div class="col-sm-12">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row offset-4">
                    <label for="name" class="control-label col-sm-3">Name :</label>
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Your Name" value="<?php if(isset($name)){ echo $name; } ?>">
                        <label class="error">
                        <?php if(isset($input_error['name'])){ echo $input_error['name']; } ?>
                        </label>
                    </div>
                </div>
                <div class="form-group row offset-4">
                    <label for="Email" class="control-label col-sm-3">Email :</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control form-control-sm" id="Email" placeholder="Enter Your Email" value="<?php if(isset($email)){ echo $email; } ?>"email>
                        <label class="error">
                            <?php if(isset($input_error['email'])){ echo $input_error['email']; } 
                                  if(isset($email_error)){ echo $email_error; }
                            ?>
                        </label>
                    </div>
                </div>
                <div class="form-group row offset-4">
                    <label for="number" class="control-label col-sm-3">Number :</label>
                    <div class="col-sm-4">
                        <input type="text" name="number" class="form-control form-control-sm" id="number" placeholder="Enter Your Number" value="<?php if(isset($number)){ echo $number; } ?>"Number>
                    </div>
                </div><br/>
                <div class="form-group row offset-4">
                    <label for="Username" class="control-label col-sm-3">Username :</label>
                    <div class="col-sm-4">
                        <input type="text" name="username" class="form-control form-control-sm" id="Username" placeholder="Enter Your Username" value="<?php if(isset($username)){ echo $username; } ?>">
                        <label class="error">
                        <?php if(isset($input_error['username'])){ echo $input_error['username']; } 
                              if(isset($username_error)){ echo $username_error;}
                              if(isset($username_lenth)){ echo $username_lenth;}
                        ?>
                        </label>
                    </div>
                </div>
                <div class="form-group row offset-4">
                    <label for="Password" class="control-label col-sm-3">Password :</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" class="form-control form-control-sm" id="Password" placeholder="Enter Your Password" value="<?php if(isset($password)){ echo $password; } ?>">
                        <label class="error">
                        <?php 
                            if(isset($input_error['password'])){ echo $input_error['password']; }
                            if(isset($password_lenth)){ echo $password_lenth; }
                        ?>
                        </label>
                    </div>
                </div>
                <div class="form-group row offset-4">
                    <label for="cPassword" class="control-label col-sm-3">Confirm Password :</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control form-control-sm" name="cPassword" id="cPassword" placeholder="Enter Your Password again" value="<?php if(isset($cPassword)){ echo $cPassword; } ?>"cPassword>
                        <label class="error">
                        <?php if(isset($input_error['cPassword'])){ echo $input_error['cPassword'];} 
                              if(isset($password_different)){ echo $password_different;}  
                        ?>
                        </label>
                    </div>
                </div>
                <div class="form-group row offset-4">
                    <label for="photo" class="control-label col-sm-3">Photo :</label>
                    <div class="col-sm-4">
                        <input type="file" name="photo" class="form-control form-control-sm" id="photo">
                    </div>
                </div><br/>
                <div class="col-sm-12 center">
                    <button type="submit" name="submit" class="btn btn-primary">Registration</button>
                </div>
            </form>
        </div><br/>
        <div class="text-center">
            <p>If you have an account? then please<br><br><a href="login.php" class="btn btn-success center">log In</a></p>
        </div>
    </div>
    <footer><br/>
        <div class="container">
            <p class="text-center">Copyright & copy; 2020 <?php date('Y')?> Developer Mahir All Right Reserved</p>
        </div>
    </footer>
  </body>
</html>