<?php
	if(isset($_POST['edit'])) {
		header('location:editprofile.php');
	}
	
	include('header.php');
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
		header("location:login.php");
	}
	
	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM register WHERE register_id=$user_id";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($result);
	$mobileno = $row['mobile_no'];
	
	$query = "SELECT * FROM user_address WHERE register_id=$user_id ";
	$result = mysqli_query($connect,$query);
	if(!empty($result)) {
	$address = mysqli_fetch_array($result);
	}
	
	if(isset($_POST['submit']))
	{
		$target_dir = "profilephoto/";
		$target_file = $target_dir.basename($_FILES["filetoUpload"]["name"]);
		$uploadOK = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		$check = getimagesize($_FILES["filetoUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			?><script>
				alert('File is not an image');
				</script><?php
			$uploadOk = 0;
		}
	
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["filetoUpload"]["size"] > 1200000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["filetoUpload"]["tmp_name"], $target_file)) {
				?> <script> alert("The file ". basename( $_FILES["filetoUpload"]["name"]). " has been uploaded."); </script> <?php
				$query = "UPDATE register SET image_path='$target_file' WHERE register_id=$user_id";
				mysqli_query($connect,$query);
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	
	if(empty($row['image_path'])) { $profilepicture = 'profilephoto/defaultpicture.jpg'; }
	else { $profilepicture = $row['image_path']; }
							
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Light UI &middot; 
      
    </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    
      <link href="assets/css/toolkit-light.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phonesaccount.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
        background-color:#f1f3f6; 
      }

      .border{
        width: 300px;
      }

      .cards {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      width: 100px;
      height: 122px;
      margin: auto;
      text-align: center;
      font-family: arial;
      margin-left: 10px;
      margin-top:8px;
	  }

          .heading {
        background-color:#ffffff;
        width:100%;
        height:80px;
      }
      
      .display-logo {
        margin-top:-8px;
        margin-left:42%;
        float:center;
        position: center;
      }

		.myprofilephoto {
			margin-left:25px;
			width:74%;
			height:150px;
			margin-top:18px;
			border-radius:50%;
		}
		
		.myprofilephoto2 {
			width:100%;
			border-radius:50%;
			backface-visibility:hidden;
			transition: .5s ease;
		}
		
		.myprofilephoto:hover .file {
			opacity:1;
		}
		
		.myprofilephoto:hover .myprofilephoto2 {
			opacity:0.3;
		}
		
		.myprofilephoto .file {
			position: relative;
			overflow: hidden;
			margin-top: -30px;
			margin-left:18px;
			width: 75%;
			border: none;
			border-radius: 0;
			font-size: 15px;
			background: #212529b8;
			padding:10px 0;
			border-radius:100%;
		}
		.myprofilephoto .file input {
			position: absolute;
			opacity: 0;
			right: 0;
			top: 0;
		}
    </style>
  </head>


<body>

  <div class="container" style="margin:20px 0 0 110px;;max-width:90%;">
    <div class="row">
      <div class="col-md-3 sidebar" style="background-color:white;margin-right:20px;">

        <nav class="sidebar-nav" style="margin-left:35px;margin-top:40px;">
          <div class="sidebar-header">
				<form action="profile.php" method="post" enctype="multipart/form-data">
				<div class="myprofilephoto">
					<img class="myprofilephoto2" src="<?php echo $profilepicture; ?>">
					<div class="file btn btn-lg btn-primary">
                        Change Photo
                    <input type="file" name="filetoUpload"/>
					<input type="submit" name="submit">
                    </div>
				</div>
				</form>
          </div>
	
	
          <div class="collapse nav-toggleable-md" id="nav-toggleable-md" style="font-size:120%;padding-left:30px">

            <ul class="nav nav-pills nav-stacked flex-column">
              <li class="nav-item">
                <a class="nav-link margin" href="orderhistory.php"><strong>Order history</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="subsidy.php"><strong>Subsidy</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link "href="#"><strong>Wishlist</strong></a>
              </li>

              <li class="nav-header">More</li>
            </ul>
    <!--        <hr class="visible-xs mt-3">  -->
          </div>
		</nav>
      </div>
	  
	  
      <div class="col-md-8 content" style="background-color:white;padding:50px 90px 90px 90px;">
        <div class="dashhead">
  <div class="dashhead-titles">
    <h2 class="dashhead-title" style="color: #5ACA00;">Personal Info</h2>
  </div>

</div>

<hr class="mt-3">
  
<form action="profile.php" method="post">
    <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;font-weight: bold;margin-left:-15px;">Name:</label>
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php echo $row['username']; ?>">
	<input type="submit" value="Edit" class="btn btn-primary" style="float: right;margin-top: -40px;" name="edit">
	<hr>
  
	<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;font-weight: bold;margin-left: -15px;">E-mail:</label>
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php echo $row['email']; ?>">
	<input type="submit" value="Edit" class="btn btn-primary" style="float: right;margin-top: -40px;" name="edit">
	<hr>
   
	<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;font-weight: bold;margin-left: -15px;">Mobile:</label>
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php echo $row['mobile_no']; ?>">
	<input type="submit" value="Edit" class="btn btn-primary" style="float: right;margin-top: -40px;" name="edit">
	<hr>
   
	<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;font-weight: bold;margin-left: -15px;">Password:</label>
		<input type="password" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="password">
	<input type="submit" value="Edit" class="btn btn-primary" style="float: right;margin-top: -40px;" name="edit">
	<hr>
   
	<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 20px;font-weight: bold;margin-left: -15px;">Address:</label>
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php if(!empty($result)){ echo $address['street_address'];} else { echo "Street";} ?>">
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php if(!empty($result)){ echo $address['city'];} else { echo "City";} ?>">
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php if(!empty($result)){ echo $address['state'];} else { echo "State";} ?>">
		<input type="text" readonly class="form-control-plaintext" id="staticEmail" style="font-size: 20px;" value="<?php if(!empty($result)){ echo $address['pincode'];} else { echo "Pincode"; }?>">
	<input type="submit" value="Edit" class="btn btn-primary" style="float: right;margin-top: -40px;" name="edit">
	<hr>

</form>

<div class="hr-divider mt-5 mb-3" >
  <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
</div>

<div class="row statcards containers">
  <div class="border" style="margin-left: 12px">
    <div class="statcard statcard-success">
      <div class="p-3">
        <span class="statcard-desc">Orders</span>
        <h2 class="statcard-number">
          1,293
          <!--<small class="delta-indicator delta-positive">5%</small>-->
        </h2>
        <hr class="statcard-hr mb-0">
      </div>
      <canvas id="sparkline1" width="378" height="94"
        class="sparkline"
        data-chart="spark-line"
        data-dataset="[[28,68,41,43,96,45,100]]"
        data-labels="['a','b','c','d','e','f','g']"
        style="width: 189px; height: 47px;"></canvas>
    </div>
  </div>
  <div class="border" style="margin-left:15px;">
    <div class="statcard statcard-danger">
      <div class="p-3">
        <span class="statcard-desc">Subsidies</span>
        <h2 class="statcard-number">
          758
          <!--<small class="delta-indicator delta-negative">1.3%</small>-->
        </h2>
        <hr class="statcard-hr mb-0">
      </div>
      <canvas id="sparkline1" width="378" height="94"
        class="sparkline"
        data-chart="spark-line"
        data-dataset="[[4,34,64,27,96,50,80]]"
        data-labels="['a','b','c','d','e','f','g']"
        style="width: 189px; height: 47px;"></canvas>
    </div>
  </div>
 </div>


</div>
</div>
</div>
<br class="mt-5">
<br>

<footer class="footer-distributed footer-space" style="margin-bottom: -50px;" >

      <div class="footer-left" style="margin-left: 50px;">
        <img src="images/AGRICART.png" class="display-logo1">

        <p class="footer-links">
          <a href="#">Home</a>
          <a href="#">Farming Tip</a>
          <a href="#">About us</a>
          <a href="#">Contact Us</a>
        </p>

        <p class="footer-company-name">All rights reserved &copy;2018</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>JLN Marg,Malaviya Nagar</span> MNIT Jaipur</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>9852693886</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:2015ucp1551@mnit.ac.in">2016ucp1369@mnit.ac.in</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the AgriCart</span>
          Database Project from SRS Company. 
          </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>

        </div>

      </div>

    </footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/tablesorter.min.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>
</html>

