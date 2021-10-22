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
$sid = 0;
$member_sid = $_COOKIE['member_sid']; $member_sid = $member_sid ? $member_sid : "0";
$member_id = $_COOKIE['member_id'];

$category = MgRequestCheck(trim($_POST['category']), 255, true, true);
$title = MgRequestCheck(trim($_POST['title']), 255, true, false, true);
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
$email = MgRequestCheck(trim($_POST['emaild']), 255, true, true);
$notice = MgRequestCheck(trim($_POST['notice']), 1, true, true); $notice = $notice ? $notice : "N";
$isclose = MgRequestCheck(trim($_POST['isclose']), 1, true, true); $isclose = $isclose ? $isclose : "Y";
$content = MgRequestCheck(trim($_POST['content']), 4294967295, true, false);
$content2 = MgRequestCheck(trim($_POST['content2']), 4294967295, true, false);
$url = MgRequestCheck(trim($_POST['url']), 255, true, true);
$ip = addslashes($_SERVER['REMOTE_ADDR']);
$newsdate = MgRequestCheck(trim($_POST['newsdate']), 255, true, true);
$badge = MgRequestCheck(trim($_POST['badge']), 255, true, true);
$header_color = MgRequestCheck(trim($_POST['header_color']), 255, true, true);

$title = strip_tags($title);
$publish_date = strip_tags($publish_date);
$subtitle = strip_tags($subtitle);
$name = strip_tags($name);

// 입력 데이터 검증
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
} if($bm_sid == "4") {			//Q&A 게시판일 때...
	if( $view_tr_cate ){
		if(!$category) { MgMoveURL("", "문의구분을 선택해 주세요.", "", "back"); exit; }
	}
	if(!$email) { MgMoveURL("", "이메일을 등록해 주세요.", "", "back"); exit; }
    if(!$title) { MgMoveURL("", "제목을 등록해 주세요.", "", "back"); exit; }
} else {							//그 외 게시판일 때...
	if( $view_tr_cate ){
		if($category == '') { MgMoveURL("", "구분을 선택해 주세요.", "", "back"); exit; }
	}
	if(!$title) { MgMoveURL("", "제목을 등록해 주세요.", "", "back"); exit; }
	if(isAdminLogined() && $bm_sid <> "4"){
		if(!$notice) { MgMoveURL("", "공지여부를 선택해 주세요.", "", "back"); exit; }
	}
	/*
	if(!$isclose) { MgMoveURL("", "공개여부를 선택해 주세요.", "", "back"); exit; }
	if( (!isLogined()) || ($isclose == "N") ){
		if(!$pw) { MgMoveURL("", "비밀번호를 등록해 주세요.", "", "back"); exit; }
	}
	*/
}


if(!$name) { MgMoveURL("", "이름을 등록해 주세요.", "", "back"); exit; }
if($bm_sid != "1"){
	if(!$content) { MgMoveURL("", "내용을 등록해 주세요.", "", "back"); exit; }
}


// 썸네일 이미지 파일 저장
$thum_val = "";
if($bbs_info['isthum'] == "Y"){
	$thum_file = trim($_FILES['thumup']['tmp_name']);
	$thum_name = trim($_FILES['thumup']['name']);

	if($thum_file!="none" && $thum_name) {
		if(!is_dir($bbs_info['file_folder'] . "/")){ umask(0); @mkdir($bbs_info['file_folder'] . "/", 0777); }
        
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
            echo "width: " . $bbs_info['th_thum_width'] . " || " . "height: " . $bbs_info['th_thum_height'];
            
            if($bbs_info['th_thum_width'] || $bbs_info['th_thum_height']){
				MgImgThumbnail($bbs_info['file_folder'], $real_name, $bbs_info['th_thum_width'], $bbs_info['th_thum_height'], $ext);
			}
			$files_wh = getimagesize("{$bbs_info['file_folder']}/{$real_name}");
		} else {
			$files_wh[0] = 0;
			$files_wh[1] = 0;
		}
        
        $thum_val = "{$real_name}|{$thum_name}|{$files_size}|{$ext}|{$files_wh[0]}|{$files_wh[1]}";
	}
}


// 쿼리 적용
$query_grp = "SELECT IFNULL(MAX(grp), 0) + 1 grp FROM {$TABLE_INFO['bbs']} WHERE bm_sid='{$bm_sid}'";
$row_grp=$db->row($query_grp);
$grp = $row_grp['grp'];
$par = 0;
$dth = 0;
$odr = 0;

$sec_pw = "";
if($pw){ $sec_pw = md5($pw); }

if ($bm_sid == 5 ) {
    $query[] = "
	INSERT INTO {$TABLE_INFO['bbs']} ( 
		`sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `subtitle`, `publish_date`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `ip`, `viewcnt`, `notice`, `isclose`, `status`, `regdate`, `reg_id`, `header_color`
	) VALUES (
		'{$sid}', '{$bm_sid}', '{$grp}', '{$par}', '{$dth}', '{$odr}', '{$category}', '{$lang}', '{$issuedate}', '{$sdate}', '{$edate}', '{$member_sid}', '{$member_id}', '{$sec_pw}', '{$name}', '{$nick}', '{$title}', '{$subtitle}', '{$publish_date}', 'Y', '{$summary}', '{$content}', '{$content2}', '{$url}', '{$hp}', '{$email}', '{$thum_val}', '{$ip}', '0', '{$notice}', '{$isclose}', 'Y', SYSDATE(), '{$member_id}', '{$header_color}'
	)
";
} else if ($bm_sid == 7) {
    $query[] = "
	INSERT INTO {$TABLE_INFO['bbs']} ( 
		`sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `subtitle`, `publish_date`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `ip`, `viewcnt`, `notice`, `isclose`, `status`, `regdate`, `reg_id`
	) VALUES (
		'{$sid}', '{$bm_sid}', '{$grp}', '{$par}', '{$dth}', '{$odr}', '{$category}', '{$lang}', '{$issuedate}', '{$sdate}', '{$edate}', '{$member_sid}', '{$member_id}', '{$sec_pw}', '{$name}', '{$nick}', '{$title}', '{$subtitle}', '{$publish_date}', 'Y', '{$summary}', '{$content}', '{$content2}', '{$url}', '{$hp}', '{$email}', '{$thum_val}', '{$ip}', '0', '{$notice}', '{$isclose}', 'Y', SYSDATE(), '{$member_id}'
	)
";
} else if ($bm_sid == 6) {
    $query[] = "
	INSERT INTO {$TABLE_INFO['bbs']} ( 
		`sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `publish_date`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `ip`, `viewcnt`, `notice`, `isclose`, `status`, `regdate`, `reg_id`
	) VALUES (
		'{$sid}', '{$bm_sid}', '{$grp}', '{$par}', '{$dth}', '{$odr}', '{$category}', '{$lang}', '{$issuedate}', '{$sdate}', '{$edate}', '{$member_sid}', '{$member_id}', '{$sec_pw}', '{$name}', '{$nick}', '{$title}', '{$publish_date}', 'Y', '{$summary}', '{$content}', '{$content2}', '{$url}', '{$hp}', '{$email}', '{$thum_val}', '{$ip}', '0', '{$notice}', '{$isclose}', 'Y', SYSDATE(), '{$member_id}'
	)
";
} else {
    $query[] = "
	INSERT INTO {$TABLE_INFO['bbs']} ( 
		`sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `ip`, `viewcnt`, `notice`, `isclose`, `status`, `regdate`, `reg_id`
	) VALUES (
		'{$sid}', '{$bm_sid}', '{$grp}', '{$par}', '{$dth}', '{$odr}', '{$category}', '{$lang}', '{$issuedate}', '{$sdate}', '{$edate}', '{$member_sid}', '{$member_id}', '{$sec_pw}', '{$name}', '{$nick}', '{$title}', 'Y', '{$summary}', '{$content}', '{$content2}', '{$url}', '{$hp}', '{$email}', '{$thum_val}', '{$ip}', '0', '{$notice}', '{$isclose}', 'Y', SYSDATE(), '{$member_id}'
	)
";
}

// print_r($query);
// exit;

$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}


// 마지막에 insert된 sid 값 가져오기
/*
$query_sid = "SHOW TABLE status like '{$TABLE_INFO['bbs']}'";
$row=$db->row($query_sid);
$sid = $row['Auto_increment']-1;
*/
$query_sid = "SELECT max(sid) as sid FROM {$TABLE_INFO['bbs']} WHERE bm_sid='{$bm_sid}'";
$row=$db->row($query_sid);
$sid = $row['sid'];


// 파일 저장
if($bbs_info['file_tcnt'] > 0){
	$fsid = 0; $fodr = 0;
	for($f=1;$f<=$bbs_info['file_tcnt'];$f++){
		$files_val = "";
		$files = trim($_FILES['filesup' . $f]['tmp_name']);
		$files_name = trim($_FILES['filesup' . $f]['name']);

		if($files!="none" && $files_name) {
			if(!is_dir($bbs_info['file_folder'] . "/")){ umask(0); @mkdir($bbs_info['file_folder'] . "/", 0777); }
			
            if(!is_uploaded_file($files)) {
				MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid", "정상적인 방법의 업로드가 아닙니다(195).\\n게시물은 저장되었으니 수정을 통해 파일을 재등록 하시기 바랍니다.", "", "");
				exit;
			}

			$part = explode(".", $files_name);
			$ext = strtolower($part[sizeof($part)-1]);

			// 파일용량 검사
			if($_FILES['filesup' . $f]['size'] > intVal($bbs_info['max_filesize']) * 1024 * 1024) {
				MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid", "[{$files_name}] : " . $bbs_info['max_filesize'] . "MB 이상의 용량은 업로드가 불가합니다.\\n게시물은 저장되었으니 수정을 통해 파일을 재등록 하시기 바랍니다.", "", "");
				exit;
			}

			// 확장자 검사
			if($bbs_info['file_ext']) {
				$accesstype = explode(',', $bbs_info['file_ext']);
				$str_access = false;
				for($j=0;$j<sizeof($accesstype);$j++) 
					if(strtolower($ext)==strtolower($accesstype[$j])) $str_access = true;

				if(!$str_access) {
					MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid", "[{$files_name}] : 업로드할 수 있는 파일형식이 아닙니다.\\n게시물은 저장되었으니 수정을 통해 파일을 재등록 하시기 바랍니다.", "", "");
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
				}
				$files_wh = getimagesize("{$bbs_info['file_folder']}/{$real_name}");
			} else {
				$files_wh[0] = 0;
				$files_wh[1] = 0;
			}
            
            $files_val = "{$real_name}|{$files_name}|{$files_size}|{$ext}|{$files_wh[0]}|{$files_wh[1]}";
		}

		if($files_val){
			$fodr++;			//파일순서

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
	if(is_array($query_file)){
		$result_file = $db->tran_query( $query_file );
		if(!$result_file) {
			MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid", "처리 중 오류가 발생하였습니다.2\\n게시물은 저장되었으니 수정을 통해 파일을 재등록 하시기 바랍니다.", "", "");
			exit;
		}
	}
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
if( $view_tr_cate ){
	//MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid&SearchCate=$category", "It has been completed.", "", "");
	MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid", "등록되었습니다.", "", "");
}else{
	MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid=$bm_sid", "등록되었습니다.", "", "");
}
exit;
?>