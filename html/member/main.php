<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    MgMoveURL('/html/member/login.php');

    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    if (isLogined()) {
        MgMoveURL('/html/member/member_menu.php');
    }


    $returnURL = PARAM2('returnLoginURL');

    $loginURL = "/html/member/login.php";

    if ($returnURL) {
        $loginURL = $loginURL . "?returnLoginURL=" . $returnURL;
    }

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./style.css">

<div id="contents" class="myvolvo_bg">
    <div class="bg"></div>
    <div id="breadcrumb">
        <div class="back">
            <a href="/index.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
        
		<div class="myvolvo_main">
			<p><em class="upper">My Volvo</em> 메뉴는<br>회원가입이 필요한 메뉴입니다.<br>회원가입 후 다양한 정보 및 혜택을 받아보세요.</p>
			<div class="btn_wrap">
				<a href="<?=$loginURL?>">로그인 하기</a>
				<a href="/html/member/join.php">회원가입 하기</a>
			</div>
		</div>
    </div>
</div>
<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>