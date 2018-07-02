
<?php

include_once('libraries.php');
include_once('Variables.php');
   include_once('common/navbar.php'); 

global $productID;
global $PRODUCT_DETAILS_HEADING;
global $PRODUCT_DETAILS_PRICE;
global $PRODUCT_DETAILS_ACTUAL_PRICE;
global $PRODUCT_DETAILS_DESCP;
global $PRODUCT_DETAILS_RATING;
global $PRODUCT_DETAILS_ORIGIN;
global $PRODUCT_DETAILS_BRANDID;
global $PRODUCT_DETAILS_BRAND;
global $PRODUCT_DETAILS_DELIVERY;
global $PRODUCT_DETAILS_COLOR;
global $PRODUCT_DETAILS_SIZE;
global $PRODUCT_IMG_URL;

  if(isset($_GET["productID"]))
    {
        $productID= $_GET["productID"];
    }

$sql = "SELECT * FROM productdetails p WHERE p.productID='".$productID."' ";
$sqlImg = "SELECT * FROM productImages p WHERE p.productID='".$productID."' ";
$sqlSize = "SELECT * FROM productsize p WHERE p.productID='".$productID."' ";

$result = $con->query($sql);
$resultImg = $con->query($sqlImg);
$resultSize = $con->query($sqlSize);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $PRODUCT_DETAILS_HEADING =$row["productName"];
       $PRODUCT_DETAILS_PRICE = $row["productPrice"];  
       $PRODUCT_DETAILS_ACTUAL_PRICE = $row["productActualPrice"];   
       $PRODUCT_DETAILS_DESCP =$row["productDescription"];
       $PRODUCT_DETAILS_ORIGIN = $row["productOrigin"];  
       $PRODUCT_DETAILS_BRANDID = $row["productBrand"];
       $PRODUCT_DETAILS_DELIVERY =$row["productDelivery"];
       $PRODUCT_DETAILS_COLOR = $row["productColors"]; 
       $PRODUCT_DETAILS_RATING = $row["productRating"];
    }
} else {
    echo "Product Details NOT FOUND";
}

$sqlBrand = "SELECT * FROM productBrand where companyID=".$PRODUCT_DETAILS_BRANDID;

$resultBrand = $con->query($sqlBrand);




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
if ($resultSize->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $resultSize->fetch_assoc()) {
       $PRODUCT_DETAILS_SIZE[$i] =$row["productSize"];
        $i++;
    }
} else {
    echo "Product Image NOT FOUND";
}
if ($resultBrand->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $resultBrand->fetch_assoc()) {
       $PRODUCT_DETAILS_BRAND=$row["companyName"];
        
    }
} else {
    echo "Product Brand NOT FOUND";
}


?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

    <script ><?php include_once('css/product-carousel.js'); ?></script>
    <script>
// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
    </script>
    <style><?php include('css/index.css'); ?></style>
<style><?php include_once('product-carousel.css'); ?></style>
<style><?php include_once('footer.css'); ?></style>
<style><?php include_once('css/product-details.css'); ?></style>
<style><?php include_once('css/magnifier.css'); ?></style>
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
      background-color:white;border-radius:5px 5px 5px 5px;box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2), 0 6px 20px 0 rgba(255, 255, 255, 0.19);                              
                              ">

	
<div class="product-card" style="border:none;">
	<div class="product-row">
		<aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
    
    
    <!-- Lets make a simple image magnifier -->
<div class="magnify" style="width:100%">
	
	
	<!-- This is the magnifying glass which will contain the original/large version -->
	<div class="large" style="background: url('<?php echo $PRODUCT_IMG_URL[0]; ?>') no-repeat;"></div>
	<!-- This is the small image -->
	<img class="small img-responsive" src="<?php echo $PRODUCT_IMG_URL[0]; ?>" width="82%" style="height:auto;"/>
	
</div>

<!-- Lets load up prefixfree to handle CSS3 vendor prefixes -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
<!-- You can download it from http://leaverou.github.com/prefixfree/ -->

<!-- Time for jquery action -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>
    
<script><?php include_once('js/magnifier.js'); ?></script>
    
</div> <!-- slider-product.// -->
<div class="img-small-wrap">
    <?php 
   for($i=0;$i<sizeof($PRODUCT_IMG_URL);$i++)
    {
        echo  '<div class="item-gallery '; 
            if($i==0) 
                echo' active'; 
            echo '"> <img src="';
            echo $PRODUCT_IMG_URL[$i];
            echo'"> </div>';
      
    }
    ?>
    

</div> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
<article class="card-body p-5">
	<h3 class="title mb-3">
        <?php 
        echo $PRODUCT_DETAILS_HEADING;
        ?></h3>

<p class="price-detail-wrap"> 
	<span class="price h3 " style="color:#8FC163;"> 
		<span class="currency"></span><span class="num"><?php echo toMoney($PRODUCT_DETAILS_PRICE);?>/-</span>
     
	</span>    
    <span class="price h3 " style="color:gray;"> 
        <span class="currency"></span><span style="font-size:12px;"><strike><?php echo toMoney($PRODUCT_DETAILS_ACTUAL_PRICE);?></strike></span>
     
	</span> 
    
    <?php
        echo '	<div class="star-rating">
										<ul class="list-inline">
                                        '; printRating($PRODUCT_DETAILS_RATING); echo '
										</ul>
									</div>';
      
        ?>
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p><?php echo $PRODUCT_DETAILS_DESCP; ?> </p></dd>
</dl>
<dl class="param param-feature">
  <dt>Origin</dt>
  <dd><?php echo  $PRODUCT_DETAILS_ORIGIN; ?></dd>
</dl>
    <dl class="param param-feature">
  <dt>Brand</dt>
  <dd><a href=<?php echo "./CompanyDetails.php?companyID=".$PRODUCT_DETAILS_BRANDID; ?> ><?php echo $PRODUCT_DETAILS_BRAND; ?></a></dd>
</dl>
    
    <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Color</dt>
  <dd><?php echo $PRODUCT_DETAILS_COLOR; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Delivery</dt>
  <dd><?php echo $PRODUCT_DETAILS_DELIVERY; ?></dd>
</dl>  <!-- item-property-hor .// -->

<hr>
	<div class="product-row">
		<div class="col-sm-5">
			<dl class="param param-inline">
			  <dt>Quantity: </dt>
			  <dd>
                     <input class="form-control" type="number" value="1" id="example-number-input" style="    width: 76px;">
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
		<div class="col-sm-7">
			<dl class="param param-inline">
				  <dt>Size: </dt>
				  <dd>
				  
			  	<select class="form-control form-control-sm" style="width:auto;">
                    <?php  
                    for($i=0;$i<sizeof($PRODUCT_DETAILS_SIZE);$i++)
                    {
                        echo '<option>'; echo $PRODUCT_DETAILS_SIZE[$i] ;  echo '</option>';
                    } 
                    ?>
                        
                        </select>
				  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
	</div> <!-- row.// -->
	<hr>
	<a href="#" class="btn btn-lg btn-primary text-uppercase btn-buy" style=""> Buy now </a>
	<a href="#" class="btn btn-lg btn-outline-primary text-uppercase" style="border: 1px solid #007BFF"> <i class="glyphicon glyphicon-shopping-cart"></i> Add to cart </a>
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
