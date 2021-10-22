<?
// $token = $_POST['token'];
// $message = $_POST['message'];



$message = "가을의 절경과 함께 즐기는 VOLVO HEJ, FAMILJ를 지금 신청하세요 🍁";
$link = "https://www.volvoapp.co.kr/html/promotion/hejfamilj_2021_fall.php";

$url = "https://fcm.googleapis.com/fcm/send";
$token = "eGcei69lA08MqaupbvbX7N:APA91bHHMvNUXPRcWw8-o-rC2k5J2XgRLtwvChYkhRPvKhBYPoUUQ86thRdIv9852Va0QHHSapxENdF7EtGm5pq8G_h4PBuqkUFTGQvRnT8OMrDeT9bT51emiNTuMiBp7sYmLlRxuX1m";
$serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
$title = "";
// $link = "https://www.volvoapp.co.kr/html/news/list.php";
$notification = array('title' =>$title , 'body' => $message, 'sound' => 'default', 'customUrl' => $link);
$arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high', 'data' => array('customUrl' => $link));

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
    // $result = "PUSH ERROR";
    // $errorCode = 11;
    
} else {
    
}
curl_close($ch);
?>