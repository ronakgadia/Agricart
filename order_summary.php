<?php
	include('configure.php');
	session_start();
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
		header('location:login.php');
	}
	$product_id = $_SESSION['product_id'];
	$user_id = $_SESSION['user_id'];
	
	$query = "SELECT * FROM user_address WHERE customer_id=$user_id";
	$result = mysqli_query($connect,$query);
	$pcount = mysqli_num_rows($result);
	$address = '';
	if($pcount > 0) {
		$count = 0;
		while($row = mysqli_fetch_array($result)) {
			$name = $row['name'];
			$state = $row['state'];
			$district = $row['district'];
			$pincode = $row['pincode'];
			$street_address = $row['street_address'];
			$city = $row['city'];
			$checked = '';
			if($count == 0)
				$checked = 'checked';
			$address .= '<div class="form-check" style="margin-bottom:20px">
							<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" '.$checked.'>
							<label class="form-check-label" style="font-weight: normal;" for="exampleRadios1">
								<span><b>'.$name.'</b></span><br>
									'.$street_address.'<br>
									'.$city.','.$state.','.$pincode.'<br> 
							</label>
						 </div>';
			$count++;
		}
	}
	
	
	$query = "SELECT * FROM product WHERE product_id=$product_id";
	$result = mysqli_query($connect,$query);
	$pcount = mysqli_num_rows($result);
	$output = '';
	if($pcount > 0) {
		$count = 0;
		while($row = mysqli_fetch_array($result)) {
			$title = $row['title'];
			$type = $row['type'];
			$price = $row['price'];
			$brand = $row['brand'];
			$image_path = $row['image_path'];
			$price = $row['price'];
			$output .= '<div class="row" style="padding: 10px;">
							<div class="col-md-3" style="margin-left:-10px;" ><img src="'.$image_path.'" style="height: 200px;"></div>
							<div class="col-md-4" style="padding:10px;font-size:21px;margin-left:20px; margin-top: 35px;" >Title: '.$title.'<br>Type: '.$type.'<br>Price: &#8377; '.$price.'<br>Company: '.$brand.'</div>
							<div class="col-md-4" style=" margin-top: 50px; margin-left: 20px;" >Deliver in 5-6 days</div>
						</div>
						<hr>';
			$count++;
		}
	}
?>

<html>
	<title>Order Summary</title>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		
		body {
				padding:0;
				margin:0;
				background-color:#f1f3f6;
			}
	
	.mainbox {
		background-color:#F5FAFF;
		margin-left:30px;
		margin-top:15px;
		border:1px solid #DDDDDD;
		padding:0px 25px;
		margin-bottom:20px;
		width:69%;
		height:560px;
	}
	
	.titlelogin {
		display:block;
		margin-top: 15px;
		margin-bottom: 10px;
		font-size: 15px;
		color:#0096FF;

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
		width:75%;
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
	.login-button1 {
		width:40%;
		padding:5px 0px;
		text-align:center;
		background-color:#DC3545;
		border-color:#DC0000;
		border-radius:5px;
		color:white
	}
	.login-button1:hover {
		background-color:#BB0000;
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
	
	.container1 {
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

	
	.d-block
	{
		height:70px;
	}
	.box{
		background-color:#007bff;
		width:75%;
		margin-left:10px;
		border:1px solid black;
	}
	.container{
		width:100%;
	}
	
	
	
	
	.collapsible {
  background-color: white;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 67%;
  border:1px;
  text-align: left;
  outline: none;
  font-size: 15px;
  margin-top:40px;
  margin-left:50px;
  border-color:#f1f3f6;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .collapsible:hover {
  background-color: #ccc;
}

/* Style the collapsible content. Note: hidden by default */
.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
	</style>
</head>


<body>
<span class="d-block p-3 bg-primary" style="font-size: 25px; height: 55px; text-align: center; color: white; font-style: italic;"><p style="margin-top: -10px;"><strong>Agricart</strong></p></span>
<div class="row">
<div class="col-md-9" >
<div class="card" style="margin-top:30px;margin-left:50px; width:90%;">
    <div class="panel-heading" style="background-color:#0096FF;color:white;padding:8px 0 3px 0"><center><h5 class="card-title">Delivery Address</h5></center></div>	
    
	<div class="card-body">
	  <!--<div class="form-check" style="margin-bottom:20px">
  		<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  		<label class="form-check-label" style="font-weight: normal;" for="exampleRadios1">
			<span><b>Shreya Jain</b></span><br>
				M-II 191 Fateh Villa Kitiyani Colony <br>
				Mandsaur (M.P),Behind Law College<br> 
  		</label>
	  </div>

	  <div class="form-check">
  		<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  		<label class="form-check-label" style="font-weight: normal;" for="exampleRadios1">
			<span><b>Saifullah</b></span><br>
				M-II 191 Fateh Villa Kitiyani Colony <br>
				Mandsaur (M.P),Behind Law College<br>   
  		</label>
	  </div>-->
	  <?php echo $address; ?> 
	</div>
</div>

</div>
<div class="col-md-3">
<div class="card" style="margin-top:35px; margin-left:10px; width:80%;">
<ul class="list-group" >
  <li class="list-group-item" style="color:#878787"><b>PRICE DETAILS</b></li>
  <li class="list-group-item">Price(1 item):       &#8377; <?php echo $price; ?> </li>
  <li class="list-group-item">Delivery Charges:    &#8377; 0</li>
  <li class="list-group-item">Amount Payable:      &#8377; <?php echo $price; ?></li>
</ul>
</div>
</div>
</div>
<button class="collapsible" style="margin-top: 20px;">Add a new address<align="right"><i class="fas fa-plus" style="margin-left:850px;margin-top:-20px;color:blue"></i></align></button>
<div class="content" style="background-color: #f1f3f6;">

<div class="mainbox" >
<div  style="width:70%;">
	<span class="titlelogin"><strong>ADD A NEW ADDRESS</strong></span>
	<form action="method.php" method="post">
	  <div class="form-row">
		<div class="form-group col-md-6">
		<label for="uname">Name</label>
		<input type="text" placeholder="Enter the name" name="uname"  >
		<br>
    	</div>
		<div class="form-group col-md-6">
		<label for="mobile">Mobile</label>
		<input type="text" placeholder="10-digit mobile number" name="mobile">
		<br>
		</div>
      </div>

	  <div class="form-row">
    	<div class="form-group col-md-6">
		<label for="pincode">Pincode</label>
		<input type="text" placeholder="Enter the pincode" name="pincode">
		<br>
    	</div>
    	<div class="form-group col-md-6">
		<label for="city">City</label>
		<input type="text" placeholder="Enter the city" name="city">
		<br>
    	</div>
  	  </div>

		<div class="form-group">
		<label for="street">Address</label>
		<input type="text" placeholder="Enter the street address" name="street">
		<br>
	   </div>

	  <div class="form-row">
		<div class="form-group col-md-6">
		<label for="district">District</label>
		<input type="text" placeholder="Enter the district" name="district">
		<br>
    	</div>
    	<div class="form-group col-md-6">
		<label for="state">State</label>
		<input type="text" placeholder="Enter the state" name="state">
		<br>
    	</div>
  	  </div>

      <div class="form-row">
      	<div class="form-group col-md-6">
        <button type="submit" name="addaddress" class="login-button">SAVE AND DELIVER HERE</button>
    	</div>
      	<div class="form-group col-md-6">
        <button type="submit" class="login-button1">CANCEL</button>
    	</div>
      </div> 		
    
	</form>

</div>
</div>
</div>
<div class="card" style="margin-top:20px;margin-left:55px;background-color:#0096FF;height:50px; width:66.5%;">
  <div class="card-body">
    <font color="white"><center><h5 class="card-title" style="margin-top:-7px;">ORDER SUMMARY</h5></center></font>
	
</div>
<div class="container" style="background-color:white;border:1px #dfdfdf solid;margin-top: -20px;" >
<div class="col-md-12 col-xs-1" style="max-height:500px;" >
	<?php echo $output; ?>
</div>

<a href="ordersuccessful.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style="width:200px; height: 40px; padding: 0px;padding-top: 3px; margin-bottom: 15px;">Proceed To Payment</a>
</div>
</div>
</body>
</html>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

</script>