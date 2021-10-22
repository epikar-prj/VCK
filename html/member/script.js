$(window).on('load', function() {
    var json_url = "./../../json/service.json";
    var favorite = app.storage.getItem('fcenter');
    
    $.getJSON(json_url, function(data) {
        var result = "";
        $.each(data, function(i, item){
            if (favorite) {
                if (favorite.indexOf(item.code) > -1) {

                    var time = "";
                    if(item.name == "볼보 순천 서비스센터" ||item.name == "볼보 전주 서비스센터" ||item.name == "볼보 광주 서비스센터"||item.name == "볼보 제주 서비스센터" ){
                        time = '평일 '+item.time_1+' / 토요일 '+item.time_2+' (둘째, 넷째주 휴무)';
                    } else {
                        time = '평일 '+item.time_1+' / 토요일 '+item.time_2+'';
                    }
    
                    result += '<li class="item">' +
                    '<div class="tit"><input type="radio"><span>' + item.name + '</span><i></i></div>' +
                    '<div class="info_wrap">' +
                        '<div class="info_box">' +
                            // '<div class="img_wrap"><img src="/images/member/center_sample.jpg" alt=""></div>' +
                            '<ul class="info">' +
                                '<li><span class="label">주소</span><span class="data">' + item.addr + '</span></li>' +
                                '<li><span class="label">대표번호</span><span class="data">' + item.phone + '</span></li>' +
                                '<li><span class="label">FAX</span><span class="data">' + item.fax + '</span></li>' +
                                '<li><span class="label">영업시간</span><span class="data">' + time + '</span></li>' +
                            '</ul>' +
                            '<a href="/html/center/?center=' + item.code + '" class="golink">바로가기</a>' +
                        '</div>' +
                    '</div>' +
                '</li>';
                }
            }
            
        });

        $('.member_center .list').append(result);

        // 서비스 센터 - 아코디언
        $center_title = $('.member_center .list .item .tit');
        $center_title.click(function(){
            var $this = $(this);
            var $parent = $this.parent();
            setAllRadio(false);
            if ($parent.hasClass('on')) {
                setOnClass($parent,'remove');
                setCloseHeightSzie();
                setRadio($this, false);
            } else {
                setOnClass($('.member_center .list .item'),'remove');
                setOnClass($parent,'add');
                setCloseHeightSzie();
                setOpenHeightSize($this);
                setRadio($this, true);
            }
        })
        function setCloseHeightSzie(height){
            $('.info_wrap').css({'height': 0});
        }
        function setOpenHeightSize(obj){
            obj.next('.info_wrap').css({
                'height': obj.next('.info_wrap').find('.info_box').outerHeight()
            });
        }
        function setRadio(obj, bool){
            obj.find('input[type="radio"]').prop('checked',bool);
        }
        function setOnClass(obj,type) {
            obj[type+'Class']('on');
        }
        function setAllRadio(bool) {
            var $radio = $('.member_center .list .item .tit input[type="radio"]');
            $radio.prop('checked',bool)
        }
    });
});