<?php
namespace models\logic\web;
use models\template\webmodel;
class Mainmodel Extends Webmodel
{
	public function __construct($db)
	{
		$this->db=$db;
		parent::__construct($db);
	}
	public function push_fun(){
		$sql="SELECT member_idx FROM {$this->dbname}_member";
		$query=$this->db->prepare($sql);
		$query->execute();
		$list = $query->fetchAll();
		foreach($list as $row){
			$idx[] = $row->member_idx;
		}
		// $idx=[258];
		// $idx = [239];
		// $idx = [66];
		// $idx = [307];
		$sql="SELECT funpush_pushidx FROM {$this->dbname}_funpush WHERE funpush_idx = 1";
		$query=$this->db->prepare($sql);
		$query->execute();
		$list = $query->fetch();
		$funidx = $list->funpush_pushidx;

		$sql="SELECT funboard_idx FROM {$this->dbname}_funboard WHERE (kind = 1 || kind = 2) ORDER BY funboard_idx DESC limit 1";
		$query=$this->db->prepare($sql);
		$query->execute();
		$list = $query->fetch();
		$funallidx = $list->funboard_idx;

		$sql="SELECT funboard_idx FROM {$this->dbname}_funboard WHERE (kind = 1 || kind = 2) AND funboard_idx > $funidx ORDER BY funboard_idx ASC limit 1";
		$query=$this->db->prepare($sql);
		$query->execute();
		$list = $query->fetch();
		$fun = $list->funboard_idx;

		$sql="SELECT images, video FROM {$this->dbname}_funboard WHERE funboard_idx = $fun";
		$query=$this->db->prepare($sql);
		$query->execute(array($fun));
		$list = $query->fetch();
		$images = $list->images;
		// echo $video = $list->video;
		// if($images){
			$img = explode(',',$images);
		 	$viewimg = 'http://13.124.110.195/public/uploads/mobile/image/'.$img[0];
		// }
		// else{
		// 	$vi = substr($video,17);
		// 	$viewimg = 'https://img.youtube.com/vi/'.$vi.'/mqdefault.jpg';
		// }
		// echo $viewimg;
		// $testidx = [258];
		$sql="UPDATE {$this->dbname}_funpush SET funpush_pushidx = ? WHERE funpush_idx = 1";
		$query=$this->db->prepare($sql);
		if($funallidx != $fun)
			$fun = $fun;
		else
			$fun = 1;
		$query->execute(array($fun));
		$this->push($idx,array('type'=>'image','text'=>'오늘의 응원이 도착했습니다','image'=>$viewimg,'link'=>'/fun/view/'.$fun.'/push','idx'=>$fun),'fun');
		// $this->push($idx,array('type'=>'text','text'=>'오늘의 응원이 도착했습니다','link'=>'/fun/view/'.$fun.'/push','idx'=>$fun),'fun');

	}
}
?>
