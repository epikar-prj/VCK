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
<div id="contents" class="v90">
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
					<div class="sti">BEAUTY AND FUNCTION IN HARMONY</div>
					<div class="ti">Cross Country (V90)</div>
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
					<div class="ti">YOUR SOPHISTICATED ADVENTURE AWAITS</div>
					<div class="txt">고성능 전천후 차량인 볼보 크로스컨트리(V90)는 어떤 모험에도 어울리는 자동차로 만들어졌습니다. 깔끔하고 간결한 라인과 강인한 크로스컨트리의 디테일은 파워풀한 모습을 완성하고, 볼보 왜건 특유의 실용성과 다양한 기능뿐 아니라 강력한 성능도 갖췄습니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">READY FOR EVERY OCCASION</div>
					<div class="txt">볼보 크로스컨트리(V90)는 다목적성 기능을 갖추고 있어 일상을 더욱 편하게 만들고, 항상 더 많은 것을 이뤄낼 수 있도록 합니다. 볼보 크로스컨트리(V90)의 트렁크 모양은 싣기 까다로운 짐도 손쉽게 실을 수 있도록 하며, 버튼을 눌러 뒷좌석을 접으면 더 커진 적재공간을 확보할 수 있습니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">ENJOYING MORE, USING LESS</div>
					<div class="txt">성능과 효율이 완벽한 균형을 이루는 볼보의 모든 파워트레인은 뛰어난 주행성능은 물론 우수한 연비와 배기가스 저감까지 잡았습니다.<br>
						저마찰 경량 엔진 설계와 첨단 부스팅 기술이 결합되어 탁월한 성능과 매끄럽고 민첩한 드라이빙 경험을 즐길 수 있습니다. 
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
					<li class="ov" style="width:calc((100% - 7px)/2);"><a href="javascript:pop_spec_tab(1);">디젤</a></li>
					<li style="width:calc((100% - 7px)/2);"><a href="javascript:pop_spec_tab(2);">가솔린</a></li>
				</ul>
			</div>

			<div class="spec_cont spec_cont_01">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">D5</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">4,940</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,905</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,510</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">1,955</div>
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
							<div class="list_name">휠/타이어<span>Cross Country(V90)</span></div>
							<div class="list_val">18” | 235/55R</div>
						</li>
						<li>
							<div class="list_name">휠/타이어<span>Cross Country(V90) Pro</span></div>
							<div class="list_val">19” | 235/50R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">7.5</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">12.6</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">11.0</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">15.4</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">3</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">152</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태, 운전방법, 차량적재, 정비상태 및 외기온도에 따라 실주행연비와 차이가 있습니다.</div>
				<div class="caption">※ 본 사이트에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2019년 8월 기준)</div>
			</div>

			<div class="spec_cont spec_cont_02" style="display:none;">
				<div class="pop_tab engine">
					<div class="sti">엔진 이름</div>
					<ul class="tab_list">
						<li class="ov"><a href="javascript:void(0);">T5</a></li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">SPECIFICAIONS</div>
					<ul>
						<li>
							<div class="list_name">전장<span>(mm)</span></div>
							<div class="list_val">4,940</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,905</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,510</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">1,875</div>
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
							<div class="list_val">254/5,500</div>
						</li>
						<li>
							<div class="list_name">최대 토크<span>(kg·m/rpm)</span></div>
							<div class="list_val">35.7/1,500~4,800</div>
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
							<div class="list_name">휠/타이어<span>Cross Country(V90)</span></div>
							<div class="list_val">18” | 235/55R</div>
						</li>
						<li>
							<div class="list_name">휠/타이어<span>Cross Country(V90) Pro</span></div>
							<div class="list_val">19” | 235/50R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">7.4</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">10.9</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">9.5</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">13.1</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">4</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">159</div>
						</li>
					</ul>
				</div>
				<div class="caption">※ 위 연비는 표준모드에 의한 연비로서 도로상태, 운전방법, 차량적재, 정비상태 및 외기온도에 따라 실주행연비와 차이가 있습니다.</div>
				<div class="caption">※ 볼보자동차의 모든 가솔린 모델은, 글로벌 규정에 따라 옥탄가 95이상의 연료(국내 기준 고급 휘발유)를 사용하도록 명시하고 있습니다. 자세한 내용은 매뉴얼을 참고해주시기 바랍니다.</div>
				<div class="caption">※ 본 사이트에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다. (2019년 8월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_option" style="display:none;">
			<h4>OPTIONS</h4>		

			<div class="option_list_wrap">
				<ul class="option_list">
					<li class="th"><div class="ti">SAFETY</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="sti">인텔리세이프 어시스트</li>
					<li class="td"><div class="ti under">- 어댑티브 크루즈 컨트롤</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 파일럿 어시스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 거리 경보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 운전자 경보 제어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 차선 유지 보조</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 이탈 방지 및 보호</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 표시 정보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 시티 세이프티</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>

					<li class="sti">인텔리세이프 서라운드</li>
					<li class="td"><div class="ti under">- 사각지대 정보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 측후방 경보</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 후방 추돌 경고</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>

					<li class="td"><div class="ti">지능형 운전자 정보 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사이드 에어백 및 커튼형 에어백</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 경추 보호 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SUPPORT & SECURITY SYSTEM</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">LED 헤드 램프 및 액티브 하이빔</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전방 안개등</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">이중 접합 라미네이티드 윈도</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">눈부심 방지 룸 미러 & 아웃사이드 미러</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 업 디스플레이</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 센서</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 파일럿</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 (후방) 카메라</div>
						<div class="o"></div><div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">360°서라운드 뷰 카메라</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">키리스 엔트리 및 핸즈프리 트렁크 오픈 & 리모트 태그</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">차일드 도어락</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">프라이빗 락</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">POWERTRAIN & CHASSIS</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">DRIVE-E 엔진</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">8단 자동 기어트로닉 변속기</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사륜구동</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스타트/스톱 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">드라이브 모드 셀렉터</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">투어링 섀시</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">힐 스타트 어시스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">경사로 감속 주행 장치</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">EXTERIOR</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">크로스 컨트리 메시 그릴</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">블랙 휠 아치</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">컬러 코디네이티드 도어 핸들</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">하이 글로스 블랙 데코 사이드 윈도</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">브라이트 인티그레이티드 루프 레일</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">듀얼 인티그레이티드 이그조스트 테일 파이프</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">INTERIOR & SEATS</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">9인치 터치 스크린 센터 디스플레이</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">3-스포크 유니 데코 인레이 레더 스티어링 휠</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스티어링 휠 히팅</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">다크 월넛 데코 인레이</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">테일러드 인스트루먼트 패널 마감</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인테리어 일루미네이션 - 하이 레벨</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">컴포트 레더 시트</div>
						<div class="o"></div><div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">나파 레더 시트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 시트 및 메모리 기능</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 럼버 서포트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 쿠션 익스텐션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 사이드 서포트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 마사지 시트</div>
							<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 벤틸레이티드 시트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">트레드 플레이트 실몰딩 일루미네이션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 폴딩 백레스트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 파워폴딩 헤드레스트</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">센터 터널 230V 아웃렛</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CLIMATE</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">실내 공기 청정 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">클린 존 인테리어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">4-구역 독립 온도 조절 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 측면 윈도 선 블라인드</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전면 윈드 스크린 워셔 노즐 히팅</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전동식 파노라믹 선 루프</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SENSUS SYSTEM</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">하이 퍼포먼스 사운드 시스템</div>
						<div class="o"></div><div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">Bowers & Wilkins 프리미엄 사운드 시스템</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">서브우퍼</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스마트폰 인테그레이션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">USB 포트</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">블루투스</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">내비게이션</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">WHEELS & TIRES</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">18” 5-더블 스포크 블랙 다이아몬드 컷</div>
						<div class="o"></div><div></div><div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">19” 6-더블 스포크 테크 매트 블랙 다이아몬드 컷</div>
						<div></div><div class="o"></div><div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">타이어 공기압 모니터링 시스템</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CARGO AREA</div><div>D5 AWD<span>CC<br><br></span></div><div>D5 AWD<span>CC PRO</span></div><div>T5 AWD<span>CC<br><br></span></div><div>T5 AWD<span>CC PRO</span></div>
					<li class="td"><div class="ti">자동 로드커버</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전동식 트렁크</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">비상용 삼각대</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">12V 아웃렛</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">템퍼러리 스페어 타이어</div>
						<div class="o"></div><div class="o"></div><div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<div class="caption">※ 표기된 사양은 사전 예고 없이 변경될 수 있으며 실제 차량과 차이가 있을 수 있습니다. (2019년 8월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">V90</div>
			<ul	class="price_list">
				<li class="list_ti">
					<div class="th">ENGINE</div>
					<div class="th">TRIM</div>
					<div class="th">MSRP</div>
				</li>
				<li class="list_txt">
					<div class="td">D5 AWD</div>
					<div class="td">Cross Country Pro</div>
					<div class="td">76,900,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">T5 AWD</div>
					<div class="td">Cross Country Pro</div>
					<div class="td">73,900,000</div>					
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
