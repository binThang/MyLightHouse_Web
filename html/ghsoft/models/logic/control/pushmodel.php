<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class Pushmodel Extends Controlmodel
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

    public function insert_push()
    {
      $test="";
      $title = $_POST['title'];
	  $img = $_POST['img'];
      $sql="INSERT into {$this->dbname}_push (title, img) values (?,?)";
      $query=$this->db->prepare($sql);
      $query->execute(array($title,$img));
      if($query->rowCount()){
		  $sql="SELECT member_idx as member_idx FROM {$this->dbname}_member";
		  $query=$this->db->prepare($sql);
		  $query->execute();
		  $list = $query->fetchAll();
		  foreach($list as $row){
			  $idx[] = $row->member_idx;
		  }
		  $test=$this->push($idx,array('type'=>'image','text'=>$title,'image'=>'http://13.124.110.195/public/uploads/mobile/image/'.$img,'link'=>'/back/list/1/1','idx'=>''),'notice');
          return array('return'=>'success','text'=>$test);
      }else{
          return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
      }
    }

    public function list($page)
    {
      $this->offset=($page-1)*$this->limit;
      $this->sql="SELECT push_idx, title as pusha FROM lighthouse_push
                  order by push_idx desc
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
