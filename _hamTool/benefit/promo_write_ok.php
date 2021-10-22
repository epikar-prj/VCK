<?
    require_once "../../inc/common.php";

    $mode = MgRequestCheck(trim($_GET['mode']), 255, true, true);

    $sid = MgRequestCheck(trim($_POST['sid']), 255, true, true);
    
    $category = MgRequestCheck(trim($_POST['category']), 255, true, true);
    $title = MgRequestCheck(trim($_POST['title']), 255, true, false);
    $content = MgRequestCheck(trim($_POST['content']), 4294967295, true, false);
    $option_type = MgRequestCheck(trim($_POST['option_type']), 255, true, false);

    $sdate = MgRequestCheck(trim($_POST['sdate']), 255, true, false);
    $edate = MgRequestCheck(trim($_POST['edate']), 255, true, false);
    
    $option = '';
    if ($option_type == 1) {
        $option = MgRequestCheck(trim($_POST['option1']), 4294967295, true, false);
    } else if ($option_type == 2) {
        $option = implode($_POST['option2'], "|");
    }
    

    // 썸네일 이미지 파일 저장
    $thum_val = "";
    $thum_file = trim($_FILES['thumup']['tmp_name']);
    $thum_name = trim($_FILES['thumup']['name']);
    
    $thum_max_filesize = 2;
    $thum_file_ext = "jpg,jpeg,gif,png,jfif,webp";
    $file_folder = $SITE_INFO['root'] . '/upload/promotion';
    $th_thum_width = "1200";
    $th_thum_height = "710";
    
    if($thum_file!="none" && $thum_name) {
        echo $file_folder;
        if(!is_dir($file_folder . "/")){ umask(0); @mkdir($file_folder . "/", 0777); }
        
        if(!is_uploaded_file($thum_file)) {
            MgMoveURL("", "정상적인 방법의 업로드가 아닙니다(195).", "", "back");
            exit;
        }

        $part = explode(".", $thum_name);
        $ext = strtolower($part[sizeof($part)-1]);

        // 파일용량 검사
        if($_FILES['thumup']['size'] > intVal($thum_max_filesize) * 1024 * 1024) {
            MgMoveURL("", "[{$thum_name}] : " . $thum_max_filesize . "MB 이상의 용량은 업로드가 불가합니다.", "", "back");
            exit;
        }

        // 확장자 검사
        if($thum_file_ext) {
            $accesstype = explode(',', $thum_file_ext);
            $str_access = false;
            for($j=0;$j<sizeof($accesstype);$j++) 
                if(strtolower($ext)==strtolower($accesstype[$j])) $str_access = true;

            if(!$str_access) {
                MgMoveURL("", "[{$thum_name}] : 업로드할 수 있는 파일형식이 아닙니다.", "", "back");
                exit;
            }
        }

        do {
            $real_name = "bbs_thum_" . date("YmdHis") . "." . $ext;
        } while(file_exists("{$file_folder}/{$real_name}"));

        move_uploaded_file($thum_file, "{$file_folder}/{$real_name}");

        // 파일의 성격에 맞는 처리
        $files_size = filesize("{$file_folder}/{$real_name}");

        if($ext == "jpeg" || $ext == "jpg" || $ext == "gif" || $ext == "png" || $ext == "bmp") {
            echo "width: " . $th_thum_width . " || " . "height: " . $th_thum_height;
            
            if($th_thum_width || $th_thum_height){
                MgImgThumbnail($file_folder, $real_name, $th_thum_width, $th_thum_height, $ext);
            }
            $files_wh = getimagesize("{$file_folder}/{$real_name}");
        } else {
            $files_wh[0] = 0;
            $files_wh[1] = 0;
        }
        
        $thum_val = "{$real_name}|{$thum_name}|{$files_size}|{$ext}|{$files_wh[0]}|{$files_wh[1]}";
    }


    if ($mode == 'write') {
        $sql[] = " INSERT INTO volvo_promotion
        (category, title, content, option_type, `option`, sdate, edate, thum_file)
        VALUES('{$category}', '{$title}', '{$content}', '{$option_type}', '{$option}', '{$sdate}', '{$edate}', '{$thum_val}'); ";
        // echo $sql;
        $result = $db->tran_query( $sql );
        if(!$result) {
            MgMoveURL("", "처리 중 오류가 발생하였습니다.1", "", "back");
            exit;
        }
    } else {

    }
    
    // exit;

    

    
    // DB Disconnect
    require_once "../../inc/disconnect.php";

    MgMoveURL("http://volvo.duboostudio.net/admin/benefit/promo_list.php", "등록되었습니다.", "", "");
?>