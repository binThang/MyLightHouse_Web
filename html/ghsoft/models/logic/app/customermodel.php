<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class customermodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}

    public function select_notice()
    {
        $sql="SELECT title, content, wdate from {$this->dbname}_notice
		ORDER BY notice_idx DESC";
        $query=$this->db->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
		return $list;
    }

	  public function mail()
	  {
	    $email = $_POST['email'];
	    $content = $_POST['content'];
		$member_idx = $_POST['member_idx'];
	    $sql = "insert into lighthouse_qna (email, content, member_idx) values (?,?,?)";
	    $query = $this->db->prepare($sql);
	    $query->execute(array($email,$content,$member_idx));
	    if($query->rowCount()){
			$content = str_replace(PHP_EOL, ("<br />".PHP_EOL), $content);
	        $headers = 'MIME-Version: 1.0'."\r\n";
	        $headers .= 'From:'.$email."\r\n";
	        $headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";
	        $result=mail('lighthouse4us@naver.com', '=?UTF-8?B?'.base64_encode('내 등에 기대 문의 및 제안 입니다').'?=',$content, $headers);
			return array('return'=>'success');
	    }
	    else{
	      return array('result'=>'false');
	    }

	  }

      public function select_heppeople()
      {
	    $sql="SELECT image from {$this->dbname}_images WHERE kind = 1";
	    $query=$this->db->prepare($sql);
	    $query->execute();
	    $list = $query->fetch();
		$img = $list->image;
  		return array('img'=>$img);
      }

    public function select_close()
    {
  	    $sql="SELECT image from {$this->dbname}_images WHERE kind = 2";
  	    $query=$this->db->prepare($sql);
  	    $query->execute();
  	    $list = $query->fetch();
  		$img = $list->image;

		return array('img'=>$img);
    }
    public function give_me_book()
    {
        $member_idx = $_POST['member_idx'];
        $address = $_POST['address'];
        $tony_name = $_POST['tony_name'];
	
	$sql_tony = "SELECT member_idx, member_type from {$this->dbname}_member where member_name = '{$tony_name}'"; 
	$query=$this->db->prepare($sql_tony);
	$query->execute();
	$tony_list = $query->fetch();
	$tony_idx = '';	

	if ($tony_list->member_type != 8 || $tony_list == NULL )
		return array('return'=>'failed', 'error'=>"토니의 이름을 한번 더 확인해주세요!");
	else
		$tony_idx = $tony_list->member_idx;

        $sql = "insert into {$this->dbname}_book (book_name, member_idx, tony_idx, address, status) values (NULL, ?, ?, ?, 0)";
	$query = $this->db->prepare($sql);
	$result = $query->execute(array($member_idx, $tony_idx, $address));	

	return array('return'=>'success', 'error'=>$result);
    }
}
?>
