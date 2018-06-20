  
<div class="container cont" >

			<h2>Product <b> Categories</b></h2>
 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel" id="theCarousel">
        <div class="carousel-inner">
                  <?php
            for($i=0;$i<sizeof($CategoryImgURL);$i++)
            {
            echo '<div class="item';  if($i==0) echo' active'; echo'">
                        <div class="col-xs-4 category">
                            <a href="#1" class="iconShade" >
                                <div >
                                    <img src="';echo $CategoryImgURL[$i]; echo'" class="img-responsive">
                                </div>
                                <p  class="CategoryLabel">
                                    '; echo $val[$i];
                                    echo '
                                </p>
                            </a>
                        </div>
                </div>';
            }
            ?>
         
          
          <!--  Example item end -->
        </div>
        <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div>
</div>
    <script > // Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});</script>
    