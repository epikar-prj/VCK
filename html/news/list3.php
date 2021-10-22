<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "news";
$FOOTER_CODE = "cscenter";
$TITLE = "NEWS";

$bm_sid = "7";

$sql = " SELECT sid, title, regdate FROM volvo_bbs_{$bm_sid} WHERE chkdel <> 'Y' ORDER BY `notice` DESC, `grp` DESC, `odr` ASC, `regdate` DESC ";

$rows=$db->fetch_array($sql);

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents" class="news2">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/custom.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <div class="container">
            <div class="tabs">
                <ul>
                    <li><a href="list.php">뉴스</a></li>
                    <li><a href="list2.php">업데이트</a></li>
                    <!-- <li class="on"><a href="list3.php">고객 안내문</a></li> -->
                </ul>
            </div>
            <ul class="list2">
                <? foreach($rows as $row) { ?>
                <li class="item">
                    <a href="view3.php?sid=<?=$row['sid']?>">
                        <p><?=$row['title']?></p>
                        <span><?= str_replace("-", ".", substr($row['regdate'], 0, 10))?></strong>
                    </a>
                </li>    
                <? } ?>
                <?if (!count($rows)) {?>
                <li class="item empty">
                    <p>등록된 게시물이 없습니다.</p>
                </li>    
                <? } ?>
                
            </ul>

        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>