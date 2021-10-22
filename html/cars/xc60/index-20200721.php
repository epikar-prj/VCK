<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "cars";
    $FOOTER_CODE = "buy";
    $TITLE = "CARS";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./../style_model.css?version=20200702">
<script src="/js/slick.min.js"></script>
<script src="./../script.js"></script>
<div id="contents" class="xc60">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/cars/index.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>

    <div class="container">
		<div class="slide_wrap" style="width:100%; height:100%;">
			<div class="slide_main slide_01">
				<div class="cont_wrap">
					<div class="sti">새로움에 새로움을 더하다</div>
					<div class="ti">THE VOLVO XC60</div>
					<ul class="btn_wrap">
						<li class="btn"><a href="javascript:open_pop('spec');">Specifications <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
						<li class="btn vbs"><a href="https://www.volvocars.com/kr/build/xc/xc60" target="_blank">VBS<span>></span></a></li>
					</ul>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_02">
				<div class="cont_wrap">
					<div class="ti">THE DYNAMIC SWEDISH SUV</div>
					<div class="txt">다이내믹하고 당당한 존재감을 자랑하는 XC60은 편안함과 제어가 완벽한 균형을 이룹니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">PLEASURE FOR YOUR SENSES</div>
					<div class="txt">볼보 XC60은 즐거움을 위해 만들어졌습니다.<br>
						언제나 마음대로 제어할 수 있고, 운전자를 보조하며, 모든 상호작용이 자연스러운 자동차입니다.
					</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">VERSATILITY’S NEW LOOK</div>
					<div class="txt">자동차는 훌륭한 디자인과 뿌듯한 드라이빙 경험 이상의 무엇이어야 합니다. 다재다능하고 유용함이 녹아 있는 XC60은 활동적인 라이프스타일에 걸맞은 자동차입니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_05">
				<div class="cont_wrap">
					<div class="sti">새로움에 새로움을 더하다</div>
					<div class="ti">THE VOLVO XC60</div>
					<div class="img"><img src="/images/cars/xc60/slide_05.png"></div>
					<ul class="btns">
						<li class="btn"><a href="javascript:open_pop('spec');">Specifications <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
					</ul>
					<div class="btn_link"><a href="https://www.volvocars.com/kr/cars/new-models/the-volvo-xc60" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div><!--slide_05_end-->
		</div>
    </div>

	<div class="pop_wrap" style="display:none;">
        <div class="back">
            <a href="javascript:close_pop();">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
		<div class="pop_cont pop_spec" style="display:none;">
			<h4>SPECIFICATIONS</h4>
			<div class="pop_tab">
				<div class="sti">연료</div>
				<ul class="tab_list">
					<li class="ov"><a href="javascript:pop_spec_tab(1);">디젤</a></li>
					<li><a href="javascript:pop_spec_tab(2);">가솔린</a></li>
					<li><a href="javascript:pop_spec_tab(3);">전기/가솔린</a></li>
				</ul>
			</div>
			<div class="spec_cont spec_cont_01">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">D5 AWD</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">4,690</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,900</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,645</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">1,970</div>
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
							<div class="list_val">235/4,000</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">48.9/1,750~2,250</div>
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
							<div class="list_val">19" | 235/55R</div>
						</li>
						<li>
							<div class="list_name"><span>Inscription</span></div>
							<div class="list_val">20" | 255/45R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">7.2</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">11.7</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">10.4</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">13.8</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">3</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">165</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태, 운전방법, 차량적재, 정비상태 및 외기온도에 따라 실주행연비와 차이가 있습니다.</div>
				<div class="caption">※ 본 사이트에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2020년 1월 기준)</div>
			</div>
			<div class="spec_cont spec_cont_02" style="display:none;">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">T6 AWD</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">4,690</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,900</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,645</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">1,945</div>
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
							<div class="list_val">320/5,700</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">40.8/2,200~5,400</div>
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
							<div class="list_val">18" | 235/60R</div>
						</li>
						<li>
							<div class="list_name"><span>Inscription</span></div>
							<div class="list_val">19" | 235/55R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">5.9</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">9.0</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">7.8</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">11.1</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">5</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">193</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태, 운전방법, 차량적재, 정비상태 및 외기온도에 따라 실주행연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 사이트에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2020년 01월 기준)</div>
			</div>
			<div class="spec_cont spec_cont_03" style="display:none;">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">T8 AWD</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">4,690</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,900</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,645</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">2,185</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">형식</div>
							<div class="list_val">직렬 4기통 플러그-인 하이브리드</div>
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
							<div class="list_name">최고 출력<span>엔진(ps/rpm)</span></div>
							<div class="list_val">318/6,000</div>
						</li>
						<li>
							<div class="list_name"><span>모터(kw/rpm)</span></div>
							<div class="list_val">65/7,000</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>엔진(kg·m/rpm)</span></div>
							<div class="list_val">40.8/2,200~5,400</div>
						</li>
						<li>
							<div class="list_name"><span>모터(kpm/rpm)</span></div>
							<div class="list_val">24.5/0~3,000</div>
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
							<div class="list_name">휠/타이어<span>Inscription</span></div>
							<div class="list_val">19" | 235/55R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">5.3</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span></span></div>
							<div class="list_val">전기 : 3.0(km/kWh)<br>
								가솔린 : 10.8(km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span></span></div>
							<div class="list_val">전기 : 3.0(km/kWh)<br>
								가솔린 : 10.3(km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span></span></div>
							<div class="list_val">전기 : 3.0(km/kWh)<br>
								가솔린 : 11.3(km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">1회 충전 주행거리<span>(km)</span></div>
							<div class="list_val">33</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">67</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태, 운전방법, 차량적재, 정비상태 및 외기온도에 따라 실주행연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 사이트에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2020년 1월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_option" style="display:none;">
			<h4>OPTIONS</h4>		
			
			<div class="options_tab_wrap">
				<ul class="options_tab">
					<li class="ov"><a href="javascript:options_tab(1);">Momentum</a></li>
					<li><a href="javascript:options_tab(2);">Inscription</a></li>
				</ul>
			</div>
			<div class="options_img">
				<div class="options_img_01"><img src="/images/cars/xc60/options_car_img_01.png"></div>
				<div class="options_img_02" style="display:none"><img src="/images/cars/xc60/options_car_img_02.png"></div>
			</div>
			<div class="options_detail detail_01">
				<ul>
					<li class="ti">휠<span> / Wheels</span></li>
					<li class="txt wheel_ti">19” 5-더블 스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/xc60/wheel_01.png"></div>	
					</li>
				</ul>
				<ul>
					<li class="ti">안전&보안<span> / Safety & Security</span></li>
					<li class="txt">경사로 감속 주행 장치</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">도로 표시 정보</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">스타트/스톱 시스템</li>
					<li class="txt">앞좌석 경추 보호 시트</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">접근 차량 충돌 회피 기능(Oncoming Lane Mitigation)</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">차선 유지 보조</li>
					<li class="txt">차일드 도어락</li>
					<li class="txt">커튼형 에어백</li>
					<li class="txt">키리스 엔트리 & 리모트 태그</li>
					<li class="txt">타이어 공기압 모니터링 시스템</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">파크 어시스트 (후방) 카메라</li>
					<li class="txt">파크 어시스트 센서</li>
					<li class="txt">프라이빗 락</li>
					<li class="txt">후방 추돌 경고</li>
					<li class="txt">힐 스타트 어시스트</li>
				</ul>
				<ul>
					<li class="ti">익스테리어<span> / Exterior</span></li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
					<li class="txt">브라이트 실버 인티그레이티드 루프 레일</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
					<li class="txt">컬러 코디네이티드 도어 핸들</li>
					<li class="txt">크롬 슬리브 듀얼 이그조스트 테일 파이프</li>
				</ul>
				<ul>
					<li class="ti">인테리어<span> / Interior</span></li>
					<li class="txt">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</li>
					<li class="txt">12V 아웃렛</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">4-구역 독립 온도 조절 시스템</li>
					<li class="txt">내비게이션</li>
					<li class="txt">뒷좌석 히팅 시트</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">리니어 라임 데코 인레이</li>
					<li class="txt">블루투스</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">앞좌석 메모리 기능</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 히팅 시트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">전동식 파노라마 선루프</li>
					<li class="txt">클린 존 인테리어 패키지</li>
					<li class="txt">트레드 플레이트 실몰딩 - VOLVO</li>
					<li class="txt">하이 퍼포먼스 사운드 시스템</li>
					<li class="txt">헤드 업 디스플레이</li>
				</ul>
			</div>

			<div class="options_detail detail_02" style="display:none">
				<ul>
					<li class="ti">휠<span> / Wheels</span></li>
					<li class="txt wheel_ti">19” 10-스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/xc60/wheel_02.png"></div>
					</li>
					<li class="txt wheel_ti">20” 8-스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/xc60/wheel_03.png"></div>	
					</li>
				</ul>
				<ul>
					<li class="ti">안전&보안<span> / Safety & Security</span></li>
					<li class="txt">360°서라운드 뷰 카메라</li>
					<li class="txt">경사로 감속 주행 장치</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">도로 표시 정보</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">스타트/스톱 시스템</li>
					<li class="txt">앞좌석 경추 보호 시트</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">접근 차량 충돌 회피 기능(Oncoming Lane Mitigation)</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">차선 유지 보조</li>
					<li class="txt">차일드 도어락</li>
					<li class="txt">커튼형 에어백</li>
					<li class="txt">키리스 엔트리 & 리모트 태그</li>
					<li class="txt">타이어 공기압 모니터링 시스템</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">파크 어시스트 파일럿</li>
					<li class="txt">프라이빗 락</li>
					<li class="txt">후방 추돌 경고</li>
					<li class="txt">힐 스타트 어시스트</li>
				</ul>
				<ul>
					<li class="ti">익스테리어<span> / Exterior</span></li>
					<li class="txt">듀얼 인티그레이티드 이그조스트 테일 파이프</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
					<li class="txt">브라이트 실버 인티그레이티드 루프 레일</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
					<li class="txt">컬러 코디네이티드 도어 핸들</li>
					<li class="txt">헤드 램프 클리닝</li>
				</ul>
				<ul>
					<li class="ti">인테리어<span> / Interior</span></li>
					<li class="txt">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</li>
					<li class="txt">12V 아웃렛</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">4-구역 독립 온도 조절 시스템</li>
					<li class="txt">Bowers & Wilkins 프리미엄 사운드 시스템</li>
					<li class="txt">나파 레더 시트</li>
					<li class="txt">내비게이션</li>
					<li class="txt">뒷좌석 히팅 시트</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">블루투스</li>
					<li class="txt">서브우퍼</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">앞좌석 마사지 시트</li>
					<li class="txt">앞좌석 메모리 기능</li>
					<li class="txt">앞좌석 벤틸레이티드 시트</li>
					<li class="txt">앞좌석 전동 사이드 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 히팅 시트</li>
					<li class="txt">인스크립션 드리프트 우드 데코 인레이</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">전동식 파노라마 선루프</li>
					<li class="txt">클린 존 인테리어 패키지</li>
					<li class="txt">트레드 플레이트 실몰딩 - VOLVO</li>
					<li class="txt">헤드 업 디스플레이</li>
				</ul>
			</div>

            <p class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다.</p>
            
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">XC60</div>
			<ul	class="model_list">
				<li class="list list_01">
					<div class="list_title">MOMENTUM</div>
					<div class="list_img"><img src="/images/cars/xc60/price_car_img_01.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>D5 AWD</li>
						<li>62,600,000</li>
					</ul>
				</li>
				<li class="list list_02">
					<div class="list_title">INSCRIPTION</div>
					<div class="list_img"><img src="/images/cars/xc60/price_car_img_02.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>D5 AWD</li>
						<li>68,700,000</li>
					</ul>
					<ul class="price_list">
						<li>T6 AWD</li>
						<li>75,400,000</li>
					</ul>
					<ul class="price_list">
						<li>T8 AWD</li>
						<li>83,200,000</li>
					</ul>
				</li>
			</ul>
			<!--<div class="caption_wrap">
				<div class="date">24th February 2020</div>
				<div class="price">단위 : 원 (VAT 포함)</div>
			</div>-->
		</div>
		<!--<div class="btn_pop_close_wrap"  style="display:none;">
			<div class="btn_pop_close">
				<a href="javascript:close_pop();">닫기</a>
			</div>
		</div>-->
	</div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>
