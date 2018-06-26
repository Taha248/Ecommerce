
<? php
    
ini_set('max_execution_time', 60);
@session_start();
$serverIMGURI = 'http://'.$_SERVER['HTTP_HOST'].'/AmCacti/';
defined('APP_IMAGES') ||  define('APP_IMAGES', $serverIMGURI.'images/');
defined('APP_IMAGES_DIR') ||  define('APP_IMAGES_DIR', $_SERVER['DOCUMENT_ROOT'].'/AmCacti/'.'images/');

        if($_SERVER['HTTP_HOST']=='localhost'){
            $mailhost = "192.168.1.200";	// SMTP servers
    		$mailsmtpauth=true;
    		$username = "umair@mail2000.com"; // SMTP username
    		$userpass = "zaman21"; 			 // SMTP password
    		$mailfrom = "salman@mail2000.com";
    		$mailadd = "umair@mail2000.com";
        }else{
            $mailhost = "mail.swisssuppliersgmbh.com";	// SMTP servers
    		$mailsmtpauth=true;
    		$username = "mail@swisssuppliersgmbh.com"; // SMTP username
    		$userpass = "burney123"; 			 // SMTP password
    		$mailfrom = "info@swisssuppliersgmbh.com";
    		$mailadd = "info@swisssuppliersgmbh.com";
        }
?>