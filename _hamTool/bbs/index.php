<?php
require_once "../../inc/common.php";

// Request 값
$mode = MgRequestCheck($_REQUEST['mode'], 50, true, true); $mode = $mode ? $mode : "list";
$bm_sid = MgRequestCheck($_REQUEST['bm_sid'], 11, true, true);

if(!$bm_sid){ MgMoveURL("", "잘못된 경로로 접근하셨습니다.1", "", "back"); exit; }

// DB 테이블명
$TABLE_INFO['bbs']					= $Tname . "bbs_" . $bm_sid;												// 게시판
$TABLE_INFO['bbs_file']				= $Tname . "bbs_file";															// 첨부파일
$TABLE_INFO['bbs_comment']		= $Tname . "bbs_comment";													// 댓글(코멘트)

// 게시판 정보 검색
$query_bbs = "SELECT `sid`, `gubun`, `title`, `top_content`, `bot_content`, `titlecut`, `limit`, `block`, `iscate`, `category`, `isthum`, `iscomment`, `chkdel`, `regdate` FROM {$TABLE_INFO['bbs_manage']} WHERE status='Y' AND sid='{$bm_sid}'";
$bbs_info = $db->row($query_bbs);

// 데이터 검증
if(!$bbs_info['sid']){ MgMoveURL("", "잘못된 경로로 접근하셨습니다.2", "", "back"); exit; }

// 삭제여부 체크
if($bbs_info['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 게시판입니다.", "", "back"); exit; }


// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 10;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;


// 썸네일 이미지 설정
if($bbs_info['isthum'] == "Y"){
	$bbs_info['thum_max_filesize'] = 2;																					//파일 1개당 업로드 최대 용량(MB)
	$bbs_info['thum_file_ext'] = "jpg,jpeg,gif,png,jfif,webp";																	//업로드 가능 확장자명 - 입력예시) jpg,jpeg,gif,png,...
	if($bm_sid == "2"){
		$bbs_info['th_thum_width'] = "1200"; $bbs_info['th_thum_height'] = "710";							//썸네일 사이즈(px)
		$bbs_info['th_thum_width_m'] = "600"; $bbs_info['th_thum_height_m'] = "356";					//썸네일 사이즈(px)(모바일)
	}else{
		$bbs_info['th_thum_width'] = "1200"; $bbs_info['th_thum_height'] = "";					//썸네일 사이즈(px)(모바일)
	}
}

// 썸네일 이미지 설정
if($bbs_info['isthum'] == "Y"){
	$bbs_info['thum_max_filesize'] = 2;																					//파일 1개당 업로드 최대 용량(MB)
	$bbs_info['thum_file_ext'] = "jpg,jpeg,gif,png";																	//업로드 가능 확장자명 - 입력예시) jpg,jpeg,gif,png,...
	if($bm_sid == "2"){
		$bbs_info['th_thum_width'] = "1200"; $bbs_info['th_thum_height'] = "710";							//썸네일 사이즈(px)
		$bbs_info['th_thum_width_m'] = "600"; $bbs_info['th_thum_height_m'] = "356";					//썸네일 사이즈(px)(모바일)
	}else{
		$bbs_info['th_thum_width'] = "1200"; $bbs_info['th_thum_height'] = "";								//썸네일 사이즈(px)
		$bbs_info['th_thum_width_m'] = "600"; $bbs_info['th_thum_height_m'] = "";						//썸네일 사이즈(px)(모바일)
	}
}

// 첨부파일 설정
if($bbs_info['gubun'] == "qna"){
	//if($bm_sid == "3"){																										//문의게시판 중 고객문의 게시판에만 첨부파일 기능이 있음.
		$bbs_info['file_tcnt'] = 1;																								//총 개수
		$bbs_info['max_filesize'] = 20;																						//파일 1개당 업로드 최대 용량(MB)
		$bbs_info['file_ext'] = "jpg,jpeg,png,doc,docx,hwp,ppt,pptx,pdf,zip";								//업로드 가능 확장자명 - 입력예시) jpg,gif,png,...
		$bbs_info['thum_width'] = "1180"; $bbs_info['thum_height'] = "";										//썸네일 사이즈(px)
	//}
}else if($bm_sid == "2"){
	$bbs_info['file_tcnt'] = 9;																									//총 개수
	$bbs_info['max_filesize'] = 2;																							//파일 1개당 업로드 최대 용량(MB)
	$bbs_info['file_ext'] = "jpg,jpeg,gif,png";																			//업로드 가능 확장자명 - 입력예시) jpg,jpeg,gif,png,...
	$bbs_info['thum_width'] = "1200"; $bbs_info['thum_height'] = "710";										//썸네일 사이즈(px)
}else{
	$bbs_info['file_tcnt'] = 0;																									//총 개수
	$bbs_info['max_filesize'] = 2;																							//파일 1개당 업로드 최대 용량(MB)
	$bbs_info['file_ext'] = "";																									//업로드 가능 확장자명 - 입력예시) jpg,jpeg,gif,png,...
	$bbs_info['thum_width'] = "1200"; $bbs_info['thum_height'] = "710";										//썸네일 사이즈(px)
}
$bbs_info['file_folder'] = $SITE_INFO['root'] . '/upload/bbs/' . $bm_sid;									//업로드 경로
$bbs_info['file_read'] = $SITE_INFO['http_host'] . '/upload/bbs/' . $bm_sid;								//파일 URL


// 구분(카테고리)
if($bbs_info['gubun'] == "qna"){																		//문의 게시판의 문의구분(카테고리) 값 가져오기...
	$bbs_info['category'] = printTableOneFieldVal($TABLE_INFO['qna_cate'], '', 'cate', "chkdel='N' AND status='Y' AND bm_sid='{$bm_sid}'", "bm_sid ASC, odr ASC, sid ASC", '|', -1);
	$cate_minfo = printValueArr($TABLE_INFO['qna_cate'], '', "sid, master_sid", "chkdel='N' AND status='Y' AND bm_sid='{$bm_sid}'", "bm_sid ASC, odr ASC, sid ASC");
	if( isQnaLogined() ){
		if(is_array($cate_minfo)){
			foreach($cate_minfo as $cmkey => $cmval){
				if( trim($cmval) ){
					$cmval_arr = explode("|", $cmval);
					if( in_array($_COOKIE["member_sid"], $cmval_arr) ){
						$cate_info[$cmkey] = printTableOneValue($TABLE_INFO['qna_cate'], '', 'cate', "sid='{$cmkey}'", '');
					}
				}
			}
		}else{
			$cate_info = "";
		}
	}else{
		$cate_info = printValueArr($TABLE_INFO['qna_cate'], '', "sid, cate", "chkdel='N' AND status='Y' AND bm_sid='{$bm_sid}'", "bm_sid ASC, odr ASC, sid ASC");
	}
}else{
	if($bbs_info['category']){
        $cate_arr = explode("|", trim($bbs_info['category']));
		// $cate_info = printArrVal($cate_arr);
		$cate_info = $cate_arr;
	}
}
if( is_array($cate_info) ){
	$cate_info_value = array_values($cate_info);
	$cate_info_flip = array_flip($cate_info_value);
}


// 조건 검색 생성
if($bbs_info['gubun'] == "qna"){
	$search_info = array("title"=>"제목", "name"=>"이름", "hp"=>"연락처", "email"=>"이메일", "content"=>"내용", "titlecon"=>"제목+내용");
	$SearchText = "WHERE chkdel='N' AND bm_sid='{$bm_sid}' AND dth='0' ";
}else{
	$search_info = array("title"=>"제목", "content"=>"내용", "titlecon"=>"제목+내용");
	$SearchText = "WHERE chkdel='N' AND status='Y' AND bm_sid='{$bm_sid}' ";
}

$SearchCate = ""; $view_tr_cate = false;
if( $bbs_info['iscate'] == "Y" && trim($bbs_info['category']) ){
	$SearchCate = PARAM2('SearchCate');

	if( $SearchCate != "" && array_key_exists($SearchCate, $cate_info) ){ $SearchText .= "AND category='{$SearchCate}' "; $encode_cate = urlencode($SearchCate); }
	else{
		if( isQnaLogined() ){
			$SearchText_Cate = "";
			if(is_array($cate_minfo)){
				foreach($cate_minfo as $cmkey => $cmval){
					if( trim($cmval) ){
						$cmval_arr = explode("|", $cmval);
						if( in_array($_COOKIE["member_sid"], $cmval_arr) ){
							$SearchText_Cate .= " category='{$cmkey}' OR ";
						}
					}
				}
				if($SearchText_Cate){ $SearchText .= "AND (" . substr($SearchText_Cate, 0, -3) . ") "; }
			}
		}
	}

	$view_tr_cate = true;
}


$SearchStatus = MgRequestCheck(trim($_REQUEST['SearchStatus']), 1, true, true);
if($SearchStatus) { $SearchText .= "AND `status` = '{$SearchStatus}' "; }
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);
if($SearchColumn && $SearchValue) {
	if($SearchColumn == "titlecon"){ $SearchText .= "AND (title LIKE '%{$SearchValue}%' OR content LIKE '%{$SearchValue}%') "; }
	else{ $SearchText .= "AND {$SearchColumn} LIKE '%{$SearchValue}%' "; }
	$encode_value = urlencode($SearchValue);
} else {
	$SearchColumn = ""; $SearchValue  = ""; $encode_value = "";
}

# URL Parameter
$str_url  = "bm_sid={$bm_sid}&SearchCate={$encode_cate}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";
$str_url2 = "page={$page}&SearchCate={$encode_cate}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";
$str_url3 = "page={$page}&SearchCate={$SearchCate}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$SearchValue}";


# Action Checking
$_skin = $bbs_info['gubun'];
$include = "./skin/${_skin}/${mode}.php";
/* 해당 경로에 파일이 없을 경우 /skin/board/폴더에 있는 파일을 불러옴.
그러므로 /skin/board/폴더의 파일들은 꼭 셋팅되어 있어야 함. */
if(!file_exists($include)){ $_skin = $OPTION_INFO['bbs_gubun_key'][0]; $include = "./skin/${_skin}/${mode}.php"; }


# CSS, JAVASCRIPT, IMAGE Files
$css_file = "./skin/${_skin}/board.css";
if($css_file){
	if(!file_exists($css_file)){
		$css_file = "./skin/" . $OPTION_INFO['bbs_gubun_key'][0] . "/board.css";
	}
	$STYLE=array($css_file); # 스타일시트
}

$script_file = "./skin/${_skin}/board.js";
if($script_file){
	if(!file_exists($script_file)){ $script_file = "./skin/" . $OPTION_INFO['bbs_gubun_key'][0] . "/board.js"; }
	$JAVASCRIPT=array($script_file); # 자바스크립트
}

$img_folder = "./skin/${_skin}/images";
if($img_folder){
	$img_folder_root = $SITE_INFO['root'] . "/bbs" . str_replace("./", "/", $img_folder) . "/";
	if(!is_dir($img_folder_root)){
		$img_folder = "./images";
		$img_folder_root = $SITE_INFO['root'] . "/bbs/images/";
		if(!is_dir($img_folder_root)){ $img_folder = "./skin/" . $OPTION_INFO['bbs_gubun_key'][0] . "/images"; }
	}
	$IMAGE = $img_folder; # 이미지 파일들의 폴더 경로
}else{
	$IMAGE = "./skin/" . $OPTION_INFO['bbs_gubun_key'][0] . "/images"; # 이미지 파일들의 폴더 경로
}


#Header Including
if( !strcasecmp($mode, 'list') || !strcasecmp($mode, 'view') || !strcasecmp($mode, 'write') || !strcasecmp($mode, 'update') || !strcasecmp($mode, 'reply') || !strcasecmp($mode, 'password') || !strcasecmp($mode, 'reply_update') ){
	require_once "../inc/header.html";
}else{
	//관리자 체크
	AdminChk();

	//관리자 등급별 접근메뉴 체크
	require_once "../inc/admin_lvlchk.php";
}

#Body Including
require_once $include;

#Footer Including
if( !strcasecmp($mode, 'list') || !strcasecmp($mode, 'view') || !strcasecmp($mode, 'write') || !strcasecmp($mode, 'update') || !strcasecmp($mode, 'reply') || !strcasecmp($mode, 'password') || !strcasecmp($mode, 'reply_update') ){
	require_once "../inc/footer.html";
}
?>