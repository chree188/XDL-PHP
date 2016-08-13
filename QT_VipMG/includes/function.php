<?php 
	/**
	 * [notice 提示并跳转]
	 * @param  [string]  $notice [提示内容]
	 * @param  string    $url    [跳转地址]
	 * @param  integer   $time   [跳转时间]
	 */
	function notice($notice, $url='', $time=1){
		if($url == ''){
			$url = $_SERVER['HTTP_REFERER'];
		}

		echo "<div style='width: 100%;height: 100%;background-color: rgba(0,0,0,0.8); position:absolute;'></div>";
		echo "<div style='width: 500px; height: 100px;position:absolute; left:35%; top:40%; background: #fff; text-align:center; line-height:80px; color:#347AB6;'>".$notice."</div>";
		echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
		exit;
	}


	/**
	 * [query 专业查询sql]
	 * @param  [string ] $sql [sql查询语句]
	 * @return [array]     [查询的结果, 以二维数组形式返回]
	 * @return [bool]      [查询失败则返回false]
	 */
	function query($sql){
		if(empty($sql)){
			die('必须传入sql语句');
		}

		$link = $GLOBALS['link'];

		// 6. 执行sql语句
		$result = mysqli_query($link, $sql);
		
		if($result  && mysqli_affected_rows($link) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$list[] = $row;
			}
			return $list;
		}

		return false;
	}

	/**
	 * [zsg 增删改操作]
	 * @param  [string] $sql [sql语句]
	 * @return [type]      [description]
	 */
	function zsg($sql){
		if(empty($sql)){
			die('必须传入sql语句');
		}

		$link = $GLOBALS['link'];
		$result = mysqli_query($link,$sql);

		if($result && mysqli_affected_rows($link) > 0){

			if(mysqli_insert_id($link)){
				return mysqli_insert_id($link);
			}else{
				return mysqli_affected_rows($link);
			}
		}
		return false;
	}



	/**
	 * [page 分页]
	 * @param  [string]  $sql 	[分页的查询语句]
	 * @param  integer   $num   [每页的显示的条数]
	 * @return [array]   $result   [分页的html代码, 查询的结果]
	 */
	function page($sql, $num=3){
		// 判断sql是否为空
		if(empty($sql)){
			die('必须传入sql语句');
		}

		$page = empty($_GET['page'])? 1 : $_GET['page'] ;

		// 获取 总条数
		$sum = query($sql);
		$sum = count($sum);

		// 总页数
		$amount =  ceil($sum / $num);

		$page = max($page,1);   // 最小不能小于1
		$page = min($page,$amount);   // 最大不能大于4

		// 偏移量
		$offset = ($page-1)*$num;

		// 上一页, 下一页
		$next = min($page + 1, $amount);
		$prev = max($page - 1, 1);

		// 拼接sql语句
		$sql .= ' limit '.$offset.','.$num;
		
		$list = query($sql);

		$script_name = basename($_SERVER['SCRIPT_NAME']);

		// 动态生成  页码链接
		$num_list = '';
		for($i = 1; $i <= $amount; $i++){
			$num_list .= " <a href='{$script_name}?page={$i}'  class='pc'>{$i}</a> ";
		}

		$str = "
			<div class='page'>
				<a href='{$script_name}?page=1' class='pc'>首页</a>
				<a href='{$script_name}?page={$prev}' class='pc'>上一页</a>
				{$num_list}
				<a href='{$script_name}?page={$next}' class='pc'>下一页</a>
				<a href='{$script_name}?page={$amount}' class='pc'>尾页</a>
			</div>
		";

		$result[] = $str;
		$result[] = $list;
		return $result;
	}


	/**
	 * [ 上传文件 ] 
	 * @return string  $name 	 	[上传表单名]
	 * @return string  $save_path	[文件存储目录]
	 * @return array   $allow_type	[允许的文件类型]
	 * @return 成功则返回 filename   否则返回错误信息(数组)
	 */
	function upload($name='file', $save_path='./uploads/', $allow_type= array('image')){
		$error = array();

		// 1. 判断错误   error > 0 代表上传有误
		if($_FILES[$name]['error'] > 0){
			switch($_FILES[$name]['error']){
				case 1:
					$error[] = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
					break;
				case 2:
					$error[] = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。';
					break;
				case 3:
					$error[] = '文件只有部分被上传。 ';
					break;
				case 4:
					$error[] = '没有文件被上传。';
					break;
				case 6:
					$error[] = '找不到临时文件夹。';
					break;
				case 7:
					$error[] = '文件写入失败。';
					break;
			}
			return $error;
		}

	// 2. 判断文件类型
		list($type,$suffix) = explode('/',$_FILES[$name]['type']);
		// echo $type;
	
		// in_array()  判断第一个参数是否在第二个参数里面, 在就返回true ,不在就返回false
		if(  !in_array($type, $allow_type)){
			$error[] = '不合法的文件类型';
			return $error;
		}

	// 3. 产生新的文件名
			// uniqid()  产生基于微秒生成的唯一id
			$filename =  date('Ymd').uniqid().'.'.$suffix;
			// echo $filename;
			// exit;

	// 4.  创建 存储目录
			$dir = $save_path;
			$dir .= date('Y').'/';
			$dir .= date('m').'/';
			$dir .= date('d').'/';

			if( !file_exists($dir)){
				mkdir($dir,0777,true);
			}
		
	// 5.  is_uploaded_file() 判断是不是从http  post 上传的
		if(  !is_uploaded_file($_FILES[$name]['tmp_name']) ){
			$error[] = '小子, 别黑我......';
			return $error;
		}


	// 6.  move_uploaded_file()  移动文件到指定 目录中
		if(  !move_uploaded_file($_FILES[$name]['tmp_name'], $dir.$filename) ){
			$error[] = '上传失败';
			return $error;
		}

		return $filename;

	}


	/**
	 * 缩放函数  zoom
	 * @param string  $img_path   图片路径
	 * @param int  $width   缩放后的宽度
	 * @param int  $height   缩放后的高度
	 * @return  bool  缩放成功则返回true ,否则返回false
	 */
	
	function zoom($img_path, $width=200, $height=200){
		// 返回打开的资源信息
		$arr = autoOpen($img_path);

		// 等比缩放
		$src_width = $arr['width'];
		$src_height = $arr['height'];

		if($src_width > $src_height){
			$height = $src_height/($src_width/$width);
			$pre = $width.'_';
		}else{
			$width = $src_width/($src_height/$height);
			$pre = $height.'_';
		}

		$dst = imagecreatetruecolor($width,$height);

		$src = $arr['resource'];

		// 缩放函数
		imagecopyresampled($dst, $src, 0,0,0,0,$width,$height, $src_width,$src_height);

		$save_path = dirname($img_path) .'/'. $pre. basename($img_path);

		$func = 'image' . ltrim( strrchr($arr['mime'],'/') ,'/');
		$return =  $func($dst,$save_path);
		imagedestroy($dst);
		imagedestroy($src);
		return  $return;
	}

	/**
	 * [autoOpen 图片自动打开]
	 * @param  [string]  $img_path 	[]
	 * @return [source]   $img_info   []
	 */
	function autoOpen($img_path){
		$arr = getimagesize($img_path);
		$img_info['width'] = $arr[0];
		$img_info['height'] = $arr[1];
		$img_info['mime'] = $arr['mime'];

		// 返回 字符串最后一次出现的字符一直到结束
		// strrchr(字符串,从哪开始);
		// ltrim(字符串,特殊字符)
		$func = 'imagecreatefrom' . ltrim( strrchr($img_info['mime'],'/') ,'/')  ;
		$img_info['resource']  = $func($img_path);
		return $img_info;
	}

	/**
	 * [up_img 图片上传并缩放保存]
	 * @param  string  $img_name  [图片名]
	 * @param  string  $save_path [保存路径]
	 * @param  integer $size1     [缩放尺寸1]
	 * @param  integer $size2     [缩放尺寸2]
	 * @param  integer $size3     [缩放尺寸3]
	 * @return [string]           [文件名]
	 */
	function up_img($img_name='icon', $save_path, $size1= 50, $size2=240, $size3=360){
			// 上传图片
			$filename = upload($img_name, $save_path);

			// 图片保存路径
			$filepath = $save_path;
			$filepath .= substr($filename,0,4).'/';
			$filepath .= substr($filename,4,2).'/';
			$filepath .= substr($filename,6,2).'/';
			$filepath .= $filename;

			// 缩放
			if(
				!zoom($filepath,$size1,$size1) ||
				!zoom($filepath,$size2,$size2) || 
				!zoom($filepath,$size3,$size3)
			){
				// 图片缩放失败, 则删除之前上传的图片
				unlink($filepath);
				notice('缩放图片失败');
			}
			
		return $filename;
	}

	/**
	 * [img_url 图片存放路径]
	 * @param  string  $filename  [图片名]
	 * @return [string] $filepath [文件路径]
	 */
	function img_url($filename,$pre=50){
		$filepath = URL.'uploads/';
		$filepath .= substr($filename,0,4).'/';
		$filepath .= substr($filename,4,2).'/';
		$filepath .= substr($filename,6,2).'/';
		$filepath .= $pre.'_'.$filename;
		return $filepath;
	}