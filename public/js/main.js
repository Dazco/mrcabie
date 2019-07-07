$(document).ready(function() {
    "use strict";

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".fullscreen").css("height", window_height)
    $(".fitscreen").css("height", fitscreen);


    //------- Lightbox  js --------//  

    if($('.img-gal').length){
        $('.img-gal').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
    if($('.play-btn').length){
        $('.play-btn').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }

    //------- Superfist nav menu  js --------//

    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });


    if ( $(".site-content").hasClass("instagram") ) {
        footerIntagram();
    }


    function footerIntagram(){
        var feed = new Instafeed({
            target: "footer-ig-stream",
            get: "user",
            limit : 6,
            resolution: 'standard_resolution',
            userId: 2159114835,
            accessToken: "2159114835.9e667eb.7a37f9b944ea4023b94541c661cbf43d",
            template: '<a href="{{image}}" class="mfp-ig-popup" data-effect="mfp-zoom-in" title="{{title}}"><img src="{{image}}" alt="{{caption}}"></a>',
            after: function() {
                $(".mfp-ig-popup").magnificPopup({
                    type: "image",
                    removalDelay: 500, //delay removal by X to allow out-animation
                    image: {
                        cursor: null
                    },
                    gallery: {
                        enabled: true // set to false to disable gallery
                    },
                    callbacks: {
                        beforeOpen: function() {
                            // just a hack that adds mfp-anim class to markup 
                            this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim");
                            this.st.mainClass = this.st.el.attr("data-effect");
                        }
                    },
                    midClick: true
                });
            }
        });
        feed.run();
    }
    

    //------- Mobile Nav  js --------//  

    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').toggle();
        });

            $(document).on('click', function(e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    //------- Smooth Scroll  js --------//  

    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#header').length) {
                    top_space = $('#header').outerHeight();

                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });

    $(document).ready(function() {

        $('html, body').hide();

        if (window.location.hash) {

            setTimeout(function() {

                $('html, body').scrollTop(0).show();

                $('html, body').animate({

                    scrollTop: $(window.location.hash).offset().top - 108

                }, 1000)

            }, 0);

        } else {

            $('html, body').show();

        }

    });

    //------- Header Scroll Class  js --------//  

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    //------- Mailchimp js --------//  

    $(document).ready(function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });

});