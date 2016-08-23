<?php
namespace Action;
use HY\Action;
!defined('HY_PATH') && exit('HY_PATH not defined.');
class MyAction extends HYBBS {
    public $menu_action;
    public function __construct(){
		parent::__construct();
        //{hook a_my_init}
        

        $this->view = IS_MOBILE ? $this->conf['wapuserview'] : $this->conf['userview'];

        $this->menu_action = array(
            'index'=>'',
            'thread'=>'',
            'post'=>'',
            'mess'=>'',
            'op'=>'',
            'file'=>''
        );
        //$left_menu = array('index'=>'active','forum'=>'');
		//$this->v("left_menu",$left_menu);

    }
    //用户中心
    public function _empty(){
        //{hook a_my_empty_1}
        $username   = isset($_GET['HY_URL'][1])?$_GET['HY_URL'][1]:'';
        $method     = isset($_GET['HY_URL'][2])?$_GET['HY_URL'][2]:'index';
        $username = urldecode ($username); //url解码
        if(empty($username))
            return $this->message("请输入一个用户名称");

        //$encode = mb_detect_encoding($username);
        //var_dump($username);

        //echo $encode;return;
        //if ($encode == "UTF-8"){
        //$username = iconv('GBK',"UTF-8",$username);
            //$username = iconv('GBK',"UTF-8",$username);
        //}
        
        //服务器引入 GBK编码 非zh系统
        $encode = mb_detect_encoding($username, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5')); 
        $username = mb_convert_encoding($username, 'UTF-8', $encode);

        //{hook a_my_empty_2}
        $User = M("User"); //实例用户模型
        $id = $User->user_to_id($username); //用户名转ID



        if(!$id)
            return $this->message("不存在该用户");

        //{hook a_my_empty_3}
        $this->menu_action[$method] = 'active';
        $this->v('menu_action',$this->menu_action);

        if($method == 'index'){ //用户首页
            //{hook a_my_empty_4}
            $thread_data = S("Thread")->select("*",array(
                'uid'=>$id,
                "ORDER"=>'id DESC',
                'LIMIT'=>5
            ));
            $post_data = S("Post")->select("*",array(
                'AND'=>array(
                    'uid'=>$id,
                    'isthread'=>0
                ),
                "ORDER"=>'id DESC',
                'LIMIT'=>5
            ));

            //{hook a_my_empty_5}
            foreach ($post_data as &$v) {
                $v['content'] = mb_substr(strip_tags($v['content']), 0,50);
            }
            $this->v("thread_data",$thread_data);
            $this->v("post_data",$post_data);

            $data = $User->read($id);
            $data['avatar'] = $this->avatar($data['user']);
            $data['friend_state'] = false;
            if(IS_LOGIN){
                if(NOW_UID != $id){
                    $Friend = M("Friend");
                    $data['friend_state'] = $Friend->get_state(NOW_UID,$id);
                }
                

            }

            $this->v("title",$data['user']);
            $this->v('data',$data);
            $this->display('user_index');
        }elseif($method == 'thread'){ //用户主题
            //{hook a_my_empty_6}
            $data = $User->read($id);
            $data['avatar'] = $this->avatar($data['user']);

            $Thread = S("Thread");
            $pageid=intval(isset($_GET['HY_URL'][3]) ? $_GET['HY_URL'][3] : 1) or $pageid=1;
            $thread_data = $Thread->select('*',array(
                'uid'=>$id,
                "LIMIT" => array(($pageid-1) * 10, 10),
                "ORDER" => "id DESC"
            ));
            if(empty($thread_data))
                $thread_data=array();

            foreach ($thread_data as &$v) {
                $v['atime'] =   $v['atime'];
                $v['avatar'] =$data['avatar'];
                $v['user']  = $data['user'];
                
            }
            //{hook a_my_empty_7}
            //print_r($thread_data);

            $count = $data['threads'];
    		$count = (!$count)?1:$count;
    		$page_count = ($count % 10 != 0)?(intval($count/10)+1) : intval($count/10);
            //{hook a_my_empty_8}
            $this->v("title",$data['user']);
            $this->v("pageid",$pageid);
    		$this->v("page_count",$page_count);
            $this->v('thread_data',$thread_data);
            $this->v('data',$data);
            $this->display('user_thread');
        }elseif($method == 'post'){ //用户帖子
            //{hook a_my_empty_9}
            $data = $User->read($id);
            $data['avatar'] = $this->avatar($data['user']);

            $Post = S("Post");

            $pageid=intval(isset($_GET['HY_URL'][3]) ? $_GET['HY_URL'][3] : 1) or $pageid=1;
            $post_data = $Post->select('*',array(
                'AND'=>array(
                    'uid'=>$id,
                    'isthread'=>0,
                ),
                "LIMIT" => array(($pageid-1) * 10, 10),
                "ORDER" => "id DESC"
            ));
            //{hook a_my_empty_100}
            $Thread = M("Thread");
            $tmp_title = array();
            foreach ($post_data as &$v) {
                if(!isset($tmp_title[$v['tid']]))
                    $tmp_title[$v['tid']] = $Thread->get_title($v['tid']);
                $v['atime']=$v['atime'];
                $v['content'] = mb_substr(strip_tags($v['content']), 0,50);
                $v['title'] = $tmp_title[$v['tid']];


            }
            
            //{hook a_my_empty_10}

            $count = $data['posts'];
    		$count = (!$count)?1:$count;
    		$page_count = ($count % 10 != 0)?(intval($count/10)+1) : intval($count/10);

            $this->v("title",$data['user']);
            $this->v("pageid",$pageid);
    		$this->v("page_count",$page_count);
            $this->v('post_data',$post_data);
            $this->v('data',$data);
            $this->display('user_post');
        
        }elseif($method == 'op'){//用户配置
            //{hook a_my_empty_13}
            if(!IS_LOGIN)
                return $this->message("未登录，无法查看该页面");
            if($this->_user['id'] != $id)
                return $this->message("你要改别人密码?");
            $data = $User->read($id);
            $data['avatar'] = $this->avatar($data['user']);

            //{hook a_my_empty_133}
            $this->v('data',$data);
            $this->v("title","消息中心");
            $this->display('user_op');

        }elseif($method == 'file'){ //文件列表
            //{hook a_my_empty_16}
            if(!IS_LOGIN)
                return $this->message("未登录，无法查看你的消息");
            if($this->_user['id'] != $id)
                return $this->message("你不能查看他人文件!");
            $data = $User->read($id);
            $data['avatar'] = $this->avatar($data['user']);

            $File=S("File");
            $Filedata = $File->select(array('filename','md5name','filesize','atime'),array('uid'=>$id));

            $filearr = array();
            if(is_dir(INDEX_PATH. "upload/userfile/".$id."/")){
                if($dh = opendir(INDEX_PATH. "upload/userfile/".$id."/")) {
                    while (($file = readdir($dh)) !== false){
                        
                        if($file!="." && $file!=".."){
                            $filearr[]=$file;
                            
                        }
                    }
                }
            }
            //{hook a_my_empty_17}
            $this->v("filearr",$filearr);
            $this->v("Filelist",$Filedata);
            $this->v('data',$data);
            $this->v("title","我的文件");
            $this->display('user_file');
        }
        //{hook a_my_empty_18}


    }
    //{hook a_my_fun}
}
