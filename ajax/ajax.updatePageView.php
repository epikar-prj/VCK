<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$url = $_GET["url"];
$category = $_GET["category"];

if ($url) {
    $sql[] = " insert into volvo_page_view (category, url, regdate) values ('{$category}', '{$url}', SYSDATE()) ";
    $db->tran_query( $sql );
}


exit;
?>