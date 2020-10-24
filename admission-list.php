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
					<table border="1" style="font-size: 15px; border:1px solid #ddd;padding-bottom:70px; border-collapse: collapse;">
						<tr>
							<th></th>
							<th>FULL Name</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Place of Birth</th>
							<th>Phone #</th>
							<th>Email</th>
							<th>Address</th>
							<th>Department</th>
							
						</tr>
						<?php while($student = $sql_query->fetch_assoc()){ ?>
							<tbody>
						<tr>
							<td></td>
							<td><?php echo $student['first_name']." ".$student['last_name']; ?></td>
							<td><?php echo $student['date_of_birth']; ?></td>
							<td><?php echo $student['gender'] == 'F' ? "Female":"Male"; ?></td>
							<td><?php echo $student['place_of_birth']; ?></td>
							<td><?php echo $student['phone_number']; ?></td>
							<td><?php echo $student['email']; ?></td>
							<td><?php echo $student['address']; ?></td>
							<td><?php echo $student['department_id']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
					<h2>Number of students admitted: <?php echo $sql_query->num_rows; ?></h2>
					</table>
				</main>
			</div>
		</div>
		<?php include('includes/footer.php') ?>
		<script type="text/javascript">
			var table = document.getElementsByTagName('table')[0],
  rows = table.getElementsByTagName('tr'),
  text = 'textContent' in document ? 'textContent' : 'innerText';

for (var i = 0, len = rows.length; i < len; i++) {
  rows[i].children[0][text] = i + ' ' + rows[i].children[0][text];
}
		</script>
	</body>
</html>

