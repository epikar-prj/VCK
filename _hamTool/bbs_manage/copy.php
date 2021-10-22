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

$sid = MgRequestCheck($_REQUEST['sid'], 11, true, true);
$reg_id = $_COOKIE['member_id'];

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "복사하실 게시판을 선택하세요.", "", "back"); exit; }


// 쿼리 적용
$query[] = "
	INSERT INTO {$TABLE_INFO['bbs_manage']} ( 
		`sid`, `gubun`, `title`, `top_content`, `bot_content`, `titlecut`, `limit`, `block`, `iscate`, `category`, `isthum`, `iscomment`, `llevel`, `vlevel`, `wlevel`, `ulevel`, `dlevel`, `rlevel`, `clevel`, `plevel`, `status`, `chkdel`, `regdate`, `reg_id`, `uptdate`, `upt_id`
	) 
	SELECT 
		null, `gubun`, concat(title, '_복사'), `top_content`, `bot_content`, `titlecut`, `limit`, `block`, `iscate`, `category`, `isthum`, `iscomment`, 
		`llevel`, `vlevel`, `wlevel`, `ulevel`, `dlevel`, `rlevel`, `clevel`, `plevel`, 'Y', 'N', `regdate`, `reg_id`, `uptdate`, `upt_id`
	FROM
		{$TABLE_INFO['bbs_manage']}
	WHERE
		sid = '{$sid}'
";
$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}

$title = printTableOneValue($TABLE_INFO['bbs_manage'], '', 'title', "sid = '{$sid}'", '');

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
MgMoveURL("list.php" . $str_url, "복사되었습니다.", "", "");
exit;
?>