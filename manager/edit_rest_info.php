<?php 
include('connect.php');

if(isset($_POST['submit'])){
			$rest_id=$_POST['rest_id'];
			$rest_name=$_POST['rest_name'];
			$rest_address=$_POST['rest_address'];
			$rest_postcode=$_POST['rest_postcode'];
			$rest_city=$_POST['rest_city'];
			$rest_state=$_POST['rest_state'];
			$start1=$_POST['start1'];
			$start2=$_POST['start2'];
			$start3=$_POST['start3'];
			$start4=$_POST['start4'];
			$start5=$_POST['start5'];
			$start6=$_POST['start6'];
			$start7=$_POST['start7'];
			$end1=$_POST['end1'];
			$end2=$_POST['end2'];
			$end3=$_POST['end3'];
			$end4=$_POST['end4'];
			$end5=$_POST['end5'];
			$end6=$_POST['end6'];
			$end7=$_POST['end7'];
			
			if(isset($_POST['delivery'])){
				$delivery=$_POST['delivery'];
				
				if(isset($_POST['delivery_fee'])){
					$delivery_fee=$_POST['delivery_fee'];
				}else{
					$delivery_fee="5.00";
				}
			}else{
				$delivery='0';
			}
			
			if(isset($_POST['open'])){
				$open=$_POST['open'];
			}else{
				$open='0';
			}
			
			if(isset($_POST['halal'])){
				$halal=$_POST['halal'];
			}else{
				$halal='0';
			}
			
			if(isset($_POST['non_halal'])){
				$non_halal=$_POST['non_halal'];
			}else{
				$non_halal='0';
			}
			
			
			mysqli_query($conn," UPDATE `restaurant` SET rest_name='$rest_name', rest_address='$rest_address', rest_postcode='$rest_postcode', rest_city='$rest_city', rest_state='$rest_state', start1='$start1', start2='$start2', start3='$start3', start4='$start4', start5='$start5', start6='$start6', start7='$start7', end1='$end1', end2='$end2', end3='$end3', end4='$end4', end5='$end5', end6='$end6', end7='$end7', delivery='$delivery', delivery_fee='$delivery_fee', open='$open', halal='$halal', non_halal='$non_halal' WHERE rest_id='$rest_id'") 
			or die(mysqli_error($conn));
			header('location:rest_info.php?rest_id='.$rest_id);
	
	
	
}

?>
