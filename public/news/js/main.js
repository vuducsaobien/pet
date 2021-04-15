(function($) {
    'use strict';
    
    /* jQuery MeanMenu */
    $('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });
    
    /* cart */
    $(".icon-cart").on("click", function() {
        $(this).parent().find('.shopping-cart-content').slideToggle('medium');
    })
    
    /*--
	Header Search Toggle
    -----------------------------------*/
    var searchToggle = $('.search-toggle');
    searchToggle.on('click', function(){
        if($(this).hasClass('open')){
           $(this).removeClass('open');
           $(this).siblings('.search-content').removeClass('open');
        }else{
           $(this).addClass('open');
           $(this).siblings('.search-content').addClass('open');
        }
    })
    
    /* slider active */
    $('.slider-active').owlCarousel({
        loop: true,
        navText: ['<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'],
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    
    /*------ Wow Active ----*/
    new WOW().init();
    
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    var CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });
    
    /*---------------------
    price slider
    --------------------- */
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');

    function getUrlParam(key) {
        let searchParams = new URLSearchParams(window.location.search);
        return searchParams.get(key);
    }

    console.log(setting_price);

    let setting_price_min       = (parseInt(setting_price.min))/1000;
    let setting_price_min_plus  = (parseInt(setting_price.min_plus))/1000;
    let setting_price_max       = (parseInt(setting_price.max))/1000;
    let setting_price_max_minus = (parseInt(setting_price.max_minus))/1000;
    let setting_price_range     = (parseInt(setting_price.range))/1000;

    let UrlPriceMin = getUrlParam('min');
    let UrlPriceMax = getUrlParam('max');
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');

    $(function() {
        let startValues = setting_price_min + setting_price_min_plus;
        let endValues   = setting_price_max - setting_price_max_minus;

        let searchPrice = localStorage.getItem('search_price');
        if (searchPrice !== null && searchPrice !== '') {

            let searchPriceURL      = {
                'search_price_min': getUrlParam('min') / 1000,
                'search_price_max': getUrlParam('max') / 1000
            };
            searchPrice = JSON.stringify(searchPriceURL);

            // console.log('XXXX search_price_min = ' + search_price_min);
    
        }
        // console.log('startValues = ' + startValues);
        // console.log('endValues = ' + endValues);

        if (searchPrice && UrlPriceMin !== null &&  UrlPriceMax !== null ) {
            let teeee = JSON.parse(searchPrice);

            $.each(teeee, function( index, result ) {
                console.log(`index = ${index} - result = ${result}`);
                if (index == 'search_price_min') {
                    startValues = result;
                } else {
                    endValues = result;
                }
            })
        }

        sliderrange.slider({
            range : true,
            min   : setting_price_min,
            max   : setting_price_max,
            values: [startValues, endValues],
            step  : setting_price_range,
            slide : function(event, ui) {
                amountprice.val(ui.values[0] + " K - " + ui.values[1] + " K");
                $('input[name=min]').val(ui.values[0]);
                $('input[name=max]').val(ui.values[1]);
            }
        });
        amountprice.val(sliderrange.slider("values", 0) + " K - " 
            + sliderrange.slider("values", 1) + " K");
            // console.log('amountprice.val() = ' + amountprice.val());
    });

    
    /*---------------------
    shop grid list
    --------------------- */
    $('.view-mode li a').on('click', function() {
        var $proStyle = $(this).data('view');
        $('.view-mode li').removeClass('active');
        $(this).parent('li').addClass('active');
        $('.product-view').removeClass('product-grid product-list').addClass($proStyle);
    })
    
    /* counterUp */
    $('.count').counterUp({
        delay: 10,
        time: 1000
    });
    
    /* product-dec-slider active */
    $('.product-dec-slider').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="ti-arrow-left"></i>', '<i class="ti-arrow-right"></i>'],
        nav: true,
        item: 4,
        margin: 12,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    
    /* related-product-active active */
    $('.related-product-active').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        nav: false,
        item: 4,
        margin: 30,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
    
    /*--------------------------
	 Zoom
	---------------------------- */	
	$("#zoompro").elevateZoom({
		gallery : "gallery",
		galleryActiveClass: "active",
		zoomWindowWidth:300,
		zoomWindowHeight:100,
		scrollZoom : false,
        zoomType : "inner",
        cursor: "crosshair"
	});  
    
    /*--
    Menu Stick
    -----------------------------------*/
    var header = $('.transparent-bar');
    var win = $(window);
    
    win.on('scroll', function() {
        var scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass('stick');
        } else {
            header.addClass('stick');
        }
    });
    
    /*--------------------------
     ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="ti-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    
    /*---------------------
        Countdown
    --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown day">%-D <p>Days</p></span> <span class="cdown hour">%-H <p>Hour</p></span> <span class="cdown minutes">%M <p>Min</p></span class="cdown second"> <span>%S <p>Sec</p></span>'));
        });
    });
    
    
    /*--
    Testimonial Slick Carousel
    -----------------------------------*/
        $('.testimonial-text-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        fade: true,
        asNavFor: '.slider-nav',
    });
    
    /*--
        Testimonial Slick Carousel as Nav
    -----------------------------------*/
    $('.testimonial-image-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.testimonial-text-slider',
      dots: false,
      arrows: false,
      centerMode: true,
      focusOnSelect: true,
      centerPadding: '0px',
      responsive: [
        {
          breakpoint: 767,
          settings: {
            dots: false,
            centerPadding: '0px',
          }
        },
        {
          breakpoint: 420,
          settings: {
            autoplay: true,
            dots: false,
            slidesToShow: 1,
            centerMode: false,
          }
        }
      ]
    });
    
    
    
})(jQuery);