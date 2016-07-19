<?php

    include "./view/common/head.php";

?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="./index.php?c=goods&a=doAdd" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>商品分类：</th>
                            <td>
                                <select name="tid" id="catid" class="required">
                                <?php
                                    
                                    foreach($types as $k=>$v){
                                        echo "<option value='{$v['tid']}'>{$v['tname']}</option>";
                                    }
                                ?>    
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="gname" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>定价：</th>
                                <td><input class="common-text" name="price" size="30"  step=0.01 value="" type="number"></td>
                            </tr>
                            <tr>
                                <th>库存：</th>
                                <td><input class="common-text" name="cnt" size="30" value="" type="number"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品图片：</th>
                                <td><input name="gpic[]" id=""  multiple accept="image/*" type="file"></td>
                            </tr>
                            <tr>
                                <th>商品描述：</th>
                                <td><textarea name="gdesc" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
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