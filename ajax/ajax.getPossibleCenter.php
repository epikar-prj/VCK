<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$dealer_cd = PARAM2("dealer_cd");

echo getPossibleCenter($dealer_cd);
?>