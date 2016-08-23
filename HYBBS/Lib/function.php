<?php
//计算时间间隔
function humandate($timestamp) {
	$seconds = $_SERVER['REQUEST_TIME'] - $timestamp;
	if($seconds > 31536000) {
		return date('Y-n-j', $timestamp);
	} elseif($seconds > 2592000) {
		return floor($seconds / 2592000).'月前';
	} elseif($seconds > 86400) {
		return floor($seconds / 86400).'天前';
	} elseif($seconds > 3600) {
		return floor($seconds / 3600).'小时前';
	} elseif($seconds > 60) {
		return floor($seconds / 60).'分钟前';
	} else {
		return $seconds.'秒前';
	}
}

//获取插件配置 数据
function get_plugin_inc($plugin_name){
  
	if(!is_file(PLUGIN_PATH . "{$plugin_name}/inc.php")){
		return false;
  }

	//echo PLUGIN_PATH . "{$plugin_name}/inc.php";
	$path = PLUGIN_PATH . "{$plugin_name}/inc.php";
	$file = file($path);
  if($file[1]=='{}') $file['1'] = '{"hy_plugin":"on"}';
	return json_decode($file[1],true);
}
//获取插件安装状态
function get_plugin_install_state($plugin_name){
	if(!is_file(PLUGIN_PATH . "{$plugin_name}/install"))
		return false;
	return true;
}
//判断插件是否支持安装卸载函数
function is_plugin_function($name){
	if(!is_file(PLUGIN_PATH . "{$name}/function.php"))
		return false;
	return true;
}
//判断插件目录是否存在
function is_plugin_dir($name){
  if(!is_dir(PLUGIN_PATH . "{$name}"))
    return false;
  return true;
}
//判断插件是否开启
function is_plugin_on($name){
  if(!is_file(PLUGIN_PATH . "{$name}/on"))
    return false;
  return true;
}
//删除目录
function deldir($dir) {
  if(!is_dir($dir))
    return true;
  $dh=opendir($dir);
  while ($file=readdir($dh)) {
    if($file!="." && $file!="..") {
      $fullpath=$dir.'/'.$file;
      if(!is_dir($fullpath)) {
          unlink($fullpath);
      } else {
          deldir($fullpath);
      }
    }
  }

  closedir($dh);
  if(rmdir($dir)) {
    return true;
  } else {
    return false;
  }
}
//计算两时间相隔天数
function diffBetweenTwoDays ($day1, $day2)
{
  $second1 = ($day1);
  $second2 = ($day2);

  if ($second1 < $second2) {
    $tmp = $second2;
    $second2 = $second1;
    $second1 = $tmp;
  }
  return intval(($second1 - $second2) / 86400);
}
//下载文件 参数  保存路劲文件名 , 参数 下载地址
function http_down($save_to,$file_url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch,CURLOPT_URL,$file_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $file_content = curl_exec($ch);
    curl_close($ch);



    $downloaded_file = fopen($save_to, 'w');
    fwrite($downloaded_file, $file_content);
    fclose($downloaded_file);

}
//该用户是否是该分类的版主
//forum = 分类数组
//uid = 用户ID
//fid = 分类ID
function is_forumg($forum,$uid,$fid){
  //echo $uid;
  $forumg = isset($forum[$fid]['forumg'])? $forum[$fid]['forumg'] : array();
  if(empty($forumg))
    return false;

  $arr = explode(",",$forumg);
  if(array_search($uid,$arr) !== false) //是版主
    return true;
  return false;

}
//该用户组 在该分类下 的该功能下 是否有权限
//分类ID
//用户组
//功能
//分类数组
// is_group_forum($fid,NOW_GROUP,'vthread',$forum) 在$fid分类下是否可以浏览thread
function is_group_forum($fid,$group,$gn,$forum){

  if(empty($forum[$fid]['json']))
    return true;
  $data = $forum[$fid]['json'];

  $json = json_decode($data,true);

  // 如果设置有,返回则 返回值 , 
  $str = isset($json[$gn]) ? $json[$gn] : true ;
  if($str===true)
    return true;
  $arr = explode(",",$str);
  
  foreach ($arr as $v) {
      if($v == $group)
          return false;
  }
  return true;
}

//获取板块KEY信息
function forum($forum,$id,$key){
  return isset($forum[$id][$key]) ? $forum[$id][$key] : '分类已被删除';
}

//随机字符
function rand_str($size){
  $str = '';
  $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
  $max = strlen($strPol)-1;
  for($i=0;$i<$size;$i++){
  $str.=$strPol[rand(0,$max)];
  }
  return $str;
}
//随机验证码
function rand_code($size){ //去除了比较相似的字符 比如:0,O I J L 等.
  $str = '';
  $strPol = "ABCDEFGHKMNPQRSTUVWXYZ123456789";
  $max = strlen($strPol)-1;
  for($i=0;$i<$size;$i++){
  $str.=$strPol[rand(0,$max)];
  }
  return $str;
}
function del_cache_file($conf){
  deldir(TMP_PATH);
  
  if($conf['cache_type'])
      C("DATA_CACHE_TYPE",$conf['cache_type']);
  if($conf['cache_table'])
      C("DATA_CACHE_TABLE",$conf['cache_table']);

  if($conf['cache_key'])
      C("DATA_CACHE_KEY",$conf['cache_key']);
  if($conf['cache_time'])
      C("DATA_CACHE_TIME",$conf['cache_time']);
  

  if($conf['cache_pr'])
      C("DATA_CACHE_PREFIX",$conf['cache_pr']);
  if($conf['cache_ys'] == 'on')
      C("DATA_CACHE_COMPRESS",true);
  if($conf['cache_outtime'])
      C("DATA_CACHE_TIMEOUT",$conf['cache_outtime']);
  if($conf['cache_redis_ip'])
      C("REDIS_HOST",$conf['cache_redis_ip']);
  if($conf['cache_redis_port'])
      C("REDIS_PORT",$conf['cache_redis_port']);

  if($conf['cache_mem_ip'])
      C("MEMCACHE_HOST",$conf['cache_mem_ip']);
  if($conf['cache_mem_port'])
      C("MEMCACHE_PORT",$conf['cache_mem_port']);
  if($conf['cache_memd_ip']){
      $arr = explode("\r\n",$conf['cache_memd_ip']);
      $options=array();
      foreach ($arr as $v) {
          array_push($options,explode(":",$v));
      }
      C("MEMCACHED_SERVER",$options);
  }

  cache(array())->clear();

}

function log_time(){
  $_SERVER['hy_time'] = microtime(TRUE);
}
function end_time(){
  return microtime(TRUE) - $_SERVER['hy_time'];
}

function view_form($name,$value){
    static $arr = array();

    if(empty($arr)){
        if(!is_file(VIEW_PATH . "{$name}/inc.php"))
            return false;
        $path = VIEW_PATH . "{$name}/inc.php";
        $file = file($path);
        if($file[1]=='{}') 
            $file['1'] = '{"hy_plugin":"on"}';
        $arr = json_decode($file[1],true);
        return isset($arr[$value]) ? $arr[$value] : '';
    }
    return isset($arr[$value]) ? $arr[$value] : '';
}


function get_view_inc($name){
    if(!is_file(VIEW_PATH . "{$name}/inc.php"))
        return false;
    $path = VIEW_PATH . "{$name}/inc.php";
    $file = file($path);
    if($file[1]=='{}') $file['1'] = '{"hy_plugin":"on"}';
        return json_decode($file[1],true);
}