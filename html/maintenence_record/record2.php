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

$seq = $_GET["seq"];

$vehicles = getVehicleInfoToArray()['resultData'];
$recode_list = getVehicleRepairRecodeListToArray($resvt_year, $vehicles[0]['vehicl_no'])['resultData'];
$recode = $recode_list[$seq];

$centerJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/json/service.json');
$centerArr = json_decode($centerJson, true);

$center = [];
foreach($centerArr as $row) {
	if ($row['code'] == $recode['dlr_cd']) {
		$center = $row;
	}
}

$rep_type = "";
if ($recode['repair_type'] == "nor") {
	$rep_type = "일반 정비";
} else {
	$rep_type = "보험 수리";
}


// var_dump($recode);

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="javascript: app.showOverlayProgress(); location.href='record1.php?resvt_year=<?=$resvt_year?>'">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>
        <!-- 콘텐츠 시작 -->
        <div class="txt-con-wrap record3">
            <div class="car-num-navigation">
                <strong class="car-num"><?=$recode['car_no']?></strong>
            </div>
            <!-- <ul class="term-btn-box">
                <li class="term-btn"><span>2020.01.01 - 2020.03.10</span></li>
            </ul> -->

            <div class="data-detail-wrap">
                <div class="data-detail">
                    <ul class="db-list">
                        <li><b>정비완료</b> <?=substr($recode['repair_date'], 0, 4) . "-" . substr($recode['repair_date'], 4, 2) . "-" . substr($recode['repair_date'], 6, 2)?></li>
                        <li><b>예약차량</b> <?=$recode['model']?></li>
                        <li><b>차량번호</b> <?=$recode['car_no']?></li>
                        <li><b>정비내역</b>
                            <ul>
								<?foreach($recode['repair_list'] as $item) {?>
                                <li><?=$item?></li>
								<?}?>
                            </ul>
                        </li>
                        <li><b>서비스센터</b> <?=$center['name']?></li>
                    </ul>
                </div>
                <?if ($recode['pst_nm']) {?>
                <div class="data-detail personal">
                    <ul class="db-list">
                        <li><b>담당 정비사</b>
                            <ul>
                                <li class="name"><?=$recode['pst_nm']?></li>
                                <?if ($rep_type) {?>
                                <li class="part"><?=$rep_type?></li>
                                <?}?>
                                <?if ($recode['pst_tel']) {?>
                                <li class="tel"><a href="tel: <?=$recode['pst_tel']?>" target="_blank"><span>T. </span><?=add_hyphen($recode['pst_tel'])?></a></li>
                                <?}?>
                                <?if ($recode['pst_photo']) {?>
                                <li class="img"><img src="<?=$recode['pst_photo']?>"></li>
                                <?}?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?}?>
            </div>
            <p class="caption">* 정비 이력 조회는 일반정비 이력에 한해서만 서비스가 제공 됩니다. <br>보험수리 및 확인이 되지 않는 정보에 대해서는 해당 서비스센터로 문의 해 주시기 바랍니다.</p>
            
            
        </div>

        <!-- 콘텐츠 끝 -->
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>
    <script>
        $(window).on("load", function() {
            app.hideOverlayProgress();
        })
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>