<?php 
include('connect.php');

if(isset($_POST['submit'])){
			$id=$_POST['id'];
			$rest_id=$_POST['rest_id'];
			$item_name=$_POST['item_name'];
			$item_price=$_POST['item_price'];
			
			mysqli_query($conn," UPDATE item SET item_name='$item_name', item_price='$item_price' WHERE item_id='$id'") 
			or die(mysql_error());
			header('location:view_rest.php?rest_id='.$rest_id);
	
	
	
}

?>
