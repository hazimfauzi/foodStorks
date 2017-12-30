<?php 
include('connect.php');
if (isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$contact=$_POST['contact'];

$encryptPass = password_hash($password, PASSWORD_DEFAULT);
$date= date("Y-m-d H:i:s");	

$query=mysqli_query($conn,"select email from users where email='$email'")or die(mysql_error());
$row=mysqli_fetch_array($query);
	if($row['email'] == $email){
		?>
<script> 
		window.alert("This Email : <?php echo $email ?> already exist, \n Please contact Admin for the details.");
		window.history.go(-1); 
        </script>
<?php
	}else{							
		mysqli_query($conn,"insert into users(first_name,last_name,password,email,gender,address,contact,created,modified,level,status) 
					values('$fname','$lname','$encryptPass','$email','$gender','$address','$contact','$date','$date','user','Active')")
		or die(mysql_error());
		
		//for send to email
		require '../PHPMailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer;
		
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'storks4dmin@gmail.com';          // SMTP username
		$mail->Password = 'hazimfauzi'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to
		
		$mail->setFrom('storks4dmin@gmail.com', 'Food Storks');
		$mail->addReplyTo('storks4dmin@gmail.com', 'Food Storks');
		$mail->addAddress($email);   // Add a recipient
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		$mail->isHTML(true);  // Set email format to HTML
		
		$bodyContent = '<h1>Welcome to UTeM Event Management System</h1>';
		$bodyContent .= '
		You Are now <b>successful</b> register to our system <br/><br/><b>
		Name     : '.$fname.' '.$lname.'<br/>
		User Id  : '.$email.'<br/>
		Password : '.$password.'<br/><br/></b>
		Thank you,<br/>
		UTeM Event Management System <br/>
		http://uems.tk/<br/>
		This is a Message email itself automatically. Please do not reply to this email.<br/>';
		
		
		$mail->Subject = 'Welcome to foodstorks!';
		$mail->Body    = $bodyContent;
		$mail->send();
		
		
		
		?>
		<script> 
		window.alert("Successful add admin to system");
		window.history.go(-1); 
        </script>
		<?php
		
	}
mysqli_close($conn);
}
?>
