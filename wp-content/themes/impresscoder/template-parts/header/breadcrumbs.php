<?php
extract(wp_parse_args($args, [
    'breadcrumbs_bg' => 'bg-white'
]));
?>
<div class="breadcrumbs-section pt-50 <?php echo esc_attr($breadcrumbs_bg) ?>">
    <div class="container">
    <div class="row">
    <div class="col-lg-11 mx-auto">
        <nav class="breadcrumbs py-20 border-bottom" typeof="BreadcrumbList" vocab="https://schema.org/" aria-label="breadcrumb">
            <ul class="breadcrumb list-unstyled mb-0">
                <?php bcn_display_list();?>    
            </ul>
        </nav>
    </div>
    </div>
    </div>
</div>

