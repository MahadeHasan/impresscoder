<?php  
$skills_title = get_post_meta(get_the_ID(), 'skills_title', true);
$terms =  get_terms('portfolio_skill');
if (empty($terms)) return;
?> 
<div class="project-skills">
    <h3 class="mt-50 mb-30"><?php echo esc_attr($skills_title) ?></h3>
    <?php
    //print_r($terms);
    foreach ($terms as $term) { ?> 
            <span class="btn btn-outline-primary me-2 mb-2" style="cussor: auto;"><?php echo esc_attr($term->name) ?></span>
    <?php }
    ?>
</div>
