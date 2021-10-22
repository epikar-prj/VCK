<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$resvt_seq = PARAM2("resvt_seq");

echo updateVehicleRepairResvtCancel($resvt_seq);

?>