<?php 
include("header.php");
include("session.php");
include("navbar.php");

?>

<!-- Page Content -->

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-home fa-fw"></i>Dashboard</h2>
      </div>
      <!-- /.col-lg-12 -->
      <div id="chat"></div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bell fa-fw"></i> New Chat </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="list-group"> 
            	<div id="new_chat"></div>
             
            </div>
          <!-- /.panel-body --> 
        </div>
      </div>
      <!-- /.panel --> 
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
			$('#new_chat').load('chat_new.php?session_id=<?php echo $session_id ?>');
			refresher();
		},1000);
	}
	
	
	
	
	
</script>