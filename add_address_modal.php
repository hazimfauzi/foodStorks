
<!-- Modal -->
<div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                	<h4 class="modal-title" id="myModalLabel">Add Address</h4>
				</div>
				<div class="modal-body">
					<form  method="POST" action="save_address.php" enctype="multipart/form-data">
					<div class="form-group">
                		Address <input class="form-control" type="text" name="address"  placeholder="Item Name" required>
              		</div>
					<div class="form-group">
               			Item Name <input class="form-control" type="text" name="state"  placeholder="Item Name" required>
              		</div>
                    <div class="form-group">
               			Item Price <input class="form-control" type="text" name="city"  placeholder="example : 1.00" required>
              		</div>
                    <div class="form-group">
               			Item Price <input class="form-control" type="text" name="city"  placeholder="example : 1.00" required>
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
	













	
									
