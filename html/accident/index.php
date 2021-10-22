<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "accident";
$FOOTER_CODE = "support";
$TITLE = "사고접수";

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

        <div id="visual">
            <img src="/images/<?=$CODE?>/img-1.jpg" alt="">
            <a href="tel:1588-1777" class="tit">고객지원센터 연결</a>
        </div>

        <div class="container">

			<ul class="tab">
				<li><a class="on"><i></i>보행인 충격 사고</a></li>
				<li><a><i></i>차량 대 차량 사고</a></li>
				<li><a><i></i>차량 단독 사고</a></li>
			</ul>		
			
			<div class="tab_cont on">
				<div class="box">
					<ul>
						<li>
							<strong>STEP 1</strong>
							<span>119 신고 및 인근 병원 구호조치</span>
						</li>
						<li>
							<a href="tel:119"><i></i>119 전화하기</a>
						</li>
						<li>
							<strong>STEP 2</strong>
							<span>목격자 확보 및 보험 회사 통보</span>
						</li>
						<li>
							<a href="javascript: void(0)" onclick="showCallPop()"><i></i>보험사별 콜센터</a>
						</li>
						<li>
							<strong>STEP 3</strong>
							<span>경찰서 신고 (법률상 의무 사항)</span>
						</li>
						<li>
							<a href="tel:112"><i></i>112 전화하기</a>
						</li>
					</ul>
				</div>
			</div>

            <div class="tab_cont">
				<div class="box">
					<h6>공통사항</h6>
					<ul>
						<li>
							<strong>STEP 1</strong>
							<span>보험회사 사고 접수 및 현장 출동 요청</span>
						</li>
						<li>
							<a href="javascript: void(0)" onclick="showCallPop()"><i></i>보험사별 콜센터</a>
						</li>
						<li>
							<strong>STEP 2</strong>
							<span>사고 장소 및 최종 정차 위치 표시</span>
						</li>
						<li>
							<strong>STEP 3</strong>
							<span>사진 촬영 또는 사고 현장 약도 표시.<br>상대 차량 정보 확인(차종/번호/색상/등록증 등)</span>
						</li>
						<li>
							<strong>STEP 4</strong>
							<span>상대 차량 운전자 인적 사항 및 보험 회사 파악</span>
						</li>
					</ul>
				</div>
				<div class="box">
					<h6>피해자가 있는 경우</h6>
					<p>피해자 성명 / 성별 / 탑승위치 / 연락처 및 구호 조치</p>
				</div>
				<div class="box">
					<h6>차량이 파손된 경우</h6>
					<ul>
						<li>
							<strong>STEP 1</strong>
							<span>상대 차량의 파손 부위 및 사진 촬영</span>
						</li>
						<li>
							<strong>STEP 2</strong>
							<span>자차 파손 시 상대방에게 통보</span>
						</li>
					</ul>
				</div>
				<div class="box">
					<h6>본인 부상의 경우</h6>
					<ul>
						<li>
							<strong>STEP 1</strong>
							<span>상대방에게 부상 부위 및 인적 사항 알림</span>
						</li>
						<li>
							<strong>STEP 2</strong>
							<span>치료 병원 / 위치 / 연락처 통보 및 대안 접수 요청</span>
						</li>
					</ul>
				</div>
			</div>

			<div class="tab_cont">
				<div class="box">
					<ul>
						<li>
							<strong>STEP 1</strong>
							<span>보험회사 사고 접수 및 현장 출동 요청</span>
						</li>
						<li>
							<a href="javascript: void(0)" onclick="showCallPop()"><i></i>보험사별 콜센터</a>
						</li>
						<li>
							<strong>STEP 2</strong>
							<span>피해물 종류 / 정확한 위치 / 파손정보 확인 및 사진촬영</span>
						</li>
						<li>
							<strong>STEP 3</strong>
							<span>최소 10m ~ 최대 50m 후방에 고장 표시판 설치 및 견인요청 </span>
						</li>
					</ul>
				</div>
				<p>도로상에 돌이나 물건 및 기타 장애물로 인한 사고사
					<br>(구상 가능할 경우, 경찰서 신고 후 근거자료 확보)</p>
			</div>
        </div>
    </div>

    <div id="callcenter_pop" style="display: none;">
        <div class="call_wrap">
            <div class="top">
                <img src="/images/accident/ic_24.png" alt="">
                <strong>보험사별 24시간 콜센터</strong>
                <a class="close" href="javascript: void(0)"><img src="/images/accident/ic_close.png" alt=""></a>
            </div>

            <div class="middle">
                <div class="call_list">
                    <ul>
                        <li>
                            <div class="box-txt">
                                <p>KB손해보험(LIG)</p>
                                <span>1544-0114</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1544-0114"><img src="/images/accident/ic_call.png" alt="">Call</a>
                            </div>
                        </li>
                        <li>
                            <div class="box-txt">
                                <p>동부화재</p>
                                <span>1588-0100</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1588-0100"><img src="/images/accident/ic_call.png" alt="">Call</a>
                            </div>
                        </li>
                        <li>
                            <div class="box-txt">
                                <p>메리츠화재</p>
                                <span>1566-7711</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1566-7711"><img src="/images/accident/ic_call.png" alt="">Call</a>
                            </div>
                        </li>
                        <li>
                            <div class="box-txt">
                                <p>삼성화재(애니카 다이렉트)</p>
                                <span>1588-5114</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1588-5114"><img src="/images/accident/ic_call.png" alt="">Call</a>
                            </div>
                        </li>
                        <li>
                            <div class="box-txt">
                                <p>한화손해</p>
                                <span>1566-8000</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1566-8000"><img src="/images/accident/ic_call.png" alt="">Call</a>
                            </div>
                        </li>
                        <li>
                            <div class="box-txt">
                                <p>현대해상</p>
                                <span>1588-5656</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1588-5656"><img src="/images/accident/ic_call.png" alt="">call</a>
                            </div>
                        </li>
                        <li>
                            <div class="box-txt">
                                <p>흥국화재</p>
                                <span>1688-1688</span>
                            </div>
                            <div class="box-btn">
                                <a href="tel:1688-1688"><img src="/images/accident/ic_call.png" alt="">call</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="/html/<?=$CODE?>/script.js"></script>

    <script>
        $('#callcenter_pop .close').on('click', function() {
            $('#callcenter_pop').fadeOut(400);
        });

        function showCallPop() {
            $('#callcenter_pop').fadeIn(400);
        }
    </script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>