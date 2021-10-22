<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$resvt_year = PARAM2("resvt_year");
$vin = PARAM2("vin");

echo getRealtimeVehicleRepairResvtListToJson($resvt_year, $vin);

?>