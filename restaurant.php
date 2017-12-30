<?php 
include("header.php");
include_once("session.php");
$rest_id = $_GET['rest_id'];
include("cart.php");
include_once("connect.php");
unset($_SESSION["review"]);
$rest_query=mysqli_query($conn,"select * from restaurant where rest_id='$rest_id' ")or die(mysql_error());
$rowrest=mysqli_fetch_array($rest_query);

if(!isset($_SESSION['email'])){
	$user_id="0";
	?>
<!-- navigation section -->

<section class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand"><img src = "images/logo.png"  height = "100%" /><img /> foodStorks</a> </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li> <a href="#contact" class="smoothScroll"> <i class="fa fa-phone fa-fw"></i> Contact Us <img width="8px" src="images/clear.png" /> </a> </li>
        <li> <a data-toggle ="modal" href="#signup"> <i class="fa fa-user fa-fw"></i> Log in or Sign Up <img width="8px" src="images/clear.png" /> </a> </li>
      </ul>
    </div>
  </div>
</section>
<?php
	include("login_signup.php"); 
} else { ?>
<!-- navigation section -->
<section class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand"><img src = "images/logo.png"  height = "100%" ><img> foodStorks</a> </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <?php 
						include("connect.php");
						$query = mysqli_query($conn,"select id,picture from users where email = '".$_SESSION['email']."'")or die(mysql_error());
						$row=mysqli_fetch_array($query);
						$user_id=$row[0];
						if($row[1] != NULL){
							?>
          <img width="45px" src=" <?php echo $row[1]; ?>" alt="User Avatar" class="img-circle" />
          <?php
						} else {
							?>
          <img width="45px" src="images/default_profile.jpg" alt="User Avatar" class="img-circle" />
          <?php
						}
					?>
          <?php echo $_SESSION['email'] ?> <i class="fa fa-caret-down"></i> </a>
          <ul class="dropdown-menu dropdown-user">
              <li><a href="recent_order.php"><i class="fa fa-list-alt fa-fw"></i> Recent Order</a> </li>
              <li><a href="my_review.php"><i class="fa fa-star fa-fw"></i> My Review</a> </li>
              <li><a href="my_account.php"><i class="fa fa-user fa-fw"></i> My Account</a> </li>
              <li><a href="address.php"><i class="fa fa-map-marker fa-fw"></i> Address Book</a> </li>
              <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
            </ul>
          <!-- /.dropdown-user --> 
        </li>
      </ul>
    </div>
  </div>
</section>
<?php
}
?>

<!-- home section -->

<section id="restaurant" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <center>
          <div class="panel panel-title" style="width:400px;background-color: rgba(255, 255, 255, 0.85);">
          	<table width="100%">
            	<tr><td colspan="3"><center><h2 style="margin-top:0"><?php echo $rowrest['rest_name'] ?></h2></center></td></tr>
            	<tr><td width="23%"></td><td width="54%">
            <input class="star starview-5" name="starview" id="starview-5" type="radio"  <?php if( $rowrest['rest_rate']==5 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
            <label class="star starview-5" for="starview-5"></label>
            <input class="star starview-4" name="starview" id="starview-4" type="radio" value="4"  <?php if( $rowrest['rest_rate']==4 ){echo "checked='checked'"; }  ?> disabled="disabled" />
            <label class="star starview-4" for="starview-4"></label>
            <input class="star starview-3" name="starview" id="starview-3" type="radio" value="3" <?php if( $rowrest['rest_rate']==3 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
            <label class="star starview-3" for="starview-3"></label>
            <input class="star starview-2" name="starview" id="starview-2" type="radio" value="2"  <?php if( $rowrest['rest_rate']==2 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
            <label class="star starview-2" for="starview-2"></label>
            <input class="star starview-1" name="starview" id="starview-1" type="radio" value="1" <?php if( $rowrest['rest_rate']==1 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
            <label class="star starview-1" name="starview" for="starview-1"></label></td><td><font color="#666666" size="-1">(<?php echo $rowrest['total_rate'] ?>)</font></td></tr>
            </table>
            
            
          </div>
          <div class="panel-footer" style="width:400px;">
            <font color="#666666" size="-1">
              <?php 
							if($rowrest['open'] == 1){
								echo 'Open Restaurant,  ';
							} 
							if($rowrest['delivery'] == 1){
								echo 'Delivery Available,  ';
								if($rowrest['delivery_fee'] == "0.00"){
									echo 'Free Delivery,  ';
								} 
							} 
							
							if($rowrest['halal'] == 1){
								echo 'Halal.';
							} 
							if($rowrest['non_halal'] == 1){
								echo 'Non Halal.';
							}?>
              </font>
          </div>
        </center>
      </div>
    </div>
  </div>
</section>
<br />
<div class="container">
  <ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="search.php?state=<?php echo $rowrest['rest_state'] ?>&city=<?php echo $rowrest['rest_city'] ?>">Restaurants</a></li>
    <li><?php echo $rowrest['rest_name'] ?></li>
  </ul>
</div>
<div class="container">
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
            
            <!------------------------------------------------------------- Restaurant Menu --------------------------------------------------->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="menu1"><br />
                <table width="100%">
                  <tr> 
                    
                    <!-- Right navbar Category -->
                    <td width="20%" valign="top"><nav id="myScrollspy">
                        <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="500"  style=" top: 10px; width: 160px;">
                          <?php
            			$cat_query=mysqli_query($conn,"select * from category where rest_id='$rest_id' ")or die(mysql_error());
						while($rowcat=mysqli_fetch_array($cat_query)){?>
                          <li><a href="#<?php echo $rowcat['cat_id']; ?>"><?php echo $rowcat['cat_name']; ?></a></li>
                          <?php } ?>
                        </ul>
                      </nav></td>
                    <td width="3%"></td>
                    
                    <!----------------------------------- Menu -------------------------->
                    <td width="77%"><?php 
					$cat_query=mysqli_query($conn,"select * from category where rest_id='$rest_id' ")or die(mysql_error());
					while($rowcat=mysqli_fetch_array($cat_query)){
						$cat_id=$rowcat['cat_id']; ?>
                      <div id="<?php echo $rowcat['cat_id']; ?>">
                        <h3 style="color:#000;"><?php echo $rowcat['cat_name']; ?></h3>
                        <img src="upload/<?php echo $rowcat['cat_image']; ?>" width="100%" height="100px" />
                        <?php
						$item_query=mysqli_query($conn,"select * from item where cat_id='$cat_id' ORDER BY item_price DESC ")or die(mysql_error());?>
                        <table class="table table-hover" width="100%">
                          <?php
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
                          </tr>
                          <?php 
						}?>
                        </table>
                      </div>
                      <?php 
					  } 
					  ?></td>
                  </tr>
                </table>
              </div>
              
              <!------------------------------------------------------------- Review --------------------------------------------------->
              <div class="tab-pane fade" id="review" style="min-height:400px">
                <?php 
				$queryrev =mysqli_query($conn,"select * from review where user_id='$user_id' AND rest_id='$rest_id' ")or die(mysql_error());
				if(mysqli_num_rows($queryrev)==1){
					$rowrev=mysqli_fetch_array($queryrev)?>
                <table width="100%">
                  <tr>
                    <td><h4>Thank you for review our restaurant.</h4></td>
                  </tr>
                  <tr>
                    <td>Your rate at this restaurant</td>
                  </tr>
                    <tr>
                  
                    <td class="pull-left">
                  
                  <form action="review.php" method="POST">
                    <input class="star star-5" id="star-5" type="radio" value="5" name="star" <?php if( $rowrev['review_star']==5 ){echo "checked='checked'"; }  ?>/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" value="4" name="star" <?php if( $rowrev['review_star']==4 ){echo "checked='checked'"; }  ?> />
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" value="3" name="star" <?php if( $rowrev['review_star']==3 ){echo "checked='checked'"; }  ?>/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" value="2" name="star" <?php if( $rowrev['review_star']==2 ){echo "checked='checked'"; }  ?>/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" value="1" name="star" <?php if( $rowrev['review_star']==1 ){echo "checked='checked'"; }  ?>/>
                    <label class="star star-1" for="star-1"></label>
                      </td>
                    
                      </tr>
                    
                    <tr>
                      <td>Review Title(Optional)</td>
                    </tr>
                    <tr>
                      <td><input class="form-control" type="text" width="100%" name="title" placeholder="Type review title here." value="<?php echo $rowrev['review_title'] ?>"></td>
                    </tr>
                    <tr>
                      <td>Review description</td>
                    </tr>
                    <tr>
                      <td><textarea rows="4" class="form-control" name="desc" placeholder="Type review description here."><?php echo $rowrev['review_desc'] ?></textarea></td>
                    </tr>
                    <tr>
                      <td class="pull-right"><input class="btn btn-warning" type="submit" name="edit" value="Edit" /></td>
                    </tr>
                    <input type="hidden" name="rest_id" value="<?php echo $rest_id ?>" />
                    <input type="hidden" name="user_id" value="<?php echo $user_id  ?>" />
                  </form>
                </table>
                <?php
				} else {?>
                <table width="100%">
                  <tr>
                    <td><h4>Please share your experience about this restaurant.</h4></td>
                  </tr>
                  <tr>
                    <td>Rate this restaurant</td>
                  </tr>
                    <tr>
                  
                    <td class="pull-left">
                  
                  <form action="review.php" method="POST">
                    <input class="star star-5" id="star-5" type="radio" value="5" name="star" required="required"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                    <label class="star star-1" for="star-1"></label>
                      </td>
                    
                      </tr>
                    
                    <tr>
                      <td>Review Title(Optional)</td>
                    </tr>
                    <tr>
                      <td><input class="form-control" type="text" width="100%" name="title" placeholder="Type review title here."></td>
                    </tr>
                    <tr>
                      <td>Review description</td>
                    </tr>
                    <tr>
                      <td><textarea rows="4" class="form-control" name="desc" placeholder="Type review description here."></textarea></td>
                    </tr>
                    <tr>
                      <td class="pull-right"><input class="btn btn-warning" type="submit" name="submit" value="Submit" /></td>
                    </tr>
                    <input type="hidden" name="rest_id" value="<?php echo $rest_id ?>" />
                    <input type="hidden" name="user_id" value="<?php echo $user_id  ?>" />
                  </form>
                </table>
                <?php
                } ?>
                <br />
                <table width="100%" class="table table-hover">
                  <?php	
				$reviewquery=mysqli_query($conn,"	SELECT review.*,users.id,users.email 
													FROM review 
													INNER JOIN users ON review.user_id=users.id 
													where rest_id='$rest_id' 
													ORDER BY review_date DESC "
										)or die(mysql_error());
					while($rowreview=mysqli_fetch_array($reviewquery)){?>
                  <tr>
                    <td><table width="100%">
                        <tr>
                          <td width="20%"><font face="Comic Sans MS, cursive" color="#000000"><?php echo date("F j, Y", strtotime( $rowreview['review_date'] )); ?></font></td>
                          <td class="pull-left"><input class="star star-5" id="star-5" type="radio" value="5" name="star<?php echo $rowreview['review_id']  ?>" <?php if( $rowreview['review_star']==5 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" value="4" name="star<?php echo $rowreview['review_id']  ?>" <?php if( $rowreview['review_star']==4 ){echo "checked='checked'"; }  ?> disabled="disabled" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" value="3" name="star<?php echo $rowreview['review_id']  ?>" <?php if( $rowreview['review_star']==3 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" value="2" name="star<?php echo $rowreview['review_id']  ?>" <?php if( $rowreview['review_star']==2 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" value="1" name="star<?php echo $rowreview['review_id']  ?>" <?php if( $rowreview['review_star']==1 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-1" for="star-1"></label></td>
                        </tr>
                        <tr>
                          <td><font color="#666666">by
                            <?php $name = explode( "@" , $rowreview['email'] ); echo $name[0]; ?>
                            </font></td>
                          <td><b><?php echo $rowreview['review_title']  ?></b><br />
                            <font face="Comic Sans MS, cursive" color="#000000"><?php echo $rowreview['review_desc']  ?></font></td>
                        </tr>
                      </table></td>
                  </tr>
                  <?php
						
					}
				?>
                </table>
              </div>
              
              <!------------------------------------------------------ Restaurant Info ------------------------------------------------------->
              <div class="tab-pane fade" id="info"> <br />
                <table width="100%">
                  <tr>
                    <td colspan="3"><b><font size="+2" color="#000000" ><i class="fa fa-cutlery fa-fw"></i> <?php echo $rowrest['rest_name']; ?> Information</font></b></td>
                  </tr>
                  <tr>
                    <td height="10px"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><font color="#999999">
                      <?php 
							if($rowrest['open'] == 1){
								echo 'Open Restaurant,  ';
							} 
							if($rowrest['delivery'] == 1){
								echo 'Delivery Available,  ';
								if($rowrest['delivery_fee'] == "0.00"){
									echo 'Free Delivery,  ';
								} 
							} 
							
							if($rowrest['halal'] == 1){
								echo 'Halal.';
							} 
							if($rowrest['non_halal'] == 1){
								echo 'Non Halal.';
							}?>
                      </font></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" width="65%"><hr style="width:100%;border-top: 1px solid #eee;" />
                      <h4><i class="fa fa-clock-o fa-fw"></i> <b>Open Hours</b></h4>
                      <table width="100%">
                        <tr <?php if(date('w')==7){ echo 'bgcolor="#eee"'; } ?>>
                          <td width="2%" height="30px"></td>
                          <td width="73%"><i>Sunday</i></td>
                          <td width="25%"><?php echo date('h:i a', strtotime($rowrest['start7']))." - ".date('h:i a', strtotime($rowrest['end7'])); ?></td>
                        </tr>
                        <tr <?php if(date('w')==1){ echo 'bgcolor="#eee"'; } ?>>
                          <td height="30px"></td>
                          <td><i>Monday</i></td>
                          <td><?php echo date('h:i a', strtotime($rowrest['start1']))." - ".date('h:i a', strtotime($rowrest['end1'])); ?></td>
                        </tr>
                        <tr <?php if(date('w')==2){ echo 'bgcolor="#eee"'; } ?>>
                          <td height="30px"></td>
                          <td><i>Tuesday</i></td>
                          <td><?php echo date('h:i a', strtotime($rowrest['start2']))." - ".date('h:i a', strtotime($rowrest['end2'])); ?></td>
                        </tr>
                        <tr <?php if(date('w')==3){ echo 'bgcolor="#eee"'; } ?>>
                          <td height="30px"></td>
                          <td><i>Wednesday</i></td>
                          <td><?php echo date('h:i a', strtotime($rowrest['start3']))." - ".date('h:i a', strtotime($rowrest['end3'])); ?></td>
                        </tr>
                        <tr <?php if(date('w')==4){ echo 'bgcolor="#eee"'; } ?>>
                          <td height="30px"></td>
                          <td><i>Thursday</i></td>
                          <td><?php echo date('h:i a', strtotime($rowrest['start4']))." - ".date('h:i a', strtotime($rowrest['end4'])); ?></td>
                        </tr>
                        <tr <?php if(date('w')==5){ echo 'bgcolor="#eee"'; } ?>>
                          <td height="30px"></td>
                          <td><i>Friday</i></td>
                          <td><?php echo date('h:i a', strtotime($rowrest['start5']))." - ".date('h:i a', strtotime($rowrest['end5'])); ?></td>
                        </tr>
                        <tr <?php if(date('w')==6){ echo 'bgcolor="#eee"'; } ?>>
                          <td height="30px"></td>
                          <td><i>Saturday</i></td>
                          <td><?php echo date('h:i a', strtotime($rowrest['start6']))." - ".date('h:i a', strtotime($rowrest['end6'])); ?></td>
                        </tr>
                      </table></td>
                    <td width="5%"></td>
                    <td align="left" valign="top" width="30%"><hr style="width:100%;border-top: 1px solid #eee;" />
                      <h4> <i class="fa fa-truck fa-fw"></i> <b>Delivery</b> </h4>
                      <?php
                        if($rowrest['delivery'] == 1){
							echo '&nbsp &nbsp &nbsp Delivery Available ';
						}else{
							echo '&nbsp &nbsp &nbsp Not Available ';
						} ?>
                      <br />
                      <br />
                      <br />
                      <?php
                        if($rowrest['delivery'] == 1){ ?>
                      <h4><i class="fa fa-dollar fa-fw"></i> <b>Delivery Fee</b></h4>
                      <?php
							if($rowrest['delivery_fee'] == "0.00"){
								echo '&nbsp &nbsp &nbsp  Free ';
							}else{
								echo '&nbsp &nbsp &nbsp  RM '.$rowrest['delivery_fee'];
							}
                        } ?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" width="65%" height="100px"><hr style="width:100%;border-top: 1px solid #eee;" />
                      <h4> <i class="fa fa-map-marker fa-fw"></i> <b>Address</b> </h4>
                      &nbsp &nbsp &nbsp <?php echo strtoupper($rowrest['rest_address'])?><br />
                      &nbsp &nbsp &nbsp <?php echo strtoupper($rowrest['rest_postcode']." ".$rowrest['rest_city'].",")?><br />
                      &nbsp &nbsp &nbsp <?php echo strtoupper($rowrest['rest_state'].".")?></td>
                    <td width="5%"></td>
                    <td align="left" valign="top" width="30%"><hr style="width:100%;border-top: 1px solid #eee;" />
                      <h4><i class="fa fa-money fa-fw"></i> <b>Payment Types</b></h4>
                      &nbsp &nbsp &nbsp Online Card Payment </td>
                  </tr>
                  <tr>
                    <td colspan="3"><hr style="width:100%;border-top: 1px solid #eee;" />
                      <h4> <i class="fa fa-table fa-fw"></i> <b>Floor Plan</b> </h4>
                      <br />
                      <div>
                        <?php
                        $result=mysqli_query($conn,"SELECT * FROM floorplan WHERE rest_id=$rest_id") or die(mysqli_error($conn));
		
		while($row=mysqli_fetch_array($result)){?>
                        <div class="col-lg-3">
                          <div class="panel panel-default">
                            <table width="100%">
                              <tr>
                                <td height="10px"></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center"><button type="button" class="btn btn-<?php if( $row['table_status']=="Available"){ echo "info"; }else if( $row['table_status']=="Occupied"){ echo "success";}else{ echo "danger"; } ?> btn-circle btn-xl"><?php echo $row['table_no'] ?></button></td>
                              </tr>
                              <tr>
                                <td width="50%" align="center">Table <?php echo $row['table_no'] ?></td>
                                <td align="center"><?php echo $row['table_status'] ?></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <?php
		} ?>
                      </div></td>
                  </tr>
                </table>
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
        <div style="overflow-y:auto; overflow-x:hidden; height:280px;">
          <table class="table table-hover" width="100%">
            <?php 
          	foreach($_SESSION["shopping_cart"] as $keys => $values){?>
            <tr>
              <td width="28%" align="center" ><a class="fa fa-plus-circle alert-success" href="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;action=add&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a> <?php echo $values["item_quantity"]; ?> <a class="fa fa-minus-circle alert-danger" href="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;action=remove&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a></td>
              <td><?php echo $values["item_name"]; ?></td>
              <td>RM<?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
              <td><a class="fa fa-trash-o alert-danger" href="restaurant.php?rest_id=<?php echo $rest_id ?>&amp;action=delete&amp;id=<?php echo $values["item_id"]; ?>"><span class="text-danger"></span></a></td>
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
            <td colspan="2">
          
            <form action="order.php" method="get">
          
          <input type="hidden" name="rest_id" value="<?php echo $rest_id ?>"  />
          <?php
							
							if($total < 15){ ?>
          <input type="submit" value="ORDER" class="btn btn-default btn-lg btn-block" disabled="disabled" />
          <p></p>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <center>
                <font size="-1">Below minimum order of RM15.00 <br />
                Add more menu items</font>
              </center>
            </div>
          </div>
          <?php
							} else { ?>
          <input type="submit" value="ORDER" class="btn btn-success btn-lg btn-block"/>
          <?php
							}
							?>
          <br />
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
<br />

<?php include("footer.php") ?>