<?php
//前台公用控制器
class CommonAction extends Action{
	 //自动运行的方法
	public function _initialize () {
        //处理自动登录
        if (isset($_COOKIE['auto']) && !isset($_SESSION['uid'])) {
            $value = explode('||', encryption($_COOKIE['auto'], 1));
            $ip = get_client_ip();
            $username = $value[0];
            $where = array('username' => $username);
            //array('id', 'lock','email','login_time','login_ip')
            $user = M('user')->where($where)->field('id,lock,username,login_time,login_ip')->find();
            if($user){
                //如果上一次写入数据库的登录IP跟 这次IP跟一样
                if($user['login_ip'] == $ip){
                    if($user['lock']){
                        session('uid', $user['id']);
                        session('username', $user['username']);
                        //每天自动登录增加经验 积分
                        $today = strtotime(date('Y-m-d'));
                        if ($user['login_time'] < $today) {
                            M('user')->where(array('id' => $user['id']))->setInc('exp', C('POINT_LOGIN'));
                            M('user')->where(array('id' => $user['id']))->setInc('point', C('LEVEL_LOGIN'));
                        }
                        M('user')->where(array('id' => $user['id']))->save(array('login_time' => time()));
                    }
                }
            }
        }
        //获取当前登录用户的信息
        $objUser = M('user');
        if(isset($_SESSION['uid']) && isset($_SESSION['username'])){
            $userInfo = $objUser->where('id='.$_SESSION['uid'])->field('id,username,face,point,exp,introduce,email,reg_time,login_time,ask_num,adopt_num,answer_num')->find();
            $this->assign('userInfo',$userInfo);
            //通知未读评论条数
            $commentNum = $this->getCommentMsg(array('status'=>"0",'reply_uid'=>session('uid')),'count');
            $this->assign('commentNum',$commentNum);
            //通知未读私信条数
            $letterNum = $this->getLetterMsg(array('status'=>"0",'receive_uid'=>$_SESSION['uid']),'count');
            $this->assign('letterNum',$letterNum);
            //通知支招被采纳
            $bestNum = M('best')->where(array('uid'=>$_SESSION['uid'],'status'=>"0"))->count();
            $this->assign('bestNum',$bestNum);
            //通知未读私信+评论总数
            $tipNums = $commentNum + $letterNum + $bestNum;
            $this->assign('tipNums',$tipNums);
        }
        //友情链接
        $this->linkList = M('linktxt')->where('status = "1"')->field('link_name,link_url')->limit(25)->order('id asc')->select();
		//关于我们
        $aboutUs = M('single')->where('id=1')->getField('content');
        $aboutUs = deep_htmlspecialchars_decode($aboutUs);
        $this->assign('aboutUs',$aboutUs);
       // 微信二维码
        $this->weixin = M('ad')->where('id=12')->getField('ad_pic');
       //获取站点信息
        $this->siteInfo = M('site')->where('id=1')->field('site_name,icp')->find();
       //获取整站最新
        $this->newAllList = $this->getAllNew();
       //获取整站最悬赏
        $this->rewardAllList = $this->getAllReward();
        //获取整站最支招
        $this->commentAllList = $this->getAllComment();
	}
    //获取全站最新
    protected function getAllNew(){
        $objAsk = M('ask');
        $newList = $objAsk->field('id,ask_name')->order('add_time desc')->limit(10)->select();
        $newList = deep_htmlspecialchars_decode($newList);
        return $newList;
    }
    //获取全站最悬赏
    protected function getAllReward(){
        $objAsk = M('ask');
        $rewardList = $objAsk->field('id,ask_name')->order('reward desc')->limit(10)->select();
        $rewardList = deep_htmlspecialchars_decode($rewardList);
        return $rewardList;
    }
    protected function getAllComment(){
        $objAsk = M('ask');
        $commentList = $objAsk->field('id,ask_name')->order('comment_num desc')->limit(10)->select();
        $commentList = deep_htmlspecialchars_decode($commentList);
        return $commentList;
    }
	/*
	*判断是否登录
	*/
	protected function isLogin(){
		if (!isset($_SESSION['uid']) && !isset($_SESSION['email'])) {
			$this->error('您还未登录',U(APP_NAME.'/Login/index'));
		}
	}
	
	/*
	*读取评论消息
	*查询条件 $where
	*查询方法 $method
	*/
	protected function getCommentMsg($where,$method) {
		$objComment = M('comment');
		$data = $objComment->where($where)->order('time desc')->$method();
		$data = deep_htmlspecialchars_decode($data);
		return $data;
	}
	
	/*
	*读取私信消息
	*查询条件 $where
	*查询方法 $method
	*/
	protected function getLetterMsg($where,$method) {
		$objLetter = M('letter');
		$data = $objLetter->where($where)->order('time desc')->$method();
		$data = deep_htmlspecialchars_decode($data);
		return $data;
	}
	 
	/*
	 * 专门处理文件图片上传
	 * @param string $path 保存文件夹的名称
	 * @param string $width 缩略图宽度 多个用逗号分隔
	 * @param string $height 缩略图高度 多个用逗号分隔  必须要与宽度一一对应
	 * @return array [图片上传信息]
	 */
	protected function imgUpload($path,$width,$height) {
		import('ORG.Net.UploadFile'); //引入THINK上传类
		$obj = new UploadFile(); //实例化上传类
		$obj->maxSize = C('UPLOAD_MAX_SIZE'); //图片最大上传大小
		$obj->savePath = C('UPLOAD_PATH') .$path .'/'; //图片保存路径
		$obj->saveRule = 'uniqid'; //保存文件名
		$obj->uploadReplace = true; //是否覆盖同名文件 是
		$obj->allowExts = C('UPLOAD_EXTS'); //允许上传文件后缀名
		$obj->thumb = true; //生成缩略图
		$obj->thumbMaxWidth = $width; //缩略图宽度
		$obj->thumbMaxHeight = $height; //缩略图高度
		$obj->thumbPrefix = 'tbl'; //缩略图文件前缀
		$obj->thumbPath = $obj->savePath .date('Y_m') .'/'; //缩略图保存路径 让跟上传图片路径一样
		$obj->thumbRemoveOrigin = true; //删除原图
		$obj->autoSub = true;//使用子目录保存上传文件
		$obj->subType = 'date'; //使用日期为子目录名称
		$obj->dateFormat = 'Y_m'; //使用年-月形式
		if(!$obj->upload()){
			return array('status'=>0, 'msg'=>$obj->getErrorMsg());	
		}else{
			$info = $obj->getUploadFileInfo();
			$pic = explode('/',$info[0]['savename']);
			return array(
				'status' => 1,
				'path' => $pic[0] .'/tbl'. $pic[1]
			);
		}
		
	}
	
	/* 空操作 */
    public function _empty() {
		header("HTTP/1.0 404 Not Found");
		//获取title信息
		$pageTitle = '404错误 - 支招网';
		$this->assign('pageTitle', $pageTitle);
		//模板设置
		$temp404 = 5;
		$this->display('Public/static/Temp-404/'.$temp404.'/index.htm');
    }

	/* 404错误 */
    public function error404() {
		header('Location:?m=empty');
		exit();
	}
	
	/*
	 * 按照规则检查字段
	 * @param string $field 要检查的字段
	 * @param string $value 检查字段的值
	 * @param string $rule 检查规则，支持正则表达式
	 * @param string $prompt 检查不符合规则时的提示文字
	 * @param string $extra 额外的参数，例如在检查唯一性时，传递数据表名称
	 * @param string $extend 额外的搜索条件
	 * @return string
	 */
	protected function checkField($field, $value, $rule, $prompt, $extra = '', $extend = '') {
		$result = true;
		switch ($rule) {
			case 'unique' :
				$obj = M($extra);
				$where = $field.'=\''.$value.'\'';
				if ($extend != '') $where .= ' and '.$extend;
				$data = $obj->where($where)->find();
				$data = deep_htmlspecialchars_decode($data);
				if ($data != '') $result = false;
				break;
			case 'uniform' :
				if ($field != $value) $result = false;
				break;
			default :
				$result = regex($value,$rule);
		}
		if (!$result) $this->error($prompt);
	}
	
	/*
	 * 获取分类及其子类的ID
	 * + 将分类及其子类以ID,ID,ID的形式组织后返回
	 * @param string $table 数据表
	 * @param integer $id 父ID
	 * @param beolean $isChild 是否是在进行子循环，若是子循环，返回值前会附有逗号
	 * @return string
	 */
	 protected function getIdList($table, $id, $isChild = false) {
		$obj = M($table);
		$id = get_integer($id);
		$data = $obj->field('`id`')->where('`parent_id`='.$id)->select();
		$data = deep_htmlspecialchars_decode($data);
		foreach ($data as $value) {
			$string = $string .','. $value['id'];
			$string = $string . $this->getIdList($table, $value['id'], true);
		}
		if ($isChild) {
			return $string;
		} else {
			return $id . $string;
		}
	 }
	 
	/*
	 * 获取评论及其子评论的ID
	 * + 将分类及其子类以ID,ID,ID的形式组织后返回
	 * @param string $table 数据表
	 * @param integer $id 父ID
	 * @param beolean $isChild 是否是在进行子循环，若是子循环，返回值前会附有逗号
	 * @return string
	 */
	 protected function getCidList($table, $id, $different, $isChild = false) {
		$obj = M($table);
		$id = get_integer($id);
		$data = $obj->field('`id`')->where(array('pid'=>$id,'different'=>$different))->select();
		$data = deep_htmlspecialchars_decode($data);
		foreach ($data as $value) {
			$string = $string .','. $value['id'];
			$string = $string . $this->getIdList($table, $value['id'], $different, true);
		}
		if ($isChild) {
			return $string;
		} else {
			return $id . $string;
		}
	 }
	 
	/*
	 * 获取多级分类的分类列表
	 * + 将分类列表以数组的形式读取出来
	 * @param string $table 分类所在的数据表名（不需要添加数据表前缀）
	 * @param integer $parent_id 该分类作为父类的ID
	 * @param string $maxGrade 分类显示深度，-1表示不限制级数
	 + 例如 $maxGrade 的值为2， 则会罗列出$parent_id级别下（包括该级）2级分类，3级及其以上的分类就不会显示
	 * @param string $extend 扩展查询条件
	 * @param string $order 排序方式
	 * @param string $order 返回记录限制
	 * @param string $grade 当前分类级数
	 * @return array
	 */
	protected function getSortList($table, $parent_id=0, $maxGrade = -1, $extend='', $order = '`sequence` asc, `id` asc', $limit='', $grade = 1) {
		if ($maxGrade === -1 || $grade <= $maxGrade) {
			$obj = M($table);
			if ($extend === '') {
				$where = '`parent_id` = '.$parent_id;
			} else {
				$where =$extend . ' AND `parent_id`='.$parent_id;
			}
			$list = $obj->where($where)->order($order)->limit($limit)->select();
			$list = deep_htmlspecialchars_decode($list);
			foreach ($list as $key => $value) {
				$list[$key]['child_sort'] = $this->getSortList($table, $value['id'], $maxGrade, $extend, $order, $limit, $grade+1);
			}
			return $list;
		}
	}
}