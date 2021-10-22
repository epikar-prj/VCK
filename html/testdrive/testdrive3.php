<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "testdrive";
$FOOTER_CODE = "buy";
$TITLE = "신청자 정보";

$currentPage = "03";
$endPage = "04";
$formAction = "/html/testdrive/testdrive4.php";

$name = "";
$email = "";
$hp = "";
$hp1 = "010";
$hp2 = "";
$hp3 = "";

if (isLogined()) {
    // $endPage = "03";
    $formAction = "/ajax/ajax.postTestdrive.php";

    $name = $_COOKIE['member_name'];
    $email = $_COOKIE['member_id'];
    $hp = format_phone($_COOKIE['member_hp']);

    $hp1 = explode("-", $hp)[0];
    $hp2 = explode("-", $hp)[1];
    $hp3 = explode("-", $hp)[2];
}


$model = $_GET['model'];
$showroom = $_GET['showroom'];

$timenow = date("Y-m-d H:i:s"); 
$timetarget = "2021-06-22 21:00:00";

$actionUrl = ($timenow <= $timetarget) ? "/html/testdrive/testdrive4.php" : "/html/testdrive/testdrive4_new.php";



include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <link rel="stylesheet" href="/html/testdrive/swiper.css">

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/buy.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
            <div class="page">
                <p><strong><?=$currentPage?></strong><span><?=$endPage?></span></p>
            </div>
        </div>

        <div id="visual">
            <img src="/images/testdrive/img_visual-1.jpg" alt="">
        </div>

        <div class="container">
			<form action="/html/testdrive/testdrive4.php" method="get" onsubmit="return checkValidate(this);">
                <input type="hidden" name="model" value="<?=$model?>">
                <input type="hidden" name="showroom" value="<?=$showroom?>">
				<div class="applicant">
					<strong class="input_tit">이름</strong>
					<div class="input_wrap name_wrap">
						<div class="input_box">
							<input type="text" name="name" value="<?=$name?>" placeholder="이름을 입력해주세요.">
						</div>
					</div>
					<strong class="input_tit">휴대 전화번호</strong>
					<div class="input_wrap phone_wrap">
						<div class="input_box">
							<select name="hp1">
                                <? foreach($OPTION_INFO['hp'] as $item) { 
                                        $selected = "";
                                        if ($item == $hp1) {
                                            $selected = " selected";
                                        }
                                ?>
								    <option value="<?=$item?>"<?=$selected?>><?=$item?></option>
                                <? } ?>
							</select>
						</div>
						<div class="input_box">
							<input type="text" name="hp2" pattern="\d*" value="<?=$hp2?>" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
						</div>
						<div class="input_box">
							<input type="text" name="hp3" pattern="\d*" value="<?=$hp3?>" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
						</div>
					</div>
					<strong class="input_tit">이메일</strong>
					<div class="input_wrap email_wrap">
						<div class="input_box">
							<input type="text" name="email" value="<?=$email?>" onkeydown="keyDown(event)" autocapitalize="off" autocorrect="off" placeholder="이메일을 입력해주세요.">
						</div>
					</div>
                    <?if ($timenow <= $timetarget) {?>
					<strong class="input_tit">성별</strong>
					<div class="choise_wrap gender_wrap">
						<input type="radio" name="sex" value="M" id="men">
						<label class="choise_box" for="men">남자</label>
						<input type="radio" name="sex" value="F" id="women">
						<label class="choise_box"for="women">여자</label>
					</div>
                    <?}?>
					<strong class="input_tit">생년월일</strong>
					<div class="input_wrap date_wrap">
						<div class="input_box">
							<select name="birth1">
								<option selected disabled value="">년</option>
								<?=setSelectBoxOptionYear();?>
							</select>
						</div>
						<div class="input_box">
							<select name="birth2">
								<option selected disabled value="">월</option>
								<?=setSelectBoxOptionMonth();?>
							</select>
						</div>
						<div class="input_box">
							<select name="birth3">
								<option selected disabled value="">일</option>
								<?=setSelectBoxOptionDay();?>
							</select>
						</div>
                    </div>
                    <strong class="input_tit">구매의향</strong>
                    <div class="input_wrap buy_check_wrap">
                        <div class="input_box">
                            <select name="buy_check">
                                <option selected disabled value="">구매의향을 선택하세요</option>
                                <option value="3">3개월 이내</option>
                                <option value="9">9개월 이내</option>
                                <option value="12">1년 이내</option>
                            </select>    
                        </div>
					</div>
				</div>
				<div class="btn_group">
                    <a href="javascript:history.back();" class="btn">이전</a>
                    <button type="submit" class="btn bg_color1">다음</button>
				</div>
			</form>
        </div>
    </div>

    <script src="/html/testdrive/script.js"></script>

    <script>
        $(window).on('load', function() {
            $(".input_box input[name=email]").focusout(function() {
                var id = $(this).val();
                $(this).val(id.replace(/\s/gi, ""));
            });
        })

        function checkValidate(_form) {
            if (!_form.name.value) {
                alert("이름을 입력해주세요");
                return false;
            }

            if (!_form.hp1.value) {
                alert("첫번째 자리 휴대 전화번호를 입력해주세요");
                return false;
            }
            if (!_form.hp2.value) {
                alert("두번째 자리 휴대 전화번호를 입력해주세요");
                return false;
            }
            if (!_form.hp3.value) {
                alert("세번째 자리 휴대 전화번호를 입력해주세요");
                return false;
            }
            
            if (!_form.email.value) {
                alert("이메일을 입력해주세요");
                return false;
            }

            if (!validate_email(_form.email.value)) {
                alert('이메일형식에 맞지 않습니다.');
                return false;
            }

            if (!_form.sex.value) {
                alert("성별을 선택해주세요");
                return false;
            }
            if (!_form.birth1.value) {
                alert("생년월일(연도)을 선택해주세요");
                return false;
            }
            if (!_form.birth2.value) {
                alert("생년월일(월)을 선택해주세요");
                return false;
            }
            if (!_form.birth3.value) {
                alert("생년월일(일)을 선택해주세요");
                return false;
            }

            if (!_form.buy_check.value) {
                alert("구매의향을 체크해주세요");
                return false;
            }

            
        };
        function postTextdrive(_form) {
            app.showOverlayProgress();
            
            var res;
            var data = $(_form).serializeObject();
            $.ajax({
                url:'/ajax/ajax.postTestdrive.php',
                type:'post',
                data: data,
                dataType: 'json',
                success: function(_res){
                    console.log(_res);
                    res = _res;
                }, complete: function() {
                    alert(res.msg);
                    app.hideOverlayProgress();
                    location.href='/html/testdrive/testdrive1.php';
                    // if (data.agree_reg == "Y") {
                    //     location.href='/html/member/join.php';
                    // } else {
                        
                    // }
                }, error: function(e) {
                    // alert("시승신청");
                    app.hideOverlayProgress();
                    console.log(e)
                }
            });
        }

        jQuery.fn.serializeObject = function() { var obj = null; try { if(this[0].tagName && this[0].tagName.toUpperCase() == "FORM" ) { var arr = this.serializeArray(); if(arr){ obj = {}; jQuery.each(arr, function() { obj[this.name] = this.value; }); } } }catch(e) { alert(e.message); }finally {} return obj; }
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>