<?php
$sid = MgRequestCheck(trim($_REQUEST['sid']), 11, true, true);
$action = MgRequestCheck(trim($_REQUEST['action']), 50, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "수정하실 게시물을 선택하세요.", "", "back"); exit; }
if(!$action) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.3", "", "back"); exit; }

// 자료 검색
$query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `ishtml`, `content`, `url`, `hp`, `email`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
$row=$db->row($query);

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 게시물입니다.", "", "back"); exit; }
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn_list').click(function(){ $(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&<?=$str_url2?>'); });

	$("#passForm").submit(function(){
		if(!$("#pw").val()){ alert('비밀번호를 등록해 주세요.'); $("#pw").focus(); return false; }

		<? if($action == "delete"){ ?>
		if(confirm('해당 게시물을 삭제하시겠습니까?')){ return true; }
		else{ return false; }
		<? } ?>
	});
});
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="passForm" id="passForm" action="<?=$_SERVER['PHP_SELF']?>?bm_sid=<?=$bm_sid?>&mode=password_ok">
	<input type="hidden" name="SearchCate" id="SearchCate" value="<?=$encode_cate?>" />
	<input type="hidden" name="SearchColumn" id="SearchColumn" value="<?=$SearchColumn?>" />
	<input type="hidden" name="SearchValue" id="SearchValue" value="<?=$encode_value?>" />
	<input type="hidden" name="page" id="page" value="<?=$page?>" />

	<input type="hidden" name="sid" id="sid" value="<?=$sid?>" />
	<input type="hidden" name="action" id="action" value="<?=$action?>" />
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">비밀번호 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="password" name="pw" id="pw" maxlength="20" class="input half-col-half" /></td>
			</tr>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_confirm" id="btn_confirm" value="확인" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>