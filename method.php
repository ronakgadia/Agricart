<?php
	include('configure.php');
	session_start();
	
	if(isset($_POST['feedback'])) {
		if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
			header('location:login.php');
		}	
		$user_id = $_SESSION['user_id'];
		$feedback = $_POST['fname'];
		echo $feedback;
		$query = "INSERT INTO request_feedback (feedback,customer_id) VALUES ('$feedback','$user_id')";
		$result = mysqli_query($connect,$query);
		if($result) {
			//echo "comment requested";
			header('location:index.php');
			?> <script> alert('Your feedback has been recorded'); </script> <?php
		}
		else {
			echo "failed";
		}
	}
	
	if(isset($_POST['addaddress'])) {
		$user_id = $_SESSION['user_id'];
		$uname = mysqli_real_escape_string($connect,$_POST['uname']);
		$mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
		$street = mysqli_real_escape_string($connect,$_POST['street']);
		$pincode = mysqli_real_escape_string($connect,$_POST['pincode']);
		$city = mysqli_real_escape_string($connect,$_POST['city']);
		$state = mysqli_real_escape_string($connect,$_POST['state']);
		$district = mysqli_real_escape_string($connect,$_POST['district']);
		
		$query = "INSERT INTO user_address(customer_id,state,district,pincode,street_address,name,mobile_no,city) VALUES('$user_id','$state','$district','$pincode','$street','$uname','$mobile','$city')";
		$result = mysqli_query($connect, $query);
		header('location:order_summary.php');
	}
	
	if(isset($_POST['cart'])) {
		if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
		header('location:login.php');
		}
		else {
		header('location:cart.php');
		}
	}
?>