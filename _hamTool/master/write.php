<?php
require_once "../inc/header.html";
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_checkid").click(function(){
			$("#chk_id").val("");
			var selVal = trim($("#id").val());

			if(selVal != ''){
				if(!Action_CheckId($("#id").val())){ alert('아이디는 영문 4~20자 이내로 입력해주세요.'); $("#id").focus(); return false; }

				$.ajax({
					type: "POST",
					url: "checkid.php",
					data: "val="+selVal,
					//contentType: "application/json; charset=utf-8",
					//dataType: "xml",
					success: function (data) {
						if(data == "Y"){ alert("이미 사용 중인 아이디입니다."); $("#chk_id").val(""); $("#id").val(""); $("#id").focus(); }
						else{ alert("사용 가능한 아이디 입니다."); $("#chk_id").val("Y"); $("#name").focus(); }
					},
					failure: function (data) { alert("데이터가 없습니다."); }
				});
			}else{ alert("아이디를 입력해주세요."); $("#id").focus(); }
		});
	});

	function Action_Chg_Email(val){
		$("#email_domain").val(val);
	}

	function Action_Form_Check() {
		if(!$("#id").val()){ alert("아이디를 입력해주세요."); $("#id").focus(); return false; }
		if(!Action_CheckId($("#id").val())){ alert('아이디는 영문 4~20자 이내로 입력해주세요.'); $("#id").focus(); return false; }
		if(!$("#chk_id").val()){ alert("아이디 정보 입력 후 중복확인을 실행해주세요."); $("#chk_id").focus(); return false; }
		if(!$("#name").val()){ alert("이름을 입력해주세요."); $("#name").focus(); return false; }
		if(!$("#pw").val()){ alert("비밀번호를 입력해주세요."); $("#pw").focus(); return false; }
		if(!$("#cpw").val()){ alert("비밀번호 확인을 입력해주세요."); $("#cpw").focus(); return false; }
		if(!Action_CheckPw($("#pw").val())){ alert('비밀번호는 영문, 숫자를 포함하여 6~20자 이내로 입력해주세요.'); $("#pw").focus(); return false; }
		if($("#pw").val() != $("#cpw").val()){ alert('비밀번호와 비밀번호 확인 정보가 일치하지 않습니다.'); $("#pw").focus(); return false; }

		if(!$("#email_id").val()){ alert("이메일(아이디)을 입력해주세요."); $("#email_id").focus(); return false; }
		if(!$("#email_domain").val()){ alert("이메일(도메인)을 입력해주세요."); $("#email_domain").focus(); return false; }

		if(confirm('해당 내용으로 등록하시겠습니까?')){ return true; }
		else{ return false; }
	}
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="writeForm" action="write_ok.php" onSubmit="return Action_Form_Check();">
	<input type="hidden" name="chk_id" id="chk_id" value="" />
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">아이디 <span class="em">*</span></th>
				<td class="hr-table-td">
					<input type="text" name="id" id="id" maxlength="20" class="input half-col-half left-float left" />
					<button type="button" name="btn_checkid" id="btn_checkid" class="btn btn-tiny-gray inline left-float top-margin-5">중복확인</button>
					<div class="left-float right"><div class="text-only em">※ 영문자 4~20자리로 등록</div></div>
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이름 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="name" id="name" maxlength="20" class="input half-col-half" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">비밀번호 <span class="em">*</span></th>
				<td class="hr-table-td">
					<input type="password" name="pw" id="pw" maxlength="20" class="input half-col-half left-float" />
					<div class="left-float right"><div class="text-only em">※ 영문자, 숫자를 포함하여 6~20자리로 등록</div></div>
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">비밀번호 확인 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="password" name="cpw" id="cpw" maxlength="20" class="input half-col-half" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이메일 <span class="em">*</span></th>
				<td class="hr-table-td">
					<input type="text" name="email_id" id="email_id" maxlength="120" class="input half-col-half left-float left" /><div class="left-float top-margin-7"> @ </div>
					<input type="text" name="email_domain" id="email_domain" maxlength="120" class="input half-col-half left-float right" />
					<?=printSelectBox2($OPTION_INFO['email'], 'email_kind', '', '', 'onchange="Action_Chg_Email(this.value)" class="select left-float right"', "직접입력")?>
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">연락처</th>
				<td class="hr-table-td">
					<?=printSelectBox2($OPTION_INFO['hptel'], 'tel1', '', '', 'class="select left-float left"', '선택')?><div class="left-float top-margin-7"> - </div>
					<input type="text" name="tel2" id="tel2" maxlength="4" onkeypress="onlyNumber2(this);" onblur="onlyNumber2(this);" style="ime-mode:disabled;" class="input mini left-float right" /><div class="left-float top-margin-7 right"> - </div>
					<input type="text" name="tel3" id="tel3" maxlength="4" onkeypress="onlyNumber2(this);" onblur="onlyNumber2(this);" style="ime-mode:disabled;" class="input mini left-float right" />
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">전시장</th>
				<td class="hr-table-td"><?=printSelectBox2($VOLVO_INFO['center'], 'vcenter', '', '', 'class="select"', "선택")?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">등급 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['mlevel'], 'level', 'A', 'U', '', count($OPTION_INFO['mlevel']), false)?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">상태 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['status'], 'status', 'N', '', '', count($OPTION_INFO['status']), false)?></td>
			</tr>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_write" id="btn_write" value="등록" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" onclick="location.href='list.php<?=$str_url?>'" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>

<?php
require_once "../inc/footer.html";
?>