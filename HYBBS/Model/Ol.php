<?php
namespace Model;
use HY\Model;

class OlModel extends Model{
	public function ol($uid){
		return $this->has(array('uid'=>$uid));
	}
	public function list($size = 500){
		return $this->select('*',array(
			'LIMIT' => 500,
		))
	}

}