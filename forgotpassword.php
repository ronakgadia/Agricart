<?php
	include('configure.php');
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require '../composer/vendor/autoload.php';
	
	if(isset($_POST['submit']))
	{
		$myemail = $_POST['email'];
		if(!filter_var($myemail,FILTER_VALIDATE_EMAIL)) { 
			$error = 'Please enter a valid email address';
		}
		$error="";
		$sql = "SELECT * FROM register WHERE email='$myemail'";
		$result = mysqli_query($connect,$sql);
		$check = mysqli_num_rows($result);
		if($check==0) {
			$error = "Your email doesn't exists in our record";
		}
		
		if(!$error) {
			$query = "SELECT * FROM register WHERE email='$myemail' ";
			$result = mysqli_query($connect,$query);
			$row = mysqli_fetch_array($result);
			
			$password = substr(md5(uniqid(rand(),1)),3,10);
			$pass = md5($password);
		
			
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			
				//Server settings
				//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'agricartinfo@gmail.com';                 // SMTP username
				$mail->Password = 'dbmslabproject';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to
				$mail->SMTPOptions = array(
								'ssl' => array(
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
								)
							);
				//Recipients
				$mail->setFrom('support@agricart.com', 'Agricart');
				$mail->addAddress($myemail);     // Add a recipient
				//$mail->addAddress('ellen@example.com');               // Name is optional
				//$mail->addReplyTo('info@example.com', 'Information');
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');

				//Attachments
				//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

				//Content
				$password = substr(md5(uniqid(rand(),1)),3,10);
				$pass = md5($password);
				
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'New Password Details';
				$mail->Body    = "<html><body>Dear ".$row['username'].",<br>
									Your password has been reset<br>
									Your Login Details are as follows:<br><br>
									
									<b>Email:<b> ".$row['email']."<br>
									<b>Mobile Number:<b> ".$row['mobile_no']."<br>
									<b>Password:<b> ".$password."<br><br>

									Password can be reset from the change password icon.<br>
									NOTE: This is an auto generated mail. Please do not reply to this mail.<br><br>
									
									Warm Regards,<br>
									Customer Care,<br>
									Agricart<br>
									</body></html>";
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				?> <script> alert('Password has been sent to your Email-Id');</script><?php
				$sql = "Update register SET password='$pass' where email='$myemail'";
				mysqli_query($connect,$sql);
		}
	}
?>

<html>
	<title>Agricart LogIn</title>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

	.font{
	width: 200px;
	margin: auto;
	font-size: 19px;
	color: #9C9DAB;
	}
	.centered{
		text-align: center;
		margin-bottom: 60px;
	}
	.justified{
		text-align: justify;
		margin-bottom: 20px;
	}

</style>
</head>

<body>
<div >
<img src="images/AGRICART.png" class="display-logo">
</div>
<div class="mainbox">
	<span class="titlelogin">Forgot Password?</span>
	<form action="" method="post">
	<div class="container">
		<br>
		<label for="email">Enter Email Address</label>
		<input type="text" placeholder="Enter email address" name="email" required><br><br>
		<span style="color:red;font-size:15px;"></span><br>
       <!--<input type="submit" value="SEND RESET LINK" name='loginbtn' class="login-button">-->


<!-- Button trigger modal -->
<!--<input type="submit" value="SEND RESET LINK" class="login-button" data-toggle="modal" data-target="#exampleModal">-->
<input type="submit" class="login-button" value="Send New Password" name="submit"></input>
	<br><br>
	<p class="font justified">
			We will send you a new password.	
		</p>
<!-- Modal -->
<!--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Mail has been sent successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
-->

	</div>
	</form>
		<div class="bottom">
		<span class="txt1">Go to Login?</span>
		<a href="login.php" class="txt2">Log In</a>
		</div>
	
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>