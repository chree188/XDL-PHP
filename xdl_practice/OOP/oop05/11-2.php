<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 20:11
 */

header("content-type:text/html;charset=utf-8");

//总结 所有的魔术方法
/**
public function __construct(){}
public function __destruct(){}

public function __set($key,$value){$this->$key = $value}
public function __get($key){return $this->$key;}

public function __isset($key){return isset($this->$key);}
public function __unset($key){unset($this->$key);}

public function __tostring(){return "string..."}
public function __invoke(){}

public function __call($funName,$params){}
public static function __callStatic($funName,$params){}

public function __sleep(){return array();}
public function __wakeup(){}

public function __clone(){}
function __autoload($classname){}
*/