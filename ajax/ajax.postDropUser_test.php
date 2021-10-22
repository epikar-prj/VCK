<?


include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
error_reporting(E_ALL);

ini_set("display_errors", 1);
$master_cust_cd = "0000000";
$user_id = "test12@test.com";


$post_param = array(
    "master_cust_cd"		=> $master_cust_cd, 
    "id"		            => $user_id, 
);
$json_str = json_encode($post_param);


// $url = "https://vckcustapp-interface.comnarae.com:444/customer_withdraw";	// Real Server URL
$url = "http://test-vckcustapp-interface.comnarae.com:8080/customer_withdraw";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

$response = json_decode($contents, true);


$logQuery[] = " INSERT INTO volvo_query_log2 (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES ('drop', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );

print_r($logQuery);

$result = json_encode($response, JSON_UNESCAPED_UNICODE);

echo $result;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";

?>