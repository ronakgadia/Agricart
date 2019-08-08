<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<html>
<title>
Order Summary
</title>
<head>
</head>
<body>
<div class="container-fluid">
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-10" style="margin-left:120px;">
				<div class="panel">
					<div class="panel-heading" style="background-color:#0096FF;color:white; font-size: 17px;"><center><b>Cart Checkout</b></center></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-1 col-xs-1"><center><b>Action</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Product Image</b></center></div>
							<div class="col-md-3 col-xs-3"><center><b>Product Name</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Quantity</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Product Price</b></center></div>
							<div class="col-md-2 col-xs-2"><center><b>Total Price </b></center></div>
						</div>
						
						<div class="row" style="margin-top:50px;">
							<div class="col-md-1">
								<div class="btn-group">
									<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2" ><img src='images/1.jpg' style="width:100%;height:120px" ></div>
							<div class="col-md-3"><center>Product Name</center></div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> 
						
			
					</div> 
				</div>
			</div>
		</div>
	</div>
<div class="row">
<div class="card text-white bg-info mb-6 shadow p-3 mb-6  rounded" style="width: 18rem;margin-left:245px;margin-top:100px;height:30%;">
  
  <div class="card-body">
    <h2>Payment Mode</h2>
	 <select class="form-control " name="payment_mode">
        			<option value="cod">Cash on Delivery</option>
        			<option value="paypal">Online Payment</option>
			        
      				</select>
</div>
</div>
<div class="card text-white bg-info mb-5" style="max-width: 18rem;margin-left:320px;margin-top:100px;height:30%;border:2px black solid">
  
  <div class="card-body">
    <h5 class="card-title">Address :</h5>
    <p class="card-text">M-II 191 Fateh Villa Kitiyani Colony Mandsaur</p>
</div>
</div >
</div>
<div class="row" style="padding:50px;margin-left:500px;">
<input type="submit" class="btn btn-warning" value="Order Now" Name="Order_Now"/></form>
</div>
</div>
</body>
</html>