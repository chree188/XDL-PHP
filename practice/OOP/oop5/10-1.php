<?php
header("content-type:text/html;charset=utf-8");

//魔术方法总结
public function __construct(){}
public function __destruct(){}

----
public function __set($key, $value){$this->$key = $value;}
public function __get($key){return $this->$key;}

----
public function __isset(){return isset($this->$key);}
public function __unset(){unset($this->$key);}

----
public function __tostring(){return 'string..';}
public function __invoke(){}

----
public function __call($funName, $params){}
public static function __callStatic($funName, $params){}

----
public function __sleep(){return array();}
public function __wakeup(){}

----
public function __clone(){}
function __autoload($className){}