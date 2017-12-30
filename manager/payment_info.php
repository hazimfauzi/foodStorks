<?php
	include("connect.php");
	$order_id = $_GET['order_id'];
	$result=mysqli_query($conn,"SELECT * FROM `order` WHERE order_id='$order_id'");
	
	while($row=mysqli_fetch_array($result)){
		$orderlist=$row['order_list']; 
		$date=$row['order_date']." ".$row['order_time'];?>
		<div class="col-lg-12">
        	<div class="panel panel-success">
				<div class="panel-heading">
                	Order <?php echo $row['order_id'] ?>
                    <div class="pull-right" id="demo<?php echo $row['order_id'] ?>"></div>
				</div>
				<div class="panel-body" style="min-height:280px">
					<table class="table table-hover" width="100%">
						<thead><th>Name</th><th>Quantity</th><th>Price/Unit</th><th>SubTotal</th></thead><?php
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
                            	<td><?php if($name!=null) echo $name ?></td>
                                <td><?php if($quantity!=null) echo "        x ".$quantity ?></td>
                                <td><?php if($price!=null) echo "RM ".$price ?></td>
                                <td><?php if($price!=null) echo "RM ".number_format($price*$quantity, 2) ?></td>
                                
							</tr><?php
						}?>
                        	
							
                	</table>
                </div>
                <div class="panel-footer">
                	<table width="100%">
                    	<tr>
                        	<td width="15%"><font color="#999999" size="+1">TOTAL</font></td>
                        	<td width="75%"><span class="text-success">
                            <h2>RM<?php echo number_format($row['order_price'], 2); ?></h2>
                            </span></td>
                            <td>
                            	 <form method="POST" action="pay_order.php">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>" />
                                    <button type="submit" class="btn btn-success"><i   <i class="fa fa-money fa-fw"></i> Pay</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                
                
                
                
                
                
               
                </div>
          	</div>
        </div>
<?php 
} 

?>



























