<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
  
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php?returnLoginURL=/html/member/member_menu.php');
    }

    $owner_flag = getOwnerFlag();

    $vehicles = [];
    $coupon_tot = 0;

    $today = date("Y-m-d");
    $oneYear = [];
    $oneYearCheck = 0;
    $canUseOneYearCoupon = 0;

    //flo 쿠폰 변수
    $is_floCoupon = false;
    $floCoupon = [];

    if ($owner_flag) {
        if ($owner_flag == 'Y') {
            $vehicles = getVehicleInfoToArray()['resultData'];

            $i = 0;
            foreach($vehicles as $vehicle) {
                $coupon_tot += $vehicle['coupon_cnt'];


                // 1주년 쿠폰
                // 출고일
				$delivery_dt = $vehicle['delivery_dt'];
				
				// woodylee52@hotmail.com 계정일 때 가짜 데이터 삽입
				if ($_COOKIE["member_id"] == "ey3086@hanmail.net") {
					$delivery_dt = "2020-06-01";
                }
                
                // 쿠폰 시작일
                $startOneYearDate = date("Y-m", strtotime("+1 year", strtotime($delivery_dt)));
                $startOneYearDate = date("Y-m", strtotime("+1 month", strtotime($startOneYearDate)));
                $startOneYearDate = date("Y-m-d", strtotime($startOneYearDate . "-01"));
                
                // 쿠폰 종료일
                $endOneYearDate = date("Y-m", strtotime("+6 months", strtotime($startOneYearDate)));
                $endOneYearDate = date("Y-m-d", strtotime($endOneYearDate . "-01"));

                // 쿠폰 만료노출일
                $limitOneYearDate = date("Y-m-d", strtotime("+2 months", strtotime($endOneYearDate)));

                // 쿠폰 디스플레이 날짜
                $displayOneYearDate = "";

                // 쿠폰 사용일 기준 한달
                $useOneYearDate = "";
                
                if ($today >= $startOneYearDate && $today <= $limitOneYearDate) { 
                    $isUse = 0;
                    $isOver = 0;

                    if ($today > $endOneYearDate) {
                        $isOver = 1;
                    }

                    // 쿠폰 사용일 기준 한달
                    $useOneYearDate = checkOneYearCoupon($vehicle["vehicl_no"]);
                    
                    if ($useOneYearDate) {
                        $useOneYearDate = date("Y-m-d", strtotime("+2 months", strtotime($useOneYearDate)));
                        $displayOneYearDate = $useOneYearDate;
                        $isUse = 1;
                        // echo "사용함 ";
                    } else {
                        $displayOneYearDate = $limitOneYearDate;
                    }
                    
                    array_push($oneYear, array("vin" => $vehicle["vehicl_no"], "dt" => $delivery_dt, "start_dt" => $startOneYearDate, "display_dt" => $displayOneYearDate, "isUse" => $isUse, "isOver" => $isOver));
                }
                
                $i ++;
            }

            
            foreach($oneYear as $item) {
                if ($today >= $item["start_dt"] && $today <= $item["display_dt"]) {
                    $oneYearCheck += 1;
                    if (!$item["isUse"] && !$item["isOver"]) {
                        $canUseOneYearCoupon += 1;
                    }
                }
            }
        }
	}
	
    $oneYear = arr_sort($oneYear, 'dt');
    $oneYear = arr_sort($oneYear, 'isOver');
    $oneYear = arr_sort($oneYear, 'isUse');


    // $car_msg = "";

    // if (!$vehicles[0]["vehicl_no"]) {
    //     $car_msg = "등록된 차량정보가 없습니다.";
    // } else if ($vehicles[0]["vehicl_no"] && $vehicles[0]["car_no"]) {
    //     $car_msg = "차량 번호 표시는 판매 업무 처리에 따라 반영이 다소 늦을 수 있습니다. \\n고객님의 양해를 부탁 드립니다.";
    // }

    // flo 쿠폰 체크
    $floCoupon = getFloCouponArray();
    if ($floCoupon['result'] == 'success') {
        $floCoupon = $floCoupon['resultData'];
        foreach($floCoupon as $coupon) {
            $is_floCoupon = true;
        }
    }

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/index.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="member_menu">
			<h4>회원정보</h4>
            <form name="loginForm">
                <input type="hidden" name="tokken" value="">
                <input type="hidden" name="id" value="<?=$_COOKIE['member_id']?>">
            </form>
			<ul>
				<li id="vehicle_info">
                    <a href="<?if ($vehicles[0]["vehicl_no"]) { echo "/html/member/member_car.php"; } else { echo "javascript: alert('등록된 차량정보가 없습니다.')";}?>">
						<div>
							<strong>차량정보</strong>
							<em><?=$vehicles[0]["model"]?></em>
							<span>(<?if ($vehicles[0]["vehicl_no"]) { echo $vehicles[0]["vehicl_no"]; } else { echo "등록된 차량정보가 없습니다.";}?>)</span>
						</div>
					</a>
				</li>
				<li>
					<a href="/html/member/modify.php">
						<div>
							<strong>회원 개인정보</strong>
						</div>
					</a>
				</li>
				<li>
					<a href="/html/member/member_coupon.php" data-type="owner">
						<div>
							<strong>서비스 쿠폰</strong>
							<span id="couponCount">총 <?=$coupon_tot?>개</span>
						</div>
					</a>
				</li>
                <?if ($oneYearCheck > 0) {?>
                <li>
					<a href="/html/member/member_oneyear.php?vin=<?=$oneYear[0]["vin"]?>&isOver=<?=$oneYear[0]["isOver"]?>&isUse=<?=$oneYear[0]["isUse"]?>">
						<div>
                            <strong>1주년 쿠폰</strong>
                            <?if ($canUseOneYearCoupon > 1) {?>
                            <span id="couponCount">총 <?=$canUseOneYearCoupon?>개</span>
                            <?}?>
						</div>
					</a>
				</li>
                <?}?>
				<li>
					<a class="btn_link_facenter" href="/html/member/member_center.php">
						<div>
							<strong>선호 서비스 센터</strong>
							<span id="favo"></span>
						</div>
					</a>	
				</li>
                
                <?
                // 대기고객 체크
                // if ($_COOKIE["member_id"] == "apptest@volvocars.com") {
				// 	$_COOKIE['master_cust_cd'] = '2430993';
                // }
                $sql = " select a.master_cust_cd, b.sid from volvo_wating_cust_list6 a left join volvo_wating_cust b on a.master_cust_cd = b.master_cust_cd where a.master_cust_cd = '" . $_COOKIE['master_cust_cd'] . "' ";
                $checkResult = $db->fetch_array($sql)[0];
                
                if (!$checkResult['master_cust_cd']) { ?>
                <li>
					<a href="javascript: void(0)" onclick="alert('고객님은 신청 대상자가 아닙니다.')">
						<div>
                            <strong>대기 고객 기프트 신청</strong>
						</div>
					</a>
				</li>
                <? } else if ($checkResult['master_cust_cd'] && $checkResult['sid']) { ?>
                <li>
					<a href="/html/lockin/appl.php">
						<div>
                            <strong>대기 고객 기프트 신청내역</strong>
						</div>
					</a>
				</li>
                <? } else if ($checkResult['master_cust_cd'] && !$checkResult['sid']) { ?>
                <li>
					<a href="/html/lockin/index.php">
						<div>
                            <strong>대기 고객 기프트 신청</strong>
						</div>
					</a>
				</li>
                <?}?>
                <? if ($is_floCoupon) { ?>
                <li>
					<a href="/html/flo/">
						<div>
                            <strong>FLO 쿠폰등록</strong>
						</div>
					</a>
				</li>
                <li>
					<a href="https://docs.google.com/viewer?url=http://vckiframe.com/uploads/service_guide.pdf" target="_blank">
						<div>
							<strong>볼보자동차 서비스 이용 가이드</strong>
						</div>
					</a>
				</li>
                <? } ?>
				<li class="logout">
					<a href="javascript: void(0)" onclick="javascript: logout()">
						<div>
							<strong>로그아웃</strong>
						</div>
					</a>
				</li>
			</ul>
		</div>
    </div>
</div>

<script>

var intvId = null;

$(window).on('load', function() {
    // app.showOverlayProgress();
    var json_url = "./../../json/service.json";
    var favorite = app.storage.getItem('fcenter');
    
    $.getJSON(json_url, function(data) {
        var result = "";
		
		if (favorite) {
			var firstFavo = favorite.split('|')[0];
		
			for(var i = 0; i < data.length; i ++) {
				var item = data[i];
				
				if (firstFavo == item.code) {
					result = item.name + '<br>' + item.addr;
				}
			}
		} else {
			result = '등록 된 서비스 센터가 없습니다.';
			$('.btn_link_facenter').attr('href','javascript:favCenterConfirm();');
		}
		
		$('#favo').html(result)

        
	});
	
    // getVehicle();
    var osInfo = getOS();
            
    if (osInfo == "Android") {
        android.getTokken();
    } else if (osInfo == "iOS") {
        try {
            window.webkit.messageHandlers.loginHandler.postMessage("tokken");
        } catch(err) {
            console.log('The native context does not exist yet');
            app.hideOverlayProgress()
        }
    }

    intvId = setInterval(updateTokken, 1000)
    setTimeout(function() {
        
        
    }, 1000)
});

function updateTokken() {
    var _form = document.loginForm
    if (_form.tokken.value) {
        $.ajax({
            url:'/ajax/ajax.updateTokken.php',
            type:'post',
            data: {tokken: _form.tokken.value, id: _form.id.value},
            dataType: 'text',
            success: function(_res){}, 
            complete: function() {
                clearInterval(intvId);
            }, 
            error: function(e) {
                console.log(e)
            }
        });
    }
}

function getVehicle() {
	var master_cust_cd = "<?=$_COOKIE['master_cust_cd']?>";
	var id = "<?=$_COOKIE['member_id']?>";

	$.ajax({
		url:'/ajax/ajax.getVehicle.php',
		type:'post',
		data: {master_cust_cd: master_cust_cd, id: id},
		dataType: 'json',
		success: function(_res){
			// console.log(_res);
			res = _res;
		}, complete: function() {
			var result = res.result;
			var resultData = res.resultData;
			
			if (result == 'success') {
				if (resultData.length > 0) {
                    var couponCtn = 0;
                    $.each(resultData, function(index, item) {
                        console.log(item)
                        couponCtn += Number(item.coupon_cnt);
                    });
					$('#vehicle_info em').text(resultData[0].model);
					$('#vehicle_info span').text("(" + resultData[0].vehicl_no + ")");
                    $('#vehicle_info a').attr("href", "/html/member/member_car.php");
                    $("#couponCount").text("총 " + couponCtn + "개");
                    app.hideOverlayProgress();
                    // getCouponCount(resultData[0].vehicl_no);
				} else {
					$('#vehicle_info em').text("");
					$('#vehicle_info span').text("(등록된 차량정보가 없습니다.)");
                    app.hideOverlayProgress();
				}
			} else {
				// alert(result);
                app.hideOverlayProgress();
			}
		}, error: function(e) {
			console.log(e)
            app.hideOverlayProgress();
		}
	});
}

function getCouponCount(_vin) {
    var totCount = 0;
    $.ajax({
		url:'/ajax/ajax.getVehicleCoupon.php',
        type:'get',
        data: {vin: _vin},
		dataType: 'json',
		success: function(_res){
			// console.log(_res);
			res = _res;
		}, complete: function() {
			var result = res.result;
            var resultData = res.resultData;
            
            if (result == 'success') {
                $.each(resultData[3], function(index, row) {
                    $.each(row, function(index2, item) {
                        // console.log(item)
                        if (item['use_yn'] == 'N') {
                            totCount ++;
                        }
                    })
                })
                $("#couponCount").text("총 " + totCount + "개");
            }
            app.hideOverlayProgress();
		}, error: function(e) {
			console.log(e)
            app.hideOverlayProgress();
		}
	});
}

function logout() {
    var res;
    $.ajax({
		url:'/ajax/ajax.logout.php',
        type:'get',
		dataType: 'text',
		success: function(_res){
			// console.log(_res);
			res = _res;
		}, complete: function() {
			if (res) {
                window.localStorage.setItem('member_sid', '');
                window.localStorage.setItem('member_id', '');
                window.localStorage.setItem('member_name', '');
                window.localStorage.setItem('master_cust_cd', '');
                window.localStorage.setItem('member_hp', '');
                window.localStorage.setItem('owner_flag', '');
                window.localStorage.setItem('location', '');

                // app.deleteAllCookies();

                alert("로그아웃 되었습니다.");
                location.href = "/index.php";
            }
		}, error: function(e) {
			console.log(e)
		}
	});
}


function favCenterConfirm() {
    customConfirm.show(
        "[서비스 센터 안내]에서 해당 센터의 별표를 클릭하시면 선호 서비스 센터 등록이 가능합니다.", 
        "등록하러 가기", 
        "닫기", 
        function() {
            window.location.href = "/html/center/index.php?mode=list"
        }, 
        null
    );
}
</script>
<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>