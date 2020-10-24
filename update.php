<?php
	include('config.php');
	include('check-login.php');

	if(isset($_GET['student_id'])){
		$student_id =  $_GET['student_id'];
		$sql = "SELECT * FROM student WHERE student.id='$student_id'";
		$query = mysqli_query($con, $sql) or die(mysqli_error());
		$student = $query->fetch_assoc();
		//print_r($student);
	}
	if(isset($_POST['update'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$pob = $_POST['pob'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$sql_update_student = "UPDATE student SET first_name = $first_name, last_name = $last_name,
	date_of_birth = $dob, place_of_birth = $pob, gender = $gender, phone_number = $phone_number,  
    email = $email, address = $address WHERE student.id= $student_id";
			
	mysqli_query($con, $sql_update_student) or die(mysqli_error($con));
	$student = $sql_update_student->fetch_assoc();
}
?>
<!doctype html>
<html>
	<head>
		<title>Update Student - <?php echo $student['first_name']." ".$student['last_name']; ?></title>
		<link rel="stylesheet" href="assets/css/style.css"/>
	</head>
	<body>
		<?php include('includes/header.php') ?>
		<div class="container">
			<div>
				<?php include('includes/left-sidebar.php') ?>
				<main class="student-info">
					<h1>Update Student-Info: <?php echo $student['first_name']." ".$student['last_name']; ?></h1>
					<table>
						<tr>
							<td>ID:</td><td><?php echo $student['id']; ?></td>
						</tr>
						<tr>
							<td>First Name:</td><td><input type="text" name="first_name" value="<?php echo $student['first_name']; ?>"></td>
						</tr>
						<tr>
							<td>Last Name:</td><td><input type="text" name="last_name" value="<?php echo $student['last_name']; ?>"><tr>
						</tr>
						<tr>
							<td>Date of Birth:</td><td><input type="date" name="dob" value="<?php echo $student['date_of_birth']; ?>"><tr>
						</tr>
						<tr>
							<td>Gender:</td><td><input type="text" name="gender" value="<?php echo $student['gender']; ?>"><tr>
						</tr>
						<tr>
							<td>Place of Birth:</td><td><input type="text" name="pob" value="<?php echo $student['place_of_birth']; ?>"><tr>
						</tr>
						<tr>
							<td>Phone Number:</td><td><input type="text" name="phone_number" value="<?php echo $student['phone_number']; ?>"><tr>
						</tr>
						<tr>
							<td>Email:</td><td><input type="email" name="email" value="<?php echo $student['email']; ?>"><tr>
						</tr>
						<tr>
							<td>Address:</td><td><input type="text" name="address" value="<?php echo $student['address']; ?>"><tr>
						</tr>						
					</table>
					<input type="submit" name="update">
				</main>
			</div>
		</div>
		<?php include('includes/footer.php') ?>
	</body>
</html>