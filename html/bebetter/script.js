$(window).on('load',function(){
	slick_slider();
});


function slick_slider(){
	$('ul.slide').slick({
	  dots: false,
	  infinite: false,
	  arrows: false,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	});
}


function play_video(){
	$('.video_player').show();
	var myVideo = document.getElementById("video_better"); 
	myVideo.play(); 

	myVideo.onended = function() {
		myVideo.currentTime = 0;
		$('.video_player').hide();
	};

	$('.video_player').click(function(){
	  if (myVideo.paused) {
	    myVideo.play(); 
	  }else {
	    myVideo.pause(); 
	  }
	})
}