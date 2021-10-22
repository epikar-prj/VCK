<?php
// 운영자관리의 정보수정 페이지만 제외
$admin_lvlchk = 1;
if($_COOKIE['member_level']){
	// 자료 검색
	$query_lvl = "SELECT `lvl`, `admin_menu` FROM {$TABLE_INFO['lvl_info']} WHERE lvl='{$_COOKIE['member_level']}'";
	$lvlmenu_info = $db->row($query_lvl);

	if( $lvlmenu_info['admin_menu'] != "all" && $PAGE_INFO['admin_folder'] == "master" && ($PAGE_INFO['url'] == "update.php" || $PAGE_INFO['url'] == "update_ok.php") ){
		$admin_lvlchk = 0;
	}else{
		if( !$lvlmenu_info['admin_menu'] ){
			MgMoveURL("", "접근 권한이 없습니다.", "", "back"); exit;
		}else{
			$lvlmenu_val = str_replace("::", "|", $lvlmenu_info['admin_menu']);
			$lvlmenu_arr = explode("|", $lvlmenu_val);
			$lvlmenu_arr_flip = array_flip($lvlmenu_arr);

			if($lvlmenu_info['admin_menu'] != "all"){
				$admin_lvlchk = 0;
				//if( !in_array($PAGE_INFO['admin_folder'], $lvlmenu_arr_flip) ){
                // print_r($admin_sub_folder);
                // echo "<br>";
                // print_r($lvlmenu_arr);
				if( !in_array($admin_sub_folder, $lvlmenu_arr) ){
					MgMoveURL("{$SITE_INFO['http_host']}/_hamTool/index.html", "", "", "back"); exit;
				}
			}
		}
	}
}else{
	MgMoveURL("", "로그인 후 사용해주세요!", "", "");
	echo "<meta http-equiv='Refresh' content='0; URL=" . $SITE_INFO['http_host'] . "/_hamTool/index.html'>";
	exit;
}
?>