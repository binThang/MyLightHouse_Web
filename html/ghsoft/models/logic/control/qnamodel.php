<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class Qnamodel Extends Controlmodel
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


    public function list($page)
    {
      $this->offset=($page-1)*$this->limit;
      $this->sql="SELECT qna_idx as a, content,
                    IF(ifread=0, '대기', '답변완료')
                    FROM lighthouse_qna
					WHERE ifreply = 0
                  order by qna_idx desc
                  limit {$this->limit} offset {$this->offset}";
      $query=$this->db->prepare($this->sql);
      $query->execute();
      $return = new stdClass();
      $return->list=$query->fetchAll();
      $return->paging=$this->paging($page);
      return $return;
    }

    public function view($page, $idx)
    {
      $this->sql="SELECT qna_idx, content, email, member_id, qna.member_idx, ifread as readidx, IF(ifread=0, 0, (SELECT content FROM {$this->dbname}_qna WHERE qna_idx = readidx)) as ifread FROM {$this->dbname}_qna AS qna
	  JOIN {$this->dbname}_member AS member
	  ON member.member_idx = qna.member_idx WHERE qna_idx = ?";
      $query=$this->db->prepare($this->sql);
      $query->execute(array($idx));
      $return = new stdClass();
      $return->list=$query->fetch();
      return $return->list;
    }

	public function reply_qna()
    {
		$content = $_POST['content'];
		$qnaidx = $_POST['qna_idx'];
		$email = $_POST['email'];
	  	$sql="INSERT into {$this->dbname}_qna (content, ifreply) values (?,?)";
	  	$query=$this->db->prepare($sql);
	  	$query->execute(array($content,1));

		$sql="UPDATE {$this->dbname}_qna SET ifread = (select last_insert_id()) WHERE qna_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($qnaidx));
	  	if($query->rowCount()){
			$content = str_replace(PHP_EOL, ("<br />".PHP_EOL), $content);
	        $headers = 'MIME-Version: 1.0'."\r\n";
	        $headers .= 'From:'.'lighthouse4us@naver.com'."\r\n";
	        $headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";
	        $result=mail($email, '=?UTF-8?B?'.base64_encode('내 등에 기대 문의 및 제안 답변 입니다').'?=',$content, $headers);
	  		return array('result'=>'true');
	  	}else{
	  		return array('result'=>'false',$array);
	  	}
    }

    public function del_qna($page = null, $idx)
    {
      $sql="DELETE FROM {$this->dbname}_qna WHERE qna_idx = ?";
      $query=$this->db->prepare($sql);
      $query->execute(array($idx));
      if($query->rowCount()){
          return array('return'=>'success','text'=>'등록되었습니다');
      }else{
          return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
      }
    }


}
?>
