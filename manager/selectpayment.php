<?php
include("connect.php");
$rest_id = $_GET['rest_id'];
$result=mysqli_query($conn,"SELECT * FROM `order` WHERE done='1' AND paid='0' AND order_type='3' AND rest_id='$rest_id'");

while($row=mysqli_fetch_array($result)){?>
    <a href="#" style="text-decoration:none" id="<?php echo $row['order_id'] ?>"  >
        <div class="panel panel-default" style="min-height:50px">
         	<h4>&nbsp Table No: <?php echo $row['table_id']; ?></h4>
        </div>
    </a>
<script>
	$(document).ready(function(){
		$("#<?php echo $row['order_id'] ?>").click(function(){
			$("#info").load("payment_info.php?order_id=<?php echo $row['order_id'] ?>");
		});
	});
</script><?php
}?>
    


























