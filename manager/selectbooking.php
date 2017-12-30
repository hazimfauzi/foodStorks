<?php
	include("session.php");
	include("connect.php");
	$rest_id = $_GET['rest_id'];
	$result=mysqli_query($conn,"SELECT * FROM `order` WHERE order_type='2' AND done='0' AND rest_id='$rest_id' ORDER BY order_time");
	
	//-------------------------------- For audio --------------------------------------
	$num_row=mysqli_num_rows($result);
	if($num_row>$_SESSION['count1']){
		echo "<audio controls autoplay hidden='true'><source src='chat.wav'></audio>";
		
	}$_SESSION['count1']=$num_row;
	//---------------------------------------------------------------------------------
	
	
	while($row=mysqli_fetch_array($result)){
		$orderlist=$row['order_list']; 
		$date=$row['order_date']." ".$row['order_time'];?>
		<div class="col-lg-4">
        	<div class="panel panel-success">
				<div class="panel-heading">
                	Order <?php echo $row['order_id'] ?>
                    <div class="pull-right" id="demo<?php echo $row['order_id'] ?>"></div>
				</div>
				<div class="panel-body">
					<table class="table table-hover" width="100%">
						<thead><th width="80%">Name</th><th>Quantity</th></thead><?php
						foreach(explode(";",$orderlist) as $order){ ?>
							<tr><?php
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
                            	<td><?php echo $name ?></td>
                                <td align="center"><?php echo $quantity ?></td>
							<tr><?php
						}?>
                	</table>
                </div>
                <div class="panel-footer">
                <form method="POST" action="update_order.php">
                	<input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>" />
                 	<center><button type="submit" class="btn btn-success"><i   <i class="fa fa-save fa-fw"></i>Notify Waiter</button></center>
                </form>
                </div>
          	</div>
        </div>
<script>
// Set the date we're counting down to
var countDownDate<?php echo $row['order_id'] ?> = new Date("<?php echo $date ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate<?php echo $row['order_id'] ?> - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo<?php echo $row['order_id'] ?>").innerHTML = "TIME REMAINING : " +  hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo<?php echo $row['order_id'] ?>").innerHTML = "EXPIRED";
  }
}, 200);
</script>
<?php 
} 

?>



























