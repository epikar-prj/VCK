<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "terms";
    $FOOTER_CODE = "cscenter";
    $TITLE = "이용약관";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./style.css">

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/custom.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container" id="terms">
		<div class="con_ti">Hej Volvo 서비스 이용약관</div>

		<h5>제1조 (목적)</h5>
		<ul class="list">
			<li class="normal">이 약관은 ㈜볼보자동차코리아(이하 “회사”)가 모바일 어플리케이션 Hej Volvo를 통해 제공하는 온라인 서비스와 관련하여, 이 약관에 동의하고 서비스를 이용하는 이용자의 권리와 의무 및 서비스 이용조건, 절차 등에 관한 사항을 규정함을 목적으로 합니다.</li>
		</ul>

		<h5>제2조 (용어의 정리)</h5>
		<ul class="list">
			<li>이 약관에서 사용하는 용어의 정의는 다음과 같고, 이 약관에서 별도로 정의되지 않은 용어의 의미는 일반적인 거래관행에 따릅니다. 
				<ul class="inner_list">
					<li>1. 서비스: 회사가 제공하는 Hej Volvo를 통해 이용자에게 제공하는 제반 서비스를 의미합니다.</li>
					<li>2. 이용자: 이 약관에 따라 서비스를 이용하는 회원 및 비회원을 의미합니다.</li>
					<li>3. 회원: Hej Volvo에 접속하여 이 약관 및 개인정보 활용에 동의하고, 회사와 서비스 이용계약을 체결한 후 회사가 제공하는 서비스를 이용하는 자를 의미합니다.</li>
					<li>4, 비회원: 회원으로 가입하지 않고, Hej Volvo에 접속하여 게시된 서비스를 이용하는 자를 의미합니다. </li>
					<li>5. 아이디(ID): ‘회원’의 식별과 ‘서비스’ 이용을 위하여 회원이 설정한 이메일 주소를 의미합니다. </li>
					<li>6. 비밀번호(Password): ‘회원’의 동일성 확인과 회원정보의 보호를 위해 회원이 설정하고 회사가 승인한 문자와 숫자, 특수문자 등의 조합을 의미합니다.</li>
					<li>7. 탈퇴: 회원이 서비스 이용 계약을 종료시키는 의사표시를 의미합니다.</li>
				</ul>
			</li>
		</ul>

		<h5>제3조 (약관의 효력과 변경)</h5>
		<ul class="list">
			<li>① 이 약관은 회원 가입 시 고지하고 이에 동의한 자가 회원으로 가입함으로써 효력이 발생합니다.</li>  
			<li>② 회사는 이 약관을 개정하는 경우 개정된 약관의 적용일자 및 개정사유를 명시하여 현행 약관과 함께 그 적용일자 7일 이전부터 적용일자 전일까지 위 제1항의 회원 가입 시 고지방법과 동일한 방법 또는 Hej Volvo 팝업화면으로 공지합니다. 다만, 회원에게 불리하게 약관내용을 변경하는 경우에는 최소한 30일 이상의 사전 유예기간을 두고 공지합니다. 단, 회원의 연락처 미기재, 변경 후 미수정 등으로 인하여 개별 통지가 어려운 경우 게시판 내 공지를 함으로써 개별 통지한 것으로 간주합니다. 개정된 약관은 적용일자 이전으로 소급하여 적용되지 않습니다.</li> 
			<li>③ 회사는 회원이 가입 시 동의한 약관에 대해서 열람을 요구할 경우, 가입 시 기재한 전자우편으로 링크형태로 전송합니다.</li> 
			<li>④ 회원은 변경된 약관에 동의하지 아니하는 경우 회원 탈퇴를 할 수 있습니다. 단, 회사는 회원이 서비스를 계속 이용하는 경우, 약관 변경에 대해 동의한 것으로 간주합니다.</li> 
		</ul>

		<h5>제4조 (관련 법령과의 관계)</h5>
		<ul class="list">
			<li class="normal">이 약관에 명시되어 있지 않거나 정하지 않은 사항은 「전기통신기본법」, 「전기통신사업법」, 기타 관계 법령의 규정과 일반적인 거래관행에 따릅니다.</li>
		</ul>

		<h5>제5조 (서비스의 제공 및 변경)</h5>
		<ul class="list">
			<li>① 회사가 제공하는 서비스는 다음과 같습니다.   
				<ul class="inner_list">
					<li>1. 회사에 대한 홍보 내용</li>
					<li>2. 회사가 판매하는 제품 안내</li>
					<li>3. 회사가 제공하는 각종 정보</li>
					<li>4. 통합 회원 이용 서비스
						<span>- 시승예약, 이벤트 참여</span>
						<span>- 차량 구매 및 보유 회원인 경우: 차량 정비 예약, 정비이력 조회, 정비예약, 긴급출동 등의 서비스 제공</span>
					</li>
				</ul>			
			</li>
			<li>② 회사는 수시로 기존 서비스의 전부 또는 일부 내용을 서비스의 향상 또는 회사 정책 변경 등을 이유로 필요 시 변경할 수 있습니다.</li>
			<li>③ 회사는 서비스의 변경, 중단으로 발생하는 문제 중 회사의 귀책사유가 없는 경우에 대해서는 어떠한 책임도 지지 않습니다.</li>
		</ul>

		<h5>제6조 (회원가입 및 정보변경)</h5>
		<ul class="list">
			<li>① 회사는 서비스 이용 및 운영에 필요한 최소한의 정보만을 수집합니다. 회원가입을 원하는 이용자는 회사가 제공하는 회원 가입신청양식에 다음 사항을 필수사항으로 기재하여야 하며, 그 외 사항은 관계 법령 및 개인정보처리방침의 내용을 따릅니다.
				<ul class="inner_list">
					<li>1. 이름</li>
					<li>2. 생년월일</li>
					<li>3. 휴대 전화번호</li>
					<li>4. E-mail</li>
					<li>5. 비밀번호</li>
				</ul>			
			</li>
			<li>② 만14세 미만의 개인은 회원가입이 제한됩니다.</li>
			<li>③ 회원가입을 원하는 이용자는 반드시 실명으로 회원가입을 하여야 하며, 실명이 아니거나 타인의 정보를 도용하여 회원으로 가입한 자는 서비스를 이용할 수 없으며, 관계 법령에 의해 처벌 받을 수 있습니다.</li>
			<li>④ 회원의 아이디는 이용자 1인 당 1개만 사용할 수 있습니다.</li>
		</ul>

		<h5>제7조 (신청의 승낙)</h5>
		<ul class="list">
			<li>① 회사는 이용자가 제6조에 따라 회원가입 신청을 할 경우 특별한 사정이 없는 한, 이를 승낙합니다. 다만, 다음 각 호 사유가 있는 경우 회원가입 신청에 대한 승낙을 거부할 수 있습니다.
				<ul class="inner_list">
					<li>1. 만 14세 미만의 이용자가 회원가입 신청을 하는 경우</li>
					<li>2. 이미 가입된 회원의 이메일과 동일한 이메일로 회원가입을 신청하는 경우 </li>
					<li>3. 제8조 제1항 제3호에 따라 재가입이 제한된 경우 </li>
					<li>4. 제8조 제2항에 기하여 회사가 이용계약을 해지한 이용자가 다시 회원가입을 신청하는 경우 </li>
					<li>5. 제8조 제2항에 기하여 회사가 이용계약을 해지하기 전에 회원으로부터 의견진술을 받는 등 이용계약 해지 여부를 판단하는 동안 해당 회원이 이용계약을 임의 해지하고 다시 회원가입을 신청하는 경우 </li>
					<li>6. 가입신청 시 기재해야 할 항목에 허위사실을 기재한 경우 </li>
					<li>7. 기타 이 약관에 위배되거나, 위법 또는 부당한 목적으로 회원가입을 신청한 경우 </li>
				</ul>
			</li>
			<li>② 회사는 다음 각 호 사유가 있는 경우, 회원가입 신청에 대한 승낙을 유보할 수 있습니다. 이 경우 회사는 이용자에게 승낙유보의 이유, 승낙에 필요한 추가 정보 요청 등 승낙유보와 관련된 사항을 Hej Volvo 내에 게시하거나, 이메일 전송 및 기타 방법으로 통지할 수 있습니다.  
				<ul class="inner_list">
					<li>1. 장비 및 설비상의 한계로 추가 회원가입이 어려운 경우 </li>
					<li>2. 회원가입 신청 절차와 관련하여 기술상 장애가 발생한 경우 </li>
					<li>3. 기타 회사가 회원가입 신청에 대한 승낙을 유보할 필요가 있다고 인정하는 경우 </li>
				</ul>
			</li>
		</ul>

		<h5>제8조 (회원탈퇴 및 자격 상실 등)</h5>
		<ul class="list">
			<li>① 회원은 언제든지 회사에 회원탈퇴를 볼보자동차코리아 고객센터를 통해 요청할 수 있으며, 회사는 즉시 이에 응하여야 합니다.   
				<ul class="inner_list">
					<li>1. 회원은 회원탈퇴를 위해서는 회사가 정하는 탈퇴 절차를 따라야 합니다. </li>
					<li>2. 제1호의 탈퇴 효력은 탈퇴 의사표시가 회사에 도달하고, 회사가 탈퇴 절차를 완료한 때에 발생합니다. </li>
					<li>3. 회원탈퇴를 한 이용자는 이 약관이 정하는 바에 따라 회원으로 재가입할 수 있습니다. 다만 회원이 중복참여가 제한된 이벤트에 중복 참여하기 위한 목적 등 부정한 목적으로 회원탈퇴 후 재가입을 신청하는 경우 회사는 재가입을 일정기간 동안(약 3개월) 제한할 수 있습니다. </li>
					<li>4. 회원탈퇴 후 회원정보가 파기된 이후에는 같은 이메일로 가입할 수 있습니다. </li>
				</ul>				
			</li>
			<li>② 회원이 다음 각호의 사유에 해당하는 경우, 회사는 회원 자격을 제한 및 정지시킬 수 있습니다. 
				<ul class="inner_list">
					<li>1. 가입 신청 시에 허위의 내용을 등록한 경우  </li>
					<li>2. 타인의 서비스 이용을 방해하거나 그 정보를 도용하는 등 서비스 운영 질서를 위협하는 경우</li>
					<li>3. 서비스 이용을 통하여 관계 법령 및 이 약관이 금지하거나, 공서양속에 반하는 행위를 하는 경우  </li>
				</ul>
			</li>
			<li>③ 회사가 회원자격을 상실시키는 경우 회원에게 이를 통지하고, 탈퇴 처리를 합니다. 단, 이 경우 회원에게 탈퇴 전에 소명할 기회를 부여합니다. </li>
			<li>④ 회사는 회원의 개인정보 보호를 위하여 Hej Volvo에 최종 로그인(log-in) 후 11개월간 로그인 기록이 없는 통합 회원에 대해 휴면 계정 처리에 대한 안내를 고지하고, 고지 일로부터 30일 내에 로그인(log-in)하지 않을 경우 개인정보를 분리하여 5년간 보관하며, 그 기간 동안 접속이 없을 경우 회원의 개인정보를 파기합니다. </li>
		</ul>

		<h5>제9조 (회원정보의 수집과 보호)</h5>
		<ul class="list">
			<li>① 회사는 「정보통신망 이용촉진 및 정보보호에 관한 법률」, 「개인정보 보호법」 등 관계 법령에 따라 회원의 개인정보를 처리할 수 있습니다. </li>
			<li>② 회사는 제1항에 따라 회원의 정보를 처리함에 있어서 회원 개인정보의 보호와 관리에 관한 개인정보처리방침을 정하고, 이에 따라 회원의 정보를 처리합니다.  </li>
			<li>③ 제2항의 개인정보처리방침은 회사의 웹 홈페이지, Hej Volvo 등을 통해 공개합니다. </li>
		</ul>

		<h5>제10조 (회원정보의 변경)</h5>
		<ul class="list">
			<li>① 회원은 회원가입 시 기재한 정보가 잘못되거나 변경되었을 경우 My Volvo 페이지를 통해 즉시 해당 사항을 수정할 수 있습니다. 다만, 아이디 및 이메일 정보는 수정할 수 없습니다. </li>
			<li>② 회원은 제1항의 수정사항과 관련해 회사가 요청하는 경우 즉시 수정사항에 관한 증빙자료를 제공해야 합니다. </li>
		</ul>

		<h5>제11조 (아이디 및 이메일 정보 등의 관리에 대한 의무)</h5>
		<ul class="list">
			<li>① 아이디 또는 이메일 및 비밀번호에 대한 관리 책임은 회원에게 있으며, 회원은 아이디, 이메일 및 비밀번호를 타인에게 양도, 대여할 수 없습니다. </li>
			<li>② 회사는 회사의 귀책사유 없이 아이디, 이메일 비밀번호의 유출, 양도, 대여로 인한 손실이나 손해가 발생한 경우에는 책임을 지지 않습니다. </li>
			<li>③ 회원이 아이디, 이메일 또는 비밀번호를 도난당하거나 제3자가 이를 사용하고 있음을 인지한 경우, 즉시 회사에 통보해야 하고 이에 대해 회사의 안내가 있는 경우에는 그에 따라야 합니다. </li>
		</ul>

		<h5>제12조 (이용자의 의무)</h5>
		<ul class="list">
			<li>① 이용자는 관계 법령, 이 약관의 규정, 이용안내 및 주의사항 등 회사가 통지하는 사항을 준수하여야 하며, 기타 회사의 업무에 방해되는 행위를 하여서는 아니됩니다.  </li> 
			<li>② 이용자는 회사의 사전 승낙없이 서비스를 이용하여 어떠한 영리행위도 할 수 없습니다.  </li> 
			<li>③ 회원은 본인의 개인정보에 대한 변경사항 발생 시 즉각 변경하여야 합니다. 단, 회원이 회원정보를 적시에 수정하지 않아 발생하는 불이익에 대한 책임은 회원에게 있습니다.  </li> 
			<li>④ 이용자는 서비스 이용과 관련하여 다음 각 호의 행위를 하지 않아야 하며, 다음 각 호의 행위를 함으로써 발생하는 모든 결과에 대한 책임은 당해 이용자에게 있습니다.
				<ul class="inner_list">
					<li>1. 다른 회원의 아이디(ID)를 부정하게 사용하는 행위  </li> 
					<li>2. 다른 회원의 이메일 주소를 취득하여 스팸메일을 발송하는 행위 </li> 
					<li>3. 범죄행위를 목적으로 하거나 기타 범죄행위와 관련된 행위 </li> 
					<li>4. 선량한 풍속, 기타 사회질서를 해하는 행위 </li> 
					<li>5. 타인의 명예를 훼손하거나 모욕하는 행위 </li> 
					<li>6. 타인의 지적재산권 등의 권리를 침해하는 행위 </li> 
					<li>7. 해킹행위 또는 컴퓨터 바이러스의 유포행위 </li> 
					<li>8. 타인의 의사에 반하여 광고성 정보 등 일정한 내용을 지속적으로 전송하는 행위 </li> 
					<li>9. 서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 일체의 행위 </li> 
					<li>10. 기타 관계 법령에 위배되는 행위 </li> 
					<li>11. 회사가 제공하는 서비스의 내용을 변경하는 행위 </li> 
				</ul>
			</li> 
		</ul>

		<h5>제13조 (저작권의 귀속 및 이용제한)</h5>
		<ul class="list">
			<li>① 회사가 작성한 저작물에 대한 저작권 및 기타 지적재산권은 회사에 귀속됩니다. </li>
			<li>② 이용자는 서비스를 이용함으로써 얻은 정보를 회사의 사전 승낙없이 복제, 송신, 출판, 배포, 방송 기타 방법에 의하여 영리목적으로 이용하거나 제 3자에게 이용하게 하여서는 안됩니다.  </li>
		</ul>

		<h5>제14조 (양도 금지)</h5>
		<ul class="list">
			<li>회원은 서비스의 이용권한, 기타 이용계약상 지위를 타인에게 양도, 증여할 수 없으며, 이를 담보로 제공할 수 없습니다. </li>
		</ul>

		<h5>제15조 (손해배상)</h5>
		<ul class="list">
			<li>① 본 서비스는 이용자의 편의를 위하여 제공하는 무료 서비스로 회사는 본 서비스 이용과 관련하여 발생한 회사의 귀책사유 없는 어떠한 손해에 대하여도 책임을 지지 않습니다.</li>
			<li>② 회사 또는 회사의 피고용인, 대리인, 기타 도급 및 위임 등으로 회사를 대신해 이용계약을 이행하는 자의 책임 있는 사유로 이용계약의 이행과 관련해 회원에게 손해가 발생한 경우, 회사는 회원에게 발생한 손해를 배상할 책임이 있습니다. </li>
			<li>③ 회원 또는 회원의 피고용인, 대리인, 기타 도급 및 위임 등으로 회원을 대신해 이용계약을 이행하는 자의 책임 있는 사유로 이용계약의 이행과 관련해 회사에게 손해가 발생한 경우, 회원은 회사에게 발생한 손해를 배상할 책임이 있습니다. </li>
		</ul>

		<h5>제16조 (면책 사항)</h5>
		<ul class="list">
			<li>① 회사는 천재지변 또는 이에 준하는 불가항력, 정보통신설비의 보수점검, 교체 또는 고장, 통신의 두절 등 회사의 귀책사유 없이 일시적 또는 종국적으로 서비스를 제공할 수 없는 경우, 이로 인해 이용자에게 발생한 손해에 대한 책임을 지지 않습니다. </li>
			<li>② 회사는 이용자의 귀책사유로 인한 서비스 이용의 장애에 대해 책임을 지지 않습니다. </li>
		</ul>

		<h5>제17조 (분쟁의 해결)</h5>
		<ul class="list">
			<li>① 회사와 이용자는 서비스와 관련하여 발생한 분쟁을 원만하게 해결하기 위하여 필요한 모든 노력을 다하여야 합니다. </li>
			<li>② 서비스 이용과 관련하여 회사와 이용자 사이에 분쟁이 발생한 경우, 쌍방간에 분쟁의 해결을 위해 성실히 협의하고, 그럼에도 합의할 수 없는 경우 소송을 통하여 해결하도록 합니다. </li>
			<li>③ 제1, 2항의 규정에도 불구하고, 동 분쟁으로 인하여 소송이 제기될 경우 동 소송은 서울지방법원 또는 이용자 주소지 법원을 관할로 합니다.</li>
		</ul>

		<h5>제18조 (이용자의 민원 처리)</h5>
		<ul class="list">
			<li>① 회사는 고객지원센터(1588-1777) 등을 통해 이용자의 서비스 이용 시 불편사항이나 민원사항을 접수 및 처리합니다.</li>
			<li>② 회사는 제1항에 따라 이용자가 제기한 불만사항 및 의견이 정당하다고 판단되는 경우 이를 신속하게 처리하며, 특별한 사정이 없는 한 10영업일 이내에 조사결과와 처리방안을 통보합니다. 단, 회사는 이용자가 제기한 불만사항 및 의견이 정당하지 않다고 판단하는 경우 3영업일 이내에 그 해당 사실 및 사유를 통보합니다. </li>
			<li class="normal">이 약관은 2020년 07월 06일부터 시행됩니다.</li>
		</ul>

    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>