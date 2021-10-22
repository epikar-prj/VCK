<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = $_COOKIE["master_cust_cd"];
$id = $_COOKIE["member_id"];
$dealer_cd = PARAM2("dealer_cd");
$resvt_day = PARAM2("resvt_day");
$tot_work_time = PARAM2("tot_work_time");


if (strlen($resvt_day) < 10) {
    $dateArr = explode('-', $resvt_day);
    $dateArr[1] = sprintf('%02d', $dateArr[1]);
    $dateArr[2] = sprintf('%02d', $dateArr[2]);

    $resvt_day = implode('-', $dateArr);
}


// Interface 
$post_param = array(
    "id"		=> $id, 
    "master_cust_cd"		=> $master_cust_cd,
    "dealer_cd"		=> $dealer_cd,
    // "dealer_cd"		=> "IRGA",
    "resvt_day"		=> $resvt_day,
    "tot_work_time"		=> $tot_work_time
);

$json_str = json_encode($post_param);


$url = "https://vckcustapp-interface.comnarae.com:444/realtime_repair_scheduler_time";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com/realtime_repair_scheduler_time";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

$response = json_decode($contents, true);

// post log
$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('getServiceTime', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );


$result = json_encode($response, JSON_UNESCAPED_UNICODE);

echo $result;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>