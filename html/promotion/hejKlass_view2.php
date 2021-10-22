<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

if (!isLogined()) {
    MgMoveURL('/html/member/main.php');
}

if (!isOwnered()) {
    MgMoveURL('/html/member/main.php', '볼보 고객만 가능한 서비스 입니다.');
}

$edate = date("2021-03-15 00:00");
$today = date("Y-m-d H:i");

/*$edate = date("2021-03-15 00:00");
$today = date("Y-m-d H:i");*/

/*if ($today > $edate) {
	MgMoveURL('/', 'Hej, Klass 2021\n\n이벤트가 종료되었습니다.\n(2021 .3 .14 까지)');
}*/

$CODE = "promotion";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

/*$sid = $_COOKIE['member_sid'];
$id = $_COOKIE['member_id'];
$nm = $_COOKIE['member_name'];*/

if (isLogined()) {
    $formAction = "/ajax/ajax.postTestdrive.php";

    $name = $_COOKIE['member_name'];
    $hp = format_phone($_COOKIE['member_hp']);

    $hp1 = explode("-", $hp)[0];
    $hp2 = explode("-", $hp)[1];
    $hp3 = explode("-", $hp)[2];
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
    <!-- <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/footerMenu/benefit.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_list.php" class="on"  data-type="owner">Hej, Klass</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <section id="visual">
            <div class="visual_cont">
                <div class="box-img">
                    <!-- <video id="vid" autoplay="" muted="" loop="" preload="auto">
                        <source id="mp4" src="https://volvofilm.com/images/hejfamilj_video.mp4" type="video/mp4">
                    </video> -->
                    <img src="/images/promotion/hejKlass_02/main_visual.jpg" alt="">
                </div>
                <div class="visual_cont_inner">
                    <div class="visual_logo"><img src="/images/promotion/hejKlass_02/hejklass_logo.svg"></div>
                    <div class="text">헤이,클라스 (Hej, Klass)는<br> 온라인으로 체험하는<br> VOLVO 브랜드만의 라이프 스타일 클래스입니다.</div>
					<div class="text">두 번째 헤이, 클라스(Hej, Klass)의 주제는<br>
						‘원목의 따듯한 감성이 담겨있는 데스크테리어 만들기’로<br>
						VOLVO의 친환경적 감성과<br>
						손흥민 선수의 친필 사인을 간직할 수 있는<br>
						특별한 시간을 준비했습니다. 
					</div>
                    <div class="text">언제 어디에서나 편안하게 즐길 수 있는<br> Hej, Klass와 함께, 가족과 소중한 시간을 만들어 보세요. </div>
                </div>
            </div>
        </section>

        <div class="container" style="padding:0 15px;">
			<section id="result" >
				<div class="result_inner">
					<div class="event_01 event_wrap">
						<div class="sti">Hej, Klass</div>
						<div class="ti">당첨을 진심으로 축하드립니다!</div>
					</div>
					<div class="result_list">
						<div class="result_list_inner">
							<ul>
								<li><span class="name">최*람</span> <span class="number">010-****-9098</span></li>
								<li><span class="name">고*배</span> <span class="number">010-****-8032</span></li>
								<li><span class="name">김*식</span> <span class="number">010-****-9693</span></li>
								<li><span class="name">박*형</span> <span class="number">010-****-8789</span></li>
								<li><span class="name">김*라</span> <span class="number">010-****-5401</span></li>
								<li><span class="name">박*하</span> <span class="number">010-****-7661</span></li>
								<li><span class="name">김*용</span> <span class="number">010-****-1604</span></li>
								<li><span class="name">하*영</span> <span class="number">010-****-4836</span></li>
								<li><span class="name">송*미</span> <span class="number">010-****-5014</span></li>
								<li><span class="name">김*윤</span> <span class="number">010-****-8031</span></li>
								<li><span class="name">오*기</span> <span class="number">010-****-0514</span></li>
								<li><span class="name">김*수</span> <span class="number">010-****-2967</span></li>
								<li><span class="name">정*옥</span> <span class="number">010-****-5297</span></li>
								<li><span class="name">정*호</span> <span class="number">010-****-4885</span></li>
								<li><span class="name">최*</span> <span class="number">010-****-2897</span></li>
								<li><span class="name">박*은</span> <span class="number">010-****-2649</span></li>
								<li><span class="name">이*재</span> <span class="number">010-****-4820</span></li>
								<li><span class="name">조*희</span> <span class="number">010-****-7478</span></li>
								<li><span class="name">김*우</span> <span class="number">010-****-5809</span></li>
								<li><span class="name">안*식</span> <span class="number">010-****-6252</span></li>
								<li><span class="name">박*일</span> <span class="number">010-****-8705</span></li>
								<li><span class="name">신*철</span> <span class="number">010-****-2603</span></li>
								<li><span class="name">유*희</span> <span class="number">010-****-4089</span></li>
								<li><span class="name">김*진</span> <span class="number">010-****-3584</span></li>
								<li><span class="name">노*민</span> <span class="number">010-****-9843</span></li>
								<li><span class="name">김*나</span> <span class="number">010-****-3211</span></li>
								<li><span class="name">신*원</span> <span class="number">010-****-9835</span></li>
								<li><span class="name">함*희</span> <span class="number">010-****-6271</span></li>
								<li><span class="name">유*숙</span> <span class="number">010-****-7923</span></li>
								<li><span class="name">황*성</span> <span class="number">010-****-1622</span></li>
								<li><span class="name">김*별</span> <span class="number">010-****-6678</span></li>
								<li><span class="name">예*주</span> <span class="number">010-****-3646</span></li>
								<li><span class="name">김*훈</span> <span class="number">010-****-8385</span></li>
								<li><span class="name">한*신</span> <span class="number">010-****-2405</span></li>
								<li><span class="name">심*희</span> <span class="number">010-****-9669</span></li>
								<li><span class="name">이*현</span> <span class="number">010-****-4195</span></li>
								<li><span class="name">김*화</span> <span class="number">010-****-8079</span></li>
								<li><span class="name">고*갑</span> <span class="number">010-****-3936</span></li>
								<li><span class="name">이*우</span> <span class="number">010-****-1226</span></li>
								<li><span class="name">유*규</span> <span class="number">010-****-2861</span></li>
								<li><span class="name">홍*웅</span> <span class="number">010-****-6806</span></li>
								<li><span class="name">정*혁</span> <span class="number">010-****-8520</span></li>
								<li><span class="name">정*섭</span> <span class="number">010-****-0422</span></li>
								<li><span class="name">조*준</span> <span class="number">010-****-4340</span></li>
								<li><span class="name">김*완</span> <span class="number">010-****-7568</span></li>
								<li><span class="name">설*민</span> <span class="number">010-****-5790</span></li>
								<li><span class="name">황*현</span> <span class="number">010-****-6910</span></li>
								<li><span class="name">(주)엘*이</span> <span class="number">010-****-8788</span></li>
								<li><span class="name">이*환</span> <span class="number">010-****-1836</span></li>
								<li><span class="name">드*가</span> <span class="number">010-****-2237</span></li>
								<li><span class="name">김*섭</span> <span class="number">010-****-6556</span></li>
								<li><span class="name">염*윤</span> <span class="number">010-****-7127</span></li>
								<li><span class="name">김*환</span> <span class="number">010-****-4054</span></li>
								<li><span class="name">김*우</span> <span class="number">010-****-6636</span></li>
								<li><span class="name">이*준</span> <span class="number">010-****-4528</span></li>
								<li><span class="name">이*윤</span> <span class="number">010-****-3580</span></li>
								<li><span class="name">조*민</span> <span class="number">010-****-8459</span></li>
								<li><span class="name">최*승</span> <span class="number">010-****-9380</span></li>
								<li><span class="name">최*숙</span> <span class="number">010-****-4979</span></li>
								<li><span class="name">한*수</span> <span class="number">010-****-5759</span></li>
								<li><span class="name">최*률</span> <span class="number">010-****-3104</span></li>
								<li><span class="name">정*용</span> <span class="number">010-****-9128</span></li>
								<li><span class="name">유*예</span> <span class="number">010-****-0930</span></li>
								<li><span class="name">신*학</span> <span class="number">010-****-0859</span></li>
								<li><span class="name">박*훈</span> <span class="number">010-****-9496</span></li>
								<li><span class="name">안*원</span> <span class="number">010-****-5353</span></li>
								<li><span class="name">김*정</span> <span class="number">010-****-6396</span></li>
								<li><span class="name">정*욱</span> <span class="number">010-****-4858</span></li>
								<li><span class="name">정*진</span> <span class="number">010-****-3098</span></li>
								<li><span class="name">원*경</span> <span class="number">010-****-0835</span></li>
								<li><span class="name">김*경</span> <span class="number">010-****-5287</span></li>
								<li><span class="name">최*호</span> <span class="number">010-****-3499</span></li>
								<li><span class="name">이*은</span> <span class="number">010-****-6772</span></li>
								<li><span class="name">양*승</span> <span class="number">010-****-8801</span></li>
								<li><span class="name">최*준</span> <span class="number">010-****-2475</span></li>
								<li><span class="name">이*경</span> <span class="number">010-****-9619</span></li>
								<li><span class="name">김*훈</span> <span class="number">010-****-9959</span></li>
								<li><span class="name">김*중</span> <span class="number">010-****-7469</span></li>
								<li><span class="name">홍*기</span> <span class="number">010-****-7348</span></li>
								<li><span class="name">윤*미</span> <span class="number">010-****-8416</span></li>
								<li><span class="name">최*수</span> <span class="number">010-****-5600</span></li>
								<li><span class="name">안*진</span> <span class="number">010-****-2203</span></li>
								<li><span class="name">탁*봄</span> <span class="number">010-****-5801</span></li>
								<li><span class="name">방*우</span> <span class="number">010-****-9693</span></li>
								<li><span class="name">임*순</span> <span class="number">010-****-6028</span></li>
								<li><span class="name">한*기</span> <span class="number">010-****-2002</span></li>
								<li><span class="name">이*기</span> <span class="number">010-****-5249</span></li>
								<li><span class="name">김*철</span> <span class="number">010-****-5522</span></li>
								<li><span class="name">서*호</span> <span class="number">010-****-0933</span></li>
								<li><span class="name">홍*훈</span> <span class="number">010-****-8942</span></li>
								<li><span class="name">원*윤</span> <span class="number">010-****-1988</span></li>
								<li><span class="name">정*람</span> <span class="number">010-****-2515</span></li>
								<li><span class="name">유*환</span> <span class="number">010-****-8995</span></li>
								<li><span class="name">강*권</span> <span class="number">010-****-4621</span></li>
								<li><span class="name">나*임</span> <span class="number">010-****-9991</span></li>
								<li><span class="name">강*필</span> <span class="number">010-****-8626</span></li>
								<li><span class="name">박*주</span> <span class="number">010-****-6046</span></li>
								<li><span class="name">주*우</span> <span class="number">010-****-1226</span></li>
								<li><span class="name">이*채</span> <span class="number">010-****-1533</span></li>
								<li><span class="name">유*선</span> <span class="number">010-****-3893</span></li>
								<li><span class="name">이*우</span> <span class="number">010-****-9971</span></li>
								<li><span class="name">서*향</span> <span class="number">010-****-5625</span></li>
								<li><span class="name">박*재</span> <span class="number">010-****-3330</span></li>
								<li><span class="name">임*찬</span> <span class="number">010-****-7024</span></li>
								<li><span class="name">박*석</span> <span class="number">010-****-5994</span></li>
								<li><span class="name">김*호</span> <span class="number">010-****-0522</span></li>
								<li><span class="name">신*석</span> <span class="number">010-****-3933</span></li>
								<li><span class="name">김*규</span> <span class="number">010-****-0594</span></li>
								<li><span class="name">(주)디*김</span> <span class="number">010-****-4480</span></li>
								<li><span class="name">이*운</span> <span class="number">010-****-4029</span></li>
								<li><span class="name">배*원</span> <span class="number">010-****-8452</span></li>
								<li><span class="name">이*욱</span> <span class="number">010-****-5074</span></li>
								<li><span class="name">이*양</span> <span class="number">010-****-0380</span></li>
								<li><span class="name">고*영</span> <span class="number">010-****-7858</span></li>
								<li><span class="name">강*혜</span> <span class="number">010-****-0059</span></li>
								<li><span class="name">한*호</span> <span class="number">010-****-1505</span></li>
								<li><span class="name">허*모</span> <span class="number">010-****-6626</span></li>
								<li><span class="name">김*석</span> <span class="number">010-****-8998</span></li>
								<li><span class="name">이*은</span> <span class="number">010-****-9886</span></li>
								<li><span class="name">이*호</span> <span class="number">010-****-4249</span></li>
								<li><span class="name">강*중</span> <span class="number">010-****-3633</span></li>
								<li><span class="name">고*연</span> <span class="number">010-****-1009</span></li>
								<li><span class="name">박*용</span> <span class="number">010-****-8712</span></li>
								<li><span class="name">최*미</span> <span class="number">010-****-2980</span></li>
								<li><span class="name">강*구</span> <span class="number">010-****-0939</span></li>
								<li><span class="name">허*빈</span> <span class="number">010-****-1024</span></li>
								<li><span class="name">김*훈</span> <span class="number">010-****-7970</span></li>
								<li><span class="name">윤*영</span> <span class="number">010-****-9390</span></li>
								<li><span class="name">박*규</span> <span class="number">010-****-3318</span></li>
								<li><span class="name">서*민</span> <span class="number">010-****-3828</span></li>
								<li><span class="name">최*열</span> <span class="number">010-****-4763</span></li>
								<li><span class="name">이*욱</span> <span class="number">010-****-5670</span></li>
								<li><span class="name">(주)오*스</span> <span class="number">010-****-6127</span></li>
								<li><span class="name">한*호</span> <span class="number">010-****-9497</span></li>
								<li><span class="name">김*성</span> <span class="number">010-****-9656</span></li>
								<li><span class="name">황*호</span> <span class="number">010-****-9540</span></li>
								<li><span class="name">김*민</span> <span class="number">010-****-3105</span></li>
								<li><span class="name">신*식</span> <span class="number">010-****-7818</span></li>
								<li><span class="name">금*욱</span> <span class="number">010-****-1174</span></li>
								<li><span class="name">김*섭</span> <span class="number">010-****-3687</span></li>
								<li><span class="name">황*하</span> <span class="number">010-****-1401</span></li>
								<li><span class="name">이*호</span> <span class="number">010-****-3002</span></li>
								<li><span class="name">이*주</span> <span class="number">010-****-0006</span></li>
								<li><span class="name">우*우</span> <span class="number">010-****-3155</span></li>
								<li><span class="name">정*욱</span> <span class="number">010-****-7000</span></li>
								<li><span class="name">(주)한*팅</span> <span class="number">010-****-6151</span></li>
								<li><span class="name">이*준</span> <span class="number">010-****-7085</span></li>
								<li><span class="name">남*석</span> <span class="number">010-****-0689</span></li>
								<li><span class="name">김*건</span> <span class="number">010-****-8986</span></li>
								<li><span class="name">김*호</span> <span class="number">010-****-4901</span></li>
								<li><span class="name">편*혁</span> <span class="number">010-****-5333</span></li>
								<li><span class="name">석*원</span> <span class="number">010-****-1318</span></li>
								<li><span class="name">강*규</span> <span class="number">010-****-9976</span></li>
								<li><span class="name">이*열</span> <span class="number">010-****-5048</span></li>
								<li><span class="name">이*주</span> <span class="number">010-****-6720</span></li>
								<li><span class="name">김*훈</span> <span class="number">010-****-9274</span></li>
								<li><span class="name">박*우</span> <span class="number">010-****-8353</span></li>
								<li><span class="name">임*열</span> <span class="number">010-****-4000</span></li>
								<li><span class="name">이*범</span> <span class="number">010-****-6985</span></li>
								<li><span class="name">홍*희</span> <span class="number">010-****-3076</span></li>
								<li><span class="name">장*남</span> <span class="number">010-****-0999</span></li>
								<li><span class="name">이*훈</span> <span class="number">010-****-2056</span></li>
								<li><span class="name">김*영</span> <span class="number">010-****-5465</span></li>
								<li><span class="name">조*정</span> <span class="number">010-****-0791</span></li>
								<li><span class="name">이*혁</span> <span class="number">010-****-9032</span></li>
								<li><span class="name">남*권</span> <span class="number">010-****-9965</span></li>
								<li><span class="name">문*원</span> <span class="number">010-****-9834</span></li>
								<li><span class="name">이*원</span> <span class="number">010-****-1620</span></li>
								<li><span class="name">최*식</span> <span class="number">010-****-8594</span></li>
								<li><span class="name">이*영</span> <span class="number">010-****-8012</span></li>
								<li><span class="name">김*경</span> <span class="number">010-****-4497</span></li>
								<li><span class="name">최*묵</span> <span class="number">010-****-8099</span></li>
								<li><span class="name">최*예</span> <span class="number">010-****-7318</span></li>
								<li><span class="name">심*정</span> <span class="number">010-****-8396</span></li>
								<li><span class="name">정*훈</span> <span class="number">010-****-1121</span></li>
								<li><span class="name">윤*숙</span> <span class="number">010-****-8029</span></li>
								<li><span class="name">엄*호</span> <span class="number">010-****-5824</span></li>
								<li><span class="name">도*환</span> <span class="number">010-****-2848</span></li>
								<li><span class="name">정*환</span> <span class="number">010-****-0371</span></li>
								<li><span class="name">지*현</span> <span class="number">010-****-7278</span></li>
								<li><span class="name">이*정</span> <span class="number">010-****-0102</span></li>
								<li><span class="name">이*수</span> <span class="number">010-****-8088</span></li>
								<li><span class="name">이*규</span> <span class="number">010-****-8508</span></li>
								<li><span class="name">박*성</span> <span class="number">010-****-3201</span></li>
								<li><span class="name">이*훈</span> <span class="number">010-****-6147</span></li>
								<li><span class="name">김*수</span> <span class="number">010-****-4054</span></li>
								<li><span class="name">선*위</span> <span class="number">010-****-0314</span></li>
								<li><span class="name">오*석</span> <span class="number">010-****-4084</span></li>
								<li><span class="name">김*수</span> <span class="number">010-****-6350</span></li>
								<li><span class="name">윤*래</span> <span class="number">010-****-4399</span></li>
								<li><span class="name">김*민</span> <span class="number">010-****-5487</span></li>
								<li><span class="name">유*명</span> <span class="number">010-****-4605</span></li>
								<li><span class="name">홍*주</span> <span class="number">010-****-2748</span></li>
								<li><span class="name">고*준</span> <span class="number">010-****-0027</span></li>
								<li><span class="name">김*정</span> <span class="number">010-****-8333</span></li>
								<li><span class="name">(주)신*트</span> <span class="number">010-****-5714</span></li>
								<li><span class="name">김*겸</span> <span class="number">010-****-3773</span></li>
								<li><span class="name">한*영</span> <span class="number">010-****-2103</span></li>
								<li><span class="name">박*영</span> <span class="number">010-****-7864</span></li>
								<li><span class="name">이*형</span> <span class="number">010-****-9727</span></li>
								<li><span class="name">박*희</span> <span class="number">010-****-5995</span></li>
								<li><span class="name">이*원</span> <span class="number">010-****-2184</span></li>
								<li><span class="name">태*준</span> <span class="number">010-****-6452</span></li>
								<li><span class="name">정*국</span> <span class="number">010-****-5882</span></li>
								<li><span class="name">유*상</span> <span class="number">010-****-9456</span></li>
								<li><span class="name">심*령</span> <span class="number">010-****-2121</span></li>
								<li><span class="name">김*우</span> <span class="number">010-****-8159</span></li>
								<li><span class="name">오*오</span> <span class="number">010-****-5364</span></li>
								<li><span class="name">차*혜</span> <span class="number">010-****-0627</span></li>
								<li><span class="name">이*수</span> <span class="number">010-****-6838</span></li>
								<li><span class="name">박*숙</span> <span class="number">010-****-8871</span></li>
								<li><span class="name">김*순</span> <span class="number">010-****-4939</span></li>
								<li><span class="name">고*숙</span> <span class="number">010-****-7831</span></li>
								<li><span class="name">소*완</span> <span class="number">010-****-6602</span></li>
								<li><span class="name">장*진</span> <span class="number">010-****-1730</span></li>
								<li><span class="name">김*용</span> <span class="number">010-****-0681</span></li>
								<li><span class="name">유*희</span> <span class="number">010-****-6704</span></li>
								<li><span class="name">피*우</span> <span class="number">010-****-0997</span></li>
								<li><span class="name">문*준</span> <span class="number">010-****-5945</span></li>
								<li><span class="name">윤*철</span> <span class="number">010-****-6447</span></li>
								<li><span class="name">노*창</span> <span class="number">010-****-9658</span></li>
								<li><span class="name">이*나</span> <span class="number">010-****-5707</span></li>
								<li><span class="name">박*륜</span> <span class="number">010-****-2630</span></li>
								<li><span class="name">이*욱</span> <span class="number">010-****-4852</span></li>
								<li><span class="name">윤*미</span> <span class="number">010-****-1553</span></li>
								<li><span class="name">장*은</span> <span class="number">010-****-3451</span></li>
								<li><span class="name">조*선</span> <span class="number">010-****-0178</span></li>
								<li><span class="name">조*균</span> <span class="number">010-****-7999</span></li>
								<li><span class="name">김*준</span> <span class="number">010-****-7793</span></li>
								<li><span class="name">한*욱</span> <span class="number">010-****-8107</span></li>
								<li><span class="name">오*안</span> <span class="number">010-****-1154</span></li>
								<li><span class="name">(주)익*트</span> <span class="number">010-****-0215</span></li>
								<li><span class="name">이*원</span> <span class="number">010-****-4884</span></li>
								<li><span class="name">박*학</span> <span class="number">010-****-8850</span></li>
								<li><span class="name">신*진</span> <span class="number">010-****-7216</span></li>
								<li><span class="name">김*삼</span> <span class="number">010-****-2256</span></li>
								<li><span class="name">이*택</span> <span class="number">010-****-1321</span></li>
								<li><span class="name">채*혜</span> <span class="number">010-****-8675</span></li>
								<li><span class="name">김*수</span> <span class="number">010-****-1296</span></li>
								<li><span class="name">이*준</span> <span class="number">010-****-9609</span></li>
								<li><span class="name">이*근</span> <span class="number">010-****-3765</span></li>
								<li><span class="name">이*원</span> <span class="number">010-****-0953</span></li>
								<li><span class="name">김*연</span> <span class="number">010-****-0537</span></li>
								<li><span class="name">천*영</span> <span class="number">010-****-3303</span></li>
								<li><span class="name">권*현</span> <span class="number">010-****-8038</span></li>
								<li><span class="name">김*양</span> <span class="number">010-****-7609</span></li>
								<li><span class="name">전*현</span> <span class="number">010-****-9362</span></li>
								<li><span class="name">유*종</span> <span class="number">010-****-6944</span></li>
								<li><span class="name">이*민</span> <span class="number">010-****-7650</span></li>
								<li><span class="name">박*석</span> <span class="number">010-****-2171</span></li>
								<li><span class="name">고*기</span> <span class="number">010-****-6895</span></li>
								<li><span class="name">전*석</span> <span class="number">010-****-3595</span></li>
								<li><span class="name">윤*훈</span> <span class="number">010-****-2767</span></li>
								<li><span class="name">김*범</span> <span class="number">010-****-9782</span></li>
								<li><span class="name">박*진</span> <span class="number">010-****-4062</span></li>
								<li><span class="name">동*수</span> <span class="number">010-****-4581</span></li>
								<li><span class="name">박*호</span> <span class="number">010-****-8491</span></li>
								<li><span class="name">문*호</span> <span class="number">010-****-5778</span></li>
								<li><span class="name">김*조</span> <span class="number">010-****-3151</span></li>
								<li><span class="name">임*섭</span> <span class="number">010-****-6168</span></li>
								<li><span class="name">최*웅</span> <span class="number">010-****-7094</span></li>
								<li><span class="name">이*</span> <span class="number">010-****-1158</span></li>
								<li><span class="name">양*승</span> <span class="number">010-****-9371</span></li>
								<li><span class="name">김*헌</span> <span class="number">010-****-3858</span></li>
								<li><span class="name">신*진</span> <span class="number">010-****-9060</span></li>
								<li><span class="name">이*희</span> <span class="number">010-****-0604</span></li>
								<li><span class="name">김*훈</span> <span class="number">010-****-0794</span></li>
								<li><span class="name">서*동</span> <span class="number">010-****-5214</span></li>
								<li><span class="name">김*탁</span> <span class="number">010-****-0093</span></li>
								<li><span class="name">문*성</span> <span class="number">010-****-9876</span></li>
								<li><span class="name">차*규</span> <span class="number">010-****-9962</span></li>
								<li><span class="name">김*신</span> <span class="number">010-****-6367</span></li>
								<li><span class="name">조*규</span> <span class="number">010-****-0618</span></li>
								<li><span class="name">황*선</span> <span class="number">010-****-9506</span></li>
								<li><span class="name">강*영</span> <span class="number">010-****-1957</span></li>
								<li><span class="name">박*준</span> <span class="number">010-****-5302</span></li>
								<li><span class="name">최*석</span> <span class="number">010-****-3773</span></li>
								<li><span class="name">임*연</span> <span class="number">010-****-1292</span></li>
								<li><span class="name">고*학</span> <span class="number">010-****-0809</span></li>
								<li><span class="name">강*중</span> <span class="number">010-****-1924</span></li>
								<li><span class="name">(주)정*드</span> <span class="number">010-****-1899</span></li>
								<li><span class="name">유*빈</span> <span class="number">010-****-7058</span></li>
								<li><span class="name">방*욱</span> <span class="number">010-****-1812</span></li>
								<li><span class="name">예*해</span> <span class="number">010-****-3765</span></li>
								<li><span class="name">김*윤</span> <span class="number">010-****-3273</span></li>
								<li><span class="name">성*원</span> <span class="number">010-****-5491</span></li>
								<li><span class="name">우*기</span> <span class="number">010-****-4598</span></li>
								<li><span class="name">장*표</span> <span class="number">010-****-8784</span></li>
								<li><span class="name">이*준</span> <span class="number">010-****-3234</span></li>
								<li><span class="name">황*혜</span> <span class="number">010-****-4711</span></li>
								<li><span class="name">유*민</span> <span class="number">010-****-5107</span></li>
								<li><span class="name">조*경</span> <span class="number">010-****-6955</span></li>
								<li><span class="name">황*룡</span> <span class="number">010-****-6132</span></li>
								<li><span class="name">임*현</span> <span class="number">010-****-1001</span></li>
								<li><span class="name">송*영</span> <span class="number">010-****-4013</span></li>
								<li><span class="name">백*식</span> <span class="number">010-****-0511</span></li>
								<li><span class="name">김*민</span> <span class="number">010-****-3556</span></li>
								<li><span class="name">신*영</span> <span class="number">010-****-1222</span></li>
								<li><span class="name">(주)*브</span> <span class="number">010-****-6248</span></li>
								<li><span class="name">신*희</span> <span class="number">010-****-4540</span></li>
							</ul>
						</div>
						<div class="result_caption_text">※ 이벤트 참여 시 등록해주신 휴대폰번호 뒤 4자리를<br> 검색하여 당첨여부를 확인하세요! </div>
						<div class="result_search">
							<div class="search_input"><input type="text" maxlength="4" numberonly="" nospace="" id="search_text"></div>
							<div class="search_btn"><a href="javascript:search_result();">검색</a></div>
						</div>					

					</div>
					<div class="result_info">
						<div class="result_info_inner">
							<dl>
								<dt>[당첨 안내]</dt>
								<dd style="word-break:keep-all;">- 6월 23일부터 당첨 고객께 순차적으로 개별 연락 예정입니다.</dd>
							</dl>
							<dl>
								<dt>[당첨 취소]</dt>
								<dd style="word-break:keep-all;">- 6월 29일까지 전화 연락이 되지 않아 주소 확인이 어려운 경우</dd>
								<dd style="word-break:keep-all;">- 양도 사실이 확인 된 경우</dd>
							</dl>
							<dl>
								<dt>[Hej, Klass 운영사무국]</dt>
								<dd>- 기간 : 6월 23일 ~ 7월 6일</dd>
								<dd>- 전화 : 02-2057-1257</dd>
								<dd>- 카카오톡채널 : hejklass</dd>
								<dd>&nbsp;&nbsp;&nbsp;(http://pf.kakao.com/_sxfExcK)</dd>
								<dd>- 응대시간 : 10:00~18:00</dd>
							</dl>
						</div>
					</div>
				</div>
			</section>
            <section id="step_02" class="testdrive_info">
				<div class="testdrive_info_inner">
					<div class="event_01 event_wrap">
						<div class="ti">행사 안내</div>
					</div>
					<div class="event_date">
						<ul class="event_date_list">
							<li>
                                <div class="list_ti">내용</div>
                                <div class="list_sti">두 번째 HEJ, KLASS의 주제는<br> '데스크테리어 만들기' 입니다.</div>
								<div class="list_txt">손흥민 선수의 친필 사인이 담겨있는<br>
											리미티드 에디션 데스크테리어로<br>
											나만의 공간을 또 하나의<br>
											VOLVO LIFESTYLE로 채워보세요.<br><br><br>
                                    <img src="/images/promotion/hejKlass_02/img_hejklass-1.jpg" alt="">
                                </div>
							</li>
							<li class="profile">
                                <div class="list_ti" style="margin-bottom:30px;">출연진 소개</div>
								<div class="list_txt">
                                    <div class="profileList">
                                        <ul>
                                            <li>
                                                <div class="box-img">
                                                    <img src="/images/promotion/hejKlass_02/img_hejklass_p01.jpg" alt="">
                                                </div>
                                                <div class="box-txt">
                                                    <em>특별 게스트</em>
                                                    <strong><span>축구선수</span> 손흥민</strong>
                                                    <p>VOLVO S90의 전속 모델이자 대한민국 축구를 대표하는 월드클래스 선수. 토트넘 훗스퍼 FC의 윙어로 활약 중인 대한민국 축구의 아이콘</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-img">
                                                    <img src="/images/promotion/hejKlass_02/img_hejklass_p02.jpg" alt="">
                                                </div>
                                                <div class="box-txt">
                                                    <em>진행자</em>
                                                    <strong><span>아나운서</span> 배성재</strong>
                                                    <p>월드컵 등 각종 스포츠 중계를 도맡아 오며 축구에 대한 열정과 전문 지식을 보유하고 있는 국민 스포츠 캐스터 & 아나운서</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-img">
                                                    <img src="/images/promotion/hejKlass_02/img_hejklass_p03.jpg" alt="">
                                                </div>
                                                <div class="box-txt">
                                                    <em>강사</em>
                                                    <strong><span>디자이너</span> 김용현</strong>
                                                    <p>공간과 가구에 모던함과 아름다움을 불어넣는 인테리어 카펜터</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
								</div>
							</li>
							<li>
                                <div class="list_ti" style="margin-bottom:20px;">운영방법</div>
                                <div class="list_sti">HEJ, KLASS 당첨자를 대상으로<br> 준비물이 담긴 KIT가 별도 배송됩니다.</div>
								<div class="list_txt">07월 07일(수) 저녁7시,<br>
											특별한 VOLVO MATE와 함께<br>
											나만의 데스크테리어를 만들어 보세요.<br>
											유튜브로 공개되는 온라인 클래스를 보며,<br>
											제작 방법을 함께 차근차근 따라 하면<br>
											아이들과 함께 누구나 완성품을 만들 수 있습니다.<br>
											<br>
											볼보자동차코리아 YouTube 바로가기<br>
											<a href="https://www.youtube.com/VolvoCarKorea" style="color:#1868b9;" target="_blank">https://www.youtube.com/VolvoCarKorea</a><br>
								</div>
							</li>
							<li>
                                <div class="list_ti">신청 기간</div>
								<div class="list_txt">2021.06.16(수)  ~ 2021.06.20(일)</div>
							</li>
							<li style="padding: 30px 0;">
                                <div class="list_ti">신청 대상</div>
								<div class="list_txt">볼보자동차 신차 구매 고객<br>
                                    <br>
                                    XC90, S90, Cross Country(V90) : MY17 ~ MY21<br>
                                    XC60, XC40 : MY18 ~ MY21<br>
                                    S60, Cross Country(V60) : MY19 ~ MY21

                                </div>
							</li>
							<li>
                                <div class="list_ti">당첨자 발표</div>
								<div class="list_txt">2021.06.23(수) / 총 300명</div>
							</li>
							<li>
                                <div class="list_ti">준비물 KIT 발송 일정</div>
								<div class="list_txt">2021.06.29(화) ~2021.07.06(화)</div>
							</li>
						</ul>
					</div>
				</div>
            </section>
        </div>

    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

    

	<script>
        // input_nospace
        $("input:text[noSpace]").on("keyup", function() {
            $(this).val($(this).val().replace(' ',''));
        });

        // input_numberOnly
        $("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
        });
		


        function checkValidate(f) {
			alert('Hej, Klass #2\n 참여 신청이 종료 되었습니다.');
			return false;
            app.showOverlayProgress();
            var data = {};
           
            if (!f.name.value) {
                alert("이름을 입력해주세요.");
                f.name.focus();
                app.hideOverlayProgress();
                return false;
            }
           
            
            if (!f.hp1.value) {
                alert("휴대 전화번호(처음 자리)를 선택해주세요.");
                f.hp1.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.hp2.value) {
                alert("휴대 전화번호(가운데 자리)를 입력해주세요.");
                f.hp2.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.hp1.value == '010'){
                if(f.hp2.value.length != 4){
                    alert('휴대 전화번호(가운데 자리)를 확인해주세요.');
                    f.hp2.focus(); 
                    app.hideOverlayProgress();
                    return false; 
                }
            } else {
                if (f.hp2.value.length < 3) {
                    alert('휴대 전화번호(가운데 자리)를 확인해주세요.'); 
                    f.hp2.focus();  
                    app.hideOverlayProgress();
                    return false; 
                }
            }
            
            if (!f.hp3.value) {
                alert("휴대 전화번호(마지막 자리)를 입력해주세요.");
                f.hp3.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.hp3.value.length != 4) {
                alert('휴대 전화번호(마지막 자리)를 확인해주세요.'); 
                $("#hp3").focus(); 
                app.hideOverlayProgress();
                return false; 
            }
            
            if (!f.car_model.value) {
                alert("보유 차종을 선택해주세요.");
                f.car_model.focus();
                app.hideOverlayProgress();
                return false;
            }

			if (!f.car_num.value) {
                alert("차량번호를 입력해주세요.");
                f.car_num.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.agree1.checked) {
                alert("이벤트 약관에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree1.focus();
                app.hideOverlayProgress();
                return false;
            }

			ajaxPostPromo();

            function ajaxPostPromo() {
                console.log($('#promoform').serializeObject())
                var response;
                $.ajax({
                    url: "/ajax/ajax.postHejKlass2.php",
                    type:'post',
                    // contentType: 'application/json;',
                    data: $('#promoform').serializeObject(),
                    dataType: 'text',
                    success: function(res){
                        response = res;
                        console.log(res);
						location.reload();
						
                    },
                    complete: function(data) {
                        alert(response);
						app.hideOverlayProgress();
                    },
                    error: function(e) {
                        console.log(e);
						app.hideOverlayProgress();
                    }
                })
            }

            return false;
        }

        jQuery.fn.serializeObject = function() { var obj = null; try { if(this[0].tagName && this[0].tagName.toUpperCase() == "FORM" ) { var arr = this.serializeArray(); if(arr){ obj = {}; jQuery.each(arr, function() { obj[this.name] = this.value; }); } } }catch(e) { alert(e.message); }finally {} return obj; }


	function search_result(){

			if( $('.result_list_inner > ul > li > span.number:contains("' + $('#search_text').val() + '")').length > 0 ) {
                $('.result_list_inner > ul > li > span.number:contains("' + $('#search_text').val() + '")').each(function (index) {
					var match_name = $(this).parent().find(".name").text();
					var match_number = $(this).parent().find(".number").text();
					var msg = "Hej, Klass\n당첨을 진심으로 축하드립니다!\n\n"+match_name+" "+match_number;
					alert(msg);
                });
            }
            else {
                alert('"Hej, Klass\n당첨되지 않으셨습니다.\n\n참여해 주셔서 감사드리며,\n더 좋은 이벤트로 찾아 뵙겠습니다.');
            }		
	}
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>