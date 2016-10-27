<?php
	//后台友情链接管理控制器
	class LinkAction extends CommonAction{
		//友情链接列表视图
		public function detailsList(){
			$objLinkTxt = M('linktxt');
			$list = $objLinkTxt->select();
			$list = deep_htmlspecialchars_decode($list);
			$this->assign('list',$list);
			$this->display();	
		}
		//添加友情链接视图
		public function addDetails(){
			$objLinkTxt = M('linktxt');
			$this->display();	
		}
		//添加友情链接表单处理
		public function runaddDetails(){
			$objLinkTxt = M('linktxt');
			$POST = deep_htmlspecialchars($_POST); 
			parent::checkField('link_name',$POST['link_name'],'require','友情链接名称不能为空');
			parent::checkField('link_url',$POST['link_url'],'require','友情链接地址不能为空');
			parent::checkField('explain',$POST['explain'],'require','友情链接备注不能为空');
			$data = array();
			$data['link_name'] = $POST['link_name'];
			$data['status'] = $POST['status'];
			$data['link_url'] = $POST['link_url'];
			$data['explain'] = $POST['explain'];
			$result = $objLinkTxt->data($data)->add();
			if($result){
				$this->success('添加成功',U(GROUP_NAME .'/Link/detailslist'));
			}else{
				$this->error('添加失败');	
			}
		}
		//删除友情链接
		public function deleteDetails(){
			$objLinkTxt = M('linktxt');
			$idList = deep_htmlspecialchars(implode(',', $_POST['id'])); //implode()把数组组成字符串
			if ($_POST) {
				$objLinkTxt->where('`id` in ('.$idList.')')->delete();
				$this->success('删除成功',U(GROUP_NAME .'/Link/detailslist'));	
			}
			
		}
		//编辑友情链接
		public function editDetails(){
			$objLinkTxt = M('linktxt');
			$id = intval($_GET['id']);
			if($_POST){
				$POST = deep_htmlspecialchars($_POST);
				parent::checkField('link_name',$POST['link_name'],'require','友情链接名称不能为空');
				parent::checkField('link_url',$POST['link_url'],'require','友情链接地址不能为空');
				parent::checkField('explain',$POST['explain'],'require','友情链接备注不能为空');
				$data = array();
				$data['id'] = $POST['id'];
				$data['link_name'] = $POST['link_name'];
				$data['status'] = $POST['status'];
				$data['link_url'] = $POST['link_url'];
				$data['explain'] = $POST['explain'];
				$result = $objLinkTxt->data($data)->save();
				if($result){
					$this->success('修改成功',U(GROUP_NAME .'/Link/detailslist'));
				}else{
					$this->error('修改失败');	
				}
			}else{
				$data = $objLinkTxt->where('id='.$id)->find();
				$data = deep_htmlspecialchars_decode($data);
				$this->assign('data',$data);
				$this->display();
			}
		}
	}
		