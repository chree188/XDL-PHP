<?php
namespace Model;
use HY\Model;

class UserModel extends Model {
    public function read($id){
        return $this->find('*',array('id'=>$id));
    }
    //通过用户名获取用户数据
    public function user_read($user){
        return $this->find("*",array('user'=>$user));
    }
    //通过邮箱获取用户数据
    public function email_read($email){
        return $this->find("*",array('email'=>$email));
    }
    //判断账号是否存在  通过 ID
    public function is_id($id){
        return $this->has(array('id'=>$id));
    }
    //判断账号是否存在 通过用户名
    public function is_user($user){
        return $this->has(array('user'=>$user));
    }
    public function is_email($email){
        return $this->has(array('email'=>$email));
    }

    //增加账号
    public function add_user($user,$pass,$email){
        $salt = substr(md5(mt_rand(10000000, 99999999).NOW_TIME), 0, 8);
        return $this->insert(array(
            'user'=>$user,
            'pass'=>L("User")->md5_md5($pass,$salt),
            'email'=>$email,
            'salt'=>$salt,
            'atime'=>NOW_TIME,
            'group'=>2,
            'ctime'=>NOW_TIME,
        ));
    }
    // 通过id获得用户名
    public function id_to_user($id){
        return $this->find('user',array('id'=>$id));
    }
    // 通过用户名获取 id
    public function user_to_id($user){
        return $this->find('id',array('user'=>$user));
    }
    //更新值 默认 金钱+1
    public function update_int($id,$key='gold',$type="+",$size=1){
        $key .= ($type=='+') ? '[+]' : '[-]';
        $this->update(array(
            $key=>$size
        ),array(
            'id'=>$id
        ));
    }
     //获取用户头像
    public function avatar($user){
        
        $path = INDEX_PATH . 'upload/avatar/' . md5($user);
        $path1 = 'upload/avatar/' . md5($user);
        if(!file_exists($path.'-a.jpg'))
            return array(
                'a'=>'public/images/user.gif',
                'b'=>'public/images/user.gif',
                'c'=>'public/images/user.gif',
            );
        return array(
            "a"=>$path1."-a.jpg",
            "b"=>$path1."-b.jpg",
            "c"=>$path1."-c.jpg"
        );
    }
    //获取用户金币
    public function get_gold($id){
        return $this->find("gold",array('id'=>$id));
    }

    //获取用户积分 
    public function get_credits($uid){
        return $this->find('credits',array('id'=>$uid));
    }

    //设置用户组
    public function set_group($uid,$id){
        //if(!$this->is_id($uid))
        //    return false;
        return $this->update(array('group'=>$id),array('id'=>$uid));
    }
    //获取用户当前用户组ID
    public function get_group($uid){
        return $this->find('group',array('id'=>$uid));
    }

    public function get_fans($uid){
        return $this->find('fans',array('id'=>$uid));
    }
    public function get_follow($uid){
        return $this->find('follow',array('id'=>$uid));
    }
   
    
}
