<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$dealer_cd = PARAM2("dealer_cd");
$resvt_day = PARAM2("resvt_day");

$url = "https://vckcustapp-interface.comnarae.com:444/service_center_holiday/?dealer_cd=".$dealer_cd."&resvt_day=" . $resvt_day;	// Real Server URL
// $url = "http://test-vckcustapp-interface.comnarae.com:8080/service_center_holiday/?dealer_cd=".$dealer_cd."&resvt_day=" . $resvt_day;	// Test URL

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);      //connection timeout 10초 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함

$contents = curl_exec($ch);

$holiday = json_decode($contents, true);
$holiday = str_replace('<br>', '', strip_tags($holiday['hoilday_flag']));
$holiday = str_replace('<br \/>', '', strip_tags($holiday));
$holiday = preg_replace('/\r\n|\r|\n/', '', $holiday);

$logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('holiday', '{$url}', '', '', '{$holiday}', SYSDATE()); ";
$db->tran_query( $logQuery );

echo $holiday;

?>