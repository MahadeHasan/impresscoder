( function( $ ) {
    'use strict'; 
    
    wp.customize.bind('ready', function() {
        impresscoderRangeSlider();
    });

    function impresscoderRangeSlider(){
        $('[type="range"]').each(function(){
            $(this).wrap('<div class="impresscoder-range-control" />');
            let value = $(this).val();
            let prefix = $(this).attr('prefix');
            value = prefix? prefix+value : value;

            let suffix = $(this).attr('suffix');
            value = suffix? value+suffix : value;
            
            $(this).closest('.impresscoder-range-control').append('<input type="text" class="range-value" value="'+value+'">');
        });

        $(document).on('change', '[type="range"]', function(){
            let value = $(this).val();
            let prefix = $(this).attr('prefix');
            value = prefix? prefix+value : value;

            let suffix = $(this).attr('suffix');
            value = suffix? value+suffix : value;

            $(this).closest('.impresscoder-range-control').find('.range-value').val(value);
        })

        $(document).on('keyup', '.impresscoder-range-control .range-value', function(){
            let value = $(this).val();
            $(this).closest('.impresscoder-range-control').find('[type="range"]').val(parseInt(value)).trigger('change');
        })    
    }
    
} )( jQuery );    