<?
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = $_COOKIE["master_cust_cd"];
$vin = PARAM2("vin");
$isUse = PARAM2("isUse");
$isOver = PARAM2("isOver");

$query[] = "
INSERT INTO volvo_use_oneyear_coupon_log
    (master_cust_cd, vehicl_no, isUse, isOver, regdate)
VALUES 
    ('{$master_cust_cd}', '{$vin}', '{$isUse}', '{$isOver}', SYSDATE());
";
$result = $db->tran_query( $query );

// print_r($query);

if (!$result) {
    echo 0;
    exit;
}

echo 1;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
exit;

?>