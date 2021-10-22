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
            <a href="/html/member/main.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="join">
			<form name="joinForm" method="POST" action="join_update.php" onsubmit="return check_validate(this);">
                <input type="hidden" name="mode" value="w">
                <strong class="input_tit">ID (E-mail)</strong>
				<div class="input_wrap email_wrap">
					<div class="input_box">
						<input type="text" name="user_id" value="<?=$email?>" placeholder="example@volvo.com">
					</div>
				</div>
				<strong class="input_tit">비밀번호</strong>
				<div class="input_wrap password_wrap">
					<div class="input_box">
						<input type="password" name="user_pw" placeholder="비밀번호를 입력해주세요.">
					</div>
				</div>
				<strong class="input_tit">비밀번호 확인</strong>
				<div class="input_wrap password_re_wrap">
					<div class="input_box">
						<input type="password" name="user_pw_re" placeholder="비밀번호를 다시 입력해주세요.">
					</div>
				</div>
				<strong class="input_tit">이름(계약자)</strong>
				<div class="input_wrap name_wrap">
					<div class="input_box">
						<input type="text" name="user_nm" value="<?=$name?>" placeholder="이름을 입력해주세요.">
					</div>
				</div>
				<strong class="input_tit">볼보 차량 소유 여부</strong>
                <div class="input_wrap car_number_wrap2">
                    <label><input id="car_no" name="member_type" type="radio" value="own" checked><span>소유</span></label>
                    <label><input id="vehicle_no" name="member_type" type="radio" value="wanna"><span>미소유</span></label>
                </div>
				<strong class="input_tit">휴대 전화번호</strong>
				<div class="phone_row">
                    <div class="phone_col">
                        <div class="input_wrap phone_wrap">
                            <div class="input_box">
                                <select name="hp1" disabled>
                                    <? foreach($OPTION_INFO['hp'] as $item) { 
                                        $selected = "";
                                        if ($item == $hp1) {
                                            $selected = "selected";
                                        }
                                        ?>
                                        <option value="<?=$item?>" $selected><?=$item?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="input_box">
                                <input type="text" name="hp2" value="<?=$hp2?>" readonly placeholder="1234">
                            </div>
                            <div class="input_box">
                                <input type="text" name="hp3" value="<?=$hp3?>" readonly placeholder="1234">
                            </div>
                        </div>
                       <a href="javascript: void(0)" class="btn phone_certification" onclick="openCerti()">휴대폰 인증</a>
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
                <!-- <strong class="input_tit">차량번호</strong>
                <div class="input_wrap car_number_wrap2">
                    <label><input id="car_no" name="car_type" type="radio" value="1" checked><span>차량번호</span></label>
                    <label><input id="vehicle_no" name="car_type" type="radio" value="2"><span>차대번호</span></label>
                </div>
				<div class="input_wrap car_number_wrap">
					<div class="input_box">
						<input type="text" name="car_number" placeholder="[선택] 차량번호나 차대번호를 입력해주세요.">
                    </div>
                </div> -->
                <strong class="input_tit agree_tit">약관동의</strong>
                <div class="agree_all">
                    <label><span>모두 동의 합니다.</span><input type="checkbox" onchange="all_check(this)"></label>
                </div>
				<div id="agree" class="agree">
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[필수] 개인정보 수집 및 이용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(1);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree1" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[필수] 개인정보 처리 및 위탁에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(2);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree2" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[필수] 개인정보 제3자 제공 및 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(3);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree3" class="agree_chk" type="checkbox">
                        </div>
                    </div>
				</div>
				<div id="agree" class="agree">
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] SMS 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree4" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] E-mail 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(5);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree5" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] PUSH 수신 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(6);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree6" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] 광고/정보 수신(DM) 및 마케팅 활용에 대한 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(8);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree8" class="agree_chk" type="checkbox">
                        </div>
                    </div>
                    <div class="agree_row">
                        <div class="agree_col">
                            <label><span>[선택] 위치기반 서비스 이용 동의</span></label>
                            <a href="javascript: void(0)" onclick="open_pop(7);">자세히보기</a>
                        </div>
                        <div class="agree_col">
                            <input name="agree7" class="agree_chk" type="checkbox">
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
        <h4>약관동의</h4>
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
		$('.btn_cancel').click(function(){
			location.href="/html/member/main.php"
		})
	});
	
	function open_pop(type){
        $('#agree'+type+'_pop').show();
        $('#agree'+type+'_pop').animate({
            top : 60,
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
        if (f.user_id.value == '') {
            alert('아이디를 입력해주세요');
            f.user_id.focus();
            return false;
        }

        if (!validate_email(f.user_id.value)) {
            alert('아이디형식에 맞지 않습니다.');
            f.user_id.focus();
            return false;
        }

        if (f.user_pw.value == '') {
            alert('비밀번호를 입력해주세요');
            f.user_pw.focus();
            return false;
        }

        if (!chkPW(f.user_pw.value)) {
            return false;
        }
        
        if (f.user_pw_re.value == '') {
            alert('비밀번호 확인을 입력해주세요');
            f.user_pw_re.focus();
            return false;
        }
        
        if (f.user_pw.value != f.user_pw_re.value) {
            alert('비밀번호가 맞지 않습니다.');
            f.user_pw_re.focus();
            return false;
        }
        
        if (f.user_nm.value == '') {
            alert('이름을 입력해주세요');
            f.user_nm.focus();
            return false;
        }
        
        if (f.hp2.value == '') {
            alert('가운데자리 휴대전화 번호를 입력해주세요');
            f.hp2.focus();
            return false;
        }
        
        if (f.hp3.value == '') {
            alert('끝자리 휴대전화 번호를 입력해주세요');
            f.hp3.focus();
            return false;
        }

        if (!f.agree1.checked) {
            alert('개인정보 수집 및 이용에 대한 동의에 체크해주세요');
            f.agree1.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert('개인정보 처리 및 위탁에 대한 동의에 체크해주세요');
            f.agree2.focus();
            return false;
        }

        if (!f.agree3.checked) {
            alert('개인정보 제3자 제공 및 활용에 대한 동의에 체크해주세요');
            f.agree3.focus();
            return false;
        }

        if (!f.agree4.checked) {
            alert('SMS 수신 및 마케팅 활용에 대한 동의에 체크해주세요');
            f.agree4.focus();
            return false;
        }
    }

    function openCerti() {
        // var f = document.joinForm;
        // var res;
        // $.ajax({
        //     url:'/ajax/ajax.getCertiPhone.php',
        //     type:'post',
        //     data: {name: f.user_nm.value, hp1: f.hp1.value, hp2: f.hp2.value, hp3: f.hp3.value, plusInfo: f.user_id.value + "/" + f.user_pw.value + "/" + f.user_pw_re.value + "/" + f.member_type.value},
        //     dataType: 'json',
        //     success: function(_res){
        //         res = _res;
        //         console.log(res);
        //     }, 
        //     complete: function() {
        //        document.reqKMCISForm.tr_cert.value = res.cert;
        //        document.reqKMCISForm.tr_url.value = res.tr_url;
        //        document.reqKMCISForm.tr_add.value = res.tr_add;

        //        openKMCISWindow()
        //     }, error: function(e) {
        //         console.log(this.data)
        //         console.log(e)
        //     }
        // });

        $("#certPhone iframe").attr("src", "/plugin/certification/kmcis_web_sample_step02.php");
        $("#certPhone").show();
    }

    function setCertiData(_name, _hp) {
        var f = document.joinForm;

        f.user_nm.value = _name;
        f.user_nm.readOnly = true; 

        var hp = phoneFomatter(_hp, true);
        var hpArr = hp.split("-");

        f.hp1.value = hpArr[0];
        f.hp2.value = hpArr[1];
        f.hp3.value = hpArr[2];
        f.hp1.disabled = true;
        f.hp2.readOnly = true; 
        f.hp3.readOnly = true; 

        $("#certPhone").hide();
        alert("휴대폰 인증이 완료되었습니다.");

    }

    function closeCerti(msg) {
        $("#certPhone").hide();
        alert(msg);
    }
</script>

<div id="certPhone">
    <iframe src="" frameborder="0"></iframe>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>