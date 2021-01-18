<h1 class="text-primary">
	<i class="fas fa-user-plus"></i> Add Student 
	<small>Add New Student</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>
	<li class="active">
		<i class="fas fa-user-plus"></i> Add Student
	</li>
</ol>

<?php
if (isset($_POST['addstudent'])) {
    $name = $_POST['name'];
    list($firstWord) = explode(' ', $name); // To select first word of his name for saving image name.
    $roll = $_POST['student_roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $number = $_POST['number'];
    $picture = $_FILES['picture']['name'];
    $picture = explode('.',$picture);
    $picture_exe = end($picture);
    $picture_name = $firstWord.'.'.$picture_exe; //select picture name.
    $sql = "INSERT INTO `studentinformation`(`name`, `roll`, `class`, `city`, `pcontact`,`photo`)
    VALUES ('$name','$roll','$class','$city','$number','$picture_name')";
    $insert_data = mysqli_query($dbcon,$sql);
    
    if ($insert_data) {
        $success = "Data insert Success";
        move_uploaded_file($_FILES['picture']['tmp_name'],'student_image/'.$picture_name);
    }else{
        $error = "Data insert Error";
    }
}
?>
<div class="row">
    <div class="col-sm-6">
        <?php if (isset($success)){ echo '<p class="alert alert-success">'.$success.'</p>';}?>
        <?php if (isset($error)){ echo '<p class="alert alert-danger">'.$error.'</p>';}?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input required="" type="text" name="name" placeholder="Studen Name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="student_roll">Student Roll</label>
                <input required="" type="text" name="student_roll" placeholder="student Roll" id="student_roll" class="form-control">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input required="" type="text" name="city" placeholder="City" id="city" class="form-control">
            </div>

            <div class="form-group">
                <label for="number">Contact Number</label>
                <input required="" type="text" name="number" placeholder="01*********" id="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="class">Class</label>
                <select required="" name="class" id="clsss" class="form-control">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                    <option value="9th">9th</option>
                    <option value="10th">10th</option>
                </select>
            </div>

            <div class="form-group">
                <label for="picture">Picture</label>
                <input required="" type="file" name="picture" id="picture">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Student" name="addstudent" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>