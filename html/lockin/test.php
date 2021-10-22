<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    // MgMoveURL('/html/member/main.php');
}

$_COOKIE['master_cust_cd'] = '2041384';

$sql = " select a.master_cust_cd, b.sid from volvo_wating_cust_list3 a left join volvo_wating_cust b on a.master_cust_cd = b.master_cust_cd where a.master_cust_cd = '" . $_COOKIE['master_cust_cd'] . "' ";
$checkResult = $db->fetch_array($sql)[0];

if (!$checkResult['master_cust_cd']) {
    MgMoveURL('/html/member/main.php', "고객님은 신청 대상자가 아닙니다.");
} else if ($checkResult['master_cust_cd'] && $checkResult['sid']) { 
    MgMoveURL('/html/lockin/appl.php');
}

$pToday = strtotime(date('Y-m-d'));
$pSdate = strtotime('2020-10-05');


$CODE = "lockin";
$FOOTER_CODE = "myvolvo";
$TITLE = "MY VOLVO";

$sid = $_COOKIE['master_cust_cd'];
$id = $_COOKIE['member_id'];
$nm = $_COOKIE['member_name'];
$hp = $_COOKIE['member_hp'];

$sql = " SELECT sid, cust_nm, use_sms_recept_yn, use_email_recept_yn, use_push_recept_yn, use_loc_service_yn, use_dm_recept_yn FROM volvo_user WHERE master_cust_cd = '" . $sid . "'";

$row=$db->fetch_array($sql)[0];

if (!$nm) {
    $nm = $row['cust_nm'];
}

$hpArr = [];
if ($hp) {
    $hp = add_hyphen($hp);
    $hpArr = explode("-", $hp);
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');

echo $sid;
?>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> 
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/member/member_menu.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>
        <div class="container detail">
            <section id="step_02" class="testdrive_info">
				<div class="testdrive_info_inner">

					<div class="event_apply">
						<div class="event_apply_ti">대기 고객 기프트 신청</div>
                        <div class="txt">볼보자동차를 선택해 주시고 오랜 시간 기다려 주신 고객님께 감사 드립니다.<br>
                        <br>감사의 마음을 담아 볼보의 헤리티지가 담긴 ‘볼보 P1800 모델카’를 발송해 드리고자 하오니, 아래 기프트 신청 양식을 작성해 주시기 바랍니다.<br> 
                        <br>볼보자동차는 고객님께 최고의 제품과 서비스를 제공해 드릴 수 있도록 최선을 다하겠습니다.<br>
                        <br>감사합니다.<br><br>
                        </div>
						<div class="event_gift_ti">기프트 안내<img src="/images/lockin/volvo_p1800.jpg" alt="volvo_p1800 헤리티지 다이캐스트"></div>
                        <div class="event_gift_sti">볼보 P1800 헤리티지 모델카</div>
                        <div class="stxt">VOLVO P1800은 4년간의 연구 끝에 1961년 출시된 볼보의 대표적인 모델입니다. 고풍적이면서 스포티한 디자인은 출시 이후 선풍적인 인기를 얻으며 지금도 스웨덴을 대표하는 모델로 기억되고 있습니다.<br><br> 
                        P1800은 1,778cc, 4기통 엔진과 트윈 카뷰레터를 통한 강력한 성능을 비롯, 날렵하고 섬세함을 강조한 독특한 외관, 비행기 조종실을 연상케 한 인스트루먼트 패널 등 디자인적인 탁월함과 접이식 뒷좌석 등 공간 활용성과 적재 능력까지 우수해 실용성까지 갖춘 차로 평가받았습니다.</div>
					</div>

				</div>
            </section>
        </div>

		<form name="promoform" id="promoform" action="javascript: void(0)" method="post" onsubmit="return checkValidate(this);">
        <div class="container apply">
                <div class="event_gift_sti">기프트 신청</div>
                <div class="txt">경품을 받으실 분의 이름과 연락처를 입력해 주세요.</div>
            
                <input type="hidden" name="isApp" value="true">
                
                <div class="applicant">
                    <strong class="input_tit">이름</strong>
                    <div class="input_wrap name_wrap">
                        <div class="input_box">
                            <input type="text" name="name" value="<?=$nm?>" maxlength="120" noSpace placeholder="이름을 입력해주세요.">
                        </div>
                    </div>

                    <strong class="input_tit">연락처</strong>
                    <div class="input_wrap phone_wrap">
                        <div class="input_box">
                            <select name="hp1">
                                <? foreach($OPTION_INFO['hp'] as $item) { 
                                    $selected = $hpArr[0] == $item ? " selected" : "";
                                    ?>
                                    <option value="<?=$item?>" <?=$selected?>><?=$item?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="input_box">
                            <input type="text" pattern="[0-9]*" name="hp2" value="<?=$hpArr[1]?>" maxlength="4" numberOnly placeholder="">
                        </div>
                        <div class="input_box">
                            <input type="text" pattern="[0-9]*" name="hp3" value="<?=$hpArr[2]?>" maxlength="4" numberOnly placeholder="">
                        </div>
                    </div>

                    <strong class="input_tit">배송지</strong>
                    <div class="stxt">경품을 받으실 주소를 입력해 주세요.<br>
                    주소는 등록 후 수정이 불가하오니 정확히 입력해 주세요. 
                    </div>
                    <div class="input_wrap address_wrap">
                        <div class="first">
                            <div class="input_box">
                                <input type="text" name="zipcode" readonly>
                            </div>
                            <a href="javascript: void(0)" class="btn" onclick="sample3_execDaumPostcode()">우편번호</a>
                        </div>
                        <div id="address_container" style="display: none; position: relative; margin-top: 10px;">
                            <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                        </div>
                        <div class="input_box">
                            <input type="text" name="addr1">
                        </div>
                        <div class="input_box">
                            <input type="text" name="addr2">
                        </div>
                    </div>
                    
                    <div class="box-caption">
                        <strong>[유의사항]</strong>
                        <ul>
                            <li>본 프로그램은 최초계약일이 2021년 1월 31일 이전으로 6월 30일 기준 미 출고 고객에게 적용되며, 계약자 명의 고객 당 1회에 한해 제공됩니다. (중복 신청 및 지급 불가)<br>
								* 단, 위의 조건을 충족하면서 6개월 이상 계약 대기 후, 출고 받은 고객도 신청 가능
							</li>
                            <li>경품 신청 후, 계약이 취소되는 경우 발송 대상에서 제외됩니다.</li>
                            <li>입력하신 수령 관련정보는 배송을 위한 목적으로만 활용되며, 경품 발송 후 파기됩니다.</li>
                            <li>정보 오입력으로 인한 오발송 및 반송의 경우 재발송되지 않으니 정확히 입력해 주세요.</li>
                            <li>본 경품은 타인에게 양도 및 재판매를 금지합니다.</li>
                            <li>문의사항은 고객 지원센터 (1588-1777)로 연락 바랍니다.</li>
                        </ul>    
                    </div>
                </div>

                <div class="agree_wrap">
                    <p class="descript">이벤트 활용 약관에 동의해 주세요.</p>                    
					<div class="agree">
                        <div class="box-agree">
                            <label class="normal_label"><span>[선택] 이벤트 활용 약관에 대한 동의</span><input type="checkbox" id="agree1" name="agree1" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(1);">자세히보기</a>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="btn_group mt20">
            <button type="submit" class="btn bg_color1">신청완료</button>
        </div>
		</form>

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
                <h5>이벤트 활용 약관에 대한 동의 (선택)</h3>
                <strong>1. 수집 목적 및 이용 내역</strong>
                <p>대기고객 기프트 신청 관리, 당첨자 경품 발송 등 이벤트 운영을 위한 목적 및 이벤트 소식, 혜택 제공 등 각종 마케팅 활동 목적</p>
                <p>대기고객 기프트 프로그램 : 이름, 휴대전화번호, 주소</p>
                <p>기타 각종 마케팅 활동 (로열티 프로그램 등 홍보 및 판촉활동) : 이름, 휴대전화번호, 이메일, 주소</p>
                <strong>2. 개인정보 보유 및 이용 기간 </strong>
                <p>- 이용 목적 달성 시</p>
                <p>* 동의 후에도 언제든지 이를 철회할 수 있으며, 동의 철회 및 변경은 My Volvo - 회원정보 수정에서 변경 가능합니다.</p>
				<p>* 대기고객 기프트 발송을 위한 수령인 및 주소 정보는 경품 발송을 위해서만 활용되며, 발송 완료 후 즉시 안전하게 파기됩니다.</p>
				<p>* 고객님은 개인정보의 마케팅 목적 활용을 거부할 수 있으나, 동의를 거부한 경우 기프트 신청 및 안내, 고객 혜택 등에 제한이 있을 수 있습니다.</p>
            </div>
        </div>
        
        
    </div>

	<script>

        //  var post = new daum.Postcode({
        //      oncomplete: function(data) {
        //          // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
        //          // 예제를 참고하여 다양한 활용법을 확인해 보세요.
        //          document.promoform.zipcode.value = data.zonecode;
        //          document.promoform.addr1.value = data.roadAddress;
        //          document.promoform.addr2.value = data.buildingName;
        //      }
        //  });


        // input_nospace
        $("input:text[noSpace]").on("keyup", function() {
            $(this).val($(this).val().replace(' ',''));
        });

        // input_numberOnly
        $("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
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


        function checkValidate(f) {
            app.showOverlayProgress();
            
            var hp = "";

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
            hp = f.hp1.value + f.hp2.value + f.hp3.value;

            if (!f.zipcode.value) {
                alert("주소를 입력하세요");
                f.zipcode.focus();
				app.hideOverlayProgress();
                return false;
            }

            if (!f.addr1.value) {
                alert("주소를 입력하세요");
                f.addr1.focus();
				app.hideOverlayProgress();
                return false;
            }

            if (!f.agree1.checked) {
                alert("이벤트 활용 약관에 동의해 주세요.");
                f.agree1.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            var formData = $('#promoform').serializeObject();
            formData['master_cust_cd'] = '<?=$sid?>';
            formData['id'] = '<?=$id?>';
            formData['hp'] = hp;
            
            ajaxPostWatingCust(formData);


            function ajaxPostWatingCust(_data) {
                console.log($('#promoform').serializeObject())
                var response;
                $.ajax({
                    url: "/ajax/ajax.postWatingCust.php",
                    type:'post',
                    // contentType: 'application/json;',
                    data: _data,
                    dataType: 'json',
                    success: function(res){
                        response = res;
                        console.log(res);
                    },
                    complete: function(data) {
                        if (response.result == 'success') {
                            alert('볼보 대기 고객 기프트 신청이 완료되었습니다.\n빠른 시일 내 입력하신 배송지로 기프트를 보내드릴 예정입니다. 감사합니다.');
                            location.href = "/html/member/member_menu.php";	
                        }else {
                            if(response.result == 'overlap') {
                                alert('이미 신청하신 내역이 있으므로, 중복 신청이 불가합니다.');
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



        var element_wrap = document.getElementById('address_container');

        function foldDaumPostcode() {
            // iframe을 넣은 element를 안보이게 한다.
            element_wrap.style.display = 'none';
        }

        function sample3_execDaumPostcode() {
        // 현재 scroll 위치를 저장해놓는다.
        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
        new daum.Postcode({
            oncomplete: function(data) {
                document.promoform.zipcode.value = data.zonecode;
                document.promoform.addr1.value = data.roadAddress;
                document.promoform.addr2.value = data.buildingName;

                element_wrap.style.display = 'none';

                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                document.body.scrollTop = currentScroll;
            },
            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
            onresize : function(size) {
                element_wrap.style.height = size.height+'px';
            },
            width : '100%',
            height : '100%'
        }).embed(element_wrap);

        // iframe을 넣은 element를 보이게 한다.
        element_wrap.style.display = 'block';
    }
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>