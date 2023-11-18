<?php
$css_classes = [
    'row',
    !empty($align)? $align : '',
    !empty($css_class)? $css_class : ''
];
$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', $css_classes)).'"'    
];
// The Query
$the_query = new WP_Query( $query_args );

// The Loop
if ( $the_query->have_posts() ) {
	echo '<div '.join(' ', array_filter($attributes)).'>';
	$args = [
		'column_class' => 'col-lg-'. (!empty($column)? 12/$column : 4), 
		'image_size' => !empty($image_size)? $image_size : 'impresscoder-450x350-cropped',
		'excerpt_length' => !empty($excerpt_length)? $excerpt_length : 24
	];
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		get_template_part('template-parts/content/content', 'grid', $args);
	}
	echo '</div>';
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();