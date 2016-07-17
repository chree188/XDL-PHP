<?php
/**
 * -------------------------------------------------------------------------------------------------+
 * 配置                                                                                              |
 * 一 基础配置(时区|魔术转译)                                                                           |                   |
 * 二 静态资源                                                                                        |
 * 三 website                                                                                        |
 * 四 模版引擎                                                                                        |
 * 五 奖励                                                                                           |
 * -------------------------------------------------------------------------------------------------+
 */

    // 一
    define('TIMEZONE', 'Asia/shanghai');                    //时区
    define('GPC', get_magic_quotes_gpc() ? 0 : 1);              //魔术转译

    // 二
    define('DOMAIN_RESOURCE', 'http://funcbbs.yhsong.com/public'); //静态资源目录

    // 三
    define('WEB_NAME', '10分钟学院');                        //站点名称，将显示在浏览器窗口标题等位置
    define('WEB_BTM', 'phpxy');                             //网站名称，将显示在页面底部的联系方式处
    define('WEB_URL', 'http://www.phpxy.com/');             //网站 URL，将作为链接显示在页面底部
    define('WEB_ICP', '京ICP备 89273号');                    //页面底部可以显示 ICP 备案信息
    define('WEB_ISCLOSE', false);                           //true暂时将站点关闭，其他人无法访问，但不影响管理员访问
    define('WEB_REG', true);                                //true开启注册功能

    // 四
    define('TPL_SKIN', 'theme/default');                    //模版文件存放位置
    define('TPL_CACHE', 'compiled');                        //模版文件缓存位置
    
    // 五
    define('REWARD_LOGIN', 2);                                 //每天首次登陆赠送2积分
    define('REWARD_REG', 50);                                  //注册赠送50积分
    define('REWARD_T', 2);                                     //发帖赠送2积分
    define('REWARD_H', 1);                                     //回帖赠送1积分
