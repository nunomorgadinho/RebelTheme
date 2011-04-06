
/**************************************************
	BLOG HEIGHT
**************************************************/

function blog_height() {
	
	$('.nav.blog').height($(window).height());

	if ($('.nav.blog .navContent').height() < $(window).height()) {
		$('.nav.blog .navContent').css('top', ($(window).height() - $('.nav.blog .navContent').height()) / 2);
	}
}

/**************************************************
	PORTFOLIO HEIGHT
**************************************************/

function portfolio_height() {
	
	$('.nav.portfolio').height($(window).height());
	
	if ($('.nav.portfolio .navContent').height() < $(window).height()) {
		$('.nav.portfolio .navContent').css('top', ($(window).height() - $('.nav.portfolio .navContent').height()) / 2);
	}
}

/**************************************************
	HEIGHT FIX
**************************************************/

function height_fix() {
	
	if ($.browser.msie && $.browser.version=='6.0') {
		$('#background div.gradient .right, #background div.gradient .left, .pattern').height($(window).height());
	}
}

/**************************************************
	SCROLL PANE HEIGHT
**************************************************/

function scrollpane_height() {
	
	$('.sliderMask, .jScrollPaneContainer').height($(window).height());
	$('.sliderMask').jScrollPane();
}

/**************************************************
	MENU POSITION
**************************************************/

function menu_pos() {
	
	$('.navigation').css('top', ($(window).height() - $('.navigation').height()) / 2);
	$('.navigation').fadeIn();
}

/**************************************************
	BACKGROUND
**************************************************/

function background_resize() {
	return;
	var image = '#background img';
	var ratio = ($(image).height() / $(image).width()).toFixed(2);
	var browserwidth = $(window).width();
	var browserheight = $(window).height();
	var offset;
	
	var min_height = 0;
	var min_width = 0;
	var fit_landscape = 0;
	var fit_portrait = 0;
	var horizontal_center = 1;
	var vertical_center = 1;
	
	if ((browserheight > min_height) || (browserwidth > min_width)){
		if ((browserheight/browserwidth) > ratio){
			if (fit_landscape && ratio <= 1){
				$(image).width(browserwidth);
				$(image).height(browserwidth * ratio);
			}
			
			else{
				$(image).height(browserheight);
				$(image).width(browserheight / ratio);
			}
		}
		
		else {
			if (fit_portrait && ratio > 1){
				$(image).height(browserheight);
				$(image).width(browserheight / ratio);
			}
			
			else{
				$(image).width(browserwidth);
				$(image).height(browserwidth * ratio);
			}
		}
	}
	
	if (horizontal_center){
		$(image).css('left', (browserwidth - $(image).width()) / 2);
	}
	
	if (vertical_center){
		$(image).css('top', (browserheight - $(image).height()) / 2);
	}
	
	$(image).bind("contextmenu",function(){
		return false;
	});
	$(image).bind("mousedown",function(){
		return false;
	});
}

/**************************************************
	DEPLOY
**************************************************/

function deploy() {
	
	blog_height();
	portfolio_height();
	height_fix();
	scrollpane_height();
	menu_pos();
}

/**************************************************
	DOCUMENT RESIZE
**************************************************/

window.onresize = function() {
	
	deploy();
	background_resize();
};

/**************************************************
	SOCIAL ICONS
**************************************************/

function social() {

	$('ul.social li').hover(function() {
		$(this).animate(
			{opacity: '1'}, {queue:false, duration: 100}
		);
	},
	function() {
		$(this).animate(
			{opacity: '0.5'}, {queue:false, duration: 100}
		);
	});
}

/**************************************************
	MENU
**************************************************/

function menu() {
	
	$('ul.menu li').hover(function() {
		$(this).not('ul.sub-menu li').find('a:eq(0)').stop().animate({
			paddingLeft: '20px'}, {queue:false, duration: 100
		}).removeClass('theme_color_1').addClass('theme_color_2');
		
		$(this).find('ul:eq(0)').show();
	},
	function(){
		$(this).not('ul.sub-menu li').find('a:eq(0)').stop().animate({
			paddingLeft: '10px'}, {queue:false, duration: 100
		}).removeClass('theme_color_2').addClass('theme_color_1');
		
	//	$(this).find('ul').hide();
	});
}

/**************************************************
	MENU - SEARCH
**************************************************/

function menu_search() {
	
	$('.navigation .search').hover(function(){
		$(this).animate({left: '0px'}, {queue:false, duration: 100});
	},
	function(){
		$(this).animate({left: '-150px'}, {queue:false, duration: 100});
	});
}

/**************************************************
	SCROLL PANE
**************************************************/

function scrollpane() {
	
	$('.sliderMask .sliderContent img').load(function() {
		scrollpane_height();
	});
}

/**************************************************
	LIGHTBOX - PRETTY PHOTO
**************************************************/

function lightbox() {
	
	$("a[rel^='prettyPhoto'], a[rel^='lightbox']").prettyPhoto({
		showTitle : false,
		theme : 'facebook'
	});
}

/**************************************************
	CONTENT IMAGES
**************************************************/

function image() {

	$("a[rel^='lightbox']").hover(function() {
		$("a[rel^='lightbox']").not(this).animate(
			{opacity: '0.5'}, {queue:false, duration: 100}
		);
	},
	function() {
		$("a[rel^='lightbox']").not(this).animate(
			{opacity: '1'}, {queue:false, duration: 100}
		);
	});
}

/**************************************************
	BLOG
**************************************************/

function blog() {
	
	$('.nav.blog .navContent li a').hover(function() {
		$(this).animate({paddingRight: '20px'}, {queue:false, duration: 100});
	},
	function(){
		$(this).animate({paddingRight: '10px'}, {queue:false, duration: 100});
	});
	
	$('.nav.blog .navMask ul.navContent').mousemove(function(e) {
		var _top = parseInt($('.nav.blog').offset().top);
		var _contentH = parseInt($('.nav.blog .navMask').height()) + 5;
		var _H = $('.nav.blog').height() - 20;
		var _scH = _contentH - _H;
		var _ypos = e.pageY - _top;
	
		if(_scH > 0) {
			var _contentY = -(_scH / _H)*_ypos + 10;
			$('.nav.blog .navMask .navContent').animate({top: _contentY}, { queue:false, duration: 500 });
		}
	});
}

/**************************************************
	PORTFOLIO
**************************************************/

function portfolio() {
	
//	$('.nav.portfolio .navMask ul.navContent li').not('.paging').hover(function(){
//		$(this).animate({right: '0px'}, {queue:false, duration: 100});
//	},
//	function(){
//		$(this).animate({right: '-10px'}, {queue:false, duration: 100});
//	});
	
	
	$('.nav.portfolio .navMask ul.navContent li p.image img').hover(function(){
		$(this).animate({opacity: '0.5'}, {queue:false, duration: 100});
	},
	function(){
		$(this).animate({opacity: '1'}, {queue:false, duration: 100});
	});
	
	$('.nav.portfolio .navMask ul.navContent').mousemove(function(e) {
		var _top = parseInt($('.nav.portfolio').offset().top);
		var _contentH = parseInt($('.nav.portfolio .navMask').height()) + 5;
		var _H = $('.nav.portfolio').height() - 20;
		var _scH = _contentH - _H;
		var _ypos = e.pageY - _top;
		
		if(_scH > 0) {
			var _contentY = -(_scH / _H)*_ypos + 10;
			$('.nav.portfolio .navMask .navContent').animate({top: _contentY}, { queue:false, duration: 500 });
		}
	});
}

/**************************************************
	BACKGROUND
**************************************************/

function background() {

	$(window).load(function() {
		$('#background img').fadeIn();
		background_resize();
	});
}

/**************************************************
	DOCUMENT READY
**************************************************/

$(document).ready(function() {
	
	deploy();
	social();
	menu();
	menu_search();
	scrollpane();
	lightbox();
	image();
	blog();
	portfolio();
	background();
});