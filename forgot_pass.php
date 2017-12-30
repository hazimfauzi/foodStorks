<?php 
include("header.php");
include_once("connect.php");
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
      <li>Forgot Password</li>
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
        <div class="panel-body"><strong>Enter your email here.</strong>
          <form method="POST">
            <div class="form-group">
              <input class="form-control" name="email" type="text" id="email" placeholder="Enter your email here." autofocus required>
            </div>
            We will send you an email with recovery password.
            <div class="modal-footer">
            <button id="login" name="submit" type="submit" class="btn btn-success"><i class="icon-signin icon-large"></i>Send Recovery Email</button>
            <a class="btn btn-default" href="index.php"><i class="icon-arrow-left icon-large"></i>Close</a>
            <?php
										if (isset($_POST['submit'])){
											

											$email = $_POST['email'];
											$sql = "SELECT * FROM users WHERE email='$email'";
											$result2 = mysqli_query($conn,$sql)or die(mysqli_error($conn));
											$row2 = mysqli_fetch_assoc($result2);
											$num_row2 = mysqli_num_rows($result2);
											
											if($num_row2 == 0){?>
            <div class="alert alert-danger">Invalid Email...</div>
            <?php
												
											}else{
												$string="abcdefghijklmnopqrstuvwxyz0123456789";
												$recoveryPass=substr(str_shuffle($string),0,8);
												$encryptPass = password_hash($recoveryPass, PASSWORD_DEFAULT);
												
												mysqli_query($conn,"update users set password = '$encryptPass' where email = '$email' ")or die(mysql_error);
												
												
												
												
												
												
												//for sent password to email
												require 'PHPMailer/PHPMailerAutoload.php';

												$mail = new PHPMailer;
												
												$mail->isSMTP();                                   // Set mailer to use SMTP
												$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
												$mail->SMTPAuth = true;                            // Enable SMTP authentication
												$mail->Username = 'storks4dmin@gmail.com';          // SMTP username
												$mail->Password = 'hazimfauzi'; // SMTP password
												$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
												$mail->Port = 587;                                 // TCP port to connect to
												
												$mail->setFrom('storks4dmin@gmail.com', 'foodStorks');
												$mail->addReplyTo('storks4dmin@gmail.com', 'foodStorks');
												$mail->addAddress($email);   // Add a recipient
												//$mail->addCC('cc@example.com');
												//$mail->addBCC('bcc@example.com');
												
												$mail->isHTML(true);  // Set email format to HTML
												
												$bodyContent = '<h1>Recover your password</h1>';
												$bodyContent .= 
												'Dear '.$row2['first_name'].' '.$row2['last_name'].',<br/><br/>
												You have asked us for recovery password, and now we have done it.<br/><br/>
												This your recovery password :<b>Password : '.$recoveryPass.'</b><br/><br/>
												To change your password to make it more safe and happy in mind,<br/> 
												please login to your account and select the My Account to change your password.<br/><br/>
												Thank you,<br/>
												All-In-One Restaurant Management System <br/>
												http://foodstorks.tk/<br/>
												This is a Message email itself automatically. Please do not reply to this email.<br/>
												';
												
												$mail->Subject = 'Recover your password';
												$mail->Body    = $bodyContent;
												$mail->send();
												//for send to email
												
												header("Location:change_password.php?email=$email");
												
												
											}  }
												?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div></div>
<br>
<?php include ("footer.php"); ?>