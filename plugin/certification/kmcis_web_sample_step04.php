<?php
date_default_timezone_set('Asia/Seoul');
?>

<?php
	// Parameter 수신
	$rec_cert       = $_REQUEST['rec_cert'];
	$cookieCertNum  = $_REQUEST['certNum']; // 쿠키 또는 Session을 생성하지 않았을때 certNum 값 수신처리

	$iv = $cookieCertNum;  // 쿠키 또는 Session을 생성하지 않았을때 수신한 certNum 값을 복호화키에 세팅


		//암호화모듈 호출
		if (extension_loaded('ICERTSecu')) {

			//01.인증결과 1차 복호화
			$rec_cert = ICertSeed(2,0,$iv,$rec_cert);

			//02.복호화 데이터 Split (rec_cert 1차암호화데이터 / 위변조 검증값 / 암복화확장변수)
			$decStr_Split = explode("/", $rec_cert);

			$encPara  = $decStr_Split[0];		//rec_cert 1차 암호화데이터
			$encMsg   = $decStr_Split[1];		//위변조 검증값

			//03.인증결과 2차 복호화
			$rec_cert = ICertSeed(2,0,$iv,$encPara);

			//03-1. 위변조 검증
			$encMsg2 = "abcdabcdabcdabcdabcdabcdabcdabcdabcdabcd";

            $rec_cert = iconv("EUC-KR", "UTF-8", $rec_cert);

			if(strcmp($encMsg, $encMsg2) === 1){
				echo("암호화모듈에 일시적인 장애가 발생했습니다. 본인 인증을 다시 시도해주세요.");
				return;
			}

			//04. 복호화 된 결과자료 "/"로 Split 하기
            $decStr_Split = explode("/", $rec_cert);
            
            // print_r($decStr_Split);

			$certNum    = $decStr_Split[0];
			$date       = $decStr_Split[1];
			$CI         = $decStr_Split[2];
			$phoneNo    = $decStr_Split[3];
			$phoneCorp  = $decStr_Split[4];
			$birthDay   = $decStr_Split[5];
			$gender     = $decStr_Split[6];
			$nation     = $decStr_Split[7];
			$name       = $decStr_Split[8];
			$result     = $decStr_Split[9];
			$certMet    = $decStr_Split[10];
			$ip         = $decStr_Split[11];
			$M_name     = $decStr_Split[12];
			$M_birthDay = $decStr_Split[13];
			$M_Gender   = $decStr_Split[14];
			$M_nation   = $decStr_Split[15];
			$plusInfo   = $decStr_Split[16];
			$DI         = $decStr_Split[17];

			//05. CI,DI 복호화
			if(strlen($CI) > 0){
				$CI = ICertSeed(2,0,$iv,$CI);
			}
			if(strlen($DI) > 0){
				$DI = ICertSeed(2,0,$iv,$DI);
			}

			function paramChk($pattern, $param){
				$result = preg_match($pattern, $param);

				return $result;
			}

			// // 요청번호 (최대 40byte까지 유효)
			// if(strlen($certNum) > 40 || strlen($certNum) == 0){
			// 	echo("<script>alert('요청번호 비정상 ($certNum)');</script>");
			// }

			// // 요청일시 (숫자 14자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($date) != 14 || paramchk($patn, $date) == 0){
			// 	echo("<script>alert('요청일시 비정상 ($date)');</script>");
			// }

			// // 휴대폰번호 (값이 있는 경우에는 숫자 10 또는 11자리까지만 유효)
			// $patn = "/^[0-9]*$/";
			// if((strlen($phoneNo) != 10 && strlen($phoneNo) != 11) || paramChk($patn, $phoneNo) == 0){
			// 	echo("<script>alert('휴대폰번호 비정상 ($phoneNo)');</script>");
			// }

			// // 이동통신사 (값이 있는 경우에는 영문대문자 3자리만 유효)
			// $patn = "/^[[:upper:]]*$/";
			// if(strlen($phoneCorp) != 3 || paramChk($patn, $phoneCorp) == 0){
			// 	echo("<script>alert('이동통신사 비정상 ($phoneCorp)');</script>");
			// }

			// // 생년월일 (값이 있는 경우에는 숫자 8자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($birthDay) != 8 || paramChk($patn, $birthDay) == 0){
			// 	echo("<script>alert('생년월일 비정상 ($birthDay)');</script>");
			// }

			// // 성별 (값이 있는 경우에는 숫자 1자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($gender) != 1 || paramChk($patn, $gender) == 0){
			// 	echo("<script>alert('성별 비정상 ($gender)');</script>");
			// }

			// // 내외국인 (값이 있는 경우에는 숫자 1자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($nation) != 1 || paramChk($patn, $nation) == 0){
			// 	echo("<script>alert('내/외국인 비정상 ($nation)');</script>");
			// }

			// // 성명 (값이 있는 경우에는 최대 30byte까지만 유효)
			// $patn = "/^[\xa1-\xfea-zA-Z[:space:],.-]*$/";
			// if(strlen($name) > 60 || paramChk($patn, $name) == 0){
			// 	echo("<script>alert('성명 비정상 ($name)');</script>");
			// }

			// // 결과값 (영문대문자 1자리만 유효)
			// $patn = "/^[[:upper:]]*$/";
			// if(strlen($result) != 1 || paramChk($patn, $result) == 0){
			// 	echo("<script>alert('결과값 비정상 ($result)');</script>");
			// }

			// // 본인인증방법 (영문대문자 1자리만 유효)
			// $patn = "/^[[:upper:]]*$/";
			// if(strlen($certMet) != 1 || paramChk($patn, $certMet) == 0){
			// 	echo("<script>alert('본인인증방법 비정상 ($certMet)');</script>");
			// }

			// // 미성년자 성명 (값이 있는 경우에는 60자 이하 한글, 영대소문자 유효)
			// $patn = "/^[\xa1-\xfea-zA-Z[:space:],.-]*$/";
			// if(strlen($M_name) != 0){
			// 	if(strlen($M_name) > 60 || paramChk($patn, $M_name) == 0){
			// 		echo("<script>alert('미성년자 성명 ($M_name)');</script>");
			// 	}
			// }

			// // 미성년자 생년월일 (값이 있는 경우에는 숫자 8자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($M_birthDay) != 0){
			// 	if(strlen($M_birthDay) != 8 || paramChk($patn, $M_birthDay) == 0){
			// 		echo("<script>alert('생년월일 비정상 ($M_birthDay)');</script>");
			// 	}
			// }

			// // 미성년자 성별 (값이 있는 경우에는 숫자 1자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($M_Gender) != 0){
			// 	if(strlen($M_Gender) != 1 || paramChk($patn, $M_Gender) == 0){
			// 		echo("<script>alert('성별 비정상 ($M_Gender)');</script>");
			// 	}
			// }

			// // 미성년자 내외국인 (값이 있는 경우에는 숫자 1자리만 유효)
			// $patn = "/^[0-9]*$/";
			// if(strlen($M_nation) != 0){
			// 	if(strlen($M_nation) != 1 || paramChk($patn, $M_nation) == 0){
			// 		echo("<script>alert('내/외국인 비정상 ($M_nation)');</script>");
			// 	}
			// }

		}else{
		   echo("<script>window.parent.closeCerti('휴대폰 본인인증에 실패했습니다.\n다시 시도해주세요.')</script>");
		   return;
		}

		// Start - 수신내역 유효성 검증(사설망의 사설 IP로 인해 미사용, 공용망의 경우 확인 후 사용) *********************/
		// 1. date 값 검증
		 $end_date = date("YmdHis"); //	현재 서버 시각 구하기
		 $start_date = $date;
 
		 //mktime()을 만들기 위해 각 시간 단위로 분할
		 $yy = substr($end_date, 0, 4);
		 $mm = substr($end_date, 4, 2);
		 $dd = substr($end_date, 6, 2);
		 $hh = substr($end_date, 8, 2);
		 $ii = substr($end_date, 10, 2);
		 $ss = substr($end_date, 12, 2);
	 
		 //mktime()을 만들기 위해 DB에서 불러온 datetime 값을 시간 단위로 분할
		 $yy_start = substr($start_date, 0, 4);   
		 $mm_start = substr($start_date, 4, 2);   
		 $dd_start = substr($start_date, 6, 2);   
		 $hh_start = substr($start_date, 8, 2);   
		 $ii_start = substr($start_date, 10, 2);  
		 $ss_start = substr($start_date, 12, 2);  
     
		 $toDate = mktime($hh, $ii, $ss, $mm, $dd, $yy);
	     $fromDate = mktime($hh_start, $ii_start, $ss_start, $mm_start, $dd_start, $yy_start);
		 $timediff = intval(($toDate - $fromDate) / 60); // 분
		
		if ( $timediff < -30 || 30 < $timediff  ){		?>
			<!-- 비정상적인 접근입니다. (요청시간경과) -->
            요청시간이 경과하였습니다 다시 시도해주세요
<?php			return;
		}

		// 2. ip 값 검증
		$client_ip = ""; // 사용자IP 구하기
		if (isset($_SERVER)) {

			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
				$client_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			
			if (isset($_SERVER["HTTP_CLIENT_IP"]))
				$client_ip = $_SERVER["HTTP_CLIENT_IP"];

			$client_ip = $_SERVER["REMOTE_ADDR"];
		}

		if (getenv('HTTP_X_FORWARDED_FOR'))
			$client_ip = getenv('HTTP_X_FORWARDED_FOR');

		if (getenv('HTTP_CLIENT_IP'))
			$client_ip = getenv('HTTP_CLIENT_IP');
		
		if( $client_ip == "" ) 
			$client_ip = getenv('REMOTE_ADDR');
		
		$client_ip_list = explode(",",$client_ip);
		$client_ip = $client_ip_list[0];
		
		// if( $client_ip != $ip ){		?>
		<!-- 비정상적인 접근입니다. (IP불일치(<?php echo $client_ip ?>)(<?php echo $ip ?>)) -->
<?php			//return;
		// }
		// End - 수신내역 유효성 검증(사설망의 사설 IP로 인해 미사용, 공용망의 경우 확인 후 사용) ***********************/
?>
<html>
	<head>
	</head>
	<body>
		<script>
            window.parent.setCertiData("<?=$name?>", "<?=$phoneNo?>", "<?=$birthDay?>");
			// window.parent.document.getElementById("certPhone").classList.remove("open");
			// console.log(window.parent.document.getElementById("certPhone"))
			// window.parent.document.getElementById("certPhone").setAttribute("style","height: 0px");
        </script>
	</body>
</html>
