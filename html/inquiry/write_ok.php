<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');


// Request 값
$sid = 0;
$member_sid = $_COOKIE['member_sid']; $member_sid = $member_sid ? $member_sid : "0";
$member_id = $_COOKIE['member_id'];

$bm_sid = PARAM2('bm_sid');
$category = PARAM2('category');
$title = PARAM2('title');
$hp = PARAM2('hp');
$content = PARAM2('content');
$email = PARAM2('email');
$name = PARAM2('name');
$ip = addslashes($_SERVER['REMOTE_ADDR']);


// 쿼리 적용
$query_grp = "SELECT IFNULL(MAX(grp), 0) + 1 grp FROM volvo_bbs_4 WHERE bm_sid='{$bm_sid}'";
$row_grp=$db->row($query_grp);
$grp = $row_grp['grp'];
$par = 0;
$dth = 0;
$odr = 0;


$query[] = "
	INSERT INTO volvo_bbs_4 ( 
		`bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `member_sid`, `id`, `name`, `title`, `ishtml`, `content`, `hp`, `email`, `ip`, `viewcnt`, `notice`, `isclose`, `status`, `regdate`, `reg_id`
	) VALUES (
		'{$bm_sid}', '{$grp}', '{$par}', '{$dth}', '{$odr}', '{$category}', '{$member_sid}', '{$member_id}', '{$name}', '{$title}', 'Y', '{$content}', '{$hp}', '{$email}', '{$ip}', '0', 'N', 'Y', 'Y', SYSDATE(), '{$member_id}'
	)";

$email_param = PARAM2('email');
$title_param = PARAM2('title');

// if ($member_id == 'apptest@volvocars.com') {
//     print_r($query);
//     exit;
// }

// print_r($query);
// exit;

$result = $db->tran_query( $query );
if(!$result) {
	MgMoveURL("", "처리 중 오류가 발생하였습니다.", "", "back");
	exit;
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer.php";
require "./SMTP.php";
require "./Exception.php";

$mail = new PHPMailer;

try {

	$type;

	if($category == 0){
		$type = '서비스센터 이용 및 예약관련 문의';
	}else if($category == 1){
		$type = '차량 문의';
	}else if($category == 2){
		$type = '이벤트 및 쿠폰 관련 문의';
	}else if($category == 3){
		$type = '기타 문의';
	}
    //Server settings
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = 'base64';
	$mail->SMTPDebug = 0;    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'volvocars.korea.dev@gmail.com';                     // SMTP username
    $mail->Password   = 'Volvo123$';                               // SMTP password
	$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom(''.$email_param.'', 'Hej Volvo');
    //$mail->addAddress('yjlee@mytable.co.kr', '볼보자동차 고객센터');     // Add a recipient
	$mail->addAddress('help_korea@volvocars.com', '볼보자동차 고객센터');
    $mail->addReplyTo(''.$email_param.'', 'Hej Volvo');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hej Volvo 1:1문의 - ' .$title_param;
    $mail->Body    = '<html><body>
	  <p style="font:normal 15px Gulim; color: #141414; text-align: left;"> 고객명 : '.$name.'</p>
	  <p style="font:normal 15px Gulim; color: #141414; text-align: left;"> 고객 이메일 (답변 받을 이메일) : '.$email.'</p>
	  <p style="font:normal 15px Gulim; color: #141414; text-align: left;"> 문의 유형 : '.$type.'</p>
	  <p style="font:normal 15px Gulim; color: #141414; text-align: left;"> 문의 제목 : '.$title.'</p>
	  <p style="font:normal 15px Gulim; color: #141414; text-align: left;"> 문의 내용 : '.$content.'</p><br><br>
	  <p style="font:normal 15px Gulim; color: #666; text-align: left;"> ※ 본 문의사항은 Hej Volvo 애플리케이션을 통해서 발송 되었습니다.</p>
	  </body></html>'; 

    $mail->send();

} catch (Exception $e) {

}


// DB Disconnect
require_once "../../inc/disconnect.php";


MgMoveURL("/html/inquiry/history.php", "문의사항이 등록 되었습니다.", "", "");

exit;
?>