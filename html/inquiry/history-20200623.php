<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    if (!isLogined()) {
        MgMoveURL('/html/member/main.php');
    }

    $CODE = "inquiry";
    $FOOTER_CODE = "cscenter";
    $TITLE = "1:1 문의";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents" class="inquiry_history">
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
                <li><a href="index.php">문의 하기</a></li>
                <li class="on"><a href="history.php">문의 내역 보기</a></li>
            </ul>
        </div>

		<div class="list">
            <ul>
                <li>
                    <a href="#">
                        <span>[이벤트 및 쿠폰 관련 문의]</span>
                        <p>이벤트에 당첨되었는데 쿠폰을 받지 못했습니다.</p>
                    </a>
<!--                    <a class="re">
                        <span>[이벤트 및 쿠폰 관련 문의]</span>
                        <p>이벤트에 당첨되었는데 쿠폰을 받지 못했습니다.</p>
                    </a>-->
                </li>
                <li>
                    <a href="#">
                        <span>[이벤트 및 쿠폰 관련 문의]</span>
                        <p>이벤트에 당첨되었는데 쿠폰을 받지 못했습니다.</p>
                    </a>
<!--                    <a class="re">
                        <span>[이벤트 및 쿠폰 관련 문의]</span>
                        <p>이벤트에 당첨되었는데 쿠폰을 받지 못했습니다.</p>
                    </a>-->
                </li>
            </ul>
        </div>
    </div>
</div>

    <script>
        function checkValidate(_form) {
            if (!_form.type.value) {
                alert("문의 유형을 선택해주세요");
                return false;
            }
            if (!_form.title.value) {
                alert("제목을 입력해주세요");
                return false;
            }
            if (!_form.text.value) {
                alert("문의 내용을 입력해주세요");
                return false;
            }
            if (!_form.email.value) {
                alert("이메일을 입력해주세요");
                return false;
            }
		}
	</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>