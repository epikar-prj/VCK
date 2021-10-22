<footer>
        <div id="footer_wrap">
            <div id="footer_menus">
                <ul>
                    <li <? echo ($FOOTER_CODE == "myvolvo") ? 'class="on"' : '' ?>>
                        <a href="javascript: void(0)" onclick="app.showFooterMenu('myvolvo')">
                            <i></i>
                            <p>My volvo</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "benefit") ? 'class="on"' : '' ?>>
                        <a href="javascript: void(0)" onclick="app.showFooterMenu('benefit')">
                            <i></i>
                            <p>Benefit</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "buy") ? 'class="on"' : '' ?>>
                        <a href="javascript: void(0)" onclick="app.showFooterMenu('buy')">
                            <i></i>
                            <p>Buy</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "service") ? 'class="on"' : '' ?>>
                        <a href="javascript: void(0)" onclick="app.showFooterMenu('service')">
                            <i></i>
                            <p>Service</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "cscenter") ? 'class="on"' : '' ?>>
                        <a href="javascript: void(0)" onclick="app.showFooterMenu('custom')">
                            <i></i>
                            <p>CS Center</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="fMenu">
            <div id="fm-myvolvo" class="fm_wrap">
                <div class="visual">
                    <img src="/images/common/img_fm-myvolvo.jpg" alt="">
                </div>
                <div class="title">
                    <strong>My volvo</strong>
                    <p>마이볼보</p>
                </div>
                <div class="list">
                    <ul>
                        <li>
                            <a href="#">
                                <strong>마이볼보</strong>
                                <span>My volvo</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="fm-back">
                    <a href="javascript: void(0)" onclick="app.hideFooterMenu()">
                        <img src="/images/common/ic_back.png" alt="">
                    </a>
                </div>
            </div>
            
            <div id="fm-benefit" class="fm_wrap">
                <div class="visual">
                    <img src="/images/common/img_fm-myvolvo.jpg" alt="">
                </div>
                <div class="title">
                    <strong>Benefit</strong>
                    <p>혜택</p>
                </div>
                <div class="list">
                    <ul>
                        <li>
                            <a href="#">
                                <strong>프로모션</strong>
                                <span>Promotion</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>쿠폰</strong>
                                <span>Coupon</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="fm-back">
                    <a href="javascript: void(0)" onclick="app.hideFooterMenu()">
                        <img src="/images/common/ic_back.png" alt="">
                    </a>
                </div>
            </div>

            <div id="fm-buy" class="fm_wrap">
                <div class="visual">
                    <img src="/images/common/img_fm-myvolvo.jpg" alt="">
                </div>
                <div class="title">
                    <strong>Buy</strong>
                    <p>볼보 구매</p>
                </div>
                <div class="list">
                    <ul>
                        <li>
                            <a href="#">
                                <strong>모델정보</strong>
                                <span>Model information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>전시장 안내</strong>
                                <span>Exhibition Guide</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>시승신청</strong>
                                <span>Test drive</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>인증 중고차</strong>
                                <span>Approved Used Cars</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="fm-back">
                    <a href="javascript: void(0)" onclick="app.hideFooterMenu()">
                        <img src="/images/common/ic_back.png" alt="">
                    </a>
                </div>
            </div>

            <div id="fm-service" class="fm_wrap">
                <div class="visual">
                    <img src="/images/common/img_fm-myvolvo.jpg" alt="">
                </div>
                <div class="title">
                    <strong>Service</strong>
                    <p>서비스 센터</p>
                </div>
                <div class="list">
                    <ul>
                        <li>
                            <a href="#">
                                <strong>서비스 센터 안내</strong>
                                <span>Model information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>서비스 센터 예약</strong>
                                <span>Exhibition Guide</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>예약 관리</strong>
                                <span>Test drive</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>나의 정비 이력</strong>
                                <span>Approved Used Cars</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>실시간 정비 알림</strong>
                                <span>Approved Used Cars</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="fm-back">
                    <a href="javascript: void(0)" onclick="app.hideFooterMenu()">
                        <img src="/images/common/ic_back.png" alt="">
                    </a>
                </div>
            </div>

            <div id="fm-custom" class="fm_wrap">
                <div class="visual">
                    <img src="/images/common/img_fm-myvolvo.jpg" alt="">
                </div>
                <div class="title">
                    <strong>Custom Center</strong>
                    <p>고객 센터</p>
                </div>
                <div class="list">
                    <ul>
                        <li>
                            <a href="#">
                                <strong>News</strong>
                                <span>Model information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>FAQ</strong>
                                <span>Exhibition Guide</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>1:1 문의</strong>
                                <span>Test drive</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>이용약관</strong>
                                <span>Approved Used Cars</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong>개인정보취급방침</strong>
                                <span>Approved Used Cars</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="fm-back">
                    <a href="javascript: void(0)" onclick="app.hideFooterMenu()">
                        <img src="/images/common/ic_back.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>
    
<script src="/js/app.js"></script>
</body>
</html>