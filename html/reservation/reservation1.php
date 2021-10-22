<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
	echo "<script>alert('볼보 고객만 가능한 서비스 입니다.');</script>";
	MgMoveURL('/html/member/login.php');
}

if (!isOwnered()) {
	echo "<script>alert('볼보 고객만 가능한 서비스 입니다.');history.back();</script>";
}

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

$CODE = "reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

// 전시장 지역 불러오기
$city_sql = "SELECT name, code FROM volvo_area";
$city_result = $db->fetch_array($city_sql);

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>




<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e031aed38dd1fded16e62028409f63fe"></script>

<link rel="stylesheet" href="./map.css?ver=<?=$date_code?>">

<style>
	.info_box_wrap[data-code="AJYM"]:after { display:block; content:""; width:56px; height:64px; position:absolute; right:15px; top:53px; background-image:url(/images/center/center_badge.png); background-size:100%; background-repeat:no-repeat; }

	/*.info_box_wrap.info_box_service#marker_info_17:after { display:block; content:""; width:56px; height:64px; position:absolute; right:15px; top:53px; background-image:url(/images/center/center_badge.png); background-size:100%; background-repeat:no-repeat; }*/

/*	.great_center:after { display:block; content:""; width:56px; height:64px; position:absolute; right:15px; top:53px; background:url(/images/center/center_badge.png); }*/
	/*.list_btn[onclick*="AJYM"]:after { display:block; content:"222"; }*/
</style>

<script type="text/javascript" src="./map.js?ver=<?=$date_code?>"></script>

<script>
	
	$(window).on('load',function(){

		var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
		if (varUA.indexOf("iphone")>-1||varUA.indexOf("ipad")>-1||varUA.indexOf("ipod")>-1) { 
			
			list_toggle = new Function("$('.service > li .list_btn').on('click',function(){ " +
						"if ($('.service li').find('.list_cont').is(':animated')) { return false; }" +
						"var result_info = $(this).parent().find('.list_cont').css('display'); " +
						"if(result_info == 'block'){ " +
							"$(this).parent().find('.list_cont').slideUp(function(){ " +
								"$(this).parent().removeClass('ov'); " +
							"}); " +
							"marker_info_close(); " +
						"}else if(result_info == 'none'){ " +
							"$('.service li').find('.list_cont').slideUp('200'); " +
							"$('.service li').removeClass('ov');" +
							"$(this).parent().addClass('ov'); " +
							"$(this).parent().find('.list_cont').slideDown('200'); " +
						"} " +
					"});" +
					"list_delete(); return false;")

			list_delete = function(){
					var list_total = $('.total_num').text();
					var list_total_num = Number(list_total) - 1;
					var list_length = $('.service li').length;
					$('.service > li:gt('+list_total_num+')').remove();

			}
        }
		
	});
</script>
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/reservation/reservation2.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
            <div class="page">
                <p><strong>01</strong><span>02</span></p>
            </div>
        </div>

        <!--<div id="visual">
            <img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
        </div>-->

    <div class="container">
		<div class="search">
			<div class="search_total"><span class="total_num">0</span>개의 서비스센터가 검색되었습니다</div>
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
			<div class="etc_btns">
				<div class="info_acc_center" style="opacity:0">사고수리 전문센터</div>
				<div class="btn_myposition">
					<a href="<?=$myLocationLink?>">내주변 서비스 센터 찾기</a>
				</div>
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
                <p class="info"><img src="/images/common/ico_triangle.jpg">사고수리 전문센터&nbsp;&nbsp;<span>(기준 시점: 2021년 2월)</span></p>
				<ul class="service">
					
				</ul>
			</div><!-- result_list end -->
			<form id="checkForm" action="/html/reservation/reservation3.php" method="get" >
				<!--<div class="btn_group map_btn">
					<a href="javascript:history.back();" class="btn">이전</a>
					<button type="submit" class="btn bg_color1">다음</button>
				</div>-->
				<input name="service" type="hidden" id="select_service"></input>
                <input name="sat_rest" type="hidden" id="sat_rest"></input>
			</form>
		</div>


    </div>
</div>

<!--<script src="/html/testdrive/script.js"></script>-->


<script>
    function checkValidate() {
        if (!$('#select_service').val()) {
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
</script>
<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>