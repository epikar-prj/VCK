<?php
/* Q&A 게시판에서 게시물 삭제 시 권한 체크 */
if($bm_sid == "3"){
	// Q&A관리자여부 체크(Q&A관리자는 해당 카테고리의 답변만 등록,수정,삭제할 수 있음)
	if( isQnaLogined() ){ MgMoveURL("", "게시물을 삭제할 수 있는 권한이 없습니다.", "", "back"); exit; }
}

/*
foreach($_GET as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

// Request 값
$member_id = $_COOKIE['member_id'];
$listMode = MgRequestCheck(trim($_REQUEST['listMode']), 30, true, true);
if( $listMode == "sel_delete" || $listMode == "viewok" || $listMode == "viewcan" ){
	foreach($_POST['chk'] as $ckey => $cval){
		$chk[] = MgRequestCheck(trim($cval), 11, true, true);
	}
}else{
	$chk[] = MgRequestCheck(trim($_REQUEST['sid']), 11, true, true);
}



if($listMode == "viewok" || $listMode == "viewcan"){

	$ismain = "N"; $msg_val = "해제";
	if($listMode == "viewok"){ $ismain = "Y"; $msg_val = "적용"; }

	if(count($chk) < 1){ MgMoveURL("", "메인노출 {$msg_val}하실 게시물을 선택해 주세요.", "", "back"); exit; }

	foreach($_POST['chk'] as $ckey => $cval){
		$sid = MgRequestCheck(trim($cval), 11, true, true);
		if($sid){
			$query_chk[] = "UPDATE {$TABLE_INFO['bbs']} SET ismain='{$ismain}', `uptdate`=SYSDATE(), `upt_id`='{$reg_id}' WHERE sid = '{$sid}'";
		}
	}
	$result_chk = $db->tran_query( $query_chk );
	if(!$result_chk) {
		MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
		exit;
	}

	$msg = "메인노출 {$msg_val}되었습니다.";

}else{

	if(count($chk) < 1){ MgMoveURL("", "삭제하실 게시물을 선택해 주세요.", "", "back"); exit; }


	foreach($chk as $skey => $sid){
		// 입력 데이터 검증
		if(!$sid) { MgMoveURL("", "삭제하실 게시물을 선택해 주세요.", "", "back"); exit; }

		// 자료 검색
		$query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `ishtml`, `content`, `url`, `hp`, `email`, `thum_file`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
		$row=$db->row($query);

		// 등록여부 체크
		if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

		// 삭제여부 체크
		if($row['chkdel'] == 'Y'){ MgMoveURL("", "이미 삭제된 게시물입니다.", "", "back"); exit; }

		// 본인 작성여부 체크
		if( (!isAdminLogined()) && (!isQnaLogined()) && ($_COOKIE['member_sid'] != $row['member_sid'] && $row['member_sid']) ){ MgMoveURL("", "게시물을 삭제할 수 있는 권한이 없습니다.", "", "back"); exit; }

	/*
		// 썸네일 이미지 파일 삭제
		if($bbs_info['isthum'] == "Y"){
			$files = $row['thum_file'];
			if($files){
				$file_info = explode("|", $files);
				$filename_up = $file_info[0];

				$part = explode(".", $filename_up);
				$ext = strtolower($part[sizeof($part)-1]);
				if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
					//썸네일 삭제
					MgImgThumbnailDel($bbs_info['file_folder'], $filename_up, $ext);
				}
				if( file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){ @unlink($bbs_info['file_folder'] . "/" . $filename_up); }
				$query_del[] = "UPDATE {$TABLE_INFO['bbs']} SET `thum_file` = '', `uptdate` = SYSDATE() WHERE sid = '{$sid}'";
			}
		}

		// 첨부파일 삭제
		$query_file = "SELECT `sid`, `bm_sid`, `bbs_sid`, `member_sid`, `odr`, `files`, `dcnt`, `ip`, `regdate` FROM {$TABLE_INFO['bbs_file']} WHERE bm_sid='{$bm_sid}' AND bbs_sid='{$row['sid']}' ORDER BY odr ASC, regdate ASC";
		$rows_file=$db->fetch_array($query_file);
		foreach($rows_file as $row_file) {
			$files = $row_file['files'];
			if($files){
				$file_info = explode("|", $files);
				$filename_up = $file_info[0];

				$part = explode(".", $filename_up);
				$ext = strtolower($part[sizeof($part)-1]);
				if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") {
					//썸네일 삭제
					MgImgThumbnailDel($bbs_info['file_folder'], $filename_up, $ext);
				}
				if( file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){ @unlink($bbs_info['file_folder'] . "/" . $filename_up); }
				$query_del[] = "DELETE FROM {$TABLE_INFO['bbs_file']} WHERE sid = '{$row_file['sid']}'";
			}
		}
	*/

		// 쿼리 적용
		//$query_del[] = "DELETE FROM {$TABLE_INFO['bbs']} WHERE sid = '{$sid}'";
		$query_del[] = "UPDATE {$TABLE_INFO['bbs']} SET `chkdel`='Y', `uptdate`=SYSDATE(), `upt_id`='{$member_id}' WHERE sid = '{$sid}'";
	}
	$result_del = $db->tran_query( $query_del );
	if(!$result_del) {
		MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
		exit;
	}

	$msg = "삭제되었습니다.";
}


// DB Disconnect
require_once "../../inc/disconnect.php";


// 페이지 이동
MgMoveURL("${_SERVER[PHP_SELF]}?bm_sid={$bm_sid}&{$str_url2}", $msg, "", "");
exit;
?>