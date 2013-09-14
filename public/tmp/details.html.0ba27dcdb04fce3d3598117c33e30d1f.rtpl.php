<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new Template;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("../header") . ( substr("../header",-1,1) != "/" ? "/" : "" ) . basename("../header") );?>

<div id="detail">
  <p>Name:<?php echo $product["0"]["Prod"]["name"];?></p>
  <p>Category:<?php echo $product["0"]["Cat"]["category"];?></p>
  <p>Sub-Category<?php echo $product["0"]["Sub"]["sub_category"];?></p>
  <p>Price:<?php echo $product["0"]["Prod"]["price"];?></p>
  <p>Shipping-duration:<?php echo $product["0"]["Prod"]["shipping_duration"];?></p>
  <p>Store:<?php echo $product["0"]["Prod"]["store"];?></p>  
</div>