<?php 
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='storks4dmin-seller@gmail.com'; // Business email ID

include("header.php");
include_once("session.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI']; // i.e. "about.php"

if(!isset($_SESSION['email'])){
	include("navbar1.php"); 
	include("login_signup.php"); 
} else {
	include("navbar.php"); 
	$email = $_SESSION['email'];
}

$rest_id = $_GET["rest_id"];
if(isset($_GET["user_id"])){
	$user_id = $_GET["user_id"];
}

include("cart.php");
$order_list = "";
foreach($_SESSION["shopping_cart"] as $keys => $values){
	$order_list = $order_list.$values["item_id"]."-".$values["item_name"]."-". $values["item_price"]."-".$values["item_quantity"].";";
}




if(isset($_GET["review"])){
	$_SESSION["review"]=$_GET["review"];
}
if(isset($_GET["type"])){
	if($_GET["type"]=="2"){
		if($_GET["date"] == ""){
			unset($_SESSION["review"]);
			?>
<script>alert("Please fill out date feild!!!");
			window.history.go(-1);</script>
<?php
		} else if($_GET["time"] == ""){
			unset($_SESSION["review"]);
			?>
<script>alert("Please fill out time feild!!!");
			 window.history.go(-1);</script>
<?php
		}
	}
}?>

<!-- new section-->

<section>
  <div class="container" style="margin-top:100px;">
    <div class="row">
      <center>
        <button type="button" class="btn <?php if(isset($_SESSION["email"])){ echo "btn-success"; }else{ echo "btn-default"; } ?> btn-circle" disabled="disabled">
        <?php if(isset($_SESSION["email"])){ ?>
        <i class="fa fa-check"></i>
        <?php }else{ ?>
        1
        <?php } ?>
        </button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn <?php if(isset($_SESSION["review"])){ echo "btn-success"; }else{ echo "btn-default"; } ?> btn-circle" disabled="disabled">
        <?php if(isset($_SESSION["review"])){ ?>
        <i class="fa fa-check"></i>
        <?php }else{ ?>
        2
        <?php } ?>
        </button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-default btn-circle" disabled="disabled">3</button>
        <br />
        Your Detail &nbsp;&nbsp;
        Review Order  &nbsp;&nbsp;
        Place Order &nbsp;&nbsp;
      </center>
    </div>
  </div>
</section>
<div class="container">
  <?php
if(!isset($_SESSION["email"])){ ?>
  <!---------- Login SIgn Up ---------------------------------------------------------->
  
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="panel-body"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li><a href="#signup2" data-toggle="tab">
              <h4><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Sign Up &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </strong></h4>
              </a> </li>
            <li class="active"><a href="#login2" data-toggle="tab">
              <h4><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Log In &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </strong></h4>
              </a> </li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="login2">
              <table width="100%">
                <tr>
                  <td height="20px"></td>
                </tr>
                <tr>
                  <td colspan="3"><?php include('fb.php'); ?>
                  </td>
                
                  </tr>
                
                <tr>
                  <td height="20px"></td>
                </tr>
                <tr>
                  <td colspan="3"><p>------------------------------------------- OR --------------------------------------------</p></td>
                </tr>
                <form method="post" action="login.php">
                  <tr>
                    <td colspan="3"><input class="form-control" type="email" name="email" placeholder="Email" required="required">
                      <input class="form-control" type="hidden" name="url" value="<?php echo $_SESSION['url']; ?>"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input class="form-control" type="password" name="password" placeholder="Password" required="required"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="pull-right"><a href="forgot_password.php" class="list-inline">Forgot your password?</a></td>
                    <td width="10"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input type="submit" class="btn btn-success btn-lg btn-block" value="Login"  /></td>
                  </tr>
                </form>
                <tr>
                  <td></td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade " id="signup2">
              <table width="100%">
                <tr>
                  <td height="20px"></td>
                </tr>
                <form method="post" action="signup.php">
                  <tr>
                    <td><input class="form-control" type="text" name="fname" placeholder="First Name"></td>
                    <td width="20"></td>
                    <td><input class="form-control" type="text" name="lname" placeholder="Last Name"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input class="form-control" name="contact" type="text" placeholder="Phone Number"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input class="form-control"  name="email" type="email" placeholder="Email"></td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><table width="100%">
                        <tr>
                          <td width="89%"><input class="form-control" type="password" id="password" name="password" placeholder="Password"></td>
                          <td width="20px"></td>
                          <td><button type="button" onclick="showHide()" class="btn btn-outline btn-primary btn-sm" id="eye"><i class="fa fa-eye"></i></button></td>
                          <script> 
										function show() {
											var p = document.getElementById('password');
											p.setAttribute('type', 'text');
										}
										
										function hide() {
											var p = document.getElementById('password');
											p.setAttribute('type', 'password');
										}
										
										var pwShown = 0;
										
										document.getElementById("eye").addEventListener("click", function () {
											if (pwShown == 0) {
												pwShown = 1;
												show();
											} else {
												pwShown = 0;
												hide();
											}
										}, false);
										</script> 
                        </tr>
                      </table>
                    <td>
                  </tr>
                  <tr>
                    <td height="20px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><input type="submit" value="Sign Up" class="btn btn-success btn-lg btn-block" /></td>
                  </tr>
                </form>
                <tr>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
        
      </div>
    </div>
  </div>
  <?php
	
} else if(!isset($_SESSION["review"])){ ?>
  <div class="col-sm-6 col-md-offset-1 ">
    <div class="modal-dialog" style="width:500px"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <?php
	include_once("connect.php");
    $result = mysqli_query($conn,"SELECT * FROM restaurant WHERE rest_id = '$rest_id'");
	$rows=mysqli_fetch_array($result);?>
          <table width="100%">
            <tr>
              <td  height="4"></td>
            </tr>
            <tr>
              <td width="1%"></td>
              <td rowspan="3" width="10%"><img src="images/default_profile.jpg" height="89px" width="89px" /></td>
              <td width="2%"></td>
              <td><font color="#000000" size="+2" face="Trebuchet MS, Arial, Helvetica, sans-serif"><?php echo $rows['rest_name']; ?></font></td>
              <td rowspan="3" width="5%"></td>
            </tr>
            <tr>
              <td width="1%"></td>
              <td width="2%"></td>
              <td><font color="#666666" size="-1">
                <?php 
												if($rows['open'] == 1){
													echo 'Open Restaurant,  ';
												} 
												if($rows['delivery'] == 1){
													echo 'Delivery Available,  ';
													if($rows['delivery_fee'] == "0.00"){
														echo 'Free Delivery,  ';
													} 
												}
												if($rows['halal'] == 1){
													echo 'Halal.';
												} 
												if($rows['non_halal'] == 1){
													echo 'Non Halal.';
												}
											?>
                </font></td>
            </tr>
            <tr>
              <td width="1%"></td>
              <td width="2%"></td>
              <td><table>
                  <tr>
                    <td> $$$ </td>
                    <td width="10%"></td>
                    <td> ***** </td>
                  </tr>
                </table></td>
            </tr>
          </table>
        </div>
        <div class="modal-body">
          <div style="overflow-y:auto; overflow-x:hidden; height:250px;">
            <table class="table table-hover" width="100%">
              <?php 
	$total = 0;
    foreach($_SESSION["shopping_cart"] as $keys => $values){?>
              <tr>
                <td width="28%" align="center" ><a class="fa fa-plus-circle alert-success" href="order.php?rest_id=<?php echo $rest_id ?>&amp;action=add&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a> <?php echo $values["item_quantity"]; ?> <a class="fa fa-minus-circle alert-danger" href="order.php?rest_id=<?php echo $rest_id ?>&amp;action=remove&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a></td>
                <td><?php echo $values["item_name"]; ?></td>
                <td>RM<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                <td><a class="fa fa-trash-o alert-danger" href="order.php?rest_id=<?php echo $rest_id ?>&amp;action=delete&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a></td>
              </tr>
              <?php  
    $total = $total + ($values["item_quantity"] * $values["item_price"]);
	}?>
            </table>
          </div>
          <table width="100%">
            <tr>
              <td width="5%"></td>
              <td> Total </td>
              <td class="pull-right"><h2 style="color:#000">RM<?php echo number_format($total, 2); ?></h2></td>
              <td width="5%"></td>
            </tr>
            <tr>
              <td width="5%"></td>
              <td colspan="2"><?php 
		if($total < 15){
			echo '<script>window.location="restaurant.php?rest_id='.$rest_id.'"</script>';
		}?></td>
              <td width="5%"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="modal-dialog" style="width:300px"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>ORDER INFORMATION</h4>
        </div>
        <div class="modal-body">
          <form action="order.php" method="GET">
            <div>
              <div>
                <hr style="width:auto; color:#CCCCCC; margin-top:0px; margin-bottom:5px" />
                <input type="hidden" name="rest_id" value="<?php echo $rest_id; ?>"  />
                <label> <font color="#006600" >Delivery</font><br />
                </label>
                <input class="control-form" type="radio" name="type" id="credit" value="1" required <?php if($rows["delivery"]=="0"){ echo 'disabled="disabled"'; } ?>>
                <div class="forcredit details"> <font size="-1" color="#999999">Your order will be delivered to your address.</font>
                  <hr style="width:auto; color:#CCCCCC; margin-top:0px; margin-bottom:0px" />
                </div>
              </div>
              <div>
                <hr style="width:auto; color:#CCCCCC; margin-top:0px; margin-bottom:5px" />
                <label> <font color="#006600" > Booking</font><br />
                </label>
                <input class="control-form" type="radio" name="type" id="debit" value="2" required >
                <div class="fordebit details">
                  <label>Date</label>
                  <input class="form-control" type="date" placeholder="Date" value="<?php echo date("Y-m-d")?>" disabled>
                  <input class="form-control" type="hidden" name="date" placeholder="Date" value="<?php echo date("Y-m-d")?>">
                  <br />
                  <label>Time</label>
                  <input class="form-control" type="time" name="time" placeholder="Time">
                  <br />
                  <hr style="width:auto; color:#CCCCCC; margin-top:5px; margin-bottom:0px" />
                </div>
                <hr style="width:auto; color:#CCCCCC; margin-top:0px; margin-bottom:5px" />
              </div>
            </div>
            <br />
            <input type="hidden" name="review" value="1"  />
            <input type="submit" value="DONE" class="btn btn-success btn-lg btn-block"/>
          </form>
          <br />
        </div>
      </div>
    </div>
  </div>
  <?php	
} else { ?>
  <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <br />
    <div class="col-sm-7 col-md-offset-1">
      <div class="panel panel-success">
        <div class="panel-header">
          <h3 style="color:#000; margin-left:15px"> My Contact Details</h3>
          <hr style="width:auto; border-top: 1px solid #ddd; margin-top:0px; margin-bottom:5px" />
        </div>
        <div class="panel-body">
          <?php
        	$profile = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
			$row_profile = mysqli_fetch_array($profile);
			$user_id=$row_profile["id"];?>
          <table width="100%">
            <tr>
              <td height="30"><b>Full Name</b></td>
              <td><?php echo $row_profile["first_name"]." ".$row_profile['last_name']; ?></td>
            </tr>
            <tr>
              <td height="30"><b>Email</b></td>
              <td><?php echo $row_profile["email"] ?></td>
            </tr>
            <tr>
              <td height="30"><b>Mobile</b></td>
              <td><?php if($row_profile["contact"] == ""){ ?>
                <input class="form-control" type="text" name="contact" placeholder="Enter your mobile phone number!!!" required>
                <?php }else{echo $row_profile["contact"]; ?>
                <input type="hidden" name="contact" value="<?php $row_profile["contact"];  ?>" <?php } ?></td>
            </tr>
            <tr>
              <td height="30"></td>
              <td><a style="color:#d9534f" href="logout.php"><u>Not <?php echo $row_profile["first_name"]." ".$row_profile['last_name']; ?>? Log out.</u></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php
    if(isset($_GET['type'])){ 
		if($_GET['type'] == "1"){?>
      <div class="panel panel-success" style="margin-top:20px">
        <div class="panel-header">
          <h3 style="color:#000; margin-left:15px"> Your delivery address</h3>
          <hr style="width:auto; border-top: 1px solid #ddd; margin-top:0px; margin-bottom:5px" />
        </div>
        <div class="panel-body"> <font style="color:red;">*</font><i style=" color:#CCCCCC;" > Required fields </i> <br />
          <font style="color:red;">* </font><b>Address</b> <br />
          <input class="form-control" type="text" name="address" value="<?php $row_profile["contact"];  ?>" placeholder="Full address!!!" required>
          <br />
          <font style="color:red;">* </font><b>City</b><br />
          <input class="form-control" type="text" name="city" placeholder="City!!!" required>
          <br />
          <font style="color:red;">* </font><b>State</b><br />
          <input class="form-control" type="text" name="state" placeholder="Area!!!" required>
          <br />
          <font style="color:red;">* </font><b>Postcode</b><br />
          <input class="form-control" type="text" name="postcode" placeholder="Postcode!!!" required>
          <br />
        </div>
      </div>
      <?php
		}
	} ?>
      <div class="panel panel-success" style="margin-top:20px">
        <div class="panel-header">
          <h3 style="color:#000; margin-left:15px"> Online Banking Only Available</h3>
          <hr style="width:auto; border-top: 1px solid #ddd; margin-top:0px; margin-bottom:5px" />
        </div>
        <div class="panel-body">
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            You will be redirected to secure payment page of our partner PayPal. </div>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-success"  data-spy="affix" data-offset-top="90" style=" top: 90px; width: 265px;">
        <center>
          <h3 style="color:#000;"><i class="fa  fa-shopping-cart"></i> Your Order </h3>
        </center>
        <?php   
          	$total = 0; ?>
        <div style="overflow-y:auto; overflow-x:hidden; height:250px;">
          <table class="table table-hover" width="100%">
            <?php 
          	foreach($_SESSION["shopping_cart"] as $keys => $values){?>
            <tr>
              <td align="center" width="20%" ><?php echo $values["item_quantity"]; ?><span class="text-danger"> X </span></td>
              <td><span class="text-info"><?php echo $values["item_name"]; ?></span></td>
              <td><span class="text-success">RM<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></span></td>
            </tr>
            <?php  
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
			  
			}?>
          </table>
        </div>
        <table width="100%">
          <?php
	  	$result = mysqli_query($conn,"SELECT * FROM restaurant WHERE rest_id = '$rest_id'");
		$rows=mysqli_fetch_array($result) ;
		if($_GET["type"]=="1"){ 
			if($rows["delivery_fee"]=="0.00"){?>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">Subtotal</font></td>
            <td class="pull-right">RM<?php echo number_format($total, 2); ?></td>
            <td width="5%"></td>
          </tr>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">Delivery Fee</font></td>
            <td class="pull-right">Free</td>
            <td width="5%"></td>
          </tr>
          <?php
			} else {?>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">Subtotal</font></td>
            <td class="pull-right">RM<?php echo number_format($total, 2); ?></td>
            <td width="5%"></td>
          </tr>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">Delivery Fee</font></td>
            <td class="pull-right">RM <?php echo $rows['delivery_fee'] ?></td>
            <td width="5%"></td>
          </tr>
          <?php
			$total=$total+5.00;
			}
		} else {?>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">Subtotal</font></td>
            <td class="pull-right">RM<?php echo number_format($total, 2); ?></td>
            <td width="5%"></td>
          </tr>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">Delivery Fee</font></td>
            <td class="pull-right">None</td>
            <td width="5%"></td>
          </tr>
          <?php
		}
		?>
          <tr>
            <td width="5%"></td>
            <td><font color="#999999">TOTAL</font></td>
            <td class="pull-right"><span class="text-success">
              <h2>RM<?php echo number_format($total, 2); ?></h2>
              </span></td>
            <td width="5%"></td>
          </tr>
          <tr>
            <td width="5%"></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-sm-7 col-md-offset-1">
    <div class="panel panel-success" style="margin-top:20px">
    <div class="panel-body">
    <div class="col-sm-6 pull-right">
    <div class="panel" style="background-color: #ddd;">
      <div class="panel-header" style="margin:10px">
        <p>TOTAL
        <h3>RM<?php echo number_format($total, 2); ?></h3>
        </p>
      </div>
    </div>
    <br />
    
    <input type="hidden" name="type" value="<?php echo $_GET["type"]; ?>"  />
    <input type="hidden" name="order_list" value="<?php echo $order_list; ?>"  />
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"  />
    <input type="hidden" name="rest_id" value="<?php echo $_GET["rest_id"]; ?>"  />
    <input type="hidden" name="date" value="<?php echo $_GET["date"]; ?>"  />
    <input type="hidden" name="time" value="<?php echo $_GET["time"]; ?>"  />
    <input type="hidden" name="total" value="<?php echo $total; ?>"  />
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="FoodStorks Payment">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo $total; ?>">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="MYR">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://localhost/foodstorks/index.php">
    <input type="hidden" name="return" value="http://localhost/foodstorks/place_order.php?type=<?php echo $_GET["type"]; ?>&order_list=<?php echo $order_list; ?>&user_id=<?php echo $user_id; ?>&rest_id=<?php echo $_GET["rest_id"]; ?>&date=<?php echo $_GET["date"]; ?>&time=<?php echo $_GET["time"]; ?>&total=<?php echo $total; ?>">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form>
</div>
</div>
</div>
<br />
</div>
<?php
}
 ?>
</div>
<!-- copyright section -->
<section id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>Food Storks</h3>
        <p>Copyright © Zentro Restaurant and Cafe 
          
          | Design: <a rel="nofollow" href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
      </div>
    </div>
  </div>
</section>

<!-- JAVASCRIPT JS FILES --> 
<script src="js1/jquery.js"></script> 
<script src="js1/bootstrap.min.js"></script> 
<script src="js1/jquery.parallax.js"></script> 
<script src="js1/smoothscroll.js"></script> 
<script src="js1/nivo-lightbox.min.js"></script> 
<script src="js1/wow.min.js"></script> 
<script src="js1/custom.js"></script>
</body></html>