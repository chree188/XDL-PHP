<?php
	/*前后台公用自定义函数*/
	//打印数组	
	function P($arr){
		echo '<pre>' . print_r($arr,true) . '</pre>';	
	}
	/*
	 * 格式化数字至一定的范围
	 * @param integer $number 源数据
	 * @param integer $min 范围最小值，默认为0
	 * @param integer $max 范围最大值，默认为255
	 * @return integer
	 */
	function get_between($number, $min = 0, $max = 255) {
		$number = vsprintf('%d', $number);
		if ($number < $min) $number = $min;
		if ($number > $max) $number = $max;
		return $number;
	}
	/*
	 * 获取数字
	 * @param integer $num 数字
	 * @return integer
	 */
	function get_integer($num) {
		$num = vsprintf('%d', $num);
		if ($num == '') $num = 0;
		return $num;
	}
	/*
	 * 深度转义函数
	 * @param mix $mix 要进行转义的字符串或者数组
	 * @return mix
	 */
	function deep_addslashes($mix) {
		if (get_magic_quotes_gpc()) {
			return $mix;
		} else {
			if (gettype($mix)=="array") {
				foreach($mix as $key=>$value) {
					if (gettype($value)=="array") {
						$mix[$key] = deep_addslashes($value);
					} else {
						$mix[$key]=addslashes($value);
					}
				}
				return $mix;
			} else {
				return addslashes($mix);
			}
		}
	}
	/*
	 * 深度反转义函数
	 * @param mix $mix 要进行转义的字符串或者数组
	 * @return mix
	 */
	function deep_stripslashes($mix) {
		if (gettype($mix)=="array") {
			foreach($mix as $key=>$value) {
				if (gettype($value)=="array") {
					$mix[$key] = deep_stripslashes($value);
				} else {
					$mix[$key]=stripslashes($value);
				}
			}
			return $mix;
		} else {
			return stripslashes($mix);
		}
	}
	/*
	 * 深度转义预定义字符函数
	 * @param mix $mix 要进行转义的字符串或者数组
	 * @return mix
	 */
	function deep_htmlspecialchars($mix, $quotestyle = ENT_QUOTES) {
		if (get_magic_quotes_gpc()) {
			$mix = deep_stripslashes($mix);
		}
		if (gettype($mix) == 'array') {
			foreach ($mix as $key=>$value) {
				if (gettype($value) == 'array') {
					$mix[$key] = deep_htmlspecialchars($value, $quotestyle);
				} else {
					$value = htmlspecialchars($value, $quotestyle);
					$value = str_replace(' ', '&nbsp;', $value);
					$mix[$key] = $value;
				}
			}
			return $mix;
		} else {
			$mix = htmlspecialchars($mix, $quotestyle);
			$mix = str_replace(' ', '&nbsp;', $mix);
			return $mix;
		}
	}
	
	/*
	 * 深度反转义预定义字符函数
	 * @param mix $mix 要进行转义的字符串或者数组
	 * @return mix
	 */
	function deep_htmlspecialchars_decode($mix, $quotestyle = ENT_QUOTES) {
		if (gettype($mix) == 'array') {
			foreach ($mix as $key=>$value) {
				if (gettype($value) == 'array') {
					$mix[$key] = deep_htmlspecialchars_decode($value, $quotestyle);
				} else {
					$value = str_replace('&nbsp;', ' ', $value);
					$value = htmlspecialchars_decode($value, $quotestyle);
					$mix[$key] = $value;
				}
			}
			return $mix;
		} else {
			$mix = str_replace('&nbsp;', ' ', $mix);
			$mix = htmlspecialchars_decode($mix, $quotestyle);
			return $mix;
		}
	}
	
	/*
	 * 使用正则验证数据
	 * @param string $value 要验证的数据
	 * @param string $rule 验证规则
	 * @return boolean
	 */
	function regex($value,$rule) {
		$validate = array(
			'require'=> '/.+/',
			'email' => '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
			'url' => '/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/',
			'currency' => '/^\d+(\.\d+)?$/',
			'number' => '/^\d+$/',
			'zipcode' => '/^[1-9]\d{5}$/',
			'integer' => '/^[-\+]?\d+$/',
			'double' => '/^[-\+]?\d+(\.\d+)?$/',
			'english' => '/^[A-Za-z]+$/',
			'en&num' => '/^[A-Za-z0-9]+$/',
			'twomore' => '/^[\S]{2,14}$/',
			'password' => '/^\w{6,20}$/',
		);
		// 检查是否有内置的正则表达式
		if(isset($validate[strtolower($rule)]))
			$rule   =   $validate[strtolower($rule)];
		return preg_match($rule,$value)===1;
	}
	
	/*
	 * 字符串截取，支持中文和其他编码
	 * @param string $str 需要转换的字符串
	 * @param string $start 开始位置
	 * @param string $length 截取长度
	 * @param string $charset 编码格式
	 * @param string $suffix 截断显示字符
	 * @return string
	 */
	function msubstr($str, $start=0, $length, $suffix=true, $charset="utf-8") {
		if(function_exists("mb_substr"))
			$slice = mb_substr($str, $start, $length, $charset);
		elseif(function_exists('iconv_substr')) {
			$slice = iconv_substr($str,$start,$length,$charset);
			if(false === $slice) {
				$slice = '';
			}
		}else{
			$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			preg_match_all($re[$charset], $str, $match);
			$slice = join("",array_slice($match[0], $start, $length));
		}
		switch (strtolower($charset)) {
			case 'utf-8' :
				if (strlen($str) > $length*3) {
					return $suffix ? $slice.'...' : $slice;
				} else {
					return $slice;
				}
				break;
			default :
				if (strlen($str) > $length) {
					return $suffix ? $slice.'...' : $slice;
				} else {
					return $slice;
				}
		}
	}
	
	/*
	 * 字符串截取，支持中文UTF-8编码[布局用字符串截取]
	 * @param string $str 需要转换的字符串
	 * @param string $start 开始位置
	 * @param string $length 截取长度
	 * @param string $suffix 截断显示字符
	 * @return string
	 */
	function lsubstr($str, $start=0, $length, $suffix=true) {
			$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			preg_match_all($re['utf-8'], $str, $match);
			$i = 0;
			foreach ($match[0] as $key => $value) {
				if (preg_match('/[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}]/', $value)) {
					$i = $i + 2;
				} else {
					$i++;
				}
				if ($i > $length) {
					$length = $key;
					break;
				} elseif ($i == $length) {
					$length = $key +1;
					break;
				}
			}
			$slice = join("",array_slice($match[0], $start, $length));
			if (count($match[0]) > $length) {
				return $suffix ? $slice.'...' : $slice;
			} else {
				return $slice;
			}
	}
/*-----------------------组合一维数组
**
**处理无限级分类-----不管你有多少级分类都会利用parent_id 让parent_id跟父级分类ID相同的分到一类去 并增加level
**递归重组数组 压入level和html 让跟顶级分类ID 跟子分类的parent_id相同 归到一类
**level ::代表分类等级 0：顶级分类 1:二级分类
** html ：分割符
** 返回重组后的数组
**/
function unlimitedForLevel($cate,$html = '--',$pid = 0,$level = 0){
		$arr = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$v['level'] = $level + 1;
				$v['html'] = str_repeat($html,$level);
				$arr[] = $v;
				$arr = array_merge($arr,unlimitedForLevel($cate,$html,$v['id'],$level+1));
			}
		}
		return $arr;
}
/**-----------------------组合多维数组
**
**把分类的parent_id 跟分类的id 相同的子分类压入到父分类的数组里面
**
**超有用的 重组数组 压入数组 方便在模板遍历多维数组 从而数组数据 比如顶级菜单。。
**---------------<volist name="XXX" id="v">  -----<volist name="$v.child" id="">---这样形式的
**/
function unlimitedForLayer($cate,$pid=0){
	$arr = array();
	foreach($cate as $v){
		//给予默认值 目的是：首先从parent_id为0 即：顶级分类开始遍历
		if($v['pid'] == $pid){
			$v['child'] = unlimitedForLayer($cate,$v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}

/**
 * 异位或加密字符串
 * @param  [String]  $value [需要加密的字符串]
 * @param  [integer] $type  [加密解密（0：加密，1：解密）]
 * @return [String]         [加密或解密后的字符串]
 */
function encryption ($value, $type=0) {
	$key = md5(C('ENCTYPTION_KEY'));
	if (!$type) {
		return str_replace('=', '', base64_encode($value ^ $key));
	}
	$value = base64_decode($value);
	return $value ^ $key;
}

/**
 * 格式化时间
 * @param  [type] $time [要格式化的时间戳]
 * @return [type]       [description]
 */
function time_format ($time) {
	//当前时间
	$now = time();
	//今天零时零分零秒
	$today = strtotime(date('y-m-d', $now));
	//传递时间与当前时秒相差的秒数
	$diff = $now - $time;
	$str = '';
	switch ($time) {
		case $diff < 60 :
			$str = $diff . '秒前';
			break;
		case $diff < 3600 :
			$str = floor($diff / 60) . '分钟前';
			break;
		case $diff < (3600 * 8) :
			$str = floor($diff / 3600) . '小时前';
			break;
		case $time > $today :
			$str = '今天&nbsp;&nbsp;' . date('H:i', $time);
			break;
		default : 
			$str = date('Y-m-d H:i:s', $time);
	}
	return $str;
}
/**
 * 经验值转换为等级
 * @param  [type] $exp [description]
 * @return [type]      [description]
 */
function exp_to_level ($exp) {
	switch (true) {
		case $exp >= C('LV20') :
			return 20;
		case $exp >= C('LV19') :
			return 19;
		case $exp >= C('LV18') :
			return 18;
		case $exp >= C('LV17') :
			return 17;
		case $exp >= C('LV16') :
			return 16;
		case $exp >= C('LV15') :
			return 15;
		case $exp >= C('LV14') :
			return 14;
		case $exp >= C('LV13') :
			return 13;
		case $exp >= C('LV12') :
			return 12;
		case $exp >= C('LV11') :
			return 11;
		case $exp >= C('LV10') :
			return 10;
		case $exp >= C('LV9') :
			return 9;
		case $exp >= C('LV8') :
			return 8;
		case $exp >= C('LV7') :
			return 7;
		case $exp >= C('LV6') :
			return 6;
		case $exp >= C('LV5') :
			return 5;
		case $exp >= C('LV4') :
			return 4;
		case $exp >= C('LV3') :
			return 3;
		case $exp >= C('LV2') :
			return 2;
		default : 
			return 1;
	}
}
