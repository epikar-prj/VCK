<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "rt_reservation";
$FOOTER_CODE = "service";
$TITLE = "실시간 서비스 센터 예약";

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
			<div class="page">
				<p><strong>01</strong><span>04</span></p>
			</div>
        </div>

		<div id="visual">
			<img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
		</div>

        <div class="container">
            <div class="check_service">
                <div class="title">서비스 항목 선택</div>
                <form name="serviceForm" id="checkForm" action="/html/rt_reservation_test/reservation2.php" method="get">
                <input type="hidden" name="service_item_seq" value="">
                <input type="hidden" name="tot_work_time" value="0">
                    <ul>
                        <!-- <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="1">
                                    <span>1,000km 점검</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="2">
                                    <span>정기점검(Service 2.0 포함)</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="3">
                                    <span>엔진오일 및 필터 교환</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="4">
                                    <span>에어클리너 교환</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="5">
                                    <span>에어컨 필터 교환(Cabin)</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="6">
                                    <span>브레이크액</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="7">
                                    <span>앞 브레이크 패드 교환</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="8">
                                    <span>뒷 브레이크 패드 교환</span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="box-input">
                                <label>
                                    <input type="checkbox" class="service" value="9">
                                    <span>와이퍼 블레이드 교환(앞유리)</span>
                                </label>
                            </div>
                        </li> -->
                    </ul>
    
                    
    
                    <div class="btn_group mt20">
                        <a class="btn" href="#">이전</a>
                        <a class="btn bg_color1" href="javascript: void(0)" onclick="checkValidate()">다음</a>
                    </div>
                </form>
            </div>
		</div>
    </div>
    <script src="/html/<?=$CODE?>/script.js?ver=<?$date_code?>"></script>
	
	<script>

        $(window).on("load", function() {
            app.showOverlayProgress();
            $.ajax({
                url: '/ajax/ajax.getReserveCategory_test.php',
                type:'get',
                dataType: 'json',
                success: function(_res){
                    setServiceCategory(_res.resultData);
                   	console.log(_res);
                }, complete: function() {
                    app.hideOverlayProgress();
                }, error: function(e) {
                    console.log(e)
                    app.hideOverlayProgress();
                }
            });
        });

        function setServiceCategory(data) {
            var $ul = $(".check_service ul");
            $.each(data, function(key, item) {
                var li = '<li>' +
                '<div class="box-input">' +
                '<label>' +
                '<input type="checkbox" class="service" data-worktime="' + item.work_time + '" value="' + item.seq_id + '">' +
                '<span>' + item.item_nm + '</span>' +
                '</label>' +
                '</div>' +
                '</li>';

                $ul.append(li);
            });
        }


        function checkValidate() {
            $.each(document.getElementsByClassName("service"), function(key, val) {
                if (val.checked) {
                    if (document.serviceForm.service_item_seq.value) {
                        document.serviceForm.service_item_seq.value += "|" + val.value;
                    } else {
                        document.serviceForm.service_item_seq.value += val.value;
                    }

                    document.serviceForm.tot_work_time.value = Number(document.serviceForm.tot_work_time.value) + Number(val.getAttribute("data-worktime"));
                }
            })
            document.serviceForm.submit();
        }

        

        // function checkValidate() {
        //     var selectedDay = calendar.getSelectYear() + '-' + pad(calendar.getSelectMonth(), 2) + '-' + pad(calendar.getSelectDate(), 2)
        //     var cal_date = calendar.getSelectYear() + '.' + calendar.getSelectMonth() + '.' + calendar.getSelectDate();
        //     document.calForm.date.value = selectedDay;
        //     var dealer_cd = document.calForm.service.value;
            
		// 	if (!calendar.getSelectDate()) {
		// 		alert("희망 날짜를 선택해주세요");
		// 		return false;
		// 	}

        //     checkHoliday(selectedDay, dealer_cd)

		// 	return false;
        // }

		

        // function checkHoliday(selectedDay, dealer_cd) {
        //     var res;

        //     $.ajax({
        //         url: '/ajax/ajax.getHoliday.php',
        //         type:'get',
        //         data: {resvt_day: selectedDay, dealer_cd: dealer_cd},
        //         dataType: 'text',
        //         success: function(_res){
        //             res = _res;
        //             res = res.replace(/\s+/, "");//왼쪽 공백제거
        //             res = res.replace(/\s+$/g, "");//오른쪽 공백제거
        //             res = res.replace(/\n/g, "");//행바꿈제거
		// 			res = res.replace(/\r/g, "");//엔터제거
		// 			console.log(res);
        //         }, complete: function() {
        //             if (res == "N") {
        //                 document.calForm.submit();
        //             } else {
        //                 alert("선택해주신 날짜는 공휴일 입니다.\n\n다른 날짜로 선택 부탁드립니다.");
        //             }
        //         }, error: function(e) {
        //             console.log(e)
        //         }
        //     });
            
        // }
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>