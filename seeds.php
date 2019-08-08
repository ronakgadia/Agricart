<!-- https://www.webslesson.info/2018/08/how-to-make-product-filter-in-php-using-ajax.html -->
<?php
	include('header.php');
?>

<html>
	<head>
		<title>Seeds</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		
		<style>
		<!-- menubar css for pages -->
		@media (min-width: 768px){
		  .container{
			max-width:1900px;
		  }  
		}
		@media (min-width: 992px){
		  .container{
			max-width:1900px;
		  }
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
		
		.spacing {
			margin-top:40px;
			margin-left:-95px;
			margin-right:-90px;
		}
		.spacingformarque{
			margin-top:0px;
			margin-left:-95px;
			margin-right:-118px;
		}

		.card {
			border-color:white;
		}
		
		.marquee{
			font-size:20px;
			padding-top:2px;
			font-color:#59ca00;
		}

		#loading {
			text-align:center; 
			background: url('loader.gif') no-repeat center; 
			height: 150px;
		}
		
		.check-list{
			padding:10px;
			width:100%;
			radius:25%;
		}
		a:hover {background-color:white;}
	</style>
	</head>
	
	<body>
	
	<div class="container">
		<div class="row spacingformarque">
			<div class="col-sm-10" style="width:100%;">
				<font color=#4285f4><marquee class="marquee" style="margin-left:-100px;"> Introducing AGRICART a site to make farming easy. Now grab up the different products at best price and from the best sellers round the globe. </marquee>
			</font></div>
		</div>
	</div>
		
	<div class="container" style="margin-top:2px;background-color:#e4e4e4">
		<div class="row spacing"  style="margin-top:2%">
			
			<div class="col-sm-3" style="background-color:#e4e4e4">
			<div class="card" style="margin-top:10px;margin-left:-20px;width:100%;">
				<div class="card-body">
			<!--	<div class="check-list">
					<h3 style="color:#5B6775" >Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
				</div>-->
				
				<div class="check-list">
					<h3 style="color:#5B6775" >Price</h3>
						<div style="max-height:300px; overflow-y: auto; overflow-x: hidden;">
							
						<div class="list-group-item checkbox">
							<label><input type="radio" class="common_selector price" value="DESC" name="priceop" > High to Low</label>
						</div>
						<div class="list-group-item checkbox">
							<label><input type="radio" class="common_selector price" value ="ASC" name="priceop" > Low to High</label>
						</div>
					</div>
				</div>
				
				<div class="check-list">
						<h3 style="color:#5B6775" >Category</h3>
							<div style="max-height:300px; overflow-y: auto; overflow-x: hidden;">
							<?php

							$query = "SELECT DISTINCT(category) FROM product WHERE type='Seeds'";
							$result = mysqli_query($connect,$query);
							
							while($row=mysqli_fetch_array($result))
							{
							?>
							<div class="list-group-item checkbox">
								<label><input type="checkbox" class="common_selector category"  value="<?php echo $row['category']; ?>" > <?php echo $row['category']; ?></label>
							</div>
							<?php    
							}
							?>
							</div>
				</div>	

<!--				</div>
						<select class="btn btn-primary dropdown-toggle" type="button" style="width:100%;">
							<option value="">All categories </option>
							<option value="Maize">Maize</option>
							<option value="Paddy">Paddy</option>
							<option value="Cotton">Cotton</option>
							<option value="Flower">Flower</option>
							<option value="Mustard">Mustard</option>
							<option value="Jowat">Jowar</option>
							<option value="Vegetable">Vegatable</option>
						</select>
					</div>		-->
				
				<div class="check-list">
				<br>
					<h3 style="color:#5B6775" >Brand</h3>
						<div style="max-height:300px; overflow-y: auto; overflow-x: hidden;">
						<?php
						$query = "SELECT DISTINCT(brand) FROM product WHERE type='Seeds'";
						$result = mysqli_query($connect,$query);
						
						while($row=mysqli_fetch_array($result))
						{
						?>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector brand" value="<?php echo $row['brand']; ?>"  > <?php echo $row['brand']; ?></label>
						</div>
						<?php
						}
						?>
						</div>
				</div>	 
					
				<!--		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Brands
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li><a>Mahyco</a></li>
						  <li><a href="#">Seminis</a></li>
						  <li><a href="#">Namdhari</a></li>
						  <li><a href="#">UPL</a></li>
						  <li><a href="#">Fito</a></li>
						   <li><a href="#">	Syngenta</a></li>
							<li><a href="#">DuPont Pioneer</a></li>
							<li><a href="#">Monsanto DEKALB</a></li>
						    <li><a href="#">US Agri</a></li>
							<li><a href="#">Known-You</a></li>
							<li><a href="#">Nunhems (Bayers)</a></li>
							<li><a href="#">I & B Seeds</a></li>
							<li><a href="#">Takii</a></li>
							<li><a href="#">Indo American</a></li>
							<li><a href="#">East West</a></li>
							<li><a href="#">Nuziveedu</a></li>
							<li><a href="#">Bioseed</a></li>
							<li><a href="#">Rasi</a></li>
							<li><a href="#">Rijk Zwaan</a></li>
							<li><a href="#">Clause</a></li>
							<li><a href="#">Ashoka</a></li>
							<li><a href="#">Pahuja</a></li>
							<li><a href="#">VNR</a></li>
							<li><a href="#">Sakata</a></li>
							<li><a href="#">PHS</a></li>
							<li><a href="#">Sungro</a></li>
							<li><a href="#">Univeg</a></li>
							<li><a href="#">Tokita</a></li>
							<li><a href="#">Tanindo</a></li>
							</ul>
				</div>			-->
					 
					
				<div class="check-list">
					<br>
					<h3 style="color:#5B6775" >State</h3>
						<div style="max-height:300px; overflow-y: auto; overflow-x: hidden;">
						<?php
						$query = "SELECT DISTINCT(state) FROM product INNER JOIN shop ON product.shop_id=shop.shop_id WHERE type='Seeds'";
						$result = mysqli_query($connect,$query);
						
						while($row=mysqli_fetch_array($result))
						{
						?>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector state" value="<?php echo $row['state']; ?>"  > <?php echo $row['state']; ?></label>
						</div>
						<?php
						}
						?>
						</div>
				</div>
<!--						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">State
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<li><a href="#"> AndhraPradesh</a></li>
						<li><a href="#">ArunachalPradesh</a></li>
						<li><a href="#">Assam</a></li>
						<li><a href="#">Bihar</a></li>
						<li><a href="#">Chhattisgarh</a></li>
						<li><a href="#">Goa</a></li>
						<li><a href="#">Gujarat</a></li>
						<li><a href="#">Haryana</a></li></a></li>
						<li><a href="#">HimachalPradesh</a></li>
						<li><a href="#">Jammu&Kashmir</a></li>
						<li><a href="#">Jharkhand</a></li>
						<li><a href="#">Karnataka</a></li>
						<li><a href="#">Kerala</a></li>
						<li><a href="#">MadhyaPradesh</a></li>
						<li><a href="#">Maharashtra</a></li>
						<li><a href="#">Manipur</a></li>
						<li><a href="#">Meghalaya</a></li>
						<li><a href="#">Mizoram</a></li>
						<li><a href="#">Nagaland</a></li>
						<li><a href="#">Odisha</a></li>
						<li><a href="#">Punjab</a></li>
						<li><a href="#">Rajasthan</a></li>
						<li><a href="#">Sikkim</a></li>
						<li><a href="#">Tamil Nadu</a></li>
						<li><a href="#">Telangana</a></li>
						<li><a href="#">Tripura</a></li>
						<li><a href="#">Uttarakhand</a></li>
						<li><a href="#">Uttar Pradesh</a></li>
						<li><a href="#">West Bengal</a></li>
						</ul>
				</div>-->
					 
					 
				<div class="check-list">
					<br>
					<h3 style="color:#5B6775" >District</h3>
						<div style="height:300px; overflow-y: auto; overflow-x: hidden;">
						<?php
						$query = "SELECT DISTINCT(district) FROM product INNER JOIN shop ON product.shop_id=shop.shop_id WHERE type='Seeds'";
						$result = mysqli_query($connect,$query);
						
						while($row=mysqli_fetch_array($result))
						{
						?>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector district" value="<?php echo $row['district']; ?>"  > <?php echo $row['district']; ?></label>
						</div>
						<?php
						}
						?>
						</div>
				</div>
			</div>
			</div>
			</div>
				<div class="col-sm-9" style="margin-left:-20px;background-color:#e4e4e4;margin-bottom:15px">
				<div class="card" style="margin-top:10px;margin-left:-20px;width:104%">
				<div class="card-body">
					<br>
					<div class="row filter_data">
					
					</div>
				</div>
				</div>
				</div>
		</div>
		</div>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
		var type = 'Seeds';
        var category = get_filter('category');
        var brand = get_filter('brand');
        var state = get_filter('state');
		var district = get_filter('district');
		var price = get_filter('price');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action,type:type,category:category,brand:brand,state:state,district:district,price:price},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
	
    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
});
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<?php
	include('footer.php');
?>	
</body>
</html>