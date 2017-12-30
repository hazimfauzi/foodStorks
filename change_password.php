<?php 
include("header.php");
include_once("connect.php");
$email=$_GET['email'];
?>
<!-- navigation section -->

<section class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand"><img src = "images/logo.png"  height = "100%" ><img> foodStorks</a> </div>
  </div>
</section>
<!--------------------------------------------- Path ------------------------------------------------------------------>

<div class="container" style="margin-top:90px">
  <div class="col-sm-12">
    <ul class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li>Change Password</li>
    </ul>
  </div>
</div>

<!--------------------------------------------- Path ------------------------------------------------------------------>
<div class="container" style="min-height:415px"> 
  <!-- Nav tabs -->
  
  <div class="col-sm-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-body" style="min-height:450px">
        <center>
          <h3 class="page-header" style=" margin-top:0; margin-bottom:1"><i class="fa fa-user fa-fw"></i>Recover your password</h3>
        </center>
        <form method="POST">
          <strong>
          	Dear <?php echo $email ?>,<br/><br /> </strong>
            You need to change your recovery password
         
          <div class="form-group">
            <input class="form-control" name="password" type="password" id="password" placeholder="Your Recovery Password" autofocus required>
            <h6>*check your email to get your recovery password</h6>
          </div>
          <div class="form-group">
            <input class="form-control" name="np" type="password" id="np" placeholder="New Password" autofocus required>
          </div>
          <div class="form-group">
            <input class="form-control" name="rp" type="password" id="rp" placeholder="Retype New Password" autofocus required>
          </div>
          <div class="modal-footer">
          <button id="login" name="submit" type="submit" class="btn btn-success">&nbsp;Change</button>
          <a class="btn btn-default" href="../index.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
          <?php
										if (isset($_POST['submit'])){
											session_start();
											$password = $_POST['password'];
											$np = $_POST['np'];
											$rp = $_POST['rp'];
											$sql = "SELECT * FROM users WHERE email='$email'";
											$result2 = mysqli_query($conn,$sql)or die(mysqli_error($conn));
											$row2 = mysqli_fetch_assoc($result2);
											$hashPass = $row2['password'];
											$hash = password_verify($password, $hashPass);
											
											if($hash == 0){
											?>
											<div class="alert alert-danger">Recovery Password Not Match</div>
											<?php
											}	
											else if($np!=$rp){
											?>
											<div class="alert alert-danger">New Password Not Match</div>
											<?php
											}else{
											$encryptPass = password_hash($np, PASSWORD_DEFAULT);
											mysqli_query($conn,"update users set password = '$encryptPass' where email = '$email' ")or die(mysql_error);
											
											
											if( $row2['status'] == 'Banned' ){ ?>
          <div class="alert alert-danger">You have been banned!!!</div>
          <?php }
											else if( $row2['level'] == 'admin' ) {
												$_SESSION['email']=$email;
												?><script><?php echo("location.href = 'admin/index.php';");?></script><?php
												exit;
												}
									
											else if( $row2['level'] == 'manager' ) {
												$_SESSION['email']=$email;
												?><script><?php echo("location.href = 'manager/index.php';");?></script><?php
												exit;
												}
									
											else if( $row2['level'] == 'user' ) {
												$_SESSION['email']=$email;
												?><script><?php echo("location.href = 'index.php';");?></script><?php
												exit;
												}
									
											else{ ?>
          <div class="alert alert-danger">Access Denied</div>
          <?php
												}}}
												?>
        </form>
      </div>
    </div>
  </div>
</div></div>
<br>
<?php include ("footer.php"); ?>