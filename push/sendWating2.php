<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$start = $_GET['start'];
$limit = 1000;
$total = ceil(10060 / $limit);


$watingTable = "volvo_hej_familj_list_1";


$message = "가을의 절경과 함께 즐기는 VOLVO HEJ, FAMILJ를 지금 신청하세요 🍁";
$link = "https://www.volvoapp.co.kr/html/promotion/hejfamilj_2021_fall.php";

// $sql = " select b.tokken, b.master_cust_cd, a.app_id from volvo_wating_cust_push_2 a join (select master_cust_cd, tokken from volvo_user where (tokken <> '' and tokken <> 'null') and use_push_recept_yn = 'Y' ) b on TRIM(a.master_cust_cd) = TRIM(b.master_cust_cd) where a.push_agree = 'Y' group by b.tokken, b.master_cust_cd, a.app_id limit {$start}, {$limit} ";
$sql = " select vu.tokken, vu.master_cust_cd, hf.app_id from volvo_hej_familj_list_1 hf join volvo_user vu on hf.app_id = vu.id where hf.push_agree = 'Y' limit {$start}, {$limit} ";

$tokkens = $db->fetch_array($sql);

$sql2 = " select vu.tokken, vu.master_cust_cd, hf.app_id from volvo_hej_familj_list_1 hf join volvo_user vu on hf.app_id = vu.id limit {$start}, {$limit} ";
$result = $db->fetch_array($sql2);
// echo $sql2;
// print_r($result);
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo count($result);
// exit;

$tokkenArr = array();
$sql3 = array();

$i = 0;
foreach($tokkens as $key => $value) {
    $tokkenArr[$i] = $value[0];
    $i ++;
}

foreach($result as $key => $value) {
    $sql3[] = " INSERT INTO volvo_app.volvo_send_push_repair (master_cust_cd, id, token, errorCode, message, is_view, is_del, enter_time, complete_time, regdate, `type`, link) VALUES('".$value[1]."', '".$value[2]."', '".$value[0]."', '0', '".$message."', 'N', 'N', '1900-01-01 00:00:00.000', '1900-01-01 00:00:00.000', SYSDATE(), 2, '".$link."') ";
}

$db->tran_query( $sql3 );


// print_r($sql3);
// print_r($tokkenArr);

// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo count($tokkenArr);
// echo "<br>";
// echo count($sql3);
// exit;

$url = "https://fcm.googleapis.com/fcm/send";

$serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
$title = "";
$body = $message;

$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'customUrl' => $link);
// $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
// $arrayToSend = array('registration_ids' => ["epD6jCKeKkNVhJg786nLB3:APA91bEf2kkOQ-4GTRp6RiZkvVTH_7hdA6UThbx0b5j8gX2I6vVRok6wBNNWGZ5UE6oi8TYWLVpf2hVjD3XnfsdMIeoqLPhURyE5IhqlsMqNvML_H8djR1rCY7m8wicqVsrF0v7g8FaF"], 'notification' => $notification,'priority'=>'high', 'data' => array('customUrl' => $link));
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