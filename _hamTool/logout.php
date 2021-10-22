<?php
require_once "../inc/common.php";

// 쿠키 삭제
SetCookie("member_id","",0,"/");
SetCookie("member_sid","",0,"/");
SetCookie("member_name","",0,"/");
SetCookie("member_level","",0,"/");
SetCookie("member_vcenter","",0,"/");

// DB Disconnect
require_once "../inc/disconnect.php";

// 페이지 이동
echo "<meta http-equiv='Refresh' content='0; URL=" . $SITE_INFO['http_host'] . "/_hamTool/index.html'>";
exit;
?>
