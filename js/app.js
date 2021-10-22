var app = new function() {
    this.storage = window.localStorage;
    this.logined = '';
    this.isOwner = '';
    this.returnLoginURL = "";
    this.currentURL = "";
    this.ownerFlag = "";

    this.init = function() {
        CheckCookie()
        updatePageCount('page');

        // checkOwnerFlag();

        $('.animsition').animsition({
            inDuration: 0,
            outDuration: 0,
        });
        openMenu();
        // historyBack();

        this.returnLoginURL = $.urlParam('returnLoginURL');
        this.currentURL = window.location.href;
        var returnURL = this.returnLoginURL


        $('a').on('click', function(event) {
            
            var type = $(this).attr('data-type');
            if (type == 'member') {
                if (!app.logined) {
                    event.preventDefault();
                    alert('로그인이 필요한 서비스 입니다.');
                    location.href = "/html/member/login.php?returnLoginURL=" + $(this).attr('href');
                }
            } else if (type == 'member2') {
                if (!app.logined) {
                    event.preventDefault();
                    var confirm = window.confirm('본 이벤트는 회원가입 후 참여가 가능합니다.');
                    if (confirm) {
                        location.href = "/html/member/login.php?returnLoginURL=" + $(this).attr('href');
                    }
                }
            } else if (type == 'member_loc') {
                if (!app.logined) {
                    event.preventDefault();
                    alert("이 기능을 사용하시려면 로그인 후 위치서비스 이용동의를 해주세요.");
                    return false;
                    // var confirm = window.confirm('회원가입자들을 위한 이벤트로\n이벤트 참여를 원하시면\n회원가입을 부탁드립니다.');
                    // if (confirm) {
                    //     location.href = "/html/member/main.php?returnLoginURL=" + $(this).attr('href');
                    // }
                }
            } else if (type == 'accessUser') {
				app.showOverlayProgress();

                var res;
                $this = $(this);

				var member_id = getCookie('member_id')

                if (member_id) {

                    if (member_id.toLowerCase() == 'null' || member_id.toLowerCase() == 'undefinded') {
                        event.preventDefault();
                        alert('로그인이 필요한 서비스 입니다.');
                        app.hideOverlayProgress();
                        location.href = "/html/member/login.php?returnLoginURL=" + $(this).attr('href');
                        return false;
                    }

                    event.preventDefault();
                    $.ajax({
                        url:'/ajax/ajax.getHejKlassAccessUser.php',
                        type:'get',
                        data: {id: member_id},
                        dataType: 'text',
                        success: function(_res){
							console.log(_res)
                            res = _res;
                        }, complete: function() {
                            if (res > 0) {
                                location.href = $this.attr('href');
                            } else {
								alert('볼보 고객만 가능한 서비스 입니다.');
							}
                        }, error: function(e) {
                            console.log(e)
                            app.hideOverlayProgress();
                        }
                    });
                } else if (!app.logined) {
                    event.preventDefault();
                    alert('로그인이 필요한 서비스 입니다.');
                    app.hideOverlayProgress();
                    location.href = "/html/member/login.php?returnLoginURL=" + $(this).attr('href');
                }
            } else if (type == 'owner') {
                app.showOverlayProgress();
                console.log(app.isOwner)
                var res;
                $this = $(this);

                var master_cust_cd = getCookie('master_cust_cd')
                var member_id = getCookie('member_id')

                if (master_cust_cd && member_id) {

                    if (master_cust_cd.toLowerCase() == 'null' || master_cust_cd.toLowerCase() == 'undefinded' || member_id.toLowerCase() == 'null' || member_id.toLowerCase() == 'null') {
                        event.preventDefault();
                        alert('로그인이 필요한 서비스 입니다.');
                        app.hideOverlayProgress();
                        location.href = "/html/member/login.php?returnLoginURL=" + $(this).attr('href');
                        return false;
                    }

                    event.preventDefault();
                    $.ajax({
                        url:'/ajax/ajax.getOwnerFlag.php',
                        type:'get',
                        data: {master_cust_cd: master_cust_cd, id: member_id},
                        dataType: 'json',
                        success: function(_res){
                            res = _res;
                        }, complete: function() {
                            var result = res.result;
                            var resultData = res.resultData;
                            if (result == 'success') {
                                setCookie('owner_flag', resultData[0].owner_flag, 99);
                                if (resultData[0].owner_flag != "Y") {
                                    event.preventDefault();
                                    alert('볼보 고객만 가능한 서비스 입니다.');
                                    app.hideOverlayProgress();
                                } else {
                                    location.href = $this.attr('href');
                                }
                            }
                        }, error: function(e) {
                            console.log(e)
                            app.hideOverlayProgress();
                        }
                    });
                } else if (!app.logined) {
                    event.preventDefault();
                    alert('로그인이 필요한 서비스 입니다.');
                    app.hideOverlayProgress();
                    location.href = "/html/member/login.php?returnLoginURL=" + $(this).attr('href');
                }
                


                // if (!app.isOwner) {
                //     e.preventDefault();
                //     alert('볼보 고객만 가능한 서비스 입니다.');
                //     app.hideOverlayProgress();
                // } else if (!app.logined) {
                    
                // }
                // app.hideOverlayProgress();
            } else {
                if (($(this).attr('href').indexOf("javascript") < 0)) {
                    if ($(this).attr('href') != "#") {
                        if ($(this).attr('target') != '_blank') {
                            app.showOverlayProgress();
                            event.preventDefault();
                            location.href = $(this).attr('href');
                        } else {
                            updatePageCount("link", $(this).attr('href'));
                        }
                    }
                }
            }
        });
    }

    function openMenu() {
        $("#menu_wrap .list > ul > li > a").on('click', function() {
            if ($(this).removeClass('on').siblings('ul').is( ":hidden" )) {
                $("#menu_wrap .list > ul > li > a").removeClass('on');
                $("#menu_wrap .list > ul > li > ul").slideUp(200);
                $(this).addClass('on').siblings('ul').slideDown(200);
                
            } else {
                $(this).removeClass('on').siblings('ul').slideUp(200);
            }
        });
    }

    this.goHome = function() {
        $("#logo a").click();
    }

    this.toggleMenu = function() {
        var $menu_wrap = $('#menu_wrap');
        var $support_wrap = $('#support_wrap');
        if ($menu_wrap.hasClass('on')) {
            $menu_wrap.removeClass('on');
        } else {
            if ($support_wrap.hasClass('on')) {
                $support_wrap.removeClass('on');
                setTimeout(function() {
                    $menu_wrap.addClass('on');
                }, 300)
            } else {
                $menu_wrap.addClass('on');
            }
        }
    }

    this.toggleMenu2 = function() {
        var $menu_wrap = $('#menu_wrap');
        var $support_wrap = $('#support_wrap');
        if ($support_wrap.hasClass('on')) {
            $support_wrap.removeClass('on');
        } else {
            if ($menu_wrap.hasClass('on')) {
                $menu_wrap.removeClass('on');
                setTimeout(function() {
                    $support_wrap.addClass('on');
                }, 300)
            } else {
                $support_wrap.addClass('on');
            }
        }
    }

    function historyBack() {
        // $('#breadcrumb .back a').on('click', function() {
        //     event.preventDefault();
        //     history.back();
        // });
    }

    this.androidBack = function() {
        if ($('#breadcrumb .back a').attr('href')) {
            location.href = $('#breadcrumb .back a').attr('href');
        } else if ($('.fm-back a').attr('href')) {
            location.href = $('.fm-back a').attr('href');
        } else {
            android.androidBack();
        }
    }

    this.showOverlayProgress = function() {
        $('#contents').prepend('<div id="overlayProgress" class="animsition-overlay"><div class="animsition-loading"></div></div>')
    }

    this.hideOverlayProgress = function() {
        $('#overlayProgress').remove();
    }

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
           return null;
        }
        else{
           return results[1] || 0;
        }
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
        console.log(getCookie('owner_flag'));
    }

    function checkOwnerFlag() {
        app.ownerFlag = getCookie('newOwnerFlag');
        if (!app.ownerFlag) {
            var masterCd = getCookie('master_cust_cd');
            var id = getCookie('member_id');
            if (masterCd) {
                getOwnerFlag(masterCd, id);
            }
        }
    }

    function getOwnerFlag(masterCd, id) {
        var res;
        $.ajax({
            url:'/ajax/ajax.getOwnerFlag.php',
            type:'get',
            data: {master_cust_cd: masterCd, id: id},
            dataType: 'json',
            success: function(_res){
                res = _res;
            }, complete: function() {
                var result = res.result;
                var resultData = res.resultData;
                if (result == 'success') {
                    setCookie('owner_flag', resultData[0].owner_flag, 99);
                }
            }, error: function(e) {
                console.log(e)
            }
        });
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

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    this.deleteAllCookies = function() {
        var cookies = document.cookie.split(";");
    
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }

    function updatePageCount(_cate, _url) {
        var url = "";
        if (_url) {
            url = _url;
        } else {
            url = window.location.href;
            console.log(url)
        }
        url = url.replace("http://", "");
        url = url.replace("https://", "");
        url = url.replace("index.php", "");

        if (url.indexOf("login.php?") > 0) {
            url = url.split("?")[0];
        }

        if (url.indexOf("reservation") > 0) {
            url = url.split("?")[0];
        }
        
        if (url.indexOf("member_oneyear") > 0) {
            url = url.split("?")[0];
        }
        
        if (url.indexOf("html/main/") > 0) {
            url = url.replace("html/main/", "");
        }
        
        $.ajax({
            url:'/ajax/ajax.updatePageView.php',
            type:'get',
            data: {url: url, category: _cate},
            dataType: 'json',
            success: function(_res){
            }, complete: function() {
            }, error: function(e) {
                console.log(e)
            }
        });
    }

    this.notiCount = function() {
        // alert("Notification1")
        $.ajax({
            url:'/ajax/ajax.getNotiCount.php',
            type:'get',
            data: {master_cust_cd: getCookie('master_cust_cd')},
            dataType: 'text',
            success: function(_res){
                console.log(_res)
                _res = _res.replace(/\s+/, "");//왼쪽 공백제거
                _res = _res.replace(/\s+$/g, "");//오른쪽 공백제거
                _res = _res.replace(/\n/g, "");//행바꿈제거
                _res = _res.replace(/\r/g, "");//엔터제거
                var osInfo = getOS();
                if (osInfo == "Android") {
                    android.showNotiCount(_res);
                } else if (osInfo == "iOS") {
                    try {
                        window.webkit.messageHandlers.notiCountHandler.postMessage(_res);
                    } catch(err) {
                        alert(err)
                        console.log('The native context does not exist yet');
                        // app.hideOverlayProgress()
                    }
                }
            }, complete: function() {
            }, error: function(e) {

                alert(JSON.stringify(e))
            }
        });
    }

    this.updateNotiCount = function() {

        $.ajax({
            url:'/ajax/ajax.updateNotiCount.php',
            type:'get',
            data: {master_cust_cd: getCookie('master_cust_cd')},
            dataType: 'text',
            success: function(_res){
            }, complete: function() {
            }, error: function(e) {
                // alert(e)
            }
        });
    }

    
}

app.init();

var customConfirm = new function() {
    this.canFunc = null;
    this.conFunc = null;
    
    this.show = function(_txt, _confirm, _cancel, _confirmFnc, _cancelFnc) {
        this.canFunc = function() {
            $("#customConfirm").fadeOut(function() {
                $(this).remove();
                _cancelFnc;
            });
        }
        this.conFunc = _confirmFnc;

        var alertTemp = '<div id="customConfirm" class="alert" style="display: none;">' +
            '<div class="bg"></div>' +
            '<div class="inner">' +
                '<div class="box-txt">' +
                    '<p>'+_txt+'</p>' +
                '</div>' +
                '<div class="box-btn">' +
                    '<a href="javascript: void(0)" onclick="customConfirm.canFunc()">' + _cancel + '</a>' +
                    '<a href="javascript: void(0)" onclick="customConfirm.conFunc()">' + _confirm + '</a>' +
                '</div>' +
            '</div>' +
        '</div>'

        $("body").append(alertTemp)
        $("#customConfirm").fadeIn();
        
    }
}