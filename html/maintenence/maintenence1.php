<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "maintenence";
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
        <div class="container">
			<ul class="select">
				<li class="date">
					<select id="resvt_year" name="resvt_year">
						<option value="2020">2020년</option>
						<option value="2019">2019년</option>
						<option value="2018">2018년</option>
					</select>
				</li>
				<li class="model">
					<select id="vin" name="vin">
						<option value="">전체</option>
						<? foreach($vehicles as $vehicle) { ?>
						<option value="<?=$vehicle['vehicl_no']?>"><?=$vehicle['car_no']?></option>
						<? } ?>
					</select>				
				</li>
			</ul>
        </div>
        
        <div class="txt-con-wrap record2"> 
            <div class="data-box-wrap">
                <div class="data-box">
                    <a href="maintenence2.php">
                        <ul class="list-data">
                            <li><b>정비완료</b> 2020-03-25</li>
                            <li><b>서비스센터</b> 볼보 강남 대치 서비스센터</li>
                        </ul>
                    </a>
                </div>
                <div class="data-box">
                    <a href="maintenence2.php">
                        <ul class="list-data">
                            <li><b>정비완료</b> 2020-00-00</li>
                            <li><b>서비스센터</b> 볼보 강남 대치 서비스센터</li>
                        </ul>
                    </a>
                </div>
                <div class="data-box">
                    <a href="maintenence2.php">
                        <ul class="list-data">
                            <li><b>정비완료</b> 2020-00-00</li>
                            <li><b>서비스센터</b> 볼보 강남 대치 서비스센터</li>
                        </ul>
                    </a>
                </div>
            </div>

        </div>

        <!-- 콘텐츠 끝 -->
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>