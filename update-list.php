<?php
include('config.php');

include('check-login.php');
$sql = "SELECT student.*, department.name AS department_id FROM student INNER JOIN department ON student.department_id=department.id ORDER BY student.id DESC";
$sql_query = mysqli_query($con, $sql) or die('Something went wrong!');


?>


<!doctype html>
<html>
	<head>
		<title>Admission List</title>
		<link rel="stylesheet" href="assets/css/style.css"/>
		<style>
			td, th {
				border: 1px solid #000;
				border-collapse: collapse;
			}

			th {
				background-color: #ddd;
			}

		</style>
	</head>
	<body>
		<?php include('includes/header.php') ?>
		<div class="container">
			<div>
				<?php include('includes/left-sidebar.php') ?>
				<main>
					<table style="font-size: 18px; border:1px solid #ddd;padding-bottom:70px; border-collapse: collapse;">
						<tr>
							<th>SID</th>
							<th>FULL NAME</th>
							<th>DATE OF BIRTH</th>
							<th>Gender</th>
							<th>Department</th>
							<th>PROFILE</th>
						</tr>
						<?php while($student = $sql_query->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $student['id']; ?></td>
							<td><?php echo $student['first_name']." ".$student['last_name']; ?></td>
							<td><?php echo $student['date_of_birth']; ?></td>
							<td><?php echo $student['gender'] == 'F' ? "Female":"Male"; ?></td>
							<td><?php echo $student['department_id']; ?></td>
							<td><a href="update.php?student_id=<?php echo $student['id']; ?>">Update Student-Infor</a></td>
						</tr>
						<?php } ?>
					<h2>Update Student-Info: <?php echo $sql_query->num_rows; ?></h2>
					</table>
				</main>
			</div>
		</div>
		<?php include('includes/footer.php') ?>
	</body>
</html>