<?php
    
    include "./head.php";
    
    $str = file_get_contents('./msg.txt');
    $str = rtrim($str,'|#x#|');
    $arr = explode('|#x#|',$str);
    
    foreach($arr as $k=>$v){
         $arr[$k] = explode('@@',$v);
    }

    // echo '<pre>';
    // print_r($arr);
    
?>
<center>
<h3>查看留言</h3>
<?php
    echo '<table border=1>';
    echo '<th>标题</th>';
    echo '<th>作者</th>';
    echo '<th>内容</th>';
    echo '<th>IP</th>';
    echo '<th>操作    </th>';
    foreach($arr as $k=>$v){
        echo '<tr>';
        echo '<td>'.$v[0].'</td>';
        echo '<td>'.$v[1].'</td>';
        echo '<td>'.$v[2].'</td>';
        echo '<td>'.$v[3].'</td>';
        echo '<td>'."<a href='doDel.php?k={$k}'>删除</a>".'</td>';
        echo '</tr>';
    }
    echo '</table>';

?>


</center>