<!DOCTYPE html>
<?php
	include('header.php');
?>
<html>
	<head>
		<title>AgriCart</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
		
		<!-- menubar css for pages -->
		body {
			padding:0;
			margin:0;
			background-color:#d8d8d8;
		}
		
		.menu-bar {
			list-style-type:none;
			margin:0;
			padding:0;
			position:sticky;
			overflow:hidden;
			background-color:#5ACA00;
			width:100%;
		}
		
		.lfloat {
			float:left;
		}
		
		.rfloat {
			float:right;
		}
		.menu-bar-list {
			display:block;
			padding: 14px 14px;
			text-decoration:none;
			color:white;
			font-family:arial;
			font-weight:bold;
		}
		
		.menu-bar-list:hover {
			background-color:#1CB014;
		}
		
		.active {
			background-color:#0096FF;
		}
		<!-- end of menubar css for pages -->
		
		.slider {
			width:100%;
			height:200px;
			float:left;
		}
		
		.mySlides {display:none}
		.w3-left, .w3-right, .w3-badge {cursor:pointer}
		.w3-badge {height:13px;width:13px;padding:0}
		
		.display-logo1 {
			margin-top:-8px;
			float:center;
		}
		
		.footer-space
		{
			margin-top:75px; 
		}
		
		</style>
	</head>
		
	</body>
		
		<div style="width:100%">
			<img class="mySlides" src="images/slideshow1.jpg" style="width:100%;height:500px;">
			<img class="mySlides" src="images/slideshow2.jpg" style="width:100%;height:500px;">
			<img class="mySlides" src="images/slideshow3.jpg" style="width:100%;height:500px;">
		</div>
		<div style="background-color:#e4e4e4;margin-bottom:-75px;">
			<a href="subsidyform.php" style="font-family:arial;"><marquee>"All You need now is just a click you need not to wait in long queues".SUBSIDY MADE EASY NOW ....Apply For Subsidy On The Machinery Product And Get The Items At Zero Price by Clicking On This Link ..  </marquee></a>
		</div>
		
		<div class="contained" style=";max-height:185px;margin-top:74px;width:99.5%;margin-left:2px;padding:0px;margin-right:2px; margin-bottom: -2px;">
		<div class="row" >
		<div class="col-md-3" style="max-height:1000px;width:90%;background-color: #8080F1;" >
   <center> <button type="button" class="btn btn-success" style="width: 50%;color:white;margin-top:27px; margin-left: 4px;" data-toggle="modal" data-target="#exampleModal">
                Leave comments
        </button>
	 
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#1273EB;">
                    <h3 class="modal-title" id="exampleModalLabel"style="color:white;">Comments</h3>
                    <button type="button" style="color:white" class="close" data-dismiss="modal" aria-label="Close" >
                     <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
					<form action="method.php" method="POST" >
                    <div class="modal-body">
					<p>
                         <input type="text" name="fname" style="width:460PX;height:100px;margin:0px;border:1px solid #0096ff";>
					<p>
                     </div>
                    <div class="modal-footer">
                    <button type="submit" name="feedback" class="btn btn-success">Submit</button>
					</form>
                    
                    </div>
                </div>
            </div>
        </div>
            
	
  <img src="images/letter.png" style="width:50%;margin-top:12px; margin-left: 4px;"></center>
</div>

<div class="col-md-6" style="max-height:1000px;width:90%;background-color:#F1F3F6;">
	<h2 style="text-align: center; color: #5ACA00;"><strong>Users Comment</strong></h2>
<marquee direction="up" style="height:200px;"><center>
<div class="alert alert-primary" role="alert" >
 One Platform One place
</div>
<div class="alert alert-secondary" role="alert">
 I Can Now Easily Buy New Product At Comparitively Lower Price
</div>
<div class="alert alert-success" role="alert">
  The Level Of Efforts Are Immense
</div>
<div class="alert alert-danger" role="alert">
  Just One Word "You Made Life Of Farmers Easy"
</div>
<div class="alert alert-info" role="alert">
  A simple info alert—check it out!
</div>

</div>
<div class="alert alert-dark" role="alert">
  A simple dark alert—check it out!
</div>
</center></marquee>
</div>
<div class="col-md-3" style="max-height:1000px;width:90%;background-color:#8080F1;" >
<center><a href="govtpolicies.php" type="button" class="btn btn-success" style="width: 54%;color:white;margin-top:27px; border:none;margin-left: -4px;">Subsidies & Policies</a>
<img src="images/get-money.png" style="width:50%; margin-top: 8px;"></center>
</div>

		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
				   x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 2000); // Change image every 2 seconds
			}
		</script>

		</div>
		<?php
			include('footer.php');
		?>
	</body>
</html>