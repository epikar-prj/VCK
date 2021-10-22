// calendar 함수
function Calendar(el) {

    var $el = $(el);
    var currentMonth = new Date().getMonth() + 1;
    var currentDay = new Date().getDate();

    function calendar(new_year, new_month) {
		// 특정 年月을 시작일부터 조회(year, month, date)
		var d = new Date(new_year, new_month - 1, 1),
			// 월별 일수 구하기
			d_length = 32 - new Date(new_year, new_month - 1, 32).getDate(),
			year = d.getFullYear(),
			month = d.getMonth(),
			date = d.getDate(),
			day = d.getDay();

		var before_d_length = 32 - new Date(new_year, new_month - 2, 32).getDate();
		var before_date_start = before_d_length - day + 1;

		// caption 영역 날짜 표시 객체
		var $caption_year = $el.find('.year'),
			$caption_month = $el.find('.month');
		var $start_day = $el.find('tr td');

		// 테이블 초기화

		$start_day.each(function(i) {
			if (before_date_start > before_d_length)
			{				
				$(this).html('&nbsp;');
				return;
			}
            $(this).html('');
            before_date_start++

        });
        
        var satCount = 1;
        // 한달치 날짜를 테이블에 시작 요일부터 순서대로 표시
        
		for (var i = day; i < day + d_length; i++) {
            // console.log(i, day, d_length, date, i % 7)
            if ((currentMonth == (month + 1)) && (date < currentDay)) {
                $start_day.eq(i).html(date);
                if (i % 7 == 6) {
                    satCount ++;
                }
            } else if (i % 7 == 6) {
                if (typeof sat_rest !== 'undefined') {
                    if (sat_rest == 'Y') {
                        $start_day.eq(i).html(date);
                    } else if (sat_rest == 'YN') {
                        if (satCount == 2 || satCount == 4) {
                            $start_day.eq(i).html(date);
                        } else {
                            $start_day.eq(i).html('<a href="javascript: getSelectTime(\'' + year + '-' + (month + 1) + '-' + date + '\');" data-date="' + date + '">' + date + '</a>');
                        }
                        
                    } else {
                        $start_day.eq(i).html('<a href="javascript: getSelectTime(\'' + year + '-' + (month + 1) + '-' + date + '\');" data-date="' + date + '">' + date + '</a>');
                    }
                } else {
                    $start_day.eq(i).html('<a href="javascript: getSelectTime(\'' + year + '-' + (month + 1) + '-' + date + '\');" data-date="' + date + '">' + date + '</a>');
                }
                

                satCount ++;
            } else if (i % 7 == 0) {
                $start_day.eq(i).html(date);
            } else {
                $start_day.eq(i).html('<a href="javascript: getSelectTime(\'' + year + '-' + (month + 1) + '-' + date + '\');" data-date="' + date + '">' + date + '</a>');
            }
            

            
                
			date++;
		}

		date_click();

		// caption 날짜 표시
		$caption_year.html(year);
		$caption_month.html(pad(month + 1,2));
	}

	function pad(n, width, z) {
	  z = z || '0';
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}


	var $prev = $el.find('.prev'),
		$next = $el.find('.next'),
		year = new Date().getFullYear(),
		month = new Date().getMonth() + 1;


	var select_year,
		select_month,
		select_date;


	calendar(year, month);

	$prev.click(function() {
        console.log(month, currentMonth)
        if (month > currentMonth ) {
            calendar(year, --month);
            bring_state();
        }

		

	});

	$next.click(function() {
		calendar(year, ++month);
		bring_state();
	});

	function bring_state() {
		if (month == select_month) {
			$el.find('td a[data-date="' + select_date + '"]')
				.addClass('on');
		}
	}

	function date_click() {
		$el.find('td a').click(function() {
			var t = this;
			if ($(t).hasClass('on')) {
				// $(t).removeClass('on');
			} else {
				$el.find('td a').removeClass('on');
				$(t).addClass('on');


				var fixDate = new Date(year, month-1, Number($(t).text()));

				select_year = fixDate.getFullYear();
				select_month = fixDate.getMonth()+1;
				select_date = fixDate.getDate();

				//console.log(year, month, select_date);
			}
		});
	}


	this.getSelectYear = function() {
		return select_year;
	}

	this.getSelectMonth = function() {
		return select_month;
	}

	this.getSelectDate = function() {
		return select_date;
	}
}


calendar = new Calendar('#calendar');


/*-------------------------------------------------------------------*/

function showMap(){
	document.querySelectorAll('.map').forEach(function (elem) {
		// 신청 서비스 센터 - 지도
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
}

// 서비스 센터 가져오기
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
				'<li><span class="label">홈페이지</span><a class="data" href="https://www.volvocars.com/kr/" target="_blank">' + 'https://www.volvocars.com/kr/' + '</a></li>' +
				'</ul>' +
				'<div class="map" data-lat="' + val.lat + '" data-lng="' + val.lng + '"></div>' +
				'</div>' +
				'</div>' +
				'</li>';

			$(".showroom .list").append(temp);
		});

		// 신청 서비스 센터 - 아코디언
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

$(window).on('load', function() {
	setTimeout(function(){
	$('#area').change(function(){
		$('#area').css('color','#333');
	});

	$('#area').change(function (){
		change_check = "off";
		$('.info_box_wrap').hide();
		var select = $('#area').children("option:selected").val();
		if(select == '전체'){
			service_list();
		}else{
			get_result_list('service',select,select);
		};
	});

    $('#search_input').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);

		var keyword = $('#search_input').val();
		
		if(keycode == '13'){
			var search_type = 'service';

			if(!keyword){
				alert('검색어를 입력해주세요');
				//$('#search_input').focus();
				return false;
			}

			change_check = "off";
			var select = $('#area').children("option:selected").val();

			get_result_list(search_type,keyword,select);
			map_list_show();
			marker_info_close();

			$('#search_input').blur();
		}
		event.stopPropagation();
	});

	},1000);
})