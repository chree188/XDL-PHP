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
        $this->left_delimiter = LEFT_D;
        $this->right_delimiter = RIGHT_D;
        //缓存的配置
        $this->caching = CACHING;
        //缓存时间
        $this->cache_lifetime = CACHE_LIFETIME;
    }

//    跳转
    public function redirect($message, $url = null)
    {
        echo "<script>alert('{$message}')</script>";
        if (empty($url)) {
            echo "<script>history.back()</script>";
        } else {
            echo "<script>location.href='{$url}'</script>";
        }
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