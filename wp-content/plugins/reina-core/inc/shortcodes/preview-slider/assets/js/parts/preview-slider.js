(function($) {
	"use strict";

    qodefCore.shortcodes.reina_core_preview_slider = {};

    $(window).on('load', function(){
        qodefPreviewSlider.init();
    })

    var qodefPreviewSlider = {
        init: function () {
            var sliders = $('.qodef-preview-slider');

            sliders.each(function() {
                var slider = $(this);

                var autoplay = false,
                    autoPlaySpeed = 1700,
                    dots = false;

                if(typeof slider.data('autoplay') !== 'undefined' && slider.data('autoplay') == 'yes'){
                    autoplay = true;
                }

                if(typeof slider.data('autoplay-speed') !== 'undefined' && slider.data('autoplay-speed') !== ''){
                    autoPlaySpeed = slider.data('autoplay-speed');
                }

                if(typeof slider.data('dots') !== 'undefined' && slider.data('dots') !== 'no'){
                    dots = true;
                }

                var slickPhone = {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 1100,
                    autoplay: autoplay,
                    autoplaySpeed: autoPlaySpeed,
                    arrows: false,
                    vertical: true,
                    useTransform: true,
                    easing: 'easeInOutCubic',
                    draggable: false,
                    infinite: true,
                    pauseOnHover: false
                };

                var slickLaptop = {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 1100,
                    autoplay: autoplay,
                    autoplaySpeed: autoPlaySpeed,
                    arrows: false,
                    focusOnSelect:true,
                    vertical: true,
                    useTransform: true,
                    easing: 'easeInOutCubic',
                    draggable: false,
                    infinite: true,
                    pauseOnHover: false
                };

                var slickTablet = {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 1100,
                    autoplay: autoplay,
                    autoplaySpeed: autoPlaySpeed,
                    arrows: false,
                    vertical: true,
                    useTransform: true,
                    easing: 'easeInOutCubic',
                    draggable: false,
                    infinite: true,
                    pauseOnHover: false
                };

                if($('#qodef-main-rev-holder').length) {
                    setTimeout( function () {
                        setTimeout( function () {
                            var mobileSlider = slider.find('.qodef-ps-mobile-images').slick(slickPhone);
                            slider.find('.qodef-ps-mobile-holder').addClass('qodef-appeared');
                        }, 700);

                        setTimeout( function () {
                            var laptopSlider = slider.find('.qodef-ps-laptop-images').slick(slickLaptop);
                            slider.find('.qodef-ps-laptop-holder').addClass('qodef-appeared');
                        }, 1100);

                        setTimeout( function () {
                            var tabletSlider = slider.find('.qodef-ps-tablet-images').slick(slickTablet);
                            slider.find('.qodef-ps-tablet-holder').addClass('qodef-appeared');
                        }, 1500);
                    }, 3100);//delay for spinner
                } else {
                    slider.appear(function () {
                        setTimeout( function () {
                            var mobileSlider = slider.find('.qodef-ps-mobile-images').slick(slickPhone);
                            slider.find('.qodef-ps-mobile-holder').addClass('qodef-appeared');
                        }, 100);
                        setTimeout( function () {
                            var laptopSlider = slider.find('.qodef-ps-laptop-images').slick(slickLaptop);
                            slider.find('.qodef-ps-laptop-holder').addClass('qodef-appeared');
                        }, 210);
                        setTimeout( function () {
                            var tabletSlider = slider.find('.qodef-ps-tablet-images').slick(slickTablet);
                            slider.find('.qodef-ps-tablet-holder').addClass('qodef-appeared');
                        }, 370);

                    }, {accX: 0, accY: -100});
                }

                slider.addClass('qodef-preview-slider-loaded');
            });
        }
    };

    qodefCore.shortcodes.reina_core_preview_slider.qodefPreviewSlider = qodefPreviewSlider;
	
})(jQuery);
