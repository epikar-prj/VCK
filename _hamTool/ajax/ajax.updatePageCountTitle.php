<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$url = $_GET['url'];
$title = $_GET['title'];

$sql = " select count(*) from volvo_page_view_title where url = '{$url}' ";
// echo $sql;
$count = $db->select_one($sql);

if ($count > 0) {
    $sql = " UPDATE volvo_page_view_title SET title = '{$title}' where url = '{$url}' ";
    echo $db->query($sql);
} else {
    $sql2[] = " insert into volvo_page_view_title (title, url, regdate) values ('{$title}', '{$url}', SYSDATE()) ";
    echo $db->tran_query( $sql2 );
}

exit;
?>