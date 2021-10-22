var $slide = $("ul.slide")
var $active = $("ul.slide li.active");

$(window).on('load', function() {
    visualImgHeight = $("#visual img").height()
    // $slide.css("height", "calc(100vh - 59px - " + visualImgHeight + "px - 70px)");
})

function moveNext() {
    if ($active.next().length > 0) {
        $active.removeClass('active').addClass('prev')
        .next().removeClass('next').addClass('active');
    
        $active = $("ul.slide li.active");

        videoStop();
        // $active.find('video')[0].play();
    }
}

function movePrev() {
    if ($active.prev().length > 0) {
        $active.removeClass('active').addClass('next')
        .prev().removeClass('prev').addClass('active');
    
        $active = $("ul.slide li.active");

        videoStop()
        // $active.find('video')[0].play();
    }
}

function videoStop() {
    $.each($('video'), function(index, value) {
        $(this)[0].pause();
    })
}