<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover" />
    <title>VOLVO APP</title>

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/animsition.min.js"></script>
    
   <!-- <? if ($CODE == 'testdrive' || $CODE == 'reservation' ) {?>
    <script src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=e6337d075bac312a03c730c6ac9f07ba"></script>
    <? } ?>-->
    
    <link rel="stylesheet" href="/css/reset.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/font.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/common.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/css/animsition.min.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/html/header/header.css?ver=<?=$date_code?>">
    <link rel="stylesheet" href="/html/footer/footer.css?ver=<?=$date_code?>">

    <? echo '<link rel="stylesheet" href="/html/' . $CODE . '/style.css?ver=' . $date_code . '">'; ?>
</head>
<body>

<div id="wrap" class="<?=$CODE?> animsition">
    <header>
        <div id="header_wrap">
            <div class="header_left">
                <div id="logo">
                    <a href="/index.php" class="animsition-link"><img src="/images/common/volvo-wordmark-black.svg" alt=""></a>
                </div>
            </div>
            <div class="header_right">
                <div id="support">
                    <a href="javascript: void(0)" onclick="app.toggleMenu2()">Support</a>
                </div>
                <div id="menu">
                    <a href="javascript: void(0)" onclick="app.toggleMenu()"><img src="/images/common/ic_menu.png" alt=""></a>
                </div>
            </div>
        </div>

        <div id="menu_wrap">
            <div class="list">
                <ul>
                    <li>
                        <a href="/html/member/member_menu.php">My Volvo</a>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Buy</a>
                        <ul>
                            <li><a href="/html/cars/index.php">Cars</a></li>
                            <li><a href="/html/testdrive/testdrive1.php">????????????</a></li>
                            <li><a href="/html/showroom/">????????? ??????</a></li>
                            <li><a href="/html/selekt/index.php">?????? ?????? ?????????</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Own</a>
                        <ul>
                            <li><a href="/html/center/">????????? ?????? ??????</a></li>
                            <li><a href="/html/reservation/reservation1.php">????????? ?????? ??????</a></li>
                            <li><a href="/html/reservation_list/list.php">?????? ??????</a></li>
                            <li><a href="/html/maintenence/maintenence1.php">?????? ??????</a></li>
                            <!-- <li><a href="/html/maintenence_check/index.php">????????? ?????? ??????</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Program</a>
                        <ul>
                            <li><a href="/html/promotion/promotion1.php">Hej. Familj</a></li>
                            <li><a href="/html/coupon/coupon_1.php">Coupon</a></li>
                            <li><a href="/html/event/">Event</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Service</a>
                        <ul>
                            <li><a href="/html/warning/index.php">???????????????</a></li>
                            <li><a href="/html/emergency/index.php">????????????</a></li>
                            <li><a href="/html/accident/index.php">????????????</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0)">Notice</a>
                        <ul>
                            <li><a href="/html/news/list.php">News</a></li>
                            <li><a href="/html/faq/">FAQ</a></li>
                            <li><a href="/html/inquiry/">1:1??????</a></li>
                            <li><a href="/html/terms/">????????????</a></li>
                            <li><a href="/html/policy/">????????????????????????</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div id="support_wrap" class="">
            <div class="list">
                <ul>
                    <li><a href="/html/warning/"><i class="ic_warning"></i>????????? ??????</a></li>
                    <li><a href="/html/emergency/"><i class="ic_emergency"></i>????????????</a></li>
                    <li><a href="/html/accident/"><i class="ic_accident"></i>????????????</a></li>
                    <li><a href="https://www.volvocars.com/kr/support/manuals/" target="_blank"><i class="ic_manual"></i>????????? ?????????</a></li>
                </ul>
            </div>
            <div class="call">
                <a href="tel:1588-1777"><i></i>?????????????????? ??????</a>
            </div>
        </div>
    </header>