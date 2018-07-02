
<?php

ini_set('max_execution_time', 60);
@session_start();
$serverIMGURI = 'http://'.$_SERVER['HTTP_HOST'].'/AmCacti/';
defined('APP_IMAGES') ||  define('APP_IMAGES', $serverIMGURI.'images/');
defined('APP_IMAGES_DIR') ||  define('APP_IMAGES_DIR', $_SERVER['DOCUMENT_ROOT'].'/AmCacti/'.'images/');

        if($_SERVER['HTTP_HOST']=='localhost'){
           echo 'executed';
            $mailhost = "virtualbreez.com";	// SMTP servers
    		$mailsmtpauth=true;
    		$username = "Tahatauquir@virtualbreez.com"; // SMTP username
    		$userpass = "Abc123"; 			 // SMTP password
    		$mailfrom = "Tahatauquir@virtualbreez.com";
    		$mailadd = "Tahatauquir@virtualbreez.com";
        }else{
            $mailhost = "mail.swisssuppliersgmbh.com";	// SMTP servers
    		$mailsmtpauth=true;
    		$username = "mail@swisssuppliersgmbh.com"; // SMTP username
    		$userpass = "burney123"; 			 // SMTP password
    		$mailfrom = "info@swisssuppliersgmbh.com";
    		$mailadd = "info@swisssuppliersgmbh.com";
        }
 



require_once('common/mail-connect.php');

function SendEmail($message,$email){
global $mailhost;
global $mailsmtpauth;
global $username;
global $userpass;
global $mailfrom;
global $mailadd;
    $sess=1;
$filepath="";
    
   echo $mailhost;
echo $mailsmtpauth;
echo $username;
echo $userpass;
echo $mailfrom;
echo $mailadd;

    ini_set("include_path", $filepath);
	require("assets/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host     = $mailhost; 						// SMTP server
	$mail->SMTPAuth = $mailsmtpauth;    				 // turn on SMTP authentication
	$mail->Username = $username;					 // SMTP username
	$mail->Password = $userpass; 					 // SMTP password
	$mail->From     = $mailfrom;
	$mail->FromName = "";
	$mail->AddAddress($mailadd);
	$mail->AddCC($email);
    $mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";
	$mail->Subject  = "Your Order is Successfully Placed!";
	$mail->Body     =  $message;
	if($mail->Send()){
	@	header("HTTP/1.1 200");
	}else{
	@	header("HTTP/1.1 500");
	}
    return true;
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

    </style>

<style>
tr:hover {background-color: #f5f5f5;}

</style>
    
</head>
<body>
    <?php SendEmail("abc","taha24888@gmail.com");  ?>
</body>

