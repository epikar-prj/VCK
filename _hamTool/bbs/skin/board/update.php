<?php
$sid = MgRequestCheck(trim($_REQUEST['sid']), 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "수정하실 게시물을 선택하세요.", "", "back"); exit; }

// 자료 검색
if ($bm_sid == 5) {
    $query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `subtitle`, `publish_date`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel`, `header_color` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
} else if ($bm_sid == 7) {
    $query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `subtitle`, `publish_date`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
} else {
    $query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `lang`, `issuedate`, `sdate`, `edate`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `ishtml`, `summary`, `content`, `content2`, `url`, `hp`, `email`, `thum_file`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
}
$row=$db->row($query);

// 등록여부 체크
if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 게시물입니다.", "", "back"); exit; }

// 본인 작성여부 체크
if( (!isAdminLogined()) && ($_COOKIE['member_sid'] != $row['member_sid']) && $row['member_sid'] ){ MgMoveURL("", "게시물을 수정할 수 있는 권한이 없습니다.", "", "back"); exit; }


// 자료 검색(첨부파일)
$query_file = "SELECT `sid`, `bm_sid`, `bbs_sid`, `member_sid`, `odr`, `files`, `dcnt`, `ip`, `regdate` FROM {$TABLE_INFO['bbs_file']} WHERE bm_sid='{$bm_sid}' AND bbs_sid='{$row['sid']}' ORDER BY odr ASC, regdate ASC";
$rows_file=$db->fetch_array($query_file);

// print_r($row);
?>
<script type="text/javascript" src="../../smarteditor/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn_list').click(function(){ $(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&<?=$str_url2?>'); });

	$("#updateForm").submit(function(){
		oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
		<? if($bm_sid == "1"){ ?>
		oEditors2.getById["content2"].exec("UPDATE_CONTENTS_FIELD", []);
		<? } ?>

		<? if( $view_tr_cate ){ ?>
		if($("#category").val() == ""){ alert('구분을 선택해 주세요.'); $("#category").focus(); return false; }
		<? } ?>
		if(!$("#title").val()){ alert('제목을 등록해 주세요.'); $("#title").focus(); return false; }
		if(!$("#name").val()){ alert('이름을 등록해 주세요.'); $("#name").focus(); return false; }
		<? if(isAdminLogined() && $row['dth'] == "0" && $bm_sid <> "2"){ ?>
		if( $("input:radio[name='notice']:checked").length < 1 ) { alert("공지여부를 선택해 주세요."); $("#notice_1").focus(); return false; }
		<? } ?>

		<? if($bm_sid != "1"){ ?>
		var content_val = fRemoveHtmlTag(oEditors.getById["content"].getIR());
		if(content_val == ""){ alert('내용을 등록해 주세요.'); oEditors.getById["content"].exec("FOCUS"); return false; }
		/*
		var content_val = oEditors.getById["content"].getIR();
		if(content_val == "" || content_val == "<P></P>" || content_val == "<P>&nbsp;</P>"){ alert('내용을 등록해 주세요.'); oEditors.getById["content"].exec("FOCUS"); return false; }
		*/
		<? } ?>

		if(confirm('해당 내용으로 수정하시겠습니까?')){ return true; }
		else{ return false; }
	});

	$('#btn_cancel').click(function(){
		$("#content").text(""); oEditors.getById["content"].exec("LOAD_CONTENTS_FIELD"); $("form")[0].reset(); return false;

		<? if($bm_sid == "1"){ ?>
		$("#content2").text(""); oEditors2.getById["content2"].exec("LOAD_CONTENTS_FIELD"); $("form")[0].reset(); return false;
		<? } ?>
	});
});
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="updateForm" id="updateForm" action="<?=$_SERVER['PHP_SELF']?>?bm_sid=<?=$bm_sid?>&mode=update_ok" enctype="multipart/form-data">
	<input type="hidden" name="SearchCate" id="SearchCate" value="<?=$encode_cate?>" />
	<input type="hidden" name="SearchColumn" id="SearchColumn" value="<?=$SearchColumn?>" />
	<input type="hidden" name="SearchValue" id="SearchValue" value="<?=$encode_value?>" />
	<input type="hidden" name="page" id="page" value="<?=$page?>" />

	<input type="hidden" name="sid" id="sid" value="<?=$sid?>" />
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<? if( $view_tr_cate ){ ?>
			<tr>
				<th scope="row" class="hr-table-th">구분 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printSelectBox($cate_info, 'category', $row['category'], '', 'class="input"', '')?></td>
			</tr>
			<? } ?>
			<tr>
				<th scope="row" class="hr-table-th">제목 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="title" id="title" value="<?=$row['title']?>" maxlength="120" class="input full" /></td>
            </tr>
            <? if ($bm_sid == "5" || $bm_sid == "7") { ?>
                <tr>
				    <th scope="row" class="hr-table-th">소제목 <span class="em">*</span></th>
				    <td class="hr-table-td"><input type="text" name="subtitle" id="subtitle" value="<?=$row['subtitle']?>" maxlength="120" class="input full" /></td>
			    </tr>
                <tr>
				    <th scope="row" class="hr-table-th">등록일자 <span class="em">*</span></th>
				    <td class="hr-table-td"><input type="text" name="publish_date" id="publish_date" value="<?=$row['publish_date']?>" maxlength="120" class="input full" /></td>
			    </tr>
            <? } ?>
            <? if ($bm_sid == "5") { ?>
                <tr>
				    <th scope="row" class="hr-table-th">헤더컬러 <span class="em"></span></th>
				    <td class="hr-table-td">
                        <label><input type="radio" name="header_color" value="1" <? if ($row['header_color'] == 1) { echo 'checked'; } ?> style="display: inline-block;">검정색</label>
                        <label><input type="radio" name="header_color" value="2" <? if ($row['header_color'] == 2) { echo 'checked'; } ?> style="display: inline-block;">흰색</label>
                    </td>
			    </tr>
            <? } ?>
            <? if ($bm_sid == "6") { ?>
                <tr>
				    <th scope="row" class="hr-table-th">등록일자 <span class="em">*</span></th>
				    <td class="hr-table-td"><input type="text" name="publish_date" id="publish_date" value="<?=$row['publish_date']?>" maxlength="120" class="input full" /></td>
			    </tr>
            <? } ?>
			<tr>
				<th scope="row" class="hr-table-th">이름 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="name" id="name" value="<?=($row['name']) ? $row['name'] : $_COOKIE['member_name']?>" maxlength="20" class="input half-col-half" /></td>
			</tr>
			<? if(isAdminLogined() && $row['dth'] == "0" && $bm_sid <> "2"){ ?>
			<tr>
				<th scope="row" class="hr-table-th">공지여부 <span class="em">*</span></th>
				<td class="hr-table-td"><?=printRadioBox_Div($OPTION_INFO['notice'], 'notice', $row['notice'], '', '', false)?></td>
			</tr>
			<? } ?>

			<? if($bm_sid == "1"){ ?>
			<tr>
				<th scope="row" class="hr-table-th">내용(PC)</th>
				<td class="hr-table-td tall">
					<textarea name="content" id="content" cols="74" rows="20" class="textarea full2"><?=$row['content']?></textarea>
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
			<tr>
				<th scope="row" class="hr-table-th">내용(Mobile)</th>
				<td class="hr-table-td tall">
					<textarea name="content2" id="content2" cols="74" rows="20" class="textarea full2"><?=$row['content2']?></textarea>
					<script type="text/javascript">
						var oEditors2 = [];
						nhn.husky.EZCreator.createInIFrame({
							oAppRef: oEditors2,
							elPlaceHolder: "content2",
							sSkinURI: "../../smarteditor/SmartEditor2Skin.html",
							fCreator: "createSEditor2",
							htParams: { fOnBeforeUnload : function(){}}
						});
					</script>
				</td>
			</tr>
			<? }else{ ?>
			<tr>
				<th scope="row" class="hr-table-th">내용 <span class="em">*</span></th>
				<td class="hr-table-td tall">
					<textarea name="content" id="content" cols="74" rows="30" class="textarea full2"><?=$row['content']?></textarea>
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
			<? } ?>

			<tr id="tr_url" style="display:none;">
				<th scope="row" class="hr-table-th">관련링크</th>
				<td class="hr-table-td"><input type="text" name="url" id="url" value="<?=$row['url']?>" maxlength="120" class="input full" /></td>
			</tr>
			<? if($bbs_info['isthum'] == "Y"){ ?>
			<tr>
				<th scope="row" class="hr-table-th"><?=($bm_sid == "2") ? "대표이미지" : "썸네일 이미지 첨부"?></th>
				<td class="hr-table-td tall">
				<?
					if($row['thum_file']){
						$file_info = explode("|", $row['thum_file']);
						$filename_up = $file_info[0];
						$filename = $file_info[1];

						if( $filename_up && file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){
				?>
					<input type="hidden" name="old_thumup" id="old_thumup" value="<?=$filename_up?>" />
					<?=($filename) ? "<div class=\"left-float bottom-margin-10 left\"><img src=\"{$bbs_info['file_read']}/{$filename_up}\" border=\"0\" height=\"60\" class=\"pdb_10\" alt=\"\" /></div> <div class=\"left-float top-margin-25 left\">{$filename}</div> <div class=\"check-wrap left-float top-margin-20 left\"><input type=\"checkbox\" name=\"delthum\" id=\"delthum\" value=\"Y\" class=\"check-box\" /> <label for=\"delthum\" class=\"check-label\">파일삭제</label></div>" : ""?>
				<?
						}
					}
				?>
					<input type="file" name="thumup" id="thumup" class="input full2" />
				</td>
			</tr>
			<? } ?>
			<?
				$fcnt=1;
				foreach($rows_file as $row_file) {
			?>
			<tr>
				<th scope="row" class="hr-table-th"><?=($bm_sid == "2") ? "이미지" : "첨부파일"?><?=($bbs_info['file_tcnt'] > 1) ? $fcnt : ""?></th>
				<td class="hr-table-td tall">
				<?
					if($row_file['files']){
						$file_info = explode("|", $row_file['files']);
						$filename_up = $file_info[0];
						$filename = $file_info[1];
						$part = explode(".", $filename_up);
						$ext = strtolower($part[sizeof($part)-1]);

						if( $filename_up && file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){
				?>
					<input type="hidden" name="old_filesup<?=$fcnt?>" id="old_filesup<?=$fcnt?>" value="<?=$filename_up?>" />
					<input type="hidden" name="old_fsid<?=$fcnt?>" id="old_fsid<?=$fcnt?>" value="<?=$row_file['sid']?>" />
					<input type="hidden" name="old_fodr<?=$fcnt?>" id="old_fodr<?=$fcnt?>" value="<?=$row_file['odr']?>" />
					<? if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png") { ?>
					<?=($filename) ? "<div class=\"left-float bottom-margin-10 left\"><img src=\"{$bbs_info['file_read']}/{$filename_up}\" border=\"0\" height=\"60\" class=\"pdb_10\" alt=\"\" /></div> <div class=\"left-float top-margin-25 left\">{$filename}</div> <div class=\"check-wrap left-float top-margin-20 left\"><input type=\"checkbox\" name=\"delfile{$fcnt}\" id=\"delfile{$fcnt}\" value=\"Y\" class=\"check-box\" /> <label for=\"delfile{$fcnt}\" class=\"check-label\">파일삭제</label></div>" : ""?>
					<? }else{ ?>
					<?=($filename) ? "<div class=\"left-float top-margin bottom-margin-5 left\"><a href=\"{$return_url}?bm_sid={$bm_sid}&mode=download&fsid={$row_file['sid']}\">{$filename}</a></div> <div class=\"check-wrap left-float  top-margin-5 left\"><input type=\"checkbox\" name=\"delfile{$fcnt}\" id=\"delfile{$fcnt}\" value=\"Y\" class=\"check-box\" /> <label for=\"delfile{$fcnt}\" class=\"check-label\">파일삭제</label></div>" : ""?>
					<? } ?>
				<?
						}
					}
				?>
					<div class="bottom-margin-10"><input type="file" name="filesup<?=$fcnt?>" id="filesup<?=$fcnt?>" class="input full2" /></div>
				</td>
			</tr>
			<?
					$fcnt++;
				}

				if($bbs_info['file_tcnt'] > 0){
					for($f=$fcnt;$f<=$bbs_info['file_tcnt'];$f++){
			?>
			<tr>
				<th scope="row" class="hr-table-th"><?=($bm_sid == "2") ? "이미지" : "첨부파일"?><?=($bbs_info['file_tcnt'] > 1) ? $f : ""?></th>
				<td class="hr-table-td"><input type="file" name="filesup<?=$f?>" id="filesup<?=$f?>" class="input full2" /></td>
			</tr>
			<?
					}
				}
			?>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_update" id="btn_update" value="수정" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>