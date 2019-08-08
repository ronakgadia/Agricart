<?php
	include('header.php');
		
	$output="";
	if(isset($_POST['id'])) {
		$cart_id = $_POST['id'];
		$query = "DELETE FROM cart where cart_id='$cart_id'";
		$output = $query;
		echo $output;
		mysqli_query($connect,$query);
	}
	
	$user_id = $_SESSION['user_id'];
	$sql = "Select * from cart INNER JOIN product ON cart.product_id=product.product_id where register_id='$user_id'";
	$result = mysqli_query($connect,$sql);
	$productCount = mysqli_num_rows($result); // count the output amount
	$count = 0;
    if ($productCount > 0) {
		
		while($row=mysqli_fetch_array($result))
		{
			$cart_id = $row['cart_id'];
			$image_path = $row['image_path'];
			$product_name = $row['title'];
			$quantity = $row['quantity'];
			$price = $row['price'];
			$total = $price;
			$output .= '<div class="row" style="margin-top:30px;">
						<div class="col-md-1">
							<div class="btn-group">
								<a href="delete.php?id='.$cart_id.'" class="btn btn-danger" id="'.$cart_id.'"><span class="glyphicon glyphicon-trash"></span></a>
							</div>
						</div>
						<div class="col-md-2" ><img src="'.$image_path.'" style="width:100%;height:120px" ></div>
							<div class="col-md-3"><center>'.$product_name.'</center></div>
							<div class="col-md-2"><input type="text" class="form-control qty" value="" ></div>
							<div class="col-md-2"><input type="text" class="form-control price" value="'.$price.'" disabled></div>
							<div class="col-md-2"><input type="text" class="form-control total" value="'.$total.'" disabled></div>
						</div>';
		}
	}
	else {
		$output = "No items added to the cart";
	}
?>

<!DOCTYPE html>
<html>
		<title>Your Cart</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
<head>
	<style>
		body {
			padding:0;
			margin:0;
			background-color:#f1f3f6;
		}
		
		.active {
			background-color:#0096FF;
		}
	</style>
</head>

<body>

	<div class="container-fluid" >
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-10" style="margin-left:120px;" >
				<div class="panel">
					<div class="panel-heading" style="background-color:#0096FF;color:white; font-size: 17px;"><center><b>Cart Checkout</b></center></div>
					<div class="panel-body" style="min-height:700px">
						<div class="row">
							<div class="col-md-1 col-xs-1"><center><b>Action</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Product Image</b></center></div>
							<div class="col-md-3 col-xs-3"><center><b>Product Name</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Quantity</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Product Price</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Total Price </b></center></div>
						</div>
						
						<?php echo $output; ?>
						
					</div>
				<br><br>
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<p ><b class="net_total" style="font-size:25px;">TOTAL </b></p>
						<br><p><a href="order_summary.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="width:200px;">Proceed</a></p>
					</div>
					
				</div>
				<br><br>
			</div>
		</div>
	</div>
	
<script>	
	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);

	})
</script>
<script>
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);
	}
</script>
<?php
	include('footer.php');
?>
</body>
</html>