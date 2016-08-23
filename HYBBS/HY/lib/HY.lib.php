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
    }
    public static function hy_exception($e){
        // 避免死循环
        DEBUG && ($_SERVER['exception'] = 1);
        //log::write($e->getMessage().' File: '.$e->getFile().' ['.$e->getLine().']');
        header('HTTP/1.1 404 Not Found'); 
        header('status: 404 Not Found');
        $s = '';
        $log = New \HY\Logs;
        $log->log( $e->getMessage() . ' on line ' . $e->getLine()."\r\n");
        if (DEBUG) {
            try {
                $s = exception::to_html($e);
            } catch (Exception $e) {
                $s = get_class($e) . ' thrown within the exception handler. Message: ' . $e->getMessage() . ' on line ' . $e->getLine();
            }
            echo $s;
        } else {
            $s = $e->getMessage();
            include C("error_404");
            
        }
        
        

        
        die;
    }
    public static function hy_error($errno, $errstr, $errfile, $errline){

        if(isset($_SERVER['ob_start'])){
            unset($_SERVER['ob_start']);
            ob_end_clean();
        }
        $errortype = array(E_ERROR => 'Error', E_WARNING => 'Warning', E_PARSE => 'Parsing Error', E_NOTICE => 'Notice', E_CORE_ERROR => 'Core Error', E_CORE_WARNING => 'Core Warning', E_COMPILE_ERROR => 'Compile Error', E_COMPILE_WARNING => 'Compile Warning', E_USER_ERROR => 'User Error', E_USER_WARNING => 'User Warning', E_USER_NOTICE => 'User Notice', E_STRICT => 'Runtime Notice');
        $errnostr = isset($errortype[$errno]) ? $errortype[$errno] : 'Unknonw';
        $s = "[{$errnostr}] : {$errstr} in File {$errfile}, Line: {$errline}";
        $log = New \HY\Logs;
        $log->log($s."\r\n\r\n");

        //echo $errstr;
        if (DEBUG && empty($_SERVER['exception'])) {

            $fy = str_replace("Notice",'通知',$s);
            $fy = str_replace("Notice",'通知',$fy);
            $fy = str_replace("Warning",'警告',$fy);
            $fy = str_replace("Line",'错误行',$fy);
            $fy = str_replace("Undefined index",'数组索引不存在',$fy);
            


            $fy = str_replace("Undefined variable",'变量未定义',$fy);
            $fy = str_replace("in File",'错误来自于文件:',$fy);





            

            //如果你看到这条注释,请看顶部的错误信息, 非以上代码问题
            throw new \Exception($s . '</dd><dd><b style="width:100px">错误翻译:</b><font color="red">'.$fy.'</font>');
        } else { // 继续运行
            
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
        } elseif ($info[0] == 'Action') {
            $file = ACTION_PATH . str_replace('Action', '', $info[1]) . '.php';
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
        } elseif ($info[0] == 'HY' && $info[1] == 'exception') {
            $file = LIB_PATH . 'exception.php';
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
