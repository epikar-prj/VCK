<?php
$colspan = 7;
if( $view_tr_cate ){ $colspan = 8; }

// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM {$TABLE_INFO['bbs']} {$SearchText}";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT 
		`sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `url`, `hp`, `email`, `ip`, `viewcnt`, `notice`, `isclose`, `regdate`
	FROM 
		{$TABLE_INFO['bbs']}
	{$SearchText}
	ORDER BY 
		`notice` DESC, `grp` DESC, `odr` ASC, `regdate` DESC
	LIMIT 
		{$StartRow}, {$limit}
";

$rows=$db->fetch_array($query);
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#listMode").val('');

	$("#searchForm").submit(function(){ $("#listMode").val(''); return true; });

	<? if( $view_tr_cate ){ ?>
	$('#SearchCate').change(function(){
		$("#listMode").val('');
		var cate = $(this).val();
		$(location).attr('href', "<?=$return_url?>?bm_sid=<?=$bm_sid?>&SearchCate="+encodeURIComponent(cate));
	});
	<? } ?>

	$('#btn_write').click(function(){
		$(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=write');
	});

	$('#btn_sel_delete').click(function(){
		if( $("input:checkbox[name='chk[]']:checked").length < 1 ) { alert("삭제할 게시물을 선택해주세요."); return false; }
		else{
			if(confirm('선택한 게시물들을 삭제하시겠습니까?')){ $("#listMode").val('sel_delete'); $("#listForm").attr('action', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=delete&<?=$str_url2?>'); $("#listForm").submit(); }
			else{ return false; }
		}
	});
});

// 체크박스 - 전체 선택 및 해제
function Action_Select_All(checked){
	$("input:checkbox[name='chk[]']").prop("checked", checked);
}

// 수정
function Action_Update(sid) {
	location.href = "<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=update&sid="+sid+"&<?=$str_url2?>";
}

// 삭제
function Action_Delete(sid) {
	$("#listMode").val('');
	if(confirm('선택한 게시물을 삭제하시겠습니까?')){ location.href = "<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=delete&sid="+sid+"&<?=$str_url2?>"; }
}
</script>

<article class="unit-area">
	<div class="right-float">
		<form method="post" name="searchForm" id="searchForm" action="<?=$return_url?>?bm_sid=<?=$bm_sid?>">
		<?=($view_tr_cate) ? printSelectBox2($cate_info, 'SearchCate', $SearchCate, '', 'class="input left-float left"', ':: 전체 ::') : ""?>
		<?=printSelectBox2($search_info, 'SearchColumn', $SearchColumn, '', 'class="input left-float left"', '')?>
		<input type="text" name="SearchValue" id="SearchValue" value="<?=$SearchValue?>" class="input half-col-half left-float left" />
		<input type="submit" name="btn_search" id="btn_search" value="검색" class="btn btn-gray inline mini" />
		</form>
	</div>

	<div class="clearfix pt_15">
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
			<colgroup>
				<col width="50px" />
				<col width="60px" />
				<? if( $view_tr_cate ){ ?>
				<col width="100px" />
				<? } ?>
				<col width="*" />
				<col width="100px" />
				<? if ($bm_sid == 4) {?>
				<col width="200px" />
				<? } ?>
				<col width="100px" />
				<col width="80px" />
				<col width="167px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
					<? if( $view_tr_cate ){ ?>
					<th scope="col" class="vt-table-th">구분</th>
					<? } ?>
					<th scope="col" class="vt-table-th">제목</th>
					<th scope="col" class="vt-table-th">등록자</th>
					<? if ($bm_sid == 4) {?>
					<th scope="col" class="vt-table-th">이메일</th>
					<? } ?>
					<th scope="col" class="vt-table-th">등록일</th>
					<th scope="col" class="vt-table-th">조회</th>
					<th scope="col" class="vt-table-th">관리</th>
				</tr>
				<?
					$ListRow = 0; $link_view = "";
					foreach($rows as $row) {
						$ListNum = $TotalCount - (($page - 1) * $limit + $ListRow);
						$ccnt = printTableOneValue($TABLE_INFO['bbs_comment'], '', 'count(*)', "bm_sid='{$bm_sid}' AND bbs_sid='{$row['sid']}'", '');
/*
						// 상세내용 보기 권한 체크
						$link_view = "{$return_url}?bm_sid={$bm_sid}&mode=view&sid={$row['sid']}&{$str_url2}";
						if( isAdminLogined() || ($_COOKIE['member_sid'] == $row['member_sid'] && $row['member_sid']) ){
							$link_view = "{$return_url}?bm_sid={$bm_sid}&mode=view&sid={$row['sid']}&{$str_url2}";
						}else if( (!isAdminLogined()) && $row['isclose'] == "N" ){
							$link_view = "{$return_url}?bm_sid={$bm_sid}&mode=password&action=view&sid={$row['sid']}&{$str_url2}";
						}
*/
				?>
				<tr>
					<td class="vt-table-td center"><div class="check-wrap center"><input type="checkbox" name="chk[]" id="chk_<?=($ListRow+1)?>" value="<?=$row['sid']?>" /></div></td>
					<td class="vt-table-td center"><?=($row['notice'] == "Y") ? "공지" : $ListNum?></td>
					<? if( $view_tr_cate ){ ?>
					<td class="vt-table-td center"><?=$row['category']?></td>
					<? } ?>
					<td class="vt-table-td">
						<?=($row['isclose'] == "N") ? "<img src=\"{$IMAGE}/lock.png\" class=\"left-float left\" />" : ""?>
						<?=( trim($link_view) ) ? "<a href=\"{$link_view}\">" : ""?>
						<?=($bbs_info['titlecut'] > 0)? MgHanCutString(MgStringView2($row['title']), 150, true) : MgStringView2($row['title'])?>
						<?=( trim($link_view) ) ? "</a>" : ""?>
						<?=($ccnt > 0) ? "<span class=\"ccnt\">[" . $ccnt . "]</span>" : ""?>
					</td>
					<td class="vt-table-td center"><?=$row['name']?></td>
					<? if ($bm_sid == 4) {?>
					<td class="vt-table-td center"><?=$row['email']?></td>
					<? } ?>
					<td class="vt-table-td center"><?=$row['regdate']?></td>
					<td class="vt-table-td center"><?=number_format($row['viewcnt'])?></td>
					<td class="vt-table-td center">
						<button type="button" onclick="Action_Update('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">수정</button>
						<button type="button" onclick="Action_Delete('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">삭제</button>
					</td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"$colspan\">등록된 게시물이 없습니다.</td></tr>";
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
		<button type="button" name="btn_sel_delete" id="btn_sel_delete" class="btn btn-border med left-float left">선택삭제</button>
		<button type="button" name="btn_write" id="btn_write" class="btn btn-dark med left-float">등록하기</button>
	</div>
</article>