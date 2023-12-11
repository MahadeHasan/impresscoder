<?php
extract(wp_parse_args($args, [
	'title' => esc_attr__('Latest Posts', 'impresscoder'),
	'template' => '',
	'column' => 1,
	'layout' => 'rs',
	'enable_sidebar' => true,
	'show_pagination' => 'yes',

	// WP query
	'query_args' => [
		'post_type' => 'post',
		'post__in' => [],
		'category__in' => [],
		'posts_per_page' => get_option('posts_per_page', 10),
		'ignore_sticky_posts' => true,
		'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
	]
]));

$alt_text = get_bloginfo('name');

$post_query = new WP_Query($query_args);
$pagination = array(
	'total' => $post_query->max_num_pages,
	'type' => 'list',
);
$GLOBALS['wp_query']->max_num_pages = $post_query->max_num_pages;
$enable_sidebar = $layout == 'full' ? false : true;

if($post_query->have_posts()):
		//sidebar start
		if ($enable_sidebar && is_active_sidebar('sidebar-1')) :
			$sidebar_dir = $layout == 'ls' ? ' flex-row-reverse' : '';
			echo '<div class="row gx-50'.esc_attr($sidebar_dir).'">';
			echo '<div class="col-lg-8">';
		endif; //enable_sidebar condition end

		if(!empty($title)){
			echo '<div class="widget-header-1 position-relative mb-30">
			    
				<h5 class="mb-30">'.esc_attr($title).'</h5>
			</div>';
		}
		

		if($column > 1){
			if($template == 'masonry'){
				echo '<div class="row row-cols-1 row-cols-md-'.$column.'" data-masonry=\'{"percentPosition": true }\'>';
			}else{
				echo '<div class="row row-cols-1 row-cols-md-'.$column.'">';
			}
		}
		//sectiion Title
		while ($post_query->have_posts()) : $post_query->the_post();
			get_template_part('template-parts/content/content', $template, [ 'column_class' => 'col mb-30' ]);
		endwhile;

		//pagination 
		if ($show_pagination == 'yes') : ?>
			<nav class="mb-50 nav-alignment">
				<?php echo impresscoder_the_posts_navigation(); ?>
			</nav>
		<?php endif; //pagination end
		
		if($column > 1) echo '</div>';
		
		//enable_sidebar condition start
		if ($enable_sidebar && is_active_sidebar('sidebar-1')) :
			echo '</div>';
			echo '<div class="col-lg-4">';  ?>
			<div id="sidebar" class="widget-area position-sticky d-grid gap-50">
      			<?php do_action('main-sidebar-before') ?>
      			<?php dynamic_sidebar('sidebar-1'); ?>
    		</div>
		<?php
			echo '</div>';
			echo '</div>';
		endif; ?>
<?php endif; ?>