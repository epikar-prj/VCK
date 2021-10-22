<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "footerMenu";
    $FOOTER_CODE = "cscenter";
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="fm-custom" class="fm_wrap">
        <div class="visual">
            <!-- <img src="/images/footermenu/own.jpg" alt=""> -->
            <div class="title">
                <strong>Notice</strong>
            </div>
        </div>
        
        <div class="list">
            <ul>
                <li>
                    <a href="/html/news/list.php">
                        <strong>News</strong>
                    </a>
                </li>
                <!-- <li>
                    <a href="/html/faq/index.php">
                        <strong>FAQ</strong>
                    </a>
                </li> -->
                <li>
                    <a href="/html/inquiry/index.php" data-type="member">
                        <strong>1:1 문의</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/terms/index.php">
                        <strong>이용약관</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/policy/index.php">
                        <strong>개인정보처리방침</strong>
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

