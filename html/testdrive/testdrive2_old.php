<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "testdrive";
    $FOOTER_CODE = "buy";
    $TITLE = "신청 전시장";

    $model = $_GET['model'];

    // 전시장 지역 불러오기
    $city_sql = "SELECT name, code FROM volvo_area";
    $city_result = $db->fetch_array($city_sql);

   include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<link rel="stylesheet" href="/html/testdrive/swiper.css">

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/testdrive/testdrive1.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
        <div class="page">
            <p><strong>02</strong><span>04</span></p>
        </div>
    </div>
    
    <div id="visual">
        <img src="/images/testdrive/img_visual-1.jpg" alt="">
    </div>
    
    <div class="container">
		<form action="/html/testdrive/testdrive3.php" method="get" onsubmit="return checkValidate(this);">
            <input type="hidden" name="model" value="<?=$model?>">
			<div class="area_select">
				<div class="input_box gray">
					<select name="area" onchange="getShowroom(this.value);">
						<option selected disabled value="">지역을 선택해주세요.</option>
                        <? foreach($city_result as $item) { ?>
						<option value="<?=$item[1]?>"><?=$item[0]?></option>
                        <? } ?>
					</select>
				</div>
			</div>
			<div class="showroom">
				<ul class="list">
					
				</ul>
			</div>
			<div class="btn_group mt30">
				<a href="/html/testdrive/testdrive1.php" class="btn">이전</a>
				<button type="submit" class="btn bg_color1">다음</button>
			</div>
		</form>
    </div>
</div>

<script src="/html/testdrive/script.js"></script>

<script>
    function checkValidate(_form) {
        if (!_form.area.value) {
            alert("지역을 선택해주세요");
            return false;
        }

        if (!_form.showroom.value) {
            alert("전시장을 선택해주세요");
            return false;
        }
    };
</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>