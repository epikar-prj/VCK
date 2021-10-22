<?php
require_once "../inc/header.html";

// Request 값
$SearchGubun = MgRequestCheck(trim($_REQUEST['SearchGubun']), 50, true, true);
$SearchStatus = MgRequestCheck(trim($_REQUEST['SearchStatus']), 1, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true); $encode_value = urlencode($SearchValue);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchGubun={$SearchGubun}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

$sid = MgRequestCheck($_REQUEST['sid'], 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "수정하실 게시판을 선택하세요.", "", "back"); exit; }

// 자료 검색
$query = "SELECT `sid`, `gubun`, `title`, `top_content`, `bot_content`, `titlecut`, `limit`, `block`, `iscate`, `category`, `isthum`, `iscomment`, `status`, `chkdel`, `regdate` FROM {$TABLE_INFO['bbs_manage']} WHERE sid='{$sid}'";
$row=$db->row($query);

// 등록여부 체크
if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 게시판입니다.", "", "back"); exit; }
?>
<script type="text/javascript">
	function Action_Gubun_Click(val){
		if(val == "faq"){ $("#tr_com").hide(); }
		else{ $("#tr_com").show(); }
	}

	function Action_Form_Check() {
		if( $("input:radio[name='gubun']:checked").length < 1 ) { alert("게시판 형태를 선택해주세요."); $("#gubun_1").focus(); return false; }
		if(!$("#title").val()){ alert("게시판명을 입력해주세요."); $("#title").focus(); return false; }
		if(!$("#titlecut").val()){ alert("목록 글자수를 입력해주세요."); $("#titlecut").focus(); return false; }
		if(!$("#limit").val()){ alert("줄수를 입력해주세요."); $("#limit").focus(); return false; }
		if(!$("#block").val()){ alert("페이지수를 입력해주세요."); $("#block").focus(); return false; }

		if(confirm('해당 내용으로 수정하시겠습니까?')){ return true; }
		else{ return false; }
	}
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="updateForm" id="updateForm" action="update_ok.php" onSubmit="return Action_Form_Check();">
	<input type="hidden" name="SearchGubun" id="SearchGubun" value="<?=$SearchGubun?>" />
	<input type="hidden" name="SearchStatus" id="SearchStatus" value="<?=$SearchStatus?>" />
	<input type="hidden" name="SearchColumn" id="SearchColumn" value="<?=$SearchColumn?>" />
	<input type="hidden" name="SearchValue" id="SearchValue" value="<?=$encode_value?>" />
	<input type="hidden" name="page" id="page" value="<?=$page?>" />

	<input type="hidden" name="sid" id="sid" value="<?=$sid?>" />
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">게시판 형태 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['bbs_gubun'], 'gubun', $row['gubun'], '', "onclick=\"Action_Gubun_Click(this.value)\"", false, 5)?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">게시판명 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="title" id="title" value="<?=$row['title']?>" maxlength="120" class="input full" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">상단내용</th>
				<td class="hr-table-td tall"><textarea name="top_content" id="top_content" cols="74" rows="8" class="textarea full"><?=$row['top_content']?></textarea></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">하단내용</th>
				<td class="hr-table-td tall"><textarea name="bot_content" id="bot_content" cols="74" rows="8" class="textarea full"><?=$row['bot_content']?></textarea></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">목록 글자수 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="titlecut" id="titlecut" value="<?=$row['titlecut']?>" maxlength="3" class="input mini left-float" /><div class="left-float right"><div class="text-only">자</div></div></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">줄수 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="limit" id="limit" value="<?=$row['limit']?>" maxlength="2" class="input mini left-float" /><div class="left-float right"><div class="text-only">줄</div></div></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">페이지수 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="block" id="block" value="<?=$row['block']?>" maxlength="2" class="input mini left-float" /><div class="left-float right"><div class="text-only">페이지</div></div></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">카테고리 사용</th>
				<td class="hr-table-td tall">
					<div class="left-float top-margin left">사용여부 : </div>
					<div class="top-margin-5"><?=printRadioBox_Div($OPTION_INFO['use'], 'iscate', $row['iscate'], '', '', count($OPTION_INFO['use']), false)?></div>
					<div class="top-margin"></div>
					<div class="left-float top-margin-7 left">카테고리 : </div>
					<input type="text" name="category" id="category" value="<?=$row['category']?>" class="input half-col-half left-float" />
					<div class="left-float right"><div class="text-only em">※ 바(|)로 공백없이 구분하여 입력해주세요. ex) PHP|ASP|JSP</div></div>
				</td>
			</tr>
			<tr id="tr_com" style="display:">
				<th scope="row" class="hr-table-th">썸네일 이미지 첨부 사용</th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['use'], 'isthum', $row['isthum'], '', '', false, 5)?></td>
			</tr>
			<tr id="tr_com" style="display:<?=($row['gubun'] == "faq") ? "none" : ""?>">
				<th scope="row" class="hr-table-th">댓글 사용</th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['use'], 'iscomment', $row['iscomment'], '', '', false, 5)?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">상태 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['status'], 'status', $row['status'], '', '', false, 8)?></td>
			</tr>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_update" id="btn_update" value="수정" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" onclick="location.href='list.php<?=$str_url?>'" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>
<?php
require_once "../inc/footer.html";
?>