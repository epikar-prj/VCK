<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "selekt";
    $FOOTER_CODE = "buy";
    $TITLE = "인증 중고차";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./style.css">

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/buy.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="visual">
       <img src="/images/selekt/visual.jpg">
    </div>
    <div class="container" id="selekt">
		<p>볼보 셀렉트(Volvo Selekt)는 180가지의 엄격한 기술적 점검을 통과한 최상의 품질이 검증된 인증 중고차량으로 구성되며 최대 1년 무상 보증수리 프로그램, 24시간 긴급 출동 서비스와 차량 반납 프로그램 등과 같은 차별화된 서비스 및 혜택을 고객분들에게 제공합니다.<br>
		   신차와 버금가는 안전성과 성능을 보장하는 볼보 셀렉트 인증 중고차를 경험해보십시오.</p>
		<div class="btn_link"><a href="https://selekt.volvocars.co.kr/kr/vehicle-search" target="_blank">차량 보러가기</a></div>
		<ul class="selekt_list">
			<li>
				<div class="selekt_map"><img src="/images/selekt/map_01.png"></div>
				<div class="selekt_con">
					<div class="selekt_ti">
                        <p>볼보 SELEKT 김포 전시장</p>
                    </div>
					<div class="selekt_txt">경기도 김포시 고촌읍 아라육로152번길 45, A동 3층 351호 (전호리 684, 국민차매매단지 공항점)<br>TEL : 031 8025 6789</div>
				</div>
			</li>
			<li>
				<div class="selekt_map"><img src="/images/selekt/map_02.png"></div>
				<div class="selekt_con">
					<div class="selekt_ti">
                        <p>볼보 SELEKT 수원Ⅰ 전시장</p>
                    </div>
					<div class="selekt_txt">경기도 용인시 기흥구 중부대로 16, 3층 (영덕동 788-9)<br>TEL : 031-205-9060</div>
				</div>
			</li>
            <li>
				<div class="selekt_map"><img src="/images/selekt/map_03.jpg"></div>
				<div class="selekt_con">
					<div class="selekt_ti">
                        <p>볼보 SELEKT 수원Ⅱ 전시장</p>
                    </div>
					<div class="selekt_txt">경기도 수원시 권선구 권선로 308-5, 1층 109호 (고색동 1191)<br>TEL : 031 203 9060</div>
				</div>
			</li>
			<li>
				<div class="selekt_map"><img src="/images/selekt/map_04.jpg"></div>
				<div class="selekt_con">
					<div class="selekt_ti">
                        <p>볼보 SELEKT 부산 전시장</p>
                    </div>
					<div class="selekt_txt">부산광역시 연제구 경기장로 15  <span style="display:inline-block;">(거제동 1387)</span><br>TEL : 051 502 2111</div>
				</div>
			</li>
		</ul>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>