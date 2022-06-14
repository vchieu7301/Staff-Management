<?php

	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "staff_management";

	$conn = mysqli_connect($HOST, $USER, $PASS,$DB); 
	if (!$conn)
	{ 
	die('Không thể kết nối: ' . mysqli_connect_error());
	exit(); 
	} 
	
?>
