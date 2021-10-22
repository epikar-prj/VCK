<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "bebetter";
    $FOOTER_CODE = "";
    $TITLE = "Be Better";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<script src="/js/slick.min.js"></script>
<script src="./script.js"></script>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
   
    <div class="container" id="be_better">
		<div class="visual">
			<div class="visual_ti">Be Better
				<span class="sti">지속가능한 미래,<br>볼보가 함께합니다</span>
			</div>
			<div class="visual_img"><img src="/images/bebetter/visual_img.jpg"></div>
		</div>
		<div class="cont_01">
			<p class="cont_txt">볼보 자동차는 지속가능한 미래를 위하여<br>2040년까지 기후 중립 기업을 완성하는 것이 목표입니다.</p>
			<p class="cont_txt">다음 세대도, 그 다음도 깨끗한 지구에서<br>
				마음껏 숨쉬고 살아갈 수 있으려면<br>
				우리는 지금 미래가 묻는 질문에<br>
				진지하게 답해야 합니다.</p>
		</div>
		<div class="video_wrap">
			<div class="video_img">
				<a href="javascript:play_video();">
				<div class="btn_play"><img src="/images/bebetter/btn_play.png"></div>
				<img src="/images/bebetter/video_img.jpg">
				</a>
			</div>
			<div class="video_player" style="display:none;">
				<video id="video_better" width="100%" poster="/images/bebetter/video_img.jpg" playsinline >
				  <source src="/images/bebetter/video.mp4" type="video/mp4">
				</video>
			</div>
		</div>

		<div class="cont_02">
			<p class="cont_txt">Be Better</p>
			<p class="cont_txt">미래가 묻는 ‘더 나은 내일’에 대답하기 위해<br>
				볼보자동차코리아가 제안하는<br>
				생활 속 다양한 실천 이야기,<br>
				Be Better 의 이야기를 만나보세요.
				</p>
		</div>
		<div class="slide_wrap">
			<ul class="slide">
				<li class="card">
					<div class="slide_icon"><img src="/images/bebetter/slide_icon_01.png"></div>
					<div class="slide_ti">Single Use Plastic free</div>
					<div class="slide_txt">일회용 플라스틱으로 발생하는 환경문제를 해결하기 위해 모든 마케팅 활동 및 이벤트 행사에서 일회용 플라스틱 사용을 중단했습니다.<br>대신 친환경 종이와 펄프, 나무 등 자연적으로 분해되는 친환경 소재를 사용하고 있습니다.</div>
					<ul class="nav_dot">
						<li class="dot_01 check"></li>
						<li class="dot_02"></li>
						<li class="dot_03"></li>
					</ul>
				</li>
				<li class="card">
					<div class="slide_icon"><img src="/images/bebetter/slide_icon_02-re.png"></div>
					<div class="slide_ti">Stop print, Go digital</div>
					<div class="slide_txt">한 번 쓰고 버려지는 모든 고객 인쇄물(printed material)은 전자(digital) 형태로 제공됩니다. 홈페이지 또는 전시장 내 태블릿 PC를 통해 정보를 만나실 수 있습니다.</div>
					<ul class="nav_dot">
						<li class="dot_01"></li>
						<li class="dot_02 check"></li>
						<li class="dot_03"></li>
					</ul>
				</li>
				<li class="card">
					<div class="slide_icon"><img src="/images/bebetter/slide_icon_03.png"></div>
					<div class="slide_ti">Hej, Plogging</div>
					<div class="slide_txt">플로깅(Plogging)은 스웨덴어로 ‘이삭을 줍다(Plocka Upp, 플로카 업)’와 영어 단어 ‘조깅(Jogging)’의 합성어로 달리기를 즐기면서 쓰레기를 줍는 활동을 의미합니다. 볼보자동차코리아는 일상 속에서 환경	보호의 의미를 고취시키고, 사회구성원들과 함께 이를 개선해나가고자 하는 취지로 플로깅 문화를 확산시키기 위해 노력하고 있습니다.
					</div>
					<ul class="nav_dot">
						<li class="dot_01"></li>
						<li class="dot_02"></li>
						<li class="dot_03 check"></li>
					</ul>
				</li>
			</ul>
		</div><!-- slide_wrap_end -->
		<div class="btn_more"><a href="https://www.volvocars.com/kr/why-volvo/human-innovation/volvo-recharged" target="_blank"> 더 알아보기</a></div>
    </div>
</div>



<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>