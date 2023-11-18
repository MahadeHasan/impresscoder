<?php
namespace Impresscoder;

final class Meta_Boxes{
    /**
	 * Add hooks when module is loaded.
	 */
	public function __construct() {        
		add_action( 'rwmb_meta_boxes', [$this, 'meta_boxes'] );       
	}

    public function meta_boxes($meta_boxes){
		
        $meta_boxes[] = include __DIR__ ."/meta-boxes/page-attributes.php";
        $meta_boxes[] = include __DIR__ ."/meta-boxes/page-data.php";
       
        

        return $meta_boxes;
        
    }


    
}