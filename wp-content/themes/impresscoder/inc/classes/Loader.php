<?php
namespace Impresscoder;

use Impresscoder\Google_Fonts as Google_Fonts;
use MBSP\Customizer\Control;

final class Loader{
    public function __construct() {
       $this->init();
       add_action( 'init', [$this, 'globals'] ); 
	}
    
    private function init(){
        
        new Meta_Boxes();
        new Design_Options();
        new Custom_Colors();
        new Header();        
        new Footer();             
        new Google_Fonts();        
        new Typography();        
        new Customize();
        
        new Blocks();
    }

    public function globals(){
        $GLOBALS['impresscoder'] = new Helpers();
    }

}