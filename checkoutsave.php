<?php
require_once('common/mail-cosasdsannect.php');

function SendEmail($message,$email){
global $mailhost;
global $mailsmtpauth;
global $username;
global $userpass;
global $mailfrom;
global $mailadd;
    $sess=1;
$filepath="";
$firstname="abc";
$lastname="abc";
$phone="003";
$address1="abc";
$address2="abc";
$city="abc";
$zip="abc";

    ini_set("include_path", $filepath);
	require("assets/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host     = $mailhost; 						// SMTP server
	$mail->SMTPAuth = $mailsmtpauth;    				 // turn on SMTP authentication
	$mail->Username = $username;					 // SMTP username
	$mail->Password = $userpass; 					 // SMTP password
	$mail->From     = $mailfrom;
	$mail->FromName = "American Cacti";
	$mail->AddAddress($mailadd);
	$mail->AddCC($email);
    $mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";
	$mail->Subject  = "Checkout";
	$mail->Body     =  $message;	
	if($mail->Send()){
		header("HTTP/1.1 200");
	}else{
		header("HTTP/1.1 500");
	}
    return true;
}
?>

