<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$start = PARAM2("start");
$limit = PARAM2("limit");

$limitSql = " limit {$start}, {$limit} ";

$sql = " SELECT sid, title, subtitle, publish_date, thum_file, regdate FROM volvo_bbs_5 WHERE chkdel <> 'Y' ORDER BY `notice` DESC, `grp` DESC, `odr` ASC, `publish_date` DESC {$limitSql} ";

echo json_encode($db->fetch_array($sql), JSON_UNESCAPED_UNICODE);

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>