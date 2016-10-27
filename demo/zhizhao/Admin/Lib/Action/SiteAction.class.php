<?php
	//后台站点参数控制器
	class SiteAction extends CommonAction{
		//站点参数设置视图
		public function site(){
			$objSite = M('site');
			if($_POST){
				$POST = deep_htmlspecialchars($_POST);
				$data = array();
				$data['id'] = $POST['id'];
				$data['site_name'] = $POST['site_name'];
				$data['site_url'] = $POST['site_url'];
				$data['company'] = $POST['company'];
				$data['address'] = $POST['address'];
				$data['zipcode'] = $POST['zipcode'];
				$data['telephone'] = $POST['telephone'];
				$data['cellphone'] = $POST['cellphone'];
				$data['email'] = $POST['email'];
				$data['icp'] = $POST['icp'];
				$data['third_code'] = $POST['third_code'];
				$result = $objSite->data($data)->save();
				if($result){
					$this->success('保存成功');	
				}else{
					$this->error('系统繁忙，请稍后再试');	
				}
			}else{
				$data = $objSite->where('id=1')->find();
				$data = deep_htmlspecialchars_decode($data);
				$this->assign('data',$data);
				$this->display();
			}
		}
	}