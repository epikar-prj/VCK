<?php
require_once "../../inc/common.php";

$EXCEL['filename'] = iconv("UTF-8", "EUC-KR", $SITE_INFO['title'] . "_시승신청-".date('Ymd'));
header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );
header( "Content-Disposition: attachment; filename=".$EXCEL['filename'].".xls" );


// 조건 검색 생성
$SearchText = "WHERE chkdel= 'N' ";

$SearchCarModel = MgRequestCheck(trim($_REQUEST['SearchCarModel']), 2, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);

if($SearchCarModel) { $SearchText .= "AND `model` = '{$SearchCarModel}' "; }
if($SearchColumn && $SearchValue) {
	$SearchText .= "AND {$SearchColumn} LIKE '%{$SearchValue}%' ";
} else {
	$SearchColumn = ""; $SearchValue  = "";
}


// 자료 검색
$query = "
	SELECT
		`sid`, `site_type`, `name`, `gender`,`birth`, `hp`, `email`, `showroom`, `model`, `buy_check`, `agree1`, `agree2`, `agree3`, `agree4`, `chkdel`, `regdate`, `success`, `ch_desc`
	FROM
		{$TABLE_INFO['event_apply']}
		{$SearchText}
	ORDER BY
		regdate DESC
";	// vcenter ASC, drive_date ASC, drive_time ASC, sid ASC
$rows=$db->fetch_array($query);


$Excel_Str  = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
$Excel_Str .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">";
$Excel_Str .= "	<tr height=\"25\">";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">이름</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">휴대폰</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">이메일</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">성별</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">생년월일</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">차량모델</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">신청전시장코드</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">신청전시장</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">구매의향</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">신청경로</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">(필수)개인정보 수집 및 이용 동의</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">(필수)개인정보 처리 및 위탁 동의</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">(필수)개인정보 제3자 제공 및 활용 동의</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">(선택)마케팅 활용 동의</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">접수날짜</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">callback</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">error</td>";
$Excel_Str .= "	</tr>";

foreach($rows as $row) {
	$Excel_Str .= "	<tr>";
	$Excel_Str .= "		<td align=\"center\">{$row['name']}</td>";
	$Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['hp']}</td>";
	$Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['email']}</td>";
	$Excel_Str .= "		<td align=\"center\">{$OPTION_INFO['gender'][$row['gender']]}</td>";
	$Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['birth']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$VOLVO_INFO['car_model'][$row['model']]}</td>";
	$Excel_Str .= "		<td align=\"center\">{$row['showroom']}</td>";
	$Excel_Str .= "		<td align=\"center\">{$VOLVO_INFO['showroom'][$row['showroom']]}</td>";
	$Excel_Str .= "		<td align=\"center\">{$OPTION_INFO['buy_check'][$row['buy_check']]}</td>";
	$Excel_Str .= "		<td align=\"center\">{$OPTION_INFO['site_type'][$row['site_type']]}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['agree1']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['agree2']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['agree3']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['agree4']}</td>";
	$Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['regdate']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['success']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['ch_desc']}</td>";
	$Excel_Str .= "	</tr>";
}

$Excel_Str .= "</table>";


echo $Excel_Str;


// DB Disconnect
require_once "../../inc/disconnect.php";


exit;
?>