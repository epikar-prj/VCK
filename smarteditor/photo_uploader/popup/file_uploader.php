<?php
require_once "../../../inc/common.php";

// default redirection
$url = $_REQUEST["callback"].'?callback_func='.$_REQUEST["callback_func"];
$bSuccessUpload = is_uploaded_file($_FILES['Filedata']['tmp_name']);

/*
@unlink($SITE_INFO['root'] . "/upload/editor/file_uploader/20150908144504.jpg");		//파일삭제
@rmdir($SITE_INFO['root'] . "/upload/editor/file_uploader");									//폴더삭제
*/

// SUCCESSFUL
if(bSuccessUpload) {
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$name = $_FILES['Filedata']['name'];

	$filename_ext = strtolower(array_pop(explode('.',$name)));
	$allow_file = array("jpg", "png", "bmp", "gif", "jfif", "webp");

	do {
		$replace_name = date("YmdHis").".".$filename_ext;
	} while(file_exists($SITE_INFO['root']."/upload/editor/{$replace_name}"));


	if(!in_array($filename_ext, $allow_file)) {
		$url .= '&errstr='.$name;
	} else {
		$uploadDir = '../../../upload/editor/';
		if(!is_dir($uploadDir)){
			@mkdir($uploadDir, 0777);
		}

		//$newPath = $uploadDir.urlencode($_FILES['Filedata']['name']);
		$newPath = $uploadDir.urlencode($replace_name);

		@move_uploaded_file($tmp_name, $newPath);

		$url .= "&bNewLine=true";
		$url .= "&sFileName=".urlencode(urlencode($replace_name));
		$url .= "&sFileURL=" . $SITE_INFO['home_dir'] . "/upload/editor/".urlencode(urlencode($replace_name));
	}
}
// FAILED
else {
	$url .= '&errstr=error';
}
	
header('Location: '. $url);
?>