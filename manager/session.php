<?php

//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['email']) || (trim($_SESSION['email']) == '')) {
    header("location: ../index.php");
}
$email=$_SESSION['email']; 

include("connect.php");
$query = mysqli_query($conn,"select id from users where email = '$email'")or die(mysql_error());
$row=mysqli_fetch_array($query);
$session_id = $row[0];
mysqli_close($conn);

?>