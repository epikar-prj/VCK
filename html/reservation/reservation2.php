<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

$service = $_GET['service'];

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

        <div class="container">
            <div class="select_service">
                <div class="title">예약 방법 선택</div>
				<ul class="btn_select">
					<li class="reserv_2 on">
						<div class="btn_wrap">
							<div class="ico ico_02"></div><p>일반 예약</p>
						</div>
					</li>
					<li class="reserv_1">
						<div class="btn_wrap">
							<div class="ico ico_01"></div><p>실시간 예약</p>
						</div>
					</li>
				</ul>
				<ul class="select_caption">
					<li>일반 예약은 모든 서비스 예약이 가능하며 해당 서비스 센터 담당자와 통화 후 예약 일정이 확정 됩니다.</li>
					<li>실시간 예약은 서비스 쿠폰 항목 위주의 정기점검 및 소모품 교환만 예약이 가능합니다.</li>
				</ul>
            </div>
			<div class="btn_group mt20">
				<a class="btn bg_color1" href="javascript: void(0)" onclick="next_step()">다음</a>
			</div>
		</div>
    </div>
    <script src="/html/<?=$CODE?>/script.js?ver=<?$date_code?>"></script>
	
	<script>
		
		$('ul.btn_select li').click(function(){
			$('ul.btn_select li').removeClass('on');
			$(this).addClass('on');
		});

		function next_step(){
			var reserv_link;
			if($('ul.btn_select li.on').hasClass('reserv_1')){
				reserv_link = "/html/rt_reservation/reservation4.php";
			}else{
				reserv_link = "reservation1.php";
			}
			window.location.href = reserv_link;
		}

	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>