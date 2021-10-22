<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/member/member_menu.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="member_coupon">
			<h4>서비스 쿠폰</h4>

			<div class="coupon_top">
                <div class="input_box">
                    <select>
                        <option>286마2407</option>
                    </select>
                </div>
                <!-- <ul>
                    <li>사용 기한: 2019.10.14 ~ 2020.10.13</li>
                    <li>주행거리: 10만km 내</li>
                </ul> -->
            </div>

            <div class="coupon_pack">
                <ul class="label">
                    <li><i class="o"></i>사용가능 쿠폰</li>
                    <li><i class="v"></i>사용한 쿠폰</li>
                </ul>
                <ul class="list">
                    <li class="item">
                        <span>1,000 km</span>
                        <ul>
                            <li class="disable"><span><i class="v"></i> 1000km</span></li>
                        </ul>
                    </li>
                    <li class="item">
                        <span>15,000 km</span>
                        <ul>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> Service 2.0</a></li>
                            <li class="disable"><span><i class="v"></i> 엔진오일&필터 교환</span></li>
                            <li class="disable"><span><i class="v"></i> 에어클리너 교환</span></li>
                            <li class="disable"><span><i class="v"></i> 에어컨필터 교환(Cabin)</span></li>
                        </ul>
                    </li>
                    <li class="item">
                        <span>30,000 km</span>
                        <ul>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> Service 2.0</a></li>
                            <li class="disable"><span><i class="v"></i> Wear and tear Inspection</span></li>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> 엔진오일&필터 교환</a></li>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> 에어클리너 교환</a></li>
                            <li class="disable"><span><i class="v"></i> 브레이크액</span></li>
                            <li class="disable"><span><i class="v"></i> 앞브레이크 패드 교환</span></li>
                        </ul>
                    </li>
                    <li class="item">
                        <span>45,000 km</span>
                        <ul>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> Service 2.0</a></li>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> 엔진오일&필터 교환</a></li>
                            <li class="enable"><a href="#" class="used""><i class="o"></i> 에어클리너 교환</a></li>
                            <li class="disable"><span><i class="v"></i> 뒤브레이크 패드 교환</span></li>
                        </ul>
                    </li>
                </ul>
                <div class="guide">
                    <p>총 24개의 쿠폰을 보유하고 있습니다.<br>
                        (사용 가능 <i class="o"></i> 사용 완료 <i class="v"></i> 기간 만료 <i class="x"></i>)
                    </p>
                    <p>서비스 항목은 현금이나 물품으로 제공되지 않습니다.</p>
                    <p>2016년 7월부터 판매되는 MY17 차량부터 적용됩니다.</p>
                </div>

            </div>
		</div>
    </div>

	<div class="member_coupon_pop" id="pop">
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
					<a href="#" class="btn" id="close">닫기</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
// 팝업 열기
$('.list .item > ul li.enable a').click(function(e){
    e.preventDefault();
    $('.member_coupon_pop').addClass('on');
});

// 팝업 닫기
$('#close').click(function(e){
    $('.member_coupon_pop').removeClass('on');
})
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>