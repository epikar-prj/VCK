<?
require_once "../../inc/common.php";

$content = $_POST['content'];
$push_device = $_POST['push_device'];
$push_user = $_POST['push_user'];
$link = $_POST['link'];

$where = "";
if ($push_device != "all") {
    $where .= " AND device = '" . $push_device . "'";
}

if ($push_user != "all") {
    $where .= " AND owner_flag = 'Y'";
}


$userSql = " SELECT tokken FROM volvo_user WHERE tokken <> '' AND use_push_recept_yn = 'Y' AND user_del <> 'Y' " . $where;

$tokkens=$db->fetch_array($userSql);

$tokkenArr = array();
$i = 0;
foreach($tokkens as $key => $value) {
    $tokkenArr[$i] = $value[0];
    $i ++;
}

// $tokkenArr[0] = "eiBnjI7Pg0ZIteYJlyU8oV:APA91bGMJF4a_wa5gPo9iR9HdozF4gcpys0-C1aqktRPp9vpnxMed4Gb0MZm0srgu9ReACrO8IRnWml7c39_LdATLZrLIn8sitEe3hDMkfdPmIWwHMH708mCvR45Gng1N3kRm4GInX-k";

// print_r($tokkenArr);
// exit;

$url = "https://fcm.googleapis.com/fcm/send";
// $token = "eiBnjI7Pg0ZIteYJlyU8oV:APA91bGMJF4a_wa5gPo9iR9HdozF4gcpys0-C1aqktRPp9vpnxMed4Gb0MZm0srgu9ReACrO8IRnWml7c39_LdATLZrLIn8sitEe3hDMkfdPmIWwHMH708mCvR45Gng1N3kRm4GInX-k";
$serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
$title = "Hej Volvo";
$body = $content;
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'customUrl' => $link);
// $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
$arrayToSend = array('registration_ids' => $tokkenArr, 'notification' => $notification,'priority'=>'high', 'data' => array('customUrl' => $link));


$json = json_encode($arrayToSend);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key='. $serverKey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

//Send the request
$response = curl_exec($ch);

//Close request
if ($response === FALSE) {
    // die('FCM Send Error: ' . curl_error($ch));
    MgMoveURL("", "?????? ??? ????????? ?????????????????????.1", "", "back");
    exit;
} else {
    // ?????? ??????
    $query[] = "
        INSERT INTO volvo_push ( 
            `content`, `url`, `recivers`, `device`, `regdate`
        ) VALUES (
            '{$content}', '{$link}', '{$push_user}', '{$push_device}', SYSDATE()
        )
    ";

    $result = $db->tran_query( $query );
    if(!$result) {
        MgMoveURL("", "?????? ??? ????????? ?????????????????????.2", "", "back");
        exit;
    } 

    // DB Disconnect
    require_once "../../inc/disconnect.php";

    echo $response;
    // ????????? ??????
    // MgMoveURL("list.php", "?????????????????????.", "", "");
    exit;
}
curl_close($ch);



?>