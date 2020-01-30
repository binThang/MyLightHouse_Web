<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class imagemodel Extends Controlmodel
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
  public function insert()
  {
  	$images = $_POST['images'];
	$kind = $_POST['kind'];
    if($kind == 1){
        $sql="DELETE FROM {$this->dbname}_images WHERE kind = 1";
    }
    else{
        $sql="DELETE FROM {$this->dbname}_images WHERE kind = 2";
    }
    $query=$this->db->prepare($sql);
    $query->execute();

	$sql="INSERT into {$this->dbname}_images (image,kind) values (?,?)";
	$query=$this->db->prepare($sql);
	$query->execute(array($images,$kind));
	if($query->rowCount()){
		return array('return'=>'success','text'=>'등록되었습니다');
	}else{
		return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
	}
  }

  public function view($page = 1,$idx = null)
  {
    $this->sql="SELECT (SELECT image FROM {$this->dbname}_images where kind = 1) AS img1,
                (SELECT image FROM {$this->dbname}_images where kind = 2) AS img2";
    $query=$this->db->prepare($this->sql);
    $query->execute(array($idx));
	$return = new stdClass();
    $return->list=$query->fetch();
    return $return;
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
