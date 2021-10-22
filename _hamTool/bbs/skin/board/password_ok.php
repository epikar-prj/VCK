<?php
/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

// Request 값
$action = MgRequestCheck(trim($_POST['action']), 50, true, true);
$sid = MgRequestCheck(trim($_POST['sid']), 11, true, true);
$member_sid = $_COOKIE['member_sid']; $member_sid = $member_sid ? $member_sid : "0";
$member_id = $_COOKIE['member_id'];

$pw = MgRequestCheck(trim($_POST['pw']), 20, true, true);

// 입력 데이터 검증
if(!$action) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.3", "", "back"); exit; }
if(!$sid) { MgMoveURL("", "수정하실 게시물을 선택해 주세요.", "", "back"); exit; }
if(!$pw) { MgMoveURL("", "비밀번호를 등록해 주세요.", "", "back"); exit; }


// 자료 검색
$query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `ishtml`, `content`, `url`, `hp`, `email`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
$row=$db->row($query);

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 게시물입니다.", "", "back"); exit; }

// 비밀번호 확인
if( md5($pw) != $row['pw'] ){ MgMoveURL("", "입력하신 비밀번호가 틀립니다.", "", "back"); exit; }


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid&mode=$action&sid=$sid&$str_url3", "", "", "");
exit;
?>