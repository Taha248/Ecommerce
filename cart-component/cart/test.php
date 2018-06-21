<?php 
include_once('test/class.Cart.php');

$cart= new Cart([
  // Can add unlimited number of item to cart
  'cartMaxItem'      => 0,
  
  // Set maximum quantity allowed per item to 99
  'itemMaxQuantity'  => 99,
  
  // Do not use cookie, cart data will lost when browser is closed
  'useCookie'        => false,
]);
   
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['AddToCart']))
    {
        $id=$_POST['id'];
        $price=$_POST['price'];
        $name=$_POST['name'];
        
        Add($cart,$id,$price,$name);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['AddToRemove']))
    {
        Remove($cart,"1");
    }


    function Add($cart,$id,$price,$name)
    {
     $cart->add(''.$id, 1, [
     'price'  => ''.$price,
     'name'  => ''.$name,
     ]);
        // do stuff     
    }
    function Remove($cart,$id)
    {
    $cart->remove($id);
    }


$allItems = $cart->getItems();
foreach ($allItems as $items) {
  foreach ($items as $item) {
    echo 'ID: '.$item['id'].'<br />';
    echo 'Qty: '.$item['quantity'].'<br />';
    echo 'Nam: '.$item['attributes']['name'].'<br />';
    echo 'Price: '.$item['attributes']['price'].'<br />';
  }

}


?>
<html>
<head>
    
    </head>
    <body>
<form action="test.php" method="post">
    <input type="hidden" value="1" name="id"/>
    <input type="hidden" value="ad" name="name"/>    
    <input type="hidden" value="2" name="price"/>    
    <button name="AddToCart" class="add-to-cart" > Add</button>
</form>
        
<form action="test.php" method="post">
    <input type="submit" name="AddToRemove" value="Remove" />
</form>
    </body>

<script>
 	

    </script>
</html>
