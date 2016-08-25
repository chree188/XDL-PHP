<?php
namespace dds{
    header("content-type:text/html;charset=utf-8");
    class PDO
    {
        public static function test()
        {
            echo 'dds的pdo<br>';
        }
    }
    const DDS = 'DDS';

    echo DDS.'<br>';
    PDO::test();
    namespace\PDO::test();
    echo "本命名空间:".__NAMESPACE__.'<br>';
    echo PDO::class;
    echo '<hr>';
}
//再定义一个命名空间
namespace hds{
    class PDO
    {
        public static function test()
        {
            echo 'hds的pdo';
        }
    }
    const DDS = 'HDS';

    echo DDS.'<br>';
    PDO::test();
    echo "本命名空间:".__NAMESPACE__.'<br>';

    echo '<hr>';
    echo \dds\DDS.'<br>';
    \dds\PDO::test();
    echo '<hr>';    
    \demo();//调用 全局命名空间下的 函数
}

namespace{
    echo "本命名空间:".__NAMESPACE__.'<br>';
    function demo()
    {
        echo 'demo...<br>';
    }
}


