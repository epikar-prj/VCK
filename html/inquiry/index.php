<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    if (!isLogined()) {
        MgMoveURL('/html/member/main.php');
    }

    $CODE = "inquiry";
    $FOOTER_CODE = "cscenter";
    $TITLE = "1:1 문의";

    $sql = " SELECT category FROM volvo_bbs_manage where sid = '4' ";
    $result = $db->select_one($sql);
    $categoryArr = explode("|", $result);

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/custom.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
        <div class="tabs">
            <ul>
                <li class="on"><a href="index.php">문의 하기</a></li>
                <li><a href="history.php">문의 내역 보기</a></li>
            </ul>
        </div>

		<div class="cont_ti_wrap">
			<div class="cont_ti">볼보 고객센터 1588-1777</div>
			<div class="cont_txt">문의사항이 있을 경우 1:1 문의를 남겨주세요.<br>
				고객님의 이메일로 문의 내용에 대한 답변을 드리겠습니다.<br>
				<br>
-	평일 09:00 ~ 18:00, 토요일 09:00 ~13:00<br>
-	긴급출동 및 견인: 연중무휴 24시간<br><br>
<span style="font-size:14px">* 정확한 답변을 위해 당일 답변이 어려울 수 있는 점<br> 많은 양해 부탁드립니다.</span>
			</div>
		</div>
		<div class="input_warp">
        <form action="write_ok.php" method="post" onsubmit="return checkValidate(this);">
            <input type="hidden" name="bm_sid" value="4">
            <input type="hidden" name="mode" value="write">
            <input type="hidden" name="name" value="<?=$_COOKIE['member_name']?>">
            
            <div class="input_select">
				<select name="category">
					<option value="" disabled selected>문의 유형</option>
                    <? foreach($categoryArr as $key => $value) { ?>
                    <option value="<?=$key?>"><?=$value?></option>
                    <? } ?>
				</select>
			</div>
			<div class="input_ti"><input type="text" name="title" placeholder="문의 내용 제목 입력"></div>
			<div class="input_txt"><textarea type="text" name="content" placeholder="문의 내용 입력"></textarea></div>
			<div class="info_wrap">
				<div class="info_ti">답변 받을 메일 선택</div>
				<div class="info_type">
					  <input type="radio" id="email_load" name="email_check" value="email_load" checked>
					  <label class="email_load" for="email_load"><span></span>가입시 이메일</label>
					  <input type="radio" id="email_write" name="email_check" value="email_write">
					  <label class="email_write" for="email_write"><span></span>메일 직접 입력</label>
				</div>
				<div class="info_input"><input id="emailInput" type="text" name="email" value="<?=$_COOKIE['member_id']?>" placeholder="이메일을 입력해주세요" readonly></div>
			</div>
		</div>
		<div class="btn_link"><button type="submit">문의하기</button></div>
		</form>
    </div>
</div>

    <script>
 /*       function checkValidate(_form) {
            if (_form.category.value == "") {
                alert("문의 유형을 선택해주세요");
                return false;
            }
            if (!_form.title.value) {
                alert("제목을 입력해주세요");
                return false;
            }
            if (!_form.content.value) {
                alert("문의 내용을 입력해주세요");
                return false;
            }
            if (!_form.email.value) {
                alert("이메일을 입력해주세요");
                return false;
            }
        }
*/

	   var submit_check;
		 submit_check = 'true';
        function checkValidate(_form) {
            app.showOverlayProgress()
            if (_form.category.value == "") {
                alert("문의 유형을 선택해주세요");
                app.hideOverlayProgress()
                return false;
            }
            if (!_form.title.value) {
                alert("제목을 입력해주세요");
                app.hideOverlayProgress()
                return false;
            }
            if (!_form.content.value) {
                alert("문의 내용을 입력해주세요");
                app.hideOverlayProgress()
                return false;
            }
            if (!_form.email.value) {
                alert("이메일을 입력해주세요");
                app.hideOverlayProgress()
                return false;
            }

			if(submit_check == 'false'){
                app.hideOverlayProgress()
				return false;
			}else{
				submit_check = 'false';
			}
        }
		

        $(".info_type input").on("change", function() {
            if ($(this).val() == "email_load") {
                $("#emailInput").val("<?=$_COOKIE["member_id"]?>");
                $("#emailInput").attr("readonly", true);
            } else {
                $("#emailInput").val("");
                $("#emailInput").attr("readonly", false);
            }
            
        });
	</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>