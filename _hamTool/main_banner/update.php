<?php
require_once "../inc/header.html";
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#updateForm").submit(function(){
		if(confirm('해당 내용으로 적용하시겠습니까?')){ return true; }
		else{ return false; }
	});
});
</script>
<article class="unit-area">
	<form method="post" name="updateForm" id="updateForm" action="update_ok.php" enctype="multipart/form-data">
	<?
		$mbcnt = 1;
		foreach($OPTION_INFO['mbanner_stitle'] as $mbkey => $mbval) {
			$mb_code_val = $OPTION_INFO['mbanner_stitle_code'][$mbkey];
	?>
	<input type="hidden" name="mb_code_<?=$mbcnt?>" id="mb_code_<?=$mbcnt?>" value="<?=$mb_code_val?>" />
	<h4 class="unit-title<?=($mbcnt > 1) ? " top-margin-30" : ""?>"><?=$OPTION_INFO['mbanner_stitle'][$mbkey]?> 페이지 배너관리</h4>
	<div class="table-top-msg required"></div>

	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<?
				$scnt = 1;
				foreach($OPTION_INFO['site_type'] as $skey => $sval) {
					// 첨부파일 설정
					if($skey == "M"){
						$FILE_OPTION['mbanner_' . $mb_code_val . '_file_folder'] = $FILE_OPTION['mbanner_' . $mb_code_val . '_file_folder_m'];
						$FILE_OPTION['mbanner_' . $mb_code_val . '_file_read'] = $FILE_OPTION['mbanner_' . $mb_code_val . '_file_read_m'];
						$FILE_OPTION['mbanner_' . $mb_code_val . '_thum_width'] = $FILE_OPTION['mbanner_' . $mb_code_val . '_thum_width_m'];
						$FILE_OPTION['mbanner_' . $mb_code_val . '_thum_height'] = $FILE_OPTION['mbanner_' . $mb_code_val . '_thum_height_m'];
					}

					// 자료 검색
					$query = "SELECT `sid`, `files` FROM {$TABLE_INFO['main_banner']} WHERE chkdel='N' AND `code`='{$mb_code_val}' AND `type`='{$skey}' ORDER BY sid DESC LIMIT 1";
					$row=$db->row($query);
			?>
			<tr>
				<th scope="row" class="hr-table-th"><?=$sval?> 배너 이미지</th>
				<td class="hr-table-td tall">
				<?
					if($row['files']){
						$file_info = explode("|", $row['files']);
						$filename_up = $file_info[0];
						$filename = $file_info[1];
						$ext = $file_info[3];

						if( $filename_up && file_exists($FILE_OPTION['mbanner_' . $mb_code_val . '_file_folder'] . "/" . $filename_up) ){
				?>
					<input type="hidden" name="sid<?=$mbcnt?>_<?=$scnt?>" id="sid<?=$mbcnt?>_<?=$scnt?>" value="<?=$row['sid']?>" />
					<input type="hidden" name="old_filesup<?=$mbcnt?>_<?=$scnt?>" id="old_filesup<?=$mbcnt?>_<?=$scnt?>" value="<?=$filename_up?>" />
				<?
					if($filename){
						if ( $ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "bmp" ){
							echo "<div class=\"left-float bottom-margin-10 left\"><img src=\"" . $FILE_OPTION['mbanner_' . $mb_code_val . '_file_read'] . "/{$filename_up}\" border=\"0\" height=\"100\" class=\"pdb_10\" alt=\"\" /></div> <div class=\"left-float top-margin-45 left\">{$filename}</div> <div class=\"check-wrap left-float top-margin-40 left\"><input type=\"checkbox\" name=\"delfile{$mbcnt}_{$scnt}\" id=\"delfile{$mbcnt}_{$scnt}\" value=\"Y\" class=\"check-box\" /> <label for=\"delfile{$mbcnt}_{$scnt}\" class=\"check-label\">파일삭제</label></div><div class=\"clearfix\"></div>";
						}else{
							echo "<div class=\"left-float top-margin-5 left\">{$filename}</div> <div class=\"check-wrap left-float bottom-margin-10 left\"><input type=\"checkbox\" name=\"delfile{$mbcnt}_{$scnt}\" id=\"delfile{$mbcnt}_{$scnt}\" value=\"Y\" class=\"check-box\" /> <label for=\"delfile{$mbcnt}_{$scnt}\" class=\"check-label\">파일삭제</label></div><div class=\"clearfix\"></div>";
						}
					}
				?>
				<?
						}
					}
				?>
					<input type="hidden" name="mb_type<?=$mbcnt?>_<?=$scnt?>" id="mb_type<?=$mbcnt?>_<?=$scnt?>" value="<?=$skey?>" />
					<input type="file" name="filesup<?=$mbcnt?>_<?=$scnt?>" id="filesup<?=$mbcnt?>_<?=$scnt?>" class="input half left-float" />
					<div class="left-float right text-only em"><?="* 사이즈(가로*세로) : " . $FILE_OPTION['mbanner_' . $mb_code_val . '_thum_width'] . " * " . $FILE_OPTION['mbanner_' . $mb_code_val . '_thum_height']?> px</div>
				</td>
			</tr>
			<?
					$scnt++;
				}
			?>
		</tbody>
	</table>
	<?
			$mbcnt++;
		}
	?>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_apply" id="btn_apply" value="적용" class="btn btn-dark inline med" />
	</div>
	</form>
</article>

<?php
require_once "../inc/footer.html";
?>