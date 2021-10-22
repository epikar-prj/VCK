<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "testdrive";
    $FOOTER_CODE = "buy";
    $TITLE = "신청 전시장";

    $masterCD = getMasterCD();
    $locSql = " select use_loc_service_yn from volvo_user where master_cust_cd = '{$masterCD}' ";
    $isLocation = $db->select_one($locSql);
    
    $myLocationLink = "";

    if (!isLogined()) {
        $myLocationLink = "javascript:myPositionAlert();";
    } else if ($isLocation == 'Y') {
        $myLocationLink = "javascript:myposition();";
    } else {
        $myLocationLink = "javascript:myPositionAlert2();";
    }


    $currentPage = "02";
    $endPage = "04";

    // if (isLogined()) {
    //     $endPage = "03";
    // }

    $model = $_GET['model'];

    // 전시장 지역 불러오기
    $city_sql = "SELECT name, code FROM volvo_area";
    $city_result = $db->fetch_array($city_sql);

   include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>



<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e031aed38dd1fded16e62028409f63fe"></script>
<script type="text/javascript" src="./map.js?ver=<?=$date_code?>"></script>
<link rel="stylesheet" href="/html/testdrive/swiper.css">
<link rel="stylesheet" href="./map.css?ver=<?=$date_code?>">

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/buy.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
        <div class="page">
            <p><strong><?=$currentPage?></strong><span><?=$endPage?></span></p>
        </div>
    </div>
    
<!--    <div id="visual">
        <img src="/images/testdrive/img_visual-1.jpg" alt="">
    </div>-->
    

    <div class="container">
		<div class="search">
			<div class="search_total"><span class="total_num">0</span>개의 전시장이 검색되었습니다</div>
			<div class="search_inner">
				<div class="search_select">
					<select id="area">
						<option selected value="전체">전체</option>
						<option value="서울">서울</option>
						<option value="경기도">경기도</option>
						<option value="충청도">충청도</option>
						<option value="강원도">강원도</option>
						<option value="경상도">경상도</option>
						<option value="전라도">전라도</option>
						<option value="인천">인천</option>
						<option value="대전">대전</option>
						<option value="대구">대구</option>
						<option value="광주">광주</option>
						<option value="부산">부산</option>
						<option value="울산">울산</option>
						<option value="제주도">제주도</option>
					</select>
				</div>
				<div class="search_input">
						<input id="search_input" placeholder="찾으시는 지역을 검색해보세요" autocomplete="off"></input>
				</div>
				<div class="search_toggle">
					<a href="javascript:map_list_show();"><img src="./../../images/center/toggle_list.svg"></a>
				</div>
			</div>
			<div class="btn_myposition">
				<a href="<?=$myLocationLink?>">내주변 전시장 찾기</a>
			</div>
		</div>
		<div class="map_wrap">
			<div class="map" id="map"></div>
			<div class="btn_map_zoom">
				<div class="btn_plus">
					<a href="javascript:zoomIn();"><img src="./../../images/center/btn_zoom_plus.png"></a>
				</div>
				<div class="btn_minus">
					<a href="javascript:zoomOut();"><img src="./../../images/center/btn_zoom_minus.png"></a>
				</div>
			</div><!-- map end -->
			<div class="result_list">
				<ul class="showroom">
				</ul>
			</div><!-- result_list end -->
			<form id="checkForm" action="/html/testdrive/testdrive3.php" method="get">
				<input name="model" type="hidden" id="model" value="<?=$model?>"></input>
				<input name="showroom" type="hidden" id="select_showroom"></input>
				<div class="btn_group map_btn">
					<a href="javascript:history.back();" class="btn">이전</a>
					<!--<button type="submit" class="btn bg_color1">다음</button>-->
				</div>
			</form>
		</div>

</div>


<script>
    function checkValidate() {
        if (!$('#select_showroom').val()) {
            alert("전시장을 선택해주세요");
            return false;
	     }
		$('#checkForm').submit();
    };
</script>

<script>
function myPositionAlert() {
    var confirm = window.confirm('이 기능을 사용하시려면 로그인 후 위치서비스 이용동의를 해주세요.');
    if (confirm) {
        location.href = "/html/member/login.php?returnLoginURL=" + window.location.href;
    }
}

function myPositionAlert2() {
    alert("이 기능을 사용하시려면 회원 개인정보에서 위치정보 이용동의를 해주세요.");
}

$(window).on('load', function() {
    var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
    if (varUA.indexOf("iphone")>-1||varUA.indexOf("ipad")>-1||varUA.indexOf("ipod")>-1) { 
        
        list_toggle = new Function("$('.showroom > li .list_btn').on('click',function(){ " +
                    "if ($('.showroom li').find('.list_cont').is(':animated')) { return false; }" +
                    "var result_info = $(this).parent().find('.list_cont').css('display'); " +
                    "if(result_info == 'block'){ " +
                        "$(this).parent().find('.list_cont').slideUp(function(){ " +
                            "$(this).parent().removeClass('ov'); " +
                        "}); " +
                        "marker_info_close(); " +
                    "}else if(result_info == 'none'){ " +
                        "$('.showroom li').find('.list_cont').slideUp('200'); " +
                        "$('.showroom li').removeClass('ov');" +
                        "$(this).parent().addClass('ov'); " +
                        "$(this).parent().find('.list_cont').slideDown('200'); " +
                    "} " +
                "}); list_delete(); return false;");

        list_delete = function(){
            var list_total = $('.total_num').text();
            var list_total_num = Number(list_total) - 1;
            var list_length = $('.showroom li').length;
            $('.showroom > li:gt('+list_total_num+')').hide();

        }
	}
	
	$('#area').change(function(){
		$('#area').css('color','#333');
	});

	$('#area').change(function (){
		change_check = "off";
		$('.info_box_wrap').hide();
		var select = $('#area').children("option:selected").val();
		if(select == '전체'){
			showroom_list();
		}else{
			get_result_list('showroom',select,select);
		};
	});

	$('#search_input').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);

		var keyword = $('#search_input').val();
		
		if(keycode == '13'){
			var search_type = 'showroom';

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
})
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>