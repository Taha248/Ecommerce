
<? php
    
ini_set('max_execution_time', 60);
@session_start();
$serverIMGURI = 'http://'.$_SERVER['HTTP_HOST'].'/AmCacti/';
defined('APP_IMAGES') ||  define('APP_IMAGES', $serverIMGURI.'images/');
defined('APP_IMAGES_DIR') ||  define('APP_IMAGES_DIR', $_SERVER['DOCUMENT_ROOT'].'/AmCacti/'.'images/');

        if($_SERVER['HTTP_HOST']=='localhost'){
            $mailhost = "virtualbreez.com";	// SMTP servers
    		$mailsmtpauth=true;
    		$username = "Tahatauquir@virtualbreez.com"; // SMTP username
    		$userpass = "Cdn0h55_"; 			 // SMTP password
    		$mailfrom = "Tahatauquir@virtualbreez.com";
    		$mailadd = "Tahatauquir@virtualbreez.com";
            echo 'EXECUTED';
        }
else{
            $mailhost = "mail.swisssuppliersgmbh.com";	// SMTP servers
    		$mailsmtpauth=true;
    		$username = "mail@swisssuppliersgmbh.com"; // SMTP username
    		$userpass = "burney123"; 			 // SMTP password
    		$mailfrom = "info@swisssuppliersgmbh.com";
    		$mailadd = "info@swisssuppliersgmbh.com";
        }
?>