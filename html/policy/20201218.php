<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "policy";
    $FOOTER_CODE = "cscenter";
    $TITLE = "개인정보처리방침";

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
    
    <div class="visual">
       <img src="/images/policy/visual.png">
    </div>
    <div class="box-select">
        <select id="selectPolicy">
            <option value="20201218">2020.12.18</option>
            <option value="20210707">2021.07.07</option>
            <option value="20210601">2021.06.01</option>
            <option value="20210521">2021.05.21</option>
            <option value="20210125">2021.01.25</option>
            <option value="20200922">2020.09.22</option>
            <option value="20200805">2020.08.05</option>
            <option value="20200706">2020.07.06</option>
        </select>
    </div>
    <div class="container" id="policy">
		<div class="con_ti">(주)볼보자동차코리아 개인정보처리방침</div>
		<p class="normal">본 개인정보처리방침은 ㈜볼보자동차코리아(이하 “회사”)가 운영하는 모든 온∙오프라인 서비스를 이용하는 고객의 개인정보와 관련하여 회사의 개인정보 처리 및 보안에 관하여 규정합니다. 회사는 고객 개인의 사생활에 관련된 정보를 적극적으로 보호하고 불법적인 정보 유출을 방지하고자 최선을 다하고 있습니다.</p>
		
		<h5>1. 총칙</h5>
		<ul class="list">
			<li class="normal">본 개인정보처리방침은 「개인정보 보호법」(이하 “개인정보보호법”)과 「정보통신망 이용촉진 및 정보보호 등에 관한 법률」(이하 “정보통신망법”) 등 모든 관련 법령, 지침 및 당사 내부 운영방침의 변경에 따라 개정될 수 있으며, 개정 시 관련 법령이 정하는 방법에 따라 고지합니다.</li>
		</ul>

		<h5>2. 수집하는 개인정보 항목</h5>
		<ul class="list">
			<li>(1) 필수항목 : 성명(명의자/실운전자), 주민등록번호(외국인의 경우 등록번호 또는 여권번호), 생년월일, 성별, 국적, 주소(주민등록상 자택, 직장), 이메일 주소, 연락처(휴대폰, 자택, 직장), 서비스 센터 및 고객 센터 이용에 대한 이력, 차량 구매 및 서비스에 대한 만족도 또는 불만 관련 정보 및 이력, 차량 구입 상담내역, 금융상품 정보(할부, 리스, 현금 여부 및 금융사 정보), 구매고객 중 만 14세 미만 아동의 법정 대리인 정보, 구매차량 정보(구입차종, 차량번호, 구매일자, 담당딜러, 차량 최초 등록일, 등록증 발행일, 차대번호, 차량 등록자명)
				<ul class="inner_list">
					<li>1. 법인 : 상호/개인 사업자번호, 사업장 주소 및 상기 기본 정보</li>
					<li>2. 외교관 : 공관, 직위, 등록증 유효기간 및 상기 기본 정보</li>
					<li>3. 시승/브로셔 신청고객 : 관심모델 및 상기 기본 정보(해당 시)</li>
					<li>4. 잠재고객 : 보유 차량정보, 관심모델 및 상기 기본 정보(해당 시)</li>
				</ul>
			</li>
			<li>(2) 선택항목 : 회사주소, 회사전화번호, 직업, 회사명, 부서, 직급, 취미, 결혼 여부, 기념일 정보(결혼 기념일, 차량 출고일), 차량 보유 수, 보유 차량정보, 관심사, 선호미티어, 관심모델, 차량 구입시기, 뉴스레터 수신여부, 자주 보는 자동차 잡지, 가입 경로</li>
			<li>※ 고유식별정보는 관련 법령이 허용한 범위 내에서 업무적 처리 목적을 위해서만 수집 및 이용합니다.</li>
			<li>※ 고유식별정보는 전산상 마스킹 처리를 하여 관리 되며, 별도의 목적으로 이용되지 않습니다.</li>
			<li>※ 주민등록번호의 경우 부가가치세법 제32조에 따라 세금계산서 발행을 위하여 수집되며, 목적 달성 후 즉시 폐기됩니다.</li>
		</ul>

		<h5>3. 개인정보의 수집 및 이용 목적, 수집방법</h5>
		<ul class="list">
			<li>(1) 회사는 고객이 회사의 차량을 구매하거나 차량 관련 서비스를 이용하는데 있어 고객에게 각종 편의를 제공하기 위해 필요한 최소한의 정보를 수집하고 있습니다.</li>
			<li>(2) 회사는 다음의 목적으로 고객의 개인정보를 수집∙이용합니다.
				<ul class="inner_list">
					<li>1. 자동차 매매계약 상 의무이행을 위한 재화∙용역의 제공
						<span>가. 자동차 정비서비스, 긴급출동서비스 및 제작결함 시정 서비스 제공을 위한 본인 확인, 분쟁조정을 위한 기록보존, 불만처리 등 민원처리, 고지사항 전달, 탁송, 차량등록대행, 하이패스 등록, 자동차 보험 등록 등</span>
						<span>나. 서비스 제공계약의 성립과 유지 종료를 위한 본인 식별, 본인의사 확인, 고객에 대한 고지 등</span>
					</li>
					<li>2. 마케팅 및 광고 활용
						<span>가. 신차 및 이벤트 정보 안내, 매거진 안내, 이벤트 경품 배송, 행사 진행, 인구통계학적 특성에 따른 서비스 제공 및 광고 게재를 위한 고객별 통계분석자료 활용, 접속의 빈도 파악, 시장조사, 시승제공 등</span>
					</li>
					<li>3. 고객관리
						<span>가. 서비스에 대한 만족도 조사, 차량관리 안내, 구매고객 서비스의 본인확인, 회원제 서비스의 본인확인, 다양한 고객관리 프로그램 진행 등</span>
					</li>
					<li>4. 신규 상품 개발 및 서비스 확충
						<span>가. 효율적이고 합리적인 신규 상품 및 서비스 개발∙제공 등</span>
					</li>
				</ul>
			</li>
			<li>(3) 회사는 다음 각 호의 모든 사항을 고객에게 알리고 동의를 받으며, 다음 각 호의 어느 하나의 사항을 변경하려는 경우 별도 동의를 받습니다.
				<ul class="inner_list">
					<li>1. 개인정보의 수집∙이용 목적</li>
					<li>2. 수집하는 개인정보의 항목</li>
					<li>3. 개인정보의 보유∙이용 기간</li>
					<li>4. 동의를 거부할 권리가 있다는 사실 및 동의 거부에 따른 불이익이 있는 경우에는 그 불이익의 내용</li>
				</ul>
			</li>
			<li>(4) 회사는 다음 각 호의 어느 하나에 해당하는 경우에는 위 제3항에 따른 동의 없이 고객의 개인정보를 수집∙이용할 수 있습니다.
				<ul class="inner_list">
					<li>1. 차량판매 계약을 이행하기 위하여 필요한 개인정보로서 경제적∙기술적인 사유로 통상적인 동의를 받는 것이 뚜렷하게 곤란한 경우</li>
					<li>2. 차랑 판매 및 관련 서비스의 제공에 따른 요금정산을 위하여 필요한 경우</li>
					<li>3. 개인정보 보호법, 정보통신망법 또는 다른 법률에 특별한 규정이 있는 경우</li>
					<li>4. 당초 수집목적과 합리적으로 관련된 범위에서 이용(단, 정보주체에게 불이익이 발생하는지 여부, 암호화 등 안전성 확보에 필요한 조치를 하였는지 여부 등을 고려하여 개인정보 보호법령이 허용하는 범위 내에서 이용)</li>
				</ul>
			</li>
			<li>(5) 회사는 사상, 신념, 과거의 병력(病歷) 등 개인의 권리∙이익이나 사생활을 뚜렷하게 침해할 우려가 있는 개인정보를 수집하지 않습니다. 다만, 고객의 동의를 받거나 다른 법률에 따라 특별히 허용된 경우에는 해당 개인정보를 수집할 수 있습니다.</li>
			<li>(6) 회사는 다음의 방법을 통해 개인정보를 수집합니다.
				<ul class="inner_list">
					<li>1. 홈페이지, 차량매매계약서, 서면양식, 팩스, 전화, 상담게시판, 이메일, 시승행사 설문조사, 이벤트 응모, 제휴마케팅을 통한 제휴사로부터의 제공, 생성정보 수집 툴(ex. 쿠키)을 통한 수집, 세일즈 컨설턴트의 영업활동을 통한 수집 등</li>
					<li>2. 협력회사 및 딜러사의 제공</li>
				</ul>			
			</li>
		</ul>

		<h5>4. 개인정보 활용에 대한 동의</h5>
		<ul class="list">
			<li>(1) 회사는 고객의 개인정보 활용 시 본 개인정보처리방침 제3조 제3항 각 호의 항목을 고객에게 정확하게 고지하고 이에 대해 동의를 받고 있습니다.</li>
			<li>(2) 회사는 제1항에 따라 다음 각 호의 방법으로 동의를 얻습니다.
                <ul class="inner_list">
					<li>1. 동의 내용이 기재된 서면을 고객에게 직접 교부하거나, 우편 또는 모사전송을 통하여 전달하고 고객이 동의 내용에 대하여 서명날인 후 제출하도록 하는 방법</li>
					<li>2. 동의 내용이 기재된 전자우편을 발송하여 고객으로부터 동의의 의사표시가 기재된 전자우편을 전송받는 방법</li>
					<li>3. 전화를 통하여 동의 내용을 고객에게 알리고 동의를 얻거나 인터넷주소 등 동의 내용을 확인할 수 있는 방법을 안내하고 재차 전화 통화를 통하여 동의를 얻는 방법</li>
					<li>4. 동의 내용이 기재된 응답형 문자(MMS)메시지를 발송하여 고객으로부터 동의의 의사표시를 전송받는 방법</li>
					<li>5. 차량 구매 계약 시 작성되는 개인정보 수집 및 활용 동의서를 징구하는 방법</li>
					<li>6. 서비스 이용 시 작성되는 개인정보 수집 및 활용 동의서를 징구하는 방법</li>
				</ul>
            </li>
		</ul>

		<h5>5. 개인정보의 보유∙이용기간</h5>
		<ul class="list">
			<li>(1) 고객의 개인정보는 다음과 같이 개인정보의 수집목적 또는 제공받은 목적을 위하여 필요한 기간 동안만 보유∙이용되며, 해당 목적 달성 시 제6조에서 정한 절차 및 방법에 따라 지체 없이 파기됩니다.
				<ul class="inner_list">
					<li>1. 상기 개인정보의 필수항목 및 선택항목 :
						<span>가.고객 서비스 제공에 필요한 기간 동안</span>
						<span>나.차량 보유기간 동안 (단, 차량 매각 후 탈퇴 요청 시 파기)</span>
					</li>
					<li>2. 회원가입 정보의 경우 : 회원가입 철회 및 삭제 요청 시까지</li>
					<li>3. 고객 불만 또는 분쟁처리에 관한 기록 : 회사 내부규정에 따라 10년 동안</li>
				</ul>			
			</li>
			<li>(2) 제1항의 규정에도 불구하고 이하를 포함한 관련 볍령에 의하여 거래 관련 권리∙의무 관계의 확인 등을 이유로 일정기간 보유하여야 할 필요가 있을 경우 해당 법령에 따라 보관됩니다.
				<ul class="inner_list">
					<li>1. 회사의 상업장부와 영업에 관한 중요서류 및 전표 등에 관련된 정보 및 모든 거래에 관한 장부 및 증빙 서류와 관련된 정보 : 10년 (중요서류) / 5년 (전표)</li>
					<li>2. 계약 또는 청약철회 등에 관한 기록, 대금결제 및 재화 등의 공급에 관한 기록 : 5년</li>
					<li>3. 장부 및 교부한 세금계산서 또는 영수증 : 5년</li>
					<li>4. 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년</li>
					<li>5. 컴퓨터 통신 또는 인터넷의 로그기록자료 : 3개월</li>
				</ul>				
			</li>
		</ul>

		<h5>6. 개인정보의 파기절차 및 방법</h5>
		<ul class="list">
			<li>(1) 회사는 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기하는 것을 원칙으로 하고 있으며, 그 절차 및 방법은 아래와 같습니다.
				<ul class="inner_list">
					<li>1. 파기절차 : 회사는 수집된 고객 개인정보의 목적이 달성 시 회사 내부 정보보호 절차에 의하여 파기합니다. 수집된 정보는 관련 법령 및 고객의 동의에 의한 경우 외에는 다른 목적으로 이용되지 않습니다.</li>
					<li>2. 파기방법 :
						<span>가. 종이에 출력된 개인정보는 분쇄기로 분쇄하거나 소각합니다.</span>
						<span>나. 전자문서의 형식은 복구∙재생이 불가하도록 기술적 방법을 사용하여 파기합니다.</span>
					</li>
				</ul>			
			</li>
		</ul>

        <h5>7. 고객 및 법정대리인의 권리와 그 행사방법</h5>
		<ul class="list">
			<li>(1) 고객 및 만 14세 미만 아동의 법정대리인은 언제든지 회사에 등록되어 있는 고객 본인 또는 당해 만 14세 미만 아동의 개인정보 열람 및 수정을 요청하거나 회원가입 해지를 요청할 수 있습니다.</li>
			<li>(2) 고객 혹은 만 14세 미만 아동의 법정대리인이 해당 아동의 개인정보 조회, 수정을 위해서는 ‘개인정보변경’(또는 ‘회원정보수정’ 등)을, 회원가입 해지(수집이용 동의철회)를 위해서는 “회원탈퇴”를 클릭하여 본인 확인 절차를 거치신 후 직접 조회, 수정 또는 해지가 가능합니다. 혹은 개인정보보호책임자에게 서면, 전화 또는 이메일로 연락하시면 지체 없이 조치하겠습니다.</li>
			<li>(3) 회사는 고객 및 만 14세 미만 아동의 법정대리인이 개인정보의 오류에 대한 정정을 요청하신 경우에는 정정을 완료하기 전까지 당해 개인정보를 이용 또는 제공하지 않습니다. 또한 잘못된 개인정보를 제3자에게 이미 제공한 경우에는 정정 처리결과를 제3자에게 지체 없이 통지하여 정정이 이루어지도록 하겠습니다.</li>
			<li>(4) 회사는 고객 혹은 만 14세 미만 아동의 법정대리인의 동의철회 또는 회원탈퇴 시 당해 개인정보를 제5조에 명시된 바에 따라 처리하고 그 외의 용도로 열람 또는 이용할 수 없도록 처리하고 있습니다.</li>
		</ul>

		<h5>8. 개인정보의 제3자 제공</h5>
		<ul class="list">
			<li>(1) 회사는 다음 각 호의 모든 사항을 고객에게 미리 알리고 동의를 받은 후 이를 제3자에게 제공할 수 있습니다. 다음 각 호의 어느 하나의 사항이 변경되는 경우에도 또한 같습니다.
                <ul class="inner_list">
					<li>1. 개인정보를 제공받는 자</li>
					<li>2. 개인정보를 제공받는 자의 개인정보 이용 목적</li>
					<li>3. 제공하는 개인정보의 항목</li>
					<li>4. 개인정보를 제공받는 자의 개인정보 보유 및 이용 기간</li>
				</ul>
            </li>
			<li>(2) 회사는 다른 법률에 특별한 규정이 있는 경우 제1항에 따른 동의 없이 고객의 개인정보를 제3자에게 제공할 수 있습니다.</li>
			<li>(3) 2020. 07. 06. 현재 회사가 개인정보를 제공하는 자의 성명, 제공받는 자의 이용 목적 및 제공하는 개인정보의 항목은 아래와 같습니다.
                <div class="table_wrap">
					<table class="table_wide" style="min-width:752px">
						<tr>
							<col width="25%"/>
							<col width="25%"/>
							<col width="25%"/>
							<col width="25%"/>
						</tr>
						<tr>
							<th>제공대상</th>
							<th>제공정보의 이용목적</th>
							<th>제공항목</th>
							<th>보유 및 이용기간</th>
						</tr>
						<tr>
							<td>볼보자동차 딜러 네트워크(볼보자동차코리아 홈페이지상의 쇼룸과 서비스 네트워크) www.volvocars.co.kr</td>
							<td>서비스의 제공 및 상담 <br>정비이력(정비 내용, 주행거리, 입고 및 출고일자)에 근거한 정확한 서비스 제공 <br>*평생부품보증의 대상 확인</td>
							<td>하기 개인정보 및 차량관계 정보 <br>성명(명의자, 실운전자), 연락처(휴대폰, 자택, 직장), 이메일 주소, 주소(주민등록상 자택, 직장) <br>차량 정보(차대번호, 차량번호, 모델, 차량최초등록일, 등록증발행일), 정비이력(정비 내용, 주행거리, 입고 및 출고 일자)</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 / 본인의 요청 시 삭제 (단, 다른 법률에 규정이 있는 경우 그에 따름) <br>*구매고객: 차량보유기간(차량 매각 시 탈퇴 요청 후 삭제)  <br>*잠재고객 : 3년 (본인 삭제요청 시 본인 확인 후 삭제)</td>
						</tr>
						<tr>
							<td>㈜볼보자동차코리아와 업무 계약 관계에 있는 대행사, ㈜볼보자동차코리아의 공식 딜러사 및 딜러사와 업무 계약 관계에 있는 대행사</td>
							<td>차량 구매 고객 이벤트, 캠페인 참여 고객 대상 서비스 제공 및 기타 마케팅 활용, 기타 VIP 마케팅 활동, ㈜볼보자동차코리아 월간e-뉴스레터 발송, 새로운 이벤트 안내, 기타각종마케팅 활동(로열티 프로그램 등 홍보 및 판촉활동), 시승안내 (시승신청 시)</td>
							<td>성명, 휴대전화번호, 이메일, 생년월일, 성별, 선호차종 (시승 신청 시), 보유차종</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
						<tr>
							<td>국세청</td>
							<td>세법에 의한 신고(부가가치세법 제32조에 따름) <br>제세공과금 대납 내역</td>
							<td>주민등록번호, 성명, 공급받는 자의 주소, 공급가액과 부가가치세액 등</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
                        <tr>
							<td>국토교통부 및 산하기관, 환경부 및 산하기관</td>
							<td>결함확인 검사 및 결함보고, 서비스이행</td>
							<td>성명, 상호, 연락처, 주소 우편번호, 차량번호, 차대번호, 차종, 연식, 등록일자 정비이력 및 내역</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
						<tr>
							<td>한국소비자원 및 위탁단체(소비자단체)</td>
							<td>소비자 상담 및 구제</td>
							<td>이름, 주소, 연락처, 차량정보, 차량정비이력</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
                        <tr>
							<td>현대해상화재보험㈜+TWG Korea</td>
							<td>연장 보증 서비스 편의 제공</td>
							<td>차대번호, 차량번호, 차종, 연식, 등록일자, 차량수리내역, 고객명, 고객 연락처</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
                        <tr>
							<td>㈜신한카드</td>
							<td>공동 파이넨셜 프로모션진행</td>
							<td>성명, 차대번호, 금융정보(할부, 리스, 현금 여부 및 금융사 정보)</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
						<tr>
							<td>메리츠화재, 한화손해보험, 롯데손해보험, 그린손해보험, 삼성화재해상보험, 흥국화재보험, 동부화재해상보험, LIG손해보험, AXA손해보험, 현대하이카다이렉트자동차보험, 더케이손해보험, 에르고다음다이렉트손해보험, ACE American Insurance Company, 버스공제조합, 화물공제조합, 택시공제조합, 개인택시공제조합 등</td>
							<td>사고처리를 위한 보험회사 제출용</td>
							<td>성명, 주소, 핸드폰번호, 전화번호, 차량번호, 차대번호, 차명, 차종, 등록일자, 차량연식, 주행거리, 수리내역, 수리착수일자, 수리완료일자 등 보험수리를 위해 요청되는 정보</td>
							<td>개인정보 수집 및 활용의 목적 달성 시까지 <br>고객의 삭제 요청 시까지</td>
						</tr>
					</table>
				</div>
            </li>
            <li>(4) 고객이 동의하신 개인정보 제3자 제공은 제7조의 동의철회 방법에 따라 언제든지 동의철회가 가능하며, 기타 개인정보 제3자 제공에 대한 변동사항이 있을 경우 별도 동의를 받습니다.</li>
            <li>(5) 회사의 권리와 의무가 완전히 승계∙이전되는 경우 반드시 사전에 정당한 사유와 절차에 대해 상세하게 고지할 것이며 고객이 개인정보 이전에 대하여 동의 철회를 할 수 있는 선택권을 부여합니다.</li>
		</ul>
        
        <h5>9. 개인정보의 국외이전</h5>
		<ul class="list">
			<li class="normal">회사는 볼보자동차 본사 주관의 고객만족도 조사 및 사고 처리, 고객 관리를 위하여 다음의 정보를 제공합니다.
				<div class="table_wrap" >
					<table class="table_wide" style="min-width:1190px;">
						<tr>
							<col width="16.66%"/>
							<col width="16.66%"/>
							<col width="16.66%"/>
							<col width="16.66%"/>
							<col width="16.66%"/>
							<col width="16.66%"/>
						</tr>
						<tr>
							<th>제공대상</th>
							<th>이용목적</th>
							<th>이전방법</th>
							<th>제공항목</th>
							<th>정보보호책임자</th>
							<th>보유 및 이용기간</th>
						</tr>
						<tr>
							<td rowspan="2">Maritz (영국 본사의 고객만족도 조사 전용 웹사이트, 해외)</td>
							<td>서비스 고객 만족도의 조사</td>
							<td rowspan="2">영국 메리츠 본사의 웹사이트상에 업로드</td>
							<td>고객 성명 / 고객 성별 /  고객 주소 / 차종 / 차량번호 / 차대번호 / 이 메일 주소 / 핸드폰 번호 / 서비스센터 방문 일자/ 딜러명 / 모델년도</td>
							<td rowspan="2">
                                vcssurvey@maritzcx.com<br>
								+49 (0) 40 369 833 0</td>
							<td rowspan="2">개인정보 수집 및 활용의 목적 달성 시까지</td>
						</tr>
						<tr>
							<td>세일즈 고객 만족도의 조사</td>
							<td>고객 성명 / 고객 성별 / 차종(엔진 표기) / 차량번호 / 차대번호 / 이메일 주소 / 핸드폰 번호 / 출고일자(Delivery Date) / 신차등록 일자/ 딜러명 / 모델년도</td>
						</tr>
                        <tr>
							<td>ACE American Insurance Company</td>
							<td>사고처리를 위한 보험회사 제출용</td>
							<td></td>
							<td>성명, 주소, 핸드폰번호, 전화번호, 차량번호, 차대번호, 차명, 차종, 등록일자, 차량연식, 주행거리, 수리내역, 수리착수일자, 수리완료일자 등 보험수리를 위해 요청되는 정보</td>
							<td>
                                NAPrivacyOffice@chubb.com<br>
								+ 1-833-324-9798</td>
                            </td>
                            <td>처리 목적 달성 시까지 <br>차량 보유 시까지 또는 차량 매각 후 고객의 동의 철회 요청 시까지</td>
						</tr>
                        <tr>
							<td>Salesforce.com Inc.</td>
							<td>구매/가망 고객 관리 </td>
							<td>세일즈포스 시스템상에 데이터 업로드 </td>
							<td>성명, 주소, 핸드폰번호, 전화번호, 이메일주소, 차량번호, 차대번호, 차명, 차종, 출고일자, 계약일자 등 차량 구매 시 요청되는 정보 </td>
							<td>
                                Salesforce Data Protection <br>
                                Officer privacy@salesforce.com <br>
								+ 1-844-287-7147</td>
                            </td>
                            <td>개인정보 수집 및 활용의 목적 달성 시까지</td>
						</tr>
					</table>
				</div>
			</li>
		</ul>

        <h5>10. 개인정보의 처리위탁</h5>
		<ul class="list">
			<li>(1) 회사는 차량 판매 또는 서비스 향상을 위해 고객 개인정보를 외부에 수집∙보관∙처리∙이용∙제공∙관리∙파기 등(이하 “처리”)을 할 수 있도록 업무를 위탁(이하 “개인정보처리위탁”)하여 처리하고 있으며, 관계 법령에 따라 개인정보 위탁 시 개인정보가 안전하게 관리될 수 있도록 최선을 다하고 있습니다. 또한 취급을 위탁하는 정보는 당해 목적을 달성하기 위하여 필요한 최소한의 정보에 국한되며 목적달성 완료 시 즉시 파기됩니다.</li>
			<li>(2) 회사는 제3자에게 개인정보 취급을 위탁하는 경우 다음 각 호의 사항을 본 개인정보처리방침에 공개합니다. 다음 각 호의 어느 하나의 사항이 변경되는 경우에도 이를 반영하여 공개합니다.
				<ul class="inner_list">
					<li>1. 개인정보 처리위탁을 받는 자(이하 “수탁자”)</li>
					<li>2. 개인정보 처리위탁을 하는 업무의 내용</li>
				</ul>
			</li>
			<li>(3) 회사로부터 개인정보처리위탁을 받은 수탁자 및 개인정보처리위탁을 하는 업무의 내용은 아래와 같습니다
                <div class="table_wrap">
					<table class="table_wide" style="min-width:800px">
						<tr>
							<col width="30%"/>
							<col width="70%"/>
						</tr>
						<tr>
							<th>수탁업체</th>
							<th>업무의 내용 및 범위</th>
						</tr>
						<tr>
							<td>㈜오토브레인<br>삼성화재서비스손해사정㈜<br>㈜한국코퍼레이션<br>삼성화재긴급출동협력업체</td>
							<td>고객 콜센터 대행 : 서비스 이용관련 고객 상담업무, 아웃바운드 콜, 차량관련 문의 고객 상담업무, 딜러사 안내, 고객만족도, 서비스 만족도 조사, 긴급출동서비스</td>
						</tr>
						<tr>
							<td>주식회사 소통하는 나무</td>
							<td>시승, 출시, 전시장 이벤트 등 다양한 고객 행사 진행</td>
						</tr>
						<tr>
							<td>㈜블루인마케팅서비스</td>
							<td>시승, 출시, 전시장 이벤트 등 다양한 고객 행사 진행</td>
						</tr>
						<tr>
							<td>㈜프레인글로벌</td>
							<td>온라인 캠페인 진행, 시승, 출시, 전시장 이벤트 등 다양한 고객 행사 진행</td>
						</tr>
						<tr>
							<td>㈜마이테이블</td>
							<td>온라인 캠페인 진행, 시승 이벤트, 고객 설문 작업, eDM 발송</td>
						</tr>
						<tr>
							<td>그레이월드와이드 코리아㈜</td>
							<td>광고 및 캠페인 진행</td>
						</tr>
						<tr>
							<td>㈜컴나래소프트</td>
							<td>전산 시스템 운영 및 유지보수, SMS 일괄 발송</td>
						</tr>
						<tr>
							<td>엘지유플러스, ㈜다우기술, GS 엠비즈, 뿌리오</td>
							<td>SMS 일괄 발송</td>
						</tr>
						<tr>
							<td>한국신용평가정보㈜</td>
							<td>본인 확인</td>
						</tr>
						<tr>
							<td>㈜칸타코리아</td>
							<td>고객만족도 & 신차 서비스 만족도 조사 대행 및 자료 분석</td>
						</tr>
						<tr>
							<td>㈜컨슈머인사이트</td>
							<td>고객 만족도 조사 대행 및 자료 분석</td>
						</tr>
						<tr>
							<td>신명사</td>
							<td>차량 등록 업무 대행</td>
						</tr>
						<tr>
							<td>㈜프리코우</td>
							<td>고객 데이터 분석, CRM 시스템 개발 및 운영</td>
						</tr>
						<tr>
							<td>프로젝트에이닷</td>
							<td>고객 데이터 분석 및 관리, CRM 캠페인 운영</td>
						</tr>
						<tr>
							<td>Capgemini (China) Co., Ltd</td>
							<td>세일즈포스 솔루션 설계 및 구현 지원 </td>
						</tr>
						<tr>
							<td>Salesforce.com Inc. </td>
							<td>고객 정보 저장 및 관리 </td>
						</tr>
						<tr>
							<td>Volvo Car Corporation</td>
							<td>세일즈포스 서비스 제공, 플랫폼 모범 사례 및 거버넌스 지원 </td>
						</tr>
						<tr>
							<td>Volvo Car Asia Pacific Investment Holding Co., Ltd.</td>
							<td>세일즈포스 서비스 구현을 위한 리전 별 지원 </td>
						</tr>

					</table>
				</div>
            </li>
			<li>(4) 회사가 개인정보의 처리를 위탁하는 경우에는 위탁계약 등을 통하여 개인정보 보호 관련 지시엄수, 개인정보에 관한 비밀유지, 제3자 제공의 금지 및 사고시의 책임부담, 위탁기간, 처리 종료 후의 개인정보의 반환 또는 파기 등을 명확히 규정하고 당해 계약내용을 서면 또는 전자적으로 보관하겠습니다.</li>
			<li>(5) 회사는 고객 개인정보 수집 및 위탁업무 처리목적에 반하여 무분별하게 고객 개인정보가 수탁자에게 제공되지 않도록 최대한 노력하겠습니다.</li>
		</ul>

        <h5>11.	만 14세 미만 아동의 개인정보 보호</h5>
		<ul class="list">
			<li>(1) 회사는 만 14세 미만 아동의 개인정보 수집 시 법정대리인의 동의를 구하고 있습니다.</li>
			<li>(2) 회사는 법정대리인의 성명과 주민등록번호 및 연락처 등을 입력하고 이하의 방법으로 동의를 확인합니다.
                <ul class="inner_list">
					<li>1. 동의 내용을 게재한 인터넷 사이트에 법정대리인이 동의 여부를 표시하도록 하고 회사가 그 동의 표시를 확인했음을 법정대리인의 휴대전화 문자메시지로 알리는 방법</li>
					<li>2. 동의 내용을 게재한 인터넷 사이트에 법정대리인이 동의 여부를 표시하도록 하고 법정대리인의 휴대전화 본인인증 등을 통해 본인 여부를 확인하는 방법</li>
					<li>3. 동의 내용이 적힌 서면을 법정대리인에게 직접 발급하거나, 우편 또는 팩스를 통하여 전달하고 법정대리인이 동의 내용에 대하여 서명날인 후 제출하도록 하는 방법</li>
					<li>4. 동의 내용이 적힌 전자우편을 발송하여 법정대리인으로부터 동의의 의사표시가 적힌 전자우편을 전송받는 방법</li>
					<li>5. 전화를 통하여 동의 내용을 법정대리인에게 알리고 동의를 얻거나 인터넷주소 등 동의 내용을 확인할 수 있는 방법을 안내하고 재차 전화 통화를 통하여 동의를 얻는 방법</li>
					<li>6. 그 밖에 제1호부터 제5호까지의 규정에 따른 방법에 준하는 방법으로 법정대리인에게 동의 내용을 알리고 동의의 의사표시를 확인하는 방법</li>
				</ul>
            </li>
		</ul>

        <h5>12. 개인정보 보호를 위한 기술적, 관리적 대책</h5>
		<ul class="list">
			<li>(1) 기술적 대책
				<ul class="inner_list">
					<li>1. 회사는 고객의 개인정보를 취급함에 있어 개인정보가 분실, 도난, 누출, 변조 또는 훼손되지 않도록 안전성 확보를 위하여 다음과 같은 기술적 대책을 강구하고 있습니다.
                        <span>가) 고객의 개인정보는 비밀번호에 의해 보호되며, 파일 및 전송 데이터를 암호화하여 일반사용자 및 관리자는 접근할 수 없습니다.</span>
                        <span>나) 회사는 방화벽(Fire Wall)과 네트워크 상의 개인정보를 암호화 된 터널을 통해 전송할 수 있는 가상사설망을 이용하고 있습니다.</span>
                        <span>다) 회사는 해킹 등 외부 침입에 대비하여 각 서버마다 침입차단시스템 및 취약점 분석 시스템 등을 이용하여 보안에 만전을 기하고 있습니다.</span>
                    </li>
				</ul>
			</li>
			<li>(2) 관리적 대책
				<ul class="inner_list">
					<li>1. 회사는 고객의 개인정보에 대한 접근권한을 최소한의 인원에게만 제한하여 부여하고 있습니다. 접근권한을 부여 받은 자는 다음과 같습니다.
						<span>가) 직접 고객을 상대로 마케팅 업무를 수행하는 자</span>
						<span>나) 개인정보보호책임자 및 담당자 등 개인정보관리업무를 수행하는 자</span>
						<span>다) 기타 업무상 개인정보의 취급이 불가피한 자</span>
					</li>
					<li>2. 회사는 개인정보를 취급하는 직원을 대상으로 새로운 보안 기술 습득 및 개인정보 보호 의무 등에 관해 정기적인 사내 교육 및 외부 위탁교육을 실시하고 있습니다.</li>
					<li>3. 개인정보 관련 취급자의 업무 인수인계는 철저하게 보안이 유지된 상태에서 이뤄지고 있으며 입사 및 퇴사 후 개인정보 사고에 대한 책임 귀속을 명확하게 관리하고 있습니다.</li>
					<li>4. 회사는 전산실 및 자료 보관실 등을 특별 보호구역으로 설정하여 출입을 통제하고 있습니다.</li>
					<li>5. 회사는 고객 개인의 과실이나 기본적인 인터넷의 특성에 따른 위험성 때문에 일어나는 일들에 대해 책임을 지지 않습니다. 단, 그 외 회사 내부 관리자의 과실이나 기술관리 상의 사고로 인해 개인정보의 상실, 유출, 변조, 훼손이 유발될 경우 회사는 즉각 고객에게 해당 사실을 알리고 적절한 대책과 보상을 강구할 것입니다.</li>
				</ul>
			</li>
		</ul>

        <h5>13. 개인정보 자동 수집 장치의 설치/운영 및 거부에 관한 사항</h5>
		<ul class="list">
			<li>(1) 회사는 개인화되고 맞춤화된 서비스를 제공하기 위해서 고객의 정보를 저장하고 수시로 불러오는 '쿠키(cookie)'를 사용합니다. 쿠키는 웹사이트를 운영하는데 이용되는 서버가 고객의 브라우저에게 보내는 아주 작은 텍스트 파일로 고객 컴퓨터의 하드디스크에 저장됩니다.</li>
			<li>(2) 쿠키의 사용 목적
				<ul class="inner_list">
					<li class="normal">고객이 방문한 회사의 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 이용자 규모 등을 파악하여 고객에게 최적화된 정보 제공을 위하여 사용합니다.</li>
				</ul>
			</li>
			<li>(3) 쿠키의 설치/운영 및 거부
				<ul class="inner_list">
					<li class="normal">고객은 쿠키 설치에 대한 선택권을 가지고 있습니다. 따라서 고객은 웹브라우저에서 옵션을 설정함으로써 모든 쿠키를 허용하거나, 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 거부할 수도 있습니다. 다만, 쿠키의 저장을 거부할 경우에는 로그인이 필요한 회사의 일부 서비스는 이용에 어려움이 있을 수 있습니다.</li>
				</ul>
			</li>
			<li>(4) 쿠키 설치 허용 여부를 지정하는 방법(Internet Explorer의 경우)
				<ul class="inner_list">
					<li>1. [도구] 메뉴에서 [인터넷 옵션]을 선택합니다.</li>
					<li>2. [개인정보 탭]을 클릭합니다.</li>
					<li>3. [설정] 중 [고급]에서 설정하시면 됩니다.</li>
				</ul>
			</li>
		</ul>

        <h5>14.	광고성 정보 전송</h5>
		<ul class="list">
			<li>(1) 회사는 고객의 명시적인 수신거부의사에 반하여 영리목적의 광고성 정보를 전송하지 않습니다.</li>
			<li>(2) 회사는 고객이 전자우편 전송에 대한 동의를 한 경우 전자우편의 제목란 및 본문란에 다음 사항과 같이 고객이 쉽게 알아 볼 수 있도록 표시합니다.
				<ul class="inner_list">
					<li>- 전자우편의 제목란 : (광고)라는 문구를 제목란에 표시하고, 전자우편 본문란에 주요 내용을 표시합니다.</li>
					<li>- 전자우편의 본문란 : 고객이 수신 거부의 의사표시를 할 수 있는 전송자의 명칭, 전자우편 주소, 전화번호 및 주소를 명시합니다. 고객이 수신 거부의 의사를 쉽게 표시할 수 있는 방법을 한글 및 영문으로 각각 명시하고 고객이 동의를 한 시기 및 내용을 명시합니다.</li>
				</ul>
			</li>
		</ul>

		<h5>15.	고객의 권리와 의무</h5>
		<ul class="list">
			<li>(1) 고객은 개인정보를 최신의 상태로 정확하게 입력하여 불의의 사고를 예방해 주시기 바랍니다. 고객이 입력한 부정확한 정보로 인해 발생하는 사고의 책임은 고객 자신에게 있으며 타인 정보의 도용 등 허위정보를 입력할 경우 서비스 이용이 정지될 수 있습니다.</li>
			<li>(2) 고객은 개인정보를 보호받을 권리와 함께 스스로를 보호하고 타인의 개인정보를 침해하지 않을 의무도 가지고 있습니다. 비밀번호를 포함한 개인정보가 유출되지 않도록 조심하시고 게시물을 포함한 타인의 개인정보를 훼손하지 않도록 유의해 주십시오. 만약 이 같은 책임을 다하지 못하고 타인의 개인정보 및 권리를 침해하는 경우에는 정보통신망법 등에 의해 처벌받을 수 있습니다.</li>
		</ul>

		<h5>16. 개인정보 보호책임자</h5>
		<ul class="list">
			<li>(1) 회사는 고객의 의견을 소중하게 생각하며, 고객은 의문사항으로부터 언제나 성실한 답변을 받을 권리가 있습니다.</li>
			<li>(2) 회사의 고객 개인정보 보호에 관련하여 의견이나 불만이 있으시면 아래 이메일 또는 전화를 통하여 문의 주시면 신속하고 정확하게 처리해 드리도록 하겠습니다.
				<ul class="inner_list">
					<li>개인정보 보호책임자 : 송경란 상무</li>
					<li>이메일 : help_korea@volvocars.com</li>
					<li>전화번호: 1588-1777</li>
				</ul>
				<ul class="inner_list">
					<li>개인정보 보호담당자 : 김영하 부장</li>
					<li>이메일 : help_korea@volvocars.com</li>
					<li>전화번호: 1588-1777</li>
				</ul>
				<ul class="inner_list">
					<li>전화상담 가능시간 : 오전 9시 ~ 오후 6시</li>
				</ul>
			</li>
			<li>(3) 회사 서비스 이용 중 피해 사항 신고는 ‘한국소비자보호원’에서 하실 수 있으며 기타 개인정보에 관한 상담이 필요한 경우에는 ‘개인정보침해신고센터’, ‘대검찰청 과학수사부 사이버수사과’, ‘경찰청' 등으로 문의하실 수 있습니다.
				<div class="table_wrap">
					<table class="table" style="min-width:752px">
                        <tr>
                            <th>기관</th>
                            <th>URL</th>
                            <th>전화번호</th>
                        </tr>
						<tr>
                            <td>한국소비자원</td>
                            <td>http://www.kca.go.kr</td>
                            <td>043-880-5500</td>
						</tr>
						<tr>
                            <td>개인정보침해신고센터</td>
                            <td>http://privacy.kisa.or.kr</td>
                            <td>118</td>
						</tr>
						<tr>
                            <td>대검찰청 과학수사부 사이버수사과</td>
                            <td>http://www.spo.go.kr</td>
                            <td>1301</td>
						</tr>
						<tr>
                            <td>경찰청</td>
                            <td>https://www.police.go.kr/</td>
                            <td>182</td>
						</tr>
						
					</table>
				</div>
			</li>
		</ul>

		<h5>17. 개정 시 고지</h5>
		<ul class="list">
			<li>(1) 회사는 본 개인정보처리방침을 포함한 기타 개인정보 보호에 대한 상세한 내용을 회사 전시장, AS센터 및 웹사이트, 어플리케이션을 통해 공개함으로써 고객이 언제나 용이하게 볼 수 있도록 조치하고 있습니다.</li>
			<li>(2) 관련 법령, 정부 정책 또는 보안기술의 변경에 따라 본 개인정보처리방침 내용의 추가∙삭제 및 수정이 있을 시에는 개정된 개인정보처리방침을 시행하기 최소 10일전부터 회사 전시장, AS센터 및 웹사이트, 어플리케이션을 통해 변경 이유 및 내용 등을 공지하도록 하겠습니다.</li>
			<li>(3) 본 개인정보처리방침의 내용은 수시로 변경될 수 있으므로 회사 전시장, AS센터 및 웹사이트, 어플리케이션을 통해 이를 확인하시기 바랍니다.</li>
			<li>본 개인정보처리방침은 2020년 8월 5일부터 시행합니다.</li>
			<li class="normal">공고일자 : 2020년 12월 18일<br>
                시행일자 : 2020년 12월 18일<br>
				최종 수정일자 : 2020년 12월 18일<br>
			</li>
		</ul>


    </div>
</div>

<script>
    $("#selectPolicy").on("change", function() {
        console.log(123);
        var val = $(this).val();
        location.replace(val + ".php");
    })
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>