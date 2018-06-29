
<?php

include_once('Variables.php');
include_once('common/connection.php');
include_once('libraries.php');
 include_once('common/navbar.php'); 
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
} 
else {
    echo "Product Brand NOT FOUND";
}


$sql = "SELECT * FROM userdetails where UserDetailID=1;";

$result = $con->query($sql);
//$resultSize = $con->query($sqlSize);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $Firstname =$row["FirstName"];
        $LastName=$row["LastName"];
        $Address=$row["Address"];
        $Country=$row["Country"];
        $City=$row["City"];
        $State=$row["State"];
        $ZipCode=$row["ZipCode"];
        $Contact=$row["Contact"];
        $Email=$row["emailAddress"];
    }
} else {
    echo "Product Details NOT FOUND";
}



$sql = "SELECT * FROM userdetails where UserDetailID=1;";

$result = $con->query($sql);
//$resultSize = $con->query($sqlSize);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $Firstname =$row["FirstName"];
        $LastName=$row["LastName"];
        $Address=$row["Address"];
        $Country=$row["Country"];
        $City=$row["City"];
        $State=$row["State"];
        $ZipCode=$row["ZipCode"];
        $Contact=$row["Contact"];
        $Email=$row["emailAddress"];
    }
} else {
    echo "Product Details NOT FOUND";
}



$cart= $jcart->get_contents();
$Msg='
<h2 style="color:black;text-align:center;	color: #000;font-size: 26px;font-weight: 300;text-align: center;text-transform: uppercase;position: relative;
	margin: 30px 0 80px;"> Order <b style="
	color: #ffc000;">Details</b></h2>
<table align="center" >
<tr>
<th  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"> </th>
<th  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>Name</strong></td>
<th  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>Quantity</strong></td>
<th  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>Price</strong></td>
</tr>
';
     foreach($cart as $item)
                    {
                            
                            
                            $Msg.= '<tr>
                                  <td> <img width="100px" height="100px"  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;" src="http://virtualbreez.com/'.getProductImage($item['id'],$con).'" /></td>
                                    <td   style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;">'.$item['name'].'</td>
                                    <td  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;">'.$item['qty'].'</td>
                                    <td  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;">'.toMoney($item['price']).'</td>
                              
                        
                            </tr>';
                    }

                        $Msg.=' <tr> <td><strong>Total</strong></td>
                          <td  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;"></td>
                          <td  style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;"></td>
                          <td   style="padding: 15px;text-align: left;border-bottom: 1px solid #ddd;color:green;"><strong>'.toMoney($item['subtotal']).'</strong></td><tr>';


$Msg.='</table><h2 style="color:black;text-align:center;	color: #000;font-size: 26px;font-weight: 300;text-align: center;text-transform: uppercase;position: relative;
	margin: 30px 0 80px;"> Your <b style="
	color: #ffc000;">Details</b></h2>';
$Msg.='<div style="width:100%;"><table align="center" style="width:50%;" >
';
                            $Msg.= '<tr>
                <th  style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>First Name</strong></th>
                                 <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;"">'.$Firstname.'</td>
                                    
</tr>
<tr>
                <th style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>Last Name</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$LastName.'</td>                 
</tr> 
<tr>
                <th style="text-align:center;background-color: #4CAF50;color: white;"><strong>Address</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$Address.'</td>
                        </tr>
                                    
<tr>
                <th style="text-align:center;   background-color: #4CAF50;color: white;"><strong>Country</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$Country.'</td>
                        </tr>
                                    
<tr>
                <th style="text-align:center;   background-color: #4CAF50;
    color: white;"><strong>City</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$City.'</td>
                        </tr>
                                    
<tr>
                <th style="text-align:center;background-color: #4CAF50;color: white;"><strong>State</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$State.'</td>
                        </tr>
                                    
<tr>
                <th style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>ZipCode</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$ZipCode.'</td>
                        </tr>
                                    
<tr>
                <th style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>Contact</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$Contact.'</td>
                                    
                        </tr>
<tr>
                <th style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;background-color: #4CAF50;color: white;"><strong>Email</strong></th>
                                    <td style="padding: 15px;text-align: center;border-bottom: 1px solid #ddd;">'.$Email.'</td>
                        </tr>
                        </div>
';



$Msg.='</table>';


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
    include_once('css/index.css');

    </style>
<link href="https://fonts.googleapis.com/css?family=Poppins:500" rel="stylesheet">

<style>
tr:hover {background-color: #f5f5f5;}

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
    </div>
                <form class="form-horizontal" method="post" action="">
            <div class="row cart-body">
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
                </div>
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
                                <div class="row">
        <div class="col-lg-12">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>Account Title </th>
                        <td><?php echo $ACCOUNT_TITLE; ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Branch Name </th>
                        <td>   <?php echo $BANKNAME; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Account#</th>
                        <td> <?php echo $ACCOUNT_NUMBER; ?></td>
                    </tr>
                    <tr>
                        <th>Branch Code</th>
                        <td>      <?php echo $BRANCHCODE; ?></td>
                    </tr>
                    <tr>
                        <th>Branch City</th>
                        <td> <?php echo $BANKCITY; ?></td>
                    </tr>
                    
                    <tr>
                        <th>Swift Code</th>
                        <td><?php echo $SWIFT_CODE; ?></td>
                    </tr>
                  
                     
                    
                    
                </tbody>
            </table>
            <hr>
        </div>
    </div>
<style>
   th{
        text-align: center;
    }
    td{
        text-align: left;
    }


</style>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                    
    <div style="width:100%;text-align:center;">
                                  <button style="width:140px;height:45px;" type="submit" class="btn btn-primary btn-submit-fix btn-order">Place Order</button>
    </div>
                </form>
            </div>

    </div>
    </div>
    <?php include_once('footer.php');  ?>
<script>
</script>
</body>
