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

<link rel="stylesheet" href="/html/member/swiper.css">

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
		<div class="member_car">
			<h4>차량 정보</h4>
			<article>
				<strong>등록 차량</strong>
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
			<article>
				<strong>차량 번호</strong>
				<span id="car_no"></span>
			</article>
			<!-- <article>
				<strong>등록 정보</strong>
				<span>보증 정보</span>
			</article> -->
			<!--<div class="btn_group">
				<a href="#" class="btn">차량 삭제</a>
				<a href="#" class="btn bg_color1">차량 추가</a>
			</div>-->
		</div>
    </div>
</div>

<script src="/html/member/swiper.js"></script>
<script>

$(window).on("load", function() {
    app.showOverlayProgress();
})


var vehicle;

getVehicle();

function initSlide() {
    if ($('.swiper-container').length > 0) {
        $('.member_car .swiper-container .prev').show();
        $('.member_car .swiper-container .next').show();
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
					var temp;
					if(resultData[i].model == 'V90CC' || resultData[i].model == 'V60CC' || resultData[i].model == 'S90' || resultData[i].model == 'S60' || resultData[i].model == 'XC90' || resultData[i].model == 'XC60' || resultData[i].model == 'XC40' ){
						temp = '<li class="item swiper-slide">' +
							'<span class="img"><img src="/images/member/car/' + resultData[i].model + '.png"></span>' +
							'<em>' + resultData[i].model + '</em>' +
							'<span>(' + resultData[i].vehicl_no + ')</span>' +
							'</li>';					
					}else{
						temp = '<li class="item swiper-slide">' +
							'<span class="img"><img src="/images/member/car/no_img.png"></span>' +
							'<em>' + resultData[i].model + '</em>' +
							'<span>(' + resultData[i].vehicl_no + ')</span>' +
							'</li>';
					}
                    
                    $('.car_list .list').append(temp);
                }
                
                if (!resultData[0].car_no) {
                    resultData[0].car_no = "<i style=\"margin-right: 7px;\"><img src=\"/images/member/ico_exclamation.png\" style=\"width: 20px;\"></i>업데이트 예정입니다."
                }
                
                $("#car_no").html(resultData[0].car_no);
                

                if (resultData.length > 1) {
                    initSlide();
                }
				
			} else {
				// alert(result);
            }
            app.hideOverlayProgress();
		}, error: function(e) {
            console.log(e)
            app.hideOverlayProgress();
		}
	});
}
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>