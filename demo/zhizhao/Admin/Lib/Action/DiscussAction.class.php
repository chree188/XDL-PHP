<?php
	//后台图文管理控制器
	class DiscussAction extends CommonAction{
		//分类列表视图
		public function sortList(){
			import('Class.Category','./');//引入无限极分类
			$sortList = M('discuss_sort')->order('sequence asc')->select();
			$sortList = deep_htmlspecialchars_decode($sortList); //查询输出了数据库数据之后记得反转义
			$sortList = Category::unlimitedForLevel($sortList,'&nbsp;&nbsp;&nbsp;&nbsp;');
			$this->assign('sortList',$sortList);
			$this->display();
		}
		//分类添加视图
		public function addSort(){
			import('Class.Category','./');//引入无限极分类
			$sortList = M('discuss_sort')->select();
			$sortList = deep_htmlspecialchars_decode($sortList); //查询输出了数据库数据之后记得反转义
			$sortList = Category::unlimitedForLevel($sortList,'&nbsp;&nbsp;&nbsp;&nbsp;');
			$this->assign('sortList',$sortList);
			//P($sortList); die();
			$this->display();	
		}
		//分类添加表单处理
		public function runAddSort(){
			parent::checkField('sort_name', deep_htmlspecialchars($_POST['sort_name']), 'require', '分类名称不能为空');
			if(M('discuss_sort')->add($_POST)){
				$this->success('添加成功',U(GROUP_NAME . '/Discuss/sortlist'));	
			}else{
				$this->error('添加失败');	
			}
		}
		//分类编辑视图
		public function editSort(){
			$db = M('discuss_sort');
			$POST = $_POST;
			if($_POST){
				$POST = deep_htmlspecialchars($_POST); //通过POST GET的数据记得转义
				parent::checkField('sort_name', $POST['sort_name'], 'require', '分类名称不能为空');
				$data = array();
				$data['id']=I('id',0,'intval');
				$data['sort_name']=I('sort_name');
				$data['status']=I('status',1,'intval');
				$result = $db->save($data);
				if($result){
					$this->success('操作成功',U(GROUP_NAME .'/Discuss/sortlist'));
				}else{
					$this->error('操作失败');	
				}
			}else{
				$id = I('id',0,'intval');
				$result = $db->where(array('id'=>$id))->find();
				$this->assign('result',$result);
				$this->display();
			}
		}
		//分类删除
		public function deleteSort(){
			$id = I('id',0,'intval');
			$idList = parent::getIdList('discuss_sort',$id);
			if($db = M('discuss_sort')->where(array('id in('.$idList.')'))->delete()){
				$this->success('删除成功',U(GROUP_NAME .'/Discuss/sortlist'));
			}else{
				$this->error('删除失败');
			}
		}
		//分类排序
		public function sortSequence(){
			$db = M('discuss_sort');
			//遍历并更新 提交修改后的排序数组
			foreach($_POST as $id => $sequence){
				$db->where(array('id'=>$id))->setField('sequence',$sequence);
			}
			$this->success('操作成功',U(GROUP_NAME . '/Discuss/sortlist'));
		}
		//在分类视图 调用该分类下面的图文详情视图
		public function sortDetail(){
			import('Class.Category','./');//引入无限极分类
			import('ORG.Util.Page');//导入分页类
			$sort_id = intval($_GET['id']);//获取传过来的分类id
			$objDiscussSort = M('discuss_sort');
			$objDiscuss = M('discuss');
			$sortList = $objDiscussSort->select();
			$sortList = deep_htmlspecialchars_decode($sortList); //查询输出了数据库数据之后记得反转义
			$idList = Category::getChildsId($sortList,$sort_id); //传一个父ID获取所有的子ID 返回的是数组
			$idList = implode(',',$idList); //把数组拆成字符串 方便下面用in查询出父ID及其子id下面的图文
			$idList = $sort_id.','.$idList; //把当前的分类id 连接起子分类id
			$idList = rtrim($idList,','); //去除右边的 逗号
			$where = 'sort_id in('.$idList.')';
			$count = $objDiscuss->where($where)->count(); //统计总数
			$Page = new Page($count,15); //实例化分页类 传入总记录数和每页显示的记录数
			$list = $objDiscuss->alias('AS a')->join('yrq_discuss_sort AS s ON a.sort_id = s.id')->field('s.sort_name,a.*')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
			$list = deep_htmlspecialchars_decode($list);
			$this->assign('list',$list);
			$show = $Page->show(); //分页显示输出
			$this->assign('page',$show);
			$this->display();
		}
/*-------------------------------------------------以上分类页  以下详情页----------------------------------------------------*/
		//图文详情页列表视图
		public function detailsList(){
			import('Class.Category','./');//引入无限极分类
			import('ORG.Util.Page');//导入分页类
			$sort_id = intval($_GET['id']);//获取传过来的分类id
			$objDiscussSort = M('discuss_sort');
			$objDiscuss = M('discuss');
			$sortList = $objDiscussSort->select();
			$sortList = deep_htmlspecialchars_decode($sortList); //查询输出了数据库数据之后记得反转义
			$idList = Category::getChildsId($sortList,$sort_id); //传一个父ID获取所有的子ID 返回的是数组
			$idList = implode(',',$idList); //把数组拆成字符串 方便下面用in查询出父ID及其子id下面的文章
			$idList = $sort_id.','.$idList; //把当前的分类id 连接起子分类id
			$idList = rtrim($idList,','); //去除右边的 逗号
			$count = $objDiscuss->count(); //统计总数
			$Page = new Page($count,15); //实例化分页类 传入总记录数和每页显示的记录数
			$list = $objDiscuss->alias('AS a')->join('yrq_discuss_sort AS s ON a.sort_id = s.id')->field('s.sort_name,a.*')->limit($Page->firstRow.','.$Page->listRows)->select();
			$list = deep_htmlspecialchars_decode($list);
			$this->assign('list',$list);
			$show = $Page->show(); //分页显示输出
			$this->assign('page',$show);
			$this->display();
		}
		//添加图文视图
		public function addDetails(){
			import('Class.Category','./');//引入无限极分类
			$sortList = M('discuss_sort')->select();//先把图文分类读出来
			$sortList = deep_htmlspecialchars_decode($sortList); //查询输出了数据库数据之后记得反转义
			$sortList = Category::unlimitedForLevel($sortList,'&nbsp;&nbsp;&nbsp;&nbsp;');//组合子分类与父分类
			$this->assign('sortList',$sortList);//把分类分配过去
			$this->display();
		}
		//添加图文表单处理
		public function runAddDetails(){
			$db = M('discuss');
			parent::checkField('discuss_name', deep_htmlspecialchars($_POST['discuss_name']), 'require', '图文名称不能为空');
			parent::checkField('content', deep_htmlspecialchars($_POST['content']), 'require', '内容不能为空');
			$data=array();
			$data['discuss_name'] = I('discuss_name');
			$data['sort_id'] = I('parent_id');
			$data['status'] = I('status');
			$data['author'] = I('author');
			$data['add_time'] = time();
			$data['content'] = I('content');
			if($db->data($data)->add()){
				$this->success('添加成功',U(GROUP_NAME.'/Discuss/detailslist'));	
			}else{
				$this->error('添加失败');	
			}
		}
		//编辑图文视图及表单处理
		public function editDetails(){
			if($_POST){
				$id = I('id',0,'intval');
				$db = M('discuss');
				$data=array();
				$data['id'] = $id;
				$data['status'] = I('status');
				$data['tags'] = I('tags');
				if($db->data($data)->save()){
					$this->success('修改成功',U(GROUP_NAME.'/Discuss/detailsList'));	
				}else{
					$this->error('修改失败');	
				}
			}else{
				$id = I('id',0,'intval');
				$this->assign('id',$id); 
				$data = M('discuss')->where(array('id'=>$id))->find();
				$this->assign('data',$data);
				$data = deep_htmlspecialchars_decode($data);
				//import('Class.Category','./');//引入无限极分类
				//$sortList = M('discuss_sort')->select();//先把图文分类读出来
				//$sortList = Category::unlimitedForLevel($sortList,'&nbsp;&nbsp;&nbsp;&nbsp;');//组合子分类与父分类
				//$this->assign('sortList',$sortList);//把分类分配过去
				$this->display();	
			}
		}
		//删除图文
		public function deleteDetails(){
			$objDiscuss = M('discuss');
			$idList = deep_htmlspecialchars(implode(',', $_POST['id'])); //implode()把数组组成字符串
			if ($_POST) {
				$objDiscuss->where('`id` in ('.$idList.')')->delete();
			}
			$this->success('删除成功',U(GROUP_NAME .'/Discuss/detailslist'));	
		}
	}