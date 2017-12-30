<!-- Modal -->

<div class="modal fade" id="editRestInfo<?php echo $rest_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center>
          <h3 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?php echo $rowrest['rest_name']; ?> Information</h3>
        </center>
      </div>
      <div class="modal-body">
        <form  method="post" action="edit_rest_info.php" enctype="multipart/form-data">
          <input type="hidden" name="rest_id" value="<?php echo $rowrest['rest_id']; ?>" required="required" />
          <div class="form-group">
            <label >Restaurant Name</label>
            <input class="form-control" type="text" value="<?php echo $rowrest['rest_name']; ?>" name="rest_name" required="required" />
          </div>
          <hr />
          <div class="form-group">
          <label >Restaurant Filter</label><br />
          	&nbsp &nbsp
            <input type="checkbox" name="delivery" value="1" <?php if($rowrest['delivery']==1) echo "checked='checked'"; ?> /> 
        	Delivery Available
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="delivery_fee" value="0.00" <?php if($rowrest['delivery']==1){ if($rowrest['delivery_fee']=='0.00') echo "checked='checked'"; }?> /> 
        	Free Delivery
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="open" value="1" <?php if($rowrest['open']==1) echo "checked='checked'"; ?> /> 
        	Open Restaurants
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="halal" value="1" <?php if($rowrest['halal']==1) echo "checked='checked'"; ?> /> 
        	Halal
            <br />
        	&nbsp &nbsp
            <input type="checkbox" name="non_halal" value="1" <?php if($rowrest['non_halal']==1) echo "checked='checked'"; ?> /> 
        	Non-Halal
          </div>
          <hr />
          <div class="form-group">
            <table>
                <tr>
                	<td colspan="3">
                    	<label >Restaurant Address</label>
            			<input class="form-control" type="text" value="<?php echo $rowrest['rest_address']; ?>" name="rest_address" required="required" />
                	</td>
                </tr>
                <tr>
                	<td><label >Postcode</label><input class="form-control" type="text" value="<?php echo $rowrest['rest_postcode']; ?>" name="rest_postcode" required="required" /></td>
                	<td><label >City</label><input class="form-control" type="text" value="<?php echo $rowrest['rest_city']; ?>" name="rest_city" required="required" /></td>
                	<td><label >State</label><input class="form-control" type="text" value="<?php echo $rowrest['rest_state']; ?>" name="rest_state" required="required" /></td>
                </tr>
            </table>
          </div>
          <hr />
          <div class="form-group">
            <label >Open Hour</label>
            <table width="100%">
            	<tr <?php if(date('w')==7){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Sunday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start7']; ?>" name="start7" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end7']; ?>" name="end7" required="required" /></td></tr>
           		<tr <?php if(date('w')==1){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Monday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start1']; ?>" name="start1" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end1']; ?>" name="end1" required="required" /></td></tr>
           		<tr <?php if(date('w')==2){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Tuesday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start2']; ?>" name="start2" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end2']; ?>" name="end2" required="required" /></td></tr>
           		<tr <?php if(date('w')==3){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Wednesday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start3']; ?>" name="start3" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end3']; ?>" name="end3" required="required" /></td></tr>
           		<tr <?php if(date('w')==4){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Thursday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start4']; ?>" name="start4" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end4']; ?>" name="end4" required="required" /></td></tr>
           		<tr <?php if(date('w')==5){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Friday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start5']; ?>" name="start5" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end5']; ?>" name="end5" required="required" /></td></tr>
           		<tr <?php if(date('w')==6){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="65%"><i>Saturday</i></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['start6']; ?>" name="start6" required="required" /></td><td width="3%"><center>-</center></td>
                	<td width="15%"><input class="form-control" type="time" value="<?php echo $rowrest['end6']; ?>" name="end6" required="required" /></td></tr>
    		</table>
          </div>
          <hr />
          <div class="modal-footer">
            <div class="pull-right">
              <div class="form-group">
                <div class="forms">
                  <button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>Save</button>
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

