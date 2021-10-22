<?php
require_once "../../inc/common.php";

$EXCEL['filename'] = iconv("UTF-8", "EUC-KR", $SITE_INFO['title'] . "_대기고객기프트-".date('Ymd'));
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
    a.sid, a.id, a.receive_nm, a.receive_hp, a.receive_zip, a.receive_addr1, a.receive_addr2, a.is_received, a.reg_date, a.rec_date, b.cust_nm, b.hp
FROM
    volvo_wating_cust a
JOIN
    ( select master_cust_cd, cust_nm, hp from volvo_user GROUP BY master_cust_cd, cust_nm, hp ) b
ON
    a.master_cust_cd = b.master_cust_cd
    {$SearchText}
ORDER BY
    sid DESC
";	// vcenter ASC, drive_date ASC, drive_time ASC, sid ASC
$rows=$db->fetch_array($query);


$Excel_Str  = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
$Excel_Str .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">";
$Excel_Str .= "	<tr height=\"25\">";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">아이디</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">이름</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">휴대전화</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">수령인</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">수령인 휴대전화</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">주소</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">수령</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">등록일자</td>";
$Excel_Str .= "	</tr>";

foreach($rows as $row) {
    $addr = "({$row['receive_zip']}) {$row['receive_addr1']}";
                        
    if ($row['receive_addr2']) {
        $addr .= "<br>{$row['receive_addr2']}";
    }

    $tel1 = add_hyphen($row['hp']);
    $tel2 = add_hyphen($row['receive_hp']);
    $rec_date = $row['is_received'] == 'Y' ? $row['rec_date'] : "-";

	$Excel_Str .= "	<tr>";
    $Excel_Str .= "		<td align=\"center\">{$row['id']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['cust_nm']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$tel1}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['receive_nm']}</td>";
    $Excel_Str .= "		<td align=\"center\">{$tel2}</td>";
    $Excel_Str .= "		<td align=\"center\">{$addr}</td>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$rec_date}</td>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['reg_date']}</td>";
	$Excel_Str .= "	</tr>";
}

$Excel_Str .= "</table>";


echo $Excel_Str;


// DB Disconnect
require_once "../../inc/disconnect.php";


exit;
?>