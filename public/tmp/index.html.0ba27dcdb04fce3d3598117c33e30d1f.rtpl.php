<?php if(!class_exists('raintpl')){exit;}?><h2>Search</h2> 
 <form name="search" method="post" action="search/">
 Seach for: <input type="text" name="find" /> in 
  <input type="hidden" name="searching" value="yes" />
 <input type="submit" name="search" value="Search" />
 </form>