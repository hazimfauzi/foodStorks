

<!-- Modal -->
<div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                	<h4 class="modal-title" id="myModalLabel">Add Category</h4>
				</div>
				<div class="modal-body">
					<form  method="POST" action="save_cat.php" enctype="multipart/form-data">
                    <input type="hidden" name="rest_id" value="<?php echo $rest_id ?>" required>
					<div class="form-group">
               			<label >Category Name *</label>
                		<input class="form-control" type="text" name="cat_name"  placeholder="Drink,Food,Noodle, or etc" required>
              		</div>
					<div class="form-group">
               			<label >Category Image*</label>
                        <input class="form-control" type='file' name="cat_image" onchange="readURL(this);" accept="image/*" required /><br />
                        <div class="alert alert-warning alert-dismissable">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Please make sure your category image fix<a href="#" class="alert-link">(560px X 100px)</a>. If not it will make your restaurant menu look bad. 
                        </div>
                        <img id="blah" src="#" alt="your image" />
                        <script>
						function readURL(input) {
							if (input.files && input.files[0]) {
								var reader = new FileReader();
					
								reader.onload = function (e) {
									$('#blah')
										.attr('src', e.target.result)
										.width(560)
										.height(100);
								};
					
								reader.readAsDataURL(input.files[0]);
							}
						}
                        </script>
                        
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
	













	
									
