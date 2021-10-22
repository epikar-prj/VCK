    <footer>
        <div id="footer_wrap">
            <div id="footer_menus">
                <ul>
                    <li <? echo ($FOOTER_CODE == "myvolvo") ? 'class="on"' : '' ?>>
                        <a href="/html/member/member_menu.php" >
                            <i></i>
                            <p>My Volvo</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "buy") ? 'class="on"' : '' ?>>
                        <a href="/html/footerMenu/buy.php" class="animsition-link" data-animsition-out-duration="300">
                            <i></i>
                            <p>Buy</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "service") ? 'class="on"' : '' ?>>
                        <a href="/html/footerMenu/service.php" class="animsition-link" data-animsition-out-duration="300">
                            <i></i>
                            <p>Service</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "benefit") ? 'class="on"' : '' ?>>
                        <a href="/html/footerMenu/benefit.php" class="animsition-link" data-animsition-out-duration="300">
                            <i></i>
                            <p>Program</p>
                        </a>
                    </li>
                    <li <? echo ($FOOTER_CODE == "cscenter") ? 'class="on"' : '' ?>>
                        <a href="/html/footerMenu/custom.php" class="animsition-link" data-animsition-out-duration="300">
                            <i></i>
                            <p>Notice</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    
</div>
    
<script src="/js/app.js?ver=<?=$date_code?>"></script>
</body>
</html>