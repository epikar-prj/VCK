<?php
require_once "../inc/header.html";

// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 30;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;


$SearchSdate = MgRequestCheck(trim($_REQUEST['SearchSdate']), 15, true, true);
$SearchEdate = MgRequestCheck(trim($_REQUEST['SearchEdate']), 15, true, true);

$SearchText = " WHERE category <> '' ";

if($SearchSdate && $SearchEdate) {
    $SearchText .= "AND (DATE(regdate) >= DATE('{$SearchSdate}') AND DATE(regdate) <= DATE('{$SearchEdate}')) ";
}


// 총 갯수 검색
$query_cnt = " select count(*) from (SELECT url FROM volvo_page_view " . $SearchText . " GROUP BY url) AAA ";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

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


// 자료 검색
$query = "
SELECT A.category, A.url, A.cnt, B.title FROM (SELECT category, url, COUNT(url) cnt FROM volvo_page_view
" . $SearchText . "
GROUP BY url, category 
HAVING COUNT(url)) AS A LEFT JOIN volvo_page_view_title B ON A.url = B.url ORDER BY B.title ASC LIMIT
{$StartRow}, {$limit}
";

$result=$db->query($query);

$str_url = "SearchSdate={$SearchSdate}&SearchEdate={$SearchEdate}";

?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#listMode").val('');

		$('#btn_excel').click(function(){
			location.href = "excel_make.php?<?=$str_url?>";
		});
	});

// 체크박스 - 전체 선택 및 해제
function Action_Select_All(checked){
	$("input:checkbox[name='chk[]']").prop("checked", checked);
}

function Action_View(sid) {
	location.href = "view.php?sid="+sid+"&page=<?=$page?>&<?=$str_url?>";
}

$(function() {
	var dt = new Date();
	var y = dt.getFullYear();
	var m = dt.getMonth()+1;
	var d = dt.getDate()+1;

	//mindt = y+"-"+m+"-1";
	//maxdt = y+"-"+m+"-30";
	//mindt = y+"-2-3";
	mindt = y+"-"+m+"-"+d;
	maxdt = y+"-3-12";

	$(".date").datepicker({
		dateFormat:"yy-mm-dd", firstDay: 0,
		
		isRTL: false
	});
    
});

$(document).ready(function(){
    $('#btn_excel').click(function(){
        location.href = "excel_make.php?<?=$str_url?>";
    });
});
</script>
<style>
    .vt-table-td.url { word-break: break-all; }
    .vt-table-td { position: relative; padding: 5px 15px; }
    .vt-table-td input { padding: 0 5px; width: 100%; height: 30px; border: 1px solid #ccc; border-radius: 2px; background-color: #fbfbfb; }
    .vt-table-td a.save { display: none; position: absolute; top: 12px; right: 20px; padding: 0px 5px; font-size: 10px; color: #333; background-color: #fff; border-radius: 2px; border: 1px solid #333; }
    .vt-table-td input:focus + a.save { display: block; }
    .vt-table-td a.save:focus { display: block; }
    .vt-table-td a.save:active { display: block; }
</style>
<article class="unit-area">
    <div class="left-float">
        <button type="button" name="btn_excel" id="btn_excel" class="btn btn-gray med2 left-float left">엑셀파일 다운로드</button>
    </div>
    <div class="right-float">
		<form method="post" name="searchForm" id="searchForm" mathod="get" action="/_hamTool/pagecount/list.php">
        <div class="left_area left-float date_area">
            <input type="text" name="SearchSdate" id="SearchSdate" value="<?=$SearchSdate?>" maxlength="10" onblur="Add_HyphenDate('SearchSdate', this.value)" class="input med date" autocomplete="off"/>
            <div class="txt">~</div>
            <input type="text" name="SearchEdate" id="SearchEdate" value="<?=$SearchEdate?>" maxlength="10" onblur="Add_HyphenDate('SearchEdate', this.value)" class="input med date" autocomplete="off"/>
        </div>
        <input type="submit" name="btn_search" id="btn_search" value="검색" class="btn btn-gray inline mini ">
        </form>
    </div>
	<div class="clearfix" style="margin-top: 50px;">
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
			<colgroup>
                <col width="30px" />
                <col width="170px" />
                <col width="280px" />
                <col width="*" />
                <col width="100px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th">번호</th>
					<th scope="col" class="vt-table-th">대분류</th>
					<th scope="col" class="vt-table-th">소분류</th>
					<th scope="col" class="vt-table-th">URL</th>
					<th scope="col" class="vt-table-th">COUNT</th>
				</tr>
                <? 
                $ListRow = 0;
                foreach($result as $row) {
                    $ListNum = $TotalCount - (($page - 1) * $limit + $ListRow);
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

                     ?>
				<tr>
					<td class="vt-table-td center"><?=$ListNum?></td>
					<td class="vt-table-td"><?=$name?></td>
					<td class="vt-table-td"><input type="text" name="" id="" value="<?=$row['title']?>"><a class="save" href="javascript: void(0)" data-url="<?=$row['url']?>">저장</a></td>
					<td class="vt-table-td url"><?=$row['url']?></td>
					<td class="vt-table-td center"><?=$row['cnt']?></td>
				</tr>
                <? 
                    $ListRow++;
                } ?>
			</tbody>
		</table>
		</form>
    </div>
    <!--//paginate:S-->
	<?if($ListRow != 0){ echo msg_paging($page, $TotalCount, $str_url, $limit, $block); }?>
	<!--//paginate:E-->
</article>
<script>
    $("a.save").on('click', function() {
        console.log(11)
        var $input = $(this).siblings('input');
        var title = $input.val();
        var url = $(this).attr('data-url');

        updateTitle(url, title, $input);
    });

    function updateTitle(_url, _title, _input) {
        console.log(_url, _title, _input)
        $.ajax({
            url:'/_hamTool/ajax/ajax.updatePageCountTitle.php',
            type:'get',
            data: {url: _url, title: _title},
            dataType: 'text',
            success: function(_res){
                if (_res) {
                    _input.css("background-color", "rgb(0 155 0 / 0.2)")
                } else {
                    _input.css("background-color", "rgb(155 0 0 / 0.2)")
                }
            }, complete: function() {

            }, error: function(e) {
                console.log(e)
            }
        });
    }
</script>
<?php
require_once "../inc/footer.html";
?>