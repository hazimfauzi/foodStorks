<?php 
include("header.php");
include_once("session.php");
if(!isset($_SESSION['email'])){
	include("navbar1.php"); 
	include("login_signup.php"); 
} else {
	include("navbar.php"); 
}

unset($_SESSION["shopping_cart"]);
?>
<style>
.affix {
	top: 90px;
	width: 260px;
}
div.col-sm-9 div {
	height: 100px;
	font-size: 16px;
}
div.col-sm-9 div:hover {
    background-color: #EBEBEB;
}
</style>

<!-- home section -->
<section id="search" class="parallax-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12"><center>
      	<div class="panel panel-title" style="width:400px; background-color: rgba(255, 255, 255, 0.55);border: 0px solid transparent; border-radius: 5px;">
            <h2>Order delivery from 116 restaurants</h2>
            <h5>delivering to your door</h5>
        </div></center>
        <br>
        <center>
          <form action="search.php" method="get">
            <table>
              <tr>
                <td width="300px" ><input class="form-control" type="text" width="100%" name="state" placeholder="Enter a cities" value="<?php echo $_GET['state']?>" required></td>
                <td width="20"></td>
                <td width="300px" ><input class="form-control" type="text" width="100%" name="city" placeholder="Enter an area" value="<?php echo $_GET['city']?>" required></td>
              </tr>
              <tr>
                <td colspan="3"><center>
                    <input type="submit" value="SHOW RESTAURANTS" class="smoothScroll btn btn-default">
                  </center></td>
              </tr>
            </table>
        </center>
      </div>
    </div>
  </div>
</section>
<p></p>

<div class="container" style="min-height:600px">
<ul class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>Restaurants</li>
</ul>
  <div class="row">
    <nav class="col-sm-3" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="440">
            <div class="input-group custom-search-form">
              <input type="search" class="form-control" name="search" placeholder="Search Restaurants" />
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit"> <i class="fa fa-search"></i> </button>
              </span> </div>
            <!-- /input-group --> 
            <p></p>
        	<a><i class="fa fa-filter"></i>
             Filter Restaurants
            </a><br />
        	&nbsp &nbsp 
            <input type="checkbox" name="delivery" value="1" <?php if(isset($_GET['delivery'])) echo "checked='checked'"; ?> /> 
        	Delivery Available
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="free_delivery" value="0.00" <?php if(isset($_GET['free_delivery'])) echo "checked='checked'"; ?> /> 
        	Free Delivery
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="open" value="1" <?php if(isset($_GET['open'])) echo "checked='checked'"; ?> /> 
        	Open Restaurants
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="halal" value="1" <?php if(isset($_GET['halal'])) echo "checked='checked'"; ?> /> 
        	Halal
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="non_halal" value="1" <?php if(isset($_GET['non_halal'])) echo "checked='checked'"; ?> /> 
        	Non-Halal
            
            <p></p><input class="form-control alert-success" type="submit" value="GO!!!" />
      </ul>
    </nav>
    </form>
    <div class="col-sm-9">
		<?php
			include('connect.php');
            $clauses=array();
			
			if ( isset( $_GET['state'], $_GET['city'] ) && !empty( $_GET['state'] )  && !empty( $_GET['city'] ) ) {
                $clauses[]="`rest_state` = '{$_GET['state']}'";
                $clauses[]="`rest_city` = '{$_GET['city']}'";
            }
			 if( isset( $_GET['open'] ) && !empty( $_GET['open'] ) ){
				$clauses[] = "`open` = '{$_GET['open']}'";   
			}
			 if( isset( $_GET['delivery'] ) && !empty( $_GET['delivery'] ) ){
				$clauses[] = "`delivery` = '{$_GET['delivery']}'";   
			}
			 if( isset( $_GET['free_delivery'] ) && !empty( $_GET['free_delivery'] ) ){
				$clauses[] = "`delivery` = '1' AND `delivery_fee` = '{$_GET['free_delivery']}'";   
			}
			 if( isset( $_GET['halal'] ) && !empty( $_GET['halal'] ) ){
				$clauses[] = "`halal` = '{$_GET['halal']}'";   
			}
			 if( isset( $_GET['non_halal'] ) && !empty( $_GET['non_halal'] ) ){
				$clauses[] = "`non_halal` = '{$_GET['non_halal']}'";   
			}
        
            $where = !empty( $clauses ) ? ' where '.implode(' and ',$clauses ) : '';
            $sql = "SELECT * FROM `restaurant` " . $where; 
        
            if(isset($sql)){
        
                 $result = mysqli_query($conn,$sql);
				 if($result->num_rows === 0){
					 echo '<center> 
					 		<h4>Oops, no restaurants found with your current filter settings!</h4>
					 					Please check our restaurant offerings below:
							</center><br/><br/><br/><br/><br/><br/>  ';
							
					 $result2 = mysqli_query($conn,"SELECT * FROM `restaurant` WHERE rest_state = '{$_GET['state']}' AND rest_city = '{$_GET['city']}' LIMIT 30");
					while($rows2=mysqli_fetch_array($result2)){
						?>
						<a href="restaurant.php<?php echo '?rest_id='.$rows2['rest_id']; ?>" style="text-decoration:none" >
							<div class="panel panel-success">
                            	<table width="100%">
                                	<tr>
                                        <td  height="4">
                                        </td>
                                    </tr>
                                	<tr>
                                    	<td width="1%"></td>
                                    	<td rowspan="3" width="10%">
                                        	<img src="images/default_profile.jpg" height="89px" width="89px" />
                                        </td>
                                        <td width="2%"></td>
                                    	<td>
                                        	<font color="#000000" size="+2" face="Trebuchet MS, Arial, Helvetica, sans-serif"><?php echo $rows2['rest_name']; ?></font>
                                        </td>
                                        <td rowspan="3" width="5%">
                                             <i class="fa fa-chevron-right fa-fw"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td width="1%"></td>
                                    	<td width="2%"></td>
                                    	<td><font color="#666666" size="-1">
                                        	<?php 
												if($rows2['open'] == 1){
													echo 'Open Restaurant,  ';
												} 
												if($rows2['delivery'] == 1){
													echo 'Delivery Available,  ';
													if($rows2['delivery_fee'] == "0.00"){
														echo 'Free Delivery,  ';
													} 
												}
												if($rows2['halal'] == 1){
													echo 'Halal.';
												} 
												if($rows2['non_halal'] == 1){
													echo 'Non Halal.';
												}
											?></font>
                                        </td>
                                    	 
                                    </tr>
                                    <tr>
                                    	<td width="1%"></td>
                                    	<td width="2%"></td>
                                    	<td>
                                        	<table>
                                            	<tr>
                                                	<td>
                                                    	$$$
                                                    </td>
                                                    <td width="10%">
                                                    </td>
                                                    <td>
                                                    	*****
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    	 
                                    </tr>
                                </table>
                           </div>
						</a>
						<?php	
					 }
				 }else{
					 while($rows=mysqli_fetch_array($result)){
						?>
						<a href="restaurant.php<?php echo '?rest_id='.$rows['rest_id']; ?>" style="text-decoration:none" >
							<div class="panel panel-success">
                            	<table width="100%">
                                	<tr>
                                        <td  height="4">
                                        </td>
                                    </tr>
                                	<tr>
                                    	<td width="1%"></td>
                                    	<td rowspan="3" width="10%">
                                        	<img src="images/default_profile.jpg" height="89px" width="89px" />
                                        </td>
                                        <td width="2%"></td>
                                    	<td>
                                        	<font color="#000000" size="+2" face="Trebuchet MS, Arial, Helvetica, sans-serif"><?php echo $rows['rest_name']; ?></font>
                                        </td>
                                        <td rowspan="3" width="5%">
                                             <i class="fa fa-chevron-right fa-fw"></i>
                                        </td>
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
											?></font>
                                        </td>
                                    	 
                                    </tr>
                                    <tr>
                                    	<td width="1%"></td>
                                    	<td width="2%"></td>
                                    	<td>
                                        	<table>
                                            	<tr>
                                                	<td>
                                                    	$$$
                                                    </td>
                                                    <td width="10%">
                                                    </td>
                                                    <td>
                                                    	*****
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    	 
                                    </tr>
                                </table>
							</div>
						</a>
						<?php	
					 }
						 
				 } 
            }
        ?>
    	
    </div>
  </div>
</div>
<p></p>

<?php include("footer.php") ?>