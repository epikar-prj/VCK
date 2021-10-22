<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "cars";
    $FOOTER_CODE = "buy";
    $TITLE = "CARS";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./../style_model.css">
<script src="/js/slick.min.js"></script>
<script src="./../script.js"></script>
<div id="contents" class="xc40">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/cars/">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
   
    <div class="container">
		<div class="slide_wrap" style="width:100%; height:100%;">
			<div class="slide_main slide_01">
				<div class="cont_wrap">
					<div class="sti">가져야 할 것만 가질 것</div>
					<div class="ti">THE VOLVO XC40</div>
					<ul class="btn_wrap">
						<li class="btn"><a href="javascript:open_pop('spec');">Specifications <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
					</ul>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_02">
				<div class="cont_wrap">
					<div class="ti">INNOVATIVE. BY DESIGN</div>
					<div class="txt">XC40은 정통 도시형 SUV입니다. 높은 지상고와 큰 휠, 진정한 SUV의 비율이 강력한 자태를 뽐냅니다.<br>
						대담한 전면 그릴부터 아름답게 세공된 후미등까지 모든 것이 완벽한 볼보입니다.<br>
						독특한 스칸디나비아 스타일과 한눈에도 뚜렷한 도시적인 디자인은 도시 생활에 최적화된 자동차임을 보여 줍니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">A VERSATILE SPACE</div>
					<div class="txt">볼보자동차에서 모든 것은 사람에서 시작합니다.<br>
						고객의 요구를 보고 듣고, 이를 중심으로 차를 설계하는 이유가 여기 있습니다. 또한 이러한 이유 덕분에 XC40에는 원하는 물건을 최대한 쉽게 운반할 수 있는 실용적이고 다재다능한 기능이 가득합니다. 
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">BEAUTY IN DETAIL</div>
					<div class="txt">볼보 자동차의 디테일은 남다릅니다. XC40에 탈 때마다 받는 독특하고 특별한 느낌은 XC40 실내의 아주 작은 부분까지 스며 있는 생각, 노력, 장인 정신이 빚어낸 것입니다.<br>
						XC40의 실내는 보기에 멋있을 뿐 아니라 운전자의 기분까지 고려하여 디자인되었습니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
		</div>
    </div>

	<div class="pop_wrap" style="display:none;">
		<div class="pop_cont pop_spec" style="display:none;">
			<h4>SPECIFICATIONS</h4>
			<div class="pop_tab">
				<div class="sti">연료</div>
				<ul class="tab_list">
					<li class="ov" style="width:100%;"><a href="javascript:void(0);">가솔린</a></li>
				</ul>
			</div>
			<div class="spec_cont spec_cont_01">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">T4</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">4,425</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,875</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,640</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">1,740</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">형식</div>
							<div class="list_val">직렬4기통</div>
						</li>
						<li>
							<div class="list_name">구동방식</div>
							<div class="list_val">4륜구동</div>
						</li>
						<li>
							<div class="list_name">배기량<span>(cc)</span></div>
							<div class="list_val">1,969</div>
						</li>
						<li>
							<div class="list_name">최고 출력<span>(ps/rpm)</span></div>
							<div class="list_val">190/4,700</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">30.6/1,400~4,000</div>
						</li>
						<li>
							<div class="list_name">변속기</div>
							<div class="list_val">8단 자동 기어트로닉</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">WHEELS & TIRES</div>
					<ul>
						<li>
							<div class="list_name">휠/타이어<span>Momentum</span></div>
							<div class="list_val">18" | 235/55R</div>
						</li>
						<li>
							<div class="list_name">휠/타이어<span>Inscription</span></div>
							<div class="list_val">19" | 235/50R</div>
						</li>
						<li>
							<div class="list_name">휠/타이어<span>R-Design</span></div>
							<div class="list_val">19" | 235/50R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">8.5</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">10.3</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">9.2</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">12.2</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">4</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">168</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태, 운전방법, 차량적재, 정비상태 및 외기온도에 따라 실주행연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 사이트에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2019년 7월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_option" style="display:none;">
			<h4>OPTIONS</h4>		

			<div class="option_list_wrap">
				<ul class="option_list">
					<li class="th"><div class="ti">SAFETY</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="sti">인텔리세이프 어시스트</li>
					<li class="td"><div class="ti under">- 어댑티브 크루즈 컨트롤</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 파일럿 어시스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 거리 경보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 운전자 경보 제어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 차선 유지 보조</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 이탈 방지 및 보호</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 표시 정보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 시티 세이프티</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>

					<li class="sti">인텔리세이프 서라운드</li>
					<li class="td"><div class="ti under">- 사각지대 정보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 측후방 경보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 후방 추돌 경고</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>

					<li class="td"><div class="ti">지능형 운전자 정보 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사이드 에어백 및 커튼형 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">운전석 무릎 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 경추 보호 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SUPPORT & SECURITY SYSTEM</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">LED 헤드 램프</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">액티브 하이빔</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 램프 클리닝</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">코너링 램프</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전방 안개등</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">눈부심 방지 룸 미러 & 아웃사이드 미러</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 센서</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 파일럿</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 (후방) 카메라</div>
						<div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">360°서라운드 뷰 카메라</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">키리스 엔트리 & 리모트 태그</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">차일드 도어락</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">POWERTRAIN & CHASSIS</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">DRIVE-E 엔진</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">8단 자동 기어트로닉 변속기</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 램프 클리닝</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사륜구동</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">드라이브 모드 셀렉터</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">다이내믹 섀시</div>
						<div class="o"></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">스포츠 섀시</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">힐 스타트 어시스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">경사로 감속 주행 장치</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">EXTERIOR</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">모멘텀 스탠다드 그릴</div>
						<div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">인스크립션 그릴</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">R-DESIGN 그릴</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">R-DESIGN 글로시 블랙 미러캡</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스탠다드 데코 사이드 윈도</div>
						<div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">브라이트 데코 사이드 윈도</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">글로시 블랙 데코 사이드 윈도</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">브라이트 인티그레이티드 루프 레일</div>
						<div class="o"></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">글로시 블랙 인티그레이티드 루프 레일</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">듀얼 인티그레이티드 이그조스트 테일 파이프</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">INTERIOR & SEATS</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">9인치 터치 스크린 센터 디스플레이</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">3-스포크 유니 데코 인레이 레더 스티어링 휠	</div>
						<div class="o"></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">3-스포크 스포츠 레더 스티어링 휠 & 기어 시프트 패들</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스티어링 휠 히팅</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">크리스탈 기어 노브</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">알루미늄 데코 인레이</div>
						<div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">R-DESIGN 알루미늄 데코 인레이</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">드리프트 우드 데코 인레이</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">인테리어 일루미네이션 - 하이 레벨</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인테리어 일루미네이션 - 미드 레벨</div>
						<div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">블랙 루프 라이닝</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">레더 시트</div>
						<div class="o"></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">레더 시트 R-DESIGN</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 시트 및 운전석 메모리 기능</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 럼버 서포트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 쿠션 익스텐션</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 히팅 시트</div>
						<div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">메탈 트레드 플레이트</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">메탈 트레드 플레이트 R-DESIGN</div>
						<div></div><div></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CLIMATE</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">실내 공기 청정 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">클린 존 인테리어 패키지</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">2-구역 독립 온도 조절 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전면 윈드 스크린 워셔 노즐 히팅</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전동식 파노라마 선루프</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SENSUS SYSTEM</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">하이 퍼포먼스 사운드 시스템</div>
						<div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">Harman/Kardon 프리미엄 사운드 시스템</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">스마트폰 무선 충전</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스마트폰 인테그레이션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">USB 포트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">블루투스</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">내비게이션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">WHEELS & TIRES</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">18” 5-스포크 실버 알로이</div>
						<div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">19” 5-더블 스포크 매트 블랙 다이아몬드 컷 R-Design</div>
						<div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">19” 5-더블 스포크 블랙 다이아몬드 컷</div>
						<div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">타이어 공기압 모니터링 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CARGO AREA</div><div>T4 AWD<span>MMT</span></div><div>T4 AWD<span>INS</span></div><div>T4 AWD<span>R-Design</span></div>
					<li class="td"><div class="ti">핸즈프리 전동식 테일 게이트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">비상용 삼각대</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">12V 아웃렛</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">템퍼러리 스페어 타이어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<div class="caption">※ 표기된 사양은 사전 예고 없이 변경될 수 있으며 실제 차량과 차이가 있을 수 있습니다. 정확한 사양은 전시장으로 문의 바랍니다. (2019년 7월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">XC90</div>
			<ul	class="price_list">
				<li class="list_ti">
					<div class="th">ENGINE</div>
					<div class="th">TRIM</div>
					<div class="th">MSRP</div>
				</li>
				<li class="list_txt">
					<div class="td">T4 AWD</div>
					<div class="td">Momentum</div>
					<div class="td">46,200,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">T4 AWD</div>
					<div class="td">Inscription</div>
					<div class="td">50,800,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">T4 AWD</div>
					<div class="td">R-Design</div>
					<div class="td">48,800,000</div>					
				</li>
			</ul>
			<div class="caption_wrap">
				<div class="date">24th February 2020</div>
				<div class="price">단위 : 원 (VAT 포함)</div>
			</div>
		</div>
		<div class="btn_pop_close_wrap"  style="display:none;">
			<div class="btn_pop_close">
				<a href="javascript:close_pop();">닫기</a>
			</div>
		</div>
	</div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>
