<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "event";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/benefit.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_list.php" data-type="owner">Hej, Klass</a></li>
            <li><a href="/html/event/" class="on">Event</a></li>
        </ul>

        <div class="container" style="padding: 0 15px;">
			<ul class="event_list">
                <li class="event">
					<!-- <a href="/html/event/view.php" data-type="member2"> -->
					<a href="./recharge.php">
					<div class="event_inner">
						<div class="img_wrap">
							<!-- <div class="event_ti_wrap">
								<div class="event_sti">볼보자동차코리아</div>
								<div class="event_ti">APP LAUNCHING EVENT</div>
							</div> -->
							<img src="/images/event/event_img_08-2021.png">
						</div>
						<div class="cont_wrap">
							<div class="cont">
								<div class="cont_ti">볼보자동차코리아 2021 'Re:Charge' 캠페인</div>
								<ul class="cont_txt">
									<li>푸망, 티맵, 펫프렌즈 앱에서 볼보의 'Re:Charge’ 캠페인에 참여하세요!</li>
								</ul>
							</div>
						</div>
					</div>
					</a>
				</li>
				<li class="event">
					<!-- <a href="/html/event/view.php" data-type="member2"> -->
					<a href="javascript: void(0)" onclick="alert('Hej Volvo APP 런칭 이벤트가 종료 되었습니다.\n성원에 감사 드리며, 더욱 좋은 이벤트로 찾아 뵙겠습니다.')">
					<div class="event_inner">
						<div class="img_wrap">
							<!-- <div class="event_ti_wrap">
								<div class="event_sti">볼보자동차코리아</div>
								<div class="event_ti">APP LAUNCHING EVENT</div>
							</div> -->
							<img src="/images/event/event_img_06-2020.jpg">
						</div>
						<div class="cont_wrap">
							<div class="cont">
								<div class="cont_ti">볼보자동차코리아 APP LAUNCH EVENT</div>
								<ul class="cont_txt">
									<li>응모기간 : 2020.07.06(월) ~ 경품 소진시까지</li>
									<li>경품 : 스타벅스 아메리카노(Tall 사이즈)</li>
								</ul>
							</div>
						</div>
					</div>
					</a>
				</li>
                <!--end_event_card-->
			</ul>

        </div>


    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>