<?php
return array(
    'DEBUG_PAGE'=>true,

    'DOMAIN_NAME' => 'http://localhost/HYBBS',

    'url_suffix'=>'.html',
    'url_explode'=>'/',
    'PLUGIN_DOWN'=>'http://bbs.hyphp.cn/' ,//官方下载服务器 ,这个不是你的域名填写地方 ，没事勿修改

    'HY_URL'=>array(
        'action'=>array(
            'thread'=>'t',
            'forum'=>'f',
            'my'=>'u',
        ),
        'method'=>array(
            'thread'=>array(
                'del'=>'d'
            )
        )
    ),

    //数据库类型
    "SQL_TYPE" => "mysql",
    //数据库名称
    "SQL_NAME" => "hybbs",
    //数据库地址
    "SQL_IP"=>"localhost",
    //数据库账号
    'SQL_USER' => 'root',
    //数据密码
    'SQL_PASS' => 'zwt12345',
    //数据库字符集
    'SQL_CHARSET' => 'utf8',
    //数据库端口
    'SQL_PORT' => 3306,
    //数据库前缀
    'SQL_PREFIX' => 'hy_',
    //PDO配置
    'SQL_OPTION' => array(
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        //PDO::ATTR_PERSISTENT => true //长连接
    ),

    //全站加密字符串, 请勿泄露 安装时会随机生成 , 注意备份!
    //目前用于用户信息COOKIE加密
    //缓存文件名加密
    //头像文件名加密
    'MD5_KEY' => 'kp947GWSmQLa2uii',

    //管理员用户组 ID
    'ADMIN_GROUP' =>1,



);
