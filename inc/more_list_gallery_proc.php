<?php
require_once "common.php";

$mode = isset($_POST['mode']) ? $_POST['mode'] : "";

$page = isset($_POST['page']) ? $_POST['page'] : "1";
$start = isset($_POST['start']) ? $_POST['start'] : "0";
$limit = isset($_POST['limit']) ? $_POST['limit'] : "12";
$sort = isset($_POST['sort']) ? $_POST['sort'] : NULL;
$search = isset($_POST['search']) ? $_POST['search'] : NULL;
$bm_sid = isset($_POST['bm_sid']) ? $_POST['bm_sid'] : "2";
$year = isset($_POST['year']) ? $_POST['year'] : "2019";

$return['mode'] = $mode;
$return['page'] = $page;
$return['start'] = ($page - 1) * $limit;
$return['limit'] = $limit;
$return['search'] = $search;
$return['bm_sid'] = $bm_sid;
$return['year'] = $year;


switch ($mode) {
	//리스트 더보기
	case "more_list_gallery" :
		// DB 테이블명
		$TABLE_INFO['bbs']					= $Tname . "bbs_" . $bm_sid;							// 게시판
		$TABLE_INFO['bbs_file']				= $Tname . "bbs_file";										// 첨부파일
		$TABLE_INFO['bbs_comment']		= $Tname . "bbs_comment";								// 댓글(코멘트)

		// 첨부파일 설정
		$bbs_info['file_folder'] = $SITE_INFO['root'] . '/upload/bbs/' . $bm_sid;									//업로드 경로
		$bbs_info['file_read'] = $SITE_INFO['http_host'] . '/upload/bbs/' . $bm_sid;								//파일 URL

		// 조건 검색 생성
		$SearchText = "WHERE chkdel='N' AND status='Y' AND bm_sid='{$bm_sid}' ";

		if ($year != '' ) {
			$SearchText .= " AND (date_format( regdate , '%Y-%m-%d' ) >= date_format( '{$year}-01-01' , '%Y-%m-%d' ) AND date_format( regdate , '%Y-%m-%d' ) <= date_format( '{$year}-12-31' , '%Y-%m-%d' ))";
		}

		//검색
		$where = "";
		if ($search) {
			foreach ($search as $k => $v) {
				$where .= " AND " . $k . " like '%" . urldecode($v) . "%' ";
			}
		}

		//정렬
		if (!$sort) { $sort = "`notice` DESC, `grp` DESC, `odr` ASC, `regdate` DESC"; }

		//게시물 시작 수
		$start = ($page - 1) * $limit;

		//게시물 카운트
		$query = "SELECT COUNT(*) cnt FROM {$TABLE_INFO['bbs']} {$SearchText} " . $where;
		$total = $db->select_one($query);

		//게시물 가져오기
		$query = "
			SELECT 
				`sid`, `bm_sid`, `grp`, `par`, `dth`, `odr`, `category`, `member_sid`, `id`, `pw`, `name`, `nick`, `title`, `summary`, `ishtml`, `content`, `url`, `hp`, `email`, `ip`, `thum_file`, `viewcnt`, `notice`, `isclose`, LEFT(`regdate`, 10) as `regdate`
			FROM 
				{$TABLE_INFO['bbs']}
			{$SearchText} " . $where . "
			ORDER BY 
				" . $sort . "
			LIMIT 
				" . $start . ", " . $limit;
		$rss = $db->fetch_array($query);

		$tit_len = 120;													//제목 최대 글자 수
		foreach ($rss as $rs) {
			//제목
			$title = ($tit_len > 0)? MgHanCutString(MgStringView2($rs['title']), $tit_len, true) : MgStringView2($rs['title']);

			//목록이미지
			$file_src = ""; $img_file = ""; $thum_width = 384; $thum_height = 270;
			if(trim($rs['thum_file'])){
				$file_info = explode("|", $rs['thum_file']);
				$filename_up = $file_info[0];
				$filename = $file_info[1];

				if(trim($filename_up)){
					$part = explode(".", $filename_up);
					$ext = strtolower($part[sizeof($part)-1]);
					$file_name = "";
					for($f=0;$f<sizeof($part)-1;$f++){
						$file_name .= $part[$f] . ".";
					}
					if($file_name){ $file_name = substr($file_name, 0, -1); $filename_up_thum = $file_name . "_thum." . $ext; }
					else{ $filename_up_thum = ""; }

					if( $filename_up_thum && file_exists($bbs_info['file_folder'] . "/thumbnail/" . $filename_up_thum) ){
						$files_wh_thum = getimagesize("{$bbs_info['file_folder']}/thumbnail/{$filename_up_thum}");
						if($files_wh_thum[0] <= $thum_width){ $thum_width = $files_wh_thum[0]; }
						if($files_wh_thum[1] <= $thum_height){ $thum_height = $files_wh_thum[1]; }

						$file_src = $bbs_info['file_read'] . "/thumbnail/" . $filename_up_thum;
						$img_file = "<img src=\"{$file_src}\" border=\"0\" width=\"{$thum_width}\" height=\"{$thum_height}\" />";
					}
				}
			}
			$regdate = ($rs['regdate']) ? str_replace("-", ".", $rs['regdate']) : "";

			$list[] = array(
				'idx'			=> $rs['sid'],
				'title'			=> $title,
				'file_src'	=> $file_src,
				'img_file'	=> $img_file,
				'regdate'	=> $regdate,
			);
		}

		$return['res'] = 'success';
		$return['list'] = $list;
		$return['total'] = $total;
		$return['cnt'] = count($rss);
		//$return['query'] = $query;
		break;

	default :
		$return['res'] = 'error';
		break;
}


// DB Disconnect
require_once "disconnect.php";


print_r(json_encode($return));
?>