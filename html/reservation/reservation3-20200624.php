<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

$CODE = "reservation";
$FOOTER_CODE = "service";
$TITLE = "서비스 센터 예약";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/<?=$CODE?>/reservation2.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
            <div class="page">
                <p><strong>03</strong><span>03</span></p>
            </div>
        </div>

        <div id="visual">
            <img src="/images/<?=$CODE?>/img_visual-1.jpg" alt="">
        </div>

        <div class="container">

            <div class="reservation_choice">

                <h6>서비스 항목 선택</h6>

                <form action="#">
                    <div class="choise_group">
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>일반 점검</span>
                        </label>
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>엔진오일</span>
                        </label>
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>브레이크 오일</span>
                        </label>
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>와이퍼 블레이드</span>
                        </label>
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>에어필터 / 마이크로 필터</span>
                        </label>
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>브레이크 디스크 / 브레이크 패드</span>
                        </label>
                        <label class="choise_btn">
                            <input type="radio" name="item">
                            <span>스파크 플러그 / 연료 필터</span>
                        </label>
                    </div>

                    <div class="btn_group mt20">
                        <a class="btn" href="/html/<?=$CODE?>/reservation2.php">이전</a>
                        <button type="submit" class="btn bg_color1">예약완료</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>