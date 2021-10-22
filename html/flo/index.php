<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

    $CODE = "flo";

    if (!isLogined()) {
        MgMoveURL('/html/member/main.php');
    }

    $owner_flag = getOwnerFlag();
    $vehicles = [];

    $is_floCoupon = false;
    $floCoupon = [];

    if ($owner_flag) {
        $floCoupon = getFloCouponArray();
        if ($floCoupon['result'] == 'success') {
            $floCoupon = $floCoupon['resultData'];
            foreach($floCoupon as $coupon) {
                $is_floCoupon = true;
            }
        }
	} else {
        MgMoveURL('/html/member/member_menu.php', '볼보 고객만 가능한 서비스 입니다.');
    }

    if (!$is_floCoupon) {
        MgMoveURL('/html/member/member_menu.php', '발급된 쿠폰이 없습니다.');
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
            <h4>FLO 쿠폰 등록</h4>
        </div>
        
        <div class="container">
            <div class="coupon_info sec">
                <div class="title">
                    <strong>FLO 쿠폰 정보</strong>
                </div>

                <div class="coupon_list">
                    <ul>
                        <? foreach ($floCoupon as $coupon) {
                            $coupon_date = str_replace("-", ".", $coupon['coupon_expire_date']);
                        ?>
                        <li>
                            <div class="box">
                                <strong>쿠폰번호</strong>
                                <span class="coupon_number"><?=$coupon['coupon_no']?></span>
                            </div>
                            <div class="box">
                                <strong>쿠폰 유효기간</strong>
                                <span class="coupon_date"><?=$coupon_date?>까지</span>
                            </div>
                            <div class="box-btn">
                                <a href="javascript: void(0)" onclick="jsCopyLink('<?=$coupon['coupon_no']?>')">쿠폰 번호 복사하기</a>
                            </div>
                        </li>
                        <? } ?>
                    </ul>
                </div>
                <p class="caption">본 쿠폰은 해당 기간 안에 FLO 앱에서 등록 시 사용이 가능합니다</p>
            </div>

            <div class="coupon_use sec">
                <div class="title">
                    <strong>FLO 쿠폰 사용법</strong>
                </div>

                <div class="coupon_reg coupon_wrap">
                    <strong>등록 방법</strong>
                    <p>1) FLO 앱을 열고 T아이디로 로그인을 합니다. (T아이디 없을 경우 생성 필요)</p>
                    <p>2) FLO 앱 우측 상단의 ‘이용권’ 아이콘 클릭 후 이용권 구매 페이지 우측 상단의 ‘쿠폰 등록’에서 쿠폰 번호를 입력합니다.</p>
                    <p>3) 쿠폰번호는 16자리 숫자로 위의 쿠폰 번호 복사하기를 통해 쉽게 입력이 가능합니다.</p>
                </div>

                <div class="coupon_reg coupon_wrap">
                    <strong>쿠폰 등록 유의 사항</strong>
                    <p>- 본 쿠폰은 모바일 무제한 듣기 이용권으로  FLO APP을 지원하는 볼보차량, 스마트폰, 태블릿에서 사용하실 수 있습니다.</p>
                    <p>- 본 쿠폰은 FLO 계정 당 1개만 등록이 가능하며, 동일한 쿠폰 번호로 중복 등록 불가합니다.</p>
                </div>

                <div class="box-btn">
                    <a href="https://m.music-flo.com/coupon" target="_blank">FLO 에서 쿠폰 등록하기</a>
                </div>
            </div>
        </div>
        
    </div>

    <script>
        function jsCopyLink(copyText) {
            
            var tmpTextarea = document.createElement('textarea');
            tmpTextarea.value = copyText;
         
            document.body.appendChild(tmpTextarea);
            tmpTextarea.select();
            tmpTextarea.setSelectionRange(0, 9999);  // 셀렉트 범위 설정
         
            document.execCommand('copy');
            document.body.removeChild(tmpTextarea);
            alert("쿠폰 번호가 복사되었습니다."); 
        }
    </script>
<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>