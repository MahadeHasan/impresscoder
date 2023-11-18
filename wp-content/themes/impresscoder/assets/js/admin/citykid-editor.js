( function( $ ) {
    'use strict'; 
    
    function impresscoder_add_container_wrapper_class(){
        let container = $('#container').val();
        if( 'container' !== container ){
            $('body').addClass('editor-styles-wrapper-full');
            console.log('full-container #######');
        }else{
            $('body').removeClass('editor-styles-wrapper-full');
            console.log('container #######')
        }
    }

    function init() {
        if($('#container').length){
            $(document).on('change', '#container', function(){
                impresscoder_add_container_wrapper_class();
            });
            $('#container').trigger('change');
        }
        
    }

    // Container Margin options
    function impresscoderMarginAfterOptions( marginAfterOptions ) {
        marginAfterOptions = impresscoderEditor.margin;
        return marginAfterOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.container.marginAfterOptions',
        'myplugin/wp-bootstrap-blocks/container/marginAfterOptions',
        impresscoderMarginAfterOptions
    );
    
    // Horizontal gutters for row
    function impresscoderRowHorizontalGuttersOptions( horizontalGuttersOptions ) {
        horizontalGuttersOptions = impresscoderEditor.gutterX;
        return horizontalGuttersOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.row.horizontalGuttersOptions',
        'myplugin/wp-bootstrap-blocks/row/horizontalGuttersOptions',
        impresscoderRowHorizontalGuttersOptions
    );

    // Vertical gutters for row
    function impresscoderRowVerticalGuttersOptions( verticalGuttersOptions ) {
        verticalGuttersOptions = impresscoderEditor.gutterY;
        return verticalGuttersOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.row.verticalGuttersOptions',
        'myplugin/wp-bootstrap-blocks/row/verticalGuttersOptions',
        impresscoderRowVerticalGuttersOptions
    );

    // Column paddings
    function impresscoderColumnPaddingOptions( paddingOptions ) {
        paddingOptions = impresscoderEditor.padding;
        return paddingOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.column.paddingOptions',
        'myplugin/wp-bootstrap-blocks/column/paddingOptions',
        impresscoderColumnPaddingOptions
    );


    function impresscoderRowTemplates( templates ) {
        impresscoderEditor.columnTemplates.forEach(function(template){
            templates.push(template);
        });
        
        return templates;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.row.templates',
        'myplugin/wp-bootstrap-blocks/row/templates',
        impresscoderRowTemplates
    );


    function impresscoderColumnBgColorOptions( bgColorOptions ) {
        bgColorOptions = impresscoderEditor.colors;      
        return bgColorOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.column.bgColorOptions',
        'myplugin/wp-bootstrap-blocks/column/bgColorOptions',
        impresscoderColumnBgColorOptions
    );

    

    // Run when a document ready on the front end.
    $( document ).ready( init );

} )( jQuery );