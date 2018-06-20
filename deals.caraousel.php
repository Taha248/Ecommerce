<div class="container cont" style="">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Flash <b>Deals</b><p id="demo" style="font-size:12px;color:#86BD57;font-weight:bold;margin-top:2px;"></p> </h2>
			<div id="dealsCarousel" class="carousel slide product-carousel" data-ride="carousel" data-interval="0">
			<!-- Carousel indicators -->
			<ol class="carousel-indicators">
                <?php
                $size= floor(sizeof($R_productImg)/4);
                for($i=0;$i<$size;$i++)
                {
                
                    echo '<li data-target="#dealsCarousel" data-slide-to="';echo $i; echo '" class="'; if($i==0)echo ' active'; echo'"></li>';
                }
				
                    ?>
			</ol>   
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
                <?php
                $j=0;
                for($i=0;$i<sizeof($Flash_Deals)-2;$i++)
                {
                    if($j==0)
                    {
                        echo '<div class="item carousel-item'; if($i==0) echo ' active'; echo '">';
                        echo '<div class="row">';
                    }
                    
                        echo  '<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="';echo $Flash_Deals[$i]; echo '" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4 style="    line-height: 1.5em;
                                    height: 3em;
                                    overflow: hidden;
                                    white-space: nowrap;
                                    text-overflow: ellipsis;
                                    width: 100%;">';echo $R_productName[$i]; echo ' </h4>
									<p class="item-price"> <span>'; echo toMoney($R_productPrice[$i]);echo'</span> <strike style="font-size:11px;">';echo toMoney($R_productActualPrice[$i]) ;echo'</strike></p>
									<div class="star-rating">
										<ul class="list-inline">
                                        '; printRating($R_productRating[$i]); echo '
										</ul>
									</div>
									<a href="#" class="btn btn-primary" stye="">Add to Cart</a>
									<a href="#" class="btn btn-primary">View Details</a>
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
			<a class="carousel-control left carousel-control-prev" href="#dealsCarousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="carousel-control right carousel-control-next" href="#dealsCarousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
		</div>
	</div>
</div>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("June 30, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
    