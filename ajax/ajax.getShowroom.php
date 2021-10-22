<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$area_cd = $_POST["area"];

$sql = "SELECT area_code, code, name, addr, tel, fax, lat, lng FROM volvo_store WHERE type = 'showroom'";

$db->fetch_array($sql);

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>