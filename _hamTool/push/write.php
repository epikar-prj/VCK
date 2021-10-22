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

	<form method="post" name="writeForm" id="writeForm" action="write_ok.php" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?=$mode?>">
	<table class="table hr-table">
		<colgroup>
			<col width="130px" /><col width="*" />
		</colgroup>
		<tbody>
            <tr>
				<th scope="row" class="hr-table-th">DEVICE</th>
				<td class="hr-table-td">
                    <label for="option_type1"><input type="radio" name="push_device" id="option_type1" value="all" checked style="display: inline-block;">ALL</label>
                    <label for="option_type2"><input type="radio" name="push_device" id="option_type2" value="ios" style="display: inline-block;">iOS</label>
                    <label for="option_type3"><input type="radio" name="push_device" id="option_type3" value="android" style="display: inline-block;">ANDROID</label>
                </td>
			</tr>
            <tr>
				<th scope="row" class="hr-table-th">유저구분</th>
				<td class="hr-table-td">
                    <label for="option_type4"><input type="radio" name="push_user" id="option_type4" value="all" checked style="display: inline-block;">ALL</label>
                    <label for="option_type5"><input type="radio" name="push_user" id="option_type5" value="owner" style="display: inline-block;">OWNER</label>
                </td>
			</tr>
            <tr>
				<th scope="row" class="hr-table-th">링크</th>
				<td class="hr-table-td"><input type="text" name="link" id="link" class="input full" /></td>
			</tr>
            <tr>
				<th scope="row" class="hr-table-th">내용</th>
				<td class="hr-table-td tall">
                    <textarea name="content" id="content" cols="74" rows="20" class="textarea full2"></textarea>
                </td>
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