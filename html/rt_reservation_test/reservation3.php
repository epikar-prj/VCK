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
				<p><strong>03</strong><span>04</span></p>
			</div>
        </div>

		<div id="visual">
			<img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
		</div>

        <div class="container">

			<form name="calForm" id="checkForm" action="/html/rt_reservation_test/reservation4.php" method="get">
                <input name="service_item_seq" type="hidden" id="service_item_seq" value="<?=$_GET['service_item_seq']?>"></input>
                <input name="tot_work_time" type="hidden" id="tot_work_time" value="<?=$_GET['tot_work_time']?>"></input>
				
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

				<input type="hidden" name="service" id="select_service" value="<?=$service?>"></input>
				<input type="hidden" name="resvt_day" id="date">

				<div class="input_box gray">
					<select id="selectTime" name="select_time">
						<option selected="" disabled="" value="">시간 선택</option>
                        
                        
                    </select>
				</div>

				<div class="btn_group mt20">
					<a class="btn" href="/html/<?=$CODE?>/reservation1.php">이전</a>
					<a class="btn bg_color1" href="javascript: void(0)" onclick="checkValidate()">다음</a>
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

            if (!f.select_time.value) {
                alert("희망 시간를 선택해주세요");
                return false;
            }

            f.submit();

			return false;
        }


        function getSelectTime(_date) {
            app.showOverlayProgress();

            var f = document.calForm;

            $.ajax({
                url: '/ajax/ajax.getHoliday.php',
                type:'get',
                data: {resvt_day: _date, dealer_cd: f.service.value},
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
                            data: {resvt_day: _date, dealer_cd: f.service.value, tot_work_time: f.tot_work_time.value},
                            dataType: 'json',
                            success: function(_res){

                                setSelectTime(_res.resultData);
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
            $.each(data[0].select_time, function(key, item) {
                var option = '<option value="' + key + '">' + item + '</option>';

                $selectbox.append(option);
            });
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
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>