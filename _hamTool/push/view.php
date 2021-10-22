<?php
require_once "../inc/header.html";

// Request 값
$SearchCarModel = MgRequestCheck(trim($_REQUEST['SearchCarModel']), 2, true, true);
$SearchColumn = MgRequestCheck(trim($_REQUEST['SearchColumn']), 30, true, true);
$SearchValue = MgRequestCheck(trim($_REQUEST['SearchValue']), 255, true, true); $encode_value = urlencode($SearchValue);
$page = MgRequestCheck($_REQUEST['page'], 11, true, true);

$str_url = "?page={$page}&SearchCarModel={$SearchCarModel}&SearchColumn={$SearchColumn}&SearchValue={$encode_value}";

$sid = MgRequestCheck($_REQUEST['sid'], 11, true, true);

// 입력 데이터 검증
if(!$sid) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 자료 검색
$query = "
	SELECT
		*
	FROM
		volvo_push
	WHERE
		sid='{$sid}'
";
$row=$db->row($query);

// 등록여부 체크
if(!$row['sid']) { MgMoveURL("", "잘못된 경로로 접근하셨습니다.", "", "back"); exit; }

// 삭제여부 체크
if($row['chkdel'] == 'Y'){ MgMoveURL("", "삭제된 신청자 정보입니다.", "", "back"); exit; }
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
				<th scope="row" class="hr-table-th">보낸기기 OS</th>
				<td class="hr-table-td"><?=$row['device']?></td>
			</tr>
            <tr>
				<th scope="row" class="hr-table-th">보낸유저 구분</th>
				<td class="hr-table-td"><?=$row['recivers']?></td>
			</tr>
            <tr>
				<th scope="row" class="hr-table-th">링크</th>
				<td class="hr-table-td"><?=$row['url']?></td>
			</tr>
            <tr>
				<th scope="row" class="hr-table-th">메시지</th>
				<td class="hr-table-td"><?=$row['content']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">접수날짜</th>
				<td class="hr-table-td"><?=$row['regdate']?></td>
			</tr>
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<button type="button" name="btn_list" id="btn_list" onclick="location.href='list.php<?=$str_url?>'" class="btn btn-border inline med">목록</button>
	</div>
</article>

<?php
require_once "../inc/footer.html";
?>