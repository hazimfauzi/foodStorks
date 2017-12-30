<?php 

include('session.php');
include('connect.php');

if (isset($_POST['submit'])){
$rest_name=$_POST['rest_name'];
$rest_address=$_POST['rest_address'];
$rest_postcode=$_POST['rest_postcode'];
$rest_city=$_POST['rest_city'];
$rest_state=$_POST['rest_state'];
$rest_contact=$_POST['rest_contact'];

						
mysqli_query($conn,"insert into restaurant(rest_name,rest_address,rest_postcode, rest_city,rest_state,rest_contact,rest_owner) values('$rest_name','$rest_address','$rest_postcode','$rest_city','$rest_state','$rest_contact','$session_id')")
					or die(mysqli_error());
?>
<script> 
window.alert("Successful register your restaurant to system, \n Enjoy your day sir.");
window.location.href = "add_rest.php";
</script>
<?php
		
mysqli_close($conn);
}
?>
