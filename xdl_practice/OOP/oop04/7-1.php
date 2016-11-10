<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 19:51
 */

header("content-type:text/html;charset=utf-8");

/*const
    在内的内部,只能使用const定义常量
    在外部访问常量 类名::常量名
    在内部访问常量 self::常量名*/

define('AA',1111);

class Mysql
{
//    define('AA',1);
    const HOST = 'localhost';
    const ROOT = 'user';
    public function info()
    {
        echo AA;
        echo self::ROOT;
    }
}

echo Mysql::HOST;
$m = new Mysql();
$m->info();

echo '<hr>';
$url = "http://www.jd.com/index.php";
//echo pathinfo($url,PATHINFO_EXTENSION);
echo pathinfo($url,4);
//echo PATHINFO_EXTENSION;
echo '<hr>';

class Game
{
//    定义方向参数
    const LEFT = 37;
    const UP = 38;
    const RIGHT = 39;
    const DOWN = 40;
    const SP = 32;

//    接收按键 控制方向
    public static function move($m)
    {
        switch ($m) {
            case '37':echo '←';break;
            case '38':echo '↑';break;
            case '39':echo '→';break;
            case '40':echo '↓';break;
        }
    }
//    执行跳舞
    public static function dance($m)
    {
        if ($m == '32') {
            echo '啪!';
        }
    }
}

/*Game::move(37);
Game::move(39);*/

Game::move(Game::LEFT);
Game::move(Game::UP);
Game::move(Game::UP);
Game::move(Game::UP);
Game::move(Game::DOWN);
Game::move(Game::RIGHT);
Game::dance(Game::SP);
Game::dance(Game::SP);
Game::dance(Game::SP);
