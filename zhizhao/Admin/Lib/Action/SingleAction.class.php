<?php
//后台单页管理
class SingleAction extends CommonAction{
	//单页列表
	public function singleList(){
		$objSingle = M('single');
		$list = $objSingle->order('id asc')->select();
		$list = deep_htmlspecialchars_decode($list);
		$this->assign('list',$list);
		
		$this->display();
	}
	//单页添加
	public function singleAdd(){
		$objSingle = M('single');
		if(IS_POST){
			$POST = deep_htmlspecialchars($_POST);
			parent::checkField('title',$POST['title'],'require','单页标题不能为空');
			parent::checkField('content',$POST['content'],'require','内容不能为空');
			$data = array();
			$data['title'] = $POST['title'];
			$data['status'] = $POST['status'];
			$data['content'] = $POST['content'];
			$data['add_time'] = time();
			$result = $objSingle->add($data);
			if($result){
				$this->success('添加成功',U(APP_NAME.'/Single/singlelist'));
			}else{
				$this->error('添加失败,请稍后再试!');
			}
			
		}else{
			$this->display();
		}
	}
	//单页编辑
	public function singleEdit(){
		$id = intval($_GET['id']);
		$objSingle = M('single'); 
		if(IS_POST){
			$POST = deep_htmlspecialchars($_POST);
			parent::checkField('title',$POST['title'],'require','单页标题不能为空');
			parent::checkField('content',$POST['content'],'require','内容不能为空');
			$data = array();
			$data['id'] = $POST['id'];
			$data['title'] = $POST['title'];
			$data['status'] = $POST['status'];
			$data['content'] = $POST['content'];
			$result = $objSingle->save($data);
			if($result){
				$this->success('修改成功...',U(APP_NAME.'/Single/singlelist'));
			}else{
				$this->error('修改失败,请稍后再试');	
			}
		}else{
			$data = $objSingle->where('id='.$id)->find();
			$data = deep_htmlspecialchars_decode($data);
			$this->assign('data',$data);
			$this->display();	
		}
	}
    //删除图文
    public function deleteDetails(){
        $objStudy = M('single');
        $idList = deep_htmlspecialchars(implode(',', $_POST['id'])); //implode()把数组组成字符串
        if ($_POST) {
            $objStudy->where('`id` in ('.$idList.')')->delete();
        }
        $this->success('删除成功',U(GROUP_NAME .'/Single/singleList'));
    }

}