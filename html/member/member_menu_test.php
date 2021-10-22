<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php?returnLoginURL=/html/member/member_menu.php');
    }
    
    $owner_flag = getOwnerFlag();

    echo "owner_flag : " . $owner_flag;

    $vehicles = [];
    $coupon_tot = 0;

    $today = date("Y-m-d");
    $oneYear = [];
    $oneYearCheck = 0;
    $canUseOneYearCoupon = 0;
	
	// 가짜 데이터
	$fakeDate = array("2019-01-01", "2018-04-01", "2019-03-01", "2019-02-01", "2019-01-01");

    if ($owner_flag) {
        if ($owner_flag == 'Y') {
            $vehicles = getVehicleInfoToArray()['resultData'];
            
            $i = 0;
            foreach($vehicles as $vehicle) {
                $coupon_tot += $vehicle['coupon_cnt'];


                // 1주년 쿠폰
                // 출고일
                $delivery_dt = $vehicle['delivery_dt'];
                // echo "id : " . $_COOKIE["member_id"];
				// woodylee52@hotmail.com 계정일 때 가짜 데이터 삽입
				if ($_COOKIE["member_id"] == "kts@comnarae.co.kr") {
                    // echo 123;
					$delivery_dt = $fakeDate[$i];
                }
                
                // 쿠폰 시작일
                $startOneYearDate = date("Y-m", strtotime("+1 year", strtotime($delivery_dt)));
                $startOneYearDate = date("Y-m", strtotime("+1 month", strtotime($startOneYearDate)));
                $startOneYearDate = date("Y-m-d", strtotime($startOneYearDate . "-01"));
                
                // echo $startOneYearDate . "<br>";

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
			$('.btn_link_facenter').attr('href','javascript:alert("서비스 센터 안내에서 선호 서비스 센터를 선택해주세요");');
		}
		
		$('#favo').html(result)

        
	});
	
    // getVehicle();
    
});

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

</script>
<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>