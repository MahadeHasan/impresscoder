<?php 
$has_parallax_vars = impresscoder_get_parallax_attributes($atts);
$css_classes = [
    'newsletter-block',
    !empty($align)? $align : '',
    !empty($has_parallax_vars)? 'has-parallax' : '',
    !empty($css_class)? $css_class : ''
];
$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', array_filter($css_classes))).'"',
    !empty($has_parallax_vars)? 'style="'.implode(';', $has_parallax_vars).'"' : '',   
];
$title = [
    [
        'core/paragraph',
        [
            'content' => !empty($name)? $name : 'Newsletter',
            'placeholder' => 'Section name...',
            'className' => 'section-name small fw-bold text-uppercase letter-spacing-2 mb-0'
        ]
    ],
    [
        'core/heading',
        [
            'content' => !empty($title)? $title : 'Get updates from CityKid!',
            'placeholder' => 'Title...',
            'className' => 'title mb-0'
        ]
    ],
    [
        'core/paragraph',
        [
            'content' => !empty($subtitle)? $subtitle : 'Learn about new, Adventures, Tips, Tools, Fun, Getaways.',
            'placeholder' => 'Subtitle...',
            'className' => 'subtitle mb-0'
        ]
    ],
];
if(!empty($style) && $style == 'cols-2'):
?>
<div <?php echo implode(' ', array_filter($attributes)); ?>>
    <div class="row g-30">
        <div class="col-lg-7">
            <div class="d-flex gap-15">
                <span class="d-inline-flex align-items-start flex-shrink-0 mt-10">
                    <?php echo impresscoder_get_icon_svg('ui', 'newsletter', 60); ?>
                </span>
                <div class="form-title">
                    <InnerBlocks template="<?php echo esc_attr( json_encode( $title ) ) ?>"/>
                </div>
            </div>    
        </div>
        <div class="col-lg-5">
            <form class="newsletter-form">
                
                <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="<?php echo esc_attr($placeholder) ?>" required />
                    <button type="submit" class="btn btn-dark">
                        <?php echo esc_attr($button_text) ?>
                    </button>
                </div>            
            </form>
        </div>
    </div>
    <?php echo !empty($has_parallax_vars)? '<div class="parallax"></div>' : ''; ?>
</div>

<?php else: ?>
<div <?php echo implode(' ', array_filter($attributes)); ?>>
    <div class="d-flex flex-wrap gap-15 mb-20">
        <span class="d-inline-flex align-items-start flex-shrink-0">
            <?php echo impresscoder_get_icon_svg('ui', 'newsletter', 60); ?>
        </span>
        <form class="newsletter-form d-grid flex-grow-1 gap-30">
            <div class="form-title">
                <InnerBlocks template="<?php echo esc_attr( json_encode( $title ) ) ?>"/>
            </div>
            <div class="input-group-wrapper d-grid gap-10">
                <div class="input-group max-width-600">
                    <input class="form-control" type="email" name="email" placeholder="<?php echo esc_attr($placeholder) ?>" required />
                    <button type="submit" class="btn btn-dark d-inline-flex align-items-center gap-2">
                        <?php echo esc_attr($button_text) ?>
                        <?php echo impresscoder_get_icon_svg('ui', 'next2', 16); ?>
                    </button>
                </div>
                <div class="footer-note small d-flex flex-wrap gap-20 link-underline link-white">
                    <?php echo wpautop($footer_note) ?>                    
                </div>  
            </div>          
        </form>
    </div>
    
    <?php echo !empty($has_parallax_vars)? '<div class="parallax"></div>' : ''; ?>
</div>
<?php endif; ?>