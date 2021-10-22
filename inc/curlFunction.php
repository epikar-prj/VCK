<?php

// 차량정보
function getVehicleInfoToJson() {
    global $_COOKIE, $db;

    // Interface 
    $post_param = array(
        "id"		            => $_COOKIE['member_id'], 
        "master_cust_cd"		=> $_COOKIE['master_cust_cd'], 
    );

    // if ($_COOKIE['member_id'] == 'apptest@volvocars.com') {
    //     $post_param = array(
    //         "id"		            => 'jju79jju@icloud.com', 
    //         "master_cust_cd"		=> '2138412', 
    //     );
    // }

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/vehicle_info";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_info";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $contents = str_replace(" car_no", "car_no", $contents);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('vehicleInfo', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

function getVehicleInfoToArray() {
    return json_decode(getVehicleInfoToJson(), true);
}

// 서비스센터 예약 관리 리스트
function getVehicleRepairResvtListToJson($resvt_year, $vin = "") {
    global $_COOKIE, $db;

    $master_cust_cd = $_COOKIE['master_cust_cd'];
    $id = $_COOKIE['member_id'];

    // Interface 
    $post_param = array(
        "id"		            => $id, 
        "master_cust_cd"		=> $master_cust_cd, 
        "resvt_year"		    => $resvt_year, 
        "vin"		            => $vin, 
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);
    
    $url = "https://vckcustapp-interface.comnarae.com:444/vehicle_repair_resvt_list";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_repair_resvt_list";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('resvtlist', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

function getVehicleRepairResvtListToArray($resvt_year, $vin = "") {
    return json_decode(getVehicleRepairResvtListToJson($resvt_year, $vin), true);
}

// 서비스센터 정비 예약 취소
function updateVehicleRepairResvtCancel($resvt_seq) {
    global $_COOKIE, $db;

    // Interface 
    $post_param = array(
        "id"		            => $_COOKIE['member_id'], 
        "master_cust_cd"		=> $_COOKIE['master_cust_cd'], 
        "resvt_seq"		        => $resvt_seq, 
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/vehicle_repair_resvt_cancel";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_repair_resvt_cancel";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('resvtcancel', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

// 차량쿠폰
function getVehicleCouponToJson($vin) {
    global $_COOKIE, $db;

    // Interface 
    $post_param = array(
        "id"		            => $_COOKIE['member_id'], 
        "master_cust_cd"		=> $_COOKIE['master_cust_cd'], 
        "vin"		=> $vin 
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/vehicle_coupon";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_coupon";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('coupon', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

function getVehicleCouponToArray($vin) {
    return json_decode(getVehicleCouponToJson($vin), true);
}


function getVehicleToJson() {
    global $_COOKIE, $db;

    $master_cust_cd = $_COOKIE['master_cust_cd'];
    $id = $_COOKIE['member_id'];

    // Interface 
    $post_param = array(
        "id"		            => $id, 
        "master_cust_cd"		=> $master_cust_cd, 
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/vehicle_info";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/vehicle_info";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $contents = str_replace(" car_no", "car_no", $contents);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('vehicleInfo', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    echo $contents;
}

function getVehicleToArray($vin) {
    return json_decode(getVehicleToJson(), true);
}

function getMasterCD() {
    global $_COOKIE;

    return $_COOKIE['master_cust_cd'];
}

function getOwnerFlag() {
    global $_COOKIE, $db;

    $master_cust_cd = $_COOKIE['master_cust_cd'];
    $id = $_COOKIE['member_id'];

    if (!$master_cust_cd || !$id) {
        return 'N';
    }

    // Interface 
    $post_param = array(
        "id"		=> $id, 
        "master_cust_cd"		=> $master_cust_cd
    );

    $json_str = json_encode($post_param);

    $url = "https://vckcustapp-interface.comnarae.com:444/owner_check";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com:8080/owner_check";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('ownerflag', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    $owner_flag = $response['resultData'][0]['owner_flag'];

    setcookie("owner_flag", $owner_flag, 0, "/");

    return $owner_flag;
}

function checkOneYearCoupon($vin) {
    global $_COOKIE, $db;

    $sql = " SELECT regdate FROM volvo_use_oneyear_coupon WHERE master_cust_cd = '{$_COOKIE['master_cust_cd']}' AND vehicl_no = '{$vin}'; ";
    
    $result = $db->select_one($sql);
    
    if (!$result) { $result = 0; }
    
    return $result;
}



// 20210105

// 실시간 서비스센터 예약 관리 리스트
function getRealtimeVehicleRepairResvtListToJson($resvt_year, $vin = "") {
    global $_COOKIE, $db;

    $master_cust_cd = $_COOKIE['master_cust_cd'];
    $id = $_COOKIE['member_id'];

    // Interface 
    $post_param = array(
        "id"		            => $id, 
        "master_cust_cd"		=> $master_cust_cd, 
        "resvt_year"		    => $resvt_year, 
        "vin"		            => $vin, 
    );
    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);
    
    $url = "https://vckcustapp-interface.comnarae.com:444/realtime_repair_resvt_list";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com/realtime_repair_resvt_list";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('resvtlist', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

function getRealtimeVehicleRepairResvtListToArray($resvt_year, $vin = "") {
    return json_decode(getRealtimeVehicleRepairResvtListToJson($resvt_year, $vin), true);
}

// 서비스센터 정비 이력 리스트
function getVehicleRepairRecodeListToJson($resvt_year, $vin = "") {
    global $_COOKIE, $db;

    $master_cust_cd = $_COOKIE['master_cust_cd'];
    $id = $_COOKIE['member_id'];

    // Interface 
    $post_param = array(
        "id"		            => $id, 
        "master_cust_cd"		=> $master_cust_cd, 
        "search_year"		    => $resvt_year, 
        "vin"		            => $vin, 
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);
    
    $url = "https://vckcustapp-interface.comnarae.com:444/vehicle_repair_search";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com/vehicle_repair_search";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('repairrecode', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

function getVehicleRepairRecodeListToArray($resvt_year, $vin = "") {
    return json_decode(getVehicleRepairRecodeListToJson($resvt_year, $vin), true);
}

// 실시간 서비스센터 정비 예약 취소
function updateRealtimeVehicleRepairResvtCancel($ro_no, $vin) {
    global $_COOKIE, $db;

    // Interface 
    $post_param = array(
        "id"		            => $_COOKIE['member_id'], 
        "master_cust_cd"		=> $_COOKIE['master_cust_cd'], 
        "ro_no"		        => $ro_no, 
        "vin"		        => $vin, 
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/realtime_repair_resvt_cancel";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com/realtime_repair_resvt_cancel";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('resvtcancel', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

// 실시간 서비스센터 정비 예약 중복채크
function getDuplicateResvt($vin) {
    global $_COOKIE, $db;

    $post_param = array(
        "id"		            => $_COOKIE['member_id'], 
        "master_cust_cd"		=> $_COOKIE['master_cust_cd'], 
        "vin"		        => $vin
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/duplication_reservation_check";	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com/duplication_reservation_check";	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('duplicateResvt', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

// 실시간 서비스센터 예약 가능 확인
function getPossibleCenter($dealer_cd) {
    global $_COOKIE, $db;

    $url = "https://vckcustapp-interface.comnarae.com:444/realtime_repair_possible_center/?dealer_cd=" . $dealer_cd;	// Real Server URL
    // $url = "http://test-vckcustapp-interface.comnarae.com/realtime_repair_possible_center/?dealer_cd=" . $dealer_cd;	// Test URL

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $contents = curl_exec($ch);

    $response = json_decode($contents, true);

    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('possibleCenter', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );

    return $contents;
}

function getFloCoupon() {
    global $_COOKIE, $db;

    $master_cust_cd = $_COOKIE['master_cust_cd'];
    $id = $_COOKIE['member_id'];

    $post_param = array(
        "master_cust_cd"     => $master_cust_cd, 
        "id"		         => $id
    );

    $json_str = json_encode($post_param, JSON_UNESCAPED_UNICODE);

    $url = "https://vckcustapp-interface.comnarae.com:444/flo_coupon_info";	// Real Server URL
    // $url = "https://test-vckcustapp-interface.comnarae.com:444/flo_coupon_info";	// Test URL
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_str);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $contents = curl_exec($ch);
    
    $response = json_decode($contents, true);
    $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('flo', '{$json_str}', '{$response['errorcode']}', '{$response['result']}', '{$contents}', SYSDATE()); ";
    $db->tran_query( $logQuery );
    
    return $contents;
}

function getFloCouponArray() {
    return json_decode(getFloCoupon(), true);
}

?>