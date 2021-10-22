<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "news";
$FOOTER_CODE = "cscenter";
$TITLE = "NEWS";

$bm_sid = "5";
$sid = SQLFiltering($_GET['sid']);
$sql = " SELECT title, publish_date, thum_file, content, header_color FROM volvo_bbs_{$bm_sid} WHERE sid = '{$sid}' ";

$row=$db->fetch_array($sql)[0];

$bbs_info['file_folder'] = $SITE_INFO['root'] . '/upload/bbs/' . $bm_sid;
$bbs_info['file_read'] = $SITE_INFO['http_host'] . '/upload/bbs/' . $bm_sid;

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

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents" class="newsview">
        <div id="breadcrumb" <? if ($row['header_color'] == 2) { echo 'class="white"'; }?>>
            <div class="back">
                <a href="/html/<?=$CODE?>/list.php">
                    <? if ($row['header_color'] == 2) { ?>
                    <img src="/images/common/ic_back_w.png" alt="">
                    <? } else { ?>
                    <img src="/images/common/ic_back.png" alt="">
                    <? } ?>
                    
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <div class="container">
            <div class="view">
                <div style="background-image: url(<?=$image?>)" class="cover"></div>
                <h5 class="tit"><?=$row['title']?></h5>
                <dvi class="cont">
                    <?=htmlspecialchars_decode(nl2br($row['content']))?>
                </dvi>
            </div>
        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

    <script>
        var aTags = $(".view .cont").find('a');

        $.each(aTags, function(index, aTag) {
            var target = $(aTag).attr("target");
            if (!target || target != "_blank") {
                $(aTag).attr("target", "_blank")
            }
        })
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>