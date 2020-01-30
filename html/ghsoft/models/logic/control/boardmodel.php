<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class boardmodel Extends Controlmodel
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
    public function insert_category()
    {
        $category = $_POST['category'];
        $sql="INSERT into {$this->dbname}_category (category) values (?)";
        $query=$this->db->prepare($sql);
        $query->execute(array($category));
        if($query->rowCount()){
            return array('return'=>'success');
        }else{
            return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
        }
    }
    public function select_category()
    {
        $sql="SELECT category_idx, category from {$this->dbname}_category";
        $query=$this->db->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        return $list;
    }

	public function insert_hashtag()
	{
		$category = $_POST['category'];
		$hashtag = $_POST['hashtag'];
		$sql="INSERT into {$this->dbname}_hashtag (category, hashtag) values (?,?)";
		$query=$this->db->prepare($sql);
		$query->execute(array($category,$hashtag));
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}

	public function list($page)
	{
		$this->offset=($page-1)*$this->limit;
		$this->sql="SELECT funboard_idx, '번째 게시물' title FROM lighthouse_funboard
		order by funboard_idx desc
		limit {$this->limit} offset {$this->offset}";
		$query=$this->db->prepare($this->sql);
		$query->execute();
		$return = new stdClass();
		$return->list=$query->fetchAll();
		$return->paging=$this->paging($page);
		return $return;
	}

	public function insert_backimg()
	{
		$images = $_POST['img'];
		if(is_array($images)){
			$images = implode(',',$_POST['img']);
		}
		$sql="INSERT into {$this->dbname}_gallery(image) values (?)";
		$query=$this->db->prepare($sql);
		$query->execute(array($images));
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}

	public function backimg_list()
	{
		$this->sql="SELECT gallery_idx, image FROM {$this->dbname}_gallery";
		$query=$this->db->prepare($this->sql);
		$query->execute();
		$return = new stdClass();
		$return->list=$query->fetchAll();
		return $return;
	}


	public function show_hashtag()
	{
		$category = $_POST['idx'];
		$this->sql="SELECT hashtag_idx, hashtag FROM {$this->dbname}_hashtag WHERE category = ?";
		$query=$this->db->prepare($this->sql);
		$query->execute(array($category));
		$return = new stdClass();
		$return->list=$query->fetchAll();
		// $return=$query->fetchAll();
		foreach($return->list as $row){
			$hashtag_idx[] = $row->hashtag_idx;
			$hashtag[] = $row->hashtag;
		}
		return array('hashtag_idx'=>$hashtag_idx,'hashtag'=>$hashtag);
	}

	public function del_hashtag()
	{
		$hashtag_idx = $_POST['hashtag_idx'];
		$sql="DELETE FROM {$this->dbname}_hashtag WHERE hashtag_idx = ?";
		$query=$this->db->prepare($sql);
		$query->execute(array($hashtag_idx));
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}


}
?>
