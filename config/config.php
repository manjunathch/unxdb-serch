<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author manjunath-c
 */
/** Configuration Variables * */
define('DEVELOPMENT_ENVIRONMENT', true);

define('DB_NAME', 'e-commerce');
define('DB_USER', 'root');
define('DB_PASSWORD', 'itsmanc');
define('DB_HOST', 'localhost');
//should use below instead of above config ;
$config = array(
    'database' => array(
        'host_name' => 'localhost',
        'username' => 'root',
        'password' => 'itsmanc',
        'database' => 'e-commerce'
    ),
    'base_url' => 'http://test.local.com/',
);
//print_r($config);die();
?>
