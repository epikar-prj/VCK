<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "promotion";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

$id = "";
if (isset($_COOKIE['member_id'])) {
    $id = $_COOKIE['member_id'];
}

$sql = " SELECT `category`, `title`, `content`, `option_type`, `option`, `sdate`, `edate`, `thum_file` FROM volvo_promotion WHERE del_chk = 'N' ";

$rows=$db->fetch_array($sql);

$checkMember = 0;

if (isset($_COOKIE['owner_flag'])) {
    if ($_COOKIE['owner_flag'] == 'Y') {
        $vehicles = getVehicleInfoToArray()['resultData'];
        
        foreach($vehicles as $vehicle) {
            $vin = $vehicle["vehicl_no"];
            // echo $vin;
            $sql = " SELECT count(*) FROM volvo_promo_apply_1 where vin = '{$vin}'";
            $checkMember += $db->select_one($sql);
        }
    }
}

$pToday = strtotime(date('Y-m-d H:i:s'));
$pSdate = strtotime('2020-10-19 09:00:00');
$pEdate = strtotime('2021-09-29 00:00:00');

$_COOKIE['master_cust_cd'] = '2383472';


include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents" class="newslist">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/benefit.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php" class="on">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_list.php" data-type="owner">Hej, Klass</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <div class="container">

            <ul class="list">
                    <li class="item">
                    <div class="banner" style="background-image: url('/images/promotion/hejfamilj_2021_fall/main_visual.jpg');">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>4</strong>
                                <span>November</span>
                            </div>
                            <p class="text">Hej, Familj<br>
                            2021 Fall Customer Invitation</p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[프로그램] 2021. 10. 18(월) ~ 2021. 11. 4(목)</h6>
                            <p class="text">아름다운 청정 자연에서 볼보와 함께하는 1박 2일 동안의 안전하고 프라이빗한 휴식으로 가족과의 소중한 시간을 보내시기 바랍니다.</p>
                            <div class="btn_group">
								<!--<a href="javascript:void(0);" onclick="alert('행사가 종료되었습니다.');" class="btn">행사 종료</a>-->
                                <!--<a href="/html/promotion/promotion2_winner.php" class="btn">당첨자 확인하기</a>-->
                                <?if ($_COOKIE['master_cust_cd'] == '2383472' || $_COOKIE['master_cust_cd'] == '1995227') {?>
                                    <?if ($pToday > $pEdate) {?>
                                    <a href="/html/promotion/hejfamilj_2021_fall.php" class="btn">신청 마감</a>
                                    <?} else {?>
                                    <a href="/html/promotion/hejfamilj_2021_fall.php" class="btn">신청 하기</a>
                                    <?}?>
                                <?} else {?>
                                <a href="/html/promotion/hejfamilj_2021_fall.php" class="btn">신청 마감</a>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </li>            
                <li class="item">
                    <div class="banner" style="background-image: url('/images/promotion/2021/main_visual.jpg');">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>19</strong>
                                <span>June</span>
                            </div>
                            <p class="text">Hej, Familj<br>
                            2021 Customer Invitation</p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[프로그램] 2021. 05. 25(화) ~ 2021. 06. 19(토)</h6>
                            <p class="text">아름다운 청정 자연에서 볼보와 함께하는 1박 2일 동안의 안전하고 프라이빗한 휴식으로 가족과의 소중한 시간을 보내시기 바랍니다.</p>
                            <ul class="gift">
                                <li>Room & Facility (1박2일)</li>
                                <li>Welcome Package</li>
                                <li>Snack Plate</li>
                                <li>Breakfast Service</li>
                            </ul>
                            <div class="btn_group">
								<a href="javascript:void(0);" onclick="alert('행사가 종료되었습니다.');" class="btn">행사 종료</a>
                                <!--<a href="/html/promotion/promotion2_winner.php" class="btn">당첨자 확인하기</a>-->
                            </div>
							<!-- <div class="btn_group">
                                <a href="/html/promotion/promotion2.php" class="btn">신청 마감</a>
                            </div> -->
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="banner" style="background-image: url('/images/promotion/main_visual.jpg');">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>11</strong>
                                <span>October</span>
                            </div>
                            <p class="text">Hej, Familj 2020 Fall<br>
                                Customer Invitation</p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[프로그램]  2020. 10. 05(월) ~ 2020. 10. 11(일)</h6>
                            <p class="text">볼보 고객만을 위해 제공하는 1박2일의 휴식으로, 가족과의 안전하고 편안한 시간을 보내시기 바랍니다.</p>
                            <ul class="gift">
                                <li>Room & Facility (1박2일)</li>
                                <li>Welcome Package</li>
                                <li>Snack Plate</li>
                                <li>Breakfast Service</li>
                            </ul>
                            <!--<div class="btn_group">
                                <a href="http://www.hejfamilj.co.kr/" class="btn" target="_blank">당첨자 확인하기(WEB)</a>
                            </div>-->
							<div class="btn_group">
                                <a href="javascript:void(0);" onclick="alert('행사가 종료되었습니다.');" class="btn">행사 종료</a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- <li class="item">
                    <div class="banner">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>12</strong>
                                <span>April</span>
                            </div>
                            <p class="text">Hej, Familj 2020 Spring<br>
                                Customer Invitation</p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[프로그램]  2020. 04. 11 ~ 2020. 04. 12</h6>
                            <p class="text">볼보 고객만을 위해 제공하는 최고의 휴식을,
                                1박 2일 동안 편안히 즐기시기 바랍니다.</p>
                            <ul class="gift">
                                <li>1박2일 객실</li>
                                <li>Special Dinner & Concert</li>
                                <li>Volvo Class</li>
                                <li>Lucky Draw</li>
                                <li>Water Park Ticket</li>
                                <li>After Party</li>
                            </ul>
                            <div class="btn_group">
                                <a href="/html/<?=$CODE?>/promotion2.php" class="btn" data-type="member">신청하기</a>
                            </div>
                        </div>
                    </div>
                </li> -->
                <!-- <li class="item">
                    <div class="banner">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>31</strong>
                                <span>February</span>
                            </div>
                            <p class="text">플래그십 SUV XC90<br>
                                시승 이벤트
                            </p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[프로그램] 2020. 04. 11 ~ 2020. 04. 12</h6>
                            <p class="text">볼보 고객만을 위해 제공하는 최고의 휴식을,
                                1박 2일 동안 편안히 즐기시기 바랍니다.</p>
                            <ul class="gift">
                                <li>1박2일 객실</li>
                                <li>Special Dinner & Concert</li>
                                <li>Volvo Class</li>
                                <li>Lucky Draw</li>
                                <li>Water Park Ticket</li>
                                <li>After Party</li>
                            </ul>
                            <div class="btn_group">
                                <a href="/html/<?= $CODE ?>/promotion2.php" class="btn">신청하기</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="banner">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>13</strong>
                                <span>October</span>
                            </div>
                            <p class="text">Hej, Plogging 2020 Fall<br>
                                Customer Invitation</p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[프로그램] 2020. 04. 11 ~ 2020. 04. 12</h6>
                            <p class="text">볼보 고객만을 위해 제공하는 최고의 휴식을,
                                1박 2일 동안 편안히 즐기시기 바랍니다.</p>
                            <ul class="gift">
                                <li>1박2일 객실</li>
                                <li>Special Dinner & Concert</li>
                                <li>Volvo Class</li>
                                <li>Lucky Draw</li>
                                <li>Water Park Ticket</li>
                                <li>After Party</li>
                            </ul>
                            <div class="btn_group">
                                <a href="/html/<?= $CODE ?>/promotion2.php" class="btn">신청하기</a>
                            </div>
                        </div>
                    </div>
                </li> -->
            </ul>

        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

	<script>
		// 배너 아코디언
		$('.list .item .cont').each(function (index) {
			var $t = $(this);
			var $t_item = $t.parents('.item');
			var height = $t.outerHeight();
			var top = $t_item.offset().top - 70;

			$t_item.find('.banner').click(function () {

				if ($t_item.hasClass('on')) {
					$t_item.removeClass('on');
					$t_item.find('.cont_wrap').css({height: 0});
					return;
				}

				$t.parents('.item').addClass('on')
					.siblings().removeClass('on');
				$t_item.find('.cont_wrap').css({height: height});
				$t_item.siblings().find('.cont_wrap').css({height: 0});

				$('#contents').animate({
					scrollTop: top
				},200);
			});
        });
        

        
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>