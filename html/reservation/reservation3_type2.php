<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/<?=$CODE?>/reservation2.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
            <div class="page">
                <p><strong>03</strong><span>03</span></p>
            </div>
        </div>

        <div id="visual">
            <img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
        </div>

        <div class="container">

            <div class="reservation_confirm">
                <h6>예약 확인</h6>
				<div class="select_zone">
					<div class="select_wrap">
						<select class="select_date">
							<option>2020년</option>
							<option>2019년</option>
						</select>
					</div>
					<div class="select_wrap">
						<select class="select_type">
							<option>전체</option>
							<option>옵션1</option>
							<option>옵션2</option>
						</select>
					</div>
				</div>
				<ul class="reservation_list">
					<li class="reservation_wait">
						<div>
							<strong>볼보 강남 대치 서비스센터<span>(02-3473-6080)</span></strong>
							<em>2020. 04. 06</em>
						</div>
						<a href="#" class="reservation_wait">예약대기</a>
					</li>
					<li class="reservation_cancle">
						<div>
							<strong>볼보 강남 대치 서비스센터<span>(02-3473-6080)</span></strong>
							<em>2020. 04. 06</em>
						</div>
						<a href="#">취소</a>
					</li>
				</ul>
            </div>
        </div>

		<div class="pop_bg"></div>
		<div class="pop_dialog">
			<p>선택한 예약을 취소하시겠습니까?</p>
			<div class="btn_wrap">
				<a href="#" class="dialog_btn">취소</a>
				<a href="#" class="dialog_btn">확인</a>
			</div>
		</div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

	<script>
		// 다이어로그 팝업 닫기
		$('.dialog_btn').click(function(e){
			e.preventDefault();
			$('.pop_bg').hide();
			$('.pop_dialog').hide();
		});
		// 취소 버튼 클릭시 다이어로그 팝업 열기
		$('.reservation_cancle').click(function(e){
			e.preventDefault();
			$('.pop_bg').fadeIn(200);
			$('.pop_dialog').show();
			$('.pop_dialog').css({opacity:0});
			$('.pop_dialog').css({marginTop:'20px'});
			$('.pop_dialog').animate({marginTop:'0px',opacity:1},100);
		});
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>