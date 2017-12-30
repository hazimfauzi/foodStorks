<?php 
include('connect.php');

if(isset($_POST['submit'])){
			$id=$_POST['id'];
			$first_name=$_POST['first_name'];
			$last_name=$_POST['last_name'];
			$contact=$_POST['contact'];
			$gender=$_POST['gender'];
			
			
			mysqli_query($conn," UPDATE users SET first_name='$first_name', last_name='$last_name',contact='$contact', gender='$gender' WHERE id='$id'") 
			or die(mysql_error());
			header('location:my_account.php');
	
	
	
}

?>
