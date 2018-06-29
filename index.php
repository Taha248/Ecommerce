
<?php

include_once('libraries.php');
include_once('Variables.php');

   include_once('common/navbar.php'); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        $(document).ready(function(){
     $(".btn-cart").click(function(){
         $(this).css("background-color","white");
         $(this).css("color","#000");
        });
        $(".btn-cart").mouseover(function(){
             $(this).siblings(":last").show();
             
        });
             $(".thumb-wrapper").mouseleave(function(){
             $('.quantity').hide();
        });
            $('#myTooltip').tooltip({
    //use 'of' to link the tooltip to your specified input
    position: { of: '#myInput', my: 'left center', at: 'left center' }
});

$('.btn-cart').click(function () {
    $('#myTooltip').tooltip('open');
});
        $('.btn-cart').click(function () {
   $('.error').stop().fadeIn(400).delay(3000).fadeOut(400); //fade out after 3 seconds
});
        });
    </script>

    <script ><?php include_once('js/product-carousel.js'); ?></script>

    
<style><?php include_once('css/index.css'); ?></style>
<style><?php include('category-carousel.css'); ?></style>
<style><?php include_once('product-carousel.css'); ?></style>
<style><?php include_once('footer.css'); ?></style>
    
    
    </head>
<body style="background-color:#e9ebee;">
 
    <?php include_once('carousel-top.php'); ?>
    <?php include_once('category-carousel.php'); ?>
    <?php include_once('product-carousel.php'); ?>
    <?php include_once('deals.caraousel.php'); ?>
    <script ><?php include_once('js/product-carousel.js'); ?></script>
    <?php include_once('brand-caraousel.php'); ?>
    <?php include_once('footer.php'); ?>
    <script ><?php include_once('js/index.js'); ?></script>
    
     <div class='error site-footer' style='display:none;'> Added to cart</div>
    </body>
</html>





















