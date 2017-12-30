<?php 
include('connect.php');


if(isset($_POST['order_id'])){
	$order_id=$_POST['order_id'];
	mysqli_query($conn," UPDATE `order` SET paid='1' WHERE order_id='$order_id'") or die(mysql_error());
}

?>
<script>window.history.go(-1);</script>
