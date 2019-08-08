<?php
include('header.php');
$output="";
$productid=$_GET['product'];
$user_id = $_SESSION['user_id'];
$select_query="select * from product where product_id=$productid";
$sql=mysqli_query($connect,$select_query);
$row=mysqli_fetch_array($sql,MYSQLI_BOTH);
$type=$row["type"];
$title=$row["title"];
$price=$row["price"];
$category=$row["category"];
$brand=$row["brand"];
$img=$row["image_path"];
$description=$row["description"];
$sql=mysqli_query($connect,"select * from shop where shop_id in(select shop_id from product)");
$row1=mysqli_fetch_array($sql,MYSQLI_BOTH);
$shop_name=$row1["shop_name"];
$landmark=$row1["landmark"];
$district=$row1["district"];
$state=$row1["state"];
$mobile=$row1["mobile"];
$email=$row1["email"];
$licence=$row1["license_no"];

$_SESSION['product_id'] = $productid;
$_SESSION['user_id'] = $user_id;
?>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
		body {
			padding:0;
			margin:0;
			background-color:#f1f3f6;
			
		}
		
		.active {
			background-color:#0096FF;
		}
		
		.checked {
    color: orange;
}

		</style>
</head>
<body>

	<div class="container" style="margin-left:0;margin-top:10px;margin-bottom:10px;" >
		<div class="row" style="width:115%;">
			<div class="card" style="margin-left:80px;width:105%;max-height:1000px;">
			<div class="card-body">
			<div class="col-sm-6">
				<div class="card" style="margin-left:70px;width:65%;border-radius:2%;margin-top:5px;border-color:white;">
					<div class="card-body">
					<p><img src="<?php echo $img; ?>" style="width:100%;margin-top:0px;"></p>
					<p style="margin-top:30px;">
					<a href="addtocart.php" class="btn btn-primary btn-lg">
						<span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
					<a href="order_summary.php" class="btn btn-danger btn-lg active btn-lg active" role="button" aria-pressed="true" style="width:152px;"><i class="fas fa-bolt"></i>   Buy Now</a>
					</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
			
			<B><p style="color:#aee147;font-size:25px;"><?php echo $title ?></p></B>
			<p style="color:#bc2130;font-size:18px;"> <b>Price: &#8377;<?php echo $price ?></b></p>
			<p  style="color:#bc2130;font-size:18px;"><b>Brand: </b><?php echo $brand ?></p>
			<p style="color:#bc2130;font-size:18px;"><b>Type: </b><?php echo $type ?></p>
			<p style="color:#bc2130;font-size:18px;"><b>Category: </b><?php echo $category ?></p>
			<p style="color:#bc2130;font-size:18px;"><b>Rating And Review: </b></p>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<hr>
			
			<p style="color:#0096FF;font-size:16px;"><b>Shop name: </b><?php echo $shop_name ?></p>
			<p style="color:#0096FF;font-size:16px;"><b>Address:  </b><?php echo $landmark.','.$district.' '.$state  ?></p>
			<p style="color:#0096FF;font-size:16px;"><b>Contact Details: </b><?php echo $mobile ?></p>
			<p style="color:#0096FF;font-size:16px;"><b>Email:</b><?php echo $email ?></p>
			<p style="color:#0096FF;font-size:16px;text-style:"Helvetica Neue";"><b>Description:   </b></p>
			<p text-style:"Helvetica Neue"; style="color:#0096FF;" ><?php echo $description ?></p>
			<br>
			
			<?php echo $output;?>
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