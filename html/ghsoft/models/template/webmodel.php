<?php
namespace models\template;
use libs\Modeling;
use stdClass;
class Webmodel Extends Modeling
{
	function __construct($db)
	{
		$this->db=$db;
		parent::__construct();
	}

	public function session(){
		// $id=explode('.',$_SERVER['HTTP_HOST'])[0];
		// if($id=='ghedu'||$id=='www'){
		// 	$root_id='jkh';
		// }else{
		// 	$sql="SELECT member_id from {$this->dbname}_member where member_id=?";
		// 	$query=$this->db->prepare($sql);
		// 	$query->execute([$id]);
		// 	$root_id=$query->fetch()->member_id;
		// }
		// if($root_id){
		// 	$_SESSION['root_id']=$root_id;
		// }else{
		// 	header('Location:http://ghedu.kr');
		// }
		// $sql="SELECT member_phone,member_meta,member_footer,member_kakao,member_banner,member_qbanner,member_popup,member_popupalt from {$this->dbname}_member where member_id=?";
		// $query=$this->db->prepare($sql);
		// $query->execute([$_SESSION['root_id']]);
		// $result=$query->fetch();
		// $_SESSION['phone']=$result->member_phone;
		// $_SESSION['meta']=$result->member_meta;
		// $_SESSION['footer']=$result->member_footer;
		// $_SESSION['kakao']=$result->member_kakao;
		// $_SESSION['banner']=json_decode($result->member_banner);
		// $_SESSION['qbanner']=json_decode($result->member_qbanner);
		// $_SESSION['popup']=json_decode($result->member_popup);
		// $_SESSION['popupalt']=json_decode($result->member_popupalt);
	}
}
?>
