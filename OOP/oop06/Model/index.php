<?php
header("content-type:text/html;charset=utf-8");
require './config.php';
require './Model.class.php';
require './Page.class.php';

$model = new Model('user');
$page = new Page($model->count(), 5);//分页类
$list = $model->limit($page->limit())->select();
// var_dump($list);

// var_dump($page);

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
            <?php foreach ($list as $key => $val): ?>
                <tr>
                    <td><?php echo $val['id']?></td>
                    <td><?php echo $val['name'] ?></td>
                    <td>
                        <?php
                        switch ($val['sex']) {
                            case 0:echo '女';break;
                            case 1:echo '男';break;
                            case 2:echo '保密';break;
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
            <td colspan="5"><?php echo $page->show() ?></td>
        </tr>
    </table>
</center>
</body>
</html>