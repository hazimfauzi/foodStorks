<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<?php
	include_once("connect.php");
	if($_GET['type']=='1'){
		$order_date=date("Y-m-d");
		$order_time=date("H:i:s");
	}else{
		$order_date=$_GET["date"];
		$order_time=$_GET["time"];	
	}
	
	
	$order_address="None";
	$order_city="None";
	$order_state="None";
	$order_postcode="None";
	

	$order_type=$_GET["type"];
	$order_list=$_GET["order_list"];
	$user_id=$_GET["user_id"];
	$rest_id=$_GET["rest_id"];
	$order_price=$_GET["total"];
	
	mysqli_query($conn,"INSERT INTO `order`(order_type, order_list, user_id, rest_id, order_date, order_time, order_address, order_city, order_state, order_postcode, order_price) values('$order_type', '$order_list', '$user_id', '$rest_id', '$order_date', '$order_time', '$order_address', '$order_city', '$order_state', '$order_postcode', '$order_price')") or die(mysqli_error($conn));
	
	echo '<script>
    setTimeout(function() {
        swal({
            title: "Success!",
            text: "Thank You very much for using Food Storks as your platform for ordering food.",
            type: "success"
        }, function() {
            window.location = "recent_order.php";
        });
    }, 1000);
	</script>'; 

?>