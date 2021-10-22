<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "maintenence";
$FOOTER_CODE = "service";
$TITLE = "정비 이력";

include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

    <div id="contents">
        <div id="breadcrumb">
            <div class="back">
                <a href="javascript:history.back();">
                    <img src="/images/common/ic_back.png" alt="">
                </a>
            </div>
            <h4><?=$TITLE?></h4>
        </div>
        <!-- 콘텐츠 시작 -->
        <div class="txt-con-wrap record3">
            <div class="car-num-navigation">
                <strong class="car-num">123 가 4567</strong>
            </div>
            <!-- <ul class="term-btn-box">
                <li class="term-btn"><span>2020.01.01 - 2020.03.10</span></li>
            </ul> -->

            <div class="data-detail-wrap">
                <div class="data-detail">
                    <ul class="db-list">
                        <li><b>정비완료</b> 2020-03-25</li>
                        <li><b>예약차량</b> XC90</li>
                        <li><b>차량번호</b> 000 가 0000</li>
                        <li><b>장비내역</b>
                            <ul>
                                <li>엔진오일</li>
                                <li>에어컨 필터 교체</li>
                            </ul>
                        </li>
                        <li><b>서비스센터</b> 볼보 강남 대치 서비스센터</li>
                    </ul>
                </div>
                <div class="data-detail personal">
                    <ul class="db-list">
                        <li><b>담당 정비사</b>
                            <ul>
                                <li class="name">김수환</li>
                                <li class="part">일반 정비</li>
                                <li class="tel"><span>T. </span>02-3473-6080</li>
                                <li class="img"><img src="https://vckservice.comnarae.com:8082/files/linked_directory/user_pst/AJAY_AJAY0002.jpg" alt="샘플이미지"></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="db-list-btn-box">
				<a class="btn" href="maintenence1.php">LIST</a>
			</div>

        </div>

        <!-- 콘텐츠 끝 -->
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>