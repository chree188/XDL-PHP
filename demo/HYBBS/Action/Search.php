<?php
namespace Action;
use HY\Action;
!defined('HY_PATH') && exit('HY_PATH not defined.');
class SearchAction extends HYBBS {
    public function __construct() {
		parent::__construct();
        //{hook a_search_init}
    }
    public function _empty(){
        //{hook a_search_empty}
        $this->index();
    }
    public function index(){
        $key = X("get.key");
        if(empty($key)) return $this->message("请输入关键字");
        $key = htmlspecialchars($key);
        $this->v("key",$key);
        $this->v("search_key",$key);

        //{hook a_search_index_1}
        $this->v('title',$key.' 搜索');

        //echo METHOD_NAME;
 
        //echo $key;
        //分页ID
        $pageid=intval(isset($_GET['HY_URL'][1]) ? $_GET['HY_URL'][1] : 1) or $pageid=1;
        //类型ID
        //$type = (isset($_GET['HY_URL'][2]) ? $_GET['HY_URL'][2] : 'new') or $type='new';
        //echo $type;
        //$type = strtolower($type);
        //if($type != 'new' && $type != 'btime')
        //    $type='';


        //$this->v("type",$type);
        //{hook a_search_index_2}
        $Thread = M("Thread");
        $data=array();
        $data = $Thread->search_list($pageid,$this->conf['searchlist'],$key);
        $Thread->format($data);
        //{hook a_search_index_3}
        $count = $this->_count['thread'];
        $count = (!$count)?1:$count;
        $page_count = ($count % $this->conf['searchlist'] != 0)?(intval($count/$this->conf['searchlist'])+1) : intval($count/$this->conf['searchlist']);
        $t=$key;
        foreach ($data as &$v) {
            $v['title'] = str_replace($key,'<font color="red">'.$key.'</font>',$v['title']);
            
        }

        //{hook a_search_index_v}
        $this->v("pageid",$pageid);
        $this->v("page_count",$page_count);
        $this->v("data",$data);
        $this->v("top_list",array());
        $this->display('search_index');
    }
    //{hook a_search_fun}
}
