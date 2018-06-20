 <!-- Carousel Start-->

<div class="container-fluid"  style="width:100%;padding-left:0px;padding-right:0px;margin-top:-20px;margin-bottom: -20px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        
  <?php 
        for($i=0;$i<sizeof($CarouselImg);$i++){
      echo '<li style="margin-top:10px;" data-target="#myCarousel" data-slide-to="';echo $i;echo '"'; if($i==0) echo'class="active ac"'; else echo 'class="notAc"'; echo'></li>';
        }
            
?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
  <?php 
        for($i=0;$i<sizeof($CarouselImg);$i++){
      
          echo  '<div class="item'; if($i==0)echo ' active ac'; 
              
              echo'">
            <a href="';echo $CarouselURL[$i]; echo '">  <img src="';echo $CarouselImg[$i]; echo '" alt="Los Angeles" style="width:100%;"></a>
        <div class="carousel-caption">
          <h3>';echo $CarouselHeading[$i];echo'</h3>
          <p>';echo $CarouselPara[$i];echo'</p>
        </div>
      </div>';
        
        }
            
?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    
    <!-- Top Carousel End -->