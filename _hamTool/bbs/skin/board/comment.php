<?php
/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

// Request 값
$csid = 0;
$sid = MgRequestCheck(trim($_POST['sid']), 11, true, true);
$member_sid = $_COOKIE['member_sid']; $member_sid = $member_sid ? $member_sid : "0";
$member_id = $_COOKIE['member_id'];

$coname = MgRequestCheck(trim($_POST['coname']), 50, true, true);
$comment = MgRequestCheck(trim($_POST['comment']), 4294967295, true, true);
$ip=addslashes($_SERVER['REMOTE_ADDR']);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "비정상적인 접근 방법입니다.2", "", "back"); exit; }
if(!$coname) { MgMoveURL("", "이름을 등록해 주세요.", "", "back"); exit; }
if(!$comment) { MgMoveURL("", "댓글을 등록해 주세요.", "", "back"); exit; }


// 쿼리 적용
$query[] = "
	INSERT INTO {$TABLE_INFO['bbs_comment']} ( 
		`sid`, `bm_sid`, `bbs_sid`, `member_sid`, `name`, `comment`, `ip`, `regdate`
	) VALUES (
		'{$csid}', '{$bm_sid}', '{$sid}', '{$member_sid}', '{$coname}', '{$comment}', '{$ip}', SYSDATE()
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
MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid&mode=view&sid=$sid&$str_url3", "댓글이 등록되었습니다.", "", "");
exit;
?>