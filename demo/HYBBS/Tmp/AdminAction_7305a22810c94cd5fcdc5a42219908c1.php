<?php
namespace Action;
use HY\Action;
!defined('HY_PATH') && exit('HY_PATH not defined.');
class AdminAction extends HYBBS {
    public $menu_action =array();

    public function __construct(){
        parent::__construct();

        
        //模板分组 admin 文件夹
        $this->view = 'admin';
        define('APP_WWW', 'http://app.hyphp.cn/');
        define("APP_KEY", $this->conf['key']);

        if(!IS_LOGIN)
            exit('请登录前台!');

        if(NOW_GROUP != C("ADMIN_GROUP"))
            exit('你不是管理员!');
        session('[start]');
        $md5 = session('admin');
        //echo $md5.'|';
        if(empty($md5)){
            $this->login();
            exit();
        }

        $this->menu_action = array(
            'index'=>'',
            'forum'=>'',
            'user'=>'',
            'thread'=>'',
            'view'=>'',
            'op'=>'',
            'code'=>''
        );


    }


    public function index(){
        $this->menu_action['index'] = ' active open';
        $this->v("menu_action",$this->menu_action);
        
        if(IS_POST){
            $one1 = X("post.one1");
            $one2 = X("post.one2");
            $one3 = X("post.one3") ? true : false;
            if($one1){
                del_cache_file($this->conf,$one3);
            }
            if($one2){
                $Forum = S("Forum");
                $forum_data = $Forum->select("*");
                $Thread = S("Thread");
                $Post = S("Post");
                foreach ($forum_data as $v) {
                    $threads = $Thread->count(array('fid'=>$v['id']));
                    $posts = $Post->count(array('fid'=>$v['id']));
                    $Forum->update(array('threads'=>$threads,'posts'=>$posts),array(
                        'id'=>$v['id']));
                }
            }
            header('Location: '.WWW.'admin');
            exit;
        }

        $this->display('index');

    }
    public function login(){
        
        if($this->_user['group'] != C("ADMIN_GROUP"))
            exit('你的账号不属于管理员!');
        if(IS_GET){
            
            $this->display("login");
        }
        elseif(IS_POST){
            
            $pass = X("post.pass");

            if(L("User")->md5_md5($pass, $this->_user['salt']) == $this->_user['pass']){


                session('admin','admin');

                header('Location: '.WWW.'admin');
                exit;
            }
            echo '密码错误';
        }
    }
    public function out(){
        
        session('[destroy]');
        header('Location: '.WWW.'admin');
        exit;

    }

    public function forum(){
        $this->menu_action['forum'] = ' active open';
        $this->v("menu_action",$this->menu_action);

        

        if(IS_POST){

            $gn = intval(X("post.gn"));
            $id = intval(X("post.id"));
            $name = X("post.name");
            $name2= X("post.name2");
            $color= X("post.color");
            $background= X("post.background");
            $html= X("post.html");
            $fid = intval(X("post.fid"));

            


            if(empty($gn))
                return $this->mess("参数不完整");

            $F = M("Forum");
            //删除缓存
            $this->CacheObj->rm('forum');
            if($gn == '1') //添加分类
            {
                if($F->has(array('id'=>$id)))
                    return $this->mess("该分类ID已存在");
                $F->insert(array(
                    'id'        =>$id,
                    "name"      =>$name,
                    "name2"     =>$name2,
                    'fid'       =>$fid,
                    'color'     =>$color,
                    'background'=>$background,
                    'html'  =>  $html
                    )
                );
                return $this->mess("添加成功");
            }elseif($gn == '2'){ //修改分类
                $iid = intval(X("post.iid")); //修改的分类ID
                if($iid < 0 )
                    return $this->mess("参数不完整 Error = 22!");

                $data = $F->read($iid);

                if($id != $iid){ //修改ID
                    //帖子分类移动
                    S("Post")->update(array('fid'=>$id),array('fid'=>$iid));
                    S("Thread")->update(array('fid'=>$id),array('fid'=>$iid));
                    
                }

                // if($fid != -1){ //父分类修改
                //     $F->update(array('zid'=>1),array('id'=>$fid));// 存在子分类
                // }else{ //$fid == -1
                //     $tmp_fid = S("Forum")->find("fid",array('id'=>$iid));
                //     echo $tmp_fid;
                //     if(!$F->count(array('fid'=>$tmp_fid))) //如果没有分类继承该主分类 设置为 无
                //         $F->update(array('zid'=>0),array('id'=>$tmp_fid));

                // }
                // 
                $F->update(array(
                    'id'=>$id,
                    'name'=>$name,
                    "name2"=>$name2,
                    'fid'=>$fid,
                    'color'     =>$color,
                    'background'=>$background,
                    'html'  =>  $html
                ),array('id'=>$iid));

                return $this->mess("修改成功");
            }elseif($gn == '3'){ //删除分类
                
                $del = X("post.del");
                if($del=='true'){
                    S("Thread")->delete(array('fid'=>$id));
                    S("Post")->delete(array('fid'=>$id));
                }

                $F->delete(array('id'=>$id));
                
                return $this->json(array('error'=>true,"info"=>'good'));
            }
            return $this->mess("参数不完整 Error = 2");
        }else{
            
            $F = S("Forum");
            $pageid=intval(X('get.pageid')) or $pageid=1;

            $data1 = $F->select("*");
            $data = $F->select("*",array(
                "LIMIT" => array(($pageid-1) * $this->conf['adminforum'], $this->conf['adminforum'])
            ));
            $count = $F->count();
            $count = (!$count)?1:$count;
            $page_count = ($count % $this->conf['adminforum'] != 0)?(intval($count/$this->conf['adminforum'])+1) : intval($count/$this->conf['adminforum']);

            
            $this->v("pageid",$pageid);
            $this->v("page_count",$page_count);
            $this->v("data",$data);
            $this->v("data1",$data1);
            $this->display("forum");
        }



    }
    //用户管理
    public function user(){
        $this->menu_action['user'] = ' active open';
        $this->v("menu_action",$this->menu_action);

        
        if(IS_POST){
            $gn = intval(X("post.gn"));
            if($gn=='2'){ //添加用户

                $user = X("post.user");
                $pass = X("post.pass");
                $email = X("post.email");

                
                $User = M("User");
                if($User->is_user($user))
                    return $this->mess("账号已经存在 Error = 1!");
                if($User->is_email($email))
                    return $this->mess("邮箱已经存在 Error = 2!");

                $User->add_user($user,$pass,$email);
                
                return $this->mess("添加账号成功");

            }elseif($gn=='3'){ //修改用户
                $id = intval(X("post.id"));
                $user = X("post.user");
                $pass = X("post.pass");
                $group = X("post.group");
                $email = X("post.email");
                $gold = X("post.gold");
                $credits = X("post.credits");

                

                $User = M("User");
                $data = $User->read($id);

                if($data['user'] != $user){
                    if($User->is_user($user))
                        return $this->mess("账号已经存在 Error =3!");
                }

                if($data['email'] != $email){
                    if($User->is_email($email))
                        return $this->mess("邮箱已经存在 Error = 4!");
                }
                $xiu = array(
                    'user'=>$user,
                    'email'=>$email,
                    'group'=>$group,
                    'gold'=>$gold,
                    'credits'=>$credits

                );
                if(!empty($pass)){
                    $xiu['pass'] = L("User")->md5_md5($pass,$data['salt']);
                }
                $User->update($xiu,array('id'=>$id));
                
                return $this->mess("修改成功");


            }elseif($gn == '4'){ //删除用户
                
                $id = intval(X("post.id"));
                $User = S("User");
                $User->delete(array('id'=>$id));

                S("Thread")->delete(array('uid'=>$id));
                S("Post")->delete(array('uid'=>$id));
                
                S("Chat")->delete(array('OR'=>array('uid1'=>$id,'uid2'=>$id)));
                S("Chat_count")->delete(array('uid'=>$id));
                S("Chat_pm")->delete(array('OR'=>array('uid1'=>$id,'uid2'=>$id)));
                S("File")->delete(array('uid'=>$id));
                S("Filegold")->delete(array('uid'=>$id));
                S("Fileinfo")->delete(array('uid'=>$id));
                S("Friend")->delete(array('OR'=>array('uid1'=>$id,'uid2'=>$id)));
                S("Ol")->delete(array('uid'=>$id));
                S("Threadgold")->delete(array('uid'=>$id));
                S("Vote_post")->delete(array('uid'=>$id));
                S("Vote_thread")->delete(array('uid'=>$id));
                return $this->json(array('error'=>true,'info'=>'删除成功'));
            }
            return;
        }

        
        $gn = intval(X("get.gn"));
        
        if(!empty($gn)){ //搜索用户

        
            $User = S("User");
            if($gn=="1"){
                $user = X("get.user");
                !empty($user) or $user = '';
                $this->v('skey',$user);
                $usergroup = X("get.usergroup");
                !empty($usergroup) or $usergroup = 0;
                $this->v('sgroup',$usergroup);
                //echo $user;
                //var_dump($user);

                $pageid=intval(X('get.pageid')) or $pageid=1;

                $arr = array("LIMIT" => array(($pageid-1) * $this->conf['adminuser'], $this->conf['adminuser']));
                if(empty($user) && !empty($usergroup)){ //搜索用户名
                    $arr['group'] = $usergroup;
                }
                elseif(!empty($user) && empty($usergroup)){
                    $arr["OR"] = array(
                        'user[~]'=>$user,
                        "email[~]" => $user
                    );
                }
                elseif(!empty($user) && !empty($usergroup)){
                    $arr['AND'] = array(
                        'OR' => array(
                            'user[~]'=>$user,
                            "email[~]" => $user
                        ),
                        'group' => $usergroup
                    );
                }
                    


                $data = $User->select("*",$arr);
                //print_r($data);

                $count = $User->count(array(
                    "OR" => array(
                        'user[~]'=>$user,
                        "email[~]" => $user
                    ),
                ));
        		$count = (!$count)?1:$count;
        		$page_count = ($count % $this->conf['adminuser'] != 0)?(intval($count/$this->conf['adminuser'])+1) : intval($count/$this->conf['adminuser']);

                $this->v("fj","&gn=1" . (empty($user)?'':'&user='.$user) . (empty($usergroup) ? '' : '&usergroup='.$usergroup));
                $this->v("pageid",$pageid);
        		$this->v("page_count",$page_count);
                $this->v('user_count',$User->count());
                $this->v('day_count',$User->count(array('atime[>]'=>strtotime(date('Y-m-d')))));
                $this->v('data',$data);
                return $this->display("user");
            }



        }else{
            
            $User = S("User");

            $pageid=intval(X('get.pageid')) or $pageid=1;
            $data = $User->select("*",array(
                "ORDER"=>"id DESC",
                "LIMIT" => array(($pageid-1) * 10, 10)
            ));

            $count = $User->count();
    		$count = (!$count)?1:$count;
    		$page_count = ($count % 10 != 0)?(intval($count/10)+1) : intval($count/10);

            
            $this->v("fj","");
    		$this->v("pageid",$pageid);
    		$this->v("page_count",$page_count);
            $this->v('data',$data);
            $this->v('user_count',$User->count());
            $this->v('day_count',$User->count(array('atime[>]'=>strtotime(date('Y-m-d')))));
            $this->display("user");
        }

    }
    //用户组
    public  function usergroup(){
        $this->menu_action['user'] = ' active open';
        $this->v("menu_action",$this->menu_action);
        
        if(IS_GET){
            
            $data = S("Usergroup")->select("*");

            foreach ($data as &$v) {
                $v['json']=json_decode($v['json'],true);
                isset($v['json']['thread']) or $v['json']['thread'] = 0;
                isset($v['json']['post']) or $v['json']['post'] = 0;
                isset($v['json']['upload']) or $v['json']['upload'] = 0;
                isset($v['json']['mess']) or $v['json']['mess'] = 0;
                isset($v['json']['del']) or $v['json']['del'] = 0;
                isset($v['json']['del']) or $v['json']['del'] = 0;
                isset($v['json']['down']) or $v['json']['down'] = 0;
                isset($v['json']['uploadfile']) or $v['json']['uploadfile'] = 0;
                isset($v['json']['thide']) or $v['json']['thide'] = 0;
                isset($v['json']['tgold']) or $v['json']['tgold'] = 0;
                isset($v['json']['nogold']) or $v['json']['nogold'] = 0;
            }


            
            $this->v("data",$data);
            $this->display('usergroup');
        }elseif(IS_POST){
            //删除缓存
            $this->CacheObj->rm('usergroup');
            
            $gn = intval(X("post.gn"));
            if($gn == 1){ //添加用户组
                
                S("Usergroup")->insert(array(
                    'id'=>intval(X("post.id")),
                    'name'=>X("post.name"),
                    'credits'=>X("post.credits"),
                    'space_size'=>X("post.space_size"),
                    'chat_size'=>X("post.chat_size"),
                    'json'=>json_encode(array(
                        'thread'=>1,
                        'post'=>1,
                        'upload'=>1,
                        'mess'=>1,
                        'del'=>1,
                        'down'=>1,
                        'uploadfile'=>1,
                        'hide'=>1,
                        'thide'=>1,
                        'tgold'=>1,
                        'nogold'=>0
                    ))
                ));
                return $this->mess("添加成功");

            }elseif($gn == 2){ //修改用户组
                
                S("Usergroup")->update(array(
                    'id'=>intval(X("post.id")),
                    'name'=>X("post.name"),
                    'credits'=>X('post.credits'),
                    'space_size'=>X("post.space_size"),
                    'chat_size'=>X("post.chat_size"),

                ),array(
                    'id'=>intval(X("post.iid"))
                ));
                return $this->mess("修改成功");
            }elseif($gn == 3){ //编辑权限
                
                $id = intval(X("post.id"));
                $type = X("post.type");
                $b = X("post.b");
                $UG = S("Usergroup");
                $json = $UG->find("json",array(
                    'id'=>intval(X("post.id")),
                ));
                if(empty($json))
                    $json='{}';
                    //return $this->json(array('error'=>false,'info'=>'修改失败'));
                $data = json_decode($json,true);

                $data[$type] = $b ? 0 : 1;
                $UG->update(array(
                    'json'=>json_encode($data)
                ),array(
                    'id'=>$id
                ));
                return $this->json(array('error'=>true,'info'=>'修改成功'));

                //print_r($data);
            }elseif($gn == 4){ //删除用户组
                $id = intval(X("post.id"));
                $UG = S("Usergroup");
                $UG->delete(array('id'=>$id));
                return $this->json(array('error'=>true,'info'=>'删除成功'));

            }
        }
    }
    //文章管理
    public function thread(){
        $this->menu_action['thread'] = ' active open';
        $this->v("menu_action",$this->menu_action);

        
        if(IS_POST){
            $gn = X("post.gn");
            if($gn == 'del'){
                $id = X("post.id");
                if(!empty($id)){
                    foreach ($id as &$v) {
                        $v=intval($v);
                    }
                    S("Thread")->delete(array('OR'=>array('id'=>$id)));
                    if(X("post.del_post"))
                        S("Post")->delete(array('OR'=>array('tid'=>$id)));
                    
                    if(X("post.del_file"))
                        S("Fileinfo")->delete(array('OR'=>array('tid'=>$id)));
                    S("Vote_thread")->delete(array('OR'=>array('tid'=>$id)));
                    S("Threadgold")->delete(array('OR'=>array('tid'=>$id)));
                }
            }else if($gn == 'move'){
                $move_f1 = intval(X("post.move_f1"));
                $move_f2 = intval(X("post.move_f2"));
                $move_check = X("post.move_check");

                if($move_check != 'on')
                    return $this->mess('请勾选确认操作');
                if($move_f1 == $move_f2)
                    return $this->mess('别闹');

                S("Thread")->update(array('fid'=>$move_f2),array('fid'=>$move_f1));
                S("Post")->update(array('fid'=>$move_f2),array('fid'=>$move_f1));
                return $this->mess('移动完成');


            }
            
            


            //var_dump($id);
        }

        
            
            $fid = X("get.forum");
            
            if($fid ==='')
                $fid = -1;

            $this->v("sforum",$fid);

            $Thread = S("Thread");

            $forum_data = S("Forum")->select("*");
            $pageid=intval(X('get.pageid')) or $pageid=1;
            $arr = array(
                "ORDER"=>"id DESC",
                "LIMIT" => array(($pageid-1) * $this->conf['adminthread'], $this->conf['adminthread'])
            );
            if(isset($this->_forum[$fid]))
                $arr['fid'] = $fid;
            $data = $Thread->select("*",$arr);

            $count = $Thread->count($arr);
    		$count = (!$count)?1:$count;
    		$page_count = ($count % $this->conf['adminthread'] != 0)?(intval($count/$this->conf['adminthread'])+1) : intval($count/$this->conf['adminthread']);

            
            $User = M("User");
            $user_tmp = array();
            foreach ($data as &$vv) {
                if(empty($user_tmp[$vv['uid']])){
    				$user_tmp[$vv['uid']] = $User->id_to_user(intval($vv['uid']));
    			}
                $vv['user'] = $user_tmp[$vv['uid']];
            }
            //print_r($data);

            $forum = array();
            foreach ($forum_data as $v) {

                $forum[$v['id']]=$v;

            }

            
            $this->v("fj",($fid ===''?'':'&forum='.$fid));
    		$this->v("pageid",$pageid);
    		$this->v("page_count",$page_count);
            $this->v("forum",$forum);
            $this->v('data',$data);
            $this->v("count",array(
                'thread'=>$Thread->count(),
                'post'=>S("Post")->count(),
                'day_thread'=>$Thread->count(array('atime[>]'=>strtotime(date('Y-m-d')))),
                'day_post'=>S("Post")->count(array('atime[>]'=>strtotime(date('Y-m-d'))))
            ));
            $this->display('thread');
        

    }
    private function mess($a){
        
        $this->v('mess',$a);
        $this->display("message");
    }
    private function uh($str)
	{
		$farr = array(
			"/<(?)(script|style|html|body|title|link|meta)([^>]*?)>/isu",
			"/(<[^>]*)on[a-za-z]+s*=([^>]*>)/isu",

		);
		$tarr = array(
			" ",
			" ",

		);
		$str = preg_replace( $farr,$tarr,$str);
		$str = preg_replace('/style=".*?"/i', '', $str);
		return $str;
	}
    public function view(){
        $this->menu_action['view'] = ' active open';
        $this->v("menu_action",$this->menu_action);

        if(IS_POST && IS_AJAX){
            $name = X("post.name");
            $name2= X("post.name2");
            $user = X("post.user");
            $mess = X("post.mess");
            $code = X("post.code");
            if(empty($name) || empty($name2) || empty($mess))
                return $this->json(array('error'=>false,'info'=>'参数不完整'));

            if(is_dir(VIEW_PATH . $name2))
                return $this->json(array('error'=>false,'info'=>"英文名已经存在\r\n如果你想覆盖,请手动到目录中删除".$name2));
            mkdir(VIEW_PATH . $name2);
            file_put_contents(VIEW_PATH . $name2 . '/conf.php',"<?php
return array(
    'name' => '{$name}',
    'user' => '{$user}',
    'mess' => '{$mess}',
    'code' => '{$code}',
    'version' => '1.0',
);");


            return $this->json(array('error'=>true,'info'=>'建立成功'));
        }

        $edit = X("get.edit");
        
        if(!empty($edit)){ //修改模板 更改模板 更换模板
            $conf = $this->conf;
            //if(is_file(CONF_PATH . 'conf.php'))
                //$conf = file(CONF_PATH . 'conf.php');
            //$arr = json_decode($conf[1],true);
            

            if(!is_dir(VIEW_PATH . $edit))
                return $this->mess("修改失败,{$edit} :模板不存在");

            if(is_file(VIEW_PATH . THEME_NAME . '/on')){
                if(!unlink(VIEW_PATH . THEME_NAME . '/on'))
                    return $this->mess("权限不足,无法更换模板");
            }
            file_put_contents(VIEW_PATH . $edit . '/on','');

            $conf['theme']=$edit;
            file_put_contents(CONF_PATH . 'conf.php' , "<?php die(); ?>\r\n".json_encode($conf));
            del_cache_file($this->conf);
            header('Location: '.WWW.'admin'.EXP.'view');
            exit;
        }
        $op = X("get.op");
        if(!empty($op)){

            if(IS_POST){
                $json = array();
                if(is_file(VIEW_PATH . "/{$op}/inc.php")){
                    $file = file(VIEW_PATH . "/{$op}/inc.php");
                    $json = isset($file[1]) ? json_decode($file[1],true) : array();
                }
                

                foreach ($_POST as $k => $v) {
                    $json[$k] = $v;
                }
                put_tmp_file(VIEW_PATH . "/{$op}/inc.php",json_encode($json));
            }


            //echo VIEW_PATH . $op . '/conf.html';
            
            
            $this->display("view_op");
            return;
        }
        
        $ml = scandir(VIEW_PATH);
        $qj = array();
        foreach ($ml as $key=> &$v) {
            $conf_path = VIEW_PATH.'/'.$v.'/conf.php';
            if($v=='.'||$v=='..'||$v=='install'||$v=='admin'||$v=='hy_user'||$v=='hy_moblie'||$v=='hy_message'||!is_dir(VIEW_PATH . $v)){
                unset($ml[$key]);
                continue;
            }
			if(!file_exists($conf_path)){
				unset($ml[$key]);
                continue;
			}
            $qj[$key] = include $conf_path;
            isset($qj[$key]) or $qj[$key] = array();
            isset($qj[$key]['name']) or $qj[$key]['name'] = '空';
            isset($qj[$key]['user']) or $qj[$key]['user'] = '空';
            isset($qj[$key]['mess']) or $qj[$key]['mess'] = '空';
            isset($qj[$key]['code']) or $qj[$key]['code'] = '';
            isset($qj[$key]['version']) or $qj[$key]['version'] = '1.0';
        }
        $this->v("qj",$qj);
        //print_r($ml);
        
        $this->v('data',$ml);
        $this->display("view");
    }
    public function viewol(){
        $this->menu_action['view'] = ' active open';
        $this->v("menu_action",$this->menu_action);
            //下载
            $down = X("post.down");
            if(!empty($down)){

                if(X("post.gn") == 'update'){
                    if(!deldir(VIEW_PATH . $down))
                        $this->json(array('error'=>false,'data'=>"无法删除旧模板,请手动删除" . VIEW_PATH . $down ));
                }


                if(is_dir(VIEW_PATH . $down))
                    $this->json(array('error'=>false,'data'=>'模板目录已有相同名称模板,如果你要重新下载,需要手动删除模板'));
                $down_path = TMP_PATH . $down . '.zip';
                if(file_exists($down_path))
                    unlink($down_path);
                if(file_exists($down_path))
                    $this->json(array('error'=>false,'data'=>'下载模板,权限出现问题,无法删除旧压缩包,请检查目录权限'));
                
                $name = $down;

                
                $json = file_get_contents(APP_WWW . 'json/get_down_path?name=' . $name);
                if(empty($json))
                    $this->json(array('error'=>false,'data'=>'访问远程服务器失败.'));
                $json = json_decode($json,true);
                if(!$json['error'])
                    $this->json(array('error'=>false,'data'=>$json['data']));
                
                $down = APP_WWW . 'app/' . $name . '/' .$json['data'];

                


                http_down( $down_path, $down);

                if(!file_exists($down_path))
                    $this->json(array('error'=>true,'data'=>'没有下载到模板压缩包'));
                    
                $zip = L("Zip");
                $zip->unzip($down_path, VIEW_PATH);
                if(is_dir(VIEW_PATH . $down)){
                    if(is_file(VIEW_PATH . $down . '/on'))
                        unlink(VIEW_PATH . $down . '/on');
                    $this->json(array('error'=>true,'data'=>'下载完成'));
                }
                    
                $this->json(array('error'=>true,'data'=>'模板解压失败'));
            }

        $ml = scandir(VIEW_PATH);
        $qj = array();


        foreach ($ml as $key=> &$v) {
            $conf_path = VIEW_PATH.'/'.$v.'/conf.php';
            if($v=='.'||$v=='..'||!is_dir(VIEW_PATH . $v)){
                unset($ml[$key]);
                continue;
            }
            if(!file_exists($conf_path)){
                unset($ml[$key]);
                continue;
            }
            $qj[$key] = include $conf_path;
            isset($qj[$key]) or $qj[$key] = array();
            $qj[$key]['name2'] = $v;
            isset($qj[$key]['name']) or $qj[$key]['name'] = '空';
            isset($qj[$key]['user']) or $qj[$key]['user'] = '空';
            isset($qj[$key]['mess']) or $qj[$key]['mess'] = '空';
            isset($qj[$key]['code']) or $qj[$key]['code'] = '';

            isset($qj[$key]['version']) or $qj[$key]['version'] = '1.0';
        }
        $this->v("qj",json_encode($qj));

        //$this->v('data',json_encode($ml));
        $this->display("viewol");
    }
    public function op(){
        
        if(IS_POST){
            
            $title = X("post.title");
            $logo = X("post.logo");
            $title2= X("post.title2");
            $keywords   = X("post.keywords");
            $de    = X("post.de");
         
            $userview    = X("post.userview");
            $messview    = X("post.messview");
            $gold_thread    = intval(X("post.gold_thread"));
            $gold_post    = intval(X("post.gold_post"));
            $credits_thread    = intval(X("post.credits_thread"));
            $credits_post    = intval(X("post.credits_post"));
            
            $userview2    = X("post.userview2");
            $homelist    = intval(X("post.homelist"));
            $forumlist    = intval(X("post.forumlist"));
            $postlist    = intval(X("post.postlist"));
            $searchlist    = intval(X("post.searchlist"));
            $titlesize    = intval(X("post.titlesize"));
            $titlemin    = intval(X("post.titlemin"));
            $emailhost    = X("post.emailhost");
            $emailuser    = X("post.emailuser");
            $emailpass    = X("post.emailpass");
            $emailport    = intval(X("post.emailport"));
            $emailtitle    = X("post.emailtitle");
            $emailcontent    = X("post.emailcontent");

            $uploadimageext    = X("post.uploadimageext");
            $uploadfileext    = X("post.uploadfileext");

            $adminforum    = X("post.adminforum");

            $wapview    = X("post.wapview");
            $wapuserview    = X("post.wapuserview");
            $wapuserview2    = X("post.wapuserview2");
            $wapmessview    = X("post.wapmessview");

            $cache_type    = X("post.cache_type");
            $cache_table    = X("post.cache_table");
            $cache_key    = X("post.cache_key");
            $cache_time    = X("post.cache_time");
            $cache_pr    = X("post.cache_pr");

            $cache_ys    = X("post.cache_ys");
            
            $cache_outtime    = X("post.cache_outtime");
            $cache_redis_ip    = X("post.cache_redis_ip");
            $cache_redis_port    = X("post.cache_redis_port");
            $cache_mem_ip    = X("post.cache_mem_ip");
            $cache_mem_port    = X("post.cache_mem_port");
            $cache_memd_ip    = X("post.cache_memd_ip");

            $debug_page    = X("post.debug_page");
            $debug    = X("post.debug");

            $uploadimagemax    = X("post.uploadimagemax");
            $uploadfilemax    = X("post.uploadfilemax");

            $adminthread    = X("post.adminthread");
            $adminuser    = X("post.adminuser");

            $key    = trim(X("post.key"));
            
            if(!$debug)
                file_put_contents(INDEX_PATH . 'DEBUG','');
            else{
                if(is_file(INDEX_PATH. 'DEBUG'))
                    unlink(INDEX_PATH. 'DEBUG');


            }
            



            
            

            

            //$conf = file(CONF_PATH . 'conf.php');
            //$this->conf = json_decode($conf[1],true);
            $this->conf['title']=$title;
            $this->conf['logo']=$logo;
            $this->conf['title2']=$title2;
            $this->conf['keywords']=$keywords;
            $this->conf['description']=$de;
           
            $this->conf['userview']=$userview;
            $this->conf['messview']=$messview;
            $this->conf['gold_thread']=$gold_thread;
            $this->conf['gold_post']=$gold_post;
            $this->conf['credits_thread']=$credits_thread;
            $this->conf['credits_post']=$credits_post;
            $this->conf['userview2']=$userview2;
            $this->conf['homelist']=$homelist;
            $this->conf['forumlist']=$forumlist;
            $this->conf['postlist']=$postlist;
            $this->conf['searchlist']=$searchlist;
            $this->conf['titlesize']=$titlesize;
            $this->conf['titlemin']=$titlemin;
            $this->conf['emailhost']=$emailhost;
            $this->conf['emailuser']=$emailuser;
            $this->conf['emailpass']=$emailpass;
            $this->conf['emailport']=$emailport;
            $this->conf['emailtitle']=$emailtitle;
            $this->conf['emailcontent']=$emailcontent;
            $this->conf['uploadfileext']=$uploadfileext;
            $this->conf['uploadimageext']=$uploadimageext;
            $this->conf['adminforum']=$adminforum;
            $this->conf['wapview']=$wapview;

            $this->conf['wapmessview']=$wapmessview;
            $this->conf['wapuserview2']=$wapuserview2;
            $this->conf['wapuserview']=$wapuserview;
            

            $this->conf['cache_type']=$cache_type;
            $this->conf['cache_table']=$cache_table;
            $this->conf['cache_key']=$cache_key;
            $this->conf['cache_time']=$cache_time;
            $this->conf['cache_pr']=$cache_pr;
            $this->conf['cache_ys']=$cache_ys;
            $this->conf['cache_outtime']=$cache_outtime;
            $this->conf['cache_redis_ip']=$cache_redis_ip;
            $this->conf['cache_redis_port']=$cache_redis_port;
            $this->conf['cache_mem_ip']=$cache_mem_ip;
            $this->conf['cache_mem_port']=$cache_mem_port;
            $this->conf['cache_memd_ip']=$cache_memd_ip;

            $this->conf['debug']=$debug;
            $this->conf['debug_page']=$debug_page;


            $this->conf['uploadimagemax']=$uploadimagemax;
            $this->conf['uploadfilemax']=$uploadfilemax;

            $this->conf['adminthread']=$adminthread;
            $this->conf['adminuser']=$adminuser;
            $this->conf['key']=$key;

            
            
            
            
            
            
            
            
            
            
            
            

            
            
            
            

            

            file_put_contents(CONF_PATH . 'conf.php' , "<?php die(); ?>\r\n".json_encode($this->conf));
        }
        $this->menu_action['op'] = ' active open';
        
        $this->v("menu_action",$this->menu_action);
        $this->v("conf",$this->conf);
        $this->display('op');
    }

    public function codeol(){
        $this->menu_action['code'] = ' active open';
        $this->v("menu_action",$this->menu_action);


        if(IS_POST){ // 下载压缩包
            $name = X("post.name");

            $gn = X("post.gn");

            if($gn == 'get_down'){
                $json = file_get_contents(APP_WWW . 'json/get_down_path?name=' . $name);
                if(empty($json))
                    $this->json(array('error'=>false,'data'=>'访问远程服务器失败.'));
                $json = json_decode($json,true);
                if($json['error'])
                    $this->json(array('error'=>true,'data'=>$json['data']));
                $this->json(array('error'=>false,'data'=>$json['data']));
            }
            //if($gn == 'down'){
            $down = APP_WWW . 'app/' . $name . '/' . X("post.www");

            //}
            //$this->json(array('error'=>false,'data'=>''));




            $on = false; //是否已经开始
            $install = false; //是否已经安装
            $inc = array();
            if($gn=='update'){ //更新插件
                //del_cache_file($this->conf);
                if(is_file(PLUGIN_PATH . $name . '/on'))
                    $on = true;
                if(is_file(PLUGIN_PATH . $name . '/install'))
                    $install = true;

                $inc = get_plugin_inc($name);

                if(!deldir(PLUGIN_PATH . $name))
                    $this->json(array('error'=>false,'data'=>"无法删除旧插件,请手动删除" . PLUGIN_PATH . $name ));
                    


            }
            


            //下载插件

            if(is_dir(PLUGIN_PATH . $name)){
                $this->json(array('error'=>false,'data'=>'当前插件已经存在,无法覆盖安装,你需要手动删除!'));
                
            }
            $zip = L("Zip");
            //下载插件 ZIP
            $path = TMP_PATH . $name .'.zip';
            if(is_file($path))
                unlink($path);
            if(file_exists($path))
                $this->json(array('error'=>false,'data'=>'权限出现问题! 无法删除历史插件包 : ' . $path));
            
            //$down = C("PLUGIN_DOWN")."downplugin/".$name . '.zip';
            //echo $down;
            (http_down($path,$down));
            if(!file_exists($path))
                $this->json(array('error'=>false,'data'=>'插件下载失败.'));


            $zip->unzip($path,PLUGIN_PATH);
            if(is_dir(PLUGIN_PATH . $name)){ //解压成功
                if(is_file(PLUGIN_PATH . $name . '/on'))
                    unlink(PLUGIN_PATH . $name . '/on');
                if(is_file(PLUGIN_PATH . $name . '/install'))
                    unlink(PLUGIN_PATH . $name . '/install');

                if($on)
                    file_put_contents(PLUGIN_PATH . $name . '/on','');
                if($install)
                    file_put_contents(PLUGIN_PATH . $name . '/install','');


                //$file = file(PLUGIN_PATH . "/{$name}/inc.php");
                //$json = isset($file[1]) ? json_decode($file[1],true) : array();
                $inc1 = get_plugin_inc($name);

                
                
                if(!empty($inc1) && !empty($inc)){

                    foreach ($inc1 as $k => &$v) {
                        if(isset($inc[$k])){
                            if(!empty($inc[$k])){
                                $v = $inc[$k];
                            }
                        }
                        
                    }


                }
                put_tmp_file(PLUGIN_PATH . "/{$name}/inc.php",json_encode($inc1));


                $this->json(array('error'=>true,'data'=>'下载完成.'));
            }
            $this->json(array('error'=>false,'data'=>'插件安装失败.'));
        }

        $ml = scandir(PLUGIN_PATH);
        
        $conf = array();

        foreach ($ml as $key=> &$v) {
            $conf_path = PLUGIN_PATH.$v.'/conf.php';
            if($v=='.'||$v=='..'||!is_dir(PLUGIN_PATH.'/'.$v) || !file_exists($conf_path)){

                //unset($ml[$key]);
                
                continue;
            }
            $tmp = include $conf_path;
            $tmp['name'] = $v;
            $conf[]=$tmp;


        }
        unset($v);
        foreach ($conf as &$v) {
            isset($v['version']) or $v['version'] = '1.0';
        }

 

        $this->v('data',json_encode($conf));
        $this->display('codeol');

    }
    public function code(){
        $this->menu_action['code'] = ' active open';
        $this->v("menu_action",$this->menu_action);


        if(IS_POST && !IS_AJAX){ //修改插件配置
            $name = X("post.name");
            $gn = X("post.gn");
            if($gn == 'op'){
                if(!file_exists(PLUGIN_PATH . "/{$name}/inc.php"))
                    return $this->mess("这个插件没有配置功能");

                $file = file(PLUGIN_PATH . "/{$name}/inc.php");
                $json = isset($file[1]) ? json_decode($file[1],true) : array();

                foreach ($_POST as $k => $v) {
                    $json[$k] = $v;
                }

                put_tmp_file(PLUGIN_PATH . "/{$name}/inc.php",json_encode($json));
                return $this->mess("插件修改成功");
            }elseif($gn == 'install'){ //安装插件
                $path = PLUGIN_PATH . "/{$name}/function.php";
                if(!file_exists($path))
                    return $this->mess('这个插件 没有安装功能');

                include $path;
                if(plugin_install()){
                    file_put_contents(PLUGIN_PATH . "/{$name}/install",'');
                    //del_cache_file($this->conf);
                    return $this->mess('安装成功');
                }
                else{
                    return $this->mess('安装失败');
                }


 
            }elseif($gn == 'uninstall'){ //卸载插件
                $path = PLUGIN_PATH . "/{$name}/function.php";
                if(!file_exists($path))
                    return $this->mess('这个插件 没有安装功能');

                include $path;
                if(plugin_uninstall()){
                    if(!file_exists(PLUGIN_PATH . "/{$name}/install"))
                        return $this->mess('这个插件并没有安装,你不需要卸载');
                    unlink(PLUGIN_PATH . "/{$name}/install");
                    //del_cache_file($this->conf);
                    return $this->mess('卸载成功');
                }
                else{
                    return $this->mess('卸载失败');
                }
            }elseif($gn == 'del'){ //删除插件
                deldir(PLUGIN_PATH . "{$name}");
                //del_cache_file($this->conf);
                return $this->mess('删除成功');
            }elseif($gn == 'add'){ //添加插件
                $name = X("post.name"); //插件名
                $name2= X("post.name2"); //插件英文名
                $user = X("post.user"); //作者
                $icon = X("post.icon"); //fa图标

                $mess = X("post.mess"); //插件描述

                $inc = X("post.inc"); //是否开启配置功能
                $fun = X("post.fun"); //是否支持函数

                if(is_dir(PLUGIN_PATH . $name2))
                    return $this->mess("已存在相同英文名的插件");
                mkdir(PLUGIN_PATH . $name2);
                file_put_contents(PLUGIN_PATH . $name2 . '/conf.php',"<?php
return array(
    'name' => '{$name}',
    'user' => '{$user}',
    'icon' => '{$icon}',
    'mess' => '{$mess}',
    'version' => '1.0',
);");
                if($inc){
                    put_tmp_file(PLUGIN_PATH . $name2 . '/inc.php','{}');
                    file_put_contents(PLUGIN_PATH . $name2 . '/conf.html','在这里输入你的HTML表单');
                }
                if($fun){
                    file_put_contents(PLUGIN_PATH . $name2 . '/function.php','<?php
function plugin_install(){
    return true;
}
function plugin_uninstall(){
    return true;
}
                    ');
                }

                return $this->mess("插件建立成功,请打开" . PLUGIN_PATH . $name2 . '进行开发吧');
            }

            return $this->mess("未知参数1");


        }

        if(IS_AJAX){
            $update = X("post.update");
            $state = X("post.state");
            $name = X("get.name");
            $gn = X("get.gn");

            if(!empty($update)){ //插件开关
                if($state == 'on'){
                    if(is_file(PLUGIN_PATH . '/' . $update . '/on'))
                        unlink(PLUGIN_PATH . '/' . $update . '/on');
                }
                else{
                    file_put_contents(PLUGIN_PATH . '/' . $update . '/on','');
                }
                del_cache_file($this->conf);
                return $this->json(array('error'=>true,'info'=>'修改成功'));
            }elseif(!empty($name)){ //加载插件配置
                if($gn == 'op'){ // 显示插件配置模板
                    $conf = PLUGIN_PATH . "/{$name}/conf.html";
                    if(!file_exists($conf))
                        die('这个插件没有配置功能');

                    $file = file(PLUGIN_PATH . "/{$name}/inc.php");
                    $this->v('inc',isset($file[1]) ? json_decode($file[1],true) : array());
                    C("DEBUG_PAGE",false);
                    return $this->display("plugin.{$name}::conf");
                }elseif($gn == 'install'){ //显示插件安装配置
                    $path = PLUGIN_PATH . "/{$name}/function.php";
                    if(!file_exists($path))
                        die('这个插件 没有安装功能');

                        die (str_replace('<?php','','<div class="alert alert-danger alert-custom alert-dismissible" role="alert">
    				    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    				     	<i class="fa fa-times-circle m-right-xs"></i> <strong>警告!</strong>插件的安装与卸载可能会做一些危险动作,请慎重执行!
    				    </div><pre>'.file_get_contents($path)."</pre>"));


                    //?/C("DEBUG_PAGE",false);
                    //return;
                }elseif($gn == 'uninstall'){
                    $path = PLUGIN_PATH . "/{$name}/function.php";
                    if(!file_exists($path))
                        die('这个插件 没有安装功能');

                    die (str_replace('<?php','','<div class="alert alert-danger alert-custom alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				     	<i class="fa fa-times-circle m-right-xs"></i> <strong>警告!</strong>插件的安装与卸载可能会做一些危险动作,请慎重执行!
				    </div><pre>'.file_get_contents($path)."</pre>"));
                }

            }
            return $this->mess("未知参数2");


        }



        $ml = scandir(PLUGIN_PATH);
        $qj = array();

        foreach ($ml as $key=> &$v) {

            $conf_path = PLUGIN_PATH.'/'.$v.'/conf.php';
            if($v=='.'||$v=='..'||!is_dir(PLUGIN_PATH.'/'.$v) || !file_exists($conf_path)){
                unset($ml[$key]);
                continue;
            }
            $qj[$key] = include $conf_path;
            //$qj[$key]['path'] =
            if(file_exists(PLUGIN_PATH.'/'.$v.'/on'))
                $qj[$key]['on'] = true;

        }
        unset($v);
        foreach ($qj as &$v) {
            isset($v['version']) or $v['version'] = '1.0';
        }


        $this->menu_action['code'] = ' active open';
        $this->v("menu_action",$this->menu_action);
        $this->v("conf",$qj);
        $this->v('data',$ml);
        $this->display('code');

    }
    public function code_op(){
        $this->menu_action['code'] = ' active open';
        $this->v("menu_action",$this->menu_action);

        if(IS_POST){
            $hook = X("post.hook");
            $code = X("post.code");
            $value = X("post.value");

            //if(!is_file(PLUGIN_PATH . "/{$name}/inc.php"))
                //return $this->mess("这个插件没有配置功能");
            $file=array();
            if(is_file(PLUGIN_PATH . "{$code}/p.php"))
                $file = file(PLUGIN_PATH . "{$code}/p.php");
            $json = isset($file[1]) ? json_decode($file[1],true) : array();

            $json[$hook] = $value;
            


            put_tmp_file(PLUGIN_PATH . "{$code}/p.php",json_encode($json));
            $this->json(array('error'=>true));
        }

        $ml = scandir(PLUGIN_PATH);
        $qj = array();

        foreach ($ml as $key=> &$v) { 

            $conf_path = PLUGIN_PATH.'/'.$v.'/conf.php';
            if($v=='.'||$v=='..'||!is_dir(PLUGIN_PATH.'/'.$v) || !file_exists($conf_path)){
                unset($ml[$key]);
                continue;
            }
            //$qj[$key] = include $conf_path;
            //$qj[$key]['path'] =
            if(file_exists(PLUGIN_PATH.'/'.$v.'/on'))
                $qj[$key]['on'] = true;

            $v=array('name'=>$v,'hook'=>scandir(PLUGIN_PATH.'/'.$v),'p'=>array());
            foreach ($v['hook'] as $k=> &$vv) {
                if(substr(strrchr($vv, '.'), 1) != 'hook')
                    unset($v['hook'][$k]);
            }
            if(empty($v['hook'])){
                unset($ml[$key]);
                continue;
            }
            $v['conf'] = include $conf_path;
            isset($v['conf']['version']) or $v['conf']['version'] = '1.0';
            if(is_file(PLUGIN_PATH.'/'.$v['name'] . "/p.php")){
                $file = file(PLUGIN_PATH.'/'.$v['name'] ."/p.php");
                $v['p'] = isset($file[1]) ? json_decode($file[1],true) : array();

            }

            

        }
        // unset($v);
        // foreach ($qj as &$v) {
        //     isset($v['version']) or $v['version'] = '1.0';
        // }
        //$this->v("conf",$qj);
        $this->v('data',$ml);
        //print_r($ml);
        $this->display('code_op');
            
    }
    //分类版主
    public function forumg(){
        $this->menu_action['forum'] = ' active open';
        $this->v("menu_action",$this->menu_action);
        if(IS_POST){
            //删除缓存
            $this->CacheObj->rm('forum');
            $gn = X("post.gn");
            $id = X("post.id");
            $user = X("post.user");
            if($gn == 'forumg'){
                S("Forum")->update(array(
                    'forumg'=>$user
                ),array(
                    'id'=>$id
                ));
                return $this->mess('修改完成');
            }else{
                $forum = M("Forum")->read_all();
                $arr = json_decode($forum[$id]['json'],true);
                $arr[$gn] = $user;
                S("Forum")->update(array(
                    'json'=>json_encode($arr)
                ),array(
                    'id'=>$id
                ));

            }
        }
        if(IS_AJAX){
            $id = X("get.id");
            $gn = X("get.gn");

            if($gn == 'forumg'){
                if($id > -1){
                    $user = S("Forum")->find("forumg",array(
                        'id'=>$id
                    ));
                    $this->v("user",$user);
                    $this->v("id",$id);
                    $this->display("ajax_forum");
                    exit;
                }
            }else{
                $forum = M("Forum")->read_all();
                $arr = json_decode($forum[$id]['json'],true);
                $this->v("user",isset($arr[$gn])?$arr[$gn]:'');
                $this->v("id",$id);
                $this->display("ajax_forum");
                exit;
            }


        }


        $Forum = S("Forum");
        $data = $Forum->select("*");

        $User = M("User");
        foreach ($data as &$v) {
            $tmp = explode(",",$v['forumg']);
            if(!count($tmp))
                continue;
            $v['user'] = array();
            foreach ($tmp as $vv) {
                $v['user'][]=$User->id_to_user(intval($vv));

            }
            //$v['user'] = $user;
            unset($tmp);
        }
        $Usergroup = M("Usergroup");
        foreach ($data as &$v) {
            $arr = json_decode($v['json'],true);
            $v['jsonarr'] = array(
                "vforum"=>array(),
                'vthread'=>array(),
                'thread'=>array(),
                'post'=>array(),
                'downfile'=>array(),
            );

            if(is_array($arr)){
                foreach ($arr as $key=>$value) {
                    $v['jsonarr']["$key"]=array();
                    //分割 json
                    $tmp = explode(",",$arr["$key"]);
                    if(!count($tmp))
                        continue;

                    foreach ($tmp as $vv) {
                        $v['jsonarr']["$key"][]=$Usergroup->id_to_name(intval($vv));
                    }
                    unset($tmp);
                }
            }

            //$v['user'] = $user;


        }

        $this->v("data",$data);
        $this->display('forumg');
    }
    public function forum_json(){
        $this->menu_action['forum'] = ' active open';
        $this->v("menu_action",$this->menu_action);

        if(IS_POST){
            //删除缓存
            $this->CacheObj->rm('forum');
            $gn = X("post.gn");
            $id = X("post.id");
            $user = X("post.user");
            if($gn == 'forumg'){
                S("Forum")->update(array(
                    'forumg'=>$user
                ),array(
                    'id'=>$id
                ));
                return $this->mess('修改完成');
            }else{
                $forum = M("Forum")->read_all();
                $arr = json_decode($forum[$id]['json'],true);
                $arr[$gn] = $user;
                S("Forum")->update(array(
                    'json'=>json_encode($arr)
                ),array(
                    'id'=>$id
                ));

            }
        }

        
        if(IS_AJAX){
            $id = X("get.id");
            $gn = X("get.gn");

            if($gn == 'forumg'){
                if($id > -1){
                    $user = S("Forum")->find("forumg",array(
                        'id'=>$id
                    ));
                    $this->v("user",$user);
                    $this->v("id",$id);
                    $this->display("ajax_forum");
                    exit;
                }
            }else{
                $forum = M("Forum")->read_all();
                $arr = json_decode($forum[$id]['json'],true);
                $this->v("user",isset($arr[$gn])?$arr[$gn]:'');
                $this->v("id",$id);
                $this->display("ajax_forum");
                exit;
            }


        }


        $Forum = S("Forum");
        $data = $Forum->select("*");

        $User = M("User");
        foreach ($data as &$v) {
            $tmp = explode(",",$v['forumg']);
            if(!count($tmp))
                continue;
            $v['user'] = array();
            foreach ($tmp as $vv) {
                $v['user'][]=$User->id_to_user(intval($vv));

            }
            //$v['user'] = $user;
            unset($tmp);
        }
        $Usergroup = M("Usergroup");
        foreach ($data as &$v) {
            $arr = json_decode($v['json'],true);
            $v['jsonarr'] = array(
                "vforum"=>array(),
                'vthread'=>array(),
                'thread'=>array(),
                'post'=>array(),
                'downfile'=>array(),
            );

            if(is_array($arr)){
                foreach ($arr as $key=>$value) {
                    $v['jsonarr']["$key"]=array();
                    //分割 json
                    $tmp = explode(",",$arr["$key"]);
                    if(!count($tmp))
                        continue;

                    foreach ($tmp as $vv) {
                        $v['jsonarr']["$key"][]=$Usergroup->id_to_name(intval($vv));
                    }
                    unset($tmp);
                }
            }

            //$v['user'] = $user;


        }



        $this->v("data",$data);
        $this->display('forum_json');
    }
    //分类图标上传
    public function forumupload(){
        $upload = new \Lib\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小  3M
        $upload->exts      =     explode(",",$this->conf['uploadimageext']);// 设置图片上传类型
        $upload->rootPath  =     INDEX_PATH. "upload/"; // 设置图片上传根目录

        $upload->replace    =   true;
        $upload->autoSub    =   false;
        $upload->saveName   =   'forum'.X("post.forum"); //保存文件名
        $upload->saveExt    =   'png';
        if(!is_dir(INDEX_PATH. "upload"))
            mkdir(INDEX_PATH. "upload");

        $info   =   $upload->upload();
        if(!$info) {
            return $this->mess("上传失败 Error : " . $upload->getError());
        }
        else{
            header('Location: '.WWW.'admin' . EXP . 'forum');
            exit;
        }


    }
    public function hybbsupdate(){
        $data = file_get_contents(C("PLUGIN_DOWN").'ajax/update');
        if(!empty($data)){
            //$json = json_decode($data,true);
            if($data != HYBBS_V)
                $this->json(array('error'=>true,'info'=>$data));

        }
        $this->json(array('error'=>false,'info'=>'无更新'));
    }
    public function update(){
        if(IS_POST){
            $gn = X("post.gn");
            if($gn == 'down'){//下载最新压缩包
                $data = file_get_contents(C("PLUGIN_DOWN").'ajax/update');
                if(empty($data))
                    $this->json(array('error'=>false,'info'=>'获取不到最新论坛版本!Error = 1'));
                if(is_file(TMP_PATH . $data .'.zip'))
                    unlink(TMP_PATH . $data .'.zip');
                http_down(TMP_PATH . $data .'.zip',C("PLUGIN_DOWN") .'downplugin/' .  $data.'.zip');
                if(is_file(TMP_PATH . $data .'.zip'))
                    $this->json(array('error'=>true,'info'=>'下载完成，正在请求解压！'));
                $this->json(array('error'=>false,'info'=>'下载失败！'));
            }elseif($gn == 'unzip'){
                $data = file_get_contents(C("PLUGIN_DOWN").'ajax/update');
                if(empty($data))
                    $this->json(array('error'=>false,'info'=>'获取不到最新论坛版本!Error = 2'));
                if(!is_file(TMP_PATH . $data .'.zip'))
                    $this->json(array('error'=>false,'info'=>'解压失败，新论坛程序不存在！'));
                $zip = L("Zip");
                
                @$zip->unzip(TMP_PATH . $data .'.zip', TMP_PATH);
                
                if(!is_dir(TMP_PATH . $data))
                    $this->json(array('error'=>false,'info'=>'压缩包已损坏，请重新下载！'));
                $this->json(array('error'=>true,'info'=>'解压完成，进行安装！','url'=>WWW.'Tmp/'.$data.'/update.php'));

            }elseif($gn == 'sql'){
                $data = file_get_contents(C("PLUGIN_DOWN").'ajax/update');
                if(empty($data))
                    $this->json(array('error'=>false,'info'=>'获取不到最新论坛版本!Error = 3'));
                if(!is_dir(TMP_PATH . $data))
                    $this->json(array('error'=>false,'info'=>'无法升级SQL，原因：升级目录不存在！'));
                if(!is_file(TMP_PATH . $data.'/sql.php'))
                    $this->json(array('error'=>true,'info'=>'论坛升级完成！'));
                include TMP_PATH . $data.'/sql.php';
                if(!function_exists('bbs_install'))
                    $this->json(array('error'=>false,'info'=>'升级SQL失败，没有找到SQL升级程序！'));
                if(!bbs_install())
                    $this->json(array('error'=>false,'info'=>'执行SQL失败！'));
                del_cache_file($this->conf);
                $this->json(array('error'=>true,'info'=>'论坛升级完成！'));

            }
        }
        $this->json(array('error'=>false,'info'=>'丢失参数!'));
    }
    public function get_code_json(){
        $json = file_get_contents(APP_WWW . 'json/code?time=' .NOW_TIME.'&key=' . APP_KEY . '&domain=' . WWW );
        die($json);
    }
    public function get_theme_json(){
        $json = file_get_contents(APP_WWW . 'json/theme?time=' .NOW_TIME.'&key=' . APP_KEY . '&domain=' . WWW );
        die($json);
    }
    public function get_view_inc(){
        $name = X("get.name");
        $this->view = $name;
        $this->display('conf');
    }
    public function get_ip(){
        $json = file_get_contents(APP_WWW . 'json/get_ip');
        die($json);
    }

    
}
