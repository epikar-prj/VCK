<?php
require_once "../inc/header.html";


// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 20;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;

$SEARCH_INFO['apply'] = array("receive_nm"=>"이름");

// 조건 검색 생성
$SearchText = "WHERE chkdel = 'N' ";

$SearchCarModel = MgRequestCheck(trim($_REQUEST['SearchCarModel']), 2, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);

if($SearchCarModel) { $SearchText .= "AND `car_model` = '{$SearchCarModel}' "; }
if($SearchColumn && $SearchValue) {
	$SearchText .= "AND {$SearchColumn} LIKE '%{$SearchValue}%' ";
	$encode_value = urlencode($SearchValue);
} else {
	$SearchColumn = ""; $SearchValue  = ""; $encode_value = "";
}

$str_url = "SearchCarModel={$SearchCarModel}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM volvo_wating_cust {$SearchText}";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT
		sid, id, receive_nm, receive_hp, receive_zip, receive_addr1, receive_addr2, is_received, reg_date, rec_date
	FROM
        volvo_wating_cust
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
		if( $("input:checkbox[name='chk[]']:checked").length < 1 ) { alert("삭제할 신청자들을 선택해주세요."); return false; }
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

function Action_View(sid) {
	location.href = "view.php?sid="+sid+"&page=<?=$page?>&<?=$str_url?>";
}
</script>

<article class="unit-area">
	<div class="clearfix">
		<form method="post" name="searchForm" action="<?=$return_url?>">
		<table class="table4 vt-table bottom-margin">
			<colgroup>
				<col width="130px" /><col width="444px" /><col width="130px" /><col width="444px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th2">명칭</th>
					<td class="vt-table-td2">대기 고객 기프트 신청</td>
					<th scope="col" class="vt-table-th2">검색</th>
					<td class="vt-table-td2">
						<?=printSelectBox2($SEARCH_INFO['apply'], 'SearchColumn', $SearchColumn, '', 'class="input left-float left"', '')?>
						<input type="text" name="SearchValue" id="SearchValue" value="<?=$SearchValue?>" class="input half-col-half left-float" />
					</td>
				</tr>
				<tr>
					<td class="vt-table-td2 center" colspan="4"><input type="submit" name="btn_search" id="btn_search" value="검색" class="btn btn-gray inline med" /></td>
				</tr>
			</tbody>
		</table>
		</form>
	</div>

	<div class="clearfix right-float top-margin-20 bottom-margin-20">
		<button type="button" name="btn_excel" id="btn_excel" class="btn btn-gray med2 left-float left">엑셀파일 다운로드</button>
	</div>

	<div class="clearfix">
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
			<colgroup>
				<col width="50px" />
                <col width="50px" />
				<col width="100px" />
                <col width="100px" />
                <col width="100px" />
                <col width="*" />
                <col width="80px" />
                <col width="80px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
                    <th scope="col" class="vt-table-th">아이디</th>
					<th scope="col" class="vt-table-th">수령인</th>
					<th scope="col" class="vt-table-th">수령인 연락처</th>
					<th scope="col" class="vt-table-th">주소</th>
					<th scope="col" class="vt-table-th">수령</th>
					<th scope="col" class="vt-table-th">접수일</th>
					<th scope="col" class="vt-table-th">상세내용보기</th>
				</tr>
				<?
					$ListRow = 0;
					foreach($rows as $row) {
						$ListNum = $TotalCount - (($page - 1) * $limit + $ListRow);
                        $addr = "({$row['receive_zip']}) {$row['receive_addr1']}";
                        
                        if ($row['receive_addr2']) {
                            $addr .= "<br>{$row['receive_addr2']}";
                        }

                        $tel1 = add_hyphen($row['hp']);
                        $tel2 = add_hyphen($row['receive_hp']);
				?>
				<tr>
					<td class="vt-table-td center"><?if($row['id'] != "admin"){?><div class="check-wrap center"><input type="checkbox" name="chk[]" id="chk_<?=($ListRow+1)?>" value="<?=$row['sid']?>" /></div><?}?></td>
					<td class="vt-table-td center"><?=$ListNum?></td>
					<td class="vt-table-td center"><?=$row['id']?></td>
					<td class="vt-table-td center"><?=$row['receive_nm']?></td>
					<td class="vt-table-td center"><?=$tel2?></td>
					<td class="vt-table-td center"><?=$addr?></td>
					<td class="vt-table-td center"><?=$row['is_received'] == 'Y' ?  substr($row['rec_date'], 0, 10) : "-"?></td>
					<td class="vt-table-td center"><?=($row['reg_date']) ? substr($row['reg_date'], 0, 10) : "-"?></td>
                    <td class="vt-table-td center">
						<button type="button" onclick="Action_View('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">보기</button>
					</td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"9\">등록된 신청자가 없습니다.</td></tr>";
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
		<button type="button" name="btn_delete" id="btn_delete" class="btn btn-border med left-float left">삭제</button>
	</div>
</article>

<?php
require_once "../inc/footer.html";
?>