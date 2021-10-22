<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "testdrive";
    $FOOTER_CODE = "buy";
    $TITLE = "시승신청";

    $currentPage = "01";
    $endPage = "04";

    // if (isLogined()) {
    //     $endPage = "03";
    // }

    $curentTime = date("Y-m-d H:i");
    $startTime = date("Y-m-d H:i", strtotime("2020-11-09 09:00"));

    // if ($_COOKIE['member_id'] == "apptest@volvocars.com") {
    //     echo date("Y-m-d H:i")."<br>";
    //     echo date("Y-m-d H:i", strtotime("2020-11-09 09:00"));
    // }

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e031aed38dd1fded16e62028409f63fe"></script>
<link rel="stylesheet" href="/html/testdrive/swiper.css">
<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/buy.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
        <div class="page">
            <p><strong><?=$currentPage?></strong><span><?=$endPage?></span></p>
        </div>
    </div>
    
    <div id="visual">
        <img src="/images/testdrive/img_visual-1.jpg" alt="">
    </div>
    
    <div class="container">
		<h3 class="cont_tit">시승 모델 신청</h3>
		<ul class="tab_list">
			<li class="tab" data-type="suv"><a href="javascript: void(0)" class="on">SUV</a></li>
			<li class="tab" data-type="sedan"><a href="javascript: void(0)">Sedan</a></li>
			<li class="tab" data-type="cc"><a href="javascript: void(0)">Cross Country</a></li>
		</ul>
		
		<form action="/html/testdrive/testdrive2.php" method="get" onsubmit="return checkValidate(this);">	
			<div class="cars_wrap">
				<div class="cars swiper-container">
					<ul class="list swiper-wrapper">
                        <?if ($curentTime >= $startTime) {?>
						<li class="item swiper-slide suv" data-type="suv">
							<label>
								<div class="tit"><span>XC90</span></div>
								<img src="/images/testdrive/XC90_20201108.png" alt="">
								<input type="radio" name="model" value="XC90" class="check">
							</label>
						</li>
						<li class="item swiper-slide suv" data-type="suv">
							<label>
								<div class="tit"><span>XC60</span></div>
								<img src="/images/testdrive/XC60_20201108.png" alt="">
								<input type="radio" name="model" value="XC60" class="check">
							</label>
						</li>
                        <?}?>
						<li class="item swiper-slide suv" data-type="suv">
							<label>
								<div class="tit"><span>XC40</span></div>
								<img src="/images/testdrive/XC40.png" alt="">
								<input type="radio" name="model" value="XC40" class="check">
							</label>
						</li>
						<li class="item swiper-slide sedan" data-type="sedan" style="display: none;">
							<label>
								<div class="tit"><span>S90</span></div>
								<img src="/images/testdrive/S90.png" alt="">
								<input type="radio" name="model" value="S90" class="check">
							</label>
						</li>
						<li class="item swiper-slide sedan" data-type="sedan" style="display: none;">
							<label>
								<div class="tit"><span>S60</span></div>
								<img src="/images/testdrive/S60_20201030.png" alt="">
								<input type="radio" name="model" value="S60" class="check">
							</label>
						</li>
						
						<li class="item swiper-slide cc" data-type="cc" style="display: none;">
							<label>
								<div class="tit"><span>V90</span></div>
								<img src="/images/testdrive/V90_201027.png" alt="">
								<input type="radio" name="model" value="V90" class="check">
							</label>
						</li>
						<li class="item swiper-slide cc" data-type="cc" style="display: none;">
							<label>
								<div class="tit"><span>V60</span></div>
								<img src="/images/testdrive/V60.png" alt="">
								<input type="radio" name="model" value="V60" class="check">
							</label>
						</li>
					</ul>
					<ul class="swiper_dot swiper-pagination">
						<li><a href="javascript: void(0)"></a></li>
						<li><a href="javascript: void(0)"></a></li>
						<li><a href="javascript: void(0)"></a></li>
					</ul>
				</div>
			</div>
			<div class="btn_group">
				<button type="submit" class="btn">다음</button>
			</div>
		</form>
    </div>
    <div class="testdrive_pop" id="pop">
		<div class="pop">
			<div class="inner">
                <strong>볼보자동차는 모든 고객과 직원의 안전을 최우선으로 생각합니다.</strong>
				<p class="notice">* 볼보자동차코리아는 코로나19 4단계별 방역 수칙 정부 지침을 준수하고자 거리두기 단계가 완화될 때까지 현장 시승을 제공하지 않습니다.<br><br>
					담당 영업사원이 유선 연락 드릴 예정이며, 추후 코로나 방역 수칙 정부 지침 완화 시 현장 시승 안내를 도와드리겠습니다.</p>
                <p>최근 코로나19에 대한 우려가 확산됨에 따라 모든 전시장에서는 다음과 같이 안전을 위해 노력하고 있습니다.</p>

                
                <ul>
                    <li>
                        <i><img src="/images/testdrive/img_testdrive_pop-01.jpg" alt=""></i>
                        <span>전직원 마스크 착용</span>
                    </li>
                    <li>
                        <i><img src="/images/testdrive/img_testdrive_pop-02.jpg" alt=""></i>
                        <span>일 2회 체온 측정</span>
                    </li>
                    <li>
                        <i><img src="/images/testdrive/img_testdrive_pop-03.jpg" alt=""></i>
                        <span>손소독제 비치</span>
                    </li>
                    <li>
                        <i><img src="/images/testdrive/img_testdrive_pop-04.jpg" alt=""></i>
                        <span>차량 방역 실시</span>
                    </li>
                </ul>

                <p>더욱 안심하고 방문하실 수 있는 <br>볼보자동차가 되겠습니다.</p>
				<!--<p>* 볼보자동차코리아는 코로나19 2.5단계별 방역 수칙 정부 지침을 준수하고자 현재 현장 시승을 제공하지 않고 있습니다.<br>
					시승 신청 시 담당 영업사원이 유선 연락 드릴 예정이며, 추후 코로나 방역 수칙 정부 지침 완화 시 현장 시승 안내를 도와드리겠습니다.</p>-->
                <a href="javascript: void(0)" id="close" class="btn">닫기</a>
            </div>
		</div>
	</div>
</div>

<script src="/html/testdrive/script.js"></script>

<script>
    // 팝업 닫기
    $('#close').click(function(e){
        $('.testdrive_pop').fadeOut(200);
    })

    function checkValidate(form) {
        if (!form.model.value) {
            alert("모델을 선택해주세요");
            return false;
        }
    }
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>