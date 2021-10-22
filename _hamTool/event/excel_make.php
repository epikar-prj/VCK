<?php
require_once "../../inc/common.php";

$EXCEL['filename'] = iconv("UTF-8", "EUC-KR", $SITE_INFO['title'] . "_이벤트-".date('Ymd'));
header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );
header( "Content-Disposition: attachment; filename=".$EXCEL['filename'].".xls" );


// 조건 검색 생성
$SearchText = " WHERE chkdel <> 'Y' ";

// 자료 검색
$query = "
SELECT
    `sid`, `id`, `cust_nm`, `hp`, `answer`, `use_sms_recept_yn`, `use_email_recept_yn`, `use_push_recept_yn`, `use_dm_recept_yn`, `reg_date`
FROM
    volvo_event_1
    {$SearchText}
ORDER BY
    sid DESC
";	// vcenter ASC, drive_date ASC, drive_time ASC, sid ASC
$rows=$db->fetch_array($query);


$Excel_Str  = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
$Excel_Str .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">";
$Excel_Str .= "	<tr height=\"25\">";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">아이디</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">답</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">휴대전화</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">SMS</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">EMAIL</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">PUSH</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">DM</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">등록일자</td>";
$Excel_Str .= "	</tr>";

foreach($rows as $row) {
	$Excel_Str .= "	<tr>";
    $Excel_Str .= "		<td align=\"center\">{$row['id']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['answer']}</td>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['hp']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['use_sms_recept_yn']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['use_email_recept_yn']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['use_push_recept_yn']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['use_dm_recept_yn']}</td>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['reg_date']}</td>";
	$Excel_Str .= "	</tr>";
}

$Excel_Str .= "</table>";


echo $Excel_Str;


// DB Disconnect
require_once "../../inc/disconnect.php";


exit;
?>