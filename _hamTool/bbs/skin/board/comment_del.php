<?php
/*
foreach($_GET as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

//관리자 체크
AdminChk();

// Request 값
$sid = MgRequestCheck(trim($_REQUEST['sid']), 11, true, true);
$csid = MgRequestCheck(trim($_REQUEST['csid']), 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "비정상적인 접근 방법입니다.1", "", "back"); exit; }
if(!$csid) { MgMoveURL("", "삭제하실 댓글을 선택해 주세요.", "", "back"); exit; }


// 쿼리 적용
$query_del[] = "DELETE FROM {$TABLE_INFO['bbs_comment']} WHERE sid = '{$csid}'";
$result_del = $db->tran_query( $query_del );
if(!$result_del) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
	exit;
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid={$bm_sid}&mode=view&sid={$sid}&{$str_url3}", "댓글이 삭제되었습니다.", "", "");
exit;
?>