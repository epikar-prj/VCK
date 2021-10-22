<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "center";
    $FOOTER_CODE = "service";
    $TITLE = "서비스센터 안내";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./style.css">
<script src="./map.js"></script>
<script src="./script.js"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e031aed38dd1fded16e62028409f63fe"></script>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/service.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
   
    <div class="container">
		<div class="search">
			<div class="search_total"><span class="total_num">26</span>개의 서비스센터가 검색되었습니다</div>
			<div class="search_inner">
				<div class="search_select">
					<select id="area">
						<option selected value="전체">전체</option>
						<option value="서울">서울</option>
						<option value="경기도">경기도</option>
						<option value="충청도">충청도</option>
						<option value="강원도">강원도</option>
						<option value="경상도">경상도</option>
						<option value="전라도">전라도</option>
						<option value="인천">인천</option>
						<option value="대전">대전</option>
						<option value="대구">대구</option>
						<option value="광주">광주</option>
						<option value="부산">부산</option>
						<option value="울산">울산</option>
						<option value="제주도">제주도</option>
					</select>
				</div>
				<div class="search_input">
						<input id="search_input" placeholder="찾으시는 지역을 검색해보세요" autocomplete="off"></input>
				</div>
				<div class="search_toggle">
					<a href="javascript:map_list_show();"><img src="./../../images/center/toggle_list.png"></a>
				</div>
			</div>
			<div class="btn_myposition">
				<a href="javascript:myposition();">내주변 서비스센터 찾기</a>
			</div>
		</div>
		<div class="map_wrap">
			<div class="map" id="map"></div>
			<div class="btn_map_zoom">
				<div class="btn_plus">
					<a href="javascript:zoomIn();"><img src="./../../images/center/btn_zoom_plus.png"></a>
				</div>
				<div class="btn_minus">
					<a href="javascript:zoomOut();"><img src="./../../images/center/btn_zoom_minus.png"></a>
				</div>
			</div><!-- map end -->
			<div class="result_list">
				<ul class="service">
					<li class="ov">
						<div class="list_btn">
							<div class="title">볼보 강남 대치 서비스센터</div>
							<div class="btn_like"><a href="javascript:void(0);"></a></div>
						</div>
						<div class="list_cont">
							<!--<div class="detail_img"></div>-->
							<div class="detail_cont">
								<ul>
									<li><em>주소</em><span>서울동대문구 천호대로 373(장안동 414-6)</span></li>
									<li><em>대표번호</em><span>1644-0322</span></li>
									<li><em>FAX</em><span>02-464-5453</span></li>
									<li><em>영업시간</em><span>평일 9:00 ~ 21:00 / 주말,공휴일 9:00 ~ 20:00</span></li>
								</ul>
							</div>
							<div class="btn_close"><a href="">지도에서 위치 확인</a></div>
						</div>
					</li>

					<li class="ov">
						<div class="list_btn">
							<div class="title">볼보 강남 대치 서비스센터</div>
							<div class="btn_like"><a class="check" href="javascript:void(0);"></a></div>
						</div>
						<div class="list_cont">
							<!--<div class="detail_img"></div>-->
							<div class="detail_cont">
								<ul>
									<li><em>주소</em><span>서울동대문구 천호대로 373(장안동 414-6)</span></li>
									<li><em>대표번호</em><span>1644-0322</span></li>
									<li><em>FAX</em><span>02-464-5453</span></li>
									<li><em>영업시간</em><span>평일 9:00 ~ 21:00 / 주말,공휴일 9:00 ~ 20:00</span></li>
								</ul>
							</div>
							<div class="btn_close"><a href="">지도에서 위치 확인</a></div>
						</div>
					</li>

					<li>
						<div class="list_btn">
							<div class="title">볼보 강남 대치 서비스센터</div>
							<div class="btn_like"><a href=""></a></div>
						</div>
						<div class="list_cont">
							<!--<div class="detail_img"></div>-->
							<div class="detail_cont">
								<ul>
									<li><em>주소</em><span>서울동대문구 천호대로 373(장안동 414-6)</span></li>
									<li><em>대표번호</em><span>1644-0322</span></li>
									<li><em>FAX</em><span>02-464-5453</span></li>
									<li><em>영업시간</em><span>평일 9:00 ~ 21:00 / 주말,공휴일 9:00 ~ 20:00</span></li>
								</ul>
							</div>
							<div class="btn_close"><a href="">지도에서 위치 확인</a></div>
						</div>
					</li>
				</ul>
			</div><!-- result_list end -->
		</div>

    </div>

</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>