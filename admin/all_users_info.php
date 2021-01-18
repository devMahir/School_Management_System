<h1 class="text-primary">
	<i class="fas fa-users"></i> ALL Users 
	<small>Show All Users</small>
</h1>
<ol class="breadcrumb">
  <li>
    <a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  </li>
	<li class="active">
		<i class="fas fa-users"></i> All Users
	</li>
</ol>
<h2>All Users</h2>

<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Status</th>
				<th>Photo</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$user_info = mysqli_query($dbcon, "SELECT * FROM `users`"); //Select Student info from table.
 			while($row = mysqli_fetch_assoc($user_info)){ ?>
			<tr>
				<td><?php echo $row['id'];?></td> 
				<td><?php echo ucwords($row['name']);//to capatialized first word?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['number'];?></td>
				<td><?php echo ucwords($row['status']);//for first letter capital?></td>
				<td><img src="images/<?php echo $row['photo'];?>" style="width:100px" alt=""/></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>