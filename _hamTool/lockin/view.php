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
$query = " SELECT
        a.sid, a.id, a.receive_nm, a.receive_hp, a.receive_zip, a.receive_addr1, a.receive_addr2, a.is_received, a.reg_date, a.rec_date, b.cust_nm, b.hp
    FROM
        volvo_wating_cust a
    JOIN
        ( select master_cust_cd, cust_nm, hp from volvo_user ) b
    ON
        a.master_cust_cd = b.master_cust_cd
    WHERE a.chkdel = 'N' AND
		a.sid='{$sid}'
";
$row=$db->row($query);

$addr = "({$row['receive_zip']}) {$row['receive_addr1']}";
                        
if ($row['receive_addr2']) {
    $addr .= "<br>{$row['receive_addr2']}";
}

$tel1 = add_hyphen($row['hp']);
$tel2 = add_hyphen($row['receive_hp']);

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
				<th scope="row" class="hr-table-th">아이디</th>
				<td class="hr-table-td"><?=$row['id']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">이름</th>
				<td class="hr-table-td"><?=$row['cust_nm']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">휴대폰</th>
				<td class="hr-table-td"><?=$tel1?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">수령인</th>
				<td class="hr-table-td"><?=$row['receive_nm']?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">수령인 연락처</th>
				<td class="hr-table-td"><?=$tel2?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">주소</th>
				<td class="hr-table-td"><?=$addr?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">수령</th>
				<td class="hr-table-td"><?=$row['is_received'] == 'Y' ?  substr($row['rec_date'], 0, 10) : "-"?></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">접수일</th>
				<td class="hr-table-td"><?=($row['reg_date']) ? substr($row['reg_date'], 0, 10) : "-"?></td>
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