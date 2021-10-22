<?php
require_once "../../inc/common.php";
// error_reporting( E_ALL );
//   ini_set( "display_errors", 1 );
/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

//관리자 체크
AdminChk();

//관리자 등급별 접근메뉴 체크
require_once "../inc/admin_lvlchk.php";


// Request 값
$SearchLevel = MgRequestCheck(trim($_REQUEST['SearchLevel']), 1, true, true);
$SearchStatus = MgRequestCheck(trim($_REQUEST['SearchStatus']), 1, true, true);
$SearchColumn = MgRequestCheck($_REQUEST['SearchColumn'], 30, true, true);
$SearchValue = MgRequestCheck($_REQUEST['SearchValue'], 255, true, true);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchLevel={$SearchLevel}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$SearchValue}";

$sid = MgRequestCheck($_POST['sid'], 11, true, true);
$upt_id = $_COOKIE['member_id'];

$name = MgRequestCheck(trim($_POST['name']), 50, true, true);
$pw = MgRequestCheck(trim($_POST['pw']), 20, true, true);
$pw_new = MgRequestCheck(trim($_POST['pw_new']), 20, true, true);
$cpw_new = MgRequestCheck(trim($_POST['cpw_new']), 20, true, true);
$email_id = MgRequestCheck(trim($_POST['email_id']), 255, true, true);
$email_domain = MgRequestCheck(trim($_POST['email_domain']), 255, true, true);
$email = $email_id . "@" . $email_domain;
$tel1 = MgRequestCheck(trim($_POST['tel1']), 4, true, true);
$tel2 = MgRequestCheck(trim($_POST['tel2']), 4, true, true);
$tel3 = MgRequestCheck(trim($_POST['tel3']), 4, true, true);
$tel = $tel1 . "-" . $tel2 . "-" . $tel3;
$level = MgRequestCheck(trim($_POST['level']), 1, true, true); $level = $level ? $level : "A";
$vcenter = MgRequestCheck(trim($_POST['vcenter']), 5, true, true);
$status = MgRequestCheck(trim($_POST['status']), 1, true, true); $status = $status ? $status : "Y";

if ($_SESSION['token'] != $_POST['token']) {
    MgMoveURL("", "정상적인 접근방법이 아닙니다.", "", "back");
    exit;
}


// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "수정하실 운영자를 선택하세요.", "", "back"); exit; }
if(!$name) { MgMoveURL("", "이름을 입력해주세요.", "", "back"); exit; }

// 자료 검색
$sql = "SELECT `pw` FROM {$TABLE_INFO['master']} WHERE id='{$upt_id}'";
$pw_cur=$db->select_one($sql);

// 비밀번호 체크
if($pw_cur != md5($pw)) { MgMoveURL("", "입력하신 패스워드가 틀립니다.", "", "back"); exit; }

if($pw_new) {
	if(!$cpw_new) { MgMoveURL("", "비밀번호 확인을 입력해주세요.", "", "back"); exit; }
	if($pw_new != $cpw_new){ MgMoveURL("", "비밀번호와 비밀번호 확인 정보가 일치하지 않습니다.", "", "back"); exit; }
}
if(!$email_id) { MgMoveURL("", "이메일(아이디)을 입력해주세요.", "", "back"); exit; }
if(!$email_domain) { MgMoveURL("", "이메일(도메인)을 입력해주세요.", "", "back"); exit; }



// 쿼리 적용
if($pw_new) { $query_pw = "`pw` = '" . md5($pw_new) . "',"; }
else{ $query_pw = ""; }

if($admin_lvlchk){ $query_lvlsta = "`lvl` = '{$level}', `status` = '{$status}',";}
else{ $query_lvlsta = ""; }


$query[] = "
	UPDATE
		{$TABLE_INFO['master']}
	SET
		`name` = '{$name}',
		{$query_pw}
		`email` = '{$email}',
		`tel` = '{$tel}',
		{$query_lvlsta}
		`vcenter` = '{$vcenter}',
		`uptdate` = SYSDATE(),
		`upt_id` = '{$upt_id}'
	WHERE
		sid = '{$sid}'
	";


$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
//if($admin_lvlchk){ MgMoveURL("list.php", "수정되었습니다.", "", ""); }
if($admin_lvlchk){ MgMoveURL("update.php?sid={$sid}", "수정되었습니다.", "", ""); }
else{ MgMoveURL("update.php?sid={$sid}", "수정되었습니다.", "", ""); }
exit;
?>