<?php 
include("header.php");
include("session.php");
include("navbar.php");
$rest_id=$_GET['rest_id'];
$rest_query=mysqli_query($conn,"select * from restaurant where rest_id='$rest_id' ")or die(mysql_error());
$rowrest=mysqli_fetch_array($rest_query);
?>

<!-- Page Content -->

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="page-header"><i class="fa fa-home fa-fw"></i> <?php echo $rowrest['rest_name']; ?> New Order</h4>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-12">
        <div class="panel panel-info">
          <div class="panel-heading">
          	<i class="fa fa-list-ol fa-fw"></i> Booking
          </div>
          <div class="panel-body">
            <div id="booking"></div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
          	<i class="fa fa-shopping-cart fa-fw"></i> ORDER
          </div>
          <div class="panel-body">
            <div id="order"></div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
          	<i class="fa fa-truck fa-fw"></i> Delivery
          </div>
          <div class="panel-body">
            <div id="delivery"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.container-fluid --> 
</div>
<!-- /#page-wrapper --> 


<?php 
include("footer.php");
?>
<script type="text/javascript">
	$(document).ready( function(){
		refresher();
	});
	
	function refresher(){
		setTimeout(function(){
			$('#booking').load('selectbooking.php?rest_id=<?php echo $rest_id ?>');
			$('#delivery').load('selectdelivery.php?rest_id=<?php echo $rest_id ?>');
			$('#order').load('selectorder.php?rest_id=<?php echo $rest_id ?>');
			refresher();
		},200);
	}
	
	
</script>