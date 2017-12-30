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
        <h3 class="page-header"><i class="fa fa-info fa-fw"></i>Table Status</h3>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Click <a href="#" class="alert-link">Table</a> to change table status. (Available <i class="fa fa-arrow-right fa-fw"></i> Occupied <i class="fa fa-arrow-right fa-fw"></i> Dirty) </div>
        <div id="displayarea">There is no table in database</div>
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
	$(document).ready(function() {
		displayFromDatabase();
    });
	
	
	function displayFromDatabase(){
		var rest_id = "<?php echo $rest_id ?>";
		
		$.ajax({
			url: "changeStatus.php",
			type: "POST",
			async:false,
			data:{
				"display" : 1,
				"rest_id" : rest_id 
			},
			success: function(d){
				$("#displayarea").html(d);
					
			}
		});
	}
	
	
</script>