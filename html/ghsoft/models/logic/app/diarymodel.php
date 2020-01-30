<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class diarymodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
	public function boardList($idx, $page = 1)
	{
		$offset=($page-1)*5;
		switch($idx){
			case 1 :
		$sql="SELECT * FROM
				(SELECT
					board.board_idx as board_idx, image as img, 'NULL' as video, board.wdate as wdate, board.color, board.content, board.tony as kind, favorite.wdate favoritedate, hashtag, category.category,
					(
						SELECT count(*)
						FROM {$this->dbname}_favorite AS favorite
						WHERE favorite.board_idx = board.board_idx
						AND member_idx = $this->member_idx and favorite.kind = 1 and ifreply = 0) AS con,
					(SELECT count(*)
					 FROM {$this->dbname}_favorite AS favorite
					 WHERE board_idx = board.board_idx
					 and favorite.kind = 1 and ifreply = 0) AS allcount,
					(SELECT count(*)
					 FROM {$this->dbname}_reply
				 	 WHERE favorite.kind = 1 AND board_idx = board.board_idx) AS replycon
				FROM {$this->dbname}_board AS board
				JOIN {$this->dbname}_gallery AS gallery
				ON board.backimg = gallery.gallery_idx
				JOIN {$this->dbname}_favorite AS favorite
				ON favorite.board_idx = board.board_idx
				JOIN {$this->dbname}_category AS category
				ON category.category_idx = board.category
				WHERE favorite.board_idx = board.board_idx and favorite.member_idx = $this->member_idx and favorite.kind = 1 and ifreply = 0
				UNION
				SELECT
					 funboard.funboard_idx as board_idx, funboard.images as img, video as video, rdate as wdate, favorite.kind as kind, 'a' a, 'a' a, favorite.wdate favoritedate, 'a' a, 'a' a,
					(
						SELECT count(*)
						FROM {$this->dbname}_favorite AS favorite
						WHERE favorite.board_idx = funboard.funboard_idx
						AND member_idx = $this->member_idx and kind = 3 and ifreply = 0) AS con,
					(SELECT count(*)
					 FROM {$this->dbname}_favorite AS favorite
					 WHERE board_idx = funboard.funboard_idx
					 and kind = 3 and ifreply = 0) AS allcount,
					(SELECT count(*)
					 FROM {$this->dbname}_reply
				 	 WHERE kind = 3 AND board_idx = funboard.funboard_idx) AS replycon
				FROM {$this->dbname}_funboard AS funboard
				JOIN {$this->dbname}_favorite AS favorite
				ON favorite.board_idx = funboard.funboard_idx
				WHERE favorite.board_idx = funboard.funboard_idx and favorite.member_idx = $this->member_idx and favorite.kind = 3 and ifreply = 0) as a
				ORDER BY a.favoritedate DESC
				LIMIT 5 OFFSET $offset";
				break;
			case 2 :
				$sql = "SELECT
					board.board_idx as board_idx, image as img, board.wdate as wdate, board.color, board.content, board.tony as kind, category.category, hashtag,
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
				ON category.category_idx = board.category
				WHERE board.member_idx = $this->member_idx
				ORDER BY board.board_idx DESC
				LIMIT 5 OFFSET $offset";
				break;
			case 3 :
				$offset=($page-1)*20;
				$sql = "SELECT (CASE favorite WHEN '1' THEN '내 글에 공감이 추가되었습니다' ELSE '내 글에 댓글이 등록되었습니다'END) AS title, tony, favorite,  alert.board_idx, ifread, alert_idx, alert.wdate FROM {$this->dbname}_alert AS alert
				JOIN {$this->dbname}_board AS board
				ON board.board_idx = alert.board_idx WHERE board.member_idx = $this->member_idx
				ORDER BY alert_idx DESC
				LIMIT 20 OFFSET $offset";
				break;
		}

		$query=$this->db->prepare($sql);
		$query->execute(array($this->member_idx));
		$list = $query->fetchAll();
		$sql=preg_replace("/(limit|offset)[a-z0-9\,\.\'\`\_ ]*/i","",$sql);
		$query = $this->db->prepare($sql);
		$query->execute();
		$resulta = $query->fetchAll();
		foreach($resulta as $row){
			$board_idx[] = $row->board_idx;
		}
		$_SESSION['idx'] = $board_idx;
		return $list;
	}
	public function read()
	{
		$board_idx = $_POST['board_idx'];
		$sql="UPDATE {$this->dbname}_alert SET ifread = 1 WHERE alert_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($board_idx));
	}

}
?>
