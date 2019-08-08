<?php
	include('configure.php');
	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
		header('location:login.php');
	}
	
	$user_id = $_SESSION['user_id']; 
	$error = 0;
	if(isset($_POST['submit']))
	{
		$uname = mysqli_real_escape_string($connect,$_POST['uname']);
		$fathername = mysqli_real_escape_string($connect,$_POST['fathername']);
		$selectsubsidy = mysqli_real_escape_string($connect,$_POST['selectsubsidy']);
		$amount = mysqli_real_escape_string($connect,$_POST['amount']);
		$receiptid = mysqli_real_escape_string($connect,$_POST['receiptid']);
		//$receiptfile = mysqli_real_escape_string($connect,$_POST['receiptfile']);
		//$landfile = mysqli_real_escape_string($connect,$_POST['landfile']);
		$accountnumber = mysqli_real_escape_string($connect,$_POST['accountnumber']);
		$bankname = mysqli_real_escape_string($connect,$_POST['bankname']);
		$ifsc = mysqli_real_escape_string($connect,$_POST['ifsc']);
		$district = mysqli_real_escape_string($connect,$_POST['district']);
		$state = mysqli_real_escape_string($connect,$_POST['state']);
		$zip = mysqli_real_escape_string($connect,$_POST['zip']);
		$landmark = mysqli_real_escape_string($connect,$_POST['landmark']);
		$mobile = mysqli_real_escape_string($connect,$_POST['mobile']);
		$email = mysqli_real_escape_string($connect,$_POST['email']);
		
		$error = 0;	
		//  RECEIPT FILE
		$target_dir = "uploadreceipt/";
		$target_file = $target_dir.basename($_FILES["receiptfile"]["name"]);
		$receiptfile = $target_file;
		$uploadOK = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		$check = getimagesize($_FILES["receiptfile"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			?><script>
				alert('File is not an image');
				</script><?php
			$uploadOk = 0;
		}
	
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["receiptfile"]["tmp_name"], $target_file)) {
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		//  RECEIPT FILE
		
		
		// LAND FILE
		$target_dir = "uploadland/";
		$target_file = $target_dir.basename($_FILES["landfile"]["name"]);
		$landfile = $target_file;
		$uploadOK = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		$check = getimagesize($_FILES["landfile"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			?><script>
				alert('File is not an image');
				</script><?php
			$uploadOk = 0;
		}
	
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["landfile"]["tmp_name"], $target_file)) {
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		// LAND FILE
		
		if ($error == 0) {
			$query = "INSERT INTO request_subsidy (customer_id,name,father_name,receipt_id,receipt_file,land_file,account_no,bank_name,ifsc,district,state,zip,landmark,mobile,email,subsidy,amount) VALUES ('$user_id','$uname','$fathername','$receiptid','$receiptfile','$landfile','$accountnumber','$bankname','$ifsc','$district','$state',$zip,'$landmark',$mobile,'$email','$selectsubsidy',1000)";
			$result = mysqli_query($connect,$query);
			echo $query;
			if($result)
			{
				?><script> alert('Successfully applied for Subsidy')</script><?php
				header('location:index.php');
			}
			else {
				?><script>alert('File in the details correctly');</script><?php
			}
		}
	}
?>

<html>
	<title>Agricart Sign Up</title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
		margin-left:27%;
		margin-right:37%;
		margin-top:15px;
		border:1px solid #DDDDDD;
		padding:0px 25px;
		margin-bottom:20px;
		width:45%;
		min-height:800px;
		border-radius:10px;
	}
	
	.titlelogin {
		display:block;
		margin-top: 15px;
		margin-bottom: 10px;
		font-size: 28px;
		font-weight: bold;
		text-align:center;
		color:#0096FF;;
	}
	
	input[type="text"], input[type="password"]  {
		width: 100%;
		padding: 5px 10px;
		margin: 5px 0 15px 0;
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
	
	.error {
		color:red;
		font-size:15px;
	}
</style>
</head>

<body>
<div >
<img src="images/AGRICART.png" class="display-logo">
</div>
<div class="mainbox">
	<span class="titlelogin">Subsidy Form</span>
	<form action="subsidyform.php" method="post" enctype="multipart/form-data">
	<div class="container">
	
		<!--<label for="uname">Username</label>
		<input type="text" placeholder="Enter Username" name="uname">
		<span class = "error"><?php /*echo*/ $nameErr;?></span><br>-->
	  <div class="form-row">
		<div class="form-group col-md-6">
		<label for="uname">Name</label>
		<input type="text" placeholder="Enter account holder name" name="uname">
    	</div>
		
    	<div class="form-group col-md-6">
		<label for="fathername">Father's name</label>
		<input type="text" placeholder="Enter you father's name" name="fathername">
    	</div>
		
  	  </div>

	  <div class="form-row">
		<div class="form-group col-md-8">
 		<div class="form-group">
    		<label for="exampleFormControlSelect1">Select Subsidy</label>
    		<select class="form-control" id="exampleFormControlSelect1" name="selectsubsidy">
      		<option>Tractor</option>
      		<option>Threser</option>
      		<option>Cultivator</option>
      		<option>Sprinkler Pipes</option>
      		<option>Diesel Pump</option>
    		</select>
  		</div>
    	</div>

    	<div class="form-group col-md-4">
		<label for="amount">Subsidy amount</label>
		<input class="form-control" style="margin-top:-0px;" type="text" placeholder="1000" readonly name="amount">
		<br>
    	</div>
  	  </div>

	  <div class="form-row">
		<div class="form-group col-md-6">
		<label for="receiptid">Receipt ID</label>
		<input type="text" placeholder="Enter Receipt ID" name="receiptid">
		<br>
    	</div>
    	<div class="form-group col-md-6">
		<label for="receiptfile">Receipt File</label>
  		<div class="custom-file">
    	<input type="file" class="custom-file-input" required name="receiptfile">
    	<label class="custom-file-label" style="margin-top: 3px;" for="receiptfile">Choose file...</label>
  		</div>
    	</div>
  	  </div>

		<div class="form-group col-md-12">
		<label for="landfile">Land File</label>
  		<div class="custom-file">
    	<input type="file" class="custom-file-input" required name="landfile">
    	<label class="custom-file-label" for="la">Choose file...</label>
  		</div>
		</div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="accountnumber">Account Number</label>
      <input type="text" class="form-control" name="accountnumber" placeholder="Account Number" required>
    </div>
    <div class="form-group col-md-4">
      <label for="bankname" >Bank Name</label>
      <input type="text" class="form-control" name="bankname" placeholder="Eg.SBI" required>

    </div>
    <div class="form-group col-md-4">
      <label for="ifsc" >IFSC Code</label>
      <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="district" >District</label>
      <input type="text" class="form-control"  name="district" placeholder="District" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="state" >State</label>
      <input type="text" class="form-control" name="state" placeholder="State" required>

    </div>
    <div class="col-md-3 mb-3">
      <label for="zip" >Zip</label>
      <input type="text" class="form-control" name="zip" placeholder="Zip" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="landmark" >Landmark</label>
      <input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="mobile" >Mobile</label>
      <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
    </div>
    <div class="col-md-3 mb-3">
 		<label for="email">Email</label>
		<input type="text" placeholder="Enter Email" name="email">
		<br>
    </div>
  </div>
        <input type="submit" name="submit" value="Apply for Subsidy" class="login-button"></input>
    </div>
	<br>
	</form>

</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>