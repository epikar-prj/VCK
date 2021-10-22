<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$start = $_GET['start'];
$limit = 1000;
$total = ceil(10060 / $limit);

$message = "볼보자동차 홍보대사 손흥민 선수와 함께하는 VOLVO HEJ, KLASS를 지금 신청하세요.";
$link = "https://www.volvoapp.co.kr/html/promotion/hejKlass_list.php";

$sql = " select a.tokken, a.master_cust_cd, a.id from (select id, master_cust_cd, tokken from volvo_user where (tokken <> '' and tokken <> 'null') and use_push_recept_yn = 'Y' group by id, master_cust_cd, tokken) a join volvo_hejklass_push_1 b on TRIM(a.id) = TRIM(b.app_id) limit {$start}, {$limit} ";
$tokkens=$db->fetch_array($sql);

// echo $sql;
// exit;

$tokkenArr = array();
$sql2 = array();
$i = 0;
foreach($tokkens as $key => $value) {
    $tokkenArr[$i] = $value[0];
    $i ++;

    $sql2[] = " INSERT INTO volvo_app.volvo_send_push_repair (master_cust_cd, id, token, errorCode, message, is_view, is_del, enter_time, complete_time, regdate, `type`, link) VALUES('".$value[1]."', '".$value[2]."', '".$value[0]."', '0', '".$message."', 'N', 'N', '1900-01-01 00:00:00.000', '1900-01-01 00:00:00.000', SYSDATE(), 2, '".$link."') ";
}

$db->tran_query( $sql2 );


// print_r($sql2);
// print_r($tokkenArr);

// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo count($tokkenArr);
// exit;

$url = "https://fcm.googleapis.com/fcm/send";

$serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
$title = "";
$body = $message;

$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'customUrl' => $link);
// $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
// $arrayToSend = array('registration_ids' => ["eJTGL901dUkLlgQOAcQ-Qk:APA91bGOD7gS5K5QEOidccnE0euzk6BKXa3vACKOOq4FT3-58LQN2a-rXwNbxYvj3pQ4L5zPoCPOp9FCsZWjlizAMWRLhfM1HBnmHhOqBbBEBskFdZzbhlVRtwG7eqKuLPNJ3fyKzLeP"], 'notification' => $notification,'priority'=>'high', 'data' => array('customUrl' => $link));
$arrayToSend = array('registration_ids' => $tokkenArr, 'notification' => $notification,'priority'=>'high', 'data' => array('customUrl' => $link));


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

echo $response . "<br>";



// DB Disconnect
require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>