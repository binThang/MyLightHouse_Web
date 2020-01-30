<?php
namespace models\logic\control;
use models\template\controlmodel;
use stdClass;
class Mainmodel Extends Controlmodel
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

	//admin
	public function adminView($idx)
	{
		$sql="SELECT member_idx,member_id,member_type,member_name from {$this->dbname}_member where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		return $query->fetch();
	}
	public function adminList($page)
	{
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT member_idx,member_name,member_id,member_type,member_j_date,member_l_date from {$this->dbname}_member where member_login='admin' order by member_idx desc limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute();
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function adminInsert()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url'){
				if($v){
					$ke='`member_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$value[]='?';
					if($k=='pass'){
						$array[]=password_hash($v,PASSWORD_DEFAULT,['cost'=>12]);
					}else{
						$array[]=$v;
					}
				}
			}
		}
		$sql="INSERT into {$this->dbname}_member (".implode(',',$key).",member_j_date,member_l_date,member_login) values (".implode(',',$value).",now(),now(),'admin')";
		$query=$this->db->prepare($sql);
		$query->execute($array);
		if($query->rowCount()){
			return array('return'=>'success','text'=>"등록 성공");
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}
	public function adminUpdate()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url' && $k!='idx'){
				if($v){
					$ke='`member_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$upload[]=$ke.'=?';
					if($k=='pass'){
						$array[]=password_hash($v,PASSWORD_DEFAULT,['cost'=>12]);
					}else{
						$array[]=$v;
					}
				}
			}
		}
		$sql="UPDATE {$this->dbname}_member set ".implode(',',$upload)." where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute(array_merge($array,[$_POST['idx']]));
		if($query->rowCount()){
			return array('return'=>'success','text'=>"등록 성공");
		}else{
			return array('return'=>'fail','text'=>'등록 실패');
		}
	}
	public function adminDelete($page,$idx)
	{
		$sql="DELETE from {$this->dbname}_member where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail');
		}
	}

	//member
	public function memberList($page)
	{
		$this->offset=($page-1)*$this->limit;
		$array=$where=null;
		if($_SESSION['member']){
			foreach ($_SESSION['member'] as $key => $value) {
				if($value){
					switch ($key) {
						case 'name':
							$where.=" and member_{$key} like ? ";
							$this->array[]='%'.$value.'%';
							break;
						case 'addr':
							$where.=" and (member_addr like1 ? or member_addr2 like ?)";
							$this->array[]='%'.$value.'%';
							$this->array[]='%'.$value.'%';
							break;
						case 'type':
							$order=($value=='han')?' order by member_name asc':' order by member_idx desc';
							$type=($value=='stu')?1:(($value=='tea')?2:null);
							if($type){
								$where.=" and member_type = {$type}";
							}
							break;
					}
				}
			}
		}
        $this->sql="SELECT
					member_idx,
					left(member_j_date,10),
					member_name,
					if(member_type=1,'학생','선생님'),concat(member_addr1,' ',member_addr2),
					member_phone
				from
					{$this->dbname}_member
				where
					member_login!='admin'
					{$where}
				{$order}
				limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute($this->array);
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function memberDelete($page,$idx)
	{
		$sql="DELETE from {$this->dbname}_member where member_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail');
		}
	}
	public function memberView($idx)
	{
		$sql="SELECT
				member_idx,
				member_email,
				member_j_date,
				member_phone,
				member_name,
				member_type,
				member_gender,
				member_addr1,
				member_addr2,
				member_stu_info,
				member_stu_school_name,
				member_stu_grade,
				member_stu_level,
				member_stu_want_info,
				member_stu_want_tea,
				member_stu_want_subject1,
				member_stu_memo
			from {$this->dbname}_member
			where member_idx=? and member_type=1";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		$result=$query->fetch();
		if($result->member_idx){
			return ['data'=>$result];
		}else{
			$sql="SELECT
					member_idx,
					member_email,
					member_j_date,
					member_phone,
					member_name,
					member_type,
					member_gender,
					member_addr1,
					member_addr2,
					member_tea_end_highschool,
					member_tea_end_university,
					member_tea_subject,
					member_tea_want_stu,
					member_tea_cert
				from {$this->dbname}_member
				where member_idx=? and member_type=2";
			$query=$this->db->prepare($sql);
			$query->execute([$idx]);
			$data=$query->fetch();
			$sql="SELECT
					study_idx,
					study_title
				from {$this->dbname}_study
				where member_idx=? ";
			$query=$this->db->prepare($sql);
			$query->execute([$idx]);
			$list=$query->fetchAll();
			return ['data'=>$data,'list'=>$list];
		}
	}

//recommend
	public function recomList($page)
	{
		$where=null;
		if($_SESSION['recom']){
			foreach ($_SESSION['recom'] as $key => $value) {
				if($value){
					switch ($key) {
						case 'text':
							$where.=" and (member_name like ? or member_tea_nick like ?) ";
							$this->array[]='%'.$value.'%';
							$this->array[]='%'.$value.'%';
							break;
					}
				}
			}
		}
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT
				member_idx,
				member_tea_nick,
				member_name,
				if(cnt,cnt,0) cnt
			from
				{$this->dbname}_member
			left join
				(SELECT count(*) cnt,member_tea_recom from {$this->dbname}_member group by member_tea_recom) cnt on cnt.member_tea_recom=member_tea_nick
			where member_type=2
				{$where}
			order by cnt desc
			limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute($this->array);
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function recomDetail($page,$nick)
	{
		$this->offset=($page-1)*$this->limit;
		$this->array=[$nick];
        $this->sql="SELECT
				member_idx,
				member_tea_nick,
				member_name
			from
				{$this->dbname}_member
			where member_tea_recom=? and member_type=2
			order by member_j_date desc
			limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute($this->array);
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function recomView($idx)
	{
		$sql="SELECT
				member_tea_nick,
				member_name
			from
				{$this->dbname}_member
			where member_idx=?";
        $query=$this->db->prepare($sql);
        $query->execute([$idx]);
		return $query->fetch();
	}

	//cert
	public function certList($page)
	{
		$where=null;
		if($_SESSION['cert']){
			foreach ($_SESSION['cert'] as $key => $value) {
				if($value){
					switch ($key) {
						case 'text':
							$where.=" and (member_name like ? or member_tea_nick like ?) ";
							$this->array[]='%'.$value.'%';
							$this->array[]='%'.$value.'%';
							break;
					}
				}
			}
		}
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT
				member_idx,
				member_j_date,
				member_tea_nick,
				member_name
			from
				{$this->dbname}_member
			join
				{$this->dbname}_profile using(member_idx)
			where member_type=2
				and member_tea_cert !=''
				and profile_iscert =0
				{$where}
			order by member_j_date desc
			limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute($this->array);
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	//reply
	public function repList($page)
	{
		$where=null;
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT
				singo_idx,
				singo_date,
				-- if(singo_type='jisik','지식',if(reply_type='member','후기')),
				if(reply_type='member','후기','지식인'),
				reply_content
			from
				{$this->dbname}_singo
			-- left join
			-- 	{$this->dbname}_jisik on singo_type='jisik' and singo_target=jisik_idx
			join
				{$this->dbname}_reply on singo_type='reply' and singo_target=reply_idx
			where
				reply_type in ('jisik','reply')
			order by singo_idx desc
			limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute($this->array);
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function repDelete($page,$idx)
	{
		$sql="DELETE from {$this->dbname}_reply where reply_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail');
		}
	}
	//faq
	public function faqList($page)
	{
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT
				faq_idx,
				faq_title
			from {$this->dbname}_faq
			order by faq_idx desc
			limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute();
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function faqInsert()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url'){
				if($v){
					$ke='`faq_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$value[]='?';
					$array[]=$v;
				}
			}
		}
		$sql="INSERT into {$this->dbname}_faq (".implode(',',$key).",faq_w_date,faq_r_date) values (".implode(',',$value).",now(),now())";
		$query=$this->db->prepare($sql);
		$query->execute($array);
		if($query->rowCount()){
			return array('return'=>'success','text'=>"등록 성공");
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}
	public function faqDelete($page,$idx)
	{
		$sql="DELETE from {$this->dbname}_faq where faq_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail');
		}
	}
	public function faqUpdate()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url' && $k!='idx'){
				if($v){
					$ke='`faq_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$upload[]=$ke.'=?';
					$array[]=$v;
				}
			}
		}
		$upload=implode(',',$upload);
		$sql="UPDATE {$this->dbname}_faq set {$upload} where faq_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute(array_merge($array,[$_POST['idx']]));
		if($query->rowCount()){
			return array('return'=>'success','text'=>"수정 성공");
		}else{
			return array('return'=>'fail','text'=>'수정 실패');
		}
	}
	public function faqView($idx)
	{
		$sql="SELECT faq_idx,faq_title,faq_content,faq_image from {$this->dbname}_faq where faq_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		return ['data'=>$query->fetch()];
	}
	//board
	public function boardList($page)
	{
		$where=" board_type = 1";
		if($_SESSION['board']){
			foreach ($_SESSION['board'] as $key => $value) {
				if($value){
					switch ($key) {
						case 'type':
							$type=($value=='1')?1:2;
							if($type){
								$where=" board_type = {$type}";
							}
							break;
					}
				}
			}
		}
		$this->offset=($page-1)*$this->limit;
        $this->sql="SELECT
				board_idx,
				if(board_type=1,
					concat(board_year,'년 / ',board_school,' / ',
						case
							when board_kind=1
							then '1학기 중간'
							when board_kind=2
							then '1학기 기말'
							when board_kind=3
							then '2학기 중간'
							when board_kind=4
							then '2학기 기말'
						end
					,' / ',
						case
							when board_subject=1
							then '국어'
							when board_subject=2
							then '영어'
							when board_subject=3
							then '수학'
							when board_subject=4
							then '사회'
							when board_subject=5
							then '과학'
							when board_subject=6
							then '제2외국어 및 회화'
							when board_subject=7
							then '논술'
							when board_subject=8
							then '영어회화 및 수험영어'
							when board_subject=9
							then '중국어회화 및 수험중국어'
							when board_subject=10
							then '예체능 및 기타'
						end
						),
					board_title
				),
				board_w_date
			from
				{$this->dbname}_board
			where
				{$where}
			order by board_idx desc
			limit $this->limit offset $this->offset";
        $query=$this->db->prepare($this->sql);
        $query->execute($this->array);
        $return = new stdClass();
        $return->list=$query->fetchAll();
        $return->paging=$this->paging($page);
        return $return;
	}
	public function boardInsert()
	{
		foreach ($_POST as $k => $v) {
			if($k!='url'){
				if($v){
					$ke='`board_'.preg_replace('/[\`\'\";#,]/','',$k).'`';
					$key[]=$ke;
					$value[]='?';
					if($k=='image'){
						$v=preg_replace("/(\/public\/uploads\/web\/image\/)/",'',$v);
					}
					$array[]=$v;
				}
			}
		}
		$sql="INSERT into {$this->dbname}_board (".implode(',',$key).",board_w_date,board_r_date) values (".implode(',',$value).",now(),now())";
		$query=$this->db->prepare($sql);
		$query->execute($array);
		if($query->rowCount()){
			return array('return'=>'success','text'=>"등록 성공");
		}else{
			return array('return'=>'fail','text'=>'등록 실패',$sql,$array);
		}
	}
	public function boardDelete($page,$idx)
	{
		$sql="DELETE from {$this->dbname}_board where board_idx=?";
		$query=$this->db->prepare($sql);
		$query->execute([$idx]);
		if($query->rowCount()){
			return array('return'=>'success');
		}else{
			return array('return'=>'fail');
		}
	}
}
?>
