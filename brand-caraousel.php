
<div class="container cont" style="">

			<h2>Product <b> Brands</b></h2>
 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide multi-item-carousel x" id="brand-Carousel">
        <div class="carousel-inner">
                  <?php
            
            $sql = "SELECT * FROM productBrand";
            $result = $con->query($sql);
            
if ($result->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $result->fetch_assoc()) {
        
        
        $BrandImgURL[$i]=$row["companyImg"];
    $i++;
    }

}
            
else {
    echo "Product Details NOT FOUND";
}
            
            
            
            
            for($i=0;$i<sizeof($BrandImgURL);$i++)
            {
       echo   '<div class="item y';  if($i==0) echo' active';
           
           echo'">
            <div class="col-xs-4" style="height:auto;text-align:center;"><a href="#1" class="iconShade" style="text-decoration:none;">
                <div style="background-color:white;">
                <img  src="';
                echo $BrandImgURL[$i]; echo'" class="img-responsive">
                </div>
                 
                </a>
              
              </div>
          </div>';
            }

            
            ?>
         
          
          <!--  Example item end -->
        </div>
        <a class="left carousel-control" href="#brand-Carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#brand-Carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div>
</div>
    <script > // Instantiate the Bootstrap carousel
       
</script>
    
