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

$gubun = MgRequestCheck(trim($_POST['gubun']), 50, true, true); $gubun = $gubun ? $gubun : "board";
$title = MgRequestCheck(trim($_POST['title']), 255, true, true);
$top_content = MgRequestCheck(trim($_POST['top_content']), 4294967295, true, true);
$bot_content = MgRequestCheck(trim($_POST['bot_content']), 4294967295, true, true);
$titlecut = MgRequestCheck(trim($_POST['titlecut']), 3, true, true); $titlecut = $titlecut ? $titlecut : "40";
$limit = MgRequestCheck(trim($_POST['limit']), 2, true, true); $limit = $limit ? $limit : "20";
$block = MgRequestCheck(trim($_POST['block']), 2, true, true); $block = $block ? $block : "10";
$iscate = MgRequestCheck(trim($_POST['iscate']), 1, true, true); $iscate = $iscate ? $iscate : "N";
$category = MgRequestCheck(trim($_POST['category']), 4294967295, true, true);
$isthum = MgRequestCheck(trim($_POST['isthum']), 1, true, true); $isthum = $isthum ? $isthum : "N";
$iscomment = MgRequestCheck(trim($_POST['iscomment']), 1, true, true); $iscomment = $iscomment ? $iscomment : "N";
$status = MgRequestCheck(trim($_POST['status']), 1, true, true); $status = $status ? $status : "N";


// 입력 데이터 검증
if(!$gubun) { MgMoveURL("", "게시판 형태를 선택해주세요.", "", "back"); exit; }
if(!$title) { MgMoveURL("", "게시판명을 입력해주세요.", "", "back"); exit; }
if(!$titlecut) { MgMoveURL("", "목록 글자수를 입력해주세요.", "", "back"); exit; }
if(!$limit) { MgMoveURL("", "줄수를 입력해주세요.", "", "back"); exit; }
if(!$block) { MgMoveURL("", "페이지수를 입력해주세요.", "", "back"); exit; }


// 쿼리 적용
$query[] = "
	INSERT INTO {$TABLE_INFO['bbs_manage']} ( 
		`sid`, `gubun`, `title`, `top_content`, `bot_content`, `titlecut`, `limit`, `block`, `iscate`, `category`, `isthum`, `iscomment`, `status`, `regdate`, `reg_id`
	) VALUES (
		'{$sid}', '{$gubun}', '{$title}', '{$top_content}', '{$bot_content}', '{$titlecut}', '{$limit}', '{$block}', '{$iscate}', '{$category}', '{$isthum}', '{$iscomment}', '{$status}', SYSDATE(), '{$reg_id}'
	)
";

$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}

// 마지막에 insert된 sid 값 가져오기
/*
$query_sid = "SHOW TABLE status like '{$TABLE_INFO['bbs_manage']}'";
$row=$db->row($query_sid);
$sid = $row['Auto_increment']-1;
*/
$query_sid = "SELECT max(sid) as sid FROM {$TABLE_INFO['bbs_manage']}";
$row=$db->row($query_sid);
$sid = $row['sid'];

// 게시판 테이블 생성
require_once "bbs_struct.php";
foreach($create_query as $cquery) {
	$create_query2[] = str_replace("::MASTER::", $sid, $cquery);
}
$cresult = $db->tran_query( $create_query2 );
if(!$cresult) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.2", "", "back");
	exit;
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("list.php", "등록되었습니다.", "", "");
exit;
?>