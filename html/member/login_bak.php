<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    $returnURL = PARAM2('returnLoginURL');
    $loginURL = "/index.php";
    
    if ($returnURL) {
        $loginURL = $returnURL;
    }

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/index.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
		<div class="login">
            <img src="/images/member/user.png" alt="" class="lock_img">
            <p>회원가입을 통해 볼보자동차코리아의<br>이벤트 및 최신 소식을 만나보세요.<br><br>볼보 고객은 회원가입 후 로그인을 하시면<br>차량 정보와 함께 서비스 정보<br>(센터 예약, 서비스 쿠폰, 정비 이력, 이벤트 참여 등)<br>혜택을 확인하실 수 있습니다.</p>
            <p></p>
            <form action="javascript: void(0)" name="loginForm" method="post" onsubmit="return checkValidate(this)">
                <input type="hidden" name="tokken" value="">
				<label>
					<span>ID</span>
					<input type="text" name="id" autocomplete="off" placeholder="아이디를 입력해주세요." onkeydown="keyDown(event)" autocapitalize="off" autocorrect="off" >
				</label>
				<label>
					<span>PW</span>
					<input type="password" name="pw" autocomplete="off" placeholder="패스워드를 입력해주세요.">
				</label>
				<button type="submit" class="login_btn">확인</button>
				<div class="sub_buttons">
                    <a href="find_id.php">아이디 찾기</a>
					<div class="vertical_line"></div>
					<a href="find_pw.php">비밀번호 찾기</a>
					<div class="vertical_line"></div>
					<a href="join.php">회원가입</a>
				</div>
			</form>
		</div>
    </div>
</div>

<script>

        $(window).on('load', function() {
            $("input[name=id]").focusout(function() {
                var id = $(this).val();
                $(this).val(id.replace(/\s/gi, ""));
            });
        })
        
        function checkValidate(_form) {
            if (!_form.id.value ) {
                alert("아이디를 입력해주세요");
                return false;
            }

            if (!validate_email(_form.id.value)) {
                alert("이메일 형식에 맞지않습니다.");
                return false;
            }

            if (!_form.pw.value ) {
                alert("비밀번호를 입력해주세요");
                return false;
            }
            
            login();
            return false;
        }

        function getUser() {
            var _form = document.loginForm
            var data = {
                id: _form.id.value,
                pw: _form.pw.value,
            };
            
            var res;
            
            $.ajax({
                url:'/ajax/ajax.getUser_bak.php',
                type:'post',
                data: data,
                dataType: 'json',
                success: function(_res){
                    res = _res;
                    console.log(res)
                }, complete: function() {
                    var result = res.result;
                    var resultData = res.resultData[0];
                    console.log(result)
                    if (result == 'success') {
                        // updateTokken()
                        console.log(resultData)
                        window.localStorage.setItem('member_sid', resultData['sid']);
                        window.localStorage.setItem('member_id', resultData['user_id']);
                        window.localStorage.setItem('member_name', resultData['cust_nm']);
                        window.localStorage.setItem('master_cust_cd', resultData['master_cust_cd']);
                        window.localStorage.setItem('member_hp', resultData['hp']);
                        window.localStorage.setItem('owner_flag', resultData['owner_flag']);
                        window.localStorage.setItem('location', resultData['use_loc_service_yn']);

                        // location.href = "<?=$loginURL?>";
                    } else {
                        alert(result);
                    }
                }, error: function(e) {
                    console.log(e)
                }
            });
        }

        function updateTokken() {
            var _form = document.loginForm

            $.ajax({
                url:'/ajax/ajax.updateTokken.php',
                type:'post',
                data: {tokken: _form.tokken.value, id: _form.id.value},
                dataType: 'text',
                success: function(_res){}, 
                complete: function() {
                    location.replace("<?=$loginURL?>");
                }, error: function(e) {
                    console.log(e)
                }
            });
        }

        function login() {
            var osInfo = getOS();
            
            if (osInfo == "Android") {
                android.getTokken();
            } else if (osInfo == "iOS") {
                try {
                    window.webkit.messageHandlers.loginHandler.postMessage("tokken");
                } catch(err) {
                    console.log('The native context does not exist yet');
                }
            } else {
                getUser();
            }
        }
    </script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>