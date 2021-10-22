<?php
require_once "../inc/header.html";

// var_dump($MENU_INFO['admin_sub']);

$tableNumber = $bm_sid ? $bm_sid : "1";

// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 20;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;


$SearchColumn = $_REQUEST["SearchColumn"] ? $_REQUEST["SearchColumn"] : "";
$SearchValue = $_REQUEST["SearchValue"] ? $_REQUEST["SearchValue"] : "";

// 조건 검색 생성
$SearchText = " WHERE chkdel = 'N' ";
$str_url = "bm_sid=" . $tableNumber . "&SearchColumn=";

if ($SearchValue) {
    $SearchText .= " AND {$SearchColumn} LIKE '%{$SearchValue}%' ";
    $str_url .= "&SearchColumn={$SearchColumn}&SearchValue={$SearchValue}";
}



// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM volvo_hejklass_{$tableNumber} {$SearchText}";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT
		*
	FROM
		volvo_hejklass_{$tableNumber}
	{$SearchText}
	ORDER BY
		sid DESC
	LIMIT
		{$StartRow}, {$limit}
";

$rows=$db->fetch_array($query);
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#listMode").val('');

    $('#btn_delete').click(function(){
        if( $("input:checkbox[name='chk[]']:checked").length < 1 ) { alert("삭제할 이벤트들을 선택해주세요."); return false; }
        else{
            if(confirm('삭제하시겠습니까?')){ $("#listMode").val('delete'); $("#listForm").attr('action', 'chk_ok.php?page=<?=$page?>&<?=$str_url?>'); $("#listForm").submit(); }
            else{ return false; }
        }
    });

    $('#btn_excel').click(function(){
        location.href = "excel_make.php?<?=$str_url?>";
    });
});

// 체크박스 - 전체 선택 및 해제
function Action_Select_All(checked){
	$("input:checkbox[name='chk[]']").prop("checked", checked);
}


$(document).ready(function(){

	$('#btn_excel').click(function(){
		location.href = "excel_make.php?<?=$str_url?>";
	});
});

</script>

<article class="unit-area">
    <div class="clearfix left-float top-margin-20 bottom-margin-20">
		<button type="button" name="btn_excel" id="btn_excel" class="btn btn-gray med2 left-float left">엑셀파일 다운로드</button>
	</div>
    <div class="right-float top-margin-20 bottom-margin-20">
        <form method="post" name="searchForm" id="searchForm" action="./list.php?bm_sid=2">
            <select name="SearchColumn" id="SearchColumn" class="input left-float left">
                <option value="name" <?=$SearchColumn == "name" ? "selected" : ""?>>이름</option>
                <option value="hp" <?=$SearchColumn == "hp" ? "selected" : ""?>>전화번호</option>
            </select>		
            <input type="text" name="SearchValue" id="SearchValue" value="<?=$SearchValue?>" class="input half-col-half left-float left">
            <input type="submit" name="btn_search" id="btn_search" value="검색" class="btn btn-gray inline mini">
        </form>
    </div>

	<div class="clearfix">
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
            <colgroup>
                <col width="40px" />
                <col width="60px" />
                <col width="100px" />
                <col width="*" />
                <col width="*" />
                <col width="*" />
                <col width="100px" />
                <col width="100px" />
                <col width="100px" />
			</colgroup>
			<tbody>
				<tr>
                    <th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
					<th scope="col" class="vt-table-th">유저 코드</th>
					<th scope="col" class="vt-table-th">아이디</th>
					<th scope="col" class="vt-table-th">이름</th>
					<th scope="col" class="vt-table-th">휴대전화</th>
					<th scope="col" class="vt-table-th">모델</th>
					<th scope="col" class="vt-table-th">차량 번호</th>
					<th scope="col" class="vt-table-th">등록일자</th>
				</tr>
				<?
					$ListRow = 0;
					foreach($rows as $row) {
						$ListNum = $TotalCount - (($page - 1) * $limit + $ListRow);
				?>
				<tr>
                    <td class="vt-table-td center"><?if($row['member_id'] != "admin"){?><div class="check-wrap center"><input type="checkbox" name="chk[]" id="chk_<?=($ListRow+1)?>" value="<?=$row['sid']?>" /></div><?}?></td>
                    <td class="vt-table-td center"><?=$ListNum?></td>
					<td class="vt-table-td center"><?=$row['master_cust_cd']?></td>
					<td class="vt-table-td"><?=$row['member_id']?></td>
					<td class="vt-table-td center"><?=$row['name']?></td>
					<td class="vt-table-td center"><?=$row['hp']?></td>
					<td class="vt-table-td center"><?=$row['car_model']?></td>
					<td class="vt-table-td center"><?=$row['car_num']?></td>
					<td class="vt-table-td center"><?=$row['regdate']?></td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"11\">등록된 이벤트가 없습니다.</td></tr>";
					}
				?>
			</tbody>
		</table>
		</form>
	</div>

	<!--//paginate:S-->
	<?if($ListRow != 0){ echo msg_paging($page, $TotalCount, $str_url, $limit, $block); }?>
	<!--//paginate:E-->

	<div class="right-float">
		<button type="button" name="btn_delete" id="btn_delete" class="btn btn-border med left-float left">선택삭제</button>
	</div>
</article>

<?php
require_once "../inc/footer.html";
?>