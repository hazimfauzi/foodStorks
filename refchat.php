<?php 
	include 'connect.php';
	
		$order_id = $_GET['order_id'];
		$user_id = $_GET['user_id'];
		$result=mysqli_query($conn,"SELECT chat.*,users.first_name,users.last_name,users.picture
									FROM chat
									INNER JOIN users
									ON chat.chat_from=users.id 
									WHERE chat.order_id = '$order_id' 
									ORDER BY chat_time DESC ");
		
		while($row = mysqli_fetch_array($result)){ 
			if($row['chat_from']==$user_id){ ?>

<li class="right clearfix"> <span class="chat-img pull-right"> <img src="<?php if($row['picture']!=""){ echo $row['picture']; }else{ echo "http://placehold.it/50/FA6F57/fff"; } ?>" alt="User Avatar" class="img-circle" /> </span>
  <div class="chat-body clearfix">
    <div class="header"> <small class=" text-muted"> <i class="fa fa-clock-o fa-fw"></i><?php echo $row['chat_time'] ?></small> <strong class="pull-right primary-font">Me</strong> </div>
    <p> <?php echo $row['chat_msg'] ?> </p>
  </div>
</li>
<?php
			} else {?>
<li class="left clearfix"> <span class="chat-img pull-left"> <img src="<?php if($row['picture']!=""){ echo $row['picture']; }else{ echo "http://placehold.it/50/55C1E7/fff"; } ?>" alt="User Avatar" class="img-circle" /> </span>
  <div class="chat-body clearfix">
    <div class="header"> <strong class="primary-font"><?php echo $row['first_name']." ".$row['last_name'] ?></strong> <small class="pull-right text-muted"> <i class="fa fa-clock-o fa-fw"></i><?php echo $row['chat_time'] ?></small> </div>
    <p> <?php echo $row['chat_msg'] ?></p>
  </div>
</li>
<?php		}
		}

	
?>
