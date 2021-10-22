$(window).on('load',function(){
	slick_slider();
	//open_pop('option');
	//$('.slide_wrap').slick('slickGoTo', 4);
})

function close_pop(){
	/*$('.pop_wrap').slidDown(function(){
		
	});*/
	
	$('.pop_cont').fadeOut(300);

	$('.pop_wrap').animate({
		top : '100vh'
	},500,function(){
		$('.pop_wrap').hide();
	});

	$('.btn_pop_close_wrap').animate({
		bottom : '-100vh'
	},500,function(){
		$('.btn_pop_close_wrap').hide();
	});

	//slick_slider();
}

function open_pop(type){
	//$('.slide_wrap').slick('unslick');
	//console.log(type);
	$('.pop_wrap').show();
	$('.pop_'+type+'').fadeIn(300);

	$('.pop_wrap').animate({
		top : 0
	},500);
	$('.btn_pop_close_wrap').show();
	$('.btn_pop_close_wrap').animate({
		bottom : '60px'
	},500);
}


function options_tab(num){
	$('ul.options_tab li').removeClass('ov');
	$('ul.options_tab li:nth-child('+num+')').addClass('ov');
	$('.options_img > div').hide();
	$('.options_img > .options_img_0'+num+'').show();
	$('.options_detail').hide();
	$('.options_detail.detail_0'+num+'').show();

	var current_tab = $('ul.options_tab li:nth-child('+num+')').offset().left - $('.list_swiper ul.options_tab').offset().left + $('.list_swiper ul.options_tab').scrollLeft();

	$('.list_swiper ul.options_tab').animate({scrollLeft: current_tab}, 500 );
}

function next_page(){
	$('.slide_wrap').slick('slickNext');

}

function pop_spec_tab(num,snum){
	$('.spec_cont').hide();
	$('.spec_cont_0'+num+'').show();
	$('.pop_spec > .pop_tab ul.tab_list li').removeClass('ov');
	$('.pop_spec > .pop_tab ul.tab_list li:nth-child('+num+')').addClass('ov');
	console.log(snum);
	if(snum){
		$('.spec_cont').hide();
		$('.spec_cont_0'+snum+'').show();
	}
}

function slick_slider(){
	$('.slide_wrap').slick({
	  dots: false,
	  infinite: false,
	  arrows: false,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	});
}