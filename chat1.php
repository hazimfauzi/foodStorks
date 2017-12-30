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
$order_id=$_GET['order_id'];
$user_id=$_GET['user_id'];
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
      	<li class="active"><a href="chat.php"><i class="fa fa-phone fa-fw"></i> Chat</a> </li>
        <li><a href="recent_order.php"><i class="fa fa-list-alt fa-fw"></i> Recent Order</a> </li>
        <li><a href="my_review.php"><i class="fa fa-star fa-fw"></i> My Review</a> </li>
        <li><a href="my_account.php"><i class="fa fa-user fa-fw"></i> My Account</a> </li>
        <li><a href="address.php"><i class="fa fa-map-marker fa-fw"></i> Address Book</a> </li>
      </ul>
    </nav>
  </div>
  <div class="col-sm-10">
   <div class="chat-panel panel panel-default">
  <div class="panel-heading"> <h3 style=" margin-top:0; margin-bottom:0"><i class="fa fa-phone fa-fw"></i>Chat</h3>
    
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body">
    <ul class="chat">
      <div id="displayarea"></div>
    </ul>
  </div>
  <!-- /.panel-body -->
  <div class="panel-footer">
    <div class="input-group">
      <input id="msg" type="text" class="form-control input-sm" placeholder="Type your message here..." autocomplete="off" />
      <span class="input-group-btn">
      <input class="btn btn-warning btn-sm" type="submit" id="submit" value="SEND" />
      </span> </div>
  </div>
  <!-- /.panel-footer --> 
</div>
<!-- /.panel .chat-panel -->
  </div>
</div>
<br>


<?php include ("footer.php"); ?>




<script>
	$(document).ready( function(){
		refresher();
		$("#submit").click(function(){
			var msg =$("#msg").val();
			var order_id ="<?php echo $order_id ?>";
			$.ajax({
				url: "chat_func.php",
				type: "POST",
				async:false,
				data:{
					"send" : 1,
					"order_id" : order_id,
					"msg" : msg
				},
				success: function(data){
					$("#msg").val('');
				}
			})
			
		});
	});
	
	function refresher(){
		setTimeout(function(){
			$('#displayarea').load('refchat.php?user_id=<?php echo $user_id ?>&order_id=<?php echo $order_id ?>');
			refresher();
		},200);
	}

</script>

















