<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

	$sid = $_COOKIE['member_sid'];
	$master_cust_cd = $_COOKIE['master_cust_cd'];
	$id = $_COOKIE['member_id'];
    $nm = $_COOKIE['member_name'];

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php');
    }
    
    $sql = " SELECT sid, cust_nm, use_sms_recept_yn, use_email_recept_yn, use_push_recept_yn, use_loc_service_yn, use_dm_recept_yn FROM volvo_user WHERE master_cust_cd = '" . $master_cust_cd . "'";

	$row=$db->fetch_array($sql)[0];

    if (!$nm) {
        $nm = $row['cust_nm'];
    }

    $use_sms_recept_yn = $row['use_sms_recept_yn'] == "Y" ? "Y" : "N";
    $use_email_recept_yn = $row['use_email_recept_yn'] == "Y" ? "Y" : "N";
    $use_push_recept_yn = $row['use_push_recept_yn'] == "Y" ? "Y" : "N";
    $use_loc_service_yn = $row['use_loc_service_yn'] == "Y" ? "Y" : "N";
    $use_dm_recept_yn = $row['use_dm_recept_yn'] == "Y" ? "Y" : "N";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/member/member_menu.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="modify">
			<h4>회원 개인정보</h4>
			<form name="modifyForm" action="javascript: void(0)" onsubmit="return checkValidate(this);">
			    <input type="hidden" name="user_sid" value="<?=$row['sid']?>">
			    <input type="hidden" name="master_cust_cd" value="<?=$master_cust_cd?>">
				<div class="privacy">
					<!--<h5>회원 개인정보</h5>-->
					<strong class="input_tit">ID (E-mail)</strong>
					<div class="input_wrap email_wrap">
						<div class="input_box">
							<input type="text" name="email" value="<?=$id?>" style="background-color:#fafafa;"  disabled >
						</div>
					</div>
					<strong class="input_tit">고객명</strong>
					<div class="input_wrap name_wrap">
						<div class="input_box">
							<input type="text" name="name" value="<?=$row["cust_nm"]?>" style="background-color:#fafafa;"  disabled >
						</div>
                    </div>
                    <strong class="input_tit">현재 비밀번호</strong>
					<div class="input_wrap password_wrap">
						<div class="input_box">
							<input type="password" name="cur_pw" maxlength="20" value="" placeholder="비밀번호를 입력해주세요.">
						</div>
					</div>
					<strong class="input_tit">비밀번호 변경</strong>
					<div class="input_wrap password_wrap">
						<div class="input_box">
							<input type="password" name="user_pw" maxlength="20" value="" placeholder="비밀번호를 입력해주세요.">
						</div>
					</div>
					<strong class="input_tit">비밀번호 변경 확인</strong>
					<div class="input_wrap password_re_wrap">
						<div class="input_box">
							<input type="password" name="user_pw_re" maxlength="20" value="" placeholder="비밀번호를 다시 입력해주세요.">
						</div>
					</div>
				</div>
<!--                <strong class="input_tit">차량번호</strong>
                <div class="input_wrap car_number_wrap2">
                    <label><input name="car_type[]" type="radio" checked><span>차량번호</span></label>
                    <label><input name="car_type[]" type="radio"><span>차대번호</span></label>
                </div>
				<div class="input_wrap car_number_wrap">
					<div class="input_box">
						<input type="text" name="car_number" placeholder="[선택] 차량번호나 차대번호를 입력해주세요.">
                    </div>
                </div>-->
				<div id="agree" class="agree">
					<strong class="input_tit">마케팅 약관 동의</strong>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] SMS 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="use_sms_recept_yn" class="agree_chk" type="checkbox" <?if ($row['use_sms_recept_yn'] == "Y") { echo "checked";}?>>
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] E-mail 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(5);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="use_email_recept_yn" class="agree_chk" type="checkbox" <?if ($row['use_email_recept_yn'] == "Y") { echo "checked";}?>>
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] PUSH 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(6);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="use_push_recept_yn" class="agree_chk" type="checkbox" <?if ($row['use_push_recept_yn'] == "Y") { echo "checked";}?>>
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] DM수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(8);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="use_dm_recept_yn" class="agree_chk" type="checkbox" <?if ($row['use_dm_recept_yn'] == "Y") { echo "checked";}?>>
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] 위치기반 서비스 이용 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(7);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="use_loc_service_yn" class="agree_chk" type="checkbox" <?if ($row['use_loc_service_yn'] == "Y") { echo "checked";}?>>
                        </div>
                    </div>
				</div>
				<!--<div class="receive">
					<strong>예약 정보 수신 채널 선택</strong>
					<div>
						<label><input class="channel_reservation" type="checkbox" name="channel_reservation_sms" value="Y" <?if ($row['channel_reservation_sms'] == 'Y') { echo "checked"; }?> ><span>SMS</span></label>
						<label><input class="channel_reservation" type="checkbox" name="channel_reservation_email" value="Y" <?if ($row['channel_reservation_email'] == 'Y') { echo "checked"; }?>><span>이메일</span></label>
						<label><input class="channel_reservation" type="checkbox" name="channel_reservation_push" value="Y" <?if ($row['channel_reservation_push'] == 'Y') { echo "checked"; }?>><span>App Push</span></label>
					</div>
					<strong>마케팅/캠페인 수신 채널 선택</strong>
					<div>
						<label><input class="channel_marketing" type="checkbox" name="channel_marketing_sms" value="Y" <?if ($row['channel_marketing_sms'] == 'Y') { echo "checked"; }?>><span>SMS</span></label>
						<label><input class="channel_marketing" type="checkbox" name="channel_marketing_email" value="Y" <?if ($row['channel_marketing_email'] == 'Y') { echo "checked"; }?>><span>이메일</span></label>
						<label><input class="channel_marketing" type="checkbox" name="channel_marketing_push" value="Y" <?if ($row['channel_marketing_push'] == 'Y') { echo "checked"; }?>><span>App Push</span></label>
					</div>
				</div>-->
				<div class="btn_group mt30">
					<a href="javascript: void(0)" onclick="dropUser();" class="btn">회원탈퇴</a>
					<button type="submit" class="btn bg_color1">확인</button>
				</div>
			</form>
		</div>
    </div>
</div>

<div id="agree4_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>SMS 수신 및 마케팅 활용에 대한 동의(선택)</h3>
        <strong>1. 수집 목적 및 이용 내역</strong>
        <p>새로운 정보의 업데이트 또는 이벤트 소식, 경품 당첨자 선정, 시승 안내</p>
        <p>- 새로운 이벤트 안내: 이름, 휴대전화번호</p>
        <p>- 기타 각종 마케팅 활동(로열티 프로그램 등 홍보 및 판촉 활동): 이름, 휴대전화번호, 이메일</p>
        <p>- 시승 안내 (시승 신청 시): 이름, 휴대전화번호, 이메일, 생년월일, 성별</p>
        <strong>2. 개인정보 보유 및 이용 기간</strong>
        <p>- 이용 목적 달성 시 (철회 요청은 고객센터 1588-1777로 연락해주시기 바랍니다.)</p>
    </div>
</div>

<div id="agree5_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>E-mail 수신 및 마케팅 활용에 대한 동의(선택)</h3>
        <strong>1. 수집 목적 및 이용 내역</strong>
        <p>새로운 정보의 업데이트 또는 이벤트 소식, 경품 당첨자 선정, 시승 안내</p>
        <p>- 새로운 이벤트 안내: 이름, 휴대전화번호</p>
        <p>- 기타 각종 마케팅 활동(로열티 프로그램 등 홍보 및 판촉 활동): 이름, 휴대전화번호, 이메일</p>
        <p>- 시승 안내 (시승 신청 시): 이름, 휴대전화번호, 이메일, 생년월일, 성별</p>
        <strong>2. 개인정보 보유 및 이용 기간</strong>
        <p>- 이용 목적 달성 시</p>
        <p>동의 후에도 언제든지 이를 철회할 수 있으며, 동의 철회 및 변경은 My Volvo - 회원정보 수정에서 변경 가능합니다.</p>
    </div>
</div>

<div id="agree6_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>PUSH 수신 및 마케팅 활용에 대한 동의(선택)</h3>
        <strong>1. 수집 목적 및 이용 내역</strong>
        <p>새로운 정보의 업데이트 또는 이벤트 소식, 경품 당첨자 선정, 시승 안내</p>
        <p>- 새로운 이벤트 안내: 이름, 휴대전화번호</p>
        <p>- 기타 각종 마케팅 활동(로열티 프로그램 등 홍보 및 판촉 활동): 이름, 휴대전화번호, 이메일</p>
        <p>- 시승 안내 (시승 신청 시): 이름, 휴대전화번호, 이메일, 생년월일, 성별</p>
        <strong>2. 개인정보 보유 및 이용 기간</strong>
        <p>- 이용 목적 달성 시</p>
        <p>동의 후에도 언제든지 이를 철회할 수 있으며, 동의 철회 및 변경은 My Volvo - 회원정보 수정에서 변경 가능합니다.</p>
    </div>
</div>

<div id="agree7_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>위치기반 서비스 이용 동의(선택)</h3>
        <p>볼보자동차코리아는 서비스 중 가까운 전시장이나 서비스센터 정보 제공을 위해 위치정보보호법 제 15조에 따라 개인 위치정보의 활용에 대한 동의를 받습니다.</p>
        <strong>1. 정보 제공 목적</strong>
        <p>- 가까운 전시장 및 서비스센터 정보 제공</p>
        <strong>2. 활용 항목</strong>
        <p>- Mobile App 실행 단말기 위치</p>
        <p>회원님께서는 동의를 거부할 권리가 있습니다. 단, 동의를 거부할 경우 수집목적에 나열된 서비스 제공에 제약이 있을 수 있습니다. 동의 후에도 언제든지 이를 철회할 수 있으며, 동의 철회 및 변경은 My Volvo - 회원정보 수정에서 변경 가능합니다.</p>
    </div>
</div>

<div id="agree8_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>DM수신 및 마케팅 활용에 대한 동의(선택)</h3>
        <strong>1. 수집 목적 및 이용 내역</strong>
        <p>새로운 정보의 업데이트 또는 이벤트 소식, 다양한 혜택 등을 우편형태로 제작 고객님의 주소지로 발송</p>
        <p>- 새로운 이벤트 안내: 이름, 휴대전화번호, 주소</p>
        <p>- 기타 각종 마케팅 활동(로열티 프로그램 등 홍보 및 판촉 활동): 이름, 휴대전화번호, 이메일, 주소</p>
        <strong>2. 개인정보 보유 및 이용 기간</strong>
        <p>- 이용 목적 달성 시 </p>
        <p>동의 후에도 언제든지 이를 철회할 수 있으며, 동의 철회 및 변경은 My Volvo - 회원정보 수정에서 변경 가능합니다.</p>
    </div>
</div>

<script>
    $(window).on('load',function(){
        $(".input_box input[name=user_pw]").on('blur',function() {
			var user_pw = $(".input_box input[name=user_pw]").val();
            if(user_pw == ''){
				return false;
			}else{
				chkPW($(this).val());
				return false;
			};
		});

        $(".input_box input[name=user_pw_re]").on('blur',function() {
		   var user_pw = $(".input_box input[name=user_pw]").val();
           var user_pw_re = $(".input_box input[name=user_pw_re]").val();
			   if(user_pw_re == ''){
					return false;
			   }else if (user_pw != user_pw_re) {
                    alert('비밀번호가 일치하지 않습니다.');
					return false;
			};
        });
	});

	function open_pop(type){
        $('#agree'+type+'_pop').show();
        $('#agree'+type+'_pop').animate({
            top : 0,
        },500);
    }

    function close_pop(){
        $('.agree_pop').show();
        $('.agree_pop').animate({
            top : '100vh',
        },500, function() {
            $('.agree_pop').hide();
        });
    }

	// $('.channel_reservation').on('change', function() {
	// 	if (!$(this).is(":checked")) {
	// 		var count = 0;
	// 		$('.channel_reservation').each(function(index, checkbox) {
	// 			if ($(checkbox).is(":checked")) {
	// 				count ++;
	// 			}
	// 		});
	// 		if (count == 0) {
	// 			alert('최소 1개 이상의 예약 정보 수신 채널을 선택해야합니다.');
	// 			$(this).prop('checked', true);
	// 		}
	// 	}
	// });

	// $('.channel_marketing').on('change', function() {
	// 	if (!$(this).is(":checked")) {
	// 		var count = 0;
	// 		$('.channel_marketing').each(function(index, checkbox) {
	// 			if ($(checkbox).is(":checked")) {
	// 				count ++;
	// 			}
	// 		});
	// 		if (count == 0) {
	// 			alert('최소 1개 이상의 예약 정보 수신 채널을 선택해야합니다.');
	// 			$(this).prop('checked', true);
	// 		}
	// 	}
    // });
    
    function checkPw() {
        var _form = document.modifyForm
        
        var res;
        
        $.ajax({
            url:'/ajax/ajax.getCheckPw.php',
            type:'post',
            data: {pw: _form.cur_pw.value},
            dataType: 'json',
            success: function(_res){
                res = _res;
            }, complete: function() {
                var result = res.result;
                var resultData = res.resultData[0];
                console.log(result)
                if (result == 'success') {
                    if (!chkPW(_form.user_pw.value)) {
                        app.hideOverlayProgress();
                        return false;
                    }

                    if (_form.cur_pw.value == _form.user_pw.value) {
                        alert("현재 비밀번호와 동일한 비밀번호를 입력하셨습니다.");
                        _form.user_pw.focus();
                        app.hideOverlayProgress();
                        return false;
                    }
                    if (!_form.user_pw.value) {
                        alert("비밀번호는 공백 없이 8자리 이상 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
                        _form.user_pw.focus();
                        app.hideOverlayProgress();
                        return false;
                    }
                    if (!_form.user_pw_re.value) {
                        alert("비밀번호는 공백 없이 8자리 이상 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
                        _form.user_pw_re.focus();
                        app.hideOverlayProgress();
                        return false;
                    }
                    if ((_form.user_pw.value != _form.user_pw_re.value)) {
                        alert("비밀번호가 일치하지 않습니다.");
                        _form.user_pw_re.focus();
                        app.hideOverlayProgress();
                        return false;
                    }

                    updateUser();
                } else {
                    alert("현재 비밀번호가 맞지 않습니다.");
                    app.hideOverlayProgress();
                }
            }, error: function(e) {
                console.log(e)
            }
        });
    }

    function updateUser() {
        var _form = document.modifyForm

        var use_sms_recept_yn = _form.use_sms_recept_yn.checked ? 'Y' : 'N';
		var use_email_recept_yn = _form.use_email_recept_yn.checked ? 'Y' : 'N';
		var use_push_recept_yn = _form.use_push_recept_yn.checked ? 'Y' : 'N';
		var use_loc_service_yn = _form.use_loc_service_yn.checked ? 'Y' : 'N';
		var use_dm_recept_yn = _form.use_dm_recept_yn.checked ? 'Y' : 'N';


		var data = {
			master_cust_cd: _form.master_cust_cd.value,
			id: _form.email.value,
			pw: _form.user_pw.value,
			user_sid: _form.user_sid.value,
			use_sms_recept_yn: use_sms_recept_yn,
			use_email_recept_yn: use_email_recept_yn,
			use_push_recept_yn: use_push_recept_yn,
			use_loc_service_yn: use_loc_service_yn,
			use_dm_recept_yn: use_dm_recept_yn
        };
        
        var res;
        $.ajax({
            url: '/ajax/ajax.updateUser.php',
            type:'post',
            data: data,
            dataType: 'json',
            success: function(_res){
                console.log(_res)
                res = _res;
            }, complete: function() {
                var result = res.result;
                var resultData = res.resultData[0];

                if (result == 'success') {
                    alert("개인정보가 수정되었습니다.");
                    app.hideOverlayProgress()
                    location.href = "/html/member/member_menu.php";
                }
            }, error: function(e) {
                app.hideOverlayProgress()
                console.log(e)
            }
        });
    }

	function checkValidate(_form) {
        if (!_form.use_sms_recept_yn.checked) {
            var result = confirm("SMS 수신 미동의 시 볼보자동차코리아의 마케팅 소식을 받아 보실 수 없으며,\n이벤트 참여 등에 제한이 있을 수 있습니다.");
            
            if(!result){
                _form.use_sms_recept_yn.focus();
                return false;
            }
        }
        
        app.showOverlayProgress();
        
		if (_form.cur_pw.value || _form.user_pw.value || _form.user_pw_re.value) {
            checkPw();
        } else {
            var use_sms_recept_yn = _form.use_sms_recept_yn.checked ? 'Y' : 'N';
            var use_email_recept_yn = _form.use_email_recept_yn.checked ? 'Y' : 'N';
            var use_push_recept_yn = _form.use_push_recept_yn.checked ? 'Y' : 'N';
            var use_loc_service_yn = _form.use_loc_service_yn.checked ? 'Y' : 'N';
            var use_dm_recept_yn = _form.use_dm_recept_yn.checked ? 'Y' : 'N';

            console.log('sms : '+ use_sms_recept_yn)
            console.log('email : '+ use_email_recept_yn)
            console.log('push : '+ use_push_recept_yn)
            console.log('loc : '+ use_loc_service_yn)
            console.log('dm : '+ use_dm_recept_yn)

            if ( (use_sms_recept_yn == "<?=$use_sms_recept_yn?>") &&
            (use_email_recept_yn == "<?=$use_email_recept_yn?>") &&
            (use_push_recept_yn == "<?=$use_push_recept_yn?>") &&
            (use_loc_service_yn == "<?=$use_loc_service_yn?>") &&
            (use_dm_recept_yn == "<?=$use_dm_recept_yn?>") ) {
                alert("정보 변경이 없습니다. 이전 페이지로 돌아갑니다"); 
                app.hideOverlayProgress()
                location.href = "/html/member/member_menu.php";
                return false;
            }

            updateUser();
        }
		return false;
    }
    
    function dropUser() {
        app.showOverlayProgress();

        var conf = confirm("앱 회원탈퇴를 진행하시겠습니까?");
        if (conf) {
            var res;
            $.ajax({
                url: '/ajax/ajax.postDropUser.php',
                type:'post',
                dataType: 'json',
                success: function(_res){
                    console.log(_res)
                    res = _res;
                }, complete: function() {
                    var result = res.result;
                    var resultData = res.resultData[0];

                    if (result == 'success') {
                        alert("앱 회원 탈퇴가 완료되었습니다.");
                        logout();
                    } else {
                        if (result) {
                            alert(result);
                            if (res.errorcode == "NotExistsUser") {
                                logout()
                            }
                        } else {
                            alert("잠시 후 다시 시도해주세요.");
                        }
                    }
                    app.hideOverlayProgress();
                }, error: function(e) {
                    app.hideOverlayProgress();
                    console.log(e)
                }
            });
        } else {
            app.hideOverlayProgress();
        }
    }

    function logout() {
        var res;
        $.ajax({
            url:'/ajax/ajax.logout.php',
            type:'get',
            dataType: 'text',
            success: function(_res){
                // console.log(_res);
                res = _res;
            }, complete: function() {
                if (res) {
                    window.localStorage.setItem('member_sid', '');
                    window.localStorage.setItem('member_id', '');
                    window.localStorage.setItem('member_name', '');
                    window.localStorage.setItem('master_cust_cd', '');
                    window.localStorage.setItem('member_hp', '');
                    window.localStorage.setItem('owner_flag', '');
                    window.localStorage.setItem('location', '');

                    // app.deleteAllCookies();

                    // alert("로그아웃 되었습니다.");
                    location.href = "/index.php";
                }
            }, error: function(e) {
                console.log(e)
            }
        });
    }
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>