<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new Template;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

<div id="detail">
  <p>Name:<?php echo $product["0"]["Prod"]["name"];?></p>
  <p>Category:<?php echo $product["0"]["Cat"]["category"];?></p>
  <p>Sub-Category<?php echo $product["0"]["Sub"]["sub_category"];?></p>
  <p>Price:<?php echo $product["0"]["Prod"]["price"];?></p>
  <p>Shipping-duration:<?php echo $product["0"]["Prod"]["shipping_duration"];?></p>
  <p>Store:<?php echo $product["0"]["Prod"]["store"];?></p>  
</div>
<div class="related">
  <p>Related Product</p>
  <?php $counter1=-1; if( isset($related) && is_array($related) && sizeof($related) ) foreach( $related as $key1 => $value1 ){ $counter1++; ?>

  <p><a href="/products/details/<?php echo $value1["Product"]["id"];?>"><?php echo $value1["Product"]["name"];?></a></p>
<?php } ?>

</div>
<?php $tpl = new Template;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>