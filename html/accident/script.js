$('.tab li a').click(function(){
	$('.tab li a').removeClass('on');
	$(this).addClass('on');
	$('.tab_cont').removeClass('on');
	$('.tab_cont').eq($(this).parent().index()).addClass('on');
});