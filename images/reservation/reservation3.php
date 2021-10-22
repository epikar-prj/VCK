<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
	echo "<script>alert('볼보 고객만 가능한 서비스 입니다.');</script>";
	MgMoveURL('/html/member/login.php');
}

if (!isOwnered()) {
	echo "<script>alert('볼보 고객만 가능한 서비스 입니다.');history.back();</script>";
}

$CODE = "reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

$service = $_GET['service'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/reservation/reservation1.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
			<div class="page">
				<p><strong>02</strong><span>03</span></p>
			</div>
        </div>

		<div id="visual">
			<img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
		</div>

        <div class="container">

			<form name="calForm" id="checkForm" action="/html/reservation/reservation4.php" method="get">

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
				<input type="hidden" name="date" id="date">

				<!-- <div class="input_box gray">
					<select>
						<option selected="" disabled="" value="">시간 선택</option>
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                    </select>
				</div> -->

				<div class="btn_group mt20">
					<a class="btn" href="/html/reservation/reservation2.php">이전</a>
					<a class="btn bg_color1" href="javascript: void(0)" onclick="checkValidate()">다음</a>
				</div>
			</form>
		</div>
			
    </div>
    <script>
        var sat_rest = '<?=PARAM2('sat_rest')?>';
    </script>
    <script src="/html/<?=$CODE?>/script2.js?ver=<?$date_code?>"></script>
	
	<script>
        function checkValidate() {
            var selectedDay = calendar.getSelectYear() + '-' + pad(calendar.getSelectMonth(), 2) + '-' + pad(calendar.getSelectDate(), 2)
            var cal_date = calendar.getSelectYear() + '.' + calendar.getSelectMonth() + '.' + calendar.getSelectDate();
            document.calForm.date.value = selectedDay;
            var dealer_cd = document.calForm.service.value;
            
			if (!calendar.getSelectDate()) {
				alert("희망 날짜를 선택해주세요");
				return false;
			}

            checkHoliday(selectedDay, dealer_cd)

			return false;
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