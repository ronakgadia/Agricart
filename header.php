<?php
	include('configure.php');
	session_start();
	
	$count = 0;
	if(isset($_SESSION['username']) || !empty($_SESSION['username'])) {
		$user_id = $_SESSION['user_id'];
		$query = "SELECT count(*) FROM cart WHERE register_id='$user_id'";
		$result = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($result);
		$count = $row[0];
	}
	
	if(isset($_SESSION['username']) || !empty($_SESSION['username'])) {
		$myname = $_SESSION['username'];
		$arr = explode(" ",$myname);
		$myname = $arr[0];
		$output = '<div class="search-container">
					<form>
					  <input type="text" placeholder="Search.." name="search" size="22">
					  <button type="submit"><i class="fa fa-search" style="color: #5392F9;"></i></button>
					</form>
				  </div>

					<div class="dropdowns">
					<button class="dropbtns">
					  <i class="far fa-smile fa-2x" style="color: #6666FF;"></i>
					</button>
					<div style="float: right; font-size: 25px; color: white; margin-left: -8px; margin-top: 10px;margin-bottom: -25px;">
					  <p>'.$myname.'</p>
					</div>
					<div class="dropdown-contents">
					  <a href="profile.php">Profile</a>
					  <a href="orderhistory.php">Orders</a>
					  <a href="wishlist.php">Wishlist</a>
					  <a href="subsidy.php">Subsidies</a>
					  <a href="logout.php">Logout</a>
					</div>
				  </div>
				  <div class="dropdowns1">
						<form action="method.php" method="post">
					   <button class="dropbtns1" name="cart">
					<i class="fa fa-shopping-cart fa-2x">
					<span class="badge">'.$count.'</span></i>
					</button>
						</form>
				  </div>';
	}
	else {
		$output = '<div class="search-container">
					<form>
					  <input type="text" placeholder="Search.." name="search" size="28">
					  <button type="submit"><i class="fa fa-search" style="color: #5392F9;"></i></button>
					</form>
				  </div>

					<div class="dropdowns">
					<button class="dropbtns" style="margin-right: -20px;"> 
					  <i class="fa fa-fw fa-user fa-2x"></i>
					</button>
					<div class="dropdown-contents">
					  <a href="login.php">Login</a>
					  <a href="signup.php">Sign up</a>
					</div>
					</div>
					<div class="dropdowns1">
						<form action="method.php" method="post">
					   <button class="dropbtns1" name="cart">
					<i class="fa fa-shopping-cart fa-2x">
					</i>
					</button>
						</form>
				  </div>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<style>
<style>
          .heading {
              background-color:#ffffff;
              width:100%;
              height:70px;
            }
          .display-logo {
              margin-top:-10px;
			  margin-bottom:-10px;
              margin-left:42%;
              float:center;
              position: center;
            }

		body {
		  margin: 0;
		  font-family: Arial, Helvetica, sans-serif;
		}

		.topnav {
		  overflow: hidden;
		  background-color: #5ACA00;
		}

		.topnav a {
		  float: left;
		  display: block;
		  color: white;
		  font-family: arial;
		  font-weight: bold;
		  text-align: center;
		  padding: 18px 10px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.topnav a:hover {
		  background-color: #1CB014;
		  color: white;
		}

		.active {
		  background-color: #42B1FF;
		  color: white;
		}

		.topnav .icon {
		  display: none;
		}


		.topnav .search-container {
		  float: left;
		  margin-left: 70px;
		}

		.topnav input[type=text] {
		  padding: 6px;
		  margin-top: 12px;
		  margin-left: 8px;
		  font-size: 17px;
		  border: none;
		  border-bottom-left-radius: 5px;
		  border-top-left-radius: 5px;
		  background-color: #F1F3F6;
		}

		.topnav .search-container button {
		  float: right;
		  padding: 6px 10px;
		  margin-top: 12px;
		  margin-right: 16px;
		  background: #ccc;
		  font-size: 17px;
		  border: none;
		  border-bottom-right-radius: 5px;
		  border-top-right-radius: 5px;
		  cursor: pointer;
		}

		.topnav .search-container button:hover {
		  background: #1CB014;
		}


		.dropdowns {
			float: left;
			overflow: hidden;
		}

		.dropdowns .dropbtns {
			font-size: 16px;    
			border: none;
			outline: none;
			color: white;
			padding: 11px 16px;
			background-color: inherit;
			font-family: inherit;
			margin: 0;
			margin-top: 2px;
		}

		/*.dropdowns:hover .dropbtns {
			background-color: red;
		}*/

		.dropdown-contents {
			display: none;
			position: absolute;
			background-color: white;
			width: 140px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-contents a {
			float: none;
			color: #949391;
			padding: 6px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-contents a:hover {
			background-color: #42B1FF;
			color: white;
		}

		.dropdowns:hover .dropdown-contents {
			display: block;
		}



		<!--			Header CSS for welcome			-->
		.dropdowns1 {
				float: right;
				overflow: hidden;
			}

			.dropdowns1 .dropbtns1 {
				font-size: 16px;    
				border: none;
				outline: none;
				color: white;
				padding: 11px;
				background-color: inherit;
				font-family: inherit;
				margin-top: 2px;
				margin-right: 0px;
			}

			 .dropbtns1 .badge {
			  position: absolute;
			  top: 88px;
			  right: 18px;
			  width:17px;
			  height:17px;
			  padding: 5px;
			  padding-bottom: 10px;
			  padding-top:0px;
			  border-radius: 50%;
			  background-color: #5392F9;
			  color: white;
			  font-size: 15px;
			}

			@media screen and (max-width: 800px) {
			  .topnav a {display: none;}
			  .topnav a.icon {
				float: right;
				display: block;
				font-size: 45px;
				margin-top: -13px;
				margin-bottom: -13px; 
			  }
			  .topnav .search-container{display: none;}
			}

			@media screen and (max-width: 800px) {
			  .topnav.responsive {position: relative;}
			  .topnav.responsive .icon {
				position: absolute;
				right: 0;
				top: 0;
			  }
			  .topnav.responsive a {
				float: none;
				display: block;
				text-align: left;
			  }
			  .topnav.responsive .search-container{display: block;}
			  .topnav.responsive .icons{display: block;}
			}
		<!--			Closing Header CSS for welcome			-->
		@media screen and (max-width: 800px) {
		  .topnav a {display: none;}
		  .topnav a.icon {
			float: right;
			display: block;
			font-size: 45px;
			margin-top: -13px;
			margin-bottom: -13px; 
		  }
		  .topnav .search-container{display: none;}
		}

		@media screen and (max-width: 800px) {
		  .topnav.responsive {position: relative;}
		  .topnav.responsive .icon {
			position: absolute;
			right: 0;
			top: 0;
		  }
		  .topnav.responsive a {
			float: none;
			display: block;
			text-align: left;
		  }
		  .topnav.responsive .search-container{display: block;}
		  .topnav.responsive .icons{display: block;}
		}

</style>
</head>
<body>

    <div class="heading">
      <img src="images/AGRICART.png" class="display-logo">
    </div>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">HOME</a>
  <a href="seeds.php">SEEDS</a>
  <a href="plantnutrition.php">PLANT NUTRITIONS</a>
  <a href="plantprotection.php">PLANT PROTECTIONS</a>
  <a href="machinery.php">MACHINERY</a>
  <a href="aboutus.php">ABOUT US</a>
  
	<?php
		echo $output;
	?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>