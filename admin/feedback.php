<!DOCTYPE html>
<?php
	include('../configure.php');
	
	$query = "SELECT * FROM request_feedback INNER JOIN register ON request_feedback.customer_id=register.register_id";
	$result = mysqli_query($connect,$query);
	$output = '';
	if($result)
	{
		$count=0;
		while($row = mysqli_fetch_array($result))
		{
			$count++;
			$username = $row['username'];
			$mobile = $row['mobile_no'];
			$email = $row['email'];
			$feedback = $row['feedback'];
			$output .= '<tr class="font">
						  <th>'.$count.'</th>
						  <td>'.$username.'</td>
						  <td>'.$mobile.'</td>
						  <td>'.$email.'</td>
						  <td>
							<button type="button" class="btn btn-primary" style="width: 50%;" data-toggle="modal" data-target="#exampleModal">
									Open
							</button>
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										 <span aria-hidden="true">&times;</span>
										</button>
										</div>
										<div class="modal-body">
											<p>'.$feedback.'</p>
										 </div>
										<div class="modal-footer">
										<button type="button" class="btn btn-success">Add to Screen</button>
										<button type="button" class="btn btn-danger">Decline</button>
										</div>
									</div>
								</div>
							</div>
						  </td>
						</tr>';
		}
	}
?>
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
    <a href="index.php"><button name="logoutadmin" type="button" class="btn btn-dark" style="width: 150%;">Logout</button></a>
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
        <a data-toggle="tooltip" title="6 new Feedbacks" class="well top-block active" style="height: 80px;" href="feedback.php">
            <i class="glyphicon glyphicon-inbox blue"></i>

            <div style="margin-top:15px;">Users Feedback</div>
            <div>100</div>
            <span class="notification">6</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new Subsidy requests" class="well top-block" style="height: 80px;" href="approve-subsidy.php">
            <i class="glyphicon glyphicon-star green"></i>

            <div style="margin-top:15px;">Grant/Decline Subsidies</div>
            <div>100</div>
            <span class="notification green">4</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" style="height: 80px;" href="shop.php">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div style="margin-top:15px;">Add Shops</div>
            <div>100</div>
            <!--<span class="notification yellow">4</span>-->
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a class="well top-block" style="height: 80px;" href="product.php">
            <i class="glyphicon glyphicon-leaf green"></i>

            <div style="margin-top:15px;">Add Products</div>
            <div>100</div>
            <!--<span class="notification red">12</span>-->
        </a>
    </div>
</div>
<br>
<div class="row" style="margin-left: -100px;margin-right: 150px;">
    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr style="font-weight: bold;font-size: 18px;">
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Feedback</th>
    </tr>
  </thead>
  <tbody>
	<?php echo $output; ?>
    <!--<tr class="font">
      <th>2</th>
      <td>Ronak</td>
      <td>9852693886</td>
      <td>ronak@gmail.com</td>
      <td>
        <button type="button" class="btn btn-primary" style="width: 50%;" data-toggle="modal" data-target="#exampleModal">
                Open
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                         ...
                     </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success">Add to Screen</button>
                    <button type="button" class="btn btn-danger">Decline</button>
                    </div>
                </div>
            </div>
        </div>

      </td>
    </tr>
    <tr class="font">
      <th>3</th>
      <td>Shreya</td>
      <td>9521877375</td>
      <td>shreya@gmail.com</td>
      <td>
        <button type="button" class="btn btn-primary" style="width: 50%;" data-toggle="modal" data-target="#exampleModal">
                Open
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                         ...
                     </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success">Add to Screen</button>
                    <button type="button" class="btn btn-danger">Decline</button>
                    </div>
                </div>
            </div>
        </div>

      </td>
    </tr>-->
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
