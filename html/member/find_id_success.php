<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "아이디 찾기";

    $id = PARAM2('id');

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
            <p>아이디 찾기가 완료되었습니다. <br>
                고객님의 아이디는<br>
                <strong><?=$id?></strong><br>
                입니다.
            </p>
            <a href="login.php" class="btn">로그인 하기</a>
            <a href="find_pw.php" class="btn bg_color1">비밀번호 찾기</a>
        </div>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>