<?php include('header.php'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Recover your password</h3>
        </div>
        <div class="panel-body"><strong>Enter your user Id here.</strong>
          <form method="POST">
            <div class="form-group">
              <input class="form-control" name="username" type="text" id="username" placeholder="User ID" autofocus required>
            </div>
            We will send you an email with recovery password.
            <div class="modal-footer">
            <button id="login" name="submit" type="submit" class="btn btn-success"><i class="icon-signin icon-large"></i>Send Recovery Email</button>
            <a class="btn btn-default" href="index.php"><i class="icon-arrow-left icon-large"></i>Close</a>
            <?php
										if (isset($_POST['submit'])){
											$username = $_POST['username'];
											$sql = "SELECT * FROM user WHERE userId='$username'";
											$result2 = mysql_query($sql)or die(mysql_error());
											$row2 = mysql_fetch_assoc($result2);
											$num_row2 = mysql_num_rows($result2);
											
											if($num_row2 == 0){?>
            <div class="alert alert-danger">Invalid User Name...</div>
            <?php
												
											}else{
												$email = $row2['email'];
												$string="abcdefghijklmnopqrstuvwxyz0123456789";
												$recoveryPass=substr(str_shuffle($string),0,8);
												$encryptPass = password_hash($recoveryPass, PASSWORD_DEFAULT);
												
												mysql_query("update user set password = '$encryptPass' where userId = '$username' ")or die(mysql_error);
												
												
												
												
												
												
												//for sent password to email
												require '../PHPMailer/PHPMailerAutoload.php';

												$mail = new PHPMailer;
												
												$mail->isSMTP();                                   // Set mailer to use SMTP
												$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
												$mail->SMTPAuth = true;                            // Enable SMTP authentication
												$mail->Username = 'uems4dmin@gmail.com';          // SMTP username
												$mail->Password = 'hazimfauzi'; // SMTP password
												$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
												$mail->Port = 587;                                 // TCP port to connect to
												
												$mail->setFrom('uems4dmin@gmail.com', 'UEMS');
												$mail->addReplyTo('uems4dmin@gmail.com', 'UEMS');
												$mail->addAddress($email);   // Add a recipient
												//$mail->addCC('cc@example.com');
												//$mail->addBCC('bcc@example.com');
												
												$mail->isHTML(true);  // Set email format to HTML
												
												$bodyContent = '<h1>Recover your password</h1>';
												$bodyContent .= 
												'Dear '.$row2['name'].',<br/><br/>
												You have asked us for recovery password, and now we have done it.<br/><br/>
												This your recovery password : <br/>
												User Id  : '.$row2['userId'].'<br/>
												<b>Password : '.$recoveryPass.'</b><br/><br/>
												To change your password to make it more safe and happy in mind,<br/> 
												please login to your account and select the My Profile menu> Change Password.<br/><br/>
												Thank you,<br/>
												UTeM Event Management System <br/>
												http://uems.tk/<br/>
												This is a Message email itself automatically. Please do not reply to this email.<br/>
												';
												
												$mail->Subject = 'Recover your password';
												$mail->Body    = $bodyContent;
												$mail->send();
												//for send to email
												
												header("Location:change_password.php?userId=$username");
												
												
											}}
												?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
