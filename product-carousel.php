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
									<a href="#" class="btn btn-primary" stye="">Add to Cart</a>
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