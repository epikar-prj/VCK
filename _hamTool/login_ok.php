<?php
require_once "../inc/common.php";
/*
foreach($_POST as $pkey => $pval){
	echo $pkey . "=>" . $pval . "<br />";
}
die();
*/

// Request 값
$id = MgRequestCheck(trim($_POST['id']), 20, true, true); $id = strtolower($id); // 무조건 소문자로 변경함
$pw = MgRequestCheck(trim($_POST['pw']), 20, true, true);

//입력 데이터 검증
if(!$id) { MgMoveURL("", "아이디를 입력하세요.", "", "back"); exit; }
if(!$pw) { MgMoveURL("", "비밀번호를 입력하세요.", "", "back"); exit; }


// 자료 검색
$query = "SELECT `sid`, `id`, `name`, `pw`, `email`, `tel`, `lvl`, `vcenter`, `status`, `chkdel` FROM {$TABLE_INFO['master']} WHERE id='{$id}'";
$row=$db->row($query);


// 관리자인지 체크
if(!$row['sid']) { MgMoveURL("", "운영자가 아닙니다.", "", "back"); exit; }

// 비밀번호 체크
if($row['pw'] != md5($pw)) { MgMoveURL("", "입력하신 패스워드가 틀립니다.", "", "back"); exit; }

// 삭제여부 체크
if($row['chkdel'] == "Y") { MgMoveURL("", "삭제처리된 아이디입니다.\\n관리자에게 문의하시기 바랍니다.", "", "back"); exit; }

// 상태 체크
if($row['status'] == "N") { MgMoveURL("", "접근이 불가능한 아이디입니다.\\n관리자에게 문의하시기 바랍니다.1", "", "back"); exit; }

// 권한 체크
if( (!$row['lvl']) && ( !in_array($row['lvl'], $OPTION_INFO['mlevel']) ) && ($row['lvl'] == "U" || $row['lvl'] == "Z") ) { MgMoveURL("", "접근이 불가능한 아이디입니다.\\n관리자에게 문의하시기 바랍니다.2", "", "back"); exit; }


// 관리자 등급별 접근메뉴의 첫메뉴 링크 값 가져오기
$query_lvl = "SELECT `lvl`, `admin_menu` FROM {$TABLE_INFO['lvl_info']} WHERE chkdel='N' AND status='Y' AND lvl='{$row['lvl']}'";
$lvl_row = $db->row($query_lvl);
if(trim($lvl_row['admin_menu'])){
	if($lvl_row['admin_menu'] == "all"){
		if(!$url){ $url=$MENU_INFO['admin_link_value'][0]; }
	}else{
		$lvl_menu_arr1 = explode("|", $lvl_row['admin_menu']);
		if(trim($lvl_menu_arr1[0])){
            // echo $lvl_menu_arr1[0];
			$lvl_menu_arr2 = explode("::", $lvl_menu_arr1[0]);
            // var_dump($MENU_INFO['admin_sub_link']);
			if(!$url){ $url = $MENU_INFO['admin_sub_link'][$lvl_menu_arr2[0]][$lvl_menu_arr2[1]]; }
        }
	}
}

// 쿠키를 생성한다.
SetCookie("member_id",$id,0,"/");
SetCookie("member_sid",$row['sid'],0,"/");
SetCookie("member_name",$row['name'],0,"/");
SetCookie("member_level",$row['lvl'],0,"/");
SetCookie("member_vcenter",$row['vcenter'],0,"/");


// DB Disconnect
require_once "../inc/disconnect.php";


// 페이지 이동
if(!$url) $url=$MENU_INFO['admin_link_value'][0];
MgMoveURL($url);
exit;
?>