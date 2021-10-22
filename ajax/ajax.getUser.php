<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$user_id = $_POST["id"];
$user_pw = $_POST["pw"];

$user_pw = str_replace("'", "&#39;", $user_pw);

// Interface 
$post_param = array(
    "id"		=> $user_id, 
    "pw"		=> $user_pw
    
);

$post_param2 = array(
    "id"		=> $user_id
    
);

$json_str = json_encode($post_param);

$logJson = json_encode($post_param2);

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

$response = json_decode($contents, true);

// post log
$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('login', '{$logJson}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );

if ($response['result'] == 'success') {
    $res_data = $response['resultData'][0];
    $res_nm = $res_data['cust_nm'];
    $res_hp = $res_data['hp'];
    $res_cd = $res_data['master_cust_cd'];
    $res_owner = $res_data['owner_flag'];
    $res_location = $res_data['use_loc_service_yn'];

    $use_personal_info_yn = $res_data['use_personal_info_yn'];
    $use_personal_consignment_yn = $res_data['use_personal_consignment_yn'];
    $use_personal_uses_yn = $res_data['use_personal_uses_yn'];
    $use_dm_recept_yn = $res_data['use_dm_recept_yn'];
    $use_sms_recept_yn = $res_data['use_sms_recept_yn'];
    $use_email_recept_yn = $res_data['use_email_recept_yn'];
    $use_push_recept_yn = $res_data['use_push_recept_yn'];

    $searchSql = " select * from volvo_user where master_cust_cd = '{$res_cd}' ";
    $searchResult = $db->num_rows($searchSql);
    
    if (!$searchResult) {
        $userInsert[] = " INSERT INTO volvo_user
        (master_cust_cd, id, cust_nm, email, hp, use_personal_info_yn, use_personal_consignment_yn, use_personal_uses_yn, use_dm_recept_yn, use_sms_recept_yn, use_email_recept_yn, use_push_recept_yn, use_loc_service_yn, owner_flag, reg_date)
        VALUES('{$res_cd}', '{$user_id}', '{$res_nm}', '{$user_id}', '{$res_hp}', '{$use_personal_info_yn}', '{$use_personal_consignment_yn}', '{$use_personal_uses_yn}', '{$use_dm_recept_yn}', '{$use_sms_recept_yn}', '{$use_email_recept_yn}', '{$use_push_recept_yn}', '{$res_location}', '{$res_owner}', SYSDATE());
         ";
        
        $userInsertResult = $db->tran_query( $userInsert );
    } else {
        $userUpdate[] = " UPDATE volvo_user set id = '{$user_id}', cust_nm = '{$res_nm}', email = '{$user_id}', hp = '{$res_hp}', use_personal_info_yn = '{$use_personal_info_yn}', use_personal_consignment_yn = '{$use_personal_consignment_yn}', use_personal_uses_yn = '{$use_personal_uses_yn}', use_dm_recept_yn = '{$use_dm_recept_yn}', use_sms_recept_yn = '{$use_sms_recept_yn}', use_email_recept_yn = '{$use_email_recept_yn}', use_push_recept_yn = '{$use_push_recept_yn}', use_loc_service_yn = '{$res_location}', owner_flag = '{$res_owner}' where master_cust_cd = '{$res_cd}' ";
        $userUpdateResult = $db->tran_query( $userUpdate );
    }

    $sql = " SELECT sid FROM volvo_user WHERE master_cust_cd = '{$res_cd}' ";
    $sid = $db->select_one($sql);

    $response['resultData'][0]['sid'] = $sid;
    $response['resultData'][0]['user_id'] = $user_id;

    setcookie("member_sid", $sid, 0, "/");
    setcookie("member_id", $user_id, 0, "/");
    setcookie("member_name", $res_nm, 0, "/");
    setcookie("master_cust_cd", $res_cd, 0, "/");
    setcookie("member_hp", $res_hp, 0, "/");
    setcookie("owner_flag", $res_owner, 0, "/");
    setcookie("location", $res_location, 0, "/");

    SetCookie("member_sid", $sid, 0, "/");
    SetCookie("member_id", $user_id, 0, "/");
    SetCookie("member_name", $res_nm, 0, "/");
    SetCookie("master_cust_cd", $res_cd, 0, "/");
    SetCookie("member_hp", $res_hp, 0, "/");
    SetCookie("owner_flag", $res_owner, 0, "/");
    SetCookie("location", $res_location, 0, "/");
    
    // $cookieTxt = $_COOKIE['member_sid'] . " | " . $_COOKIE['member_sid'] . " | " . $_COOKIE['member_name'] . " | " . $_COOKIE['master_cust_cd'] . " | " . $_COOKIE['member_hp'];
    // $logQuery2[] = " INSERT INTO volvo_query_log2 (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('loginCookie', '{$user_id}', '', '', '{$cookieTxt}', SYSDATE()); ";
    // $db->tran_query( $logQuery2 );

}

$result = json_encode($response, JSON_UNESCAPED_UNICODE);

echo $result;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>