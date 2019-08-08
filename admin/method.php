<?php
	include('../configure.php');

	if(isset($_POST['approve']))
	{
		$receiptid = $_POST['approve'];
		$query = "SELECT * FROM request_subsidy WHERE receipt_id='$receiptid'";
		$result = mysqli_query($connect,$query);
		if($result)
		{
			$row = mysqli_fetch_array($result);
			$userid = $row['customer_id'];
			$name = $row['name'];
			$fathername = $row['father_name'];
			$subsidy = $row['subsidy'];
			$receiptid = $row['receipt_id'];
			$receiptfile = $row['receipt_file'];
			$landfile = $row['land_file'];
			$accountno = $row['account_no'];
			$bankname = $row['bank_name'];
			$ifsc = $row['ifsc'];
			$district = $row['district'];
			$state = $row['state'];
			$zip = $row['zip'];
			$landmark = $row['landmark'];
			$mobile = $row['mobile'];
			$email = $row['email'];
			$subsidy = $row['subsidy'];
			$amount = $row['amount'];
			
			$query = "INSERT INTO approve_subsidy (customer_id,name,father_name,receipt_id,receipt_file,land_file,account_no,bank_name,ifsc,district,state,zip,landmark,mobile,email,subsidy,amount) VALUES ('$userid','$name','$fathername','$receiptid','$receiptfile','$landfile','$accountno','$bankname','$ifsc','$district','$state','$zip','$landmark','$mobile','$email','$subsidy','$amount')";
			$result = mysqli_query($connect,$query);
			if($result)
			{
				$query = "DELETE FROM request_subsidy WHERE receipt_id=$receiptid";
				$result1 = mysqli_query($connect,$query);
				if($result1){
					echo 'Successfully inserted as well as deleted';
					header('location:approve-subsidy.php');
				}
				else {
					echo "Couldn't delete the subsidy";
				}
			}
			else
			{
				echo "Couldn't insert into the database";
			}
		}
	}
	if(isset($_POST['decline']))
	{
		$receiptid = $_POST['decline'];
		$query = "DELETE FROM request_subsidy WHERE receipt_id=$receiptid";
		$result1 = mysqli_query($connect,$query);
				if($result1){
					echo 'Successfully inserted as well as deleted';
					header('location:approve-subsidy.php');
				}
				else {
					echo "Couldn't delete the subsidy";
				}
	}
	
?>