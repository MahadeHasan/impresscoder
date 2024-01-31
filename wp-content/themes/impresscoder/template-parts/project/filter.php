<?php
$terms =  get_terms('portfolio_cat');
if (empty($terms)) return;
?>
<div class="row text-center filter-nav">
    <div class="col-lg-12">
        <ul class="filter-button-group"> 
            <li class="btn btn-outline-primary rounded-3 me-2 mb-2" data-filter=""><?php echo esc_attr__('All', 'genz') ?></li> 
            <?php
            //print_r($terms);
            foreach ($terms as $term) { ?> 
                    <li class="btn btn-outline-primary rounded-3 me-2 mb-2" data-filter=".<?php echo esc_attr($term->slug) ?>"><?php echo esc_attr($term->name) ?></li>
            <?php }
            ?>
        </ul>
    </div>
</div>
<!-- row -->