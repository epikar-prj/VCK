<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "testdrive";
$FOOTER_CODE = "buy";
$TITLE = "개인정보 수집 및 이용동의";

$currentPage = "04";
$endPage = "04";

// if (isLogined()) {
//     $endPage = "0";
// }

$model = $_GET['model'];
$showroom = $_GET['showroom'];
$name = $_GET['name'];
$hp1 = $_GET['hp1'];
$hp2 = $_GET['hp2'];
$hp3 = $_GET['hp3'];
$email = $_GET['email'];
// $sex = $_GET['sex'];
$birth1 = $_GET['birth1'];
$birth2 = $_GET['birth2'];
$birth3 = $_GET['birth3'];
$buy_check = $_GET['buy_check'];

$use_personal_info_yn = "N";
$use_personal_consignment_yn = "N";
$use_personal_uses_yn = "N";
$use_sms_recept_yn = "N";

if (isset($_COOKIE['master_cust_cd'])) {
    $master_cust_cd = $_COOKIE['master_cust_cd'];

    $sql = " SELECT sid, use_personal_info_yn, use_personal_consignment_yn, use_personal_uses_yn, use_sms_recept_yn FROM volvo_user WHERE master_cust_cd = '" . $master_cust_cd . "'";
    
    $row=$db->fetch_array($sql)[0];
    
    $use_personal_info_yn = $row['use_personal_info_yn'] == "Y" ? "Y" : "N";
    $use_personal_consignment_yn = $row['use_personal_consignment_yn'] == "Y" ? "Y" : "N";
    $use_personal_uses_yn = $row['use_personal_uses_yn'] == "Y" ? "Y" : "N";
    $use_sms_recept_yn = $row['use_sms_recept_yn'] == "Y" ? "Y" : "N";
}



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
            <h4 class="response"><?=$TITLE?></h4>
            <div class="page">
                <p><strong><?=$currentPage?></strong><span><?=$endPage?></span></p>
            </div>
        </div>

        <div id="visual">
            <img src="/images/testdrive/img_visual-1.jpg" alt="">
        </div>

        <div class="container">
			<form name="tdForm" action="/ajax/ajax.postTestdrive.php" onsubmit="return checkValidate(this);">
                <input type="hidden" name="model" value="<?=$model?>">
                <input type="hidden" name="showroom" value="<?=$showroom?>">
                <input type="hidden" name="name" value="<?=$name?>">
                <input type="hidden" name="hp1" value="<?=$hp1?>">
                <input type="hidden" name="hp2" value="<?=$hp2?>">
                <input type="hidden" name="hp3" value="<?=$hp3?>">
                <input type="hidden" name="email" value="<?=$email?>">
                <input type="hidden" name="sex" value="<?=$sex?>">
                <input type="hidden" name="birth1" value="<?=$birth1?>">
                <input type="hidden" name="birth2" value="<?=$birth2?>">
                <input type="hidden" name="birth3" value="<?=$birth3?>">
                <input type="hidden" name="buy_check" value="<?=$buy_check?>">

                <div class="container_agree">
                    <div class="box-txt">
                        <p>㈜볼보자동차코리아는 서비스 제공을 위하여 ‘개인정보보호법’, ‘정보통신망이용촉진 및 정보보호 등에 관한 법률’ 및 ‘신용정보 이용 및 보호에 관한 법률’ 등, 관련 법규에 따라 아래와 같이 개인정보의 수집 및 이용 또는 제공하고자 하오니, 아래 내용에 대한 동의 여부를 결정하여 주시기 바랍니다.</p>
                    </div>

                    <div class="box-allAgree">
                        <label>
                            <input type="checkbox" class="all_check all" data-rel="all">
                            <span>전체 약관에 동의합니다</span>
                        </label>
                    </div>

                    <div class="box-agree">
                        <h5>[필수] 개인정보 수집 및 이용에 대한 동의</h3>
                        <div class="cntn">
    
                            <div class="box-table">
                                <table>
                                    <colgroup>
                                        <col width="104px">
                                        <col width="*">
                                    </colgroup>
                                    <tr class="check">
                                        <th>동의 여부</th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="agree_1">
                                                <span>동의</span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>정보 처리자</th>
                                        <td>㈜볼보자동차코리아</td>
                                    </tr>
                                    <tr>
                                        <th>항목</th>
                                        <td>성명, 휴대전화번호, 이메일, 생년월일, 선호차종 (시승 신청 시 필수 기재 요망)</td>
                                    </tr>
                                    <tr>
                                        <th>목적</th>
                                        <td>캠페인 참여 고객 대상 서비스 제공 및 기타 시승안내(시승신청시)</td>
                                    </tr>
                                    <tr>
                                        <th>처리기간</th>
                                        <td>처리 목적 달성 시까지 <br>고객의 동의 철회 요청 시까지</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="box-caption">
                                <p>개인정보 수집•이용에 대하여 거절을 하실 수 있으며, 거절 시 경품 응모, 이벤트 및 광고성 메일 수신 또는 시승 안내에 어려움이 있을 수 있습니다.</p>
                            </div>
                        </div>
                    </div>

                    <div class="box-agree">
                        <h5>[필수] 개인정보 제3자 제공에 대한 동의</h3>
                        <div class="cntn">
    
                            <div class="box-check">
                                <input type="checkbox" class="all_check" data-rel="2">
                                <span>전체동의</span>
                            </div>
                            <div class="box-table">
                                <table>
                                    <colgroup>
                                        <col width="104px">
                                        <col width="*">
                                    </colgroup>
                                    <tr class="check">
                                        <th>동의 여부</th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="agree_2" data-rel="2">
                                                <span>동의</span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>정보 처리자</th>
                                        <td>㈜볼보자동차코리아와 업무 계약 관계에 있는 대행사<br><a href="www.volvocars.co.kr" target="_blank">www.volvocars.co.kr</a></td>
                                    </tr>
                                    <tr>
                                        <th>항목</th>
                                        <td>성명, 휴대전화번호, 이메일, 생년월일</td>
                                    </tr>
                                    <tr>
                                        <th>목적</th>
                                        <td>캠페인 참여 고객 대상 서비스 제공 및 기타 시승안내(시승신청시)</td>
                                    </tr>
                                    <tr>
                                        <th>처리기간</th>
                                        <td>처리 목적 달성 시까지 <br>고객의 동의 철회 요청 시까지</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="box-table">
                                <table>
                                    <colgroup>
                                        <col width="104px">
                                        <col width="*">
                                    </colgroup>
                                    <tr class="check">
                                        <th>동의 여부</th>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="agree_3" data-rel="2">
                                                <span>동의</span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>정보 처리자</th>
                                        <td>㈜볼보자동차코리아의 공식 딜러사 및 딜러사와 업무 계약 관계에 있는 대행사<br><a href="www.volvocars.co.kr" target="_blank">www.volvocars.co.kr</a></td>
                                    </tr>
                                    <tr>
                                        <th>항목</th>
                                        <td>성명, 휴대전화번호, 이메일, 생년월일</td>
                                    </tr>
                                    <tr>
                                        <th>목적</th>
                                        <td>캠페인 참여 고객 대상 서비스 제공 및 기타 시승안내(시승신청시)</td>
                                    </tr>
                                    <tr>
                                        <th>처리기간</th>
                                        <td>처리 목적 달성 시까지 <br>고객의 동의 철회 요청 시까지</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="box-caption">
                                <p>개인정보 수집•이용에 대하여 거절을 하실 수 있으며, 거절 시 경품 응모, 이벤트 및 광고성 메일 수신 또는 시승 안내에 어려움이 있을 수 있습니다.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-agree">
                        <h5>[선택] 광고성 정보 수신에 대한 동의</h3>
                        <div class="cntn">
    
                            <div class="box-check">
                                <input type="checkbox" class="all_check" data-rel="3">
                                <span>전체동의</span>
                            </div>
                            <div class="box-table">
                                <table>
                                    <colgroup>
                                        <col width="104px">
                                        <col width="*">
                                    </colgroup>
                                    <tr class="check">
                                        <th>동의 여부</th>
                                        <td>
                                            <label>
                                                <input type="radio" name="agree_4" data-rel="3" value="Y">
                                                <span>동의</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="agree_4" data-rel="3" value="N">
                                                <span>비동의</span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>주체</th>
                                        <td>㈜볼보자동차코리아</td>
                                    </tr>
                                    <tr>
                                        <th>목적</th>
                                        <td>차량 구매 고객 이벤트, 캠페인 참여 고객 대상 서비스 제공 및 기타 마케팅 활용(월간e-뉴스레터 발송, 신규 이벤트 안내 등), 시승안내</td>
                                    </tr>
                                    <tr>
                                        <th>수신기간</th>
                                        <td>수신 동의 철회시까지</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="box-table">
                                <table>
                                    <colgroup>
                                        <col width="104px">
                                        <col width="*">
                                    </colgroup>
                                    <tr class="check">
                                        <th>동의 여부</th>
                                        <td>
                                            <label>
                                                <input type="radio" name="agree_5" data-rel="3" value="Y">
                                                <span>동의</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="agree_5" data-rel="3" value="N">
                                                <span>비동의</span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>주체</th>
                                        <td>㈜볼보자동차코리아의 공식 딜러사<br><a href="www.volvocars.co.kr" target="_blank">www.volvocars.co.kr</a></td>
                                    </tr>
                                    <tr>
                                        <th>목적</th>
                                        <td>차량 구매 고객 이벤트, 캠페인 참여 고객 대상 서비스 제공 및 기타 마케팅 활용(월간e-뉴스레터 발송, 신규 이벤트 안내 등), 시승안내</td>
                                    </tr>
                                    <tr>
                                        <th>수신기간</th>
                                        <td>수신 동의 철회시까지</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="box-caption">
                                <p>상기 동의 내역에 거절을 하실 수 있으며, 거절 시 각 부분별 안내에 어려움이 있을 수 있습니다.</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-caption">
                        <p>개인정보 수집•이용에 대한 철회 요청은 고객센터 1588-1777 로 연락 주시기 바랍니다.</p>
                        <p>기재된 본인의 정보를 귀사가 수집하여, 이를 마케팅에 활용함에 있어 상기의 내용을 확인하고 이해 하였으며, 이에 자발적으로 동의합니다. </p>
                    </div>
                </div>


				<div class="agree">
					<!-- <label class="top_label"><span>모두 동의 합니다.</span><input type="checkbox" id="all_agree"></label>
					<label class="normal_label"><span>[필수] 개인정보 수집 및 이용에 대한 동의</span><input type="checkbox" id="agree1" name="agree_1" value="Y" <?if ($use_personal_info_yn == "Y") { echo "checked"; }?>></label>
					<a href="javascript: void(0)" onclick="open_pop(1);">자세히보기</a>
					<label class="normal_label"><span>[필수] 개인정보 처리 및 이용에 동의합니다.</span><input type="checkbox" id="agree2" name="agree_2" value="Y" <?if ($use_personal_consignment_yn == "Y") { echo "checked"; }?>></label>
					<a href="javascript: void(0)" onclick="open_pop(2);">자세히보기</a>
					<label class="normal_label"><span>[필수] 개인정보 제3자 제공 및 활용에 대한 동의</span><input type="checkbox" id="agree3" name="agree_3" value="Y" <?if ($use_personal_uses_yn == "Y") { echo "checked"; }?>></label>
					<a href="javascript: void(0)" onclick="open_pop(3);">자세히보기</a>
					<label class="normal_label"><span>[선택] 광고/정보 수신 및 마케팅 활용에 대한 동의</span><input type="checkbox" id="agree4" name="agree_4" value="Y" ></label>
					<a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a> -->

                    <div class="agree_caption">
						<div class="gift">
							<div class="box-img">
								<img src="/images/testdrive/step_icon_05.png" alt="">
							</div>
							<div class="box-txt">
								<p>본 페이지를 통해 시승 신청, 전시장에서 시승을 완료하신 고객께 스타벅스 기프티콘(카페라떼 Tall size)을 드립니다.</p>
							</div>
						</div>
                        <strong>[유의사항]</strong>
                        <?
                            $month = date("n");
                        ?>
                        <ul>
                            <li>- 시승 완료 시 기프티콘은 1회 발송됩니다. (중복 시승으로 인한 기프티콘 지급 불가)</li>
                            <li>- 온라인으로 시승 신청 후, <?=$month?>월 기준 현장 시승 완료자 모두에게 기프티콘이 발송됩니다.</li>
                            <li>- 기프티콘은 전주 월요일부터 일요일까지 시승을 완료한 고객님들을 대상으로 매주 화요일 발송될 예정입니다.</li>
                        </ul>
                    </div>


					<?if (!isLogined()) {?>
					<div class="agree_foot">
						<p class="descript">시승신청 완료 버튼을 누르면 Hej Volvo<br>
							가입이 승인됩니다. 앱에 가입하시겠습니까?
						</p>
						<div class="agree_item_wrap">
							<div class="agree_item">
								<label>
									<input type="radio" name="agree_reg" value="Y">
									<p class="text">네</p>
								</label>
							</div>
							<div class="agree_item">
								<label>
									<input type="radio" name="agree_reg" value="N">
									<p class="text">아니오</p>
								</label>
							</div>
						</div>
                    </div>
                    <? } ?>
				</div>
				<div class="btn_group">
					<a href="javascript:history.back();" class="btn">이전</a>
					<button type="submit" class="btn bg_color1">완료</button>
				</div>
			</form>
		</div>
    </div>
    
    <script src="/html/testdrive/script.js"></script>

	<script>
        
        $(".all_check").on("change", function() {
            var _this = $(this);
            var data = _this.data("rel");

            if (data != "all") {
                $("input[data-rel=" + data + "][type=checkbox]").each(function(key, item) {
                    item.checked = _this[0].checked;
                })
                $("input[data-rel=" + data + "][type=radio]").each(function(key, item) {
                    if (_this[0].checked) {
                        if (item.value == "Y") {
                            item.checked = true;
                        }
                    } else {
                        if (item.value == "N") {
                            item.checked = true;
                        }
                    }
                })
            } else {
                $("input[type=checkbox]").each(function(key, item) {
                    item.checked = _this[0].checked;
                })
                $("input[type=radio]").each(function(key, item) {
                    if (_this[0].checked) {
                        if (item.value == "Y") {
                            item.checked = true;
                        }
                    } else {
                        if (item.value == "N") {
                            item.checked = true;
                        }
                    }
                })
            }

            var checkArrAll = [];

            $("input[type=checkbox]:not(.all_check)").each(function(key, item) {
                checkArrAll.push(item.checked);
            })

            var agree_4 = false;
            $("input[type=radio][name=agree_4]").each(function(key, item) {
                if (item.value == "Y" && item.checked) {
                    agree_4 = true;
                }
            })
            
            var agree_5 = false;
            $("input[type=radio][name=agree_5]").each(function(key, item) {
                if (item.value == "Y" && item.checked) {
                    agree_5 = true;
                }
            })

            checkArrAll.push(agree_4);
            checkArrAll.push(agree_5);

            // $("input[type=radio]:not(.all_check)").each(function(key, item) {
            //     if (item.value == "Y") {
            //         checkArrAll.push(true);
            //     } else {
            //         checkArrAll.push(false);
            //     }
            // })

            if (checkArrAll.indexOf(false) > -1) {
                $("input[type=checkbox].all_check.all")[0].checked = false;
            } else {
                $("input[type=checkbox].all_check.all")[0].checked = true;
            }
        })

        $("input[type=checkbox]:not(.all_check)").on("change", function(){
            var _this = $(this);
            var data = _this.data("rel");

            var checkArr = [];
            var checkArrAll = [];
            $("input[data-rel=" + data + "]:not(.all_check)").each(function(key, item) {
                checkArr.push(item.checked);
            })
            $("input[type=checkbox]:not(.all_check)").each(function(key, item) {
                checkArrAll.push(item.checked);
            })

            if ($("input[data-rel=" + data + "].all_check").length) {
                if (checkArr.indexOf(false) > -1) {
                    $("input[data-rel=" + data + "].all_check")[0].checked = false;
                } else {
                    $("input[data-rel=" + data + "].all_check")[0].checked = true;
                }
            }

            var agree_4 = false;
            $("input[type=radio][name=agree_4]").each(function(key, item) {
                if (item.value == "Y" && item.checked) {
                    agree_4 = true;
                }
            })
            
            var agree_5 = false;
            $("input[type=radio][name=agree_5]").each(function(key, item) {
                if (item.value == "Y" && item.checked) {
                    agree_5 = true;
                }
            })

            checkArrAll.push(agree_4);
            checkArrAll.push(agree_5);

            if (checkArrAll.indexOf(false) > -1) {
                $("input[type=checkbox].all_check.all")[0].checked = false;
            } else {
                $("input[type=checkbox].all_check.all")[0].checked = true;
            }
        });

        $("input[type=radio]").on("change", function() {
            var _this = $(this);
            var data = _this.data("rel");

            var checkArr = [];
            var checkArrAll = [];

            $("input[type=checkbox]:not(.all_check)").each(function(key, item) {
                checkArrAll.push(item.checked);
            })

            var agree_4 = false;
            $("input[type=radio][name=agree_4]").each(function(key, item) {
                if (item.value == "Y" && item.checked) {
                    agree_4 = true;
                }
            })
            
            var agree_5 = false;
            $("input[type=radio][name=agree_5]").each(function(key, item) {
                if (item.value == "Y" && item.checked) {
                    agree_5 = true;
                }
            })

            checkArr.push(agree_4);
            checkArr.push(agree_5);
            checkArrAll.push(agree_4);
            checkArrAll.push(agree_5);

            if ($("input[data-rel=" + data + "].all_check").length) {
                if (checkArr.indexOf(false) > -1) {
                    $("input[data-rel=" + data + "].all_check")[0].checked = false;
                } else {
                    $("input[data-rel=" + data + "].all_check")[0].checked = true;
                }
            }

            if (checkArrAll.indexOf(false) > -1) {
                $("input[type=checkbox].all_check.all")[0].checked = false;
            } else {
                $("input[type=checkbox].all_check.all")[0].checked = true;
            }
        })
	</script>
    
    <script>
        function checkValidate(_form) {
            if (!_form.agree_1.checked ) {
                alert("개인정보 수집·이용에 동의하지 않을 시 신청에 제한이 있을 수 있습니다.");
                return false;
            }
            if (!_form.agree_2.checked ) {
                alert("개인정보 제3자 제공에 대한 동의를 하지 않을 시 신청에 제한이 있을 수 있습니다.");
                return false;
            }
            if (!_form.agree_3.checked ) {
                alert("개인정보 제3자 제공에 대한 동의를 하지 않을 시 신청에 제한이 있을 수 있습니다.");
                return false;
            }
            if (_form.agree_4.value != "Y" ) {
                alert("광고성 정보 수신에 동의하지 않을 시 프로모션 및 기타 마케팅 활동 안내에 따른 혜택이 제한될 수 있습니다.");
                return false;
            }
            if (_form.agree_5.value != "Y" ) {
                alert("광고성 정보 수신에 동의하지 않을 시 프로모션 및 기타 마케팅 활동 안내에 따른 혜택이 제한될 수 있습니다.");
                return false;
            }

            postTextdrive(_form);

            return false;
        }

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
                    app.hideOverlayProgress();
                    alert(res.msg);
                    if (data.agree_reg == "Y") {
                        location.href='/html/member/join.php?email=' + data.email + '&name='+ data.name + '&hp1=' + data.hp1 + '&hp2=' + data.hp2 + '&hp3=' + data.hp3 ;
                    } else {
                        location.href='/html/testdrive/testdrive1.php';
                    }
                }, error: function(e) {
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