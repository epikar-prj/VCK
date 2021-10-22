<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "reservation_list";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약 관리";

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
			<ul class="select">
				<li class="date">
					<select>
						<option>2020년</option>
						<option>2019년</option>
						<option>2018년</option>
					</select>
				</li>
				<li class="model">
					<select>
						<option>전체</option>
						<option>00가0000</option>
						<option>00가0001</option>
						<option>00가0002</option>
						<option>00가0003</option>
					</select>				
				</li>
			</ul>
			<ul class="list">
				<li>
					<a href="javascript:void(0);">
						<dl>
							<dt>희망 날짜</dt>
							<dd>2020-04-01</dd>
						</dl>
						<dl>
							<dt>차량번호</dt>
							<dd>OO가OOOO</dd>
						</dl>
						<dl>
							<dt>서비스센터</dt>
							<dd>볼보 강남 대치 서비스센터<br>(031-385-7255)</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<dl>
							<dt>희망 날짜</dt>
							<dd>2020-04-01</dd>
						</dl>
						<dl>
							<dt>차량번호</dt>
							<dd>OO가OOOO</dd>
						</dl>
						<dl>
							<dt>서비스센터</dt>
							<dd>볼보 강남 대치 서비스센터<br>(031-385-7255)</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<dl>
							<dt>희망 날짜</dt>
							<dd>2020-04-01</dd>
						</dl>
						<dl>
							<dt>차량번호</dt>
							<dd>OO가OOOO</dd>
						</dl>
						<dl>
							<dt>서비스센터</dt>
							<dd>볼보 강남 대치 서비스센터<br>(031-385-7255)</dd>
						</dl>
					</a>
				</li>
			</ul>
        </div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>