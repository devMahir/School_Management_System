<h1 class="text-primary">
	<i class="fas fa-pencil-square-o"></i> User Profile
	<small>My Profile</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li>
        <a href="index.php?page=user_profile"><i class="fas fa-user"></i> Profile</a>
    </li>
	<li class="active">
        <i class="far fa-edit"></i> Edit User Profile
	</li>
</ol>
<?php
    $session_username = $_SESSION['user_login'];
	$user_info = mysqli_query($dbcon, "SELECT * FROM `users` WHERE `username` = '$session_username'"); //Select username from username column.
    $user_row = mysqli_fetch_assoc($user_info); //select username information from row
    $id = $_GET['id']; // To get user_id;
    if (isset($_POST['update_user'])) {
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $number = $_POST['user_number'];
        $status = $_POST['user_status'];
        $edit_user_sql = "UPDATE `users` SET `name`='$name',`email`='$email',`number`='$number',`status`='$status' WHERE `id`='$id'";
        $result = mysqli_query($dbcon,$edit_user_sql);
        if ($result) {
            header('location: index.php?page=user_profile');
        }else {
            echo "false";
        }
    }
?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <td>User Id</td>
                <td><?php echo $user_row['id'];?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input required="" name="user_name" type="text" class="user_edit_field" value="<?php echo ucwords($user_row['name']);//to capatialized first word?>"> </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo ucwords($user_row['username']);?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input required="" name="user_email" type="text" class="user_edit_field" value="<?php echo $user_row['email']; //to capatialized first word?>"></td>
            </tr><tr>
                <td>Number</td>
                <td><input required="" name="user_number" type="text" class="user_edit_field" value="<?php echo $user_row['number'];?>"> </td>
            </tr>
            <tr>
                <td>Status</td>
                <td> <input required="" name="user_status" type="text" class="user_edit_field" value="<?php echo ucwords($user_row['status']);?>"></td> 
            </tr>
            <tr>
                <td>Sign Up Date</td>
                <td><?php echo $user_row['datetime']?></td>
            </tr>
        </table>
        <input type="submit" name="update_user" value="Update Profile" class="btn btn-sm btn-info pull-right">
        </form>
    </div>
    <div class="col-sm-6">
        <a href="#">
            <img style="width: 225px" src="student_image/<?php echo $user_row['photo'];?>" alt="">
        </a><br><br>
        <form action="">
            <label for="photo"> Profile Picture</label>
        </form>
    </div>
</div>