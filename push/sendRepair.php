<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

header('Content-Type: application/json');

$master_cust_cd = $_POST["master_cust_cd"];
$id = $_POST["id"];
$vehicle_no = $_POST["vehicle_no"];
$car_no = $_POST["car_no"];
$repair_type = $_POST["repair_type"];
$repair_step = $_POST["repair_step"];
$message = $_POST["message"];
$complete_time = $_POST["complete_time"];
$service_center = $_POST["service_center"];

$model = $_POST["model_name"];
$warranty_check = $_POST["warranty_check"];

$pst_id = $_POST["pst_id"];
$pst_name = $_POST["pst_name"];

$enter_time = $_POST["enter_time"];
$free = $_POST["free"];


$delivery_date = $_POST["delivery_date"];
$pst_img = $_POST["pst_img"];
$center_name = $_POST["center_name"];

if (!$pst_img) {
	$pst_img = "noimg";
}


$result = "";
$errorCode = 0;

if (!$enter_time) {
    $enter_time = '1900-01-01 00:00:00';
}

// $title = "HEJ, VOLVO 실시간 정비 알림";

if (!$message) {
    $result = "PUSH 메시지가 없습니다.";
    $errorCode = 1;
}

if (!$vehicle_no) {
    $result = "차대번호 값이 없습니다.";
    $errorCode = 1;
}

if (!$car_no) {
    $result = "차량번호 값이 없습니다.";
    $errorCode = 1;
}

if (!$service_center) {
    $result = "서비스센터의 코드값이 없습니다.";
    $errorCode = 1;
}

if (!$repair_step) {
    $result = "정비단계 코드값이 없습니다.";
    $errorCode = 1;
}

if (!$repair_type) {
    $result = "정비구분 값이 없습니다.";
    $errorCode = 1;
}

if (!$id) {
    $result = "유저 아이디 값이 없습니다.";
    $errorCode = 1;
}

if (!$master_cust_cd) {
    $result = "유저 코드 값이 없습니다.";
    $errorCode = 1;
} else {
    // 유저정보 가져오기
    // $userSql = "";
    // if ($master_cust_cd == '2356046' || $master_cust_cd == '2013355' || $master_cust_cd == '2040379') {
    //     $userSql = " SELECT * FROM volvo_user WHERE master_cust_cd = '{$master_cust_cd}' ";
    // } else {
    //     exit;
    // }
    $userSql = " SELECT * FROM volvo_user WHERE master_cust_cd = '{$master_cust_cd}' ";
    // $userSql = " SELECT * FROM volvo_user WHERE master_cust_cd = '2356046' "; // 테스트 (apptest@volvocars.com 계정만 불러옴) 
    $user = $db->row($userSql);

    $token = $user["tokken"];

    if (!$token) {
        $result = "고객님의 휴대폰 정보를 확인할 수 없습니다[4].";
        $errorCode = 4;
    }

    if ($user["use_push_recept_yn"] != 'Y') {
        $result = "고객님께서 PUSH 동의를 하지 않아 발송되지 않았습니다.";
        $errorCode = 5;
    }

    if (!$user) {
        $result = "고객님의 휴대폰 정보를 확인할 수 없습니다[3].";
        $errorCode = 3;
    }
}


if (!$errorCode) {
    $url = "https://fcm.googleapis.com/fcm/send";
    // $token = "eLMDoVtmHUI-rFStAiAGw9:APA91bH1IIb7JIDEtIdN-zavp02hN0ZsxDtJCHOvSUGxJlTh3fgfv58tmRi-E0O2hzmJ_5P1V6aeypZIyk7fWWBErdlJN0puKKuDBJPYrO9eWJFmck2KcuvqUoxDdYqLROOeCjr7Kofr";
    $serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
    $title = "";
    $link = "https://volvoapp.co.kr/html/maintenence_check/index.php";
    $notification = array('title' =>$title , 'body' => $message, 'sound' => 'default', 'customUrl' => $link);
    $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high', 'data' => array('customUrl' => 'https://www.volvoapp.co.kr/html/maintenence_check/'));

    $json = json_encode($arrayToSend);

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

    //Send the request
    $response = curl_exec($ch);
    $responseArr = json_decode($response, true);

    if (!$responseArr['success']) {

        if ($responseArr['results'][0]['error'] == 'NotRegistered') { 
            $result = "앱을 삭제한 사용자거나 메시지를 받을 수 없는 사용자입니다.[21 - " . $responseArr['results'][0]['error'] . "]";
        } else if ($responseArr['results'][0]['error'] == 'InvalidRegistration') { 
            $result = "알 수 없는 휴대폰(유저)입니다.[21 - " . $responseArr['results'][0]['error'] . "]";
        } else if ($responseArr['results'][0]['error'] == 'InvalidPackageName') { 
            $result = "알 수 없는 앱 또는 등록 되지 않은 앱입니다.[21 - " . $responseArr['results'][0]['error'] . "]";
        } else {
            $result = "PUSH 발송 시 시스템이 문제가 발생하였습니다. 시스템 담당자에게 문의해 주세요[21 - " . $responseArr['results'][0]['error'] . "]";
        }
        $errorCode = 21;
    }
    
    //Close request
    curl_close($ch);
}

$ifNumSql = " select count(*) from volvo_send_push_repair ";
$ifNum = $db->select_one( $ifNumSql );
$ifNum += 1;
$ifNum = sprintf('%010d',$ifNum);

$if = "IF_repair_push_" . $ifNum;

if (!$complete_time) {
    $query[] = "
    INSERT INTO volvo_send_push_repair ( 
        `IF`, `master_cust_cd`, `id`, `vehicle_no`, `car_no`, `model`, `warranty_check`, `pst_id`, `pst_name`, `enter_time`, `free`, `service_center`, `repair_type`, `repair_step`, `token`, `errorCode`, `result`, `regdate`, `message`, `delivery_date`, `pst_img`, `center_name`
    ) VALUES (
        '{$if}', '{$master_cust_cd}', '{$id}', '{$vehicle_no}', '{$car_no}', '{$model}', '{$warranty_check}', '{$pst_id}', '{$pst_name}', '{$enter_time}', '{$free}', '{$service_center}', '{$repair_type}', '{$repair_step}', '{$token}', '{$errorCode}', '{$result}', SYSDATE(), '{$message}', '{$delivery_date}', '{$pst_img}', '{$center_name}'
    )
    ";
} else {
    $query[] = "
    INSERT INTO volvo_send_push_repair ( 
        `IF`, `master_cust_cd`, `id`, `vehicle_no`, `car_no`, `model`, `warranty_check`, `pst_id`, `pst_name`, `enter_time`, `free`, `service_center`, `repair_type`, `repair_step`, `token`, `errorCode`, `result`, `regdate`, `complete_time`, `message`, `delivery_date`, `pst_img`, `center_name`
    ) VALUES (
        '{$if}', '{$master_cust_cd}', '{$id}', '{$vehicle_no}', '{$car_no}', '{$model}', '{$warranty_check}', '{$pst_id}', '{$pst_name}', '{$enter_time}', '{$free}', '{$service_center}', '{$repair_type}', '{$repair_step}', '{$token}', '{$errorCode}', '{$result}', SYSDATE(), '{$complete_time}', '{$message}', '{$delivery_date}', '{$pst_img}', '{$center_name}'
    )
    ";
}
// print_r($query);
// 쿼리 적용
$insertResult = $db->tran_query( $query );

$logQuery[] = " INSERT INTO volvo_query_log2 (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('repairPush', '" . $query[0] . "', '{$errorCode}', '" . json_encode($responseArr) . "', '{$result}', SYSDATE()); ";
$db->tran_query( $logQuery );

// print_r($query);


if(!$insertResult) {
    $result = "PUSH 발송 시 시스템이 문제가 발생하였습니다. 시스템 담당자에게 문의해 주세요[11]";
    $errorCode = 11;
} else {
    if (!$errorCode) {
        $result = "success";


        // if ($repair_step == "out_vehicle") {
        //     $today = strtotime(date("Y-m-d H:i"));
        //     $sdate = strtotime("2021-03-19 09:00");
    
        //     if ($today > $sdate) {
        //         $url2 = "https://sv2.esurvey.kr/vcka/api_status.asp";
    
        //         $ch2 = curl_init();
        //         curl_setopt($ch2, CURLOPT_URL, $url2);
        //         curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
        //         curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
            
        //         //Send the request
        //         $response2 = curl_exec($ch2);
        //         curl_close($ch2);
        //         if ($response2) {
        //             $compNum = json_decode($response2, true)["complete"];
        //             if ($compNum < 2000) {
        //                 $url = "https://fcm.googleapis.com/fcm/send";
        //                 // $token = "eLMDoVtmHUI-rFStAiAGw9:APA91bH1IIb7JIDEtIdN-zavp02hN0ZsxDtJCHOvSUGxJlTh3fgfv58tmRi-E0O2hzmJ_5P1V6aeypZIyk7fWWBErdlJN0puKKuDBJPYrO9eWJFmck2KcuvqUoxDdYqLROOeCjr7Kofr";
        //                 $serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
        //                 $title = "";
        //                 $link = "https://volvoapp.co.kr/html/maintenence_check/index.php";
        //                 $notification = array('title' =>$title , 'body' => "볼보 서비스센터를 이용해 주셔서 감사합니다. 지금 서비스센터 경험 설문조사에 참여하시면 스타벅스 기프티콘을 드립니다.", 'sound' => 'default', 'customUrl' => $link);
        //                 $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high', 'data' => array('customUrl' => 'https://www.volvoapp.co.kr/html/maintenence_check/'));
                    
        //                 $json = json_encode($arrayToSend);
                    
        //                 $headers = array();
        //                 $headers[] = 'Content-Type: application/json';
        //                 $headers[] = 'Authorization: key='. $serverKey;
                    
        //                 $ch = curl_init();
        //                 curl_setopt($ch, CURLOPT_URL, $url);
        //                 curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        //                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //                 curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        //                 curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                    
        //                 //Send the request
        //                 $response = curl_exec($ch);
        //                 $responseArr = json_decode($response, true);
                    
        //                 if (!$responseArr['success']) {
                    
        //                     if ($responseArr['results'][0]['error'] == 'NotRegistered') { 
        //                         $result = "앱을 삭제한 사용자거나 메시지를 받을 수 없는 사용자입니다.[31 - " . $responseArr['results'][0]['error'] . "]";
        //                     } else if ($responseArr['results'][0]['error'] == 'InvalidRegistration') { 
        //                         $result = "알 수 없는 휴대폰(유저)입니다.[31 - " . $responseArr['results'][0]['error'] . "]";
        //                     } else if ($responseArr['results'][0]['error'] == 'InvalidPackageName') { 
        //                         $result = "알 수 없는 앱 또는 등록 되지 않은 앱입니다.[31 - " . $responseArr['results'][0]['error'] . "]";
        //                     } else {
        //                         $result = "PUSH 발송 시 시스템이 문제가 발생하였습니다. 시스템 담당자에게 문의해 주세요[31 - " . $responseArr['results'][0]['error'] . "]";
        //                     }
        //                     $errorCode = 21;
        //                 }
                        
        //                 //Close request
        //                 curl_close($ch);
        
        //                 $logQuery2[] = " INSERT INTO volvo_query_log2 (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('repairPushSurvey', '" . $json . "', '{$errorCode}', '" . json_encode($responseArr) . "', '{$result}', SYSDATE()); ";
        //                 $db->tran_query( $logQuery2 );

        //                 $sql9[] = " INSERT INTO volvo_send_push_repair (master_cust_cd, id, token, errorCode, message, regdate, `type`, link, is_view, is_del) VALUES('{$master_cust_cd}', '{$id}', '{$token}', '0', '볼보 서비스센터를 이용해 주셔서 감사합니다. 지금 서비스센터 경험 설문조사에 참여하시면 스타벅스 기프티콘을 드립니다.', SYSDATE(), 2, 'https://volvoapp.co.kr/html/maintenence_check/index.php', 'N', 'N') ";
        //                 $db->tran_query( $sql9 );
        //                 // print_r($sql9);
        //             }
        //         }
        //     }
        // }
		// // $sql9[] = " INSERT INTO volvo_send_push (master_cust_cd, id, token, errorCode, message, regdate, `type`, link, is_view, is_del) VALUES('{$master_cust_cd}', '{$id}', '{$token}', '0', '{$message}', SYSDATE(), 1, 'https://volvoapp.co.kr/html/maintenence_check/index.php', 'N', 'N') ";
		// // $db->tran_query( $sql9 );
    }
}

$resultArr["result"] = $result;
$resultArr["errorcode"] = $errorCode;
$resultArr["IF"] = $if;

echo json_encode($resultArr);

// DB Disconnect
// require_once "../../inc/disconnect.php";

exit;

 
?>