<?php
namespace Model;
use HY\Model;
class ChatModel extends Model{
	// $uid1= 接收者
	// $uid2= 发送者 , 0=系统消息
	// 
	public function send($uid1,$uid2,$content){
		$this->insert(
			array(
				'uid1'=>$uid1,
				'uid2'=>$uid2,
				'content'=>$content,
				'atime'=>NOW_TIME
			)
		);
		$Friend = M("Friend");
        $Friend->update_int($uid1,$uid2);

        $Chat_count = M("Chat_count");
        $Chat_count->update_int($uid1);
	}
	//系统消息
	public function sys_send($uid,$content){
		return $this->send($uid,0,$content);
	}
}