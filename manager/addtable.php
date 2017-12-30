<?php
	include("connect.php");
	
	// add table to database
	if(isset($_POST['add'])){
		$rest_id = $_POST['rest_id'];
		
		$totaltable=mysqli_query($conn,"SELECT table_id FROM floorplan where rest_id='$rest_id'") or die(mysqli_error($conn));
		$table_no=mysqli_num_rows($totaltable)+1;
		include('getCode.php');
		$qrcode=$rest_id.$table_no.$qrName.'.png';
		mysqli_query($conn,"INSERT INTO floorplan(table_no, table_status, rest_id, table_qrcode) VALUES('$table_no','Available','{$rest_id}','$qrcode')") or die(mysqli_error($conn));
		exit();
	}
	
	// remove table to database
	if(isset($_POST['remove'])){
		$rest_id = $_POST['rest_id'];
		
		$totaltable=mysqli_query($conn,"SELECT table_id FROM floorplan where rest_id='$rest_id'") or die(mysqli_error($conn));
		$table_no=mysqli_num_rows($totaltable);
		mysqli_query($conn,"DELETE FROM floorplan WHERE table_no='$table_no'") or die(mysqli_error($conn));
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
                        	<button type="button" class="btn btn-<?php if( $row['table_status']=="Available"){ echo "info"; }else if( $row['table_status']=="Occupied"){ echo "success";}else{ echo "danger"; } ?> btn-circle btn-xl"><?php echo $row['table_no'] ?></button>
                        </td></tr>
                    	<tr><td width="50%" align="center">Table <?php echo $row['table_no'] ?></td><td align="center"> <?php echo $row['table_status'] ?></td></tr>
                   	</table>
                </div>
          	</div>
			<?php
		}
		exit();
	}
	
	
?>