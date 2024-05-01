

(function ($) {
    "use strict";
    $('.manimenu-inner nav').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "991",
    });

    $('.product-featured-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-nav-slider'
    });

    // $('#hero-slides').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    // });


  

    $('.product-nav-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-featured-slider',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '0',
        prevArrow: "<button type='button' class='slick-prev'><i class='demo-icon icon-left-dir-1'></i></button>",
        nextArrow: "<button type='button' class='slick-next'><i class='demo-icon icon-right-dir-1'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });


    /* if ('#stepTab .nav-item:nth-child(1)') {
        $('#stepTab .nav-item:nth-child(1) .nav-link').on('click', function (e) {
            $(this).addClass('active');
        });
    }
    if ('#stepTab .nav-item:nth-child(2)') {
        $('#stepTab .nav-item:nth-child(2) .nav-link').on('click', function (e) {
            $(this).addClass('active');
            $('#stepTab .nav-item:nth-child(1) .nav-link').addClass('compleate');
        });
    }
    if ('#stepTab .nav-item:nth-child(3)') {
        $('#stepTab .nav-item:nth-child(3) .nav-link').on('click', function (e) {
            $(this).addClass('active');
            $('#stepTab .nav-item:nth-child(2) .nav-link').addClass('compleate');
            $('#stepTab .nav-item:nth-child(1) .nav-link').addClass('disable');
        });
    }
    if ('#stepTab .nav-item:nth-child(4)') {
        $('#stepTab .nav-item:nth-child(4) .nav-link').on('click', function (e) {
            $(this).addClass('active');
            $('#stepTab .nav-item:nth-child(3) .nav-link').addClass('compleate');
            $('#stepTab .nav-item:nth-child(2) .nav-link').addClass('disable');
        });
    }
    if ('#stepTab .nav-item:nth-child(5)') {
        $('#stepTab .nav-item:nth-child(5)').on('click', function (e) {
            $(this).addClass('active');
            $('#stepTab .nav-item:nth-child(4) .nav-link').addClass('compleate');
            $('#stepTab nav-item:nth-child(3) .nav-link').addClass('disable');
            $('#stepTab .nav-item:nth-child(1) .nav-link').addClass('compleate');
        });
    } */


})(jQuery);



