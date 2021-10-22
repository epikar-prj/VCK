<?php
require_once "../inc/header.html";

// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 20;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;



// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM volvo_push ";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT
		*
	FROM
		volvo_push
	ORDER BY
		regdate DESC
	LIMIT
		{$StartRow}, {$limit}
";

$rows=$db->query($query);
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
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
			<colgroup>
				<col width="40px" />
                <col width="40px" />
                <col width="*" />
                <col width="100px" />
                <col width="120px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
					<th scope="col" class="vt-table-th">메시지</th>
					<th scope="col" class="vt-table-th">접수날짜</th>
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
					<td class="vt-table-td center"><?=$row['content']?></td>
					<td class="vt-table-td center"><?=($row['regdate']) ? substr($row['regdate'], 0, 10) : ""?></td></td>
					<td class="vt-table-td center">
						<button type="button" onclick="Action_View('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">보기</button>
					</td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"12\">보낸 푸시메시지가 없습니다.</td></tr>";
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
        <button type="button" name="btn_write" id="btn_write" onclick="location.href='write.php'" class="btn btn-dark med left-float">등록하기</button>
	</div>
</article>

<?php
require_once "../inc/footer.html";
?>