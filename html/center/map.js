var centerCode = '';
var centerNUm = '';
var centerLat = '';
var centerLng = '';
$(document).ready(function() {
    function getParam(sname) {
        var params = location.search.substr(location.search.indexOf("?") + 1);
        var sval = "";
        params = params.split("&");
        for (var i = 0; i < params.length; i++) {
            temp = params[i].split("=");
            if ([temp[0]] == sname) { sval = temp[1]; }
        }
        return sval;
    }

    centerCode = getParam('center');


    
});

function like_toggle(event, code){

    event.stopImmediatePropagation();
    
    var arr = app.storage.getItem('fcenter');
    
    if (arr) {
//        console.log(arr.split('|'), arr.split('|').length)
        if (arr.indexOf(code) > -1) {
            arr = arr.replace(code, '');
            arr = arr.replace("||", "|");

            var lastChar = arr.charAt(arr.length-1);

            if (lastChar == "|") {
                arr = arr.slice(0,-1); 
            }
        } else {
            if (arr.split('|').length >= 3) {
                alert("선호서비스 센터를 3개 이상 지정 할 수 없습니다.")
                return false;
            } else {
                arr += "|" + code;
            }
            
        }
        
    } else {
        arr = code;
    }

    app.storage.setItem('fcenter', arr);

	if( $(event.target).hasClass('check') ){
		$(event.target).removeClass('check');
	} else {
        $(event.target).addClass('check');	
    }
}

function search_map(){
	var keyword = $('#search_input').val();

	var search_type = 'service';
	if(!keyword){
		alert('검색어를 입력해주세요');
		//$('#search_input').focus();
		return false;
	}

	change_check = "off";
	var select = $('#search_location').children("option:selected").val();
	get_result_list(search_type,keyword,select);

	$('#search_input').blur();
}


function map_list_close(){
	$('.search_total').slideUp();
	$('.map_wrap .result_list').slideUp();
	$('.etc_btns .info_acc_center').css('opacity','1');
	$('.search .search_inner .search_toggle a').attr('href','javascript:map_list_show()');
	$('.search .search_inner .search_toggle a img').attr('src','./../../images/center/toggle_list.svg');
	$('.map_wrap').css('height','calc(100vh - 159px)');
};

function map_list_show(){
	$('.search_total').slideDown();
	$('.etc_btns .info_acc_center').css('opacity','0');
	setTimeout(function(){
		var check_ov_list = $('ul.service li.ov').position();
		if(check_ov_list){
			var check_ov_list_top = check_ov_list.top + 5;
			$('.result_list').animate({scrollTop:check_ov_list_top},'200');
		}
	},500);

	$('.search_toggle a').attr('href','javascript:map_list_close()');
	$('.search .search_inner .search_toggle a img').attr('src','./../../images/center/toggle_map.svg');
	$('.map_wrap .result_list').slideDown('400',function(){
		$('.map_wrap').css('height','calc(100vh - 188px)');
	});
}

function service_list(){

	$('search#search_location option').removeAttr('selected');
	$('search#search_location option[value="전체"]').prop('selected',true);

	var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
		mapOption = { 
			center: new kakao.maps.LatLng(36.119975, 127.477558), // 지도의 중심좌표
			level: 12 // 지도의 확대 레벨 
		}; 

	map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

	get_result_list('service','');

	map_zoom_change();

	$('.info_acc_center').css('opacity','1');

}

function setMarkers(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
    setTimeout(function() {
        if (centerCode) {
//            console.log(centerNum)
           // marker_click_to_list(centerNUm,centerLat,centerLng);
             marker_info2(centerNum,centerLat,centerLng);
        }
    }, 0)
}

function marker_info_close(num) {
	//overlay.setMap(null);     
	$('#marker_info_'+num+'').hide();
//	console.log(num);
	if(num == undefined){
//		console.log('close');
//		$('.info_box_wrap').hide();
	}
	$('#select_service').val('');

	$('.service').find('.list_cont').slideUp(function(){
		$('.service li').removeClass('ov');
	});
	$('#select_service').val('');
}

function setZoomable(zoomable) {
    // 마우스 휠로 지도 확대,축소 가능여부를 설정합니다
    map.setZoomable(zoomable);    
}

function zoomIn() {        
    // 현재 지도의 레벨을 얻어옵니다
    var level = map.getLevel();
    
    // 지도를 1레벨 내립니다 (지도가 확대됩니다)
    map.setLevel(level - 1);
}    

function zoomOut() {    
    // 현재 지도의 레벨을 얻어옵니다
    var level = map.getLevel(); 
    
    // 지도를 1레벨 올립니다 (지도가 축소됩니다)
    map.setLevel(level + 1);
}    

function map_filter_marker(){
    var bounds = map.getBounds();
    var swLatLng = bounds.getSouthWest(); 
    var neLatLng = bounds.getNorthEast(); 
    var boundsStr = bounds.toString();
	var search_type = $('.search_type').text();
	var select = $('.search_input select').children("option:selected").val();
	zoom_result_list(search_type,select,swLatLng.getLat(),swLatLng.getLng(),neLatLng.getLat(),neLatLng.getLng());
}



function myposition(){
//	console.log('myposition');
//	console.log(myposition_check);
	if (navigator.geolocation) {
		// GeoLocation을 이용해서 접속 위치를 얻어옵니다
		navigator.geolocation.getCurrentPosition(function(position) {
			
			var lat = position.coords.latitude, // 위도
				lng = position.coords.longitude; // 경도
			
			var locPosition = new kakao.maps.LatLng(lat, lng);
			change_check = "on";	
			// 마커와 인포윈도우를 표시합니다
   			map.setLevel(8); 
			map.setCenter(locPosition);
			//map.panTo(locPosition);

			setTimeout(function(){
				map_filter_marker();
				myposition_check = "on";
				//console.log(myposition_check);
				},300);
				
		  }, showError);

		  //mview_list_show();

	}

	function showError(error) {
	  switch(error.code) {
		case error.PERMISSION_DENIED:
		  alert('위치 확인 서비스에 권한이 필요한 서비스입니다')
		  break;
		case error.POSITION_UNAVAILABLE:
		  alert('위치 확인 서비스에 권한이 필요한 서비스입니다')
		  break;
		case error.TIMEOUT:
		  alert('위치 확인 서비스에 권한이 필요한 서비스입니다')
		  break;
		case error.UNKNOWN_ERROR:
		  alert('위치 확인 서비스에 권한이 필요한 서비스입니다')
		  break;
	  }
	}

}

function myPositionApp(lat, lng) {
//	console.log("myPostionApp")
	var locPosition = new kakao.maps.LatLng(lat, lng);
	change_check = "on";	
	// 마커와 인포윈도우를 표시합니다
	map.setLevel(8); 
	map.setCenter(locPosition);
	//map.panTo(locPosition);

	setTimeout(function(){
		map_filter_marker();
		myposition_check = "on";
		//console.log(myposition_check);
	},300);
}

function map_zoom_change(){

	var zoomControl = new kakao.maps.ZoomControl();
	//map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

	// 지도가 확대 또는 축소되면 마지막 파라미터로 넘어온 함수를 호출하도록 이벤트를 등록합니다
	kakao.maps.event.addListener(map, 'zoom_changed', function() {        
		
		// 지도의 현재 레벨을 얻어옵니다
		var level = map.getLevel();
		//console.log(level);
		if(change_check == "on"){
			map_filter_marker();		
		}

		//change_check = "on";
		//console.log(change_check);
		$('#search_input').val('');
	});

	kakao.maps.event.addListener(map, 'dragend', function() {        
		// 지도의 현재 레벨을 얻어옵니다
		var level = map.getLevel();
		//console.log(level);
		if(change_check == "on"){
			map_filter_marker();		
		}
		change_check = "on";
		$('#search_input').val('');
	});


}
 

function marker_click_to_list(num,lat,lng){

//	console.log(num);
	//console.log(num);
	$('.info_box_wrap').hide();

	$('ul.service li').removeClass('ov');
	$('ul.service li').find('.list_cont').slideUp('100');

	setTimeout(function(){
		//console.log(winW);
			var position = $('ul.service li.list_'+num+'').position();
			var position_top = position.top + 5 ;
			$('.result_list').animate({scrollTop:position_top},'200');

		$('ul.service').find('.list_'+num+'').addClass('ov');
		$('ul.service').find('.list_'+num+'').find('.list_cont').slideDown('300');
	},500);



    list_click_to_marker(num,lat,lng);

	var level = map.getLevel();
	//console.log(level);
		switch(level) {
		  case 14:
			var lat_m = Number(lat) + 1.2;
			break;
		  case 13:
			var lat_m = Number(lat) + .6;
			break;
		  case 12:
			var lat_m = Number(lat) + .3;
			break;
		  case 11:
			var lat_m = Number(lat) + .15;
			break;
		  case 10:
			var lat_m = Number(lat) + .075;
			break;
		  case 9:
			var lat_m = Number(lat) + .0375;
			break;
		  case 8:
			var lat_m = Number(lat) + .01875;
			break;
		  case 7:
			var lat_m = Number(lat) + .009375;
			break;
		  case 6:
			var lat_m = Number(lat) + .0046875;
			break;
		  case 5:
			var lat_m = Number(lat) + .00234375;
			break;
		  case 4:
			var lat_m = Number(lat) + .001171875;
			break;
		  case 3:
			var lat_m = Number(lat) + .0005859375;
			break;
		  case 2:
			var lat_m = Number(lat) + .00029296875;
			break;
		  case 1:
			var lat_m = Number(lat) + .00014648438;
			break;
		  default:
			lat_m = Number(lat) + 1.2;
		}
		
		var locPosition = new kakao.maps.LatLng(lat_m, lng);
		map.panTo(locPosition);


    //mview_list_show();
//	bdi_resizeIframe();
}




function list_toggle(){

	$('.service > li .list_btn').on('click',function(){
		var result_info = $(this).parent().find('.list_cont').css('display');
		
		if(result_info == 'block'){
			$(this).parent().find('.list_cont').slideUp(function(){
				$(this).parent().removeClass('ov');
			});
			marker_info_close();
		}else if(result_info == 'none'){
			 $('.service li').find('.list_cont').slideUp('200');
 			 $('.service li').removeClass('ov');			 
			 $(this).parent().addClass('ov');			 
			 $(this).parent().find('.list_cont').slideDown('200');	
		}
	});
}

function list_click_to_marker(num,lat,lng){

	var name = $('.list_'+num+'').find('.title').text();
	var locPosition = new kakao.maps.LatLng(lat, lng);
	$('.info_box_wrap').hide();

	//$("img[src|='https://www.volvoapp.co.kr/images/center/clickmarker.png']").parent().css('margin','-42px 0px 0px -15px');
	//$("img[src|='https://www.volvoapp.co.kr/images/center/clickmarker.png']").parent().css('z-index','0');
	//$("img[src|='https://www.volvoapp.co.kr/images/center/clickmarker.png']").css('clip','rect(0px, 29px, 42px, 0px)');
	//$("img[src|='https://www.volvoapp.co.kr/images/center/clickmarker.png']").css('width','29px');
	//$("img[src|='https://www.volvoapp.co.kr/images/center/clickmarker.png']").css('height','42px');
	//$("img[src|='https://www.volvoapp.co.kr/images/center/clickmarker.png']").attr('src','https://www.volvoapp.co.kr/images/center/marker.png');

		
		setTimeout(function(){
		//	$("img[title|='"+name+"']").parent().css('z-index','1');
			var position = $('ul.service li.list_'+num+'').position();
			var position_top = position.top + 5 ;
			$('.result_list').animate({scrollTop:position_top},'200');
		},400);

		var result_info = $('li.list_'+num+'').find('.list_cont').css('display');

		if(result_info == 'none'){
			setTimeout(function(){
				marker_info(num);
			},700);
		}		

		//$("img[title|='"+name+"']").attr('src','https://www.volvoapp.co.kr/images/center/clickmarker.png');	
		//$("img[title|='"+name+"']").parent().css('margin','-48px 0px 0px -17px');
		//$("img[title|='"+name+"']").css('clip','rect(0px, 33px, 48px, 0px)');
		//$("img[title|='"+name+"']").css('width','33px');
		//$("img[title|='"+name+"']").css('height','48px');

		var	lat_m = Number(lat) + 1;

		var level = map.getLevel();
		switch(level) {
		  case 14:
			var lat_m = Number(lat) + 1.2;
			break;
		  case 13:
			var lat_m = Number(lat) + .6;
			break;
		  case 12:
			var lat_m = Number(lat) + .3;
			break;
		  case 11:
			var lat_m = Number(lat) + .15;
			break;
		  case 10:
			var lat_m = Number(lat) + .075;
			break;
		  case 9:
			var lat_m = Number(lat) + .0375;
			break;
		  case 8:
			var lat_m = Number(lat) + .01875;
			break;
		  case 7:
			var lat_m = Number(lat) + .009375;
			break;
		  case 6:
			var lat_m = Number(lat) + .0046875;
			break;
		  case 5:
			var lat_m = Number(lat) + .00234375;
			break;
		  case 4:
			var lat_m = Number(lat) + .001171875;
			break;
		  case 3:
			var lat_m = Number(lat) + .0005859375;
			break;
		  case 2:
			var lat_m = Number(lat) + .00029296875;
			break;
		  case 1:
			var lat_m = Number(lat) + .00014648438;
			break;
		  default:
			lat_m = Number(lat) + 1.2;
		}
		
		var locPosition = new kakao.maps.LatLng(lat_m, lng);
		map.panTo(locPosition);

}

function marker_info(num) {

	$('.info_box_wrap').hide();
	//$('.info_box_wrap').parent().css('z-index','10');
	$('#marker_info_'+num+'').show();
}

function marker_info2(num, lat, lng) {

    var locPosition = new kakao.maps.LatLng(lat, lng);

    var level = map.getLevel();
	//console.log(level);
		switch(level) {
		  case 14:
			var lat_m = Number(lat) + 1.2;
			break;
		  case 13:
			var lat_m = Number(lat) + .6;
			break;
		  case 12:
			var lat_m = Number(lat) + .3;
			break;
		  case 11:
			var lat_m = Number(lat) + .15;
			break;
		  case 10:
			var lat_m = Number(lat) + .075;
			break;
		  case 9:
			var lat_m = Number(lat) + .0375;
			break;
		  case 8:
			var lat_m = Number(lat) + .01875;
			break;
		  case 7:
			var lat_m = Number(lat) + .009375;
			break;
		  case 6:
			var lat_m = Number(lat) + .0046875;
			break;
		  case 5:
			var lat_m = Number(lat) + .00234375;
			break;
		  case 4:
			var lat_m = Number(lat) + .001171875;
			break;
		  case 3:
			var lat_m = Number(lat) + .0005859375;
			break;
		  case 2:
			var lat_m = Number(lat) + .00029296875;
			break;
		  case 1:
			var lat_m = Number(lat) + .00014648438;
			break;
		  default:
			lat_m = Number(lat) + 1.2;
		}
		
		var locPosition = new kakao.maps.LatLng(lat_m, lng);
		map.panTo(locPosition);

	$('.info_box_wrap').hide();
	$('.info_box_wrap').parent().css('z-index','10');
//    console.log(num)
	$('#marker_info_'+num+'').show();
}



function get_result_list(type,keyword,select){
	var result;
	var result_list = $('ul.service');
	result_list.html('');
	var json_url = "./../../json/service.json?ver=20210701-02";

    var favorite = app.storage.getItem('fcenter');
    
	$.getJSON(json_url, function(data){
        var bounds = new kakao.maps.LatLngBounds();

        setMarkers(null);
        markers = [];
        var points = [];

        
		
//		$('.info_box_wrap').remove();

		if(keyword == ""){
			var i = 0;
			var index = 0;
			$.each(data, function(i, item){

				if(item.img != ""){
					var showroom_img = '<div class="showroom_img"><img src="./../center/images/showroom/showroom_img_'+item.img+'.jpg"></div>';
				}else {
					var showroom_img = "";
				}
				var time = ''+item.time_1+' / '+item.time_2+'';
				
				i = i + 1;
                index = index + 1;
                
                var check = '';
                if (favorite) {
                    if (favorite.indexOf(item.code) > -1) {
//                        console.log(item.code)
                        check = ' class="check"';
                    }
                }
                

				result = '<li class="list_'+ i +' '+item.type+'" data-code="' + item.code + '">\
							<div class="list_btn" onclick="list_click_to_marker('+i+','+item.lat+','+item.lng+',\''+item.code+'\')">\
								<div class="title">'+ item.name +'</div>\
								<div class="btn_like"><a' + check + ' href="javascript:void(0);" onclick="like_toggle(event, \'' + item.code + '\');"></a></div>\
							</div> \
							<div class="list_cont">\
								'+ showroom_img +'\
								<div class="detail_cont">\
									<ul>\
										<li><em>주소</em><span>'+ item.addr +'</span></li>\
										<li><em>대표번호</em><span>'+ item.phone +'</span></li>\
										<li><em>FAX</em><span>'+ item.fax +'</span></li>\
										<li><em>영업시간</em><span>'+ time +'</span></li>\
									</ul>\
								</div>\
							<div class="btn_close"><a href="javascript:map_list_close();">지도에서 위치 확인</a></div>\
							</div>\
						</li>'
				result_list.append(result);
				if(item.fax == ""){
					$('li.list_'+i+' .fax').remove();
				}
				
				$('span.total_num').html(index);
				
				var content = '<div class="info_box_wrap info_box_'+type+'" id="marker_info_'+i+'" data-code="' + item.code + '">' + 
							'    <div class="info">' + 
							'        <div class="close" onclick="marker_info_close('+i+');" title="닫기"></div>' + 
							'        <div class="title">' + 
							'            '+item.name+'' + 
							'        </div>' + 
							'        <div class="body">' + 
							'            <div class="desc">' + 
							'                <div class="addr">'+item.addr+'</div>' + 
							'                <div class="contact">대표번호&nbsp;&nbsp;'+item.phone+'</div>' + 
							'            </div>' + 
							'            <ul class="btns">' + 
							'				<li class="btn_kakao"><a href="https://map.kakao.com/link/map/'+ item.name +','+ item.lat +','+ item.lng +'" target="_blank"></a></li>' + 
                            '				<li class="btn_homepage"><a href="'+item.site+'" target="_blank">홈페이지</a></li>' +
							'				<li class="btn_call"><a href="tel:'+item.phone+'">전화연결</a></li>' +
                            '				<li class="btn_reservation"><a href="/html/reservation/reservation2.php">예약하기</a></li>' +
							'            </ul>' +
							'        </div>' + 
							'    </div>' +    
							'</div>';				

				var lat = item.lat, // 위도
                    lng = item.lng; // 경도
                
				var imageSrc;
				if(item.type == 'acc'){
				    imageSrc = 'https://www.volvoapp.co.kr/images/center/marker_acc.png', // 마커이미지의 주소입니다    
					imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
					imageOption = {offset: new kakao.maps.Point(15, 42)}; 
				}else{
					imageSrc = 'https://www.volvoapp.co.kr/images/center/marker.png', // 마커이미지의 주소입니다
					imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
					imageOption = {offset: new kakao.maps.Point(15, 42)}; 	
				}

				var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

				var markerPosition  = new kakao.maps.LatLng(lat, lng); 

				var marker = new kakao.maps.Marker({
					position: markerPosition,
					clickable: true,
					title: item.name,
					zIndex:item.zindex, 
					image: markerImage
                });

				var overlay = new kakao.maps.CustomOverlay({
					content: content,
					map: map,
					zIndex: 50,
					position: markerPosition
				});


                bounds.extend(new kakao.maps.LatLng(lat, lng));
                
                marker.setMap(map);

				kakao.maps.event.addListener(marker, 'click', function() {
					  //infowindow.open(map, marker);  
					  marker_click_to_list(i,item.lat,item.lng);
					  marker_info(i);
				});
                markers.push(marker);

                if (centerCode == item.code) {
                    centerNum = i;
                    centerLat = item.lat;
                    centerLng = item.lng
//                    console.log("a", centerNum);
                }

            });
            
		}else{
		//if(keyword != "" ){
			var i = 0;
			var index = 0;
			$.each(data, function(i, item){
				//console.log(item.keyword);
				var match_name = item.name;
				var match_city = item.city;
				var match_addr = item.addr;
				var match_keyword = item.keyword;
//				console.log(match_keyword);
				if(select == "전체"){
					select = "";
				}
				if(keyword == "대구" && match_addr.match("해운대")){
					return false;
				}
				if( match_keyword.indexOf(select) != -1|| match_addr.match(select)|| match_city.match(select)){

					if( match_name.match(keyword) || match_addr.match(keyword) || match_city.match(keyword)|| match_keyword.indexOf(keyword) != -1){
						i = i + 1;
						index = index + 1;
						if(item.img != ""){
							var showroom_img = '<div class="showroom_img"><img src="./../center/images/showroom/showroom_img_'+item.img+'.jpg"></div>';
						}else {
							var showroom_img = "";
						}
						var time = ''+item.time_1+' / '+item.time_2+'';
                        
                        var check = '';
                        if (favorite) {
                            if (favorite.indexOf(item.code) > -1) {
//                                console.log(item.code)
                                check = ' class="check"';
                            }
                        }


						result = '<li class="list_'+ i +' '+item.type+'" data-code="' + item.code + '">\
									<div class="list_btn" onclick="list_click_to_marker('+i+','+item.lat+','+item.lng+',\''+item.code+'\')">\
										<div class="title">'+ item.name +'</div>\
										<div class="btn_like"><a' + check + ' href="javascript:void(0);" onclick="like_toggle(event, \'' + item.code + '\');"></a></div>\
									</div> \
									<div class="list_cont">\
										'+ showroom_img +'\
										<div class="detail_cont">\
											<ul>\
												<li><em>주소</em><span>'+ item.addr +'</span></li>\
												<li><em>대표번호</em><span>'+ item.phone +'</span></li>\
												<li><em>FAX</em><span>'+ item.fax +'</span></li>\
												<li><em>영업시간</em><span>'+ time +'</span></li>\
											</ul>\
										</div>\
									<div class="btn_close"><a href="javascript:map_list_close();">지도에서 위치 확인</a></div>\
									</div>\
								</li>'
						result_list.append(result);
						if(item.fax == ""){
							$('li.list_'+i+' .fax').remove();
						}
						$('span.total_num').html(index);
						

						var lat = item.lat, // 위도
							lng = item.lng; // 경도

						var content = '<div class="info_box_wrap info_box_'+type+'" id="marker_info_'+i+'" data-code="' + item.code + '">' + 
									'    <div class="info">' + 
									'        <div class="close" onclick="marker_info_close('+i+');" title="닫기"></div>' + 
									'        <div class="title">' + 
									'            '+item.name+'' + 
									'        </div>' + 
									'        <div class="body">' + 
									'            <div class="desc">' + 
									'                <div class="addr">'+item.addr+'</div>' + 
									'                <div class="contact">대표번호&nbsp;&nbsp;'+item.phone+'</div>' + 
									'            </div>' + 
									'            <ul class="btns">' + 
									'				<li class="btn_kakao"><a href="https://map.kakao.com/link/map/'+ item.name +','+ item.lat +','+ item.lng +'" target="_blank"></a></li>' + 
									'				<li class="btn_homepage"><a href="'+item.site+'" target="_blank">홈페이지</a></li>' +
									'				<li class="btn_call"><a href="tel:'+item.phone+'">전화연결</a></li>' +
									'				<li class="btn_reservation"><a href="/html/reservation/reservation2.php">예약하기</a></li>' +
									'            </ul>' +
									'        </div>' + 
									'    </div>' +    
									'</div>';		
						
						var imageSrc;
						if(item.type == 'acc'){
							imageSrc = 'https://www.volvoapp.co.kr/images/center/marker_acc.png', // 마커이미지의 주소입니다    
							imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
							imageOption = {offset: new kakao.maps.Point(15, 42)}; 
						}else{
							imageSrc = 'https://www.volvoapp.co.kr/images/center/marker.png', // 마커이미지의 주소입니다
							imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
							imageOption = {offset: new kakao.maps.Point(15, 42)}; 	
						}

						var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

						var markerPosition  = new kakao.maps.LatLng(lat, lng); 

						var marker = new kakao.maps.Marker({
							position: markerPosition,
							clickable: true,
							title: item.name,
							zIndex: item.zindex,
							image: markerImage
						});

						var overlay = new kakao.maps.CustomOverlay({
							content: content,
							map: map,
							zIndex: 50,
							position: markerPosition
						});

						bounds.extend(new kakao.maps.LatLng(lat, lng));

						kakao.maps.event.addListener(marker, 'click', function() {
							  //infowindow.open(map, marker);  
							  marker_click_to_list(i,item.lat,item.lng);
							  marker_info(i);
						});
						markers.push(marker);	


						//change_check = "off";
					}
					change_check = "off";
				}

			})
		}

		list_toggle();
        setMarkers(map);


		if(index == 0){
			$('ul.service').html('<li class="no_result">해당 지역에는 서비스 센터가 없습니다.<br>검색어를 다시 입력하거나, 지도를 조정 해주세요.<a class="btn_reload_map" href="javascript:map_list_close();">지도 보기</a></li>');
			//mview_list_show();
			$('span.total_num').html(index);
			change_check = "on";
		}else{
			map.setBounds(bounds);				

			if(index < 2){
//				console.log('ok');	
				$('ul.service li:nth-child(1)').addClass('ov');
				$('ul.service li:nth-child(1) .list_cont').slideDown('300');		

				resize_check = "off";
				map.setLevel(8);
			}else if(index < 3){
				resize_check = "off";
	
			}

		}
	});

}


function zoom_result_list(type,select,swlat,swlng,nelat,nelng){
				//if( nelat > item.lat && swlat < item.lat && nelng > item.lng && swlng < item.lng ){
	marker_info_close();
	if(resize_check == "off"){
		resize_check = "on";
		return false;
	}
	var result;
	var result_list = $('ul.service');

	var json_url = "./../../json/service.json?ver=20210701-02";

    var favorite = app.storage.getItem('fcenter');
	
	$.getJSON(json_url, function(data){
		result_list.html('');
        var bounds = new kakao.maps.LatLngBounds();

        setMarkers(null);
        markers = [];
        var points = [];

		var i = 0;
		var index = 0;

		$.each(data, function(i, item){
			var match_name = item.name;
			var match_city = item.city;
			var match_addr = item.addr;
			var match_keyword = item.keyword;
			if(select == "전체"){
				select = "";
			}
			if( match_keyword.indexOf(select) != -1 || match_addr.match(select)|| match_city.match(select)){
			if( nelat > item.lat && swlat < item.lat && nelng > item.lng && swlng < item.lng ){
				i = i + 1;
				index = index + 1;
//				console.log(i);
				if(item.img != ""){
					var showroom_img = '<div class="showroom_img"><img src="./../center/images/showroom/showroom_img_'+item.img+'.jpg"></div>';
				}else {
					var showroom_img = "";
				}
				var time = ''+item.time_1+' / '+item.time_2+'';

                var check = '';
                if (favorite) {
                    if (favorite.indexOf(item.code) > -1) {
//                        console.log(item.code)
                        check = ' class="check"';
                    }
                }

				result = '<li class="list_'+ i +' '+item.type+'" data-code="' + item.code + '">\
							<div class="list_btn" onclick="list_click_to_marker('+i+','+item.lat+','+item.lng+',\''+item.code+'\')">\
								<div class="title">'+ item.name +'</div>\
								<div class="btn_like"><a' + check + ' href="javascript:void(0);" onclick="like_toggle(event, \'' + item.code + '\');"></a></div>\
							</div> \
							<div class="list_cont">\
								'+ showroom_img +'\
								<div class="detail_cont">\
									<ul>\
										<li><em>주소</em><span>'+ item.addr +'</span></li>\
										<li><em>대표번호</em><span>'+ item.phone +'</span></li>\
										<li><em>FAX</em><span>'+ item.fax +'</span></li>\
										<li><em>영업시간</em><span>'+ time +'</span></li>\
									</ul>\
								</div>\
							<div class="btn_close"><a href="javascript:map_list_close();">지도에서 위치 확인</a></div>\
							</div>\
						</li>'
				result_list.append(result);
				if(item.fax == ""){
					$('li.list_'+i+' .fax').remove();
				}
				
				$('span.total_num').html(index);

				var lat = item.lat, // 위도
					lng = item.lng; // 경도

				var content = '<div class="info_box_wrap info_box_'+type+'" id="marker_info_'+i+'" data-code="' + item.code + '">' + 
							'    <div class="info">' + 
							'        <div class="close" onclick="marker_info_close('+i+');" title="닫기"></div>' + 
							'        <div class="title">' + 
							'            '+item.name+'' + 
							'        </div>' + 
							'        <div class="body">' + 
							'            <div class="desc">' + 
							'                <div class="addr">'+item.addr+'</div>' + 
							'                <div class="contact">대표번호&nbsp;&nbsp;'+item.phone+'</div>' + 
							'            </div>' + 
							'            <ul class="btns">' + 
							'				<li class="btn_kakao"><a href="https://map.kakao.com/link/map/'+ item.name +','+ item.lat +','+ item.lng +'" target="_blank"></a></li>' + 
                            '				<li class="btn_homepage"><a href="'+item.site+'" target="_blank">홈페이지</a></li>' +
							'				<li class="btn_call"><a href="tel:'+item.phone+'">전화연결</a></li>' +
                            '				<li class="btn_reservation"><a href="/html/reservation/reservation2.php">예약하기</a></li>' +
							'            </ul>' +
							'        </div>' + 
							'    </div>' +    
							'</div>';		

				var imageSrc;
				if(item.type == 'acc'){
				    imageSrc = 'https://www.volvoapp.co.kr/images/center/marker_acc.png', // 마커이미지의 주소입니다    
					imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
					imageOption = {offset: new kakao.maps.Point(15, 42)}; 
				}else{
					imageSrc = 'https://www.volvoapp.co.kr/images/center/marker.png', // 마커이미지의 주소입니다
					imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
					imageOption = {offset: new kakao.maps.Point(15, 42)}; 	
				}

				var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

				var markerPosition  = new kakao.maps.LatLng(lat, lng); 

				var marker = new kakao.maps.Marker({
					position: markerPosition,
					clickable: true,
					title: item.name,
					zIndex: item.zindex,
					image: markerImage
                });

				var overlay = new kakao.maps.CustomOverlay({
					content: content,
					map: map,
					zIndex: 50,
					position: markerPosition
				});
                
                bounds.extend(new kakao.maps.LatLng(lat, lng));
                
                marker.setMap(map);

				kakao.maps.event.addListener(marker, 'click', function() {
					  //infowindow.open(map, marker);  
					  marker_click_to_list(i,item.lat,item.lng);
					  marker_info(i);
				});

                markers.push(marker);

				//return index;

            }
			}
            
		});

		list_toggle();
        setMarkers(map);

		if(index < 2){

/*			$('ul.service li:nth-child(1)').addClass('ov');
			$('ul.service li:nth-child(1) .info').slideDown('300');		*/
			/*if(type == 'service'){
				var list_height = $('#marker_info_close_new').height();
				$('ul.service').css('min-height',list_height - 86);
			}else{
				var list_height = $('#marker_info_close_new').height();
				$('ul.service').css('min-height',list_height - 188);				
			};*/
/*			setTimeout(function(){
				marker_info(num);
			},700);*/

		}
		//console.log(index);
		if(index == 0){

			$('ul.service').html('<li class="no_result">해당 지역에는 서비스 센터가 없습니다.<br>검색어를 다시 입력하거나, 지도를 조정 해주세요.<a class="btn_reload_map" href="javascript:map_list_close();">지도 보기</a></li>');
			$('span.total_num').html(index);
			/*if(type == 'service'){
				var list_height = $('#marker_info_close_new').height();
				$('ul.service').css('min-height',list_height - 86);
			}else{
				var list_height = $('#marker_info_close_new').height();
				$('ul.service').css('min-height',list_height - 188);				
			};*/

			if(myposition_check == "on"){
//				mview_list_show();
				map_list_show();
				myposition_check = "off";
			}
			change_check = "on";
		}
	
	});

}


