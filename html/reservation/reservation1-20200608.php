<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

// 전시장 지역 불러오기
$city_sql = "SELECT name, code FROM volvo_area";
$city_result = $db->fetch_array($city_sql);

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/service.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
            <div class="page">
                <p><strong>01</strong><span>03</span></p>
            </div>
        </div>

        <!--<div id="visual">
            <img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
        </div>-->

    <div class="container">
		<div class="search_zone">
			<p class="search_message">26개의 전시장이 검색되었습니다.</p>
			<div class="search_wrap">
				<div class="search_select">
					<select>
						<option>전체</option>
						<option>옵션1</option>
						<option>옵션2</option>
					</select>
				</div>
				<div class="search_text">
					<input type="text" placeholder="찾으시는 지역을 검색해보세요.">
				</div>
				<a href="#" class="search_btn mode_list">
					<img src="/images/testdrive/ico_list.png" alt="목록 보기" class="ico_list">
					<img src="/images/testdrive/ico_map.png" alt="지도 보기" class="ico_map">
				</a>
			</div>
			<div class="btn_wrap">
				<a href="#" class="find_btn">내주변 전시장 찾기</a>
			</div>
		</div>

		<form action="/html/<?=$CODE?>/reservation2.php" method="get" onsubmit="return checkValidate(this);">

			<div class="map_wrap">
				<div id="map"></div>
				<div id="map_pop">
					<h6>볼보 원주 전시장</h6>
					<p>강원도 원주시 봉화로 35-1 (단계동 1117-2)<br>
						대표번호 033-735-2900</p>
					<div class="btn_wrap">
						<a href="#" class="ico_btn"></a>
						<a href="#" class="link_btn">홈페이지</a>
						<a href="tel:123-1234-1234" class="link_btn">전화연결</a>
					</div>
					<a href="#" id="map_pop_close"></a>
				</div>
			</div>

			<div class="list_wrap">
				<ul class="list">
					<li class="item">
						<div class="tit"><input type="radio"><span>볼보 강남 대치 전시장</span><i></i></div>
						<div class="info_wrap">
							<div class="info_box">
								<div class="img_wrap"><img src="/images/member/center_sample.jpg" alt=""></div>
								<ul class="info">
									<li><span class="label">주소</span><span class="data">서울 동대문구 천호대로 373(장안동 414-6)</span></li>
									<li><span class="label">대표번호</span><span class="data">1644-0322</span></li>
									<li><span class="label">FAX</span><span class="data">02-464-5453</span></li>
									<li><span class="label">영업시간</span><span class="data">평일 9:00~21:00 / 주말, 공휴일 9:00~20:00</span></li>
								</ul>
								<a href="#" class="golink">지도에서 위치 확인</a>
							</div>
						</div>
					</li>
					<li class="item">
						<div class="tit"><input type="radio"><span>볼보 동대문 전시장</span><i></i></div>
						<div class="info_wrap">
							<div class="info_box">
								<div class="img_wrap"><img src="/images/member/center_sample.jpg" alt=""></div>
								<ul class="info">
									<li><span class="label">주소</span><span class="data">서울 동대문구 천호대로 373(장안동 414-6)</span></li>
									<li><span class="label">대표번호</span><span class="data">1644-0322</span></li>
									<li><span class="label">FAX</span><span class="data">02-464-5453</span></li>
									<li><span class="label">영업시간</span><span class="data">평일 9:00~21:00 / 주말, 공휴일 9:00~20:00</span></li>
								</ul>
								<a href="#" class="golink">지도에서 위치 확인</a>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="btn_group mt30">
				<a href="/html/footerMenu/service.php" class="btn">이전</a>
				<button type="submit" class="btn bg_color1">다음</button>
			</div>
		</form>
    </div>
</div>

<script src="/html/testdrive/script.js"></script>

<script>
// 전시장 아코디언
$center_title = $('.list_wrap .list .item .tit');
$center_title.click(function(){
	var $this = $(this);
	var $parent = $this.parent();
	setAllRadio(false);
	if ($parent.hasClass('on')) {
		setOnClass($parent,'remove');
		setCloseHeightSzie();
		setRadio($this, false);
	} else {
		setOnClass($('.list_wrap .list .item'),'remove');
		setOnClass($parent,'add');
		setCloseHeightSzie();
		setOpenHeightSize($this);
		setRadio($this, true);
	}
})
function setCloseHeightSzie(height){
	$('.list_wrap .info_wrap').css({'height': 0});
}
function setOpenHeightSize(obj){
	obj.next('.list_wrap .info_wrap').css({
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
	var $radio = $('.list_wrap .list .item .tit input[type="radio"]');
	$radio.prop('checked',bool)
}

// 리스트/지도 전환
$('.search_zone .search_btn').click(function(){
	if($(this).find('.ico_list').is(':visible')){
		$(this).find('.ico_map').show();
		$(this).find('.ico_list').hide();
		$('.map_wrap').hide();
		$('.list_wrap').fadeIn(200);
	} else {
		$(this).find('.ico_map').hide();
		$(this).find('.ico_list').show();
		$('.map_wrap').fadeIn(200);
		$('.list_wrap').hide();
	}
});

// 레이어 팝업 닫기
$('#map_pop_close').click(function(){
	$('#map_pop').fadeOut(200);
});
</script>

<script>
    function checkValidate(_form) {
        if (!_form.area.value) {
            alert("지역을 선택해주세요");
            return false;
        }

        if (!_form.showroom.value) {
            alert("전시장을 선택해주세요");
            return false;
        }
    };
</script>
<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>