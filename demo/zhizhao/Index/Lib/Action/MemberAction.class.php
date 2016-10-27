<?php
/*
*前台会员中心
*/
class MemberAction extends CommonAction {
	//用户中心首页视图
	public function index() {
		parent::isLogin(); //登录判断
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();


		$this->display();
	}
	//我的提问----所有文章
	public function article() {
		parent::isLogin(); //登录判断
		$Model = M('ask');
		import('ORG.Util.Page');//导入分页类
        $where = array('uid'=>$_SESSION['uid']);
		$count = $Model->where($where)->count();
		$this->assign('articleAllNum',$count);
		$page = new page($count,12);
		$page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %downPage%');
		$articleList = $Model->where($where)->field('id,ask_name,add_time')->order('add_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$articleList = deep_htmlspecialchars_decode($articleList);
		$show = $page->show();
		$this->assign('articleList',$articleList);
		$this->assign('page',$show);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
		$this->display();
	}	
	// 我的消息
	public function comment() {
		parent::isLogin(); //登录判断
		$objUser = M('user');
		$objAsk = M('ask');
		$commentList = parent::getCommentMsg(array('status'=>"0",'reply_uid'=>$_SESSION['uid']),'select');
		foreach($commentList as $k1=>$v1){
			$comment_user = $objUser->where('id='.$v1['comment_uid'])->field('username,face')->find();
			$reply_user = $objUser->where('id='.$v1['reply_uid'])->getField('username');
			$commentList[$k1]['comment_user'] = $comment_user['username'];	
			$commentList[$k1]['reply_user'] = $reply_user;
			$commentList[$k1]['comment_user_face'] = $comment_user['face'];
			$commentList[$k1]['article_name'] = $objAsk->where('id='.$v1['aid'])->getField('ask_name');
		}
		$this->assign('commentList',$commentList);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
		$this->display();	
	}
    //我的回答
    public function answer() {
        parent::isLogin(); //登录判断
        $Model = M('comment');
        import('ORG.Util.Page');//导入分页类
        $where = array('comment_uid'=>$_SESSION['uid']);
        $count = $Model->where($where)->count();
        $this->assign('articleAllNum',$count);
        $page = new page($count,12);
        $page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %downPage%');
        $articleList = $Model->where($where)->field('id,comment,aid,time')->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $articleList = deep_htmlspecialchars_decode($articleList);
        $show = $page->show();
        $this->assign('articleList',$articleList);
        $this->assign('page',$show);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
        $this->display();
    }
	// 我的未读私信
	public function letter() {
		parent::isLogin(); //登录判断
		$objLetter = M('letter');
		import('ORG.Util.Page');//导入分页类
		$count = $objLetter->where('receive_uid='.$_SESSION['uid'].' AND status="0"')->count();
		$page = new page($count,12);
		$letterList = $objLetter->where('receive_uid='.$_SESSION['uid'].' AND status="0"')->field('id,send_uid,send_user,title,time')->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($letterList as $k1=>$v1){
			$face = M('user')->where('id='.$v1['send_uid'])->getField('face');
			$letterList[$k1]['face'] = $face;
		}
		$letterList = deep_htmlspecialchars_decode($letterList);
		$show = $page->show();
		$this->assign('letterList',$letterList);
		$this->assign('page',$show);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
		$this->display();	
	}
	//我的已读私信
	public function readedLetter() {
		parent::isLogin(); //登录判断
		$objLetter = M('letter');
		import('ORG.Util.Page');//导入分页类
		$count = $objLetter->where('receive_uid='.$_SESSION['uid'].' AND status="1"')->count();
		$page = new page($count,12);
		$letterList = $objLetter->where('receive_uid='.$_SESSION['uid'].' AND status="1"')->field('id,send_uid,send_user,title,time')->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($letterList as $k1=>$v1){
			$face = M('user')->where('id='.$v1['send_uid'])->getField('face');
			$letterList[$k1]['face'] = $face;
		}
		$letterList = deep_htmlspecialchars_decode($letterList);
		$show = $page->show();
		$this->assign('letterList',$letterList);
		$this->assign('page',$show);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
		$this->display();	
	}
	//单独修改 私信是否已读的status
	public function mlStatus() {
		parent::isLogin(); //登录判断
		$id = intval($_GET['id']);
		if($id == ''){
			parent::error404();	
		}
		$objLetter = M('letter');
		$result = $objLetter->where('id='.$id.' AND status="0"')->field('id')->find();	
		if($result){
			$objLetter->where('id='.$id)->setField('status','1');
			$this->redirect('Member/letterCon',array('id'=>$id));
		}else{
			$this->error('系统繁忙，请稍后再试...');	
		}
	}
	//我的私信 详情页
	public function letterCon() {
		parent::isLogin(); //登录判断
		$id = intval($_GET['id']);
		if($id == ''){
			parent::error404();	
		}
		$objLetter = M('letter');
		$letterContent = $objLetter->where('id='.$id.' AND status="1"')->field('id,send_uid,title,content,time,send_user')->find();
		if($letterContent == '') parent::error404();	
		$letterContent = deep_htmlspecialchars_decode($letterContent);
		$this->assign('letterContent',$letterContent);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
		$this->display();	
	}
	//我的收藏
	public function collect() {
		parent::isLogin(); //登录判断
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
		$this->display();	
	}

	//修改用户名 昵称
	public function nameNew() {
		if(!IS_POST) parent::error404();	
		parent::isLogin(); //登录判断
		$objUser = M('user');
		$POST = deep_htmlspecialchars($_POST);
		parent::checkField('username',$POST['username'],'require','用户名不能为空');
		$result = $objUser->where(array('username'=>$POST['username']))->getField('id');
		if($result){
			$this->error('用户名已经存在，请重试！');
		}
		$data = array();
		$data['username'] = $POST['username'];
		$db = $objUser->where(array('id'=>$POST['uid']))->save($data);
		if($db){
			$this->success('修改成功...',U(APP_NAME .'/Member/index'));	
		}else{
			$this->error('修改失败...',U(APP_NAME .'/Member/index'));	
		}
	}
	//修改个性签名
	public function introduceNew() {
		if(!IS_POST) parent::error404();
		parent::isLogin(); //登录判断
		$objUser = M('user');
		$POST = deep_htmlspecialchars($_POST);
		parent::checkField('introduce',$POST['introduce'],'require','个性签名不能为空');
		$data = array();
		$data['introduce'] = $POST['introduce'];
		$db = $objUser->where(array('id'=>$POST['uid']))->save($data);
		if($db){
			$this->success('修改成功...',U(APP_NAME .'/Member/index'));	
		}else{
			$this->error('修改失败...',U(APP_NAME .'/Member/index'));	
		}
	}
	//修改密码
	public function pwdNew() {
		if(!IS_POST) parent::error404();	
		parent::isLogin(); //登录判断
		$objUser = M('user');
		$POST = deep_htmlspecialchars($_POST);
		parent::checkField('oldpass',$POST['oldpass'],'require','当前密码不能为空');
		parent::checkField('newpass',$POST['newpass'],'require','新密码不能为空');
		parent::checkField('newpass',$POST['newpass'],'password','密码必须由6-20个字母，数字，下划线组成');
		parent::checkField('renewpass',$POST['renewpass'],'require','重复新密码不能为空');
		$dbPwd = $objUser->where(array('id'=>$POST['uid']))->getField('password');
		if($dbPwd != md5($POST['oldpass'])){
			$this->error('当前密码验证不正确');	
		}
		if($POST['newpass'] != $POST['renewpass']){
			$this->error('新密码前后重复不一致');	
		}
		$data = array();
		$data['password'] = md5($POST['newpass']);
		$db = $objUser->where(array('id'=>$POST['uid']))->save($data);
		if($db){
			$this->success('修改成功...',U(APP_NAME .'/Member/index'));	
		}else{
			$this->error('修改失败...',U(APP_NAME .'/Member/index'));	
		}
	}
	//头像上传处理 Upload插件处理方法
	public function uploadFace() {
		if(!IS_POST) parent::error404();	
		parent::isLogin(); //登录判断
		$upload = parent::imgUpload('Face', '180', '180'); //调用Common控制器的图片上传方法
		echo json_encode($upload); //把数组转化成json信息
	}
	//修改用户图像把上传的图片保存到数据库
	public function editFace() {
		if(!$this->_post()) parent::error404(); //不是POST 抛出页面错误
		parent::isLogin(); //登录判断
		$objUser = M('user');
		$POST = deep_htmlspecialchars($_POST);
		$where = array('id'=>session('uid'));
		$old = $objUser->where($where)->getField('face');
		if($objUser->where($where)->save(array('face'=>$POST['facePath']))){
			if($old){
				@unlink('./'.$old); //这里一定要加一个 ./ 代表的是相对于入口文件的当前目录中的旧图片的路径，不然找不了，删除不了
			}
			$this->success('修改成功',U(APP_NAME .'/Member/index'));
		}else {
			$this->error('修改失败,请稍后再试....');	
		}
	} 
	//发送私信
	public function addLetter() {
		parent::isLogin(); //登录判断
		$userId = intval($_GET['user_id']);
		$objLetter = M('letter');
		$objUser = M('user');
		if(IS_POST){
			$POST = deep_htmlspecialchars($_POST);
			parent::checkField('username',$POST['username'],'require','私信的用户名不能为空!');
			parent::checkField('title',$POST['title'],'require','私信标题不能为空');
			parent::checkField('content',$POST['content'],'require','私信内容不能为空');
			$result = $objUser->where(array('username'=>$POST['username']))->field('id,username')->find();
			if(!$result){
				$this->error('私信的用户不存在!');
			}
			if($result['id'] == $_SESSION['uid']){
				$this->error('不能跟自己私信!');	
			}
			$data = array();
			$data['send_uid'] = $POST['uid'];
			$data['receive_uid'] = $result['id'];
			$data['receive_user'] = $POST['username'];
			$data['send_user'] = $POST['send_user'];
			$data['title'] = $POST['title'];
			$data['content'] = $POST['content'];
			$data['time'] = time();
			$result2 = $objLetter->add($data);
			if($result2){
				$this->success('发送私信成功');	
			}else{
				$this->error('发送私信失败，请稍后再试!');	
			}
		}else{
			$username = $objUser->where('id='.$userId)->getField('username');
			$this->assign('username',$username);
			$this->display();	
		}
	}
	
	//修改评论已经查看
	public function mcStatus(){
		parent::isLogin(); //登录判断
		$aid = intval($_GET['aid']);
		$cid = intval($_GET['cid']);
		if($aid == ''){
			parent::error404();	
		}
        if($cid == ''){
            parent::error404();
        }
		$objComment = M('comment');
		$result = $objComment->where(array('id'=>$cid))->setField('status','1');
		if($result){
			redirect(U(APP_NAME.'/List/detail',array('id'=>$aid)));
		}else{
			$this->error('系统繁忙，请稍后再试');	
		}
	}
    //我的被采纳视图
    public function toBest(){
        parent::isLogin(); //登录判断
        $objBest = M('best');
        $noticeBest = $objBest->where(array('uid'=>$_SESSION['uid'],'status'=>"0"))->select();
        foreach($noticeBest as $k1=>$v1){
            $noticeBest[$k1]['article_name'] = M('ask')->where(array('id'=>$v1['aid']))->getField('ask_name');
        }
        $noticeBest = deep_htmlspecialchars_decode($noticeBest);
        $this->assign('noticeBest',$noticeBest);
        $this->answerNumAll = $this->getAnswerNum();
        $this->adoptNumAll = $this->getAdoptNum();
        $this->display();
    }
    //修改被采纳 状态
    public function msBest(){
        parent::isLogin(); //登录判断
        $id = intval($_GET['id']);
        $objBest = M('best');
        $aid = $objBest->where('id='.$id)->getField('aid');
        if($aid){
            $objBest->where('id='.$id)->setField('status',"1");
            redirect(U(APP_NAME.'/List/detail',array('id'=>$aid)));
        }else{
            $this->error('查看失败，请稍后再试');
        }
    }
    //获取该用户的回答数
    private function getAnswerNum(){
        $objComment = M('comment');
        $answerNum = $objComment->where('comment_uid='.$_SESSION['uid'])->count();
        return $answerNum;
    }
    //获取被采纳的数
    private  function getAdoptNum(){
        $objBest = M('best');
        $adoptNum = $objBest->where('uid='.$_SESSION['uid'])->count();
        return $adoptNum;
    }
}