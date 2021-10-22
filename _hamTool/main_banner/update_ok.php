<?php
require_once "../../inc/common.php";

/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

//관리자 체크
AdminChk();

//관리자 등급별 접근메뉴 체크
require_once "../inc/admin_lvlchk.php";


// Request 값
$reg_id = $_COOKIE['member_id'];



$mbcnt = 1;
foreach($OPTION_INFO['mbanner_stitle'] as $mbkey => $mbval) {
	$mb_code = MgRequestCheck($_POST['mb_code_' . $mbcnt], 30, true, true);

	$scnt = 1;
	foreach($OPTION_INFO['site_type'] as $skey => $sval) {
		$sid = MgRequestCheck($_POST['sid' . $mbcnt . '_' . $scnt], 11, true, true);
		$mb_type = MgRequestCheck($_POST['mb_type' . $mbcnt . '_' . $scnt], 1, true, true);

		// 첨부파일 설정
		if($mb_type == "M"){
			$FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] = $FILE_OPTION['mbanner_' . $mb_code . '_file_folder_m'];
			$FILE_OPTION['mbanner_' . $mb_code_val . '_file_read'] = $FILE_OPTION['mbanner_' . $mb_code_val . '_file_read_m'];
			$FILE_OPTION['mbanner_' . $mb_code . '_thum_width'] = $FILE_OPTION['mbanner_' . $mb_code . '_thum_width_m'];
			$FILE_OPTION['mbanner_' . $mb_code . '_thum_height'] = $FILE_OPTION['mbanner_' . $mb_code . '_thum_height_m'];
		}

		//파일 삭제
		if($sid){
			$delfile = MgRequestCheck($_POST['delfile' . $mbcnt . '_' . $scnt], 1, true, true);
			if($delfile){
				$old_filesup = MgRequestCheck(trim($_POST['old_filesup' . $mbcnt . '_' . $scnt]), 255, true, true);
				if($old_filesup){
					$part = explode(".", $old_filesup);
					$ext = strtolower($part[sizeof($part)-1]);
					if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
						//썸네일 삭제
						MgImgThumbnailDel($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'], $old_filesup, $ext);
					}
					@unlink($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/" . $old_filesup);

					$query[] = "UPDATE {$TABLE_INFO['main_banner']} SET `files` = '', `uptdate` = SYSDATE(), `upt_id` = '{$reg_id}' WHERE sid = '{$sid}'";
				}
			}
		}


		// 파일 저장
		$files_val = "";
		$files = trim($_FILES['filesup' . $mbcnt . '_' . $scnt]['tmp_name']);
		$files_name = trim($_FILES['filesup' . $mbcnt . '_' . $scnt]['name']);

		if($files!="none" && $files_name) {
			if(!is_dir($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/")){ umask(0); @mkdir($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/", 0777); }

			if(!is_uploaded_file($files)) {
				MgMoveURL("", "정상적인 방법의 업로드가 아닙니다(195).", "", "back");
				exit;
			}

			$part = explode(".", $files_name);
			$ext = strtolower($part[sizeof($part)-1]);

			// 파일용량 검사
			if($_FILES['filesup' . $mbcnt . '_' . $scnt]['size'] > intVal($FILE_OPTION['mbanner_' . $mb_code . '_max_filesize']) * 1024 * 1024) {
				MgMoveURL("", "[{$files_name}] : " . $FILE_OPTION['mbanner_' . $mb_code . '_max_filesize'] . "MB 이상의 용량은 업로드가 불가합니다.", "", "back");
				exit;
			}

			// 확장자 검사
			if($FILE_OPTION['mbanner_' . $mb_code . '_file_ext']) {
				$accesstype = explode(',', $FILE_OPTION['mbanner_' . $mb_code . '_file_ext']);
				$str_access = false;
				for($j=0;$j<sizeof($accesstype);$j++) 
					if(strtolower($ext)==strtolower($accesstype[$j])) $str_access = true;

				if(!$str_access) {
					MgMoveURL("", "[{$files_name}] : 업로드할 수 있는 파일형식이 아닙니다.", "", "back");
					exit;
				}
			}

			do {
				$real_name = date("YmdHis") . "." . $ext;
			} while(file_exists($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/{$real_name}"));

			move_uploaded_file($files, $FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/{$real_name}");

			// 파일의 성격에 맞는 처리
			$files_size = filesize($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/{$real_name}");

			if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "bmp") {
				if($FILE_OPTION['mbanner_' . $mb_code . '_thum_width'] || $FILE_OPTION['mbanner_' . $mb_code . '_thum_height']){
					MgImgThumbnail($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'], $real_name, $FILE_OPTION['mbanner_' . $mb_code . '_thum_width'], $FILE_OPTION['mbanner_' . $mb_code . '_thum_height'], $ext);
				}
				$files_wh = getimagesize($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/{$real_name}");
			} else {
				$files_wh[0] = 0;
				$files_wh[1] = 0;
			}

			$files_val = "{$real_name}|{$files_name}|{$files_size}|{$ext}|{$files_wh[0]}|{$files_wh[1]}";

			//파일 삭제
			$old_filesup = MgRequestCheck(trim($_POST['old_filesup' . $mbcnt . '_' . $scnt]), 255, true, true);
			if($old_filesup){
				$part = explode(".", $old_filesup);
				$ext = strtolower($part[sizeof($part)-1]);
				if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
					//썸네일 삭제
					MgImgThumbnailDel($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'], $old_filesup, $ext);
				}
				@unlink($FILE_OPTION['mbanner_' . $mb_code . '_file_folder'] . "/" . $old_filesup);
			}
		}


		// 쿼리 적용
		$query_file = "";
		if($files_val){
			if($sid){
				$query_file = "`files` = '{$files_val}',";

				$query[] = "
					UPDATE
						{$TABLE_INFO['main_banner']}
					SET
						`code` = '{$mb_code}',
						`type` = '{$mb_type}',
						{$query_file}
						`uptdate` = SYSDATE(),
						`upt_id` = '{$reg_id}'
					WHERE
						sid = '{$sid}'
					";
			}else{
				$query[] = "
					INSERT INTO {$TABLE_INFO['main_banner']} (
						`sid`, `code`, `type`, `files`, `regdate`, `reg_id`
					) VALUES (
						'{$sid}', '{$mb_code}', '{$mb_type}', '{$files_val}', SYSDATE(), '{$reg_id}'
					)
				";
			}
		}

		$scnt++;
	}

	$mbcnt++;
}
if( is_array($query) ){
	$result = $db->tran_query( $query );
	if(!$result) {
		MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
		exit;
	}
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("update.php", "적용되었습니다.", "", "");
exit;
?>