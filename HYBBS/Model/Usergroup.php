<?php
namespace Model;
use HY\Model;

class UsergroupModel extends Model {
    // $id 用户组ID 返回权限数组
    public function read_json($id){
        $json = $this->select("json",array(
            "id"=>$id
        ));
        return json_decode($json,true);
    }

    
    public function id_to_name($id){
        return $this->find("name",array(
            'id'=>$id
        ));
    }
    public function format(&$usergroup){
        if(empty($usergroup))
            return;
        $tmp = $usergroup;
        $usergroup = array();
        
        foreach ($tmp as $k => $v) {
            $usergroup[intval($v['id'])] = $v;
        }
        
    }
}
