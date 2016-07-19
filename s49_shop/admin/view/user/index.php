<?php
    include ("./view/common/head.php");
?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="./index.php?c=user&a=index" method="GET">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="sex" id="">
                                    <option value="">全部</option>
                                    <option value="w">女</option>
                                    <option value="m">男</option>
                                </select>
                            </td>
                            <th width="70">用户名:</th>
                            <td><input class="common-text" placeholder="用户名" name="uname" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2"  value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
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
                            <th>用户名称</th>
                            <th>性别</th>
                            <th>权限</th>
                            <th>注册时间</th>
                            <th>操作</th>
                        </tr>
                         <?php
                            $sex = ['w'=>'女','m'=>'男','x'=>'妖'];
                            $auth = [1=>'普通会员',2=>'超级管理员'];
                            if(!empty($users)){
                            
                            foreach($users as $k=>$v){
                                echo '<tr>';
                                echo '<td>'.$v['uid'].'</td>';
                                echo '<td>'.$v['uname'].'</td>';
                                echo '<td>'.$sex[$v['sex']].'</td>';
                                echo '<td>'.$auth[$v['auth']].'</td>';
                                echo '<td>'.date('Y-m-d H:i:s',$v['regtime']).'</td>';
                                echo "<td>
                                    <a class='link-update' href='./index.php?c=user&a=edit&id={$v['uid']}'>修改</a>
                                    <a class='link-del' href='./index.php?c=user&a=del&id={$v['uid']}'
                                    onclick=\"return confirm('真的要删除吗?');\"
                                    >删除</a>";
                    if($v['auth']=='2'){
                        echo "&nbsp;&nbsp;<a class='link-del' href='./index.php?c=user&a=auth&id={$v['uid']}&lel=1&page={$nowPage}'>降为普通</a>";
                    }elseif($v['auth']=='1'){
                        echo "&nbsp;&nbsp;<a class='link-del' href='./index.php?c=user&a=auth&id={$v['uid']}&lel=2&page={$nowPage}'>升为超级</a>";
                    }
                                echo "</td>";
                                echo '</tr>';
                            }
                            
                            }
                      ?>
                      </table>
                   <div class="list-page"><?php 
                    echo "{$rows} 条 {$nowPage}/{$maxPage} 页"; 
                        echo "<a href='./index.php?c=user&a=index&page=1' >首页</a>";
                        echo "<a href='./index.php?c=user&a=index&page={$prevPage}' >上一页</a>";
                        echo "<a href='./index.php?c=user&a=index&page={$nextPage}' >下一页</a>";
                        echo "<a href='./index.php?c=user&a=index&page={$maxPage}' >尾页</a>";
                    
                    ?></div>
                </div>

            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>