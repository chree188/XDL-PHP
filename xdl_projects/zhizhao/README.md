# zhizhao
### 支招问答社区

初始化设置:

    1. 在mysql里新建数据库: **zhizhao**
    2. 导入根目录下的zhizhao.sql
    3. 修改Apps->Common->Conf->config.php 
    
    参照如下:
      'DB_HOST' => '127.0.0.1', // 设置mysql服务器地址,本地默认就好
      'DB_NAME' => 'zhizhao',   // 设置数据库名(与第一步新建的数据库同名),默认就好
      'DB_USER' => 'root',      // 设置mysql服务器登录用户,默认就好
      'DB_PWD'  => 'zwt12345',  // 设置您服务器对应用户的登录密码
      'DB_PORT' => '3306',      // 设置数据库服务器的端口,默认3306就好
      'DB_PREFIX' => 'zz_',     // 设置数据库表前缀,默认就是zz_


登陆用户:前台user表;后台admin表. 密码:123456(前后台全部一样,请登陆后自行更改)
zhizhao目录必须包裹在外层zl目录下,如需更改目录请自行更改admin和home的view层模板里的路径和数据库里带zl/zhizhao的路径