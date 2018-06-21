
<?php
if(isset($_GET['action']))
{
    echo 'true';
}

    if( isset($_GET['AddToCart'])&&isset($_GET['id']))
    {
        
      $id=$_GET['id'];
        $price=$_GET['price'];
        $name=$_GET['name'];
        Add($cart,$id,$price,$name);
    }
    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_POST['AddToRemove']))
    {
        Remove($cart,"1");
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
<div class="container cont" >
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Recommended <b>Products</b></h2>
			<div id="ProductCarousel" class="carousel slide product-carousel" data-ride="carousel" data-interval="0">
			<!-- Carousel indicators -->
			<ol class="carousel-indicators">
                <?php
                $size= floor(sizeof($R_productImg)/4);
                for($i=0;$i<$size;$i++)
                {
                    echo '<li data-target="#ProductCarousel"
                              data-slide-to="';
                              echo $i;
                              echo '" class="'; 
                              if($i==0)
                              echo ' active'; 
                    echo'"></li>';
                }
                ?>
			</ol>   
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
                <?php
                $j=0;
                for($i=0;$i<sizeof($R_productImg);$i++)
                {
                    if($j==0)
                    {
                        echo '<div class="item carousel-item'; 
                        if($i==0) 
                        echo ' active'; 
                        echo '">';
                                echo '<div class="row">';
                    }
                    
                        echo  '<div class="col-sm-3">
                                  <div class="thumb-wrapper">
								    <div class="img-box">
									   <a href="#">
                                        <img src="';echo $R_productImg[$i]; echo '" class="img-responsive img-fluid img-product" alt="" width=150px height=300px>
                                      </a>
                                    </div>
								<div class="thumb-content">
									<h4>';echo $R_productName[$i]; echo ' </h4>
									<p class="item-price"> 
                                        <span>'; 
                                            echo toMoney($R_productPrice[$i]);echo'
                                        </span> 
                                        <strike style="">';
                                            echo toMoney($R_productActualPrice[$i]) ;echo'
                                        </strike>
                                    </p>
									<div class="star-rating">
										<ul class="list-inline">
                                        '; printRating($R_productRating[$i]); echo '
										</ul>
									</div>
                                    
                                    <form action="./" method="get">
                                    <input type="hidden" value="'.$productID[$i].'" name="id" class="id" id="val'.$productID[$i].'"    />
                                    <input type="hidden" value="'.$R_productName[$i].'" name="name"/>    
                                <input type="hidden" value="'.$R_productPrice[$i].'" name="price"/>  
                                    <input type="hidden" value="" name="e"/>  
									<button class="btn btn-primary btn-cart" stye=""  name="AddToCart"  class="add-to-cart" onclick="" >Add to Cart</button>
									</form>
                                    
                                    <a href="./product-Details.php?productID='.$productID[$i].'" class="btn        btn-primary">
                                            View Details
                                    </a>
								</div>						
							</div>
						</div>';
                    if($j==3)
                    {
                        echo '</div>
                                </div>
                                    ';
                        $j=0;
                    }
                    else{
                        $j++;
                    }
                    
                } 
                
                ?>
                       
			</div>
			<!-- Carousel controls -->
			<a class="carousel-control left carousel-control-prev" href="#ProductCarousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="carousel-control right carousel-control-next" href="#ProductCarousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
		</div>
	</div>
</div>
</div>
<script>
 	$(document).ready(function(){
$('.btn-cart').click(function() {
    var id = $(this).siblings('id').attr("value".text());

    alert('VAL='+id);
 $.ajax({
  type: "POST",
  url: "some.php",
  data: { name: "John" }
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});    

    });
});

</script>

