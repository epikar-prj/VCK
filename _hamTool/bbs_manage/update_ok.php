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
$SearchGubun = MgRequestCheck(trim($_REQUEST['SearchGubun']), 50, true, true);
$SearchStatus = MgRequestCheck(trim($_REQUEST['SearchStatus']), 1, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchGubun={$SearchGubun}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$SearchValue}";

$sid = MgRequestCheck($_POST['sid'], 11, true, true);
$upt_id = $_COOKIE['member_id'];

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
if(!$sid) { MgMoveURL("", "수정하실 게시판을 선택하세요.", "", "back"); exit; }
if(!$gubun) { MgMoveURL("", "게시판 형태를 선택해주세요.", "", "back"); exit; }
if(!$title) { MgMoveURL("", "게시판명을 입력해주세요.", "", "back"); exit; }
if(!$titlecut) { MgMoveURL("", "목록 글자수를 입력해주세요.", "", "back"); exit; }
if(!$limit) { MgMoveURL("", "줄수를 입력해주세요.", "", "back"); exit; }
if(!$block) { MgMoveURL("", "페이지수를 입력해주세요.", "", "back"); exit; }


// 쿼리 적용
$query[] = "
	UPDATE
		{$TABLE_INFO['bbs_manage']} 
	SET
		`gubun` = '{$gubun}',
		`title` = '{$title}',
		`top_content` = '{$top_content}',
		`bot_content` = '{$bot_content}',
		`titlecut` = '{$titlecut}',
		`limit` = '{$limit}',
		`block` = '{$block}',
		`iscate` = '{$iscate}',
		`category` = '{$category}',
		`isthum` = '{$isthum}',
		`iscomment` = '{$iscomment}',
		`status` = '{$status}',
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
MgMoveURL("list.php" . $str_url, "수정되었습니다.", "", "");
exit;
?>