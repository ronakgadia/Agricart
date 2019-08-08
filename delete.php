<?php
	include('configure.php');
	
	if(isset($_GET['id'])) {
		$cart_id = $_GET['id'];
		$query = "DELETE FROM cart where cart_id='$cart_id'";
		mysqli_query($connect,$query);
	}
	header('location:cart.php');
?>