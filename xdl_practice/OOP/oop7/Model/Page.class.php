<?php 

class Page
{
    protected $total;//总条数.
    protected $num;//每页显示数.
    protected $allPage;//总页数
    protected $url;//总页数
    protected $page;//总页数

    public function __construct($total, $num = 10)
    {
        $this->total = $total;//得到总条数
        $this->num = $num;//得到每页显示数
        $this->getAllPage();//得到总页数
        $this->getUrl();//获取当前页的URL路径
        $this->getPage();//获取页码
    }

    //计算总页数
    protected function getAllPage()
    {
        $this->allPage = ceil($this->total / $this->num);
    }

    //获取当前页的URL路径
    protected function getUrl()
    {
        $this->url = $_SERVER['PHP_SELF'];
    }
    //获取页码
    protected function getPage()
    {
        //GET里获取参数
        $page = empty($_GET['p'])?1:$_GET['p'];
        //范围判断
        $page = max($page ,1);
        $page = min($this->allPage , $page);
        //给属性赋值
        $this->page = $page;
    }

    //生成分页的HTML代码
    public function show()
    {
        //获取搜索条件
        $params = "";
        foreach ($_GET as $k => $v) {
            //将页码条件排除掉
            if ($k == 'p') continue;
            //拼接搜索条件
            $params .= "&{$k}={$v}";
        }

        /*共X条 当前x/y页 首页/上/下/尾 */
        $html = "共{$this->total}条 ";
        $html .= "当前{$this->page} / {$this->allPage}页 ";
        $html .= "<a href='{$this->url}?p=1{$params}'>首页</a> ";
        $html .= "<a href='{$this->url}?p=".($this->page - 1)."{$params}'>上一页</a> ";
        $html .= "<a href='{$this->url}?p=".($this->page + 1)."{$params}'>下一页</a> ";
        $html .= "<a href='{$this->url}?p={$this->allPage}{$params}'>尾页</a>";
        return $html;
    }

    //返回limit条件
    public function limit()
    {
        // (当前页 - 1) * 每页显示数
        $limit = ($this->page - 1) * $this->num.','.$this->num;//x,y
        return $limit;
    }
}