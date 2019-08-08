<?php
	include('../configure.php');
	
	$query = "SELECT * FROM request_subsidy INNER JOIN register ON register.register_id=request_subsidy.customer_id";
	$result = mysqli_query($connect,$query);
	$pcount = mysqli_num_rows($result);
	$count = 0;
	$output = '';
	if($pcount > 0)
	{
		$count++;
		while($row = mysqli_fetch_array($result))
		{
			$username = $row['username'];
			$fathername = $row['father_name'];
			$subsidy = $row['subsidy'];
			$receiptid = $row['receipt_id'];
			$landfile = $row['land_file'];
			$name = $row['name'];
			$accountno = $row['account_no'];
			$bankname = $row['bank_name'];
			$landmark = $row['landmark'];
			$district = $row['district'];
			$state = $row['state'];
			$zip = $row['zip'];
			
			
			$output .= '<tr class="font">
						  <th>'.$count.'</th>
						  <td>'.$username.'</td>
						  <td>'.$fathername.'</td>
						  <td>'.$subsidy.'</td>
						  <td><p>'.$receiptid.'</p></td>
						  <td>'.$landfile.'</td>
						  <td><p>'.$accountno.'</p><p>'.$name.'</p><p>'.$bankname.'</p></td>
						  <td><p>'.$landmark.'</p><p>'.$district.'</p><p>'.$state.'</p><p>'.$zip.'</p></td>
						  <td>
							<div class="btn-group" role="group" aria-label="Basic example">
							<form action="method.php" method="POST"><button type="submit" name="approve" value="'.$receiptid.'" class="btn btn-success">Approve</button></form>
							<form action="method.php" method="POST"><button type="submit" name="decline" value="'.$receiptid.'" class="btn btn-danger">Decline</button></form>
							</div>
						  </td>
						  </td>
						</tr>
						';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Agricart Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">

    <!-- The styles -->
    <!--<link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">-->

    <link href="css/charisma-app.css" rel="stylesheet">

    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>

   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">

  <style>
            .heading {
                background-color:#ffffff;
                width:100%;
                height:70px;
            }
            .display-logo {
                margin-top:-18px;
                margin-left:42%;
                float:center;
                position: center;
            }
            .active {
                background-color:#563D7C;
            }
            .font{
                font-weight: bold;
                font-size: 15px;
                color: #0096FF;
            }
            .margin{
                float:center;
                position: center;
            }
 </style>   
</head>

<body>

<div class="heading">
    <img src="images/AGRICART.png" class="display-logo">
</div>
<div  style="margin: auto; height: 70px;background-color:#0096FF;">
  <a class="navbar-brand" style="float: left;margin-left: 100px;margin-top: 18px;font-weight: 120%;font-size: 120%;">Welcome Admin</a>
  <div style="float: right;margin-right: 150px;margin-top: 18px;">
    <a href="index.php"><button type="button" class="btn btn-dark" style="width: 150%;">Logout</button></a>
    </div>
</div>  
    <!-- topbar ends -->

<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">   
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <div id="content" class="col-lg-10 col-sm-10" >
            <!-- content starts -->
            <div>
<br>
<br>
</div>
<div class=" row" style="margin-left: -100px;margin-right: 150px;">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new Feedbacks" class="well top-block" style="height: 80px;" href="feedback.php">
            <i class="glyphicon glyphicon-inbox blue"></i>

            <div style="margin-top:15px;">Users Feedback</div>
            <div>100</div>
            <span class="notification">6</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new Subsidy requests" class="well top-block active" style="height: 80px;" href="approve-subsidy.php">
            <i class="glyphicon glyphicon-star green"></i>

            <div style="margin-top:15px;">Grant/Decline Subsidies</div>
            <div>100</div>
            <span class="notification green">4</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" style="height: 80px;" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div style="margin-top:15px;">Add Shops</div>
            <div>100</div>
            <!--<span class="notification yellow">4</span>-->
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" style="height: 80px;" href="#">
            <i class="glyphicon glyphicon-leaf green"></i>

            <div style="margin-top:15px;">Add Products</div>
            <div>100</div>
            <!--<span class="notification red">12</span>-->
        </a>
    </div>
</div>
<br>
<div class="row" style="margin-left: -245px;">
    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr style="font-weight: bold;font-size: 18px;">
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Father's Name</th>
      <th scope="col">Subsidy</th>
      <th scope="col">Receipt ID</th>
      <th scope="col">Land ID</th>
      <th scope="col">Account Details</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php 
		echo $output;
	?>
    <tr class="font">
      <th>1</th>
      <td>Moses</td>
      <td>Jacob</td>
      <td>Tractor</td>
      <td><p>160000</p><P></P></td>
      <td><P></P></td>
      <td><p>67680000012</p><p>Moses</p><p>SBI</p></td>
      <td><p>MNIT</p><p>Jaipur</p><p>Rajasthan</p><p>302017</p></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
        <form action="approve.php" method="POST"><button type="submit" name="1" class="btn btn-success">Approve</button></form>
        <form action="decline.php" method="POST"><button type="submit" name="1" class="btn btn-danger">Decline</button></form>
        </div>
      </td>
    </tr>
    <tr class="font">
      <th>2</th>
      <td>Sam</td>
      <td>John</td>
      <td>Tractor</td>
      <td><p>120000</p><P></P></td>
      <td><P></P></td>
      <td><p>67680000015</p><p>Sam</p><p>SBI</p></td>
      <td><p>MNIT</p><p>Jaipur</p><p>Rajasthan</p><p>302017</p></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
         <button type="button" class="btn btn-success">Approve</button>
        <button type="button" class="btn btn-danger">Decline</button>
        </div>
      </td>
    </tr>
    <tr class="font">
      <th>3</th>
      <td>David</td>
      <td>John</td>
      <td>Threser</td>
      <td><p>140000</p><P></P></td>
      <td><P></P></td>
      <td><p>67680000016</p><p>Sam</p><p>ICICI</p></td>
      <td><p>MNIT</p><p>Jaipur</p><p>Rajasthan</p><p>302017</p></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
         <button type="button" class="btn btn-success">Approve</button>
        <button type="button" class="btn btn-danger">Decline</button>
        </div>
      </td>
      </td>
    </tr>
  </tbody>
</table>

</div>

    </div>
</div>

</div>



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


</body>
</html>
