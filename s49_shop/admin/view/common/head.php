<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="./public/css/main.css"/>
    <script type="text/javascript" src="./public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="http://www.mycodes.net/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="./index.php?c=user&a=logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                       
                        <li><a href="./index.php?c=user&a=index"><i class="icon-font">&#xe052;</i>用户列表</a></li>
                        <li><a href="./index.php?c=user&a=addForm"><i class="icon-font">&#xe033;</i>添加用户</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>分类管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?c=type&a=index"><i class="icon-font">&#xe017;</i>分类列表</a></li>
                        <li><a href="./index.php?c=type&a=addForm"><i class="icon-font">&#xe037;</i>添加分类</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?c=goods&a=index"><i class="icon-font">&#xe017;</i>商品列表</a></li>
                        <li><a href="./index.php?c=goods&a=addForm"><i class="icon-font">&#xe037;</i>添加商品</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="./index.php?c=sns&a=index"><i class="icon-font">&#xe017;</i>查询订单</a></li>
                       
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->