<?php 
include('config.php');
include('check-login.php');

$selected_faculty_id = null;
$department = null;

if(isset($_GET['faculty_id'])){
	$faculty_id = $_GET['faculty_id'];
	$selected_faculty_id = $faculty_id;

	$sql_deparment = "SELECT * FROM department WHERE faculty_id='$faculty_id' ";
	$query_department = mysqli_query($con, $sql_deparment) or die(mysqli_error($con));
	$department = $query_department->num_rows;
}

die($selected_faculty_id);

// Get the faculties
$sql_faculty = "SELECT * FROM faculty";
$query_faculty = mysqli_query($con, $sql_faculty) or die(mysqli_error($con));

// Get form data
if(isset($_POST['submit'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$pob = $_POST['pob'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	//$faculty_id = $_POST['faculty_id'];
	$department_id = $_POST['department_id'];

	$sql_insert_student = "INSERT INTO student (
			first_name,
			last_name,
			date_of_birth,
			place_of_birth,
			gender,
			phone_number,
			email,
			address,
			department_id
			)VALUES(

			'$first_name',
			'$last_name',
			'$dob',
			'$pob',
			'$gender',
			'$phone_number',
			'$email',
			'$address',
			'$department_id'
			)";

	mysqli_query($con, $sql_insert_student) or die(mysqli_error($con));
	header('Location: admission-list.php');

}


?>
<!doctype html>
<html>
	<header>
		<title>NPUI</title>
		<link rel="stylesheet" href="assets/css/style.css"/>
	</header>
	<body>
		<?php include('includes/header.php') ?>
		<div class="container">
			<div>
				<?php include('includes/left-sidebar.php') ?>
				<main>
					<form method="post" action="">
						<fieldset>
							<legend>Students Information</legend>
						Faculty:
						 <select onchange="getDepartments(this.value)" name="faculty_id" required>
							<?php 
								while($faculty = $query_faculty->fetch_assoc()){ ?>
									<option value="<?php echo $faculty['id']; ?>" <?php echo $selected_faculty_id == $faculty['id'] ? 'selected':"";  ?>><?php echo $faculty['name'];?></option>
							<?php } ?>
						</select>
						Department: 
						<select name="department_id" required>
							<?php 
								if($department > 0) {
								while($department = $query_department->fetch_assoc()){ ?>
									<option value="<?php echo $department['id']; ?>"><?php echo $department['name'];?></option>
							<?php } } ?>
						</select>
						<input type="text" name="first_name" placeholder="First Name" required>
						<input type="text" name="last_name" placeholder="Last Name" required>
						Date of Birth: 
							<input type="date" name="dob" placeholder="Date of Birth" required>
						<input type="text" name="pob" placeholder="Place of Birth" required>

						Gender: 
						<input type="radio" name="gender" value="Female" width="120px" required>Female
						<input type="radio" name="gender" value="Male" width="120px" required> Male
						<input style="margin-top:10px" type="number" name="phone_number" placeholder="Phone Number" required>
						<input type="email" name="email" placeholder="Email" required>
						<input type="text" name="address" placeholder="Address" required>
						

						<br>

						<input type="submit" name="submit" value="Submit" />
						</fieldset>
					</form>
				</main>
				<div class="clear-fix"></div>
			</div>
		</div>
		<?php include('includes/footer.php') ?>

	<script type="text/javascript">
			function getDepartments(faculty_id){
				//alert(faculty_id);
				window.location.href = "new-student.php?faculty_id="+faculty_id;
			}

		</script>
	</body>
</html>