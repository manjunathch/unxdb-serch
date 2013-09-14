
<?php

$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = parse_url($request);
print_r($parsed);
echo $_REQUEST['controllere'];
//the page is the first element
$page = $parsed['controllere'];

//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument) {
  //split GET vars along '=' symbol to separate variable, values
  list($variable, $value) = split('=', $argument);
  $getVars[$variable] = $value;
}

//compute the path to the file
$target = SERVER_ROOT . '/controllers/' . $page . 'Controller.php';
echo $target;
//get target
if (file_exists($target)) {
  include_once($target);

  //modify page to fit naming convention
  $class = ucfirst($page) . 'Controller';

  //instantiate the appropriate class
  if (class_exists($class)) {
    $controller = new $class;
  } else {
    //did we name our class correctly?
    die('class does not exist!');
  }
} else {
  //can't find the file in 'controllers'! 
  die('page does not exist!');
}

$action=  isset($request['action'])?$request['action']:'index';
print_r($getVars);die();
$controller->$action($getVars);
