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
<div id="contents" class="s60">
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
					<div class="sti">TAKE THE LEAD</div>
					<div class="ti">THE VOLVO S60</div>
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
					<div class="ti">A DYNAMIC PRESENCE</div>
					<div class="txt">자신만만하고 스포티하며 우아한 S60은 좋은 스칸디나비아 디자인이란 어떤 것인지를 보여줍니다.<br>
						조용히 자신감을 발산하는 역동적인 세단입니다.<br>
						간결하고 선명한 디테일은  S60 특유의 힘을 부각시키고, 날렵한 실루엣은 드라이빙의 열정을 일깨웁니다.
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_03">
				<div class="cont_wrap">
					<div class="ti">INCREDIBLE SOUND</div>
					<div class="txt">볼보 S60에서 좋아하는 음악의 선명하고 디테일한 사운드에 빠져 보십시오.<br>
						볼보는 세계 최고의 오디오 제조사와 협력하여 좋아하는 음악에 더욱 가깝게 다가갈 수 있는 청취 경험을 만들어 냈습니다. 
					</div>
					<div class="btn_link"><a href="#" target="_blank">자세히 보기 <span>></span></a></div>
				</div>
			</div>
			<div class="slide_sub slide_04">
				<div class="cont_wrap">
					<div class="ti">CREATED FOR DRIVING</div>
					<div class="txt">S60은 드라이빙의 열정을 불어넣는 차입니다.<br>
						역동적인 개성으로 감각을 일깨우고 드라이빙이 즐거워지는 차.<br>
						우아하고 완벽하게 균형을 이룬 S60에서는 장거리 주행의 정제된 승차감과 자릿하고 역동적인 드라이빙이 모두 가능합니다. 
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
					<li class="ov" style="width:100%"><a href="javascript:void(0);">가솔린</a></li>
				</ul>
			</div>
			<div class="spec_cont spec_cont_01">
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
							<div class="list_val">4,760</div>
						</li>
						<li>
							<div class="list_name">전폭<span>(mm)</span></div>
							<div class="list_val">1,850</div>
						</li>
						<li>
							<div class="list_name">전고<span>(mm)</span></div>
							<div class="list_val">1,430</div>
						</li>
						<li>
							<div class="list_name">공차중량<span>(kg)</span></div>
							<div class="list_val">1,700</div>
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
							<div class="list_val">전륜구동</div>
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
							<div class="list_val">18” | 235/45R</div>
						</li>
						<li>
							<div class="list_name">휠/타이어<span>Inscription</span></div>
							<div class="list_val">19” | 235/40R</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">PERFORMANCE</div>
					<ul>
						<li>
							<div class="list_name">0~100km/h 가속<span>(초)</span></div>
							<div class="list_val">6.5</div>
						</li>
					</ul>
				</div>
				<div class="spec_list">
					<div class="sti">FUEL</div>
					<ul>
						<li>
							<div class="list_name">정부공인표준연비 (복합)<span>(km/ℓ)</span></div>
							<div class="list_val">10.8</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (도심)<span>(km/ℓ)</span></div>
							<div class="list_val">9.2</div>
						</li>
						<li>
							<div class="list_name">정부공인표준연비 (고속도로)<span>(km/ℓ)</span></div>
							<div class="list_val">13.8</div>
						</li>
						<li>
							<div class="list_name">에너지소비효율등급<span>(등급)</span></div>
							<div class="list_val">4</div>
						</li>
						<li>
							<div class="list_name">CO₂배출량<span>(g/km)</span></div>
							<div class="list_val">158</div>
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
					<li class="th"><div class="ti">SAFETY</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="sti">인텔리세이프 어시스트</li>
					<li class="td"><div class="ti under">- 어댑티브 크루즈 컨트롤</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 파일럿 어시스트</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 거리 경보</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 운전자 경보 제어</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 차선 유지 보조</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 이탈 방지 및 보호</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 도로 표시 정보</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 시티 세이프티</div>
						<div class="o"></div><div class="o"></div>
					</li>

					<li class="sti">인텔리세이프 서라운드</li>
					<li class="td"><div class="ti under">- 사각지대 정보</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti under">- 측후방 경보</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td last"><div class="ti under">- 후방 추돌 경고</div>
						<div class="o"></div><div class="o"></div>
					</li>

					<li class="td"><div class="ti">지능형 운전자 정보 시스템</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 에어백</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">사이드 에어백 및 커튼형 에어백</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 경추 보호 시트</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SUPPORT & SECURITY SYSTEM</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">LED 헤드 램프</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">액티브 하이빔 제너레이션 I</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">액티브 하이빔 제너레이션 II</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 램프 클리닝</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">코너링 램프</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전방 안개등</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">눈부심 방지 룸 미러 & 아웃사이드 미러</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">헤드 업 디스플레이</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 센서</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 파일럿</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">파크 어시스트 (후방) 카메라</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">360°서라운드 뷰 카메라</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">키리스 엔트리 & 리모트 태그</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">차일드 도어락</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">POWERTRAIN & CHASSIS</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">DRIVE-E 엔진</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">8단 자동 기어트로닉 변속기</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스타트/스톱 시스템</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">드라이브 모드 셀렉터</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">다이내믹 섀시</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">힐 스타트 어시스트</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">EXTERIOR</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">DRIVE-E 엔진</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">8단 자동 기어트로닉 변속기</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스타트/스톱 시스템</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">드라이브 모드 셀렉터</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">다이내믹 섀시</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">힐 스타트 어시스트</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">INTERIOR & SEATS</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">12.3인치 디지털 디스플레이 인스트루먼트 클러스터</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">9인치 터치 스크린 센터 디스플레이</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">3-스포크 유니 데코 인레이 레더 스티어링 휠</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스티어링 휠 히팅</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">리니어 라임 데코 인레이</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">인스크립션 드리프트 우드 데코 인레이</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인스크립션 테일러드 인스트루먼트 패널 마감</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">인테리어 일루미네이션 - 하이 레벨</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">컴포트 레더 시트</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">나파 레더 시트</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 시트 및 운전석 메모리 기능</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">조수석 메모리 기능</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 럼버 서포트</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 쿠션 익스텐션</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 전동 사이드 서포트</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 마사지 시트</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">뒷좌석 히팅 시트</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">앞좌석 벤틸레이티드 시트</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">트레드 플레이트 실몰딩 - VOLVO</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CLIMATE</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">실내 공기 청정 시스템</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">클린 존 인테리어</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">2-구역 독립 온도 조절 시스템</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">4-구역 독립 온도 조절 시스템</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전면 윈드 스크린 워셔 노즐 히팅</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">전동식 파노라마 선루프</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">SENSUS SYSTEM</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">하이 퍼포먼스 사운드 시스템</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">Bowers & Wilkins 프리미엄 사운드 시스템</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">서브우퍼</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">스마트폰 인테그레이션</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">USB 포트</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">블루투스</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">내비게이션</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">WHEELS & TIRES</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">18” 5-오픈 스포크 블랙 다이아몬드 컷</div>
						<div class="o"></div><div></div>
					</li>
					<li class="td"><div class="ti">19” 5-멀티 스포크 블랙 다이아몬드 컷</div>
						<div></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">타이어 공기압 모니터링 시스템</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<ul class="option_list">
					<li class="th"><div class="ti">CARGO AREA</div><div>T5<span>MMT</span></div><div>T5<span>INS</span></div>
					<li class="td"><div class="ti">비상용 삼각대</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">12V 아웃렛</div>
						<div class="o"></div><div class="o"></div>
					</li>
					<li class="td"><div class="ti">타이어 리페어 키트</div>
						<div class="o"></div><div class="o"></div>
					</li>
				</ul>

				<div class="caption">※ 표기된 사양은 사전 예고 없이 변경될 수 있으며 실제 차량과 차이가 있을 수 있습니다. 정확한 사양은 전시장으로 문의 바랍니다. (2019년 8월 기준)</div>
			</div>
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">S60</div>
			<ul	class="price_list">
				<li class="list_ti">
					<div class="th">ENGINE</div>
					<div class="th">TRIM</div>
					<div class="th">MSRP</div>
				</li>
				<li class="list_txt">
					<div class="td">T5</div>
					<div class="td">Momentum</div>
					<div class="td">47,600,000</div>					
				</li>
				<li class="list_txt">
					<div class="td">T5</div>
					<div class="td">Inscription</div>
					<div class="td">53,600,000</div>					
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
