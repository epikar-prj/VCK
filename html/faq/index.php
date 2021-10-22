<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/common.php');
    
    $CODE = "faq";
    $FOOTER_CODE = "cscenter";
    $TITLE = "FAQ";

    $cate = 'all';
    if (isset($_GET["cate"])) {
        $cate = SQLFiltering($_GET['cate']);
    }
    $search = "";
    if (isset($_GET["search"])) {
        $search = SQLFiltering($_GET["search"]);
    }
    
    $where = "";
    if ($cate != 'all') {
        $where .= " AND category = {$cate} ";
    }
    if ($search != '') {
        $where .= " AND title LIKE '%{$search}%' ";
    }
    

    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    $StartRow = ($page - 1) * 10;
    $limit = $page * 10;
    
    $sql = " 
    SELECT 
        category, title, content 
    FROM 
        volvo_bbs_3 
    WHERE
        chkdel <> 'Y' {$where} 
    ORDER BY 
        `notice` DESC, `grp` ASC, `odr` ASC, `regdate` ASC
    LIMIT 
        {$StartRow}, 10";
        

    $rows=$db->fetch_array($sql);
    
    $cate_sql = "
        SELECT 
            category 
        FROM 
            volvo_bbs_manage 
        WHERE 
            sid = 3;
    ";

    $cate_arr = explode("|", $db->select_one($cate_sql));

    $count_sql = "
        SELECT 
            COUNT(*)
        FROM 
            volvo_bbs_3 
        WHERE
            chkdel <> 'Y' {$where} 
        ORDER BY 
            `notice` DESC, `grp` DESC, `odr` ASC, `regdate` DESC
    ";

    $totCount = $db->select_one($count_sql);

    $link = "cate=" . $cate . "&amp;search=" . $search;
    
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header/header.php');
?>
<link rel="stylesheet" href="./style.css">
<script src="./script.js"></script>
<script>
    
    console.log("<?=$StartRow?>", "<?=$limit?>");
</script>
<div id="contents">
    <div id="breadcrumb">
        <div class="back">
            <a href="/html/footerMenu/custom.php">
                <img src="/images/common/ic_back.png" alt="">
            </a>
        </div>
        <h4><?=$TITLE?></h4>
    </div>
    
    <div class="container" id="faq">
        <div class="search_wrap">
            <form action="?cate=all" method="get">
			<input name="search" class="search_input" id="search_input" type="text" value="<?=$search?>" placeholder="검색어를 입력해주세요.">
            <button type="submit" class="btn_search"><a href="javascript:void(0);"></a></button>
            </form>
		</div>
		<ul class="faq_tab">
            <li <?=$cate == 'all' ? 'class="ov"' : ''?>><a href="?cate=all">전체</a></li>
            <? 
            for ($i = 0; $i < count($cate_arr); $i ++) { 
                if ($cate === (string)$i) {
                    echo '<li class="ov"><a href="?cate=' . $i . '">' . $cate_arr[$i] . '</a></li>';
                } else {
                    echo '<li><a href="?cate=' . $i . '">' . $cate_arr[$i] . '</a></li>';
                }
            }
            ?>
                
            
			
			
		</ul>
		<div class="cont_list_wrap">
			<ul class="cont_list">
                <? foreach($rows as $row) { ?>
                <li>
					<div class="list_ti">Q. <?=$row['title']?></div>
					<div class="list_txt"><?=nl2br($row['content'])?></div>
				</li>
                <? } ?>
                
                <?if (count($rows) < 1) { ?>
                <li class="empty">
                    <p>게시물이 없습니다.</p>
				</li>
				<? } ?>
            </ul>
            <?=front_msg_paging($page, $totCount, $link, 10, 10);?>
        </div>
    </div>
</div>

<?
    include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer/footer.php');
?>