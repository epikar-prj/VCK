<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "event";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <link rel="stylesheet" href="./swiper.css">
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/event/">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_list.php" data-type="owner">Hej, Klass</a></li>
            <li><a href="/html/event/" class="on">Event</a></li>
        </ul>

        <div class="container">
            <div class="event_view">
                <div class="img_wrap">
                    <!-- <div class="event_ti_wrap">
                        <div class="event_sti">볼보자동차코리아</div>
                        <div class="event_ti">APP LAUNCHING EVENT</div>
                    </div> -->
                    <img src="/images/event/event_img_09-2021.jpg">
                </div>
                <div class="cont_wrap">
                    <div class="cont">
                        <div class="cont_ti2">볼보자동차코리아 Re: Charge Campaign</div>
                        <div class="cont_txt2">
                            <p>도로의 안전을 넘어, 지구의 안전을 위한 볼보자동차코리아의<br> ‘RE: CHARGE CAMPAIN’을 만나보세요.</p>
                        </div>

                        <div class="box-slide swiper-container">
                            <ul class="swiper-wrapper">
                                <li class="swiper-slide">
                                    <div class="box-img">
                                        <img src="/images/event/event_recharge_slide-01.jpg" alt="">
                                    </div>
                                    <div class="box-txt">
                                        <strong>볼보자동차코리아 Re: Charge Campaign<br> #1. 기후위기 메시지 전달을 위한 'Re:Think’</strong>
                                        <p>‘푸망’에서 &lt;지구의 마지막 날 생존 테스트&gt;에 참여하고 기후위기가 지구의 안전에 미치는 영향에 대해 다시 한 번 생각해 보세요.</p>
                                        <a href="https://poomang.com/detail/wooze" target="_blank" class="btn">지구의 마지막날 생존 테스트 참여하기</a>
                                    </div>
                                </li>
                                <li class="swiper-slide">
                                    <div class="box-img">
                                        <img src="/images/event/event_recharge_slide-02.jpg" alt="">
                                    </div>
                                    <div class="box-txt">
                                        <strong>볼보자동차코리아 Re: Charge Campaign<br> #2. 탄소배출을 줄이는 친환경 운전 'Re:Duce'</strong>
                                        <p>도로 위 많은 사람들의 생명을 지키기 위해 노력해온 볼보자동차가 티맵모빌리티와 함께 도로의 안전을 넘어 지구의 안전을 위해 탄소배출을 줄이는 '친환경 운전 캠페인'을 진행합니다.</p>
                                        <a href="https://event-dev.tmap.co.kr/comm/volvo/20210802/popShare.jsp" target="_blank" class="btn">친환경 운전 캠페인으로 이동하기</a>
                                    </div>
                                </li>
                                <li class="swiper-slide">
                                    <div class="box-img">
                                        <img src="/images/event/event_recharge_slide-03.jpg" alt="">
                                    </div>
                                    <div class="box-txt">
                                        <strong>볼보자동차코리아 Re: Charge Campaign<br> #3. 반려동물과 지구의 안전을 지키는 'Re:Use’</strong>
                                        <p>볼보자동차와 펫프렌즈(@PETFRIENDS_TEAM)가 함께 환경을 생각하는 반려인을 위해 반려동물과 함께 지구의 안전을 지키기 위한 친환경 풉백 Kit을 제작했습니다.</p>
                                        <a href="https://m.pet-friends.co.kr/product/information?product_id=76721" target="_blank" class="btn">친환경 풉백 KIT 보러가기</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="box-navi">
                                <!-- <button class="swiper-button-prev"><img src="/images/event/ico_arrow-left.png" alt=""></button>
                                <button class="swiper-button-next"><img src="/images/event/ico_arrow-right.png" alt=""></button> -->
                                <button class="swiper-button-prev"></button>
                                <button class="swiper-button-next"></button>
                            </div>
                        </div>

                        <script>
                            var swiper;
                            $.getScript("/html/testdrive/swiper.js").done(function () {

                                swiper = new Swiper('.swiper-container', {
                                    navigation: {
                                        nextEl: ".swiper-button-next",
                                        prevEl: ".swiper-button-prev",
                                    },
                                    slidesPerView: 1,
                                    spaceBetween: 10,
                                    freeMode: false
                                });

                            });
                        </script>
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

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');

?>