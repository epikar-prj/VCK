<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$user_id = $_COOKIE['member_id'];
$user_pw = $_POST["pw"];

$user_pw = str_replace("'", "&#39;", $user_pw);

// Interface 
$post_param = array(
    "id"		=> $user_id, 
    "pw"		=> $user_pw
    
);
$json_str = json_encode($post_param);

$url = "https://vckcustapp-interface.comnarae.com:444/login";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/login";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

echo $contents;
?>