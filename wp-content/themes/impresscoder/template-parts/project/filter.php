<?php
$terms =  get_terms('portfolio_cat');
if (empty($terms)) return;
?>

<div class="button-group filter-button-group mb-4 text-center">
    <li class="btn btn-outline-primary rounded-1 me-2 mb-2 active" data-filter="*"><?php echo esc_attr__('All', 'Impresscoder') ?></li>
    <?php
    //print_r($terms);
    foreach ($terms as $term) { ?>
        <li class="btn btn-outline-primary rounded-1 me-2 mb-2" data-filter=".<?php echo esc_attr($term->slug) ?>"><?php echo esc_attr($term->name) ?></li> 

    <?php }
    ?>  
</div>
 