<?php
namespace models\template;
use libs\Modeling;
use stdClass;
class Controlmodel Extends Modeling
{
	function __construct($db)
	{
		$this->db=$db;
		parent::__construct();
	}
	public function login(){
		$sql="SELECT member_idx,member_pass,member_name,member_type from {$this->dbname}_member where member_id=? and member_login='admin'";
		$query=$this->db->prepare($sql);
		$query->execute([$_POST['id']]);
		$result=$query->fetch();
		if(password_verify($_POST['pass'],$result->member_pass)){
			$_SESSION['admin_idx']=$result->member_idx;
			$_SESSION['admin_name']=$result->member_name;
			$_SESSION['admin_type']=$result->member_type;
		}
	}
	public function passUpdate(){
		$sql="SELECT member_pass from {$this->dbname}_member where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$_SESSION['admin_idx']]);
		if(password_verify($_POST['pass_old'],$query->fetch()->member_pass)){
			$pass=password_hash($_POST['pass_new'],PASSWORD_DEFAULT,['cost'=>12]);
			$sql="UPDATE {$this->dbname}_member set member_pass=? where member_idx=?";
			$query=$this->db->prepare($sql);
			$query->execute([$pass,$_SESSION['admin_idx']]);
			if($query->rowCount()){
				return array('return'=>'success','text'=>'변경되었습니다.');
			}else{
				return array('return'=>'fail','text'=>'변경하지 못했습니다.');
			}
		}else{
			return array('return'=>'fail','text'=>'기존 비밀번호가 틀립니다.');
		}
	}
	public function menu($array){
		$menu=new stdClass();
		for($i=0;$i<count($array);$i++){
			$count='menu'.$i;
			$menu->$count=new stdClass();
			$menu->$count->type=$array[$i][0];
			$menu->$count->title=$array[$i][1];
			$content=[];
			for($j=0;$j<count($array[$i][2]);$j++){
				$submenu=new stdClass();
				$submenu->link=$array[$i][2][$j][0];
				$submenu->title=$array[$i][2][$j][1];
				$content[]=$submenu;
			}
			$menu->$count->content=$content;
		}
		return $menu;
	}
}
?>
