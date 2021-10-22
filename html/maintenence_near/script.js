var NearMap = new function() {
    this.mapContainerId = "";
    this.serviceCenterCode = "";
    this.serviceCenterJson = null;
    this.nearJson = [];
    this.nearMakers = [];

    this.bounds = new kakao.maps.LatLngBounds();  

    this.map = null;
    
    this.init = function(_containerId, _serviceCenterCode) {
        this.mapContainerId = _containerId;
        this.serviceCenterCode = _serviceCenterCode;
        getServiceCenterJson();
    }

    // 서비스센터 JSON 불러오기
    function getServiceCenterJson() {
        $.ajax({
            url:'/json/service.json?ver=20210705',
            dataType: 'json',
            success: function(_res){
                $.each(_res, function(index, item) {
                    if (item.code == NearMap.serviceCenterCode) {
                        console.log(item.code)
                        NearMap.serviceCenterJson = item;
                    }
                })
            }, complete: function() {
                if (NearMap.serviceCenterJson) {
                    mapInit([NearMap.serviceCenterJson.lat, NearMap.serviceCenterJson.lng]);
                    getNearJson();
                }
            }, error: function(e) {
            }
        });
    }

    // 근처 가볼만한곳 JSON 불러오기
    function getNearJson() {
        $.ajax({
            url:'/json/near.json?ver=20210705',
            dataType: 'json',
            success: function(_res){
                $.each(_res, function(index, item) {
                    
                    if (item.codes.includes(NearMap.serviceCenterCode)) {
                        NearMap.nearJson.push(item)
                    }
                })
            }, complete: function() {
                if (NearMap.nearJson.length > 0) {
                    setNearList();
                    setNearMarker();
                }
            }, error: function(e) {
            }
        });
    }

    // 근처 가볼만한곳 리스트 출력
    function setNearList(_type) {
        $("#n-place").empty();

        var temp = '<div id="near-%index%" class="item np-con np-con0%type%">' +
            '<h6 class="np-title">%name1% <small>센터에서 %distance%</small></h6>' +
            '<div class="np-con-box" style="display:none;">' +
                '<strong>%description% <em>%name2%</em></strong>' +
                '<img src="%image%">' +
                '<div class="txt-box">' +
                    '<p>%content%</p>' +
                    '<ul class="ico-list">' +
                        '<li><span class="np-ico icon01"></span>%tel%</li>' +
                        '<li><span class="np-ico icon02"></span>%addr%</li>' +
                        '<li><span class="np-ico icon03"></span>%time%</li>' +
                    '</ul>' +
                '</div>' +
            '</div>' +
        '</div>';

        $.each(NearMap.nearJson, function(index, item) {
            if (!_type) {
                var row = temp;
                row = row.replace("%index%", index);
                row = row.replace("%type%", item.type);
                row = row.replace("%name1%", item.name);
                row = row.replace("%name2%", item.name);
                row = row.replace("%distance%", calcDistance(NearMap.serviceCenterJson.lat, NearMap.serviceCenterJson.lng, item.lat, item.lng));
                row = row.replace("%description%", item.description);
                row = row.replace("%content%", item.content);
                row = row.replace("%tel%", item.tel);
                row = row.replace("%addr%", item.addr);
                row = row.replace("%time%", item.time);
                row = row.replace("%image%", item.image);

                $("#n-place").append(row);    
            } else {
                if (_type == item.type) {
                    var row = temp;
                    row = row.replace("%index%", index);
                    row = row.replace("%type%", item.type);
                    row = row.replace("%name1%", item.name);
                    row = row.replace("%name2%", item.name);
                    row = row.replace("%distance%", calcDistance(NearMap.serviceCenterJson.lat, NearMap.serviceCenterJson.lng, item.lat, item.lng));
                    row = row.replace("%description%", item.description);
                    row = row.replace("%content%", item.content);
                    row = row.replace("%tel%", item.tel);
                    row = row.replace("%addr%", item.addr);
                    row = row.replace("%time%", item.time);
                    row = row.replace("%image%", item.image);

                    $("#n-place").append(row);    
                }
            }
        })

        // addEventListener
        $('.item').on('click',function(){
            var this_visible = $(this).find('.np-con-box').css('display');
            if(this_visible == 'none'){
               $(this).find('.np-con-box').slideDown()
               $(this).siblings().find('.np-con-box').slideUp();
            }else{
                $(this).find('.np-con-box').slideUp();
            }
        });

        // 좌표간 거리 계산
        function calcDistance(lat1,lng1,lat2,lng2) {
            function deg2rad(deg) { 
                return deg * (Math.PI/180) 
            } 
            var R = 6371; // Radius of the earth in km 
            var dLat = deg2rad(lat2-lat1); // deg2rad below 
            var dLon = deg2rad(lng2-lng1); 
            var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2); 
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var d = (R * c).toFixed(2); // Distance in km 
    
            if (d < 1) {
                return (d * 1000) + "m";
            } else {
                return d + "km";
            }
        }
    }

    // 근처 가볼만한곳 마커 출력
    function setNearMarker(_type) {
        NearMap.nearMakers = [];
        NearMap.bounds = [];
        $.each(NearMap.nearJson, function(index, near) {
            if (!_type) {
                setMarker(near, index)
            } else {
                if (_type == near.type) {
                    setMarker(near, index)
                }
            }
        });
        console.log(NearMap.bounds)
        // NearMap.map.setBounds(NearMap.bounds);

        function setMarker(_near, _index) {
            var marker = new kakao.maps.Marker({
                position: new kakao.maps.LatLng(_near.lat, _near.lng),
                altitude: _index
            });
            NearMap.bounds.push(marker.position)
            NearMap.nearMakers.push(marker);
            
            // marker click event listener
            kakao.maps.event.addListener(marker, 'click', function() {
                showNearItem(_index);
            });
            marker.setMap(NearMap.map);
        }
    }

    // remove marker
    function removeMarker() {
        $.each(NearMap.nearMakers, function(index, marker) {
            marker.setMap(null);
        })
    }

    // kakao map 출력
    function mapInit(_position) {
        var mapContainer = document.getElementById(NearMap.mapContainerId), // 지도를 표시할 div 
		mapOption = { 
			center: new kakao.maps.LatLng(_position[0], _position[1]), // 지도의 중심좌표
			level: 3 // 지도의 확대 레벨 
		}; 

        NearMap.map = new kakao.maps.Map(mapContainer, mapOption);
        // console.log(map.getCenter());
        
        setServiceCenterMarker();


        function setServiceCenterMarker() {
			var imageSrc = 'https://www.volvoapp.co.kr/images/center/marker.png', // 마커이미지의 주소입니다    
				imageSize = new kakao.maps.Size(29, 42), // 마커이미지의 크기입니다
				imageOption = {offset: new kakao.maps.Point(15, 42)}; 

			var CenterImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

            var serviceCenterMarker = new kakao.maps.Marker({
				image: CenterImage,
                position: NearMap.map.getCenter(),
				zIndex: 999
            })
		
         serviceCenterMarker.setMap(NearMap.map);
        }
    }

    // 근처 가볼만한곳 item click event
    function showNearItem(_id) {
        var $nearItem = $("#near-" + _id);
        var this_visible = $nearItem.find('.np-con-box').css('display');
        if(this_visible == 'none'){
            $nearItem.find('.np-con-box').slideDown()
            $nearItem.siblings().find('.np-con-box').slideUp();
            $("#contents").animate({scrollTop: $nearItem[0].offsetTop}, 500);
        }else{
            $nearItem.find('.np-con-box').slideUp();
        }
    }

    // 탭메뉴 click event
    this.showList = function(_type) {
        $("#n-place").find(".np-con0" + _type).show();
        $("#n-place").find(".np-con").not(".np-con0" + _type).hide();
        $('.item .np-con-box').slideUp();

        $(".np-btn[data-rel="+_type+"]").addClass("active").siblings().removeClass("active");

        removeMarker();
        setNearMarker(_type);
    }
}