<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

  $edate = date("2021-06-21 00:00");
  $today = date("Y-m-d H:i");

  if ($today > $edate) {
  	echo "Hej, Klass #2\n\n이벤트가 종료되었습니다.\n(2021 .6 .20 까지)";
  	exit;
  }

$master_cust_cd = PARAM2('master_cust_cd');
$member_id = PARAM2('member_id');

$name = PARAM2('name');
$hp1 = PARAM2('hp1');
$hp2 = PARAM2('hp2');
$hp3 = PARAM2('hp3');
$hp = $hp1 . "-" . $hp2 . "-" . $hp3;
$car_model = PARAM2('car_model');
$car_num = PARAM2('car_num');


$checkSql = " select count(member_id) from volvo_hejklass_2 where member_id = '{$member_id}' ";
$checkResult = $db->select_one($checkSql);



// 카운트 조회가 0 일 때
if (!$checkResult) {
/*
    // Interface 
    $post_param = array(
        "master_cust_cd"		=> $master_cust_cd, 
        "id"		            => $member_id, 
		"name"		            => $name, 
        "hp"		            => $hp,
        "car_model"				=> $car_model,
        "car_num"				=> $car_num
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

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('hejklass', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );
*/
    // if ($response['result'] == 'success') {
	if (1) {
        
        $query2[] = "
            INSERT INTO volvo_hejklass_2 ( 
                `master_cust_cd`, `member_id`, `name`, `hp`, `car_model`, `car_num`, `regdate`
            ) VALUES (
                '{$master_cust_cd}', '{$member_id}', '{$name}', '{$hp}', '{$car_model}', '{$car_num}', SYSDATE()
            )
        ";

		//echo $query2[0];
        
        $result2 = $db->tran_query( $query2 );
            
        if ($result2) {
            echo "Hej, Klass #2\n\n이벤트 신청이 완료 되었습니다.";
        } else {
            echo "Hej, Klass #2\n\n이벤트 신청에 실패 하였습니다.";
        }

        
        require_once $_SERVER['DOCUMENT_ROOT'] . "/inc/disconnect.php";

    } else {
        echo "Hej, Klass #2\n\n이벤트 신청에 실패 하였습니다.";
    }
} else {
    echo "이미 Hej, Klass #2 이벤트 신청이 완료 되었습니다.\n\n중복 신청이 불가합니다";
}








?>