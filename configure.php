<?php

	define('DB_SERVER',"localhost");
	define('DB_USERNAME',"root");
	define('DB_PASSWORD',"");
	define('DB_DATABASE',"agricart");
	
	$connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL:".mysqli_connect_error();
	}
?>