<?php 


$url = "https://fcm.googleapis.com/fcm/send";
$token = "fFSD42TB9UaGlXSMirpIgx:APA91bGJs_WYVv4xy6uxgKVhe8k4-xJovEClcJc-x17iEtgkhHptw6vwkstN21R4GLw93ZOxsoA8D2I4BmV6-J8wqUfXn8VZ5m9f1Hb_eUCB4uJP6jnJMpak2CzeO-Fi-Kpy0rtv53BT";
$serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
$title = "Notification title";
$body = "Hello I am from Your php server";
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'customUrl' => 'https://www.volvoapp.co.kr/html/event/index.php');
$arrayToSend = array('to' => $token, 'notification' => $notification, 'priority'=>'high', 'data' => array('customUrl' => 'https://www.volvoapp.co.kr/html/event/index.php'));

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
    die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);


?>