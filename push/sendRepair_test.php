<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

header('Content-Type: application/json');


$userSql = "select tokken, id, master_cust_cd from volvo_user where id in ('mook9153@daum.net', 
'sangjun76@gmail.com',
'knit30@naver.com',
'hasungy@naver.com',
'jyjy1116@naver.com',
'jokangil@gmail.com',
'eulerlab@naver.com',
'kimoo26@naver.com',
'pwrjay@hanmail.net',
'siegfried82@nate.com',
'horizon101@daum.net',
'choichulho@naver.com',
'kyunjoo7@gmail.com',
'info@scentpia.co.kr',
'smart4859@naver.com',
's09034@volvo.com',
'seylon@daum.net',
'mni_jye@naver.com',
'dongkys@gmail.com',
'pasa001@naver.com',
'junho.austin.oh@gmail.com',
'jiun1115@gmail.com',
'ksongsoo@naver.com',
'kdh0880876@naver.com',
'joon_0421@naver.com',
'moss1318@naver.com',
'hsk2417@naver.com',
'bpkh@hotmail.com',
'ladval77@gmail.com',
'choonha.ryu@gmail.com',
'jayjaeuklee@gmail.com',
'ohyung@ohyung.com',
'sangminii@naver.com',
'ywwon82@gmail.com',
'20315man@naver.com',
'phantomjei@naver.com',
'135kbs@naver.com',
'sungho.lee@hotmail.com',
'mgc1806@hanmail.net',
'jis@comnarae.co.kr',
'apptest@volvocars.com',
'jis@comnarae.co.kr',
'catboy95@naver.com',
'drg8701@gmail.com',
'h113@nate.com',
'ksy8227@naver.com',
'ddeng2s@naver.com',
'yhlovehihi@naver.com')
";



$userResult = $db->fetch_array($userSql);

foreach($userResult as $user) {
    $token = $user["tokken"];
    $id = $user["id"];
    $master_cust_cd = $user["master_cust_cd"];

    if ($token) {
        $url = "https://fcm.googleapis.com/fcm/send";
        // $token = "eLMDoVtmHUI-rFStAiAGw9:APA91bH1IIb7JIDEtIdN-zavp02hN0ZsxDtJCHOvSUGxJlTh3fgfv58tmRi-E0O2hzmJ_5P1V6aeypZIyk7fWWBErdlJN0puKKuDBJPYrO9eWJFmck2KcuvqUoxDdYqLROOeCjr7Kofr";
        $serverKey = 'AAAAgm-pKkU:APA91bFufuTCPHRUwx_gbOUu5wNjMBLDl5uncnysqObhNdv3oM9AbvU48zoqj-DYbBgSm61GB3SkZLW2EeGx6V_qEuGjZERC1hXSTKKyvAhar2RmweQC56XQe_lkDJJKAlmWBTryXNhq766aOcKUyJv6TE4Z1sIdZA';
        $title = "";
        $link = "https://volvoapp.co.kr/html/maintenence_check/index.php";
        $notification = array('title' =>$title , 'body' => "볼보 서비스센터를 이용해 주셔서 감사합니다. 지금 서비스센터 경험 설문조사에 참여하시면 스타벅스 기프티콘을 드립니다.", 'sound' => 'default', 'customUrl' => $link);
        $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high', 'data' => array('customUrl' => 'https://www.volvoapp.co.kr/html/maintenence_check/'));
    
        $json = json_encode($arrayToSend);
    
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    
        //Send the request
        $response = curl_exec($ch);
        echo $response . " || " . $id . " || " . $master_cust_cd . PHP_EOL;
        
        //Close request
        curl_close($ch);
    
        
        $sql9[] = " INSERT INTO volvo_send_push_repair (master_cust_cd, id, token, errorCode, message, regdate, `type`, link, is_view, is_del) VALUES('{$master_cust_cd}', '{$id}', '{$token}', '0', '볼보 서비스센터를 이용해 주셔서 감사합니다. 지금 서비스센터 경험 설문조사에 참여하시면 스타벅스 기프티콘을 드립니다.', SYSDATE(), 2, 'https://volvoapp.co.kr/html/maintenence_check/index.php', 'N', 'N') ";
        $db->tran_query( $sql9 );
        // print_r($sql9);
    
        sleep(1);
    }
    
    
}




exit;







$resultArr["result"] = $result;
$resultArr["errorcode"] = $errorCode;
$resultArr["IF"] = $if;

echo json_encode($resultArr);

// DB Disconnect
// require_once "../../inc/disconnect.php";

exit;

 
?>