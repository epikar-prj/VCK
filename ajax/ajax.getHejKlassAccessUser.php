<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$id = $_GET["id"];

$limitSql = " limit {$start}, {$limit} ";

$sql = " SELECT count(*) as cnt FROM volvo_hejklass_access_user WHERE id = '{$id}' ";

echo $db->select_one($sql);

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>