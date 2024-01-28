 
    
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-50 text-center">
                <h2 class="color-linear"><?php the_title(); ?></h2>
            </div> 
            <?php get_template_part('template-parts/portfolio/slider') ?>
        </div>
        <!-- col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-9">
            <div class="content-detail">
                <?php the_content(); ?>
                <?php //get_template_part('template-parts/portfolio/gallery') ?>
                <?php get_template_part('template-parts/portfolio/hire-me') ?>
            </div>
            <?php get_template_part('template-parts/portfolio/skills') ?>
        </div>
        <div class="col-lg-3">
            <div class="sidebar"> 
                <?php get_template_part('template-parts/portfolio/informations') ?> 
                <?php get_template_part('template-parts/portfolio/share') ?>
            </div>
        </div>
    </div>