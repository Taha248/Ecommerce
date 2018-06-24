
<?php
include_once('libraries.php');
include_once('Variables.php');

global $companyID;
global $companyImg;
global $companyProductImg;
global $companyProductID;
global $companyName;
global $companyDescription;
global $companyContact;
global $companyEmail;
global $companyAddress;
    
    
  if(isset($_GET["companyID"]))
    {
        $companyID= $_GET["companyID"];
    }
$con=mysqli_connect("localhost","root","","tst");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql = "SELECT * FROM productbrand Where companyID=".$companyID;
$sqlProduct = "SELECT * FROM productImages WHERE productID IN ( select productID from productdetails where productBrand=".$companyID.") Group By(productID);
";

$result = $con->query($sql);
$resultProduct = $con->query($sqlProduct);
//$resultSize = $con->query($sqlSize);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $companyName =$row["companyName"];
       $companyDescription = $row["companyDetails"];  
       $companyAddress = $row["companyAddress"];   
       $companyEmail =$row["companyEmail"];
       $companyContact = $row["companyContact"];  
       $companyImg = $row["companyImg"];
    }
} else {
    echo "Product Details NOT FOUND";
}
if ($resultProduct->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $resultProduct->fetch_assoc()) {
        
       $companyProductID[$i] =$row["productID"];
       $companyProductImg[$i] =$row["Img_URL"];
       $i++;
    }
} else {
    echo "Product Details NOT FOUND";
}






?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script ><?php include_once('product-carousel.js'); ?></script>
    <style><?php include('css/index.css'); ?></style>
<style><?php include_once('product-carousel.css'); ?></style>
<style><?php include_once('footer.css'); ?></style>
<style><?php include_once('product-details.css'); ?></style>
<style><?php include_once('magnifier.css'); ?></style>
    <style>

@media (min-width: 768px){
.navbar-form {
    margin-left: 127px;
    width: 37%;
    }
           .cardcont{
                width: 99%;
            }
        }
        @media (max-width: 768px){
     
           .cardcont{
                width: 98%;
            }
        }
        .btn-account{
                margin-right: 30px;
        }
    </style>
    </head>
<body style="background-color:#e9ebee;width:100%;">
<style>
     .btn.focus, .btn:focus, .btn:hover{
         color:white;transition: all .4s ease;
-webkit-transition: all .4s ease;
     }</style>
<!------ Include the above in your HEAD tag ---------->
<div class="container cardcont" style="    padding-right: 0px;
    padding-left: 6px;
    margin-right: auto;
    margin-left: auto;
    margin-top: -14px;
      background-color:white;border-radius:5px 5px 5px 5px;box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2), 0 6px 20px 0 rgba(255, 255, 255, 0.19);                              font-family: 'Open Sans', sans-serif;
                              ">

	
<div class="product-card" style="border:none;">
	<div class="product-row">
		<aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
    
    
    <!-- Lets make a simple image magnifier -->
<div class="magnify" style="width:100%">

	<!-- This is the small image -->
	<img class="small img-responsive" src="<?php echo $companyImg ?>" width="82%" style="height:auto;"/>
	
</div>

<!-- Lets load up prefixfree to handle CSS3 vendor prefixes -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
<!-- You can download it from http://leaverou.github.com/prefixfree/ -->

<!-- Time for jquery action -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>
    
    
</div> <!-- slider-product.// -->

    
    
</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
<article class="card-body p-5">
	<h3 class="title mb-3" style="color:#006400;">
        <?php echo $companyName;?></h3>


<dl class="item-property">
  <dt>Description</dt>
  <dd><p><?php echo $companyDescription; ?> </p></dd>
</dl>
<hr>
	<div class="product-row">
		<div class="col-sm-7">
			<dl class="param param-inline">
			  <dt>Company Address: </dt>
			  <dd>
                  <p >  <?php echo $companyAddress; ?></p>
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
		<div class="col-sm-5">
			<dl class="param param-inline">
				  <dt>  Email</dt>
				  <dd>
				  <?php echo $companyEmail; ?>
                
				  </dd>
                  <dt>  Contact</dt>
				  <dd>
			      <?php echo $companyContact; ?>
				  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
	</div> <!-- row.// -->
    
	<hr>
				  <dt>  Products : </dt>
    <br/>
	<div class="img-small-wrap">
        
    <?php 
        
        for($i=0;$i<sizeof($companyProductImg);$i++)
        {
         
        echo  '<div class="item-gallery other-product'; 
            echo '"> <a href="./Product-Details.php?productID='.$companyProductID[$i].'"';
            echo 'class="iconShade"><img class="other-productImg "  style="border: 1px solid #e6dfdf;
    border-radius: 5px 5px 5px 5px;" src="';echo      $companyProductImg[$i];
            echo'" width=100 height=100></a> </div>';
        }
        
    ?>
  
</div> <!-- slider-nav.// -->
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->


</div>
<!--container.//-->


    
     <?php include_once('footer.php'); ?>
<style><?php include('css/index.css'); ?></style>
    </body>
</html>
