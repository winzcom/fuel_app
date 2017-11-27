/*
Template: Go Finance Business & Finance  Modern Multipurpose Services Template
Author: GlixenTechnologies
Version: 1.0
Designed and Development by: GlixenTechnologies
*/
/*
====================================
[ CSS TABLE CONTENT ]
------------------------------------
    1.0 -  Page preloader
	2.0 -  Sticky Sidebar
    3.0 -  Page Scrolling Plugin
	4.0 -  Counter FunFacts
	5.0 -  Parallax Scrolling
    6.0 -  Accordion Panels
	7.0 -  Revolution slider  Home Page
	8.0 -  Services Grid slider
    9.0 -  Blog Post slider
    10.0 -  Testimonial Slider
	11.0 -  Clients Grid Slider
    12.0 -  Mgnific Popup
-------------------------------------
[ END JQUERY TABLE CONTENT ]
=====================================
*/
(function($) {
    "use strict";

    /* ======= Page preloader ======= */
    $(window).on('load', function() {
        $('.preloader').delay(2000).fadeOut(1000);
    });




    /* ======= Sticky Sidebar ======= */
    $('#side-bar').theiaStickySidebar({
        additionalMarginTop: 80
    });

    /* ======= Progress bars ======= */
    $('.progress-bar > span').each(function() {
        var $this = $(this);
        var width = $(this).data('percent');
        $this.css({
            'transition': 'width 3s'
        });
        setTimeout(function() {
            $this.appear(function() {
                $this.css('width', width + '%');
            });
        }, 500);
    });

    /* ======= Page Scroll On Click ======= */
    $('a.page-scroll').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    /* ======= Counter FunFacts ======= */
    function countUp() {
        var dataperc;
        $('.statistic-percent').each(function() {
            dataperc = $(this).attr('data-perc'),
                $(this).find('.percentfactor').delay(6000).countTo({
                    from: 0, // number to begin counting
                    to: dataperc,
                    speed: 1000, // ms
                    refreshInterval: 10
                });
        });
    }
    $('.statistic-percent').waypoint(function() {
        countUp();
    }, {
        offset: '95%',
        triggerOnce: true
    });

    /* ======= Jquery Select  ======= */
    $("select").select2({
        placeholder: "Select an option",
        allowClear: true,
        width: '100%'
    });

    /* ======= Accordion Panels  ======= */
    if ($('.accordion-box').length) {
        $(".accordion-box").on('click', '.accord-btn', function() {
            if ($(this).hasClass('active') !== true) {
                $('.accordion .accord-btn').removeClass('active');
            }
            if ($(this).next('.accord-content').is(':visible')) {
                $(this).removeClass('active');
                $(this).next('.accord-content').slideUp(300);
            } else {
                $(this).addClass('active');
                $('.accordion .accord-content').slideUp(300);
                $(this).next('.accord-content').slideDown(300);
            }
        });
    }


    /* ======= Services Grid slider ======= */
    $("#services").owlCarousel({
        navigation: true,
        pagination: false,
        autoPlay: 9000, //Set AutoPlay to 5 seconds
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        slideSpeed: 600,
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 4],
        itemsTablet: [800, 2],
        itemsMobile: [479, 1]
    });

    /* ======= Blog Post slider ======= */
    $("#post-slider").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: false,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    /* ======= Testimonial Slider ======= */
    $("#testimonials").owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 600,
        paginationSpeed: 700,
        singleItem: true,
        autoPlay: 5000,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        pagination: true,
        responsive: true
    });

    /* ======= Clients Grid ======= */
    $("#clients").owlCarousel({
        navigation: true,
        pagination: false,
        autoPlay: 5000, //Set AutoPlay to 5 seconds
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        slideSpeed: 600,
        items: 6,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [800, 3],
        itemsMobile: [479, 2]
    });


    /* === magnificPopup === */
    $(window).on('load', function() {
        $('.tt-lightbox').magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false
        });
        /* ======= shuffle js ======= */
        if ($('#portfolio-grid').length > 0) {
            /* initialize shuffle plugin */
            var $grid = $('#portfolio-grid');
            $grid.shuffle({
                itemSelector: '.portfolio-item' // the selector for the items in the grid
            });
            /* reshuffle when user clicks a filter item */
            $('#filter li').on('click', function(e) {
                e.preventDefault();
                // set active class
                $('#filter li').removeClass('active');
                $(this).addClass('active');
                // get group name from clicked item
                var groupName = $(this).attr('data-group');
                // reshuffle grid
                $grid.shuffle('shuffle', groupName);
            });
        }
    });

    /* ======= Sticky Menu  ======= */

   $(window).on('scroll', function() {
		 var items = $('#one-page .navigation .navbar-default');
        if ($(window).scrollTop() > 60) {
            items.addClass("navbar-fixed-top");
        } else {
           items.removeClass("navbar-fixed-top");
        }
    });

})(jQuery);