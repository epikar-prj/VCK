<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$user_id = $_COOKIE['member_id'];
$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('logout', '{$user_id}', '', '', '{$holiday}', SYSDATE()); ";
$db->tran_query( $logQuery );

setcookie("member_id","",0,"/");
setcookie("member_sid","",0,"/");
setcookie("member_name","",0,"/");
setcookie("master_cust_cd","",0,"/");
setcookie("member_hp","",0,"/");
setcookie("member_level","",0,"/");
setcookie("owner_flag","",0,"/");
setcookie("location","",0,"/");

echo 1;
?>