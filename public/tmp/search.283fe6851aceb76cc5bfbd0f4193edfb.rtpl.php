<?php if(!class_exists('raintpl')){exit;}?><h2>Search:</h2> 
<form name="search" method="post" action="/products/search/">
  Your search : <input type="text" name="find" /> 
  <!--  <input type="hidden" name="searching" value="yes" />-->
  <input type="submit" name="search" value="Search" />
</form>
<?php if( $searchterm ){ ?><h2>Search term:<?php echo $searchterm;?></h2>
<div>
  <?php $counter1=-1; if( isset($ser_result) && is_array($ser_result) && sizeof($ser_result) ) foreach( $ser_result as $key1 => $value1 ){ $counter1++; ?>

  <div>
    <a href="/products/details/<?php echo $value1["Product"]["id"];?>"><?php echo $value1["Product"]["name"];?></a>

  </div>
  <?php }else{ ?>

  <p>
    No results to display.Try with new keyword
  </p>
  <?php } ?>

</div>
<?php } ?>