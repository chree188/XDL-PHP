<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>用户中心</title>
    <script type="text/javascript" src="../include/js/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="../include/css/base.css"/>
    <link rel="stylesheet" href="../include/css/back-common.css"/>
    <link rel="stylesheet" href="../include/css/back-index.css"/>
</head>
<body>
<!---------------------------->
                
                <!--会员信息开始-->
                <div class='factory-info'>
                    <div class='factory-info-l'>
                        <div class='fl fac-head'>
                            <p class='fac-img'>
                                <img src="../include/img/head/<?php echo $_SESSION['user']['id']; ?>.jpg"  width="100" height="100" />
                            </p>
                            <div>
                                <ul class='fac-popularity'>
                                    <li >     
                                        <a href='javascript:;' class='line'><strong>8474</strong><span>关注</span></a>
                                    </li>
                                    <li>
                                        <a href='javascript:;'><strong>5744</strong><span>收藏</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='fl'>
                            <p class='f-name'><span class='fac-name'><?php 
													echo $_SESSION['user']['name']; 
												?>
											</span><i class='icon-certificate'></i></p>
                            <p class='account'>
                                <span>余额：<em class='account-balance'>13145.20</em></span>
                                <a class="btn" title="充值"href="javascript:;" target="_blank">充 值</a>
                                <a class="btn" title="充值"href="javascript:;" target="_blank">提 现</a>
                            </p>
                            <p class='from'>
                                <i class='from-icon'></i><span>来自<?php 
													echo $_SESSION['user']['address']; 
												?></span>
                            </p>
                            <p class='shop-addr'>
                                <i class='addr-icon'></i><span>店铺地址：<a href='../index.php'>http://localhost/</a><span>
                            </p>
                        </div>
                    </div>
                    <div class='factory-info-r'>
                        <p>会员等级：<i class='purchase-star4'></i></p>
                        <p>信誉等级：<i class='supply-star3'></i></p>
                        <p>网站积分：100000</p>
                        <div class='safe-level'>
                            <p>我的账户安全级别:</p>
                            <i class='safe-low'></i><span class='level-text'>低</span>
                        </div>
                    </div>
                </div>
                <!-- 会员信息结束 -->
                
        <!----------------------------------->
</body>
</html>