<?php
require_once "../inc/header.html";

// 페이지 관련 계산하기
$page = MgRequestCheck(trim($_REQUEST['page']), 11, true, true); $page = $page ? $page : 1;
$limit = MgRequestCheck(trim($_REQUEST['limit']),  4, true, true); $limit  = $limit ? $limit : 20;
$block = MgRequestCheck(trim($_REQUEST['block']),  4, true, true); $block  = $block ? $block : 10;

// 조건 검색 생성
$SearchText = "WHERE del_chk = 'N' ";

$str_url = "";

// 총 갯수 검색
$query_cnt = "SELECT COUNT(*) cnt FROM volvo_promotion {$SearchText}";
$TotalCount = $db->select_one( $query_cnt );
if ($page == 1){ $StartRow = 0; }
else{ $StartRow = ($page - 1) * $limit; }

// 자료 검색
$query = "
	SELECT
		`sid`, `category`, `title`, `content`, `option_type`, `option`, `sdate`, `edate`, `thum_file`, `reg_date`
	FROM
		volvo_promotion
	{$SearchText}
	ORDER BY
		sid DESC
	LIMIT
		{$StartRow}, {$limit}
";

$rows=$db->fetch_array($query);
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

$('#btn_write').click(function(){
    $(location).attr('href', '<?=$return_url?>?mode=write');
});

$(function() {
	var dt = new Date();
	var y = dt.getFullYear();
	var m = dt.getMonth()+1;
	var d = dt.getDate()+1;

	//mindt = y+"-"+m+"-1";
	//maxdt = y+"-"+m+"-30";
	//mindt = y+"-2-3";
	mindt = y+"-"+m+"-"+d;
	maxdt = y+"-3-12";

	$(".date").datepicker({
		dateFormat:"yy-mm-dd", firstDay: 0,
		dayNames:["일","월","화","수","목","금","토"], dayNamesShort:["일","월","화","수","목","금","토"], dayNamesMin:["일","월","화","수","목","금","토"],
		monthNames:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],
		monthNamesShort:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],
		changeMonth: true, changeYear: false, showMonthAfterYear: true,
		showButtonPanel: true,
		closeText: "닫기", prevText: "이전", nextText: "다음", currentText: "오늘",
		showOn: "button", buttonImage: "../images/icon_cal.png", buttonImageOnly: true,
		yearRange: "c:c", showAnim: "slideDown",
		minDate : mindt,
		maxDate : maxdt,
		isRTL: false
	});
});
</script>

<article class="unit-area">
	<div class="clearfix">
		<!-- <form method="post" name="searchForm" action="<?=$return_url?>">
		<table class="table4 vt-table bottom-margin">
			<colgroup>
				<col width="130px" /><col width="444px" /><col width="130px" /><col width="444px" />
			</colgroup>
			
            <tbody>
				<? if(!$_COOKIE['member_vcenter']){ ?>
				<tr>
					<th scope="col" class="vt-table-th2">신청전시장</th>
					<td class="vt-table-td2"><?=printSelectBox2($VOLVO_INFO['center'], 'SearchCenter', $SearchCenter, '', 'class="input"', ':: 선택하세요 ::')?></td>
					<th scope="col" class="vt-table-th2">차량모델</th>
					<td class="vt-table-td2"><?=printSelectBox2($VOLVO_INFO['car_model'], 'SearchCarmodel', $SearchCarmodel, '', 'class="input"', ':: 선택하세요 ::')?></td>
				</tr>
				<? }else{ ?>
				<tr>
					<th scope="col" class="vt-table-th2">차량모델</th>
					<td class="vt-table-td2" colspan="3"><?=printSelectBox2($VOLVO_INFO['car_model'], 'SearchCarmodel', $SearchCarmodel, '', 'class="input"', ':: 선택하세요 ::')?></td>
				</tr>
				<? } ?>
				<tr>
					<th scope="col" class="vt-table-th2">신청날짜</th>
					<td class="vt-table-td2">
						<div class="left_area date_area">
							<input type="text" name="SearchSdate" id="SearchSdate" value="<?=$SearchSdate?>" maxlength="10" onblur="Add_HyphenDate('SearchSdate', this.value)" class="input med date" />
							<div class="txt">~</div>
							<input type="text" name="SearchEdate" id="SearchEdate" value="<?=$SearchEdate?>" maxlength="10" onblur="Add_HyphenDate('SearchEdate', this.value)" class="input med date" />
						</div>
					</td>
					<th scope="col" class="vt-table-th2">시승시간</th>
					<td class="vt-table-td2"><?=printSelectBox2($VOLVO_INFO['time'], 'SearchTime', $SearchTime, '', 'class="input"', ':: 선택하세요 ::')?></td>
				</tr>
				<tr>
					<th scope="col" class="vt-table-th2">성별</th>
					<td class="vt-table-td2"><?=printRadioBox_Div($OPTION_INFO['sex2'], 'SearchSex', $SearchSex, '', '', count($OPTION_INFO['sex2']), false)?></td>
					<th scope="col" class="vt-table-th2">검색</th>
					<td class="vt-table-td2">
						<?=printSelectBox2($SEARCH_INFO['apply'], 'SearchColumn', $SearchColumn, '', 'class="input left-float left"', '')?>
						<input type="text" name="SearchValue" id="SearchValue" value="<?=$SearchValue?>" class="input half-col-half left-float" />
					</td>
				</tr>
				<tr>
					<td class="vt-table-td2 center" colspan="4"><input type="submit" name="btn_search" id="btn_search" value="검색" class="btn btn-gray inline med" /></td>
				</tr>
			</tbody>
		</table>
		</form> -->
	</div>

	<!-- <div class="clearfix right-float top-margin-20 bottom-margin-20">
		<button type="button" name="btn_excel" id="btn_excel" class="btn btn-gray med2 left-float left">엑셀파일 다운로드</button>
	</div> -->

	<div class="clearfix">
		<form method="post" name="listForm" id="listForm">
		<input type="hidden" name="listMode" id="listMode" value="" />
		<table class="table vt-table bottom-margin">
			<colgroup>
				<col width="50px" />
                <col width="60px" />
                <col width="100px" />
                <col width="*" />
                <col width="100px" />
                <col width="100px" />
                <col width="100px" />
                <col width="100px" />
			</colgroup>
			<tbody>
				<tr>
					<th scope="col" class="vt-table-th"><div class="check-wrap center"><input type="checkbox" onclick="Action_Select_All(this.checked)" /></div></th>
					<th scope="col" class="vt-table-th">번호</th>
					<th scope="col" class="vt-table-th">카테고리</th>
					<th scope="col" class="vt-table-th">제목</th>
					<th scope="col" class="vt-table-th">시작일</th>
					<th scope="col" class="vt-table-th">종료일</th>
					<th scope="col" class="vt-table-th">등록일</th>
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
					<td class="vt-table-td center"><?=$row['category']?></td>
					<td class="vt-table-td center"><?=$row['title']?></td>
					<td class="vt-table-td center"><?=$row['sdate']?></td>
					<td class="vt-table-td center"><?=$row['edate']?></td>
					<td class="vt-table-td center"><?=$row['reg_date']?></td>
					<td class="vt-table-td center">
						<button type="button" onclick="Action_View('<?=$row['sid']?>')" class="btn btn-tiny-gray inline">보기</button>
					</td>
				</tr>
				<?
						$ListRow++;
					}

					if($ListRow == 0){
						echo "<tr><td class=\"vt-table-td center\" colspan=\"11\">등록된 프로모션이 없습니다.</td></tr>";
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
		<button type="button" name="btn_delete" id="btn_delete" class="btn btn-border med left-float left">삭제</button>
		<a href="promo_write.php?mode=w" name="btn_write" id="btn_write" class="btn btn-dark med left-float">등록하기</a>
	</div>
</article>

<?php
require_once "../inc/footer.html";
?>