<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$id = $_COOKIE['member_id'];
$sid = $_COOKIE['master_cust_cd'];
$log = $id . " | " . $sid;

$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('logout', '{$log}', '', '', '', SYSDATE()); ";
$db->tran_query( $logQuery );

setcookie("member_id","",0,"/");
setcookie("member_sid","",0,"/");
setcookie("member_name","",0,"/");
setcookie("master_cust_cd","",0,"/");
setcookie("hp","",0,"/");

MgMoveURL("/index.php", "로그아웃 되었습니다.", "", "");
?>