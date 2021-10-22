<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "news";
$FOOTER_CODE = "cscenter";
$TITLE = "NEWS";

$bm_sid = "5";

$sql = " SELECT sid, title, subtitle, publish_date, thum_file, regdate FROM volvo_bbs_{$bm_sid} WHERE chkdel <> 'Y' ORDER BY `notice` DESC, `grp` DESC, `odr` ASC, `publish_date` DESC ";

$rows=$db->fetch_array($sql);

$bbs_info['file_folder'] = $SITE_INFO['root'] . '/upload/bbs/' . $bm_sid;
$bbs_info['file_read'] = $SITE_INFO['http_host'] . '/upload/bbs/' . $bm_sid;

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
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
                    <li class="on"><a href="list.php">뉴스</a></li>
                    <li><a href="list2.php">업데이트</a></li>
                    <!-- <li><a href="list3.php">고객 안내문</a></li> -->
                </ul>
            </div>
            <ul class="list">
            <? foreach($rows as $row) { 
                if($row['thum_file']){
                    $file_info = explode("|", $row['thum_file']);
                    $filename_up = $file_info[0];
                    $filename = $file_info[1];
                
                    $image = "";
                    // echo file_exists($bbs_info['file_folder'] . "/" . $filename_up);
                    if( $filename_up && file_exists($bbs_info['file_folder'] . "/" . $filename_up) ){
                        $image = $bbs_info['file_read'] . "/" . $filename_up;
                    }
                }
            ?>
				<li class="item">
                    <a href="/html/<?=$CODE?>/view.php?sid=<?=$row['sid']?>" class="box type2" style="background-image: url(<?=$image?>)">
                        <strong><?=$row['publish_date']?></strong>
                        <? if ($row['subtitle']) { ?>
                        <h6><?=$row['subtitle']?></h6>
                        <? } ?>
                        <h6><?=$row['title']?></h5>
                    </a>
                </li>
            <? } ?>
                
            </ul>

        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>