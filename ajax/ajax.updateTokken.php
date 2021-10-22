<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$tokken = PARAM2("tokken");
$id = PARAM2("id");

$device = "";

if (stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
    $device ="ios";
} else if (stristr($_SERVER['HTTP_USER_AGENT'],'iphone') ||
    strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
    $device ="ios";
} else if (stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
    $device ="android";
}


$sql = " UPDATE volvo_user SET tokken = '{$tokken}', device = '{$device}' WHERE id = '{$id}' ";

echo $result = $db->query($sql);

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
?>