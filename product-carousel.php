
<style>
    body, html {
    height:100%;
    width:100%;
    min-height:100%;
    padding:0;
    margin:0;
}
.error {
    width:200px;
    height:20px;
    height:auto;
    position:fixed;
    left:50%;
    margin-left:-100px;
    bottom:10px;
    background-color: #5cb85c;
    color: white;
    font-family: Calibri;
    font-size: 20px;
    padding:10px;
    text-align:center;
    border-radius: 2px;
    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);

}


</style>
<div id="wrapper">
			<div id="content">


			</div>
		<!--	<form method="post" action="" class="jcart">
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
						<input type="hidden" name="my-item-id" value="ABC-123" />
						<input type="hidden" name="my-item-name" value="Soccer Ball" />
						<input type="hidden" name="my-item-price" value="25.00" />
						<input type="hidden" name="my-item-url" value="" />

						<ul>
							<li><strong>Soccer Ball</strong></li>
							<li>Price: $25.00</li>
							<li>
								<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
							</li>
						</ul>

						<input type="submit" name="my-add-button" value="add to cart" class="button" />
				</form> -->




		<script type="text/javascript" src="jcart/js/jcart.min.js"></script>
<script>

</script>

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

				<form method="post" action="" class="jcart">
                <div class="qcart">
						<input type="hidden" name="jcartToken" value="<?php echo $_SESSION["jcartToken"];" />
						<input type="hidden" name="my-item-id" value="'.$productID[$i].'" />
						<input type="hidden" name="my-item-name" value="'.$R_productName[$i].'" />
						<input type="hidden" name="my-item-price" value="'.$R_productPrice[$i].'" />
						<input type="hidden" name="my-item-url" value="" />
									<button class="btn btn-primary btn-cart" stye=""  name="AddToCart"   name="my-add-button" onclick="" >Add to Cart</button>
                                    <div class="quantity" style="display:none;    margin-top: 7px;
                        margin-bottom: -16px;">
								<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
                                    </div>
                                    </div>
									</form>

                                    <a href="'.$serveruri.'productdetails/'.replaceString($R_productName[$i]).'-'.$productID[$i].'" class="btn        btn-primary">
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

