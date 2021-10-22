<?

include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$master_cust_cd = $_COOKIE['master_cust_cd'];
$user_sid = $_COOKIE['member_sid'];
$user_id = $_COOKIE['member_id'];
$user_nm = $_COOKIE['member_name'];
$user_hp = $_COOKIE['member_hp'];

$answer = PARAM2('answer');


$use_email_recept_yn = PARAM2('use_email_recept_yn');
$use_push_recept_yn = PARAM2('use_push_recept_yn');
$use_dm_recept_yn = PARAM2('use_dm_recept_yn');


// 중복체크
$checkSql = " select count(id) from volvo_event_1 where id = '{$user_id}' ";
$checkResult = $db->select_one($checkSql);
// 카운트 조회가 0 일 때
if (!$checkResult) {

    // Interface 
    $post_param = array(
        "master_cust_cd"		=> $master_cust_cd, 
        "id"		            => $user_id, 
        "pw"		            => "",
        "use_sms_recept_yn"     => "Y",
        "use_email_recept_yn"   => $use_email_recept_yn,
        "use_push_recept_yn"	=> $use_push_recept_yn,
        "use_dm_recept_yn"	=> $use_dm_recept_yn
    );
    $json_str = json_encode($post_param);


    $url = "https://vckcustapp-interface.comnarae.com:444/customer_info_edit";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/customer_info_edit";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);


    if ($response['result'] == 'success') {
        
        // 쿼리 적용
        $query = "
        UPDATE volvo_user SET
        use_email_recept_yn = '{$use_email_recept_yn}',
        use_push_recept_yn = '{$use_push_recept_yn}',
        use_dm_recept_yn = '{$use_dm_recept_yn}',
        upd_date = SYSDATE()
        WHERE sid = '{$user_sid}'
        ";

        $result_arr['query'] = $query;
        $result = $db->query( $query );


        $query2[] = "
            INSERT INTO volvo_event_1 ( 
                `id`, `cust_nm`, `hp`, `answer`, `use_sms_recept_yn`, `use_email_recept_yn`, `use_push_recept_yn`, `use_dm_recept_yn`, `reg_date`
            ) VALUES (
                '{$user_id}', '{$user_nm}', '{$user_hp}', '{$answer}', 'Y', '{$use_email_recept_yn}', '{$use_push_recept_yn}', '{$use_dm_recept_yn}', SYSDATE()
            )
        ";
        
        $result2 = $db->tran_query( $query2 );
            
        if ($result2) {
            echo "이벤트 참여가 완료되었습니다.";
        } else {
            echo "이벤트 참여에 실패하였습니다.";
        }

        
        require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";

    } else {
        echo "이벤트 참여에 실패하였습니다.";
    }
} else {
    echo "이미 이벤트에 참여하셨습니다.";
}








?>