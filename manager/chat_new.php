<?php
include("connect.php");
$user_id = $_GET['session_id'];
$result=mysqli_query($conn,"SELECT DISTINCT(order_id) FROM chat WHERE chat_to = '$user_id' AND chat_time >= current_date - 1 ORDER BY chat_time DESC");

while($row=mysqli_fetch_array($result)){?>
	<a href="#" class="list-group-item" id="<?php echo $row['order_id'] ?>">
    	<i class="fa fa-comment fa-fw"></i> New Chat for :<?php echo $row['order_id'] ?>
	</a>
       	
<script>
	$(document).ready(function(){
		$("#<?php echo $row['order_id'] ?>").click(function(){
			$("#chat").load("chat.php?order_id=<?php echo $row['order_id'] ?>&user_id=<?php echo $user_id ?>");
		});
	});
</script><?php
}?>


