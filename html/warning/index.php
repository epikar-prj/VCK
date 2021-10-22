<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "warning";
    $FOOTER_CODE = "support";
    $TITLE = "경고등 안내";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/main/index.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container" >

		<div class="warning_tab">
			<div class="btn_group">
				<a class="btn on" href="#">운전자 화면의 경고등</a>
				<a class="btn" href="#">운전자 화면의 표시등</a>
			</div>
		</div>

		<div class="warning_tab_content warning_1 on">
			<p class="top_text">경고등은 중요한 기능이 켜졌거나 시스템에 심각한 오류나 결함이 발생했음을 운전자에게 알려줍니다.</p>
			<ul class="light_list">
				<li>
					<a href="#"><img src="/images/warning/warning_01.png" alt=""><span>경고</span></a>
					<p>차량의 안전이나 운전성에 영향을 미칠 수 있는 결함을 나타 낼 때 빨간색 경고등이 점등됩니다. 동시에 안내 메시지가 운전자 화면에 표시됩니다. 경고등은 다른 심벌과 함께 점등 될 수도 있습니다.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_02.png" alt=""><span>안전벨트 착용 표시등</span></a>
					<p>앞좌석의 누군가 안전벨트를 착용하지 않은 경우에 또는 뒷좌석의 누군가 안전벨트를 풀었을 경우에 이 심벌이 켜지거나 깜박입니다.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_03.png" alt=""><span>에어백</span></a>
					<p>심벌이 점등된 상태를 유지하거나 주행 중 점등되는 경우에는 차량의 안전 시스템 중 하나에서 결함이 탐지된 것입니다. 운전자 화면의 메시지를 읽어 보십시오. 볼보는 볼보 서비스 센터에 연락할 것을 권장합니다.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_04.png" alt=""><span>브레이크 시스템의 결함</span></a>
					<p>이 심벌이 점등되는 경우에는 브레이크액 레벨이 너무 낮을 수 있습니다. 가까운 볼보 서비스 센터를 방문하여 브레이크액 레벨 점검을 받은 후 문제를 해결하십시오.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_05.png" alt=""><span>주차 브레이크 작동됨</span></a>
					<p>주차 브레이크가 작동되면 이 심벌이 점등 상태를 유지합니다. 심벌이 깜박이면 문제가 발생했다는 것을 의미합니다. 운전자 화면의 메시지를 읽어 보십시오.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_06.png" alt=""><span>오일 압력 낮음</span></a>
					<p>주행 중 이 심벌이 점등되는 경우에는 엔진 오일 압력이 너무 낮은 것입니다. 즉시 엔진을 정지시킨 후 엔진 오일 레벨을 점검하고 필요한 경우 보충하십시오. 심벌이 점등되었는데 오일 레벨이 정상인 경우에는 볼보 서비스 센터로 연락하십시오. 볼보는 볼보 서비스 센터에 연락할 것을 권장합니다.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_07.png" alt=""><span>알터네이터 충전되지 않음</span></a>
					<p>전기 시스템에 문제가 발생하는 경우에는 주행 중 이 심벌이 점등됩니다. 볼보 서비스 센터를 방문하십시오. 볼보는 볼보 서비스 센터에 연락할 것을 권장합니다.</p>
				</li>
				<li>
					<a href="#"><img src="/images/warning/warning_08.png" alt=""><span>충돌 위험</span></a>
					<p>시티 세이프티(City Safety)는 다른 차량, 보행자, 자전거 이용자 또는 큰 동물과의 충돌 위험을 경고합니다.</p>
				</li>
			</ul>
		</div>

		<div class="warning_tab_content warning_2">
			<p class="top_text">표시등은 기능의 활성화, 시스템 작동 또는 결함이나 비정상적인 상태가 발생했음을 운전자에게 알려줍니다.</p>
			<div class="sub_tab">
				<a href="#" class="on">노란색 램프</a>
				<a href="#">초록색 램프</a>
				<a href="#">기타색 램프</a>
			</div>
			<div class="light_wrap light_y on">
				<h4>노란색 램프</h4>
				<ul class="light_list">
					<li>
						<a href="#"><img src="/images/warning/warning_y_01.png" alt=""><span>배기 시스템</span></a>
						<p>엔진 시동이 걸린 후에 이 심벌이 켜지면 차량의 배기 시스템의 결함 때문일 수 있습니다. 볼보 서비스 센터로 가서 점검을 받으십시오. 볼보는 볼보 서비스 센터에 연락할 것을 권장합니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_02.png" alt=""><span>브레이크 시스템의 결함</span></a>
						<p>주차 브레이크에 결함이 있는 경우에 이 심벌이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_03.png" alt=""><span>스태빌리티 시스템</span></a>
						<p>이 표시등이 깜박이면 스태빌리티 시스템이 작동하고 있는 것입니다. 이 표시등이 지속적으로 켜지면 시스템에 결함이 있는 것입니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_04.png" alt=""><span>스태빌리티 시스템 스포츠 모드</span></a>
						<p>스포츠 모드가 활성화되면 이 표시등이 켜집니다. 스포츠 모드에 놓으면 보다 액티브한 운전이 가능합니다. 그러면 시스템은 가속 페달, 스티어링휠 움직임 및 코너링이 정상 주행 시보다 적극적인지 여부를 감지한 후 이 기능이 개입하여 차량을 안정화시키기 전에 차량의 특정 뒷부분에 일정 수준의 제어된 미끄러짐을 허용합니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_05.png" alt=""><span>전조등 시스템의 결함</span></a>
						<p>ABL 기능(Active Bending Lights: 액티브 벤딩 라이트)에 결함이 발생하거나 전조등 시스템에 다른 결함이 발생하는 경우에 이 심벌이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_06.png" alt=""><span>정보, 판독한 디스플레이 텍스트</span></a>
						<p>차량의 시스템 중 하나가 원래대로 작동하지 않는 경우에 운전자 화면에 이 정보성 심벌이 켜지며 문자 메시지가 표시됩니다. 정보 심벌은 다른 심벌과 함께 점등될 수도 있습니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_07.png" alt=""><span>타이어 공기압 시스템</span></a>
						<p>타이어 공기압이 너무 낮을 때 이 심벌이 켜집니다. 타이어 공기압 시스템에 결함이 있는 경우에는 이 심벌이 약 1분 동안 깜박인 후 지속적으로 점등됩니다. 이는 시스템이 탐지를 할 수 없거나 타이어 공기압이 낮다는 경고일 수 있습니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_08.png" alt=""><span>후방 안개등 켜짐</span></a>
						<p>후방 안개등이 켜지면 이 표시등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_09.png" alt=""><span>ABS 결함</span></a>
						<p>이 심벌이 켜지면 시스템이 작동하지 않습니다. 차량의 일반 브레이크 시스템은 계속해서 작동하지만 ABS 기능이 작동하지 않습니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_y_10.png" alt=""><span>AdBlue 시스템(디젤)</span></a>
						<p>배출가스 제어 시스템은 AdBlue의 레벨, 품질 및 사용량을 지속적으로 모니터링합니다. 무언가 잘못되는 경우에는 운전자 화면에 메시지가 표시됩니다.</p>
					</li>
				</ul>
			</div>
			<div class="light_wrap light_g">
				<h4>초록색 램프</h4>
				<ul class="light_list">
					<li>
						<a href="#"><img src="/images/warning/warning_g_01.png" alt=""><span>자동 제동 켜짐</span></a>
						<p>기능이 활성화되면 이 심벌이 켜지고 페달 브레이크 또는 주차 브레이크가 작동합니다. 차량이 정지했을 때 브레이크는 차량을 정지 상태로 유지합니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_g_02.png" alt=""><span>전방 안개등 켜짐</span></a>
						<p>전방 안개등이 켜지면 이 표시등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_g_03.png" alt=""><span>좌측 및 우측 방향지시등</span></a>
						<p>방향지시등을 사용하면 심벌이 깜박입니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_g_04.png" alt=""><span>차폭등</span></a>
						<p>차폭등이 점등되면 이 심벌이 켜집니다.</p>
					</li>
				</ul>
			</div>
			<div class="light_wrap light_etc on">
				<h4>기타 램프</h4>
				<ul class="light_list">
					<li>
						<a href="#"><img src="/images/warning/warning_etc_01.png" alt=""><span>레인 센서 켜짐</span></a>
						<p>레인 센서가 켜지면 이 표시등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_02.png" alt=""><span>사전 조절 켜짐</span></a>
						<p>엔진 블록과 실내 히터/에어컨이 엔진 온도와 실내 온도를 사전 조절하고 있으면 이 표시등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_03.png" alt=""><span>상향 전조등 켜짐</span></a>
						<p>상향 전조등 점멸 기능을 이용해 상향 전조등을 켜면 이 표시등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_04.png" alt=""><span>상향 전조등 켜짐</span></a>
						<p>상향 전조등과 차폭등이 켜지면 이 표시등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_05.png" alt=""><span>자동 상향 전조등 꺼짐</span></a>
						<p>자동 상향 전조등이 꺼지면 이 표시등이 백색으로 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_06.png" alt=""><span>자동 상향 전조등 꺼짐</span></a>
						<p>자동 상향 전조등이 꺼지면 이 표시등이 백색으로 켜집니다. 차폭등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_07.png" alt=""><span>자동 상향 전조등 켜짐</span></a>
						<p>자동 상향 전조등이 켜지면 이 표시등이 청색으로 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_08.png" alt=""><span>자동 상향 전조등 켜짐</span></a>
						<p>자동 상향 전조등이 켜지면 이 표시등이 청색으로 켜집니다. 차폭등이 켜집니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_09.png" alt=""><span>차선유지 지원 시스템</span></a>
						<p>백색 표시등: 차선유지 지원 시스템이 켜지고 차선 표시가 탐지됩니다. <br>회색 표시등: 차선유지 지원 시스템이 켜지지만 차선 표시가 탐지되지 않습니다. <br>주황색 심벌: 차선유지 지원 시스템이 경고를 보내고 조향에 개입합니다.</p>
					</li>
					<li>
						<a href="#"><img src="/images/warning/warning_etc_10.png" alt=""><span>차선유지 지원 시스템 및 레인 센서</span></a>
						<p>백색 표시등: 차선유지 지원 시스템이 켜지고 차선 표시가 탐지됩니다. 레인 센서가 켜져 있습니다. <br>회색 표시등: 차선유지 지원 시스템이 켜지지만 차선 표시가 탐지되지 않습니다. 레인 센서가 켜져 있습니다.</p>
					</li>
				</ul>
			</div>
		</div>
    </div>
</div>
<script src="/html/warning/script.js"></script>
<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>