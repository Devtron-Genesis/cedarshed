function onChooseRegion(){
	var value = (jQuery)('#edit-commerce-shipping-service-details-region-choose').val();
	(jQuery)('#edit-commerce-shipping-service-details-location option').each(function(){
		var thisop = (jQuery)(this);
		if(thisop.attr('taxonomy') == value){
			thisop.show();
		}else{
			thisop.hide();
		}

	});
}
(jQuery)(function(){
	(jQuery)('img').each(function(){
		var checkalt = (jQuery)(this).attr('alt');
		var src = (jQuery)(this).prop('src');
	var name = src.replace(/^.*\/|\.png$/g, '');
	if(checkalt == ''){
			//var newstr = src.replace('/sites/default/files/', "");
			(jQuery)(this).attr('alt',name);
		}
	});
	//(jQuery)('.carousel').carousel();
	(jQuery)('.dropdown a').removeAttr( 'data-toggle' );



	//Check to see if the window is top if not then display button
	(jQuery)(window).scroll(function(){
		if ((jQuery)(this).scrollTop() > 100) {
			(jQuery)('.scrollToTop').fadeIn();
		} else {
			(jQuery)('.scrollToTop').fadeOut();
		}
	});

	//Click event to scroll to top
	(jQuery)('.scrollToTop').click(function(){
		(jQuery)('html, body').animate({scrollTop : 0},800);
		return false;
	});
	var widthwin = 0;
	widthwin =  (jQuery)(window).width();
	if(widthwin < 768){
	  expandMenu();
	}


	// (jQuery)(window).scroll(function(){
// 		var headerHeight = (jQuery)('.header').outerHeight();
// 		if((jQuery)(window).scrollTop() >= headerHeight - 50) {
// 			(jQuery)('.header').addClass('fixed');
// 		} else {
// 			(jQuery)('.header').removeClass('fixed');
// 		}
// 	});


	//(jQuery)('.box a[href^="/' + location.pathname.split("/")[1] + '"]').parent().addClass('active');

});
(jQuery)( window ).resize(function() {
var widthwin = 0;
	widthwin =  (jQuery)(window).width();

 	if(widthwin < 768){
	  expandMenu();
	}
});

function expandMenu(){
	(jQuery)('.dropdown-menu').hide();

	(jQuery)('.dropdown a').each(function(){


		var target = (jQuery)(this).attr('data-target');
		var hrefthis =(jQuery)(this).attr('href');
		if(hrefthis != '#'){

		}
		if(target){
			if(hrefthis != '#'){
				(jQuery)(this).attr('href','#');
				(jQuery)(this).click(function(){
					(jQuery)('.dropdown-menu').toggle("slow");
				});
			}
		}


	});
	//alert('aaa');
}

(function($) {
	$(document).ready(function() {
		$('.field-name-commerce-price .commerce-price-savings-formatter-list .price-label').text('Price Starting at:');
		$('.field-name-commerce-price .commerce-price-savings-formatter-price .price-label').text('Price Online Starting at:');
	});
})(jQuery);
