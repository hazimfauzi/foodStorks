<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<?php
include("connect.php");

if(isset($_POST["submit"])) {
	$rest_id=$_POST['rest_id'];
	if($_POST['user_id']==0){
		echo '<script>
		setTimeout(function() {
			sweetAlert({
				title: "Oops...",
				text: "You need to login first to review our restaurant!",
				type: "error"
			}, function() {
				window.history.go(-1);
			});
		}, 200);
		</script>'; 
	} else {
		$user_id=$_POST['user_id'];
	
	
	$review_star=$_POST['star'];
	
	if(isset($_POST['title'])){
		$review_title=$_POST['title'];
	}else{
		$review_title="";
	}
	if(isset($_POST['desc'])){
		$review_desc=$_POST['desc'];
	}else{
		$review_desc="";
	}
	mysqli_query($conn,"INSERT INTO review (review_star, review_title, review_desc, rest_id, user_id,review_date)
						VALUES ('$review_star', '$review_title', '$review_desc', '$rest_id', '$user_id',NOW());")or die(mysqli_error($conn));
	
	
	$reviewquery=mysqli_query($conn,"	SELECT review_star FROM review WHERE rest_id='$rest_id'")or die(mysql_error());
	$total=0;
	$totalstar=0;
	while($rowreview=mysqli_fetch_array($reviewquery)){
		$total++;
		$totalstar+=$rowreview[0];
	}
	$rest_rate=$totalstar/$total;
	mysqli_query($conn,"UPDATE restaurant
						SET rest_rate = '$rest_rate',total_rate='$total'
						WHERE rest_id='$rest_id';")or die(mysqli_error($conn));
						
	echo '<script>
		setTimeout(function() {
			swal({
				title: "Success!",
				text: "Thank You very much for review our restaurant",
				type: "success"
			}, function() {
				window.location = "restaurant.php?rest_id='.$rest_id.'";
			});
		}, 200);
		</script>'; 
	
	}
}
if(isset($_POST["edit"])) {
	$rest_id=$_POST['rest_id'];
	$user_id=$_POST['user_id'];
	$review_star=$_POST['star'];
	
	if(isset($_POST['title'])){
		$review_title=$_POST['title'];
	}else{
		$review_title="";
	}
	if(isset($_POST['desc'])){
		$review_desc=$_POST['desc'];
	}else{
		$review_desc="";
	}
	
	
						
	mysqli_query($conn,"UPDATE review
						SET review_star = '$review_star', review_title = '$review_title',review_desc = '$review_desc',review_date= NOW()
						WHERE user_id='$user_id' AND rest_id='$rest_id';")or die(mysqli_error($conn));
	$reviewquery=mysqli_query($conn,"	SELECT review_star FROM review WHERE rest_id='$rest_id'")or die(mysql_error());
	$total=0;
	$totalstar=0;
	while($rowreview=mysqli_fetch_array($reviewquery)){
		$total++;
		$totalstar+=$rowreview[0];
	}
	$rest_rate=$totalstar/$total;
	mysqli_query($conn,"UPDATE restaurant
						SET rest_rate = '$rest_rate',total_rate='$total'
						WHERE rest_id='$rest_id';")or die(mysqli_error($conn));
	echo '<script>
		setTimeout(function() {
			swal({
				title: "Success!",
				text: "Successful update your review status.",
				type: "success"
			}, function() {
				window.location = "restaurant.php?rest_id='.$rest_id.'";
			});
		}, 200);
		</script>'; 
	
}


?>
