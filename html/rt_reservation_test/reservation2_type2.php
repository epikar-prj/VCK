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
                <a href="/html/<?=$CODE?>/reservation1.php">
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


			<form action="/html/<?=$CODE?>/reservation3.php">

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

				<input type="hidden" name="date" id="date">
					
				<p class="description">* 서비스 센터와 통화 후 예약이 확정됩니다.</p>

				<div class="btn_group mt30">
					<a class="btn" href="/html/<?=$CODE?>/reservation1.php">이전</a>
					<button type="submit" class="btn bg_color1">예약 신청하기</button>
				</div>
			</form>
		</div>
			
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>
	
	<script>
		$('form').submit(function(e){
			$('#date').val(calendar.getSelectYear() + '.' + calendar.getSelectMonth() + '.' + calendar.getSelectDate());
			// calendar 객체는 script.js에 있습니다.
		})
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>