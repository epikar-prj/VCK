<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php');
    }

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
		<div class="member_center">
			<h4>선호 서비스 센터</h4>
			<ul class="list">
				<!-- <li class="item">
					<div class="tit"><input type="radio"><span>볼보 동대문 서비스센터</span><i></i></div>
					<div class="info_wrap">
						<div class="info_box">
							<div class="img_wrap"><img src="/images/member/center_sample.jpg" alt=""></div>
							<ul class="info">
								<li><span class="label">주소</span><span class="data">대전광역시 대덕구 한밭대로 1114 (중리동 230-8)</span></li>
								<li><span class="label">대표번호</span><span class="data">042-628-2200</span></li>
								<li><span class="label">FAX</span><span class="data">042-628-6084</span></li>
								<li><span class="label">영업시간</span><span class="data">평일 9:00~21:00 / 주말, 공휴일 9:00~20:00</span></li>
							</ul>
							<a href="#" class="golink">바로가기</a>
						</div>
					</div>
				</li>
				<li class="item">
					<div class="tit"><input type="radio"><span>볼보 동대문 서비스센터</span><i></i></div>
					<div class="info_wrap">
						<div class="info_box">
							<div class="img_wrap"><img src="/images/member/center_sample.jpg" alt=""></div>
							<ul class="info">
								<li><span class="label">주소</span><span class="data">대전광역시 대덕구 한밭대로 1114 (중리동 230-8)</span></li>
								<li><span class="label">대표번호</span><span class="data">042-628-2200</span></li>
								<li><span class="label">FAX</span><span class="data">042-628-6084</span></li>
								<li><span class="label">영업시간</span><span class="data">평일 9:00~21:00 / 주말, 공휴일 9:00~20:00</span></li>
								<a href="#" class="golink">바로가기</a>
							</ul>
						</div>
					</div>
				</li> -->
			</ul>
		</div>
    </div>
</div>

<script src="script.js"></script>

<script>




</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>