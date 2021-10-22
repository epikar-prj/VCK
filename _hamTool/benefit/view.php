<?php
require_once "../inc/header.html";

// Request 값
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}";


$sid = MgRequestCheck($_REQUEST['sid'], 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 자료 검색
$query = "
	SELECT
		*
	FROM
		volvo_promotion
	WHERE
		sid='{$sid}'
";
$row=$db->row($query);

// 등록여부 체크
if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

?>
<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>
<article class="unit-area">
	<table class="table hr-table">
		<colgroup>
			<col width="250px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">구분</th>
				<td class="hr-table-td"><?=$row['category']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">제목</th>
				<td class="hr-table-td"><?=$row['title']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">내용</th>
				<td class="hr-table-td"><?=$row['content']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">옵션</th>
				<td class="hr-table-td"><?=$row['option']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">시작일</th>
				<td class="hr-table-td"><?=$row['sdate']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">종료일</th>
				<td class="hr-table-td"><?=$row['edate']?></td>
			</tr>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<button type="button" name="btn_list" id="btn_list" onclick="location.href='promo_list.php<?=$str_url?>'" class="btn btn-border inline med">목록</button>
	</div>
</article>

<?php
require_once "../inc/footer.html";
?>