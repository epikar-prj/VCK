<?php
header("Content-Type:application/json; charset=UTF-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = PARAM2('master_cust_cd');
$user_id = PARAM2('id');

$receive_nm = PARAM2('name');
$receive_hp = PARAM2('hp');
$receive_addr1 = PARAM2('addr1');
$receive_addr2 = PARAM2('addr2');
$receive_zip = PARAM2('zipcode');

$sql = " SELECT * FROM volvo_wating_cust WHERE master_cust_cd = '{$master_cust_cd}' AND chkdel <> 'Y' ";
$result = $db->select_one($sql);

if ($result) {
    echo '{"result": "overlap", "msg": "대기 고객 기프트 신청이 완료되었습니다."}';
    exit;
}

$sql2[] = " INSERT INTO volvo_wating_cust (`master_cust_cd`, `id`, `receive_nm`, `receive_hp`, `receive_addr1`, `receive_addr2`, `receive_zip`, `reg_date`, `upt_date`) VALUES ('{$master_cust_cd}', '{$user_id}', '{$receive_nm}', '{$receive_hp}', '{$receive_addr1}', '{$receive_addr2}', '{$receive_zip}', SYSDATE(), SYSDATE()) ";
$result2 = $db->tran_query($sql2);

if ($result2) {
    echo '{"result": "success", "msg": "대기 고객 기프트 신청이 완료되었습니다."}';
} else {
    echo '{"result": "fail", "msg": "볼보 대기 고객 기프트 신청 중 오류가 발생하였습니다. \n잠시 후 다시 시도해주세요.", "sql": "'.$sql2[0].'"}';
}

exit;
?>

