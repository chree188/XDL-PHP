<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:35
 */

//商品控制器
class GoodsController extends Controller
{
    public function index()
    {
        echo '这里是我的商品';
    }
    public function add()
    {
        echo 'Goods add';
    }
    public function edit()
    {
        echo 'Goods edit';
    }
}