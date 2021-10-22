// 아코디언
$('.warning_tab_content .light_list li a').click(function(e){
	e.preventDefault();
	if($(this).next('p').is(':visible')){
		$(this).removeClass('on').next().hide();
	} else {
		$('.warning_tab_content .light_list li a').removeClass('on').next().hide();
		$(this).addClass('on').next('p').show();
	}
});

// 탭메뉴
$('.warning_tab .btn').each(function(index, obj){
	
	$(this).click(function(e){
		e.preventDefault();
		if($(this).hasClass('on')) return;
		$('.warning_tab .btn').removeClass('on');
		$(this).addClass('on');
		$('.warning_tab_content').removeClass('on');
		$('.warning_tab_content').eq(index).addClass('on');

		//아코디언 닫힘
		$('.warning_tab_content .light_list li a').removeClass('on')
		$('.warning_tab_content .light_list li p').hide();
	});
})

// 하위 탭메뉴
$('.warning_tab_content .sub_tab a').each(function(index, obj){
	
	$(this).click(function(e){
		e.preventDefault();
		if($(this).hasClass('on')) return;
		$('.warning_tab_content .sub_tab a').removeClass('on');
		$(this).addClass('on');
		$('.light_wrap').removeClass('on');
		$('.light_wrap').eq(index).addClass('on');

		//아코디언 닫힘
		$('.warning_tab_content .light_list li a').removeClass('on')
		$('.warning_tab_content .light_list li p').hide();
	});
})
