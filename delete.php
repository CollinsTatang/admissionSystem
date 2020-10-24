<?php
include('config.php'); 

if(!empty($_POST['submit'])){
    $stuID = $_POST['sid'];
    $sql = "DELETE FROM student where id='$stuID'";
    $success = mysqli_query($con,$sql);
    if(!$success) {
        die('Could not enter data:'.mysql_error());
    }
    
    $message= "Successfully Deleted. ID: ".$stuID;
    echo '<script type="text/javascript">alert("'.$message.'");</script>';
    echo "\n";
}
?>
<!DOCTYPE html>
<html>
<head><title>Delete Student</title>
 <link rel="stylesheet" href="assets/css/style.css"/>
<style>

div {
    border-radius: 5px;
    padding: 20px;   
}

.myButton {
    background-color:#44c767;
    border-radius:28px;
    border:1px solid #18ab29;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:17px;
    padding:16px 31px;
    text-decoration:none;
    text-shadow:0px 1px 0px #2f6627;
    &:hover {
    background-color:#5cbf2a;
}
 &:active {
    position:relative;
    top:1px;
}
 }

</style>
</head>
<body>
    <?php include('includes/header.php') ?>
    <?php include('includes/left-sidebar.php') ?>
   <center> <h1>DELETE STUDENT</h1> </center>
   
<form action="#" method="post" enctype="multipart/form-data">
    <div>
        <center>
            Enter Student ID: 
            <input type="text" name="sid">
            <input class="myButton" type="submit" name="submit">
        </center>
    </div>
</body>
</html>
