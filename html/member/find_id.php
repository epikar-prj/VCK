<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "아이디 찾기";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents" class="find_id">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/member/login.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
        <div class="find_id_wrap">
            <p>회원가입 시 입력하신 이름과 휴대폰 <br>번호를 입력하신 후 확인버튼을 누르면 <br>아이디를 찾을 수 있습니다.</p>
            <form method="POST" action="find_id_success.php" onsubmit="return checkValidate(this)">
                <input type="hidden" name="mode" value="hp_to_id">
                <input type="hidden" name="id" value="">
                <div class="input_wrap name_wrap">
					<div class="input_box">
						<input type="text" name="user_nm" placeholder="이름을 입력해주세요">
					</div>
				</div>
                <div class="phone_row">
                    <div class="phone_col">
                        <div class="input_wrap phone_wrap">
                            <div class="input_box">
                                <select name="hp1">
                                    <? foreach($OPTION_INFO['hp'] as $item) { ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="input_box">
                                <input type="text" name="hp2" pattern="\d*" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
                            </div>
                            <div class="input_box">
                                <input type="text" name="hp3" pattern="\d*" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn_group mt30">
					<button type="submit" class="btn bg_color1">확인</button>
				</div>
            </form>
        </div>
    </div>
</div>

<script>
function checkValidate(_form) {
    if (!_form.user_nm.value ) {
        alert("이름을 입력해주세요");
        return false;
    }

    if (_form.hp2.value == '') {
        alert('가운데자리 휴대전화 번호를 입력해주세요');
        _form.hp2.focus();
        return false;
    }
        
    if (_form.hp3.value == '') {
        alert('끝자리 휴대전화 번호를 입력해주세요');
        _form.hp3.focus();
        return false;
    }
    getIDPW(_form);
    return false;
}

function getIDPW(_form) {
    app.showOverlayProgress();
    var res;

    $.ajax({
        url:'/ajax/ajax.getIDPW.php',
        type:'post',
        data: {mode: _form.mode.value, cust_nm: _form.user_nm.value, hp1: _form.hp1.value, hp2: _form.hp2.value, hp3: _form.hp3.value},
        dataType: 'json',
        success: function(_res){
            console.log(_res);
            res = _res;
        }, complete: function() {
            var result = res.result;
            var resultData = res.resultData[0];

            if (result == 'success') {
                _form.id.value = resultData.id;
                _form.submit();
            } else {
                alert(result);
            }
            app.hideOverlayProgress()
        }, error: function(e) {
            app.hideOverlayProgress()
            console.log(e)
        }
    });
}
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>