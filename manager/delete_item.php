<?php
include('connect.php');

$id=$_GET['id'];
$rest_id=$_GET['rest_id'];

mysqli_query($conn,"delete from item where item_id='$id'") or die(mysql_error());

header('location:view_rest.php?rest_id='.$rest_id);
?>