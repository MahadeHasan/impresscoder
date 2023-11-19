<?php
namespace ControlEvents;

final class Loader{
    
    /**
	 * Add hooks when module is loaded.
	 */
	public function __construct() {        
		$this->init();        
	}

   

    private function init(){

        new Elementor;
    }
}