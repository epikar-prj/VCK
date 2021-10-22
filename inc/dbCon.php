<?php
// DataBase 접속 계정 설정
$dbCon['dbHost'] = "localhost";
//$dbCon['dbPort'] = "";
$dbCon['dbUid'] = "root";
$dbCon['dbPw'] = "Skaeowjs3048!!";
$dbCon['db'] = "volvo_app";
$dbCon['dbCharset'] = "UTF8";

class mydb {
	private $mysqli;
	private $host;
	private $user;
	private $pw;
	private $db;
	private $charset;

	function __construct ($dbCon ) {
		$this->host = $dbCon['dbHost'];
		//$this->port = $dbCon['dbPort'];
		$this->user = $dbCon['dbUid'];
		$this->pw = $dbCon['dbPw'];
		$this->db = $dbCon['db'];
		$this->charset = $dbCon['dbCharset'];
	}

	function __destruct() {
		$this->db_close();
	}

	function connect() {
		try {
			//$this->mysqli = new mysqli ("$this->host", "$this->user", "$this->pw", "$this->db", "$this->port" );
			$this->mysqli = new mysqli ("$this->host", "$this->user", "$this->pw", "$this->db");
			if (!$this->mysqli) {
				throw new Exception("Could not connect to the MySQL server.");
			} else {
				$this->mysqli->set_charset($this->charset);
			}
		} catch( Exception $con_error ) {
			echo($con_error->getMessage());
		}
	}

	function tran_query ($query) {
		$this->connect();
		$this->mysqli->autocommit(false);
		for($i=0; $i<count($query); $i++) {
			$this->rs = @mysqli_query($this->mysqli,$query[$i]);
			if ( $this->mysqli-> error ) {
				break;
			}
		}
		if ( $this->mysqli-> error ) {
			$this->mysqli->rollback();
			return "0" ;
		} else {
			$this->mysqli->commit();
			return "1" ;
		}
	}



	function tran_query_exec ($query) {
		$this->connect();
		$this->mysqli->autocommit(false);

		$this->rs = @mysqli_query($this->mysqli,$query);

		if ( $this->mysqli-> error ) {
			$this->mysqli->rollback();
			return "0" ;
		} else {
			$this->mysqli->commit();
			return "1" ;
		}
	}


	function query($query) {
		$this->connect();
		$this->rs = @mysqli_query($this->mysqli,$query);
		return $this->rs;
	}

	function fetch_array($query) {
		$this->connect();
		$this->rs = @mysqli_query($this->mysqli,$query);
		$tempArray = array();
		$i=0;
		while( $data = @mysqli_fetch_array( $this->rs ) ) {
			$tempArray[$i] =  $data ;
			$i++;
		}
		return $tempArray ;
	}
	// 한개지정해서 뽑기
	function select_one($query) {
		$this->connect();
		$this->rs = @mysqli_query($this->mysqli,$query);
		$row = $this->rs->fetch_row();
		return $row[0];
	}
	// 줄로뽑기
	function row($query) {
		$this->connect();
		$this->rs = @mysqli_query($this->mysqli,$query);
		$row = @mysqli_fetch_array( $this->rs );
		return $row;
	}

	// 줄로뽑기2
	function fetch_row($query) {
		$this->connect();
		$this->rs = @mysqli_query($this->mysqli,$query);
		$row = @mysqli_fetch_row( $this->rs );
		return $row;
	}

	//레코드 총 갯수를 구한다.
	function num_rows($query) {
		$this->connect();
		$this->rs = @mysqli_query($this->mysqli,$query);
		$row = @mysqli_num_rows( $this->rs );
		return $row;
	}


	//마지막 insert 된 아이디 값
	function insert_id() {
		$temp_number = mysqli_insert_id($this->mysqli);
		return $temp_number;
	}


	function db_close() {
//		if ($this->rs) {
//			@mysqli_free_result( $this->rs );
//		}
		if ($this->mysqli) {
			@mysqli_close();
		}
	}
} /// end class

$db = new mydb($dbCon);

//인젝션대비
function param($param,$chk_trim="T") {
	$temp = "";
	$temp = $_REQUEST[$param];
	if ( $chk_trim == "T" ) {
		$temp = trim($temp);
	}
	return escape_string($temp);
}

function SQLFiltering($str) {
    // 해킹 공격을 대비하기 위한 코드
    $str = preg_replace("/\s{1,}1\=(.*)+/","",$str); // 공백이후 1=1이 있을 경우 제거
    $str = preg_replace("/\s{1,}(or|and|null|where|limit)/i"," ",$str); // 공백이후 or, and 등이 있을 경우 제거
    $str = preg_replace("/[\s\t\'\;\=]+/","", $str); // 공백이나 탭 제거, 특수문자 제거
    return $str;
}

function escape_string ($fillter) {
	GLOBAL $dbCon;
	$link = mysqli_connect($dbCon['dbHost'], $dbCon['dbUid'], $dbCon['dbPw'], $dbCon['db']);
	$fillter =  mysqli_real_escape_string($link, $fillter );
	return $fillter;
}
?>