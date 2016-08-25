<?php
//同一个文件中 定义多个命名空间
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

    echo '<hr>';
    echo \dds\DDS.'<br>';
    \dds\PDO::test();
}
