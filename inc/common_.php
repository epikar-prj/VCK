<?php
Header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('Asia/Seoul');

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// include 파일
require_once("dbCon.php");
require_once("function.php");
require_once("curlFunction.php");

/*************************************************  DB 테이블 정보  *************************************************/
$Tname											= "volvo_";
$TABLE_INFO['event_apply']			= $Tname . "testdrive_apply";										//시승신청
$TABLE_INFO['master']					= $Tname . "master";												//운영자관리
$TABLE_INFO['lvl_info']					= $Tname . "lvl_info";												//운영자 등급 및 등급별 접근메뉴 관리
$TABLE_INFO['bbs_manage']			= $Tname . "bbs_manage";										//게시판관리
/*************************************************************************************************************************/

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

// URL관련 정보
$return_url = $_SERVER['SCRIPT_NAME'];
$site_url = explode("/",$_SERVER['PHP_SELF']);
$PAGE_INFO['front_folder'] = $site_url[1];
$PAGE_INFO['front_page'] = $site_url[2];
$PAGE_INFO['admin_folder'] = $site_url[2];
$PAGE_INFO['admin_page'] = $site_url[3];
$PAGE_INFO['url'] = $site_url[count($site_url)-1];


/************************************************** 관리자페이지의 메뉴 *******************************************************/
// 주메뉴
$MENU_INFO['admin'] = array(
    "master"=>"운영관리", 
    "benefit"=>"BENEFIT", 
    "apply"=>"시승신청 관리", 
    "bbs"=>"게시판",
    "bbs_manage"=>"게시판관리",
    "push"=>"PUSH",
    "event"=>"EVENT"
);
$MENU_INFO['admin_link'] = array(
    "apply"=>"{$SITE_INFO['http_host']}/admin/apply/list.php", 
    "master"=>"{$SITE_INFO['http_host']}/admin/master/list.php", 
    "benefit"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_list.php", 
    "promotion"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_list.php", 
    "promotion_apply"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_apply.php", 
    "coupon"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_list.php", 
    "event"=>"{$SITE_INFO['http_host']}/admin/benefit/promotion/list.php", 
    "bbs"=> "{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=1",
    "news"=> "{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=5",
    "faq" => "{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=3",
    "inquiry" => "{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=4",
    "update" => "{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=6",
    "info" => "{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=7",
    "bbs_manage"=>"{$SITE_INFO['http_host']}/admin/bbs_manage/list.php",
    "push"=>"{$SITE_INFO['http_host']}/admin/push/list.php",
    "event"=>"{$SITE_INFO['http_host']}/admin/event/list.php"
);

// 서브메뉴
$MENU_INFO['admin_sub'] = array(
    "apply"=>array("apply"=>"시승신청 관리"), 
    "master"=>array("master"=>"정보수정"),
    "benefit"=>array("promotion"=>"Hej. Familj", "promotion_apply"=>"Hej. Familj Apply"),
    "bbs"=>array("notice"=>"공지사항", "news"=>"NEWS", "update"=>"업데이트", "info"=>"고객 안내문", "faq"=>"FAQ", "inquiry"=>"1:1 문의"), 
    "bbs_manage"=>array("bbs_manage"=>"게시판 관리"),
    "push"=>array("push"=>"PUSH"),
    "event"=>array("event"=>"EVENT")
);

$MENU_INFO['admin_sub_link'] = array(
    "apply"=>array("apply"=>"{$SITE_INFO['http_host']}/admin/apply/list.php"), 
    "master"=>array("master"=>"{$SITE_INFO['http_host']}/admin/master/list.php"), 
    "benefit"=>array("promotion"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_list.php", "promotion_apply"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_apply.php", "coupon"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_list.php", "event"=>"{$SITE_INFO['http_host']}/admin/benefit/promo_list.php"), 
    "bbs"=>array("notice"=>"{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=1", "news"=>"{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=5", "update"=>"{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=6", "info"=>"{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=7", "faq"=>"{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=3", "inquiry"=>"{$SITE_INFO['http_host']}/admin/bbs/?bm_sid=4"),
    "bbs_manage"=>array("bbs_manage"=>"{$SITE_INFO['http_host']}/admin/bbs_manage/list.php"),
    "push"=>array("push"=>"{$SITE_INFO['http_host']}/admin/push/list.php"),
    "event"=>array("event"=>"{$SITE_INFO['http_host']}/admin/event/list.php")
);

// 관리자(등급별 접근메뉴)에서 사용함
foreach($MENU_INFO['admin_sub'] as $msarr) {
	foreach($msarr as $mskey => $msval) {
		$MENU_INFO['admin_sub_merge'][$mskey] = $msval;
	}
}

// 관리자 등급의 접근메뉴에 따라 관리자페이지의 메뉴 생성하기
if( $_COOKIE['member_level'] ){
	$query_lvl = "SELECT `lvl`, `admin_menu` FROM {$TABLE_INFO['lvl_info']} WHERE chkdel='N' AND status='Y' AND admin_menu<>'all' AND lvl='{$_COOKIE['member_level']}'";
	$lvl_row = $db->row($query_lvl);

	$amenu = ""; $amenu_link = ""; $asmenu = ""; $asmenu_link = "";
	if(trim($lvl_row['admin_menu'])){
		$lvl_menu_arr1 = explode("|", $lvl_row['admin_menu']);
		$mcnt = 0; $pre_amenu = "";
		foreach($lvl_menu_arr1 as $amkey => $amval) {
			if(trim($amval)){
				$lvl_menu_arr2 = explode("::", $amval);

				$amenu[$lvl_menu_arr2[0]] = $MENU_INFO['admin'][$lvl_menu_arr2[0]];

				if( (!$pre_amenu) || $pre_amenu != $lvl_menu_arr2[0] ){ $amenu_link[$lvl_menu_arr2[0]] = $MENU_INFO['admin_sub_link'][$lvl_menu_arr2[0]][$lvl_menu_arr2[1]]; }

				$asmenu[$lvl_menu_arr2[0]][$lvl_menu_arr2[1]] = $MENU_INFO['admin_sub'][$lvl_menu_arr2[0]][$lvl_menu_arr2[1]];
				$asmenu_link[$lvl_menu_arr2[0]][$lvl_menu_arr2[1]] = $MENU_INFO['admin_sub_link'][$lvl_menu_arr2[0]][$lvl_menu_arr2[1]];

				$pre_amenu = $lvl_menu_arr2[0];
			}
		}
	}
	if(is_array($amenu)){
		if( !array_key_exists("master", $amenu) ){ $amenu['master'] = $MENU_INFO['admin']['master']; }
		$MENU_INFO['admin'] = $amenu;
	}
	if(is_array($amenu_link)){
		if( !array_key_exists("master", $amenu_link) ){ $amenu_link['master'] = "{$SITE_INFO['http_host']}/oxp/news/admin/master/update.php?sid={$_COOKIE['member_sid']}"; }
		$MENU_INFO['admin_link'] = $amenu_link;
	}
	if(is_array($asmenu)){
		if( !array_key_exists("master", $asmenu) ){ $asmenu['master']['master'] = "정보수정"; }
		$MENU_INFO['admin_sub'] = $asmenu;
	}
	if(is_array($asmenu_link)){
		if( !array_key_exists("master", $asmenu_link) ){ $asmenu_link['master']['master'] = "{$SITE_INFO['http_host']}/oxp/news/admin/master/update.php?sid={$_COOKIE['member_sid']}"; }
		$MENU_INFO['admin_sub_link'] = $asmenu_link;
	}
}
$MENU_INFO['admin_key'] = array_keys($MENU_INFO['admin']);
$MENU_INFO['admin_key_flip'] = array_flip($MENU_INFO['admin_key']);
$MENU_INFO['admin_link_value'] = array_values($MENU_INFO['admin_link']);


$admin_folder = $PAGE_INFO['admin_folder'];
$admin_sub_folder = $admin_folder;
$admin_page_arr = explode("_",$PAGE_INFO['admin_page']);




switch ($PAGE_INFO['admin_folder']){
	case "bbs":
		$bm_sid = MgRequestCheck($_REQUEST['bm_sid'], 11, true, true);

		$admin_folder = "bbs";
		switch ($bm_sid){
			case "1":
				$admin_folder = "bbs";
				$admin_sub_folder = "notice";
				break;

			case "2":
				$admin_folder = "gallery";
				$admin_sub_folder = "gallery";
                break;
                
            case "3":
                $admin_folder = "bbs";
                $admin_sub_folder = "faq";
                break;

            case "4":
                $admin_folder = "bbs";
                $admin_sub_folder = "inquiry";
                break;

            case "5":
                $admin_folder = "bbs";
                $admin_sub_folder = "news";
                break;

            case "6":
                $admin_folder = "bbs";
                $admin_sub_folder = "update";
                break;

            case "7":
                $admin_folder = "bbs";
                $admin_sub_folder = "info";
                break;
		}
        break;
    
    case "benefit":
        $admin_folder = "benefit";

	default:
		break;
}


if ($site_url[1] == 'admin') {
    $admin_folder_key = $MENU_INFO['admin_key_flip'][$admin_folder];
}
/******************************************************************************************************************************/


/** 옵션 **/
$OPTION_INFO['mlevel'] = array("A"=>"운영자", "B"=>"전시장", "U"=>"회원", "Z"=>"일시정지");																					//운영자관리 - 등급(A:운영자, B:전시장, U:회원, Z:일시정지)
// $OPTION_INFO['mlevel'] = "";
$query_lvl = "SELECT `lvl`, `title` FROM {$TABLE_INFO['lvl_info']} ORDER BY lvl ASC";
$lvl_rows=$db->fetch_array($query_lvl);
if( is_array($lvl_rows) ){
	foreach($lvl_rows as $lvl_row) {
		if( trim($lvl_row['lvl']) && trim($lvl_row['title']) ){
			$OPTION_INFO['mlevel'][$lvl_row['lvl']]=$lvl_row['title'];																																//운영자관리 - 등급(A:운영자, B:전시장, U:회원, Z:일시정지)
		}
	}
}
$OPTION_INFO['mlevel_out'] = "U,Z";																																										//등급별 접근메뉴에서 제외할 등급(U:회원, Z:일시정지)

$OPTION_INFO['site_type'] = array("P"=>"PC", "M"=>"Mobile", "A"=>"APPLICATION");																																	//신청경로
$OPTION_INFO['sex'] = array("M"=>"남", "F"=>"여");																																					//성별
$OPTION_INFO['sex2'] = array("A"=>"전체", "M"=>"남", "F"=>"여");																																//성별2
$OPTION_INFO['email'] = array("gmail.com"=>"gmail.com", "naver.com"=>"naver.com", "nate.com"=>"nate.com", "empas.com"=>"empas.com", "lycos.co.kr"=>"lycos.co.kr", 
											"hanmail.net"=>"hanmail.net", "hanmir.com"=>"hanmir.com", "hitel.net"=>"hitel.net", "hotmail.com"=>"hotmail.com", "korea.com"=>"korea.com", 
											"netsgo.com"=>"netsgo.com", "chol.com"=>"chol.com", "dreamwiz.com"=>"dreamwiz.com", "freechal.com"=>"freechal.com", "hanafos.com"=>"hanafos.com", 
											"netian.com"=>"netian.com", "paran.com"=>"paran.com", "yahoo.co.kr"=>"yahoo.co.kr", "yahoo.com"=>"yahoo.com"
											);																																												//이메일
$OPTION_INFO['tel'] = array("02"=>"02", "031"=>"031", "032"=>"032", "033"=>"033", "041"=>"041", "042"=>"042", "043"=>"043", "044"=>"044", 
										"051"=>"051", "052"=>"052", "053"=>"053", "054"=>"054", "055"=>"055", "061"=>"061", "062"=>"062", "063"=>"063", "064"=>"064"
										);																																													//지역번호
$OPTION_INFO['hp'] = array("010"=>"010", "011"=>"011", "016"=>"016", "017"=>"017", "018"=>"018", "019"=>"019");																//휴대폰
$OPTION_INFO['hptel'] = array_merge ($OPTION_INFO['hp'], $OPTION_INFO['tel']);																										//휴대폰 & 지역번호
$OPTION_INFO['status'] = array("N"=>"비활성", "Y"=>"활성");																																		//상태

$OPTION_INFO['bbs_gubun'] = array("board"=>"일반형", "gallery"=>"앨범형");																												//, "news"=>"뉴스형", "reply"=>"답변형", "faq"=>"FAQ", "qna"=>"Q&A"
$OPTION_INFO['bbs_gubun_key'] = array_keys($OPTION_INFO['bbs_gubun']);
$OPTION_INFO['use'] = array("N"=>"사용안함", "Y"=>"사용함");																																	//사용여부
$OPTION_INFO['notice'] = array("Y"=>"공지", "N"=>"공지아님");																																	//공지여부

$OPTION_INFO['sel_fval'] = array("0"=>"선택", "1"=>"선택하세요", "2"=>"년", "3"=>"월", "4"=>"일", "5"=>"선택하세요", "6"=>"선택하세요", "7"=>"선택하세요");

$OPTION_INFO['agree'] = array("Y"=>"동의", "N"=>"미동의");
$OPTION_INFO['buy_check'] = array("3"=>"3개월 이내", "6"=>"6개월 이내", "12"=>"1년 이내", "24"=>"2년 이내", "0"=>"계획 없음");


$VOLVO_INFO['car_model'] = array("XC90"=>"XC90", "XC60"=> "XC60", "XC40"=>"XC40", "S90" => "S90", "S60" => "S60", "V90CC" => "V90CC", "V60CC" => "V60CC");	//시승 모델

/** 볼보 vinter 시승신청 옵션 **/
$VOLVO_INFO['showroom'] = array("HMGD"=>"볼보 강남 대치 전시장", 
								"HMGS"=>"볼보 강남 신사 전시장", 
								"HMBS"=>"볼보 분당 서현 전시장", 
								"HMSW"=>"볼보 수원 전시장", 
								"HMIC"=>"볼보 인천 전시장", 
								"HMDJ"=>"볼보 대전 전시장", 
								"KASP"=>"볼보 송파 전시장", 
								"KASC"=>"볼보 서초 전시장", 
								"KABP"=>"볼보 분당 판교 전시장", 
								"KACA"=>"볼보 천안 전시장", 
								"KAWJ"=>"볼보 원주 전시장", 
								"KAUS"=>"볼보 울산 전시장",
								"AJMD"=>"볼보 목동 전시장",
								"AJIS"=>"볼보 일산 전시장", 
								"AJAY"=>"볼보 안양 전시장", 
								"CHDM"=>"볼보 동대문 전시장", 
								"CHUB"=>"볼보 의정부 전시장", 
								"IRHD"=>"볼보 해운대 전시장",
								"IRGA"=>"볼보 광안 전시장",
								"IRCW"=>"볼보 창원 전시장", 
								"IVGJ"=>"볼보 광주 전시장", 
								"IVSC"=>"볼보 순천 전시장", 
								"IVJJ"=>"볼보 전주 전시장",
								"IVJI"=>"볼보 제주 전시장",
								"TYDG"=>"볼보 대구 전시장",
								"TYPH"=>"볼보 포항 전시장"
								);



/** 첨부파일 설정 **/

//공지사항 페이지 배너관리
$FILE_OPTION['mbanner_notice_max_filesize'] = 2;																																					//파일 1개당 업로드 최대 용량(MB)
$FILE_OPTION['mbanner_notice_file_folder'] = $SITE_INFO['root'] . '/upload/mbanner_notice';																			//업로드 경로(Mobile)
$FILE_OPTION['mbanner_notice_file_read'] = $SITE_INFO['http_host'] . '/upload/mbanner_notice';																			//파일 URL(Mobile)
$FILE_OPTION['mbanner_notice_file_ext'] = "jpeg,jpg,gif,png,jfif";																																		//업로드 가능 확장자명 - 입력예시) jpg,gif,png,...
$FILE_OPTION['mbanner_notice_thum_width'] = "1920";																																				//썸네일 사이즈 Width (px)
$FILE_OPTION['mbanner_notice_thum_height'] = "460";																																				//썸네일 사이즈 Height (px)
$FILE_OPTION['mbanner_notice_thum_width_m'] = "640";																																				//썸네일 사이즈 Width (px)(모바일)
$FILE_OPTION['mbanner_notice_thum_height_m'] = "360";																																			//썸네일 사이즈 Height (px)(모바일)



/*****************************************************  검색조건들  ******************************************************/
$SEARCH_INFO['master'] = array("id"=>"아이디", "name"=>"이름", "email"=>"이메일", "tel"=>"연락처");
$SEARCH_INFO['apply'] = array("name"=>"이름", "email"=>"이메일");
$SEARCH_INFO['bbs_manage'] = array("title"=>"게시판명");
/*************************************************************************************************************************/
?>


