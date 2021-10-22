<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "cars";
    $FOOTER_CODE = "buy";
    $TITLE = "CARS";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/buy.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
   
    <div class="container" id="modelinfo_list">
		<div class="list_wrap">
			<div class="list_ti">SUV</div>
			<ul class="list_cars">
				<li>
					<a href="/html/cars/xc90/">
						<div class="car_title">XC90</div>
						<div class="car_img"><img src="/images/cars/list_cars_img_xc90.png?ver=20211013"></div>
					</a>
				</li>
				<li>
					<a href="/html/cars/xc60/">
						<div class="car_title">XC60</div>
						<div class="car_img"><img src="/images/cars/list_cars_img_xc60.png?ver=20211013"></div>
					</a>
				</li>
				<li>
					<a href="/html/cars/xc40/">	
						<div class="car_title">XC40</div>
						<div class="car_img"><img src="/images/cars/list_cars_img_xc40.png?ver=20211013"></div>
					</a>
				</li>
			</ul>
		</div>
		<div class="list_wrap">
			<div class="list_ti">SEDAN</div>
			<ul class="list_cars">
				<li>
					<a href="/html/cars/s90/">
						<div class="car_title">S90</div>
						<!--<div class="car_title copy">S90<span class="car_txt">TOP OF THE GAME</span></div>-->
						<div class="car_img"><img src="/images/cars/list_cars_img_s90.png?ver=20211013"></div>
					</a>
				</li>
				<li>
					<a href="/html/cars/s60/">
						<div class="car_title">S60</div>
						<div class="car_img"><img src="/images/cars/list_cars_img_s60.png?ver=20211013"></div>
					</a>
				</li>
			</ul>
		</div>
		<div class="list_wrap">
			<div class="list_ti">CROSS COUNTRY</div>
			<ul class="list_cars">
				<li>
					<a href="/html/cars/v90/">
						<div class="car_title">V90</div>
						<div class="car_img"><img src="/images/cars/list_cars_img_v90.png?ver=20211013"></div>
					</a>
				</li>
				<li>
					<a href="/html/cars/v60/">
						<div class="car_title">V60</div>
						<div class="car_img"><img src="/images/cars/list_cars_img_v60.png?ver=20211013"></div>
					</a>
				</li>
			</ul>
		</div>
    </div>
    <div class="banner_acc" style="margin-bottom:15px;">
        <a href="https://docs.google.com/gview?url=https://vckiframe.com/files/volvo_phev_quick_guide.pdf" target="_blank">
            <div class="banner_ti">PHEV Quick Guide</div>
            <!-- <img src="/images/cars/banner_acc.png"> -->
        </a>
    </div>
    <div class="banner_acc">
        <a href="https://accessories.volvocars.com/ko-kr" target="_blank">
            <div class="banner_ti">VOLVO ACCESSORY 둘러보기</div>
            <!-- <img src="/images/cars/banner_acc.png"> -->
        </a>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>