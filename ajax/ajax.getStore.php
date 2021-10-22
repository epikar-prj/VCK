<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$area_cd = $_POST["area"];
$type = $_POST["type"];

$sql = "SELECT area_code, code, name, addr, tel, fax, lat, lng FROM volvo_store WHERE type = '{$type}' AND area_code = '{$area_cd}'";

$result = $db->fetch_array($sql);

echo json_encode($result, JSON_UNESCAPED_UNICODE);

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>