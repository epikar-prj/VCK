<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php');
    }

    $vin = PARAM2("vin");
    $isUse = PARAM2("isUse");
    $isOver = PARAM2("isOver");

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
		<div class="oneyear_coupon">
			<h4>1주년 쿠폰</h4>

			<div class="coupon_top">
                <img class="card" src="/images/member/img_oneyear01.png" alt=""><br>
                <img src="/images/member/img_oneyear02.png" alt="">
                <p>본 쿠폰은 볼보자동차코리아에서 1주년 고객께 제공하는 <br>The Volvo Collection 20% 할인 쿠폰입니다.</p>
            </div>

            <div class="coupon_middle">
                <div class="box-group">
                    <strong>유효기간</strong>
                    <p>쿠폰 수령 후 6개월 이내</p>
                </div>
                <div class="box-group">
                    <strong>유의사항</strong>
                    <ul>
                        <li>THE VOLVO COLLECTION 중 일부 품목은 쿠폰 사용이 제한됩니다.</li>
                        <li>쿠폰 사용은 1회에 한하며, 쿠폰 사용 후 반품/교환/취소 시 재발행되지 않습니다.</li>
                        <li>쿠폰 사용 시 고객님의 개인정보를 요구하며, 쿠폰 사용을 위한 본인 확인 목적 외에는 사용되지 않습니다.</li>
                        <li>본 쿠폰을 타인에게 양도할 수 없습니다.</li>
                        <li>사용 완료 버튼은 쿠폰 사용 시 센터 직원이 확인 후 누르는 버튼으로, 사용 완료 버튼 클릭 시 더 이상 쿠폰 사용이 불가하며, 쿠폰은 재발행 되지 않습니다.</li>
                    </ul>
                </div>
            </div>
            <?if (!$isUse && !$isOver) {?>
            <div class="coupon_bottom">
                <a href="javascript: void(0)" onclick="useCoupon()" class="btn">사용 완료</a>
            </div>
            <? } ?>
		</div>
    </div>

    <?if (!$isUse && !$isOver) {?>
	<div class="oneyear_coupon_pop" id="pop">
		<div class="pop">
			<div class="inner">
                <strong>친애하는 고객님께,</strong>
                <p>
                    고객님의 볼보자동차 구입 1주년을 축하드립니다.<br>
                    지난 1년 동안 볼보자동차코리아에 보여 주신 <br>
                    지속적인 관심과 성원에 진심으로 감사드리며, <br>
                    저희 볼보자동차코리아도 고객님과의 인연을 소중히<br> 
                    여기고 항상 수준 높은 서비스를 제공하기 위해 <br>
                    노력하겠습니다.
                </p>
                <p>
                    앞으로도 볼보자동차코리아는 ‘사람 중심’이라는 <br>
                    설립 이념 아래, 최상의 서비스는 물론 스칸디나비안 <br>
                    감성의 디자인, 최신 안전 기술, 뛰어난 품질과 주행성능 <br>
                    등 모든 면에서 가장 인정받는 진정한 스웨덴의 <br>
                    프리미엄 자동차 브랜드가 될 것을 약속드립니다.
                </p>
                <p>감사합니다.</p>
                <strong class="sign">볼보자동차코리아 대표&nbsp;&nbsp;이&nbsp;&nbsp;윤&nbsp;&nbsp;모 <img src="/images/member/img_oneyear03.png" alt=""></strong>
                <a href="javascript: void(0)" id="close" class="btn">닫기</a>
            </div>
		</div>
	</div>
    <? } ?>
</div>

<script>

// 팝업 닫기
$('#close').click(function(e){
    $('.oneyear_coupon_pop').fadeOut(200);
})

function useCoupon() {
    var result = confirm("쿠폰을 사용하시겠습니까? \n확인 버튼 선택 시 \n더 이상 쿠폰 사용이 불가하며, \n쿠폰은 재발행 되지 않습니다.");
    if(result){
        postOneYearCoupon();
    }
}

function postOneYearCoupon() {
    app.showOverlayProgress();
    var res = null;

    $.ajax({
		url:'/ajax/ajax.postOneYearCoupon.php',
        type:'post',
        data: {vin: '<?=$vin?>'},
		dataType: 'json',
		success: function(_res){
			// console.log(_res);
			res = _res;
		}, complete: function() {
            if (res > 0) {
                alert("1주년 쿠폰을 사용하였습니다.");
                location.href = "/html/member/member_menu.php";
            } else {
                alert("error");
            }
            app.hideOverlayProgress();
		}, error: function(e) {
			console.log(e)
            app.hideOverlayProgress();
		}
	});
}

$(window).on("load", function() {
    $.ajax({
		url:'/ajax/ajax.postOneYearCouponLog.php',
        type:'post',
        data: {vin: '<?=$vin?>', isUse: '<?=$isUse?>', isOver: '<?=$isOver?>'},
		dataType: 'json',
		success: function(_res){
			console.log(_res);
		}, error: function(e) {
			console.log(e)
		}
	});
});

</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');

    if ($isUse) {
        echo "<script>setTimeout(function() {alert('이 쿠폰은 사용 완료된 쿠폰입니다.'); location.href='/html/member/member_menu.php'}, 1000)</script>";
    }

    if ($isOver) {
        echo "<script>setTimeout(function() {alert('이 쿠폰은 유효기간이 만료되어 사용하실 수 없습니다.');location.href='/html/member/member_menu.php'}, 1000)</script>";
    }
?>