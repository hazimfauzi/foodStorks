<?php 
include("header.php");
include("session.php");
include("navbar.php");
$rest_id = $_GET['rest_id'];
$rest_query=mysqli_query($conn,"select * from restaurant where rest_id='$rest_id' ")or die(mysql_error());
$rowrest=mysqli_fetch_array($rest_query);
?>

<!-- Page Content -->

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="page-header"><i class="fa fa-home fa-fw"></i><?php echo $rowrest['rest_name']; ?> Payment</h4>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h4>ORDER ID</h4>
            <hr style="border-top: 1px solid #333;" />
            <div style="overflow-y:auto; overflow-x:hidden; height:420px;">
              <div id="payment">There is no pending payment right now</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="panel panel-warning">
          <div class="panel-heading" style="min-height:500px">
            <h4>ORDER INFO</h4>
            <hr style="border-top: 1px solid #333;" />
            <div id="info">Please Select An Order ID</div>
          </div>
        </div>
      </div>
      <!-- /.col-lg-12 --> 
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
			$('#payment').load('selectpayment.php?rest_id=<?php echo $rest_id ?>');
			refresher();
		},1000);
	}
	
	
	
	
	
</script>