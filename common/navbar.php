<?php 
include_once('Variables.php');
require_once('cart/class.Cart.php');


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
        
    $cart= new Cart([
  // Can add unlimited number of item to cart
  'cartMaxItem'      => 0,
  
  // Set maximum quantity allowed per item to 99
  'itemMaxQuantity'  => 99,
  
  // Do not use cookie, cart data will lost when browser is closed
  'useCookie'        => false,
]);
$allItems = $cart->getItems();
    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['AddToCart'])){

        

       

}

else{
    
$Cart="Cart Empty";
}
    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['remove'])){
     $itemID=$_GET['itemID'];
       
        Remove($cart,$itemID);

}

$Cart="";

$sum=0;
foreach ($allItems as $items) {
  foreach ($items as $item) {
   $Cart.="  <tr>
        <td>".$item['attributes']['name']."</td>
        <td>".$item['quantity']."</td>
        <td>".$item['attributes']['price']."</td>
        <td>
        <form action='./' method='get'><button class='btn btn-danger' name='remove'> X 
        <input name='itemID' type='hidden' value='".$item['id']."'/>
        </form>
        </td>
      </tr>";  
      $sum+=intval($item['attributes']['price']);
      
  }

}
$Cart.="<tr><td style='width=100%;font-weight:bold;' colspan='3'> Total Ammount : <font style='color:green;'>Rs.".$sum."/-<font></td></tr>";

if($sum==0)
{
    $Cart ="<tr><td style='width=100%;font-weight:bold;' colspan='4'> Cart is Empty</td></tr>";
}

?>



<!-- Navbar Top-->
<nav class="navbar nav-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>                        
        </button>
        <a class="navbar-brand" href="./"><div>
           B2CPakisan      
          <!--  <img src="logo.PNG" width="30" height="30"/> --></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <form class="navbar-form navbar-left form-search" action="/action_page.php" >
            <div class="input-group searchbox" >
                <input type="text" class="form-control" placeholder="What are looking for?.." name="search">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit" >
                    <i class="glyphicon glyphicon-search"></i>
                </button>
                </div>
            </div>
        </form>
        <!--Navbar Top-->
        <ul class="nav navbar-nav navbar-right">
             <li class="cartBtn dropdown">
                 
                <a href="#" style="padding-right:33px;" class="viewCart dropdown-toggle"   data-toggle="dropdown" data- data-hover="dropdown"
                    data-animations="fadeIn fadeIn fadeIn fadeIn"
                   > 
                    <span class="glyphicon glyphicon-shopping-cart"   ></span>
                    <i class="fa fa-circle fa-stack-1g count" style="" >
                        <p >0</p>
                    </i>
                    
                    <div class="btnNav "  > 
                        <font style="">
                            View Cart
                            
                            <span class="caret"></span>
                            
                        </font>
                    </div>
                 </a>
                      <ul class="dropdown-menu">
                    <li style="">
                    <div class="container cart-empty" style="">
                               <?php 
    
    echo '  <table class="table table-striped" style="width:50%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>';
   echo $Cart; 
          echo '</tbody>
  </table>
';              
                        
                        
                        
                        
                        ?>
                        </div>
                    </li>
                    
               
                </ul>
            </li>
            <li class="needHelpBtn nav dropdown" id="" style=" " >
               <a href="#"  class="dropdown-toggle" id="WishList"   data-toggle="dropdown" data- data-hover="dropdown"
                    data-animations="fadeIn fadeIn fadeIn fadeIn">      
                   <div class="needHelpBtn "  >  
                       <span class="fa fa-heart-o"> </span>
                       <font> 
                           Wishlist
                           <span class="caret"></span> 
                       </font>
                    </div>
                    <span class="fa fa-heart-o">  
                        <span class="caret"></span>
                    </span>
                </a>
                   <ul class="dropdown-menu wishlist">
                    <li style="">
                    <div class="container" >
                        WishList is Empty
                 
                        </div>
                    </li>
                    
               
                </ul>
             </li>
            <li class="dropdown sidebtn">
                <a class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" href="#" id="LoginBtn" data-animations="fadeIn fadeIn fadeIn fadeIn">
                 <img src="https://use.fontawesome.com/releases/v5.0.13/svgs/solid/user-circle.svg" width=18px height=18px />
                    <div class="btnNav "  style="">  
                
                   <font style="margin-left:3px;font-size:20px;"> Login</font>
                    </div>
                    <span class="caret" style="color:black;"  >
                    </span>
                </a>
                
                <ul class="dropdown-menu" style="">
                    <li style="margin-bottom:-16px;">
                        <a href="#"  class="dropdownAccountBtns">
                            <div class="form-group">
                                <p style="font-family: 'Overpass', sans-serif;">Username:</p>
                                <input type="text" class="form-control LoginTxt" id="usr">
                            </div>
                            <div class="form-group">
                                <p  style="font-family: 'Overpass', sans-serif;">Password:</p>
                                <input type="password" class="form-control LoginTxt" id="pwd">
                            </div>
                            <form action="/action_page.php">
                                <button  style="" class="button button--nina button--text-thick button--text-upper button--size-s btn-account" data-text="Login">
                                    <span  class="ninaBtnOnHover">L</span>
                                    <span  class="ninaBtnOnHover">o</span>
                                    <span  class="ninaBtnOnHover">g</span>
                                    <span  class="ninaBtnOnHover">i</span>
                                    <span  class="ninaBtnOnHover">n</span>
                                </button>
                            </form>
                            <hr style="margin-top:10px;">
                        </a>
                    </li>
                    
                    <li style="margin-bottom:11px;" >
                        <a href="#" >
                            <button  style="" class="button button--nina button--text-thick button--text-upper button--size-s btn-account" data-text="Register">
						            <span  class="ninaBtnOnHover">S</span>
                                    <span  class="ninaBtnOnHover">i</span>
                                    <span  class="ninaBtnOnHover">g</span>
                                    <span  class="ninaBtnOnHover">n</span>
                                    <span  class="ninaBtnOnHover">u</span>
                                    <span  class="ninaBtnOnHover">p</span>
					       </button>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="needHelpBtn nav" style=" ">
               <a href="#" >      <div class="needHelpBtn "  style="font-family: 'Questrial', serif;">  
                
                    <span class="glyphicon glyphicon-alert"   style="color:#F17E0A;">
                    </span>  
                   <font style="margin-left:3px;font-size:20px;"> Need Help?</font>
                    </div>
                 </a>
                </li>
             
      </ul>
    </div>
  </div>
</nav>
    
       <!--End - Navbar Top-->
    
    
        <!-- Category Navbar -->
    
    
    <nav class="navbar navbar-inverse  categorybar-small" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                              background-color:#22222;border-radius:0px;
                                              ">
        
  <div class="container-fluid">
       <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
        <span class="icon-bar" style="background-color:darkblue"></span>
        <span class="icon-bar" style="background-color:darkblue;"></span>
        <span class="icon-bar" style="background-color:darkblue;"></span>                        
      </button>
    
    </div>
      
    <ul class="nav navbar-nav  categorybar ">
     
      <li class="dropdown " style="margin-left:100px;padding-bottom:5px;"><a class="dropdown-toggle" data-toggle="dropdown"  data-hover="dropdown" data-animations="fadeIn fadeIn fadeIn fadeIn" href="#" style="padding-left:0px;"> <h1 style="font-family: 'Questrial', serif;color:white;display:inline;font-size:16px;margin-left:30px;margin-top:7px;"> Categories </h1> <span class="caret"></span></a>
       
        <ul class="dropdown-menu Subcategory-menu navbarLarge" >
         
                <?php
            for($i=0;$i<sizeof($val);$i++)
            {
                echo '   <li class="dropdown categorydropdown">
                       <a class="dropdown-toggle" data-toggle="dropdown"  data-hover="dropdown" data-animations="fadeIn fadeIn fadeIn fadeIn">
                           ';
                
                echo $val[$i];
                echo ' 
                            <span style="display:inline;right:1;color:lightgray;
                                         right:3px;top:6.5px;position:absolute;
                                         font-size:12px;"  
                                  class="glyphicon glyphicon-menu-right">
                            </span> 
                            <ul class="dropdown-menu Subcategory-menu">
                                <li><a href="#">Sub-Category2</a></li>
                                <li><a href="#">Sub-Category3</a></li>
                            </ul>
                       </a>
                    </li>'; 
                }
            ?>
    
        
        </ul>

      </li>
      <li class="recomendedItems" style="padding-top:4px;margin-left:6em;padding-bottom:5px;"><a href="#" style="font-family: 'Questrial', serif;color:white;display:inline;font-size:16px;;margin-top:10px;">Recommended Products </a></li>
                <li class="recomendedItems" style="padding-top:4px;margin-left:80px;"><a href="#" style="font-family: 'Questrial', serif;color:white;display:inline;font-size:16px;;margin-top:10px;">Track Order </a></li>
            <li class="recomendedItems needHelp" style="padding-top:4px;margin-left:80px;padding-bottom:5px;"><div class="nHelp"><a href="#" class="needHelp" style="font-family: 'Questrial', serif;color:white;display:inline;font-size:16px;;margin-top:10px;padding-right:10px;padding-left:10px;text-decoration:none;">Need Help? </a></div></li>
    </ul>
  </div>
</nav>
  
    
    
    
    
    
    
    
    <nav style="text-align:center;" class="navbar navbar-inverse categorybar-large" style="border-radius:0px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                              background-color:#333333;
                                              ">
        
  <div class="container-fluid">
       <div class="navbar-header">
           <div>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav" style="float:none;color:white;width:100%;padding-right:34px;background:#33333" value="Categories">
                    <h1 style="font-family: 'Cinzel', serif;color:white;display:inline;font-size:16px;margin-left:30px;margin-top:7px;"> Categories </h1><span class="caret"></span>

      </button>
      
    <ul class="nav navbar-nav  categorybar"  style="margin-bottom:-10px;   ">
     
      <li class="dropdown" style="">
      
    <div class="collapse navbar-collapse" id="myNav"  >
                <ul class="nav navbar-nav Subcategory-menu navbarSmall"> 
         
                <?php
            for($i=0;$i<sizeof($val);$i++)
            {
                echo '   <li class="dropdown categorydropdown" style="text-align:center;">
                       <a class="dropdown-toggle" data-toggle="dropdown"  data-hover="dropdown" data-animations="fadeIn fadeIn fadeIn fadeIn" style="font-family: "Tajawal", sans-serif;"/>
                           ';
                
                echo $val[$i];
                echo ' 
                              <span style="display:inline;right:1;color:lightgray;
                                         
                                         font-size:10px;"  
                                  class="glyphicon glyphicon-menu-right">
                            <ul class="dropdown-menu Subcategory-menu"  style="margin-left:40%;margin-top:-15px;font-family: "Tajawal", sans-serif;">
                                <li style=""><a href="#">Sub-Category2</a></li>
                                <li><a href="#">Sub-Category3</a></li>
                            </ul>
                       </a>
                    </li>'; 
                }
            ?>
    
        
        </ul>
        </div>
      </li>
    </ul>
  </div>
      </div>
        </div>
</nav>
    
    
    
    