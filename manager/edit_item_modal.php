<!-- Modal -->

<div class="modal fade" id="editModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center>
          <h3 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i>Edit Item</h3>
        </center>
      </div>
      <div class="modal-body">
        <form  method="post" action="edit_item.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $rowitem['item_id']; ?>" required="required" />
          <input type="hidden" name="rest_id" value="<?php echo $rowitem['rest_id']; ?>" required="required" />
          <div class="form-group">
            <label >Item Name</label>
            <input class="form-control" type="text" value="<?php echo $rowitem['item_name']; ?>" name="item_name" required="required" />
          </div>
          <div class="form-group">
            <label >Item Price</label>
            <input class="form-control" type="text" value="<?php echo $rowitem['item_price']; ?>" name="item_price" placeholder="example : 1.00" required="required" />
          </div>
          <div class="modal-footer">
            <div class="pull-right">
              <div class="form-group">
                <div class="forms">
                  <button name="submit" type="submit<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-save icon-large"></i>Save</button>
                  <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

