<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "maintenence_record";
$FOOTER_CODE = "service";
$TITLE = "정비 이력";

if (!isLogined()) {
    MgMoveURL('/html/member/login.php');
}

$resvt_year = $_GET["resvt_year"];
if (!$resvt_year) {
    $resvt_year = date("Y");
}


$vehicles = getVehicleInfoToArray()['resultData'];
$recode_list = getVehicleRepairRecodeListToArray($resvt_year, $vehicles[0]['vehicl_no'])['resultData'];

$centerJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/json/service.json');
$centerArr = json_decode($centerJson, true);

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
						<option value="2021" <?if ($resvt_year == "2021") { echo "selected"; }?>>2021년</option>
						<option value="2020" <?if ($resvt_year == "2020") { echo "selected"; }?>>2020년</option>
						<option value="2019" <?if ($resvt_year == "2019") { echo "selected"; }?>>2019년</option>
						<option value="2018" <?if ($resvt_year == "2018") { echo "selected"; }?>>2018년</option>
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
                <?
                $index = 0;
                foreach($recode_list as $item) {
                    // print_r($item);
					$center = [];
                    foreach($centerArr as $row) {
                        if ($row['code'] == $item['dlr_cd']) {
                            $center = $row;
                        }

                    }
                ?>
                <div class="data-box">
                    <a href="/html/maintenence_record/record2.php?seq=<?=$index?>&resvt_year=<?=$resvt_year?>">
                        <ul class="list-data">
                            <li><b>정비완료</b> <?=substr($item['repair_date'], 0, 4) . "-" . substr($item['repair_date'], 4, 2) . "-" . substr($item['repair_date'], 6, 2)?></li>
                            <li><b>서비스센터</b> <?=$center['name']?></li>
                        </ul>
                    </a>
                </div>
                <?
                $index ++;
                }

                if (!$index) {
                ?>
                <div class="data-box" style="text-align: center;">
                    <p>정비이력이 없습니다.</p>
                </div>
                <?}?>
                
                <!--<div class="data-box">
                    <a href="/html/maintenence_record/record2.php">
                        <ul class="list-data">
                            <li><b>정비완료</b> 2020-00-00</li>
                            <li><b>서비스센터</b> 볼보 강남 대치 서비스센터</li>
                        </ul>
                    </a>
                </div>
                <div class="data-box">
                    <a href="/html/maintenence_record/record2.php">
                        <ul class="list-data">
                            <li><b>정비완료</b> 2020-00-00</li>
                            <li><b>서비스센터</b> 볼보 강남 대치 서비스센터</li>
                        </ul>
                    </a>
                </div>-->
            </div>
        </div>

        <!-- 콘텐츠 끝 -->
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

    <script>
        $(window).on("load", function() {
            app.hideOverlayProgress();
        })
        $("#resvt_year").on("change", function() {
            app.showOverlayProgress();
            var val = $(this).val();
            location.href = '?resvt_year=' + val;
        })
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>