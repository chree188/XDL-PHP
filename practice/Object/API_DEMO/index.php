<?php
    //获取当前的目录
    $handle=opendir(".");
    $projectsListIgnore = array('.', '..');
    $projectContents = array();
    while ($file = readdir($handle))
    {
        if (is_dir($file) && !in_array($file,$projectsListIgnore))
        {
            $projectContents[] = $file;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API和扩展</title>
    <style>
        .container{
            width:80%;
            margin:20px auto;
        }
        .item{
            border:1px solid #ccc;
            padding:60px 16px;
            margin:20px 0px;
        }

        a{
            font-size:16px;
            color:#369;
            text-decoration:none;
        }


    </style>
</head>
<body>
   <div class="container">
       <h1>API 和 扩展</h1>


       <div class="item first-item">
            <a href="./think_demo">实例演示</a><br>
            <a href="./readme.txt">readme.txt</a><br>
       </div>
       <div class="item send-item">
        <?php
            foreach ($projectContents  as $dir):

        ?>
            <a href="<?=$dir?>"><?=$dir?></a><br>
        <?php
            endforeach;
       ?>
       </div>
    </div>

</body>
</html>
