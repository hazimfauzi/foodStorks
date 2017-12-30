<?php 
include('header.php');
include('session.php');

$_SESSION['count1']='0';
$_SESSION['count2']='0';
$_SESSION['count3']='0';
include('connect.php'); 
include('navbar.php'); 
$rest_id = $_GET['rest_id'];
$rest_query=mysqli_query($conn,"select * from restaurant where rest_id='$rest_id' ")or die(mysql_error());
$rowrest=mysqli_fetch_array($rest_query);
?>

<!-- Page Content -->

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-home fa-fw"></i> <?php echo $rowrest['rest_name']; ?> Food Menu</h2>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row --> 
    
    <!-- Nav tabs -->
   
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade in active" id="menu-pills">
        <p></p>
        <div class="panel panel-default">
          <div class="panel-heading">
            <button type="button" class="btn btn-default disabled">Menu</button>
            <button  type="button" class="btn btn-outline btn-primary pull-right" title="Add"  data-toggle="modal" data-target="#addCatModal"> <i class="fa fa-plus"></i> Add Category</button>
            <?php include('add_cat_modal.php') ?>
        </div>
        <div class="panel-body">
          <?php
            $cat_query=mysqli_query($conn,"select * from category where rest_id='$rest_id' ")or die(mysql_error());
			while($rowcat=mysqli_fetch_array($cat_query)){
				$cat_id=$rowcat['cat_id']; ?>
            
          <div class="col-lg-4">
            <div class="panel panel-success">
              <div class="panel-heading"> <?php echo $rowcat['cat_name']; ?> <a id="<?php echo $cat_id; ?>" class="pull-right" title="Add"  data-toggle="modal" data-target="#addModal<?php echo $cat_id; ?>"> <i class="fa fa-plus"></i> Add Item</a>
                <?php include('add_item_modal.php') ?>
            </div>
            <?php
				$cat_id=$rowcat['cat_id'];
            	$item_query=mysqli_query($conn,"select * from item where cat_id='$cat_id' ORDER BY item_price DESC ")or die(mysql_error());
				?>
            <table width="100%" cellpadding = "0" cellspacing = "0">
              <tr height="10px"> </tr>
              <?php
				while($rowitem=mysqli_fetch_array($item_query)){ 
				$id=$rowitem['item_id'];
				?>
              <tr class="del<?php echo $id ?>">
                <td width="5%"></td>
                <td width="63%"><p><?php echo $rowitem['item_name']; ?></p></td>
                <td width="20%"><p><?php echo $rowitem['item_price']; ?></p></td>
                <td width="12%"><p> <a  title="Edit" id="<?php echo $id; ?>"  data-toggle="modal" data-target="#editModal<?php echo $id; ?>"> <i class="fa fa-edit"></i> </a> 
                <a  title="Delete" id="<?php echo $id; ?>"  data-toggle="modal" data-target="#deleteModal<?php echo $id; ?>"> <i class="fa fa-trash-o"></i> </a> </p>
                  <?php 
					  include('edit_item_modal.php');
					  include('delete_item_modal.php');
					?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper --> 
<!-- jQuery --> 
<script src="../vendor/jquery/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="../vendor/metisMenu/metisMenu.min.js"></script> 

<!-- DataTables JavaScript --> 
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script> 
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script> 
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="../dist/js/sb-admin-2.js"></script> 

<!-- Page-Level Demo Scripts - Tables - Use for reference --> 
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true
        });
    });
    </script>
</body></html>