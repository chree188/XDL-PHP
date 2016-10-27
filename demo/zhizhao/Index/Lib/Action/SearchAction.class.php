<?php
class searchAction extends CommonAction{
	public function index() {
		$objAsk = M('ask');
		$objUser = M('user');
		$word = deep_htmlspecialchars($_GET["word"]);
		$this->assign('searchWord',$word);
		if($word == '') redirect($_SERVER['HTTP_REFERER']); //如果没有输入关键字 就重定向到上一页面
        import('ORG.Util.Page');//导入分页类
		$count = $objAsk->where('INSTR(ask_name, "'.$word.'")>0')->count(); //统计总数
		$this->assign('countSearch',$count);
		$page = new page($count,10);
		$page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %downPage%');
		$resultList = $objAsk->where('INSTR(ask_name, "'.$word.'")>0')->order('add_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach($resultList as $k1=>$v1){
			$resultList[$k1]['username'] = $objUser->where('id='.$v1['uid'])->getField('username');
		}
		$resultList = deep_htmlspecialchars_decode($resultList);
		$show = $page->show();
		$this->assign('resultList',$resultList);
		$this->assign('page',$show);
		$this->display();
	}	
}
