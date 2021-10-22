

// 시승 신청 - 스와이프
var swiper;

if ($('.swiper-container').length > 0) {

    $.getScript("/html/testdrive/swiper.js").done(function () {

        swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination'
            },
            slidesPerView: 1,
            spaceBetween: 10,
            freeMode: false
        });

    });
}

// 스승 신청 - 시승차 카테고리 선택
$('.tab_list li.tab').on('click', function() {
    var type = $(this).attr('data-type');
    $(this).find('a').addClass('on');
    $(this).siblings().find('a').removeClass('on');
    
    $('.cars_wrap .list .item.' + type).show();
    $('.cars_wrap .list .item').not('.' + type).hide();
    swiper.update()
})

// 시승 신청 - 시승차 선택
$('.cars .list .item a').click(function () {

    if ($(this).find('.check').hasClass('on')) {
        $(this).find('.check').removeClass('on');
    } else {
        $('.cars .list .item a .check').removeClass('on');
        $(this).find('.check').addClass('on');
    }
});



// 신청 전시장 - 지도
// if ($('.map').length > 0) {

//     var oldDocumentWrite = document.write;
//     document.write = function (node) {
//         $("body").append(node)
//     }

//     $.getScript("https://dapi.kakao.com/v2/maps/sdk.js?appkey=e6337d075bac312a03c730c6ac9f07ba").done(function () {

//         setTimeout(function () {

//             document.write = oldDocumentWrite;

//             showMap();

//         }, 500);
//     }); // => getScript로 불러오면 지도 안보이는 것 해결.
// }

/*function showMap(){
    document.querySelectorAll('.map').forEach(function (elem) {
        // 신청 전시장 - 지도
        var lat = elem.getAttribute('data-lat');
        var lng = elem.getAttribute('data-lng');

        var mapContainer = elem, // 지도를 표시할 div
            mapOption = {
                center: new kakao.maps.LatLng(lat, lng), // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };

        

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

        // 마커가 표시될 위치입니다
        var markerPosition = new kakao.maps.LatLng(lat, lng);

        // 마커를 생성합니다
        var marker = new kakao.maps.Marker({
            position: markerPosition
        });

        // 마커가 지도 위에 표시되도록 설정합니다
        marker.setMap(map);

        // 아래 코드는 지도 위의 마커를 제거하는 코드입니다
        // marker.setMap(null);
    });
}*/


// 뒤로가기 버튼
$('#breadcrumb .back a, #back').click(function () {
    history.back();
});

// 개인정보 수집 및 이용동의 - 모두 동의
var all_agree = $('#all_agree');
var checks = $('.agree_body input[type="checkbox"]');
var check_len = checks.length;

all_agree.change(function () {
    if ($(this).is(':checked')) {
        checks.prop('checked', true);
    } else {
        checks.prop('checked', false);
    }
});

// 개인정보 수집 및 이용동의 - 개별 동의
checks.change(function () {
    if ($('.agree_body input[type="checkbox"]:checked').length == check_len) {
        all_agree.prop('checked', true);
    } else {
        all_agree.prop('checked', false);
    }
});

// 전시장 가져오기
function getShowroom(_val) {
    var data;
    $.ajax({
        url:'/ajax/ajax.getStore.php',
        type:'post',
        data: {area: _val, type: 'showroom'},
        dataType: 'json',
        success: function(_data){
            // console.log(_data)
            data = _data;
        }, complete: function() {
            setShowroom()
        }
    });

    function setShowroom() {
        $(".showroom .list").empty();
        $.each(data, function(key, val) {
            var temp = '<li class="item">' +
                    '<div class="tit"><input type="radio" name="showroom" value="' + val.code + '"><span>' + val.name + '</span><i></i></div>' +
                    '<div class="info_wrap">' +
                        '<div class="info_box">' +
                            '<ul class="info">' +
                                '<li><span class="label">주소</span><span class="data">' + val.addr + '</span></li>' +
                                '<li><span class="label">대표번호</span><span class="data">' + val.tel + '</span></li>' +
                                '<li><span class="label">FAX</span><span class="data">' + val.fax + '</span></li>' +
                            '</ul>' +
                            '<div class="map" data-lat="' + val.lat + '" data-lng="' + val.lng + '"></div>' +
                        '</div>' +
                    '</div>' +
                '</li>';
                
            $(".showroom .list").append(temp);
        });
    
        // 신청 전시장 - 아코디언
        $('.showroom .list .item .tit').click(function () {
            var t = $(this);
            $('.showroom .list .item .tit input[type="radio"]').prop('checked',false);
            if (t.parent().hasClass('on')) {
                t.parent().removeClass('on');
                $('.info_wrap').css({'height': 0});
                t.find('input[type="radio"]').prop('checked',false);
            } else {
                $('.showroom .list .item').removeClass('on');
                t.parent().addClass('on');
                $('.info_wrap').css({'height': 0});
                t.next('.info_wrap').css({
                    'height': t.next('.info_wrap').find('.info_box').height()
                });
                t.find('input[type="radio"]').prop('checked',true);
            }
        });

        showMap();
        
    }
};

