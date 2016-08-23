<?php
namespace Model;
use HY\Model;

class FileModel extends Model {

	//获取文件信息
	public function read($id){
		return $this->find("*",array('id'=>$id));
	}
	//判断附件是否属于该UID
	public function is_comp($id,$uid){
		
		return $this->has(array(
			'AND'=>array(
				'id'=>$id,
				'uid'=>$uid
			)
		));
	}
	public function get_name($id){
		return $this->find("filename",array('id'=>$id));
	}
}