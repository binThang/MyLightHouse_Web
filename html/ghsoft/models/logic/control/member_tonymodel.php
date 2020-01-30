<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class member_tonymodel Extends Controlmodel
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

    public function list_tony($page)
    {
		if($_POST['name']){
		    $_SESSION['tony'] = $_POST['name'];
		}
		if($_SESSION['tony']){
			$like = ' AND member_id LIKE "%'.$_SESSION['tony'].'%"';
		}
		if($_POST['set']){
			unset($_SESSION['tony']);
		}

  	$this->offset=($page-1)*$this->limit;
  	$this->sql="SELECT member_idx, member_id, member_name, member_email, member_phone, member_birth, CASE member_type WHEN '5' THEN '일반 회원' WHEN '8' THEN '토니' END
                  FROM {$this->dbname}_member
                  WHERE member_type = 8 $like
                  ORDER BY member_idx desc
  				limit {$this->limit} offset {$this->offset}";
  	$query=$this->db->prepare($this->sql);
  	$query->execute();
  	$return = new stdClass();
  	$return->list=$query->fetchAll();
  	$return->paging=$this->paging($page);
  	return $return;
    }

    public function update_tony()
    {
        $member_idx = $_POST['idx'];
        $sql="SELECT member_type FROM {$this->dbname}_member WHERE member_idx = ?";
        $query=$this->db->prepare($sql);
        $query->execute(array($member_idx));
        $list = $query->fetch();
        $type = $list->member_type;
        ($type == 5)?$type = 8:$type = 5;

        $sql="UPDATE {$this->dbname}_member SET member_type = ? WHERE member_idx = ?";
        $query=$this->db->prepare($sql);
        $query->execute(array($type,$member_idx));
        if($query->rowCount()){
            return array('return'=>'success','text'=>'수정되었습니다');
        }else{
            return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
        }
    }

    public function insert_text()
    {
        $member_idx = $_POST['idx'];
		$text = $_POST['text'];

        $sql="UPDATE {$this->dbname}_member SET member_type = 3, text = ? WHERE member_idx = ?";
        $query=$this->db->prepare($sql);
        $query->execute(array($text,$member_idx));
        if($query->rowCount()){
            return array('return'=>'success','text'=>'수정되었습니다');
        }else{
            return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
        }
    }

}
?>
