<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<?php
	include_once("connect.php");
	include_once("session.php");
	
	$rest_id = $_GET["rest_id"];
	$table_id = $_GET["table_id"];
	$order_date=date("Y-m-d");
	$order_time=date("H:i:s");
	include("cart.php");
	$order_list = "";
	foreach($_SESSION["shopping_cart"] as $keys => $values){
		$order_list = $order_list.$values["item_id"]."-".$values["item_name"]."-". $values["item_price"]."-".$values["item_quantity"].";";
	}
	$order_price=$_GET["total"];
	
	mysqli_query($conn,"INSERT INTO `order`(order_type, order_list, rest_id, table_id, order_date, order_time,  order_price) values('3', '$order_list', '$rest_id', '$table_id', '$order_date', '$order_time', '$order_price')") or die(mysqli_error($conn));
	
	echo '<script>
    setTimeout(function() {
        swal({
            title: "Success!",
            text: "Thank You very much for using Food Storks as your platform for ordering food.",
            type: "success"
        }, function() {
            window.location = "index.php";
        });
    }, 1000);
	</script>'; 

?>
