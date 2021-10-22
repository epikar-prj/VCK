<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

// if (!isLogined()) {
    // MgMoveURL('/html/member/main.php');
// }


$CODE = "promotion";
$FOOTER_CODE = "benefit";
$TITLE = "계약 고객 프로그램";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
    <link rel="stylesheet" type="text/css" href="./gift.css">
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/benefit.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>
        <div class="container detail">
            <section id="step_01" class="testdrive_info">
				<div class="testdrive_info_inner">

					<div class="event_apply">
                        <div class="txt">볼보자동차를 선택해 주시고 오랜 시간 기다려 주신 고객님께 감사의 마음을 담아 볼보의 헤리티지가 담긴 기프트를 제공해 드립니다.<br>
						<br>
						지금 바로 App 내 MY Volvo 페이지에서 신청하세요.<br>
						<br>
						<div class="btn_link"><a href="/html/member/member_menu.php">신청하러 가기</a></div>
                        </div>
						<div class="event_gift_ti">기프트 안내<img src="/images/lockin/volvo_p1800.jpg" alt="volvo_p1800 헤리티지 다이캐스트"></div>
                        <div class="event_gift_sti">볼보 P1800 헤리티지 모델카</div>
                        <div class="box-caption">
							<strong>프로그램 안내</strong>
							<ul>
								<li>본 프로그램은 2021년 4월 30일 기준 6개월 이상 대기 고객부터 적용 되며, 최초 계약에 한하여 계약 고객 당 1회에 한해 제공됩니다. (중복 계약에 따른 중복 신청 및 지급 불가)</li>
								<li>신청 대상자의 경우 MY Volvo 페이지 내 ‘대기 고객 기프트 신청’ 탭에서 기프트를 신청하실 수 있습니다.</li>
								<li>매월 해당 대상 고객에게 문자 또는 앱 푸시 알람을 통해 신청 안내 드립니다.  (마케팅 활용 미동의시 수신 불가) </li>
							</ul>    
						</div>
					</div>

				</div>
            </section>
        </div>
        
        
    </div>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>