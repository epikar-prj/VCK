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
                            <h6>[????????????] 2021. 10. 18(???) ~ 2021. 11. 4(???)</h6>
                            <p class="text">???????????? ?????? ???????????? ????????? ???????????? 1??? 2??? ????????? ???????????? ??????????????? ???????????? ???????????? ????????? ????????? ???????????? ????????????.</p>
                            <div class="btn_group">
								<!--<a href="javascript:void(0);" onclick="alert('????????? ?????????????????????.');" class="btn">?????? ??????</a>-->
                                <!--<a href="/html/promotion/promotion2_winner.php" class="btn">????????? ????????????</a>-->
                                <?if ($_COOKIE['master_cust_cd'] == '2383472' || $_COOKIE['master_cust_cd'] == '1995227') {?>
                                    <?if ($pToday > $pEdate) {?>
                                    <a href="/html/promotion/hejfamilj_2021_fall.php" class="btn">?????? ??????</a>
                                    <?} else {?>
                                    <a href="/html/promotion/hejfamilj_2021_fall.php" class="btn">?????? ??????</a>
                                    <?}?>
                                <?} else {?>
                                <a href="/html/promotion/hejfamilj_2021_fall.php" class="btn">?????? ??????</a>
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
                            <h6>[????????????] 2021. 05. 25(???) ~ 2021. 06. 19(???)</h6>
                            <p class="text">???????????? ?????? ???????????? ????????? ???????????? 1??? 2??? ????????? ???????????? ??????????????? ???????????? ???????????? ????????? ????????? ???????????? ????????????.</p>
                            <ul class="gift">
                                <li>Room & Facility (1???2???)</li>
                                <li>Welcome Package</li>
                                <li>Snack Plate</li>
                                <li>Breakfast Service</li>
                            </ul>
                            <div class="btn_group">
								<a href="javascript:void(0);" onclick="alert('????????? ?????????????????????.');" class="btn">?????? ??????</a>
                                <!--<a href="/html/promotion/promotion2_winner.php" class="btn">????????? ????????????</a>-->
                            </div>
							<!-- <div class="btn_group">
                                <a href="/html/promotion/promotion2.php" class="btn">?????? ??????</a>
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
                            <h6>[????????????]  2020. 10. 05(???) ~ 2020. 10. 11(???)</h6>
                            <p class="text">?????? ???????????? ?????? ???????????? 1???2?????? ????????????, ???????????? ???????????? ????????? ????????? ???????????? ????????????.</p>
                            <ul class="gift">
                                <li>Room & Facility (1???2???)</li>
                                <li>Welcome Package</li>
                                <li>Snack Plate</li>
                                <li>Breakfast Service</li>
                            </ul>
                            <!--<div class="btn_group">
                                <a href="http://www.hejfamilj.co.kr/" class="btn" target="_blank">????????? ????????????(WEB)</a>
                            </div>-->
							<div class="btn_group">
                                <a href="javascript:void(0);" onclick="alert('????????? ?????????????????????.');" class="btn">?????? ??????</a>
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
                            <h6>[????????????]  2020. 04. 11 ~ 2020. 04. 12</h6>
                            <p class="text">?????? ???????????? ?????? ???????????? ????????? ?????????,
                                1??? 2??? ?????? ????????? ???????????? ????????????.</p>
                            <ul class="gift">
                                <li>1???2??? ??????</li>
                                <li>Special Dinner & Concert</li>
                                <li>Volvo Class</li>
                                <li>Lucky Draw</li>
                                <li>Water Park Ticket</li>
                                <li>After Party</li>
                            </ul>
                            <div class="btn_group">
                                <a href="/html/<?=$CODE?>/promotion2.php" class="btn" data-type="member">????????????</a>
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
                            <p class="text">???????????? SUV XC90<br>
                                ?????? ?????????
                            </p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <h6>[????????????] 2020. 04. 11 ~ 2020. 04. 12</h6>
                            <p class="text">?????? ???????????? ?????? ???????????? ????????? ?????????,
                                1??? 2??? ?????? ????????? ???????????? ????????????.</p>
                            <ul class="gift">
                                <li>1???2??? ??????</li>
                                <li>Special Dinner & Concert</li>
                                <li>Volvo Class</li>
                                <li>Lucky Draw</li>
                                <li>Water Park Ticket</li>
                                <li>After Party</li>
                            </ul>
                            <div class="btn_group">
                                <a href="/html/<?= $CODE ?>/promotion2.php" class="btn">????????????</a>
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
                            <h6>[????????????] 2020. 04. 11 ~ 2020. 04. 12</h6>
                            <p class="text">?????? ???????????? ?????? ???????????? ????????? ?????????,
                                1??? 2??? ?????? ????????? ???????????? ????????????.</p>
                            <ul class="gift">
                                <li>1???2??? ??????</li>
                                <li>Special Dinner & Concert</li>
                                <li>Volvo Class</li>
                                <li>Lucky Draw</li>
                                <li>Water Park Ticket</li>
                                <li>After Party</li>
                            </ul>
                            <div class="btn_group">
                                <a href="/html/<?= $CODE ?>/promotion2.php" class="btn">????????????</a>
                            </div>
                        </div>
                    </div>
                </li> -->
            </ul>

        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

	<script>
		// ?????? ????????????
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