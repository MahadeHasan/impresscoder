( function( $ ) {
	'use strict'; 

    //offcanvas search field autofocus
    $('#offcanvas-search-icon').on('click', function(){
      setTimeout(function() { $('.offcanvas-search .form-control').focus() }, 500)
    });

    $('.popup-image').magnificPopup({
        type:'image'
    });


    $('.popup-youtube, .popup-vimeo, .popup-gmaps, .popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
    
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
                return element.find('img');
            }
        }        
    });
 

 

 // A $( document ).ready() block.
 
  function post_sliders_activation(){ 
    // featured slider  
    $('.post_sliders_activation').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
          fade: true,
          loop: false,
          asNavFor: '.featured-slider-nav',
          prevArrow: '<span class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/></svg></span>',
          nextArrow: '<span class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg></span>',
          appendArrows: '.arrow-cover-2',
    }); 

    $('.featured-slider-nav').slick({
        slidesToShow: $('.featured-slider-nav').data('slides-show'),
        slidesToScroll: 1,
        vertical: true, 
        loop: false,
        asNavFor: '.post_sliders_activation',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        verticalSwiping: true
    });

};




if ($('.swiper-category-sliders').length > 0) {
      new Swiper(".swiper-category-sliders", {
      spaceBetween: 16, 
      slidesPerGroup: 1,
      loop: $('.swiper-category-sliders').data('loop'),
      navigation: {
          nextEl: ".swiper-button-next-style-2",
          prevEl: ".swiper-button-prev-style-2"
      },

      autoplay: {
          delay: 10000
      },
      breakpoints: {
          1500: {
              slidesPerView: $('.swiper-category-sliders').data('slide-xxl'),
          },
          1200: {
              slidesPerView: $('.swiper-category-sliders').data('slide-lg')
          },
          768: {
              slidesPerView: $('.swiper-category-sliders').data('slide-md')
          },
          600: {
              slidesPerView: 3
          },
          440: {
              slidesPerView: 2
          },
          300: {
              slidesPerView: 1
          },
          200: {
              slidesPerView: 1
          }
      }
  });
}

// portfolio swiper slider
  $(".portfolio-swiper-slides").each(function () {
    var swiper_1_items = new Swiper(this, {
        slidesPerView: 1,
        slidesPerGroup: 1,
        autoplay: false, 
        loop: false,
        simulateTouch: true,
        pauseOnMouseEnter: false,
        // autoplay: {
        //     delay: 2000
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });
  });


    /*----------------------------------------------------*/
  /*  ScrollUp
  /*----------------------------------------------------*/  
  $.scrollUp = function (options) {

    // Defaults
    var defaults = {
      scrollName: 'scrollUp', // Element ID
      topDistance: 600, // Distance from top before showing element (px)
      topSpeed: 800, // Speed back to top (ms)
      animation: 'slide', // Fade, slide, none
      animationInSpeed: 200, // Animation in speed (ms)
      animationOutSpeed: 200, // Animation out speed (ms)
      scrollText: '', // Text for element
      scrollImg: false, // Set true to use image
      activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    };

    var o = $.extend({}, defaults, options),
      scrollId = '#' + o.scrollName;

    // Create element
    $('<a/>', {
      id: o.scrollName,
      href: '#',
      title: o.scrollText
    }).appendTo('body');
    
    // If not using an image display text
    if (!o.scrollImg) {
      $(scrollId).html('<span class="icon-wrap"><i class="arrow-up"></i></span>');
    }

    // Minium CSS to make the magic happen
    $(scrollId).css({'display':'none','position': 'fixed','z-index': '99999'});

    // Active point overlay
    if (o.activeOverlay) {
      $("body").append("<div id='"+ o.scrollName +"-active'></div>");
      $(scrollId+"-active").css({ 'position': 'absolute', 'top': o.topDistance+'px', 'width': '100%', 'border-top': '1px dotted '+o.activeOverlay, 'z-index': '99999' });
    }

    // Scroll function
    $(window).on('scroll', function(){  
      switch (o.animation) {
        case "fade":
          $( ($(window).scrollTop() > o.topDistance) ? $(scrollId).fadeIn(o.animationInSpeed) : $(scrollId).fadeOut(o.animationOutSpeed) );
          break;
        case "slide":
          $( ($(window).scrollTop() > o.topDistance) ? $(scrollId).slideDown(o.animationInSpeed) : $(scrollId).slideUp(o.animationOutSpeed) );
          break;
        default:
          $( ($(window).scrollTop() > o.topDistance) ? $(scrollId).show(0) : $(scrollId).hide(0) );
      }
    });

  };

 
/*Data Fillter*/  

  $('.grid').isotope({
      itemSelector: '.grid-item',
  });
  
  // filter items on button click
$('.filter-button-group').on('click', 'li', function() {
    var filterValue = $(this).attr('data-filter');
    $('.grid').isotope({ filter: filterValue });
    $('.filter-button-group li').removeClass('active');
    $(this).addClass('active');
});



  
  //new WOW().init();
  
  // if('' !== IMPRESSCODER.backtoTop){
  //   $.scrollUp();
  // }

 


  
  
}( jQuery ) );
