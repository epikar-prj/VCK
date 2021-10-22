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
if( trim($_COOKIE['member_vcenter']) ){ $SearchCenter = $_COOKIE['member_vcenter']; }
else{ $SearchCenter = MgRequestCheck(trim($_REQUEST['SearchCenter']), 5, true, true); }
$SearchCarmodel = MgRequestCheck(trim($_REQUEST['SearchCarmodel']), 5, true, true);
$SearchSdate = MgRequestCheck(trim($_REQUEST['SearchSdate']), 15, true, true);
$SearchEdate = MgRequestCheck(trim($_REQUEST['SearchEdate']), 15, true, true);
$SearchTime = MgRequestCheck(trim($_REQUEST['SearchTime']), 5, true, true);
$SearchSex = MgRequestCheck(trim($_REQUEST['SearchSex']), 1, true, true); $SearchSex = $SearchSex ? $SearchSex : "A";
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchCenter={$SearchCenter}&SearchCarmodel={$SearchCarmodel}&SearchSdate={$SearchSdate}&SearchEdate={$SearchEdate}&SearchTime={$SearchTime}&SearchSex={$SearchSex}&SearchColumn={$SearchColumn}&SearchValue={$SearchValue}";

$listMode = MgRequestCheck(trim($_REQUEST['listMode']), 30, true, true);
$msg = "";


if($listMode == "delete"){
	foreach($_POST['chk'] as $ckey => $cval){
		$sid = MgRequestCheck(trim($cval), 11, true, true);
		if($sid){
			$query_chk[] = "UPDATE volvo_wating_cust SET `chkdel` = 'Y', `upt_date` = SYSDATE() WHERE sid = '{$sid}'";
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
MgMoveURL("list.php{$str_url}", $msg, "", "");
exit;
?>