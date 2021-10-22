<?
date_default_timezone_set('Asia/Seoul');

$CurTime = date('YmdHis');
$RandNo = rand(100000, 999999);

//요청 번호 생성
$reqNum = $CurTime.$RandNo;

//01.입력값 변수로 받기
$cpId       = "CNTM1002";        // 회원사ID
$urlCode    = "008001";     // URL 코드
$certNum    = $reqNum;     // 요청번호
$date       = $CurTime;        // 요청일시
$certMet    = "M";     // 본인인증방법
$birthDay   = "";	// 생년월일
$gender     = "";		// 성별
$name       = "";        // 성명
$phoneNo    = "";		// 휴대폰번호
$phoneCorp 	= "";	// 이동통신사
$nation     = "";      // 내외국인 구분
$plusInfo   = "";	// 추가DATA정보
$tr_url     = "/plugin/certification/kmcis_web_sample_step03.php";      // 본인인증 결과수신 POPUP URL
$tr_add     = "Y";      // IFrame사용여부
$extendVar  = "0000000000000000";       // 확장변수


function paramChk($pattern, $param){
    $result = preg_match($pattern, $param);

    return $result;
}

$name = str_replace(" ", "+", $name) ;  //성명에 space가 들어가는 경우 "+"로 치환하여 암호화 처리

//02. tr_cert 데이터변수 조합 (서버로 전송할 데이터 "/"로 조합)
$tr_cert	= $cpId . "/" . $urlCode . "/" . $certNum . "/" . $date . "/" . $certMet . "/" . $birthDay . "/" . $gender . "/" . $name . "/" . $phoneNo . "/" . $phoneCorp . "/" . $nation . "/" . $plusInfo . "/" . $extendVar;
$tr_cert = iconv("UTF-8", "EUC-KR", $tr_cert);
//암호화모듈 호출
if (extension_loaded('ICERTSecu')) {
    //03. 1차암호화
    $enc_tr_cert = ICertSeed(1,0,'',$tr_cert);
    //04. 변조검증값 생성
    // $enc_tr_cert_hash = ICertHMac($enc_tr_cert);
    $enc_tr_cert_hash = "abcdabcdabcdabcdabcdabcdabcdabcdabcdabcd";
    //05. 2차암호화
    $enc_tr_cert = $enc_tr_cert . "/" . $enc_tr_cert_hash . "/" . "0000000000000000";
    $enc_tr_cert = ICertSeed(1,0,'',$enc_tr_cert);
    // $result['ori_cert'] = $tr_cert;
    $result['cert'] = $enc_tr_cert;
    $result['tr_url'] = $tr_url;
    $result['tr_add'] = $tr_add;

    echo json_encode($result);
}else{
   echo("암호화모듈 호출 실패!!!");
   return;
}
?>