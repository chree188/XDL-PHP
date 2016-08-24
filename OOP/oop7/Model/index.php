<?php 
header("content-type:text/html;charset=utf-8");

require './Model.class.php';
require './Page.class.php';
require './config.php';

$where = "";
if (!empty($_GET['name'])) {
    //生成SQL的条件
    $where = "name like '%{$_GET['name']}%'";
}

$model = new Model('s50_user');
$page = new Page($model->where($where)->count(),5);
// var_dump($page);
// exit;

// 搜索SQL:
$list = $model->limit($page->limit())->where($where)->select();
// echo '<pre>';
//     print_r($list);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>信息列表</h1>
        <form action="./index.php">
            按姓名搜索:
            <input type="text" name="name" value="<?php echo empty($_GET['name'])?'':$_GET['name']; ?>">
            <button> 搜 索 </button>
        </form>
        <hr>
        <table border="1" width="600" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>操作</th>
            </tr>
            <?php if (empty($list)): ?>
                <tr>
                    <td colspan="5">暂无数据</td>
                </tr>
            <?php else: ?>
                <?php foreach ($list as $val): ?>
                    <tr>
                        <td><?php echo $val['id'] ?></td>
                        <td><?php echo $val['name'] ?></td>
                        <td>
                            <?php 
                            switch ($val['sex']) {
                                case 0: echo '女';break;
                                case 1: echo '男';break;
                                case 2: echo '保密';break;
                            }
                             ?>
                        </td>
                        <td><?php echo $val['age'] ?></td>
                        <td>
                            <a href="#">编辑</a>
                            <a href="#">删除</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            <tr>
                <td colspan="5">
                    <?php echo $page->show(); ?>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>



