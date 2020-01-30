<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class funmodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
	public function funList($idx, $page){
		if($idx == 1 || $idx == 2){
			$offset=($page-1)*10;
			$sql="SELECT funboard_idx, images, likes, video, rdate,
				(SELECT count(*) count FROM lighthouse_favorite WHERE board_idx = funboard_idx AND ifreply = 0 AND kind = 3) AS allcount,
				(SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = funboard_idx AND member_idx = $this->member_idx AND ifreply = 0 AND kind = 3) AS con,
				(SELECT count(*) reply FROM {$this->dbname}_reply WHERE board_idx = funboard_idx AND kind =  3) AS replycon
			from lighthouse_funboard where kind = $idx order by funboard_idx desc limit 10 offset $offset";
		}
		else{
			$offset=($page-1)*5;
			$sql="SELECT funboard_idx, images, likes, video, rdate,
				(SELECT count(*) count FROM lighthouse_favorite WHERE board_idx = funboard_idx AND ifreply = 0 AND kind = 3) AS allcount,
				(SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = funboard_idx AND member_idx = $this->member_idx AND ifreply = 0 AND kind = 3) AS con,
				(SELECT count(*) reply FROM {$this->dbname}_reply WHERE board_idx = funboard_idx AND kind =  3) AS replycon from lighthouse_funboard where kind = $idx order by funboard_idx desc limit 5 offset $offset";
		}
		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		$sql=preg_replace("/(limit|offset)[a-z0-9\,\.\'\`\_ ]*/i","",$sql);
		$query = $this->db->prepare($sql);
		$query->execute();
		$resulta = $query->fetchAll();
		foreach($resulta as $row){
			$board_idx[] = $row->funboard_idx;
		}
		$_SESSION['idx'] = $board_idx;
		return $result;

	}
	public function funView($idx)
    {
      $this->sql="SELECT images, video FROM {$this->dbname}_funboard where funboard_idx = ?";
      $query=$this->db->prepare($this->sql);
      $query->execute(array($idx));
      $return=$query->fetch();
      return $return;
    }
	public function favoriteReplyCon($board = null)
	{
		$sql="SELECT
				count(*) con,
				(SELECT count(*)
				 FROM {$this->dbname}_favorite
				 WHERE board_idx = $board and kind = 3) allcount,
				(SELECT count(*)
				 FROM {$this->dbname}_reply
				 WHERE board_idx = ? and kind = 3) replycon,
				(SELECT count(*)
				 FROM {$this->dbname}_singo
				 WHERE board_idx = ? and kind = 3 and ifreply = 0) singocon
			FROM {$this->dbname}_favorite
			WHERE board_idx = ? AND member_idx = ? and kind = 3";
		$query=$this->db->prepare($sql);
		$query->execute(array($board,$board,$board,$this->member_idx));
		$list = $query->fetch();
		return $list;
	}


	public function imgDownload($idx)
	{
	  $this->sql="SELECT images FROM {$this->dbname}_funboard where funboard_idx = ?";
	  $query=$this->db->prepare($this->sql);
	  $query->execute(array($idx));
	  $return=$query->fetch();
	  $images = $return->images;
	  $imgArray = explode(',',$images);
	  return array('image'=>$imgArray);
	}
	// public function favorite_check($board = null)
	// {
	// 	if(!$board)
	// 		$board = $_POST['board_idx'];
	// 	$sql="SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? and kind = 3";
	// 	$query=$this->db->prepare($sql);
	// 	$query->execute(array($board,$this->member_idx));
	// 	$list = $query->fetch();
	// 	$count = $list->con;
	// 	if($count){
	// 		return array('return'=>true);
	// 	}else{
	// 		return array('return'=>'false');
	// 	}
	// }
	// public function view_favorite($idx){
	// 	$sql="SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = ? and kind = 3";
	// 	$query=$this->db->prepare($sql);
	// 	$query->execute(array($idx));
	// 	$list = $query->fetch();
	// 	$allcount = $list->con;
	// 	return array('return'=>true,'count'=>$allcount);
	// }
	public function favorite($board = null)
	{
		if(!$board)
			$board = $_POST['board_idx'];
		$sql="SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? and kind = 3";
		$query=$this->db->prepare($sql);
		$query->execute(array($board,$this->member_idx));
		$list = $query->fetch();
		$count = $list->con;
		if($count){
			$sql="DELETE FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? and kind = 3";
			$query=$this->db->prepare($sql);
			$query->execute(array($board,$this->member_idx));
			if($query->rowCount()){
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}
		}
		else{
			$sql="INSERT into {$this->dbname}_favorite (member_idx, board_idx, kind) values (?,?,3)";
			$query=$this->db->prepare($sql);
			$query->execute(array($this->member_idx,$board));
			if($query->rowCount()){
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}

		}
	}
	public function insert_reply($board = null)
	{
		$content = $_POST['reply'];
		$board_idx = $_POST['board_idx'];
		$parent_idx = $_POST['parent_idx'];
		$sqla="INSERT into {$this->dbname}_reply (member_idx, content, board_idx, kind, rdate) values (?,?,?,3,now())";
		$querya=$this->db->prepare($sqla);
		$querya->execute(array($this->member_idx,$content,$board_idx));

		if(!$parent_idx){
			$sql="UPDATE {$this->dbname}_reply SET parent_idx = (select last_insert_id()) WHERE reply_idx = (select last_insert_id())";
			$query=$this->db->prepare($sql);
			$query->execute();
		}
		else{
			$sql="UPDATE {$this->dbname}_reply SET parent_idx = ?  WHERE reply_idx = (SELECT LAST_INSERT_ID())";
			$query=$this->db->prepare($sql);
			$query->execute(array($parent_idx));
		}

		if($querya->rowCount()){
			return array('return'=>'true');
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}
	public function list_reply($idx){
		$sql="SELECT
				reply.reply_idx,
				reply.content,
				member.member_name,
				reply.parent_idx,
				reply.rdate,
				IF(reply.member_idx = $this->member_idx, 1,0) AS myreply,
				(
					SELECT count(*)
					FROM {$this->dbname}_favorite AS favorite
					WHERE favorite.board_idx = reply_idx
						AND favorite.member_idx =?
						AND favorite.kind = 3
						AND favorite.ifreply = 1
				) con
			FROM lighthouse_reply AS reply
				JOIN lighthouse_member AS member using(member_idx)
			WHERE reply.board_idx = ? AND reply.kind = 3
			ORDER BY reply.parent_idx, reply.reply_idx ASC";
		$query=$this->db->prepare($sql);
		$query->execute(array($this->member_idx,$idx));
		$list = $query->fetchAll();
		// foreach($list as $key => $row){
		// 	$alltime = diffDate($row->rdate,"hour");
		// 	$timelen = strlen($alltime);
		// 	if($timelen == 19){
		// 		$timearray = explode($row->rdate,' ');
		// 		$time = $timearray[0];
		// 	}else{
		// 		$time = $alltime;
		// 	}
		// 	$list[$key]->rdate=$time;
		// }

		return $list;
		// $query=$this->db->prepare($sql);
		// $query->execute(array($row->funboard_idx, $member));
		// $list = $query->fetch();
		// $con[] = $list->con; //좋아요 확인

		// return array('reply_idx'=>$reply_idx,'content'=>$content,'member_name'=>$member_name,'member_parent'=>$member_parent,'rdate'=>$rdate,'like'=>$con);
	}

	// public function view_reply($idx = null){
	// 	$sql="SELECT count(*) con FROM {$this->dbname}_reply WHERE board_idx = ? and kind = 3";
	// 	$query=$this->db->prepare($sql);
	// 	$query->execute(array($idx));
	// 	$list = $query->fetch();
	// 	$allcount = $list->con;
	// 	return array('return'=>true,'count'=>$allcount);
	// }
	public function reply_favorite()
	{
		$board = $_POST['board_idx'];
		$sql="SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? AND kind = 3 AND ifreply = 1";
		$query=$this->db->prepare($sql);
		$query->execute(array($board,$this->member_idx));
		$list = $query->fetch();
		$count = $list->con;
		if($count){
			$sql="DELETE FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? and kind = 3 AND ifreply = 1";
			$query=$this->db->prepare($sql);
			$query->execute(array($board,$this->member_idx));
			if($query->rowCount()){
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}
		}
		else{
			$sql="INSERT into {$this->dbname}_favorite (member_idx, board_idx, kind, ifreply) values (?,?,3,1)";
			$query=$this->db->prepare($sql);
			$query->execute(array($this->member_idx,$board));
			if($query->rowCount()){
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}

		}
	}

	public function reply_singo()
	{
		$board = $_POST['board_idx'];
		$text = $_POST['text'];
		$sql="SELECT count(*) con FROM {$this->dbname}_singo WHERE board_idx = ? AND member_idx = ? AND kind = 3 AND ifreply = 1";
		$query=$this->db->prepare($sql);
		$query->execute(array($board,$this->member_idx));
		$list = $query->fetch();
		$count = $list->con;
		if($count){
			return array('return'=>'duplicate');
		}
		else{
			$sql="INSERT into {$this->dbname}_singo (member_idx, board_idx, kind, ifreply, excuse) values (?,?,3,1,?)";
			$query=$this->db->prepare($sql);
			$query->execute(array($this->member_idx,$board,$text));
			if($query->rowCount()){
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}
		}
	}
	public function reload($idx)
	{
		$sql="SELECT
				count(*) con,
				(SELECT count(*)
				 FROM {$this->dbname}_favorite
				 WHERE board_idx = $idx and kind = 3) allcount,
				(SELECT count(*)
				 FROM {$this->dbname}_reply
				 WHERE board_idx = ? and kind = 3) replycon,
				(SELECT count(*)
				 FROM {$this->dbname}_singo
				 WHERE board_idx = ? and kind = 3 and ifreply = 0) singocon
			FROM {$this->dbname}_favorite
			WHERE board_idx = ? AND member_idx = ? and kind = 3";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx,$idx,$idx,$this->member_idx));
		$list = $query->fetch();
		$con = $list->con;
		$allcount = $list->allcount;
		$replycon = $list->replycon;
		return array('con'=>$con,'allcount'=>$allcount,'replycon'=>$replycon);
	}

}
?>
