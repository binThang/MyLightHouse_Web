<?php
namespace controller\template;
use libs\Controller;
use libs\Template;
use stdClass;
class Control Extends Controller
{
	private $menulist=[
		[9,'최고 관리자메뉴',[
			['admin/list','관리자 목록'],
			['admin/write','관리자 생성']
		]],
		[7,'회원관리',[
			['member/list','일반 회원 관리'],
			['membertony/list','토니 관리'],
		]],
		[7,'신고관리',[
			['singoboard/list','신고 글 리스트'],
			['singoreply/list','신고 댓글 리스트'],
		]],
		[7,'해시태그 관리',[
			['board/write_hashtag','해시태그 등록'],
		]],
		[7,'뻔해도 좋은 관리',[
			['fun/write','뻔해도 좋은 글쓰기'],
			['fun1/list', '뻔해도 좋은 명언 리스트'],
			['fun2/list', '뻔해도 좋은 글귀 리스트'],
			['fun3/list', '뻔해도 좋은 영상 리스트'],
		]],
		[7,'공지사항 관리',[
			['notice/write_notice', '공지사항 등록'],
			['notice/list', '공지사항 리스트'],
		]],
		[7,'푸시 관리',[
			['push/write_push', '푸시 등록'],
			['push/list', '푸시 리스트'],

		]],
		[7,'기타 관리',[
			['qna/list', '문의 & 제안'],
			['image/img', '도와주신 분, 종료 이미지']
		]],
		// [7,'관리자메뉴',[
		// 	['member/list','회원관리'],
		// 	['member/list_tony','토니관리'],
		// 	['singoboard/list','신고 글 리스트'],
		// 	['singoreply/list','신고 댓글 리스트'],
		// 	// ['board/write_category','카테고리 등록'],
		// 	['board/write_hashtag','해시태그 등록'],
		// 	// ['board/write_backimg','사진첩 사진 관리'],
		// 	['fun/write','뻔해도 좋은 글쓰기'],
		// 	// ['fun/list', '뻔해도 좋은 리스트'],
		// 	['fun1/list', '뻔해도 좋은 명언 리스트'],
		// 	['fun2/list', '뻔해도 좋은 글귀 리스트'],
		// 	['fun3/list', '뻔해도 좋은 영상 리스트'],
		//
		// 	['notice/write_notice', '공지사항 등록'],
		// 	['notice/list', '공지사항 리스트'],
		// 	['push/write_push', '푸시 등록'],
		// 	['push/list', '푸시 리스트'],
		// 	['qna/list', '문의 & 제안'],
		// 	['image/img', '도와주신 분, 종료 이미지']
		//
		//
		//
		//
		// ]],
		// [5,'관리자메뉴',[
		// 	['member/list','회원관리'],
		// 	['cert/list','선생님 인증 신청'],
		// 	['faq/list','FAQ'],
		// 	['rep/list','후기/답변 신고'],
		// 	['board/list','족보/수능 관리'],
		// 	['push/list','푸시알림'],
		// 	['qna/list','질문 관리']
		// ]],
		// [3,'관리자메뉴',[
		// 	['rep/list','후기/답변 신고'],
		// 	['board/list','족보/수능 관리'],
		// 	['push/list','푸시알림'],
		// 	['qna/list','질문 관리']
		// ]],
		// [1,'관리자메뉴',[
		// 	['pay/list','결제 현황']
		// ]]
	];
	use Template {
        Template::__construct as private __templateConstruct;
    }
	private $t_model = null;
	public function __construct()
	{
		parent::__construct();
		$this->__templateConstruct();
		$this->t_model = $this->loadModel('controlmodel', 'template');
		if(!$this->setAdminCheck()){
            if($_GET['url']=='admin'){
                $this->loginForm();
            }else{
                if($_POST['type']=='ajax'){
                    echo JSON(['return'=>'logout']);
                    exit();
                }else{
                    header("Location:/admin");
                }
            }
		}
        $this->menu();
	}
	protected function index(){
		if($this->setAdminCheck()){
			$this->main();
		}
	}
	private function menu(){
		$this->menu=$this->t_model->menu($this->menulist);
	}
	private function main()
	{
		$this->initPage();
	}
	private function loginForm()
	{
		$this->loadPage('logic/control/login/login_form.php');
	}
	protected function passForm()
	{
		$this->initPage('logic/control/login/pass_form.php');
	}
	protected function passUpdate()
	{
		JSON($this->t_model->passUpdate());
	}
	protected function login()
	{
		$this->t_model->login();
		header('Location:/admin');
	}
	protected function logout()
	{
		session_unset();
		session_destroy();
        header('Location:/admin');
	}
	private function setAdminCheck()
	{
		if (! isset($_SESSION['admin_idx'])) {
			return false;
		} else {
			switch ($_SESSION['admin_type']) {
				case 1:
					$this->admin_type='D급 관리자';
					break;
				case 3:
					$this->admin_type='C급 관리자';
					break;
				case 5:
					$this->admin_type='B급 관리자';
					break;
				case 7:
					$this->admin_type='A급 관리자';
					break;
				case 9:
					$this->admin_type='최고 관리자';
					break;

			}
			return true;
		}
	}
}
?>
