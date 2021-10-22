<?
Header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('Asia/Seoul');

if ($_SERVER["REMOTE_ADDR"] == "1.245.137.12") {
    // error_reporting(E_ALL);
    // ini_set("display_errors", 1);
}

// include 파일
// require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/common.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/dbCon.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/function.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/curlFunction.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/session.php");

$date_code = date('YmdHis');


// 사이트 정보
$SITE_INFO['http'] = isset($_SERVER['HTTPS']) ? 'https://' : 'http://'; 
$SITE_INFO['title'] = "Volvo";
$SITE_INFO['title_kr'] = "볼보";
$SITE_INFO['tel'] = "02-0000-0000";
$SITE_INFO['email'] = "master@volvo.co.kr";
$SITE_INFO['charset'] = "utf-8";
$SITE_INFO['home_dir'] = "";
$SITE_INFO['http_host'] = $SITE_INFO['http'] . $_SERVER['HTTP_HOST'] . $SITE_INFO['home_dir'];
$SITE_INFO['root'] = $_SERVER['DOCUMENT_ROOT'] . $SITE_INFO['home_dir'];
$SITE_INFO['user_agent'] = strtolower($_SERVER['HTTP_USER_AGENT']);

/** 옵션 **/
$OPTION_INFO['mlevel'] = array("A"=>"운영자", "B"=>"전시장", "U"=>"회원", "Z"=>"일시정지");																					                    //운영자관리 - 등급(A:운영자, B:전시장, U:회원, Z:일시정지)
// $OPTION_INFO['mlevel'] = "";


$OPTION_INFO['mlevel_out'] = "U,Z";																																								//등급별 접근메뉴에서 제외할 등급(U:회원, Z:일시정지)

$OPTION_INFO['site_type'] = array("P"=>"PC", "M"=>"Mobile", "A"=>"APPLICATION");																												//신청경로
$OPTION_INFO['sex'] = array("M"=>"남", "F"=>"여");																																				//성별
$OPTION_INFO['sex2'] = array("A"=>"전체", "M"=>"남", "F"=>"여");																																//성별2
$OPTION_INFO['email'] = array("gmail.com"=>"gmail.com", "naver.com"=>"naver.com", "nate.com"=>"nate.com", "empas.com"=>"empas.com", "lycos.co.kr"=>"lycos.co.kr", 
											"hanmail.net"=>"hanmail.net", "hanmir.com"=>"hanmir.com", "hitel.net"=>"hitel.net", "hotmail.com"=>"hotmail.com", "korea.com"=>"korea.com", 
											"netsgo.com"=>"netsgo.com", "chol.com"=>"chol.com", "dreamwiz.com"=>"dreamwiz.com", "freechal.com"=>"freechal.com", "hanafos.com"=>"hanafos.com",   
											"netian.com"=>"netian.com", "paran.com"=>"paran.com", "yahoo.co.kr"=>"yahoo.co.kr", "yahoo.com"=>"yahoo.com"
											);																																					//이메일
$OPTION_INFO['tel'] = array("02"=>"02", "031"=>"031", "032"=>"032", "033"=>"033", "041"=>"041", "042"=>"042", "043"=>"043", "044"=>"044", 
										"051"=>"051", "052"=>"052", "053"=>"053", "054"=>"054", "055"=>"055", "061"=>"061", "062"=>"062", "063"=>"063", "064"=>"064"
										);																																						//지역번호
$OPTION_INFO['hp'] = array("010"=>"010", "011"=>"011", "016"=>"016", "017"=>"017", "018"=>"018", "019"=>"019");																//휴대폰
$OPTION_INFO['hptel'] = array_merge ($OPTION_INFO['hp'], $OPTION_INFO['tel']);																								//휴대폰 & 지역번호
$OPTION_INFO['status'] = array("N"=>"비활성", "Y"=>"활성");																													//상태

$OPTION_INFO['bbs_gubun'] = array("board"=>"일반형", "gallery"=>"앨범형");																									//, "news"=>"뉴스형", "reply"=>"답변형", "faq"=>"FAQ", "qna"=>"Q&A"
$OPTION_INFO['bbs_gubun_key'] = array_keys($OPTION_INFO['bbs_gubun']);
$OPTION_INFO['use'] = array("N"=>"사용안함", "Y"=>"사용함");																												//사용여부
$OPTION_INFO['notice'] = array("Y"=>"공지", "N"=>"공지아님");																												//공지여부

$OPTION_INFO['sel_fval'] = array("0"=>"선택", "1"=>"선택하세요", "2"=>"년", "3"=>"월", "4"=>"일", "5"=>"선택하세요", "6"=>"선택하세요", "7"=>"선택하세요");


?>