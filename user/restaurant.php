<?php 
include("header.php");
include("session.php");
$rest_id = $_GET['rest_id'];
$email = $_SESSION['email'];
include("cart.php");

?>


<!-- navigation section -->
<section class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand"><img src = "../images/logo.png"  height = "100%" ><img> foodStorks</a> </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
        	<a  href="#home" class="smoothScroll">
        	<img width="8px" src="../images/clear.png" />HOME</a>
        </li>
        <li>
        	<a href="#contact" class="smoothScroll">
            <img width="8px" src="../images/clear.png" />CONTACT
            </a>
        </li>
        <li class="dropdown"> 
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
             <?php 
			 	
				include_once("connect.php");
				$query = mysqli_query($conn,"select picture from users where email = '$email'")or die(mysql_error());
				$row=mysqli_fetch_array($query);
				
				if($row[0] != NULL){
					?><img width="45px" src=" <?php echo $row[0]; ?>" alt="User Avatar" class="img-circle" /> <?php
				} else {
					?><img width="45px" src="../images/default_profile.jpg" alt="User Avatar" class="img-circle" /> <?php
				}
			?>
            
            
            MY ACCOUNT <i class="fa fa-caret-down"></i> 
            </a>
    <ul class="dropdown-menu dropdown-user">
      <li><a href="#"><i class="fa fa-user fa-fw"></i> Activity</a> </li>
      <li><a href="#"><i class="fa fa-key fa-fw"></i> My Account</a> </li>
      <li><a href="#"><i class="fa fa-key fa-fw"></i> Address Book</a> </li>
      <li class="divider"></li>
      <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
    </ul>
    <!-- /.dropdown-user --> 
  </li>
      </ul>
    </div>
  </div>
</section>






<!-- home section -->

<section id="restaurant" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12"><center>
      	<div class="panel panel-title" style="width:400px;">
            <h2>Order delivery from 116 restaurants</h2>
            <h5>delivering to your door</h5>
        </div></center>
</div>
    </div>
  </div>
</section>
<br />
<div class="container">
  <ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li>Restaurants</li>
    <li><?php echo $rest_id ?></li>
  </ul>
  <div class="row">
    <div class="col-sm-9">
      <div class="panel panel-success">
        <div class="panel panel-default"> 
          <!-- /.panel-heading -->
          <div class="panel-body"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#menu1" data-toggle="tab">Menu</a> </li>
              <li><a href="#review" data-toggle="tab">Reviews</a> </li>
              <li><a href="#info" data-toggle="tab">Info</a> </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="menu1"><br />
                <table width="100%">
                  <tr> 
                    
                    <!-- Right navbar Category -->
                    <td width="20%" valign="top"><nav id="myScrollspy">
                        <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="500"  style=" top: 10px; width: 160px;">
                          <?php
            			$cat_query=mysqli_query($conn,"select DISTINCT(item_cat) from item where rest_id='$rest_id' ")or die(mysqli_error($conn));
						while($rowcat=mysqli_fetch_array($cat_query)){ ?>
                          <li><a href="#<?php echo $rowcat['item_cat']; ?>"><?php echo $rowcat['item_cat']; ?></a></li>
                          <?php } ?>
                        </ul>
                      </nav></td>
                    <td width="3%"></td>
                    
                    <!----------------------------------- Menu -------------------------->
                    <td width="77%"><?php 
					$cat_query=mysqli_query($conn,"select DISTINCT(item_cat) from item where rest_id='$rest_id' ")or die(mysqli_error());
					while($rowcat=mysqli_fetch_array($cat_query)){ ?>
                      <div id="<?php echo $rowcat['item_cat']; ?>">
                        <h3 style="color:#000;"><?php echo $rowcat['item_cat']; ?></h3>
                      	<img src="images/milkshake.jpg" width="100%" height="100px" />
                        <?php
						$item_cat=$rowcat['item_cat'];
						$item_query=mysqli_query($conn,"select * from item where rest_id='$rest_id' and item_cat='$item_cat' ORDER BY item_price ")or die(mysql_error());?>
						<table class="table table-hover" width="100%"><?php
						while($rowitem=mysqli_fetch_array($item_query)){ ?>
                        	<tr>
                        	<form method="post" action="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;id=<?php echo $rowitem["item_id"]; ?>">
                                <td width="65%"><h4 class="text-info"><?php echo $rowitem["item_name"]; ?></h4></td>
                                <td width="15%"><h4 class="text-danger">RM <?php echo $rowitem["item_price"]; ?></h4></td>
                                <td width="10%"><input type="text" name="quantity" class="form-control" value="1" /></td>
                                <td width="10%"><button type="submit" name="add_to_cart" class="btn btn-success btn-circle" value="Add to Cart"><i class="fa fa-plus"></i></button></td>
                          		<input type="hidden" name="hidden_name" value="<?php echo $rowitem["item_name"]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $rowitem["item_price"]; ?>" />
                          
                        </form>
                        	</tr><?php 
						}?>
                        </table>
                      </div>
                      <?php 
					  } 
					  ?></td>
                  </tr>
                </table>
              </div>
              <div class="tab-pane fade" id="review">
                <h4>Profile Tab</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
              <div class="tab-pane fade" id="info">
                <h4>Messages Tab</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
    </div>
    <div class="col-sm-3">
      <div class="panel panel-success"  data-spy="affix" data-offset-top="455" style=" top: 10px; width: 265px;">
        <center>
          <h3 style="color:#000;"><i class="fa  fa-shopping-cart"></i> Your Order </h3>
        </center>
        
          <?php   
          if(empty($_SESSION["shopping_cart"])){ echo '<center>
          <img src="images/cart.png" width="30%" /><br />
          <h6> Add Menu Item To your Cart </h6>
        </center>
        <br />'; }else{
          	$total = 0; ?>
            <div style="overflow-y:auto; overflow-x:hidden; height:300px;">
        	<table class="table table-hover" width="100%">
            <?php 
          	foreach($_SESSION["shopping_cart"] as $keys => $values){?>
              <tr>
                <td width="28%" align="center" >
                	<a class="fa fa-plus-circle alert-success" href="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;action=add&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a>
					<?php echo $values["item_quantity"]; ?>
                    <a class="fa fa-minus-circle alert-danger" href="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;action=remove&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a></td>
                <td><?php echo $values["item_name"]; ?></td>
                <td>RM<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                <td><a class="fa fa-trash-o alert-danger" href="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;action=delete&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a></td>
              </tr><?php  
              $total = $total + ($values["item_quantity"] * $values["item_price"]);  
            }?>
          	
            </table>
            </div>
            <table width="100%">
            	<tr>
                	<td width="5%"></td>
                	<td>
                    	Total
                    </td>
                    <td class="pull-right">
                    	<h2 style="color:#000">RM<?php echo number_format($total, 2); ?></h2>
                    </td>
                    <td width="5%"></td>
                </tr>
            </table>	
	    <?php  
          }?>
        
      </div>
    </div>
  </div>
</div>




<!-- copyright section -->
<section id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>ZENTRO</h3>
        <p>Copyright © Zentro Restaurant and Cafe 
          
          | Design: <a rel="nofollow" href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
      </div>
    </div>
  </div>
</section>

<!-- JAVASCRIPT JS FILES --> 
<script src="../js1/jquery.js"></script> 
<script src="../js1/bootstrap.min.js"></script> 
<script src="../js1/jquery.parallax.js"></script> 
<script src="../js1/smoothscroll.js"></script> 
<script src="../js1/nivo-lightbox.min.js"></script> 
<script src="../js1/wow.min.js"></script> 
<script src="../js1/custom.js"></script>
</body>
</html>
