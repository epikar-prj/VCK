<?php
require_once "../inc/header.html";

// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 20;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;

// 조건 검색 생성
$SearchText = "WHERE chkdel= 'N' ";

$SearchCarModel = MgRequestCheck(trim($_REQUEST['SearchCarModel']), 10, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);

if($SearchCarModel) { $SearchText .= "AND `model` = '{$SearchCarModel}' "; }
if($SearchColumn && $SearchValue) {
	$SearchText .= "AND {$SearchColumn} LIKE '%{$SearchValue}%' ";
	$encode_value = urlencode($SearchValue);
} else {
	$SearchColumn = ""; $SearchValue  = ""; $encode_value = "";
}

$str_url = "SearchCarModel={$SearchCarModel}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM volvo_testdrive_apply {$SearchText}";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT
		`sid`, `site_type`, `name`, `hp`, `gender`, `birth`, `email`, `showroom`, `model`, `buy_check`, `success`, `regdate`
	FROM
		volvo_testdrive_apply
	{$SearchText}
	ORDER BY
		regdate DESC
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
					<th scope="col" class="vt-table-th2">시승 모델</th>
					<td class="vt-table-td2"><?=printSelectBox2($VOLVO_INFO['car_model'], 'SearchCarModel', $SearchCarModel, '', 'class="input"', ':: 선택하세요 ::')?></td>
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
				<col width="40px" />
                <col width="40px" />
                <col width="80px" />
                <col width="100px" />
                <col width="120px" />
				<col width="30px" />
                <col width="90px" />
                <col width="*" />
                <col width="130px" />
				<col width="80px" />
				<col width="100px" />
				<col width="80px" />
				<col width="120px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
					<th scope="col" class="vt-table-th">이름</th>
					<th scope="col" class="vt-table-th">휴대폰</th>
					<th scope="col" class="vt-table-th">이메일</th>
					<th scope="col" class="vt-table-th">성별</th>
					<th scope="col" class="vt-table-th">생년월일</th>
					<th scope="col" class="vt-table-th">시승모델</th>
					<th scope="col" class="vt-table-th">신청전시장</th>
					<th scope="col" class="vt-table-th">구매의향</th>
					<th scope="col" class="vt-table-th">접수날짜</th>
					<th scope="col" class="vt-table-th">callback</th>
					<th scope="col" class="vt-table-th">상세내용보기</th>
				</tr>
				<?
					$ListRow = 0;
					foreach($rows as $row) {
						$ListNum = $TotalCount - (($page - 1) * $limit + $ListRow);
				?>
				<tr>
					<td class="vt-table-td center"><?if($row['id'] != "admin"){?><div class="check-wrap center"><input type="checkbox" name="chk[]" id="chk_<?=($ListRow+1)?>" value="<?=$row['sid']?>" /></div><?}?></td>
					<td class="vt-table-td center"><?=$ListNum?></td>
					<td class="vt-table-td center"><?=$row['name']?></td>
					<td class="vt-table-td center"><?=$row['hp']?></td>
					<td class="vt-table-td center"><?=$row['email']?></td>
					<td class="vt-table-td center"><?=$OPTION_INFO['sex'][$row['gender']]?></td>
					<td class="vt-table-td center"><?=$row['birth']?></td>
					<td class="vt-table-td center"><?=$VOLVO_INFO['car_model'][$row['model']]?></td>
					<td class="vt-table-td center"><?=$VOLVO_INFO['showroom'][$row['showroom']]?></td>
					<td class="vt-table-td center"><?=$OPTION_INFO['buy_check'][$row['buy_check']]?></td>
					<td class="vt-table-td center"><?=($row['regdate']) ? substr($row['regdate'], 0, 10) : ""?></td></td>
					<td class="vt-table-td center"><?=$row['success']?></td>
					<td class="vt-table-td center">
						<button type="button" onclick="Action_View('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">보기</button>
					</td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"13\">등록된 신청자가 없습니다.</td></tr>";
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