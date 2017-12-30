<?php 
include("header.php");
include_once("session.php");
if(!isset($_SESSION['email'])){
	include("navbar1.php"); 
	include("login_signup.php"); 
} else {
	include("connect.php");
	$email=$_SESSION['email'];
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn,$sql)or die(mysql_error());
	$row = mysqli_fetch_array($result);
	$user_id=$row['id'];
	if( $row['level'] == 'admin' ) {
		header('Location:admin/index.php');
		exit();
	} else if( $row['level'] == 'user' ) {
		include("navbar.php"); 
	} else if( $row['level'] == 'manager' ) {
		header('Location:manager/index.php');
		exit();
	}
}

unset($_SESSION["shopping_cart"]);
?>

<!--------------------------------------------- Path ------------------------------------------------------------------>

<div class="container" style="margin-top:90px">
  <div class="col-sm-12">
    <ul class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li>My Account</li>
    </ul>
  </div>
</div>

<!--------------------------------------------- Path ------------------------------------------------------------------>
<div class="container" style="min-height:415px"> 
  <!-- Nav tabs -->
  <div class="col-sm-2">
    <nav>
      <ul class="nav nav-pills nav-stacked" style="width: 160px;">
        <li><a href="recent_order.php"><i class="fa fa-list-alt fa-fw"></i> Recent Order</a> </li>
        <li><a href="my_review.php"><i class="fa fa-star fa-fw"></i> My Review</a> </li>
        <li class="active"><a href="my_account.php"><i class="fa fa-user fa-fw"></i> My Account</a> </li>
        <li><a href="address.php"><i class="fa fa-map-marker fa-fw"></i> Address Book</a> </li>
      </ul>
    </nav>
  </div>
  <div class="col-sm-10">
    <div class="panel panel-default">
      <div class="panel-body" style="min-height:450px">
        <h3 class="page-header" style=" margin-top:0; margin-bottom:1"><i class="fa fa-user fa-fw"></i>Account Settings</h3>
        <?php 
		$result=mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'"); 
		$row_profile = mysqli_fetch_array($result);
		?>
        This is your private area. Please keep your information up to date.<br /><br />
        <font style="color:red;">*</font><i style=" color:#666666" > Required fields </i><br /><br />
        <div class="col-sm-6">
        <form action="edit_profile.php" method="post" >
        <b style="font-size:17px">First Name </b><font style="color:red;">*</font>
        <input type="hidden" name="id" value="<?php echo $user_id; ?>" required>
        <input class="form-control" type="text" name="first_name" placeholder="Type your first name here." value="<?php echo $row_profile["first_name"]?>" required><br />
        <b style="font-size:17px">Last Name </b><font style="color:red;">*</font>
        <input class="form-control" type="text" name="last_name" placeholder="Type your last name here." value="<?php echo $row_profile['last_name']; ?>" required><br />
        <b>Email </b><font style="color:red;">*</font>
        <input class="form-control" type="text" name="email" placeholder="Type your email here." value="<?php echo $row_profile["email"] ?>" disabled="disabled"><br />
        <b>Mobile </b><font style="color:red;">*</font>
        <input class="form-control" type="text" name="contact" placeholder="Type your mobile phone number here." value="<?php echo $row_profile["contact"]  ?>" required><br />
        <b>Gender </b><font style="color:red;">*</font><br />
        <input type="radio" name="gender" value="male" <?php if($row_profile["gender"]=="male" ){ echo "checked"; } ?>  required="required"> Male<br>
  		<input type="radio" name="gender" value="female" <?php if($row_profile["gender"]=="female" ){ echo "checked"; } ?> required="required"> Female<br>
        <br />
        
        <a style="color:#d9534f" class="pull-right" href="logout.php"><u>Not <?php echo $row_profile["first_name"]." ".$row_profile['last_name']; ?>? Log out.</u></a>
        <input class="btn btn-outline btn-success btn-lg btn-block" type="submit" name="submit" value="Save" required>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<?php include ("footer.php"); ?>
