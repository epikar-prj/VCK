<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "footerMenu";
    $FOOTER_CODE = "buy";
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="fm-buy" class="fm_wrap">
        <div class="visual">
            <!-- <img src="/images/footermenu/buy.jpg" alt=""> -->
            <div class="title">
                <strong>Buy</strong>
            </div>
        </div>
        <div class="list">
            <ul>
                <li>
                    <a href="/html/cars/index.php">
                        <strong>Cars</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/testdrive/testdrive1.php">
                        <strong>시승신청</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/showroom/index.php">
                        <strong>전시장 안내</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/selekt/index.php">
                        <strong>인증 중고차</strong>
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

