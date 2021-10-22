<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    $name = PARAM2('name');
    $email = PARAM2('email');
    $hp1 = PARAM2('hp1');
    $hp2 = PARAM2('hp2');
    $hp3 = PARAM2('hp3');

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="join">
			<form name="joinForm" method="POST" action="join_update.php" onsubmit="return check_validate(this);">
                <input type="hidden" name="mode" value="w">
                <input type="hidden" name="certi" value="1">
                <input type="hidden" name="user_id" value="">
                <strong class="input_tit">ID (E-mail)</strong>
				<div class="input_wrap email_wrap">
					<div class="input_box">
						<input type="text" name="email1" value="<?=$email?>" onkeydown="keyDown(event)" autocapitalize="off" autocorrect="off" placeholder="example">
					</div>
					<div class="email_at">@</div>
					<div class="input_box">
						<input type="text" name="email2" id="email2" value="<?=$email?>" autocapitalize="off" autocorrect="off" placeholder="volvo.com">
					</div>
				</div>
				<div class="input_wrap email_select_wrap">
					<div class="input_box">
                        <select name="email_com" id="selectEmail">
                            <option value="" selected>직접 입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="daum.net">daum.net</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                            <option value="outlook.com">outlook.com</option>
                        </select>
					</div>
				</div>
				<strong class="input_tit">비밀번호</strong>
				<div class="input_wrap password_wrap">
					<div class="input_box">
						<input type="password" name="user_pw" maxlength="20" placeholder="비밀번호를 입력해주세요.">
                    </div>
				</div>
				<div class="pw_caption">공백 없이 8자리 이상 영문, 숫자, 특수문자를 혼합하여 입력해주세요.</div>
				<strong class="input_tit">비밀번호 확인</strong>
				<div class="input_wrap password_re_wrap">
					<div class="input_box">
						<input type="password" name="user_pw_re" maxlength="20" placeholder="비밀번호를 다시 입력해주세요.">
					</div>
				</div>
				<strong class="input_tit">이름(계약자)</strong>
				<div class="input_wrap name_wrap">
					<div class="input_box">
						<input type="text" name="user_nm" value="<?=$name?>" placeholder="이름을 입력해주세요.">
					</div>
				</div>
				
				<!--<strong class="input_tit">볼보 차량 소유 여부</strong>
                <div class="input_wrap car_number_wrap2">
                    <label><input id="car_no" name="member_type" type="radio" value="own" checked><span>소유</span></label>
                    <label><input id="vehicle_no" name="member_type" type="radio" value="wanna"><span>미소유</span></label>
                </div>-->
                
				<!--<strong class="input_tit">차량번호</strong>
                <div class="input_wrap car_number_wrap2">
                    <label><input id="car_no" name="car_type" type="radio" value="1" checked><span>차량번호</span></label>
                    <label><input id="vehicle_no" name="car_type" type="radio" value="2"><span>차대번호</span></label>
                </div>
				<div class="input_wrap car_number_wrap">
					<div class="input_box">
						<input type="text" name="car_number" placeholder="[선택] 차량번호나 차대번호를 입력해주세요.">
                    </div>
                </div>-->

				<strong class="input_tit">휴대 전화번호</strong>
				<div class="phone_row">
                    <div class="phone_col">
                        <div class="input_wrap phone_wrap" style="display: flex;">
                            <div class="input_box">
                                <input type="text" name="hp1" value="<?=$hp1?>" maxlength="3" >
                            </div>
                            <div class="input_box">
                                <input type="text" name="hp2" value="<?=$hp2?>" maxlength="4" >
                            </div>
                            <div class="input_box">
                                <input type="text" name="hp3" value="<?=$hp3?>" maxlength="4" >
                            </div>
                        </div>
                       <a href="javascript: void(0)" class="btn phone_certification" onclick="openCerti()" style="display: flex;">휴대폰 인증</a>
                    </div>
                    <!-- <div class="phone_col">
                        <div class="input_wrap phone_wrap">
                            <div class="input_box">
                                <input type="text" name="" placeholder="인증번호를 입력해주세요">
                            </div>
                        </div>
                        <button class="btn phone_certification">인증번호 확인</button>
                    </div> -->
				</div>

                <strong class="input_tit agree_tit">개인정보 수집 및 마케팅 활용 동의</strong>
                <div class="agree_all">
                    <label for="checkall"><span>모두 동의 합니다.</span><input id="checkall" type="checkbox" onchange="all_check(this)"></label>
                </div>
				<div id="agree" class="agree">
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree1"><span>[필수] 개인정보 수집 및 이용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(1);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree1" name="agree1" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree2"><span>[필수] 개인정보 처리 및 위탁에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(2);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree2" name="agree2" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree3"><span>[필수] 개인정보 제3자 제공 및 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(3);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree3" name="agree3" class="agree_chk" type="checkbox">
                        </div>
                    </div>
				</div>
				<div id="agree" class="agree">
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree4"><span>[선택] SMS 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree4" name="agree4" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree5"><span>[선택] E-mail 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(5);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree5" name="agree5" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree6"><span>[선택] PUSH 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(6);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree6" name="agree6" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree8"><span>[선택] 광고/정보 수신(DM) 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(8);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree8" name="agree8" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label for="agree7"><span>[선택] 위치기반 서비스 이용 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(7);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input id="agree7" name="agree7" class="agree_chk" type="checkbox">
                        </div>
                    </div>
				</div>
				<div class="btn_group mt30">
					<button type="reset" class="btn btn_cancel">취소</button>
					<button type="submit" class="btn bg_color1">확인</button>
				</div>
			</form>
        </div>
    </div>
    
</div>

<div id="agree1_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>개인정보 수집 및 이용에 대한 동의(필수)</h3>
        <div class="cntn">
            <p>회사는 고객님께 더 향상된 양질의 서비스를 제공하기 위하여 고객의 개인정보를 수집하고 있습니다.<br>회사는 고객님의 사전 동의 없이는 개인정보를 함부로 공개하지 않으며, 당사가 수집한 개인정보는 다음의 목적을 위해 활용합니다.</p>
            <strong>1. 수집하는 개인정보</strong>
            <p>- 필수항목: 성명, 휴대전화번호, 이메일, 생년월일, 성별</p>
            <p>- 선택항목: 선호 차종(시승 신청 시)</p>
            <strong>2. 수집 목적 및 이용 내역</strong>
            <p>1. 본인확인</p>
            <p>시승 예약 신청 진행을 위한 본인 식별 및 부정 이용 방지</p>
            <p>2. 본인확인</p>
            <p>새로운 정보의 업데이트 또는 이벤트 소식, 경품 당첨자 선정, 시승 안내</p>
            <p>새로운 이벤트 안내: 성명, 휴대전화번호</p>
            <p>기타 각종 마케팅 활동(로열티 프로그램 등 홍보 및 판촉 활동): 성명, 휴대전화번호, 이메일</p>
            <p>시승 안내 (시승 신청 시): 성명, 휴대전화번호, 이메일, 생년월일, 성별</p>
            <p>3. 개인정보 보유 및 이용 기간</p>
            <p>- 이용 목적 달성 시 (철회 요청은 고객센터 1588-1777로 연락해주시기 바랍니다.)</p>
        </div>
    </div>
</div>

<div id="agree2_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>개인정보 처리 및 위탁에 대한 동의(필수)</h3>
        <p>회사는 서비스 이행을 위해 아래와 같이 개인정보 처리업무를 외부 전문업체에 위탁하여 운영하고 있습니다.</p>
        <strong>1. 개인정보 처리 및 위탁자</strong>
        <p>업체 : (주)마이테이블, (주)컴나래소프트</p>
        <strong>2. 개인정보 처리 및 위탁 목적</strong>
        <p>홈페이지 시스템 개발/유지/보수, 행사 안내/진행</p>
        <p>위탁계약 시 개인정보보호의 안전을 기하기 위하여 개인정보보호 관련 지시 엄수, 개인정보에 관한 금지 및 사고 시의 책임부담 등을 명확히 규정하고 당해 계약 내용을 서면 및 전자적으로 보관하고 있습니다.</p>
    </div>
</div>

<div id="agree3_pop" class="agree_pop" style="display: none;">
    <div class="top">
        <div class="back">
            <a href="javascript: void(0)" onclick="close_pop()">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4>마케팅 약관 동의</h4>
    </div>

    <div class="middle">
        <h5>개인정보 제 3자 제공 및 활용에 대한 동의(필수)</h3>
        <strong>1. 제공받는 자</strong>
        <p>- 볼보자동차코리아(주) 및 계약관계에 있는 대행사</p>
        <p>- 볼보자동차코리아(주) 및 공식 딜러사</p>
        <p>* 참조: 볼보자동차코리아(주) 홈페이지 www.volvocars.co.kr 의 ‘개인정보 취급방침’에 고지</p>
        <strong>2. 제공받는 자의 이용목적</strong>
        <p>- 차량 구매 고객 및 이벤트, 캠페인 참여고객에 대한 서비스 제공 및 기타 마케팅 활동</p>
        <strong>3. 제공하는 개인정보 항목</strong>
        <p>- 성명, 휴대전화번호, 이메일, 생년월일, 성별, 선호 차종(시승 신청 시)</p>
        <strong>4. 개인정보의 보유 및 이용 기간</strong>
        <p>- 이용 목적 달성 시 (철회 요청은 고객센터 1588-1777로 연락해주시기 바랍니다.)</p>
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
        <h5>위치정보 활용 동의(선택)</h3>
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
        <h5>광고/정보 수신(DM) 및 마케팅 활용에 대한 동의(선택)</h3>
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

        $('#selectEmail').on("change", function() {
            var val = $(this).val();

            if (val != "self") {
                $("#email2").val(val);
                $("#email2").attr('readonly', true);
            } else {
                $("#email2").val("");
                $("#email2").attr('readonly', false);
            }
        });


		$('.btn_cancel').click(function(){
			location.href="/html/member/login.php"
        })

        $(".input_box input[name=user_id]").on('blur',function() {
           var id = $(this).val();
           $(this).val(id.replace(/\s/gi, ""));
        });
        
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
            opacity: 1
        },500);
    }

    function close_pop(){
        $('.agree_pop').show();
        $('.agree_pop').animate({
            top : '100vh',
            opacity: 0
        },500, function() {
            $('.agree_pop').hide();
        });
    }

    function all_check(checkbox) {
        var agreeBoxes = document.getElementsByClassName('agree_chk');
        for (var i = 0; i < agreeBoxes.length; i ++) {
            agreeBoxes[i].checked = checkbox.checked;
        }
    }

    function check_validate(f) {
        app.showOverlayProgress()
        // if (f.user_id.value == '') {
        //     alert('아이디를 입력해주세요');
        //     f.user_id.focus();
        //     app.hideOverlayProgress();
		// 	return false;
        // }

        // if (!validate_email(f.user_id.value)) {
        //     alert('아이디형식에 맞지 않습니다.');
        //     f.user_id.focus();
        //     app.hideOverlayProgress();
        //     return false;
        // }

        if (f.email1.value == '') {
            alert('아이디를 입력해주세요');
            f.email1.focus();
            app.hideOverlayProgress();
			return false;
        }

        if (f.email2.value == '') {
            alert('이메일을 입력해주세요');
            f.email2.focus();
            app.hideOverlayProgress();
			return false;
        }

        var email = f.email1.value + "@" + f.email2.value;
        if (!validate_email(email)) {
            alert('아이디형식에 맞지 않습니다.');
            f.email1.focus();
            app.hideOverlayProgress();
            return false;
        }

        f.user_id.value = email;
        
        if (f.user_pw.value == '') {
            alert('비밀번호를 입력해주세요');
            f.user_pw.focus();
            app.hideOverlayProgress();
            return false;
        }

        if (!chkPW(f.user_pw.value)) {
            app.hideOverlayProgress();
            return false;
        }
        
        if (f.user_pw_re.value == '') {
            alert('비밀번호 확인을 입력해주세요');
            f.user_pw_re.focus();
            app.hideOverlayProgress();
            return false;
        }
        
        if (f.user_pw.value != f.user_pw_re.value) {
            alert('비밀번호가 일치하지 않습니다.');
            // f.user_pw_re.focus();
            app.hideOverlayProgress();
            return false;
        }
        
        if (f.user_nm.value == '') {
            alert('이름을 입력해주세요');
            f.user_nm.focus();
            app.hideOverlayProgress();
            return false;
        }
        
        if (!f.certi.value) {
            alert('휴대폰 인증을 해주세요');
            f.hp3.focus();
            app.hideOverlayProgress();
            return false;
        }

        if (!f.agree1.checked) {
            alert('개인정보 수집 및 이용에 대한 동의에 체크해주세요');
            f.agree1.focus();
            app.hideOverlayProgress();
            return false;
        }

        if (!f.agree2.checked) {
            alert('개인정보 처리 및 위탁에 대한 동의에 체크해주세요');
            f.agree2.focus();
            app.hideOverlayProgress();
            return false;
        }

        if (!f.agree3.checked) {
            alert('개인정보 제3자 제공 및 활용에 대한 동의에 체크해주세요');
            f.agree3.focus();
            app.hideOverlayProgress();
            return false;
        }

        if (!f.agree4.checked) {
            var result = confirm("SMS 수신 미동의 시 볼보자동차코리아의 마케팅 소식을 받아 보실 수 없으며,\n이벤트 참여 등에 제한이 있을 수 있습니다. 회원가입을 진행하시겠습니까?");
            
            if(!result){
                f.agree4.focus();
                app.hideOverlayProgress();
                return false;
            }
        }

        if (f.agree4.checked || f.agree5.checked || f.agree6.checked || f.agree7.checked || f.agree8.checked) {
            var today = new Date();   
            var year = today.getFullYear(); // 년도
            var month = today.getMonth() + 1;  // 월
            var date = today.getDate();  // 날짜

            var agreeList = [];
            
            if (f.agree4.checked) {
                agreeList.push("SMS");
            }

            if (f.agree5.checked) {
                agreeList.push("E-mail");
            }

            if (f.agree6.checked) {
                agreeList.push("PUSH");
            }
            
            if (f.agree8.checked) {
                agreeList.push("DM");
            }

            if (f.agree7.checked) {
                agreeList.push("위치기반 서비스");
            }

            alert(f.user_nm.value + "님께서 " + year + "년 " + month + "월 " + date + "일 \nHej Volvo 앱에서 마케팅 활용 [" + agreeList.join(", ") + "] 에 동의 하셨습니다.")
        }
    }

    function openCerti() {
        $("#certPhone iframe").attr("src", "/plugin/certification/kmcis_web_sample_step02.php");
        $("#certPhone").show();
    }

    function setCertiData(_name, _hp, _birth) {
        if (ck_age(_birth) < 14) {
            alert("만14세 미만은 회원가입이 불가합니다.");
            $("#certPhone").hide();
            return false;
        }
        
        var f = document.joinForm;

        // f.user_nm.value = _name;
        // f.user_nm.readOnly = true; 

        var hp = phoneFomatter(_hp, true);
        var hpArr = hp.split("-");

        f.hp1.value = hpArr[0];
        f.hp2.value = hpArr[1];
        f.hp3.value = hpArr[2];
        f.hp1.readOnly = true;
        f.hp2.readOnly = true; 
        f.hp3.readOnly = true; 
        f.certi.value = "1";

        $(".join .phone_wrap").css('display', 'flex');
        $(".join .phone_certification").hide();

        $("#certPhone").hide();
        alert("휴대폰 인증이 완료되었습니다.");

    }

    function closeCerti(msg) {
        $("#certPhone").hide();
        alert(msg);
    }

    function closeCerti2() {
        $("#certPhone").hide();
        
    }

    function ck_age(_birth) {
        console.log(_birth)
        var today = new Date();
        var year = today.getFullYear();
        var ck = parseInt(_birth.substr(0,4));
        console.log(ck, year)
        return (year-ck) + 1;
    }

    $("input[name=user_id]").keyup(function(event) {
        var inputVal = $(this).val();
        $(this).val(inputVal.replace(/[(ㄱ-힣)]/gi, ''));
    });
    $("input[name=user_id]").focusout(function() {
        if (!validate_email($(this).val())) {
            alert("아이디형식에 맞지 않습니다.");
        }
    });
    $("input[type=checkbox].agree_chk").on("change", function() {
        var $checkBoxes = $("input[type=checkbox].agree_chk");
        var boxCount = $checkBoxes.length;
        var checkedCount = 0;
        $.each($checkBoxes, function(index, checkbox) {
            // console.log(checkbox)
            if (checkbox.checked) {
                checkedCount += 1;
            };
        });
        
        if (boxCount == checkedCount) {
            $("#checkall")[0].checked = true;
        } else {
            $("#checkall")[0].checked = false;
        }
    });
</script>

<div id="certPhone">
    <a href="javascript: void(0)" onclick="closeCerti2()" class="close"><img src="/images/accident/ic_close.png" alt=""></a>
    <iframe src="" frameborder="0"></iframe>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>