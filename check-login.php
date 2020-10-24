<?php
if(!isset($_SESSION['loggedin'])) {
	
	Header('Location: login.php');

}

?>