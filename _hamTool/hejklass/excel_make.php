<?php
require_once "../../inc/common.php";

$bm_sid = $_REQUEST['bm_sid'];
$tableNumber = $bm_sid ? $bm_sid : "1";

$EXCEL['filename'] = iconv("UTF-8", "EUC-KR", $SITE_INFO['title'] . "_헤이클래스-".date('Ymd'));
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
    *
FROM
    volvo_hejklass_{$tableNumber}
    {$SearchText}
ORDER BY
    sid DESC
";	// vcenter ASC, drive_date ASC, drive_time ASC, sid ASC
$rows=$db->fetch_array($query);


$Excel_Str  = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
$Excel_Str .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">";
$Excel_Str .= "	<tr height=\"25\">";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">유저코드</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">아이디</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">이름</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">휴대전화</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">모델</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">차량 번호</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">등록일자</td>";
$Excel_Str .= "	</tr>";

foreach($rows as $row) {
	$Excel_Str .= "	<tr>";
    $Excel_Str .= "		<td align=\"center\">{$row['master_cust_cd']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['member_id']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['name']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['hp']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['car_model']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['car_num']}</td>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['regdate']}</td>";
	$Excel_Str .= "	</tr>";
}

$Excel_Str .= "</table>";


echo $Excel_Str;


// DB Disconnect
require_once "../../inc/disconnect.php";


exit;
?>