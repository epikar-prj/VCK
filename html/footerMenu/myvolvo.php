<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "footerMenu";
    $FOOTER_CODE = "myvolvo";
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="fm-myvolvo" class="fm_wrap">
        <div class="visual">
            <img src="/images/common/img_fm-myvolvo.jpg" alt="">
        </div>
        <div class="title">
            <strong>My volvo</strong>
            <p>마이볼보</p>
        </div>
        <div class="list">
            <ul>
                <li>
                    <a href="/html/member/member_car.php">
                        <strong>마이볼보</strong>
                        <span>My volvo</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="fm-back">
            <a href="/index.php" class="animsition-link">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>

