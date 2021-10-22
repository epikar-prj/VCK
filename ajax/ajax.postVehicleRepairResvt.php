<?php
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = PARAM2('master_cust_cd');
$user_id = PARAM2('id');
$vin = PARAM2('vin');

$dealer_cd = PARAM2('dealer_cd');
$resvt_tel = PARAM2('resvt_tel');
$resvt_day = PARAM2('resvt_day');

// Interface 
$post_param = array(
    "master_cust_cd"		=> $master_cust_cd, 
    "id"		            => $user_id, 
    "vin"		            => $vin,
    "dealer_cd"             => $dealer_cd,
    "resvt_tel"	            => $resvt_tel,
    "resvt_day"	            => $resvt_day 
    
);
$json_str = json_encode($post_param);


$url = "https://vckcustapp-interface.comnarae.com:444/vehicle_repair_resvt";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_repair_resvt";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);


$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('resvt', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );


echo $contents;


exit;

?>

