<?php 

$order_id=$_GET['order_id'];
$user_id=$_GET['user_id'];
?>

<div class="col-sm-8">
  <div class="chat-panel panel panel-default">
    <div class="panel-heading">
      <h3 style=" margin-top:0; margin-bottom:0"><i class="fa fa-phone fa-fw"></i>Chat for order id :<?php echo $order_id ?></h3>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
      <ul class="chat">
        <div id="displayarea"></div>
      </ul>
    </div>
    <!-- /.panel-body -->
    <div class="panel-footer">
      <div class="input-group">
        <input id="msg" type="text" class="form-control input-sm" placeholder="Type your message here..." autocomplete="off" />
        <span class="input-group-btn">
        <input class="btn btn-warning btn-sm" type="submit" id="submit" value="SEND" />
        </span> </div>
    </div>
    <!-- /.panel-footer --> 
  </div>
  <!-- /.panel .chat-panel --> 
</div>
<script>
	$(document).ready( function(){
		refresher();
		$("#submit").click(function(){
			var msg =$("#msg").val();
			var order_id ="<?php echo $order_id ?>";
			$.ajax({
				url: "chat_func.php",
				type: "POST",
				async:false,
				data:{
					"send" : 1,
					"order_id" : order_id,
					"msg" : msg
				},
				success: function(data){
					$("#msg").val('');
				}
			})
			
		});
	});
	
	function refresher(){
		setTimeout(function(){
			$('#displayarea').load('refchat.php?user_id=<?php echo $user_id ?>&order_id=<?php echo $order_id ?>');
			refresher();
		},200);
	}

</script>