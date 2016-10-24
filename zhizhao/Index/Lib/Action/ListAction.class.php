<?php
class ListAction extends CommonAction{
	//列表页视图
	public function index(){
		$sortId = intval($_GET['sid']);
        if($sortId == '') parent::error404();
        $sort = intval($_GET['sort']);
        if($sort == '') parent::error404();
        $objAsk = D('AskView');
        $where = array('sort_id'=>$sortId);
        if($sort == 1){
            $order = 'add_time desc';
        }elseif($sort == 2){
            $order = 'reward desc,add_time desc';
        }elseif($sort == 3){
            $order = 'comment_num desc,add_time desc';
        }
        import('ORG.Util.Page');//导入分页类
        $count = $objAsk->where($where)->count(); //统计总数
        $page = new page($count,12);
        $page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %downPage%');
        $askList = $objAsk->where($where)->field('id,ask_name,add_time,comment_num,reward,solve,username,sort_name')->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        $askList = deep_htmlspecialchars_decode($askList);
        $show = $page->show();
        $this->assign('askList',$askList);
        $this->assign('page',$show);
        //分配pageTitle
       if($sortId == 1){
           $pageTitle = '生活_支招网';
       }else if($sortId == 2){
           $pageTitle = '情感_支招网';
       }else if($sortId == 3){
           $pageTitle = '健康_支招网';
       }else if($sortId == 4){
           $pageTitle = '职场_支招网';
       }else if($sortId == 5){
           $pageTitle = '公益_支招网';
       }
        $this->assign('pageTitle',$pageTitle);
        //获取列表广告
        $this->listBanner = $this->getListBanner();
		$this->display();
	}	
	//详情页视图
	public function detail() {
        $aid = intval($_GET['id']);
        $objAsk = D('AskView');
        $askCon = $objAsk->where('Ask.id='.$aid)->field('id,sort_name,ask_name,content,add_time,click_number,comment_num,reward,solve,point,exp,username,face,uid')->find();
        $askCon = deep_htmlspecialchars_decode($askCon);
        if($askCon == '') parent::error404();
        $this->assign('askCon',$askCon);
        //点击次数+1
        M('ask')->where('id='.$aid)->setInc('click_number',1);
        //加载支招列表
        $objComment = M('comment');
        $objUser = M('user');
        $commentList = $objComment->where(array('aid'=>$aid))->order('time desc')->select();
        foreach($commentList as $k1=>$v1){
            $cPeople = $objUser->where('id='.$v1['comment_uid'])->field('username,face')->find();
            $rPeople = $objUser->where('id='.$v1['reply_uid'])->field('username,face')->find();
            $commentList[$k1]['comment_username'] = $cPeople['username'];
            $commentList[$k1]['reply_username'] = $rPeople['username'];
            $commentList[$k1]['comment_face'] = $cPeople['face'];
            $commentList[$k1]['reply_face'] = $rPeople['face'];

        }
        $commentList = deep_htmlspecialchars_decode($commentList);
        $commentList = unlimitedForLayer($commentList);
        $this->assign('commentList',$commentList);
		//最佳支招
        $objBest = D('BestView');
        $bestList =$objBest->where(array('aid'=>$aid))->field('face,username,time,comment')->find();
        $bestList = deep_htmlspecialchars_decode($bestList);
       $this->assign('bestList',$bestList);
		$this->display();	
	}
    //发布问题
    public function addAsk() {
        $objAskSort = M('ask_sort');
        if(!isset($_SESSION['uid']) && !isset($_SESSION['username'])) $this->error('您还未登录',U(APP_NAME.'/Login/index'));
        $sortList = $objAskSort->where('parent_id=0 AND status="1"')->field('id,sort_name')->select();
        $this->assign('sortList',$sortList);
       $this->display();
    }
    public function handleAddAsk() {
       if(!IS_POST) parent::error404();
       $POST = deep_htmlspecialchars($_POST);
       parent::checkField('title',$POST['title'],'require','标题不能为空');
       if($POST['sort_id'] == 0) $this->error('请选择分类');
       if($POST['reward'] == -1) $this->error('请选择悬赏金币');
       parent::checkField('content',$POST['content'],'require','内容不能为空');
       $objAsk = M('ask');
       $data = array();
       $data['ask_name'] = $POST['title'];
       $data['uid'] = $POST['uid'];
       $data['sort_id'] = $POST['sort_id'];
       $data['reward'] = $POST['reward'];
       $data['content'] = $POST['content'];
       $data['add_time'] = time();
       $result = $objAsk->data($data)->add();
       if($result){
          M('user')->where('id='.$POST['uid'])->setInc('ask_num',1); //问题数加1
          M('user')->where('id='.$POST['uid'])->setInc('exp', C('POINT_ARTICLE'));
          M('user')->where('id='.$POST['uid'])->setInc('point', C('LEVEL_ARTICLE'));
          $this->success('发布问题成功...',U(APP_NAME.'/List/detail',array('id'=>$result)));
       }else{
           $this->error('发布问题失败，请稍后再试..');
       }
    }
    //问题编辑
    public function editAsk() {
        $aid = intval($_GET['id']);
        if($aid == '') parent::error404();
        $objAsk = M('ask');
        $trueName = $objAsk->where(array('id'=>$aid))->getField('uid');
        if($trueName != $_SESSION['uid']) parent::error404();
        $objAskSort = M('ask_sort');
        if(!isset($_SESSION['uid']) && !isset($_SESSION['username'])) $this->error('您还未登录',U(APP_NAME.'/Login/index'));
        $sortList = $objAskSort->where('parent_id=0 AND status="1"')->field('id,sort_name')->select();
        $this->assign('sortList',$sortList);
        //根据ID读出原文章的内容
        $article = $objAsk->where(array('id'=>$aid))->find();
        $this->assign('article',$article);
        $this->display();
    }
    public function handleEditAsk() {
       if(!IS_POST) parent::error404();
        $POST = deep_htmlspecialchars($_POST);
        parent::checkField('title',$POST['title'],'require','标题不能为空');
        if($POST['sort_id'] == 0) $this->error('请选择分类');
        if($POST['reward'] == -1) $this->error('请选择悬赏金币');
        parent::checkField('content',$POST['content'],'require','内容不能为空');
        $objAsk = M('ask');
        $data = array();
        $data['id'] = $POST['aid'];
        $data['ask_name'] = $POST['title'];
        $data['uid'] = $POST['uid'];
        $data['sort_id'] = $POST['sort_id'];
        $data['reward'] = $POST['reward'];
        $data['content'] = $POST['content'];
        $result = $objAsk->data($data)->save();
        if($result){
            $this->success('修改问题成功...',U(APP_NAME.'/List/detail',array('id'=>$POST['aid'])));
        }else{
            $this->error('修改问题失败，请稍后再试..');
        }
    }
    //处理顶级支招
    public function handleCommentP() {
        if(!IS_POST) parent::error404();
        $objComment = M('comment');
        $objAsk = M('ask');
        $objUser = M('user');
        $POST = deep_htmlspecialchars($_POST);
        $data=array();
        $data['aid'] = $POST['aid'];
        $data['comment_uid'] = $POST['commentUid'];
        $data['comment'] = $POST['comment'];
        $data['reply_uid'] = $POST['replyUid']; //这里存贮支招该篇文章 发布者的ID
        $data['pid'] = 0;
        $data['time'] = time();
        $result = $objComment->add($data);
        //如果插入成功 就返回HTML
        if($result){
            $objAsk->where('id='.$POST['aid'])->setInc('comment_num',1);
            $objUser->where(array('id' => $POST['commentUid']))->setInc('exp', C('POINT_COMMENT'));
            $objUser->where(array('id' => $POST['commentUid']))->setInc('point', C('LEVEL_COMMENT'));
            $this->success('支招成功...',$_SERVER['HTTP_REFERER'],1);
        }else{
            $this->error('支招失败...',$_SERVER['HTTP_REFERER'],1);
        }
    }

    //处理 顶级支招的回复，只实现两级，只有是顶级支招下面的回复都让他们的pid都等于顶级支招的ID
    public function handleCommentS() {
        if(!IS_POST) parent::error404();
        $objComment = M('comment');
        $objAsk = M('ask');
        $objUser = M('user');
        $POST = deep_htmlspecialchars($_POST);
        $data=array();
        $data['aid'] = $POST['aid'];
        $data['comment_uid'] = $POST['commentUid'];
        $data['reply_uid'] = $POST['replyUid'];
        $data['comment'] = $POST['comment'];
        $data['pid'] = $POST['pid'];
        $data['time'] = time();
        $result = $objComment->add($data);
        //如果插入成功 就返回HTML
        if($result){
            $objAsk->where('id='.$POST['aid'])->setInc('comment_num',1);
            $objUser->where(array('id' => $POST['commentUid']))->setInc('exp', C('POINT_ZAN'));
            $objUser->where(array('id' => $POST['commentUid']))->setInc('point', C('LEVEL_ZAN'));
            $this->success('支招成功...',$_SERVER['HTTP_REFERER'],1);
        }else{
            $this->error('支招失败...',$_SERVER['HTTP_REFERER'],1);
        }
    }

    //删除支招
    public function deleteComment() {
        $id = intval($_GET['cid']);
        $verify = deep_htmlspecialchars($_GET['item']);
        $aid = intval($_GET['aid']);
        if($id == ''){
            $this->error('删除失败...',$_SERVER['HTTP_REFERER'],1);
        }
        if($aid == ''){
            $this->error('删除失败...',$_SERVER['HTTP_REFERER'],1);
        }
        if($verify == ''){
            $this->error('删除失败...',$_SERVER['HTTP_REFERER'],1);
        }
        $objComment = M('comment');
        $result = $objComment->where(array('id'=>$id))->getField('time');
        if(md5($result) != $verify){
            $this->error('删除失败...',$_SERVER['HTTP_REFERER'],1);
        }
        $idList = parent::getCidList('comment',$id,'1');
        $where = 'id in('.$idList.')';
        $result2 = $objComment->where($where)->delete();
        if($result2){
            M('ask')->where('id='.$aid)->setDec('comment_num',$result2);
            $this->success('删除成功',$_SERVER['HTTP_REFERER'],1);
        }else{
            $this->error('删除失败...',$_SERVER['HTTP_REFERER'],1);
        }
    }
    //获取列表页广告
    private function getListBanner(){
        $objAd = M('ad');
        $banner = $objAd->where('id=11')->getField('ad_pic');
        return $banner;
    }
    //处理最佳支招
    public function handleBest() {
        $aid = intval($_GET['aid']); //文章ID
        if($aid == '') parent::error404();
        $cid = intval($_GET['cid']); //该条评论的id
        if($cid == '') parent::error404();
        $uid = intval($_GET['uid']); //该条评论的uid
        if($uid == '') parent::error404();
        $auid = intval($_GET['auid']); //该条评论的uid
        if($auid == '') parent::error404();
        $reward = intval($_GET['reward']);
        if($reward == '') parent::error404();
        $objBest = M('best');
        $objAsk = M('ask');
        $objUser = M('user');
        $data = array();
        $data['aid'] = $aid;
        $data['cid'] = $cid;
        $data['uid'] = $uid;
        $data['article_uid'] = $auid;
        $data['time'] = time();
        $result = $objBest->data($data)->add();
        if($result){
            $objAsk->where('id='.$aid)->setField(array('solve'=>"1"));//设置该问题状态 为已采纳
            $objUser->where(array('id'=>$auid))->setDec('point',$reward); //该篇文章的用户减分
            $objUser->where(array('id'=>$uid))->setInc('point',$reward); //该条评论的用户加分
            $this->success('采纳为最佳支招成功..');
        }else{
            $this->error('采纳失败，请稍后再试');
        }
    }
}