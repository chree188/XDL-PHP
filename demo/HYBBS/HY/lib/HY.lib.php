<?php
namespace HY;

class HY
{
    public static $_CLASS = array();
    public static function start()
    {
        spl_autoload_register('HY\\HY::autoload');
        if (DEBUG) {
            error_reporting(E_ALL | E_STRICT);
            //error_reporting(E_ALL & ~(E_NOTICE | E_STRICT));
            @ini_set('display_errors', 'ON');
        } else {
            error_reporting(0);
            @ini_set('display_errors', 'OFF');
        }
        set_error_handler('HY\\HY::hy_error');
        set_exception_handler('HY\\HY::hy_exception');
        $config = include HY_PATH . 'conf.php';

        $config = array_merge($config,include CONF_PATH . 'config.php');

        include LIB_PATH . 'function.php';
        

        C($config);

        define('EXT',C("url_suffix"));
        define('EXP',C("url_explode"));
        
        define('IS_MOBILE',hy_is_mobile());
        define('IS_SHOUJI',IS_MOBILE);
        define('IS_WAP',IS_MOBILE);

        $url='';
        if(isset($_GET['s']))
            $url = ltrim(strtolower($_GET['s']), '/');
        $class = '';
        $Action = 'Index';
        $_Action = 'Index';
        $_Fun = 'Index';

        $_GET['HY_URL']=array('Index','Index');

        if (empty($url)) {
            if(isset($GLOBALS['argv'])){
                if(isset($GLOBALS['argv'][1]) && isset($GLOBALS['argv'][2]))
                    $class = '\\Action\\'.ucfirst($GLOBALS['argv'][1]).'Action';
                    $Action = $_Action = ucfirst($GLOBALS['argv'][1]);
                    $_Fun = $_Fun = ucfirst($GLOBALS['argv'][2]);
            }else{
                $class = '\\Action\\IndexAction';
            }
        } else {
            $info = str_replace(C("url_suffix"), '', $url);
            $info = $_GET['HY_URL'] = explode(C('url_explode'), $info);

            $Action = isset($info[0]) ? $info[0] : 'Index';
            $Fun = isset($info[1]) ? $info[1] : 'Index';
            $Action = $Action == '' ? 'Index' : $Action;
            $Fun = $Fun == '' ? 'Index' : $Fun;
            for ($i = 2; $i < count($info); $i++) {
                $_GET[$info[$i++]] = isset($info[$i]) ? $info[$i] : '';
            }
            if(isset($config['HY_URL']['action'])){
                $z = array_search($Action,$config['HY_URL']['action']);
                if($z){
                    $Action = $z;
                    if(isset($config['HY_URL']['method'][$z])){
                        $b = array_search($Fun,$config['HY_URL']['method'][$z]);
                        if($b)
                            $Fun=$b;
                    }

                }
            }
            $_Action = $Action = ucfirst($Action);
            $_Fun = $Fun = ucfirst($Fun);
            $class = "\\Action\\{$_Action}Action";
        }
        define('ACTION_NAME', $_Action);
        define('METHOD_NAME', $_Fun);
        
        if (!file_exists(ACTION_PATH . "{$Action}.php")) {
            if (!file_exists(ACTION_PATH . 'Empty.php')) {
                E("{$Action}控制器不存在!");
            } else {
                $class = '\\Action\\EmptyAction';
            }
        }
        if (file_exists(MYLIB_PATH . 'function.php')) {
            include MYLIB_PATH . 'function.php';
        }
        $module = new $class();
        if (!method_exists($module, $_Fun) || !preg_match('/^[A-Za-z](\/|\w)*$/',$_Fun)) {
            if (!method_exists($module, '_empty')) {

                E("你的{$class}没有存在{$_Fun}操作方法");
            }
            $_Fun = '_empty';
        }
        $method = new \ReflectionMethod($module, $_Fun);
        if ($method->isPublic() && !$method->isStatic()) {
            $class = new \ReflectionClass($module);
            $method->invoke($module);
        }
        $GLOBALS['END_TIME'] = microtime(TRUE);
        if (C('DEBUG_PAGE')) {
            $DEBUG_SQL = DEBUG_SQL::$logs;
            if (empty($url)) {
                $url = '/';
            } else {
                $url = '/' . $url;
            }
            $DEBUG_CLASS = self::$_CLASS;
            require HY_PATH . 'View/Debug.php';
        }

        
        //print_r(hook::$include_file);
        //print_r(hook::$re_php);
    }
    public static function hy_exception($e){
        header('HTTP/1.1 404 Not Found'); 
        header('status: 404 Not Found');

        $s = '';
        $log = New \HY\Logs;
        $text = $e->getMessage() .'  #发生错误的文件位于: '. $e->getFile() .' #行数: ' . $e->getLine(). ' #发生时间: '.date("Y-m-d H:i:s")."\r\n";

        $text = str_replace('syntax error, unexpected','语法错误, 意外',$text);
        $text = str_replace('Call to undefined function','调用了未定义的函数',$text);
        
        $log->log($text);
        if (DEBUG) {
            if(IS_AJAX){
                header('HTTP/1.1 200 OK'); 
                header('Content-Type:application/json; charset=utf-8');
                die(json_encode(array('error'=>false,'info'=>$text,'data'=>$text)));
            }
            else{
                include HY_PATH . 'View/exec.php';
            }
        } else {
            $s = $e->getMessage();
            include C("error_404");
            
        }
        
    }
    public static function hy_error($Error_Type, $Error_str,$Error_file, $Error_line){

        if(isset($_SERVER['ob_start'])){
            unset($_SERVER['ob_start']);
            ob_end_clean();
        }
        $Error_China = array(
            E_ERROR => '错误', 
            E_WARNING => '警告', 
            E_PARSE => '解析错误', 
            E_NOTICE => '注意', 
            E_CORE_ERROR => '核心错误', 
            E_CORE_WARNING => '核心警告', 
            E_COMPILE_ERROR => '编译错误', 
            E_COMPILE_WARNING => '编译警告', 
            E_USER_ERROR => '用户错误', 
            E_USER_WARNING => '用户警告', 
            E_USER_NOTICE => 'User Notice', 
            E_STRICT => 'Runtime Notice'
        );
        $Error_Mun = isset($Error_China[$Error_Type]) ? $Error_China[$Error_Type] : '未知';
        $s = "错误类型({$Error_Mun}) : {$Error_str}";
        
        if (DEBUG) {
            throw new \Exception($s);
        } else {
            $log = New \HY\Logs;
            $log->log($s.' #错误来自于:'.$Error_file.' #行数:'.$Error_line."\r\n\r\n");
        }


        return 0;
    }
    public static function autoload($class){
        $info = explode('\\', $class);
        $agrs =count($info);
        //echo $class.$agrs."\r\n";
        isset($info[0]) or $info[0]=false;
        isset($info[1]) or $info[1]=false;
        isset($info[2]) or $info[2]=false;
        
        if (isset(self::$_CLASS[$class])) {
            //加载过
            
            return;
        }
        if ($info[0] == 'Lib') {
            $file = MYLIB_PATH . $info[1] . '.php';
        } elseif ($info[0] == 'Model') {
            $file = MODEL_PATH . str_replace('Model', '', $info[1]) . '.php';
            hook::$include_file[]=$file;
            if (PLUGIN_ON) {
                //插件机制
                $file1 = TMP_PATH . $info[1] . '_' . MD5('Model/' . $info[1]) . C("tmp_file_suffix");
                if (!is_file($file1) || DEBUG) {
                    // 临时Action不存在
                    //include_once LIB_PATH . 'hook.php';
                    if (!is_file($file)) {
                        throw new \Exception('控制器 ' . $class . ' 不存在!');
                    }
                    $code = file_get_contents($file);
                    $code = hook::re($code,$file);
                    hook::put(hook::encode($code), $file1);
                }
                $file = $file1;
            }
            

        } elseif ($info[0] == 'Action') {
            $file = ACTION_PATH . str_replace('Action', '', $info[1]) . '.php';
            hook::$include_file[]=$file;
            if (PLUGIN_ON) {
                //插件机制
                $file1 = TMP_PATH . $info[1] . '_' . MD5('Action/' . $info[1]) . C("tmp_file_suffix");
                if (!is_file($file1) || DEBUG) {
                    // 临时Action不存在
                    //include_once LIB_PATH . 'hook.php';
                    if (!is_file($file)) {
                        throw new \Exception('控制器 ' . $class . ' 不存在!');
                    }
                    $code = file_get_contents($file);
                    $code = hook::re($code,$file);
                    hook::put(hook::encode($code), $file1);
                }
                $file = $file1;
            }
            
        } elseif ($info[0] == 'HY' && $info[1] == 'Model') {
            include HY_PATH . 'HY_SQL.php';
            $file = HY_PATH . 'Model.php';
        } elseif ($info[0] == 'HY' && $info[1] == 'Action') {
            $file = HY_PATH . 'Action.php';
        } elseif ($info[0] == 'HY' && $info[1] == 'Tpl') {
            $file = HY_PATH . 'Tpl.php';
        } elseif ($info[0] == 'HY' && $info[1] == 'hook') {
            $file = LIB_PATH . 'hook.php';
        } elseif ($info[0] == 'HY' && $info[1] == 'Logs') {
            $file = HY_PATH . 'class/Logs.php';
        } elseif ($info[0] == 'HY' && $info[1] == 'Cache' && $agrs==2) {
            $file = HY_PATH . 'class/Cache.php';
            
        } elseif ($info[0] == 'HY' && $info[1] == 'Cache' && $agrs==3) {
            $file = HY_PATH . "class/Cache/{$info[2]}.php";
            
        }


        if (empty($file)) {
            return false;
        }
        //echo $class."<br>";
        //echo $file."|<br>";
        $path = realpath($file);
        if (!is_file($path)) {
            E('类库不存在 : ' . $class);
        }
        include_once $path;
        self::$_CLASS[$class] = true;
    }
}
class DEBUG_SQL{
    public static $logs = array();
    public static function SQL_LOG($log){
        array_push(self::$logs, $log);
    }
}
