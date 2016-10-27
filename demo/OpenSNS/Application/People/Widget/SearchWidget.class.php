<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/10
 * Time: 16:12
 */

namespace People\Widget;

use Think\Controller;

class SearchWidget extends Controller
{
    public function render()
    {
        $this->assignUser();
        $this->display(T('Application://People@Widget/search'));
    }

    public function assignUser($field = 'score1')
    {
        $field = modC('USER_SHOW_ORDER_FIELD', $field, 'People');
        $order = modC('USER_SHOW_ORDER_TYPE', 'desc', 'People');

        $keywords=S('key_search');

        if (empty($data)) {
            $map = array('status' => 1, 'nickname' => array('like', '%' . $keywords . '%'));
            $content = D('Member')->field('uid')->where($map)->order($field . ' ' . $order)->select();
            foreach ($content as &$v) {
                $v['user'] = query_user(array('uid', 'nickname', 'space_url', 'space_link', 'avatar64', 'rank_html'), $v['uid']);
            }
            $data = $content;
        }
        unset($v);

        $this->assign('keywords', $keywords);
        $this->assign('people', $data);
    }
}