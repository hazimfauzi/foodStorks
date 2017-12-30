
<!-- Modal -->
<div class="modal fade" id="addModal<?php echo $cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                	<h4 class="modal-title" id="myModalLabel">Add Item</h4>
				</div>
				<div class="modal-body">
					<form  method="POST" action="save_item.php" enctype="multipart/form-data">
                    <input type="hidden" name="rest_id" value="<?php echo $rest_id ?>" required>
                    <input type="hidden" name="cat_id" value="<?php echo $rowcat['cat_id']; ?>" required>
                    <input type="hidden" name="cat_name" value="<?php echo $rowcat['cat_name']; ?>" required>
					<div class="form-group">
               			<label >Item Category *</label>
                		<input class="form-control" type="text" value="<?php echo $rowcat['cat_name']; ?>" disabled="disabled">
              		</div>
					<div class="form-group">
               			<label >Item Name *</label>
                		<input class="form-control" type="text" name="item_name"  placeholder="Item Name" required>
              		</div>
                    <div class="form-group">
               			<label >Item Price *</label>
                		<input class="form-control" type="text" name="item_price"  placeholder="example : 1.00" required>
              		</div>
				</div>
                
            	<div class="modal-footer">
            		<div class="pull-right">
						<div class="form-group">
							<div class="forms">
								<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>Save</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
							</div>
						</div>
					</div></form>	
				</div>
		</div>
        <!-- /.modal-content -->
     </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->	
	













	
									
