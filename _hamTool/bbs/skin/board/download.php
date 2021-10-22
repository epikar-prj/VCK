<?php
// Request 값
$sid = MgRequestCheck(trim($_REQUEST['sid']), 11, true, true);
$fsid = MgRequestCheck(trim($_REQUEST['fsid']), 11, true, true);

// 입력 데이터 검증
if( (!$sid) && (!$fsid)){ MgMoveURL("", "다운받으실 파일을 선택해 주세요.", "", "back"); exit; }

// 자료 검색
if($sid){
	$query = "SELECT `sid`, `bm_sid`, `thum_file` as files FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
	$row=$db->row($query);
}else{
	$query = "SELECT `sid`, `bm_sid`, `bbs_sid`, `member_sid`, `files`, `dcnt`, `ip`, `regdate` FROM {$TABLE_INFO['bbs_file']} WHERE sid='{$fsid}'";
	$row=$db->row($query);
}

if(trim($row['files'])){
	$file_info = explode("|", $row['files']);
	$file_name = $file_info[0];
	$real_name = iconv("UTF-8", "EUC-KR", $file_info[1]);
	/* $part = explode(".", $file_name);
	$ext = strtolower($part[sizeof($part)-1]); */
	$ext = strtolower($file_info[3]);

	switch ($ext) {
		case "pdf":
			$ctype = "application/pdf";
			break;
		case "exe":
			$ctype = "application/octet-stream";
			break;
		case "zip":
			$ctype = "application/zip";
			break;
		case "doc":
			$ctype = "application/msword";
			break;
		case "docx":
			$ctype = "vnd.openxmlformats-officedocument.wordprocessingml.document";
			break;
		case "xls":
			$ctype = "application/vnd.ms-excel";
			break;
		case "xlsx":
			$ctype = "vnd.openxmlformats-officedocument.spreadsheetml.sheet";
			break;
		case "ppt":
			$ctype = "application/vnd.ms-powerpoint";
			break;
		case "pptx":
			$ctype = "vnd.openxmlformats-officedocument.presentationml.presentation";
			break;
		case "gif":
			$ctype = "image/gif";
			break;
		case "png":
			$ctype = "image/png";
			break;
		case "jpg":
			$ctype = "image/jpg";
			break;
		default:
			$ctype = "application/force-download";
	}

	$filePath = $bbs_info['file_folder'] . "/" . $file_name;

	header("Cache-control: private");
	//if (is_file($filePath)) {
	if (file_exists($filePath)) {
		// 다운로드 수 증가
		$query_down[] = "UPDATE {$TABLE_INFO['bbs_file']} SET dcnt = dcnt +1 WHERE sid = '{$fsid}'";
		$result_down = $db->tran_query( $query_down );
		if(!$result_down) {
			MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
			exit;
		}

		$fileSize = filesize($filePath);

		// 캐싱 하지 못하게 설정 
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");						// Date in the past 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");	// always modified 
		header("Cache-Control: no-store, no-cache, must-revalidate");	// HTTP/1.1 
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: public");														// HTTP/1.0 
		Header("Content-type: " . $ctype);
		Header("Content-Length: $fileSize");
		Header("Content-Type", "doesn/matter; charset=euc-kr");

		if (strstr($SITE_INFO['user_agent'], "MSIE")) {
			Header("Content-Disposition: attachment; filename=$real_name");
			Header("Content-Transfer-Encoding: binary");
			header("Cache-control: private");
			Header("Expires: 0");
		} else {
			Header("Content-Transfer-Encoding: binary");
			Header("Content-Disposition: attachment; filename=$real_name");
			Header("Content-Description: PHP3 Generated Data");
			header("Cache-control: private");
			Header("Expires: -1");
		}

		ob_clean();
		flush();

		readfile($filePath);
	} else {
		MgMoveURL("", "파일이 존재하지 않습니다.1", "", "back");
	}
}else{
	MgMoveURL("", "파일이 존재하지 않습니다.2", "", "back");
}
exit;
?>