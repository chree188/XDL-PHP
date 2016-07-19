<?php

    include "./view/common/head.php";

?>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="./index.php?c=user&a=doedit&id=<?php echo $user['uid']; ?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                   <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>权限：</th>
                            <td>
                                <select name="auth" id="catid" class="required">
                                    <option <?php if($user['auth']==1){ echo 'selected';}   ?> value="1">普通会员</option>
                                    <option <?php if($user['auth']==2){ echo 'selected';}   ?> value="2">超级管理员</option>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>用户名称:</th>
                                <td>
                                    <input class="common-text required" id="title" name="uname" size="50" value="<?php echo $user['uname']; ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>性别:</th>
                                <td>
                                    <input type='radio' name='sex' <?php if($user['sex']=='w'){echo 'checked';}  ?> value='w' />女
                                    <input type='radio' name='sex' <?php if($user['sex']=='m'){echo 'checked';}  ?> value='m' />男
                                    <input type='radio' name='sex' <?php if($user['sex']=='x'){echo 'checked';}  ?> value='x' />妖
                                </td>
                            </tr>
                            <tr>
                                <th>密码</th>
                                <td><input name="upwd" id="" placeholder='不修改就空着'  type="password"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
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