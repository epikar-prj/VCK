<?php
require_once "../inc/header.html";

// Request 값
$SearchLevel = MgRequestCheck(trim($_REQUEST['SearchLevel']), 1, true, true);
$SearchStatus = MgRequestCheck(trim($_REQUEST['SearchStatus']), 1, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true); $encode_value = urlencode($SearchValue);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchLevel={$SearchLevel}&SearchStatus={$SearchStatus}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

$sid = MgRequestCheck($_REQUEST['sid'], 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "수정하실 운영자를 선택하세요.", "", "back"); exit; }

// 자료 검색
$query = "SELECT `sid`, `id`, `name`, `pw`, `email`, `tel`, `lvl`, `vcenter`, `status`, `chkdel` FROM {$TABLE_INFO['master']} WHERE sid='{$sid}'";
$row=$db->row($query);

// 등록여부 체크
if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 운영자입니다.", "", "back"); exit; }

// 이메일
if($row['email']){
	$email = explode("@", $row['email']);
}else{
	$email[0] = ""; $email[1] = "";
}

// 전화번호
if($row['tel']){
	$tel = explode("-", $row['tel']);
}else{
	$tel[0] = ""; $tel[1] = ""; $tel[2] = "";
}
?>
<script type="text/javascript">
	function Action_Chg_Email(val){
		$("#email_domain").val(val);
	}

	function Action_Form_Check() {
		if(!$("#name").val()){ alert("이름을 입력해주세요."); $("#name").focus(); return false; }
		
        if(!$("#pw").val()){alert('현재 비밀번호를 입력해주세요.'); $("#pw").focus(); return false; }

        if($("#pw_new").val()){
			if(!$("#cpw_new").val()){ alert('비밀번호 확인을 입력해주세요.'); $("#cpw_new").focus(); return false; }
			if(!Action_CheckPw($("#pw_new").val())){ alert('비밀번호는 영문, 숫자를 포함하여 6~20자 이내로 입력해주세요.'); $("#pw_new").focus(); return false; }
			if($("#pw_new").val() != $("#cpw_new").val()){ alert('비밀번호와 비밀번호 확인 정보가 일치하지 않습니다.'); $("#pw_new").focus(); return false; }
		}

		if(!$("#email_id").val()){ alert("이메일(아이디)을 입력해주세요."); $("#email_id").focus(); return false; }
		if(!$("#email_domain").val()){ alert("이메일(도메인)을 입력해주세요."); $("#email_domain").focus(); return false; }

		if(confirm('해당 내용으로 수정하시겠습니까?')){ return true; }
		else{ return false; }
	}
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="updateForm" id="updateForm" action="update_ok.php" onSubmit="return Action_Form_Check();">
	<input type="hidden" name="SearchLevel" id="SearchLevel" value="<?=$SearchLevel?>" />
	<input type="hidden" name="SearchStatus" id="SearchStatus" value="<?=$SearchStatus?>" />
	<input type="hidden" name="SearchColumn" id="SearchColumn" value="<?=$SearchColumn?>" />
	<input type="hidden" name="SearchValue" id="SearchValue" value="<?=$encode_value?>" />
	<input type="hidden" name="page" id="page" value="<?=$page?>" />
	<input type="hidden" name="token" id="token" value="<?=getToken()?>" />

	<input type="hidden" name="sid" id="sid" value="<?=$sid?>" />
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">아이디 <span class="em">*</span></th>
				<td class="hr-table-td"><?=$row['id']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이름 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="name" id="name" value="<?=$row['name']?>" maxlength="20" class="input half-col-half" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">현재 비밀번호 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="password" name="pw" id="pw" maxlength="20" class="input half-col-half left-float" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">비밀번호 <span class="em">*</span></th>
				<td class="hr-table-td">
					<input type="password" name="pw_new" id="pw_new" maxlength="20" class="input half-col-half left-float" />
					<div class="left-float right"><div class="text-only em">※ 영문자, 숫자를 포함하여 6~20자리로 등록</div></div>
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">비밀번호 확인 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="password" name="cpw_new" id="cpw_new" maxlength="20" class="input half-col-half" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이메일 <span class="em">*</span></th>
				<td class="hr-table-td">
					<input type="text" name="email_id" id="email_id" value="<?=$email[0]?>" maxlength="120" class="input half-col-half left-float left" /><div class="left-float top-margin-7"> @ </div>
					<input type="text" name="email_domain" id="email_domain" value="<?=$email[1]?>" maxlength="120" class="input half-col-half left-float right" />
					<?=printSelectBox2($OPTION_INFO['email'], 'email_kind', '', '', 'onchange="Action_Chg_Email(this.value)" class="select left-float right"', "직접입력")?>
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">연락처</th>
				<td class="hr-table-td">
					<?=printSelectBox2($OPTION_INFO['hptel'], 'tel1', $tel[0], '', 'class="select left-float left"', '선택')?><div class="left-float top-margin-7"> - </div>
					<input type="text" name="tel2" id="tel2" value="<?=$tel[1]?>" maxlength="4" onkeypress="onlyNumber2(this);" onblur="onlyNumber2(this);" style="ime-mode:disabled;" class="input mini left-float right" /><div class="left-float top-margin-7 right"> - </div>
					<input type="text" name="tel3" id="tel3" value="<?=$tel[2]?>" maxlength="4" onkeypress="onlyNumber2(this);" onblur="onlyNumber2(this);" style="ime-mode:disabled;" class="input mini left-float right" />
				</td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">전시장</th>
				<td class="hr-table-td">
					<?=( trim($_COOKIE['member_vcenter']) ) ? $VOLVO_INFO['center'][$_COOKIE['member_vcenter']] : printSelectBox2($VOLVO_INFO['center'], 'vcenter', $row['vcenter'], '', 'class="select"', "선택")?>
					<? if( trim($_COOKIE['member_vcenter']) ){ ?><input type="hidden" name="vcenter" id="vcenter" value="<?=$row['vcenter']?>" /><? } ?>
				</td>
			</tr>
			<? if($admin_lvlchk){ ?>
			<!-- <tr>
				<th scope="row" class="hr-table-th">등급 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['mlevel'], 'level', $row['lvl'], 'U', '', count($OPTION_INFO['mlevel']), false)?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">상태 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['status'], 'status', $row['status'], '', '', count($OPTION_INFO['status']), false)?></td>
			</tr> -->
			<? } ?>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_update" id="btn_update" value="수정" class="btn btn-dark inline med" />
		<? if($admin_lvlchk){ ?>
		<!-- <button type="button" name="btn_list" id="btn_list" onclick="location.href='list.php<?=$str_url?>'" class="btn btn-border inline med">목록</button> -->
		<? } ?>
	</div>
	</form>
</article>
<?php
require_once "../inc/footer.html";
?>