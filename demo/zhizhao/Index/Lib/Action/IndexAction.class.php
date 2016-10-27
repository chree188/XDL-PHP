<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
        //首页焦点图
        $objAd = M('ad');
        $indexFocus = $objAd->where('sort_id=3')->order('id asc')->select();
        $indexFocus = deep_htmlspecialchars_decode($indexFocus);
        $this->assign('indexFocus',$indexFocus);
       // 待解决的问题
        $idList = parent::getIdList('ask_sort',0); //获取所有的顶级分类和其子分类
        $objAsk = D('AskView');
        $where1 = 'sort_id in ('.$idList.')';
        $where1 .= ' AND solve = "0"';
        $noAnswerList = $objAsk->where($where1)->field('id,ask_name,add_time,comment_num,username,uid,sort_name,sort_id')->order('add_time desc')->limit(10)->select();
        $noAnswerList = deep_htmlspecialchars_decode($noAnswerList);
        $this->assign('noAnswerList',$noAnswerList);
        //悬赏最高的问题
        $where2 = 'sort_id in ('.$idList.')';
        $rewardList = $objAsk->where($where2)->field('id,ask_name,add_time,comment_num,username,uid,sort_name,sort_id')->order('reward desc')->limit(10)->select();
        $rewardList = deep_htmlspecialchars_decode($rewardList);
        $this->assign('rewardList',$rewardList);
		$this->display();
    }
}