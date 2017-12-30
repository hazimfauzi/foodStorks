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
      <li>Address Book</li>
    </ul>
  </div>
</div>

<!--------------------------------------------- Path ------------------------------------------------------------------>
<div class="container" style="min-height:415px"> 
  <!-- Nav tabs -->
  <div class="col-sm-2">
    <nav>
      <ul class="nav nav-pills nav-stacked" style="width: 160px;">
        <li><a href="recent_order.php">Recent Order</a> </li>
        <li><a href="my_review.php">My Review</a> </li>
        <li><a href="my_account.php">My Account</a> </li>
        <li class="active"><a href="address.php">Address Book</a> </li>
      </ul>
    </nav>
  </div>
  <div class="col-sm-10">
    <div class="panel panel-default">
      <div class="panel-body" style="min-height:450px">
        <h3 class="page-header" style=" margin-top:0; margin-bottom:1">
        	<i class="fa fa-user fa-fw"></i>Address Book
        	<button  type="button" class="btn btn-info btn-circle pull-right" title="Add Address"  data-toggle="modal" data-target="#addAddress"> <i class="fa fa-plus"></i></button>
        	<?php include('add_address_modal.php') ?>
        </h3>
        <div class="panel-group" id="accordion">
          <?php
			$result=mysqli_query($conn,"SELECT * FROM `address` WHERE user_id='$user_id';");
	
		while($row=mysqli_fetch_array($result)){
		$orderlist=$row['order_list']; 
		$date=$row['order_date']." ".$row['order_time'];?>
          <div class="panel panel-success">
            <div class="panel-heading">
              <table>
                <tr>
                  <td width="30%"> Order id : <?php echo $row['order_id'] ?></td>
                  <td width="60%"> Restaurant : <?php echo $row['rest_name'] ?></td>
                  <td rowspan="2" width="10%"><button type="button" class="btn btn-info" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['order_id'] ?>">Click for more info</button></td>
                </tr>
                <tr>
                  <td> Date : <?php echo $row['order_date']." ".$row['order_time'] ?></td>
                  <td> Order Type:
                    <?php if($row['order_type']=="1"){ echo "Delivery"; }else if($row['order_type']=="2"){ echo "Booking"; }else{ echo "Order from restaurant";} ?></td>
                </tr>
              </table>
            </div>
            <div id="<?php echo $row['order_id'] ?>" class="panel-collapse collapse">
              <div class="panel-body">
                <table class="table table-hover" width="100%">
                  <thead>
                  <th>Name</th>
                    <th>Quantity</th>
                    <th>Price/Unit</th>
                    <th>SubTotal</th>
                      </thead>
                    <?php
						foreach(explode(";",$orderlist) as $order){ ?>
                  <tr>
                    <?php
								$test=explode("-",$order);
								if ( ! isset($test[0])) {
								   $test[0] = null;
								}
								if ( ! isset($test[1])) {
								   $test[1] = null;
								}
								if ( ! isset($test[2])) {
								   $test[2] = null;
								}
								if ( ! isset($test[3])) {
								   $test[3] = null;
								}
								$id= $test[0];
								$name=$test[1];
								$price= $test[2];
								$quantity=$test[3]; ?>
                    <td><?php if($name!=null) echo $name ?></td>
                    <td><?php if($quantity!=null) echo "        x ".$quantity ?></td>
                    <td><?php if($price!=null) echo "RM ".$price ?></td>
                    <td><?php if($price!=null) echo "RM ".number_format($price*$quantity, 2) ?></td>
                  </tr>
                  <?php
						}?>
                </table>
              </div>
              <div class="panel-footer">
                <table width="100%">
                  <tr>
                    <td width="15%"><font color="#999999" size="+1">TOTAL</font></td>
                    <td class="pull-right"><span class="text-success">
                      <h3>RM<?php echo number_format($row['order_price'], 2); ?></h3>
                      </span></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
    <?php } ?>		
      	</div>
      </div>
    </div>
  </div>
</div>
<br>
<?php include ("footer.php"); ?>