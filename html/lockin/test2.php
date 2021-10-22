<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

// if (!isLogined()) {
    // MgMoveURL('/html/member/main.php');
// }

$CODE = "lockin";
$FOOTER_CODE = "myvolvo";
$TITLE = "MY VOLVO";

// $_COOKIE['master_cust_cd'] = '2367969';

$sid = PARAM2("sid");
// $sid = '2935';
$cust_code = $_COOKIE['master_cust_cd'];
// $cust_code = '2264122';
$id = $_COOKIE['member_id'];
$nm = $_COOKIE['member_name'];


$sql = " SELECT * FROM volvo_wating_cust WHERE master_cust_cd = '{$cust_code}' ";

$row=$db->row($sql);

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
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
            <section id="step_02" class="apply_info">
                <div class="apply_info_inner">

                    <div class="event_apply">
                        <div class="event_apply_ti">대기 고객 기프트 신청내역</div>
                    </div>

                 </div>
            </section>
		</div>
        <form name="promoform" id="promoform" action="javascript: void(0)" method="post" onsubmit="return checkValidate(this);">
            <div class="container apply02">
                <div class="event_gift_sti">신청 내역 확인</div>

                <input type="hidden" name="isApp" value="true">
                
                <div class="applicant">
                    <strong class="input_tit">이름</strong>
                    <div class="input_wrap name_wrap">
                        <div class="input_box">
                            <input type="text" name="name" value="<?=$row['receive_nm']?>" maxlength="120" disabled >
                        </div>
                    </div>
                    <strong class="input_tit">연락처</strong>
                    <div class="input_wrap phone_wrap">
                        <div class="input_box">
                            <input type="text" name="addr2" value="<?=$row['receive_hp']?>"  disabled>
                        </div>
                    </div>
                    <strong class="input_tit">기프트 수령 주소</strong>
                    <div class="input_wrap address_wrap">
                        <div class="input_box">
                            <input type="text" name="addr1" value="(<?=$row['receive_zip']?>) <?=$row['receive_addr1']?>"  disabled>
                        </div>
                        <div class="input_box">
                            <input type="text" name="addr2" value="<?=$row['receive_addr2']?>"  disabled>
                        </div>
                    </div>
                    <div class="btn_group mt30">
                        <button type="submit" class="btn bg_color2" <?=$row['is_received'] == 'Y' ? "disabled" : ""?>>수령 완료</button>
                    </div>
                    <div class="box-caption mt10">
                        <strong>[기프트 발송 유의사항]</strong>
                        <ul>
                            <li>신청하신 기프트는 2주 이내에 발송 처리 될 예정이며, 택배사의 사정에 따라 배송일정은 변동될 수 있습니다.</li>
                            <li>기프트 수령을 완료하신 경우 아래의 ‘수령 완료‘ 버튼을 눌러주세요.</li>
                            <li>신청 내역 확인 페이지는 ‘수령 완료‘ 버튼을 누르지 않으시더라도 기프트 신청 1달 후에 자동으로 삭제 되며, 기프트를 수령하신 것으로 간주될 예정입니다.</li>
                            <li>신청 후 2주 이내에 기프트를 받지 못했다면 아래의 연락처로 문의 부탁드립니다.</li>
                            <li>문의 사항 : 고객지원센터 (1588-1777)</li>
                        </ul>
                    </div>
                </div>
            </div>    
		</form>
	</div>


    <script>
    function checkValidate(f) {
        app.showOverlayProgress();
        
        ajaxUpdateWatingCust()
    }
    
    function ajaxUpdateWatingCust() {
                var response;
                $.ajax({
                    url: "/ajax/ajax.updateWatingCust.php",
                    type:'post',
                    // contentType: 'application/json;',
                    data: {sid: '<?=$cust_code?>'},
                    dataType: 'json',
                    success: function(res){
                        response = res;
                        console.log(res);
                    },
                    complete: function(data) {
                        if (response.result == 'success') {
                            alert('수령완료');
                            location.reload();	
                        }else {
                            alert('오류가 발생하였습니다. \n잠시 후 다시 시도해주세요.');
                            location.reload();	
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            }
    
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>