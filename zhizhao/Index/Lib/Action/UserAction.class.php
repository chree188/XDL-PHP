<?php
class UserAction extends CommonAction{
	//泰讨论 文章
	public function index() {
		$uid = intval($_GET['uid']);
		if($uid == '') parent::error404();
		//分配根据GET传过来的uid用户的信息
		$objUser = M('user');
		$userMessage = $objUser->where('id='.$uid)->field('id,username,face,introduce,point,exp')->find();
		$userMessage = deep_htmlspecialchars_decode($userMessage);
		if($userMessage == '') parent::error404();
		$this->assign('userMessage',$userMessage);
		//分配泰讨论文章
		import('ORG.Util.Page');//导入分页类
		$objAsk = M('ask');
		$count = $objAsk->where(array('uid'=>$uid))->count();
		$page = new page($count,10);
		$page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %downPage%');
		$discussList = $objAsk->where(array('uid'=>$uid))->field('id,ask_name,add_time')->order('add_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$discussList = deep_htmlspecialchars_decode($discussList);
		$show = $page->show();
		$this->assign('page',$show);
		$this->assign('discussList',$discussList);
		//分配Pagetitle
		$this->pageTitle = $userMessage['username'].'的个人主页_支招网';
		$this->display();	
	}	

	//评论视图
	public function review() {
		$uid = intval($_GET['uid']);
		if($uid == '') parent::error404();
		//分配根据GET传过来的uid用户的信息
		$objUser = M('user');
		$userMessage = $objUser->where('id='.$uid)->field('id,username,face,introduce,point,exp')->find();
		$userMessage = deep_htmlspecialchars_decode($userMessage);
		if($userMessage == '') parent::error404();
		$this->assign('userMessage',$userMessage);
		//分配该用户的评论
		$objComment = M('comment');
		import('ORG.Util.Page');//导入分页类
		$count = $objComment->where(array('comment_uid'=>$uid))->count();
		$page = new page($count,20);
		$page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %downPage%');
		$commentList = $objComment->where(array('comment_uid'=>$uid))->field('aid,time,comment')->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($commentList as $k1=>$v1){
			$commentList[$k1]['url'] = '__APP__/List/detail/id/'.$v1['aid'].'.html';
		}
		$commentList = deep_htmlspecialchars_decode($commentList);
		$show = $page->show();
		$this->assign('page',$show);
		$this->assign('commentList',$commentList);
		//分配Pagetitle
		$this->pageTitle = $userMessage['username'].'的个人主页_支招网';
		$this->display();	
	}
}