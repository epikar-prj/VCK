<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');



$CODE = "event";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

$sid = $_COOKIE['member_sid'];
$master_cust_cd = $_COOKIE['master_cust_cd'];
$id = $_COOKIE['member_id'];
$nm = $_COOKIE['member_name'];

$sql = " SELECT sid, use_sms_recept_yn, use_email_recept_yn, use_push_recept_yn, use_dm_recept_yn, use_loc_service_yn FROM volvo_user WHERE sid = '" . $sid . "'";

$row=$db->fetch_array($sql)[0];

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>


    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/benefit.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <!--<li><a href="/html/coupon/">Coupon</a></li>-->
            <li><a href="/html/event/" class="on">Event</a></li>
        </ul>

        <div class="container">
					<div class="event_view">
						<div class="img_wrap">
							<!-- <div class="event_ti_wrap">
								<div class="event_sti">볼보자동차코리아</div>
								<div class="event_ti">APP LAUNCHING EVENT</div>
							</div> -->
							<img src="/images/event/event_img_06-2020.jpg">
						</div>
						<div class="cont_wrap">
							<div class="cont">
                                <form method="post" onsubmit="return checkValidate(this);">
								<div class="cont_ti">볼보자동차코리아 앱 런칭 기념 퀴즈 이벤트</div>
								<div class="cont_txt">
									<p>볼보자동차코리아가 새롭게 선보이는<br>APP의 이름을 맞춰주세요.</p>
									<p>퀴즈 이벤트 정답자 중 선착순 2만분께<br>스타벅스 아메리카노 기프티콘을<br>선물로 보내드립니다.<!--<br><span>(*마케팅 약관 동의 필수)</span>--></p>
									
								</div>
                                <div class="input_answer">
									<div class="answer_wrap">
                                        <label>
                                            <input type="radio" name="answer" value="Hi Volvo"></input>
                                            <div class="radio_text">
                                                <p>Hi Volvo</p>
                                                <span>(하이 볼보)</span>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="answer" value="Hej Volvo"></input>
                                            <div class="radio_text">
                                                <p>Hej Volvo</p>
                                                <span>(헤이 볼보)</span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="answer_wrap">
                                        <label>
                                            <input type="radio" name="answer" value="Hej Familj"></input>
                                            <div class="radio_text">
                                                <p>Hej Familj</p>
                                                <span>(헤이 패밀리)</span>
                                            </div>
                                        </label>
                                        <label>
                                            <input type="radio" name="answer" value="볼보 고객용 앱"></input>
                                            <div class="radio_text">
                                                <p>볼보 고객용 앱</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="hint_wrap">
                                    <div id="hintBtn">
                                        <span>힌트 보기</span>
                                    </div>
                                    <div id="hintTxt">
                                        <p>볼보자동차코리아는 7월 6일 <br>‘Hej Volvo’라는 새로운 앱을 선보입니다.</p>
                                    </div>
                                </div>

                                <ul class="cont_info">
									<li>응모기간 : 2020.07.06(월) ~ 경품 소진시까지</li>
									<li>경품 : 스타벅스 아메리카노 기프티콘(Tall 사이즈)</li>
									<li>(*마케팅 약관 동의 필수)</li>
								</ul>
								
								<div id="agree" class="agree">
									<strong class="input_tit">마케팅 약관 동의</strong>
									<div class="agree_row">
										<div class="agree_col">
											<label><span>[선택] SMS 수신 및 마케팅 활용에 대한 동의</span></label>
											<a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a>
										</div>
										<div class="agree_col">
											<input name="use_sms_recept_yn" class="agree_chk" type="checkbox" disabled <?if ($row['use_sms_recept_yn'] == "Y") { echo "checked";}?>>
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
											<a href="javascript: void(0)" onclick="open_pop(7);">자세히보기</a>
										</div>
										<div class="agree_col">
											<input name="use_dm_recept_yn" class="agree_chk" type="checkbox" <?if ($row['use_dm_recept_yn'] == "Y") { echo "checked";}?>>
										</div>
									</div>
								</div><!--agree_end-->
								<div class="btn_group mt10">
									<button type="submit" class="btn bg_color2">응모하기</button>
								</div>
								<div class="event_info">
									<div class="info_ti">[유의사항]</div>
									<ul class="event_info_list">
										<li>이 이벤트는 앱 회원가입 후 로그인하셔야 응모 가능합니다.</li>
										<li>마케팅 약관에 동의하지 않으시면 이벤트 응모가 불가합니다.</li>
										<li>마케팅 약관 중 E-mail, PUSH, DM 수신은 추후 My Volvo > 회원 개인정보에서 수정이 가능합니다. 단, SMS 수신은 필수 동의항목으로 수정이 불가합니다.</li>
										<li>이벤트 응모는 한 개의 아이디 당 한 번만 참여 가능합니다.</li>
										<li>이벤트 경품은 기프티콘 형태로 회원가입 시 입력한 핸드폰 번호로 발송됩니다.</li>
										<li>경품 발송은 7월 16일부터 매주 목요일 진행됩니다.</li>
									</ul>
                                </div>
                                </form>
							</div>
						</div>
					</div><!--event_view_end-->
        </div><!--container -->

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

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>
	<script>

        $(window).on('load', function() {
            setTimeout(function() {
                var isLogined = "<?=isLogined()?>";
                if (!isLogined) {
                    alert("로그인이 필요한 서비스 입니다.");
                    location.href = "/html/member/login.php?returnLoginURL=/html/event/view.php";
                }
            }, 300)
            
        })

        $("#hintBtn").on('click', function() {
            $(".hint_wrap").toggleClass("open");
        })

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


        function checkValidate(_form) {
            if (!_form.answer.value) {
                alert('정답을 선택해주세요.');
                _form.answer[0].focus();
                return false;
            }
    
            if (!_form.use_email_recept_yn.checked) {
                alert('E-mail 수신 및 마케팅 활용에 대한 동의를 해주세요.');
                _form.use_email_recept_yn.focus();
                return false;
            }
            
            if (!_form.use_push_recept_yn.checked) {
                alert('PUSH 수신 및 마케팅 활용에 대한 동의를 해주세요.');
                _form.use_email_recept_yn.focus();
                return false;
            }

            if (!_form.use_dm_recept_yn.checked) {
                alert('DM수신 및 마케팅 활용에 대한 동의를 해주세요.');
                _form.use_dm_recept_yn.focus();
                return false;
            }

            var use_email_recept_yn = _form.use_email_recept_yn.checked ? 'Y' : 'N';
            var use_push_recept_yn = _form.use_push_recept_yn.checked ? 'Y' : 'N';
            var use_dm_recept_yn = _form.use_dm_recept_yn.checked ? 'Y' : 'N';


            var data = {
                answer: _form.answer.value,
                use_email_recept_yn: use_email_recept_yn,
                use_push_recept_yn: use_push_recept_yn,
                use_dm_recept_yn: use_dm_recept_yn
            };

            updateUser(data)

            return false;
        }

        function updateUser(_data) {
			var res;
			$.ajax({
                url: '/ajax/ajax.postEventApply_bak.php',
                type:'post',
                data: _data,
                dataType: 'text',
                success: function(_res){
					console.log(_res)
					res = _res;
                }, complete: function() {
                    alert(res);
                    location.href="/html/event/index.php";
                }, error: function(e) {
					console.log(e)
                }
            });
		}
	</script>


<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');

if (!isLogined()) {
    // echo "<script>alert('로그인이 필요한 서비스 입니다.')</script>"
    // MgMoveURL('/html/member/login.php');
}
?>