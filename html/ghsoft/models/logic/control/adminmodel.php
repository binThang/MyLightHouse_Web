<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class Adminmodel Extends Controlmodel
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

	//admin
	public function adminView($idx)
	{
		$sql="SELECT member_idx,member_id,member_type,member_name from {$this->dbname}_member where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		return $query->fetch();
	}
	public function adminList($page)
	{
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT member_idx,member_name,member_id,member_type,member_j_date,member_l_date
                from {$this->dbname}_member
                where member_login='admin'
                order by member_idx desc
                limit {$this->limit} offset {$this->offset}";
        $query=$this->db->prepare($this->sql);
        $query->execute();
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function adminInsert()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url'){
				if($v){
					$ke='`member_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$value[]='?';
					if($k=='pass'){
						$array[]=password_hash($v,PASSWORD_DEFAULT,['cost'=>12]);
					}else{
						$array[]=$v;
					}
				}
			}
		}
		$sql="INSERT into {$this->dbname}_member (".implode(',',$key).",member_j_date,member_l_date,member_login) values (".implode(',',$value).",now(),now(),'admin')";
		$query=$this->db->prepare($sql);
		$query->execute($array);
		if($query->rowCount()){
			return array('return'=>'success','text'=>"등록 성공");
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}
	public function adminUpdate()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url' && $k!='idx'){
				if($v){
					$ke='`member_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$upload[]=$ke.'=?';
					if($k=='pass'){
						$array[]=password_hash($v,PASSWORD_DEFAULT,['cost'=>12]);
					}else{
						$array[]=$v;
					}
				}
			}
		}
		$sql="UPDATE {$this->dbname}_member set ".implode(',',$upload)." where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute(array_merge($array,[$_POST['idx']]));
		if($query->rowCount()){
			return array('return'=>'success','text'=>"등록 성공");
		}else{
			return array('return'=>'fail','text'=>'등록 실패');
		}
	}
	public function adminDelete($page,$idx)
	{
		$sql="DELETE from {$this->dbname}_member where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail');
		}
	}
}
?>
