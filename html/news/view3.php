<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "news";
$FOOTER_CODE = "cscenter";
$TITLE = "NEWS";

$bm_sid = "7";
$sid = $_GET['sid'];
$sql = " SELECT title, subtitle, publish_date, thum_file, content FROM volvo_bbs_{$bm_sid} WHERE sid = '{$sid}' ";

$row=$db->fetch_array($sql)[0];

$bbs_info['file_folder'] = $SITE_INFO['root'] . 'upload/bbs/' . $bm_sid;
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

    <div id="contents" class="newsview2">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/<?=$CODE?>/list3.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <div class="container">
            <div class="view">
                <h5 class="tit"><?=$row['title']?></h5>
                <h6><span><?=$row['subtitle']?></span><span class="date"><?=$row['publish_date']?></span></h6>
                <div class="cont">
                <?=$row['content']?>
                </div>
                <!--<div class="btn_close">
                    <a href="javascript:history.back();">닫기</a>
                </div>-->
            </div>
        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>