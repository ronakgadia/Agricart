<?php
	include('../configure.php');
	session_start();
	$error=$emailErr="";
	
	if(isset($_POST['loginbtn']))
	{
		$myemail = $_POST['email'];
		$mypassword = $_POST['psw'];
		
		
		if (empty($myemail)) { 	
			$emailErr = "Email is required"; $error++;
		}
		else {
			if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; $error++;
			}
		}
		
		if($myemail="admin@gmail.com" && $psw="admin123"){
			header('location:feedback.php');
		}
		else {
			$error .= "Your Email/Phone Number or Password is invalid";
		}
	}
?>

<html>
	<title>Agricart LogIn</title>
<head>
<style>
	body {
		background-image: url("images/vegetables.jpg");
		background-size:cover;
		background-color:#aee147;
	}
	
	.display-logo {
		margin-top:-8px;
		margin-left:42%;
		float:center;
		position: center;
	}
	
	.mainbox {
		background-color:#ffffff;
		margin-left:37%;
		margin-right:37%;
		margin-top:15px;
		border:1px solid #DDDDDD;
		padding:0px 25px;
		width:26%;
		height:65%;
		border-radius:10px;
	}
	
	.titlelogin {
		display:block;
		margin-top: 15px;
		margin-bottom: 10px;
		font-size: 25px;
		font-weight: bold;
		text-align:center;
		color:#0096FF;;
	}
	
	input[type="text"], input[type="password"]  {
		width: 100%;
		padding: 5px 10px;
		margin: 5px 0;
		display: inline-block;
		border: 1px solid #D9D9D9;
		box-sizing: border-box;
		border-radius:5px;
		font-family:Arial;
	}
	
	label {
		font-family:Arial;
		font-weight:550;
	}
	
	.login-button {
		width:100%;
		padding:5px 0px;
		text-align:center;
		background-color:#0096FF;
		border-color:#0086E5;
		border-radius:5px;
		color:white
	}
	.login-button:hover {
		background-color:#007ACE;
	}
	a {
		text-decoration:none;
	}
	a:hover {
		text-decoration:underline;
	}
	#loginstyle {
		text-align:center;
	}
	
	.container {
		margin-top:20px;
	}
	
	.txt1 {
		font-family: OpenSans-Regular;
		font-size: 15px;
		line-height: 1.4;
		color: #999999;
	}
	.txt2 {
		font-family: OpenSans-Regular;
		font-size: 15px;
		line-height: 1.4;
		color: #0096FF;
	}
	
	.bottom {
		display:block;
		text-align:center;
		padding-top:30px;
	}
</style>
</head>

<body>
<div >
<img src="images/AGRICART.png" class="display-logo">
</div>
<div class="mainbox">
	<span class="titlelogin">Admin Login</span>
	<form action="" method="post">
	<div class="container">
		<label for="email">Enter Email</label>
		<input type="text" placeholder="Enter Email or Phone Number" name="email" required>
		<span class = "error"><?php echo $emailErr;?></span><br><br><br>
		<label for="psw">Password</label>
		<input type="password" placeholder="Enter Password" name="psw" required><br><br><br>
		<label>

		<span style="color:red;font-size:15px;"><?php echo $error; ?></span>
		<br><br>
        <input type="submit" value="Login" name='loginbtn' class="login-button">	
    </div>
	</form>
	
</div>
</body>
</html>