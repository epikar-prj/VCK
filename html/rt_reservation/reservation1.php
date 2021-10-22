<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "rt_reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

$service = $_GET['service'];
$master_cust_cd = $_GET['master_cust_cd'];
$id = $_GET['id'];
$resvt_tel = $_GET['resvt_tel'];
$vin = $_GET['vin'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/reservation/reservation2.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
			<div class="page">
				<p><strong>02</strong><span>04</span></p>
			</div>
        </div>

		<!--<div id="visual">
			<img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
		</div>-->

        <div class="container">
            <div class="check_service">
                <div class="title">서비스 항목 선택</div>
                <form name="serviceForm" id="checkForm" action="/html/rt_reservation/reservation2.php" method="get">
                <input type="hidden" name="service_item_seq" value="">
                <input type="hidden" name="tot_work_time" value="0">
                <input type="hidden" name="master_cust_cd" value="<?=$master_cust_cd?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="resvt_tel" value="<?=$resvt_tel?>">
                <input type="hidden" name="vin" value="<?=$vin?>">
                    <ul></ul>
					<p class="caption">
						추가 정비 비용이 발생할 수 있으며, 자세한 내용은 서비스센터를 통해 확인하시기 바랍니다.
					</p>
                    <div class="btn_group mt20">
                        <a class="btn" href="javascript:history.back();">이전</a>
                        <a class="btn bg_color1" href="javascript: void(0)" onclick="checkValidate()">다음</a>
                    </div>
                </form>
            </div>
		</div>
    </div>
    <script src="/html/<?=$CODE?>/script.js?ver=<?$date_code?>"></script>
	
	<script>

        var vin = "<?=$vin?>";

        $(window).on("load", function() {
            app.showOverlayProgress();
            $.ajax({
                url: '/ajax/ajax.getReserveCategory_test.php',
                type:'get',
                data: {vin: vin},
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
                '<input type="checkbox" name="service_check" class="service" data-worktime="' + item.work_time + '" value="' + item.seq_id + '">' +
                '<span>' + item.item_nm + '</span>' +
                '</label>' +
                '</div>' +
                '</li>';

                $ul.append(li);
            });
        }


        function checkValidate() {

            moveNext();
			return false;
        }

        function moveNext() {
            var values = $('input:checkbox[name=service_check]:checked').length;
			if(values < 1){
				alert('서비스 항목을 선택해주세요.');
				return false;				
			}

            alert('실시간 예약은 선택한 서비스 항목 외 추가 요청은 현장 상황에 따라 진행이 불가할 수 있습니다.');

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

        function getDuplicateResvt() {
            app.showOverlayProgress();

            var res;

            $.ajax({
                url:'/ajax/ajax.getDuplicateResvt.php',
                type:'post',
                data: {
                    vin: vin
                },
                dataType: 'json',
                success: function(_res){
                    if (_res.result == "success") {
                        var duplicate = _res.resultData[0].duplication_check;
                        if (duplicate == "N") {
                            moveNext();
                        } else {
                            alert("현재 예약이 완료된 일정이 있습니다. \n기 완료된 일정을 취소 후 진행 해 주시기 바랍니다.");
                            app.hideOverlayProgress();
                        }
                    } else {
                        alert(_res.result);
                        app.hideOverlayProgress();
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            })
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