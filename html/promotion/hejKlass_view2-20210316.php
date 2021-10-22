<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

// if (!isLogined()) {
//     MgMoveURL('/html/member/main.php');
// }

$edate = date("2021-03-15 00:00");
$today = date("Y-m-d H:i");

/*if ($today > $edate) {
	MgMoveURL('/', 'Hej, Klass 2021\n\n이벤트가 종료되었습니다.\n(2021 .3 .14 까지)');
}*/

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
                <a href="/html/footerMenu/benefit.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_view2.php" class="on"  data-type="owner">Hej, Klass</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <section id="visual">
            <div class="visual_cont">
                <div class="box-img">
                    <!-- <video id="vid" autoplay="" muted="" loop="" preload="auto">
                        <source id="mp4" src="https://volvofilm.com/images/hejfamilj_video.mp4" type="video/mp4">
                    </video> -->
                    <img src="/images/promotion/main_visual2.jpg" alt="">
                </div>
                <div class="visual_cont_inner">
                    <div class="visual_logo"><img src="/images/promotion/hejfamilj_logo2.png"></div>
                    <div class="text">헤이,클라스 (Hej, Klass)는<br> 온라인으로 체험하는<br> VOLVO 브랜드만의 라이프 스타일 클래스입니다.</div>
                    <div class="text">언제 어디에서나 편안하게 즐길 수 있는<br> Hej, Klass와 함께, 가족과 소중한 시간을 만들어 보세요. </div>
                </div>
            </div>
        </section>

        <div class="container">
            <section id="step_02" class="testdrive_info">
				<div class="testdrive_info_inner">
					<div class="event_01 event_wrap">
						<div class="ti">행사 안내</div>
					</div>
					<div class="event_date">
						<ul class="event_date_list">
							<li>
                                <div class="list_ti">내용</div>
                                <div class="list_sti">첫 번째 HEJ, KLASS의 주제는 <br>‘페이퍼 플라워 리스 만들기’ 입니다.</div>
								<div class="list_txt">생화보다 아름다운 페이퍼 플라워로 <br>
                                                        시들지 않는 화사함이 담긴 봄 맞이 <br>
                                                        플라워 인테리어 소품을 만들어보세요.<br><br>
                                                        행운과 축복의 의미를 전달하는 페이퍼 플라워 리스

                                    <img src="/images/promotion/img_hejklass-1.jpg" alt="">
                                </div>
							</li>
							<li class="profile">
                                <div class="list_ti">출연자 소개</div>
								<div class="list_txt">
                                    <div class="profileList">
                                        <ul>
                                            <li>
                                                <div class="box-img">
                                                    <img src="/images/promotion/img_hejklass-2.jpg" alt="">
                                                </div>
                                                <div class="box-txt">
                                                    <em>진행자</em>
                                                    <strong><span>배우</span> 김성은</strong>
                                                    <p>특유의 밝고 긍정적인 매력으로, 다양한 분야에서 활약하고 있는 만능 엔터테이너</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-img">
                                                    <img src="/images/promotion/img_hejklass-3.jpg" alt="">
                                                </div>
                                                <div class="box-txt">
                                                    <em>강사</em>
                                                    <strong><span>페이퍼아티스트</span> 김예은<i>(MARCH STUDIO 대표)</i></strong>
                                                    <p>종이를 소재로 사용하여 따뜻한 감성이 묻어나는 작품들을 만드는 페이퍼 아티스트</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
								</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">운영방법</div>
                                <div class="list_sti"><span class="num">HEJ, KLASS 당첨자를 대상으로<br> 준비물이 담긴 KIT가 별도 배송됩니다.</div>
								<div class="list_txt">3월 26(금) 저녁7시, <br>
                                    특별한 VOLVO MATE와 함께 <br>
                                    페이퍼 플라워 리스를 만들어 보세요. <br>
                                    유튜브로 공개되는 온라인 클래스를 보며, <br>
                                    제작 방법을 함께 차근차근 따라 하면 <br>
                                    아이들과 함께 누구나 완성품을 만들 수 있습니다.</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">신청 기간</div>
								<div class="list_txt">2021.03.10(수) ~ 2021.03.14(일)</div>
							</li>
							<li style="padding: 30px 0;">
                                <div class="list_ti"><span class="num">신청 대상</div>
								<div class="list_txt">볼보자동차 신차 구매 고객<br>
                                    <br>
                                    XC90, S90, Cross Country(V90) : MY17 ~ MY21<br>
                                    XC60, XC40 : MY18 ~ MY21<br>
                                    S60, Cross Country(V60) : MY19 ~ MY21

                                </div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">당첨자 발표</div>
								<div class="list_txt">2021.03.16(화) / 총 300명</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">준비물 KIT 발송 일정</div>
								<div class="list_txt">2021.03.19(금) ~  2021.03.25(목)</div>
							</li>
						</ul>
						<div class="caption">* 본 행사는 중복 참여 및 신청이 불가합니다.</div>
					</div>
				</div>
            </section>
        </div>


        <div class="container" >
            <div class="box-ti">
                <div class="sti">KLASS</div>
                <div class="ti">참여 신청</div>
            </div>

            <form name="promoform" id="promoform" action="javascript: void(0)" method="post" onsubmit="return checkValidate(this);">

				<input type="hidden" name="master_cust_cd" value="<?=$_COOKIE['master_cust_cd']?>">
				<input type="hidden" name="member_id" value="<?=$_COOKIE['member_id']?>">
                

                <div class="applicant">
                    <strong class="input_tit">이름</strong>
                    <div class="input_wrap name_wrap">
                        <div class="input_box">
                            <input type="text" name="name" value="<?=$name?>" maxlength="120" noSpace placeholder="이름을 입력해주세요." onclick="alert('Hej, Klass 2021\n 참여 신청이 종료 되었습니다.');">
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
                            <option value="XC90">XC90 (MY17~)</option>
                            <option value="S90">S90 (MY17~)</option>
                            <option value="Cross Country(V90)">Cross Country(V90) (MY17~)</option>
                            <option value="XC60">XC60 (MY18~)</option>
                            <option value="XC40">XC40 (MY18~)</option>
                            <option value="Cross Country(V60)">Cross Country(V60) (MY19~)</option>
                            <option value="S60">S60 (MY19~)</option>
                        </select>
                    </div>

                    <strong class="input_tit">차량번호</strong>
                    <div class="input_wrap">
                        <div class="input_box">
                            <input type="text" name="car_num" value="" noSpace placeholder="차량번호를 입력해주세요.">
                        </div>
                    </div>

                    <!-- <strong class="input_tit">구매형태</strong>
                    <div class="choise_wrap gender_wrap">
                        <label class="choise_box">
                            <input type="radio" name="buy_type" value="A">
                            <span>개인</span>
                        </label>
                        <label class="choise_box">
                            <input type="radio" name="buy_type" value="B">
                            <span>리스</span>
                        </label>
                    </div> -->

                </div>

                <div class="agree_wrap">
                    <p class="descript">아래의 이벤트 약관에 동의해주세요.
                        
                    </p>                    
					<div class="agree">
                    
                        <div class="box-agree">
                            <label class="normal_label"><span>이벤트 약관</span><input type="checkbox" id="agree1" name="agree1" value="Y"></label>
                            <ul>
                                <li>
                                    이 클래스는 볼보자동차 신차 구매 고객을 대상으로 합니다.<br>
                                    XC90, S90, Cross Country(V90) : MY17 ~ MY21<br>
                                    XC60, XC40 : MY18 ~ MY21<br>
                                    S60, Cross Country(V60) : MY19 ~ MY21)
                                </li>
                                <li>본 클래스는 주최 측 상황에 따라 예고 없이 프로그램이 변경될 수 있습니다.</li>
                                <li>이벤트 약관에 동의하지 않을 시 클래스 참여 신청에 제한이 있을 수 있습니다.</li>
                                <li>문의 사항은 Hej, Klass 운영 사무국 (02-2057-1283)으로 연락 주시거나 카카오톡 채널 @hejklass로 문의 바랍니다.</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="btn_group mt30">
                    <button type="submit" class="btn bg_color1">신청완료</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

    

	<script>
        // input_nospace
        $("input:text[noSpace]").on("keyup", function() {
            $(this).val($(this).val().replace(' ',''));
        });

        // input_numberOnly
        $("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
        });
		


        function checkValidate(f) {
			alert('Hej, Klass 2021\n 참여 신청이 종료 되었습니다.');
			return false;
            app.showOverlayProgress();
            var data = {};
           
            if (!f.name.value) {
                alert("이름을 입력해주세요.");
                f.name.focus();
                app.hideOverlayProgress();
                return false;
            }
           
            
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
            
            if (!f.car_model.value) {
                alert("보유 차종을 선택해주세요.");
                f.car_model.focus();
                app.hideOverlayProgress();
                return false;
            }

			if (!f.car_num.value) {
                alert("차량번호를 입력해주세요.");
                f.car_num.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.agree1.checked) {
                alert("이벤트 약관에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree1.focus();
                app.hideOverlayProgress();
                return false;
            }

			ajaxPostPromo();

            function ajaxPostPromo() {
                console.log($('#promoform').serializeObject())
                var response;
                $.ajax({
                    url: "/ajax/ajax.postHejKlass.php",
                    type:'post',
                    // contentType: 'application/json;',
                    data: $('#promoform').serializeObject(),
                    dataType: 'text',
                    success: function(res){
                        response = res;
                        console.log(res);
						
                    },
                    complete: function(data) {
                        alert(response);
						app.hideOverlayProgress();
                    },
                    error: function(e) {
                        console.log(e);
						app.hideOverlayProgress();
                    }
                })
            }

            return false;
        }

        jQuery.fn.serializeObject = function() { var obj = null; try { if(this[0].tagName && this[0].tagName.toUpperCase() == "FORM" ) { var arr = this.serializeArray(); if(arr){ obj = {}; jQuery.each(arr, function() { obj[this.name] = this.value; }); } } }catch(e) { alert(e.message); }finally {} return obj; }

	function search_result(){

			if( $('.result_list_inner > ul > li > span.number:contains("' + $('#search_text').val() + '")').length > 0 ) {
                $('.result_list_inner > ul > li > span.number:contains("' + $('#search_text').val() + '")').each(function (index) {
					var match_name = $(this).parent().find(".name").text();
					var match_number = $(this).parent().find(".number").text();
					var msg = "Hej, Klass 2021\n당첨을 진심으로 축하드립니다!\n\n"+match_name+" "+match_number;
					alert(msg);
                });
            }
            else {
                alert('"Hej, Klass 2021\n당첨되지 않으셨습니다.\n\n참여해 주셔서 감사드리며,\n더 좋은 이벤트로 찾아 뵙겠습니다.');
            }		
	}

	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>