<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:34
 */

//用户控制器
class UserController extends Controller
{
//    存放模型对象
    private $model = null;
//    构造方法,用于自动生成model对象
    public function __construct()
    {
//        调用执行 父级的构造方法
        parent::__construct();
        $this->model = new Model('s50_user');
    }

    public function index()
    {
        $data = $this->model->order('id desc')->select();
        $this->assign('title','用户列表');
        $this->assign('list',$data);
        $this->display('User/index.html');
    }

//    执行删除
    public function del()
    {
        if ($this->model->del($_GET['id'])) {
            $this->redirect('删除成功!','./index.php?c=User');
        } else {
            $this->redirect('删除失败!','./index.php?c=User');
        }
    }

//    加载表单
    public function add()
    {
        $this->assign('title','添加用户');
        $this->display('User/add.html');
    }

//    执行添加
    public function insert()
    {
        if ($this->model->add()) {
            $this->redirect('恭喜您 添加成功!','./index.php?c=User');
        } else {
            $this->redirect('很遗憾 添加失败!');
        }
    }

//    加载编辑表单
    public function edit()
    {
        $data = $this->model->find($_GET['id']);
        $this->assign('title','编辑用户');
        $this->assign('data',$data);
        $this->display('User/edit.html');
    }
//    执行修改操作
    public function update()
    {
        if ($this->model->update()) {
            $this->redirect('恭喜您 修改成功!','./index.php?c=User');
        } else {
            $this->redirect('很遗憾 修改失败!');
        }
    }
}