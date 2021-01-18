<h1 class="text-primary">
	<i class="fas fa-pencil-square-o"></i> User Profile
	<small>My Profile</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>
	<li class="active">
        <i class="fas fa-user"></i> Profile
	</li>
</ol>
<?php
    $session_username = $_SESSION['user_login'];
	$user_info = mysqli_query($dbcon, "SELECT * FROM `users` WHERE `username` = '$session_username'"); //Select username from username column.
    $user_row = mysqli_fetch_assoc($user_info); //select username information from row
?>
<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">
            <tr>
                <td>User Id</td>
                <td><?php echo $user_row['id'];?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo ucwords($user_row['name']);//to capatialized first word?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo ucwords($user_row['username']);?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $user_row['email'];?></td>
            </tr><tr>
                <td>Number</td>
                <td><?php echo $user_row['number'];?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo ucwords($user_row['status']);?></td>
            </tr>
            <tr>
                <td>Sign Up Date</td>
                <td><?php echo $user_row['datetime']?></td>
            </tr>
        </table>
        <a href="index.php?page=edit_user&id=<?php echo $user_row['id'];?>" class="btn btn-sm btn-info pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="#">
            <img style="width: 225px" src="images/<?php echo $user_row['photo'];?>" alt="">
        </a><br><br>
        <?php
        if (isset($_POST['Upload_photo_for_user'])) {
            //get the photo
            $photo = explode('.',$_FILES['photo']['name']);
            $photo_last_name = end($photo);
            $photo_name = $session_username.'.'.$photo_last_name;
            $sql_update_image = "UPDATE `users` SET `photo`='$photo_name' WHERE `username` = '$session_username'";
            $edit_picture = mysqli_query($dbcon,$sql_update_image);
            if ($edit_picture) {
                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
            }else {
                echo "problem";
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="photo">Edit Profile Picture</label>
            <input type="file" name="photo" require="" id="photo"><br>
            <input type="submit" name="Upload_photo_for_user" value="Upload photo" class="btn btn-sm btn-info">
        </form>
    </div>
</div>