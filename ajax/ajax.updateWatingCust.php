<?php
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$sid = PARAM2('sid');

$sql[] = " UPDATE volvo_wating_cust SET is_received = 'Y', rec_date = SYSDATE() WHERE `master_cust_cd` = '{$sid}' ";
$result = $db->tran_query($sql);

if ($result) {
    echo '{"result": "success", "msg": "수령완료"}';
} else {
    echo '{"result": "fail", "msg": "오류가 발생하였습니다. \n잠시 후 다시 시도해주세요."}';
}

exit;
?>

