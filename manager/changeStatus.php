<?php
	include("connect.php");
	
	// change table to status
	if(isset($_POST['change'])){
		$table_id = $_POST['table_id'];
		$table_status = $_POST['table_status'];
		
		if( $table_status=="Available"){ 
			$table_status = "Occupied";
			
		}else if( $table_status=="Occupied"){
			$table_status = "Dirty";
			
		}else{
			$table_status = "Available"; 
		}
		
		mysqli_query($conn,"UPDATE floorplan SET table_status = '$table_status' WHERE table_id='$table_id';") or die(mysqli_error($conn));
		exit();
	}
	
	// display data from database
	if(isset($_POST['display'])){
		$rest_id = $_POST['rest_id'];
		
		$result=mysqli_query($conn,"SELECT * FROM floorplan WHERE rest_id=$rest_id") or die(mysqli_error($conn));
		
		while($row=mysqli_fetch_array($result)){?>
			<div class="col-lg-3">
            	<div class="panel panel-default">
                	<table width="100%">
                    	<tr><td height="10px"></td></tr>
                    	<tr><td colspan="2" align="center">
                        	<button type="button" value="POST" id="changeStatus<?php echo $row['table_id'] ?>" title="Click for change status"  class="btn btn-<?php if( $row['table_status']=="Available"){ echo "info"; }else if( $row['table_status']=="Occupied"){ echo "success";}else{ echo "danger"; } ?> btn-circle btn-xl"><?php echo $row['table_no'] ?></button>
                        </td></tr>
                    	<tr><td width="50%" align="center">Table <?php echo $row['table_no'] ?></td><td align="center"> <?php echo $row['table_status'] ?></td></tr>
                   	</table>
                </div>
          	</div>
            <script type="text/javascript">
				$("#changeStatus<?php echo $row['table_id'] ?>").click(function(){
					var table_id = "<?php echo $row['table_id'] ?>";
					var table_status = "<?php echo $row['table_status'] ?>";
					
					$.ajax({
						url: "changeStatus.php",
						type: "POST",
						async:false,
						data:{
							"change" : 1,
							"table_id" : table_id,
							"table_status" : table_status  
							
						},
						success: function(data){
							displayFromDatabase();
						}
					})
				}); 
			</script>
			<?php
		}
		exit();
	}
	
	
?>