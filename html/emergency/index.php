<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');

$CODE = "emergency";
$FOOTER_CODE = "support";
$TITLE = "사고차 무상 긴급견인서비스";

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
            <ul class="text">
                <li>
                   <h6>사고차 무상 긴급견인서비스</h6>
                    <p>본 서비스는 충돌 및 추돌사고가 발생된 현장에서 긴급견인을 지원하여 고객님의 안전을 확보하는 동시에 공식 서비스센터로 차량을 입고하여 정확한 수리를 하는데 그 목적이 있습니다.</p>
                </li>
                <li>
                    <h6>사고차 무상 긴급견인서비스 서비스를 이용하려면?</h6>
                    <p>사고가 발생할 경우 현장에서 고객님이 직접 고객지원센터(1588-1777)로 접수하시면 최초 견인에 한해 무상견인이 가능하며, 견인된 차량은 공식 볼보 서비스센터 및 지정된 서비스센터로만 입고됩니다.
                    </p>
                </li>
                <li>
                    <h6>사고차 무상 긴급견인서비스 서비스 이용이 불가한 경우</h6>
                    <p>지정된 곳 이외의 견인요청으로는 본 서비스 이용이 불가하며, 공식 볼보 서비스센터 및 지정된 서비스센터에서 수리가 이루어지지 않을 경우 발생된 모든 견인 비용은 고객님께서 부담하십니다.</p>
					<small>* 본 서비스는 볼보 공식 딜러에서 판매된 차량만 이용가능하며, 주행거리와 차량연식에 제한을 받지 않습니다.</small>
					<small>* 사고차량은 사고발생지역과 같은 권역 또는 가까운 서비스센터로 견인됩니다.</small>
                </li>
            </ul>
        </div>
    </div>

    <script src="/html/<?=$CODE?>/script.js"></script>

<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>