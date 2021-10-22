<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    
  
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (!isLogined()) {
        MgMoveURL('/html/member/login.php?returnLoginURL=/html/member/member_menu.php');
    }
	
	$coupon_tot = 0;

    // if (isset($_COOKIE['owner_flag'])) {
    //     if ($_COOKIE['owner_flag'] == 'Y') {
    //         $vehicles = getVehicleInfoToArray()['resultData'];
    //         $vehicle_no = $vehicles[0]['vehicl_no'];
        
    //         $coupons = getVehicleCouponToArray($vehicle_no);
    //         $coupons_result = $coupons['result'];
        
    //         if ($coupons_result == 'success') {
    //             $coupons = $coupons['resultData'];
    //             $coupon_row = $coupons[3];
        
    //             foreach($coupon_row as $row) {
    //                 foreach($row as $col) {
    //                     if ($col['use_yn'] == 'N') {
    //                         $coupon_tot ++;
    //                     }
    //                 }
    //             }
    //         }   
    //     }
    // }
	

    

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
					<a href="javascript: alert('등록된 차량정보가 없습니다.')">
						<div>
							<strong>차량정보</strong>
							<em></em>
							<span>(등록된 차량정보가 없습니다.)</span>
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
    app.showOverlayProgress();
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
	
    getVehicle();
    
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
            var totCnt = 0;
			$.each(resultData, function(index, item){
                totCnt += Number(item.coupon_cnt);
            });
			if (result == 'success') {
				if (resultData.length > 0) {
					$('#vehicle_info em').text(resultData[0].model);
					$('#vehicle_info span').text("(" + resultData[0].vehicl_no + ")");
                    $('#vehicle_info a').attr("href", "/html/member/member_car.php");
                    $("#couponCount").text("총 " + totCnt + "개");
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