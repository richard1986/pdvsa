<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Constantes
*/
define('ASSETS_DIR', base_url()."assets/");

class Constantes{
  
  public function assets()
  {
    return array(
      'css' => array(
          0 => 'css/bootstrap.min.css',
          1 => 'css/sticky-footer-navbar.css'
        ),
      'js'  => array(
          0 => 'js/jquery.js',
          1 => 'js/bootstrap.min.js',
          2 => 'js/dropdown.js',
          3 => 'js/modal.js'
        ), 
      );
  }

}