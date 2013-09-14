<?php

/**
 * Define document paths
 */
define('SERVER_ROOT', __DIR__);
define('SITE_ROOT', 'http://yourdomain.com');
require 'route.php';
$model = $_GET['model'];
$view = $_GET['view'];
$controller = $_GET['controller'];
$action = $_GET['action'];


