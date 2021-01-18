<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Roll</th>
				<th>Class</th>
				<th>City</th>
				<th>Contact</th>
				<th>Photo</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$student_info = mysqli_query($dbcon, "SELECT * FROM `studentinformation`"); //Select Student info from table.
 			while($row = mysqli_fetch_assoc($student_info)){ ?>
			<tr>
				<td><?php echo $row['id'];?></td> 
				<td><?php echo ucwords($row['name']);?></td>
				<td><?php echo $row['roll'];?></td>
				<td><?php echo $row['class'];?></td>
				<td><?php echo ucwords($row['city']);//for first letter capital?></td>
				<td><?php echo $row['pcontact'];?></td>
				<td><img src="student_image/<?php echo $row['photo'];?>" style="width:100px" alt=""/></td>
				<td>
					<a href="index.php?page=editstudent&id=<?php echo base64_encode($row['id']);?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
					<a href="delete_student.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>