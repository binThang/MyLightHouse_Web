<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class Noticemodel Extends Controlmodel
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

    public function insert_notice()
    {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $sql="INSERT into {$this->dbname}_notice (title, content) values (?,?)";
      $query=$this->db->prepare($sql);
      $query->execute(array($title,$content));
      if($query->rowCount()){
		  $sql="SELECT member_idx as member_idx FROM {$this->dbname}_member";
		  $query=$this->db->prepare($sql);
		  $query->execute();
		  $list = $query->fetchAll();
		  foreach($list as $row){
			  $idx[] = $row->member_idx;
		  }
			//  	$this->push($idx,array('type'=>'text','text'=>$title,'image'=>'','link'=>'/back/list/1/1','idx'=>''),'notice');
          return array('return'=>'success','text'=>'등록되었습니다');
      }else{
          return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
      }
    }

    public function list($page)
    {
      $this->offset=($page-1)*$this->limit;
      $this->sql="SELECT notice_idx, title FROM lighthouse_notice
                  order by notice_idx desc
                  limit {$this->limit} offset {$this->offset}";
      $query=$this->db->prepare($this->sql);
      $query->execute();
      $return = new stdClass();
      $return->list=$query->fetchAll();
      $return->paging=$this->paging($page);
      return $return;
    }

    public function view($page, $idx)
    {
      $this->sql="SELECT notice_idx, title, content FROM {$this->dbname}_notice WHERE notice_idx = ?";
      $query=$this->db->prepare($this->sql);
      $query->execute(array($idx));
      $return = new stdClass();
      $return->list=$query->fetch();
      return $return->list;
    }


    public function update_notice()
    {
      $title = $_POST['title'];
      $content = $_POST['content'];
      $notice_idx = $_POST['notice_idx'];
      $sql="UPDATE {$this->dbname}_notice SET title = ?, content = ? WHERE notice_idx = ?";
      $query=$this->db->prepare($sql);
      $query->execute(array($title,$content,$notice_idx));
      if($query->rowCount()){
          return array('return'=>'success','text'=>'등록되었습니다');
      }else{
          return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
      }
    }
    public function del_notice($page = null, $idx)
    {
      $sql="DELETE FROM {$this->dbname}_notice WHERE notice_idx = ?";
      $query=$this->db->prepare($sql);
      $query->execute(array($idx));
      if($query->rowCount()){
          return array('return'=>'success','text'=>'등록되었습니다');
      }else{
          return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
      }
    }


}
?>
