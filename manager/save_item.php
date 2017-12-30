<?php 

include('session.php');
include('connect.php');

if (isset($_POST['submit'])){
$rest_id=$_POST['rest_id'];
$cat_id=$_POST['cat_id'];
$cat_name=$_POST['cat_name'];
$item_name=$_POST['item_name'];
$item_price=$_POST['item_price'];

						
mysqli_query($conn,"insert into item(rest_id,cat_id,item_name,item_price) values('$rest_id','$cat_id','$item_name','$item_price')") or die(mysql_error());
?>
<script> 
window.alert("Successful add <?php echo $item_name ?> to your restaurant under category <?php echo $cat_name ?> , \n Enjoy your day sir.");
window.history.go(-1);
</script>
<?php
		
mysqli_close($conn);
}
?>
