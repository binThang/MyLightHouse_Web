<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class backmodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
	public function select_category()
    {
        $sql="SELECT category_idx, category from {$this->dbname}_category";
        $query=$this->db->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
		$count = 0;
		foreach($list as $row){
			$category_idx[] = $row->category_idx;
			$category[] = $row->category;
			if($count){
				$color[] = 'false';
			}
			else{
				$color[] = 'true';
			}
			$count++;
		}
		return array('category_idx'=>$category_idx,'category'=>$category,'color'=>$color);
    }
	public function select_hashtag()
	{
		$category = $_POST['category'];
		$sql="SELECT hashtag_idx, hashtag FROM {$this->dbname}_hashtag where category =$category";
		$query=$this->db->prepare($sql);
		$query->execute(array($category));
		$list = $query->fetchAll();
		foreach($list as $row){
			$idx[] = $row->hashtag_idx;
			$hashtag[] = $row->hashtag;
		}
		if($idx[0]){
			return array('result'=>'true','idx'=>$idx,'hashtag'=>$hashtag);
		}
		else{
			return array('result'=>'false');
		}
	}
	public function select_gallery()
	{
		$sql="SELECT gallery_idx, image, color FROM {$this->dbname}_gallery ORDER BY rand()";
		$query=$this->db->prepare($sql);
		$query->execute();
		$list = $query->fetchAll();
		foreach($list as $row){
			$gallery_idx[] = $row->gallery_idx;
			$image[] = $row->image;
			$color[] = $row->color;
		}
		if($gallery_idx[0]){
			return array('gallery_idx'=>$gallery_idx,'image'=>$image,'color'=>$color);
		}
	}

	public function select_backimg()
	{
		$sql="SELECT gallery_idx, image, color FROM {$this->dbname}_gallery ORDER BY rand() limit 1";
		$query=$this->db->prepare($sql);
		$query->execute();
		$img = $query->fetch();
		return $img;
	}

	public function insert_board()
    {
		$backimg = $_POST['backimg'];
		$category = $_POST['category'];
		$hashtag = $_POST['hashtag'];
		$content = $_POST['content'];
		$color = $_POST['color'];
		$ifshow = $_POST['ifshow'];
		$tony = $_POST['tony'];
	  	$sql="INSERT into {$this->dbname}_board (member_idx, backimg, category, hashtag, content, color, ifshow, tony) values (?,?,?,?,?,?,?,?)";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($this->member_idx,$backimg,$category,$hashtag,$content,$color,$ifshow,$tony));
		$array = array($this->member_idx,$backimg,$category,$hashtag,$content,$color,$ifshow,$tony);
	  	if($query->rowCount()){
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

	//리스트
	public function boardList($kind, $idx, $page = 1)
	{
		$offset=($page-1)*5;
		($kind==1)?$tony=0:$tony=1;
		// ($kind==1)?$kindtony=1:$kindtony=3;
		$tonysql = '';

		$sql="SELECT member_type FROM {$this->dbname}_member where member_idx =$this->member_idx";
		$query=$this->db->prepare($sql);
		$query->execute();
		$list = $query->fetch();
		$member_type = $list->member_type;
		if($member_type == 5){
			$tonysql = ' AND (ifshow = 1 || member_idx = '.$this->member_idx.')';
		}
		switch($idx){
			case 3 :
				//$orderby = ' ORDER BY allcount desc';
				break;
			case 2 :
				//$orderby = ' ORDER BY (SELECT count(*) ccount FROM lighthouse_favorite WHERE (lighthouse_favorite.wdate > date_add(now(),interval -7 day) AND lighthouse_favorite.wdate <= now())  AND board_idx = board.board_idx and ifreply = 0 and kind = 1) desc';
				$tony = 1;
				$orderby = ' ORDER BY wdate DESC';
				break;
			case 1 :
				$tony = 0;
				$orderby = ' ORDER BY wdate DESC';
				break;
		}
		$sql="SELECT
				board_idx, member_idx, image, wdate, content, board.color, hashtag, category.category, board.ifshow ifshow,
				(
					SELECT count(*)
					FROM {$this->dbname}_favorite AS favorite
					WHERE favorite.board_idx = board.board_idx
					AND member_idx = $this->member_idx and kind = 1 and ifreply = 0) AS con,
				(SELECT count(*)
				 FROM {$this->dbname}_favorite AS favorite
				 WHERE board_idx = board.board_idx
				 and kind = 1 and ifreply = 0) AS allcount,
				(SELECT count(*)
				 FROM {$this->dbname}_reply
			 	 WHERE kind = 1 AND board_idx = board.board_idx) AS replycon
			FROM {$this->dbname}_board AS board
			JOIN {$this->dbname}_gallery AS gallery
			ON board.backimg = gallery.gallery_idx
			JOIN {$this->dbname}_category AS category
			ON board.category = category.category_idx
			WHERE tony = $tony".$tonysql.$orderby." limit 5 offset $offset";
		$query=$this->db->prepare($sql);
		$query->execute(array($tony));
		$list = $query->fetchAll();
		$sql=preg_replace("/(limit|offset)[a-z0-9\,\.\'\`\_ ]*/i","",$sql);
		$query = $this->db->prepare($sql);
		$query->execute((array($tony)));
		$resulta = $query->fetchAll();
		foreach($resulta as $row){
			$board_idx[] = $row->board_idx;
		}
		$_SESSION['idx'] = $board_idx;
		// print_r($_SESSION['idx']);
		return $list;
	}

	public function view($idx)
	{
		$sql="SELECT member_idx, board_idx, category.category, hashtag, content, wdate, tony,
			(SELECT member_type FROM {$this->dbname}_member WHERE member_idx = $this->member_idx) AS member_type
			FROM {$this->dbname}_board AS board
            JOIN {$this->dbname}_category AS category
			ON board.category = category.category_idx";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx));
		$view = $query->fetch();
		return $view;
	}

	public function favorite($board = null)
	{
		if(!$board)
			$board = $_POST['board_idx'];
		($_POST['ifreply'])?$ifreply = $_POST['ifreply']:$ifreply = 0;
		$sql="SELECT count(*) con FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? and kind = 1 and ifreply = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($board,$this->member_idx,$ifreply));
		$list = $query->fetch();
		$count = $list->con;
		if($count){
			$sql="DELETE FROM {$this->dbname}_favorite WHERE board_idx = ? AND member_idx = ? and kind = 1 and ifreply = ?";
			$query=$this->db->prepare($sql);
			$query->execute(array($board,$this->member_idx,$ifreply));
			if($query->rowCount()){
				if($ifreply == 0){
					$sql="DELETE FROM {$this->dbname}_alert WHERE board_idx = ? and member_idx = ? and favorite = 1";
					$query=$this->db->prepare($sql);
					$query->execute(array($board,$this->member_idx));
				}
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}
		}
		else{
			$sql="INSERT into {$this->dbname}_favorite (member_idx, board_idx, kind, ifreply) values (?,?,1,?)";
			$query=$this->db->prepare($sql);
			$query->execute(array($this->member_idx,$board,$ifreply));
			if($query->rowCount()){
				if($ifreply == 0){
					$sql="INSERT into {$this->dbname}_alert (board_idx,member_idx,favorite,wdate) values (?,?,1,now())";
					$query=$this->db->prepare($sql);
					$query->execute(array($board,$this->member_idx));

					$sql="SELECT member_idx FROM {$this->dbname}_board WHERE board_idx = ?";
					$query=$this->db->prepare($sql);
					$query->execute(array($board));
					$list = $query->fetch();
					$idx = $list->member_idx;
					$this->push(array($idx),array('type'=>'text','text'=>'나의 이야기가 공감을 받았습니다.','image'=>'','link'=>'/back/view/'.$board,'idx'=>$board),'favorite');
				}
				else{

					$sql="SELECT member_idx, board_idx FROM {$this->dbname}_reply WHERE reply_idx = ? AND kind = 1";
					$query=$this->db->prepare($sql);
					$query->execute(array($board));
					$list = $query->fetch();
					$idx = $list->member_idx;
					$board = $list->board_idx;
					$this->push(array($idx),array('type'=>'text','text'=>'내 댓글이 공감을 받았습니다.','image'=>'','link'=>'/back/view/'.$board,'idx'=>$board),'favorite');
				}
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}

		}
	}
	public function favoriteReplyCon($board = null)
	{
		$sql="SELECT
				count(*) con,
				(SELECT count(*)
				 FROM {$this->dbname}_favorite
				 WHERE board_idx = $board and kind = 1 AND ifreply = 0) allcount,
				(SELECT count(*)
				 FROM {$this->dbname}_reply
				 WHERE board_idx = ? and kind = 1) replycon,
				(SELECT count(*)
				 FROM {$this->dbname}_singo
				 WHERE board_idx = ? and kind = 1 and ifreply = 0) singocon
			FROM {$this->dbname}_favorite
			WHERE board_idx = ? AND member_idx = ? and ifreply = 0 and kind = 1";
		$query=$this->db->prepare($sql);
		$query->execute(array($board,$board,$board,$this->member_idx));
		$list = $query->fetch();
		return $list;
	}
	public function insert_reply($board = null)
	{
		$content = $_POST['reply'];
		$board_idx = $_POST['board_idx'];
		$parent_idx = $_POST['parent_idx'];
		$content_image = $_POST['content_image'];
		$sqla="INSERT into {$this->dbname}_reply (member_idx, content, board_idx, kind, rdate, content_image) values (?,?,?,1,now(),?)";
		$querya=$this->db->prepare($sqla);
		$querya->execute(array($this->member_idx,$content,$board_idx,$content_image));

		if(!$parent_idx){
			$sql="UPDATE {$this->dbname}_reply SET parent_idx = (select last_insert_id()) WHERE reply_idx = (select last_insert_id())";
			$query=$this->db->prepare($sql);
			$query->execute();

			$sql="SELECT member_idx FROM {$this->dbname}_board WHERE board_idx = ?";
			$query=$this->db->prepare($sql);
			$query->execute(array($board_idx));
			$list = $query->fetch();
			$idx = $list->member_idx;

			$this->push(array($idx),array('type'=>'text','text'=>'새로운 댓글이 달렸습니다.','image'=>'','link'=>'/back/view/'.$board_idx,'idx'=>$board_idx),'reply');
		}
		else{
			$sql="UPDATE {$this->dbname}_reply SET parent_idx = ?  WHERE reply_idx = (SELECT LAST_INSERT_ID())";
			$query=$this->db->prepare($sql);
			$query->execute(array($parent_idx));

			$sql="SELECT member_idx FROM {$this->dbname}_reply WHERE reply_idx = $parent_idx";
			$query=$this->db->prepare($sql);
			$query->execute(array($parent_idx));
			$list = $query->fetch();
			$mem_idx = $list->member_idx;

			$this->push(array($mem_idx),array('type'=>'text','text'=>'내 댓글에 새로운 댓글이 달렸습니다.','image'=>'','link'=>'/back/view/'.$board_idx,'idx'=>$board_idx),'reply');
		}

		if($querya->rowCount()){
			$sql="INSERT into {$this->dbname}_alert (board_idx,member_idx,wdate) values (?,?,now())";
			$query=$this->db->prepare($sql);
			$query->execute(array($board_idx,$this->member_idx));
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
				member.member_type,
				reply.member_idx AS replymember,
				IF(reply.member_idx = $this->member_idx, 1,0) AS myreply,
				reply.parent_idx,
				reply.rdate,
				reply.content_image,
				(SELECT count(*)
				FROM {$this->dbname}_favorite AS favorite
				WHERE favorite.board_idx = reply.reply_idx
				AND favorite.member_idx = ?
				AND favorite.kind = 1
				AND favorite.ifreply = 1) as con
			FROM lighthouse_reply AS reply
				 LEFT JOIN lighthouse_member AS member using(member_idx)
			WHERE reply.board_idx = ? AND reply.kind = 1
			ORDER BY reply.parent_idx, reply.rdate ASC";
		$query=$this->db->prepare($sql);
		$query->execute(array($this->member_idx,$idx));
		$list = $query->fetchAll();
		return $list;
	}
	public function singo(){
		($_POST['ifreply'])?$ifreply = $_POST['ifreply']:$ifreply = 0;
		$text = $_POST['text'];
		$sql = "SELECT count(*) con FROM {$this->dbname}_singo WHERE board_idx = ? AND member_idx = ? AND kind = ? AND ifreply = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($_POST['board_idx'],$this->member_idx,1,$ifreply));
		$con = $query->fetch()->con;
		if($con){
			return array('result'=>'duplicate');
		}
		else{
			$sql = "INSERT INTO {$this->dbname}_singo(board_idx, member_idx, kind, ifreply, excuse) VALUES (?,?,?,?,?)";
			$query=$this->db->prepare($sql);
			$query->execute(array($_POST['board_idx'],$this->member_idx,1,$ifreply,$text));
			if($query->rowCount()){
				return array('return'=>'true');
			}else{
				return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
			}
		}
	}
	public function select_idx($type)
	{
		$idx = $_POST['idx'];
		// print_r($_SESSION['idx']);

		if(isset($_SESSION['idx'])){
			$board_idx = array_search($idx,$_SESSION['idx']);
			if($type == 'next')
				return array('board_idx'=>$_SESSION['idx'][$board_idx+1], 'idx'=>$_SESSION['idx']);
			else
				return array('board_idx'=>$_SESSION['idx'][$board_idx-1], 'idx'=>$_SESSION['idx']);
		}
		else{
			return array('board_idx'=>'0');
		}
	}

	public function reload($idx)
	{
		$sql="SELECT
				count(*) con,
				(SELECT count(*)
				 FROM {$this->dbname}_favorite
				 WHERE board_idx = $idx and kind = 1 AND ifreply = 0) allcount,
				(SELECT count(*)
				 FROM {$this->dbname}_reply
				 WHERE board_idx = ? and kind = 1) replycon,
				(SELECT count(*)
				 FROM {$this->dbname}_singo
				 WHERE board_idx = ? and kind = 1 and ifreply = 0) singocon
			FROM {$this->dbname}_favorite
			WHERE board_idx = ? AND member_idx = ? and ifreply = 0 and kind = 1";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx,$idx,$idx,$this->member_idx));
		$list = $query->fetch();
		$con = $list->con;
		$allcount = $list->allcount;
		$replycon = $list->replycon;
		return array('con'=>$con,'allcount'=>$allcount,'replycon'=>$replycon);
	}
	public function funreload($idx)
	{
		$sql="SELECT
				count(*) con,
				(SELECT count(*)
				 FROM {$this->dbname}_favorite
				 WHERE board_idx = $idx and kind = 3 AND ifreply = 0) allcount,
				(SELECT count(*)
				 FROM {$this->dbname}_reply
				 WHERE board_idx = ? and kind = 3) replycon,
				(SELECT count(*)
				 FROM {$this->dbname}_singo
				 WHERE board_idx = ? and kind = 3 and ifreply = 0) singocon
			FROM {$this->dbname}_favorite
			WHERE board_idx = ? AND member_idx = ? and ifreply = 0 and kind = 3";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx,$idx,$idx,$this->member_idx));
		$list = $query->fetch();
		$con = $list->con;
		$allcount = $list->allcount;
		$replycon = $list->replycon;
		return array('con'=>$con,'allcount'=>$allcount,'replycon'=>$replycon);
	}

	public function myboard($idx)
	{
		$sql="SELECT count(*) con FROM {$this->dbname}_board WHERE board_idx = ? AND member_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx, $this->member_idx));
		$list = $query->fetch();
		return $list;
	}
	public function selected_hashtag()
	{
		$board_idx = $_POST['board_idx'];
		$sql="SELECT hashtag FROM {$this->dbname}_board WHERE board_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($board_idx));
		$list = $query->fetch();
		$hashtag = $list->hashtag;
		return array('hashtag'=>$hashtag);
	}

	public function update_board()
    {
		$backimg = $_POST['backimg'];
		$category = $_POST['category'];
		$hashtag = $_POST['hashtag'];
		$content = $_POST['content'];
		$color = $_POST['color'];
		$ifshow = $_POST['ifshow'];
		$tony = $_POST['tony'];
		$board_idx = $_POST['board_idx'];
	  	$sql="UPDATE {$this->dbname}_board SET backimg = ?, category = ?, hashtag = ?, content = ?, color = ?, ifshow = ? WHERE board_idx = ?";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($backimg, $category, $hashtag, $content, $color, $ifshow, $board_idx));
	  	if($query->rowCount()){
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

	public function del_board()
    {
		$board_idx = $_POST['board_idx'];
	  	$sql="DELETE FROM {$this->dbname}_board WHERE board_idx = ?";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($board_idx));
	  	if($query->rowCount()){
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

	public function update_reload()
	{
		$board_idx = $_POST['board_idx'];
		$sql="SELECT category.category, board.content, board.hashtag, gallery.image, board.color FROM {$this->dbname}_board AS board
		JOIN {$this->dbname}_category AS category ON category.category_idx = board.category
		JOIN {$this->dbname}_gallery AS gallery ON board.backimg = gallery.gallery_idx WHERE board.board_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($board_idx));
		$list = $query->fetch();
		$category = $list->category;
		$content = $list->content;
		$hashtag = $list->hashtag;
		$color = $list->color;
		$img = $list->image;
		return array('category'=>$category,'content'=>$content,'hashtag'=>$hashtag, 'color'=>$color,'img'=>$img);
	}
	public function select_reply()
	{
		$reply_idx = $_POST['reply_idx'];
		$sql="SELECT content FROM {$this->dbname}_reply WHERE reply_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($reply_idx));
		$list = $query->fetch();
		$content = $list->content;
		return array('content'=>$content);
	}


	public function update_reply()
    {
		$content = $_POST['content'];
		$reply_idx = $_POST['reply_idx'];
	  	$sql="UPDATE {$this->dbname}_reply SET content = ? WHERE reply_idx = ?";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($content,$reply_idx));
	  	if($query->rowCount()){
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

	public function del_reply()
    {
		$reply_idx = $_POST['reply_idx'];
	  	$sql="DELETE FROM {$this->dbname}_reply WHERE parent_idx = ?";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($reply_idx));
	  	if($query->rowCount()){
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

	public function del_rereply()
    {
		$reply_idx = $_POST['reply_idx'];
	  	$sql="DELETE FROM {$this->dbname}_reply WHERE reply_idx = ?";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($reply_idx));
	  	if($query->rowCount()){
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

}
?>
