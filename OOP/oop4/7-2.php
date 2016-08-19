<?php	
header("content-type:text/html;charset=utf-8");

/*
  const 在类的内部定义常量
    在外部使用类的常量  类名::常量名
    在内部使用类的常量  self::常量名

作用:
    1.配置文件,定义之后,不能被更改.
    2.给函数或方法 设置各种参数
 */
 
class Mysql
{
//	define('AAA', 123456);
	const HOST = 'localhost';
	const USER = 'root';
	const AA = 1+2;
	public function info()
	{
		echo self::USER;
	}
}

echo Mysql::HOST;
echo '<hr>';
$m = new Mysql();
$m->info();

echo '<hr>';
$url = 'http://www.jd.com/index.php';
echo pathinfo($url,PATHINFO_EXTENSION);
echo '<br>';
echo PATHINFO_EXTENSION.'<br>';
echo pathinfo($url,4);

echo '<hr>';
class Game
{
//	定义常量
	const LEFT = 37;
	const UP = 38;
	const RIGHT = 39;
	const DOWN = 40;
	const SP = 32;
	
//	接收按键,控制方向
	public static function move($m)
	{
		switch($m){
			case '37':
				echo '←';	//左键
				break;
			case '38':
                echo '↑';	//上键
                break;
            case '39':
                echo '→';	//右键
                break;
            case '40':
                echo '↓';	//下键
                break;
		}
	}
	
//	执行跳舞
	public static function dance($m)
	{
		if($m == '32'){
			echo '啪!';
		}
	}
}

//调用舞步
//Game::move(37);
//Game::move(40);

Game::move(Game::LEFT);
Game::move(Game::RIGHT);
Game::move(Game::UP);
Game::move(Game::DOWN);
Game::move(Game::LEFT);
Game::move(Game::RIGHT);
Game::dance(Game::SP);
Game::dance(Game::SP);
Game::dance(Game::SP);
