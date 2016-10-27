<?php
namespace Action;
use HY\Action;
!defined('HY_PATH') && exit('HY_PATH not defined.');
class ThreadAction extends HYBBS {
    public function __construct(){
		parent::__construct();


		$left_menu = array('index'=>'active','forum'=>'');
		$this->v("left_menu",$left_menu);
        //{hook a_thread_init}
	}
    public function index(){
        $this->message("没有该文章");
        //{hook a_thread_index_1}
    }
    //帖子页面
    public function _empty(){
        //{hook a_thread_empty_1}
        if(IS_GET){
            $pageid=intval(isset($_GET['HY_URL'][2]) ? $_GET['HY_URL'][2] : 1) or $pageid=1;

            $id = intval(METHOD_NAME);
            $this->v('id',$id);

            //{hook a_thread_empty_2}
            $Thread = M("Thread");



            //获取文章标题等数据
            $thread_data = $Thread->read($id);
            if(empty($thread_data))
                return $this->message("不存在该主题");

            if(!L("Forum")->is_comp($thread_data['fid'],NOW_GROUP,'vthread',$this->_forum[$thread_data['fid']]['json']))
                return $this->message("你没有权限访问这个帖子");



            //{hook a_thread_empty_3}
            $User = M("User");
            $thread_data['user']=$User->id_to_user($thread_data['uid']);
            $thread_data['avatar']=$this->avatar($thread_data['user']);

            $this->conf['description'] = $thread_data['summary'];
            $this->v('conf',$this->conf);

            //{hook a_thread_empty_4}
            $Post = S("Post");
            //获取文章内容
            $PostData = $Post->find("*",array('AND'=>array('tid'=>$id,'isthread'=>1)));


            if(empty($PostData))
                return $this->message("文章内容没有找到");

            //处理隐藏帖子
            $thread_data['show'] = true;
            if($thread_data['hide']){
                if(!IS_LOGIN)
                    $thread_data['show'] = false;
                else{
                    if($Post->has(array('AND'=>array('tid'=>$id,'uid'=>NOW_UID))))
                        $thread_data['show'] = true;
                    else
                        $thread_data['show'] = false;
                }
            }
            //{hook a_thread_empty_44}
            $thread_data['gold_show'] = true;
            if($thread_data['gold']){
                if(!IS_LOGIN)
                    $thread_data['gold_show'] = false;
                else{
                    if(S("Threadgold")->has(array('AND'=>array('tid'=>$id,'uid'=>NOW_UID))) || NOW_UID == $thread_data['uid'])
                        $thread_data['gold_show'] = true;
                    else
                        $thread_data['gold_show'] = false;
                }
            }
            //{hook a_thread_empty_55}
            //版主 与 管理员 直接显示隐藏主题 不需要付费
            if(is_forumg($this->_forum,NOW_UID,$thread_data['fid']) || NOW_GROUP == C("ADMIN_GROUP")){
                $thread_data['gold_show'] = true;
                $thread_data['show'] = true;
            }
            //当前用户组 拥有 不花金币特权 直接显示
            $UsergroupLib = L("Usergroup");
            if($UsergroupLib->read(NOW_GROUP,'nogold',$this->_usergroup)){
                $thread_data['gold_show'] = true;
            }
            //{hook a_thread_empty_5}
            //获取文章评论列表
            $PostList=array();
            $order='';
            if(X("get.order")=='desc')
                $order = ' DESC';
            $PostList = $Post->select('*',array(
                'AND'=>array(
                    'tid'=>$id,
                    'isthread'=>0
                ),
                "ORDER" => "id ".$order,
                "LIMIT" => array(($pageid-1) * $this->conf['postlist'], $this->conf['postlist']),
            ));
            //评论列表实例化
            $i = 0;
            if(!empty($PostList) && is_array($PostList)){
                foreach ($PostList as &$v) {
                    $v['user']=$User->id_to_user($v['uid']);
                    $v['atime_str']=humandate($v['atime']);
                    $v['key'] = (($pageid-1)*10) + (++$i);
                    $v['avatar']=$this->avatar($v['user']);
                    $v['group_name'] = $User->get_group($v['uid']);
                }
            }else{
                $PostList = array();
            }
            
            //{hook a_thread_empty_6}

            //附件处理
            $File = M("File");
            $Fileinfo = S("Fileinfo");
            $Filelist = $Fileinfo->select("*",array('tid'=>$id));
            unset($v);
            //用户是否回复过帖子
            $is_post = false;
            if(IS_LOGIN){
                $is_post = $Thread->is_user_post($this->_user['id'],$id);

                //管理员 直接显示 或者版主 
                if(NOW_GROUP == C("ADMIN_GROUP") || is_forumg($this->_forum,NOW_UID,$thread_data['fid']))
                    $is_post = true;
            }
            //{hook a_thread_empty_66}


            //var_dump($is_post);
            foreach ($Filelist as $key => &$v) {

                //获取附件信息
                $File_Data = $File->read($v['fileid']);
                if(empty($File_Data)){
                    unset($Filelist[$key]);
                    continue;
                }
                $v['show'] = true;
                if($v['hide']){//隐藏附件
                    if(!$is_post) //如果用户没有回复过
                        $v['show'] = false;

                } 
                $v['size'] = $File_Data['filesize'];
                $v['name'] = $File_Data['filename'];

            }
            //{hook a_thread_empty_77}
            $this->v("filelist",$Filelist);
            //附件处理结束

            //增加主题点击数
            $Thread->update_int($id,'views');

            $count = $thread_data['posts'];
    		$count = (!$count)?1:$count;
    		$page_count = ($count % $this->conf['postlist'] != 0)?(intval($count/$this->conf['postlist'])+1) : intval($count/$this->conf['postlist']);
            //{hook a_thread_empty_v}
            $this->v("title",$thread_data['title']);
            $this->v("post_data",$PostData);
            $this->v("pageid",$pageid);
            $this->v("page_count",$page_count);
            $this->v("thread_data",$thread_data);
            $this->v("PostList",$PostList);
            $this->display('thread_index');
        }elseif(IS_POST){
            //{hook a_thread_empty_7}
        }

    }
    //删除主题，  不是删除评论！
    public function del(){

        //{hook a_thread_del_1}

        if(!IS_LOGIN)
            $this->json(array('error'=>false,'info'=>'请登录'));

        //用户组权限判断 当前用户组是否允许删除主题
        $UsergroupLib = L("Usergroup");
		if(!$UsergroupLib->read(NOW_GROUP,'del',$this->_usergroup))
			return $this->json(array('error'=>false,'info'=>'你当前所在用户组无法删除主题'));

        //{hook a_thread_del_3}
        $id = intval(X("post.id"));
        $Thread = M("Thread");

        //取出该主题ID的数据
        $t_data = $Thread->read($id);
        if(empty($t_data))
            return $this->json(array('error'=>false,'info'=>'该文章无数据'));

        //版主
        $arr = explode(",",$this->_forum[$t_data['fid']]['forumg']);

        //{hook a_thread_del_4}
        //用户组不是 管理员 &&  用户不是文章作者 && 不是版主
        if(
            ($this->_user['group'] != C("ADMIN_GROUP")) &&
            ($this->_user['id'] != $t_data['uid']) &&
            
            !is_forumg($this->_forum,$this->_user['id'],$t_data['fid'])
        )
            return $this->json(array('error'=>false,'info'=>'你没有权限操作这个主题'));
        //{hook a_thread_del_55}
        //删除主题数据
        $Thread->del($id);
        //删除属于该主题的消息
        S("Mess")->delete(array('tid'=>$id));

        //删除主题下所有评论
        if($t_data['posts']){ //存在评论
            $Post = M('Post');
            //删除当前主题的所有评论
            $Post->del_thread_all_post($id);

        }
        //帖子作者-1
        M("User")->update_int($t_data['uid'],'threads','-');
        //更新缓存
        $this->_forum[$t_data['fid']]['posts']--;
        $this->CacheObj->forum = $this->_forum;
        $this->_count['thread']--;
        $this->CacheObj->bbs_count = $this->_count;
        
        if($t_data['top']==1) //如果是板块置顶帖子，清理该板块置顶帖子缓存
            $this->CacheObj->rm("forum_top_id_".$t_data['fid']);
        elseif($t_data['top']==2)
            $this->CacheObj->rm("top_data_2");
        //{hook a_thread_del_5}
        return $this->json(array('error'=>true,'info'=>'删除成功'));



    }
    //置顶主题
    public function top(){
        //{hook a_thread_top_1}
        if(!IS_LOGIN)
            return $this->json(array('error'=>false,'info'=>'请登录'));
        //{hook a_thread_top_2}


        $id = intval(X("post.id"));
        $Thread = M("Thread");
        $data = $Thread->read($id);
        if(empty($data))
            return $this->json(array('error'=>false,'info'=>'没有该文章'));
        //{hook a_thread_top_33}
        //版主权限
        $arr = explode(",",$this->_forum[$data['fid']]['forumg']);
        if(
            $this->_user['group'] != C("ADMIN_GROUP") &&
            
            !is_forumg($this->_forum,$this->_user['id'],$data['fid'])
        )
            return $this->json(array('error'=>false,'info'=>'没有权限'));
        //{hook a_thread_top_3}

        $type = X("post.type");
        $top = X("post.top"); //1 = 板块置顶 2 = 全站置顶
        if($top < 0 || $top > 2){
            return $this->json(array('error'=>false,'info'=>'参数出错'));
        }
        if($top == 2){
            if($this->_user['group'] != C("ADMIN_GROUP"))
                return $this->json(array('error'=>false,'info'=>'你没有权限全站置顶'));
        }
        //{hook a_thread_top_4}
        $Thread->update(array(
            'top'=>($type=='on') ? $top : 0
        ),array(
            'id'=>$id
        ));
        $this->CacheObj->rm("top_data_2");
        
        //{hook a_thread_top_5}
        return $this->json(array('error'=>true,'info'=>'置顶成功'));


    }
    //锁帖
    public function set_state(){
        if(IS_POST){
            $id = intval(X("post.id"));
            $state = X("post.state");
            if($state == 1)
                $state = 0;
            else
                $state = 1;
            if(empty($id))
                return $this->json(array('error'=>false,'info'=>'参数不正常!'));
            $Thread = S("Thread");

            $data = $Thread->find("*",array('id'=>$id));
            //var_dump($data);
            if(empty($data))
                return $this->json(array('error'=>false,'info'=>'主题不存在!'));
            if($data['uid'] != NOW_UID && NOW_GROUP != C("ADMIN_GROUP") && !is_forumg($this->_forum,NOW_UID,$thread_data['fid']))
                return $this->json(array('error'=>false,'info'=>'你没有权限这样做!'));
            $Thread->update(array('state'=>$state),array('id'=>$id));
            return $this->json(array('error'=>true,'info'=>'操作成功!'));
        }
    }
    //{hook a_thread_fun}

}
