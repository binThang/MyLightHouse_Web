<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class singomodel Extends Controlmodel
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

  public function list_board($page)
  {
  $this->offset=($page-1)*$this->limit;
  $this->sql="SELECT singo_idx,
				 concat(board_idx,'번 게시물') AS title
                , board_idx
                FROM {$this->dbname}_singo
				WHERE ifreply = 0
                ORDER BY singo_idx desc
  		limit {$this->limit} offset {$this->offset}";
  $query=$this->db->prepare($this->sql);
  $query->execute();
  $return = new stdClass();
  $return->list=$query->fetchAll();
  $return->paging=$this->paging($page);
  return $return;
  // -- CASE ifreply WHEN '0' THEN concat(board_idx,'번 게시물') WHEN '1' THEN concat(board_idx,'번 게시물의 댓글') END AS title
  }

  public function list_reply($page)
  {
  $this->offset=($page-1)*$this->limit;
  $this->sql="SELECT singo_idx,
				 content
                , board_idx
                FROM {$this->dbname}_singo
				WHERE ifreply = 1
                ORDER BY singo_idx desc
  		limit {$this->limit} offset {$this->offset}";
  $query=$this->db->prepare($this->sql);
  $query->execute();
  $return = new stdClass();
  $return->list=$query->fetchAll();
  $return->paging=$this->paging($page);
  return $return;
  // -- CASE ifreply WHEN '0' THEN concat(board_idx,'번 게시물') WHEN '1' THEN concat(board_idx,'번 게시물의 댓글') END AS title
  }

  // public function list($page)
  // {
  //  $this->offset=($page-1)*$this->limit;
  //  echo $this->sql="SELECT singo.board_idx as board, singo.singo_idx,
  //  				(SELECT member_idx FROM {$this->dbname}_board
  // 			WHERE board_idx = board) AS member_idxa,
  // 		(SELECT member_id FROM {$this->dbname}_member
  // 			WHERE member_idx = member_idxa) AS member_id,
  // 		(SELECT count(*) FROM {$this->dbname}_singo
  // 			WHERE board_idx = board) AS con
  // 		FROM {$this->dbname}_singo AS singo
  // 		WHERE singo.ifreply = 0
  // 	   limit {$this->limit} offset {$this->offset}";
  //  $query=$this->db->prepare($this->sql);
  //  $query->execute();
  //  $return = new stdClass();
  //  $return->list=$query->fetchAll();
  //  $return->paging=$this->paging($page);
  //  return $return;
  // }

  public function view($page,$idx)
  {
    $this->sql="SELECT board_idx idx, ifreply reply,
                (SELECT count(*) FROM {$this->dbname}_singo WHERE board_idx = idx AND ifreply = reply) AS count,
                CASE ifreply WHEN '0' THEN
                    (SELECT content FROM {$this->dbname}_board WHERE board_idx = idx)
                 WHEN '1' THEN
                    (SELECT content FROM {$this->dbname}_reply WHERE reply_idx = idx)
                 END AS content,
                 CASE ifreply WHEN '0' THEN
                     (SELECT member_name FROM {$this->dbname}_board AS board JOIN {$this->dbname}_member AS member ON board.member_idx = member.member_idx WHERE board_idx = idx)
                  WHEN '1' THEN
                     (SELECT member_name FROM {$this->dbname}_reply AS replya JOIN {$this->dbname}_member AS member ON replya.member_idx = member.member_idx WHERE reply_idx = idx)
                  END AS member
                FROM {$this->dbname}_singo as singo
                WHERE singo_idx = $idx";
    $query=$this->db->prepare($this->sql);
    $query->execute();
    $return = new stdClass();
    $return->list=$query->fetch();
    return $return->list;
  }




}
?>
