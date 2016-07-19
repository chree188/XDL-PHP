<?php

    include "./view/common/head.php";

?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
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
                           
                            <th>ID</th>
                            <th>类别名称</th>
                            <th>父ID</th>
                            <th>PATH</th>
                            <th>操作</th>
                        </tr>
                        <?php
                           
                            if(!empty($types)){
                            
                            foreach($types as $k=>$v){
                                $cnt = substr_count($v['path'],',');
                                $pad = str_repeat('&nbsp;',$cnt*4).'|---';
                                echo '<tr>';
                                echo '<td>'.$v['tid'].'</td>';
                                echo '<td>'.$pad.$v['tname'].'</td>';
                                echo '<td>'.$v['pid'].'</td>';
                                echo '<td>'.$v['path'].'</td>';
                              
                                echo "<td>
                                    <a class='link-update' href='./index.php?c=type&a=edit&id={$v['tid']}&tname={$v['tname']}'>修改</a>
                                    
                                    <a class='link-del' href='./index.php?c=type&a=del&id={$v['tid']}'
                                    onclick=\"return confirm('真的要删除吗?');\"
                                    >删除</a>
                                    
                                    <a class='link-update' href='./index.php?c=type&a=addForm&pid={$v['tid']}'>添加子分类</a>
                                    ";
                 
                                echo "</td>";
                                echo '</tr>';
                            }
                            
                            }
                      ?>
                    </table>
                    <div class="list-page"><?php 
                    // echo "{$rows} 条 {$nowPage}/{$maxPage} 页"; 
                        // echo "<a href='./index.php?c=user&a=index&page=1' >首页</a>";
                        // echo "<a href='./index.php?c=user&a=index&page={$prevPage}' >上一页</a>";
                        // echo "<a href='./index.php?c=user&a=index&page={$nextPage}' >下一页</a>";
                        // echo "<a href='./index.php?c=user&a=index&page={$maxPage}' >尾页</a>";
                    
                    ?></div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>