<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "member";
    $FOOTER_CODE = "myvolvo";
    $TITLE = "MY VOLVO";

    $returnURL = PARAM2('returnLoginURL');
    $loginURL = "/index.php";

    // if (isLogined()) {
    //     MgMoveURL('/html/member/member_menu.php');
    // }

    
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
            app.showOverlayProgress()
            var _form = document.loginForm
            var data = {
                id: _form.id.value,
                pw: _form.pw.value,
            };
            
            var res;
            
            $.ajax({
                url:'/ajax/ajax.getUser.php',
                type:'post',
                data: data,
                dataType: 'json',
                success: function(_res){
                    res = _res;
                    console.log(res)
                    if (res) {
                        var result = res.result;
                        var resultData = res.resultData[0];
                        if (result == 'success') {
                            window.localStorage.setItem('member_sid', resultData['sid']);
                            window.localStorage.setItem('member_id', resultData['user_id']);
                            window.localStorage.setItem('member_name', resultData['cust_nm']);
                            window.localStorage.setItem('master_cust_cd', resultData['master_cust_cd']);
                            window.localStorage.setItem('member_hp', resultData['hp']);
                            window.localStorage.setItem('owner_flag', resultData['owner_flag']);
                            window.localStorage.setItem('location', resultData['use_loc_service_yn']);
                            
                            CheckCookie();
                        } else {
                            if (res.errorcode == "NotExistsUser" || res.errorcode == "DeleteUser") {
                                alert(result);
                            } else if (res.errorcode == "InitDataInsertFail") {
                                alert("처리 중 오류가 발생했습니다.\n시스템 관리자에게 문의해주세요.");
                            } else {
                                alert("처리 중 오류가 발생했습니다.\n잠시 후 다시 시도해주세요.");
                            }
                            app.hideOverlayProgress()
                        }
                    } else {
                        alert("처리 중 오류가 발생했습니다.\n잠시 후 다시 시도해주세요.");
                        app.hideOverlayProgress()
                    }
                }, complete: function() {
                    if (res) {
                        var result = res.result;
                        var resultData = res.resultData[0];
                        if (result == 'success') {
                            updateTokken()
                        }
                    } else {
                        alert("처리 중 오류가 발생했습니다.\n잠시 후 다시 시도해주세요.");
                        app.hideOverlayProgress()
                    }
                }, error: function(e) {
                    console.log(e)
                    app.hideOverlayProgress()
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
                    location.replace("<?=$loginURL?>");
                    // app.hideOverlayProgress()
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
                    app.hideOverlayProgress()
                }
            } else {
                getUser();
            }
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function CheckCookie() {
            if (!getCookie('master_cust_cd')) {
                if (app.storage.getItem('master_cust_cd')) {
                    setCookie('master_cust_cd', app.storage.getItem('master_cust_cd'), 99);
                }
            }
            if (!getCookie('member_id')) {
                if (app.storage.getItem('member_id')) {
                    setCookie('member_id', app.storage.getItem('member_id'), 99);
                }
            }
            if (!getCookie('member_name')) {
                if (app.storage.getItem('member_name')) {
                    setCookie('member_name', app.storage.getItem('member_name'), 99);
                }
            }
            if (!getCookie('member_sid')) {
                if (app.storage.getItem('member_sid')) {
                    setCookie('member_sid', app.storage.getItem('member_sid'), 99);
                }
            }
            if (!getCookie('member_hp')) {
                if (app.storage.getItem('member_hp')) {
                    setCookie('member_hp', app.storage.getItem('member_hp'), 99);
                }
            }
            if (!getCookie('owner_flag')) {
                if (app.storage.getItem('owner_flag')) {
                    setCookie('owner_flag', app.storage.getItem('owner_flag'), 99);
                }
            }
            if (!getCookie('location')) {
                if (app.storage.getItem('location')) {
                    setCookie('location', app.storage.getItem('location'), 99);
                }
            }
        }

        (function() {
            var data = {
                id: "bigbum1207@gmail.com",
                pw: "zjaskfo2020",
            };

            $.ajax({
                url:'/ajax/ajax.getUser.php',
                type:'post',
                data: data,
                dataType: 'json',
                success: function(_res){
                    res = _res;
                    console.log(res)
                    if (res) {
                        var result = res.result;
                        var resultData = res.resultData[0];
                        if (result == 'success') {
                            window.localStorage.setItem('member_sid', resultData['sid']);
                            window.localStorage.setItem('member_id', resultData['user_id']);
                            window.localStorage.setItem('member_name', resultData['cust_nm']);
                            window.localStorage.setItem('master_cust_cd', resultData['master_cust_cd']);
                            window.localStorage.setItem('member_hp', resultData['hp']);
                            window.localStorage.setItem('owner_flag', resultData['owner_flag']);
                            window.localStorage.setItem('location', resultData['use_loc_service_yn']);
                            
                            CheckCookie();
                        } else {
                            if (res.errorcode == "NotExistsUser" || res.errorcode == "DeleteUser") {
                                alert(result);
                            } else if (res.errorcode == "InitDataInsertFail") {
                                alert("처리 중 오류가 발생했습니다.\n시스템 관리자에게 문의해주세요.");
                            } else {
                                alert("처리 중 오류가 발생했습니다.\n잠시 후 다시 시도해주세요.");
                            }
                            app.hideOverlayProgress()
                        }
                    } else {
                        alert("처리 중 오류가 발생했습니다.\n잠시 후 다시 시도해주세요.");
                        app.hideOverlayProgress()
                    }
                }, complete: function() {
                    if (res) {
                        // var result = res.result;
                        // var resultData = res.resultData[0];
                        // if (result == 'success') {
                        //     updateTokken()
                        // }
                    } else {
                        alert("처리 중 오류가 발생했습니다.\n잠시 후 다시 시도해주세요.");
                        app.hideOverlayProgress()
                    }
                }, error: function(e) {
                    console.log(e)
                    app.hideOverlayProgress()
                }
            });
        })();
    </script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>