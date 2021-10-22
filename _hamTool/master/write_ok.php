<?php
require_once "../../inc/common.php";

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
$sid = 0;
$reg_id = $_COOKIE['member_id'];

$id = MgRequestCheck(trim($_POST['id']), 20, true, true); $id = strtolower($id); // 무조건 소문자로 변경함
$name = MgRequestCheck(trim($_POST['name']), 50, true, true);
$pw = MgRequestCheck(trim($_POST['pw']), 20, true, true);
$cpw = MgRequestCheck(trim($_POST['cpw']), 20, true, true);
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


// 입력 데이터 검증
if(!$id) { MgMoveURL("", "아이디를 입력해주세요.", "", "back"); exit; }
if(isDuplicateId($TABLE_INFO['master'],"id",$id)){ MgMoveURL("", "이미 사용중인 아이디 입니다.", "", "back"); exit; } // 운영자 DB에서 아이디 중복 체크
if(isDuplicateId($TABLE_INFO['member'],"id",$id)){ MgMoveURL("", "이미 사용중인 아이디 입니다.", "", "back"); exit; } // 회원 DB에서 아이디 중복 체크
if(!$name) { MgMoveURL("", "이름을 입력해주세요.", "", "back"); exit; }
if(!$pw) { MgMoveURL("", "비밀번호를 입력해주세요.", "", "back"); exit; }
if(!$cpw) { MgMoveURL("", "비밀번호 확인을 입력해주세요.", "", "back"); exit; }
if($pw != $cpw){ MgMoveURL("", "비밀번호와 비밀번호 확인 정보가 일치하지 않습니다.", "", "back"); exit; }
if(!$email_id) { MgMoveURL("", "이메일(아이디)을 입력해주세요.", "", "back"); exit; }
if(!$email_domain) { MgMoveURL("", "이메일(도메인)을 입력해주세요.", "", "back"); exit; }


// 쿼리 적용
$sec_pw = md5($pw);

$query[] = "
	INSERT INTO {$TABLE_INFO['master']} ( 
		`sid`, `id`, `name`, `pw`, `email`, `tel`, `lvl`, `vcenter`, `status`, `regdate`, `reg_id`
	) VALUES (
		'{$sid}', '{$id}', '{$name}', '{$sec_pw}', '{$email}', '{$tel}', '{$level}', '{$vcenter}', '{$status}', SYSDATE(), '{$reg_id}'
	)
";
$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("list.php", "등록되었습니다.", "", "");
exit;
?>