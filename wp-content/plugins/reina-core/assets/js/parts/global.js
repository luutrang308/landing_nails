(function ($) {
	"use strict";
	
	// This case is important when theme is not active
	if (typeof qodef !== 'object') {
		window.qodef = {};
	}
	
	window.qodefCore = {};
	qodefCore.shortcodes = {};
	qodefCore.listShortcodesScripts = {
		qodefSwiper: qodef.qodefSwiper,
		qodefPagination: qodef.qodefPagination,
		qodefFilter: qodef.qodefFilter,
		qodefMasonryLayout: qodef.qodefMasonryLayout,
		qodefJustifiedGallery: qodef.qodefJustifiedGallery,
	};

	qodefCore.body = $('body');
	qodefCore.html = $('html');
	qodefCore.windowWidth = $(window).width();
	qodefCore.windowHeight = $(window).height();
	qodefCore.scroll = 0;

	$(document).ready(function () {
		qodefCore.scroll = $(window).scrollTop();
		qodefInlinePageStyle.init();
		rowBackgroundImage();
	});

	$(window).resize(function () {
		qodefCore.windowWidth = $(window).width();
		qodefCore.windowHeight = $(window).height();
	});

	$(window).scroll(function () {
		qodefCore.scroll = $(window).scrollTop();
	});

	var qodefScroll = {
		disable: function(){
			if (window.addEventListener) {
				window.addEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}

			// window.onmousewheel = document.onmousewheel = qodefScroll.preventDefaultValue;
			document.onkeydown = qodefScroll.keyDown;
		},
		enable: function(){
			if (window.removeEventListener) {
				window.removeEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}
			window.onmousewheel = document.onmousewheel = document.onkeydown = null;
		},
		preventDefaultValue: function(e){
			e = e || window.event;
			if (e.preventDefault) {
				e.preventDefault();
			}
			e.returnValue = false;
		},
		keyDown: function(e) {
			var keys = [37, 38, 39, 40];
			for (var i = keys.length; i--;) {
				if (e.keyCode === keys[i]) {
					qodefScroll.preventDefaultValue(e);
					return;
				}
			}
		}
	};

	qodefCore.qodefScroll = qodefScroll;

	var rowBackgroundImage = function () {
		var backgroundImageSection = $('section.qodef-background-image-section, section.qodef-background-svg-section');

		if(backgroundImageSection.length) {
			backgroundImageSection.each(function () {
				var row     = $( this );
				var rowData = row.data( 'background-image' );
				var image   = rowData.image.url,
					svg               = rowData.svg,
					image_top_offset  = '',
					image_left_offset = '',
					svg_size          = '',
					svg_top_offset    = '',
					svg_left_offset   = '',
					svg_stroke        = '',
					svg_fill          = '';

				if ( image != '' && typeof (image) != 'undefined' ) {
					row.append( '<div class="qodef-row-background-image" ><img src="' + image + '" alt="Row background image ' + rowData.image.id + '" /></div>' );
				}

				var imageHolder = $( this ).find( '.qodef-row-background-image' );

				if ( imageHolder.length && typeof (rowData.image_top_offset) != 'undefined' ) {
					image_top_offset = rowData.image_top_offset;
					imageHolder.css(
						'top',
						image_top_offset
					);
				}

				if ( imageHolder.length && typeof (rowData.image_left_offset) != 'undefined' ) {
					image_left_offset = rowData.image_left_offset;
					imageHolder.css(
						'left',
						image_left_offset
					);
				}

				if ( svg != '' && typeof (svg) != 'undefined' ) {
					row.append( '<div class="qodef-row-background-svg">' + svg + '</div>' );
				}

				var svgHolder = $( this ).find( '.qodef-row-background-svg' );

				if ( rowData.svg.length && typeof (rowData.svg_size) != 'undefined' ) {
					svg_size = rowData.svg_size;
					svgHolder.css(
						'width',
						svg_size
					);
				}

				if ( rowData.svg.length && typeof (rowData.svg_top_offset) != 'undefined' ) {
					svg_top_offset = rowData.svg_top_offset;
					svgHolder.css(
						'top',
						svg_top_offset
					);
				}

				if ( rowData.svg.length && typeof (rowData.svg_left_offset) != 'undefined' ) {
					svg_left_offset = rowData.svg_left_offset;
					svgHolder.css(
						'left',
						svg_left_offset
					);
				}

				if ( rowData.svg.length && typeof (rowData.svg_stroke) != 'undefined' ) {
					svg_stroke = rowData.svg_stroke;
					svgHolder.css(
						'stroke',
						svg_stroke
					);
				}

				if ( rowData.svg.length && typeof (rowData.svg_fill) != 'undefined' ) {
					svg_fill = rowData.svg_fill;
					svgHolder.css(
						'fill',
						svg_fill
					);
				}
			})
		}
	}

	var qodefPerfectScrollbar = {
		init: function ($holder) {
			if ($holder.length) {
				qodefPerfectScrollbar.qodefInitScroll($holder);
			}
		},
		qodefInitScroll: function ($holder) {
			var $defaultParams = {
				wheelSpeed: 0.6,
				suppressScrollX: true
			};

			var $ps = new PerfectScrollbar(
				$holder[0],
				$defaultParams
			);

			$( window ).resize(
				function () {
					$ps.update();
				}
			);
		}
	};

	qodefCore.qodefPerfectScrollbar = qodefPerfectScrollbar;

	var qodefInlinePageStyle = {
		init: function () {
			this.holder = $('#reina-core-page-inline-style');

			if (this.holder.length) {
				var style = this.holder.data('style');

				if (style.length) {
					$('head').append('<style type="text/css">' + style + '</style>');
				}
			}
		}
	};

})(jQuery);
