var swiper = new Swiper('.swiper-container', {
  pagination: {
	el: '.swiper-pagination',
  },
});

$('.cars .list .item a').click(function() {
	$(this).find('.check').addClass('on');
});