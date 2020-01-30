<?php
namespace libs;
use PDO;
use stdClass;
class Controller
{
	public $type = null;
	function __construct()
	{
		$this->typeSet();
		$this->dbConnect();
	}
	public function typeSet()
	{
		global $project,$class,$method;
		$this->type = new stdClass;
		$this->type->project = $project;
		$this->type->class = $class;
		$this->type->method = $method;
	}
	private function dbConnect()
	{
		$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT);
		$this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS, $options);
		$this->db -> exec('SET NAMES utf8mb4');
	}
	public function loadModel($model_name, $type = 'logic')
	{
		switch ($type) {
			case 'template' :
				$dir = '\\models\\'.$type.'\\'.$model_name;
			break;
			case 'exception' :
				$dir = '\\models\\logic\\index\\'.$model_name;
			break;
			default :
				$dir = '\\models\\'.$type.'\\'.$this->type->project.'\\'.$model_name;
			break;
		}
		return new $dir($this->db);
	}
	public function initList($thead,$href,$caption='게시판',$viewlink=null,$editlink=null){
		$this->caption=$caption;
		$this->thead=$thead;
		$this->content=$this->content($href,$this->page,$caption,$viewlink,$editlink);
		$this->pagination=$this->paging($href);
	}
	private function content($href,$page,$caption,$viewlink,$editlink){
		$thead=$this->thead;
		$total=0;
		$cnt=0;
		for($i=0;$i<count($thead);$i++){
			$title=preg_replace('/[0-9]*/','',$thead[$i]);
			switch ($title) {
				case '관리':
					$width='160';
					break;
				case '순번':
					$width='80';
					break;
				case '작성일':case '로그인':case '생성일':
					$width='120';
					break;
				case '삭제':
					$width='120';
					break;
				default:
					$width=null;
					$cnt++;
					break;
			}
			$colwidth=($width)?$width.'px':null;
			$col.='<col width="'.$colwidth.'">';
			$th.='<th scope="col">'.$title.'</th>';
			$total+=$width;
		}
		$this->total=$total+$cnt*100;
		$return='<table class="list-table" style="min-width:'.$this->total.'px"><caption class="blind">'.$caption.'</caption><colgroup>';
		$return.=$col.'</colgroup><thead>'.$th.'</thead><tbody>';
		$cnt=0;
		if(!$viewlink){
			$viewlink=$href.'/view';
		}
		if(!$editlink){
			$editlink=$href.'/edit';
		}
		if($this->list->list){
			foreach ($this->list->list as $arr) {
				$arr2=null;
				foreach ($arr as $value) {
					$arr2[]=$value;
				}
				$link='/'.$page.'/'.$arr2[0];
				$view='<button href="'.$viewlink.$link.'" class="view">보기</button>';
				$edit='<button href="'.$editlink.$link.'" class="view">수정</button>';
				$del='<button href="'.$href.'/delete'.$link.'" class="delete">삭제</button>';
				$return.='<tr>';
				for($i=0;$i<count($arr2)+1;$i++){
					$class='center';
					$td=true;
					switch($thead[$i]){
						case '제목':
							// $class='left';
							$value='<a href="'.$viewlink.$link.'" class="ajax">'.$arr2[$i].'</a>';
							break;
						case ' 푸시 제목':
							// $class='left';
							$value='<a>'.$arr2[$i].'</a>';
							break;
						case '순번':
							$value=$this->list->paging['idx']-$cnt-$this->list->paging['group']*($this->list->paging['now']-1);
							break;
						case '순위':
							$value=$cnt+1+$this->list->paging['group']*($this->list->paging['now']-1);
							break;
						case '관리1':
							$value='<div class="btn-etc">'.$view.'</div>';
							break;
						case '관리2':
							$value='<div class="btn-etc">'.$del.'</div>';
							break;
						case '관리3':
							$value='<div class="btn-etc">'.$view.$del.'</div>';
							break;
						case '관리4':
							$value='<div class="btn-etc">'.$edit.'</div>';
							break;
						case '관리5':
							$value='<div class="btn-etc">'.$view.$del.'</div>';
							break;
						case '관리6':
							$value='<div class="btn-etc">'.$edit.$del.'</div>';
							break;
						case '관리7':
							$value='<div class="btn-etc">'.$view.$edit.$del.'</div>';
							break;
						case '답변1':
							$value='<div class="btn-etc"><button class = "qnareply"><a href = "'.$viewlink.$link.'" class = "ajax">답변</a></button>'.$del.'</div>';
							break;
						case '작성일':case '로그인':case '생성일':
							$value=str_replace(' ','<br>',$arr2[$i]);
							break;
						case '변경':
						 	$value = '<div class="btn-etc"><button class = "tony" data-idx = '.$arr2[0].'>등급 변경</button><button class = "member_del" data-idx = '.$arr2[0].'>삭제</button></div>';
							break;
						case '수정':
						 	$value = '<div class="btn-etc"><button class = "tonya" data-idx = '.$arr2[0].'>등급 변경</button><button class = "member_dela" data-idx = '.$arr2[0].'>삭제</button></div>';
							break;
						case '삭제1':
						 	$value='<div class="btn-etc"><button href="'.$href.'/delete/'.$page.'/'.$arr2[2].'/'.$arr2[0].'" class="delete">삭제</button></div>';
							break;
						case '삭제2':
						 	$value='<div class="btn-etc"><button href="'.$href.'/delete/'.$page.'/'.$arr2[1].'/'.$arr2[0].'" class="delete">삭제</button></div>';
							break;
						case '게시물':
							// $class='left';
							$value='<a href="'.$href.'/view/'.$page.'/'.$arr2[2].'" class="ajax">'.$arr2[$i].'</a>';
							break;
						case null:
							$td=false;
							break;
						default:
							$value=$arr2[$i];
							break;
					}
					if($td){
						$return.='<td class="'.$class.' middle" scope="row">'.$value.'</td>';
					}
				}
				$return.='</tr>';
				$cnt++;
			}
		}
        $return.='</tbody></table>';
	    return $return;
	}
	private function paging($href){
		if($this->list->paging){
			foreach ($this->list->paging as $key => $value) {
				$$key=$value;
			}
		}
		if($end){
		    $return='<div id="paging" style="min-width:'.$this->total.'px" class="btn-page center" href="'.$href.'/list/">';
		    $return.='<button type="button" data-value="1" class="paging btn-prev1"><img src="/public/template/web/img/btn_left2.png" alt="맨처음 페이지"></button>';
		    $class=($prev<1)?' no':'';
		    $return.='<button type="button" data-value="'.$prev.'" class="paging btn-prev2'.$class.'"><img src="/public/template/web/img/btn_left1.png" alt="이전 페이지"></button>';
	        for($i=1;$i<$group+1;$i++){
	            $page=$prev+$i;
	            $class=($page==$now)?' on':'';
	            $return.='<button type="button" data-value="'.$page.'" class="paging btn-num'.$class.'">'.$page.'</button>';
	            if($page==$end){
	                break;
	            }
	        }
		    $class=($next>$end)?' no':'';
		    $return.='<button type="button" data-value="'.$next.'" class="paging btn-next2'.$class.'"><img src="/public/template/web/img/btn_right1.png" alt="다음으로 페이지"></button>';
		    $return.='<button type="button" data-value="'.$end.'" class="paging btn-next1"><img src="/public/template/web/img/btn_right2.png" alt="맨마지막 페이지로 이동하는 버튼"></button></div>';
		    return $return;
		}
	}
	public function error($type){
		include $_SERVER['DOCUMENT_ROOT'].'/'.VIEW."template/index/{$type}.php";
	}
}
?>
