<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "maintenence_record";
$FOOTER_CODE = "service";
$TITLE = "정비 이력";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/service.php">
                    <img src="/images/common/ic_back.png" alt="뒤로가기">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <!-- 콘텐츠 시작 -->
        <div class="txt-con-wrap">
            <div class="car-num-navigation">
                <strong class="car-num">123 가 4567</strong>
            </div>
            <ul class="calendar-btn-box">
                <li class="cal-btn start">조회 시작일</li>
                <li class="cal-btn end">조회 완료일</li>
            </ul>
        </div>

        <!-- 달력 시작 -->
        <div class="container">
			<form name="calForm" id="checkForm" action="/html/reservation/reservation3.php" method="get">
            <table id="calendar1" class="calendar on">
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

                <div class="cal-btn-box">
					<a class="btn" href="#">조회</a>
				</div>
			</form>
        </div>
        <!-- 달력 끝 -->
        <!-- 콘텐츠 끝 -->
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>