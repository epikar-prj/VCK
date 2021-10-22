<?php
/***************************************** 공통 *************************************************************************/
// 페이지 이동 함수(액션이후 처리)
function MgMoveURL($url='', $msg='', $target='', $action='', $charset='utf-8') {
	GLOBAL $SITE_INFO;

	$script="";

	if($msg) {
		$script.="alert('$msg');";
	}

	if($url) {
		if($target) {
			$script.="{$target}.location.href = '$url';";
			$target = "";
		} else {
			$script.="location.href = '$url';";
		}
	}

	switch($action) {
		case 'back' :
			$script.="history.back();";
			break;

		case 'close' :
			$script.="self.close();";
			break;
	}

	echo "
		<!DOCTYPE html>
		<html lang=ko><head>
		<META HTTP-EQUIV=Content-Type CONTENT=text/html;charset=$charset />
		<title>" . $SITE_INFO['title'] . "</title>
		</head>
		<SCRIPT LANGUAGE=JavaScript>
		<!--
		$script
		//-->
		</SCRIPT>
		<body></body>
		</html>
	";
}

// 로그인 회원 체크
function isLogined(){
	global $_COOKIE, $db;
	if (isset($_COOKIE['master_cust_cd'])) {
		if($_COOKIE['master_cust_cd']) {
            $sql = " select count(*) from volvo_user where master_cust_cd = '" . $_COOKIE['master_cust_cd'] . "' ";
            $count = $db->select_one($sql);
            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        }
	}
	return false;
}

// function isLogined2() {
// 	global $_COOKIE, $db;
// 	if (isset($_COOKIE['master_cust_cd'])) {
// 		if($_COOKIE['master_cust_cd']) {
//             $sql = " select count(*) from volvo_user where master_cust_cd = '" . $_COOKIE['master_cust_cd'] . "' ";
//             $count = $db->select_one($sql);
//             if ($count > 0) {
//                 return true;
//             } else {
//                 return false;
//             }
//         }
// 	}
// 	return false;
// }

// 로그인 회원 체크
function isOwnered(){
	global $_COOKIE;
	if (isset($_COOKIE['owner_flag'])) {
		if($_COOKIE['owner_flag'] == 'Y') return true;
	}
	return false;
}

// 로그인 체크 후 비로그인시 로그인 페이지로
function LoginChk() {
	global $_COOKIE,$_SERVER, $SITE_INFO;
	if($_SERVER['HTTPS'] && $SITE_INFO['https_host']){ $url = "${_SERVER[PHP_SELF]}"; }
	else{ $url = $SITE_INFO['http_host'] . $_SERVER['PHP_SELF']; }

	if($_SERVER['QUERY_STRING']){ $url .= "?${_SERVER[QUERY_STRING]}"; }
	if(isLogined()) return;
	else redirect($url);
}


// Q&A관리자 로그인 체크
function isQnaLogined(){
	global $_COOKIE;

	if( $_COOKIE["member_level"] == "B" || $_COOKIE["member_level"] == "C" ) return true;
	return false;
}
function isQnaLogined_B(){
	global $_COOKIE;

	if( $_COOKIE["member_level"] == "B" ) return true;
	return false;
}
function isQnaLogined_C(){
	global $_COOKIE;

	if( $_COOKIE["member_level"] == "C" ) return true;
	return false;
}
function isQnaAdminLogined($cate, $bm_sid){
	global $_COOKIE, $db, $TABLE_INFO;

	if($cate){
		$query = "SELECT master_sid FROM {$TABLE_INFO['qna_cate']} WHERE sid = '{$cate}' AND bm_sid = '{$bm_sid}'";
		$row=$db->row($query);

		if($row['master_sid']){
			$qna_master_sid_arr = explode("|", $row['master_sid']);
			if( isQnaLogined() && in_array($_COOKIE["member_sid"], $qna_master_sid_arr) ){ return true; }
			else{ return false; }
		}else{
			return false;
		}
	}else{
		return false;
	}
}

// 관리자 로그인 체크
function isAdminLogined(){
	global $_COOKIE;
	if( (!$_COOKIE["member_level"]) || $_COOKIE["member_level"] == "U" || $_COOKIE["member_level"] == "Z" ) return false;
	return true;
}
function isAdminLogined2(){
	global $_COOKIE;
	if( $_COOKIE["member_level"] && $_COOKIE["member_level"] == "A" ) return true;
	return false;
}

function AdminChk(){
	GLOBAL $_COOKIE, $SITE_INFO;
	if(!$_COOKIE["member_sid"]){
		MgMoveURL("", "로그인 후 사용해주세요!", "", "");
		echo "<meta http-equiv='Refresh' content='0; URL=" . $SITE_INFO['http_host'] . "/_hamTool/index.html'>";
		exit;
	}else if( (!$_COOKIE["member_level"]) || $_COOKIE["member_level"] == "U" || $_COOKIE["member_level"] == "Z" ){
		MgMoveURL("", "관리자 전용 페이지 입니다!!", "", "back");
		exit;
	}else{
		return false;
	}
}
function AdminChk2(){
	GLOBAL $_COOKIE, $SITE_INFO;
	if( (!$_COOKIE["member_level"]) || $_COOKIE["member_level"] == "U" || $_COOKIE["member_level"] == "Z" ){
		MgMoveURL("", "관리자 전용 페이지 입니다!!", "", "back");
		exit;
	}else{
		return false;
	}
}

function AdminChkPopup(){
	GLOBAL $_COOKIE, $SITE_INFO;
	if(!$_COOKIE["member_sid"]){
		MgMoveURL("", "로그인 후 사용해주세요!", "", "close");
		exit;
	}else if( (!$_COOKIE["member_level"]) || $_COOKIE["member_level"] == "U" || $_COOKIE["member_level"] == "Z" ){
		MgMoveURL("", "관리자 전용 페이지 입니다!!", "", "close");
		exit;
	}else{
		return false;
	}
}

// 넘어오는 데이터에 대한 SQL INJECTION 및 데이터 변환 및 데이터 크기 자르기
function MgRequestCheck($data, $cnt, $sql_check=true, $tag_check=true) {
	if($sql_check) $data = MgSQLDeny($data);
	if($tag_check) $data = MgRemoveEvilTags($data);
	$returnVal = MgHanCutString($data, $cnt, false);
	return $returnVal;
}

// 넘어오는 데이터에 대한 SQL INJECTION 및 데이터 변환 및 데이터 크기 자르기


function PARAM2($data) {
	if (isset($_GET[$data])) {
		return trim($_GET[$data]);
	} else if (isset($_POST[$data])) {
		return trim($_POST[$data]);
	} else {
		return "";
	}
}

// DB에 처리하기 위해서 SQL Injection 을 처리한다.
function MgSQLDeny($data) {
	$data = str_replace("´", "&acute;", $data);
	$data = str_replace("'", "&acute;", $data);
	$data = str_replace('"', "&quot;", $data);
	//$returnVal = eregi_replace("( select| union| insert| update| delete| drop|\/\*|\*\/|\\\)", "", $data);
	$returnVal = preg_replace("/( select| union| insert| update| delete| drop| or 1=1| and 1=1|\/\*|\*\/|\\\)/i", "", $data);
	return $returnVal;
}

// 자료 등록시 필요없는 태그 삭제하기
function MgRemoveEvilTags($data) {
/*
	// 허용할 테그
	$allowedTags = '<b><i><br><strong>';

	// 제거할 속성
	$stripAttrib = 'javascript:|onclick|ondblclick|onmousedown|onmouseup|onmouseover|';
	$stripAttrib = $stripAttrib . 'onmousemove|onmouseout|onkeypress|onkeydown|onkeyup|';
	$stripAttrib = $stripAttrib . 'onchange|onblur|onfocus|';
	$stripAttrib = $stripAttrib . 'h1|a|ul|ol|li|hr|img|font|span|table|tr|td|p|script';

	$str = preg_replace("/<(\/?)(?![\/a-z])([^>]*)>/i", "&lt;\\1\\2\\3&gt;", $data);
	$str = strip_tags($str, $allowedTags);
*/

	$str = htmlentities($data, ENT_QUOTES, 'UTF-8');
	$str = preg_replace("/<(\/?)(?![\/a-z])([^>]*)>/i", "&lt;\\1\\2\\3&gt;", $str);

	return $str; //preg_replace("/<(.*)($stripAttrib)+([^>]*)>/i", "<\\1xx\\2xx\\3>", $data);
}

// 한글 짜르기 
function MgHanCutString($str, $length=20, $isTail=true) {
	/* euc-kr 경우
	if (strlen($str) <= $length) return $str;

	for($i = 0; $i < $length; $i++)
		if(ord($str[$i]) > 127)
			$i++;

	// $str = chop(substr($str, 0, $length - $over % 2)) . "...";
	$str = substr($str, 0, $i) . "...";

	return $str;
	*/

	/* utf-8 경우	 */
	$checkmb = true;
	$tail = $isTail ? "..." : "";

	preg_match_all('/[\xEA-\xED][\x80-\xFF]{2}|./', $str, $match); 
	$m	= $match[0]; 
	$slen = strlen($str); // length of source string 
	$tlen = strlen($tail); // length of tail string 
	$mlen = count($m); // length of matched characters 

	if ($slen <= $length) return $str; 
	if (!$checkmb && $mlen <= $length) return $str; 

	$ret = array(); 
	$count = 0; 

	for ($i=0; $i < $length; $i++) { 
		$count += ($checkmb && strlen($m[$i]) > 1)?3:1; 
		if ($count + $tlen > $length) break; 
		$ret[] = $m[$i]; 
	}
	return join('', $ret).$tail;
//	 return mb_substr($str, 0, $length, "UTF-8") . ($isTail ? '...' : ''); 
}

// 태그를 완전 제거하여 Text만 보여주기
function MgRemoveTags($data) {
	$str = strip_tags(html_entity_decode($data));
	$str = str_replace("&nbsp;", "", $str);
	return $str;
}
function MgRemoveTags2($data, $html=true) {
	if($html){ $data = html_entity_decode($data); }
	$str = strip_tags($data);
	$str = str_replace("&nbsp;", " ", $str);
	return $str;
}

// Smarteditor 웹 에디터 이용 시 게시물 등록할 때 아무 내용을 입력하지 않았을 때 공백입력 처리하기
function MgRemoveBlank($data) {
	if( $data == "<p>&nbsp;</p>" || $data == "<P>&nbsp;</P>" ){
		$data = "";
	}
	return $data;
}

//Textarea에서 입력한 내용을 상세 페이지에서 보여줄 때...
function MgStringView($str, $br=true, $nbsp=true) {
	$tmp = $str;
	if($tmp){
		$tmp = html_entity_decode($tmp);
		if($nbsp){ $tmp = str_replace(" ", "&nbsp;", $tmp); }
		if($br){ $tmp = nl2br($tmp); }
	}
	return $tmp;
}
function MgStringView2($str) {
	$tmp = $str;
	if($tmp){
		$tmp = str_replace("&acute;", "'", $tmp);
		$tmp = str_replace("&quot;", '"', $tmp);
	}
	return $tmp;
}
function MgStringView3($str, $br=true, $nbsp=true) {
	$tmp = $str;
	if($tmp){
		$tmp = str_replace("&acute;", "'", $tmp);
		$tmp = str_replace("&quot;", '"', $tmp);
		if($nbsp){ $tmp = str_replace(" ", "&nbsp;", $tmp); }
		if($br){ $tmp = nl2br($tmp); }
	}
	return $tmp;
}


//배열을 라디오 박스로
/**
$arr 에는 반드시 라디오 박스로 만들 배열입력
$id 에는 라디오 박스의 name, id
$value 에는 선택될 값
$out_value 에는 $arr의 값에서 보여주면 안되는 값
$option 에는 자바스크립트 이벤트등 입력.
$br 에는 개행 여부 false 또는 몇번째에 개행할 지..(1,2,3,...)
$nbsp 에는 공백 수 0일때는 false 또는 공백 수(1,2,3,...)
**/
function printRadioBox($arr, $id, $value='', $out_value='', $option='', $br=false, $nbsp=false) {
	if(!is_array($arr)) return "Is Not Array.";
	if(!$id) return "ID is null";

	$i=1;
	$return="";
	foreach($arr as $tkey => $tval){
		if($tkey){
			if(strpos($out_value,$tkey) === false){
				if(!strcmp($value,$tkey)){
					$return.="<input type=\"radio\" name=\"${id}\" id=\"${id}_${i}\" ${option} value=\"${tkey}\" checked=\"checked\" /><label for=\"${id}_${i}\"> ${tval}</label>\n";   //'".${tkey}."' 
				} else {
					$return.="<input type=\"radio\" name=\"${id}\" id=\"${id}_${i}\" ${option} value=\"${tkey}\" /><label for=\"${id}_${i}\"> ${tval}</label>\n";   //'".${tkey}."'
				}
				if($nbsp){
					for($n=1;$n<=$nbsp;$n++){
						$return.="&nbsp;";
					}
				}
				if($br&&$i%$br==0) $return.="<br />";
				$i++;
			}
		}
	}
	return $return;
}
function printRadioBox_Div($arr, $id, $value='', $out_value='', $option='', $br=false, $nbsp=false) {
	if(!is_array($arr)) return "Is Not Array.";
	if(!$id) return "ID is null";

	$i=1;
	$return="";
	foreach($arr as $tkey => $tval){
		if($tkey){
			if(strpos($out_value,$tkey) === false){
				$return.="<div class=\"check-wrap left-float left\">";
				if(!strcmp($value,$tkey)){
					$return.="<input type=\"radio\" name=\"${id}\" id=\"${id}_${i}\" ${option} value=\"${tkey}\" class=\"radio-box\" checked=\"checked\" /><label for=\"${id}_${i}\" class=\"radio-label\"> ${tval}</label>\n";   //'".${tkey}."' 
				} else {
					$return.="<input type=\"radio\" name=\"${id}\" id=\"${id}_${i}\" ${option} value=\"${tkey}\" class=\"radio-box\" /><label for=\"${id}_${i}\" class=\"radio-label\"> ${tval}</label>\n";   //'".${tkey}."'
				}
				$return.="</div>";
				if($nbsp){
					for($n=1;$n<=$nbsp;$n++){
						$return.="&nbsp;";
					}
				}
				if($br&&$i%$br==0) $return.="<div class=\"clearfix\"></div>";
				$i++;
			}
		}
	}
	return $return;
}

function printCheckBox_Div($arr, $id, $value='', $out_value='', $option='', $br=false, $nbsp=false) {
	if(!is_array($arr)) return "Is Not Array.";
	if(!$id) return "ID is null";

	$i=1;
	$return="";
	foreach($arr as $tkey => $tval){
		if($tkey){
			if(strpos($out_value,$tkey) === false){
				$return.="<div class=\"check-wrap left-float left\">";
				if(!strcmp($value,$tkey)){
					$return.="<input type=\"checkbox\" name=\"${id}\" id=\"${id}_${i}\" ${option} value=\"${tkey}\" class=\"check-box\" checked=\"checked\" /><label for=\"${id}_${i}\" class=\"check-label\"> ${tval}</label>\n";   //'".${tkey}."' 
				} else {
					$return.="<input type=\"checkbox\" name=\"${id}\" id=\"${id}_${i}\" ${option} value=\"${tkey}\" class=\"check-box\" /><label for=\"${id}_${i}\" class=\"check-label\"> ${tval}</label>\n";   //'".${tkey}."'
				}
				$return.="</div>";
				if($nbsp){
					for($n=1;$n<=$nbsp;$n++){
						$return.="&nbsp;";
					}
				}
				if($br&&$i%$br==0) $return.="<div class=\"clearfix\"></div>";
				$i++;
			}
		}
	}
	return $return;
}

// 배열을 셀렉트 박스로
/**
$arr 에는 반드시 셀렉트 박스로 만들 배열입력
$id 에는 셀렉트 박스의 name, id
$value 에는 선택될 값
$out_value 에는 $arr의 값에서 보여주면 안되는 값
$option 에는 자바스크립트 이벤트등 입력
**/
function printSelectBox($arr, $id, $value='', $out_value='', $option='', $f_value = '', $is_f_value=true) {
	if(!$id) return "ID is null";

	if( is_array($arr) ){ $arr_key = array_keys($arr); }

    if($f_value){
		// $return="<label for=\"${id}\">" . $f_value . "</label>\n";
	}else{
		// $return="<label for=\"${id}\">" . $arr_key[0] . "</label>\n";
	}

	$return.="<select name=\"${id}\" id=\"${id}\" ${option}>\n";
	if($is_f_value){
		$return.="<option value=\"\">".$f_value."</option>\n";
	}
	if( is_array($arr) ){
		foreach($arr as $tkey => $tval){
			if(strpos($out_value,$tkey) === false){
				if(!strcmp($value,$tkey)){
					$return.="<option value=\"${tkey}\" selected=\"selected\">${tval}</option>\n";
				} else {
					$return.="<option value=\"${tkey}\">${tval}</option>\n";
				}
			}
		}
	}
	$return.="</select>";
	return $return;
}
function printSelectBox2($arr, $id, $value='', $out_value='', $option='', $f_value = '') {
	if(!$id) return "ID is null";

	$return="<select name=\"${id}\" id=\"${id}\" ${option}>\n";
	if($f_value){
		$return.="<option value=\"\">".$f_value."</option>\n";
	}
	if( is_array($arr) ){
		foreach($arr as $tkey => $tval){
			if(strpos($out_value,$tkey) === false){
				if(!strcmp($value,$tkey)){
					$return.="<option value=\"${tkey}\" selected=\"selected\">${tval}</option>\n";
				} else {
					$return.="<option value=\"${tkey}\">${tval}</option>\n";
				}
			}
		}
	}
	$return.="</select>";
	return $return;
}

function printSelectDateBox($start_num, $end_num, $id, $option='', $f_value = '', $is_f_value=true) {
	if(!$id) return "ID is null";
/*
	if($f_value){
		$return="<label for=\"${id}\">" . $f_value . "</label>\n";
	}else{
		$return="<label for=\"${id}\">" . $start_num . "</label>\n";
	}
*/
	$return.="<select name=\"${id}\" id=\"${id}\" ${option}>\n";
	if($is_f_value){
		$return.="<option value=\"\">".$f_value."</option>\n";
	}
	if( $start_num && $end_num ){
		for($d=$start_num; $d<=$end_num; $d++){
			if(!strcmp($value,$d)){
				$return.="<option value=\"" . sprintf("%02d",$d) . "\" selected=\"selected\">" . sprintf("%02d",$d) . "</option>\n";
			} else {
				$return.="<option value=\"" . sprintf("%02d",$d) . "\">" . sprintf("%02d",$d) . "</option>\n";
			}
		}
	}
	$return.="</select>";
	return $return;
}
function printSelectDateBox2($start_num, $end_num, $id, $option='', $f_value = '', $is_f_value=true) {
	if(!$id) return "ID is null";
/*
	if($f_value){
		$return="<label for=\"${id}\">" . $f_value . "</label>\n";
	}else{
		$return="<label for=\"${id}\">" . $start_num . "</label>\n";
	}
*/
	$return.="<select name=\"${id}\" id=\"${id}\" ${option}>\n";
	if($is_f_value){
		$return.="<option value=\"\">".$f_value."</option>\n";
	}
	if( $start_num && $end_num ){
		for($d=$start_num; $d>=$end_num; $d--){
			if(!strcmp($value,$d)){
				$return.="<option value=\"${d}\" selected=\"selected\">${d}</option>\n";
			} else {
				$return.="<option value=\"${d}\">${d}</option>\n";
			}
		}
	}
	$return.="</select>";
	return $return;
}



// 한 개의 데이터 가져오기
function printTableOneValue($table, $option='', $field='', $where='', $order=''){
	GLOBAL $db;
	$temp = "";

	if($where){ $where = "WHERE " . $where; }
	if($order){ $order = "ORDER BY " . $order; }

	if($table && $field && $where){
		$query = "SELECT {$option} {$field} FROM {$table} {$where} {$order}";
		$row=$db->row($query);

		$temp = $row[$field];
	}

	return $temp;
}

function setSelectBoxOptionYear() {
    $startYear = date("Y") - 27;
    $endYear = date("Y") - 75;

    $temp = '';
    for ($i = $startYear; $i >= $endYear; $i--) {
        $temp .= '<option value="' . $i . '">' . $i . '</option>';
    }

    return $temp;
}

function setSelectBoxOptionMonth() {
    $temp = '';
    for ($i = 1; $i <= 12; $i++) {
        $temp .= '<option value="' . str_pad($i, 2, '0', STR_PAD_LEFT) . '">' . str_pad($i, 2, '0', STR_PAD_LEFT) . '</option>';
    }

    return $temp;
}

function setSelectBoxOptionDay() {
    $temp = '';
    for ($i = 1; $i <= 31; $i++) {
        $temp .= '<option value="' . str_pad($i, 2, '0', STR_PAD_LEFT) . '">' . str_pad($i, 2, '0', STR_PAD_LEFT) . '</option>';
    }

    return $temp;
}

// Front 페이징 처리
/**
	$page = 페이지번호, $total = 총 댓글수, $link = 링크, $LIMIT = 한 페이지 글 수, $block = 페이징 갯수
	return 페이징html
**/
function front_msg_paging($page=1, $total=0, $link='', $limit=10, $block=10){
	$page_total	= @ceil($total / $limit);
	$page_prev = $page > 1 ? $page - 1 : 1;
	$page_next = $page >= $page_total ? $page_total : $page + 1;
	$page_start = (@floor(($page-1) / $block) * $block) + 1;
	$page_limit = ($page_total - $page_start) < $block ? $page_start + $page_total - $page_start : $page_start - 1 + $block;
	$page_link = $link == '' ? '' : "&".$link;

	$paging = '';

	$paging .= "<div class=\"paging_wrap\">";
	
	if($page == 1){
		$paging .= "\n<div class=\"btn_prev\"></div>";
	}else{
		$paging .= "\n<div class=\"btn_prev\"><a href=\"?page=".$page_prev.$page_link."\"></a></div>";
	}

    $paging .= "\n<ul class=\"paging\">";

	for($i=$page_start; $i <= $page_limit; $i++){
		if ($page == $i) {
			$paging .= "\n<li class=\"ov\"><a href=\"javascript:void(0);\">".$i."</a></li>";
		}else{
			$paging .= "\n<li><a href=\"?page=".$i.$page_link."\">".$i."</a></li>";
		}
    }
    
    $paging .= "\n</ul>";

	if($page == $page_total){
		$paging .= "\n<div class=\"btn_next\"></div>";
	}else{
		$paging .= "\n<div class=\"btn_next\"><a href=\"?page=".$page_next.$page_link."\"></a></div>";
	}
	
	$paging .= "\n</div>";

	return $paging;
}

// 관리자 페이징 처리
/**
	$page = 페이지번호, $total = 총 댓글수, $link = 링크, $LIMIT = 한 페이지 글 수, $block = 페이징 갯수
	return 페이징html
**/
function msg_paging($page=1, $total=0, $link='', $limit=10, $block=10){
	$page_total	= @ceil($total / $limit);
	$page_prev = $page > 1 ? $page - 1 : 1;
	$page_next = $page >= $page_total ? $page_total : $page + 1;
	$page_start = (@floor(($page-1) / $block) * $block) + 1;
	$page_limit = ($page_total - $page_start) < $block ? $page_start + $page_total - $page_start : $page_start - 1 + $block;
	$page_link = $link == '' ? '' : "&".$link;

	$paging = '';

	$paging .= "<div class=\"page left-float\">";
	if($page == 1){
		$paging .= "\n<a class=\"page-first\">처음</a>";
		$paging .= "<a class=\"page-prev\">이전</a>";
	}else{
		$paging .= "\n<a href=\"?page=1".$page_link."\" class=\"page-first\">처음</a>";
		$paging .= "<a href=\"?page=".$page_prev.$page_link."\" class=\"page-prev\">이전</a>";
	}

	/* 2015-06-12 수정 오준식
	for($i=$page_start; $i <= $page_limit; $i++){
		$paging .= "	<a href=\"?page=".$i.$page_link."\" class=\"page-item";
		if ($page == $i) {
			$paging .= " current\">".$i;
		}else{
			$paging .= "\">".$i;
		}
		$paging .= "</a>";
	}
	*/
	for($i=$page_start; $i <= $page_limit; $i++){
		if($i==$page_start){ $paging .= "\n"; }
		if ($page == $i) {
			$paging .= "<a class=\"page-num";
			$paging .= " on\" title=\"현재 페이지\">".$i."</a>";
		}else{
			$paging .= "<a href=\"?page=".$i.$page_link."\" class=\"page-num\"";
			$paging .= ">".$i."</a>";
		}
	}

	if($page == $page_total){
		$paging .= "\n<a class=\"page-next\">다음</a>";
		$paging .= "<a class=\"page-last\">끝</a>";
	}else{
		$paging .= "\n<a href=\"?page=".$page_next.$page_link."\" class=\"page-next\">다음</a>";
		$paging .= "<a href=\"?page=".$page_total.$page_link."\" class=\"page-last\">끝</a>";
	}
	$paging .= "\n</div>";

	return $paging;
}


/***************************************** GD 라이브러리를 이용한 썸네일 생성 *********************************************************/
/** 
	$cur_path : 파일을 업로드할 경로
	$cur_file : 업로드할 파일명
	$cw : 생성할 이미지의 가로길이
	$ch : 생성할 이미지의 세로길이
	$format : 해당 파일의 확장자명
**/
function MgImgThumbnail($cur_path, $cur_file, $cw, $ch, $format="jpg") {
	$part = explode(".", $cur_file);
	$ext = $part[sizeof($part)-1];
	$pre = str_replace(".{$ext}", "", $cur_file);

	$filename = $cur_path."/" . $cur_file;

	$thum_path = $cur_path . "/thumbnail";
	if(!file_exists($thum_path)) {
		umask(0);
		@mkdir($thum_path);
		@chmod($thum_path, 0777);
	}
	$sfilename = $thum_path."/" . $pre . "_thum." . $format;


	if(!file_exists($sfilename)) {
		list($width, $height) = getimagesize($filename);
		switch(strtolower($format)) {
			case 'jpg':
				$source = imagecreatefromjpeg($filename);
				break;

			case 'gif';
				$source = imagecreatefromgif($filename);
				break;

			case 'png':
				$source = imagecreatefrompng($filename);
				break;

			default:
				return;
		}

		if( !($cw || $ch) ){ $cw = 1024; $ch = 768; }											// 생성할 이미지의 사이즈가 없을 때 사이즈의 default 값 지정
		$cw = ($cw && ($cw<$width) ) ? $cw : $width;										// 생성할 이미지의 가로길이
		$ch = ($ch && ($ch<$height) ) ? $ch : round($cw*($height/$width));		// 생성할 이미지의 세로길이
		$w = $w ? $w : $width;																		// 원본이미지에서 자를부분의 가로길이
		$h = $h ? $h : $height;																			// 원본이미지에서 자를 부분의 세로길이
		$sX = $sX ? $sX : ($width-$w)/2;														// 원본이미지의 Start Point X
		$sY = $sY ? $sY : ($height-$h)/2;														// 원본이미지의 Start Point Y

		$thumb = imagecreatetruecolor($cw, $ch);

		switch(strtolower($format)) {
			case 'gif':
			case 'png':
				imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
				imagealphablending($thumb, false);
				imagesavealpha($thumb, true);
				imagecopyresampled($thumb,$source,0,0, $sX, $sY,$cw, $ch, $w, $h);
				imagepng($thumb, $sfilename);
				break;

			default:
				imagealphablending($thumb, false);
				imagecopyresized($thumb, $source, 0, 0, $sX, $sY, $cw, $ch, $w, $h);
				imagejpeg($thumb, $sfilename, 100);
				return;
		}

		//로드한 메모리를 비워줍니다. gd는 꼭 이걸 해주어야 합니다. 
		ImageDestroy($thumb);
		ImageDestroy($source); 
	}
}
function MgImgThumbnail2($copy_path, $cur_path, $cur_file, $cw, $ch, $format="jpg") {
	$part = explode(".", $cur_file);
	$ext = $part[sizeof($part)-1];
	$pre = str_replace(".{$ext}", "", $cur_file);

	$filename = $copy_path."/" . $cur_file;

	$thum_path = $cur_path . "/thumbnail";
	if(!file_exists($thum_path)) {
		umask(0);
		@mkdir($thum_path);
		@chmod($thum_path, 0777);
	}
	$sfilename = $thum_path."/" . $pre . "_thum." . $format;


	if(!file_exists($sfilename)) {
		list($width, $height) = getimagesize($filename);
		switch(strtolower($format)) {
			case 'jpg':
				$source = imagecreatefromjpeg($filename);
				break;

			case 'gif';
				$source = imagecreatefromgif($filename);
				break;

			case 'png':
				$source = imagecreatefrompng($filename);
				break;

			default:
				return;
		}

		if( !($cw || $ch) ){ $cw = 1024; $ch = 768; }											// 생성할 이미지의 사이즈가 없을 때 사이즈의 default 값 지정
		$cw = ($cw && ($cw<$width) ) ? $cw : $width;										// 생성할 이미지의 가로길이
		$ch = ($ch && ($ch<$height) ) ? $ch : round($cw*($height/$width));		// 생성할 이미지의 세로길이
		$w = $w ? $w : $width;																		// 원본이미지에서 자를부분의 가로길이
		$h = $h ? $h : $height;																			// 원본이미지에서 자를 부분의 세로길이
		$sX = $sX ? $sX : ($width-$w)/2;														// 원본이미지의 Start Point X
		$sY = $sY ? $sY : ($height-$h)/2;														// 원본이미지의 Start Point Y

		$thumb = imagecreatetruecolor($cw, $ch);

		switch(strtolower($format)) {
			case 'gif':
			case 'png':
				imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
				imagealphablending($thumb, false);
				imagesavealpha($thumb, true);
				imagecopyresampled($thumb,$source,0,0, $sX, $sY,$cw, $ch, $w, $h);
				imagepng($thumb, $sfilename);
				break;

			default:
				imagealphablending($thumb, false);
				imagecopyresized($thumb, $source, 0, 0, $sX, $sY, $cw, $ch, $w, $h);
				imagejpeg($thumb, $sfilename, 100);
				return;
		}

		//로드한 메모리를 비워줍니다. gd는 꼭 이걸 해주어야 합니다. 
		ImageDestroy($thumb);
		ImageDestroy($source); 
	}
}

/***************************************** 썸네일 삭제 *********************************************************/
/** 
	$cur_path : 파일을 업로드할 경로
	$cur_file : 업로드할 파일명
	$format : 해당 파일의 확장자명
**/
function MgImgThumbnailDel($cur_path, $cur_file, $format="jpg") {
	$part = explode(".", $cur_file);
	$ext = $part[sizeof($part)-1];
	$pre = str_replace(".{$ext}", "", $cur_file);

	$thum_path = $cur_path . "/thumbnail";
	if(!file_exists($thum_path)) {
		umask(0);
		@mkdir($thum_path);
		@chmod($thum_path, 0777);
	}
	$sfilename = $thum_path."/" . $pre . "_thum." . $format;

	if(file_exists($sfilename)) {
		@unlink($sfilename);
	}
}

/***************************************** 썸네일 파일명 가져오기 ********************************************/
/** 
	$cur_path : 파일을 업로드할 경로
	$cur_file : 업로드할 파일명
	$format : 해당 파일의 확장자명
**/
function MgImgThumbnailName($cur_file, $format="jpg") {
	$part = explode(".", $cur_file);
	$ext = $part[sizeof($part)-1];
	$pre = str_replace(".{$ext}", "", $cur_file);
	if($ext){ $format = $ext; }

	$sfilename = $pre . "_thum." . $format;

	return $sfilename;
}
/***************************************************************************************************************/


/** 2014.11.11 곽광철 추가 **/
/** 
	접근 디바이스 PC, 모바일 접속정보
	device_type( )
	return M : 모바일웹, P : 일반웹 
**/
function device_type() {
	$arr_browser = array ("iphone", "android", "ipod", "iemobile", "mobile", "lgtelecom", "ppc", "symbianos", "blackberry", "ipad", "gallexy", "nokia", "up.browser", "webos", "opera mini", "opera mobi", "windows phone", "polaris", "ice cream sandwich", "optimus", "windows ce", "lg", "mot", "samsung", "sonyericsson");
	$httpUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$type = "P";
	for($indexi = 0 ; $indexi < COUNT($arr_browser) ; $indexi++){
		if(strpos($httpUserAgent, $arr_browser[$indexi]) == true){
			$type = "M";
			break;
		}
	}
	return $type;
}

// 모바일 체크
function isMobile() {
	$arr_browser = array ("iphone", "android", "ipod", "iemobile", "mobile", "lgtelecom", "ppc", "symbianos", "blackberry", "ipad", "gallexy", "nokia", "up.browser", "webos", "opera mini", "opera mobi", "windows phone", "polaris", "ice cream sandwich", "optimus", "windows ce", "lg", "mot", "samsung", "sonyericsson");
	$httpUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	// 기본값으로 모바일 브라우저가 아닌것으로 간주함
	$mobile_browser = false;
	// 모바일브라우저에 해당하는 문자열이 있는 경우 $mobile_browser 를 true로 설정
	for($indexi = 0 ; $indexi < COUNT($arr_browser) ; $indexi++){
		if(strpos($httpUserAgent, $arr_browser[$indexi]) == true){
			$mobile_browser = true;
			break;
		}
	}
	return $mobile_browser;
}

function checkOS(){
    if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
        $device = "ipad";
    } else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || 
        strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
        $device = "iphone";
    } else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
        $device = "blackberry";
    } else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
        $device = "android";
    } else {
        $device = "etc";
    }

    return $device;
}


// 유효성 검사
function validate_email($email) {
    if(!preg_match("/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)){
        return false;
    } else {
        return true;
    }
}


function format_phone($phone){
    $phone = preg_replace("/[^0-9]/", "", $phone);
    $length = strlen($phone);

    switch($length){
      case 11 :
          return preg_replace("/([0-9]{3})([0-9]{4})([0-9]{4})/", "$1-$2-$3", $phone);
          break;
      case 10:
          return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
          break;
      default :
          return $phone;
          break;
    }
}

function add_hyphen($tel) {
    $tel = preg_replace("/[^0-9]*/s","",$tel); //숫자이외 제거

    if (strlen($tel) == 8) {
        return substr($tel,0,4) . "-" . substr($tel,4,8);
    } else if (substr($tel,0,2) =='02' ) {
        return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/","\\1-\\2-\\3", $tel);
    } else if (substr($tel,0,2) =='8' && substr($tel,0,2) =='15' || substr($tel,0,2) =='16'||  substr($tel,0,2) =='18'  ) {
        return preg_replace("/([0-9]{4})([0-9]{4})$/","\\1-\\2",tel);  
        //지능망 번호이면
    } else {
        return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/","\\1-\\2-\\3" ,$tel);
        //핸드폰번호만 이용한다면 이것만잇어도됨
    }
}

//정렬대상 array, 정렬 기준 key, 오름/내림차순
function arr_sort($array, $key, $sort='asc') {
    $keys = array();
    $vals = array();

    foreach ($array as $k=>$v) {
        $i = $v[$key].'.'.$k;
        $vals[$i] = $v;
        array_push($keys, $k);
    }
    
    unset($array);

    if ($sort=='asc') {
        ksort($vals);
    } else {
        krsort($vals);
    }

    $ret = array_combine($keys, $vals);
    unset($keys);
    unset($vals);
    
    return $ret;
}

// XSS filter
function XSSFilter($data) {
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do {
        $Temporary = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    } while ($Temporary !== $data);

    return trim($data);
}

function getToken() {
    $token = uniqid();
    $_SESSION["token"] = $token;
    return $token;
}

?>
