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
<div id="contents" class="xc60">
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
					<div class="sti">새로움에 새로움을 더하다</div>
					<div class="ti">THE VOLVO XC60</div>
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
					<div class="ti">THE DYNAMIC SWEDISH SUV</div>
					<div class="txt">볼보 XC60에서는 편안함과 제어가 완벽한 균형을 이룹니다.<br> 
						대담한 디자인이 아름다운 실내와 만나고 기술은 자연스러우며 모든 드라이빙이 즐거워지는 SUV입니다.<br>
						다이내믹하고 당당한 존재감을 자랑하는 XC60은 독특한 스칸디나비아식 사고 방식이 녹아 있는 SUV입니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">PLEASURE FOR YOUR SENSES</div>
					<div class="txt">볼보 XC60은 즐거움을 위해 만들어졌습니다. 먼 거리건 가까운 거리건 모름지기 운전은 즐거워야 한다는 것이 볼보의 철학이기 때문입니다. 운전할 때 영감과 확신을 느낄 수 있는 자동차로 XC60을 만든 이유가 여기 있습니다. 언제나 마음대로 제어할 수 		있고, 운전자를 보조하는 기술을 갖추고 있을 뿐 아니라 모든 상호 작용이 너무나도 자연스러운 자동차 말입니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">VERSATILITY’S NEW LOOK</div>
					<div class="txt">자동차는 훌륭한 디자인과 뿌듯한 드라이빙 경험 이상의 무엇이어야 합니다. 다재다능하고 유용함이 곳곳에 녹아 있는 XC60은 활동적인 라이프스타일에 걸맞은 자동차입니다.<br>
						XC60은 수납 또한 간편합니다. 안으로 들어가면 크기가 불규칙한 물건을 수납할 수 있는 크고 균일한 형태의 트렁크를 찾을 수 있습니다. 
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
							<div class="list_name">휠/타이어<span>Inscription</span></div>
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
							<div class="list_val">320/5,700</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">40.8/2,200~5,400</div>
						</li>
						<li>
							<div class="list_name">변속기</span></div>
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
							<div class="list_name">최고 출력<span>모터(kw/rpm)</span></div>
							<div class="list_val">65/7,000</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>엔진(kg·m/rpm)</span></div>
							<div class="list_val">40.8/2,200~5,400</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>모터(kpm/rpm)</span></div>
							<div class="list_val">24.5/0~3,000</div>
						</li>
						<li>
							<div class="list_name">변속기</span></div>
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
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">전기 : 3.0(km/kWh)<br>
								가솔린 : 10.8(km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">전기 : 3.0(km/kWh)<br>
								가솔린 : 10.3(km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
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

			<div class="option_list_wrap">
				<ul class="option_list">
					<li class="th"><div class="ti">SAFETY</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="sti">인텔리세이프 어시스트</li>
					<li class="td"><div class="ti under">- 어댑티브 크루즈 컨트롤</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 파일럿 어시스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 거리 경보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 운전자 경보 제어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 차선 유지 보조</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 이탈 방지 및 보호</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 표시 정보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 시티 세이프티</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>

					<li class="sti">인텔리세이프 서라운드</li>
					<li class="td"><div class="ti under">- 사각지대 정보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 측후방 경보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 후방 추돌 경고</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>

					<li class="td"><div class="ti">지능형 운전자 정보 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사이드 에어백 및 커튼형 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 경추 보호 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SUPPORT & SECURITY SYSTEM</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">LED 헤드 램프</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">액티브 하이빔 제너레이션 I</div>
						<div class="o"></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">액티브 하이빔 제너레이션 II</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 램프 클리닝</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">코너링 램프</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전방 안개등</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">눈부심 방지 룸 미러 & 아웃사이드 미러</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 업 디스플레이</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 센서</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 파일럿</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 (후방) 카메라</div>
						<div class="o"></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">360°서라운드 뷰 카메라</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">키리스 엔트리 & 리모트 태그</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">차일드 도어락</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">프라이빗 락</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">POWERTRAIN & CHASSIS</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">DRIVE-E 엔진</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">8단 자동 기어트로닉 변속기</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사륜구동</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스타트/스톱 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">드라이브 모드 셀렉터</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">힐 스타트 어시스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">경사로 감속 주행 장치</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">EXTERIOR</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">모멘텀 하이 글로스 스탠다드 그릴</div>
						<div class="o"></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">인스크립션 매트 실버 그릴</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인스크립션 사이드 몰딩</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">컬러 코디네이티드 도어 핸들</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">브라이트 데코 사이드 윈도</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">브라이트 실버 인티그레이티드 루프 레일</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">크롬 슬리브 듀얼 이그조스트 테일 파이프</div>
						<div class="o"></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">듀얼 인티그레이티드 이그조스트 테일 파이프</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">INTERIOR & SEATS</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">9인치 터치 스크린 센터 디스플레이</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">3-스포크 유니 데코 인레이 레더 스티어링 휠</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스티어링 휠 히팅</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">크리스탈 기어 레버 노브</div>
						<div></div><div></div><div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">리니어 라임 데코 인레이</div>
						<div class="o"></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">인스크립션 드리프트 우드 데코 인레이</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인스크립션 테일러드 인스트루먼트 패널 마감</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인테리어 일루미네이션 - 하이 레벨</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">컴포트 레더 시트</div>
						<div class="o"></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">나파 레더 시트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 시트 및 럼버 서포트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 메모리 기능</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 쿠션 익스텐션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 사이드 서포트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 마사지 시트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 벤틸레이티드 시트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">트레드 플레이트 실몰딩 - VOLVO</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">센터 터널 230V 아울렛</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CLIMATE</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">실내 공기 청정 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">클린 존 인테리어 패키지</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">4-구역 독립 온도 조절 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">전면 윈드 스크린 워셔 노즐 히팅</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전동식 파노라마 선루프</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">WHEELS & TIRES</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">18” 5-Y 스포크 실버 알로이 & 235/60R18</div>
						<div></div><div></div><div class="o"></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">19” 10-스포크 블랙 다이아몬드 컷 & 235/55R19</div>
						<div></div><div></div><div></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">19” 5-스포크 블랙 다이아몬드 컷 & 235/55R19</div>
						<div class="o"></div><div></div><div></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">20” 8-스포크 블랙 다이아몬드 컷 & 255/45R20</div>
						<div></div><div class="o"></div><div></div><div></div><div></div>
					</li>
					<li class="td"><div class="ti">타이어 공기압 모니터링 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">WHEELS & TIRES</div><div>D5<span>AWD MMT</span></div><div>D5<span>AWD INS</span></div><div>T6<span>AWD MMT</span></div><div>T6<span>AWD INS</span></div><div>T8<span>AWD INS</span></div></li>
					<li class="td"><div class="ti">핸즈프리 전동식 테일 게이트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">비상용 삼각대</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">12V 아웃렛</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">타이어 리페어 키트</div>
						<div></div><div></div><div></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">템퍼러리 스페어 타이어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div><div></div>
					</li>
				</ul>

				<div class="caption">※ 표기된 사양은 사전 예고 없이 변경될 수 있으며 실제 차량과 차이가 있을 수 있습니다. (2019년 9월 26일 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">XC60</div>
			<ul	class="price_list">
				<li class="list_ti">
					<div class="th">ENGINE</div>
					<div class="th">TRIM</div>
					<div class="th">MSRP</div>
				</li>
				<li class="list_txt">
					<div class="td">D5 AWD</div>
					<div class="td">Momentum</div>
					<div class="td">62,600,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">D5 AWD</div>
					<div class="td">Inscription</div>
					<div class="td">68,700,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">T6 AWD</div>
					<div class="td">Inscription</div>
					<div class="td">75,400,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">T8 AWD</div>
					<div class="td">Inscription</div>
					<div class="td">83,200,000</div>					
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
