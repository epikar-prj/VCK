<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$vin = PARAM2("vin");

echo getVehicleCouponToJson($vin);

?>