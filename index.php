<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>School Managemant System</title>
  </head>
  <body>
    <div class="container">
        <br>
        <a href="admin/login.php" class="btn btn-primary pull-right">LogIn Admin</a><br><br>
        <h1 class="text-center">Welcome to School Managemant System</h1><hr/>
        <br><br/>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <form action="" method="POST">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2" class="text-center"><label>Student Information</label></td>
                </tr>
                <tr>
                  <td><label for="chose">Choose Class</label></td>
                  <td>
                    <select class="form-control" id="chose" name="class">
                      <option value="">Select Class</option>
                      <option value="1st">Class 1 </option>
                      <option value="2nd">Class 2 </option>
                      <option value="3rd">Class 3 </option>
                      <option value="4th">Class 4 </option>
                      <option value="5th">Class 5 </option>
                      <option value="6th">Class 6 </option>
                      <option value="7th">Class 7 </option>
                      <option value="8th">Class 8 </option>
                      <option value="9th">Class 9 </option>
                      <option value="10th">Class 10</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><label for="roll">Roll</label></td>
                  <td><input class="form-control" type="text" name="roll" placeholder="Roll"></td>
                </tr>
                <tr>
                  <td class="text-center" colspan="2">
                    <input class="btn btn-success" type="submit" value="show info" name="show_student_info">
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <br><br>
        <?php
        require_once('admin/dbcon.php');
        if (isset($_POST['show_student_info'])) {
          $class = $_POST['class'];
          $roll  = $_POST['roll'];
          $sql_for_search_student = "SELECT * FROM `studentinformation` WHERE `class` = '$class' && `roll` = '$roll'";
          $student_info = mysqli_query($dbcon,$sql_for_search_student);
          $row = mysqli_fetch_assoc($student_info);
        ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <table class="table table-bordered">
              <tr>
                <td rowspan="5"><img src="admin/student_image/Mahir.JPG" class="img-thumbnail" style="width: 150px;" alt=""></td>
                <td>Name</td>
                <td><?php echo $row['name'];?></td>
              </tr>
              <tr>
                <td>Class</td>
                <td><?= $row['class'] ?></td>
              </tr>
              <tr>
                
                <td>Roll</td>
                <td><?= $row['roll'] ?></td>
              </tr>
              <tr>
                
                <td>City</td>
                <td><?php echo $row['city'] ?></td>
              </tr>
              <tr>
                
                <td>Parent Contact</td>
                <td><?= $row['pcontact'] ?></td>
              </tr>
            </table>
          </div>
        </div>
        <?php } ?>
    </div>
    <div class="container text-center">
        <br/><br/><br/><br/><br/><p>Copyright & copy; 2016 <?php date('Y')?> All Right Reserved</p>
    </div>
  </body>
</html>