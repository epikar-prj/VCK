<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php');
    }

    $vehicles = getVehicleInfoToArray()['resultData'];
    $vehicle_no = $vehicles[0]['vehicl_no'];

    $coupon_sdate = '-';
    $coupon_edate = '-';

    $coupons = getVehicleCouponToArray($vehicle_no);
    $coupons_result = $coupons['result'];

    $coupon_tot = 0;

    $limit_mileage = "";

    if ($coupons_result == 'success') {
        $coupons = $coupons['resultData'];
        $limit_mileage = $coupons[1]['limit_mileage'];
        $coupon_km = explode(",", $coupons[2]['km']);
        $coupon_nm = explode(",", str_replace("1,000 Km", "1.000 Km", $coupons[2]['coupon_nm']));
        $coupon_row = $coupons[3];
        $coupon_sdate = str_replace("-", ".", $coupons[0]['use_first_dt']);
        $coupon_edate = str_replace("-", ".", $coupons[0]['use_end_dt']);
    }
    

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/member/member_menu.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="member_coupon">
			<h4>서비스 쿠폰</h4>

			<div class="coupon_top">
                <div class="input_box">
                    <select id="select_vehicle">
                        <? foreach($vehicles as $vehicle) { ?>
                        <option value="<?=$vehicle['vehicl_no']?>"><?=$vehicle['car_no']?></option>
                        <? } ?>
                    </select>
                </div>
                 <ul>
                    <li id="limitDate">사용 기한: <?=$coupon_sdate?> ~ <?=$coupon_edate?></li>
                    <li id="limitMileage">주행거리: <?=$limit_mileage?></li>
                </ul> 
            </div>

            <div class="coupon_pack">
                <ul class="label">
                    <li><i class="o"></i>사용가능 쿠폰</li>
                    <li><i class="v"></i>사용한 쿠폰</li>
                </ul>
				<div class="label_caption">사용한 쿠폰을 Touch하시면 사용내역이 보여집니다.</div>
                <ul id="coupon_list" class="list">
                    <?if ($coupons_result == "success") {?>
                    
                    <? foreach($coupon_km as $index => $row) { ?>
                    <li class="item">
                        <span><?=$row?> Km</span>
                        <ul>
                            <? foreach($coupon_row as $index2 => $row2) { 
                                if ($row2[$index]['use_yn'] == 'Y') { ?>
                                    <li class="enable" data-date="<?=$row2[$index]['use_dt']?>" data-dealer="<?=$row2[$index]['dealer_nm']?>" data-mileage="<?=$row2[$index]['mileage']?>"><a href="#" class="used"><i class="v"></i> <?=$coupon_nm[$index2]?></a></li>
                                        <? } else if ($row2[$index]['use_yn'] == 'N') { 
                                            $coupon_tot ++;
                                        ?>
                                    <li class="disable"><span><i class="o"></i> <?=$coupon_nm[$index2]?></span></li>
                                        <? }
                            } ?>
                        </ul>

                       
                    </li>
                    <? } ?>
                    <? } ?>
                    <!-- <li class="item">
                        <span>1,000 km</span>
                        <ul>
                            <li class="enable"><a href="#" class="used""><i class="v"></i> 1000km</a></li>
                        </ul>
                    </li>
                    <li class="item">
                        <span>15,000 km</span>
                        <ul>
                            <li class="disable"><span><i class="o"></i> Service 2.0</span></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> 엔진오일&필터 교환</a></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> 에어클리너 교환</a></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> 에어컨필터 교환(Cabin)</a></li>
                        </ul>
                    </li>
                    <li class="item">
                        <span>30,000 km</span>
                        <ul>
                            <li class="disable"><span><i class="o"></i> Service 2.0</span></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> Wear and tear Inspection</a></li>
                            <li class="disable"><span><i class="o"></i> 엔진오일&필터 교환</span></li>
                            <li class="disable"><span><i class="o"></i> 에어클리너 교환</span></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> 브레이크액</a></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> 앞브레이크 패드 교환</a></li>
                        </ul>
                    </li>
                    <li class="item">
                        <span>45,000 km</span>
                        <ul>
                            <li class="disable"><span><i class="o"></i> Service 2.0</span></li>
                            <li class="disable"><span><i class="o"></i> 엔진오일&필터 교환</span></li>
                            <li class="disable"><span><i class="o"></i> 에어클리너 교환</span></li>
                            <li class="enable"><a href="#" class="used"><i class="v"></i> 뒤브레이크 패드 교환</a></li>
                        </ul>
                    </li> -->
                </ul>
                <div class="guide">
					<p>총 <span id="coupon_tot"><?=$coupon_tot?></span>개의 쿠폰을 보유하고 있습니다.<!--<br>
                        (사용 가능 <i class="o"></i> 사용 완료 <i class="v"></i> 기간 만료 <i class="x"></i>)-->
                    </p>
                    <p>서비스 항목은 현금이나 물품으로 제공되지 않습니다.</p>
                    <p>2016년 7월부터 판매되는 MY17 차량부터 적용됩니다.</p>
                </div>

            </div>
		</div>
    </div>

	<div class="member_coupon_pop" id="pop">
		<div class="pop">
			<div class="pop_scroll_wrap">
				<div class="back">
					<a id="close" href="javascript:void(0);">
						<img src="/images/common/ic_back.png" alt="">
					</a>
				</div>
				<div class="top">
					<h4><?=$TITLE?></h4>
				</div>
				<div class="card_box">
<!--					<div class="img_wrap">
						<img src="/images/<?=$CODE?>/volvo_card.png" alt="">
					</div>-->
					<h6></h6>
					<p>사용한 쿠폰</p>
				</div>
				<div class="cont">
					<ul>
						<li class="ti">사용 지점 :</li>
						<li id="cp_dealer" class="txt">볼보 강남 대치 서비스 센터</li>
					</ul>
					<ul>
						<li class="ti">사용 날짜 :</li>
						<li id="cp_date" class="txt">2019.06.13</li>
					</ul>
					<ul>
						<li class="ti">주행 거리 :</li>
						<li id="cp_mileage" class="txt">15,479 km</li>
					</ul>
					<strong>문의</strong>
					<p>자세한 사항은 고객센터(1588-1777) 또는 가까운 서비스센터로 연락하시기 바랍니다.
					</p>
				</div>
			</div>

			<!--<div class="btn_wrap">
				<div class="btn_group">
					<a href="#" class="btn" id="close">닫기</a>
				</div>
			</div>-->
		</div>
	</div>
</div>

<script>

var vin = $("#select_vehicle").val();
$("#select_vehicle").on("change", function() {
    vin = $(this).val();
    getVehicleCoupon(vin);
});

function getVehicleCoupon(_vin) {
    var res;
    app.showOverlayProgress();
    $.ajax({
        url:'/ajax/ajax.getVehicleCoupon.php',
        type:'post',
        data: {vin: _vin},
        dataType: 'json',
        success: function(_res){
            res = _res;
        }, 
        complete: function() {
            var result = res.result;
            var resultData = res.resultData;
            console.log(res)
            console.log(resultData)
            resetVehicleCoupon();
            if (result == 'success') {
                setVehicleCoupon(resultData)
            } else {
                if (res.errorcode = "DontSearchCoupon") {
                    alert("2016년식 이후 차량만 \n확인 가능합니다.");
                }
                app.hideOverlayProgress();
            }
        }, error: function(e) {
            console.log(e)
            app.hideOverlayProgress();
        }
    });
}

function resetVehicleCoupon() {
    $("#coupon_list").empty();
    $("#coupon_tot").text(0);
    $("#limitMileage").text("주행거리: ");
    $("#limitDate").text("사용 기한: - ~ -");
}

function setVehicleCoupon(_coupon) {
    var limit_mileage = _coupon[1]['limit_mileage'];
    var coupon_km = _coupon[2]['km'].split(",");
    var coupon_nm = _coupon[2]['coupon_nm'].replace("1,000 Km", "1.000 Km").split(",");
    var coupon_row = _coupon[3];
    var coupon_sdate = _coupon[0]['use_first_dt'].replace("-", ".");
    var coupon_edate = _coupon[0]['use_end_dt'].replace("-", ".");
    var coupon_tot = 0;

    if (coupon_km.length) {
        offClick();
    }

    $.each(coupon_km, function(index, row) {
        temp = '<li class="item">' +
                    '<span>' + row + ' Km</span>';
        temp += '<ul>';
        $.each(coupon_row, function(index2, row2) {
            
            // if (coupon_nm[index2] == "1.000 Km") { coupon_nm[index2] = "1,000 Km"; }
            if (row2[index]['use_yn'] == 'Y') {
                temp += '<li class="enable" data-date="' + row2[index]['use_dt'] + '" data-dealer="' + row2[index]['dealer_nm'] + '" data-mileage="' + row2[index]['mileage'] + '"><a href="#" class="used"><i class="v"></i> ' + coupon_nm[index2] + '</a></li>';
            } else if (row2[index]['use_yn'] == 'N') {
                coupon_tot ++;
                temp += '<li class="disable"><span><i class="o"></i> ' + coupon_nm[index2] + '</span></li>';
            }
        });
        temp += '</ul>';
        temp += '</li>';

        $("#coupon_list").append(temp);
        $('#coupon_tot').text(coupon_tot);

    });

    $("#limitMileage").text("주행거리: " + limit_mileage);
    $("#limitDate").text("사용 기한: " + coupon_sdate + " ~ " + coupon_edate);

    if (coupon_km.length) {
        onClick();
    }

    app.hideOverlayProgress();
}

function offClick() {
    $('.list .item > ul li.enable a').off('click');
}

function onClick() {
    // 팝업 열기
    $('.list .item > ul li.enable a').click(function(e){
        e.preventDefault();
        var used_dt = $(this).parent().attr('data-date');
        var mileage = $(this).parent().attr('data-mileage');
        var dealer_nm = $(this).parent().attr('data-dealer');
        var coupon_ti = $(this).text();
        $('.member_coupon_pop h6').html(coupon_ti);
        $('#cp_dealer').text(dealer_nm);
        $('#cp_mileage').text(mileage + " Km");
        $('#cp_date').text(used_dt);
        $('.member_coupon_pop').addClass('on');
    });
}



// 팝업 닫기
$('#close').click(function(e){
    $('.member_coupon_pop').removeClass('on');
})

onClick();

</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');

    if ($coupons['errorcode'] == "DontSearchCoupon") {
        echo "<script>setTimeout(function(){alert('2016년식 이후 차량만 \\n확인 가능합니다.');}, 500)</script>";
    }
?>