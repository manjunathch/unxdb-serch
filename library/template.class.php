<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of template
 *
 * @author manjunath-c
 */
raintpl::configure("base_url", null);
raintpl::configure("tpl_dir", ROOT.'/application/views/');
raintpl::configure("cache_dir", ROOT.'/application/tmp/');

class Template extends RainTPL {

  //protected $variables = array();
//  protected $_controller;
//  protected $_action;
//
//  function __construct($controller, $action) {
//    $this->_controller = $controller;
//    $this->_action = $action;
//  }

  /** Set Variables * */
  function set($name, $value) {
    $this->assign($name, $value);
  }

  /** Display Template * */
  function render($view) { 
    $this->draw($view);
  }

}

?>
