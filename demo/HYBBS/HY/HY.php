<?php

/*
    HY 1.4.3
 
*/
define('HY_V','1.4.3');
$GLOBALS['START_TIME'] = microtime(TRUE);

date_default_timezone_set('PRC');

//声明编码 UTF8
header("Content-Type: text/html; charset=UTF-8");

//内存记录
if(function_exists('memory_get_usage')) 
    $GLOBALS['START_MEMORY'] = memory_get_usage();

//系统信息
define('IS_CGI',(0 === strpos(PHP_SAPI,'cgi') || false !== strpos(PHP_SAPI,'fcgi')) ? 1 : 0 );
define('IS_WIN',strstr(PHP_OS, 'WIN') ? 1 : 0 );
define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);

$_SERVER['time'] = $_SERVER['REQUEST_TIME'];
$_SERVER['ip'] = isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'0.0.0.0';

define('NOW_TIME',$_SERVER['REQUEST_TIME']);
define('CLIENT_IP',$_SERVER['ip']);
isset($_SERVER['REQUEST_METHOD']) or $_SERVER['REQUEST_METHOD'] = 'CGI';
define('IS_GET',$_SERVER['REQUEST_METHOD'] =='GET' ? true : false);
define('IS_POST',$_SERVER['REQUEST_METHOD'] =='POST' ? true : false);
define('IS_AJAX',
    ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ||
    !empty($_POST['ajax']) ||
    !empty($_GET['ajax'])) ? true : false);


//


defined('PATH')         or define('PATH',          dirname($_SERVER['SCRIPT_FILENAME']).'/');//网站根目录
defined('ACTION_PATH')  or define('ACTION_PATH',   PATH.'Action/'); //Action目录
defined('VIEW_PATH')    or define('VIEW_PATH',     PATH.'View/'); //VIEW
defined('CONF_PATH')    or define('CONF_PATH',     PATH.'Conf/'); //CONF
defined('TMP_PATH')     or define('TMP_PATH',      PATH.'Tmp/'); //Tmp
defined('TMPHTML_PATH') or define('TMPHTML_PATH',  PATH.'TmpHtml/'); //TmpHtml
defined('MYLIB_PATH')   or define('MYLIB_PATH',    PATH.'Lib/'); //Lib
defined('MODEL_PATH')   or define('MODEL_PATH',    PATH.'Model/'); //Model
defined('PLUGIN_PATH')  or define('PLUGIN_PATH',    PATH.'Plugin/'); //插件目录



defined('HY_PATH')      or define('HY_PATH',       __DIR__.'/'); //框架目录

defined('LIB_PATH')     or define('LIB_PATH',      realpath(HY_PATH.'lib').'/'); // 系统核心类库目录
defined('DEBUG')        or define('DEBUG',         false); //是否调试
defined('PLUGIN_ON')    or define('PLUGIN_ON',     false); //插件机制开启
defined('PLUGIN_ON_FILE')    or define('PLUGIN_ON_FILE',     false); //插件机制开启

is_dir(ACTION_PATH)    or mkdir(ACTION_PATH);
is_dir(VIEW_PATH)      or mkdir(VIEW_PATH);
is_dir(CONF_PATH)      or mkdir(CONF_PATH);
is_dir(TMP_PATH)       or mkdir(TMP_PATH);
is_dir(TMPHTML_PATH)   or mkdir(TMPHTML_PATH);
is_dir(MYLIB_PATH)     or mkdir(MYLIB_PATH);
is_dir(MODEL_PATH)     or mkdir(MODEL_PATH);
is_dir(PLUGIN_PATH)    or mkdir(PLUGIN_PATH);

is_file(CONF_PATH   . "config.php") or file_put_contents(CONF_PATH   . "config.php","<?php \r\nreturn array(\r\n);");
is_file(ACTION_PATH . "Index.php" ) or file_put_contents(ACTION_PATH . "Index.php" ,"<?php \r\nnamespace Action;\r\nuse HY\Action;\r\nclass IndexAction extends Action {\r\npublic function Index(){\r\necho 'HY框架';\r\n}\r\n}");

header('X-Powered-By:HYPHP');
if(isset($argv) && count($argv) == 3)
	$GLOBALS['argv']=$argv;

require LIB_PATH.'HY.lib.php';
HY\HY::start();
