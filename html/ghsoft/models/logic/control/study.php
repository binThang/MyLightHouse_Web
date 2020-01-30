<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class studymodel Extends Controlmodel
{
	function __construct($db)
	{
		parent::__construct($db);
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('데이터베이스 연결에 오류가 발생했습니다.');
		}
	}
  //

  public function list($page)
  {
	$this->offset=($page-1)*$this->limit;
	$this->sql="SELECT funboard_idx, concat(funboard_idx,'번 게시물') FROM lighthouse_funboard
				order by funboard_idx desc
				limit {$this->limit} offset {$this->offset}";
	$query=$this->db->prepare($this->sql);
	$query->execute();
	$return = new stdClass();
	$return->list=$query->fetchAll();
	$return->paging=$this->paging($page);
	return $return;
  }

}
?>
