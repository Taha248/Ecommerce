
<?php 
include_once('Variables.php');
include_once('libraries.php');?>

<head>
 <style>   
<?php 
include_once('css/index.css');?></style>
</head>
<body>
<!-- Navbar Top-->
<nav class="navbar " style="background-color:#ffffff;padding-bottom:0px;margin-bottom:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar" style="background-color:darkblue"></span>
            <span class="icon-bar" style="background-color:darkblue;"></span>
            <span class="icon-bar" style="background-color:darkblue;"></span>                        
        </button>
        <a class="navbar-brand" href="#"><div style="font-family: 'Questrial', sans-serif;font-size:28px;color:#5BC0DE;">
            Big Bucket      
          <!--  <img src="logo.PNG" width="30" height="30"/> --></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <form class="navbar-form navbar-left form-search" action="/action_page.php" >
            <div class="input-group searchbox" style="    width: 99%;">
                <input type="text" class="form-control" placeholder="What are looking for?.." name="search">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit" style="background-color:#F17E0A;color:white;height:34px;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
                </div>
            </div>
        </form>
        <!--Navbar Top-->
        <ul class="nav navbar-nav navbar-right">
             <li class="cartBtn dropdown">
                 
                <a href="#" style="padding-right: 32px;" class="viewCart dropdown-toggle"   data-toggle="dropdown" data- data-hover="dropdown"
                    data-animations="fadeIn fadeIn fadeIn fadeIn"
                   > 
                    <span class="glyphicon glyphicon-shopping-cart"   style="color:#F17E0A;position:absolute;top:19;"></span>
                    <i class="fa fa-circle fa-stack-1g" style="color:red;top: 9px;left: 25px;position: absolute;" >
                        <p style="position:absolute;color:white;font-weight:bold;font-size:10px;top:2px;margin-left:3px;">0</p>
                    </i>
                    
                    <div class="btnNav "  style="font-family: 'Questrial', serif;"> 
                        <font style="margin-left:3px;font-size:20px;margin-left:25px;">
                            View Cart
                            
                            <span class="caret"></span>
                            
                        </font>
                    </div>
                 </a>
                      <ul class="dropdown-menu">
                    <li style="">
                    <div class="container" style="color:black;text-align:center;font-family: 'Questrial', serif;    width: 100%;">
                       Cart is Empty
                        </div>
                    </li>
                    
               
                </ul>
            </li>
            <li class="needHelpBtn nav dropdown" id="" style=" " >
               <a href="#"  class="dropdown-toggle" id="WishList"   data-toggle="dropdown" data- data-hover="dropdown"
                    data-animations="fadeIn fadeIn fadeIn fadeIn">      
                   <div class="needHelpBtn "  style="font-family: 'Questrial', serif;">  
                       <span class="fa fa-heart-o"> </span>
                       <font style="margin-left:3px;font-size:20px;"> 
                           Wishlist
                           <span class="caret"></span> 
                       </font>
                    </div>
                    <span class="fa fa-heart-o">  
                        <span class="caret"></span>
                    </span>
                </a>
                   <ul class="dropdown-menu">
                    <li style="">
                    <div class="container" style="color:black;text-align:center;font-family: 'Questrial', serif;    width: 100%;">
                       Wishlist Empty
                        </div>
                    </li>
                    
               
                </ul>
             </li>
            <li class="dropdown sidebtn">
                <a class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" href="#" id="LoginBtn" data-animations="fadeIn fadeIn fadeIn fadeIn">
                 <img src="https://use.fontawesome.com/releases/v5.0.13/svgs/solid/user-circle.svg" width=18px height=18px />
                    <div class="btnNav "  style="font-family: 'Questrial', serif;">  
                
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
    
    
</body>
    
    