<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "rt_reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

$service = $_GET['service'];
$service_list = $_GET['service_list'];

$service_item_seq = $_GET['service_item_seq'];
$dealer_cd = PARAM2('service');
$vin = PARAM2('vin');
$resvt_tel = PARAM2('resvt_tel');


$possibleYN = json_decode(getPossibleCenter($service), true)["result"];
if ($possibleYN != "success") {
    echo "<script>alert('선택하신 센터는 현재 실시간 예약을 지원하지 않습니다. \\n일반 예약으로 진행 해 주시기 바랍니다.'); history.back(-1); </script>";
}

$centerJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/json/service.json');
$centerArr = json_decode($centerJson, true);

$center = [];
foreach($centerArr as $row) {
    if ($row['code'] == $dealer_cd) {
        $center = $row;
    }
}



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
				<p><strong>04</strong><span>04</span></p>
			</div>
        </div>

		<div id="visual">
			<img src="/images/reservation/img_visual-1.jpg" alt="">
		</div>

        <div class="container">

			<form name="calForm" id="checkForm" action="#" method="get">
                <input name="service" type="hidden" id="select_service"></input>
                <input name="sat_rest" type="hidden" id="sat_rest"></input>
				<input name="service_item_seq" type="hidden" id="service_item_seq" value="<?=$_GET['service_item_seq']?>"></input>
                <input name="tot_work_time" type="hidden" id="tot_work_time" value="<?=$_GET['tot_work_time']?>"></input>
                <input name="service_list" type="hidden" id="service" value="<?=$_GET['service']?>"></input>
                <input name="master_cust_cd" type="hidden" id="master_cust_cd" value="<?=$_GET['master_cust_cd']?>"></input>
                <input name="id" type="hidden" id="id" value="<?=$_GET['id']?>"></input>
                <input type="hidden" name="dealer_cd" value="<?=$dealer_cd?>">
                <input type="hidden" name="service" id="select_service" value="<?=$service?>"></input>
                <input type="hidden" name="vin" id="vin" value="<?=$vin?>"></input>
                <input type="hidden" name="resvt_tel" id="resvt_tel" value="<?=$resvt_tel?>"></input>
				<input type="hidden" name="resvt_day" id="date">
                <input type="hidden" name="centerName" value="<?=$center['name']?>">
                
				
                <table id="calendar" class="calendar">
					<caption>
						<a href="#" class="prev"><i></i></a>
						<div class="cur_month">
							<span class="year"></span>.<span class="month"></span>
						</div>
						<a href="#" class="next"><i></i></a>
					</caption>
					<thead>
						<tr>
							<th>SUN</th><th>MON</th><th>TUE</th><th>WED</th>
							<th>THU</th><th>FRI</th><th>SAT</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						</tr>
					</tbody>
				</table>

				
                <?if ($service_item_seq != "999") {?>
				<div class="input_box gray">
					<select id="selectTime" name="select_time">
						<option selected="" disabled="" value="">시간 선택</option>
                        
                        
                    </select>
				</div>
                <?}?>
				<div class="btn_group mt20">
					<a class="btn" href="javascript:history.back();">이전</a>
					<a class="btn bg_color1" href="javascript: void(0)" onclick="checkValidate()">예약신청</a>
				</div>
			</form>
		</div>
			
    </div>
    <script>
        var sat_rest = '<?=PARAM2('sat_rest')?>';
    </script>
    <script src="/html/<?=$CODE?>/script.js?ver=<?$date_code?>"></script>
	
	<script>
        function checkValidate() {
            var f = document.calForm
            if (!f.resvt_day.value) {
                alert("희망 날짜를 선택해주세요");
                return false;
            }
            <?if ($service_item_seq != "999") {?>
            if (!f.select_time.value) {
                alert("희망 시간를 선택해주세요");
                return false;
            }
            <?}?>
            // f.submit();
            postVehicleRepairResvt();
			return false;
        }

        var selectTime = "";
        function getSelectTime(_date) {
            if (selectTime != _date) {
                selectTime = _date;
            } else {
                return false;
            }
            app.showOverlayProgress();

            var f = document.calForm;

            $.ajax({
                url: '/ajax/ajax.getHoliday.php',
                type:'get',
                data: {resvt_day: _date, dealer_cd: f.dealer_cd.value},
                dataType: 'text',
                success: function(_res){
                    res = _res;
                    res = res.replace(/\s+/, "");//왼쪽 공백제거
                    res = res.replace(/\s+$/g, "");//오른쪽 공백제거
                    res = res.replace(/\n/g, "");//행바꿈제거
					res = res.replace(/\r/g, "");//엔터제거
					console.log(res);
                }, complete: function() {
                    if (res == "N") {
                        $.ajax({
                            url: '/ajax/ajax.getServiceTime.php',
                            type:'get',
                            data: {resvt_day: _date, dealer_cd: f.dealer_cd.value, tot_work_time: f.tot_work_time.value},
                            dataType: 'json',
                            success: function(_res){
								// console.log(_res)
								if (_res.result == "success") {
									setSelectTime(_res.resultData);
								} else {
                                    alert(_res.result);
                                    app.hideOverlayProgress();
                                }
                                
                                document.calForm.resvt_day.value = _date;
                                console.log(_res);
                            }, complete: function() {
                                app.hideOverlayProgress();
                            }, error: function(e) {
                                console.log(e)
                                app.hideOverlayProgress();
                            }
                        });
                    } else {
                        alert("선택해주신 날짜는 공휴일 입니다.\n\n다른 날짜로 선택 부탁드립니다.");
                        app.hideOverlayProgress();
                    }
                }, error: function(e) {
                    console.log(e)
                    app.hideOverlayProgress();
                }
            });
        }


        function setSelectTime(data) {
            var $selectbox = $("#selectTime");
            $selectbox.empty();
            $selectbox.append('<option selected="" disabled="" value="">시간 선택</option>');

            // console.log(data[0])
            // console.log(data[0]['select_time '])

			if (data[0].select_time_cnt > 0) {
				$.each(data[0].select_time, function(key, item) {
					var option = '<option value="' + key + '">' + item + '</option>';
					console.log(option)
					$selectbox.append(option);
				});
			} else {
				alert("해당 일자에 선택 가능한 시간이 없습니다.\n다른 일자로 예약을 진행해주십시오.");
			}
            
        }
		

        function checkHoliday(selectedDay, dealer_cd) {
            var res;

            $.ajax({
                url: '/ajax/ajax.getHoliday.php',
                type:'get',
                data: {resvt_day: selectedDay, dealer_cd: dealer_cd},
                dataType: 'text',
                success: function(_res){
                    res = _res;
                    res = res.replace(/\s+/, "");//왼쪽 공백제거
                    res = res.replace(/\s+$/g, "");//오른쪽 공백제거
                    res = res.replace(/\n/g, "");//행바꿈제거
					res = res.replace(/\r/g, "");//엔터제거
					console.log(res);
                }, complete: function() {
                    if (res == "N") {
                        document.calForm.submit();
                    } else {
                        alert("선택해주신 날짜는 공휴일 입니다.\n\n다른 날짜로 선택 부탁드립니다.");
                    }
                }, error: function(e) {
                    console.log(e)
                }
            });
            
        }


        function postVehicleRepairResvt() {
            app.showOverlayProgress();
            var f = document.calForm;
            var res;


            // 시간체크
            var today = new Date();
            // var today = new Date("2021-02-03 18:00");
            var selectTime = f.select_time.options[f.select_time.selectedIndex].text;
            var resvt_date = new Date(f.resvt_day.value + " " + selectTime);
            
            if (today > resvt_date) {
                alert("현재 시간보다 이전 시간을 선택하셨습니다. \n예약 일시를 다시 한 번 확인 해 주시기 바랍니다.");
                app.hideOverlayProgress();
                return false;
            }

            $.ajax({
                url:'/ajax/ajax.postRTVehicleRepairResvt.php',
                type:'post',
                data: {
                    master_cust_cd: f.master_cust_cd.value,
                    id: f.id.value,
                    vin: f.vin.value,
                    dealer_cd: f.dealer_cd.value,
                    resvt_tel: f.resvt_tel.value,
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
                        var time = f.select_time.value.split("-")[1];
                        alert(f.resvt_day.value + " " + time.substring(0, 2) + ":" + time.substring(2, 4) + "시 " + f.centerName.value + " 예약이 완료되었습니다. 예약 내용은 예약 관리에서도 확인이 가능합니다.")
                        location.replace("/html/reservation_list/list.php");
                    } else if (res.errorcode == "PastResvtDay") {
                        app.hideOverlayProgress();
                        alert("현재시간보다 이전 날짜를 선택하셨습니다. \n예약일을 다시 한 번 확인 해 주시기 바랍니다.");
                    } else if (res.errorcode == "PastResvtDate") {
                        app.hideOverlayProgress();
                        alert("현재시간보다 이전 시간을 선택하셨습니다. \n예약시간을 다시 한 번 확인 해 주시기 바랍니다.");
                    } else if (res.errorcode == "NotSupplyResvtCenter") {
                        app.hideOverlayProgress();
                        alert("선택하신 센터는 현재 실시간 예약을 지원하지 않습니다. \n일반예약으로 진행 해 주시기 바랍니다.");
                    } else if (res.errorcode == "alreadyResvt") {
                        app.hideOverlayProgress();
                        alert("이미 예약이 완료된 시간입니다.\n다른 일정을 선택하시거나 일반 예약으로 진행 해 주시기 바랍니다.");
                    } else if (res.errorcode == "duplicationResvt") {
                        app.hideOverlayProgress();
                        alert("이미 예약된 다른 자료가 있습니다. \n중복 예약은 불가합니다.");
                    } else if (res.errorcode == "CutinResvt") {
                        app.hideOverlayProgress();
                        alert("선택한 시간부터 완료시간 사이에 다른 예약이 되어 있습니다.\n다른 일정을 선택하시거나 일반 예약으로 진행 해 주시기 바랍니다.");
                    } else {
                        app.hideOverlayProgress();
                        alert("예약 도중 오류가 발생했습니다. \n예약을 다시 진행해주시거나 오류 반복 시 고객지원센터로 문의 부탁드립니다. \n고객지원센터 : 1588 - 1777");
                    }
                }, error: function(e) {
                    app.hideOverlayProgress();
                    console.log(e)
                }
            });
        }
	</script>
    
    <script>
        // $(window).on("load", function() {
        //     app.showOverlayProgress();
        //     $.ajax({
        //         url: '/ajax/ajax.getPossibleCenter.php',
        //         type:'get',
        //         data: { dealer_cd: '<?=$service?>' },
        //         dataType: 'json',
        //         success: function(_res){
        //            	if (_res.result != "success") {
        //                 alert("선택하신 센터는 현재 실시간 예약을 지원하지 않습니다. \n일반예약으로 진행 해 주시기 바랍니다.");
        //                 history.back(-1);
        //             } else {
        //                 app.hideOverlayProgress();
        //             }
        //         },
        //         error: function(e) {
        //             console.log(e)
        //             app.hideOverlayProgress();
        //         }
        //     });
        // })
    </script>
<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>