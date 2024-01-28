<?php
$title = get_post_meta(get_the_ID(), 'project_info_title', true);
$project_info = get_post_meta(get_the_ID(), 'project_info', true);

?>
<div class="box-sidebar">
    <div class="head-sidebar wow animate__animated animate__fadeIn">
        <h5 class="line-bottom mb-3"><?php echo esc_attr($title) ?></h5>
    </div>
    <div class="content-sidebar">
        <div class="list-comments">
            <div class="item-comment">
                <strong class="mb-2 d-block text-uppercase"><?php echo esc_attr__('Category', 'impresscoder') ?></strong>
                <?php echo get_the_term_list(get_the_ID(), 'portfolio_cat', '<p class="">', ', ', '</p>'); ?>
            </div>
            <?php if (!empty($project_info)) :
                foreach ($project_info as $value) :
                    if (empty($value[0]) || empty($value[1])) continue;
            ?>
            <div class="item-comment">
                <p class="mb-10 text-uppercase"><?php echo esc_attr($value[0]) ?></p>
                <p class="mb-0"><?php echo esc_attr($value[1]) ?></p>
            </div>
            <?php
                endforeach;
            endif;
            ?>

        </div>
    </div>
</div>