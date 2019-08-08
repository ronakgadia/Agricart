<?php
include('configure.php');

$product_id = $_SESSION['product_id'];
$user_id = $_SESSION['user_id'];

	if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
		header("location:login.php");
	}else {
		$sql = "INSERT INTO cart(register_id,product_id,quantity) VALUES ($user_id,$productid,1)";
		$resukt = mysqli_query($connect, $sql);
		header("location:cart.php");
	}
?>