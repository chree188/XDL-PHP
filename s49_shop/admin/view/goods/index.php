<?php

    include "./view/common/head.php";

?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="result-wrap">
            <form action="./index.php?c=goods&a=index" method="GET">
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.html"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                           
                      
                            <th>商品名称</th>
                            <th>图片</th>
                            <th>定价</th>
                            <th>库存</th>
                            <th>销量</th>
                            <th>点击</th>
                            <th>上架时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                            
                            if(!empty($goods)){
                            
                            foreach($goods as $k=>$v){
                                echo '<tr>';
                                echo '<td>'.$v['gname'].'</td>';
                                echo "<td><img src='./public/images/goods/sm_{$v['gpic']}' /></td>";
                                echo '<td>'.$v['price'].'</td>';
                                echo '<td>'.$v['cnt'].'</td>';
                                echo '<td>'.$v['scnt'].'</td>';
                                echo '<td>'.$v['vcnt'].'</td>';
                                echo '<td>'.date('Y-m-d',$v['ctime']).'</td>';
                                echo "<td>
                                    <a class='link-update' href='./index.php?c=goods&a=edit&id={$v['gid']}'>修改</a>
                                    <a class='link-del' href='./index.php?c=goods&a=del&id={$v['gid']}'
                                    onclick=\"return confirm('真的要删除吗?');\"
                                    >删除</a>";
                
                    if($v['status']=='2'){
                        echo "&nbsp;&nbsp;<a class='link-del' href='./index.php?c=goods&a=status&id={$v['gid']}&status=1&page={$nowPage}'>上架</a>";
                    }else if($v['status']=='1'){
                        echo "&nbsp;&nbsp;<a class='link-del' href='./index.php?c=goods&a=status&id={$v['gid']}&status=2&page={$nowPage}'>下架</a>";
                    }
                  
                                echo "</td>";
                                echo '</tr>';
                            }
                            
                            }
                      ?>
                    </table>
                    <div class="list-page"><?php 
                    echo "{$rows} 条 {$nowPage}/{$maxPage} 页"; 
                        echo "<a href='./index.php?c=goods&a=index&page=1' >首页</a>";
                        echo "<a href='./index.php?c=goods&a=index&page={$prevPage}' >上一页</a>";
                        echo "<a href='./index.php?c=goods&a=index&page={$nextPage}' >下一页</a>";
                        echo "<a href='./index.php?c=goods&a=index&page={$maxPage}' >尾页</a>";
                    
                    ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>