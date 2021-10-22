<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$ro_no = PARAM2("ro_no");
$vin = PARAM2("vin");

echo updateRealtimeVehicleRepairResvtCancel($ro_no, $vin);

?>