<?php
$sid = MgRequestCheck(trim($_REQUEST['sid']), 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "비정상적인 접근 방법입니다.1", "", "back"); exit; }

// 조회수 증가
/*$query_up[] = "UPDATE {$TABLE_INFO['bbs']} SET `viewcnt`=`viewcnt`+1 WHERE sid = '{$sid}'";
$result_up = $db->tran_query( $query_up );
if(!$result_up) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
	exit;
}*/

// 자료 검색
$query = "SELECT `sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `ishtml`, `content`, `url`, `hp`, `email`, `thum_file`, `viewcnt`, `notice`, `isclose`, `status`, `chkdel`, `regdate` FROM {$TABLE_INFO['bbs']} WHERE sid='{$sid}'";
$row=$db->row($query);

// 등록여부 체크
if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 게시물입니다.", "", "back"); exit; }

// 자료 검색(첨부파일)
$query_file = "SELECT `sid`, `bm_sid`, `bbs_sid`, `member_sid`, `odr`, `files`, `dcnt`, `ip`, `regdate` FROM {$TABLE_INFO['bbs_file']} WHERE bm_sid='{$bm_sid}' AND bbs_sid='{$row['sid']}' ORDER BY odr ASC, regdate ASC";
$rows_file=$db->fetch_array($query_file);
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn_list').click(function(){ $(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&<?=$str_url2?>'); });

	$('#btn_update').click(function(){
		$(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=update&sid=<?=$sid?>&<?=$str_url2?>');
	});

	$('#btn_delete').click(function(){
		<? if( isAdminLogined() || $_COOKIE['member_sid'] == $row['member_sid'] ){ ?>
		if(confirm('해당 게시물을 삭제하시겠습니까?')){
			$(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=delete&sid=<?=$sid?>&<?=$str_url2?>');
		}
		<? }else{ ?>
		$(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=password&action=delete&sid=<?=$sid?>&<?=$str_url2?>');
		<? } ?>
	});

	$("#commentForm").submit(function(){
		if(!$("#coname").val()){ alert('이름을 등록해 주세요.'); $("#coname").focus(); return false; }
		if(!$("#comment").val()){ alert('댓글을 등록해 주세요.'); $("#comment").focus(); return false; }

		if(confirm('해당 내용으로 댓글을 등록하시겠습니까?')){ return true; }
		else{ return false; }
	});
});

<? if(isAdminLogined()){ ?>
function Action_Comment_Del(csid){
	if(confirm('해당 댓글을 삭제하시겠습니까?')){ $(location).attr('href', '<?=$return_url?>?bm_sid=<?=$bm_sid?>&mode=comment_del&sid=<?=$sid?>&csid='+csid+'&<?=$str_url2?>'); }
}
<? } ?>
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"></div>

	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<? if( $view_tr_cate ){ ?>
			<tr>
				<th scope="row" class="hr-table-th">구분</th>
				<td class="hr-table-td"><?=$row['category']?></td>
			</tr>
			<? } ?>

			<tr>
				<th scope="row" class="hr-table-th">제목</th>
				<td class="hr-table-td"><?=/*MgStringView2*/($row['title'])?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이름</th>
				<td class="hr-table-td"><?=$row['name']?></td>
			</tr>
			<? if(isAdminLogined()){ ?>
			<tr>
				<th scope="row" class="hr-table-th">공지여부</th>
				<td class="hr-table-td"><?=$OPTION_INFO['notice'][$row['notice']]?></td>
			</tr>
			<? } ?>
			<tr>
				<th scope="row" class="hr-table-th">조회수</th>
				<td class="hr-table-td"><?=$row['viewcnt']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">등록일</th>
				<td class="hr-table-td"><?=$row['regdate']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">내용</th>
				<td class="hr-table-td tall"><?=/*MgStringView2*/($row['content'])?></td>
			</tr>
			<? if($bbs_info['isthum'] == "Y"){ ?>
			<tr>
				<th scope="row" class="hr-table-th">썸네일 이미지 첨부</th>
				<td class="hr-table-td tall">
				<?
					if($row['thum_file']){
						$file_info = explode("|", $row['thum_file']);
						$filename_up = $file_info[0];
						$filename = $file_info[1];

						if( $filename_up && file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){
				?>
					<?=($filename) ? "<a href=\"" . $return_url . "?bm_sid=" . $bm_sid . "&mode=download&sid=" . $row['sid'] . "\"><div class=\"left-float left\"><img src=\"{$bbs_info['file_read']}/{$filename_up}\" border=\"0\" height=\"100\" class=\"pdb_10\" alt=\"\" /></div><div class=\"top-margin-45\">". $filename . '</div></a>' : ""?>
				<?
						}
					}
				?>
				</td>
			</tr>
			<? } ?>
			<?
				$fcnt=1;
				foreach($rows_file as $row_file) {
			?>
			<tr>
				<th scope="row" class="hr-table-th">첨부파일<?=($bbs_info['file_tcnt'] > 1) ? $fcnt : ""?></th>
				<td class="hr-table-td">
				<?
					if($row_file['files']){
						$file_info = explode("|", $row_file['files']);
						$filename_up = $file_info[0];
						$filename = $file_info[1];

						if( $filename_up && file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){
				?>
					<?=($filename) ? "<a href=\"" . $return_url . "?bm_sid=" . $bm_sid . "&mode=download&fsid=" . $row_file['sid'] . "\">". $filename . '</a> (다운로드 : ' . $row_file['dcnt'] . '회)' : ""?>
				<?
						}
					}
				?>
				</td>
			</tr>
			<?
					$fcnt++;
				}
			?>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<? if( isAdminLogined() || $_COOKIE['member_sid'] == $row['member_sid'] || (!$row['member_sid']) ){ ?>
		<input type="button" name="btn_update" id="btn_update" value="수정" class="btn btn-dark inline med" />
		<input type="button" name="btn_delete" id="btn_delete" value="삭제" class="btn btn-dark inline med" />
		<? } ?>
		<button type="button" name="btn_list" id="btn_list" class="btn btn-border inline med">목록</button>
	</div>

	<?
	// 코멘트 부분
	if( $bbs_info['iscomment'] == "Y" ){
	?>
	<form method="post" name="commentForm" id="commentForm" action="<?=$_SERVER['PHP_SELF']?>?bm_sid=<?=$bm_sid?>&mode=comment">
	<input type="hidden" name="SearchColumn" id="SearchColumn" value="<?=$SearchColumn?>" />
	<input type="hidden" name="SearchValue" id="SearchValue" value="<?=$encode_value?>" />
	<input type="hidden" name="page" id="page" value="<?=$page?>" />
	<input type="hidden" name="sid" id="sid" value="<?=$sid?>" />
	<div class="pt_30">
		<table class="tbl_comment" border="0" cellspacing="0">
			<colgroup>
				<col width="130px" /><col width="*" /><col width="95px" />
			</colgroup>
			<tbody>
				<tr>
					<th colspan="3">[댓글입력]</th>
				</tr>
				<tr>
					<td><input type="text" name="coname" id="coname" value="<?=$_COOKIE['member_name']?>" maxlength="120" class="text w110" <?if(isLogined()){ echo "readonly"; }?> /></td>
					<td><textarea name="comment" id="comment" cols="74" rows="4" class="text w535"></textarea></td>
					<td><input type="submit" name="btn_cowrite" id="btn_cowrite" value="등록" class="btn btn-green-square" /></td>
				</tr>
			</tbody>
		</table>
	</div>
	</form>
	<?
		// 자료 검색(댓글(코멘트))
		$query_co = "
			SELECT 
				`sid`, `bm_sid`, `bbs_sid`, `member_sid`, `name`, `comment`, `ip`, `regdate`
			FROM 
				{$TABLE_INFO['bbs_comment']}
			WHERE
				bm_sid='{$bm_sid}' AND bbs_sid='{$sid}'
			ORDER BY 
				`regdate` DESC
		";
		$rows_co=$db->fetch_array($query_co);

		if( count($rows_co) > 0 ){
	?>
	<div class="pt_30">
		<table class="tbl_comment_list" border="0" cellspacing="0">
			<colgroup>
				<col width="130px" /><col width="*" /><col width="95px" />
			</colgroup>
			<tbody>
			<?
				foreach($rows_co as $row_co) {
			?>
				<tr>
					<th><?=$row_co['name']?></th>
					<td class="text-L"><?=MgStringView($row_co['comment'], true, true)?></td>
					<td>
						<?=($row_co['regdate'] && $row_co['regdate'] != "0000-00-00 00:00:00") ? substr($row_co['regdate'], 0, 10) : ""?>
						<? if(isAdminLogined()){ ?>
						<div class="pt_5"><input type="button" name="btn_codelete" id="btn_codelete" value="삭제" onclick="Action_Comment_Del('<?=$row_co['sid']?>')" class="btn btn-max-small" /></div>
						<? } ?>
					</td>
				</tr>
			<?
				}
			?>
			</tbody>
		</table>
	</div>
	<?
		}
	}
	?>
</article>