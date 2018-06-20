<?php
function printRating($rating){
    
    $val = number_format($rating, 1);
   // echo $val;
    if($val<=4.25)
    {
    if($val<0.25&&$val>0||$val<1.25&&$val>1||$val<2.25&&$val>2||$val<3.25&&$val>3||$val<4.25&&$val>4)
    {$empty= ceil(5-$val);}
    else{
    $empty= floor(5-$val);   }
    }
    else if($val>=4.75) $empty=0;
    else $empty=0;
    while($val>0.75)
        {
             echo '<li class="list-inline-item"><i class="fa fa-star orange"></i></li>';    
            $val-=1;
        }
    if($val<0.75&&$val>0.25)
        {
        echo '<li class="list-inline-item"><i class="fa fa-star-half-o orange"></i></li>'; 
        }
   $i=0;
    while($i!=$empty)
    {
        echo '<li class="list-inline-item"><i class="fa fa-star-o orange"></i></li>'; 
        $i++;
    }

}
?>