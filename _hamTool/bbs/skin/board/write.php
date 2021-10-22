<?//print_r($OPTION_INFO);?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/datepicker/datepicker.js" charset="utf-8"></script>
<link  href="../js/datepicker/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="../../smarteditor/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn_list').click(function(){ $(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>'); });

	$("#writeForm").submit(function(){
        oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		<? if($bm_sid == "1"){ ?>
		oEditors2.getById["content2"].exec("UPDATE_CONTENTS_FIELD", []);
		<? } ?>

		<? if( $view_tr_cate ){ ?>
		if(!$("#category").val()){ alert('구분을 선택해 주세요.'); $("#category").focus(); return false; }
		<? } ?>
		if(!$("#title").val()){ alert('제목을 등록해 주세요.'); $("#title").focus(); return false; }
		if(!$("#name").val()){ alert('이름을 등록해 주세요.'); $("#name").focus(); return false; }
		
        <? if($bm_sid != "1"){ ?>
		var content_val = fRemoveHtmlTag(oEditors.getById["content"].getIR());
		if(content_val == ""){ alert('내용을 등록해 주세요.'); oEditors.getById["content"].exec("FOCUS"); return false; }
		/*
		var content_val = oEditors.getById["content"].getIR();
		if(content_val == "" || content_val == "<P></P>" || content_val == "<P>&nbsp;</P>"){ alert('내용을 등록해 주세요.'); oEditors.getById["content"].exec("FOCUS"); return false; }
		*/
		<? } ?>

        // return false;

		if(confirm('해당 내용으로 등록하시겠습니까?')){ return true; }
		else{ return false; }
	});
});
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="writeForm" id="writeForm" action="<?=$_SERVER['PHP_SELF']?>?bm_sid=<?=$bm_sid?>&mode=write_ok" enctype="multipart/form-data">
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<? if( $view_tr_cate ){ ?>
			<tr>
				<th scope="row" class="hr-table-th">구분 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printSelectBox($cate_info, 'category', $SearchCate, '', 'class="input"', '선택하세요')?></td>
			</tr>
			<? } ?>
			<tr>
				<th scope="row" class="hr-table-th">제목 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="title" id="title" maxlength="120" class="input full" /></td>
            </tr>
            <? if ($bm_sid == "5" || $bm_sid == "7") { ?>
                <tr>
				    <th scope="row" class="hr-table-th">소제목</th>
				    <td class="hr-table-td"><input type="text" name="subtitle" id="subtitle" maxlength="120" class="input full" /></td>
			    </tr>
                <tr>
				    <th scope="row" class="hr-table-th">등록일자 <span class="em">*</span></th>
				    <td class="hr-table-td"><input type="text" name="publish_date" id="publish_date" maxlength="120" class="input full" /></td>
			    </tr>
			<? } ?>

            <? if ($bm_sid == "5") { ?>
                <tr>
				    <th scope="row" class="hr-table-th">헤더컬러 <span class="em"></span></th>
				    <td class="hr-table-td">
                        <label><input type="radio" name="header_color" value="1" checked style="display: inline-block;">검정색</label>
                        <label><input type="radio" name="header_color" value="2" style="display: inline-block;">흰색</label>
                    </td>
			    </tr>
            <? } ?>
			
			<? if ($bm_sid == "6") { ?>
                <tr>
				    <th scope="row" class="hr-table-th">등록일자 <span class="em">*</span></th>
				    <td class="hr-table-td"><input type="text" name="publish_date" id="publish_date" maxlength="120" class="input full" /></td>
			    </tr>
            <? } ?>
			<tr>
				<th scope="row" class="hr-table-th">이름 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="name" id="name" value="<?=$_COOKIE['member_name']?>" maxlength="20" class="input half-col-half" /></td>
            </tr>
            <?if ($bm_sid == 1) {?>
            <tr>
				<th scope="row" class="hr-table-th">날짜 <span class="em">*</span></th>
				<td class="hr-table-td">
                    <input type="text" data-toggle="datepicker" name="newsdate" id="newsdate" value="" class="input half-col-half" readonly />
                    <script>$('[data-toggle="datepicker"]').datepicker({format: 'yyyy-mm-dd', autoHide: true});</script>
                </td>
            </tr>
            <?}?>
			<? if(isAdminLogined() && $bm_sid == 1){ ?>
			<tr>
				<th scope="row" class="hr-table-th">상단노출 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printCheckBox_Div($OPTION_INFO['notice'], 'notice', 'N', '', '', false)?></td>
			</tr>
            <? } ?>
            <?if ($bm_sid == 1) {?>
            <tr>
                <th scope="row" class="hr-table-th">뱃지</th>
                <td class="hr-table-td"><?=printCheckBox_Div($OPTION_INFO['badge'], 'badge', '', '', '', false)?></td>
            </tr>
            <? } ?>
			<tr>
				<th scope="row" class="hr-table-th">내용</th>
				<td class="hr-table-td tall">
                    <textarea name="content" id="content" cols="74" rows="20" class="textarea full2"></textarea>
                    <script type="text/javascript">
						var oEditors = [];
						nhn.husky.EZCreator.createInIFrame({
							oAppRef: oEditors,
							elPlaceHolder: "content",
							sSkinURI: "../../smarteditor/SmartEditor2Skin.html",
							fCreator: "createSEditor2",
							htParams: { fOnBeforeUnload : function(){}}
						});
					</script>
				</td>
			</tr>

			<tr id="tr_url" style="display:none;">
				<th scope="row" class="hr-table-th">관련링크</th>
				<td class="hr-table-td"><input type="text" name="url" id="url" maxlength="120" class="input full" /></td>
			</tr>
			<? if($bbs_info['isthum'] == "Y"){ ?>
			<tr>
				<th scope="row" class="hr-table-th"><?=($bm_sid == "2") ? "대표이미지" : "썸네일 이미지 첨부"?></th>
				<td class="hr-table-td"><input type="file" name="thumup" id="thumup" class="input full2" /></td>
			</tr>
			<? } ?>
			<?
				if($bbs_info['file_tcnt'] > 0){
					for($f=1;$f<=$bbs_info['file_tcnt'];$f++){
			?>
			<tr class="tr_files" style="display:;">
				<th scope="row" class="hr-table-th">이미지<?=($bbs_info['file_tcnt'] > 1) ? $f : ""?></th>
				<td class="hr-table-td"><input type="file" name="filesup<?=$f?>" id="filesup<?=$f?>" class="input full2" /></td>
			</tr>
			<?
					}
				}
			?>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_write" id="btn_write" value="등록" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>