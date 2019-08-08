<?php
	include('configure.php');
	session_start();
	
	$user_check = $_SESSION['username'];
	
	$result = mysqli_query($connect,"SELECT * from register where username = '$user_check' ");
				   
	$row = mysqli_fetch_array($result);
	$user_email = $row['register_id'];
	$user_email = $_SESSION['user_id'];
	$login_session = $_SESSION['username'];
				   
	if(!isset($_SESSION['username'])){
		header("location:index.php");
				   }

?>