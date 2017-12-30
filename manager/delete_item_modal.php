

<!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><center>Remove Item</center></h4>
             </div>
            <div class="alert alert-danger">
            		Are you Sure want to remove <big><?php echo $rowitem['item_name']; ?></big>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="delete_item.php<?php echo '?id='.$id.'&rest_id='.$rest_id; ?>"><i class="icon-check"></i>&nbsp;Yes</a>
				<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;No</button>
            </div>
        </div>
        <!-- /.modal-content -->
     </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->	
	
