<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "cars";
    $FOOTER_CODE = "buy";
    $TITLE = "CARS";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./../style_model.css?version=<?=$date_code?>">
<script src="/js/slick.min.js"></script>
<script src="./../script.js"></script>

<div id="contents" class="s90">
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
					<div class="sti"> </div>
					<div class="ti">THE NEW S90</div>
					<ul class="btn_wrap">
						<li class="btn"><a href="javascript:open_pop('spec');">Specifications <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
						<li class="btn vbs"><a href="https://www.volvocars.com/kr/build/s/s90" target="_blank">Build<span>></span></a></li>
						<li class="btn phev"><a href="https://vckiframe.com/files/volvo_phev_quick_guide.pdf" target="_blank">PHEV Quick Guide<span>></span></a></li>
					</ul>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_02">
				<div class="cont_wrap">
					<div class="ti">LUXURY WITH A DIFFERENCE</div>
					<div class="txt">S90은 우아하고 아름답게 꾸며진 스칸디나비안 디자인과 <br>혁신 기술로 설계한 최고의 세단입니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">IMPRESS YOUR GUESTS</div>
					<div class="txt">동급 최장 휠베이스 기반의 넓어진 실내 공간으로 <br>럭셔리 세단의 여유로운 승차감을 완성했습니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">PITCH PERFECT</div>
					<div class="txt">업그레이드 된 앰프와 자동으로 실내 소음을 제거하는 노이즈 캔슬레이션 기능, 신규 재즈클럽(jazz club) 모드가 적용되어 뛰어난 음향을 느낄 수 있습니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_05">
				<div class="cont_wrap">
					<div class="sti"> </div>
					<div class="ti">THE NEW S90</div>
					<div class="img"><img src="/images/cars/s90/slide_05.png"></div>
					<ul class="btns">
						<li class="btn"><a href="javascript:open_pop('spec');">Specifications <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
					</ul>
					<div class="btn_link"><a href="https://www.volvocars.com/kr/cars/new-models/s90" target="_blank">자세히 보기 <span>></span></a></div>
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
					<li class="ov" style="width:calc((100% - 7px)/2);"><a href="javascript:pop_spec_tab(1);">가솔린</a></li>
					<li style="width:calc((100% - 7px)/2);"><a href="javascript:pop_spec_tab(2);">전기/가솔린</a></li>
				</ul>
			</div>

			<div class="spec_cont spec_cont_01">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">B5</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">5,090</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,880</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,450</div>
						</li>
						<li>
							<div class="list_name">휠베이스<span>(mm)</span></div>
							<div class="list_val">3,060</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">배기량<span>(cc)</span></div>
							<div class="list_val">1,969</div>
						</li>
						<li>
							<div class="list_name">마력<span>(ps/rpm)</span></div>
							<div class="list_val">엔진 : 250 / 5,700</div>
						</li>
						<li>
							<div class="list_name"><span>(kW/rpm)</span></div>
							<div class="list_val">모터 : 10 / 3,000</div>
						</li>
						<li>
							<div class="list_name">토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">엔진 : 35.7 / 1,800 ~ 4,800<span class="list_val_inner">모터 :  4.1 / 2,250</span></div>
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
							<div class="list_val">18" | 245 / 45R</div>
						</li>
						<li>
							<div class="list_name"><span>Inscription</span></div>
							<div class="list_val">19" | 255 / 40R</div>
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
							<div class="list_name">정부 공인 표준 연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">11.3</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">9.8</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">13.7</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">4</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">150</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태 · 운전방법 · 차량적재 · 정비상태 및 외기온도에 따라 실제 연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2020년 9월 기준)</div>
			</div>

			<div class="spec_cont spec_cont_02" style="display:none;">
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
							<div class="list_val">5,090</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,880</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,450</div>
						</li>
						<li>
							<div class="list_name">휠베이스<span>(mm)</span></div>
							<div class="list_val">3,060</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">구동방식</span></div>
							<div class="list_val">4륜구동</div>
						</li>
						<li>
							<div class="list_name">배기량<span>(cc)</span></div>
							<div class="list_val">1,969</div>
						</li>
						<li>
							<div class="list_name">마력<span>(ps/rpm)</span></div>
							<div class="list_val">엔진 : 318 / 6,000</div>
						</li>
						<li>
							<div class="list_name"><span>(kW/rpm)</span></div>
							<div class="list_val">모터 : 65 / 7,000</div>
						</li>
						<li>
							<div class="list_name">토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">엔진 : 40.8 / 2,200 ~ 5,400<span class="list_val_inner">모터 : 24.5 / 0 ~ 3,000</span></div>
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
							<div class="list_val">20" | 245 / 40R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">4.9</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span style="text-align:right;">( 휘발유 : km/ℓ /<br>전기 : km/kWh )</span></div>
							<div class="list_val">11.2 / 2.9</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span style="text-align:right;">( 휘발유 : km/ℓ /<br>전기 : km/kWh )</span></div>
							<div class="list_val">10.3 / 2.9</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span style="text-align:right;">( 휘발유 : km/ℓ /<br>전기 : km/kWh )</span></div>
							<div class="list_val">12.4 / 3</div>
						</li>
						<!--<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val"></div>
						</li>-->
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">63</div>
						</li>
						<li>
							<div class="list_name">1회 충전 주행거리<span>(km)</span></div>
							<div class="list_val">34</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태 · 운전방법 · 차량적재 · 정비상태 및 외기온도에 따라 실제 연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2020년 9월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_option" style="display:none;">
			<h4>OPTIONS</h4>		
			
			<div class="options_tab_wrap">
				<ul class="options_tab list_3">
					<li class="ov" style="width:31%"><a href="javascript:options_tab(1);">B5 Momentum</a></li>
					<li style="width:31%"><a href="javascript:options_tab(2);">B5 Inscription</a></li>
					<li style="width:38%"><a href="javascript:options_tab(3);">T8 AWD Inscription</a></li>
				</ul>
			</div>
			<div class="options_img">
				<div class="options_img_01"><img src="/images/cars/s90/2020_08/options_car_img_01.png"></div>
				<div class="options_img_02" style="display:none"><img src="/images/cars/s90/2020_08/options_car_img_02.png"></div>
				<div class="options_img_03" style="display:none"><img src="/images/cars/s90/2020_08/options_car_img_03.png"></div>
			</div>
			<div class="options_detail detail_01">
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti">18” 10-스포크 터빈 실버 브라이트
						<div class="wheel_image"><img src="/images/cars/s90/2020_08/wheel_01.png"></div>					
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">측후방 경보 및 후방 추돌 경고</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">앞좌석 경추 보호 시트</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 센서</li>
					<li class="txt">파크 어시스트 (후방) 카메라</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">힐 스타트 어시스트</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">가죽 시트</li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
					<li class="txt">4-구역 독립 온도 조절 시스템</li>
					<li class="txt">전동식 파노라믹 선루프</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
				</ul>
				<ul>
					<li class="ti">TELEMATICS</li>
					<li class="txt">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</li>
					<li class="txt">헤드 업 디스플레이</li>
					<li class="txt">하이 퍼포먼스 사운드 시스템</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">USB 포트</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
					<li class="txt">템퍼러리 스페어 타이어</li>
				</ul>
			</div>

			<div class="options_detail detail_02" style="display:none">
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti">19” 10-스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/s90/2020_08/wheel_02.png"></div>					
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">측후방 경보 및 후방 추돌 경고</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">앞좌석 경추 보호 시트</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 센서</li>
					<li class="txt">파크 어시스트 파일럿 및 360도 카메라</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">힐 스타트 어시스트</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들 & 브라이트 데코</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">테일러드 인스트루먼트 패널 마감</li>
					<li class="txt">크리스탈 기어 노브</li>
					<li class="txt">나파 가죽 시트</li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 전동 사이드 서포트 및 마사지</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">앞좌석 통풍시트</li>
					<li class="txt">뒷좌석 럭셔리 암레스트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
					<li class="txt">4-구역 독립 온도 조절 시스템</li>
					<li class="txt">전동식 파노라믹 선루프</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
				</ul>
				<ul>
					<li class="ti">TELEMATICS</li>
					<li class="txt">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</li>
					<li class="txt">헤드 업 디스플레이</li>
					<li class="txt">Bowers & Wilkins 프리미엄 사운드 시스템</li>
					<li class="txt">서브우퍼</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">USB 포트</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
					<li class="txt">템퍼러리 스페어 타이어</li>
				</ul>
			</div>

			<div class="options_detail detail_03" style="display:none">
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti">20”  8-멀티 스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/s90/2020_08/wheel_03.png"></div>					
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">측후방 경보 및 후방 추돌 경고</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">앞좌석 경추 보호 시트</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 센서</li>
					<li class="txt">파크 어시스트 파일럿 및 360도 카메라</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">후륜 에어 서스펜션 및 4-C 샤시</li>
					<li class="txt">힐 스타트 어시스트</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들 & 브라이트 데코</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">테일러드 인스트루먼트 패널 마감</li>
					<li class="txt">크리스탈 기어 노브</li>
					<li class="txt">나파 가죽 시트</li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 전동 사이드 서포트 및 마사지</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">앞좌석 통풍시트</li>
					<li class="txt">뒷좌석 럭셔리 암레스트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨 </li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
					<li class="txt">4-구역 독립 온도 조절 시스템</li>
					<li class="txt">전동식 파노라믹 선루프</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
				</ul>
				<ul>
					<li class="ti">TELEMATICS</li>
					<li class="txt">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</li>
					<li class="txt">헤드 업 디스플레이</li>
					<li class="txt">Bowers & Wilkins 프리미엄 사운드 시스템</li>
					<li class="txt">서브우퍼</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">USB 포트</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
					<li class="txt">템퍼러리 스페어 타이어</li>
				</ul>
			</div>

            <p class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다.</p>
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">S90</div>
			<ul	class="model_list">
				<li class="list list_01">
					<div class="list_title">MOMENTUM</div>
					<div class="list_img"><img src="/images/cars/s90/2020_08/price_car_img_01.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>B5</li>
						<li>60,300,000</li>
					</ul>
				</li>
				<li class="list list_02">
					<div class="list_title">INSCRIPTION</div>
					<div class="list_img"><img src="/images/cars/s90/2020_08/price_car_img_02.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>B5</li>
						<li>66,900,000</li>
					</ul>
				</li>
				<li class="list list_03">
					<div class="list_title">INSCRIPTION</div>
					<div class="list_img"><img src="/images/cars/s90/2020_08/price_car_img_03.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>T8 AWD</li>
						<li>85,400,000</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>
