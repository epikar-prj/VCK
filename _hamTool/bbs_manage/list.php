<?php
require_once "../inc/header.html";

// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 20;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;

// 조건 검색 생성
$SearchText = "WHERE chkdel= 'N' ";

$SearchGubun = MgRequestCheck(trim($_REQUEST['SearchGubun']), 50, true, true);
$SearchStatus = MgRequestCheck(trim($_REQUEST['SearchStatus']), 1, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true);
if($SearchGubun) { $SearchText .= "AND `gubun` = '{$SearchGubun}' "; }
if($SearchStatus) { $SearchText .= "AND `status` = '{$SearchStatus}' "; }
if($SearchColumn && $SearchValue) {
	$SearchText .= "AND {$SearchColumn} LIKE '%{$SearchValue}%' ";
	$encode_value = urlencode($SearchValue);
} else {
	$SearchColumn = ""; $SearchValue  = ""; $encode_value = "";
}

$str_url = "SearchGubun={$SearchGubun}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM {$TABLE_INFO['bbs_manage']} {$SearchText}";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT
		`sid`, `gubun`, `title`, `status`, `regdate`
	FROM
		{$TABLE_INFO['bbs_manage']}
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

	$('#btn_search').click(function(){ $("#listMode").val(''); return true; });

	$('#btn_statusok').click(function(){
		if( $("input:checkbox[name='chk[]']:checked").length < 1 ) { alert("상태를 활성으로 적용할 게시판을 선택해주세요."); return false; }
		else{
			if(confirm('선택한 게시판들을 활성으로 적용하시겠습니까?')){ $("#listMode").val('statusok'); $("#listForm").attr('action', 'chk_ok.php?page=<?=$page?>&<?=$str_url?>'); $("#listForm").submit(); }
			else{ return false; }
		}
	});

	$('#btn_statuscan').click(function(){
		if( $("input:checkbox[name='chk[]']:checked").length < 1 ) { alert("상태를 비활성으로 적용할 게시판을 선택해주세요."); return false; }
		else{
			if(confirm('선택한 게시판들을 비활성으로 적용하시겠습니까?')){ $("#listMode").val('statuscan'); $("#listForm").attr('action', 'chk_ok.php?page=<?=$page?>&<?=$str_url?>'); $("#listForm").submit(); }
			else{ return false; }
		}
	});

	$('#btn_delete').click(function(){
		if( $("input:checkbox[name='chk[]']:checked").length < 1 ) { alert("삭제할 게시판을 선택해주세요."); return false; }
		else{
			if(confirm('선택한 게시판들을 삭제하시겠습니까?')){ $("#listMode").val('delete'); $("#listForm").attr('action', 'chk_ok.php?page=<?=$page?>&<?=$str_url?>'); $("#listForm").submit(); }
			else{ return false; }
		}
	});
});

// 체크박스 - 전체 선택 및 해제
function Action_Select_All(checked){
	$("input:checkbox[name='chk[]']").prop("checked", checked);
}

function Action_BBS_Go(sid) {
	window.open("<?=$SITE_INFO['http_host']?>/bbs/?bm_sid="+sid, "_blank");
}

function Action_Update(sid) {
	location.href = "update.php?sid="+sid+"&page=<?=$page?>&<?=$str_url?>";
}

function Action_Copy(sid) {
	if(confirm('선택한 게시판을 복사하시겠습니까?')){ location.href = "copy.php?sid="+sid+"&page=<?=$page?>&<?=$str_url?>"; }
}
</script>

<article class="unit-area">
	<div class="right-float">
		<form method="post" name="searchForm" id="searchForm" action="<?=$return_url?>">
		<?=printSelectBox2($OPTION_INFO['bbs_gubun'], 'SearchGubun', $SearchGubun, '', 'class="input left-float left"', '형태')?>
		<?=printSelectBox2($OPTION_INFO['status'], 'SearchStatus', $SearchStatus, '', 'class="input left-float left"', '상태')?>
		<?=printSelectBox2($SEARCH_INFO['bbs_manage'], 'SearchColumn', $SearchColumn, '', 'class="input left-float left"', '')?>
		<input type="text" name="SearchValue" id="SearchValue" value="<?=$SearchValue?>" class="input half-col-half left-float left" />
		<input type="submit" name="btn_search" id="btn_search" value="검색" class="btn btn-gray inline mini" />
		</form>
	</div>

	<div class="clearfix pt_15">
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
			<colgroup>
				<col width="50px" /><col width="60px" /><col width="*" /><col width="130px" /><col width="100px" /><col width="170px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
					<th scope="col" class="vt-table-th">게시판명</th>
					<th scope="col" class="vt-table-th">형태</th>
					<th scope="col" class="vt-table-th">상태</th>
					<th scope="col" class="vt-table-th">관리</th>
				</tr>
				<?
					$ListRow = 0;
					foreach($rows as $row) {
						$ListNum = $TotalCount - (($page - 1) * $limit + $ListRow);
				?>
				<tr>
					<td class="vt-table-td center"><div class="check-wrap center"><input type="checkbox" name="chk[]" id="chk_<?=($ListRow+1)?>" value="<?=$row['sid']?>" /></div></td>
					<td class="vt-table-td center"><?=$ListNum?></td>
					<td class="vt-table-td"><?=$row['title']?></td>
					<td class="vt-table-td center"><?=$OPTION_INFO['bbs_gubun'][$row['gubun']]?></td>
					<td class="vt-table-td center"><?=$OPTION_INFO['status'][$row['status']]?></td>
					<td class="vt-table-td center">
						<? if($row['status'] == "Y"){ ?><!--<button type="button" onclick="Action_BBS_Go('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">바로가기</button>--><? } ?>
						<button type="button" onclick="Action_Update('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">수정</button>
						<button type="button" onclick="Action_Copy('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">복사</button>
					</td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"6\">등록된 게시판이 없습니다.</td></tr>";
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
		<button type="button" name="btn_statusok" id="btn_statusok" class="btn btn-border med left-float left">활성적용</button>
		<button type="button" name="btn_statuscan" id="btn_statuscan" class="btn btn-border med left-float left">비활성적용</button>
		<button type="button" name="btn_delete" id="btn_delete" class="btn btn-border med left-float left">삭제</button>
		<button type="button" name="btn_write" id="btn_write" onclick="location.href='write.php'" class="btn btn-dark med left-float">등록하기</button>
	</div>
</article>
<?php
require_once "../inc/footer.html";
?>