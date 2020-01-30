<?php
namespace models\logic\index;
use stdClass;
use PDO;
use libs\Modeling;
class Exceptionmodel Extends Modeling
{
	function __construct($db)
	{
		parent::__construct();
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('데이터베이스 연결에 오류가 발생했습니다.');
		}
	}
}
?>
