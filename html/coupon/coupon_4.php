<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "coupon";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/coupon/index.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej. Familj</a></li>
            <li><a href="/html/coupon/" class="on">Coupon</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <div class="container">
			<div id="coupon">
				<div class="coupon_top">
					<h4>Culture 쿠폰</h4>
					<p>쿠폰을 다운받아 해당 제휴처에 제시하시면<br>할인 서비스를 받으실 수 있습니다.</p>
				</div>
				<div class="coupon_body">
					<h5>사용기한</h5>
					<p>2020.01.01 ~ 2020.12.31</p>
					<h5>사용방법</h5>
					<ul>
						<li>공연의 경우 예매처에서 할인률로 예매 후 현장에서 쿠폰을 제시한 후 티켓을 발급받으세요.</li>
						<li>초대 쿠폰의 경우 신분증과 함께 쿠폰을 제시하시면 됩니다.</li>
						<li>본인의 실수로 쿠폰 사용완료 버튼을 눌렀을 경우
						쿠폰은 회복되지 않으니 주의해주세요.</li>
						<li>인당 연간 6개의 쿠폰이 발급되며,
						연 내에 사용하지 못한 쿠폰은 이월되지 않습니다.</li>
					</ul>
					<h5>쿠폰 사용 가능 제휴처</h5>
					<ul>
						<li>연극, 뮤지컬 공연장</li>
						<li>미술관</li>
						<li>전시장</li>
					</ul>
					<a href="javascript: void(0)" class="btn bg_color1 mt30 coupon_down">쿠폰 다운받기</a>
				</div>
			</div>
        </div>

        <div class="pop_wrap" id="pop">
            <div class="pop">
                <div class="pop_scroll_wrap">
                    <div class="top">
                        <h4><?=$TITLE?></h4>
                    </div>
                    <div class="card_box">
                        <div class="img_wrap">
                            <img src="/images/<?=$CODE?>/volvo_card.png" alt="">
                        </div>
                        <h6>Volvo Thank you Card</h6>
                        <p>이 카드는 볼보자동차코리아에서 2주년 고객께 제공하는
                            THE VOLVO COLLECTION 20% 할인 쿠폰입니다.
                        </p>
                    </div>
                    <div class="cont">
                        <strong>유의사항</strong>
                        <ul>
                            <li>THE VOLVO COLLECTION 중 일부 품목은 쿠폰 사용이 제한됩니다.</li>
                            <li>쿠폰 사용은 1회에 한하며, 쿠폰 사용 후 반품/ 교환/ 취소 시 재발행되지 않습니다.</li>
                            <li>쿠폰 사용 시 고객님의 개인정보를 요구하며, 쿠폰 사용을 위한 본인 확인 목적 외에는 사용되지 않습니다.</li>
                            <li>본 쿠폰을 타인에게 양도할 수 없습니다.</li>
                        </ul>
                        <strong>문의</strong>
                        <p>자세한 사항은 고객센터(1588-1777) 또는 가까운 서비스센터
                            로 연락하시기 바랍니다.
                        </p>
                    </div>
                </div>

                <div class="btn_wrap">
                    <div class="btn_group">
                        <a href="javascript: void(0)" class="btn" id="close">닫기</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

	<script>
		// 팝업 열기
		$('.coupon_down').click(function(e){
			e.preventDefault();
			$('.pop_wrap').addClass('on');
		});

		// 팝업 닫기
		$('#close').click(function(e){
			$('.pop_wrap').removeClass('on');
		})
	</script>	

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>