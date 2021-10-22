<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "footerMenu";
    $FOOTER_CODE = "benefit";
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="fm-benefit" class="fm_wrap">
        <div class="visual">
            <!-- <img src="/images/footermenu/benefit.jpg" alt=""> -->
            <div class="title">
                <strong>Program</strong>
            </div>
        </div>
        
        <div class="list">
            <ul>
                <li>
                    <a href="/html/promotion/promotion1.php">
                        <strong>Hej, Familj</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/promotion/hejKlass_list.php" data-type="owner">
                        <strong>Hej, Klass</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/event/">
                        <strong>Event</strong>
                    </a>
                </li>
                <li>
                    <a href="/html/promotion/gift.php">
                        <strong>계약 고객 프로그램</strong>
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

