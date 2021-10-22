<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "main";
    $FOOTER_CODE = "";
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<script src="/js/slick.min.js"></script>
<link rel="stylesheet" href="/css/slick.css">

<div id="contents">
    <div class="container">
        <div id="mainItems">
			<!-- <div class="banner_warranty" id="banner_warranty" style="display:none;">
				<div class="warranty">
					<p class="title"><a href="/html/warranty/index.php"><span class="eng">Service By Volvo</span> 평생 부품 보증</a></p>
					<div class="btns">
						<div class="btn_link"><a href="/html/warranty/index.php">자세히보기</a></div>
						<div class="btn_close"><a href="javascript:void(0);" onclick="banner_warranty_close();">하루동안 보지 않기</a></div>
					</div>
				</div>
			</div>
			<script>
				$(document).ready(function() {
					cookiedata = document.cookie; 
					if ( cookiedata.indexOf("bwcookie=done") < 0 ){ 
						$('#banner_warranty').show();
					} else {
						$('#banner_warranty').hide();
					}
				});

				function setCookie( name, value, expiredays ) { 
					var todayDate = new Date(); 
					todayDate.setDate( todayDate.getDate() + expiredays );
					document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
				}

				function banner_warranty_close(){
					$('#banner_warranty').hide();
					setCookie( "bwcookie", "done" , 1 );
				}
			</script> -->
            <ul>
                <li class="first">
                    <div class="box-img">
                        <img src="/images/main/img_main-11.jpg" alt="">
                    </div>
                    <div class="box-txt type1 center write s90_banner">
						<p>The smartest ever</p>
                        <strong>The new Volvo XC60</strong>
                        <div class="btn"><a href="/html/cars/xc60/index.php" class="animsition-link">자세히 보기</a></div>
                    </div>
                </li>
                <li>
                    <div class="box-img">
                        <img src="/images/main/img_main-12.jpg" alt="">
                    </div>
                    <div class="box-txt type1 top center write">
                        <strong>The S90</strong>
                        <div class="btn"><a href="/html/cars/s90/index.php" class="animsition-link">자세히 보기</a></div>
                    </div>
                </li>
                <li>
                    <div class="box-img">
                        <img src="/images/main/img_main-9.jpg" alt="">
                    </div>
                    <div class="box-txt type1 top center write">
                        <p>스웨디시 럭셔리를 경험해보세요.</p>
                        <strong>TEST DRIVE</strong>
                        <div class="btn"><a href="/html/testdrive/testdrive1.php" class="animsition-link">자세히 보기</a></div>
                    </div>
                </li>
                <li>
                    <a href="/html/member/member_menu.php" class="animsition-link">
                        <div class="box-img">
                            <img src="/images/main/img_main-3.jpg" alt="">
                        </div>
                        <div class="box-txt type2 bottom write">
                            <strong>My Volvo</strong>
                        </div>
                        <div class="bg"></div>
                    </a>
                </li>
                <li>
                    <a href="/html/footerMenu/buy.php" class="animsition-link">
                        <div class="box-img">
                            <img src="/images/main/img_main-5.jpg" alt="">
                        </div>
                        <div class="box-txt type2 top">
                            <strong>Buy</strong>
                        </div>
                        <div class="bg"></div>
                    </a>
                </li>
                <li>
                    <a href="/html/footerMenu/service.php" class="animsition-link">
                        <div class="box-img">
                            <img src="/images/main/img_main-6.jpg" alt="">
                        </div>
                        <div class="box-txt type2 top write">
                            <strong>Service</strong>
                        </div>
                        <div class="bg"></div>
                    </a>
                </li>
                <li>
                    <a href="/html/footerMenu/benefit.php" class="animsition-link">
                        <div class="box-img">
                            <img src="/images/main/img_main-4.jpg" alt="">
                        </div>
                        <div class="box-txt type2 top write">
                            <strong>Program</strong>
                        </div>
                        <div class="bg"></div>
                    </a>
                </li>
                <li>
                    <a href="/html/footerMenu/custom.php" class="animsition-link">
                        <div class="box-img">
                            <img src="/images/main/img_main-7-re.jpg" alt="">
                        </div>
                        <div class="box-txt type2 top">
                            <strong>Notice</strong>
                        </div>
                        <div class="bg"></div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--<div id="popSlick">
    <div class="popInner"></div>
</div>-->


<div class="update_pop" style="display: none;">
    <div class="pop">
        <div class="inner">
            <strong>
                현재 Hej Volvo App은 <br>
                2.1.1 버전으로 업데이트 되었습니다. <br>
            </strong>
            <!--<p>
                - 실시간 정비 알림 및 Push <br>
                - 정비 이력 조회 <br>
                - 앱 업데이트 등 Push 알림 기능 <br>
            </p>-->
            <?if (checkOS() == "iphone") {?>
            <a href="https://apps.apple.com/kr/app/hej-volvo/id1198822856" target="_blank" id="close" class="btn">업데이트 하기</a>
            <?} else if (checkOS() == "android") {?>
            <a href="https://play.google.com/store/apps/details?id=com.volvocars.vcksmart" target="_blank" id="close" class="btn">업데이트 하기</a>
            <?}?>
        </div>
    </div>
</div>


<!--<div class="notice_pop" style="display: block;">
    <div class="bg" onclick="javascript: $('.notice_pop').fadeOut(300);"></div>
    <div class="pop">
        <div class="inner" style="text-align: center;">
            <strong>[안내]</strong>
            <p>21년식 인스크립션/프로 차량 <br>음향시스템 노이즈 관련 안내 드립니다.</p>
			<p class="date">(2021.04.26) </p>
            <a style="width:50%; " href="/html/news/view2.php?sid=12" id="close" class="btn">자세히보기</a>
			<a style="width:50%; left:auto; right:0px; border-left:solid 1px #fff;" href="javascript: $('.notice_pop').fadeOut(300);" id="close" class="btn">닫기</a>
        </div>
    </div>
</div>-->

<!-- <div class="system_check_pop">
	<div class="pop">
		<div class="inner">
			<div class="top">
				<div class="title">[안내]</div>
				<div class="txt" style="text-align: center;">서버 작업으로 해당 시간 동안 <br>
                앱 접속이 원활하지 않았습니다.<br>
                현재는 복구가 완료되어 정상적으로 <br>
                서비스 접속 및 이용이 가능하며,<br>
                갑작스러운 오류로 불편함을 드린 점 <br>
                양해 부탁드립니다.<br>
                <br>
                작업 시간 : 2021.05.14(금) 13:30~14:15(45분) 
                </div>
			</div>
			<div class="bottom" onclick="$('.system_check_pop').fadeOut(300);">닫기</div>
		</div>
	</div>
</div> -->

<!--<?if ($_COOKIE["member_id"] != "apptest@volvocars.com") {?>
<div class="notice_pop2" style="display: none;">
    <div class="pop">
        <div class="inner" style="text-align: center;">
            <strong>기능 업데이트 작업 공지</strong>
            <p style="text-align: center;">앱 기능 업데이트 작업으로 해당 시간 동안 시스템 점검을 시행 중입니다. <br><br>
            작업시간 동안 서비스 이용이 불가한 점 양해 부탁드리며,
            최대한 빠르게 작업하여 서비스를 정상적으로 이용할 수 있도록 하겠습니다.
            <br><br>
            작업 일시: 2021.03.25(목) 22:30~23:30(1시간)
            </p>
            
        </div>
    </div>
</div>
<?}?>-->

<script>
    $(window).on("load", function() {
        getPopup();
    });


    function getPopup() {
        var res;
        $.ajax({
            url:'/json/popup.json',
            dataType: 'json',
            success: function(_res){
                res = _res;
            }, complete: function() {
                setPopup(res);
            }, error: function(e) {
                console.log(e)
            }
        });
    }

    function checkAppVersion(appVer) {
        var storeVer = "2.1.1";
		//var app_ver = navigator.appVersion;
		//$('#mainItems').append(app_ver);
        if (storeVer > appVer) {
            showUpdatePop();
        }
    }

    function showUpdatePop() {
        $(".update_pop").fadeIn(300);
    }

    function setPopup(_item) {
        var checkHejfamilj = 0;
        
        $.each(_item, function(index, item) {
            if (item.gubun == "hejfamilj") {
                checkHejfamilj += 1;
            }
        });

        if (checkHejfamilj > 0) {
            $.ajax({
                url:'/ajax/ajax.checkHejfamilj.php',
                dataType: 'json',
                success: function(_res){
                    res = _res;
                    appendPopup(_item, res);
                }, complete: function() {
                }, error: function(e) {
                    console.log(e)
                }
            });
        } else {
            appendPopup(_item, 0);
        }
        
    }
    
    function appendPopup(_item, _hej) {
        var temp = '<div id="mainPop-%id%" class="mainPop" data-color="%dotColor%">' +
            '<div class="pop_wrap">' +
                '<div class="box-img">' +
                    '<a href="%link%"><img src="/images/mainpop/%image%"></a>' +
                '</div>' +
                '<div class="bottom">' +
                    '<label><input type="checkbox" id="popToday-%id%">다시 보지 않기</label>' +
                    '<a href="javascript: void(0)" onclick="closeMainPop(\'%id%\')">닫기</a>' +
                '</div>' +
            '</div>' +
        '</div>';

        var result = '';
        var firstDotsColor = '';
        var isDots = false;
        var count = 0;

        $.each(_item, function(index, item) {
            var sdate = '';
            var edate = '';
            var today = new Date();

            if (item.sdate) { sdate = new Date(item.sdate) }
            if (item.edate) { edate = new Date(item.edate) }

            

            if (_hej < 1) {
                if (item.gubun != "hejfamilj") {
                    if ((today >= sdate && today <= edate) || (!sdate && !sdate)) {
                        if (checkPopupStorage(item.id)) {
                            var _temp = replaceAll(temp, "%id%", item.id)
                            _temp = replaceAll(_temp, "%image%", item.image)
                            _temp = replaceAll(_temp, "%dotColor%", item.dotColor)
                            result += replaceAll(_temp, "%link%", item.link)

                            if (firstDotsColor == '') {
                                firstDotsColor = item.dotColor;
                            }
                            
                            count ++;
                        }
                    }
                }
            } else {
                if ((today >= sdate && today <= edate) || (!sdate && !sdate)) {
                    if (checkPopupStorage(item.id)) {
                        var _temp = replaceAll(temp, "%id%", item.id)
                        _temp = replaceAll(_temp, "%image%", item.image)
                        _temp = replaceAll(_temp, "%dotColor%", item.dotColor)
                        result += replaceAll(_temp, "%link%", item.link)

                        if (firstDotsColor == '') {
                            firstDotsColor = item.dotColor;
                        }

                        count ++;
                    }
                }
            }
        });

        if (count > 1) {
            isDots = true;
        }

        if (result) {
            
            $("#popSlick .popInner").html(result);
            $("#popSlick .popInner").slick({
                infinite: false,
                arrows: false,
                dots: isDots
            });
            $("#popSlick .popInner").on("afterChange", function(event, slick, currentSlide, nextSlide){
                var dotColor = $(".slick-list .slick-slide[data-slick-index="+currentSlide+"]").attr("data-color");
                
                $("#popSlick .popInner .slick-dots").attr("data-color", dotColor);
            })
            $("#popSlick .popInner .slick-dots").attr("data-color", firstDotsColor);
            $("#popSlick").fadeIn(200);
            
        }
    }

    function checkPopupStorage(_id) {
        var popTime = app.storage.getItem("mainPop-" + _id);
        var currentTime = new Date().getTime();
        var oneDayTime = 86400000;
        if (popTime) {
            if ((parseInt(popTime) + parseInt(oneDayTime)) < parseInt(currentTime)) {
                return false;
            }
            return false;
        } else {
            return true;
        }
    }

    function closeMainPop(_id) {
        var checkToday = document.getElementById("popToday-" + _id);
        var count = $(".slick-list .slick-slide").length;
        var index = $("#popSlick .popInner").slick('slickCurrentSlide');

        if (checkToday.checked) {
            app.storage.setItem("mainPop-" + _id, new Date().getTime());
        }
        
        if (count > 1) {
            $("#popSlick .popInner").slick('slickRemove', index);
            count = $(".slick-list .slick-slide").length;
            if (count < 2) {
                $("#popSlick .popInner .slick-dots").hide();
            }
        } else {
            $("#popSlick").fadeOut(200);
        }
    }


</script>
<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>

