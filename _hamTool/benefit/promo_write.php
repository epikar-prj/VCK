<?
    require_once "../../inc/common.php";

    $mode = MgRequestCheck($_REQUEST['mode'], 50, true, true); $mode = $mode ? $mode : "list";
    $sid = MgRequestCheck($_REQUEST['sid'], 50, true, true);

    require_once "../inc/header.html";
?>

<?//print_r($OPTION_INFO);?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/datepicker/datepicker.js" charset="utf-8"></script>
<link  href="../js/datepicker/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="../../smarteditor/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
	

	$("#writeForm").submit(function(){
        

		// if(!$("#category").val()){ alert('소제목을 입력해주세요'); $("#category").focus(); return false; }
		// if(!$("#title").val()){ alert('제목을 등록해 주세요.'); $("#title").focus(); return false; }
		// if(!$("#content").val()){ alert('내용을 등록해 주세요.'); return false; }
		// if(!$("#content").val()){ alert('내용을 등록해 주세요.'); return false; }
		

        // return false;

		if(confirm('해당 내용으로 등록하시겠습니까?')){ return true; }
		else{ return false; }
	});

    $('input[name="option_type"]').change(function() {
        var value = $(this).val();

        if (value == 1) {
            $('#optionType1').show();
            $('#optionType2').hide();
        } else if (value == 2) {
            $('#optionType2').show();
            $('#optionType1').hide();
            
        }
    });


    
    $('.optionAdd').click(function() {
        $('#optionType2 ul').append('<li>' +
                        '<input type="text" name="option2[]" class="input half-col-half" style="display: inline-block;">' +
                        '<button type="button" class="btn btn-border inline optionRemove">-</button>' +
                    '</li>');
        optionButtons();
    });
    
    function optionButtons() {
        $('.optionRemove').off('click');
        $('.optionRemove').on('click', function() {
            $(this).parent().remove();
        });
    }
});
</script>
<article class="unit-area">
	<h4 class="unit-title">&nbsp;</h4>
	<div class="table-top-msg required"><span class="em">*</span> 표시는 필수로 입력하셔야 합니다.</div>

	<form method="post" name="writeForm" id="writeForm" action="promo_write_ok.php?mode=write" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?=$mode?>">
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
			<tr>
				<th scope="row" class="hr-table-th">구분 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="category" id="category" maxlength="120" class="input full" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">제목 <span class="em">*</span></th>
				<td class="hr-table-td"><input type="text" name="title" id="title" maxlength="120" class="input full" /></td>
			</tr>
			<tr>
				<th scope="row" class="hr-table-th">시작날짜 <span class="em">*</span></th>
				<td class="hr-table-td">
                    <input type="text" data-toggle="datepicker" name="sdate" id="sdate" value="" class="input half-col-half" readonly />
                    <script>$('[data-toggle="datepicker"]').datepicker({format: 'yyyy-mm-dd', autoHide: true});</script>
                </td>
            </tr>
            <tr>
				<th scope="row" class="hr-table-th">종료날짜 <span class="em">*</span></th>
				<td class="hr-table-td">
                    <input type="text" data-toggle="datepicker" name="edate" id="edate" value="" class="input half-col-half" readonly />
                    <script>$('[data-toggle="datepicker"]').datepicker({format: 'yyyy-mm-dd', autoHide: true});</script>
                </td>
            </tr>
            <tr>
				<th scope="row" class="hr-table-th">내용</th>
				<td class="hr-table-td tall">
                    <textarea name="content" id="content" cols="74" rows="20" class="textarea full2"></textarea>
                </td>
			</tr>

            <tr>
				<th scope="row" class="hr-table-th">옵션 타입</th>
				<td class="hr-table-td">
                    <label for="option_type1"><input type="radio" name="option_type" id="option_type1" value="1" checked style="display: inline-block;">일반</label>
                    <label for="option_type2"><input type="radio" name="option_type" id="option_type2" value="2" style="display: inline-block;">그리드</label>
                </td>
			</tr>

            <tr id="optionType1">
                <th scope="row" class="hr-table-th">옵션</th>
                <td class="hr-table-td tall">
                    <textarea name="option1" id="option1" cols="74" rows="20" class="textarea full2"></textarea>
                </td>
            </tr>

            <tr id="optionType2" style="display: none;">
                <th scope="row" class="hr-table-th">옵션</th>
                <td class="hr-table-td tall">
                    <ul>
                        <li>
                            <input type="text" name="option2[]" class="input half-col-half" style="display: inline-block;">
                            <button type="button" class="btn btn-dark inline optionAdd">+</button>
                        </li>
                    </ul>
                </td>
            </tr>
            
			<tr>
				<th scope="row" class="hr-table-th">썸네일 이미지 첨부</th>
				<td class="hr-table-td"><input type="file" name="thumup" id="thumup" class="input full2" /></td>
			</tr>
			
		</tbody>
	</table>

	<div class="bottom-btn-wrap top-margin-20">
		<input type="submit" name="btn_write" id="btn_write" value="등록" class="btn btn-dark inline med" />
		<button type="button" name="btn_list" id="btn_list" class="btn btn-border inline med">목록</button>
	</div>
	</form>
</article>

<?
    require_once "../inc/footer.html";
?>