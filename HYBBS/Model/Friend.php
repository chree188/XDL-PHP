<?php
namespace Model;
use HY\Model;

class FriendModel extends Model {

	//获取两者关系
	public function get_state($uid1,$uid2){
		$state = $this->find('*',array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)));
		return empty($state) ? false : $state['state'];
	}
	public function set_state($uid1,$uid2,$s){
		return $this->update(array('state'=>$s),array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)));
	}
	//添加关注关系
	public function add_friend($uid1,$uid2){
		if(!$this->has(array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)))){ //$uid1 未关注 $uid2
			if($this->has(array('AND'=>array('uid1'=>$uid2,'uid2'=>$uid1)))){ // $uid2 关注了 $uid1
				if($this->get_state($uid2,$uid1)!= 0){
					$this->set_state($uid2,$uid1,2);
					return $this->insert(array('uid1'=>$uid1,'uid2'=>$uid2,'state'=>2));
				}
				return $this->insert(array('uid1'=>$uid1,'uid2'=>$uid2,'state'=>1));
				
				
			}else{
				return $this->insert(array('uid1'=>$uid1,'uid2'=>$uid2,'state'=>1));
			}
		}else{
			$this->set_state($uid1,$uid2,1);
		}
		//已存在朋友关系
		return false;
	}
	//删除朋友关系
	public function rm_friend($uid1,$uid2){
		if($this->has(array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)))){ //$uid1 关注 $uid2
			if($this->has(array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)))){ // $uid2 关注了 $uid1
				if($this->get_state($uid2,$uid1)!= 0)
					$this->set_state($uid2,$uid1,1);
			}
			$this->delete(array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)));
		}
	}

	public function update_int($uid1,$uid2,$type="+",$size=1){
		if($this->has(array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)))){
			if($type==="+")
				return $this->update(array("c[{$type}]"=>$size,'atime'=>NOW_TIME),array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)));
			return $this->update(array("c[{$type}]"=>$size),array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)));
		}
		$this->insert(array('uid1'=>$uid1,'uid2'=>$uid2,'c'=>1,'atime'=>NOW_TIME,'state'=>0));
		//陌生人=1
	}
	public function get_c($uid1,$uid2){
		if(!$this->has(array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2))))
			return 0;
		return $this->find('c',array('AND'=>array('uid1'=>$uid1,'uid2'=>$uid2)));
	}
}