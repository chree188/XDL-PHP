<?php

/**
 * 分页类
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 19:14
 */
class Page
{
    protected $total;   //总条数
    protected $num; //每页显示数
    protected $allPage; //总页数
    protected $url; //URL路径
    protected $page;// 页码

    public function __construct($total, $num = 10)
    {
        $this->total = $total;// 得到总条数
        $this->num = $num;// 得到每页显示数
        $this->getAllPage();//获取到总页数
        $this->getUrl();//获取到URL
        $this->getPage();//获取到页码
    }

    //生成limit条件
    public function limit()
    {
        // x,y
        // (当前页 - 1) * 每页显示数
        $limit = ($this->page - 1) * $this->num.','.$this->num;
        return $limit;//返回XX,OO的字串.
    }

    //计算总页数
    protected function getAllPage()
    {
        $this->allPage = ceil($this->total / $this->num);
    }
    //获取当前页的url路径
    protected function getUrl()
    {
        $this->url = $_SERVER['PHP_SELF'];
    }
    //获取页码
    protected function getPage()
    {
        //从GET中 获取 ,无默认第一夜
        $page = empty($_GET['p'])?1:$_GET['p'];
        //判断范围
        $page = max($page,1);
        $page = min($page,$this->allPage);
        //给属性赋值
        $this->page = $page;
    }

    //生成HTML页面代码
    public function show()
    {
        // 共xx条 当前x/y页 首页/上/下/尾页
        $html = "共{$this->total}条,";
        $html .= "当前{$this->page}/{$this->allPage}页 ";
        $html .= "<a href='{$this->url}?p=1'>首页</a> ";
        $html .= "<a href='{$this->url}?p=".($this->page - 1)."'>上一页</a> ";
        $html .= "<a href='{$this->url}?p=".($this->page + 1)."'>下一页</a> ";
        $html .= "<a href='{$this->url}?p={$this->allPage}'>尾页</a>";
        return $html;
    }

}