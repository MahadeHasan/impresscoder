<div class="row">
    <div class="col-lg-12">
        <div class="text-center">
            <h2 class="color-linear"><?php the_title(); ?></h2>
        </div> 
        <?php get_template_part('template-parts/project/slider') ?>
    </div>
    <!-- col-lg-12 -->
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-9">
        <div class="content-detail">
            <?php the_content(); ?>
            <?php //get_template_part('template-parts/project/gallery') ?>
            <?php get_template_part('template-parts/project/hire-me') ?>
            <?php get_template_part('template-parts/project/skills') ?>
        </div> 
    </div>
    <div class="col-lg-3">
        <div class="sidebar mt-50"> 
            <?php get_template_part('template-parts/project/informations') ?> 
            <?php get_template_part('template-parts/project/share') ?>
        </div>
    </div>
</div>