<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Member Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('membermodel');
    	$this->model->member_idx($this->member_idx);
	}
	public function insert()
  	{
	    JSON($this->model->insert());
	}
    public function selectId()
    {
        JSON($this->model->selectId());
    }
    public function selectNick()
    {
        JSON($this->model->selectNick());
    }
    public function smsCk()
    {
        JSON(sms('요청하신 인증번호는 '.$_POST['number'].'입니다'));
    }
    public function findId()
    {
        JSON($this->model->findId());
    }
	public function findIdEmail()
    {
        JSON($this->model->findIdEmail());
    }
    public function findPass()
    {
        JSON($this->model->findPass());
    }
	public function findPassEmail()
	{
		JSON($this->model->findPassEmail());
	}
	public function updatePass()
    {
        JSON($this->model->updatePass());
    }
	public function login()
	{
        JSON($this->model->login());
	}
	public function logout()
	{
		JSON($this->model->logout());
	}
	public function selectInfo()
	{
		JSON($this->model->selectInfo());
	}
	public function withdrawal()
	{
		JSON($this->model->withdrawal());
	}
	public function update_push($idx)
	{
		JSON($this->model->update_push($idx));
	}
	public function select_push()
	{
		JSON($this->model->select_push());
	}
	public function disturbance()
	{
		JSON($this->model->disturbance());
	}
	public function disturbance_show()
	{
		JSON($this->model->disturbance_show());
	}
	public function singo()
	{
		JSON($this->model->singo());
	}
	public function email_ck()
	{
		JSON($this->model->email_ck());
	}
	public function checkPhone()
	{
		JSON($this->model->checkPhone());
	}
	public function checkEmail()
	{
		JSON($this->model->checkEmail());
	}
	public function iostoken()
	{
		JSON($this->model->iostoken());
	}
}
?>
