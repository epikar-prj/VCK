<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

    $CODE = "push";
    global $_COOKIE;


    $sql = " select * from volvo_send_push_repair where master_cust_cd = '" . $_COOKIE['master_cust_cd'] . "' and errorCode = 0 and message <> '' and is_del <> 'Y' order by regdate desc ";
    $rows=$db->fetch_array($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover" />

    <title>VOLVO APP</title>

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/common.js?ver=<?=$date_code?>"></script>
    
    <link rel="stylesheet" href="/css/reset.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/font.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/common.css?ver=<?=$date_code?>">
	
    <? echo '<link rel="stylesheet" href="/html/' . $CODE . '/style.css?ver=' . $date_code . '">'; ?>
</head>
<body>
    <div id="wrap">
        <div class="notification">
            <div class="top">
                <strong>알림</strong>
            </div>
            <div class="middle">
                <div class="category">
                    <select name="" id="">
                        <option value="">전체알림</option>
                        <option value="">실시간 정비알림</option>
                    </select>
                </div>
                <div class="pushlist">
                    <ul>
                        <?foreach($rows as $row) {
							$image = $row["type"] == 1 ? "/images/push/icon_push_repaire.png" : "/images/push/icon_push_noti.png";
							$link = $row["type"] == 1 ? "https://volvoapp.co.kr/html/maintenence_check/index.php" : $row["link"];
							?>
                        <li>
                            <a href="javascript: movePage('<?=$link?>')">
                                <i><img src="<?=$image?>" alt=""></i>
                                <p><?=$row['message']?></p>
                            </a>
                        </li>
                        <?}?>
                    </ul>
                </div>
                <div class="delete"><a href="javascript: void(0)" onclick="updateNotiCount()">삭제</a></div>
            </div>
            <div class="bottom">
    
            </div>
            <div class="close"><a href="javascript: closeNotiList()"><img src="/images/push/icon_push_close.png" alt=""></a></div>
        </div>

    </div>
</body>

<script>

function movePage(url) {
    var osInfo = getOS();

    if (osInfo == "Android") {
        android.movePage(url);
    } else if (osInfo == "iOS") {
        try {
            var massage = {'name': 'movePage', 'url': url}
            window.webkit.messageHandlers.notiHandler2.postMessage(massage);
        } catch(err) {
            console.log('The native context does not exist yet');
            // app.hideOverlayProgress()
        }
    }
}

function closeNotiList() {
    var osInfo = getOS();

    if (osInfo == "Android") {
        android.closeNotiList();
    } else if (osInfo == "iOS") {
        try {
            window.webkit.messageHandlers.notiHandler.postMessage("closeNotiList");
        } catch(err) {
            console.log('The native context does not exist yet');
            // app.hideOverlayProgress()
        }
    }

    
    


}
function updateNotiCount() {

    $.ajax({
        url:'/ajax/ajax.updateNotiCount.php',
        type:'get',
        data: {master_cust_cd: '<?=$_COOKIE['master_cust_cd']?>', mode: 'd'},
        dataType: 'text',
        success: function(_res){
            console.log(_res)
            alert(_res)
        }, complete: function() {
            $(".pushlist ul").empty();
        }, error: function(e) {
            // alert(e)
        }
    });
}
</script>
</html>