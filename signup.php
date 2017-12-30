<?php 
include('connect.php');
session_start();
if (!isset($_SESSION['email'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$password=$_POST['password'];

$query=mysqli_query($conn,"select email from users where email='$email'")or die(mysql_error());
$row=mysqli_fetch_array($query);
	if($row['email'] == $email){
		?> <script> 
		window.alert("This Email : <?php echo $email ?> already exist, \n please contact Admin for the details.");
		window.history.go(-1); 
        </script> <?php
	}else{
		$date= date("Y-m-d H:i:s");
		$encryptPass = password_hash($password, PASSWORD_DEFAULT);								
		mysqli_query($conn,"insert into users(first_name,last_name,password,email,contact,created,modified,level) values('$fname','$lname','$encryptPass','$email','$contact','$date','$date','user')")or die(mysqli_error());
		
		//for send to email
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
		
		$bodyContent = '<h1>Welcome to foodStorks</h1>';
		$bodyContent .= '
		You Are now <b>successful</b> register to our system <br/><br/><b>
		Name     : '.$fname.' '.$lname.'<br/>
		Password : '.$password.'<br/><br/></b>
		Thank you,<br/>
		All-In-One Restaurant Management System <br/>
		http://foodStorks.tk/<br/>
		This is a Message email itself automatically. Please do not reply to this email.<br/>';
		
		
		$mail->Subject = 'Welcome to foodStorks!';
		$mail->Body    = $bodyContent;
		$mail->send();
		
		
		
		?> <script> window.alert("You are now successful register to our system. \n Please check your email : <?php echo $email ?>");
			window.history.go(-1); </script> <?php
		
		}
			}
			mysqli_close($conn);
		?>	