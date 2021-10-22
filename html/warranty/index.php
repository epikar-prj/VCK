<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "warranty";
    $FOOTER_CODE = "service";
    $TITLE = "평생 부품 보증";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<!--<link rel="stylesheet" href="./style.css">-->

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/service.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="visual">
       <img src="/images/warranty/warranty_img_top.png">
    </div>
    <div class="container" id="selekt">
		<section id="section_01">
			<div class="section_inner">
				<!--<h5>평생 부품 보증</h5>-->
				<h3>품질과 확신</h3>
				<p>2020년 6월 1일부터 볼보자동차 공식 서비스 센터에서 유상으로 진행된 수리에 대해 평생 부품 보증을 제공합니다.<br>
					2020년 12월 1일부터는 사고 수리에 대한 부품도 평생 부품 보증에 포함됩니다.
				</p>
			</div>
		</section>
		<section>
			<div class="img_wrap"><img src="/images/warranty/warranty_img_01.png"></div>
			<div class="section_inner">
				<h4>마음의 평화를 더하다</h4>
				<p>볼보 정비센터에서 차량 정비 시 고객 평생 부품 무상보증을 적용 받을 수 있습니다. 볼보의 숙련된 정비사들이 순정 부품으로 귀하의 차량을 수리한다면 항상 안심할 수 있습니다 – 아무리 먼 거리를 주행했더라도 상관없습니다.<br>
				<br>
				자세한 내용은 가까운 서비스 센터에 문의하십시오.</p>
				<div class="btn_link"><a href="/html/center/index.php?backAction=/html/warranty/index.php">서비스 센터 안내</a></div>
			</div>
		</section>
		<section>
			<div class="img_wrap"><img src="/images/warranty/warranty_img_02.png"></div>
			<div class="section_inner">
				<h4>볼보자동차코리아 공식 서비스 센터에서만 적용됩니다.</h4>
				<p>모든 볼보자동차코리아 서비스 센터에서 설치된 부품에 대해 자재 및 공정의 결함이 없음을 보증합니다. 보장내용에는 무상보증 부품 교체에 대한 공임이 포함되며, 액세서리, 소모성 부품, 소모품은 보증에 포함되지 않습니다. 외부의 영향으로 인한 부품의 교체는 포함되지 않습니다. 약관의 전체 내용을 보시려면 아래를 클릭하십시오.</p>
				<div class="btn_toggle"><a class="btn_toggle_detail" href="javascript:void(0);" onclick="toggle_detail();">자세한 내용 보기</a></div>
				<div class="toggle_cont_wrap toggle_detail" style="display:none;">
					<div class="toggle_cont">
						<div class="cont_grp"> 
							<p class="blue">볼보자동차는 2020년 6월 1일 이후 공식 서비스 센터에서 유상으로 구매하고 교체된 순정 부품에 대해 Customer Lifetime Parts Warranty(이하 “평생 부품 보증”)을 제공합니다. 평생 부품 보증은 다른 차량으로 양도가 불가능하며 차량등록증의 소유자가 변동되지 않아야 합니다. 단, 볼보자동차가 규정하는 보증에서 제외되는 항목 및 특정 조건에 해당하는 경우 평생 부품 보증은 적용되지 않습니다.</p>
						</div>
						<div class="cont_grp">
							<h4>조건</h4>
							<p>평생 부품 보증이 적용되기 위해선 아래 항목이 충족되어야 합니다.</p>
							<ul class="cont_list">
								<li>- 평생 부품 보증 정보 제공에 동의한 고객</li>
								<li>- 볼보자동차 공식 서비스센터에서 진행된 수리</li>
								<li>- 차량등록증의 소유자 변동 없음</li>
								<li>- 2020년 6월 1일 이후 발생한 유상 수리</li>
							</ul>
							<p class="caption">※ 상기 사항이 충족 되지 않을 경우 평생 부품 보증은 적용되지 않습니다.</p>
						</div>
						<div class="cont_grp">
							<h4>제외 사항</h4>
							<p>아래의 항목은 평생 부품 보증 대상에서 제외됩니다.</p>
							<ul class="cont_list">
								<li>- 020년 12월 이전에 진행된 보험 수리</li>
								<li>- 오일류</li>
								<li>- 와이퍼 블레이드</li>
								<li>- 필터류</li>
								<li>- 내부 및 외부 조명 전구</li>
								<li>- 타이밍 벨트/엑세서리 벨트 키트</li>
								<li>- 쇼크 업소버 키트</li>
								<li>- 그 외 차량 운행에 소요되는 소모품</li>
								<li>- 소프트웨어</li>
								<li>- 점화 플러그</li>
								<li>- 타이어</li>
								<li>- 브레이크 패드/디스크</li>
								<li>- 조정 작업</li>
								<li>- 액세서리</li>
								<li>- 배터리</li>
								<li>- 도장 및 판금 작업</li>
							</ul>
							<p>또한, 아래로 인한 수리나 부품 교체의 경우 평생 부품 보증이 적용되지 않습니다.</p>
							<ul class="cont_list">
								<li>- 정상적인 마모 또는 차량의 오용</li>
								<li>- 유지 보수 및 서비스 지침에 따라 차량을 올바르게 유지 보수하지 않은 경우</li>
								<li>- 순정 부품을 사용하지 않은 경우</li>
								<li>- 부주의, 침수, 사고 등으로 인한 손상</li>
								<li>- 차를 개인 용도나 사업 용도 이외의 용도(경주 등)로 사용하여 발생한 결함</li>
								<li>- 제조사의 승인이 없는 개조</li>
								<li>- 지정되지 않은 연료 및 불량 연료 사용</li>
								<li>- 연료, 엔진 오일 첨가제 사용</li>
								<li>- 외부 공업사에서 진행된 수리로 인한 고장</li>
								<li>- 외부 요인으로 발생한 부식(차체, 휠, 광택 장식, 범퍼, 몰딩류 힌지 등 부착물)</li>
								<li>- 부품이 단종된 경우</li>
							</ul>
						</div>
						<div class="cont_grp">
							<h4>고객의 의무</h4>
							<p>평생 부품 보증을 유지하려면 볼보자동차가 권장하는 점검 및 교환 주기를 준수해야합니다. 차량의 점검 항목과 교환 주기는 고객님께 제공된 서비스 가이드에 따라 1년 또는 15,000km마다 공식 서비스센터에서 권장 주기에 따라 진행되어야 합니다. 그렇지 않을 경우 평생 부품 보증이 제공되지 않을 수 있습니다.</p>
						</div>
					</div>
				</div>
				<div class="btn_toggle"><a class="btn_toggle_list" href="javascript:void(0);" onclick="toggle_list();">FAQ</a></div>
				<div class="toggle_cont_wrap toggle_list" style="display:none;">
					<div class="toggle_cont">
						<div class="cont_grp"> 
							<p class="blue title">FAQ - Customer Lifetime Parts Warranty</p>
							<ul class="qna">
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>가족간에 소유주 변동이 될 경우 어떻게 되나요?</span></div>
									<div class="a">소유주 변동이 가족 사이에서 발생하더라도 등록된 차량 소유자가 변동될 경우 해당 보증은 종료됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>기본 보증 기간이 평생으로 변경되는 건가요?</span></div>
									<div class="a">볼보자동차는 공식딜러사를 통해 판매된 차량에 5년 또는 100,000km의 보증 기간을 제공하고 있습니다. 평생 부품 보증은 2020년 6월 1일 이후 작업에 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>2020년 6월 1일 이전 작업은 평생 보증이 아닌가요?</span></div>
									<div class="a">평생 부품 보증은 2020년 6월 1일 이후 실시된 작업에만 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>다른 나라에서 유상 수리로 진행한 부품에 문제가 생겼습니다. 이런 경우 평생 부품 보증이 적용되나요?</span></div>
									<div class="a">평생 부품 보증이 적용되는 나라(유럽, 북미, 아시아 일부 국가)에서 진행된 유상 수리인 경우 보증이 동일하게 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>평생 부품 보증이 적용되는 횟수에는 제한이 있나요? 문제가 발생할 때마다 보증이 적용되나요?</span></div>
									<div class="a">횟수 제한이 없습니다. 동일 부품에 품질 결함 발생 시, 지속적으로 보증이 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>볼보자동차의 순정 부품을 직접 구매하여 외부 공업사에서 수리를 진행할 경우 평생 부품 보증이 적용되나요?</span></div>
									<div class="a">불가능합니다. 해당 보증은 볼보자동차 공식 서비스 센터에서 구매하고 설치된 부품에 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>제외되는 부품이 있나요?</span></div>
									<div class="a">브레이크 패드, 와이퍼 블레이드와 같은 마손품은 보증이 적용되지 않습니다. 더 많은 정보를 확인하고 싶으실 경우 ‘자세한 내용 보기’를 클릭하여 확인하시기 바랍니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>원인 부품이 다른 부품에 영향을 미쳐 결함이 발생하면 어떻게 되나요? 2차 피해에도 보증이 적용되나요?</span></div>
									<div class="a">평생 부품 보증이 적용되는 부품으로 인해 발생한 결함에는 모두 보증이 적용됩니다. 단, 수리 지연으로 인한 추가 피해는 보증이 적용되지 않습니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>어떤 부품이 마모 또는 소모품으로 분류되어 보증이 적용되지 않나요?</span></div>
									<div class="a">‘자세한 내용 보기’에 설명되어 있는 ‘제외 사항’을 참고해 주시기 바랍니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>리스나 렌터카에도 평생 부품 보증이 적용되나요?</span></div>
									<div class="a">차량등록증의 소유자에 변동이 없을 경우 동일하게 보증이 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>차량 등록증 상의 소유자가 여러 명일 경우에는 어떻게 되나요?</span></div>
									<div class="a">평생 부품 보증은 유상 수리가 발생한 시점의 차량등록증 상 소유자가 변동이 없을 경우 적용됩니다. 즉, 소유자 정보가 동일할 경우 평생 부품 보증은 적용됩니다.</div>
								</li>
								<li class="qna_list">
									<div class="q"><em>Q.</em><span>리스 차량을 승계할 예정입니다. 리스 계약 기간 중 발생한 유상 수리에는 평생 부품 보증이 적용되지 않나요?</span></div>
									<div class="a">소유자 정보가 변동된 것은 맞지만 이 경우에는 평생 부품 보증을 제공합니다. 다만 증명을 위해 리스 기간 중 리스 계약서의 계약자 명과 차량 승계 후 차량 등록증 상의 소유자가 동일한지 확인해야 합니다.</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
</div>

<script>
	function toggle_detail(){
		var detail_display = $('.toggle_detail').css('display');
		console.log(detail_display);
		if( detail_display == 'none'){
			 $('.toggle_detail').slideDown();
			 $('.btn_toggle_detail').addClass('open');
			 $('.btn_toggle_detail').html('자세한 내용 닫기');
		}else{
			 $('.toggle_detail').slideUp();
			 $('.btn_toggle_detail').removeClass('open');			
			 $('.btn_toggle_detail').html('자세한 내용 보기');
		}
	}

	function toggle_list(){
		var detail_display = $('.toggle_list').css('display');
		console.log(detail_display);
		if( detail_display == 'none'){
			 $('.toggle_list').slideDown();
			 $('.btn_toggle_list').addClass('open');
		}else{
			 $('.toggle_list').slideUp(function(){
				$('li.qna_list').removeClass('on');
				$('li.qna_list').find('.a').hide();					
			 });
			 $('.btn_toggle_list').removeClass('open');	
		 
		}
	}

	$('li.qna_list .q').click(function(){
		var list_display = $(this).parents('li.qna_list').find('.a').css('display');

		if(list_display == 'none'){
			//$('li.qna_list').removeClass('on');
			//$('li.qna_list').find('.a').hide();

			$(this).parents('li.qna_list').addClass('on');
			$(this).parents('li.qna_list').find('.a').slideDown();
		}else{
			$(this).parents('li.qna_list').removeClass('on');
			$(this).parents('li.qna_list').find('.a').slideUp();			
		}
	});
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>