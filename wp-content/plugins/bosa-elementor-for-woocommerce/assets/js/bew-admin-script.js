jQuery( window ).on( 'elementor/frontend/init', function() {
    //hook name is 'frontend/element_ready/{widget-name}.{skin} - i dont know how skins work yet, so for now presume it will
    //always be 'default', so for example 'frontend/element_ready/slick-slider.default'
    //$scope is a jquery wrapped parent element
    
    /**
     * Carousel
    */
    elementorFrontend.hooks.addAction( 'frontend/element_ready/bew-elements-carousel-products.default', function($scope, $){
        var bew_elements_carousel_products  = $scope.find('.bew-elements-carousel-products');
        var desktop_col                     = bew_elements_carousel_products.attr('slider-products');
        var tablet_col                      = bew_elements_carousel_products.attr('slider-products-tablet');
        var mobile_col                      = bew_elements_carousel_products.attr('slider-products-mobile');
        var slider_arrows                   = bew_elements_carousel_products.attr('slider-arrows');
        var slider_dots                     = bew_elements_carousel_products.attr('slider-dots');
        var auto_play                       = bew_elements_carousel_products.attr('auto-play');
        var infinite_loop                   = bew_elements_carousel_products.attr('infinite-loop');
        var transition_speed                = bew_elements_carousel_products.attr('transition-speed');
        var products_scroll                 = bew_elements_carousel_products.attr('products-scroll');
        var products_scroll_tablet          = bew_elements_carousel_products.attr('products-scroll-tablet');
        var products_scroll_mobile          = bew_elements_carousel_products.attr('products-scroll-mobile');

        $(bew_elements_carousel_products).owlCarousel({
            margin: 20,
            autoplay:auto_play,
            responsiveClass:true,
            loop:infinite_loop,
            nav:slider_arrows,
            navText:[
                '<div class="nav-btn prev-slide"><i class="fas fa-chevron-left"></i></div>',
                '<div class="nav-btn next-slide"><i class="fas fa-chevron-right"></i></div>'
            ],
            dots:slider_dots,
            autoplayTimeout: transition_speed,
            responsive:{
                0:{
                    items:mobile_col,
                    slideBy: products_scroll_mobile,
                },
                600:{
                    items:tablet_col,
                    slideBy: products_scroll_tablet,
                },
                1000:{
                    items:desktop_col,
                    slideBy: products_scroll,
                    loop:true
                }
            }
        })        

    });

    elementorFrontend.hooks.addAction( 'frontend/element_ready/bew-elements-blog.default', function($scope, $){
        var masonry_section = $scope.find('.bew-blog-grid.bew-masonry');
        // init Masonry
        var $grid = masonry_section.masonry({
            // options
            itemSelector: '.bew-elements-post',
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    });

} );