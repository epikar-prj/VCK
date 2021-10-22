<?php
/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}

foreach($_FILES as $pkey => $pval){
	echo $pkey . "=>" . print_r($pval) . "<br />";
}
die();
*/

// Request 값
$sid = MgRequestCheck(trim($_POST['sid']), 11, true, true);
$member_sid = $_COOKIE['member_sid']; $member_sid = $member_sid ? $member_sid : "0";
$member_id = $_COOKIE['member_id'];

$category = PARAM2('category');
$title = MgRequestCheck(trim($_POST['title']), 255, true, false);
$subtitle = MgRequestCheck(trim($_POST['subtitle']), 255, true, false);
$publish_date = MgRequestCheck(trim($_POST['publish_date']), 255, true, false);
$name = MgRequestCheck(trim($_POST['name']), 50, true, true);
$pw = MgRequestCheck(trim($_POST['pw']), 20, true, true);
$hp1 = MgRequestCheck(trim($_POST['hp1']), 4, true, true);
$hp2 = MgRequestCheck(trim($_POST['hp2']), 4, true, true);
$hp3 = MgRequestCheck(trim($_POST['hp3']), 4, true, true);
$hp = $hp1 . "-" . $hp2 . "-" . $hp3;
$email_id = MgRequestCheck(trim($_POST['email_id']), 255, true, true);
$email_domain = MgRequestCheck(trim($_POST['email_domain']), 255, true, true);
$email = $email_id . "@" . $email_domain;
$notice = MgRequestCheck(trim($_POST['notice']), 1, true, true); $notice = $notice ? $notice : "N";
$isclose = MgRequestCheck(trim($_POST['isclose']), 1, true, true); $isclose = $isclose ? $isclose : "Y";
$content = MgRequestCheck(trim($_POST['content']), 4294967295, true, false);
$content2 = MgRequestCheck(trim($_POST['content2']), 4294967295, true, false);
$url = MgRequestCheck(trim($_POST['url']), 255, true, true);
$ip = addslashes($_SERVER['REMOTE_ADDR']);

$header_color = MgRequestCheck(trim($_POST['header_color']), 255, true, true);

$title = strip_tags($title);
$publish_date = strip_tags($publish_date);
$subtitle = strip_tags($subtitle);
$name = strip_tags($name);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "수정하실 게시물을 선택해 주세요.", "", "back"); exit; }
$bbs_msid = printTableOneValue($TABLE_INFO['bbs'], '', 'member_sid', "sid = '{$sid}'", '');
if( (!isAdminLogined()) && ($_COOKIE['member_sid'] != $bbs_msid) && $row['member_sid'] ){ MgMoveURL("", "게시물을 수정할 수 있는 권한이 없습니다.", "", "back"); exit; }

if($bm_sid == "99"){			//Q&A 게시판일 때...
	if( $view_tr_cate ){
		if(!$category) { MgMoveURL("", "문의구분을 선택해 주세요.", "", "back"); exit; }
	}
	if(!$hp1) { MgMoveURL("", "핸드폰(처음 자리)을 등록해 주세요.", "", "back"); exit; }
	if(!$hp2) { MgMoveURL("", "핸드폰(가운데 자리)을 등록해 주세요.", "", "back"); exit; }
	if(!$hp3) { MgMoveURL("", "핸드폰(마지막 자리)을 등록해 주세요.", "", "back"); exit; }
	if(!$email_id) { MgMoveURL("", "이메일(아이디)을 등록해 주세요.", "", "back"); exit; }
	if(!$email_domain) { MgMoveURL("", "이메일(도메인)을 등록해 주세요.", "", "back"); exit; }
	if(!$title) { MgMoveURL("", "제품코드를 등록해 주세요.", "", "back"); exit; }
}else{							//그 외 게시판일 때...
	if( $view_tr_cate ){
		if($category == "") { MgMoveURL("", "구분을 선택해 주세요.", "", "back"); exit; }
	}
	if(!$title) { MgMoveURL("", "제목을 등록해 주세요.", "", "back"); exit; }
	$bbs_dth = printTableOneValue($TABLE_INFO['bbs'], '', 'dth', "sid = '{$sid}'", '');
	if(isAdminLogined() && $bbs_dth == "0" && $bm_sid <> "2"){
		if(!$notice) { MgMoveURL("", "공지여부를 선택해 주세요.", "", "back"); exit; }
	}
	/*
	if(!$isclose) { MgMoveURL("", "공개여부를 선택해 주세요.", "", "back"); exit; }
	$ori_pw = printTableOneValue($TABLE_INFO['bbs'], '', 'pw', "sid = '{$sid}'", '');
	if( (!isAdminLogined()) && ((!isLogined()) || ($isclose == "N")) ){
		if(!$pw) { MgMoveURL("", "비밀번호를 등록해 주세요.", "", "back"); exit; }
		if( $ori_pw && (md5($pw) != $ori_pw) ){ MgMoveURL("", "입력하신 비밀번호가 틀립니다.", "", "back"); exit; }
	}
	*/
}
if(!$name) { MgMoveURL("", "이름을 등록해 주세요.", "", "back"); exit; }
if($bm_sid != "1"){
	if(!$content) { MgMoveURL("", "내용을 등록해 주세요.", "", "back"); exit; }
}


// 썸네일 이미지 파일 저장 및 삭제
$thum_val = "";
if($bbs_info['isthum'] == "Y"){
	/* 삭제 */
	$delthum = MgRequestCheck($_POST['delthum'], 1, true, true);
	if($delthum){
		$old_thumup = MgRequestCheck(trim($_POST['old_thumup']), 255, true, true);
		if($old_thumup){
			$part = explode(".", $old_thumup);
			$ext = strtolower($part[sizeof($part)-1]);
			if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
				//썸네일 삭제
				MgImgThumbnailDel($bbs_info['file_folder'], $old_thumup, $ext);
				MgImgThumbnailDel($bbs_info['file_folder_m'], $old_thumup, $ext);
			}
			@unlink($bbs_info['file_folder'] . "/" . $old_thumup);
			@unlink($bbs_info['file_folder_m'] . "/" . $old_thumup);

			$query[] = "UPDATE {$TABLE_INFO['bbs']} SET `thum_file` = '', `uptdate` = SYSDATE() WHERE sid = '{$sid}'";
		}
	}

	/* 저장 */
	$query_thum = "";
	$thum_file = trim($_FILES['thumup']['tmp_name']);
	$thum_name = trim($_FILES['thumup']['name']);

	if($thum_file!="none" && $thum_name) {
		if(!is_dir($bbs_info['file_folder'] . "/")){ umask(0); @mkdir($bbs_info['file_folder'] . "/", 0777); }
		if(!is_dir($bbs_info['file_folder_m'] . "/")){ umask(0); @mkdir($bbs_info['file_folder_m'] . "/", 0777); }

		if(!is_uploaded_file($thum_file)) {
			MgMoveURL("", "정상적인 방법의 업로드가 아닙니다(195).", "", "back");
			exit;
		}

		$part = explode(".", $thum_name);
		$ext = strtolower($part[sizeof($part)-1]);

		// 파일용량 검사
		if($_FILES['thumup']['size'] > intVal($bbs_info['thum_max_filesize']) * 1024 * 1024) {
			MgMoveURL("", "[{$thum_name}] : " . $bbs_info['thum_max_filesize'] . "MB 이상의 용량은 업로드가 불가합니다.", "", "back");
			exit;
		}

		// 확장자 검사
		if($bbs_info['thum_file_ext']) {
			$accesstype = explode(',', $bbs_info['thum_file_ext']);
			$str_access = false;
			for($j=0;$j<sizeof($accesstype);$j++) 
				if(strtolower($ext)==strtolower($accesstype[$j])) $str_access = true;

			if(!$str_access) {
				MgMoveURL("", "[{$thum_name}] : 업로드할 수 있는 파일형식이 아닙니다.", "", "back");
				exit;
			}
		}

		do {
			$real_name = "bbs_thum_" . date("YmdHis") . "." . $ext;
		} while(file_exists("{$bbs_info['file_folder']}/{$real_name}"));

		move_uploaded_file($thum_file, "{$bbs_info['file_folder']}/{$real_name}");

		// 파일의 성격에 맞는 처리
		$files_size = filesize("{$bbs_info['file_folder']}/{$real_name}");

		if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "bmp") {
			if($bbs_info['th_thum_width'] || $bbs_info['th_thum_height']){
				MgImgThumbnail($bbs_info['file_folder'], $real_name, $bbs_info['th_thum_width'], $bbs_info['th_thum_height'], $ext);
				MgImgThumbnail2($bbs_info['file_folder'], $bbs_info['file_folder_m'], $real_name, $bbs_info['th_thum_width_m'], $bbs_info['th_thum_height_m'], $ext);
			}
			$files_wh = getimagesize("{$bbs_info['file_folder']}/{$real_name}");
		} else {
			$files_wh[0] = 0;
			$files_wh[1] = 0;
		}
		copy($bbs_info['file_folder'] . "/" . $real_name, $bbs_info['file_folder_m'] . "/" . $real_name);

		$thum_val = "{$real_name}|{$thum_name}|{$files_size}|{$ext}|{$files_wh[0]}|{$files_wh[1]}";
		$query_thum = ", `thum_file`='{$thum_val}' ";

		//파일 삭제
		$old_thumup = MgRequestCheck(trim($_POST['old_thumup']), 255, true, true);
		if($old_thumup){
			$part = explode(".", $old_thumup);
			$ext = strtolower($part[sizeof($part)-1]);
			if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
				//썸네일 삭제
				MgImgThumbnailDel($bbs_info['file_folder'], $old_thumup, $ext);
				MgImgThumbnailDel($bbs_info['file_folder_m'], $old_thumup, $ext);
			}
			@unlink($bbs_info['file_folder'] . "/" . $old_thumup);
			@unlink($bbs_info['file_folder_m'] . "/" . $old_thumup);
		}
	}
}


// 쿼리 적용
if($bbs_msid && $isclose == "Y"){ $query_pw = ", `pw`=''"; }
else{
	if(!$ori_pw){ $sec_pw = md5($pw); $query_pw = ", `pw`='{$sec_pw}'"; }
}

$query_notice = ""; $query_member = "";
if(isAdminLogined()){
	$query_notice = ", `notice`='{$notice}'";
}else{
	$query_member = ", `member_sid`='{$member_sid}', `id`='{$member_id}'";
}

$query_cate = "";
if( $view_tr_cate ){
	$query_cate = ", `category`='{$category}'";
	if( $bm_sid == "1" ){
		$query_cate .= ", `sdate`='{$sdate}', `edate`='{$edate}'";
	}
}

if ($bm_sid == 5) {
    $query[] = "
        UPDATE {$TABLE_INFO['bbs']} SET
            `header_color`='{$header_color}', `lang`='{$lang}', `name`='{$name}', `nick`='{$nick}', 
            `issuedate`='{$issuedate}', `title`='{$title}', `subtitle`='{$subtitle}', `publish_date`='{$publish_date}', `summary`='{$summary}', `content`='{$content}', `content2`='{$content2}', `url`='{$url}', `hp`='{$hp}', `email`='{$email}' {$query_thum},
            `isclose`='{$isclose}', `uptdate`=SYSDATE(), `upt_id`='{$member_id}' {$query_pw} {$query_notice} {$query_cate} {$query_member}
        WHERE
            sid = '{$sid}'
    ";
} else if ($bm_sid == "7") {
    $query[] = "
        UPDATE {$TABLE_INFO['bbs']} SET
            `lang`='{$lang}', `name`='{$name}', `nick`='{$nick}', 
            `issuedate`='{$issuedate}', `title`='{$title}', `subtitle`='{$subtitle}', `publish_date`='{$publish_date}', `summary`='{$summary}', `content`='{$content}', `content2`='{$content2}', `url`='{$url}', `hp`='{$hp}', `email`='{$email}' {$query_thum},
            `isclose`='{$isclose}', `uptdate`=SYSDATE(), `upt_id`='{$member_id}' {$query_pw} {$query_notice} {$query_cate} {$query_member}
        WHERE
            sid = '{$sid}'
    ";
} else if ($bm_sid == 6) {
    $query[] = "
        UPDATE {$TABLE_INFO['bbs']} SET
            `lang`='{$lang}', `name`='{$name}', `nick`='{$nick}', 
            `issuedate`='{$issuedate}', `title`='{$title}', `publish_date`='{$publish_date}', `summary`='{$summary}', `content`='{$content}', `content2`='{$content2}', `url`='{$url}', `hp`='{$hp}', `email`='{$email}' {$query_thum},
            `isclose`='{$isclose}', `uptdate`=SYSDATE(), `upt_id`='{$member_id}' {$query_pw} {$query_notice} {$query_cate} {$query_member}
        WHERE
            sid = '{$sid}'
    ";
} else {
    $query[] = "
        UPDATE {$TABLE_INFO['bbs']} SET
            `lang`='{$lang}', `name`='{$name}', `nick`='{$nick}', 
            `issuedate`='{$issuedate}', `title`='{$title}', `summary`='{$summary}', `content`='{$content}', `content2`='{$content2}', `url`='{$url}', `hp`='{$hp}', `email`='{$email}' {$query_thum},
            `isclose`='{$isclose}', `uptdate`=SYSDATE(), `upt_id`='{$member_id}' {$query_pw} {$query_notice} {$query_cate} {$query_member}
        WHERE
            sid = '{$sid}'
    ";
}

$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}


// 파일 저장 및 삭제
if($bbs_info['file_tcnt'] > 0){
	$query_fodr = "SELECT max(odr) as odr FROM {$TABLE_INFO['bbs_file']} WHERE bm_sid='{$bm_sid}' AND bbs_sid='{$sid}'";
	$row_fodr=$db->row($query_fodr);
	$fsid = 0; $fodr = $row_fodr['odr'];
	for($f=1;$f<=$bbs_info['file_tcnt'];$f++){
		/* 삭제 */
		$delfile = MgRequestCheck($_POST['delfile' . $f], 1, true, true);
		if($delfile){
			$old_fsid = MgRequestCheck(trim($_POST['old_fsid' . $f]), 11, true, true);
			$old_filesup = MgRequestCheck(trim($_POST['old_filesup' . $f]), 255, true, true);
			if($old_filesup){
				$part = explode(".", $old_filesup);
				$ext = strtolower($part[sizeof($part)-1]);
				if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
					//썸네일 삭제
					MgImgThumbnailDel($bbs_info['file_folder'], $old_filesup, $ext);
					MgImgThumbnailDel($bbs_info['file_folder_m'], $old_filesup, $ext);
				}
				@unlink($bbs_info['file_folder'] . "/" . $old_filesup);
				@unlink($bbs_info['file_folder_m'] . "/" . $old_filesup);

				$query_file_del[] = "DELETE FROM {$TABLE_INFO['bbs_file']} WHERE sid = '{$old_fsid}'";
			}
		}

		/* 저장 */
		$files_val = "";
		$files = trim($_FILES['filesup' . $f]['tmp_name']);
		$files_name = trim($_FILES['filesup' . $f]['name']);

		$old_fodr = MgRequestCheck(trim($_POST['old_fodr' . $f]), 11, true, true);

		if($files!="none" && $files_name) {
			if(!is_dir($bbs_info['file_folder'] . "/")){ umask(0); @mkdir($bbs_info['file_folder'] . "/", 0777); }
			if(!is_dir($bbs_info['file_folder_m'] . "/")){ umask(0); @mkdir($bbs_info['file_folder_m'] . "/", 0777); }

			if(!is_uploaded_file($files)) {
				MgMoveURL("", "정상적인 방법의 업로드가 아닙니다(195).", "", "back");
				exit;
			}

			$part = explode(".", $files_name);
			$ext = strtolower($part[sizeof($part)-1]);

			// 파일용량 검사
			if($_FILES['filesup' . $f]['size'] > intVal($bbs_info['max_filesize']) * 1024 * 1024) {
				MgMoveURL("", "[{$files_name}] : " . $bbs_info['max_filesize'] . "MB 이상의 용량은 업로드가 불가합니다.", "", "back");
				exit;
			}

			// 확장자 검사
			if($bbs_info['file_ext']) {
				$accesstype = explode(',', $bbs_info['file_ext']);
				$str_access = false;
				for($j=0;$j<sizeof($accesstype);$j++) 
					if(strtolower($ext)==strtolower($accesstype[$j])) $str_access = true;

				if(!$str_access) {
					MgMoveURL("", "[{$files_name}] : 업로드할 수 있는 파일형식이 아닙니다.", "", "back");
					exit;
				}
			}

			do {
				$real_name = "bbs_" . date("YmdHis") . "." . $ext;
			} while(file_exists("{$bbs_info['file_folder']}/{$real_name}"));

			move_uploaded_file($files, "{$bbs_info['file_folder']}/{$real_name}");

			// 파일의 성격에 맞는 처리
			$files_size = filesize("{$bbs_info['file_folder']}/{$real_name}");

			if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "bmp") {
				if($bbs_info['thum_width'] || $bbs_info['thum_height']){
					MgImgThumbnail($bbs_info['file_folder'], $real_name, $bbs_info['thum_width'], $bbs_info['thum_height'], $ext);
					MgImgThumbnail2($bbs_info['file_folder'], $bbs_info['file_folder_m'], $real_name, $bbs_info['thum_width_m'], $bbs_info['thum_height_m'], $ext);
				}
				$files_wh = getimagesize("{$bbs_info['file_folder']}/{$real_name}");
			} else {
				$files_wh[0] = 0;
				$files_wh[1] = 0;
			}
			copy($bbs_info['file_folder'] . "/" . $real_name, $bbs_info['file_folder_m'] . "/" . $real_name);

			$files_val = "{$real_name}|{$files_name}|{$files_size}|{$ext}|{$files_wh[0]}|{$files_wh[1]}";

			//파일 삭제
			$old_fsid = MgRequestCheck(trim($_POST['old_fsid' . $f]), 11, true, true);
			$old_filesup = MgRequestCheck(trim($_POST['old_filesup' . $f]), 255, true, true);
			if($old_fsid && $old_filesup){
				$part = explode(".", $old_filesup);
				$ext = strtolower($part[sizeof($part)-1]);
				if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
					//썸네일 삭제
					MgImgThumbnailDel($bbs_info['file_folder'], $old_filesup, $ext);
					MgImgThumbnailDel($bbs_info['file_folder_m'], $old_filesup, $ext);
				}
				@unlink($bbs_info['file_folder'] . "/" . $old_filesup);
				@unlink($bbs_info['file_folder_m'] . "/" . $old_filesup);

				$query_file_del[] = "DELETE FROM {$TABLE_INFO['bbs_file']} WHERE sid = '{$old_fsid}'";
			}
		}

		if($files_val){
			$fodr = ($old_fodr && $old_fodr != 0) ? $old_fodr : ($fodr+1);

			// 쿼리 적용
			$query_file[] = "
				INSERT INTO {$TABLE_INFO['bbs_file']} ( 
					`sid`, `bm_sid`, `bbs_sid`, `member_sid`, `odr`, `files`, `dcnt`, `ip`, `regdate`
				) VALUES (
					'{$fsid}', '{$bm_sid}', '{$sid}', '{$member_sid}', '{$fodr}', '{$files_val}', '0', '{$ip}', SYSDATE()
				)
			";
		}
	}
	if(is_array($query_file_del)){
		$result_file_del = $db->tran_query( $query_file_del );
		if(!$result_file_del) {
			MgMoveURL("", "처리 중 오류가 발생하였습니다.2", "", "back");
			exit;
		}
	}
	if(is_array($query_file)){
		$result_file = $db->tran_query( $query_file );
		if(!$result_file) {
			MgMoveURL("", "처리 중 오류가 발생하였습니다.3", "", "back");
			exit;
		}
	}
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid&$str_url3", "수정되었습니다.", "", "");
exit;
?>