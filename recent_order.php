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
      <li>Recent Order</li>
    </ul>
  </div>
</div>

<!--------------------------------------------- Path ------------------------------------------------------------------>
<div class="container" style="min-height:415px"> 
  <!-- Nav tabs -->
  <div class="col-sm-2">
    <nav>
      <ul class="nav nav-pills nav-stacked" style="width: 160px;">
        <li class="active"><a href="recent_order.php"><i class="fa fa-list-alt fa-fw"></i> Recent Order</a> </li>
        <li><a href="my_review.php"><i class="fa fa-star fa-fw"></i> My Review</a> </li>
        <li><a href="my_account.php"><i class="fa fa-user fa-fw"></i> My Account</a> </li>
        <li><a href="address.php"><i class="fa fa-map-marker fa-fw"></i> Address Book</a> </li>
      </ul>
    </nav>
  </div>
  <div class="col-sm-10">
    <h3 class="page-header" style=" margin-top:0; margin-bottom:1"><i class="fa fa-list-alt fa-fw"></i>Recent Order</h3>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade in active" id="recent">
        <div class="panel-group" id="accordion">
          <?php
	$result=mysqli_query($conn,"SELECT `order`.*, restaurant.rest_name
								FROM `order`
								INNER JOIN restaurant ON `order`.`rest_id`=restaurant.rest_id
								WHERE `order`.user_id='$user_id' ORDER BY `order`.order_date DESC, `order`.order_time DESC;");
	
	while($row=mysqli_fetch_array($result)){
		$orderlist=$row['order_list']; 
		$date=$row['order_date']." ".$row['order_time'];?>
          <div class="panel panel-default">
            <div class="panel-body">
              <table width="100%">
                <tr>
                  <td width="30%"> Order id : <?php echo $row['order_id'] ?></td>
                  <td width="47%"> Restaurant : <a href="restaurant.php?rest_id=<?php echo $row['rest_id'] ?>"><?php echo $row['rest_name'] ?></a></td>
                  <td rowspan="2" width="23%">
                  	<?php 
					$yesterday=date("Y-m-d",strtotime("-1 days"));
					if($row['order_date']>=$yesterday){
						?><a type="button" class="btn btn-success" href="chat.php?order_id=<?php echo $row['order_id'] ?>&user_id=<?php echo $user_id ?>">Chat</a><?php
					}   ?>
                  	
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['order_id'] ?>">Click for more info</button></td>
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
          <?php
	}?>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<?php include ("footer.php"); ?>