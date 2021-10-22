<?
$master_cust_cd = $_COOKIE['master_cust_cd'];

$sql = " select * from volvo_send_push_repair where master_cust_cd = '{$master_cust_cd}' and car_no <> '' and repair_step = 'out_vehicle' and regdate > '2021-03-19 00:00:00' order by enter_time desc limit 0, 1  ";
$surveyRow = $db->fetch_array($sql)[0];

$surveyLink = "";
if (count($surveyRow) > 0) {
    $surveyLink = "https://sv2.esurvey.kr/vcka/in.asp?master_cust_cd=".urlencode($master_cust_cd)."&model=".urlencode($surveyRow["model"])."&delivery_date=".urlencode($surveyRow["delivery_date"])."&warranty_check=".urlencode($surveyRow["warranty_check"])."&pst_img=".urlencode($surveyRow["pst_img"])."&pst_id=".urlencode($surveyRow["pst_id"])."&pst_name=".urlencode($surveyRow["pst_name"])."&center_name=".urlencode($surveyRow["center_name"])."&service_center=".urlencode($surveyRow["service_center"])."&enter_time=".urlencode($surveyRow["enter_time"])."&free=".urlencode($surveyRow["free"]);
    $surveyTarget = "_blank";
} else {
    $surveyLink = "javascript: alert('고객님은 이번 설문 대상자가 아닙니다');";
    $surveyTarget = "";
}
?>
<!DOCTYPE html>
<!-- <html manifest="/appcache.manifest"> -->
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover" />

    <title>VOLVO APP</title>

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/common.js?ver=<?=$date_code?>"></script>
    <script src="/js/animsition.min.js"></script>
    
   <!-- <? if ($CODE == 'testdrive' || $CODE == 'reservation' ) {?>
    <script src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=e6337d075bac312a03c730c6ac9f07ba"></script>
    <? } ?>-->
    
    <link rel="stylesheet" href="/css/reset.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/font.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/common.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/animsition.min.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/html/header/header.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/html/footer/footer.css?ver=<?=$date_code?>">
	<script>
		$(window).on('load',function(){
		   var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
			if ( varUA.indexOf("iphone") > -1||varUA.indexOf("ipad") > -1||varUA.indexOf("ipod") > -1 ) {
				$('#wrap').addClass('check_wrap_ios');
			}
		});
	</script> 
    <? echo '<link rel="stylesheet" href="/html/' . $CODE . '/style.css?ver=' . $date_code . '">'; ?>
</head>
<body>

<div id="wrap" class="<?=$CODE?> animsition">
    <header>
        <div id="header_wrap">
            <div class="header_left">
                <div id="logo">
                    <a href="/index.php" class="animsition-link"><img src="/images/common/volvo-wordmark-black.svg" alt=""></a>
                </div>
            </div>
            <div class="header_right">
                <div id="support">
                    <a href="javascript: void(0)" onclick="app.toggleMenu2()">Support</a>
                </div>
                <div id="menu">
                    <a href="javascript: void(0)" onclick="app.toggleMenu()"><i></i></a>
                </div>
            </div>
        </div>

        <div id="menu_wrap">
            <div class="list">
                <ul>
                    <li>
                        <a href="/html/member/member_menu.php">My Volvo</a>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Buy</a>
                        <ul>
                            <li><a href="/html/cars/index.php">Cars</a></li>
                            <li><a href="/html/testdrive/testdrive1.php">시승신청</a></li>
                            <li><a href="/html/showroom/">전시장 안내</a></li>
                            <li><a href="/html/selekt/index.php">인증 중고차</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Service</a>
                        <ul>
                            <li><a href="/html/center/">서비스 센터 안내</a></li>
                            <li><a href="/html/reservation/reservation2.php" data-type="owner">서비스 센터 예약</a></li>
                            <li><a href="/html/reservation_list/list.php" data-type="owner">서비스 센터 예약 관리</a></li>
                            <li><a href="/html/maintenence_check/index.php" data-type="owner">실시간 정비 알림</a></li>
                            <li><a href="/html/maintenence_record/record1.php" data-type="owner">정비 이력</a></li>
							<li><a href="/html/warranty/index.php">평생 부품 보증</a></li>
                            <li><a href="https://www.car.go.kr/home/main.do" target="_blank">리콜 조회</a></li>
                            <!-- <li><a href="<?=$surveyLink?>" target="<?=$surveyTarget?>">Survey</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Program</a>
                        <ul>
                            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
							<li><a href="/html/promotion/hejKlass_list.php" data-type="owner">Hej, Klass</a></li>
                            <li><a href="/html/event/">Event</a></li>
							<li><a href="/html/promotion/gift.php">계약 고객 프로그램</a></li> 
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Support</a>
                        <ul>
                            <li><a href="/html/warning/index.php">경고등안내</a></li>
                            <li><a href="/html/emergency/index.php">사고차 무상 긴급견인서비스</a></li>
                            <li><a href="/html/accident/index.php">사고접수</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Notice</a>
                        <ul>
                            <li><a href="/html/news/list.php">News</a></li>
                            <!-- <li><a href="/html/faq/">FAQ</a></li> -->
                            <li><a href="/html/inquiry/" data-type="member">1:1문의</a></li>
                            <li><a href="/html/terms/">이용약관</a></li>
                            <li><a href="/html/policy/">개인정보처리방침</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="support_wrap" class="">
            <div class="list">
                <ul>
                    <li><a href="/html/warning/"><i class="ic_warning"></i>경고등 안내</a></li>
                    <li><a href="/html/emergency/"><i class="ic_emergency"></i>사고차 무상 긴급견인서비스</a></li>
                    <li><a href="/html/accident/"><i class="ic_accident"></i>사고접수</a></li>
                </ul>
            </div>
            <div class="call2">
                <a href="/html/center/index.php?backAction=support">서비스 센터 안내</a>
            </div>
            <div class="call">
                <a href="tel:1588-1777"><i></i>고객지원센터 연결</a>
            </div>
        </div>
    </header>
    <script>
        $(window).on('load', function() {
            app.logined = '<?=isLogined();?>';
            app.isOwner = '<?=isOwnered();?>';
        })
    </script>