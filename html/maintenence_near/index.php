<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "maintenence_near";
$FOOTER_CODE = "service";
$TITLE = "실시간 정비 알림";

$center_cd = $_GET["center"];
if (!$center_cd) {
    $center_cd = "AJYM";
}

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
        </div>
        <!-- 콘텐츠 시작 -->
        <div class="txt-con-wrap">
            <h5 class="txt-tit">센터 주변 가볼 만한 곳</h5>
            <div id="map"></div>
	        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e031aed38dd1fded16e62028409f63fe"></script>
            
            <div class="near-place-contents">
                <div class="np-tab">
                    <ul class="np-btn-wrap">
                        <li class="np-btn" data-rel="np-con01" onclick="NearMap.showList('1')">카페</li>
                        <li class="np-btn" data-rel="np-con02" onclick="NearMap.showList('2')">음식점</li>
                        <li class="np-btn" data-rel="np-con03" onclick="NearMap.showList('3')">기타</li>
                    </ul>
                </div>    
                <div id="n-place">
                    
                </div>
            </div>

        </div>
        <!-- 콘텐츠 끝 -->
    </div>

    <script src="/html/<?=$CODE?>/script.js?ver=20210705"></script>
    <script>

        NearMap.init('map', "<?=$center_cd?>");
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>