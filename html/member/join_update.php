<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$user_id = PARAM2('user_id');
$user_pw = PARAM2('user_pw');
$user_nm = PARAM2('user_nm');
$hp1 = PARAM2('hp1');
$hp2 = PARAM2('hp2');
$hp3 = PARAM2('hp3');
// $member_type = PARAM2('member_type');
$agree1 = PARAM2('agree1');
$agree2 = PARAM2('agree2');
$agree3 = PARAM2('agree3');
$agree4 = PARAM2('agree4');
$agree5 = PARAM2('agree5');
$agree6 = PARAM2('agree6');
$agree7 = PARAM2('agree7');
$agree8 = PARAM2('agree8');

$user_pw = str_replace("'", "&#39;", $user_pw);
$user_nm = str_replace("'", "&#39;", $user_nm);

$user_hp = $hp1 . $hp2 . $hp3;

$agree1 = $agree1 ? "Y" : "N";
$agree2 = $agree2 ? "Y" : "N";
$agree3 = $agree3 ? "Y" : "N";
$agree4 = $agree4 ? "Y" : "N";
$agree5 = $agree5 ? "Y" : "N";
$agree6 = $agree6 ? "Y" : "N";
$agree7 = $agree7 ? "Y" : "N";
$agree8 = $agree8 ? "Y" : "N";


// Interface 
$post_param = array(
    "id"		                    => $user_id, 
    "pw"		                    => $user_pw, 
    "cust_nm"			            => $user_nm,
    "hp"			                => $user_hp,
    "use_personal_info_yn"		    => $agree1,
    "use_personal_consignment_yn"	=> $agree2,
    "use_personal_uses_yn"		    => $agree3,
    "use_sms_recept_yn"		        => $agree4,
    "use_email_recept_yn"			=> $agree5,
    "use_push_recept_yn"			=> $agree6,
    "use_loc_service_yn"			=> $agree7,
    "use_dm_recept_yn"  			=> $agree8,
);

$post_param2 = array(
    "id"		                    => $user_id, 
    "cust_nm"			            => $user_nm,
    "hp"			                => $user_hp,
    "use_personal_info_yn"		    => $agree1,
    "use_personal_consignment_yn"	=> $agree2,
    "use_personal_uses_yn"		    => $agree3,
    "use_sms_recept_yn"		        => $agree4,
    "use_email_recept_yn"			=> $agree5,
    "use_push_recept_yn"			=> $agree6,
    "use_loc_service_yn"			=> $agree7,
    "use_dm_recept_yn"  			=> $agree8,
);

$json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);
$post_str = "" . $json_str;

$logJson = json_encode($post_param2, JSON_UNESCAPED_UNICODE);

$post_str = str_replace(" ", "%20", $post_str);

// print_r($post_str);

$url = "https://vckcustapp-interface.comnarae.com:444/customer_join";	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/customer_join";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);

$response = json_decode($contents, true);
// print_r($response);
// echo $response['resultData'];
// exit;

// post log
$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('join', '{$logJson}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
$db->tran_query( $logQuery );

if ($response['result'] == 'success') {
    $cust_cd = $response['resultData'][0]['master_cust_cd'];
    $owner_flag = $response['resultData'][0]['owner_flag'];
    $query[] = "
        INSERT INTO volvo_user ( 
            `master_cust_cd`, `id`, `cust_nm`, `email`, `hp`, `owner_flag`, `use_personal_info_yn`, `use_personal_consignment_yn`, `use_personal_uses_yn`, `use_sms_recept_yn`, `use_email_recept_yn`, `use_push_recept_yn`, `use_loc_service_yn`, `use_dm_recept_yn`, `reg_date`, `upd_date`
        ) VALUES (
            '{$cust_cd}', '{$user_id}', '{$user_nm}', '{$user_id}', '{$user_hp}', '{$owner_flag}', '{$agree1}', '{$agree2}', '{$agree3}', '{$agree4}', '{$agree5}', '{$agree6}', '{$agree7}', '{$agree8}', SYSDATE(), SYSDATE()
        )
    ";
    
    $result = $db->tran_query( $query );

    require_once "../../inc/disconnect.php";
} else {
    if ($response['errorcode'] == "AlreadyUseID" || $response['errorcode'] == "AlreadyRegUse") {
        MgMoveURL("/html/member/join.php", $response['result'], "", "");
        exit;
    } else if (is_numeric($response['errorcode'])) {
        MgMoveURL("/html/member/join.php", "처리 중 오류가 발생했습니다. 시스템 관리자에게 문의해주세요.", "", "");
        exit;
    } else {
        MgMoveURL("/html/member/join.php", "처리 중 오류가 발생했습니다. 잠시 후 다시 시도해주세요.", "", "");
        exit;
    }
}







// print_r($query);
// exit;
// $result = $db->tran_query( $query );
// if(!$result) {
// 	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
// 	exit;
// }

// // DB Disconnect


// 페이지 이동
MgMoveURL("/html/member/login.php", "회원가입이 완료되었습니다.", "", "");
exit;
?>