<?php
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');


/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

// Request 값
$sid = 0;
$purchaseForm1 = MgRequestCheck(trim($_POST['agree_1']), 1, true, true);
$purchaseForm2 = MgRequestCheck(trim($_POST['agree_2']), 1, true, true);
$purchaseForm3 = MgRequestCheck(trim($_POST['agree_3']), 1, true, true);
$purchaseForm4 = MgRequestCheck(trim($_POST['agree_4']), 1, true, true);
$name = MgRequestCheck(trim($_POST['name']), 255, true, true);
$hp1 = MgRequestCheck(trim($_POST['hp1']), 4, true, true);
$hp2 = MgRequestCheck(trim($_POST['hp2']), 4, true, true);
$hp3 = MgRequestCheck(trim($_POST['hp3']), 4, true, true);
$hp = $hp1 . "-" . $hp2 . "-" . $hp3;
$zipcode = MgRequestCheck(trim($_POST['zipcode']), 10, true, true);
$addr1 = MgRequestCheck(trim($_POST['addr1']), 255, true, true);
$addr2 = MgRequestCheck(trim($_POST['addr2']), 255, true, true);
$email = MgRequestCheck(trim($_POST['email']), 255, true, true);
$car_model = MgRequestCheck(trim($_POST['car_model']), 2, true, true);
$car_num = MgRequestCheck(trim($_POST['car_num']), 255, true, true);
$buy_type = MgRequestCheck(trim($_POST['buy_type']), 1, true, true);
$with_num = MgRequestCheck(trim($_POST['with_num']), 2, true, true);

$birth1 = MgRequestCheck(trim($_POST['birth1']), 4, true, true);
$birth2 = MgRequestCheck(trim($_POST['birth2']), 2, true, true);
$birth3 = MgRequestCheck(trim($_POST['birth3']), 2, true, true);

$birth = $birth1 . "-" . $birth2 . "-" . $birth3;

//$apply_model = MgRequestCheck(trim($_POST['apply_model']), 2, true, true);
//$apply_model = "A";
//$share_num = "0";

$ip = addslashes($_SERVER['REMOTE_ADDR']);

// // 입력 데이터 검증
// if(!$name) { MgMoveURL("", "성명을 입력해 주세요.", "", "back"); exit; }
// if(!$hp1) { MgMoveURL("", "연락처(처음 자리)를 입력해 주세요.", "", "back"); exit; }
// if(!$hp2) { MgMoveURL("", "연락처(가운데 자리)를 입력해 주세요.", "", "back"); exit; }
// if(!$hp3) { MgMoveURL("", "연락처(마지막 자리)를 입력해 주세요.", "", "back"); exit; }
// if(!$zipcode) { MgMoveURL("", "주소(우편번호)를 입력해 주세요.", "", "back"); exit; }
// if(!$addr1) { MgMoveURL("", "주소(기본주소)를 입력해 주세요.", "", "back"); exit; }
// if(!$addr2) { MgMoveURL("", "주소(상세주소)를 입력해 주세요.", "", "back"); exit; }
// if(!$email) { MgMoveURL("", "이메일을 입력해 주세요.", "", "back"); exit; }
// if(!$car_model) { MgMoveURL("", "보유차종을 선택해 주세요.", "", "back"); exit; }
// if(!$car_num) { MgMoveURL("", "차량번호를 입력해 주세요.", "", "back"); exit; }
// if(!$buy_type) { MgMoveURL("", "구매형태를 선택해 주세요.", "", "back"); exit; }
// if(!$with_num) { MgMoveURL("", "동반인원을 선택해 주세요.", "", "back"); exit; }
$query_with_field = ""; $query_with_value = "";
if($with_num){
	for($w=1; $w<=$with_num; $w++){
		$with_name = MgRequestCheck(trim($_POST['with_name' . $w]), 255, true, true);
		$with_sex = MgRequestCheck(trim($_POST['with_sex' . $w]), 1, true, true);
		$with_birth = MgRequestCheck(trim($_POST['with_birth' . $w]), 10, true, true);
		$with_relation = MgRequestCheck(trim($_POST['with_relation' . $w]), 10, true, true);

		if(!$with_name) { MgMoveURL("", "동반자 정보" . $w . "의 이름을 입력해 주세요.", "", "back"); exit; }
		if(!$with_sex) { MgMoveURL("", "동반자 정보" . $w . "의 성별을 선택해 주세요.", "", "back"); exit; }
		if(!$with_birth) { MgMoveURL("", "동반자 정보" . $w . "의 생년월일을 입력해 주세요.", "", "back"); exit; }
		if(!$with_relation) { MgMoveURL("", "동반자 정보" . $w . "의 관계을 입력해 주세요.", "", "back"); exit; }

		$query_with_field .= ", `with_name" . $w . "`, `with_sex" . $w . "`, `with_birth" . $w . "`, `with_relation" . $w . "` ";
		$query_with_value .= ", '{$with_name}', '{$with_sex}', '{$with_birth}', '{$with_relation}' ";
	}
}
// if(!$apply_model) { MgMoveURL("", "시승신청을 선택해 주세요.", "", "back"); exit; }
// if($apply_model != "Z" && $apply_model){
// 	$share_num = MgRequestCheck(trim($_POST['share_num']), 2, true, true);
// 	if(!$share_num) { MgMoveURL("", "동승인원을 선택해 주세요.", "", "back"); exit; }
// }

$mAgent = array("iPhone","iPod","Android","Blackberry", 
    "Opera Mini", "Windows ce", "Nokia", "sony" );
$chkMobile = false;
for($i=0; $i<sizeof($mAgent); $i++){
    if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
        $chkMobile = true;
        break;
    }
}

$chkM = "";

if($chkMobile) {
   $chkM = "M";
} else {
   $chkM = "P";
}

$result_arr = array("result"=>"", "msg"=>"", "query"=>"");

// 쿼리 적용
$query[] = "
	INSERT INTO volvo_promotion_apply ( 
		`sid`, `site_type`, `name`, `birth`, `hp`, `zipcode`, `addr1`, `addr2`, `email`, `car_model`, `car_num`, `buy_type`, `with_num` {$query_with_field}, `agree1`, `agree2`, `agree3`, `agree4`, `ip`, `regdate`
	) VALUES (
		'{$sid}', '{$chkM}', '{$name}','{$birth}', '{$hp}', '{$zipcode}', '{$addr1}', '{$addr2}', '{$email}', '{$car_model}', '{$car_num}', '{$buy_type}', '{$with_num}' {$query_with_value}, '{$purchaseForm1}', '{$purchaseForm2}', '{$purchaseForm3}', '{$purchaseForm4}', '{$ip}', SYSDATE()
	)
";
// print_r($query);
// $log_data = "
// 		'{$chkM}', '{$name}','{$birth}', '{$hp}', '{$zipcode}', '{$addr1}', '{$addr2}', '{$email}', '{$car_model}', '{$car_num}', '{$buy_type}', '{$with_num}' {$query_with_value}, '{$purchaseForm1}', '{$purchaseForm2}', '{$purchaseForm3}', '{$purchaseForm4}', '{$ip}'
// ";
// $result = $db->tran_query( $query );
// if(!$result) {
// 	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
// 	exit;
// }

// // Log
//  $dir = $_SERVER['DOCUMENT_ROOT'] . '/../log' . $SITE_INFO['home_dir'] . '/' . date('Y') . '/' . date('m') . '/';
//  $log_path = $dir . date('d') . '.log';
//  write_log($log_data, $dir, $log_path);

$result_arr['query'] = $query;
$result = $db->tran_query( $query );

if(!$result) {
    $result_arr['msg'] = "처리 중 오류가 발생하였습니다.";
    $result_arr['result'] = false;
	// MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
} else {
    $result_arr['msg'] = "시승신청이 완료되었습니다.";
    $result_arr['result'] = true;
}

echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);

// DB Disconnect
require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";



// 페이지 이동
exit;

?>

