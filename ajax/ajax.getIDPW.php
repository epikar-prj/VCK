<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$mode = PARAM2("mode");
$cust_nm = PARAM2("cust_nm");
$hp1 = PARAM2("hp1");
$hp2 = PARAM2("hp2");
$hp3 = PARAM2("hp3");

$cust_nm = str_replace("'", "&#39;", $cust_nm);

$hp = $hp1 . $hp2 . $hp3;

// Interface 
$post_param = array(
    "mode"		    => $mode, 
    "cust_nm"		=> $cust_nm, 
    "hp"		    => $hp
    
);
$json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

$url = "https://vckcustapp-interface.comnarae.com:444/id_pw_find";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/id_pw_find";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

$response = json_decode($contents, true);
$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('{$mode}', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );

echo $contents;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>