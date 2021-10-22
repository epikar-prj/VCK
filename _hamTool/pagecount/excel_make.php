<?php
require_once "../../inc/common.php";

$SearchSdate = MgRequestCheck(trim($_REQUEST['SearchSdate']), 15, true, true);
$SearchEdate = MgRequestCheck(trim($_REQUEST['SearchEdate']), 15, true, true);

$EXCEL['filename'] = iconv("UTF-8", "EUC-KR", $SITE_INFO['title'] . "_조회수-".$SearchSdate . "_" . $SearchEdate);
header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );
header( "Content-Disposition: attachment; filename=".$EXCEL['filename'].".xls" );




// 조건 검색 생성
$SearchText = " WHERE category <> '' ";

if($SearchSdate && $SearchEdate) {
    $SearchText .= "AND (DATE(regdate) >= DATE('{$SearchSdate}') AND DATE(regdate) <= DATE('{$SearchEdate}')) ";
}



// 자료 검색
$query = "
SELECT 
    A.category, A.url, A.cnt, B.title 
FROM (
    SELECT 
        category, url, COUNT(url) cnt 
    FROM 
        volvo_page_view
        {$SearchText}
    GROUP BY 
        url, category 
    HAVING 
        COUNT(url)
) AS A 
LEFT JOIN 
    volvo_page_view_title B 
ON 
    A.url = B.url 
ORDER BY 
    B.title ASC

";	// vcenter ASC, drive_date ASC, drive_time ASC, sid ASC
$rows=$db->fetch_array($query);


$codes = array(
    "index" => "MAIN",
    "accident" => "사고접수",
    "bebetter" => "BE BETTER",
    "cars" => "CARS",
    "center" => "사고차 무상 견인 서비스",
    "emergency" => "긴급출동",
    "event" => "EVENT",
    "faq" => "FAQ",
    "inquiry" => "1:1 문의",
    "maintenence" => "정비이력",
    "maintenence_check" => "실시간 정비이력",
    "news" => "NEWS",
    "member" => "MY VOLVO",
    "policy" => "개인정보 취급 방침",
    "promotion" => "Hej, Fammilj",
    "reservation" => "정비예약",
    "reservation_list" => "정비예약 관리",
    "selekt" => "볼보 인증 중고차",
    "showroom" => "전시장 안내",
    "terms" => "이용약관",
    "testdrive" => "시승신청",
    "warning" => "경고등",
    "footerMenu" => "하단메뉴",
    "maintenence_near" => "주변 가볼만한 곳",
);


$Excel_Str  = "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />";
$Excel_Str .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">";
$Excel_Str .= "	<tr height=\"25\">";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\" style=\"width: 80px\">번호</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\" style=\"width: 150px\">대분류</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\" style=\"width: 150px\">소분류</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\">URL</td>";
$Excel_Str .= "		<td align=\"center\" style=\"background-color:#d9d9d9;\" style=\"width: 80px\">COUNT</td>";
$Excel_Str .= "	</tr>";

$ListRow = count($rows);
foreach($rows as $row) {
    $ListNum = $ListRow;
    $name = "";
    if ($row['category'] == 'page') {
        $splitUrl = explode('/' , $row['url']);

        for ($i = 0; $i < count($splitUrl); $i ++) {
            if ($i) {
                $splitUrl[$i] = explode('.' , $splitUrl[$i])[0];
                // str_replace(".php", "", $splitUrl[$i]);
            }
            if ( $splitUrl[$i] == '') {
                $splitUrl[$i] = "index";
            }
        }
        
        
        if ($splitUrl[1] == "index") {
            $name = $codes[$splitUrl[1]];
        } else {
            $name = $codes[$splitUrl[2]];
        }
    } else {
        $name = "LINK";
    }



	$Excel_Str .= "	<tr>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$ListNum}</td>";
    $Excel_Str .= "		<td align=\"center\">{$name}</td>";
    $Excel_Str .= "		<td align=\"center\">{$row['title']}</td>";
    $Excel_Str .= "		<td align=\"left\">{$row['url']}</td>";
    $Excel_Str .= "		<td align=\"center\" style=\"mso-number-format:'\@';\">{$row['cnt']}</td>";
	$Excel_Str .= "	</tr>";

    $ListRow--;
}

$Excel_Str .= "</table>";


echo $Excel_Str;


// DB Disconnect
require_once "../../inc/disconnect.php";


exit;
?>