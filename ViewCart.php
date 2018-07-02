<?php

include_once('libraries.php');
include_once('Variables.php');
   include_once('common/navbar.php'); 
$cart= $jcart->get_contents();


//echo $jcart->gettotal();

function getProductImage($id,$con){
        global $conn;
        global $DB_NAME;
        $sqlImg = "SELECT * FROM  ".$DB_NAME.".productImages p WHERE p.productID='".$id."' ";
    try{
  $result=$conn->query($sqlImg)->fetchAll(PDO::FETCH_BOTH);
    $i=0;
    foreach($result as $row)
    {
        
       $PRODUCT_IMG_URL[$i] =$row["Img_URL"];
        $i++;
    }
        }
      catch(PDOException $e)
    {
    echo  "<br>" . $e->getMessage();
    }
 return $PRODUCT_IMG_URL[0];
}


function getProductBrand($id,$con){     
    $PRODUCT_DETAILS_BRANDID=$id;
    
    
       global $conn;
        global $DB_NAME;
        $sqlBrand = "SELECT * FROM ".$DB_NAME.".productbrand b ,".$DB_NAME.".productDetails p WHERE p.`productBrand`=b.`companyID` AND ProductID='".$PRODUCT_DETAILS_BRANDID."'";

    try{
  $result=$conn->query($sqlBrand)->fetchAll(PDO::FETCH_BOTH);
    foreach($result as $row)
    {
        
       $PRODUCT_COMPANY_ID=$row["companyID"];
       $PRODUCT_DETAILS_BRAND=$row["companyName"];
    }
        }
      catch(PDOException $e)
    {
    echo  "<br>" . $e->getMessage();
    }
    return array($PRODUCT_COMPANY_ID,$PRODUCT_DETAILS_BRAND);
}
global $cartLenght;


if(array_key_exists('checkout',$_POST)){
   Checkout();
}

function CheckOut(){
    global $cart;
    global $jcart;
        $id=$_POST["id"];
        $qty=$_POST["qty"];
        $i=0;
                    foreach($cart as $item)
                    {
                        $currentID=$id[$i];
                        $currentQty=$qty[$i];
                        $jcart-> update_item($currentID, $currentQty);
                    $i++;
                    }
 
    
}

?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    include_once('css/index.css');

    </style>
</head>
<body>

<div class="container cont" style="margin-bottom:50px;">

	
			<h2>Product <b>Cart</b></h2>


<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($cart as $item)
                    {
                    echo '
                            <form method="post" action="./Checkout.php"><tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="iconShade thumbnail pull-left" href="./product-Details.php?productID='.$item['id'].'" style="margin-right:10px;"> <img class="media-object" src="'.getProductImage($item['id'],$conn).'" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="./product-Details.php?productID='.$item['id'].'">'.$item['name'].'</a></h4>
                                <h5 class="media-heading"> by <a href="./CompanyDetails.php?companyID='.getProductBrand($item['id'],$conn)[0].'">'.getProductBrand($item['id'],$conn)[1].'</a></h5>
                                 
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" id="exampleInputEmail1" value="'.$item['qty'].'" name="qty[]">
                        <input type="hidden" class="form-control" id="exampleInputEmail1" value="'.$item['id'].'" name="id[]">
                        
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>'.toMoney($item['price']).'</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>'.toMoney($item['subtotal']).'</strong></td>
                        <td class="col-sm-1 col-md-1">
                       <a class="jcart-remove" href="?jcartRemove='.$item['id'].'">
                <i class="fa fa-remove" style="font-size:24px"></i>
               </a></td>
                    </tr>';
          
    }?>
                    
                 
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>
                             <?php echo toMoney($jcart->gettotal()); ?>
                         </strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="submit" class="btn btn-success" name="checkout">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
                                </td>
                    </tr> <?php echo '</form>' ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
    <?php include_once('footer.php');  ?>
</body>