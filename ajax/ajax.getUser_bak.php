<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$user_id = "apptest@volvocars.com";
$user_pw = "Volvo123!";

// Interface 
$post_param = array(
    "id"		=> $user_id, 
    "pw"		=> $user_pw
    
);
$json_str = json_encode($post_param);
print_r($json_str);
echo "<br><br>";
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
print_r(curl_getinfo($ch)); //모든정보 출력
echo "<br><br>";
echo curl_errno($ch); //에러정보 출력
echo "<br><br>";
echo curl_error($ch); //에러정보 출력

$response = json_decode($contents, true);



print_r($response);
?>