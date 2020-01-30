<?php
function unh($string)
{
	$string = preg_replace( ['/&amp;/','/&#039;/','/&quot;/','/&lt;/','/&gt;/'],['&','\'','"','<','>'], $string );
	return $string;
}
function replace_data($args)
{
	foreach ($args as $key => $value) {
		if (is_array($args[$key])) {
			$data[$key] = replace_data($value);
		} else {
			$data[$key] = htmlspecialchars($value);
		}
	}
	if (isset($data)) {
		return $data;
	}
}

function JSON($value)
{
	header('Content-Type: application/json');
	header('Content-Type: text/html; charset=utf-8');
	echo json_encode($value,JSON_UNESCAPED_UNICODE);
}
function upload($type,$target=false)
{
	$array=[];
	if(count($_FILES)){
		switch ($type) {
			case 'image':
			if(!$_POST['x'] && !$_POST['y']){
				$over=false;
				$_POST['x']=600;
			}else{
				$over=true;
			}
			$target_dir = "/public/uploads/web/".$type."/";
			foreach ($_FILES as $k=>$v) {
				if(gettype($v['tmp_name'])!='array'){
					if($filename=uploadImage($v['tmp_name'],$target_dir,$over)){
						$$k[]=$filename;
						$array[]=$filename;
					}
				}else{
					for ($i=0;$i<count($v['tmp_name']);$i++) {
						if($filename=uploadImage($v['tmp_name'][$i],$target_dir,$over)){
							$$k[]=$filename;
							$array[]=$filename;
						}
					}
				}
				if($$k){
					$_POST[$k]=$$k;
				}
			}
			break;
			default:
			break;
		}
	}
	if(count($array)){
		if($target){
			return true;
		}
		return array('result'=>'success','url'=>$array,'path_web'=>'http://'.URL.$target_dir,'path_mobile'=>'http://'.URL.preg_replace('/\/uploads\/(web)\/image/i','/uploads/mobile/image',$target_dir));
	}else{
		if($target){
			return false;
		}
		return array('result'=>'false');
	}
}
function uploadImage($tmp_name,$target_dir,$over){
	if($tmp_name){
		$o_info=getimagesize($tmp_name);
		$mime=explode('/',$o_info['mime']);
		if($mime[0]=='image'){
			$filename=md5_file($tmp_name).".png";
			$target_file=$target_dir.$filename;
			if(move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'].$target_file)){
				resizing($target_dir.$filename,$_POST['x'],$_POST['y'],$over);
			}
		}
		return $filename;
	}
	return false;
}
function resizing($file,$x,$y=null,$over=false)
{
	ini_set('memory_limit',-1);
	$file=$_SERVER['DOCUMENT_ROOT'].$file;
	if($over){
		$resize_file=$file;
		$mobile_file=preg_replace('/\/uploads\/(web)\/image/i','/uploads/mobile/image',$file);
	}else{
		$resize_file=preg_replace('/\/uploads\/(web)\/image/i','/uploads/mobile/image',$file);
	}
	$o_info=getimagesize($file);
	$mime=explode('/',$o_info['mime']);
	switch($mime[1]){
		case 'gif':
			$o_img=imagecreatefromgif($file);
			break;
		case 'jpeg':case 'jpg':
			$o_img=imagecreatefromjpeg($file);
			$exif=@exif_read_data($file);
			if(!empty($exif['Orientation'])) {
				switch($exif['Orientation']) {
					case 8:
						$o_img=imagerotate($o_img,90,0);
						$temp=$o_info[0];
						$o_info[0]=$o_info[1];
						$o_info[1]=$temp;
						break;
					case 3:
						$o_img=imagerotate($o_img,180,0);
						break;
					case 6:
						$o_img=imagerotate($o_img,-90,0);
						$temp=$o_info[0];
						$o_info[0]=$o_info[1];
						$o_info[1]=$temp;
						break;
				}
			}
			break;
		case 'bmp':case 'wbmp':
			$o_img=imagecreatefromwbmp($file);
			break;
		case 'png':
			$o_img=imagecreatefrompng($file);
			break;
		default:
			return false;
			break;
	}

	if($o_img){
		$o_x=$o_info[0];
		$o_y=$o_info[1];
		if(!$y){
			$y=$o_y*($x/$o_x);
		}
		if(!($x>=$o_x&&$y>=$o_y)){
			$n_img=imagecreatetruecolor($x,$y);
			imagealphablending($n_img, false);
			imagesavealpha($n_img, true);
			$transparent = imagecolorallocatealpha($n_img, 255, 255, 255, 127);
			imagefilledrectangle($n_img, 0, 0, $x, $y, $transparent);
			imagecopyresampled($n_img,$o_img,0,0,0,0,$x,$y,$o_x,$o_y);
			imageinterlace($n_img);
			imagepng($o_img,$file);
			imagepng($n_img,$resize_file);
			imagedestroy($n_img);
			imagedestroy($o_img);
		}else{
			imagepng($o_img,$file);
			copy($file,$resize_file);
		}
		if($over){
			copy($resize_file,$mobile_file);
		}
	}
}
function sms($text){
	/******************** 인증정보 ********************/
	$sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
	$sms=[
		'user_id'=>base64_encode(SMSID),
		'secure'=>base64_encode(SMSCERT),
		'msg'=>base64_encode($text),
		'rphone'=>base64_encode($_POST['phone']),
		'sphone1'=>base64_encode(PHONE1),
		'sphone2'=>base64_encode(PHONE2),
		'sphone3'=>base64_encode(PHONE3),
		'mode'=>base64_encode("1"),
		'smsType'=>base64_encode("S"),
		//필수
		'rdate'=>base64_encode($_POST['rdate']),
		'rtime'=>base64_encode($_POST['rtime']),
		'returnurl'=>base64_encode($_POST['returnurl']),
		'testflag'=>base64_encode($_POST['testflag']),
		'rdate'=>base64_encode($_POST['rdate']),
		'destination'=> strtr(base64_encode($POST['destination']), '+/=', '-,'),
		'repeatFlag'=>base64_encode($_POST['repeatFlag']),
		'repeatNum'=>base64_encode($_POST['repeatNum']),
		'repeatTime'=>base64_encode($_POST['repeatTime'])
	];
	if( $_POST['smsType'] == "L"){
		  $sms['subject'] =  base64_encode("안녕?");
	}
	$returnurl = $_POST['returnurl'];
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
		// echo $Result;
		switch ($Result) {
			case 'success':
				return ["return"=>"success","phone"=>$_POST['number']];
				break;
			case 'reserved':
				$alert = "성공적으로 예약되었습니다.";
				$alert .= " 잔여건수는 ".$Count."건 입니다.";
				break;
			case '3205':
				return ["return"=>"error","type"=>"number","count"=>$Count];
				break;
			case '0044':
				return ["return"=>"error","type"=>"spam"];
				break;
			default:
				return ["return"=>"error","type"=>$Result];
				break;
		}
	}else{
		return array("return"=>"error","type"=>"connect");
	}
}

function password($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkDevice() {
	$chkMobile = false;
	$mAgent='/(iPhone|iPod|Android|Blackberry|Opera Mini|Windows ce|Nokia|sony)/';
	if(preg_match($mAgent,$_SERVER['HTTP_USER_AGENT'])){
		$chkMobile = true;
	}
	return $chkMobile;
}
function fatalError(){
	$error = error_get_last();
   	switch($error['type']) {
		case E_ERROR:
		   	if(preg_match('/protected method/',$error['message'])){
			   	$error = new \ghsoft\controller\logic\index\Exception(null);
		   	}else{
			   	$error = new \ghsoft\controller\logic\index\Exception('fatal');
		   	}
			break;
		case E_PARSE:
		   	$error = new \ghsoft\controller\logic\index\Exception('fatal');
		   	break;
   }
}
function imageDown(){
	$url=$_POST['url'];
	$IMAGE_PATH = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/web/image/'.$url;
	if(file_exists($IMAGE_PATH)){
		$IMAGE_SIZE = getimagesize($IMAGE_PATH);
		$mime=explode('/',$IMAGE_SIZE['mime']);
		if($IMAGE_SIZE) {
			$FILENAME = time().substr(explode(' ',microtime())[0],2,3).$mime[1];
			header("Content-Type: ".$IMAGE_SIZE['mime']);
			header("Content-Disposition: attachment;filename=$FILENAME");
			header("Content-Length: ".filesize($IMAGE_PATH));
			readfile($IMAGE_PATH);
		}
	}
}
function request()
{
	foreach ($_REQUEST as $key => $value) {
		$_POST[$key]=$value;
	}
}
function excelWrite($filename, $excel)
{
	header("Content-type: application/vnd.ms-excel;");
	header("Content-Description: GHSOFT Generated Data");
	header("Content-Disposition: attachment;filename=".$filename.".xls");
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
	$objWriter->save('php://output');
}
function excelRead($filename)
{
	return PHPExcel_IOFactory::createReaderForFile($filename);
}
function diffDate($datetime,$type='month'){
	$now=new DateTime(date("Y-m-d H:i:s"));
	$write=new DateTime($datetime);
	$diff=$now->diff($write);
	$time=null;
	// print_r($diff);
	switch ($type) {
		case 'year':
			$time=($diff->y)?$diff->y."년":null;
			if($time){
				break;
			}
		case 'month':
			$time=($diff->y)?$datetime:null;
			if(!$time){
				$time=($diff->m)?$diff->m."달":null;
			}
			if($time){
				break;
			}
		case 'date':
			$time=($diff->m)?$datetime:null;
			if(!$time){
				$time=($diff->d)?$diff->d."일":null;
			}
			if($time){
				break;
			}
		case 'hour':
			$time=($diff->d)?$datetime:null;
			if(!$time){
				$time=($diff->h)?$diff->h."시간":null;
			}
			if($time){
				break;
			}
		default :
			$time=($diff->h)?$datetime:null;
			if(!$time){
				$time=($diff->i)?$diff->i."분":null;
			}
			if($time){
				break;
			}
			if(!$time){
				$time=$diff->s."초";
			}
			break;
	}
	return $time;
}
?>
