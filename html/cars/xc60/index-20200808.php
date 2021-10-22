<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "cars";
    $FOOTER_CODE = "buy";
    $TITLE = "CARS";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="./../style_model.css?version=20200722-03">
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
					<div class="sti">2020.09</div>
					<div class="ti">THE XC60</div>
					<ul class="btn_wrap">
						<li class="btn"><a href="javascript:open_pop('option');">Options <span>></span></a></li>
						<li class="btn"><a href="javascript:open_pop('price');">Price List <span>></span></a></li>
					</ul>
					<div class="btn_next"><a href="https://www.volvocars.com/kr/cars/new-models/the-volvo-xc60" target="_blank">자세히 보기</a></div>
				</div>
			</div>
		</div>
    </div>

	<div class="pop_wrap" style="display:none;">
        <div class="back">
            <a href="javascript:close_pop();">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
		<div class="pop_cont pop_option" style="display:none;">
			<h4>OPTIONS</h4>		
			
			<div class="options_tab_wrap">
				<ul class="options_tab">
					<li class="ov"><a href="javascript:options_tab(1);">T8 AWD R-Design</a></li>
					<li><a href="javascript:options_tab(2);">T8 AWD Inscription</a></li>
				</ul>
			</div>
			<div class="options_img">
				<div class="options_img_01"><img src="/images/cars/xc60/options_car_img_01_new.png"></div>
				<div class="options_img_02" style="display:none"><img src="/images/cars/xc60/options_car_img_02_new.png"></div>
			</div>
			<div class="options_detail detail_01">
				<ul>
					<li class="txt">20" 다이아몬드 컷 알로이 휠</li>
					<li class="txt">Harman/Kardon sound system</li>
					<li class="txt">Advanced Air Cleaner</li>
					<li class="txt">360도 카메라</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
			</div>

			<div class="options_detail detail_02" style="display:none">
				<ul>
					<li class="txt">크리스탈 기어노브</li>
					<li class="txt">Bowers & Wilkins sound system</li>
					<li class="txt">Advanced Air Cleaner</li>
					<li class="txt">앞좌석 통풍 / 마사지</li>
					<li class="txt">스마트폰 무선충전</li>
				</ul>
			</div>

            <p class="caption">※ 본 페이지에 기재된 내용은 사전에 예고 없이 변경될 수 있으므로 실제 차량과 다를 수 있습니다. 정확한 정보는 볼보 전시장으로 문의하시기 바랍니다.</p>
            
		</div>
		<div class="pop_cont pop_price" style="display:none;">
			<h4>PRICE LIST</h4>
			<div class="model_name">XC60</div>
			<ul	class="model_list">
				<li class="list list_01">
					<div class="list_title">R-DESIGN<span class="date">(MY21 출시 예정)</span></div>
					<div class="list_img"><img src="/images/cars/xc60/price_car_img_01_new.png"></div>
					<ul class="price_title">
						<li>ENGINE</li>
						<li>MSRP</li>
					</ul>
					<ul class="price_list">
						<li>T8 AWD</li>
						<li>71,000,000</li>
					</ul>
				</li>
				<li class="list list_02">
					<div class="list_title">INSCRIPTION<span class="date">(MY21 출시 예정)</span></div>
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
