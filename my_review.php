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
      <li>My Review</li>
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
        <li class="active"><a href="my_review.php"><i class="fa fa-star fa-fw"></i> My Review</a> </li>
        <li><a href="my_account.php"><i class="fa fa-user fa-fw"></i> My Account</a> </li>
        <li><a href="address.php"><i class="fa fa-map-marker fa-fw"></i> Address Book</a> </li>
      </ul>
    </nav>
  </div>
  <div class="col-sm-10">
    <h3 class="page-header" style=" margin-top:0; margin-bottom:1"><i class="fa fa-star fa-fw"></i>My Review</h3>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade in active" id="recent">
        <div class="panel-group" id="accordion">
          <?php
	$result=mysqli_query($conn,"SELECT review.*, restaurant.rest_name,restaurant.rest_id
								FROM review
								INNER JOIN restaurant ON review.rest_id=restaurant.rest_id
								WHERE review.user_id='$user_id' ORDER BY review.review_date  DESC;");
	
	while($row=mysqli_fetch_array($result)){?>
          <div class="panel panel-default">
            <div class="panel-body">
            	<table>
                	<tr>
                    	<td width="20%">
                        Restaurant : <a href="restaurant.php?rest_id=<?php echo $row['rest_id'] ?>"><?php echo $row['rest_name'] ?></a>
                        </td>
                        <td width="20%">
                    	Review Date : <?php echo date(" F j, Y h:i A", strtotime($row['review_date'])); ?>
                    	</td>
                        <td width="20%" rowspan="2" >
                        	<input class="star star-5" id="star-5" type="radio" value="5" name="star<?php echo $row['review_id']  ?>" <?php if( $row['review_star']==5 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" value="4" name="star<?php echo $row['review_id']  ?>" <?php if( $row['review_star']==4 ){echo "checked='checked'"; }  ?> disabled="disabled" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" value="3" name="star<?php echo $row['review_id']  ?>" <?php if( $row['review_star']==3 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" value="2" name="star<?php echo $row['review_id']  ?>" <?php if( $row['review_star']==2 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" value="1" name="star<?php echo $row['review_id']  ?>" <?php if( $row['review_star']==1 ){echo "checked='checked'"; }  ?> disabled="disabled"/>
                            <label class="star star-1" for="star-1"></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="<?php echo $row['order_id'] ?>" class="panel-collapse collapse">
              <div class="panel-body">
                	
              </div>
            </div>
          </div>
          <?php 
} 

?>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<?php include ("footer.php"); ?>