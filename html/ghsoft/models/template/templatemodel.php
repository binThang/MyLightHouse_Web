<?php
namespace models\template;
use libs\Modeling;
use stdClass;
class Templatemodel Extends Modeling
{
	function __construct($db)
	{
		$this->db=$db;
		parent::__construct();
	}
}
?>
