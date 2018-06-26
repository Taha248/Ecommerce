<?php

include_once('libraries.php');
include_once('Variables.php');
include_once('common/connection.php');

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
 
$cart = $jcart->get_contents();
 $sql = "SELECT * FROM BankInfo";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $result->fetch_assoc()) {
        $ACCOUNT_TITLE= $row['AccountTitle'];
        $BANKNAME=$row['BankName'];
        $BRANCHNAME=$row['BranchName'];
        $BRANCHCODE=$row['BranchCode'];
        $ACCOUNT_NUMBER=$row['AccountNumber'];
        $BANKCITY=$row['BankCity'];
        $SWIFT_CODE=$row['SwiftCode'];
        
    }
} else {
    echo "Product Brand NOT FOUND";
}

$Msg='
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action=""><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="ViewCart.php">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">';
     foreach($cart as $item)
                    {
                            $Msg.= '<div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="'.getProductImage($item['id'],$con).'" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">'.$item['name'].'</div>
                                    <div class="col-xs-12"><small>Quantity:<span>'.$item['qty'].'</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>'.toMoney($item['subtotal']).'</h6>
                                </div>
                            </div>
                        
                            <div class="form-group"><hr /></div>';
                    }
$Msg.='<div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span></span><span>'.toMoney($jcart->gettotal()).'</span></div>
                                </div>
                            </div>
                        </div>
                    </div>';


$Msg='    <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Information</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                <p> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="" /></div>
                            </div>
                        </div>'









if (isset($_POST['first_name'])) {

$id =InsertUserDetails($_POST['first_name'],$_POST['last_name'],$_POST['country'],
                     $_POST['city'],$_POST['state'],$_POST['zip_code'],
                     $_POST['address'],$_POST['phone_number'],$_POST['email_address']); 
    foreach($cart as $item)
                    {
                      
                    InsertOrder($item['id'],$item['qty'],$id);
                    }
   if( SendEmail($Msg,$_POST['email_address'])){
       echo 'TRUE';
       
   }
    else{
        echo 'false';
    }

}



function InsertOrder($productID,$productQuantity,$UserDetailID){
        global $con;
    $sql = "INSERT INTO OrderDetails (productQuantity, productID, UserDetailID) VALUES('".$productID."','".$productQuantity."','".$UserDetailID."');";
    
  
    $last_id=0;
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
    
}


function InsertUserDetails($first_name,$last_name,$country,$city,$state,$zipcode,$address,$contact,$email){
    global $con;
    $sql = "INSERT INTO UserDetails (FirstName, LastName, Address,Country,City,State,ZipCode,Contact,emailAddress) VALUES('".$first_name."','".$last_name."','".$country."',
            '".$city."','".$state."','".$zipcode."',
            '".$address."','".$contact."','".$email."');";
    
  
    $last_id=0;
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

   return $last_id;
}

//echo $jcart->gettotal();

function getProductImage($id,$con){
    
    
    $productID=$id;
    $sqlImg = "SELECT * FROM productImages p WHERE p.productID='".
        $productID."' ";
$resultImg = $con->query($sqlImg);
if ($resultImg->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $resultImg->fetch_assoc()) {
       $PRODUCT_IMG_URL[$i] =$row["Img_URL"];
        $i++;
    }
} else {
    echo "Product Image NOT FOUND";
}
    return $PRODUCT_IMG_URL[0];
}

function getProductBrand($id,$con){     
    $PRODUCT_DETAILS_BRANDID=$id;
    $sqlBrand = "SELECT * FROM productbrand b , productDetails p WHERE p.`productBrand`=b.`companyID` AND ProductID='".$PRODUCT_DETAILS_BRANDID."'";
$resultBrand = $con->query($sqlBrand);


if ($resultBrand->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $resultBrand->fetch_assoc()) {
       $PRODUCT_COMPANY_ID=$row["companyID"];
       $PRODUCT_DETAILS_BRAND=$row["companyName"];
        
    }
} else {
    echo "Product Brand NOT FOUND";
}
    return array($PRODUCT_COMPANY_ID,$PRODUCT_DETAILS_BRAND);
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
    include_once('css/index.css');

    </style>
</head>
<body>

<div class="container cont" style="">

	
			<h2>Place <b>Order</b></h2>


<!------ Include the above in your HEAD tag ---------->

<div class="container">
<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
               
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    <?php
                echo '
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="ViewCart.php">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">';
                            
                    foreach($cart as $item)
                    {
                            echo '<div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="'.getProductImage($item['id'],$con).'" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">'.$item['name'].'</div>
                                    <div class="col-xs-12"><small>Quantity:<span>'.$item['qty'].'</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>'.toMoney($item['subtotal']).'</h6>
                                </div>
                            </div>
                        
                            <div class="form-group"><hr /></div>';
                    }
                     echo '       
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span></span><span>'.toMoney($jcart->gettotal()).'</span></div>
                                </div>
                            </div>
                        </div>
                    </div>'?>
                    <!--REVIEW ORDER END-->
                </form>
                </div>
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="country" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="" /></div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Account Title :</strong></div>
                                <div class="col-md-12">
                                 <p> <?php echo $ACCOUNT_TITLE; ?></p>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <div class="col-md-12"><strong>Branch Name:    </strong> 
                               <?php echo $BANKNAME; ?></div>
                               
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Branch Code: </strong>
                               <?php echo $BRANCHCODE; ?></div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12"><strong>Account#:</strong> <?php echo $ACCOUNT_NUMBER; ?></div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12"><strong>Branch City:</strong>
                            <?php echo $BANKCITY; ?></div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12"><strong>Swift Code:</strong><?php echo $SWIFT_CODE; ?></div>
                               <p> </p>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                </form>
            </div>
    </div>
</div>

    <?php include_once('footer.php');  ?>
</body>