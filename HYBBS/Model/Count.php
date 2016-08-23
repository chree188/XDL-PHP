<?php
namespace Model;
use HY\Model;

class CountModel extends Model {

    public function _get($name){
        $this->update(array('v[+]'=>1),array("name"=>$name));
        return $this->find('v',array('name'=>$name));
    }
    public function xget($name){
        return $this->find('v',array('name'=>$name));
    }
    public function _set($name,$v){
    	if(!$this->has(array('name'=>$name))) //如果不存在该条数据 则创建
    		return $this->insert(array('name'=>$name,'v'=>$v));
    	return $this->update(array('v'=>$v),array('name'=>$name));
    }
    
}
