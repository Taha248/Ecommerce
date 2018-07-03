<?php
$DB_HOST="localhost";
$DB_NAME="tst";
$DB_USERNAME="root";
$DB_PASSWORD="";
$DB_TYPE=5;
try{
<<<<<<< HEAD

=======
    
>>>>>>> 05696e2e3041f5892f5a7071c7c9657d0a6385ee
     if($DB_TYPE==1)
    {
        $conn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", "$DB_USERNAME", "$DB_PASSWORD"); // SQL SERVER 2012
    }
    else if($DB_TYPE==2)
    {
<<<<<<< HEAD

=======
        
>>>>>>> 05696e2e3041f5892f5a7071c7c9657d0a6385ee
				$tns = "(DESCRIPTION =
							(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $DB_HOST)(PORT = $DB_PORT)))
							(CONNECT_DATA = (SERVICE_NAME = $DB_NAME))
						)";
				$con = new PDO("oci:dbname=$tns", $DB_USERNAME, $DB_PASSWORD); // ORACLE
    }
    else if($DB_TYPE==5)
    {
    $conn = new PDO('mysql:'.$DB_HOST.';dbname='.$DB_NAME.'',''.$DB_USERNAME,''.$DB_PASSWORD);
    } else if (DB_TYPE==6){
<<<<<<< HEAD

        $conn = new PDO("pgsql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);  //Postgress
    }

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

=======
        
        $conn = new PDO("pgsql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);  //Postgress
    }
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
>>>>>>> 05696e2e3041f5892f5a7071c7c9657d0a6385ee
}
catch(PDOException $ex)
{
    echo 'Error Connecting to Database';
}

<<<<<<< HEAD
defined('app_name') || define('app_name', 'Ecommerce');
defined('serverpath') || define('serverpath', __DIR__.DIRECTORY_SEPARATOR);
$serveruri=(isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ? "https" : "http"). "://".$_SERVER['HTTP_HOST']."/".app_name.'/';

=======
>>>>>>> 05696e2e3041f5892f5a7071c7c9657d0a6385ee

function InsertData($query,$con){
try {
    $con->exec($query);
     $last_id = $con->lastInsertId();
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $e . "<br>" . $e->getMessage();
    }

$conn = null;
    return $last_id;
}

?>