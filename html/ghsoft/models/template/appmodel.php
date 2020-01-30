<?php
namespace models\template;
use libs\Modeling;
use stdClass;
class Appmodel Extends Modeling
{
	function __construct($db)
	{
		$this->db=$db;
		parent::__construct();
	}
	public function autoLogin()
	{
		$sql="SELECT member_idx from {$this->dbname}_member where member_token=?";
		$query=$this->db->prepare($sql);
		$query->execute([TOKEN]);
		return $query->fetch()->member_idx;
	}
	public function singo()
	{
		$myidx=$this->member_idx;
		global $class;
	    $idx=$_POST['idx'];
		$value=$_POST['value'];
		$sql="INSERT into
				{$this->dbname}_singo
			(singo_user,singo_type,singo_target,singo_value,singo_date)
			values
			(?,?,?,?,now())";
		$query=$this->db->prepare($sql);
		$query->execute([$myidx,$class,$idx,$value]);
		if($query->rowCount()){
			return ['return'=>'success','text'=>'신고성공'];
		}else{
			return ['return'=>'fail','text'=>'신고실패'];
		}
	}
    public function review($idx)
    {
        global $class;
        $myidx=$this->member_idx;
        if(!$idx){
            $idx=$myidx;
        }
        if($class=='teacher'){
            $where=' and reply_target=? ';
        }else{
            $where=' and member_idx=? ';
        }
        $sql="SELECT
                reply_idx,
                reply_star,
                reply_content,
                reply_w_date,
                concat(left(student.member_name,1),'*',if(CHAR_LENGTH(student.member_name)>2,substring(student.member_name,3,CHAR_LENGTH(student.member_name)-2),'')) name,
                if(student.member_idx=?,1,0) my,
                teacher.member_tea_image1 image
            from  {$this->dbname}_reply
            join {$this->dbname}_member student using(member_idx)
            join {$this->dbname}_member teacher on teacher.member_idx=reply_target
            where reply_type='teacher' {$where}";
		$query=$this->db->prepare($sql);
		$query->execute([$myidx,$idx]);
        $return=$query->fetchAll();
        if($return){
            return ['return'=>'success','list'=>$return];
        }else{
            return ['return'=>'fail'];
        }
    }
}
?>
