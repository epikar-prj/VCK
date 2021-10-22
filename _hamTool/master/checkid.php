<?php
require_once "../../inc/common.php";

// Request 값
$val = MgRequestCheck(trim($_POST['val']), 20, true, true); $val = strtolower($val); // 무조건 소문자로 변경함

// 입력 데이터 검증
if(isDuplicateId($TABLE_INFO['master'],"id",$val)){ echo "Y"; } // 운영자 DB에서 아이디 중복 체크
else if(isDuplicateId($TABLE_INFO['member'],"id",$val)){ echo "Y"; } // 회원 DB에서 아이디 중복 체크
else{ echo "N"; }

exit;
?>