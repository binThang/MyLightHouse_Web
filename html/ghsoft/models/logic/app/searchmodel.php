<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class searchmodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
	public function categoryMain($idx, $page = 1)
	{
		// $_POST['word']= '성적';
		$a = $_POST['word'];
		if($_POST['word']){
			$like = " AND (content like '%$a%'  OR (hashtag like '%$a%'))";
			 $word = ", '$a' AS word";
		}
		$sql="SELECT
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 1 AND ifshow = 1 $like) AS friend,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 2  AND ifshow = 1 $like) AS family,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 3 AND ifshow = 1 $like) AS visual,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 4 AND ifshow = 1 $like) AS school,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 5 AND ifshow = 1 $like) AS study,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 6  AND ifshow = 1 $like) AS charactera,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 7 AND ifshow = 1 $like) AS gender,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 8 AND ifshow = 1 $like) AS dream,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 9 AND ifshow = 1 $like) AS emotion,
			(SELECT count(*) FROM {$this->dbname}_board WHERE category = 10 AND ifshow = 1 $like) AS ect
			$word
			FROM {$this->dbname}_board";
		$query=$this->db->prepare($sql);
		$query->execute();
		$count = $query->fetch();
		return $count;
	}
	public function category_list($idx, $word, $page = 1)
	{
		if($word != 'null'){
			$like = "  AND (content like '%$word%'  OR (hashtag like '%$word%'))";
		}
		$offset=($page-1)*10;
		$sql="SELECT
				board_idx, member_idx, image, wdate,content, board.color, category.category, hashtag,
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
			WHERE board.category = ? AND ifshow = 1 $like
			ORDER BY board.board_idx DESC limit 10 offset $offset";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx));
		$list = $query->fetchAll();
		return $list;
	}

}
?>
