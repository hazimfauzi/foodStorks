<?php 
	//Initialise the session 
	session_start(); 
	if (!isset($_SESSION['email'])) {
		$_SESSION['email'] = $_POST['email']; 
		$_SESSION['password'] = $_POST['password']; 
		$email=$_POST['email'];
		$password=$_POST['password'];
	} 
 	$url=$_POST['url'];
	include("connect.php"); 
    $sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn,$sql)or die(mysql_error());
	$row = mysqli_fetch_assoc($result);
	$num_row = mysqli_num_rows($result);
	$hashPass = $row['password'];
	$hash = password_verify($password, $hashPass);
											
	if($num_row == 0){
		session_unset(); 
		?><script> 
		window.alert("Invalid Email...");
		window.history.go(-1); 
        </script><?php
	}else if($hash == 0){
		session_unset(); 
		?><script> 
		window.alert("Wrong Password!!!");
		window.history.go(-1); 
        </script><?php 
	} else {
		if( $row['level'] == 'admin' ) {
		header('Location:admin/index.php');
		exit();
		} else if( $row['level'] == 'user' ) {
		header('Location:'.$url);
		} else if( $row['level'] == 'manager' ) {
		header('Location:manager/index.php');
		exit();
		} else { 
		?><script> 
		window.alert("Access Denied...");
		window.history.go(-1); 
        </script><?php
		}
		
	}
	
	//Closes specified connection 
	mysqli_close($conn); 
?>
