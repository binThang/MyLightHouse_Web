<?php
namespace libs;
use stdClass;

class Modeling
{
	public $dbname=null;
	public $limit=10;
	public $group=10;
	public function __construct()
	{
		$this->dbname=DB_NAME;
		try {
			$this->db;
		} catch (PDOException $e) {
			exit('데이터베이스 연결에 오류가 발생했습니다.');
		}
	}
    public function member_idx($idx)
    {
        $this->member_idx=$idx;
    }
	public function setPaging($limit,$group)
	{
		$this->limit=$limit;
        $this->group=$group;
	}
	public function paging($page)
	{
		$sql=preg_replace("/SELECT([a-zA-Z0-9ㄱ-ㅎ가-힣\_\,\`\' @:\-+=\(\)]|\r|\t|\n|\/)*(FROM|from)/i","SELECT count(*) cnt FROM",$this->sql);
		$sql=preg_replace("/(limit|offset|order by)[a-z0-9\,\.\'\`\_ ]*/i","",$sql);
		$query=$this->db->prepare($sql);
		$query->execute($this->array);
		$total=$query->fetch()->cnt;

		$prev=($page%$this->group)?($page-$page%$this->group):($page-$this->group);
		$next=$prev+$this->group+1;

		return ["idx"=>$total,"end"=>ceil($total/$this->limit),"now"=>$page,"group"=>$this->group,"prev"=>$prev,"next"=>$next];
	}
	public function sms($text,$dup=null)
	{
		if(!$_POST['number']){
			return ['return'=>'fail','type'=>'number'];
		}
		$sql="SELECT date_add(member_sms_date, interval 3 minute) member_sms_date from {$this->dbname}_member where member_phone=?";
		$query=$this->db->prepare($sql);
		$query->execute([$_POST['phone']]);
		$sms_date=$query->fetch()->member_sms_date;
		if(!$dup && $sms_date){
			return ['return'=>'fail','type'=>'dup'];
		}else if ($sms_date && $sms_date > date('Y-m-d H:i:s')){
			return ['return'=>'fail','type'=>'time'];
		}else{
			$sql="UPDATE {$this->dbname}_member set member_sms_date=now() where member_phone=?";
			$query=$this->db->prepare($sql);
			$query->execute([$_POST['phone']]);
		}
	   /******************** 인증정보 ********************/
		$sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
	    $sms['user_id'] = base64_encode("ghsoft3"); //SMS 아이디.
	    $sms['secure'] = base64_encode("f357c9a13165a05206193b4a9c18477a") ;//인증키
		$sms['msg'] = base64_encode($text);
		// if( $_POST['smsType'] == "L"){
		// 	  $sms['subject'] =  base64_encode("안녕?");
		// }
		$sms['rphone'] = base64_encode($_POST['phone']);
		$sms['sphone1'] = base64_encode('070');
		$sms['sphone2'] = base64_encode('4405');
		$sms['sphone3'] = base64_encode('8032');
		$sms['rdate'] = base64_encode($_POST['rdate']);
		$sms['rtime'] = base64_encode($_POST['rtime']);
		$sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
		$sms['returnurl'] = base64_encode($_POST['returnurl']);
		$sms['testflag'] = base64_encode($_POST['testflag']);
		$sms['destination'] = strtr(base64_encode($POST['destination']), '+/=', '-,');
		$returnurl = $_POST['returnurl'];
		$sms['repeatFlag'] = base64_encode($_POST['repeatFlag']);
		$sms['repeatNum'] = base64_encode($_POST['repeatNum']);
		$sms['repeatTime'] = base64_encode($_POST['repeatTime']);
		$sms['smsType'] = base64_encode('S'); // LMS일경우 L
		$nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략

		$host_info = explode("/", $sms_url);
		$host = $host_info[2];
		$path = $host_info[3]."/".$host_info[4];

		srand((double)microtime()*1000000);
		$boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
		// 헤더 생성
		$header = "POST /".$path ." HTTP/1.0\r\n";
		$header .= "Host: ".$host."\r\n";
		$header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";
		// 본문 생성
		foreach($sms AS $index => $value){
			$data .="--$boundary\r\n";
			$data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
			$data .= "\r\n".$value."\r\n";
			$data .="--$boundary\r\n";
		}
		$header .= "Content-length: " . strlen($data) . "\r\n\r\n";
		$fp = fsockopen($host, 80);
		if ($fp) {
			fputs($fp, $header.$data);
			$rsp = '';
			while(!feof($fp)) {
				$rsp .= fgets($fp,8192);
			}
			fclose($fp);
			$msg = explode("\r\n\r\n",trim($rsp));
			$rMsg = explode(",", $msg[1]);
			$Result= $rMsg[0]; //발송결과
			$Count= $rMsg[1]; //잔여건수
			//발송결과 알림
			if($Result=="success") {
				return array("return"=>"success");
			}
			else if($Result=="reserved") {
				$alert = "성공적으로 예약되었습니다.";
				$alert .= " 잔여건수는 ".$Count."건 입니다.";
			}
			else if($Result=="3205") {
				return array("return"=>"error","type"=>"number","count"=>$Count);
			}
			else if($Result=="0044") {
				return array("return"=>"error","type"=>"spam");
			}
			else {
				return array("return"=>"error","type"=>$Result);
			}
		}
		else {
			return array("return"=>"error","type"=>"connect");
		}
	}
	public function push($idx,$value,$type)
	{
		$message=$android=$iphone=[];	

		foreach ($value as $k => $v) {
			$message[$k]=$v;
		}
		if($value['text']){
			$message2 =["body" => $value['text']];
		}
		if($value['type']!='logout'){
			if($type == 'favorite')
				$where=' and member_push3=1 ';
			else if($type == 'reply')
				$where = ' and member_push2=1';
			else if($type == 'fun')
				$where = ' and member_push4 = 1';
			else if($type == 'notice')
				$where = ' and member_push1 = 1';
		}
		$idx=implode(',',$idx);
		$sql="SELECT
				member_token,
				member_device
			from {$this->dbname}_member
			where
				member_idx in ({$idx})
				and member_token is not null {$where}";
		//  and IF(nopushtime1 <= nopushtime2, (nopushtime1 > curtime()) || (nopushtime2 < curtime()), (nopushtime2 < curtime()) && (nopushtime1 > curtime()))		

		$query=$this->db->prepare($sql);
		$query->execute();
		//$query->fetchAll();
		//print_r($query->fetchAll());
		foreach ($query->fetchAll() as $arr) {
			if($arr->member_device){
				$iphone[] = $arr->member_token;
			}else{
				$android[] = $arr->member_token;
			}
		}
		$this->tokenCount($iphone,$message,$message2);
		$this->tokenCount($android,$message);
	}
	private function tokenCount($tokens, $message, $message2 = null){
		if(count($tokens)>1000){
			$tokens=array_chunk($tokens,1000);
			for($i=0;$i<count($tokens);$i++){
				$this->fcmSend($tokens[$i],$message,$message2);
			}
		}else{
			$this->fcmSend($tokens,$message,$message2);
		}
	}
	private function fcmSend($tokens, $message, $message2)
	{ 
		$iphonea = false;
 		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
				'registration_ids' => $tokens,
				'data' => $message,
				'notification' => $message2
			);
			if($message2){
				$keyval = IOS_API_KEY;
				if($message['image']){
					$fields['mutable_content']=true;
				}
			}else{
				$keyval = GOOGLE_API_KEY;
			}
			
			error_log($keyval);
			//echo $keyval;
		$headers = array(
			'Authorization:key =' .$keyval,
			'Content-Type: application/json'
			);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		// print_r($result);
		return $result;
	}
}
?>
