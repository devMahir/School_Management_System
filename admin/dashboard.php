 
<h1 class="text-primary">
	<i class="fas fa-tachometer-alt"></i> Dashboard 
	<small>Statics Overview</small>
</h1>
<ol class="breadcrumb">
	<li class="active">
		<i class="fas fa-tachometer-alt"></i> Dashboard
	</li>
</ol>
<?php
require_once('dbcon.php');

//for showing all students
//$sql_for_student_count = "SELECT count(*) FROM `studentinformation`"; //get the table
//$conn_for_all_student = mysqli_query($dbcon, $sql_for_student_count); //connect with database
//$row_students = mysqli_fetch_assoc($conn_for_all_student); //get the rows
//$all_students = array_values($row_students); //showing all students

$sql_for_student_count = "SELECT * FROM `studentinformation`"; //get the table
$conn_for_all_student = mysqli_query($dbcon, $sql_for_student_count); //connect with database
$totalstudent = mysqli_num_rows($conn_for_all_student);


//for showing all users
$sql_for_user_count = "SELECT count(*) FROM `users`";
$conn_for_all_user = mysqli_query($dbcon, $sql_for_user_count);
$row_users = mysqli_fetch_assoc($conn_for_all_user);
$all_users = array_values($row_users);
?>
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fas fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9">
						<div class="pull-right" style="font-size: 45px"><?php echo $totalstudent;?></div>
						<div class="clearfix"></div>
						<div class="pull-right">All Students</div>
					</div>
				</div>
			</div>
			<a href="index.php?page=allstudent">
				<div class="panel-footer">
					<span class="pull-left">All Student</span>
					<div class="pull-right">
						<i class="far fa-arrow-alt-circle-right"></i>
					</div>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-4 pull-right">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-9">
						<div class="pull-right" style="font-size: 45px"><?php echo $all_users['0'];?></div>
						<div class="clearfix"></div>
						<div class="pull-right">All Users</div>
					</div>
				</div>
			</div>
			<a href="index.php?page=all_users_info">
				<div class="panel-footer">
					<span class="pull-left">All User</span>
					<div class="pull-right">
						<i class="far fa-arrow-alt-circle-right"></i>
					</div>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<hr>
<h3>New Students</h3>
<?php require_once('student_info.php'); ?>