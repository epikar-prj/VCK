<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "비밀번호 찾기";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents" class="find_id">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/member/login.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
        <div class="find_id_wrap">
            <p>고객님의 SMS로<br>임시 비밀번호가 발송되었습니다.</p>
            <a href="/html/member/login.php" class="btn">로그인 하기</a>
        </div>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>