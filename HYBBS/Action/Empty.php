<?php
namespace Action;
use HY\Action;
!defined('HY_PATH') && exit('HY_PATH not defined.');
class EmptyAction extends HYBBS {
    public function __construct(){
        //parent::__construct();
        //{hook a_empty_init}
    }
    public function index(){
        //{hook a_empty_index_v}
        $_GET['type'] = ACTION_NAME;
        $_GET['pageid'] = intval(isset($_GET['HY_URL'][1]) ? $_GET['HY_URL'][1] : 1) or $pageid=1;
        A("Index")->Index();
    }
    public function _empty(){
        //{hook a_empty_empty_v}
        $_GET['type'] = ACTION_NAME;
        $_GET['pageid'] = intval(isset($_GET['HY_URL'][1]) ? $_GET['HY_URL'][1] : 1) or $pageid=1;
        A("Index")->Index();
    }
    //{hook a_empty_fun}
}
