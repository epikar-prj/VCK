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
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true); $encode_value = urlencode($SearchValue);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchGubun={$SearchGubun}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

$upt_id = $_COOKIE['member_id'];
$listMode = MgRequestCheck(trim($_REQUEST['listMode']), 30, true, true);
$msg = "";


if($listMode == "statusok" || $listMode == "statuscan"){

	$status = "N";
	if($listMode == "statusok"){ $status = "Y"; }
	$msg_val = $OPTION_INFO['status'][$status];

	foreach($_POST['chk'] as $ckey => $cval){
		$sid = MgRequestCheck(trim($cval), 11, true, true);
		if($sid){
			$query_chk[] = "UPDATE {$TABLE_INFO['bbs_manage']} SET `status`='{$status}', `uptdate`=SYSDATE(), `upt_id`='{$upt_id}' WHERE sid = '{$sid}'";
		}
	}

	$result_chk = $db->tran_query( $query_chk );
	if(!$result_chk) {
		MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
		exit;
	}

	$msg = "해당 게시판의 상태가 {$msg_val}으로 적용되었습니다.";
}


if($listMode == "delete"){
	foreach($_POST['chk'] as $ckey => $cval){
		$sid = MgRequestCheck(trim($cval), 11, true, true);
		if($sid){
			$query_chk[] = "UPDATE {$TABLE_INFO['bbs_manage']} SET `chkdel` = 'Y', `uptdate` = SYSDATE(), `upt_id` = '{$upt_id}' WHERE sid = '{$sid}'";
		}
	}

	$result_chk = $db->tran_query( $query_chk );
	if(!$result_chk) {
		MgMoveURL("", "처리 중 오류가 발생하였습니다.2", "", "back");
		exit;
	}

	$msg = "삭제되었습니다.";
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("list.php" . $str_url, $msg, "", "");
exit;
?>