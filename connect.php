<?php 
	$host = 'localhost'; 
	$user = 'root'; 
	$pswd = ''; 
 
	$conn = mysqli_connect($host, $user, $pswd) or die ('Error connecting to MySQL');
	
	$dbname = "foodstorks"; 
	mysqli_select_db($conn,$dbname) or  die ("Error connecting to Database: ".$dbname);
	//Closes specified connection 
	//mysqli_close($conn); 
?> 
