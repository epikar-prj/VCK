<?
setLocale(LC_ALL, "ko_KR.utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "maintenence_check";
$FOOTER_CODE = "service";
$TITLE = "실시간 정비 알림";

if (!isLogined()) {
    MgMoveURL('/html/member/login.php');
}

$master_cust_cd = $_COOKIE['master_cust_cd'];

$sql = " select
t.vehicle_no, t.car_no, t.repair_type, t.repair_step, t.service_center, t.complete_time, t.message, t.model, t.pst_img, t.pst_id, t.pst_name, t.warranty_check, t.delivery_date, t.center_name, t.service_center, t.enter_time, t.free, t.regdate
from(
select
    *
from volvo_send_push_repair
where (vehicle_no, car_no, sid) in (
    select vehicle_no, car_no, max(sid) as sid
    from volvo_send_push_repair where master_cust_cd = '{$master_cust_cd}' and car_no <> '' group by vehicle_no, car_no 
)
order by sid desc
) t
group by t.vehicle_no, t.car_no, t.repair_step, t.repair_type, t.service_center, t.complete_time, t.message, t.model, t.pst_img, t.pst_id, t.pst_name, t.warranty_check, t.delivery_date, t.center_name, t.service_center, t.enter_time, t.free, t.regdate  ";

$result = $db->fetch_array($sql);
$count = count($result);
// print_r($result);


$url = "https://sv2.esurvey.kr/vcka/api_status.asp";

$ch = curl_init();                                 //curl 초기화
curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
 
$response = curl_exec($ch);

curl_close($ch);
$complete = json_decode($response, true)["complete"];

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');


if (!$count) {
    echo "<script>alert('정비중인 차량이 없습니다.');location.href='/html/footerMenu/service.php'</script>";
}
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/service.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <div id="visual">
            <img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
        </div>

        <div class="container">
            <ul class="slide">
                <? 
                $index = 0;
                foreach($result as $row) { 
                    $pageClass = "";
                    if ($index == 0) { $pageClass = "active"; }
                    else { $pageClass = "next"; }
                    
                    $step = "";
                    $msg = "";

                    $centerJson = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/json/service.json"), true);
                    // print_r($centerJson);
                    $center = [];
                    foreach($centerJson as $item) {
                        if ($item['code'] == $row['service_center']) {
                            $center = $item;
                        }
                    }

                    $compTime = strftime("%p %l시 %M분", strtotime($row['complete_time']));
                    switch ($row['repair_step']) {
                        case "enter":
                            $step = "step1";
                            $msg = "고객님의 차량이 입고되어 정비 준비 중 입니다.";
                            if ($row['repair_type'] != "nor") {
                                $msg = "고객님의 차량이 입고되어 수리 준비 중 입니다.";
                            }
                            break;
                        case "working":
                            $step = "step2";
                            $msg = "고객님의 차량 정비가 시작되었습니다.<br><span>예상 정비 완료 시간은 " . $compTime . " 입니다.";
                            if ($row['repair_type'] != "nor") {
                                $msg = "고객님의 차량 수리가 시작되었습니다.<br><span>예상 수리 완료 시간은 " . $compTime . " 입니다.";
                            }
                            break;
                        case "out_stand_by":
                            $step = "step3";
                            $msg = "고객님의 차량 정비가 완료 되었습니다.<br> 고객 라운지에서 잠시 대기해 주시면<br> 곧 출고 안내를 도와 드리겠습니다.";
                            if ($row['repair_type'] != "nor") {
                                $msg = "고객님의 차량 수리가 완료 되었습니다.<br>담당 어드바이저를 통해 출고 안내를 도와 드리겠습니다.";
                            }
                            break;
                        case "out_vehicle":
                            $step = "step4";
                            $msg = "볼보자동차 서비스센터를 <br> 이용해 주셔서 감사 드립니다. <br> 더 나은 서비스 제공을 위해 해피콜 또는 문자를 <br> 3일 이내 보내드릴 예정입니다.";
                            break;
                        default:
                            $step = "";
                            break;
                    }

                    
                    ?>
                <li class="<?=$pageClass?>">
                    <div class="content <?=$step?>">
                        <ul class="tel">
                            <li>
                                <span>차량 번호</span><strong><?=$row['car_no']?></strong>
                                <? if ($count > 1) { ?>
                                <div class="slideBtn">
                                    <div class="inner">
                                        <a href="javascript: void(0)" class="prev" onclick="movePrev()"></a>
                                        <a href="javascript: void(0)" class="next" onclick="moveNext()"></a>
                                    </div>
                                </div>
                                <? } ?>
                            </li>
                        </ul>

                        <div class="addr_info">
                            <strong><?=$center['name']?></strong>
                            <p><?=$center['addr']?>
                                <br>Tel. <?=$center['phone']?></p>
                        </div>

                        <ul class="progress">
                            <li>입고</li>
                            <li>정비중</li>
                            <li>출고대기</li>
                            <li>정비완료</li>
                        </ul>

                        <div class="step_image_wrap">
                            <!-- <video src="/images/<?=$CODE?>/<?=$step?>.mp4" class="step1" loop="true" autoplay muted loop playsinline></video> -->
                            <img src="/images/<?=$CODE?>/<?=$step?>.gif" alt="">
                        </div>

                        <p class="step_msg step1"><?=str_replace(".", ".<br>", $row["message"])?></p>

						<?if ($step == "step4") {?>
							<p class="step_msg" style="margin-top:20px; color:#999;">* 서비스 센터 경험 설문조사 기간이 종료되었습니다.</p>
                        <?}?>

                        <?if ($step == "step1" || $step == "step2") {?>
                        <a href="/html/maintenence_near/?center=<?=$center['code']?>" class="btnNear">센터 인근 가볼만 한 곳</a>
                        <?}?>

						
						
                        
                </li>
                <?
                    $index ++;
                }?>
                <?
                if (!$index) {?>
                    <li class="empty" style="padding: 80px 0px; text-align: center;">
                        <p>정비중인 차량이 없습니다.</p>
                    </li>
                <?}?>
            </ul>
        </div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>