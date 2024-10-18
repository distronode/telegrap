(function ($) {
    "use strict";
    function preloaderRun() {
        if ($('.preloader').length) {
            $('.preloader').delay(100).fadeOut(500);
            $(".preloader-bg").css("display", "none");
        }
    }
    // Header Style + Scroll to Top
    $(".target-to a[href^='#']").on('click', function (e) {
        e.preventDefault();
        var placement = this.hash;
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top - 80
        }, 800, function () {
        });
    });

    //mobile slide navigation system

    $(".nav-icon").on('click', function (e) {
        e.preventDefault();
        document.getElementById("mySidenav").style.width = "200px";
    });
    $(".close-icon").on('click', function (e) {
        e.preventDefault();
        document.getElementById("mySidenav").style.width = "0";
    });

    //contact map

    function getPosition(callback) {
        var geocoder = new google.maps.Geocoder();
        var postcode = "Dhaka,Bangladesh";
        geocoder.geocode({
            'address': postcode
        }, function (results, status)

        {
            if (status == google.maps.GeocoderStatus.OK)
            {
                callback({
                    latt: results[0].geometry.location.lat(),
                    long: results[0].geometry.location.lng()
                });
            }
        });
    }

    function setup_map(latitude, longitude) {
        var _position = {
            lat: latitude,
            lng: longitude
        };
        var mapOptions = {
            zoom: 16,
            center: _position
        }

        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: mapOptions.center,
            map: map
        });
    }

    //window resize 

    $(window).resize(function () {
        var bodyheight = $(this).height();
        bodyheight = bodyheight - 350;
        $(".window-height").height(bodyheight);
    }).resize();
    $(window).on('scroll', function () {
        var windowScroll = $(this).scrollTop();
        // Fixed nav
        if (windowScroll > 150) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
        // Back to top appear
        if (windowScroll > 200) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
    $(window).on('load', function () {
        preloaderRun();
//        getPosition(function (position) {
//            setup_map(position.latt, position.long);
//        });
//        $('.owl-carousel').owlCarousel({
//            loop: true,
//            margin: 10,
//            nav: true,
//            autoplay: true,
//            autoPlaySpeed: 5000,
//            autoPlayTimeout: 5000,
//            autoplayHoverPause: true,
//            responsive: {
//                0: {
//                    items: 1
//                },
//                600: {
//                    items: 3
//                },
//                1000: {
//                    items: 5
//                }
//            }
//        })

    });
})(window.jQuery);