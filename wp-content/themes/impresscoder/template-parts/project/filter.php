<?php
$terms =  get_terms('portfolio_cat');
if (empty($terms)) return;
?> 
<ul class="project-menu container justify-content-center">
    <li class="active">
        <span data-filter=""><?php echo esc_attr__('All', 'genz') ?></span>
    </li>
    <?php
    //print_r($terms);
    foreach ($terms as $term) { ?>
        <li class="" data-wow-delay=".1s">
            <span data-filter="<?php echo esc_attr($term->slug) ?>"><?php echo esc_attr($term->name) ?></span>
        </li>
    <?php }
    ?> 
</ul>