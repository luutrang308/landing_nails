(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSearchMinimal.init();
	});
	
	var qodefSearchMinimal = {
		init: function () {
			var $searchOpener = $('a.qodef-search-opener'),
				$searchForm = $('.qodef-search-minimal-form'),
				$searchClose = $searchForm.find('.qodef-m-close');
			
			if ($searchOpener.length && $searchForm.length) {
				$searchOpener.on('click', function (e) {
					e.preventDefault();
					qodefSearchMinimal.openMinimal($searchForm);
					
				});
				$searchClose.on('click', function (e) {
					e.preventDefault();
					qodefSearchMinimal.closeMinimal($searchForm);
				});
			}
		},
		openMinimal: function ($searchForm) {
			qodefCore.body.addClass('qodef-minimal-search--opened qodef-minimal-search--fadein');
			qodefCore.body.removeClass('qodef-minimal-search--fadeout');
			
			setTimeout(function () {
				$searchForm.find('.qodef-m-form-field').focus();
			}, 600);
		},
		closeMinimal: function ($searchForm) {
			qodefCore.body.removeClass('qodef-minimal-search--opened qodef-minimal-search--fadein');
			qodefCore.body.addClass('qodef-minimal-search--fadeout');
			
			setTimeout(function () {
				$searchForm.find('.qodef-m-form-field').val('');
				$searchForm.find('.qodef-m-form-field').blur();
				qodefCore.body.removeClass('qodef-minimal-search--fadeout');
			}, 300);
		}
	};
	
})(jQuery);
