<?php  
include("connect.php");
$rest_id=$_GET['rest_id'];
$type=$_GET['type'];
?>

<?php if ($type=="week") {?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>No.</th>
      <th>Order Id</th>
      <th>Order Type</th>
      <th>Order Date</th>
      <th>Order List</th>
      <th>Order Price</th>
    </tr>
  </thead>
  <tbody>
    <?php  $user_query=mysqli_query($conn,"select * from `order` WHERE order_date >= current_date - 7 AND rest_id='$rest_id' ORDER BY order_date DESC")or die(mysql_error());
								  $bil=0;
									while($row=mysqli_fetch_array($user_query)){
									$bil++;
									$id=$row['order_id'];  ?>
    <tr class="del<?php echo $id ?>">
      <td><?php echo $bil; ?></td>
      <td><?php echo $row['order_id']; ?></td>
      <td><?php if($row['order_type']=="1"){ echo "Delivery"; }else if($row['order_type']=="2"){echo "Booking";}else{echo "Ordering from restaurant";} ?></td>
      <td><?php echo $row['order_date']; ?></td>
      <td><?php echo $row['order_list']; ?></td>
      <td>RM <?php echo $row['order_price']; ?></td>
    </tr>
    <?php  }  ?>
  </tbody>
</table>
<?php } else if ($type=="month") {?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>No.</th>
      <th>Order Id</th>
      <th>Order Type</th>
      <th>Order Date</th>
      <th>Order List</th>
      <th>Order Price</th>
    </tr>
  </thead>
  <tbody>
    <?php  $user_query=mysqli_query($conn,"select * from `order` WHERE order_date >= current_date - 30 AND rest_id='$rest_id' ORDER BY order_date DESC")or die(mysql_error());
								  $bil=0;
									while($row=mysqli_fetch_array($user_query)){
									$bil++;
									$id=$row['order_id'];  ?>
    <tr class="del<?php echo $id ?>">
      <td><?php echo $bil; ?></td>
      <td><?php echo $row['order_id']; ?></td>
      <td><?php if($row['order_type']=="1"){ echo "Delivery"; }else if($row['order_type']=="2"){echo "Booking";}else{echo "Ordering from restaurant";} ?></td>
      <td><?php echo $row['order_date']; ?></td>
      <td><?php echo $row['order_list']; ?></td>
      <td>RM <?php echo $row['order_price']; ?></td>
    </tr>
    <?php  }  ?>
  </tbody>
</table>
<?php } else if ($type=="year") {?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>No.</th>
      <th>Order Id</th>
      <th>Order Type</th>
      <th>Order Date</th>
      <th>Order List</th>
      <th>Order Price</th>
    </tr>
  </thead>
  <tbody>
    <?php  $user_query=mysqli_query($conn,"select * from `order` WHERE order_date >= current_date - 360 AND rest_id='$rest_id' ORDER BY order_date DESC")or die(mysql_error());
								  $bil=0;
									while($row=mysqli_fetch_array($user_query)){
									$bil++;
									$id=$row['order_id'];  ?>
    <tr class="del<?php echo $id ?>">
      <td><?php echo $bil; ?></td>
      <td><?php echo $row['order_id']; ?></td>
      <td><?php if($row['order_type']=="1"){ echo "Delivery"; }else if($row['order_type']=="2"){echo "Booking";}else{echo "Ordering from restaurant";} ?></td>
      <td><?php echo $row['order_date']; ?></td>
      <td><?php echo $row['order_list']; ?></td>
      <td>RM <?php echo $row['order_price']; ?></td>
    </tr>
    <?php  }  ?>
  </tbody>
</table>
<?php } else {?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>No.</th>
      <th>Order Id</th>
      <th>Order Type</th>
      <th>Order Date</th>
      <th>Order List</th>
      <th>Order Price</th>
    </tr>
  </thead>
  <tbody>
    <?php  $user_query=mysqli_query($conn,"select * from `order` where rest_id='$rest_id' ORDER BY order_date DESC")or die(mysql_error());
								  $bil=0;
									while($row=mysqli_fetch_array($user_query)){
									$bil++;
									$id=$row['order_id'];  ?>
    <tr class="del<?php echo $id ?>">
      <td><?php echo $bil; ?></td>
      <td><?php echo $row['order_id']; ?></td>
      <td><?php if($row['order_type']=="1"){ echo "Delivery"; }else if($row['order_type']=="2"){echo "Booking";}else{echo "Ordering from restaurant";} ?></td>
      <td><?php echo $row['order_date']; ?></td>
      <td><?php echo $row['order_list']; ?></td>
      <td>RM <?php echo $row['order_price']; ?></td>
    </tr>
    <?php  }  ?>
  </tbody>
</table>

<?php }?>



<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>