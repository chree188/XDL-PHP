<?php
namespace HY;
class hook {
    static public $file = array();
    static public $include_file =array();
    static public $re_php = array();

    static public function init_file(){
        if(!function_exists('scandir')){
            die('框架插件机制 需要开启 scandir 函数! 请在php.ini的 禁用函数列表中删除它.');
        }
        self::tree(PLUGIN_PATH);
        self::tree(VIEW_PATH);
        foreach (self::$file as $key => &$value) {
            ksort($value);
        }
        //self::filter_file();

    }
    //过滤多余路劲
    static public function filter_file(){
        foreach (self::$include_file as &$v) {
            $v = self::str_replace_path($v);
            
        }
    }
    static public function str_replace_path($a){
        return str_replace(array(INDEX_PATH,'//'),array('','/'),$a);
    }
    //初始化 re.php 替换文件
    static public function init_re(){

    }
    static public function re($code,$file_path){ // code
        
        $key = self::str_replace_path($file_path);
        //echo $key."\r\n";
        if(empty(self::$file))
            self::init_file();
        foreach(self::$re_php as $v){
            if(isset($v[$key])){

                foreach ($v[$key] as $key => $value) {
                    //var_dump(is_file(INDEX_PATH . $key) , is_file(INDEX_PATH . $value));
                    
                    if(is_file(INDEX_PATH . $key) && is_file(INDEX_PATH . $value)){
                        
                        
                        $code = str_replace(
                            file_get_contents(INDEX_PATH . $key),
                            file_get_contents(INDEX_PATH . $value),
                            $code
                        );

                    }
                }
            }

            

        }
        return $code;

            
    }
    static public function encode($code){ //code contents
        //echo $code;
        //echo '插件开启\r\n';
        if(empty(self::$file))
            self::init_file();
        $content = preg_replace_callback('/\/\/{hook (.+?)}/is','self::parseTag',$code);
        $content = preg_replace_callback('/<!--{hook (.+?)}-->/is','self::parseTag',$content);
        $content = preg_replace_callback('/{hook (.+?)}/is','self::parseTag',$content);
        return $content;
    }
    static public function parseTag($tagStr){
        $tag = isset($tagStr[1]) ? $tagStr[1] : '';
        //echo $tag."\r\n";
        $content='';
        if(isset(self::$file[$tag])){
            foreach (self::$file[$tag] as $v) {
                $content.=file_get_contents($v);
            }
        }
        $content = preg_replace_callback('/\/\/{hook (.+?)}/is','self::parseTag',$content);
        $content = preg_replace_callback('/<!--{hook (.+?)}-->/is','self::parseTag',$content);
        $content = preg_replace_callback('/{hook (.+?)}/is','self::parseTag',$content);
        return $content;

    }
    //写入缓存
    static public function put($contents,$path){
        
        file_put_contents($path,$contents);
    }

    //扫描插件hook文件 
    static public function tree($directory){
        //echo $directory."\r\n";
    	$list = scandir($directory); // 得到该文件下的所有文件和文件夹
    	foreach($list as $file){//遍历
    		$file_location=$directory."/".$file;//生成路径
    		if(is_dir($file_location) && $file!="." &&$file!=".."){ //判断是不是文件夹
    			self::tree($file_location); //继续遍历
                
                if(PLUGIN_ON_FILE){ //开启插件是否开启机制
                    if(is_file($file_location .'/on')){
                        if(is_file($file_location . '/re.php')){
                            self::$re_php[]=include $file_location . '/re.php';
                            foreach (self::$re_php[count(self::$re_php)-1] as &$v) {
                                
                                foreach ($v as $key => $vv) {
                                    $v[self::str_replace_path($file_location .'/' . $key)] = self::str_replace_path($file_location .'/'. $vv);
                                    unset($v[$key]);
                                }
                            }

                        }
                        
                    }  
                }
                    

    		}else{
                //echo self::exec($file)."\r\n";
                if(!is_dir($file_location) && self::exec($file) == 'hook' && $file != 'on' && $file != 'install'){
                    //echo "$file_location\r\n";
                    $sy = self::unexe($file);
                 
                    $mun_path = str_replace('//', '/', dirname($file_location));
                    if(PLUGIN_ON_FILE){ //开启插件是否开启机制
                        if(!is_file($mun_path .'/on'))
                            continue;   
                    }
                    
                    

                    $json = array();
                    if(is_file($mun_path .'/p.php')){
                        $json = file($mun_path .'/p.php');
                    }
                    $json = isset($json[1]) ? json_decode($json[1],true) : array();
                    $p = isset($json[$file]) ? intval($json[$file]) : 0;
                    $p=$p*100;
                    //var_dump($p,$file);

                    if(isset(self::$file[$sy])){
                        self::array_px(self::$file[$sy],str_replace('//', '/', $file_location),$p);
                        
                    }
                    else{
                        self::$file[$sy] = array($p=>str_replace('//', '/', $file_location));
                    }
                }

                //echo self::exec($file_location);
            }
    	}
    }
    //获取后缀
    static public function exec($filename){
        return substr(strrchr($filename, '.'), 1);
    }
    //删除后缀
    static public function unexe($name){
        return str_replace(C("HOOK_SUFFIX"),'',$name);
    }
    static public function array_px(&$arr,$v,$i=0){
        //$i=0;
        while(1){
            if(isset($arr[$i])){
                $i++;
                continue;
            }
            $arr[$i]=$v;
            break;
        }
    }



}
