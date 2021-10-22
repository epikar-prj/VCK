<?php
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = PARAM2('master_cust_cd');
$user_sid = PARAM2('user_sid');
$user_id = PARAM2('id');
$pw = PARAM2('pw');

$pw = str_replace("'", "&#39;", $pw);

$use_sms_recept_yn = PARAM2('use_sms_recept_yn');
$use_email_recept_yn = PARAM2('use_email_recept_yn');
$use_push_recept_yn = PARAM2('use_push_recept_yn');
$use_loc_service_yn = PARAM2('use_loc_service_yn');
$use_dm_recept_yn = PARAM2('use_dm_recept_yn');

// Interface 
$post_param = array(
    "master_cust_cd"		=> $master_cust_cd, 
    "id"		            => $user_id, 
    "pw"		            => $pw,
	"use_sms_recept_yn"   	=> $use_sms_recept_yn,
    "use_email_recept_yn"   => $use_email_recept_yn,
    "use_push_recept_yn"	=> $use_push_recept_yn,
    "use_loc_service_yn"	=> $use_loc_service_yn,
    "use_dm_recept_yn"	    => $use_dm_recept_yn 
    
);
$json_str = json_encode($post_param);

$post_param2 = array(
    "master_cust_cd"		=> $master_cust_cd, 
    "id"		            => $user_id, 
	"use_sms_recept_yn"   	=> $use_sms_recept_yn,
    "use_email_recept_yn"   => $use_email_recept_yn,
    "use_push_recept_yn"	=> $use_push_recept_yn,
    "use_loc_service_yn"	=> $use_loc_service_yn,
    "use_dm_recept_yn"	    => $use_dm_recept_yn 
    
);
$json_str2 = json_encode($post_param2);

$url = "https://vckcustapp-interface.comnarae.com:444/customer_info_edit";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/customer_info_edit";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

$response = json_decode($contents, true);

$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('modify', '{$json_str2}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );


if ($response['result'] == 'success') {
    
    // 쿼리 적용
    $query = " UPDATE volvo_user SET use_email_recept_yn = '{$use_email_recept_yn}', use_push_recept_yn = '{$use_push_recept_yn}', use_loc_service_yn = '{$use_loc_service_yn}', use_dm_recept_yn = '{$use_dm_recept_yn}', use_sms_recept_yn = '{$use_sms_recept_yn}', upd_date = SYSDATE() WHERE master_cust_cd = '{$master_cust_cd}' ";

    $result_arr['query'] = $query;
    $result = $db->query( $query );

    $logQuery2[] = " INSERT INTO volvo_query_log (query_log, regdate) VALUES('" . str_replace("'", "\'", $query) . "', SYSDATE()); ";
    
    $db->tran_query( $logQuery2 );

    // if(!$result) {
    // $result_arr['msg'] = "처리 중 오류가 발생하였습니다.";
    // $result_arr['result'] = false;
    // // MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
    // } else {
    //     $result_arr['msg'] = "개인정보가 수정되었습니다.";
    //     $result_arr['result'] = true;
    // }

    setcookie("location", $use_loc_service_yn, 0, "/");
}

echo $contents;

// DB Disconnect
require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";


exit;

?>

