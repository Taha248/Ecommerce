
<?php
include_once('libraries.php');
$val[0] = "Phones & Tablets";
$val[1] = "Men's Fashion";
$val[2] = "Women Fashion";
$val[3] = "Beauty & Health";
$val[4] = "Appliances";
$val[5] = "Computers";
$val[6] = "TVS & Cameras";
$val[7] = "Home & Living";
$val[8] = "Sports & Travel";
$val[9] = "Baby,Toys & KIDS";
$val[10] = "Grocer's Shop";

// Link For Category Image 200x200 Resolution
$CategoryImgURL[0]="http://sastabazar.in/image/cache/data/journal2/category/mobile-tablets-accessories-200x200.png";
$CategoryImgURL[1]="https://i.ebayimg.com/thumbs/images/g/yyUAAOSwo4pYN96s/s-l200.jpg";
$CategoryImgURL[2]="https://ae01.alicdn.com/kf/HTB1JDGWXkKWBuNjy1zjq6AOypXaP/2018-Spring-Summer-women-Fashion-Casual-3-4-Sleeve-Speaker-Shirt-Womens-Crinkle-Slim-V-Neck.jpg_200x200.jpg";
$CategoryImgURL[3]="https://i.pinimg.com/736x/a0/1a/f1/a01af1874f84dc4dac6ca4c9143540b3--hair-care-products-beauty-products.jpg";
$CategoryImgURL[4]="https://www.dunyatradehub.com/image/cache/data/categories/appliances-200x200.png";
$CategoryImgURL[5]="https://images.flexshopper.xyz/200x200/product-prod-images/2781287fdd48934082b1b99803f7751e.png";
$CategoryImgURL[6]="https://res.cloudinary.com/hubtechshop-kenya/image/upload/v1521183682/HUBTECH/product-cat-video-conf-ip-cams-catv-cctv-300x300_sgb9mu.jpg";
$CategoryImgURL[7]="https://i.ebayimg.com/thumbs/images/g/7hEAAOSwdfZa~SGY/s-l200.jpg";
$CategoryImgURL[8]="http://www.dressterra.uk/images/offer/uk/111/9/14741754039/14741754039-thumb.jpg";
$CategoryImgURL[9]="https://ae01.alicdn.com/kf/HTB1c2dcOXXXXXX5XVXXq6xXFXXXo/Baby-Toy-Fun-Pumpy-Ball-Cute-Plush-Soft-Cloth-Hand-Rattles-Bell-Training-Grasping-Ability-Toy.jpg_200x200.jpg";
$CategoryImgURL[10]="http://www.flowerdeliveryphilippines.com.ph/images/products/thumbs/1256-gift-basket-05.jpg";


// Link For Brands Image 200x200 Resolution
$BrandImgURL[0]="https://i.pinimg.com/736x/54/e5/45/54e545c669b629eb61e83b6672eb7e12--popular-logos-logo-templates.jpg";
$BrandImgURL[8]="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfE9l_ccVgUGAzO_de1gDLrZ6RAVwSXObAFN2PYXjM09DPPjb1Ow";
$BrandImgURL[2]="https://www.tailorbrands.com/wp-content/uploads/2016/07/bobble-logo.jpg";
$BrandImgURL[3]="https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/092010/collective_brands_0.jpg?itok=etASUklA";
$BrandImgURL[4]="http://insiyabi.com.pk/wp-content/uploads/2017/01/khaadi-logo-300x300.jpg";
$BrandImgURL[5]="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuSUbIAi-osdzIUUajJ4D_hdMq206iMcr2r5DQV6PPYvhuRpSt8A";
$BrandImgURL[6]="https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/0005/1512/brand.gif?itok=Mr8T7wNV";
$BrandImgURL[7]="https://fcache1.pakwheels.com/original/4X/6/1/4/6141b896b96d6c61adf34da23f83d38682a31df0.gif";
$BrandImgURL[1]="http://www.chromebrains.com/uploads/category_main_pic/logo-design-164s.jpg";

// For Recommended Produucts Carousel 
// Recommended Products Name
$R_Details[0]= 'Synthetic\n
                    Synthetic sole\n
                    Shaft measures approximately 3" from arch\n
                    Skins are placed at the toe tip for durability and abrasion protection during intense training\n
                    Strategic perforations on the heel enhance ventilation\n
                    Full-length injected Phylon foam provides lightweight cushioning and responsiveness\n
                    Strategically placed rubber pods provide multi-surface traction ideal for speed drills\n';


//connection to database
global $R_productName;
global $productID;
global $R_productDetails;
global $R_productActualPrice;
global $R_productImg;
$con=mysqli_connect("localhost","root","","tst");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql = "SELECT * FROM productdetails ";
$sqlImg = "SELECT * FROM productdetails p , productimages i where p.productID = i.productID";
$result = $con->query($sql);
$resultImg = $con->query($sqlImg);

if ($result->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $result->fetch_assoc()) {
        $productID[$i] =$row["productID"];
        $R_productName[$i]=$row["productName"];
        $R_productDetails[$i]=$row["productDescription"];
        $R_productRating[$i]=$row["productRating"];
        $R_productActualPrice[$i]=$row["productActualPrice"];
        $R_productPrice[$i]=$row["productPrice"];
        $i++;
    }
} else {
    echo "0 results";
}

if ($resultImg->num_rows > 0) {
    // output data of each row
    $i=0;
    $PREV_productID=0;
    while($row = $resultImg->fetch_assoc()) {
        if($row["productID"]!=$PREV_productID)
        {
          $R_productImg[$i]= $row["Img_URL"];
       //     echo '</br>'.$row["Img_URL"];
        $i++;
        }
        $PREV_productID=$row["productID"];
    }
} else {
    echo "0 results";
}
mysqli_close($con);







/*


$R_productName[0]="Nike Black Mens Running Mens XT Air Epic Speed TR II";
$R_productName[1]="Samsung Galaxy S9 - 4GB RAM - 64GB ROM - Titanium Grey";
$R_productName[2]="Fitness Tracker Smart i8-M";
$R_productName[3]="Nikon D750 Body - Black";
$R_productName[4]="HP Notebook - 15-bs108ne - 15.6 FHD - 8th Gen.";
$R_productName[5]="Dawlance Fridge - 9122 - MONO - Grey";
$R_productName[6]="SBM Sports Sports Track Suit SB1083";
$R_productName[7]="Garnier Men Face wash Power White Double Action - 50ml";
$R_productName[8]="Sony PlayStation 4 Pro 1TB - Region 2 - Black";
$R_productName[9]="Dawlance DWT-155TB - Fully Automatic Washing Machine - 7KG - Grey";

$R_productDetails[0]="Nike Black Mens Running Mens XT Air Epic Speed TR II";
$R_productDetails[1]="Samsung Galaxy S9 - 4GB RAM - 64GB ROM - Titanium Grey";
$R_productDetails[2]="Fitness Tracker Smart i8-M";
$R_productDetails[3]="Nikon D750 Body - Black";
$R_productDetails[4]="HP Notebook - 15-bs108ne - 15.6 FHD - 8th Gen.";
$R_productDetails[5]="Dawlance Fridge - 9122 - MONO - Grey";
$R_productDetails[6]="SBM Sports Sports Track Suit SB1083";
$R_productDetails[7]="Garnier Men Face wash Power White Double Action - 50ml";
$R_productDetails[8]="Sony PlayStation 4 Pro 1TB - Region 2 - Black";
$R_productDetails[9]="Dawlance DWT-155TB - Fully Automatic Washing Machine - 7KG - Grey";


// Recommended Products Image
$R_productImg[0]="https://images.champssports.com/is/image/EBFL2/1948600_a1_ven_sc7_rs?hei=1500&wid=1500";
$R_productImg[1]="https://cdn.shopify.com/s/files/1/0259/1735/products/samsung_galaxy_s9_phone_template_2048x.jpg?v=1527584168";
$R_productImg[2]="https://www.dhresource.com/0x0s/f2-albu-g6-M01-F6-8D-rBVaSFpm03uALq9yAAM_OQQamV0963.jpg/bluetooth-smart-watch-dz09-smartwatch-watch.jpg";
$R_productImg[3]="https://www.bhphotovideo.com/images/images1500x1500/nikon_d5600_dslr_camera_body_1308818.jpg";
$R_productImg[4]="https://i5.walmartimages.com/asr/83fce361-1aa5-4dec-8f80-e89aa4a97a2f_1.93e64fec28a9c5a773e8587f056e1785.jpeg";
$R_productImg[5]="http://www.stickpng.com/assets/images/580b57fbd9996e24bc43bfb3.png";
$R_productImg[6]="https://images-na.ssl-images-amazon.com/images/I/811pV3A7gDL._SL1500_.jpg";
$R_productImg[7]="https://sc01.alicdn.com/kf/HTB1BlcHNVXXXXahaFXXq6xXFXXXd.jpg";
$R_productImg[8]="https://s.pacn.ws/1500/r8/playstation-4-pro-1tb-hdd-jet-black-490415.1.jpg?od6byi";
$R_productImg[9]="https://pk.daraz.io/2LGN8rUZ6-PAXqlFmLrPqDr327w=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/54/17407/1.jpg?0513";


*/


// Flash Deals Image
$Flash_Deals[5]="https://pk.daraz.io/ZRqNJJw59juCwmUxtBUWS0HBoho=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/02/94947/1.jpg?4252";
$Flash_Deals[2]="https://pk.daraz.io/HUib6Mx-pGtz8i4Fz4xC55_2vvs=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/13/86208/1.jpg?7261";
$Flash_Deals[3]="https://pk.daraz.io/9T5UDL1O9NPqXQvG2JlF6AIAcwo=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/67/59928/1.jpg?5290";
$Flash_Deals[6]="https://pk.daraz.io/N6zzypf6RnAP2XxrW1EaT9xbr28=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/02/05176/1.jpg?8027";
$Flash_Deals[4]="https://pk.daraz.io/Fq5B2OnqrIuoP75nBuY4RV9eLBI=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/19/22908/1.jpg?5691";
$Flash_Deals[0]="https://pk.daraz.io/U1nihqbdkIIS70fiV3bo5qx6W8w=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/56/82847/1.jpg?2608";
$Flash_Deals[1]="https://pk.daraz.io/VhVsB_eXEX79x70mshi883jI9LM=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/60/92266/1.jpg?0650";
$Flash_Deals[9]="https://pk.daraz.io/RlcoXlSMibtGElcKH0CvH7H9C3U=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/47/75086/1.jpg?0153";
$Flash_Deals[7]="https://pk.daraz.io/NLyKZ-ZDQtBFLb4FD4ctHbSUsDo=/fit-in/220x220/fiters:fill(white):sharpen(1,0,false):quality(80)/product/94/16137/1.jpg?4449";
$Flash_Deals[8]="https://pk.daraz.io/2LGN8rUZ6-PAXqlFmLrPqDr327w=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/54/17407/1.jpg?0513";

/*
// Recommended Products Rating
$R_productRating[0]=4;
$R_productRating[1]=4.5;
$R_productRating[2]=5;
$R_productRating[3]=3.5;
$R_productRating[4]=2.5;
$R_productRating[5]=3;
$R_productRating[6]=4;
$R_productRating[7]=4.5;
$R_productRating[8]=5;
$R_productRating[9]=2;
// Recommended Products Actual Price
$R_productActualPrice[0]="10000";
$R_productActualPrice[1]="102999";
$R_productActualPrice[2]="5000";
$R_productActualPrice[3]="35000";
$R_productActualPrice[4]="90000";
$R_productActualPrice[5]="35000";
$R_productActualPrice[6]="1299";
$R_productActualPrice[7]="250";
$R_productActualPrice[8]="55000";
$R_productActualPrice[9]="85000";


// Recommended Products Offered Price
$R_productPrice[0]="8500";
$R_productPrice[1]="82199";
$R_productPrice[2]="2500";
$R_productPrice[3]="40000";
$R_productPrice[4]="83999";
$R_productPrice[5]="31600";
$R_productPrice[6]="1500";
$R_productPrice[7]="209";
$R_productPrice[8]="51887";
$R_productPrice[9]="79000";


*/


global $subCategory;
for($i=0;$i<=sizeof($val);$i++)
{
 for($j=0;$j<=sizeof($val);$j++)
{
    $subCategory[$i][$j]="";
}
    
//  Carousel@Homepage
    //1400x400
 $CarouselImg[0]="https://assets.tatacliq.com/medias/sys_master/images/11565550141470.jpg";
 $CarouselImg[1]="https://images.milled.com/2018-01-06/mnvfRsKZrNFg6NuW/4zwVkYCtpwf4.jpg";
 $CarouselImg[2]="https://costforcosmetics.000webhostapp.com/imgs/44.jpg";
 $CarouselImg[3]="https://costforcosmetics.000webhostapp.com/imgs/44.jpg";
    
 $CarouselURL[0]="www.google.com";
 $CarouselURL[1]="www.facebook.com";
 $CarouselURL[2]="www.youtube.com";
 $CarouselURL[3]="www.youtube.com";
        
 $CarouselHeading[0]="";
 $CarouselHeading[1]="";
 $CarouselHeading[2]="";
 $CarouselHeading[3]="";
        
 $CarouselPara[0]="";
 $CarouselPara[1]="";
 $CarouselPara[2]="";
 $CarouselPara[3]="";
    

}


function toMoney($val,$symbol='Rs.',$r=0)
{
    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)) > 2) ? $j % 2 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}
function printRating($rating){
    
    $val = number_format($rating, 1);
   // echo $val;
    if($val<=4.25)
    {
    if($val<0.25&&$val>0||$val<1.25&&$val>1||$val<2.25&&$val>2||$val<3.25&&$val>3||$val<4.25&&$val>4)
    {$empty= ceil(5-$val);}
    else{
    $empty= floor(5-$val);   }
    }
    else if($val>=4.75) $empty=0;
    else $empty=0;
    while($val>0.75)
        {
             echo '<li class="list-inline-item"><i class="fa fa-star orange"></i></li>';    
            $val-=1;
        }
    if($val<0.75&&$val>0.25)
        {
        echo '<li class="list-inline-item"><i class="fa fa-star-half-o orange"></i></li>'; 
        }
   $i=0;
    while($i!=$empty)
    {
        echo '<li class="list-inline-item"><i class="fa fa-star-o orange"></i></li>'; 
        $i++;
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

    <script ><?php include_once('product-carousel.js'); ?></script>
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
<style><?php include('category-carousel.css'); ?></style>
<style><?php include_once('product-carousel.css'); ?></style>
<style><?php include_once('footer.css'); ?></style>
    <style>
     
    </style>
    
    
    </head>
<body style="background-color:#e9ebee;">
    <?php include_once('navbar.php'); ?>
    <?php include_once('carousel-top.php'); ?>
    <?php include_once('category-carousel.php'); ?>
    <?php include_once('product-carousel.php'); ?>
    <?php include_once('deals.caraousel.php'); ?>
    <?php include_once('brand-caraousel.php'); ?>
    <?php include_once('footer.php'); ?>
    </body>
</html>





















