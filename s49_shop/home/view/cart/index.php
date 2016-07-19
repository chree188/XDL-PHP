<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/cart.css"> 
</head>
<body>
    <?php
    include ("./view/head/head.php");
    include ("./view/seek/seek.html");
    echo "<br/><br/>";
    ?>
    <div class='gwctou'><img src="./public/images/38.png"></div><br/>
    <div class='gwc1'>
        <div class='gwc2'>全部商品  药品</div>
        
                <form action="" method='POST'>
                    <div class='gwc3'>
                    配送至：<select name="classid" id="">
                    <option value='lamp44'>北京</option>
                    <option value='lamp49'>上海</option>
                    <option value='lamp50'>广州</option>
                    </select>
                    </div>
                </form> 
    </div>
    <div class="gwc4">
        <div class='gwc11'>
            <?php 
                echo '<table border=0 width=900>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<tr>';
                echo '<th>名称</th>';
                echo '<th>&nbsp;&nbsp;&nbsp;定价</th>';
                echo '<th>&nbsp;数量</th>';
                echo '<th>金额</th>';
                echo '<th>操作</th>';
                echo '</tr>';
                echo '</table>';
               
               
             ?>
        </div>
    </div>  <br/>


    <div class="gwc7">
        <div class='gwc10'>
        <?php 
            echo '<table border=0 width=900>';
  
            $sum = 0;
            if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $k=>$v ){
                    echo '<tr>';
                    echo '<td>'.$v['gname'].'</td>';
                    echo '<td>'.$v['price'].'</td>';
                    echo '<td>';
                    echo "<a href='./index.php?c=cart&a=dec&gid={$k}'> - </a>";
                    echo $v['cnt'];
                    echo "<a href='./index.php?c=cart&a=inc&gid={$k}'> + </a>";
                    echo '</td>';
                    echo '<td>'.$v['price']*$v['cnt'].'</td>';
                    echo '<td>';
                    echo "<a href='./index.php?c=cart&a=cut&gid={$k}'>删除</a>";
                    echo '</td>';
                    echo '</tr>';
                    $sum += $v['price']*$v['cnt'];
                }
            }
         
            echo '</table>';
           
           
         ?>
            </div>
        </div>
    </div><br/>


    <div class="gwz11">
        <div class='gwz12'>
            <div class='gwz13'>
                <?php 
                    echo '<table border=0 width=0>';
                    echo "<tr><td colspan='5'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;总金额为:{$sum} 元</td></tr>";
                    echo '</table>';
                   
                   echo "<br/>&nbsp;&nbsp;<a href='./index.php?c=cart&a=clear'>清空购物车</a>";
                   
                   echo "&nbsp;&nbsp;<a href='./index.php?c=goods&a=index'>继续购物</a>";
                   echo "&nbsp;&nbsp;<a href='./index.php?c=orders&a=info'>付款结算</a>";
                 ?>

            </div>
        </div>
    </div><br/></br>

<?php
    echo "<br/><br/>";
    include ("./view/base/base.html");
?>
</body>
</html>