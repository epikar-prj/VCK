<?
header("Content-Type:application/json; charset=UTF-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

global $_COOKIE;

$master_cust_cd = PARAM2("master_cust_cd");

if ($master_cust_cd) {
    $master_cust_cd = $_COOKIE['master_cust_cd'];
}

$vin = PARAM2("vin");

$sql = " select * from volvo_send_push_repair where master_cust_cd = '" . $master_cust_cd . "' and errorCode = 0 and message <> '' and is_view <> 'Y' and is_del <> 'Y' order by regdate desc ";
$rows=$db->fetch_array($sql);

$number = count($rows); 
$result = "";

if ($number > 9) {
    $result = "9+";
} else if ($number == 0) {
    $result = "false";
} else {
    $result = "{$number}";
}

echo $result;
exit;
?>