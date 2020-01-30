<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class membermodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
// INSERT into lighthouse_member (member_login, member_email, member_id, member_pass, member_name, member_type, member_device, member_phone, member_gender, member_birth, member_j_date) values ('nor','yj@naver.com', 'yjyjyj', '$2y$12$aujCZck4X0rDKxMPJg7pIut8wwHeI5Ntrxp56.8ZFSaEnzggd.Eo6', '예지입니다',5,'0', '01054339582', '여자', '19961213',now())
    public function insert()
    {
        $member_id = $_POST['member_id'];
        $member_name = $_POST['member_name'];
        $member_pass = password_hash($_POST['member_pass'],PASSWORD_DEFAULT,['cost'=>12]);
        $member_gender = $_POST['member_gender'];
        $member_birth = $_POST['member_birth'];
        $member_email = $_POST['member_email'];
        $member_phone = $_POST['member_phone'];
        $member_device = $_POST['member_device'];

		//
		// $sql = "SELECT count(*) con FROM {$this->dbname}_member WHERE member_phone = ? AND membe_phone != ''";
		// $query = $this->db->prepare($sql);
		// $query->execute(array($member_phone));
		// $result = $query->fetch();
		// $cona = $result->con;
		// if($cona){
		//   return array('return'=>'false','sql'=>$array);
		//   exit();
		// }
		// else{
		// 	$sql = "SELECT count(*) con FROM {$this->dbname}_member WHERE member_email = ? AND membe_email != ''";
		// 	$query = $this->db->prepare($sql);
		// 	$query->execute(array($member_email));
		// 	$result = $query->fetch();
		// 	$cona = $result->con;
		// 	if($cona){
		// 	  return array('return'=>'false','sql'=>$array);
		// 	  exit();
		// 	}
		// 	else{
				$sql="INSERT into {$this->dbname}_member (member_login, member_email, member_id, member_pass, member_name, member_type, member_device, member_phone, member_gender, member_birth, member_j_date) values ('nor', ?,?,?,?,5,?,?,?,?,now())";
				$query=$this->db->prepare($sql);
				$array = array($member_email, $member_id, $member_pass, $member_name, $member_device, $member_phone, $member_gender, $member_birth);
				$query->execute(array($member_email, $member_id, $member_pass, $member_name, $member_device, $member_phone, $member_gender, $member_birth));
				if($query->rowCount()){
				  return array('return'=>'true');
				}else{
				  return array('return'=>'false','sql'=>$array);
				}
			// }
		// }
	}

    public function selectId()
    {
        $member_id = $_POST['member_id'];
        $sql = "SELECT count(*) con FROM {$this->dbname}_member WHERE member_id = ?";
        $query = $this->db->prepare($sql);
		$query->execute(array($member_id));
		$result = $query->fetch();
        $con = $result->con;
        if(!$con){
            return array('return'=>'true','id'=>$member_id);
        }
        else{
            return array('return'=>'false');
        }
    }
    public function selectNick()
    {
        $member_name = $_POST['member_name'];
        $sql = "SELECT count(*) con FROM {$this->dbname}_member WHERE member_name = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($member_name));
        $result = $query->fetch();
        $con = $result->con;
        if(!$con){
            return array('return'=>'true','id'=>$member_name);
        }
        else{
            return array('return'=>'false');
        }
    }
    public function findId()
    {
        $member_phone = $_POST['member_phone'];
        $member_birth = $_POST['member_birth'];
        // $member_birth = '19961213';
        // $member_phone = '01054339582';
        $sql = "SELECT count(*) con, member_id FROM {$this->dbname}_member WHERE member_birth = ? and member_phone = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($member_birth,$member_phone));
        $result = $query->fetch();
        $member_id = $result->member_id;
        $count = strlen($member_id);
        $member_id1 = substr($member_id, 0, $count-2);
        $member_id1 .= '**';
        $con = $result->con;
        if($con){
            return array('return'=>'true','id'=>$member_id1);
        }
        else{
            return array('return'=>'false');
        }
    }
	public function findIdEmail()
	{
		$member_email = $_POST['member_email'];
		$member_birth = $_POST['member_birth'];
		// $member_birth = '19961213';
		// $member_phone = '01054339582';
		$sql = "SELECT count(*) con, member_id FROM {$this->dbname}_member WHERE member_birth = ? and member_email = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_birth,$member_email));
		$result = $query->fetch();
		$member_id = $result->member_id;
		$count = strlen($member_id);
		$member_id1 = substr($member_id, 0, $count-2);
		$member_id1 .= '**';
		$con = $result->con;
		if($con){
			return array('return'=>'true','id'=>$member_id1);
		}
		else{
			return array('return'=>'false');
		}
	}

	public function findPass()
    {
        $member_id = $_POST['member_id'];
        $member_phone = $_POST['member_phone'];
        $member_birth = $_POST['member_birth'];
        $array = array($member_id,$member_phone,$member_birth);
        // $member_birth = '19961213';
        // $member_phone = '01054339582';
        $sql = "SELECT count(*) con, member_id FROM {$this->dbname}_member WHERE member_id = ? and member_birth = ? and member_phone = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($member_id,$member_birth,$member_phone));
        $result = $query->fetch();
        $con = $result->con;
        if($con){
            return array('return'=>'true');
        }
        else{
            return array('return'=>'false');
        }
    }
	public function findPassEmail()
    {
        $member_id = $_POST['member_id'];
        $member_email = $_POST['member_email'];
        $member_birth = $_POST['member_birth'];
        $array = array($member_id,$member_email,$member_birth);
        // $member_birth = '19961213';
        // $member_phone = '01054339582';
        $sql = "SELECT count(*) con, member_id FROM {$this->dbname}_member WHERE member_id = ? and member_birth = ? and member_email = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($member_id,$member_birth,$member_email));
        $result = $query->fetch();
        $con = $result->con;
        if($con){
            return array('return'=>'true');
        }
        else{
            return array('return'=>'false');
        }
    }

	public function updatePass()
    {
        $member_id = $_POST['member_id'];
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT,['cost'=>12]);
        $sql = "UPDATE {$this->dbname}_member set member_pass = ? where member_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($pass,$member_id));
        $result = $query->fetch();
        if($query->rowCount()){
            return array('return'=>'true');
        }else{
            return array('return'=>'false');
        }
    }
	public function login()
	{
		$member_id = $_POST['member_id'];
		$member_pass = password_hash($_POST['member_pass'], PASSWORD_DEFAULT,['cose'=>12]);
		$sql = "SELECT member_idx, member_pass from {$this->dbname}_member where member_id = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_id));
		$result = $query->fetch();
		// print_r($result);
		if($result){
			if(password_verify($_POST['member_pass'],$result->member_pass)){
				$sql = "UPDATE {$this->dbname}_member set member_token = ? where member_idx = ?";
				$query = $this->db->prepare($sql);
				$query->execute([TOKEN, $result->member_idx]);
				$a = 1;
			}
		}
		if($a){
			return array('return'=>'true','member_idx'=>$result->member_idx);
		}
		else{
			return array('return'=>'false');
		}
	}
	public function logout()
	{
		$sql = "UPDATE {$this->dbname}_member set member_token = NULL where member_token = ?";
		$query = $this->db->prepare($sql);
		$query->execute([TOKEN]);
		if($query->rowCount()){
            return array('return'=>'true');
        }else{
            return array('return'=>'false');
        }
	}
	public function selectInfo()
	{
		$member_idx = $_POST['member_idx'];
		$sql = "SELECT member_id, member_name FROM {$this->dbname}_member where member_idx = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_idx));
		$result = $query->fetch();
		$member_id = $result->member_id;
		$member_name = $result->member_name;
		if($member_id){
			return array('return'=>'true','id'=>$member_id,'nickname'=>$member_name);
		}
		else{
			return array('return'=>'false');
		}
	}
	public function withdrawal()
	{
		$member_idx = $_POST['member_idx'];
		$sql = "DELETE FROM {$this->dbname}_member where member_idx = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_idx));
		if($query->rowCount()){
			return array('return'=>'true');
		}else{
			return array('return'=>'false');
		}
	}
	public function update_push($idx)
	{
		$member_idx = $_POST['member_idx'];
		$push = $_POST['push'];
		$col = 'member_push'.$idx;
		($push)?$push=1:$push=0;
		$sql = "UPDATE {$this->dbname}_member set $col = $push where member_idx = $member_idx";
		$query = $this->db->prepare($sql);
		$query->execute(array($push,$member_idx));
		if($query->rowCount()){
			return array('return'=>'true');
		}else{
			return array('return'=>'false');
		}
	}
	public function select_push()
	{
		$member_idx = $_POST['member_idx'];
		$sql = "SELECT member_push1, member_push2, member_push3, member_push4 FROM {$this->dbname}_member WHERE member_idx = $member_idx";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_idx));
		$list = $query->fetch();
		$push1 = $list->member_push1;
		$push2 = $list->member_push2;
		$push3 = $list->member_push3;
		$push4 = $list->member_push4;

		return array('push1'=>$push1,'push2'=>$push2,'push3'=>$push3,'push4'=>$push4);
	}

	public function disturbance()
	{
		$nopushtime1 = $_POST['nopushtime1'];
		$nopushtime2 = $_POST['nopushtime2'];
		$member_idx = $_POST['member_idx'];
		$sql = "UPDATE {$this->dbname}_member SET nopushtime1 = ?, nopushtime2 = ? WHERE member_idx = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($nopushtime1, $nopushtime2, $member_idx));
		if($query->rowCount()){
			return array('return'=>'true');
		}else{
			return array('return'=>'false');
		}
	}
	public function disturbance_show()
	{
		$member_idx = $_POST['member_idx'];
		$sql = "SELECT nopushtime1, nopushtime2 FROM {$this->dbname}_member WHERE member_idx = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_idx));
		$list = $query->fetch();
		$nopushtime1 = $list->nopushtime1;
		$nopushtime2 = $list->nopushtime2;
		return array('nopushtime1'=>$nopushtime1,'nopushtime2'=>$nopushtime2);

	}
	public function singo()
	{
		$sql="SELECT member_type, text FROM {$this->dbname}_member WHERE member_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($this->member_idx));
		$list = $query->fetch();
		$text = $list->text;
		$member_type = $list->member_type;
		if($member_type == 3){
			return array('result'=>'false','text'=>$text);
		}
		else{
			return array('result'=>'true','text'=>'');
		}
	}

    public function email_ck()
    {
		$email = $_POST['email'];
		$val = $_POST['val'];
		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'From:'.'lighthouse4us@naver.com'."\r\n";
		$headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";
		$result=mail($email, '=?UTF-8?B?'.base64_encode('내 등에 기대 이메일 인증입니다').'?=', '요청하신 인증번호는 '.$val.'입니다', $headers);
		return array('result'=>'{$result}','val'=>$val);

    }
	public function checkPhone()
	{
		$member_phone = $_POST['member_phone'];
		$sql = "SELECT count(*) con FROM {$this->dbname}_member where member_phone = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_phone));
		$result = $query->fetch();
		$con = $result->con;
		if($con){
			return array('return'=>'false');
		}
		else{
			return array('return'=>'true');
		}
	}
	public function checkEmail()
	{
		$member_email = $_POST['member_email'];
		$sql = "SELECT count(*) con FROM {$this->dbname}_member where member_email = ?";
		$query = $this->db->prepare($sql);
		$query->execute(array($member_email));
		$result = $query->fetch();
		$con = $result->con;
		if($con){
			return array('return'=>'false');
		}
		else{
			return array('return'=>'true');
		}
	}
	public function iostoken(){
		$sql = "UPDATE {$this->dbname}_member set member_token = ? where member_idx = ?";
		$query = $this->db->prepare($sql);
		$query->execute([TOKEN, $this->member_idx]);
		return array('return'=>'true');

	}
}
?>
