<h1 class="text-primary">
	<i class="fas fa-pencil-square-o"></i> Update Student 
	<small>Update Student</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>
    <li>
        <a href="index.php?page=allstudent"><i class="fa fa-users"></i> All Student</a>
    </li>
	<li class="active">
		<i class="far fa-edit"></i> Update Student
	</li>
</ol>

<?php
$id = base64_decode($_GET['id']);
$show_data = mysqli_query($dbcon,"SELECT * FROM `studentinformation` WHERE `id` = $id");
$db_row_for_edit = mysqli_fetch_assoc($show_data);

if (isset($_POST['updatestudent'])) {
    $name = $_POST['name'];
    $roll = $_POST['student_roll'];
    $city = $_POST['city'];
    $number = $_POST['number'];
    $class = $_POST['class'];
    $sql = "UPDATE `studentinformation` SET `name`='$name',`roll`='$roll',`city`='$city',`pcontact`='$number',`class`='$class' WHERE `id`='$id'";
    $result = mysqli_query($dbcon,$sql);
    if ($result) {
        header('location: index.php?page=allstudent');
    }
    else {
        echo "false";
    }
}
?>

<div class="row">
    <div class="col-sm-6">    
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input required="" type="text" name="name" placeholder="Studen Name" id="name" class="form-control" value = "<?= $db_row_for_edit['name']; ?>">
            </div>

            <div class="form-group">
                <label for="student_roll">Student Roll</label>
                <input required="" type="text" name="student_roll" placeholder="student Roll" id="student_roll" class="form-control" value = "<?php echo $db_row_for_edit['roll'];?>" >
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input required="" type="text" name="city" placeholder="City" id="city" class="form-control"  value = "<?= $db_row_for_edit['city']; ?>">
            </div>

            <div class="form-group">
                <label for="number">Contact Number</label>
                <input required="" type="text" name="number" placeholder="01*********" id="number" class="form-control"  value = "<?= $db_row_for_edit['pcontact']; ?>">
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <select required="" name="class" id="clsss" class="form-control">
                    <option value="">Select</option>
                    <option <?php echo $db_row_for_edit['class'] == '1st'  ? 'selected=" " ':''; ?> value="1st">1st</option>
                    <option <?php echo $db_row_for_edit['class'] == '2nd'  ? 'selected=" " ':''; ?> value="2nd">2nd</option>
                    <option <?php echo $db_row_for_edit['class'] == '3rd'  ? 'selected=" " ':''; ?> value="3rd">3rd</option>
                    <option <?php echo $db_row_for_edit['class'] == '4th'  ? 'selected=" " ':''; ?> value="4th">4th</option>
                    <option <?php echo $db_row_for_edit['class'] == '5th'  ? 'selected=" " ':''; ?> value="5th">5th</option>
                    <option <?php echo $db_row_for_edit['class'] == '6th'  ? 'selected=" " ':''; ?> value="6th">6th</option>
                    <option <?php echo $db_row_for_edit['class'] == '7th'  ? 'selected=" " ':''; ?> value="7th">7th</option>
                    <option <?php echo $db_row_for_edit['class'] == '8th'  ? 'selected=" " ':''; ?> value="8th">8th</option>
                    <option <?php echo $db_row_for_edit['class'] == '9th'  ? 'selected=" " ':''; ?> value="9th">9th</option>
                    <option <?php echo $db_row_for_edit['class'] == '10th' ? 'selected=" " ':''; ?> value="10th">10th</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Update Student" name="updatestudent" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>