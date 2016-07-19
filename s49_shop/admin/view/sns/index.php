<?php

    include "./view/common/head.php";

?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="./index.php?c=goods&a=index" method="POST">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                           <td>
                                <select name="tid" id="catid" class="required">
                                <?php
                                    if(!empty($types)){
                                    foreach($types as $k=>$v){
                                        echo "<option value='{$v['tid']}'>{$v['tname']}</option>";
										}
									}
                                ?>     
                                </select>
                            </td>
                            <th width="120">上架时间:</th>
                            <td>
                               <input type='date' name='upstime' />
                            </td>
                            <th width="50">至:</th>
                            <td>
                               <input type='date' name='upetime' />
                            </td>
                            <th width="70">商品名称:</th>
                            <td><input class="common-text" placeholder="商品名称" name="gid" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2"  value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
               
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                           
                      
                            <th>订单ID</th>
                            <th>收货人</th>
                            <th>收货地址</th>
                            <th>联系电话</th>
                            <th>买家留言</th>
                            <th>下单时间</th>
                            <th>成交价</th>
                            <th>操作</th>
                        </tr>
                        <?php
						// $status = [1=>'下架',2=>'上架'];
                           
                            if(!empty($orders)){
                            $status = [1=>'未发货',0=>'已发货',2=>'以收货'];
                            foreach($orders as $k=>$v){
                                echo '<tr>';
                                echo '<td>'.$v['oid'].'</td>';
                                echo '<td>'.$v['rec'].'</td>';
                                echo '<td>'.$v['addr'].'</td>';
                                echo '<td>'.$v['tel'].'</td>';
                                echo '<td>'.$v['umsg'].'</td>';
                                echo '<td>'.date('Y-m-d',$v['otime']).'</td>';
                                echo '<td>'.'￥'.$v['ormb'].'</td>';
                                echo "<td>   {$status[$v['status']]}   <a href='index.php?c=sns&a=cut&oid={$v['oid']}&status={$v['status']}'>取消订单</a>";


                                
                                //     if($v['status']=='1'){
                                //     echo '未发货';
                                // }elseif($v['status']=='0'){
                                //     echo '已发货';
                                // }elseif($v['status']=='2'){
                                //     echo "已收货";
                                // }
                                

                                // if($v['status']=='1'){
                                //     echo "<a href='./index.php?c=sns&a=status&id={$v['oid']}&sta=0&page={$nowPage}'><b>发货</b></a>";
                                // }elseif($v['status']!='0'){
                                //     echo '发货';
                                // }
                                echo "</td>";
                                


                                echo '</tr>';
                            }
                          }  
                          
                      ?>

                
                    </table>
                    <div class="list-page"><?php 
                        echo "{$rows} 条 {$nowPage}/{$maxPage} 页"; 
                        echo "<a href='./index.php?c=sns&a=index&page=1' >首页</a>";
                        echo "<a href='./index.php?c=sns&a=index&page={$prevPage}' >上一页</a>";
                        echo "<a href='./index.php?c=sns&a=index&page={$nextPage}' >下一页</a>";
                        echo "<a href='./index.php?c=sns&a=index&page={$maxPage}' >尾页</a>";
                    
                    ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>