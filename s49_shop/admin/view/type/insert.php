<?php

    include "./view/common/head.php";

?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="./index.php?c=type&a=doAdd" method="post" id="myform" name="myform" enctype="multipart/form-data">
                   <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>父类：</th>
                            <td>
                                <select name="pid" id="catid" class="required">
                                    <option  value="0">根分类</option>
                                    <?php
                                          // $_GET['pid'] = 5;
                                        foreach($types as $k=>$v){
                                          
                                            $str = '';
                                            if($_GET['pid']==$v['tid']){
                                                $str = ' selected ';
                                            }
                                        
                                            echo "<option {$str} value='{$v['tid']}'>{$v['tname']}</option>";
                                        
                                        }
                                    
                                    
                                    ?>
                                 
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>类别名称:</th>
                                <td>
                                    <input class="common-text required" id="title" name="tname" size="30"  value="" type="text">
                                </td>
                            </tr>
                           
                           
                           
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>