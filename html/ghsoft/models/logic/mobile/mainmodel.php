<?php
namespace models\logic\mobile;
use models\template\Mobilemodel;
class Mainmodel Extends Mobilemodel
{
	public function __construct($db)
	{
		$this->db=$db;
		parent::__construct($db);
	}
}
?>
