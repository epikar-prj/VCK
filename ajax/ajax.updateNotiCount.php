<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

global $_COOKIE;

$master_cust_cd = PARAM2("master_cust_cd");
$mode = PARAM2("mode");


if ($mode != "d") {
    $sql = " update volvo_send_push_repair set is_view = 'Y' where master_cust_cd = '" . $master_cust_cd . "' ";
} else {
    $sql = " update volvo_send_push_repair set is_view = 'Y', is_del = 'Y' where master_cust_cd = '" . $master_cust_cd . "' ";
}

echo $sql;
$result = $db->query( $sql );

?>