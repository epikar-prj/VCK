<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$pToday = strtotime(date('Y-m-d'));
$pSdate = strtotime('2020-10-05');

if (!isLogined()) {
	echo "<script>alert('볼보 고객만 가능한 서비스 입니다.');</script>";
	MgMoveURL('/html/member/login.php');
}

if (!isOwnered()) {
	echo "<script>alert('볼보 고객만 가능한 서비스 입니다.');history.back();</script>";
}

$CODE = "promotion";
$FOOTER_CODE = "benefit";
$TITLE = "PROGRAM";

$id = $_COOKIE['member_id'];
$nm = $_COOKIE['member_name'];

$hp = [];

if ($_COOKIE["member_hp"]) {
    $hp[0] = substr($_COOKIE["member_hp"],0,3);
    $hp[1] = substr($_COOKIE["member_hp"],3,-4);
    $hp[2] = substr($_COOKIE["member_hp"],-4);
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
    <!-- <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="/html/<?=$CODE?>/promotion1.php">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>

        <ul class="child_menu">
            <li><a href="/html/promotion/promotion1.php" class="on">Hej, Familj</a></li>
            <li><a href="/html/promotion/hejKlass_view2.php" data-type="owner">Hej, Klass</a></li>
            <li><a href="/html/event/">Event</a></li>
        </ul>

        <section id="visual">
            <div class="visual_cont">
                <div class="box-img">
                    <!-- <video id="vid" autoplay="" muted="" loop="" preload="auto">
                        <source id="mp4" src="https://volvofilm.com/images/hejfamilj_video.mp4" type="video/mp4">
                    </video> -->
                    <img src="/images/promotion/2021/main_visual.jpg" alt="">
                </div>
                <div class="visual_cont_inner">
                    <div class="visual_logo"><img src="/images/promotion/2021/hejfamilj_logo.png"></div>
                    <div class="text"><span>2021 Hej, Familj</span>는 가족과 함께하는 소중한<br>순간을 위하여, 조금 더 안전하고 프라이빗하게<br>여러분을 찾아갑니다.</div>
                    <div class="text">소중한 이들과의 하루가 조금 더 특별해 지도록<br>가족들이 스스로 만들어가는 여정들로, 천천히 일상의<br>균형을 찾아가는 온전한 '쉼'을 즐기는 시간이기를<br>바랍니다.</div>
                </div>
            </div>
        </section>

        <div class="container">
			<section id="result" >
				<div class="result_inner">
					<div class="event_01 event_wrap">
						<div class="sti">2021 Hej, Familj</div>
						<div class="ti">당첨을 진심으로 축하드립니다!</div>
					</div>
					<div class="result_list">
						<div class="result_list_inner">
							<ul>
                                <li><span class="name">강*훈</span> <span class="number">(010-****-9305)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">강*주</span> <span class="number">(010-****-8408)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">강*봉</span> <span class="number">(010-****-2652)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">강*현</span> <span class="number">(010-****-8748)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">강*민</span> <span class="number">(010-****-4230)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">강*실</span> <span class="number">(010-****-0088)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">고*종</span> <span class="number">(010-****-7696)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">공*혁</span> <span class="number">(010-****-5551)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">곽*훈</span> <span class="number">(010-****-0816)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">권*정</span> <span class="number">(010-****-6211)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">권*희</span> <span class="number">(010-****-6406)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">권*선</span> <span class="number">(010-****-7535)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">권*란</span> <span class="number">(010-****-8611)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">길*윤</span> <span class="number">(010-****-1454)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">김*이</span> <span class="number">(010-****-3650)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">김*민</span> <span class="number">(010-****-3653)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">김*식</span> <span class="number">(010-****-8000)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 16일(수) ~ 6월 17일(목)</span></li>
                                <li><span class="name">김*희</span> <span class="number">(010-****-8950)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">김*미</span> <span class="number">(010-****-0313)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">김*준</span> <span class="number">(010-****-6615)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">김*건</span> <span class="number">(010-****-4098)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">김*규</span> <span class="number">(010-****-1133)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">김*성</span> <span class="number">(010-****-1664)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">김*희</span> <span class="number">(010-****-0566)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">김*민</span> <span class="number">(010-****-0364)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">김*배</span> <span class="number">(010-****-9528)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">김*경</span> <span class="number">(010-****-6045)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">김*수</span> <span class="number">(010-****-8133)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">김*영</span> <span class="number">(010-****-5324)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">김*식</span> <span class="number">(010-****-8318)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">김*암</span> <span class="number">(010-****-1024)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">김*주</span> <span class="number">(010-****-0522)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">김*천</span> <span class="number">(010-****-1364)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">김*영</span> <span class="number">(010-****-6408)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">김*석</span> <span class="number">(010-****-2053)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">김*수</span> <span class="number">(010-****-3602)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">김*수</span> <span class="number">(010-****-1556)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 15일(화) ~ 6월 16일(수)</span></li>
                                <li><span class="name">김*빈</span> <span class="number">(010-****-1115)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">김*선</span> <span class="number">(010-****-7979)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">김*귀</span> <span class="number">(010-****-1739)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">김*수</span> <span class="number">(010-****-3574)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">김*영</span> <span class="number">(010-****-6521)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">김*우</span> <span class="number">(010-****-6792)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">김*율</span> <span class="number">(010-****-3515)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">김*신</span> <span class="number">(010-****-5936)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">김*하</span> <span class="number">(010-****-2260)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">김*호</span> <span class="number">(010-****-0782)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 16일(수) ~ 6월 17일(목)</span></li>
                                <li><span class="name">김*완</span> <span class="number">(010-****-1993)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 17일(목) ~ 6월 18일(금)</span></li>
                                <li><span class="name">김*욱</span> <span class="number">(010-****-9909)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">김*수</span> <span class="number">(010-****-3681)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">김*우</span> <span class="number">(010-****-6429)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">김*욱</span> <span class="number">(010-****-5310)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">김*섭</span> <span class="number">(010-****-3901)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">김*태</span> <span class="number">(010-****-0976)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">김*준</span> <span class="number">(010-****-9811)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">김*중</span> <span class="number">(010-****-0507)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">남*경</span> <span class="number">(010-****-5726)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">도*욱</span> <span class="number">(010-****-0044)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">류*목</span> <span class="number">(010-****-6082)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">마*호</span> <span class="number">(010-****-0100)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">마*람</span> <span class="number">(010-****-0315)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">문*수</span> <span class="number">(010-****-2529)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">문*봉</span> <span class="number">(010-****-1540)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">민*지</span> <span class="number">(010-****-3600)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">박*준</span> <span class="number">(010-****-1787)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
                                <li><span class="name">박*원</span> <span class="number">(010-****-5323)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">박*협</span> <span class="number">(010-****-6797)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">박*구</span> <span class="number">(010-****-2321)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 15일(화) ~ 6월 16일(수)</span></li>
                                <li><span class="name">박*환</span> <span class="number">(010-****-4814)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">박*익</span> <span class="number">(010-****-7658)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">박*영</span> <span class="number">(010-****-7870)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">박*완</span> <span class="number">(010-****-5216)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">박*재</span> <span class="number">(010-****-5387)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">박*아</span> <span class="number">(010-****-0629)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">박*호</span> <span class="number">(010-****-4888)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">박*영</span> <span class="number">(010-****-2112)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 18일(금) ~ 6월 19일(토)</span></li>
                                <li><span class="name">배*욱</span> <span class="number">(010-****-8798)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">배*봉</span> <span class="number">(010-****-0051)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">백*흠</span> <span class="number">(010-****-6509)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">서*원</span> <span class="number">(010-****-4274)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">석*근</span> <span class="number">(010-****-5136)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">성*수</span> <span class="number">(010-****-6275)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">소*경</span> <span class="number">(010-****-5783)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">손*성</span> <span class="number">(010-****-7777)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">송*업</span> <span class="number">(010-****-3169)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">송*현</span> <span class="number">(010-****-8054)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">송*호</span> <span class="number">(010-****-2713)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">신*섭</span> <span class="number">(010-****-1709)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 16일(수) ~ 6월 17일(목)</span></li>
                                <li><span class="name">신*한</span> <span class="number">(010-****-4469)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">신*호</span> <span class="number">(010-****-7656)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">안*진</span> <span class="number">(010-****-5509)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">안*남</span> <span class="number">(010-****-4620)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">안*</span> <span class="number">(010-****-2232)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 17일(목) ~ 6월 18일(금)</span></li>
                                <li><span class="name">안*홍</span> <span class="number">(010-****-1733)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">양*준</span> <span class="number">(010-****-5142)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 18일(금) ~ 6월 19일(토)</span></li>
                                <li><span class="name">양*철</span> <span class="number">(010-****-3935)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">엄*원</span> <span class="number">(010-****-1221)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">오*섭</span> <span class="number">(010-****-3312)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">오*석</span> <span class="number">(010-****-6746)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">유*진</span> <span class="number">(010-****-5747)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">유*영</span> <span class="number">(010-****-1543)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">유*원</span> <span class="number">(010-****-7453)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">윤*상</span> <span class="number">(010-****-5642)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">윤*만</span> <span class="number">(010-****-8972)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">윤*지</span> <span class="number">(010-****-7854)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">윤*식</span> <span class="number">(010-****-1522)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">이*정</span> <span class="number">(010-****-7473)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">이*은</span> <span class="number">(010-****-5723)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">이*준</span> <span class="number">(010-****-9562)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">이*진</span> <span class="number">(010-****-0003)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">이*명</span> <span class="number">(010-****-8335)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 17일(목) ~ 6월 18일(금)</span></li>
                                <li><span class="name">이*민</span> <span class="number">(010-****-1628)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">이*길</span> <span class="number">(010-****-7179)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">이*렬</span> <span class="number">(010-****-7350)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 29일(토) ~ 5월 30일(일)</span></li>
                                <li><span class="name">이*엽</span> <span class="number">(010-****-1244)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">이*철</span> <span class="number">(010-****-3436)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">이*훈</span> <span class="number">(010-****-4940)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">이*민</span> <span class="number">(010-****-3357)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">이*한</span> <span class="number">(010-****-9576)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">이*진</span> <span class="number">(010-****-9491)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">이*창</span> <span class="number">(010-****-8956)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">이*근</span> <span class="number">(010-****-8313)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">이*엽</span> <span class="number">(010-****-4028)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">이*엽</span> <span class="number">(010-****-3044)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 18일(금) ~ 6월 19일(토)</span></li>
                                <li><span class="name">이*서</span> <span class="number">(010-****-7987)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">이*선</span> <span class="number">(010-****-5120)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">이*택</span> <span class="number">(010-****-1582)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">이*홍</span> <span class="number">(010-****-8401)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">이*숙</span> <span class="number">(010-****-4771)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
                                <li><span class="name">이*규</span> <span class="number">(010-****-5795)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">이*옥</span> <span class="number">(010-****-0251)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">이*현</span> <span class="number">(010-****-2942)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
                                <li><span class="name">이*표</span> <span class="number">(010-****-4216)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">이*한</span> <span class="number">(010-****-0929)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
                                <li><span class="name">이*현</span> <span class="number">(010-****-0317)</span> <span class="loc">태안 스테이21</span> <span class="date">6월 15일(화) ~ 6월 16일(수)</span></li>
                                <li><span class="name">이*현</span> <span class="number">(010-****-4437)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">이*희</span> <span class="number">(010-****-2691)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">이*수</span> <span class="number">(010-****-2097)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">이*현</span> <span class="number">(010-****-5800)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">이*훈</span> <span class="number">(010-****-5062)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 13일(일) ~ 6월 14일(월)</span></li>
                                <li><span class="name">이*수</span> <span class="number">(010-****-9043)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">이*민</span> <span class="number">(010-****-3692)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">임*혁</span> <span class="number">(010-****-9202)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">임*열</span> <span class="number">(010-****-0764)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">임*택</span> <span class="number">(010-****-1522)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">임*영</span> <span class="number">(010-****-7714)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">장*훈</span> <span class="number">(010-****-3890)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">장*정</span> <span class="number">(010-****-4644)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">전*호</span> <span class="number">(010-****-8995)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">전*덕</span> <span class="number">(010-****-0608)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">전*준</span> <span class="number">(010-****-3566)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">전*철</span> <span class="number">(010-****-1962)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">전*기</span> <span class="number">(010-****-1373)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">전*완</span> <span class="number">(010-****-2505)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">정*락</span> <span class="number">(010-****-1182)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">정*구</span> <span class="number">(010-****-1255)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">정*용</span> <span class="number">(010-****-5214)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">정*걸</span> <span class="number">(010-****-5439)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">정*우</span> <span class="number">(010-****-0700)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">정*욱</span> <span class="number">(010-****-9323)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">정*순</span> <span class="number">(010-****-6306)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">정*성</span> <span class="number">(010-****-5468)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">조*일</span> <span class="number">(010-****-3464)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">조*호</span> <span class="number">(010-****-3080)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">조*</span> <span class="number">(010-****-6680)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">조*현</span> <span class="number">(010-****-1432)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">조*연</span> <span class="number">(010-****-3455)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">주식회사**안</span> <span class="number">(010-****-6828)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">주*석</span> <span class="number">(010-****-6272)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">주*수</span> <span class="number">(010-****-6783)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">주*선</span> <span class="number">(010-****-3755)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">진*동</span> <span class="number">(010-****-3416)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">차*미</span> <span class="number">(010-****-3720)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">최*남</span> <span class="number">(010-****-5042)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">최*영</span> <span class="number">(010-****-8374)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 26일(수) ~ 5월 27일(목)</span></li>
                                <li><span class="name">최*빈</span> <span class="number">(010-****-0990)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 30일(일) ~ 5월 31일(월)</span></li>
                                <li><span class="name">최*근</span> <span class="number">(010-****-1689)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
                                <li><span class="name">최*석</span> <span class="number">(010-****-5908)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">최*혁</span> <span class="number">(010-****-6422)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 4일(금) ~ 6월 5일(토)</span></li>
                                <li><span class="name">하*숙</span> <span class="number">(010-****-6567)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">하*향</span> <span class="number">(010-****-5083)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 25일(화) ~ 5월 26일(수)</span></li>
                                <li><span class="name">하*연</span> <span class="number">(010-****-9967)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">하*수</span> <span class="number">(010-****-9129)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">한*재</span> <span class="number">(010-****-5060)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">한*창</span> <span class="number">(010-****-3726)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">한*기</span> <span class="number">(010-****-3183)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">한*영</span> <span class="number">(010-****-8794)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 11일(금) ~ 6월 12일(토)</span></li>
                                <li><span class="name">한*선</span> <span class="number">(010-****-1915)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 5일(토) ~ 6월 6일(일)</span></li>
                                <li><span class="name">허*봉</span> <span class="number">(010-****-2560)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 12일(토) ~ 6월 13일(일)</span></li>
                                <li><span class="name">허*슬</span> <span class="number">(010-****-6727)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 31일(월) ~ 6월 1일(화)</span></li>
                                <li><span class="name">현*란</span> <span class="number">(010-****-3337)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 10일(목) ~ 6월 11일(금)</span></li>
                                <li><span class="name">홍*준</span> <span class="number">(010-****-7146)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
                                <li><span class="name">홍*숙</span> <span class="number">(010-****-6145)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 27일(목) ~ 5월 28일(금)</span></li>
                                <li><span class="name">홍*헌</span> <span class="number">(010-****-1760)</span> <span class="loc">강릉 씨마크호텔</span> <span class="date">6월 3일(목) ~ 6월 4일(금)</span></li>
                                <li><span class="name">홍*진</span> <span class="number">(010-****-0295)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 14일(월) ~ 6월 15일(화)</span></li>
                                <li><span class="name">홍*식</span> <span class="number">(010-****-6193)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 8일(화) ~ 6월 9일(수)</span></li>
                                <li><span class="name">홍*호</span> <span class="number">(010-****-2717)</span> <span class="loc">경주 SG 빌라앤호텔</span> <span class="date">6월 9일(수) ~ 6월 10일(목)</span></li>
                                <li><span class="name">황*희</span> <span class="number">(010-****-0719)</span> <span class="loc">영월 비브릿지</span> <span class="date">5월 28일(금) ~ 5월 29일(토)</span></li>
							</ul>
						</div>
						<div class="result_caption_text">※ 이벤트 참여 시 등록해주신 휴대폰번호 뒤 4자리를<br> 검색하여 당첨여부를 확인하세요! </div>
						<div class="result_search">
							<div class="search_input"><input type="text" maxlength="4" numberOnly noSpace id="search_text"></input></div>
							<div class="search_btn"><a href="javascript:search_result();">검색</a></div>
						</div>					
						<script>
							function search_result(){

									if( $('.result_list_inner > ul > li > span.number:contains("' + $('#search_text').val() + '")').length > 0 ) {
										$('.result_list_inner > ul > li > span.number:contains("' + $('#search_text').val() + '")').each(function (index) {
											var match_name = $(this).parent().find(".name").text();
											var match_number = $(this).parent().find(".number").text();
											var match_loc = $(this).parent().find(".loc").text();
											var match_date = $(this).parent().find(".date").text();
											var msg = "2021 Hej, Familj\n\n당첨을 진심으로 축하드립니다!\n"+match_name+" "+match_number+"\n\n숙소명: "+match_loc+"\n숙박일자: "+match_date+"";
											alert(msg);
										});
									}
									else {
										alert('2021 Hej, Familj\n\n당첨되지 않으셨습니다.\n\n참여해 주셔서 감사드리며,\n더 좋은 이벤트로 찾아 뵙겠습니다.');
									}		
							}							
						</script>
					</div>
					<div class="result_info">
						<div class="result_info_inner">
							<dl>
								<dt>[당첨 안내]</dt>
								<dd>- 5월 12일부터 당첨 고객께 순차적으로 개별 연락 예정입니다.</dd>
								<dd>- 개별 연락을 받으신 고객의 경우 5월 17일까지 구비서류 제출 및 참가비 입금이 완료되어야 합니다.</dd>
								<dd>- 구비 서류 제출 및 참가비 입금 완료 시, 당첨이 확정됩니다.<br>(36개월 미만의 영아는 참가비가 면제 됩니다.)</dd>
							</dl>
							<dl>
								<dt>[당첨 취소]</dt>
								<dd>아래와 같은 경우에는 당첨이 취소 됩니다.</dd>
								<dd>- 당첨자가 차량 실소유자 본인이 아닌 경우</dd>
								<dd>- 참석 기준 인원을 초과하는 경우</dd>
								<dd>- 구비 서류 제출 및 참가비 입금을 5월 17일까지 하지 않으시는 경우</dd>
							</dl>
							<dl>
								<dt>[HEJ, FAMILJ 운영사무국]</dt>
								<dd>- 기간 : 5월 12일 ~ 6월 18일</dd>
								<dd>- 시간 : 10:00 ~ 18:00</dd>
								<dd>- 전화 : 02-2057-1283</dd>
								<dd>- 카카오톡채널 : 2021hejfamilj</dd>
								<dd>- E-mail : volvohejfamilj@blueinms.co.kr</dd>
								<dd>- FAX : 02-2057-3368</dd>
								<dd>- 참가비 입금 계좌:  우리은행 896-231172-13-101 / 예금자명: 블루인마케팅서비스<br>(참가비는 현금영수증 발행이 불가능합니다.)</dd>

							</dl>
						</div>
					</div>
				</div>
			</section>
            <section id="step_02" class="testdrive_info">
				<div class="testdrive_info_inner">
					<div class="event_01 event_wrap">
						<div class="sti">EVENT</div>
						<div class="ti">행사 안내</div>
					</div>
					<div class="event_date">
						<div class="event_date_ti">행사 일정</div>
						<ul class="event_date_list">
							<li>
                                <div class="list_ti"><span class="num">1.</span> 비브릿지</div>
                                <div class="list_loc">(강원도 영월군 김삿갓면 주문리 6-1)</div>
								<div class="list_txt">2021.05.25(화) ~ 06.01(화)</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">2.</span> 씨마크호텔</div>
                                <div class="list_loc">(강원도 강릉시 해안로406번길 2)</div>
								<div class="list_txt">2021.06.03(목) ~ 06.06(일)</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">3.</span> SG 빌라앤호텔</div>
                                <div class="list_loc">(경북 경주시 감포읍 동해안로 1819-23)</div>
								<div class="list_txt">2021.06.08(화) ~ 06.15(화)</div>
							</li>
							<li>
                                <div class="list_ti"><span class="num">4.</span> 스테이21</div>
                                <div class="list_loc">(충남 태안군 이원면 당산리 29-23)</div>
								<div class="list_txt">2021.06.15(화) ~ 06.19(토)</div>
							</li>
						</ul>
					</div>
					<div class="event_info">
						<div class="event_info_ti">신청 안내</div>
						<ul class="event_info_list">
							<li>
								<div class="list_ti">기간</div>
								<div class="list_txt">2021.04.28(수) ~ 05.05(수) </div>
							</li>
							<li>
								<div class="list_ti">당첨자 발표</div>
								<div class="list_txt">2021.05.12(수)<br><span class="caption">* 이벤트 페이지 공지 및 당첨자 개별 연락</span></div>
							</li>
                            <li>
								<div class="list_ti">제공 서비스</div>
								<div class="list_txt">1박 2일 객실 & 부대시설 /<br> 웰컴 패키지 / 스낵 플레이트 /<br> 조식 서비스</div>
							</li>
                            <li>
								<div class="list_ti">대상</div>
								<div class="list_txt">볼보자동차 신차 구매 고객<span>XC90, S90, Cross Country(V90): MY17~<br>XC60, XC40 : MY18~<br>Cross Country (V60), S60 : MY19~</span></div>
							</li>
							<li>
								<div class="list_ti">당첨인원</div>
								<div class="list_txt">200가족</div>
							</li>
							<li>
								<div class="list_ti">참가비</div>
								<div class="list_txt">성인 5만원, 미성년자 3만원 (1인 기준)</div>
							</li>
						</ul>
						<ul class="event_info_caption">
                            <li>* 본 행사는 중복 참여 및 신청이 불가합니다.</li>
							<li>* 각 숙소 별 동반 인원 외 추가 입실이 불가합니다.</li>
                            <li>* 코로나19 관련 지침 및 방역 수칙에 따라 입장이 제한되거나 행사가 변동 / 취소될 수 있습니다.</li>
                            <li>* 정부의 5인 이상 집합금지 명령에 따라 5인 이상 숙박은 직계 가족만 가능합니다.</li>
							<li><img style="width:100%; display:block; max-width:400px; margin:20px auto 0;" src="/images/promotion/2021/info_19_family.jpg"></li>
						</ul>
					</div>
				</div>
            </section>
        </div>
        <div class="box-ti" style="margin-bottom:30px;">
            <div class="sti">Accommodation</div>
            <div class="ti">숙박 시설</div>
        </div>
        
        <section id="accom" class="accom">
            <div class="accom_inner">
                <ul class="accom_list">
                    <li class="list_01" onclick="javascript:pop_accom_show(1);">
                        <div class="list_cont">
                            <div class="ti">비브릿지</div>
                            <!-- <div class="loc">(강원도 영월군 김삿갓면 주문리 6-1)</div> -->
                            <div class="date">2021.05.25(화) ~ 06.01(화)</div>
                            <div class="btn_more"><a href="javascript:;">더 보기 <span>&gt;</span></a></div>
                            <ul class="package">
                                <li>천혜의 자연 속에서<br>여유로운 휴식을<br>즐길 수 있는<br>럭셔리 풀 빌라<span>( 추천인원 : 4-6인 )</span></li>
                            </ul>
                        </div>
                        <img src="/images/promotion/2021/accom/accom_img_01.jpg">
                    </li>
                    <li class="list_02" onclick="javascript:pop_accom_show(2);">
                        <div class="list_cont">
                            <div class="ti">씨마크호텔</div>
                            <!-- <div class="loc">(강원도 강릉시 해안로406번길 2)</div> -->
                            <div class="date">2021.06.03(목) ~ 06.06(일)</div>
                            <div class="btn_more"><a href="javascript:;">더 보기 <span>&gt;</span></a></div>
                            <ul class="package">
                                <li>로맨틱한 동해 바다와<br>품격 있는 서비스를<br>갖춘 럭스티지 호텔<span>( 추천인원 : 2-3인 )</span><br></li>
                            </ul>
                        </div>
                        <img src="/images/promotion/2021/accom/accom_img_02.jpg">
                    </li>
                    <li class="list_03" onclick="javascript:pop_accom_show(3);">
                        <div class="list_cont">
                            <div class="ti">SG 빌라앤호텔</div>
                            <!-- <div class="loc">(경북 경주시 감포읍 동해안로 1819-23)</div> -->
                            <div class="date">2021.06.08(화) ~ 06.15(화)</div>
                            <div class="btn_more"><a href="javascript:;">더 보기 <span>&gt;</span></a></div>
                            <ul class="package">
                                <li>아름다운 동해안과<br>상록숲이 공존하는<br>프라이빗 풀<br>럭셔리 펜트하우스<span>( 추천인원 : 4-6인 )</span></li>
                            </ul>
                        </div>
                        <img src="/images/promotion/2021/accom/accom_img_03.jpg">
                    </li>
                    <li class="list_04" onclick="javascript:pop_accom_show(4);">
                        <div class="list_cont">
                            <div class="ti">스테이21</div>
                            <!-- <div class="loc">(충남 태안군 이원면 당산리 29-23)</div> -->
                            <div class="date">2021.06.15(화) ~ 06.19(토)</div>
                            <div class="btn_more"><a href="javascript:;">더 보기 <span>&gt;</span></a></div>
                            <ul class="package">
                                <li>서해안의 작은 섬에<br>위치한 감성숙소<br>편안함이 가득한<br>프라이빗 풀빌라<span>( 추천인원 : 3-4인 )</span></li>
                            </ul>
                        </div>
                        <img src="/images/promotion/2021/accom/accom_img_04.jpg">
                    </li>
                </ul>
            </div>
        </section>

        <div class="container" style="display:none;">
            <div class="box-ti">
                <div class="sti">RESERVATION</div>
                <div class="ti">참여 신청</div>
            </div>

            <form name="promoform" id="promoform" action="javascript: void(0)" method="post" onsubmit="return checkValidate(this);">
                <input type="hidden" name="isApp" value="true">
                

                <div class="applicant">
                    <strong class="input_tit">이름</strong>
                    <div class="input_wrap name_wrap">
                        <div class="input_box">
                            <input type="text" name="name" maxlength="120" noSpace placeholder="이름을 입력해주세요." value="<?php echo $nm; ?>">
                        </div>
                    </div>

                    <strong class="input_tit">생년월일</strong>
                    <div class="input_wrap date_wrap">
                        <div class="input_box">
                            <input type="text" name="birth" value="" maxlength="8" noSpace numberOnly placeholder="생년월일 (ex 19870829)">
                        </div>
                    </div>

                    <strong class="input_tit">휴대 전화번호</strong>
					<div class="input_wrap phone_wrap">
						<div class="input_box">
							<select name="hp1">
								<? foreach($OPTION_INFO['hp'] as $item) { 
									$selected = "";
									if ($item == $hp1) {
										$selected = "selected";
									}
									?>
									<option value="<?=$item?>" $selected><?=$item?></option>
								<? } ?>
							</select>
						</div>

                        
						<div class="input_box">
							<input type="number" id="hp2" name="hp2" pattern="\d*" value="<?if ($hp[1]) { echo $hp[1]; }?>" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
						</div>
						<div class="input_box">
							<input type="number" id="hp3" name="hp3" pattern="\d*" value="<?if ($hp[2]) { echo $hp[2]; }?>" maxlength="4" oninput="maxLengthCheck(this)" onkeypress="onlyNumber()" placeholder="1234">
						</div>
					</div>

                    <strong class="input_tit">이메일</strong>
                    <div class="input_wrap email_wrap">
                        <div class="input_box">
                            <input type="text" name="email" value="<? echo $id; ?>" placeholder="이메일을 입력해주세요.">
                            <input type="hidden" name="email_id">
                            <input type="hidden" name="email_domain">
                        </div>
                    </div>

                    <strong class="input_tit">보유차종</strong>
                    <div class="input_box">
                        <select name="car_model">
                            <option value="" selected disabled>선택</option>
                            <option value="A">XC90 (MY17~)</option>
                            <option value="B">S90 (MY17~)</option>
                            <option value="C">Cross Country(V90) (MY17~)</option>
                            <option value="D">XC60 (MY18~)</option>
                            <option value="E">XC40 (MY18~)</option>
                            <option value="F">Cross Country(V60) (MY19~)</option>
                            <option value="G">S60 (MY19~)</option>
                        </select>
                    </div>

                    <strong class="input_tit">차량번호</strong>
                    <div class="input_wrap">
                        <div class="input_box">
                            <input type="text" name="car_num" value="" noSpace placeholder="차량번호를 입력해주세요.">
                        </div>
                    </div>

                    <strong class="input_tit">구매형태</strong>
                    <div class="choise_wrap gender_wrap">
                        <label class="choise_box">
                            <input type="radio" name="buy_type" value="A">
                            <span>개인</span>
                        </label>
                        <label class="choise_box">
                            <input type="radio" name="buy_type" value="B">
                            <span>리스</span>
                        </label>
                    </div>

                    <strong class="input_tit">숙소명</strong>
                    <div class="input_box">
                        <select name="check_place" id="place">
                            <option value="" selected disabled>원하시는 숙소를 선택해주세요</option>
                            <option value="a">1. 영월 비브릿지</option>
                            <option value="b">2. 강릉 씨마크호텔</option>
                            <option value="c">3. 경주 SG 빌라앤호텔</option>
                            <option value="d">4. 태안 스테이21</option>
                        </select>
                    </div>
                    
                    <strong class="input_tit group_time">숙박일자</strong>
                    <div class="input_box group_time">
                        <select name="check_date" id="reservTime">
                            <option value="" selected disabled>원하시는 일정을 선택해주세요</option>
                        </select>
                    </div>

                    <strong class="input_tit group_widthCount">동반인원</strong>
                    <div class="input_box group_widthCount">
                        <select name="with_num" id="withCount">
                            <option value="" selected disabled>동반인원을 선택해주세요.</option>
                        </select>
                    </div>
                    <p class="descript">* 각 숙소별 참가 가능 인원 상이</p>

                    
                    <div id="with">
                        <!-- <strong class="input_tit with_1">동반자 정보1</strong>
                        <div class="input_wrap with_wrap with_1">
                            <div class="input_box with_name">
                                <input type="text" name="with_name_1" placeholder="이름">
                            </div>
                            <div class="input_box with_sex">
                                <select name="with_sex_1">
                                    <option value="" selected disabled>성별</option>
                                    <option value="M">남</option>
                                    <option value="F">여</option>
                                </select>
                            </div>
                        </div>
                        <div class="input_wrap with_wrap with_1">
                            <div class="input_box with_brith">
                                <input type="text" name="with_birth_1" placeholder="생년월일(ex 19870829)">
                            </div>
                            <div class="input_box with_rel">
                                <select name="with_rel_1">
                                    <option value="" selected disabled>관계</option>
                                    <option value="">배우자</option>
                                    <option value="">자녀</option>
                                    <option value="">부모</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="agree_wrap">
                    <p class="descript">개인정보 처리 및 이용, 처리위탁, 이벤트 약관에 동의해 주세요.
                        <small>이벤트 정보 안내, 각종 마케팅 활동 및 홍보, 판촉 활동 등의 목적으로 고객님의 정보를 활용하는 것에 대하여 동의합니다.<br>개인정보 수집 및 이용에 대해서 거부할 수 있으며 거부 시에는 이벤트, 광고성 메일 수신 또는 시승 안내에 어려움이 있을 수 있습니다.</small>
                    </p>                    
					<div class="agree">
                            <label class="top_label"><span>이벤트 약관, 개인정보 처리 및 이용약관에 모두 동의합니다.</span><input type="checkbox" id="all_agree"></label>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 개인정보 수집 및 이용에 대한 동의</span><input type="checkbox" id="agree1" name="agree1" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(1);">자세히보기</a>
                        </div>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 개인정보 처리 및 위탁에 대한 동의</span><input type="checkbox" id="agree2" name="agree2" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(2);">자세히보기</a>
                        </div>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 광고/정보 수신 및 마케팅 활용에 대한 동의</span><input type="checkbox" id="agree3" name="agree3" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(3);">자세히보기</a>
                        </div>
                        <div class="box-agree">
                            <label class="normal_label"><span>[필수] 이벤트 약관에 대한 동의
                            <small>※ 본 약관에는 마케팅 및 광고성 정보 수신 동의가 포함되어 있습니다.</small>
                            </span><input type="checkbox" id="agree4" name="agree4" value="Y"></label>
                            <a href="javascript: void(0)" onclick="open_pop(4);">자세히보기</a>
                        </div>
                    </div>
                    <div class="box-caption">
                        <strong>유의사항</strong>
                        <ul>
                            <li>볼보자동차 공식 딜러사에서 구입한 신차 보유 고객만 응모 가능합니다. </li>
                            <li>신청자 정보와 보유 차량 정보 불일치 시 사전 고지 없이 추첨에서 제외됩니다. </li>
                            <li>차량 실소유자 본인이 반드시 참석하여야 하며, 양도가 불가합니다. </li>
                            <li>참여 신청 시 입력한 동반인 수 외 추가 인원 발생 시 현장에서 전체 가족 체크인이 거부됩니다. </li>
                            <li>개인 차량의 경우 차량 등록증, 법인 차량의 경우 리스계약서 / 재직증명서 사본을 제출하여야 합니다. (당첨 후 개별 안내)</li>
                            <li>정부의 5인 이상 집합금지 명령에 따라 5인 이상의 경우 가족관계증명서를 추가로 제출해야 합니다. (당첨 후 개별 안내)</li>
                            <li>2017 SOMMAR / 2018 VINTER / 2018 HEJ FAMILJ / 2019 HEJ FAMILJ / Volvo World Golf Challenge / 2020 HEJ FAMILJ 참여 고객은 본 추첨에서 제외됩니다.</li>
                            <li>본 행사는 주최 측 상황에 따라 예고 없이 프로그램이 변경 될 수 있습니다. </li>
                            <li>본 이벤트는 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다. </li>
                            <li>코로나19 관련 지침 및 방역 수칙에 따라 입장이 제한되거나 행사가 변동, 취소될 수 있습니다.</li>
                        </ul>
                    </div>

                </div>
                
                <div class="btn_group mt30">
                    <button type="submit" class="btn bg_color1">신청완료</button>
                </div>
                
            </form>
        </div>


        <div id="agree1_pop" class="agree_pop" style="display: none;">
			<div class="top">
				<div class="back">
					<a href="javascript: void(0)" onclick="close_pop()">
						<img src="/images/common/ic_back.png" alt="">
					</a>
				</div>
				<h4>약관동의</h4>
			</div>

			<div class="middle">
                <h5>개인정보 수집 및 이용에 대한 동의 (필수)</h3>
                <p>회사는 고객님께 더 향상된 양질의 서비스를 제공하기 위하여 고객의 개인정보를 수집하고 있습니다.</p>
                <p>회사는 고객님의 사전 동의 없이는 개인정보를 함부로 공개하지 않으며, 당사가 수집한 개인정보는 다음의 목적을 위해 활용합니다.</p>
                <strong>1. 수집하는 개인정보의 항목</strong>
                <p>필수정보 : 성명, 휴대전화번호, 이메일, 생년월일, 성별, 보유 차종 및 차량 번호</p>
                <strong>2. 수집 목적 및 이용 내역</strong>
                <p>회사는 온라인을 통해 수집된 개인 정보를 다음의 목적을 위해 활용</p>
                <p>① 본인확인</p>
                <p>이벤트 진행을 위한 본인 식별 및 부정 이용 방지</p>
                <p>② 마케팅 및 광고에 활용</p>
                <p>이벤트 당첨자 선정 및 안내</p>
                <strong>3. 개인정보 보유 및 이용 기간</strong>
                <p>이용 목적 달성 시 (철회 요청은 고객센터 1588-1777로 연락해주시기 바랍니다.)</p>
            </div>
        </div>
        
        <div id="agree2_pop" class="agree_pop" style="display: none;">
			<div class="top">
				<div class="back">
					<a href="javascript: void(0)" onclick="close_pop()">
						<img src="/images/common/ic_back.png" alt="">
					</a>
				</div>
				<h4>약관동의</h4>
			</div>

			<div class="middle">
                <h5>개인정보 처리 및 위탁에 대한 동의 (필수)</h3>
                <p>회사는 서비스 이행을 위해 아래와 같이 개인정보 처리업무를 외부 전문업체에 위탁하여 운영하고 있습니다.</p>
                <strong>1. 개인정보 처리 및 위탁자</strong>
                <p>업체 : (주)마이테이블, (주)블루인마케팅서비스</p>
                <strong>2. 개인정보 처리 및 위탁 목적</strong>
                <p>홈페이지 시스템 개발/유지/보수, 행사 안내/진행</p>
                <p>위탁계약 시 개인정보보호의 안전을 기하기 위하여 개인정보보호 관련 지시 엄수, 개인정보에 관한 금지 및 사고 시의 책임부담 등을 명확히 규정하고 당해 계약 내용을 서면 및 전자적으로 보관하고 있습니다.</p>
            </div>
        </div>
        
        <div id="agree3_pop" class="agree_pop" style="display: none;">
			<div class="top">
				<div class="back">
					<a href="javascript: void(0)" onclick="close_pop()">
						<img src="/images/common/ic_back.png" alt="">
					</a>
				</div>
				<h4>약관동의</h4>
			</div>

			<div class="middle">
                <h5>광고/정보 수신 및 마케팅 활용에 대한 동의 (필수)</h3>
                <strong>1. 제공받는 자</strong>
                <p>- 볼보자동차코리아(주) 및 계약관계에 있는 대행사</p>
                <p>- 볼보자동차코리아(주) 및 공식 딜러사</p>
                <p>* 참조: 볼보자동차코리아(주) 홈페이지 www.volvocars.co.kr 의 ‘개인정보 취급방침’에 고지</p>
                <strong>2. 제공받는 자의 이용목적</strong>
                <p>- 차량 구매 고객 및 이벤트, 캠페인 참여고객에 대한 서비스 제공 및 기타 마케팅 활동</p>
                <strong>3. 제공하는 개인정보 항목</strong>
                <p>- 성명, 휴대전화번호, 이메일, 생년월일, 성별, 선호 차종(시승 신청 시)</p>
                <strong>4. 개인정보의 보유 및 이용 기간</strong>
                <p>- 이용 목적 달성 시 (철회 요청은 고객센터 1588-1777로 연락해주시기 바랍니다.)</p>
            </div>
        </div>
        
        <div id="agree4_pop" class="agree_pop" style="display: none;">
			<div class="top">
				<div class="back">
					<a href="javascript: void(0)" onclick="close_pop()">
						<img src="/images/common/ic_back.png" alt="">
					</a>
				</div>
				<h4>약관동의</h4>
			</div>

			<div class="middle">
                <h5>이벤트 약관에 대한 동의 (필수)</h3>
                <p>1. 볼보자동차 공식 딜러사에서 구입한 XC90 (MY17~MY21), S90 (MY17~MY21), CROSS COUNTRY(V90) (MY17~MY21), XC60 (MY18~MY21), XC40 (MY18~MY21), S60 (MY19~ MY21), THE NEW CROSS COUNTRY(V60) (MY19~MY21) 보유 고객만 응모 가능합니다.</p>
                <br>
                <p>2. 본 이벤트 안내는 MMS를 통해 진행되며, 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.</p>
                <br>
                <p>3. 신청자 정보와 보유 차량 정보 불일치 시 사전고지 없이 추첨에서 제외됩니다.</p>
                <br>
                <p>4. 차량 실소유자 본인이 반드시 참석하셔야 하며, 양도가 불가합니다.</p>
                <br>
                <p>5. 개인 차량의 경우 차량 등록증, 법인 차량의 경우 리스계약서/재직증명서 사본을 제출하여야 합니다. (당첨 후 개별안내)</p>
                <br>
                <p>6. 2017 VOLVO SOMMAR / 2018 VINTER HOUSE / 2018 HEJ FAMILJ / Volvo World Golf Challenge 참여 고객은 본 추첨에서 제외됩니다.</p>
                <br>
                <p>7. 행사 당일 신청 인원과 현장 참석 인원이 상이할 경우 이벤트 참여가 불가합니다.</p>
                <br>
                <p>8. 본 행사는 주최 측 상황에 따라 예고 없이 프로그램이 변경될 수 있습니다.</p>
                <br>
                <p>9. 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
            </div>
        </div>
        



        <div id="pop_accom" style="display: none;">
			<div id="accom_01" class="pop_accom_inner" style="">
				<div class="btn_close"><a href="javascript:pop_accom_close(1);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<!--<ul class="navigation">
					<li class="dot dot_01 active" onclick="slickGoTo(1,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(1,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(1,3)"></li>
				</ul>-->
				<ul class="cont">
                    <li class="step_01" tabindex="0" style="">
                        <div class="title">BE, BRIDGE</div>
                        <div class="step_01_cont">
                            <div class="step_01_cont_inner">
                                <div class="cont_ti">영월 비브릿지</div>
                                <div class="cont_txt">슬로우시티 영월의 자연과 하나로 어우러져,<br> 천혜의 풍경과 감성적인 공간 속에서<br> 안락하고 여유로운 휴가를 즐길 수 있는<br> 럭셔리 풀 빌라
                                </div>
                            </div>
                            <div class="step_01_cont_img"></div>
                        </div>`
                    </li>
                    <li class="step_03" tabindex="-1" style="">
                        <div class="title">PROGRAM</div>
                        <div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">그랜드 풀 빌라</div>
										<div class="txt">1박 2일 객실</div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">프라이빗 온수 풀</div>
										<div class="txt"></div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">조식 쿠폰</div>
										<div class="txt">(아메리칸 블랙퍼스트 + 아메리카노)</div>
									</li>
								</ul>
							</div>
							<div class="option">
								<div class="option_ti">OPTION <span></span></div>
								<ul class="option_list">
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">BBQ 그릴</div>
										<div class="txt"></div>
									</li>
									<li class="img_07">
										<div class="img"></div>
										<div class="ti">테라스 내 모닥불</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
                    </li>
                    <li class="step_02" tabindex="-1" style="">
                        <div class="title">GALLERY</div>
                        <ul class="photo_wrap">
                            <li class="photo_01"></li>
                            <li class="photo_02"></li>
                            <li class="photo_03"></li>
                            <li class="photo_04"></li>
                            <li class="photo_05"></li>
                            <li class="photo_06"></li>
                            <li class="photo_07"></li>
                            <li class="photo_08"></li>
                            <li class="photo_09"></li>
                        </ul>					
                    </li>
                </ul>
			</div> <!-- accom_01 end -->
			<div id="accom_02" class="pop_accom_inner" style="display:none;">
				<div class="btn_close"><a href="javascript:pop_accom_close(2);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<!--<ul class="navigation">
					<li class="dot dot_01" onclick="slickGoTo(2,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(2,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(2,3)"></li>
				</ul>-->
                <ul class="cont">
					<li class="step_01">
						<div class="title">SEAMARQ</div>
						<div class="step_01_cont">
							<div class="step_01_cont_inner">
								<div class="cont_ti">강릉 씨마크호텔</div>
								<div class="cont_txt">경포의 아름다운 동해바다와 마주하고 있는<br> 최고의 시설과 서비스를 갖춘<br> 국내 최초의 럭스티지 호텔로서<br> 진정한 쉼을 위한 단 하나의 공간</div>
							</div>
							<div class="step_01_cont_img"></div>
						</div>
                    </li>
                    <li class="step_03">
						<div class="title">PROGRAM</div>
						<div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">1박 2일 객실</div>
										<div class="txt"></div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">클럽 인피니티</div>
										<div class="txt">(투숙기간 내 이용 가능)</div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">써멀 스위트</div>
										<div class="txt">(투숙기간 내 이용 가능)</div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">웰컴 드링크</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_07">
										<div class="img"></div>
										<div class="ti">조식 쿠폰</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
					</li>
					<li class="step_02">
						<div class="title">GALLERY</div>
						<ul class="photo_wrap">
							<li class="photo_01"></li>
							<li class="photo_02"></li>
							<li class="photo_03"></li>
							<li class="photo_04"></li>
							<li class="photo_05"></li>
							<li class="photo_06"></li>
						</ul>					
					</li>
				</ul>
			</div> 
			<div id="accom_03" class="pop_accom_inner" style="display:none;">
				<div class="btn_close"><a href="javascript:pop_accom_close(3);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<!--<ul class="navigation">
					<li class="dot dot_01" onclick="slickGoTo(3,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(3,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(3,3)"></li>
				</ul>-->
                <ul class="cont">
					<li class="step_01">
						<div class="title">S.G VILLA&HOTEL</div>
						<div class="step_01_cont">
							<div class="step_01_cont_inner">
								<div class="cont_ti">경주 SG 빌라앤호텔</div>
								<div class="cont_txt">푸른 바다와 상록숲이 공존하는 아름다운<br>
									자연 속에서 프라이빗 풀과 호텔급 서비스를<br> 
									즐길 수 있는 럭셔리 펜트하우스
								</div>
							</div>
							<div class="step_01_cont_img"></div>
						</div>
                    </li>
                    <li class="step_03">
						<div class="title">PROGRAM</div>
						<div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">프라이빗 펜트하우스 A/B 동</div>
										<div class="txt">1박 2일 객실</div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">프라이빗 온수 풀</div>
										<div class="txt"></div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">프라이빗 히노키탕</div>
										<div class="txt"></div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">조식 룸서비스</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
					</li>
					<li class="step_02">
						<div class="title">GALLERY</div>
						<ul class="photo_wrap">
							<li class="photo_01"></li>
							<li class="photo_02"></li>
							<li class="photo_03"></li>
							<li class="photo_04"></li>
							<li class="photo_05"></li>
							<li class="photo_06"></li>
							<li class="photo_07"></li>
						</ul>					
					</li>
				</ul>
			</div> 
			<div id="accom_04" class="pop_accom_inner" style="display:none;">
				<div class="btn_close"><a href="javascript:pop_accom_close(4);"><img src="https://vckiframe.com/event/hejfamilj_fall_2020/images/common/btn_info_close.png"></a></div>
				<!--<ul class="navigation">
					<li class="dot dot_01" onclick="slickGoTo(4,1)"></li>
					<li class="dot dot_02" onclick="slickGoTo(4,2)"></li>
					<li class="dot dot_03" onclick="slickGoTo(4,3)"></li>
				</ul>-->
				<ul class="cont">
					<li class="step_01">
						<div class="title">STAY21</div>
						<div class="step_01_cont">
							<div class="step_01_cont_inner">
								<div class="cont_ti">태안 스테이21</div>
								<div class="cont_txt">나만 아는, 나만을 위한, 나만의 섬<br>
									온전히 가족의 추억에 집중할 수 있는<br>
									편안함이 가득한 프라이빗 풀빌라
								</div>
							</div>
							<div class="step_01_cont_img"></div>
						</div>
                    </li>
                    <li class="step_03">
						<div class="title">PROGRAM</div>
						<div class="step_03_cont">
							<div class="package">
								<div class="package_ti">HEJ FAMILJ PACKAGE</div>
								<ul class="package_list">
									<li class="img_01">
										<div class="img"></div>
										<div class="ti">독채 풀빌라 A/B/C 동</div>
										<div class="txt">1박 2일 객실</div>
									</li>
									<li class="img_02">
										<div class="img"></div>
										<div class="ti">프라이빗 온수 풀</div>
										<div class="txt"></div>
									</li>
									<li class="img_03">
										<div class="img"></div>
										<div class="ti">웰컴 패키지</div>
										<div class="txt"></div>
									</li>
									<li class="img_04">
										<div class="img"></div>
										<div class="ti">스낵 플레이트</div>
										<div class="txt"></div>
									</li>
									<li class="img_05">
										<div class="img"></div>
										<div class="ti">조식 서비스</div>
										<!--<div class="txt">(조식 제공 없음)</div>-->
									</li>
								</ul>
							</div>
							<div class="option">
								<div class="option_ti">OPTION <span></span></div>
								<ul class="option_list">
									<li class="img_06">
										<div class="img"></div>
										<div class="ti">BBQ 그릴</div>
										<div class="txt"></div>
									</li>
								</ul>
							</div>
							<div class="caption">
                                <p>※ 저녁식사는 제공되지 않으며, 행사 홈페이지에 명기된 서비스 외 모든 사항은 고객 부담입니다.</p>
                                <p>※ 객실은 임의 또는 추첨 배정되며 선택 혹은 변경이 불가합니다.</p>
								<p>※ 본 이미지와 실제 행사 내용이 다를 수 있습니다.</p>
							</div>
						</div>
					</li>
					<li class="step_02">
						<div class="title">GALLERY</div>
						<ul class="photo_wrap">
							<li class="photo_01"></li>
							<li class="photo_02"></li>
							<li class="photo_03"></li>
							<li class="photo_04"></li>
							<li class="photo_05"></li>
							<li class="photo_06"></li>
						</ul>					
					</li>
				</ul>
			</div> <!-- accom_04 end -->
			<div class="pop_accom_close" onclick="javascript:pop_accom_close(1);"></div>
		</div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

    <script>
        function pop_accom_close(num){
           /* $('#pop_accom').fadeOut('500',function(){
                $('#accom_0'+num+' ul.cont').slick('unslick');
            });*/
			$('#pop_accom').fadeOut('500');
            
        }

        function pop_accom_show(num){
            $('ul.navigation li').removeClass('active');
            $('.pop_accom_inner').hide();
            $('#accom_0'+num+'').show();
            $('#pop_accom').fadeIn();
            $('#accom_0'+num+' ul.cont').slick({
                infinite: false,
                arrows: false,
                dots:false
            });
            $('#accom_0'+num+' ul.navigation li:nth-child(1)').addClass('active');

            $('#accom_0'+num+' ul.cont').on('afterChange', function(event, slick, currentSlide, nextSlide){
                var current_slide = Number(currentSlide  + 1);
                $('#accom_0'+num+' ul.navigation li').removeClass('active');
                $('#accom_0'+num+' ul.navigation li:nth-child('+current_slide+')').addClass('active');
            });

            $('.pop_accom_close').attr('onclick','javascript:pop_accom_close('+num+');');
        }

        function slickGoTo(accom,slide_num){
            var slide_num = slide_num - 1;
            $('#accom_0'+accom+' ul.cont').slick('slickGoTo', slide_num);
        }


    </script>

    <script>
        function pop_accom_show(num){
            $('.pop_accom_inner').hide();
            $('#accom_0'+num+'').show();
            $('#pop_accom').fadeIn();

            $('.pop_accom_close').attr('onclick','javascript:pop_accom_close('+num+');');
        }

    </script>

	<script>


        // input_nospace
        $("input:text[noSpace]").on("keyup", function() {
            $(this).val($(this).val().replace(' ',''));
        });

        // input_numberOnly
        $("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
        });

        $("#place").on("change", function() {
            console.log($(this).val())
            if ($(this).val()) {
                $("#reservTime").empty();
                $("#withCount").empty();
                setReservTime($(this).val());
                setWithCount($(this).val());

                $('.group_time').css('display', 'block');
                $('.group_widthCount').hide();
                $('#with').empty();
            }
        });

        $("#reservTime").on("change", function() {
            if ($(this).val()) {
                $('.group_widthCount').css('display', 'block');
            }
        });

        $("#withCount").on("change", function() {
            $('#with').empty();

            setWithPerson($(this).val());
        })

        function setReservTime(_place) {
            var options = '<option value="" selected disabled>원하시는 일정을 선택해주세요</option>';
            
            if (_place == 'a') {
                options += '<option value="a1">5월 25일(화) ~ 5월 26일(수)</option>' +
                '<option value="a2">5월 26일(수) ~ 5월 27일(목)</option>' +
                '<option value="a3">5월 27일(목) ~ 5월 28일(금)</option>' +
                '<option value="a4">5월 28일(금) ~ 5월 29일(토)</option>' +
                '<option value="a5">5월 29일(토) ~ 5월 30일(일)</option>' +
                '<option value="a6">5월 30일(일) ~ 5월 31일(월)</option>' +
                '<option value="a7">5월 31일(월) ~ 6월 1일(화)</option>';
            } else if (_place == 'b') {
                options += '<option value="b1">6월 3일(목) ~ 6월 4일(금)</option>' +
                '<option value="b2">6월 4일(금) ~ 6월 5일(토)</option>' +
                '<option value="b3">6월 5일(토) ~ 6월 6일(일)</option>';
            } else if (_place == 'c') {
                options += '<option value="c1">6월 8일(화) ~ 6월 9일(수)</option>' +
                '<option value="c2">6월 9일(수) ~ 6월 10일(목)</option>' +
                '<option value="c3">6월 10일(목) ~ 6월 11일(금)</option>' +
                '<option value="c4">6월 11일(금) ~ 6월 12일(토)</option>' +
                '<option value="c5">6월 12일(토) ~ 6월 13일(일)</option>' +
                '<option value="c6">6월 13일(일) ~ 6월 14일(월)</option>' +
                '<option value="c7">6월 14일(월) ~ 6월 15일(화)</option>';
            } else if (_place == 'd') {
                options += '<option value="d1">6월 15일(화) ~ 6월 16일(수)</option>' +
                '<option value="d2">6월 16일(수) ~ 6월 17일(목)</option>' +
                '<option value="d3">6월 17일(목) ~ 6월 18일(금)</option>' +
                '<option value="d4">6월 18일(금) ~ 6월 19일(토)</option>';
            }

            $("#reservTime").html(options);
        }

        function setWithCount(_place) {
            var options = '<option value="" selected disabled>동반 인원을 선택해주세요 (본인 제외)</option>';
            
            if (_place == 'a') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="3">3명</option>' +
                '<option value="4">4명</option>' +
                '<option value="5">5명</option>' +
                '<option value="0">동반인원 없음</option>';
            } else if (_place == 'b') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="0">동반인원 없음</option>';
            } else if (_place == 'c') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="3">3명</option>' +
                '<option value="4">4명</option>' +
                '<option value="5">5명</option>' +
                '<option value="0">동반인원 없음</option>';
            } else if (_place == 'd') {
                options += '<option value="1">1명</option>' +
                '<option value="2">2명</option>' +
                '<option value="3">3명</option>' +
                '<option value="0">동반인원 없음</option>';
            }

            $("#withCount").html(options);
        }

        function setWithPerson(_num) {
            var temp = '';
            for (var i = 0; i < _num; i ++) {
                temp += '<strong class="input_tit with_' + (i + 1) + '">동반자 정보' + (i + 1) + '</strong>' +
                        '<div class="input_wrap with_wrap with_' + (i + 1) + '">' +
                            '<div class="input_box with_name">' +
                                '<input type="text" name="with_name' + (i + 1) + '" maxlength="120" noSpace placeholder="이름">' +
                            '</div>' +
                            '<div class="input_box with_sex">' +
                                '<select name="with_sex' + (i + 1) + '">' +
                                    '<option value="" selected disabled>성별</option>' +
                                    '<option value="M">남</option>' +
                                    '<option value="F">여</option>' +
                                '</select>' +
                            '</div>' +
                        '</div>' +
                        '<div class="input_wrap with_wrap with_' + (i + 1) + '">' +
                            '<div class="input_box with_brith">' +
                                '<input type="text" pattern="[0-9]*" name="with_birth' + (i + 1) + '" maxlength="8" noSpace numberOnly placeholder="생년월일(ex 19870829)">' +
                            '</div>' +
                            '<div class="input_box with_rel">' +
                                '<select name="with_relation' + (i + 1) + '">' +
                                    '<option value="" selected disabled>관계</option>' +
                                    '<option value="S">배우자</option>' +
                                    '<option value="C">자녀</option>' +
                                    '<option value="P">부모</option>' +
									'<option value="D">손자녀</option>' +
									'<option value="G">조부모</option>' +
                                '</select>' +
                            '</div>' +
                        '</div>';

            }
            $("#with").append(temp);
        }

        function open_pop(type){
			$('#agree'+type+'_pop').show();
			$('#agree'+type+'_pop').animate({
				top : 0,
			},500);
		}

		function close_pop(){
			$('.agree_pop').show();
			$('.agree_pop').animate({
				top : '100vh',
			},500, function() {
				$('.agree_pop').hide();
			});
		}

		// 전체 동의
		$('.top_label > input').change(function(){
			if ($(this).prop("checked") == true) {
				$('.agree input').prop("checked",true);
			} else {
				$('.agree input').prop("checked",false);
			}
		});

		$('.normal_label > input').change(function(){
			if ( $('.normal_label > input:checked').length == $('.normal_label > input').length ) {
				$('.top_label > input').prop("checked",true);
			} else {
				$('.top_label > input').prop("checked",false);
			}
		});


        function checkValidate(f) {
			alert('신청 기간이 종료 되었습니다.');
			return false;
            app.showOverlayProgress();
            var data = {};

            if (!f.name.value) {
                alert("이름을 입력해주세요.");
                f.name.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.birth.value) {
                alert("생년월일을 입력해주세요.");
                f.birth.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.birth.value.length != 8) {
                alert('생년월일을 정확하게 입력해주세요.'); 
                f.birth.focus(); 
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
            
            if (!f.email.value) {
                alert("이메일을 입력해주세요.");
                f.email.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!validate_email(f.email.value)) {
                alert('이메일형식에 맞지 않습니다.');
                f.email.focus();
                app.hideOverlayProgress();
                return false;
            }

            f.email_id.value = f.email.value.split("@")[0];
            f.email_domain.value = f.email.value.split("@")[1];
            
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

            if(f.car_num.value.length < 5) {
                alert('차량번호 전체를 입력해주세요. (ex 12가1234)'); 
                f.car_num.focus(); 
                app.hideOverlayProgress();
                return false; 
            }	

            if (!f.buy_type.value) {
                alert("구매 형태를 선택해주세요.");
                f.buy_type[0].focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.check_place.value) {
                alert("숙소를 선택해주세요.");
                f.check_place.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.check_date.value) {
                alert("숙박일자를 선택해주세요.");
                f.check_date.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (f.with_num.value != "") {
                if (f.with_num.value > 0) {
                    for (var i = 0; i < f.with_num.value; i ++) {
                        var with_name = document.getElementsByName('with_name' + (i + 1))[0];
                        var with_sex = document.getElementsByName('with_sex' + (i + 1))[0];
                        var with_birth = document.getElementsByName('with_birth' + (i + 1))[0];
                        var with_relation = document.getElementsByName('with_relation' + (i + 1))[0];

                        if (!with_name.value) {
                            alert("동반자" + (i + 1) + " 이름을 입력해주세요.");
                            with_name.focus();
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (!with_sex.value) {
                            alert("동반자" + (i + 1) + " 성별을 입력해주세요.");
                            with_sex.focus();
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (!with_birth.value) {
                            alert("동반자" + (i + 1) + " 생년월일을 입력해주세요.");
                            with_birth.focus();
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (with_birth.value.length != 8) {
                            alert("동반자" + (i + 1) + " 생년월일을 정확하게 입력해주세요."); 
                            with_birth.focus(); 
                            app.hideOverlayProgress();
                            return false;
                        }

                        if (!with_relation.value) {
                            alert("동반자" + (i + 1) + " 관계를 선택해주세요.");
                            with_relation.focus();
                            app.hideOverlayProgress();
                            return false;
                        }
                    }
                }
            } else {
                alert("동반인원을 선택해주세요.");
                f.with_num.focus();
                app.hideOverlayProgress();
                return false;
            }

            if (!f.agree1.checked) {
                alert("개인정보 수집 및 이용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree1.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.agree2.checked) {
                alert("개인정보 처리 및 위탁에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.'");
                f.agree2.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.agree3.checked) {
                alert("광고/정보 수신 및 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree3.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            if (!f.agree4.checked) {
                alert("본 이벤트 안내는 MMS를 통해 진행되며, 마케팅 활용에 동의하지 않을 시 이벤트 참여 신청에 제한이 있을 수 있습니다.");
                f.agree4.focus();
                app.hideOverlayProgress();
                return false;
            }
            
            conf = confirm("Hej Familj 2021\n\n본 이벤트 신청 후에는\n신청 일자 / 장소 / 인원 변경이 \n불가합니다.\n\n* 정부의 5인 이상 집합금지 명령에 따라 5인 이상의 경우 가족관계증명서를 추가로 제출해야 합니다.\n\n해당 내용으로 신청하시겠습니까?");
            if (conf) {
                ajaxPostPromo();
            } else {
                app.hideOverlayProgress();
            }


            function ajaxPostPromo() {
                console.log($('#promoform').serializeObject())
                var response;
                $.ajax({
                    url: "https://vckiframe.com/event/hejfamilj_2021/ajax/event_apply.php",
                    type:'post',
                    // contentType: 'application/json;',
                    data: $('#promoform').serializeObject(),
                    dataType: 'json',
                    success: function(res){
                        response = res;
                        console.log(res);
                    },
                    complete: function(data) {
                        if (response.result == 'success') {
                            alert('Hej Familj 2021\n\n이벤트 신청이 완료 되었습니다.');
                            location.reload();	
                        }else {
                            if(response.result == 'overlap') {
                                alert('Hej Familj 2021\n\n이미 신청하신 내역이 있으므로, 중복 신청이 불가합니다.');
                                location.reload();	
                            }else{
                                alert(response.msg);
                                event_apply_diable = 'false';
                                app.hideOverlayProgress();
                            }
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            }

            return false;
        }

        jQuery.fn.serializeObject = function() { var obj = null; try { if(this[0].tagName && this[0].tagName.toUpperCase() == "FORM" ) { var arr = this.serializeArray(); if(arr){ obj = {}; jQuery.each(arr, function() { obj[this.name] = this.value; }); } } }catch(e) { alert(e.message); }finally {} return obj; }
	</script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>