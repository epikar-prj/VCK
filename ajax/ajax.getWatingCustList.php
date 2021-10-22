<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

    $master_cust_cd = PARAM2('master_cust_cd');
    $master_cust_cd = '2271401';

    $sql = " select a.master_cust_cd, b.sid from volvo_wating_cust_list a left join volvo_wating_cust b on a.master_cust_cd = b.master_cust_cd where a.master_cust_cd = '{$master_cust_cd}' ";
    $checkResult = $db->fetch_array($sql)[0];
    
    if (!$checkResult['master_cust_cd']) {
        echo "nontarget";
        exit;
    }

    if ($checkResult['master_cust_cd'] && $checkResult['sid']) {
        echo "applied";
        exit;
    }

    if ($checkResult['master_cust_cd'] && !$checkResult['sid']) {
        echo "target";
        exit;
    }
?>