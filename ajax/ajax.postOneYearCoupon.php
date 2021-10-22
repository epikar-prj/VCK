<?
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = $_COOKIE["master_cust_cd"];
$vin = PARAM2("vin");

$query[] = "
INSERT INTO volvo_use_oneyear_coupon
    (master_cust_cd, vehicl_no, regdate)
VALUES 
    ('{$master_cust_cd}', '{$vin}', SYSDATE());
";
$result = $db->tran_query( $query );

if (!$result) {
    echo 0;
    exit;
}

echo 1;

require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";
exit;

?>