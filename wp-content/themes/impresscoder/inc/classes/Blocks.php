<?php
namespace Impresscoder;

final class Blocks{
    /**
	 * Add hooks when module is loaded.
	 */
	public function __construct() {   
        add_filter( 'block_categories_all', [$this, 'category'] );     
		add_action( 'rwmb_meta_boxes', [$this, 'blocks'] );       
        
        // wp bootstrap blocks hook
        add_filter( 'wp_bootstrap_blocks_column_content_classes', [$this, 'column_content_classes'] );
	}    

    function column_content_classes($classes) {
        $classes[] = 'h-100';
        $classes[] = 'column-inner';
        return array_unique($classes);
    }

    public function blocks($blocks){  
        // elements      
        foreach (glob(__DIR__ ."/blocks/*.php") as $filename) {
            $block = include $filename;
            $blocks[] = $this->configure_block($block);
        }  
        
        // Sections
        foreach (glob(__DIR__ ."/sections/*.php") as $filename) {
            $block = include $filename;
            $blocks[] = $this->configure_section($block);
        }

        return $blocks;        
    }

    private function set_single_block($field){
        extract(wp_parse_args($field, [
            'id' => '',
            'std' => '',
            'name' => ''
        ]));

        $filename = str_replace('_', '-', $id);
        $file = __DIR__ ."/blocks/{$filename}.php";
        if(!file_exists($file)) return false;
        $block = include $file;
        $fields = $this->set_block_common_field($block['fields']);
        foreach ($fields as $key => $field) {
            if(isset($field['std'])){
                unset($field['std']);
            }
            $fields[$key] = $field;
        }
         return [
            'id' => $id,
            'type' => 'group',
            'clone' => false,
            'default_state' => 'collapsed',
            'collapsible' => true,
            'save_state' => false,
            'group_title' => $name,	
            'std' => $std,
            'fields' => $fields
         ];
    }

    private function set_block_fields($fields){
        $blocks = [];
        foreach ($fields as $key => $field) {
            if(empty($field['id']) || $field['type'] != 'block') continue;
            if($this->set_single_block($field)){
                $fields[$key] = $this->set_single_block($field);
                $blocks[] = $field['id'];
            }else{
                unset($fields[$key]);
            }            
        }

        if(!empty($blocks)){
            $fields[] = [
                'id' => 'blocks',
                'type' => 'hidden',	
                'std'  => implode(',',$blocks),
                'attributes' => ['value' => implode(',',$blocks)]
            ];
        }
        return $fields;
    }

    private function set_block_common_field($fields, $block = []){
        if(!empty($block['parallax'])){
            $fields =  array_merge($fields, impresscoder_get_parallax_fields());
        }
        $common_fields = impresscoder_get_element_common_fields();
        return array_merge($fields, $common_fields);
    }
    

    private function configure_block($block){         

        $configuration = [
            'type'            => 'block',            
            'category'        => 'impresscoder',
            'context'         => 'side',
            'render_callback' => 'impresscoder_render_block_template',
            'preview' => $this->block_preview_args($block),
            'supports' => [
                'align' => false,
                'customClassName' => false,
            ],
        ];

        $block['fields'] = $this->set_block_common_field($block['fields'], $block);
        
        return array_merge($configuration, $block);        
    }

    private function configure_section($section){         

        $configuration = [
            'type'            => 'block',            
            'category'        => 'impresscoder',
            'context'         => 'side',
            'render_callback' => 'impresscoder_render_section_template',
            'preview' => $this->block_preview_args($section)
        ];

        $section['fields'] = $this->set_block_fields($section['fields'], $section);
        
        return array_merge($configuration, $section);        
    }

    private function block_preview_args($block){
        return array_column($block['fields'], 'std', 'id');
    }

    public function category( $categories ) {
        // Adding a new category.
        $categories[] = array(
            'slug'  => 'impresscoder',
            'title' => 'Impresscoder'
        );        
    
        return $categories;
    }
}