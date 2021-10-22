<?php

header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');


// Request 값


$agree1 = PARAM2('agree_1') ? "Y" : "N";
$agree2 = PARAM2('agree_2') ? "Y" : "N";
$agree3 = PARAM2('agree_3') ? "Y" : "N";
$agree4 = PARAM2('agree_4') ? "Y" : "N";
$agree5 = PARAM2('agree_5') ? "Y" : "N";
$model = PARAM2('model');
$name = preg_replace("/\s+/", "", PARAM2('name'));
$hp1 = PARAM2('hp1');
$hp2 = PARAM2('hp2');
$hp3 = PARAM2('hp3');
$hp = $hp1 . "-" . $hp2 . "-" . $hp3;
$sex = PARAM2('sex');
$birth1 = PARAM2('birth1');
$birth2 = PARAM2('birth2');
$birth3 = PARAM2('birth3');
$birth = $birth1 . "-" . $birth2 . "-" . $birth3;
$email = PARAM2('email');
// $category1 = MgRequestCheck(trim($_POST['area']), 3, true, true);
$showroom = PARAM2('showroom');
$buy_check = PARAM2('buy_check');

$email1 = explode("@", $email)[0];
$email2 = explode("@", $email)[1];

$result_arr = array("result"=>"", "msg"=>"", "query"=>"");

$cp_cd = "104";
$cp_nm = "고객앱 시승신청";
$inflow_route = "4";

$ip = addslashes($_SERVER['REMOTE_ADDR']);


$timenow = date("Y-m-d H:i:s"); 
$timetarget = "2020-04-27 00:00:00";

$str_timenow = strtotime($timenow);
$str_timetarget = strtotime($timetarget);

// $gender = $sex == "M" ? "1" : "2";

// Interface 
$post_param = array(
    "cp_cd"			    => $cp_cd,
    "cp_nm"			    => $cp_nm,
    "cust_nm"		    => $name, 
    "cust_hp"		    => $hp, 
    "email"			    => $email,
    "birth_date"	    => $birth,
    "showroom"		    => $showroom,
    "intent_buy_flag"	=> $buy_check,
    "model"			    => $model,
    "agree1"		    => $agree1,
    "agree2"		    => $agree2,
    "agree3"		    => $agree3,
    "agree4"		    => $agree4,
    "agree5"		    => $agree5,
    "inflow_route"	    => $inflow_route
);


$json_str = json_encode($post_param);
$post_str = "store_data=" . $json_str;

// $post_str = str_replace(" ", "%20", $post_str);

// echo $post_str;
// exit;

// Log
// $dir = $_SERVER['DOCUMENT_ROOT'] . '/../log' . $SITE_INFO['home_dir'] . '/' . date('Y') . '/' . date('m') . '/';
// $log_path = $dir . date('d') . '.log';
// write_log($post_param, $dir, $log_path);

$url = "https://volvoapi-sales.comnarae.com/microsite/homepage_testdrive_new.asp";	// Real Server URL
// $url = "https://volvoapi-sales.comnarae.com/microsite/homepage_testdrive_new_test.asp";	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



$contents = curl_exec($ch);
$result = json_decode($contents, true);


$ch_result = "";
$ch_desc = "";
if ($result['result'] != "success") {
    $ch_result = $result['result'];
	$ch_desc = $result['error_desc'];
} else {
    $ch_result = $result['result'];
}


// echo $contents;
// exit;
if ($result['result'] == "success") {
    $query[] = "
        INSERT INTO volvo_testdrive_apply ( 
            `site_type`, `name`, `hp`, `birth`, `email`, `showroom`, `model`, `buy_check`, `agree1`, `agree2`, `agree3`, `agree4`, `agree5`, `ip`, `success`, `ch_desc`, `regdate`, `uptdate`, `reg_id`, `upt_id`
        ) VALUES (
            'A', '{$name}', '{$hp}', '{$birth}', '{$email}', '{$showroom}', '{$model}', '{$buy_check}', '{$agree1}', '{$agree2}', '{$agree3}', '{$agree4}', '{$agree5}', '{$ip}', '{$ch_result}', '{$ch_desc}', SYSDATE(), SYSDATE(), '', ''
        )
    ";

    $result2 = $db->tran_query( $query );

    if(!$result2) {
        $result_arr['msg'] = "처리 중 오류가 발생하였습니다.";
        $result_arr['result'] = false;
        // MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
        exit;
    } else {
        $result_arr['msg'] = "시승신청이 완료되었습니다.";
        $result_arr['result'] = true;
    }

    // DB Disconnect
    require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
} else {
    $result_arr['msg'] = "처리 중 오류가 발생하였습니다.";
    $result_arr['result'] = false;
}
curl_close($ch);
// 쿼리 적용


echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);



?>

