<?php
require_once('common/pdo-connection.php');
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




     try{
 
    global $DB_NAME;
         $sql = "SELECT * FROM ".$DB_NAME.".productdetails ";

  $result=$conn->query($sql)->fetchAll(PDO::FETCH_BOTH);
    $i=0;

    foreach($result as $row)
    {
        
       $productID[$i] =$row["productID"];
        $R_productName[$i]=$row["productName"];
        $R_productDetails[$i]=$row["productDescription"];
        $R_productRating[$i]=$row["productRating"];
        $R_productActualPrice[$i]=$row["productActualPrice"];
        $R_productPrice[$i]=$row["productPrice"];
        $i++;
    }
    
       }
    catch(PDOException $e)
    {
    echo  "<br>" . $e->getMessage();
    }









     try{
 
    global $DB_NAME;
         $sqlImg = "SELECT * FROM ".$DB_NAME.".productdetails p , ".$DB_NAME.".productimages i where p.productID = i.productID";


  $result=$conn->query($sqlImg)->fetchAll(PDO::FETCH_BOTH);
    $i=0;

    $PREV_productID=0;
    foreach($result as $row)
    {
     if($row["productID"]!=$PREV_productID)
        {
          $R_productImg[$i]= $row["Img_URL"];
       //     echo '</br>'.$row["Img_URL"];
        $i++;
        }
        $PREV_productID=$row["productID"];
    }
     }
    catch(PDOException $e)
    {
    echo  "<br>" . $e->getMessage();
    }









// Flash Deals Image
$Flash_Deals[5]="https://pk.daraz.io/ZRqNJJw59juCwmUxtBUWS0HBoho=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/02/94947/1.jpg?4252";
$Flash_Deals[2]="https://pk.daraz.io/HUib6Mx-pGtz8i4Fz4xC55_2vvs=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/13/86208/1.jpg?7261";
$Flash_Deals[3]="https://pk.daraz.io/9T5UDL1O9NPqXQvG2JlF6AIAcwo=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/67/59928/1.jpg?5290";
$Flash_Deals[6]="https://pk.daraz.io/N6zzypf6RnAP2XxrW1EaT9xbr28=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/02/05176/1.jpg?8027";
$Flash_Deals[4]="https://pk.daraz.io/Fq5B2OnqrIuoP75nBuY4RV9eLBI=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/19/22908/1.jpg?5691";
$Flash_Deals[0]="https://pk.daraz.io/U1nihqbdkIIS70fiV3bo5qx6W8w=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/56/82847/1.jpg?2608";
$Flash_Deals[1]="https://pk.daraz.io/VhVsB_eXEX79x70mshi883jI9LM=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/60/92266/1.jpg?0650";
$Flash_Deals[9]="https://pk.daraz.io/RlcoXlSMibtGElcKH0CvH7H9C3U=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/47/75086/1.jpg?0153";
$Flash_Deals[7]="images\product-items/facewash.jpg";
$Flash_Deals[8]="https://pk.daraz.io/2LGN8rUZ6-PAXqlFmLrPqDr327w=/fit-in/220x220/filters:fill(white):sharpen(1,0,false):quality(80)/product/54/17407/1.jpg?0513";




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


?>
