<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class singoreplymodel Extends Controlmodel
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
  //
  // public function list_board($page)
  // {
  // $this->offset=($page-1)*$this->limit;
  // $this->sql="SELECT singo_idx,
  // 		 concat(board_idx,'번 게시물') AS title
  //               , board_idx
  //               FROM {$this->dbname}_singo
  // 		WHERE ifreply = 0
  //               ORDER BY singo_idx desc
  // 		limit {$this->limit} offset {$this->offset}";
  // $query=$this->db->prepare($this->sql);
  // $query->execute();
  // $return = new stdClass();
  // $return->list=$query->fetchAll();
  // $return->paging=$this->paging($page);
  // return $return;
  // // -- CASE ifreply WHEN '0' THEN concat(board_idx,'번 게시물') WHEN '1' THEN concat(board_idx,'번 게시물의 댓글') END AS title
  // }

  public function list_reply($page)
  {
  $this->offset=($page-1)*$this->limit;
  $this->sql="SELECT singo_idx, board_idx as board,
                (SELECT content FROM {$this->dbname}_reply AS reply WHERE reply.reply_idx = board) as content
                , kind
                FROM {$this->dbname}_singo AS singo
				JOIN {$this->dbname}_member AS member
				ON singo.member_idx = member.member_idx
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
    $this->sql="SELECT board_idx idx, ifreply reply, singo_idx singo_idx, member.member_name, excuse,
                (SELECT count(*) FROM {$this->dbname}_singo WHERE board_idx = idx AND ifreply = reply) AS count,
                IFNULL((SELECT content FROM {$this->dbname}_reply WHERE reply_idx = idx), '삭제된 댓글입니다') AS content,
                IFNULL((SELECT member_name FROM {$this->dbname}_reply AS replya LEFT JOIN {$this->dbname}_member AS member ON replya.member_idx = member.member_idx WHERE reply_idx = idx),'탈퇴한 회원입니다') AS member
                FROM {$this->dbname}_singo as singo
				JOIN {$this->dbname}_member AS member
				ON singo.member_idx = member.member_idx
                WHERE singo_idx = $idx";
    $query=$this->db->prepare($this->sql);
    $query->execute();
    $return = new stdClass();
    $return->list=$query->fetch();
    return $return->list;
  }

    public function delete($page = null, $idx, $singo_idx)
    {
		$sql="DELETE FROM {$this->dbname}_reply WHERE reply_idx = ?";
		$querya=$this->db->prepare($sql);
		$querya->execute(array($idx));

	  	$sql="DELETE FROM {$this->dbname}_singo WHERE singo_idx = ?";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($singo_idx));

		$sql="DELETE FROM {$this->dbname}_reply WHERE parent_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($idx));
	     if($querya->rowCount()){
	   	 return array('return'=>'success');
	      }else{
	   	 return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
	      }
    }




}
?>
