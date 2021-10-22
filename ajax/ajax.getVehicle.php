<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = PARAM2("master_cust_cd");
$id = PARAM2("id");

// Interface 
$post_param = array(
    "id"		            => $id, 
    "master_cust_cd"		=> $master_cust_cd, 
);

$json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

$url = "https://vckcustapp-interface.comnarae.com:444/vehicle_info";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_info";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

$contents = str_replace(" car_no", "car_no", $contents);

echo $contents;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>