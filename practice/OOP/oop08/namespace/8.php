<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 14:52
 */
namespace dds{
    header("content-type:text/html;charset=utf-8");

    class PDO
    {
        public static function test()
        {
            echo 'dds的PDO<br>';
        }
    }
    const DDS = '1';

    echo DDS.'<br>';
    echo PDO::test();
    namespace\PDO::test();
    echo '本命名空间的名字:'.__NAMESPACE__;
    echo '<br>';
    echo PDO::test();
    echo '<hr>';
}

namespace hds\hehe\qq{
    class PDO
    {
        public static function test()
        {
            echo 'hds的PDO<br>';
        }
    }
    const DDS = '2';

    echo DDS.'<br>';
    echo PDO::test();
    echo '本命名空间的名字:'.__NAMESPACE__;
    echo '<hr>';
    echo PDO::class;
    echo '<br>';

//    在hds中使用DDS中的内容
    echo \dds\DDS.'<br>';
    \dds\PDO::test();
}