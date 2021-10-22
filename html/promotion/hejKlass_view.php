<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

// if (!isLogined()) {
//     MgMoveURL('/html/member/main.php');
// }

$CODE = "promotion";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

/*$sid = $_COOKIE['member_sid'];
$id = $_COOKIE['member_id'];
$nm = $_COOKIE['member_name'];*/

if (isLogined()) {
    $formAction = "/ajax/ajax.postTestdrive.php";

    $name = $_COOKIE['member_name'];
    $hp = format_phone($_COOKIE['member_hp']);

    $hp1 = explode("-", $hp)[0];
    $hp2 = explode("-", $hp)[1];
    $hp3 = explode("-", $hp)[2];
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
    <!-- <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/<?=$CODE?>/promotion1.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_view.php" class="on">Hej, Klass</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <section id="visual">
            <div class="visual_cont">
                <div class="box-img">
                    <!-- <video id="vid" autoplay="" muted="" loop="" preload="auto">
                        <source id="mp4" src="https://volvofilm.com/images/hejfamilj_video.mp4" type="video/mp4">
                    </video> -->
                    <img src="/images/promotion/main_visual.jpg" alt="">
                </div>
                <div class="visual_cont_inner">
                    <div class="visual_logo"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/hejfamilj_logo.png"></div>
                    <div class="text">지친 일상 속, 가족과 함께하는 소중한 순간을 선사하기 위해 보다 안전하고 프라이빗한 ‘2020 언택트 헤이, 패밀리(HEJ, FAMILJ)’를 준비했습니다.</div>
                    <div class="text">사랑하는 사람들과 함께 만들어가는 여정 속에서 삶의 균형을 찾아가는 스웨덴의 ‘라곰(Lagom)’을 통한 진정한 행복을 경험하시기 바랍니다. </div>
                </div>
            </div>
        </section>

        <div class="container">
            <section id="step_02" class="testdrive_info">
				<div class="testdrive_info_inner">
					<div class="event_01 event_wrap">
						<div class="sti">KLASS</div>
						<div class="ti">안내</div>
					</div>
					<div class="event_date">
						<ul class="event_date_list">
							<li>
                                <div class="list_ti">KLASS 신청기간</div>
								<div class="list_txt">2021. 03. 02(목) ~ 2021. 03. 07(일)</div>
							</li>
							<li>
                                <div class="list_ti">KLASS 신청대상</div>
								<div class="list_txt">볼보자동차 신차 구매 고객
									<span class="caption">XC90, S90, Cross Country(V90) : MY17 ~ MY21<br>
										XC60, XC40 : MY18 ~ MY21<br>
										S60, Cross Country(V60) : MY19 ~ MY21
									</span>
								</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">KLASS 당첨자 발표</div>
								<div class="list_txt">2021. 03. 12(금) / 총 300명</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">KIT 발송 일정</div>
								<div class="list_txt">2021. 03. 22(월) ~ 2021. 03. 24(수)</div>
							</li>
						</ul>
						<div class="caption">* 본 행사는 중복 참여 및 신청이 불가합니다.</div>
					</div>
				</div>
            </section>
        </div>


        <div class="container" >
            <div class="box-ti">
                <div class="sti">RESERVATION</div>
                <div class="ti">참여 신청</div>
            </div>

            <form name="promoform" id="promoform" action="javascript: void(0)" method="post" onsubmit="return checkValidate(this);">
                <input type="hidden" name="isApp" value="true">
                

                <div class="applicant">
                    <strong class="input_tit">이름</strong>
                    <div class="input_wrap name_wrap">
                        <div class="input_box">
                            <input type="text" name="name" value="<?=$name?>" maxlength="120" noSpace placeholder="이름을 입력해주세요.">
                        </div>
                    </div>

                   <!-- <strong class="input_tit">생년월일</strong>
                    <div class="input_wrap date_wrap">
                        <div class="input_box">
                            <input type="text" name="birth" value="" maxlength="8" noSpace numberOnly placeholder="생년월일 (ex 19870829)">
                        </div>
                    </div>-->

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
                            <input type="text" pattern="[0-9]*" name="hp2" value="<?=$hp2?>" maxlength="4" numberOnly placeholder="">
                        </div>
                        <div class="input_box">
                            <input type="text" pattern="[0-9]*" name="hp3"  value="<?=$hp3?>" maxlength="4" numberOnly placeholder="">
                        </div>
                    </div>

                   <!-- <strong class="input_tit">이메일</strong>
                    <div class="input_wrap email_wrap">
                        <div class="input_box">
                            <input type="text" name="email" value="" placeholder="이메일을 입력해주세요.">
                            <input type="hidden" name="email_id">
                            <input type="hidden" name="email_domain">
                        </div>
                    </div>-->

                    <strong class="input_tit">보유차종</strong>
                    <div class="input_box">
                        <select name="car_model">
                            <option value="" selected disabled>선택</option>
                            <option value="A">XC90 (MY17~)</option>
                            <option value="B">S90 (MY17~)</option>
                            <option value="C">Cross Country(V90) (MY17~)</option>
                            <option value="D">XC60 (MY18~)</option>
                            <option value="E">XC40 (MY18~)</option>
                            <option value="F">Cross Country(V60) (MY19~)</option>
                            <option value="G">S60 (MY19~)</option>
                        </select>
                    </div>

                    <strong class="input_tit">차량번호</strong>
                    <div class="input_wrap">
                        <div class="input_box">
                            <input type="text" name="car_num" value="" noSpace placeholder="차량번호를 입력해주세요.">
                        </div>
                    </div>

                    <strong class="input_tit">구매형태</strong>
                    <div class="choise_wrap gender_wrap">
                        <label class="choise_box">
                            <input type="radio" name="buy_type" value="A">
                            <span>개인</span>
                        </label>
                        <label class="choise_box">
                            <input type="radio" name="buy_type" value="B">
                            <span>리스</span>
                        </label>
                    </div>

                </div>

                <div class="agree_wrap">
                    <p class="descript">개인정보 처리 및 이용, 처리위탁, 이벤트 약관에 동의해 주세요.
                        <small>이벤트 정보 안내, 각종 마케팅 활동 및 홍보, 판촉 활동 등의 목적으로 고객님의 정보를 활용하는 것에 대하여 동의합니다.<br>개인정보 수집 및 이용에 대해서 거부할 수 있으며 거부 시에는 이벤트, 광고성 메일 수신 또는 시승 안내에 어려움이 있을 수 있습니다.</small>
                    </p>                    
					<div class="agree">
                            <label class="top_label"><span>이벤트 약관, 개인정보 처리 및 이용약관에 모두 동의합니다.</span><input type="checkbox" id="all_agree"></label>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 개인정보 수집 및 이용에 대한 동의</span><input type="checkbox" id="agree1" name="agree1" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(1);">자세히보기</a>
                        </div>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 개인정보 처리 및 위탁에 대한 동의</span><input type="checkbox" id="agree2" name="agree2" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(2);">자세히보기</a>
                        </div>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 광고/정보 수신 및 마케팅 활용에 대한 동의</span><input type="checkbox" id="agree3" name="agree3" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(3);">자세히보기</a>
                        </div>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 이벤트 약관에 대한 동의
                            <small>※ 본 약관에는 마케팅 및 광고성 정보 수신 동의가 포함되어 있습니다.</small>
                            </span><input type="checkbox" id="agree4" name="agree4" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a>
                        </div>
                    </div>
                    <div class="box-caption">
                        <strong>유의사항</strong>
                        <ul>
                            <li>볼보자동차 공식 딜러사에서 구입한 신차 보유 고객만 응모 가능합니다. </li>
                            <li>신청자 정보와 보유 차량 정보 불일치 시 사전 고지 없이 추첨에서 제외됩니다. </li>
                            <li>차량 실소유자 본인이 반드시 참석하여야 하며, 양도가 불가합니다. </li>
                            <li>참여 신청 시 입력한 동반인 수 외 추가 인원 발생 시 현장에서 전체 가족 체크인이 거부됩니다. </li>
                            <li>개인 차량의 경우 차량 등록증, 법인 차량의 경우 리스계약서 / 재직증명서 사본을 제출하여야 합니다. (당첨 후 개별 안내)</li>
                            <li>2017 SOMMAR / 2018 VINTER / 2018 HEJ FAMILJ / 2019 HEJ FAMILJ / Volvo World Golf Challenge 참여 고객은 본 추첨에서 제외됩니다. </li>
                            <li>본 행사는 주최 측 상황에 따라 예고 없이 프로그램이 변경 될 수 있습니다. </li>
                            <li>본 이벤트는 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다. </li>
                            <li>코로나19 관련 지침 및 방역 수칙에 따라 입장이 제한되거나 행사가 변동, 취소될 수 있습니다.</li>
                        </ul>
                    </div>

                </div>
                
                <div class="btn_group mt30">
                    <button type="submit" class="btn bg_color1">신청완료</button>
                </div>
                
            </form>
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
                <h5>개인정보 수집 및 이용에 대한 동의 (필수)</h3>
                <p>회사는 고객님께 더 향상된 양질의 서비스를 제공하기 위하여 고객의 개인정보를 수집하고 있습니다.</p>
                <p>회사는 고객님의 사전 동의 없이는 개인정보를 함부로 공개하지 않으며, 당사가 수집한 개인정보는 다음의 목적을 위해 활용합니다.</p>
                <strong>1. 수집하는 개인정보의 항목</strong>
                <p>필수정보 : 성명, 휴대전화번호, 이메일, 생년월일, 성별, 보유 차종 및 차량 번호</p>
                <strong>2. 수집 목적 및 이용 내역</strong>
                <p>회사는 온라인을 통해 수집된 개인 정보를 다음의 목적을 위해 활용</p>
                <p>① 본인확인</p>
                <p>이벤트 진행을 위한 본인 식별 및 부정 이용 방지</p>
                <p>② 마케팅 및 광고에 활용</p>
                <p>이벤트 당첨자 선정 및 안내</p>
                <strong>3. 개인정보 보유 및 이용 기간</strong>
                <p>이용 목적 달성 시 (철회 요청은 고객센터 1588-1777로 연락해주시기 바랍니다.)</p>
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
                <h5>개인정보 처리 및 위탁에 대한 동의 (필수)</h3>
                <p>회사는 서비스 이행을 위해 아래와 같이 개인정보 처리업무를 외부 전문업체에 위탁하여 운영하고 있습니다.</p>
                <strong>1. 개인정보 처리 및 위탁자</strong>
                <p>업체 : (주)마이테이블, (주)블루인마케팅서비스</p>
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
                <h5>광고/정보 수신 및 마케팅 활용에 대한 동의 (필수)</h3>
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
                <h5>이벤트 약관에 대한 동의 (필수)</h3>
                <p>1. 볼보자동차 공식 딜러사에서 구입한 XC90 (MY17~MY21), S90 (MY17~MY21), CROSS COUNTRY(V90) (MY17~MY21), XC60 (MY18~MY21), XC40 (MY18~MY21), S60 (MY19~ MY21), THE NEW CROSS COUNTRY(V60) (MY19~MY21) 보유 고객만 응모 가능합니다.</p>
                <br>
                <p>2. 본 이벤트 안내는 MMS를 통해 진행되며, 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.</p>
                <br>
                <p>3. 신청자 정보와 보유 차량 정보 불일치 시 사전고지 없이 추첨에서 제외됩니다.</p>
                <br>
                <p>4. 차량 실소유자 본인이 반드시 참석하셔야 하며, 양도가 불가합니다.</p>
                <br>
                <p>5. 개인 차량의 경우 차량 등록증, 법인 차량의 경우 리스계약서/재직증명서 사본을 제출하여야 합니다. (당첨 후 개별안내)</p>
                <br>
                <p>6. 2017 VOLVO SOMMAR / 2018 VINTER HOUSE / 2018 HEJ FAMILJ / Volvo World Golf Challenge 참여 고객은 본 추첨에서 제외됩니다.</p>
                <br>
                <p>7. 행사 당일 신청 인원과 현장 참석 인원이 상이할 경우 이벤트 참여가 불가합니다.</p>
                <br>
                <p>8. 본 행사는 주최 측 상황에 따라 예고 없이 프로그램이 변경될 수 있습니다.</p>
                <br>
                <p>9. 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
            </div>
        </div>
        



        <div id="pop_accom" style="display: none;">
			<div id="accom_01" class="pop_accom_inner" style="">
				<div class="btn_close"><a href="javascript:pop_accom_close(1);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<ul class="navigation">
					<li class="dot dot_01 active" onclick="slickGoTo(1,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(1,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(1,3)"></li>
				</ul>
				<ul class="cont">
                    <li class="step_01" tabindex="0" style="">
                        <div class="title">BE, BRIDGE</div>
                        <div class="step_01_cont">
                            <div class="step_01_cont_inner">
                                <div class="cont_ti">영월 비브릿지</div>
                                <div class="cont_txt">슬로우시티 영월의 자연과 하나로 어우러져, <br>천혜의 풍경과 감성적인 공간 속에서 <br>안락하고 여유로운 휴가를 즐길 수 있는 <br>럭셔리 풀 빌라
                                </div>
                            </div>
                            <div class="step_01_cont_img"></div>
                        </div>
                    </li>
                    <li class="step_03" tabindex="-1" style="">
                        <div class="title">PROGRAM</div>
                        <div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">그랜드 풀 빌라</div>
										<div class="txt">1박 2일 객실</div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">프라이빗 온수 풀</div>
										<div class="txt"></div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">조식 쿠폰</div>
										<div class="txt">(아메리칸 블랙퍼스트 + 아메리카노)</div>
									</li>
								</ul>
							</div>
							<div class="option">
								<div class="option_ti">OPTION <span></span></div>
								<ul class="option_list">
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">BBQ 그릴</div>
										<div class="txt"></div>
									</li>
									<li class="img_07">
										<div class="img"></div>
										<div class="ti">테라스 내 모닥불</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
                    </li>
                    <li class="step_02" tabindex="-1" style="">
                        <div class="title">GALLERY</div>
                        <ul class="photo_wrap">
                            <li class="photo_01"></li>
                            <li class="photo_02"></li>
                            <li class="photo_03"></li>
                            <li class="photo_04"></li>
                            <li class="photo_05"></li>
                            <li class="photo_06"></li>
                            <li class="photo_07"></li>
                            <li class="photo_08"></li>
                            <li class="photo_09"></li>
                        </ul>					
                    </li>
                    
                </ul>
			</div> <!-- accom_01 end -->
			<div id="accom_02" class="pop_accom_inner" style="display:none;">
				<div class="btn_close"><a href="javascript:pop_accom_close(2);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<ul class="navigation">
					<li class="dot dot_01" onclick="slickGoTo(2,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(2,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(2,3)"></li>
				</ul>
				<ul class="cont">
					<li class="step_01">
						<div class="title">PARK ROCHE</div>
						<div class="step_01_cont">
							<div class="step_01_cont_inner">
								<div class="cont_ti">정선 파크로쉬</div>
								<div class="cont_txt">대자연의 순수와 아름다움이 가득한 곳에서 <br>온전한 쉼과 사색, 재충전에 집중할 수 있도록 <br>프리미엄 웰니스를 제공하는 품격 높은 <br>힐링 체험 리조트</div>
							</div>
							<div class="step_01_cont_img"></div>
						</div>
                    </li>
                    <li class="step_03">
						<div class="title">PROGRAM</div>
						<div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">1박 2일 객실</div>
										<div class="txt"></div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">웰니스 클럽</div>
										<div class="txt">(투숙기간 내 이용 가능, 16세 이상 이용 가능)</div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">아쿠아 클럽</div>
										<div class="txt">(투숙기간 내 이용 가능, 사우나 및 실내 스파 16세 이상 이용 가능)</div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">웰컴 드링크</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_07">
										<div class="img"></div>
										<div class="ti">조식 쿠폰</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
								<p>※ 웰니스 프로그램은 자율 명상 프로그램으로 대체 운영될 수 있습니다.</p>
							</div>
						</div>
					</li>
					<li class="step_02">
						<div class="title">GALLERY</div>
						<ul class="photo_wrap">
							<li class="photo_01"></li>
							<li class="photo_02"></li>
							<li class="photo_03"></li>
							<li class="photo_04"></li>
							<li class="photo_05"></li>
							<li class="photo_06"></li>
						</ul>					
					</li>
				</ul>
			</div> 
			<div id="accom_03" class="pop_accom_inner" style="display:none;">
				<div class="btn_close"><a href="javascript:pop_accom_close(3);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<ul class="navigation">
					<li class="dot dot_01" onclick="slickGoTo(3,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(3,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(3,3)"></li>
				</ul>
				<ul class="cont">
					<li class="step_01">
						<div class="title">VIGO RESORT</div>
						<div class="step_01_cont">
							<div class="step_01_cont_inner">
								<div class="cont_ti">여수 비고리조트</div>
								<div class="cont_txt">여수 바다의 환상적인 절경 속에서, <br>리조트 내 어디에서 머물든지 탁 트인 <br>바다 전망을 감상할 수 있는 <br>오션 뷰 풀 빌라 리조트</div>
							</div>
							<div class="step_01_cont_img"></div>
						</div>
                    </li>
                    <li class="step_03">
						<div class="title">PROGRAM</div>
						<div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">올라/이슬라 풀 빌라</div>
										<div class="txt">1박 2일 객실</div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">프라이빗 온수 풀</div>
										<div class="txt"></div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">조식 서비스</div>
										<div class="txt"></div>
									</li>
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">인피니티 풀</div>
										<div class="txt">(투숙기간 내 이용 가능)</div>
									</li>
								</ul>
							</div>
							<div class="option">
								<div class="option_ti">OPTION <span></span></div>
								<ul class="option_list">
									<li class="img_07">
										<div class="img"></div>
										<div class="ti">BBQ 그릴</div>
										<div class="txt"></div>
									</li>
									<li class="img_08">
										<div class="img"></div>
										<div class="ti">테라스 내 모닥불</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
					</li>
					<li class="step_02">
						<div class="title">GALLERY</div>
						<ul class="photo_wrap">
							<li class="photo_01"></li>
							<li class="photo_02"></li>
							<li class="photo_03"></li>
							<li class="photo_04"></li>
							<li class="photo_05"></li>
							<li class="photo_06"></li>
						</ul>					
					</li>
					
				</ul>
			</div> 
			<div id="accom_04" class="pop_accom_inner" style="display:none;">
				<div class="btn_close"><a href="javascript:pop_accom_close(4);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<ul class="navigation">
					<li class="dot dot_01" onclick="slickGoTo(4,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(4,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(4,3)"></li>
				</ul>
				<ul class="cont">
					<li class="step_01">
						<div class="title">SEAMARK</div>
						<div class="step_01_cont">
							<div class="step_01_cont_inner">
								<div class="cont_ti">강릉 씨마크호텔</div>
								<div class="cont_txt">경포의 아름다운 동해바다와 마주하고 있는 <br>최고의 시설과 서비스를 갖춘 <br>국내 최초의 럭스티지 호텔로서 <br>진정한 쉼을 위한 단 하나의 공간</div>
							</div>
							<div class="step_01_cont_img"></div>
						</div>
                    </li>
                    <li class="step_03">
						<div class="title">PROGRAM</div>
						<div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">1박 2일 객실</div>
										<div class="txt"></div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">클럽 인피니티</div>
										<div class="txt">(투숙기간 내 이용 가능)</div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">써멀 스위트</div>
										<div class="txt">(투숙기간 내 이용 가능)</div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">웰컴 드링크</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_07">
										<div class="img"></div>
										<div class="ti">조식 쿠폰</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
					</li>
					<li class="step_02">
						<div class="title">GALLERY</div>
						<ul class="photo_wrap">
							<li class="photo_01"></li>
							<li class="photo_02"></li>
							<li class="photo_03"></li>
							<li class="photo_04"></li>
							<li class="photo_05"></li>
							<li class="photo_06"></li>
						</ul>					
					</li>
					
				</ul>
			</div> <!-- accom_04 end -->
			<div class="pop_accom_close" onclick="javascript:pop_accom_close(1);"></div>
		</div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

    <script>
        function pop_accom_close(num){
            $('#pop_accom').fadeOut('500',function(){
                $('#accom_0'+num+' ul.cont').slick('unslick');
            });
            
        }

        function pop_accom_show(num){
            $('ul.navigation li').removeClass('active');
            $('.pop_accom_inner').hide();
            $('#accom_0'+num+'').show();
            $('#pop_accom').fadeIn();
            $('#accom_0'+num+' ul.cont').slick({
                infinite: false,
                arrows: false,
                dots:false
            });
            $('#accom_0'+num+' ul.navigation li:nth-child(1)').addClass('active');

            $('#accom_0'+num+' ul.cont').on('afterChange', function(event, slick, currentSlide, nextSlide){
                var current_slide = Number(currentSlide  + 1);
                $('#accom_0'+num+' ul.navigation li').removeClass('active');
                $('#accom_0'+num+' ul.navigation li:nth-child('+current_slide+')').addClass('active');
            });

            $('.pop_accom_close').attr('onclick','javascript:pop_accom_close('+num+');');
        }

        function slickGoTo(accom,slide_num){
            var slide_num = slide_num - 1;
            $('#accom_0'+accom+' ul.cont').slick('slickGoTo', slide_num);
        }


    </script>

    <script>
        function pop_accom_show(num){
            $('ul.navigation li').removeClass('active');
            $('.pop_accom_inner').hide();
            $('#accom_0'+num+'').show();
            $('#pop_accom').fadeIn();
            $('#accom_0'+num+' ul.cont').slick({
                infinite: false,
                arrows: false,
                dots:false
            });
            $('#accom_0'+num+' ul.navigation li:nth-child(1)').addClass('active');

            $('#accom_0'+num+' ul.cont').on('afterChange', function(event, slick, currentSlide, nextSlide){
                var current_slide = Number(currentSlide  + 1);
                $('#accom_0'+num+' ul.navigation li').removeClass('active');
                $('#accom_0'+num+' ul.navigation li:nth-child('+current_slide+')').addClass('active');
            });

            $('.pop_accom_close').attr('onclick','javascript:pop_accom_close('+num+');');
        }

    </script>

	<script>
        // input_nospace
        $("input:text[noSpace]").on("keyup", function() {
            $(this).val($(this).val().replace(' ',''));
        });

        // input_numberOnly
        $("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
        });

        $("#place").on("change", function() {
            console.log($(this).val())
            if ($(this).val()) {
                $("#reservTime").empty();
                $("#withCount").empty();
                setReservTime($(this).val());
                setWithCount($(this).val());

                $('.group_time').css('display', 'block');
                $('.group_widthCount').hide();
                $('#with').empty();
            }
        });

        $("#reservTime").on("change", function() {
            if ($(this).val()) {
                $('.group_widthCount').css('display', 'block');
            }
        });

        $("#withCount").on("change", function() {
            $('#with').empty();

            setWithPerson($(this).val());
        })

        function setReservTime(_place) {
            var options = '<option value="" selected disabled>원하시는 일정을 선택해주세요</option>';
            
            if (_place == 'a') {
                options += '<option value="a1">11월 4일(수) ~ 11월 5일(목)</option>' +
                '<option value="a2">11월 5일(목) ~ 11월 6일(금)</option>' +
                '<option value="a3">11월 6일(금) ~ 11월 7일(토)</option>' +
                '<option value="a4">11월 7일(토) ~ 11월 8일(일)</option>';
            } else if (_place == 'b') {
                options += '<option value="b1">11월 6일(금) ~ 11월 7일(토)</option>' +
                '<option value="b2">11월 7일(토) ~ 11월 8일(일)</option>';
            } else if (_place == 'c') {
                options += '<option value="c1">11월 12일(목) ~ 11월 13일(금)</option>' +
                '<option value="c2">11월 13일(금) ~ 11월 14일(토)</option>' +
                '<option value="c2">11월 14일(토) ~ 11월 15일(일)</option>';
            } else if (_place == 'd') {
                options += '<option value="d1">11월 13일(금) ~ 11월 14일(토)</option>' +
                '<option value="d2">11월 14일(토) ~ 11월 15일(일)</option>';
            }

            $("#reservTime").html(options);
        }

        function setWithCount(_place) {
            var options = '<option value="" selected disabled>동반 인원을 선택해주세요 (본인 제외)</option>';
            
            if (_place == 'a') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="3">3명</option>' +
                '<option value="4">4명</option>' +
                '<option value="5">5명</option>' +
                '<option value="0">동반인원 없음</option>';
            } else if (_place == 'b') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="3">3명</option>' +
                '<option value="0">동반인원 없음</option>';
            } else if (_place == 'c') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="3">3명</option>' +
                '<option value="4">4명</option>' +
                '<option value="5">5명</option>' +
                '<option value="0">동반인원 없음</option>';
            } else if (_place == 'd') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="0">동반인원 없음</option>';
            }

            $("#withCount").html(options);
        }

        function setWithPerson(_num) {
            var temp = '';
            for (var i = 0; i < _num; i ++) {
                temp += '<strong class="input_tit with_' + (i + 1) + '">동반자 정보' + (i + 1) + '</strong>' +
                        '<div class="input_wrap with_wrap with_' + (i + 1) + '">' +
                            '<div class="input_box with_name">' +
                                '<input type="text" name="with_name' + (i + 1) + '" maxlength="120" noSpace placeholder="이름">' +
                            '</div>' +
                            '<div class="input_box with_sex">' +
                                '<select name="with_sex' + (i + 1) + '">' +
                                    '<option value="" selected disabled>성별</option>' +
                                    '<option value="M">남</option>' +
                                    '<option value="F">여</option>' +
                                '</select>' +
                            '</div>' +
                        '</div>' +
                        '<div class="input_wrap with_wrap with_' + (i + 1) + '">' +
                            '<div class="input_box with_brith">' +
                                '<input type="text" pattern="[0-9]*" name="with_birth' + (i + 1) + '" maxlength="8" noSpace numberOnly placeholder="생년월일(ex 19870829)">' +
                            '</div>' +
                            '<div class="input_box with_rel">' +
                                '<select name="with_relation' + (i + 1) + '">' +
                                    '<option value="" selected disabled>관계</option>' +
                                    '<option value="S">배우자</option>' +
                                    '<option value="C">자녀</option>' +
                                    '<option value="P">부모</option>' +
                                '</select>' +
                            '</div>' +
                        '</div>';

            }
            $("#with").append(temp);
        }

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

		// 전체 동의
		$('.top_label > input').change(function(){
			if ($(this).prop("checked") == true) {
				$('.agree input').prop("checked",true);
			} else {
				$('.agree input').prop("checked",false);
			}
		});

		$('.normal_label > input').change(function(){
			if ( $('.normal_label > input:checked').length == $('.normal_label > input').length ) {
				$('.top_label > input').prop("checked",true);
			} else {
				$('.top_label > input').prop("checked",false);
			}
		});

        // var post = new daum.Postcode({
        //     oncomplete: function(data) {
        //         // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
        //         // 예제를 참고하여 다양한 활용법을 확인해 보세요.
        //         document.promoform.zipcode.value = data.zonecode;
        //         document.promoform.addr1.value = data.roadAddress;
        //         document.promoform.addr2.value = data.buildingName;
        //     }
        // });

        // $('#withCount').on('change', function() {
        //     var val = $(this).val();
        //     $('#with').empty();
        //     if (val) {
        //         var temp = '';
        //         for (var i = 0; i < val; i ++) {
        //             temp += '<strong class="input_tit">동반자 정보' + (i + 1) + '</strong>' +
        //                 '<div class="input_box">' +
        //                     '<input type="text" name="with_name' + (i + 1) + '" placeholder="이름">' +
        //                 '</div>' +
        //                 '<div class="input_box">' +
        //                 '<select  name="with_sex' + (i + 1) + '" id="">' +
        //                         '<option value="">성별</option>' +
        //                         '<option value="M">남</option>' +
        //                         '<option value="F">여</option>' +
        //                     '</select>' +
        //                 '</div>' +
        //                 '<div class="input_box">' +
        //                     '<input type="text" name="with_birth' + (i + 1) + '" placeholder="생년월일 (ex 19870829)">' +
        //                 '</div>' +
        //                 '<div class="input_box">' +
        //                     '<select name="with_relation' + (i + 1) + '" id="">' +
        //                         '<option value="">관계</option>' +
        //                         '<option value="partner">배우자</option>' +
        //                         '<option value="child">자녀</option>' +
        //                         '<option value="parent">부모</option>' +
        //                     '</select>' +
        //                 '</div>';
        //         }

        //         $('#with').append(temp);
        //     }
        // });


        function checkValidate(f) {
            app.showOverlayProgress();
            var data = {};

            if (!f.agree1.checked) {
                alert("개인정보 수집 및 이용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree1.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.agree2.checked) {
                alert("개인정보 처리 및 위탁에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.'");
                f.agree2.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.agree3.checked) {
                alert("광고/정보 수신 및 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree3.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.agree4.checked) {
                alert("본 이벤트 안내는 MMS를 통해 진행되며, 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree4.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.name.value) {
                alert("이름을 입력해주세요.");
                f.name.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.birth.value) {
                alert("생년월일을 입력해주세요.");
                f.birth.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.birth.value.length != 8) {
                alert('생년월일을 정확하게 입력해주세요.'); 
                f.birth.focus(); 
                app.hideOverlayProgress();
                return false;
            }
            
            // if (!f.birth1.value) {
            //     alert("생년월을을 입력하세요(년)");
            //     f.birth1.focus();
            //     return false;
            // }
            
            // if (!f.birth2.value) {
            //     alert("생년월을을 입력하세요(월)");
            //     f.birth2.focus();
            //     return false;
            // }

            // if (!f.birth3.value) {
            //     alert("생년월을을 입력하세요(일)");
            //     f.birth3.focus();
            //     return false;
            // }
            
            if (!f.hp1.value) {
                alert("휴대 전화번호(처음 자리)를 선택해주세요.");
                f.hp1.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.hp2.value) {
                alert("휴대 전화번호(가운데 자리)를 입력해주세요.");
                f.hp2.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.hp1.value == '010'){
                if(f.hp2.value.length != 4){
                    alert('휴대 전화번호(가운데 자리)를 확인해주세요.');
                    f.hp2.focus(); 
                    app.hideOverlayProgress();
                    return false; 
                }
            } else {
                if (f.hp2.value.length < 3) {
                    alert('휴대 전화번호(가운데 자리)를 확인해주세요.'); 
                    f.hp2.focus();  
                    app.hideOverlayProgress();
                    return false; 
                }
            }
            
            if (!f.hp3.value) {
                alert("휴대 전화번호(마지막 자리)를 입력해주세요.");
                f.hp3.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.hp3.value.length != 4) {
                alert('휴대 전화번호(마지막 자리)를 확인해주세요.'); 
                $("#hp3").focus(); 
                app.hideOverlayProgress();
                return false; 
            }
            
            if (!f.email.value) {
                alert("이메일을 입력해주세요.");
                f.email.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!validate_email(f.email.value)) {
                alert('아이디형식에 맞지 않습니다.');
                f.email.focus();
                app.hideOverlayProgress();
                return false;
            }

            f.email_id.value = f.email.value.split("@")[0];
            f.email_domain.value = f.email.value.split("@")[1];
            
            if (!f.car_model.value) {
                alert("보유 차종을 선택해주세요.");
                f.car_model.focus();
                app.hideOverlayProgress();
                return false;
            }

            // if (!f.zipcode.value) {
            //     alert("주소를 입력하세요");
            //     f.zipcode.focus();
            //     return false;
            // }

            // if (!f.addr1.value) {
            //     alert("주소를 입력하세요");
            //     f.addr1.focus();0
            //     return false;
            // }

            if (!f.car_num.value) {
                alert("차량번호를 입력해주세요.");
                f.car_num.focus();
                app.hideOverlayProgress();
                return false;
            }

            if(f.car_num.value.length < 5) {
                alert('차량번호 전체를 입력해주세요. (ex 12가1234)'); 
                f.car_num.focus(); 
                app.hideOverlayProgress();
                return false; 
            }	

            if (!f.buy_type.value) {
                alert("구매 형태를 선택해주세요.");
                f.buy_type[0].focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.check_place.value) {
                alert("숙소를 선택해주세요.");
                f.check_place.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.check_date.value) {
                alert("숙박일자를 선택해주세요.");
                f.check_date.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.with_num.value != "") {
                if (f.with_num.value > 0) {
                    for (var i = 0; i < f.with_num.value; i ++) {
                        var with_name = document.getElementsByName('with_name' + (i + 1))[0];
                        var with_sex = document.getElementsByName('with_sex' + (i + 1))[0];
                        var with_birth = document.getElementsByName('with_birth' + (i + 1))[0];
                        var with_relation = document.getElementsByName('with_relation' + (i + 1))[0];

                        if (!with_name.value) {
                            alert("동반자" + (i + 1) + " 이름을 입력해주세요.");
                            with_name.focus();
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (!with_sex.value) {
                            alert("동반자" + (i + 1) + " 성별을 입력해주세요.");
                            with_sex.focus();
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (!with_birth.value) {
                            alert("동반자" + (i + 1) + " 생년월일을 입력해주세요.");
                            with_birth.focus();
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (with_birth.value.length != 8) {
                            alert("동반자" + (i + 1) + " 생년월일을 정확하게 입력해주세요."); 
                            with_birth.focus(); 
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (!with_relation.value) {
                            alert("동반자" + (i + 1) + " 관계를 선택해주세요.");
                            with_relation.focus();
                            app.hideOverlayProgress();
                            return false;
                        }
                    }
                }
            } else {
                alert("동반인원을 선택해주세요.");
                f.with_num.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            conf = confirm("Hej Familj 2020\n\n본 이벤트 신청 후에는\n신청 일자 / 장소 / 인원 변경이 \n불가합니다.\n\n해당 내용으로 신청하시겠습니까?");
            if (conf) {
                ajaxPostPromo();
            } else {
                app.hideOverlayProgress();
            }


            function ajaxPostPromo() {
                console.log($('#promoform').serializeObject())
                var response;
                $.ajax({
                    url: "https://vckiframe.com/event/hejfamilj_fall_2020/ajax/event_apply.php",
                    type:'post',
                    // contentType: 'application/json;',
                    data: $('#promoform').serializeObject(),
                    dataType: 'json',
                    success: function(res){
                        response = res;
                        console.log(res);
                    },
                    complete: function(data) {
                        if (response.result == 'success') {
                            alert('Hej Familj 2020\n\n이벤트 신청이 완료 되었습니다.');
                            location.reload();	
                        }else {
                            if(response.result == 'overlap') {
                                alert('Hej Familj 2020\n\n이미 신청하신 내역이 있으므로, 중복 신청이 불가합니다.');
                                location.reload();	
                            }else{
                                alert(response.msg);
                                event_apply_diable = 'false';
                                app.hideOverlayProgress();
                            }
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            }

            return false;
        }

        jQuery.fn.serializeObject = function() { var obj = null; try { if(this[0].tagName && this[0].tagName.toUpperCase() == "FORM" ) { var arr = this.serializeArray(); if(arr){ obj = {}; jQuery.each(arr, function() { obj[this.name] = this.value; }); } } }catch(e) { alert(e.message); }finally {} return obj; }
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>