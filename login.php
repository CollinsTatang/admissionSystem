<?php
include('config.php');
	$error = "";
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT username, password FROM user WHERE username='$username' AND password='$password'";
		$query = mysqli_query($con, $sql) or die(mysqli_error());
		if($query->num_rows > 0){
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['username'] = $username;
			Header('Location: index.php');
		} else {
			$error =  "This user does not exist!";
		}
	}

?>
<!doctype html>
<html>
	<head>
		<title>NPUI</title>
		<link rel="stylesheet" href="assets/css/style.css"/>
		<style type="text/css">
			
.myButton {
	box-shadow: 0px 0px 0px 2px #9fb4f2;
	background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
	background-color:#7892c2;
	border-radius:10px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:19px;
	padding:12px 37px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
	&:hover {
	background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
	background-color:#476e9e;
}
 &:active {
	position:relative;
	top:1px;
}
 }
		</style>
	</head>
	<body style="background-color: #e1ffff;">
		<div class="container">
			<div class="login-box">
				<div style="font-size: 30px; color: black; font-weight: bold;">LOGIN TO NATIONAL POLYTECHNIC UNIVERSITY INSTITUTE BAMENDA <b>
					ADMISSION SYSTEM
				</b></div>
				<p style="color:red"><?php echo $error; ?></p>
				<div class="login-form">
					<form method="post">
						<input type="text" name="username" placeholder="Enter username" />
						<input type="password" name="password" placeholder="Enter password" />
						<input class="myButton" type="submit" value="Login" name="submit" />
					</form>
				</div>
			</div>
		</div>
		<?php include('includes/footer.php') ?>
	</body>
</html>