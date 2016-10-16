<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 12:01
 */

class Controller extends Smarty
{
    public function __construct()
    {
        //配置Smarty链式配置
        $this->setTemplateDir('./views')
            ->setCompileDir('./runtime/views_c')
            ->setConfigDir('./configs')
            ->setCacheDir('./runtim/caches');
        //配置 模板变量的定界符
        $this->left_delimiter = '<{';
        $this->right_delimiter = '}>';
        //缓存的配置
        $this->caching = false;
        //缓存时间
        $this->cache_lifetime = 30;
    }

//    处理调用不存在的方法
    public function __call($fun, $params)
    {
        header('HTTP/1.0 404 not found');//非IE
        header('Status:404 not found');//兼容IE
        echo "<h1>404 NOT FOUND</h1>";
        exit;
    }
}