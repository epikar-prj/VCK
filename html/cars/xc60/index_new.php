<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "cars";
    $FOOTER_CODE = "buy";
    $TITLE = "CARS";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./../style_model.css?version=<?=$date_code?>">
<script src="/js/slick.min.js"></script>
<script src="./../script.js?version=<?=$date_code?>"></script>

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
					<div class="sti"> </div>
					<div class="ti">THE XC60</div>
					<ul class="btn_wrap">
						<li class="btn"><a href="javascript:open_pop('spec');">Specifications <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
						<li class="btn vbs"><a href="https://www.volvocars.com/kr/build/xc/xc60" target="_blank">Build<span>></span></a></li>
						<li class="btn phev"><a href="https://docs.google.com/gview?url=https://vckiframe.com/files/volvo_phev_quick_guide.pdf" target="_blank">PHEV Quick Guide<span>></span></a></li>
					</ul>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_02">
				<div class="cont_wrap">
					<div class="ti">OWN THE ROAD.<br> SHARE THE PLANET.</div>
					<div class="txt">XC60은 소중한 것들을 보호하는 역동적인 스칸디나비안 플러그인 하이브리드 SUV 입니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">IMPROVE EVERY BREATH</div>
					<div class="txt">볼보는 차량 내부와 외부의 환경을 모두 생각합니다.<br>
                        초미세먼지를 감지하는 PM 2.5 센서로 안전한 실내환경을 만드는 데 도움을 줍니다.
					</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">ON YOUR TERMS</div>
					<div class="txt">XC60에 적용된 직관적 기술은 주행 시 개인화된 편안함을 선사하고 이동성에 연결할 수 있도록 지원해줍니다.</div>
					<div class="btn_next"><a href="javascript:next_page();">Read More</a></div>
				</div>
			</div>
			<div class="slide_sub slide_05">
				<div class="cont_wrap">
					<div class="sti"> </div>
					<div class="ti">THE XC60</div>
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
					<li class="ov" style="width:50%;"><a href="javascript:pop_spec_tab(1,1);">가솔린</a></li>
					<li style="width:50%;"><a href="javascript:pop_spec_tab(2);">전기/가솔린</a></li>
				</ul>
			</div>
			<div class="spec_cont spec_cont_01">
				<div class="pop_tab">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li style="width:50%;" class="ov"><a href="javascript:pop_spec_tab(1,1);">B5 AWD</a></li>
						<li style="width:50%;"><a href="javascript:pop_spec_tab(1,3);">B6 AWD</a></li>
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
							<div class="list_val">1,660</div>
						</li>
						<li>
							<div class="list_name">휠베이스<span>(mm)</span></div>
							<div class="list_val">2,865</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">구동방식</div>
							<div class="list_val">4륜구동</div>
						</li>
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
							<div class="list_val">엔진 : 35.7 / 1,800 ~ 4,800<span class="list_val_inner">모터 : 4.1 / 2,250</span></div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">WHEELS & TIRES</div>
					<ul>
						<li>
							<div class="list_name">휠/타이어<span>Momentum</span></div>
							<div class="list_val">18" | 235 / 60R</div>
						</li>
						<li>
							<div class="list_name"><span>Inscription</span></div>
							<div class="list_val">19" | 235 / 55R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">7.0</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부 공인 표준 연비(복합)<span>(km/ℓ)</span></div>
							<div class="list_val">9.8</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비(도심)<span>(km/ℓ)</span></div>
							<div class="list_val">8.8</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비(고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">11.5</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">4</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">173</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태·운전방법·차량적재·정비상태 및 외기온도에 따라 실제 연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2021년 4월 기준)</div>
			</div>
			<div class="spec_cont spec_cont_03" style="display:none;">
				<div class="pop_tab">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li style="width:50%;"><a href="javascript:pop_spec_tab(1,1);">B5 AWD</a></li>
						<li style="width:50%;" class="ov"><a href="javascript:pop_spec_tab(1,3);">B6 AWD</a></li>
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
							<div class="list_val">1,660</div>
						</li>
						<li>
							<div class="list_name">휠베이스<span>(mm)</span></div>
							<div class="list_val">2,865</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">구동방식</div>
							<div class="list_val">4륜구동</div>
						</li>
						<li>
							<div class="list_name">배기량<span>(cc)</span></div>
							<div class="list_val">1,969</div>
						</li>
						<li>
							<div class="list_name">마력<span>(ps/rpm)</span></div>
							<div class="list_val">엔진 : 300 / 5,400</div>
						</li>
						<li>
							<div class="list_name"><span>(kW/rpm)</span></div>
							<div class="list_val">모터 : 10 / 3,000</div>
						</li>
						<li>
							<div class="list_name">토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">엔진 : 42.8 / 2,100 ~ 4,800<span class="list_val_inner">모터 : 4.1 / 2,250</span></div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">WHEELS & TIRES</div>
					<ul>
						<li>
							<div class="list_name">휠/타이어<span>Inscription</span></div>
							<div class="list_val">20" | 255 / 45R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">6.2</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부 공인 표준 연비(복합)<span>(km/ℓ)</span></div>
							<div class="list_val">9.3</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비(도심)<span>(km/ℓ)</span></div>
							<div class="list_val">8.3</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비(고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">10.9</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">5</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">183</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태·운전방법·차량적재·정비상태 및 외기온도에 따라 실제 연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2021년 4월 기준)</div>
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
							<div class="list_name">휠베이스<span>(mm)</span></div>
							<div class="list_val">2,865</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">POWERTRAIN</div>
					<ul>
						<li>
							<div class="list_name">구동방식</div>
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
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">WHEELS & TIRES</div>
					<ul>
						<li>
							<div class="list_name">휠/타이어<span>Inscription</span></div>
							<div class="list_val">19" | 235 / 55R</div>
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
							<div class="list_name">정부 공인 표준 연비(복합)<span></span></div>
							<div class="list_val">전기 : 3.0 (km/kWh)<br>
								가솔린 : 10.8 (km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비(도심)<span></span></div>
							<div class="list_val">전기 : 3.0 (km/kWh)<br>
								가솔린 : 10.3 (km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">정부 공인 표준 연비(고속도로)<span></span></div>
							<div class="list_val">전기 : 3.0 (km/kWh)<br>
								가솔린 : 11.3 (km/ℓ)</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">-</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">67</div>
						</li>
						<li>
							<div class="list_name">1회 충전 주행거리<span>(km)</span></div>
							<div class="list_val">33</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태·운전방법·차량적재·정비상태 및 외기온도에 따라 실제 연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2020년 11월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_option" style="display:none;">
			<h4>OPTIONS</h4>		
			
			<div class="options_tab_wrap list_swiper">
				<ul class="options_tab">
					<li class="ov"><a href="javascript:options_tab(1);">B5 AWD Momentum</a></li>
					<li><a href="javascript:options_tab(2);">B5 AWD Inscription</a></li>
					<li><a href="javascript:options_tab(3);">B6 AWD Inscription</a></li>
					<li><a href="javascript:options_tab(4);">T8 AWD Inscription</a></li>
				</ul>
			</div>
			<div class="options_img">
				<div class="options_img_01"><img src="/images/cars/xc60/2021_02/options_car_img_01.png"></div>
				<div class="options_img_02" style="display:none"><img src="/images/cars/xc60/2021_02/options_car_img_02.png"></div>
				<div class="options_img_03" style="display:none"><img src="/images/cars/xc60/2021_02/options_car_img_03.png"></div>
				<div class="options_img_04" style="display:none"><img src="/images/cars/xc60/options_car_img_02_new.png"></div>
			</div>

			<div class="options_detail detail_01"><!--B5 mmt-->
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti">18" 5-Y 스포크 실버
						<div class="wheel_image"><img src="/images/cars/xc60/2021_03/wheel_b5_mmt.jpg"></div>					
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">차선 유지 보조</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 센서</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">스타트/스톱 시스템</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">다이나믹 샤시</li>
					<li class="txt">힐 스타트 어시스트</li>
					<li class="txt">경사로 감속 주행 장치</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
					<li class="txt">브라이트 인티그레이티드 루프 레일</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">뒷좌석 파워폴딩 헤드레스트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
					<li class="txt">전동식 파노라믹 선루프</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
				</ul>
				<ul>
					<li class="ti">TELEMATICS</li>
					<li class="txt">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</li>
					<li class="txt">헤드 업 디스플레이</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">블루투스</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">로드커버</li>
					<li class="txt">전동식 트렁크</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
				</ul>
            </div>

			<div class="options_detail detail_02" style="display:none"><!--B5 Ins-->
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti">19" 10-스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/xc60/2021_03/wheel_b5_ins.jpg"></div>					
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">차선 유지 보조</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 파일럿 및 360도 카메라</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">스타트/스톱 시스템</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">다이나믹 샤시</li>
					<li class="txt">힐 스타트 어시스트</li>
					<li class="txt">경사로 감속 주행 장치</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
					<li class="txt">브라이트 인티그레이티드 루프 레일</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">크리스탈 기어 노브</li>
					<li class="txt">테일러드 인스트루먼트 패널 마감</li>
					<li class="txt">나파 가죽 시트</li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 전동 사이드 서포트 및 마사지</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">앞좌석 통풍시트</li>
					<li class="txt">뒷좌석 파워폴딩 헤드레스트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
					<li class="txt">전동식 파노라믹 선루프</li>
					<li class="txt">전면 윈드 스크린 워셔 노즐 히팅</li>
				</ul>
				<ul>
					<li class="ti">TELEMATICS</li>
					<li class="txt">12.3인치 디지털 디스플이 인스트루먼트 클러스터</li>
					<li class="txt">헤드 업 디스플레이</li>
					<li class="txt">Bowers & Wilkins 프리미엄 사운드 시스템</li>
					<li class="txt">서브우퍼</li>
					<li class="txt">스마트폰 인테그레이션</li>
					<li class="txt">블루투스</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">로드커버</li>
					<li class="txt">전동식 트렁크</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
				</ul>
            </div>

			<div class="options_detail detail_03" style="display:none"><!--B6 Ins-->
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti">20" 8-스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/xc60/2021_03/wheel_b6_ins.jpg"></div>						
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">차선 유지 보조</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 파일럿 및 360도 카메라</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">스타트/스톱 시스템</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">다이나믹 샤시</li>
					<li class="txt">힐 스타트 어시스트</li>
					<li class="txt">경사로 감속 주행 장치</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들</li>
					<li class="txt">브라이트 데코 사이드 윈도</li>
					<li class="txt">브라이트 인티그레이티드 루프 레일</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">크리스탈 기어 노브</li>
					<li class="txt">테일러드 인스트루먼트 패널 마감</li>
					<li class="txt">나파 가죽 시트</li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 전동 사이드 서포트 및 마사지</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">앞좌석 통풍시트</li>
					<li class="txt">뒷좌석 파워폴딩 헤드레스트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨</li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
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
					<li class="txt">블루투스</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">로드커버</li>
					<li class="txt">전동식 트렁크</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
				</ul>
            </div>


			<div class="options_detail detail_04" style="display:none"><!--T8 Inscription-->
				<ul>
					<li class="ti">WHEELS & TIRES</li>
					<li class="txt wheel_ti"> 19" 10-스포크 블랙 다이아몬드 컷
						<div class="wheel_image"><img src="/images/cars/xc60/wheel_02_2008.png"></div>					
					</li>
				</ul>
				<ul>
					<li class="ti">SAFETY & SUPPORT SYSTEM</li>
					<li class="txt">어댑티브 크루즈 컨트롤</li>
					<li class="txt">파일럿 어시스트</li>
					<li class="txt">차선 유지 보조</li>
					<li class="txt">사각지대 정보</li>
					<li class="txt">앞좌석 에어백</li>
					<li class="txt">뒷좌석 (좌/우) ISOFIX</li>
					<li class="txt">지능형 운전자 정보 시스템</li>
					<li class="txt">파크 어시스트 센서</li>
					<li class="txt">파크 어시스트 파일럿</li>
					<li class="txt">360도 카메라</li>
				</ul>
				<ul>
					<li class="ti">POWERTRAIN & CHASSIS</li>
					<li class="txt">스타트/스톱 시스템</li>
					<li class="txt">드라이브 모드 셀렉터</li>
					<li class="txt">다이나믹 샤시</li>
					<li class="txt">힐 스타트 어시스트</li>
					<li class="txt">경사로 감속 주행 장치</li>
				</ul>
				<ul>
					<li class="ti">EXTERIOR</li>
					<li class="txt">눈부심 방지 룸 미러 & 아웃사이드 미러</li>
					<li class="txt">컬러 코디네이티드 도어 핸들 & 브라이트 데코</li>
					<li class="txt">브라이트 사이드 윈도 데코</li>
					<li class="txt">브라이트 인티그레이티드 루프 레일</li>
				</ul>
				<ul>
					<li class="ti">INTERIOR & SEATS</li>
					<li class="txt">3-스포크 유니 데코 인레이 레더 스티어링 휠</li>
					<li class="txt">스티어링 휠 히팅</li>
					<li class="txt">크리스탈 기어 노브</li>
					<li class="txt">테일러드 인스트루먼트 패널 마감</li>
					<li class="txt">나파 가죽 시트 </li>
					<li class="txt">앞좌석 전동 시트 및 메모리 기능</li>
					<li class="txt">앞좌석 전동 럼버 서포트</li>
					<li class="txt">앞좌석 전동 쿠션 익스텐션</li>
					<li class="txt">앞좌석 전동 사이드 서포트 및 마사지</li>
					<li class="txt">앞좌석 열선시트</li>
					<li class="txt">뒷좌석 열선시트</li>
					<li class="txt">앞좌석 통풍시트</li>
					<li class="txt">뒷좌석 파워폴딩 헤드레스트</li>
					<li class="txt">인테리어 일루미네이션 - 하이 레벨 </li>
					<li class="txt">트레드 플레이트 실몰딩 일루미네이션 - Recharge</li>
					<li class="txt">프라이빗 락</li>
				</ul>
				<ul>
					<li class="ti">CLIMATE</li>
					<li class="txt">2-구역 독립 온도 조절 시스템</li>
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
					<li class="txt">블루투스</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
				<ul>
					<li class="ti">CARGO AREA</li>
					<li class="txt">로드커버 </li>
					<li class="txt">전동식 트렁크</li>
					<li class="txt">비상용 삼각대</li>
					<li class="txt">12V 아웃렛</li>
					<li class="txt">타이어 리페어 키트</li>
				</ul>
            </div>

            <p class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다.</p>
            
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">XC60</div>
			<ul	class="model_list">
				<li class="list list_03">
					<div class="list_title">MOMENTUM</div>
					<div class="list_img"><img src="/images/cars/xc60/2021_02/price_car_img_01.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>B5 AWD</li>
						<li>60,900,000</li>
					</ul>
				</li>

				<li class="list list_04">
					<div class="list_title">INSCRIPTION</div>
					<div class="list_img"><img src="/images/cars/xc60/2021_02/price_car_img_02.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>B5 AWD</li>
						<li>67,000,000</li>
					</ul>
				</li>

				<li class="list list_05">
					<div class="list_title">INSCRIPTION</div>
					<div class="list_img"><img src="/images/cars/xc60/2021_02/price_car_img_03.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>B6 AWD</li>
						<li>71,000,000</li>
					</ul>
				</li>

				<li class="list list_02">
					<div class="list_title">INSCRIPTION</div>
					<div class="list_img"><img src="/images/cars/xc60/price_car_img_02_new.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
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
	</div>
</div>


<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>
