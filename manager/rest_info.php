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
    <div class="row"><br />
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          	<table width="100%">
            	<tr>
                	<td colspan="3"><b><font size="+2" color="#000000" ><i class="fa fa-cutlery fa-fw"></i> <?php echo $rowrest['rest_name']; ?> Information</font></b>
                    <a id="<?php echo $rest_id; ?>" class="pull-right" title="Edit"  data-toggle="modal" data-target="#editRestInfo<?php echo $rest_id; ?>"> <i class="fa fa-edit"></i> Edit Restaurant Information</a>
                    <?php include('edit_rest_info_modal.php'); ?>
                    </td>
                </tr>
                <tr><td height="10px"></td></tr>
                <tr>
                	<td colspan="3">
                    	<font color="#999999">
                    	<?php 
							if($rowrest['open'] == 1){
								echo 'Open Restaurant,  ';
							} 
							if($rowrest['delivery'] == 1){
								echo 'Delivery Available,  ';
								if($rowrest['delivery_fee'] == "0.00"){
									echo 'Free Delivery,  ';
								} 
							} 
							
							if($rowrest['halal'] == 1){
								echo 'Halal.';
							} 
							if($rowrest['non_halal'] == 1){
								echo 'Non Halal.';
							}?>
                    	</font>
                	</td>
                </tr>
                <tr>
                	<td align="left" valign="top" width="65%">
                    	<hr />
                    	<h4><i class="fa fa-clock-o fa-fw"></i> <b>Open Hours</b></h4>
                        <table width="100%">
                        	<tr <?php if(date('w')==7){ echo 'bgcolor="#eee"'; } ?>><td width="2%" height="30px"></td><td width="75%"><i>Sunday</i></td><td width="23%"><?php echo date('h:i a', strtotime($rowrest['start7']))." - ".date('h:i a', strtotime($rowrest['end7'])); ?></td></tr>
                        	<tr <?php if(date('w')==1){ echo 'bgcolor="#eee"'; } ?>><td height="30px"></td><td><i>Monday</i></td><td><?php echo date('h:i a', strtotime($rowrest['start1']))." - ".date('h:i a', strtotime($rowrest['end1'])); ?></td></tr>
                        	<tr <?php if(date('w')==2){ echo 'bgcolor="#eee"'; } ?>><td height="30px"></td><td><i>Tuesday</i></td><td><?php echo date('h:i a', strtotime($rowrest['start2']))." - ".date('h:i a', strtotime($rowrest['end2'])); ?></td></tr>
                            <tr <?php if(date('w')==3){ echo 'bgcolor="#eee"'; } ?>><td height="30px"></td><td><i>Wednesday</i></td><td><?php echo date('h:i a', strtotime($rowrest['start3']))." - ".date('h:i a', strtotime($rowrest['end3'])); ?></td></tr>
                        	<tr <?php if(date('w')==4){ echo 'bgcolor="#eee"'; } ?>><td height="30px"></td><td><i>Thursday</i></td><td><?php echo date('h:i a', strtotime($rowrest['start4']))." - ".date('h:i a', strtotime($rowrest['end4'])); ?></td></tr>
                        	<tr <?php if(date('w')==5){ echo 'bgcolor="#eee"'; } ?>><td height="30px"></td><td><i>Friday</i></td><td><?php echo date('h:i a', strtotime($rowrest['start5']))." - ".date('h:i a', strtotime($rowrest['end5'])); ?></td></tr>
                        	<tr <?php if(date('w')==6){ echo 'bgcolor="#eee"'; } ?>><td height="30px"></td><td><i>Saturday</i></td><td><?php echo date('h:i a', strtotime($rowrest['start6']))." - ".date('h:i a', strtotime($rowrest['end6'])); ?></td></tr>
                        </table>
                    </td>
                    <td width="5%"></td>
                    <td align="left" valign="top" width="30%">
                    	<hr />
                        <h4>
                        	<i class="fa fa-truck fa-fw"></i> <b>Delivery</b>
                        </h4><?php
                        if($rowrest['delivery'] == 1){
							echo '&nbsp &nbsp &nbsp Delivery Available ';
						}else{
							echo '&nbsp &nbsp &nbsp Not Available ';
						} ?>
                        <br /><br /><br /><?php
                        if($rowrest['delivery'] == 1){ ?>
                        <h4><i class="fa fa-dollar fa-fw"></i> <b>Delivery Fee</b></h4><?php
							if($rowrest['delivery_fee'] == "0.00"){
								echo '&nbsp &nbsp &nbsp  Free ';
							}else{
								echo '&nbsp &nbsp &nbsp  RM '.$rowrest['delivery_fee'];
							}
                        } ?>
                   	</td>
               	</tr>
                <tr>
                	<td align="left" valign="top" width="65%" height="100px">
                    	<hr />
                        <h4>
                        	<i class="fa fa-map-marker fa-fw"></i> <b>Address</b>
                        </h4>
                        &nbsp &nbsp &nbsp <?php echo strtoupper($rowrest['rest_address'])?><br />
                        &nbsp &nbsp &nbsp <?php echo strtoupper($rowrest['rest_postcode']." ".$rowrest['rest_city'].",")?><br />
                        &nbsp &nbsp &nbsp <?php echo strtoupper($rowrest['rest_state'].".")?>
                    </td>
                    <td width="5%"></td>
                    <td align="left" valign="top" width="30%">
                    	<hr />
                        <h4><i class="fa fa-money fa-fw"></i> <b>Payment Types</b></h4>
                        &nbsp &nbsp &nbsp Online Card Payment
                   	</td>
               	</tr>
                <tr>
                    <td colspan="3">
                        <hr />
                        <h4>
                                <i class="fa fa-table fa-fw"></i> <b>Floor Plan</b>
                                	<form method="POST" action="print_pdf.php">
                                    <input type="hidden" value="<?php echo $rest_id ?>" name="rest_id"  />
                                    <button type="submit" class="btn btn-outline btn-info pull-right" title="Print QRCODE"> <i class="fa fa-print"></i> Print QRCODE</button>
                                    </form>
                                 	<button type="submit" value="POST" id="removeTable" class="btn btn-outline btn-danger pull-right" title="Remove Table"> <i class="fa fa-minus"></i> Remove Table</button>&nbsp
                                	<button type="submit" value="POST" id="addTable" class="btn btn-outline btn-success pull-right" title="Add Table"> <i class="fa fa-plus"></i> Add Table</button>
                               
                        </h4><br />
                        <div id="displayarea">There is no table in database</div>
                    </td>
                </tr>
            </table>
          </div>
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
       	$("#addTable").click(function(){
			var rest_id = "<?php echo $rest_id ?>";
			
			$.ajax({
				url: "addtable.php",
				type: "POST",
				async:false,
				data:{
					"add" : 1,
					"rest_id" : rest_id 
					
				},
				success: function(data){
					alert("Table added!!");
					displayFromDatabase();
				}
			})
		}); 
		$("#removeTable").click(function(){
			var rest_id = "<?php echo $rest_id ?>";
			
			$.ajax({
				url: "addtable.php",
				type: "POST",
				async:false,
				data:{
					"remove" : 1,
					"rest_id" : rest_id 
					
				},
				success: function(data){
					alert("Table Removed!!");
					displayFromDatabase();
				}
			})
		}); 
    });
	
	
	function displayFromDatabase(){
		var rest_id = "<?php echo $rest_id ?>";
		
		$.ajax({
			url: "addtable.php",
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















