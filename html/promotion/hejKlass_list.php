<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

if (!isOwnered()) {
    MgMoveURL('/html/member/main.php', '볼보 고객만 가능한 서비스 입니다.');
}

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
            $model = $vehicle["model"];
            $modelYear = (int)$vehicle["model_year"];
            
            // echo $model . " || " . $modelYear;

            if (($model == "XC90" || $model == "S90" || $model == "V90CC") && $modelYear >= 2017) {
                $checkMember += 1;
            }
            
            if (($model == "XC60" || $model == "XC40") && $modelYear >= 2018) {
                $checkMember += 1;
            }

            if (($model == "S60" || $model == "V60CC") && $modelYear >= 2019) {
                $checkMember += 1;
            }

            $text = $_COOKIE['member_id'] . " | " . $vin . " | " . $model . " | " . $modelYear;

            $logQuery[] = " INSERT INTO volvo_query_log (gubun, query_log, errorcode, callback, resultdata, regdate) VALUES('checkHej', '{$text}', '', '', '{$checkMember}', SYSDATE()); ";
            $db->tran_query( $logQuery );

            // echo $vin;
            // $sql = " SELECT count(*) FROM volvo_promo_apply_1 where vin = '{$vin}'";
            // $checkMember += $db->select_one($sql);
        }
    }
}

$pToday = strtotime(date('Y-m-d H:i:s'));
$pSdate = strtotime('2020-10-05 09:00:00');

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
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_list.php" class="on">Hej, Klass</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <div class="container">

            <ul class="list">
                <li class="item on">
                    <div class="banner" style="background-image: url('/images/promotion/hejKlass_02/thumb_hejKlass.jpg');">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>7</strong>
                                <span>July</span>
                            </div>
                            <p class="text">Hej, Klass #2<br>
                                데스크테리어 만들기</p>
                        </div>
                    </div>
                    <div class="cont_wrap" style="height:200px;">
                        <div class="cont">
                            <!--<h6>[프로그램]  2020. 10. 05(월) ~ 2020. 10. 11(일)</h6>-->
                            <p class="text">손흥민 선수의 친필 사인이 담겨있는 리미티드 에디션 데스크테리어로 나만의 공간을 채워보세요.</p>
                            <ul class="gift">
                                <li>[신청 기간] 2021.06.16(수) ~ 2021.06.20(일)</li>
                                <li>[당첨자 발표] 2021.06.23(수) / 총 300명</li>
                            </ul>
                            <div class="btn_group">
								<a href="javascript:void(0);" onclick="alert('행사가 종료되었습니다.');" class="btn">행사 종료</a>
                                <!--<a href="/html/promotion/hejKlass_view2.php" class="btn" data-type="owner">당첨자 확인하기</a>-->
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="banner" style="background-image: url('/images/promotion/hejKlass_01/thumb_hejKlass.jpg');">
                        <div class="text_wrap">
                            <div class="date">
                                <strong>26</strong>
                                <span>March</span>
                            </div>
                            <p class="text">Hej, Klass #1<br>
                                페이퍼 플라워 리스 만들기</p>
                        </div>
                    </div>
                    <div class="cont_wrap">
                        <div class="cont">
                            <!--<h6>[프로그램]  2020. 10. 05(월) ~ 2020. 10. 11(일)</h6>-->
                            <p class="text">생화보다 아름다운 페이퍼 플라워로 시들지 않는 화사함이 담긴 봄 맞이 플라워 인테리어 소품을 만들어보세요.</p>
                            <ul class="gift">
                                <li>[신청 기간] 2021.03.10(수) ~ 2021.03.14(일)</li>
                                <li>[당첨자 발표] 2021.03.16(화) / 총 300명</li>
                            </ul>
                            <div class="btn_group">
                                <a href="javascript:void(0);" onclick="alert('행사가 종료되었습니다.');" class="btn">행사 종료</a>
                            </div>
                        </div>
                    </div>
                </li>
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