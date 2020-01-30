<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class fun2model Extends Controlmodel
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
                WHERE kind = 2
				order by funboard_idx desc
				limit {$this->limit} offset {$this->offset}";
	$query=$this->db->prepare($this->sql);
	$query->execute();
	$return = new stdClass();
	$return->list=$query->fetchAll();
	$return->paging=$this->paging($page);
	return $return;
  }
  public function view($page = 1,$idx = null)
  {
    $this->sql="SELECT images, video, kind FROM {$this->dbname}_funboard where funboard_idx = $idx";
    $query=$this->db->prepare($this->sql);
    $query->execute(array($idx));
	$return = new stdClass();
    $return->list=$query->fetch();
    return $return;
  }
  public function update()
  {
    $images = $_POST['img'];
    if(is_array($images)){
 	   $images = implode(',',$_POST['img']);
    }
	$funboard_idx = $_POST['funboard_idx'];
    $video = $_POST['video'];
    $kind = $_POST['kind'];
    $sql="UPDATE {$this->dbname}_funboard SET images = ?, video = ?, kind = ? where funboard_idx = ?";
    $query=$this->db->prepare($sql);
    $query->execute(array($images,$video,$kind,$funboard_idx));
    if($query->rowCount()){
 	   return array('return'=>'success');
    }else{
 	   return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
    }
  }
  public function delete($page = null, $idx)
  {
    $sql="DELETE FROM {$this->dbname}_funboard WHERE funboard_idx = ?";
    $query=$this->db->prepare($sql);
    $query->execute(array($idx));
    if($query->rowCount()){
 	  return array('return'=>'success');
    }else{
 	  return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
    }
  }


}
?>
