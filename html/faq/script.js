$(window).on('load',function(){
	$('.cont_list li').click(function(){
		var this_class = $(this).attr('class');
		if(this_class != 'ov'){
			$('.cont_list li .list_txt').slideUp();
			$('.cont_list li').removeClass('ov');
			$(this).addClass('ov');
			$(this).find('.list_txt').show();
		}else{
			$(this).find('.list_txt').hide();
			$('.cont_list li').removeClass('ov');
		}

	});

});	