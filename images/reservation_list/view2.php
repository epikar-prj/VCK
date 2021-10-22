<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "rt_reservation_list";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약 관리";

$cd = $_GET['cd'];
$ro_no = $_GET['ro_no'];
$vin = $_GET['vin'];
$resvt_year = $_GET['resvt_year'];
if (!$resvt_year) {
    $resvt_year = date("Y");
}

$vehicles = getVehicleInfoToArray()['resultData'];
$reservation_list = getVehicleRepairResvtListToArray($resvt_year)['resultData'];
$reservation = $reservation_list[$cd];

$centerJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/json/service.json');
$centerArr = json_decode($centerJson, true);

$center = [];
foreach($centerArr as $row) {
    if ($row['code'] == $reservation['dlr_cd']) {
        $center = $row;
    }

}

$resvt_date = date("Y.m.d H:i", strtotime($item['bk_reg_dt'] . " " . $item['bk_reg_dt_st']));

$state = "예약대기";
if ($reservation['resvt_state'] == 'AC') {
    $state = "예약완료";
} else if ($reservation['resvt_state'] == 'CNL') { 
    $state = "취소";
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');


?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/reservation_list/list.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <div class="container">
			<div class="info">
				<h6>예약정보</h6>
				<ul>
					<li>
						<strong>예약상태</strong>
						<div><?=$state?></div>
					</li>
					<li>
						<strong>예약번호</strong>
						<div><?=$reservation['resvt_seq']?></div>
					</li>
					
					<li>
						<strong>차량번호</strong>
						<div><?=$reservation['car_no']?></div>
					</li>
					<li>
						<strong>예약일시</strong>
						<div><?=str_replace("-", ".", $reservation['resvt_day'])?></div>
					</li>
					<li>
						<strong>서비스센터</strong>
						<div>
							<dl>
								<dt><?=$reservation['dealer_nm']?></dt>
							</dl>
						</div>
					</li>
				</ul>
                
                
            </div>
            <?if (true) {?>
            <div id="rvst_cancel" class="btn_group">
                <a href="javascript: void(0)" class="btn bg_color2" id="center_around" onclick="cancel_reservation('<?=$reservation['resvt_seq']?>')" ><span>예약취소</span></a>
            </div>
            <!-- <p class="caption">예약 취소는 전날 23:00까지 가능합니다.<br>당일 취소는 신청하신 센터에 문의해주세요.</p> -->
            <?}?>
        </div>



		<!-- <div class="pop_wrap" id="pop">
            <div class="pop">
                <div class="pop_scroll_wrap">
					<h4>주변 가볼만 한 곳</h4>
					<article>
						<em>80년 전통 국물이 맛있는 곰탕전문점</em>
						<h5>하동관 강남분점</h5>
						<img src="/images/reservation_list/around_01.jpg" alt="">
						<p>허영만의 식객, 수요미식회 등에서 인정받은 한우곰탕 맛집
							이에요. 맑은 국물에서 진한 맛이 나는 것이 일품이죠.<br>
							뜨끈한  말아진 밥 한 숟가락에 잘 익은 깍두기 하나 올려서 
							‘한입만’을 시전해보세요.</p>
						<strong>볼보 앱 제시 시 음료 10% 할인</strong>
						<ul>
							<li class="tel">02-565-0003</li>
							<li class="addr">서울 강남구 테헤란로78길 16</li>
							<li class="open">매일 07:00~16:30  Last Order 16:00<br>월요일 휴무</li>
						</ul>
					</article>
					<article>
						<em>토종 순대와 얼큰한 국물맛이 일품</em>
						<h5>수상한순대국 서울성수점</h5>
						<img src="/images/reservation_list/around_02.jpg" alt="">
						<p>뽀얀 사골육수 안에 순대와 머릿고기, 염통 등 여러 부위별 
							고기들이 들어가 입맛을 자극하는 순댓국밥 맛집이에요.<br>
							한국인의 대표 밥상 순댓국을 만나보세요!</p>
						<ul>
							<li class="tel">02-4999-3326</li>
							<li class="addr">서울 성동구 연무장19길 18</li>
							<li class="open">매일 10:00~23:00</li>
						</ul>
					</article>
					<article>
						<em>다양한 월드푸드를 만날 수 있는</em>
						<h5>MONOMART(모노마트 성수점)</h5>
						<img src="/images/reservation_list/around_03.jpg" alt="">
						<p>요리의 핵심이 되는 소스와 면류, 튀김류부터 간편 조리식, 
						육가공품, 유제품, 주류 등 다양한 월드 푸드를 만나보세요.
						</p>
						<ul>
							<li class="tel">02-3409-9464</li>
							<li class="addr">서울 성동구 성수이로20길 49 1층</li>
							<li class="open">평일 10:00~20:00</li>
						</ul>
					</article>
					<article>
						<em>성수동의 복합 문화 예술 공간</em>
						<h5>할아버지공장</h5>
						<img src="/images/reservation_list/around_04.jpg" alt="">
						<p>카페와 갤러리, 모임 공간 등이 마련된 성수동의 복합 문화 
						예술 공간입니다. 연중 무휴이나, 대관 행사 시 인스타그램을 
						통해 알려드리고 있어요.
						</p>
						<ul>
							<li class="tel">070-7642-1113</li>
							<li class="addr">서울 성동구 성수이로7가길9</li>
							<li class="open">매일 11:00~23:00</li>
						</ul>
					</article>
					<article>
						<em>환경을 생각하는 친환경 카페</em>
						<h5>IO3(카페 아이오쓰리)</h5>
						<img src="/images/reservation_list/around_05.jpg" alt="">
						<p>다회용 보틀과 리유저블컵에 음료를 담아 드리는 친환경적인 카페 입니다. 커피와 제철 생과일쥬스 전문점으로 보틀이나 개인 텀블러를 가지고 오시면 할인해드려요.
						</p>
						<ul>
							<li class="tel">02-497-1961</li>
							<li class="addr">서울 성동구 성수이로20길 60</li>
							<li class="open">평일08:00~19:30, 주말10:30~19:00</li>
						</ul>
					</article>
					<div class="btn_wrap">
						<div class="btn_group">
							<a href="#" class="btn" id="close">닫기</a>
						</div>
					</div>
                </div>

                
            </div>
        </div> -->
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

	<script>
		// $('#center_around').click(function(e){
		// 	e.preventDefault();
		// 	$('.pop_wrap').addClass('on');

		// });

		// // 팝업 닫기
		// $('#close').click(function(e){
		// 	$('.pop_wrap').removeClass('on');
		// })

        function cancel_reservation(_resvt_seq){
			var result = confirm('서비스 센터 예약을 취소 하시겠습니까?');

			if(result){
				updateVehicleRepairResvtCancel(_resvt_seq);
			} else {
			
			}
		}

		function updateVehicleRepairResvtCancel(_resvt_seq) {
            // console.log(_resvt_seq)
			var res;

			$.ajax({
                url:'/ajax/ajax.updateVehicleRepairResvtCancel.php',
                type:'post',
                data: {resvt_seq: _resvt_seq},
                dataType: 'json',
                success: function(_res){
                    console.log(1);
					res = _res;
					console.log(_res);
                    
				}, 
                complete: function() {
                    console.log(2);
                    var result = res.result;
                    if (result == 'success') {
						alert('예약이 취소 되었습니다.');
						// changeState(_resvt_seq);
					} else {
						alert(result);
					}
                }, error: function(e) {
                    console.log(3);
                    console.log(e);
                }
            });
		}


        
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>