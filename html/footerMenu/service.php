<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "footerMenu";
    $FOOTER_CODE = "service";
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');

    $master_cust_cd = $_COOKIE['master_cust_cd'];

    $sql = " select * from volvo_send_push_repair where master_cust_cd = '{$master_cust_cd}' and car_no <> '' and repair_step = 'out_vehicle' and regdate > '2021-03-19 00:00:00' order by enter_time desc limit 0, 1  ";
    $surveyRow = $db->fetch_array($sql)[0];

   $surveyLink = "";
    if (count($surveyRow) > 0) {
        $surveyLink = "https://sv2.esurvey.kr/vcka/in.asp?master_cust_cd=".urlencode($master_cust_cd)."&model=".urlencode($surveyRow["model"])."&delivery_date=".urlencode($surveyRow["delivery_date"])."&warranty_check=".urlencode($surveyRow["warranty_check"])."&pst_img=".urlencode($surveyRow["pst_img"])."&pst_id=".urlencode($surveyRow["pst_id"])."&pst_name=".urlencode($surveyRow["pst_name"])."&center_name=".urlencode($surveyRow["center_name"])."&service_center=".urlencode($surveyRow["service_center"])."&enter_time=".urlencode($surveyRow["enter_time"])."&free=".urlencode($surveyRow["free"]);
        $surveyTarget = "_blank";
    } else {
        $surveyLink = "javascript: alert('고객님은 이번 설문 대상자가 아닙니다');";
        $surveyTarget = "";
    }
?>
<!-- <?=$sql?> -->
<!-- <?print_r($surveyRow)?> -->
<div id="contents">
    <div id="fm-service" class="fm_wrap">
        <div class="visual">
            <!-- <img src="/images/footermenu/notice.jpg" alt=""> -->
            <div class="title">
                <strong>Service</strong>
            </div>
        </div>
        <div class="list">
            <ul>
                <li>
                    <a href="/html/center/index.php">
                        <strong>서비스 센터 안내</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/reservation/reservation2.php" data-type="owner">
                        <strong>서비스 센터 예약</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/reservation_list/list.php" data-type="owner">
                        <strong>서비스 센터 예약 관리</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/maintenence_check/index.php" data-type="owner">
                        <strong>실시간 정비 알림</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/maintenence_record/record1.php" data-type="owner">
                        <strong>정비 이력</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/warranty/index.php">
                        <strong>평생 부품 보증</strong>
                    </a>
                </li>
                <li>
                    <a href="https://www.car.go.kr/home/main.do" target="_blank">
                        <strong>리콜 조회</strong>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?=$surveyLink?>" target="<?=$surveyTarget?>">
                        <strong>Survey</strong>
                    </a>
                </li> -->
            </ul>
        </div>
        <div class="fm-back">
            <a href="/index.php" class="animsition-link">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>

