<?php
	require_once('../phpqrcode/qrlib.php');
	
	
	$string="abcdefghijklmnopqrstuvwxyz0123456789";
	$qrName=substr(str_shuffle($string),0,12);
	
	
	QRcode::png("http://192.168.137.1/foodstorks/restaurant2.php?rest_id=$rest_id&table_id=$table_no", "../QRCODE/$rest_id$table_no$qrName.png");
	
	//$qr = new QrCode();
	
	//$qr 
		//->setText("http://uems.tk/register.php?timo=$userId&busuk=$eventId")
		//->setSize("200")
		//->setImageType(QrCode::IMAGE_TYPE_PNG)
		//->save("../../QRCODE/$eventId$userId.png");
		
?>