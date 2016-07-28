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
<div id="navbar" class="fixed">
    <div class="container w">
        <ul class="nav fl">
            <li><a href="../index.php" title="首页">首页</a></li>
            <li class="dropdown">
                <a href="javascript:void;" title="应用服务">
                    应用服务<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="">我的应用</a></li>
                    <li><a href="">我的服务</a></li>
                    <li><a href="">我的中心</a></li>
                    <li><a href="">我的信息</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navserve fr">
            <li class="message">
                <a href="javascript:void;" title="信息">信息</a>
                <span>3</span>
            </li>
            <li class="mycenter dropdown">
                <a href="javascript:void;">
                    <span><?php 
							echo $_SESSION['user']['name']; 
						?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="">我的设置</a></li>
                    <li><a href="">我的订单</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="wapper ">
    <div class="container w">
        <div class="aside fl grid-17">
            <dl class="purchase">
                <dt><i>1</i>我的信息</dt>
                <dd>
                    <a href="javascript:void;" title="查看信息" class="active">查看信息</a>
                    <a href="../edit.php?id=<?php echo $_SESSION['user']['id']; ?>" title="修改信息">修改信息</a>
                </dd>
            </dl>
            <dl class="trading">
                <dt><i>3</i>交易管理</dt>
                <dd>
                    <a href="javascript:void;" title="我的订单">我的订单</a>
                </dd>
            </dl>
            <div class="inner">
                <a href="javascript:;" title="">
                    <strong>+</strong>
                    <span>添加新应用</span>
                </a>
            </div>
        </div>
        
        
        <div class="section fr">
            <div class="con-center grid-81">
                <!--请将你要的代码写在此处 并写明注释-->
                <div class="blank20"></div>
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
                <!-- 左侧 -->
                <div class='fl b-main grid-61'>
                    <!-- 交易提醒 -->
                    <div class='trad-remind purchase-mod'>
                        <h4>交易提醒</h4>
                        <div class='info-box'>
                            <p>采购提醒：<a href='javascript:;'>待审核(<em>2</em>)</a><a href='javascript:;'>待付款(<em>3</em>)</a><a href='javascript:;'>待确认收货(<em>4</em>)</a><a href='javascript:;'>待评价卖家(<em>5</em>)</a></p>
                            <p>供应提醒：<a href='javascript:;'>报价单(<em>6</em>)</a><a href='javascript:;'>销售单(<em>6</em>)</a><a href='javascript:;'>待发货(<em>3</em>)</a><a href='javascript:;'>退货处理(<em>2</em>)</a></p>
                        </div>
                    </div>
                    <!-- 最新拼单 -->
                    <div class='new-spell purchase-mod'>
                        <h4>最新拼单</h4>
                        <ul class='spell-list'>
                            <li><span class='p-price'>¥35.00</span><a href='javascript:;' class='p-name'>高档商务时尚T恤</a><span class='p-time'>剩42小时17分</span></li>
                            <li><span class='p-price'>¥120.00</span><a href='javascript:;' class='p-name'>高档商务时尚T恤</a><span class='p-time'>剩42小时17分</span></li>
                            <li><span class='p-price'>¥50.00</span><a href='javascript:;' class='p-name'>素色气质棉麻围巾</a><span class='p-time'>剩42小时17分</span></li>
                            <li><span class='p-price'>¥500.00</span><a href='javascript:;' class='p-name'>素色气质棉麻围巾</a><span class='p-time'>剩42小时17分</span></li>
                        </ul>
                    </div>
                </div>
                <!-- 左侧结束 -->
                <!-- 右侧 -->
                <div class='fr b-side grid-20'>
                    <div class='may-like'>
                        <h4>你可能比较感兴趣</h4>
                        <ul>
                            <li class='may-like-item'>
                                <div class='p-img'>
                                    <a href='javascript:;'><img src="../include/img/zz01.jpg" width="80" height="80" alt=""></a>
                                    <p class='p-info'><span class='p-num'>采购量：1万个</span><span class='p-time'>还剩<em>2</em>天</span></p>
                                </div>
                                <p class='p-name'><a href='javascript:;'>珍珠领项链</a></p>
                                <p class='p-addr'>所在地区：广西宜州市</p>
                            </li>
                            <li class='may-like-item'>
                                <div class='p-img'>
                                    <a href='javascript:;'><img src="../include/img/zz02.jpg" width="80" height="80" alt=""></a>
                                    <p class='p-info'><span class='p-num'>采购量：1万个</span><span class='p-time'>还剩<em>10</em>天</span></p>
                                </div>
                                <p class='p-name'><a href='javascript:;'>生产用纸箱</a></p>
                                <p class='p-addr'>所在地区：浙江余姚市</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- 右侧结束 -->
                <div class="blank20"></div>
            </div>
        </div>
        
        
    </div>
</div>
<!--回到顶部，留言，联系客服 先保留-->
<div class="aside-panel" id="j-panel">
<a href="javascript:;" title="" id="j-gotop" class="backtop">顶部</a>
<a href="javascript:;" title="" id="j-message">留言</a>
<a href="javascript:;" title=""  id="j-service">客服</a>
</div>
<script type="text/javascript" src="../include/js/common.js"></script>
<script type="text/javascript" src="../include/js/perform.js"></script>
</body>
</html>