<?php

//fetch_data.php

include('configure.php');

if(isset($_POST["action"]))
{
	$type_fiter = $_POST['type'];
	$query = "
			SELECT * FROM product INNER JOIN shop ON product.shop_id=shop.shop_id WHERE type='".$type_fiter."'
			";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["category"]))
 {
  $category_filter = implode("','", $_POST["category"]);
  $query .= "
   AND category IN('".$category_filter."')
  ";
 }
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND brand IN('".$brand_filter."')
  ";
 }
 if(isset($_POST["state"]))
 {
  $state_filter = implode("','", $_POST["state"]);
  $query .= "
   AND state IN('".$state_filter."')
  ";
 }
 if(isset($_POST["district"]))
 {
  $district_filter = implode("','", $_POST["district"]);
  $query .= "
   AND district IN('".$district_filter."')
  ";
 }
if(isset($_POST['price'])) {
	$price = $_POST['price'];
	if($price[0]=="DESC") {
		$query .= " ORDER BY price DESC";
	}
	else if($price[0]=="ASC") {
		$query .= " ORDER BY price ASC";
	}	
 }
	$dynamiclist1 = $dynamiclist2 = $dynamiclist3 = "";
	$dynamiclist1 = $query;
	$sql = mysqli_query($connect,$query);
	$productCount = mysqli_num_rows($sql); // count the output amount
	$count = 0;
    if ($productCount > 0) {
		// get all the product details
		while($row = mysqli_fetch_array($sql)){
			 $product_id = $row["product_id"];
			 $title = $row["title"];
			 $category = $row["category"];
			 $brand = $row["brand"];
			 $type = $row["type"];
			 $price = $row["price"];
			 $quantity = $row["quantity"];
			 $description = $row["description"];
			 $image_path = $row["image_path"];
			 
			if($count%3==0) {
				$dynamiclist1 .= '<div class="cards" style="border:2px #e4e4e4 solid;border-radius:3%;"><img class="card-img-top" src="'.$image_path.'"alt="Card image" style="width:100%;height:40%;padding:30px;">
						<div class="card-bodyh4   h5 class="card-title" "><center>'.$title.'</center></h5>
							<div class="card-body" style="margin-left:20px;margin-top:0px;">
							
							<p style="color:#f7c80e;font-size:15px;"> &#8377;'.$price.'</p>
							<p style="color:#f7c80e;font-size:15px;">'.$category.'</p>
							<p  style="color:#0096FF">'.$brand.'</p>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span></p>
						  <a href="http://localhost/Agricart/infopage.php?product='.$product_id.'" class="btn btn-primary">View Details</a>
						</div></div></div><br><br><br>';
						
			}
			else if($count%3==1) {
				$dynamiclist2 .= '<div class="cards" style="border:2px #e4e4e4 solid;border-radius:3%;"><img class="card-img-top" src="'.$image_path.'"alt="Card image" style="width:100%;height:40%;padding:30px;">
						<div class="card-bodyh4   h5 class="card-title"><center>'.$title.'</center></h5>
						<div class="card-body" style="margin-left:20px;margin-top:0px;">
							
							<p style="color:#f7c80e;font-size:15px;"> &#8377;'.$price.'</p>
							<p style="color:#f7c80e;font-size:15px;">'.$category.'</p>
							<p  style="color:#0096FF">'.$brand.'</p>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span></p>
						  <a href="http://localhost/Agricart/infopage.php?product='.$product_id.'" class="btn btn-primary">View Details</a>
						</div></div></div><br><br><br>';
			}
			else if ($count%3==2) {
				$dynamiclist3 .= '<div class="cards" style="border:2px  #e4e4e4 solid;border-radius:3%;"><img class="card-img-top" src="'.$image_path.'"alt="Card image" style="width:100%;height:40%;padding:30px;">
						<div class="card-bodyh4   h5 class="card-title" ><center>'.$title.'</center></h5>
							<div class="card-body" style="margin-left:20px;margin-top:0px;">
							
							<p style="color:#f7c80e;font-size:15px;"> &#8377;'.$price.'</p>
							<p style="color:#f7c80e;font-size:15px;">'.$category.'</p>
							<p  style="color:#0096FF">'.$brand.'</p>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span></p>
						  <a href="http://localhost/Agricart/infopage.php?product='.$product_id.'" class="btn btn-primary">View Details</a>
						</div></div></div><br><br><br>';
			}
			$count++;
			
         }
		 
	} 
	else {
		echo "That item does not exist.";
	    exit();
	}
	
	$output = '<div class="col-sm-3 photo" style="padding:2px;margin-right:60px;margin-left:60px" >
						<div class="card" style="width:100%">
							<?=echo '.$dynamiclist1.'
						</div>
					</div>
					<div class="col-sm-3 photo" style="padding:2px;margin-right:60px;" >	
						<div class="card" style="width:100%">
							<?= echo '.$dynamiclist2.'
						</div>
								
								
					</div>
					<div class="col-sm-3 photo" style="padding:2px;margin-right:60px">
						<div class="card" style="width:100%">
							<?=  echo '.$dynamiclist3.'
						</div></div>';
	echo $output;
}

?>
