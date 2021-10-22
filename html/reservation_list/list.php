<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

if (!isOwnered()) {
	echo "<script>alert('볼보 오너만 가능한 서비스 입니다.');history.back();</script>";
}

$CODE = "reservation_list";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약 관리";

$resvt_year = date("Y");

$vehicles = getVehicleInfoToArray()['resultData'];
$reservation_list = getVehicleRepairResvtListToArray($resvt_year)['resultData'];
$rt_reservation_list = getRealtimeVehicleRepairResvtListToArray($resvt_year)['resultData'];
// var_dump($rt_reservation_list);

$centerJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/json/service.json');
$centerArr = json_decode($centerJson, true);

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/service.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <div class="container">
			<ul class="select">
				<li class="date">
					<select id="resvt_year" name="resvt_year">
						<option value="2021">2021년</option>
						<option value="2020">2020년</option>
						<option value="2019">2019년</option>
						<option value="2018">2018년</option>
					</select>
				</li>
				<li class="model">
					<select id="vin" name="vin">
						<option value="">전체</option>
						<? foreach($vehicles as $vehicle) { ?>
						<option value="<?=$vehicle['vehicl_no']?>"><?=$vehicle['car_no']?></option>
						<? } ?>
					</select>				
				</li>
			</ul>
			<ul id="reservation_list" class="list">
                <? 
                $index1 = 0;
                foreach($rt_reservation_list as $item) { 
					$classState = "";
					if ($item['resvt_status'] == '예약완료') {
						$classState = 'class="complete"';
						
					} else if ($item['resvt_status'] == '취소') { 
						$classState = 'class="cancel"';
						
                    }
                    
                    $center = [];
                    foreach($centerArr as $row) {
                        if ($row['code'] == $item['dlr_cd']) {
                            $center = $row;
                        }
                    }

                    $resvt_date = date("Y.m.d", strtotime($item['bk_reg_dt']));
                    $resvt_time = date("H:i", strtotime($item['bk_reg_dt_st']));
					$resvt_date_id = str_replace(".", "", $resvt_date);
					$resvt_time_id = str_replace(":", "", $resvt_time);
				?>
				<li <?=$classState?> id="<?=$resvt_date_id?>.<?=$resvt_time_id?>" data-seq="<?=$index?>"  style="opacity: 0;">
                    <a href="/html/reservation_list/view.php?cd=<?=$index1?>&ro_no=<?=$item['ro_no']?>&vin=<?=$item['vin']?>">
						<div class="list_ti_wrap">
							<div class="list_ti"><?=$center['name']?></div>
							<div class="list_tel"><?=$center['phone']?></div>
							<div class="list_date"><?=$resvt_date?><span class="time"><?=$resvt_time?></span></div>
							<div class="list_time"></div>
						</div>
						<div class="list_proc_wrap">
							<div class="list_proc"><?=$item['resvt_status']?></div>
						</div>
					</a>
				</li>
                <? 
                $index1 ++;
                } ?>

                <? 
                $index2 = 0;
                foreach($reservation_list as $item) { 
					$classState = "";
					$stateFunction = "void(0)";
					$state = "예약대기";
					if ($item['resvt_state'] == 'AC') {
						$classState = 'class="complete"';
						$state = "예약완료";
					} else if ($item['resvt_state'] == 'CNL') { 
						$classState = 'class="cancel"';
						$state = "취소";
					} else {
						$stateFunction = "cancel_reservation('" . $item['resvt_seq'] . "')";
					}

					$resvt_dat = str_replace("-", ".", $item['resvt_day']);
					$resvt_id = str_replace("-", "", $item['resvt_day']);
				?>
				<li <?=$classState?> id="<?=$resvt_id?>" data-seq="<?=$item['resvt_seq']?>" style="opacity: 0;">
					<!-- <a href="javascript:<?=$stateFunction?>"> -->
                    <a href="/html/reservation_list/view2.php?cd=<?=$index2?>&resvt_seq=<?=$item['resvt_seq']?>&vin=<?=$vehicles[0]['vehicl_no']?>">
						<div class="list_ti_wrap">
							<div class="list_ti"><?=$item['dealer_nm']?></div>
                            <div class="list_tel"><?=add_hyphen($item['tel'])?></div>
                            <?if (!$item['resvt_confirm_date']) {?>
							<div class="list_date"><span>예약 일자</span> <?=$resvt_dat?></div>
                            <?} else {?>
                            <div class="list_date"><span>예약 확정 일자</span> <?=date("Y.m.d H:i", strtotime($item['resvt_confirm_date']))?></div>
                            <?}?>
						</div>
						<div class="list_proc_wrap">
							<div class="list_proc"><?=$state?></div>
						</div>
					</a>
				</li>
                <? 
                    $index2 ++;
                } 
				if (($index1 + $index2) < 1) { ?>
				<li class="empty">등록된 서비스 센터 예약이 없습니다.</li>
				<? } ?>

			</ul>
        </div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>
	<script>

		var vin = "";
		var resvt_year = new Date().getFullYear();
        var centers;
		
		$("#vin").on('change', function() {
            $("#reservation_list").empty();
			// getVehicleRepairResvtList($(this).val(), vin);
			getRTVehicleRepairResvtList(resvt_year, $(this).val());
		})

		$("#resvt_year").on('change', function() {
            $("#reservation_list").empty();
			resvt_year = $(this).val();
			// getVehicleRepairResvtList($(this).val(), vin);
			getRTVehicleRepairResvtList($(this).val(), vin);
		})

		function getVehicleRepairResvtList(_resvt_year, _vin) {
			var res;

			$.ajax({
                url:'/ajax/ajax.getVehicleRepairResvtList.php',
                type:'post',
                data: {resvt_year: _resvt_year, vin: _vin},
                dataType: 'json',
                success: function(_res){
					res = _res;
				}, 
                complete: function() {
                    var result = res.result;
                    var resultData = res.resultData;
					setResvtList(resultData);
                }, error: function(e) {
                    console.log(e)
                    app.hideOverlayProgress();
                }
            });
		}

        function getRTVehicleRepairResvtList(_resvt_year, _vin) {
            app.showOverlayProgress();
			var res;
			$.ajax({
                url:'/ajax/ajax.getRTVehicleRepairResvtList.php',
                type:'post',
                data: {resvt_year: _resvt_year, vin: _vin},
                dataType: 'json',
                success: function(_res){
					res = _res;
				}, 
                complete: function() {
                    var result = res.result;
                    var resultData = res.resultData;
					setRTResvtList(resultData);
                    getVehicleRepairResvtList(_resvt_year, _vin);
                }, error: function(e) {
                    console.log(e)
                    app.hideOverlayProgress();
                }
            });
		}
		

		function setResvtList(rows) {
			// $("#reservation_list").empty();
			
			$.each(rows, function(index, item) {
				var classState = "";
				var stateFunction = "void(0)";
				var state = "예약대기";
				if (item['resvt_state'] == 'AC') {
					classState = 'class="complete"';
					state = "예약완료";
				} else if (item['resvt_state'] == 'CNL') { 
					classState = 'class="cancel"';
					state = "취소";
				} else {
					stateFunction = "cancel_reservation('" + item['resvt_seq'] + "')";
				}
                
                var tel = item.tel.replace(/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/,"$1-$2-$3");
				var resvt_item = item['resvt_day'];
				var resvt_day_id = resvt_item.replace(/\-/g,'');

				temp = '<li ' + classState + ' id="'+resvt_day_id+'" data-seq="' + item['resvt_seq'] + '" style="opacity: 0;">' +
					'<a href="/html/reservation_list/view2.php?cd=' + index + '&resvt_seq=' + item['resvt_seq'] + '&vin=' + vin + '&resvt_year=' + resvt_year + '">' +
						'<div class="list_ti_wrap">' +
						'<div class="list_ti">' + item['dealer_nm'] + '</div>' +
                        '<div class="list_tel">' + tel + '</div>'+
						'<div class="list_date"><span>예약 일자</span> ' + item['resvt_day'] + '</div>' +
						'</div>' +
						'<div class="list_proc_wrap">' +
						'<div class="list_proc">' + state + '</div>' +
						'</div>' +
						'</a>' +
						'</li>';

				$("#reservation_list").append(temp);
			});

            sort_list();
			// if (rows.length < 1) {
			// 	$("#reservation_list").append('<li class="empty">등록된 서비스 센터 예약이 없습니다.</li>');
			// }
		}

        function setRTResvtList(rows) {
			
			$.each(rows, function(index, item) {
				var classState = "";
				var stateFunction = "void(0)";
				var state = "예약대기";
				if (item['resvt_status'] == '예약완료') {
					classState = 'class="complete"';
					state = "예약완료";
				} else if (item['resvt_status'] == '취소') { 
					classState = 'class="cancel"';
					state = "취소";
				} else {
					stateFunction = "void(0)";
				}
                var center;
                $.each(centers, function(index, _center) {
                    if (_center.code == item.dlr_cd) {
                        center = _center
                    }
                })

                var resvt_date = item.bk_reg_dt.substring(0,4) + "." + item.bk_reg_dt.substring(4,6) + "." + item.bk_reg_dt.substring(6,8);
                var resvt_time = item.bk_reg_dt_st.substring(0, 2) + ":" + item.bk_reg_dt_st.substring(2, 4)

				temp = '<li ' + classState + ' id="'+ item.bk_reg_dt.substring(0, 8) + '.' + item.bk_reg_dt_st.substring(0, 4) +'" data-seq="' + index + '" style="opacity: 0;">' +
					'<a href="/html/reservation_list/view.php?cd=' + index + '&ro_no=' + item.ro_no + '&vin=' + vin + '&resvt_year=' + resvt_year + '">' +
						'<div class="list_ti_wrap">' +
						'<div class="list_ti">' + center.name + '</div>' +
                        '<div class="list_tel">' + center.phone + '</div>'+
						'<div class="list_date">' + resvt_date + '<span class="time">' + resvt_time + '</span></div>' +
						'</div>' +
						'<div class="list_proc_wrap">' +
						'<div class="list_proc">' + state + '</div>' +
						'</div>' +
						'</a>' +
						'</li>';

				$("#reservation_list").append(temp);
			});

            
			// if (rows.length < 1) {
			// 	$("#reservation_list").append('<li class="empty">등록된 서비스 센터 예약이 없습니다.</li>');
			// }
		}


		function cancel_reservation(_resvt_seq){
			var result = confirm('서비스 센터 예약을 취소 하시겠습니까?');

			if(result){
				updateVehicleRepairResvtCancel(_resvt_seq);
			} else {
			
			}
		}

		function updateVehicleRepairResvtCancel(_resvt_seq) {
			var res;

			$.ajax({
                url:'/ajax/ajax.updateVehicleRepairResvtCancel.php',
                type:'post',
                data: {resvt_seq: _resvt_seq},
                dataType: 'json',
                success: function(_res){
					res = _res;
				}, 
                complete: function() {
                    var result = res.result;
                    if (result == 'success') {
						alert('서비스 센터 예약이 취소 되었습니다.');
						changeState(_resvt_seq);
					} else {
						alert(result);
					}
                }, error: function(e) {
                    console.log(e);
                }
            });
		}

		function changeState(_seq) {
			$('li[data-seq="' + _seq + '"]').removeClass();
			$('li[data-seq="' + _seq + '"]').addClass('cancel');
			$('li[data-seq="' + _seq + '"]').find('.list_proc').text('취소');
			$('li[data-seq="' + _seq + '"]').find('a').attr("href", "javascript: void(0)");
		}

        $(window).on("load", function() {
            $.ajax({
                url:'/json/service.json',
                dataType: 'json',
                success: function(_res){
					centers = _res;
					sort_list();
				}
            });
        });

		function sort_list(){
            $("#reservation_list li").sort(sort_li).appendTo('#reservation_list').css("opacity", 1);
            app.hideOverlayProgress();
		}

		  function sort_li(a, b) {
			return (Number($(b).attr('id'))) > (Number($(a).attr('id'))) ? 1 : -1;
		  }		
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>