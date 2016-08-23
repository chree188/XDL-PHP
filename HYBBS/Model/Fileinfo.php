<?php
namespace Model;
use HY\Model;

class FileinfoModel extends Model {

	//获取文件信息
	public function read($id){
		return $this->find("*",array('id'=>$id));
	}
	
}