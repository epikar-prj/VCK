<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "showroom";
    $FOOTER_CODE = "buy";
    $TITLE = "전시장 안내";

    $masterCD = getMasterCD();
    $locSql = " select use_loc_service_yn from volvo_user where master_cust_cd = '{$masterCD}' ";
    $isLocation = $db->select_one($locSql);

    if (!isLogined()) {
        $myLocationLink = "javascript:myPositionAlert();";
    } else if ($isLocation == 'Y') {
		$myLocationLink = "javascript:myposition();";
    } else {
        $myLocationLink = "javascript:myPositionAlert2();";
    }

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./style.css?ver=<?=$date_code?>">
<script src="./script.js?ver=<?=$date_code?>"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e031aed38dd1fded16e62028409f63fe"></script>
<script src="./map.js?ver=<?=$date_code?>"></script>
<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/buy.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
   
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
		</div>

    </div>

</div>
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