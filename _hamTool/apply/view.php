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
		`sid`, `site_type`, `name`, `gender`,`birth`, `hp`, `email`, `showroom`, `model`, `buy_check`, `agree1`, `agree2`, `agree3`, `agree4`, `chkdel`, `regdate`, `success`, `ch_desc`
	FROM
		{$TABLE_INFO['event_apply']}
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
				<th scope="row" class="hr-table-th">이름</th>
				<td class="hr-table-td"><?=$row['name']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">휴대폰</th>
				<td class="hr-table-td"><?=$row['hp']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이메일</th>
				<td class="hr-table-td"><?=$row['email']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">성별</th>
				<td class="hr-table-td"><?=$OPTION_INFO['sex'][$row['gender']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">생년월일</th>
				<td class="hr-table-td"><?=$row['birth']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">시승 모델</th>
				<td class="hr-table-td"><?=$row['model']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">신청 전시장 코드</th>
				<td class="hr-table-td"><?=$row['showroom']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">신청 전시장</th>
				<td class="hr-table-td"><?=$VOLVO_INFO['showroom'][$row['showroom']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">구입 의향</th>
				<td class="hr-table-td"><?=$OPTION_INFO['buy_check'][$row['buy_check']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">(필수) 개인정보 수집 및 이용 동의</th>
				<td class="hr-table-td"><?=$OPTION_INFO['agree'][$row['agree1']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">(필수) 개인정보 처리 및 위탁 동의</th>
				<td class="hr-table-td"><?=$OPTION_INFO['agree'][$row['agree2']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">(필수) 개인정보 제3자 제공 및 활용 동의</th>
				<td class="hr-table-td"><?=$OPTION_INFO['agree'][$row['agree3']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">(선택) 마케팅 활용 동의</th>
				<td class="hr-table-td"><?=$OPTION_INFO['agree'][$row['agree4']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">신청경로</th>
				<td class="hr-table-td"><?=$OPTION_INFO['site_type'][$row['site_type']]?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">접수날짜</th>
				<td class="hr-table-td"><?=$row['regdate']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">callback</th>
				<td class="hr-table-td"><?=$row['success']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">error</th>
				<td class="hr-table-td"><?=$row['ch_desc']?></td>
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