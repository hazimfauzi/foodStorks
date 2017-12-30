<?php 

include('session.php');
include('connect.php');

if(isset($_POST['submit'])){
	if(($_FILES['cat_image']['type'] = 'image/gif') || ($_FILES['cat_image']['type'] = 'image/jpeg') || ($_FILES['cat_image']['type'] = 'image/pjpeg') && ($_FILES['cat_image']['size'] < 2000000))
	{
		if ($_FILES['cat_image']['error'] > 0)
		{
			echo "return code: " .$_FILES['cat_image']['error'];
		}
		else if (file_exists('../upload/'.$_FILES['cat_image']['name']))
		{
			echo $_FILES['cat_image']['name']."Already exist";
		}
		else if (move_uploaded_file($_FILES['cat_image']['tmp_name'],'../upload/'.$_POST['rest_id'].'_'.$_POST['cat_name'].'_'.$_FILES['cat_image']['name']))
		{
			$cat_name=$_POST['cat_name'];
			$cat_image=$_POST['rest_id'].'_'.$_POST['cat_name'].'_'.$_FILES['cat_image']['name'];
			$rest_id=$_POST['rest_id'];
			$sql = mysqli_query($conn,"insert into category(cat_name, cat_image, rest_id) 
								values('$cat_name', '$cat_image', '$rest_id')");
			if($sql)
			{?>
				<script> 
					window.alert("Successful add <?php echo $cat_name ?> to your restaurant, \n Enjoy your day sir.");
					window.history.go(-1);
				</script><?php
			}
		}
	}
}

		
mysqli_close($conn);

?>
