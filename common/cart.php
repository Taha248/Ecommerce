<?php 

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
        Add($cart);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['AddToRemove']))
    {
        Remove($cart);
    }


    function Add($cart)
    {
     $cart->add('1', 1, [
     'price'  => '5.99',
     'color'  => 'Red',
     'size'   => 'M',
]);
        // do stuff     
    }
    function Remove($cart)
    {
    $cart->remove('1');
    }


$allItems = $cart->getItems();
foreach ($allItems as $items) {
  foreach ($items as $item) {
    echo 'ID: '.$item['id'].'<br />';
    echo 'Qty: '.$item['quantity'].'<br />';
    echo 'Price: '.$item['attributes']['price'].'<br />';
    echo 'Size: '.$item['attributes']['size'].'<br />';
    echo 'Color: '.$item['attributes']['color'].'<br />';
  }


}


?>