// 팝업 열기
$('.coupon_down').click(function(e){
	e.preventDefault();
	$('.pop_wrap').addClass('on');
});

// 팝업 닫기
$('#close').click(function(e){
	$('.pop_wrap').removeClass('on');
})