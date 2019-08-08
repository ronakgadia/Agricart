<?php
	include('header.php');
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
		header("location:login.php");
	}
						
	$output="";
	$sql = "Select * from product where type='vdvwv'";
	$result = mysqli_query($connect,$sql);
	$productCount = mysqli_num_rows($result); // count the output amount
	$count = 0;
    if ($productCount > 0) {
		
		while($row=mysqli_fetch_array($result))
		{
			$image_path = $row['image_path'];
			$product_name = $row['product_name'];
			$quantity = $row['quantity'];
			$price = $row['price'];
			$total = $price * $quantity;
			$output .= '<div class="row" style="margin-top:30px;">
						<div class="col-md-1">
							<div class="btn-group">
								<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
							</div>
						</div>
						<div class="col-md-2" ><img src="'.$image_path.'" style="width:100%;height:120px" ></div>
							<div class="col-md-3"><center>'.$product_name.'</center></div>
							<div class="col-md-2"><input type="text" class="form-control" value="'.$quantity.'" ></div>
							<div class="col-md-2"><input type="text" class="form-control" value="'.$price.'" disabled></div>
							<div class="col-md-2"><input type="text" class="form-control" value="'.$total.'" disabled></div>
						</div>';
		}
	}
	else {
		$output = "No items added to the cart";
	}
?>

<html>
		<title>Your Cart</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<head>
	<style>
		body {
			padding:0;
			margin:0;
			background-color:#f1f3f6;
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
	</style>
</head>

<body>

	<div class="container-fluid">
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-10" style="margin-left:120px;">
				<div class="panel">
					<div class="panel-heading" style="background-color:#5aca00;color:white; font-size: 17px;"><center><b>Your Wishlist</b></center></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-1 col-xs-1"><center><b>Action</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Product Image</b></center></div>
							<div class="col-md-3 col-xs-3"><center><b>Product Name</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Quantity</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Product Price</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Total Price </b></center></div>
						</div>
						
						<div class="row" style="margin-top:50px;min-height:700px;">
							<div class="col-md-1">
								<div class="btn-group">
									<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2" ><img src='images/3.jpg' style="width:100%;height:120px" ></div>
							<div class="col-md-3"><center>Alysesium</center></div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='200' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='200' disabled></div>
						</div> 
						
			<!--			<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $500000</b>
							</div> 
							<div id="cart_checkout"></div>		-->
						
					</div> 
				</div>
			</div>
		</div>
	</div>
<?php
	include('footer.php');
?>
</body>
</html>