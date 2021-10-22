<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    if (!isLogined()) {
        MgMoveURL('/html/member/main.php');
    }

    $CODE = "inquiry";
    $FOOTER_CODE = "cscenter";
    $TITLE = "1:1 문의";

    $cateSql = " SELECT category FROM volvo_bbs_manage where sid = '4' ";
    $result = $db->select_one($cateSql);
    $categoryArr = explode("|", $result);

    $sql = " SELECT title, email, content, category FROM volvo_bbs_4 WHERE member_sid='{$_COOKIE['member_sid']}' AND category <> '' ORDER BY regdate desc ";

    $rows = $db->fetch_array($sql);

    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>

<div id="contents" class="inquiry_history">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/custom.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container">
        <div class="tabs">
            <ul>
                <li><a href="index.php">문의 하기</a></li>
                <li class="on"><a href="history.php">문의 내역 보기</a></li>
            </ul>
        </div>

		<div class="cont_list_wrap">
			<ul class="cont_list">
                <? foreach($rows as $row) { ?>
                <li>
                    <div class="list_ti"><span class="type">[<?=$categoryArr[$row['category']]?>]</span><?=$row['title']?></div>
                    <div class="list_txt"><span class="email"><?=$row['email']?></span><?=$row['content']?></div>
				</li>
                <? } ?>

                <? if (!count($rows)) { ?>
                    <li class="empty">
                        <p>문의 내역이 없습니다.</p>
                    </li>
                <? } ?>
                
            </ul>
        </div>

    </div>
</div>

    <script>

		$(window).on('load',function(){
			$('.cont_list li').click(function(){
				var this_class = $(this).attr('class');
				if(this_class != 'ov'){
					$('.cont_list li .list_txt').slideUp();
					$('.cont_list li').removeClass('ov');
					$(this).addClass('ov');
					$(this).find('.list_txt').show();
				}else{
					$(this).find('.list_txt').hide();
					$('.cont_list li').removeClass('ov');
				}

			});

		});	

        function checkValidate(_form) {
            if (!_form.type.value) {
                alert("문의 유형을 선택해주세요");
                return false;
            }
            if (!_form.title.value) {
                alert("제목을 입력해주세요");
                return false;
            }
            if (!_form.text.value) {
                alert("문의 내용을 입력해주세요");
                return false;
            }
            if (!_form.email.value) {
                alert("이메일을 입력해주세요");
                return false;
            }
		}
	</script>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>