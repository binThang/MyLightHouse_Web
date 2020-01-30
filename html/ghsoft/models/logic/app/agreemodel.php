<?php
namespace models\logic\app;
use models\template\Appmodel;
use stdClass;
class agreemodel Extends Appmodel
{
	public function __construct($db)
	{
		parent::__construct($db);
	}
	public function agree1()
    {
        $sql="SELECT agree1 from agree";
        $query=$this->db->prepare($sql);
        $query->execute();
        $list = $query->fetch();
		return array('agree'=>$list->agree1);
    }
    public function agree2()
    {
        $sql="SELECT agree2 from agree";
        $query=$this->db->prepare($sql);
        $query->execute();
        $list = $query->fetch();
		return array('agree'=>$list->agree2);
    }
}
?>
