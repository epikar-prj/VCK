<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "rt_reservation";
$FOOTER_CODE = "service";
$TITLE = "실시간 서비스 센터 예약";

$dealer_cd = PARAM2('service');
$resvt_day = PARAM2('resvt_day');
$service_item_seq = PARAM2('service_item_seq');
$tot_work_time = PARAM2('tot_work_time');
$select_time = PARAM2('select_time');

$hp = [];

if ($_COOKIE["member_hp"]) {
    $hp[0] = substr($_COOKIE["member_hp"],0,3);
    $hp[1] = substr($_COOKIE["member_hp"],3,-4);
    $hp[2] = substr($_COOKIE["member_hp"],-4);
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
<link rel="stylesheet" href="/html/member/swiper.css">
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/service.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
            <div class="page">
                <p><strong>04</strong><span>04</span></p>
            </div>
        </div>

        <div id="visual">
            <img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
        </div>

        <div class="container">
            <div class="reservation_choice">
                <h6 class="model">예약 차량</h6>
			<form name="resvtForm" method="POST" action="#" onsubmit="return checkValidate(this);">
                <input type="hidden" name="master_cust_cd" value="<?=$_COOKIE['master_cust_cd']?>">
                <input type="hidden" name="id" value="<?=$_COOKIE['member_id']?>">
                <input type="hidden" name="dealer_cd" value="<?=$dealer_cd?>">
                <input type="hidden" name="resvt_day" value="<?=$resvt_day?>">
                <input type="hidden" name="service_item_seq" value="<?=$service_item_seq?>">
                <input type="hidden" name="tot_work_time" value="<?=$tot_work_time?>">
                <input type="hidden" name="select_time" value="<?=$select_time?>">
                <div class="select_model">
				<article>
					<div class="car_list swiper-container">
						<ul class="list swiper-wrapper"></ul>
						<div class="swiper-pagination"></div>
						<!-- Add Arrows -->
						<div class="swiper-button-navigation">
							<div class="prev"></div>
							<div class="next"></div>
						</div>
					</div>
				</article>
                </div>

				<h6 class="phone">휴대 전화번호</h6>

				<div class="phone_col">
					<div class="input_wrap phone_wrap">
						<div class="input_box">
							<select name="hp1">
								<? foreach($OPTION_INFO['hp'] as $item) { 
									$selected = "";
									if ($item == $hp[0]) {
										$selected = "selected";
									}
									?>
									<option value="<?=$item?>" <?=$selected?>><?=$item?></option>
								<? } ?>
							</select>
						</div>
						<div class="input_box">
							<input type="number" id="hp2" name="hp2" pattern="\d*" value="<?if ($hp[1]) { echo $hp[1]; }?>" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
						</div>
						<div class="input_box">
							<input type="number" id="hp3" name="hp3" pattern="\d*" value="<?if ($hp[2]) { echo $hp[2]; }?>" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
						</div>
					</div>
				</div>					

				<input type="hidden" name="service" id="select_service" value="<?=$service?>"></input>
				<input type="hidden" name="date" id="date" value="<?=$date?>">

                    <div class="btn_group mt20">
                        <a class="btn" href="javascript:history.back();">이전</a>
                        <button type="submit" class="btn bg_color1">예약 신청</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<script src="/html/member/swiper.js"></script>
<script>
var vehicle;
var vin = "";

$("#hp2, #hp3").focusout(function() {
    $("#contents").scrollTop(0);
})


$(window).on('load', function() {
    app.showOverlayProgress();
    getVehicle();
});

function initSlide() {
    if ($('.swiper-container').length > 0) {
        $('.select_model .swiper-container .prev').show();
        $('.select_model .swiper-container .next').show();
        $.getScript("/html/testdrive/swiper.js").done(function () {

            var swiper = new Swiper('.swiper-container', {
                pagination: {
                    el: '.swiper-pagination'
                },
                slidesPerView: 1,
                spaceBetween: 10,
                freeMode: false,
            	navigation: {
            		nextEl: '.next',
            		prevEl: '.prev',
            	},
                loop: true,
                on: {
                    transitionEnd: function() {
                        var index = this.realIndex;
                        $("#car_no").text(vehicle[index].car_no);
                        vin = vehicle[index].vehicl_no;
                        console.log(vin)
                    }
                }
            });
        });
    }
}


function getVehicle() {
    var master_cust_cd = "<?=$_COOKIE['master_cust_cd']?>";
	var id = "<?=$_COOKIE['member_id']?>";

	$.ajax({
		url:'/ajax/ajax.getVehicle.php',
		type:'post',
		data: {master_cust_cd: master_cust_cd, id: id},
		dataType: 'json',
		success: function(_res){
			console.log(_res);
			res = _res;
		}, complete: function() {
			var result = res.result;
			var resultData = res.resultData;
            vehicle = resultData;

            if (result == 'success') {

                for (var i = 0; i < resultData.length; i ++) {
                    var temp = '<li class="item swiper-slide">' +
							'<em>' + resultData[i].model + '</em>' +
							'<span>(' + resultData[i].car_no + ')</span>' +
                        '</li>';
                    
                    $('.car_list .list').append(temp);
                }
                
                $("#car_no").text(resultData[0].car_no);
                console.log(resultData[0])
                vin = resultData[0].vehicl_no;
                
                if (resultData.length > 1) {
                    initSlide();
                }
				app.hideOverlayProgress();
			} else {
                alert("차량정보를 불러올 수 없습니다.\n잠시후 다시 시도해주세요.");
				location.href = '/html/reservation/reservation1.php';
			}
		}, error: function(e) {
            alert("차량정보를 불러올 수 없습니다.\n잠시후 다시 시도해주세요.");
            location.href = '/html/reservation/reservation1.php';
			console.log(e)
		}
	});
}


function checkValidate(f) {
    if (f.hp2.value == '') {
        alert('가운데자리 휴대전화 번호를 입력해주세요');
        f.hp2.focus();
        return false;
    }
    
    if (f.hp3.value == '') {
        alert('끝자리 휴대전화 번호를 입력해주세요');
        f.hp3.focus();
        return false;
    }
    
    postVehicleRepairResvt();
    return false;
}

function postVehicleRepairResvt() {
    app.showOverlayProgress();
    var f = document.resvtForm;
    var res;

    $.ajax({
        url:'/ajax/ajax.postVehicleRepairResvt_test.php',
        type:'post',
        data: {
            master_cust_cd: f.master_cust_cd.value,
            id: f.id.value,
            vin: vin,
            dealer_cd: f.dealer_cd.value,
            resvt_tel: f.hp1.value + f.hp2.value + f.hp3.value,
            resvt_day: f.resvt_day.value,
            service_item_seq: f.service_item_seq.value,
            tot_work_time: f.tot_work_time.value,
            select_time: f.select_time.value
        },
        dataType: 'json',
        success: function(_res){
            console.log(_res)
            console.log(this.data);
            res = _res;
        }, 
        complete: function() {
            var result = res.result;
            if (result == 'success') {
                alert("서비스 센터 예약이 신청되었습니다. 예약 시간 확정을 위해 신청하신 서비스 센터의 담당자가 유선 연락 드릴 예정입니다.")
                location.replace("/html/rt_reservation_list/list.php");
            } else {
                app.hideOverlayProgress();
                alert("서비스센터 예약을 실패하였습니다.");
            }
        }, error: function(e) {
            app.hideOverlayProgress();
            console.log(e)
        }
    });
}
</script>

<script>

</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>