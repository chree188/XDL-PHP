<?php
namespace Action;
use HY\Action;
!defined('HY_PATH') && exit('HY_PATH not defined.');
class PostAction extends HYBBS {



	public $tid=0;
	public $posts=0;
	public $title;
	public $content;



	public function __construct() {
		parent::__construct();
		//{hook a_post_init}
		if(!IS_LOGIN){
			if(IS_AJAX && IS_POST)
				die($this->json(array('error'=>false,'info'=>'请登录后再操作')));
			else
				die($this->message("请登录后在操作"));

		}
		
	}
	//发表评论
	public function Post(){
		//{hook a_post_post_1}
		$this->v('title','发表评论');
		if(!IS_POST)
			return;

		$UsergroupLib = L("Usergroup");
		//用户组权限判断
		if(!$UsergroupLib->read($this->_user['group'],'post',$this->_usergroup))
			return $this->json(array('error'=>false,'info'=>'你当前所在用户组无法发表评论'));

		//{hook a_post_post_2}
		$id= intval(X("post.id"));
		if(empty($id))
			return $this->json(array('error'=>false,'info'=>'文章ID不能为空'));
		if(!isset($_POST['content']))
			return $this->json(array('error'=>false,'info'=>'内容不能为空'));
		//{hook a_post_post_3}
		$content = X('post.content');
		
		if(NOW_GROUP != C("ADMIN_GROUP"))
			$content=$this->uh($content);
		//去除image 所有属性
		//$content = preg_replace("/<img.*?src=(\"|\')(.*?)\\1[^>]*>/is",'<img src="$2" />', $content);
		//删除 img的宽度与高度 
		//$content = preg_replace('/(<img.*?)((width)=[\'"]+[0-9]+[\'"]+)/is','$1', $content);
		$content = preg_replace('/(<img.*?)((height)=[\'"]+[0-9]+[\'"]+)/is','$1', $content);
		//去除泰文音标
		$content = preg_replace( '/\p{Thai}/u' , '' , $content );

		$tmp = trim(strip_tags($content,'<img>'));
		

		if(empty($tmp))
			return $this->json(array('error'=>false,'info'=>'内容不能为空'));
		//{hook a_post_post_4}
		//获取文章数据
		$thread_data = S("Thread")->find('*',array('id'=>$id));
		//锁帖判断
		if($thread_data['state'] && NOW_UID != $thread_data['uid'] && NOW_GROUP != C("ADMIN_GROUP") && !is_forumg($this->_forum,NOW_UID,$thread_data['fid']))
			return $this->json(array('error'=>false,'info'=>'帖子已经被锁定'));
		if(!L("Forum")->is_comp($thread_data['fid'],NOW_GROUP,'post',$this->_forum[$thread_data['fid']]['json']))
			return $this->json(array('error'=>false,'info'=>'你没有权限发表'));

		//{hook a_post_post_5}
		$this->tid = $id;
		$this->posts = $thread_data['posts'];
		$this->title = $thread_data['title'];

		//发送消息摘要
		$this->content = mb_substr(strip_tags($content), 0,100);

		//{hook a_post_post_6}
		//通知@ 用户
		if($UsergroupLib->read(NOW_GROUP,'mess',$this->_usergroup))
			$content = $this->tag($content);

		//写入评论数据
		$Post = S("Post");
		//$Count = M("Count");
		$Post->insert(array(
			//'id'	=> $Count->_get("post"),
			'tid'	=> $id,
			'fid'	=> $thread_data['fid'],
			'uid'	=> $this->_user['id'],
			'content' => $content,
			'atime'	  => NOW_TIME
		));
		//分类 评论数量+1
		M("Forum")->update_int($thread_data['fid'],'posts');
		$this->_forum[$thread_data['fid']]['posts']++;
		$this->CacheObj->forum = $this->_forum;
		$this->_count['post']++;
		$this->_count['day_post']++;
		$this->CacheObj->bbs_count = $this->_count;
		if($thread_data['top']==1) //如果是板块置顶帖子，清理该板块置顶帖子缓存
			$this->CacheObj->rm("forum_top_id_".$thread_data['fid']);
		elseif($thread_data['top']==2)
			$this->CacheObj->rm("top_data_2");
		//{hook a_post_post_7}
		//更新主题 回复帖子数
		$Thread = S("Thread");
		$Thread->update(array(
			'posts'=>$Post->count(array('tid'=>$id))-1, //评论数+1
			'btime'=>NOW_TIME, // 最后评论过时间
			'buid'=>$this->_user['id'], //最后回复者用户ID
		),array(
			'id'=>$id //$id = 主题ID
		));
		//{hook a_post_post_8}
		$User = M("User");
		//用户评论数+1
		$User->update_int($this->_user['id'],'posts','+');
		//增加金币
		$User->update_int($this->_user['id'],'gold','+',$this->conf['gold_post']);
		//增加积分
		$User->update_int($this->_user['id'],'credits','+',$this->conf['credits_post']);
		$this->_user['posts']++;
		if($thread_data['uid'] != $this->_user['id']){
			M("Chat")->sys_send($thread_data['uid'],'<a href="'. WWW.URL('my',$this->_user['user'],'').'" target="_blank">['.$this->_user['user'].']</a> 回复了你的主题 ['.$thread_data['title'].'] <a href="'. WWW.URL('thread','',EXP.$thread_data['id']).'" target="_blank">点击查看</a>');
			// M("Mess")->send(
			// 	$thread_data['uid'], //接收者ID
			// 	$this->_user['id'],  //发送者ID
			// 	0, //类型
			// 	$thread_data['id'],
			// 	$thread_data['posts']+1
			// );
		}
		//{hook a_post_post_9}

		if($thread_data['top'] == 2)
			$this->CacheObj->rm("top_data_2");
		elseif($thread_data['top'] == 1)
			$this->CacheObj->rm("forum_top_id_".$thread_data['fid']);

		$this->CacheObj->rm("index_index_Btime_1");
		$this->CacheObj->rm("index_index_{$thread_data['fid']}_1_Btime");

		//管理员无法升级
		if(NOW_GROUP != C("ADMIN_GROUP")){
			//获取用户积分
			$user_credits = $User->get_credits(NOW_UID);
			//echo $user_credits;
			//用户组升级检测
			$tmp_group = array();
			foreach ($this->_usergroup as $v) {
				//过滤无法升级,积分过大,已经是该用户组的数组删除
				if($v['credits'] != -1 && $user_credits > $v['credits'] && NOW_GROUP != $v['id']){ //过滤无法升级用户组
					
					$tmp_group[]=$v;	
				}
			}
			//冒泡排序
			$tmp = array('id'=>-1,'credits'=>-1);
			
			foreach ($tmp_group as $v) {
				if($v['credits'] > $tmp['credits'] && $v['credits'] > $this->_usergroup[NOW_GROUP]['credits'])
					$tmp=array('id'=>$v['id'],'credits'=>$v['credits']);

			}
			
			if($tmp['id']!= -1){
				
				$User->set_group(NOW_UID,$tmp['id']);
			}
			
			
		}
		

		//{hook a_post_post_v}
		return $this->json(array('error'=>true,'info'=>'发表成功'));

	}
	//发表主题
	public function Index(){
		//{hook a_post_index_1}
		$this->v('title','发表主题');
        if(IS_GET){ //显示发表主题模板
			//{hook a_post_index_2}
            $Forum = S("Forum");
            $data = $Forum->select("*");

			//{hook a_post_index_3}
            $this->v("forum",$data);
    		$this->display('post_index');
        }elseif(IS_POST){ //POST发表主题
			//{hook a_post_index_4}
			$UsergroupLib = L("Usergroup");

			if(!$UsergroupLib->read(NOW_GROUP,'thread',$this->_usergroup))
				return $this->json(array('error'=>false,'info'=>'你当前所在用户组无法发表主题'));


			//获取提交数据
            $forum = intval(X("post.forum"));
            $title = trim(X("post.title"));
            $tgold = intval(X("post.tgold"));
            $thide = intval(X("post.thide"));
            
            //{hook a_post_index_44}
            if(!$UsergroupLib->read(NOW_GROUP,'thide',$this->_usergroup)){
            	if($thide)
            		return $this->json(array('error'=>false,'info'=>'你所在用户组无法隐藏帖子'));
            	$thide = 0;
            }
            if(!$UsergroupLib->read(NOW_GROUP,'tgold',$this->_usergroup)){
            	if($tgold)
            		return $this->json(array('error'=>false,'info'=>'你所在用户组无法设置金币付费帖子'));
            	$tgold = 0;
            }
            //{hook a_post_index_55}

            //去除泰文音标
			$title = preg_replace( '/\p{Thai}/u' , '' , $title );

            $content = X('post.content');
            
			if(NOW_GROUP != C("ADMIN_GROUP"))
				$content=$this->uh($content);
            $content=preg_replace( '/\p{Thai}/u' , '' , $content );

            //{hook a_post_index_5}
			$tmp = strip_tags($content,'<p>');
            if(empty($tmp))
				return $this->json(array('error'=>false,'info'=>'内容不能为空'));

			//{hook a_post_index_6}
            if(mb_strlen($title) < $this->conf['titlemin'])
				return $this->json(array('error'=>false,'info'=>'标题长度不能小于'.$this->conf['titlemin'].'个字符'));
			if(mb_strlen($title) > $this->conf['titlesize'])
				return $this->json(array('error'=>false,'info'=>'标题长度不能大于'.$this->conf['titlesize'].'个字符'));
			if($forum < 0 ){
				return $this->json(array('error'=>false,'info'=>'请选择一个分类,板块'));
			}
			//{hook a_post_index_7}
			//用户组在分类下的权限判断
			if(!L("Forum")->is_comp($forum,NOW_GROUP,'thread',$this->_forum[$forum]['json']))
				return $this->json(array('error'=>false,'info'=>'你没有权限发表'));

			//{hook a_post_index_8}


            if(!isset($this->_forum[$forum])){
				if(empty($this->_forum[$forum]['id']))
					return $this->json(array('error'=>false,'info'=>'不存在该分类'));
			}
			//{hook a_post_index_88}


            $Count = M("Count");
            $id = $Count->_get('thread');
            $this->tid = $id;
            $this->title=$title;

			//echo $id;

            //去除image 所有属性
            //$content = preg_replace("/<img.*?src=(\"|\')(.*?)\\1[^>]*>/is",'<img src="$2" />', $content);
            //
            //去除图标中的width 与 height 防止在页面上 变形
            //$content = preg_replace('/(<img.*?)((width)=[\'"]+[0-9]+[\'"]+)/is','$1', $content);
			$content = preg_replace('/(<img.*?)((height)=[\'"]+[0-9]+[\'"]+)/is','$1', $content);




			//{hook a_post_index_9}
            //获取所有图片地址
			$pattern="/\<img.*?src\=\"(.*?)\"[^>]*>/i";
			preg_match_all($pattern,$content,$match);
			$img = '';
			$sz=0;
			if(isset($match[1][0])){
				foreach ($match[1] as $v) {
					$sz++;
					if($sz>4){

					}
					else{
						$img.=$v;
						$img.=",";
					}
					
				}
			}

			//发送消息 摘要
			$this->content = mb_substr(strip_tags($content), 0,100);

			//{hook a_post_index_10}
			// 权限判断是否可 @
			if($UsergroupLib->read(NOW_GROUP,'mess',$this->_usergroup))
				$content = $this->tag($content); //@ 用户函数


			//主题数据
            $Thread = S("Thread");
            $Thread->insert(array(
                'id'=>$id,
                'fid'=>$forum,
                'uid'=>$this->_user['id'],
                'title'=>$title,
                'summary'=>mb_substr(strip_tags($content), 0,100),
				'atime'	=>NOW_TIME,
				'btime'	=>NOW_TIME,

				'img'	=>$img,
				'img_count'	=>$sz,
				'hide'	=>$thide?1:0,
				'gold'	=>$tgold,
            ));
            //{hook a_post_index_100}

            //主题帖子数据
            $Post = S("Post");
            $Post->insert(array(
                //'id'	=> $Count->_get("post"),
				'tid'	=> $id,
				'fid'	=>$forum,
				'uid'	=> $this->_user['id'],
				'isthread'=> 1,
				'content' => $content,
				'atime'	  => NOW_TIME
            ));
            //{hook a_post_index_11}

            //是否有权限上传附件
            if($UsergroupLib->read(NOW_GROUP,'uploadfile',$this->_usergroup)){

	            //处理附件
	            $fileid 	= X("post.fileid");
	            $filegold 	= X("post.filegold");
	            $filemess 	= X("post.filemess");
	            $filehide 	= X("post.filehide");
	            //{hook a_post_index_12}

	            if(!empty($fileid)){
	            	//{hook a_post_index_13}
	            	$fileid_arr 	= explode("||",$fileid);
	            	$filegold_arr 	= explode("||",$filegold);
	            	$filemess_arr 	= explode("||",$filemess);
	            	$filehide_arr 	= explode("||",$filehide);

	            	if(count($fileid_arr)){
	            		//{hook a_post_index_14}

	            		$File = M("File");
	            		$Fileinfo = S("Fileinfo");
	            		$i = 0;
	            		foreach ($fileid_arr as $key => $v) {
	            			//{hook a_post_index_15}
	            			if(empty($v))
	            			{
	            				
	            				continue;
	            			}
	            			$i++;
	            			//判断附件ID 是否属于 发帖者
	            			if($File->is_comp(intval($v),$this->_user['id'])){
	            				$Fileinfo->insert(array(
	            					'fileid'	=>	intval($v),
	            					'tid'		=>	$id,
	            					'uid'		=>	$this->_user['id'],
	            					'gold'		=>	isset($filegold_arr[$key]) ? intval($filegold_arr[$key]) : 0,
	            					'hide'		=>	isset($filehide_arr[$key]) ? intval($filehide_arr[$key]) : 0,
	            					'mess'		=>	isset($filemess_arr[$key]) ? $filemess_arr[$key] : '',
	            				));
	            			}

	            		}
	            		//{hook a_post_index_16}
	            		$Thread->update(array('files'=>$i),array('id'=>$id)); //更新主题附件数量
	            	}
	            }//处理附件结束

            }
            //{hook a_post_index_17}



			$User = M("User");
			//用户增加 主题数
			$User->update_int($this->_user['id'],'threads','+');

			//用户增加 金钱
			$User->update_int($this->_user['id'],'gold','+',$this->conf['gold_thread']);
			//用户增加 积分
			$User->update_int($this->_user['id'],'credits','+',$this->conf['credits_thread']);


			//分类板块 帖子数量++
			M("Forum")->update_int($forum);

			//更新分类缓存
			$this->_forum[$forum]['threads']++;
			$this->CacheObj->forum = $this->_forum;
			//更新统计缓存
			$this->_count['thread']++;
			$this->_count['day_thread']++;
			$this->CacheObj->bbs_count = $this->_count;

			$this->_user['threads']++;

			//删除第一页缓存
			$this->CacheObj->rm("index_index_New_1");
			$this->CacheObj->rm("index_index_Btime_1");

			$this->CacheObj->rm("index_index_{$forum}_1_Btime");
			$this->CacheObj->rm("index_index_{$forum}_1_New");
			

			//var_dump();

			//管理员无法升级
			if(NOW_GROUP != C("ADMIN_GROUP")){
				//获取用户积分
				$user_credits = $User->get_credits(NOW_UID);
				//echo $user_credits;
				//用户组升级检测
				$tmp_group = array();
				foreach ($this->_usergroup as $v) {
					//过滤无法升级,积分过大,已经是该用户组的数组删除
					if($v['credits'] != -1 && $user_credits > $v['credits'] && NOW_GROUP != $v['id']){ //过滤无法升级用户组
						
						$tmp_group[]=$v;	
					}
				}
				//冒泡排序
				$tmp = array('id'=>-1,'credits'=>-1);
				
				foreach ($tmp_group as $v) {
					if($v['credits'] > $tmp['credits'] && $v['credits'] > $this->_usergroup[NOW_GROUP]['credits'])
						$tmp=array('id'=>$v['id'],'credits'=>$v['credits']);

				}
				
				if($tmp['id']!= -1){
					
					$User->set_group(NOW_UID,$tmp['id']);
				}
				
				
			}
			


			

			

			//{hook a_post_index_v}
            $this->json(array('error'=>true,'info'=>'发表成功','id'=>$id));




        }

	}

	//过滤
	private function uh($str)
	{
		//{hook a_post_uh_1}
		$farr = array(
			"/<(?)(script|style|html|body|title|link|meta|div)([^>]*?)>/isu",
			"/(<[^>]*)on[a-za-z]+s*=([^>]*>)/isu",
		);
		$tarr = array(
			" ",
			" ",
		);

		//$str = strip_tags($str,'<p><img><a><ul><li><blockquote><hr><table><colgroup><col><thead><tr><td><br><tbody><mark><video><embed><font><strike><i><b><h1><h2><h3><h4><h5><pre><code>');

		//$str = strip_tags($str,'<div>');
		$str = str_replace(array('<div>','</div>'),'',$str);
		$str = preg_replace( $farr,$tarr,$str);
		$str = preg_replace('/class=".*?"/i', '', $str); //过滤自定义样式
		
		$str = preg_replace('/(<.*?)style\s*=.*?(\w+\s*=|\s*>)/i', "$1$2", $str);
		//$str = L("Htmlsafe")->filter($str);
		//$str = preg_replace('/class="lang-c\+\+"/i', 'class="lang-cpp"', $str); //过滤不带有lang的
		//$str = preg_replace('/class=""/i', '', $str); //过滤不带有lang的
		//$str = preg_replace('/class="(s+)"/i', '', $str); //过滤不带有lang的
		//$str = preg_replace('/class="(?!lang).+?"/i', '', $str); //过滤不带有lang的
		//$str = preg_replace('/class="[^"]*\s[^"]*"/i', '', $str); //过滤带有空格的
		//$str = preg_replace('/(<.*?)class\s*=.*?(\w+\s*=|\s*>)/i', "$1$2", $str);
		//preg_replace_callback('/(<.*?)class\s*=.*?(\w+\s*=|\s*>)/i', array($this,'unclass'), $str);
		
		$str = preg_replace('/(<[^>]*)src="data:image\/.*?"([^>]*>)/i', '', $str); // 过滤 转码图片字节
		//{hook a_post_uh_2}
		return $str;
	}
	//过滤class属性 
	/*private function unclass($tagStr){
		//print_r($tagStr);
		var_dump($tagStr)
	}*/
	//@事件
	private function tag($content){
		//{hook a_post_tag_1}
		return preg_replace_callback('/@([^:|： @<&])+/',array($this, 'taga'),$content);
	}
	//''
	private function taga($tagStr){
		//{hook a_post_taga_1}
		//print_r($tagStr);
		if(is_array($tagStr)) $tagStr = $tagStr[0];

		$tagStr = stripslashes($tagStr);
		$user = substr($tagStr,1);
		$User = M("User");
		//$Mess = M("Mess");
		$Chat = M("Chat");
		//echo $user,'|',$this->_user['user'];
		static $tmp_user=array(); //@发送一次
		if($user != $this->_user['user']){ //不能发送给自己
			if(isset($tmp_user[$user]))
				return $tagStr;
			if($User->is_user($user)/* && isset($tmp_user[$user])*/){ //判断用户是否存在
				$tmp_user[$user]=true;
				M("Chat")->sys_send($User->user_to_id($user),'<a href="'. WWW.URL('my',$this->_user['user'],'').'" target="_blank">['.$this->_user['user'].']</a> @ 了你, 在主题 ['.$this->title.'] <a href="'. WWW.URL('thread','',EXP.$this->tid).'" target="_blank">点击查看</a>');
				return '<span class="label label-primary">'.$tagStr.'</span>';
			}
		}


		//$tagStr = str_replace('@','',$tagStr);
		return $tagStr;

	}
	//附件上传
	public function uploadfile(){
		//{hook a_post_uploadfile_1}
		//检测当前用户组是否有权限上传
		$UsergroupLib = L("Usergroup");
		if(!$UsergroupLib->read(NOW_GROUP,'uploadfile',$this->_usergroup))
			$this->json(array('error'=>false,'info'=>'你没有权限上传附件'));
		if($this->_user['file_size'] >= $this->_usergroup[NOW_GROUP]['space_size'])
			return $this->json(array("success"=>false,'msg'=>"你已经没有空间上传文件了!需要提升用户组哦!","file_path"=>''));

		//{hook a_post_uploadfile_2}
		$upload = new \Lib\Upload();
        $upload->maxSize   =     ($this->conf['uploadfilemax']*1024)*1024 ;// 设置附件上传大小  3M
        $upload->exts      =     explode(",",$this->conf['uploadfileext']);// 设置附件上传类型
        $upload->rootPath  =      INDEX_PATH. "upload/userfile/".$this->_user['id']."/"; // 设置附件上传根目录
        $upload->replace    =   true;
        $upload->autoSub    =   false;
        $upload->saveName   =   md5($this->_user['user'] . NOW_TIME.mt_rand(1,9999));
        //{hook a_post_uploadfile_3}
        if(!is_dir(INDEX_PATH. "upload"))
			mkdir(INDEX_PATH. "upload");
		if(!is_dir(INDEX_PATH. "upload/userfile"))
			mkdir(INDEX_PATH. "upload/userfile");
        if(!is_dir($upload->rootPath)){
        	mkdir($upload->rootPath);
        }

        $info   =   $upload->upload();
        //{hook a_post_uploadfile_4}
        //$id = 0;
        if($info) {
        	$id = S("File")->insert(array(
        		'uid'		=>	$this->_user['id'],
        		'filename'	=>	isset($info['photo'])?$info['photo']['name']:'未命名.'.$info['photo']['ext'],
        		'md5name'	=>	$upload->saveName.'.'.$info['photo']['ext'],
        		'filesize'	=>	$info['photo']['size'],
        		'atime'		=>	NOW_TIME
        	));
        	$file_size = $info['photo']['size'] / 1024; //得到kb单位
			if($file_size < 1 && $file_size > 0) //如果值为 0.x 则算作 1kb
				$file_size = 1;
			M("User")->update_int(NOW_UID,'file_size','+',$file_size);

        	//{hook a_post_uploadfile_5}
        	$this->json(array('error'=>true,'info'=>"上传成功",'id'=>$id,'name'=>$info['photo']['name']));
        }
        //{hook a_post_uploadfile_v}
        $this->json(array('error'=>false,"info"=>$upload->getError()));
        

	}
	//图片上传
	public function upload(){
		//{hook a_post_upload_1}
		$UsergroupLib = L("Usergroup");
		if(!$UsergroupLib->read(NOW_GROUP,'upload',$this->_usergroup))
			return $this->json(array("success"=>false,'msg'=>"用户组禁止上传图片!","file_path"=>''));

		if($this->_user['file_size'] >= $this->_usergroup[NOW_GROUP]['space_size'])
			return $this->json(array("success"=>false,'msg'=>"你已经没有空间上传文件了!需要提升用户组哦!","file_path"=>''));

		//{hook a_post_upload_2}
		$upload = new \Lib\Upload();// 实例化上传类
        $upload->maxSize   =     ($this->conf['uploadimagemax']*1024)*1024 ;// 设置附件上传大小  3M

        $upload->exts      =     explode(",",$this->conf['uploadimageext']);// 设置图片上传类型
        $upload->rootPath  =      INDEX_PATH. "upload/userfile/".NOW_UID."/"; // 设置图片上传根目录

        $upload->replace    =   true;
        $upload->autoSub    =   false;
        $upload->saveName   =   md5(NOW_USER . NOW_TIME.mt_rand(1,9999)); //保存文件名
        //{hook a_post_upload_22}
		if(!is_dir(INDEX_PATH. "upload"))
			mkdir(INDEX_PATH. "upload");
		if(!is_dir(INDEX_PATH. "upload/userfile"))
			mkdir(INDEX_PATH. "upload/userfile");
        if(!is_dir($upload->rootPath)){
        	mkdir($upload->rootPath);
        }
		//{hook a_post_upload_3}
		$info   =   $upload->upload();
		//print_r($info);
		//{hook a_post_upload_4}
		
		$d=array("success"=>true,'msg'=>"上传成功!","file_path"=>'');
		if(!$info) {
			$d['success']	= false;
        	$d['msg']		= $upload->getError();

		}else{ //上传成功
			
			$d['file_path'] = WWW . "upload/userfile/".NOW_UID."/".$info['photo']['savename'];
			$file_size = $info['photo']['size'] / 1024; //得到kb单位
			if($file_size < 1 && $filesize > 0) //如果值为 0.x 则算作 1kb
				$file_size = 1;
			M("User")->update_int(NOW_UID,'file_size','+',$file_size);

		}
		//{hook a_post_upload_v}
		if(X("post.geturl") == '1')
			die($d['file_path']);
		$this->json($d);

	}
	public function edit(){
		//{hook a_post_edit_1}
		$this->v('title','编辑帖子内容');
		if(IS_POST){
			//{hook a_post_edit_2}
			$id = intval(X("post.id"));
			$content = X('post.content');
			
			if(NOW_GROUP != C("ADMIN_GROUP"))
				$content=$this->uh($content);

			$content = preg_replace('/(<img.*?)((width)=[\'"]+[0-9]+[\'"]+)/is','$1', $content);
			$content = preg_replace('/(<img.*?)((height)=[\'"]+[0-9]+[\'"]+)/is','$1', $content);

			$content = preg_replace( '/\p{Thai}/u' , '' , $content );
			$tmp = strip_tags($content,'<p>');
			if(empty($tmp))
				return $this->json(array('error'=>false,'info'=>'内容不能为空'));
			//{hook a_post_edit_3}
			$Post = S("Post");
			$post_data = $Post->find("*",array(
				'id'=>$id
			));
			if(empty($post_data))
				return $this->json(array('error'=>false,'info'=>'评论不存在'));
        	//{hook a_post_edit_33}
			
			//评论数据不存在 或者 评论不属于当前登陆者 或者 登陆者不是管理员
			if(
				
				$post_data['uid'] != $this->_user['id'] && //编辑者不属于帖子作者
				$this->_user['group'] != C("ADMIN_GROUP") &&  //不属于管理员
				!is_forumg($this->_forum,$this->_user['id'],$post_data['fid']) //不是版主
			)
				return $this->json(array('error'=>false,'info'=>'太坏了,你居然想修改别人帖子'));

			$isthread = $post_data['isthread'];
			//{hook a_post_edit_34}


			//修改主题 评论是主题内容
			if($isthread){
				//{hook a_post_edit_35}

				$fid = intval(X("post.fid"));
				$title = trim(X("post.title"));
				$title = preg_replace( '/\p{Thai}/u' , '' , $title );
				if(mb_strlen($title) < 5)
					return $this->json(array('error'=>false,'info'=>'标题不能少于5个字符'));
				if($fid < 0 ){
					return $this->json(array('error'=>false,'info'=>'请选择一个分类,板块'));
				}
				//{hook a_post_edit_36}
	            if(!isset($this->_forum[$fid])){
					if(empty($this->_forum[$fid]['id']))
						return $this->json(array('error'=>false,'info'=>'不存在该分类'));
				}

				$tgold = intval(X("post.tgold"));
            	$thide = intval(X("post.thide"));
            	$UsergroupLib = L("Usergroup");
            	if(!$UsergroupLib->read(NOW_GROUP,'thide',$this->_usergroup)){
	            	$thide = 0;
	            }
	            if(!$UsergroupLib->read(NOW_GROUP,'tgold',$this->_usergroup)){
	            	$tgold = 0;
	            }
	            //{hook a_post_edit_37}

	            //获取所有图片地址
				$pattern="/\<img.*?src\=\"(.*?)\"[^>]*>/i";
				preg_match_all($pattern,$content,$match);
				$img = '';
				$sz=0;
				if(isset($match[1][0])){
					foreach ($match[1] as $v) {
						$sz++;
						if($sz>4){

						}
						else{
							$img.=$v;
							$img.=",";
						}
					}
				}

            	//编辑主题数据
				$Thread = S("Thread");
				$Thread->update(array(
					'fid'=>$fid,
					'title'=>$title,
					'hide'		=>	$thide?1:0,
					'gold'		=>	$tgold,
					'img'	=>	$img,
					'img_count'	=>	$sz
					),array(
					'id'=>$post_data['tid']
				));
				//{hook a_post_edit_38}


				if($UsergroupLib->read(NOW_GROUP,'uploadfile',$this->_usergroup)){
					//{hook a_post_edit_39}
					//echo 'xxxxxxxxxxxxx';
					//编辑附件
		            $fileid 	= X("post.fileid");
		            $filegold 	= X("post.filegold");
		            $filemess 	= X("post.filemess");
		            $filehide 	= X("post.filehide");
		            

		            if(!empty($fileid)){
		            	//{hook a_post_edit_40}

		            	$fileid_arr 	= explode("||",$fileid);
		            	$filegold_arr 	= explode("||",$filegold);
		            	$filemess_arr 	= explode("||",$filemess);
		            	$filehide_arr 	= explode("||",$filehide);

		            	if(count($fileid_arr)){
		            		//{hook a_post_edit_41}

		            		$File = M("File");
		            		$Fileinfo = S("Fileinfo");
		            		$Fileinfo->delete(array('tid'=>$post_data['tid']));
		            		$i = 0;

		            		foreach ($fileid_arr as $key => $v) {
		            			//{hook a_post_edit_42}
		            			if(empty($v))
		            			{
		            				
		            				continue;
		            			}
		            			$i++;
		            			if($File->is_comp(intval($v),$post_data['uid'])){
		            				$Fileinfo->insert(array(
		            					'fileid'	=>	intval($v),
		            					'tid'		=>	$post_data['tid'],
		            					'uid'		=>	$post_data['uid'],
		            					'gold'		=>	isset($filegold_arr[$key]) ? intval($filegold_arr[$key]) : 0,
		            					'hide'		=>	isset($filehide_arr[$key]) ? intval($filehide_arr[$key]) : 0,
		            					'mess'		=>	isset($filemess_arr[$key]) ? $filemess_arr[$key] : '',
		            					
		            				));
		            			}

		            		}
		            		//{hook a_post_edit_43}
		            		$Thread->update(array('files'=>$i),array('id'=>$post_data['tid'])); //更新主题附件数量
		            	}
		            }else{ //清空附件
	            		S("Fileinfo")->delete(array('tid'=>$post_data['tid']));
	            		$Thread->update(array('files'=>0),array('id'=>$post_data['tid'])); //更新主题附件数量

	            	}
				}

			}

			//{hook a_post_edit_4}
			//修改评论内容
			$Post->update(array(
				'content'=>$content
			),array(
				'id'=>$id
			));

			return $this->json(array('error'=>true,'info'=>'修改成功'));
		} //End Post
		//{hook a_post_edit_5}

		//编辑器帖子
		$id = intval(X("get.id"));
		$Post = S("Post");

		$data = $Post->find("*",array(
			'id'=>$id
		));

		//{hook a_post_edit_66}
		if(empty($data))
			return $this->message('评论不存在');
//var_dump( is_forumg($this->_forum,$this->_user['id'],$data['fid']));
		//不是帖子作者 并且 不是管理员 并且不是版主
		if(
			$this->_user['id'] != $data['uid'] && 
			NOW_GROUP != C("ADMIN_GROUP") && 
			!is_forumg($this->_forum,$this->_user['id'],$data['fid'])
		)
			return $this->message('太坏了,你居然想修改别人帖子 E= 2');
		//{hook a_post_edit_6}
		//获取帖子数据
		

		//属于主题帖子
		if($data['isthread']){
			//{hook a_post_edit_77}
			$thread_data = M("Thread")->read($data['tid']);
			$this->v('thread_data',$thread_data);


			$Fileinfo = S("Fileinfo");
	
			$file_list = $Fileinfo->select("*",array(
				'tid'=>$data['tid'],
				"ORDER" => "fileid ",
			));
			//{hook a_post_edit_88}
			if(!empty($file_list)){
				$File = M("File");
				foreach ($file_list as &$v) {
					$v['filename']=$File->get_name($v['fileid']);
				}
				

			}
			$this->v("file_list",$file_list);
		}
		
		//{hook a_post_edit_7}
		

		
		
		
		$this->v('id',$id);
		$this->v("data",$data);
        $this->display("edit_post");

	}
	//投票
	public function vote(){
		//{hook a_post_vote_1}
		if(!IS_LOGIN)
			return $this->json(array("error"=>false,"info"=>"你需要登录才可投票"));
		$id=intval(X("post.id")); // 提交ID
		$type = X("post.type"); //类型
		if($type!='thread1' && $type!='thread2' && $type!='post1' && $type!='post2' )
			return false;
		$type1=substr($type,0,-1);
		//$atime=null;

		if($type1 == 'thread'){
			$Thread = S("Thread");
			if(!$Thread->has(array('id'=>$id)))
				return $this->json(array("error"=>false,"info"=>"不存在该主题"));
			$obj = S("Vote_thread");
			if(!$obj->has(array(
				'AND'=>array(
					'uid'=>NOW_UID,
					'tid'=>$id
					)
				)
			)){
				if($type == 'thread1')
					$Thread->update(array('goods[+]'=>1),array('id'=>$id));
				else
					$Thread->update(array('nos[+]'=>1),array('id'=>$id));
				$obj->insert(array(
					'uid'	=>	NOW_UID,
					'tid'	=>	$id,
					'atime'	=>	NOW_TIME,
				));
				return $this->json(array("error"=>true,"info"=>"投票成功"));

			}
			return $this->json(array("error"=>false,"info"=>"你投过了"));
			
		}elseif($type1 == 'post'){
			$Post = S("Post");
			if(!$Post->has(array('id'=>$id)))
				return $this->json(array("error"=>false,"info"=>"不存在该评论"));

			$obj = S("Vote_post");
			if(!$obj->has(array(
				'AND'=>array(
					'uid'=>NOW_UID,
					'pid'=>$id
					)
				)
			)){
				if($type == 'post1')
					$Post->update(array('goods[+]'=>1),array('id'=>$id));
				else
					$Post->update(array('nos[+]'=>1),array('id'=>$id));
				$obj->insert(array(
					'uid'	=>	NOW_UID,
					'pid'	=>	$id,
					'atime'	=>	NOW_TIME,
				));
				return $this->json(array("error"=>true,"info"=>"投票成功"));
			}
			return $this->json(array("error"=>false,"info"=>"你投过了"));
			
		}

	}
	
	//删除评论， 不是 删除主题！
	public function del(){
		//{hook a_post_del_1}
		if(!IS_LOGIN)
            $this->json(array('error'=>false,'info'=>'请登录'));

		//用户组权限判断
		$UsergroupLib = L("Usergroup");
		if(!$UsergroupLib->read(NOW_GROUP,'del',$this->_usergroup))
			return $this->json(array('error'=>false,'info'=>'你当前所在用户组无法删除评论'));
		//{hook a_post_del_2}
		$id = intval(X("post.id"));
        $Post = M("Post");

		//获取 评论数据
        $p_data = $Post->read($id);
        if(empty($p_data))
            return $this->json(array('error'=>false,'info'=>'不存在此评论'));
        //{hook a_post_del_3}
		//获取 评论的板块ID
		$fid = $p_data['fid'];

		//$arr = explode(",",$this->_forum[$fid]['forumg']);

		//{hook a_post_del_4}
        //用户组不是 管理员 &&  用户不是文章作者
        if(
			($this->_user['group'] != C("ADMIN_GROUP")) &&
			($this->_user['id'] != $p_data['uid']) &&
			//array_search($this->_user['id'],$arr) === false
			!is_forumg($this->_forum,$this->_user['id'],$fid)
		)
            return $this->json(array('error'=>false,'info'=>'你没有权限操作这个评论'));

        //删除该ID评论
        $Post->del($id);
        //主题评论数-1
		M("Thread")->update_int($p_data['tid'],'posts','-');
		//帖子作者-1
		M("User")->update_int($p_data['uid'],'posts','-');
		//更新缓存
		$this->_forum[$fid]['posts']--;
		$this->CacheObj->forum = $this->_forum;
		$this->_count['post']--;
		$this->CacheObj->bbs_count = $this->_count;

		//{hook a_post_del_5}
        return $this->json(array('error'=>true,'info'=>'删除成功'));
	}
	//{hook a_post_fun}

}
