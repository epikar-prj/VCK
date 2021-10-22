<?php
require_once "../inc/header.html";
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

		if(confirm('해당 내용으로 등록하시겠습니까?')){ return true; }
		else{ return false; }
	}
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="writeForm" id="writeForm" action="write_ok.php" onSubmit="return Action_Form_Check();">
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">게시판 형태 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['bbs_gubun'], 'gubun', 'BOARD', '', "onclick=\"Action_Gubun_Click(this.value)\"", count($OPTION_INFO['bbs_gubun']), false)?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">게시판명 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="title" id="title" maxlength="120" class="input full" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">상단내용</th>
				<td class="hr-table-td tall"><textarea name="top_content" id="top_content" cols="74" rows="8" class="textarea full"></textarea></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">하단내용</th>
				<td class="hr-table-td tall"><textarea name="bot_content" id="bot_content" cols="74" rows="8" class="textarea full"></textarea></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">목록 글자수 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="titlecut" id="titlecut" value="40" maxlength="3" class="input mini left-float" /><div class="left-float right"><div class="text-only">자</div></div></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">줄수 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="limit" id="limit" value="20" maxlength="2" class="input mini left-float" /><div class="left-float right"><div class="text-only">줄</div></div></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">페이지수 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="block" id="block" value="10" maxlength="2" class="input mini left-float" /><div class="left-float right"><div class="text-only">페이지</div></div></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">카테고리 사용</th>
				<td class="hr-table-td tall">
					<div class="left-float top-margin left">사용여부 : </div>
					<div class="top-margin-5"><?=printRadioBox_Div($OPTION_INFO['use'], 'iscate', 'N', '', '', count($OPTION_INFO['use']), false)?></div>
					<div class="top-margin"></div>
					<div class="left-float top-margin-7 left">카테고리 : </div>
					<input type="text" name="category" id="category" class="input half-col-half left-float" />
					<div class="left-float right"><div class="text-only em">※ 바(|)로 공백없이 구분하여 입력해주세요. ex) PHP|ASP|JSP</div></div>
				</td>
			</tr>
			<tr id="tr_com" style="display:">
				<th scope="row" class="hr-table-th">썸네일 이미지 첨부 사용</th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['use'], 'isthum', 'N', '', '', count($OPTION_INFO['use']), false)?></td>
			</tr>
			<tr id="tr_com" style="display:">
				<th scope="row" class="hr-table-th">댓글 사용</th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['use'], 'iscomment', 'N', '', '', count($OPTION_INFO['use']), false)?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">상태 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['status'], 'status', 'N', '', '', count($OPTION_INFO['status']), false)?></td>
			</tr>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_write" id="btn_write" value="등록" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" onclick="location.href='list.php'" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>
<?php
require_once "../inc/footer.html";
?>