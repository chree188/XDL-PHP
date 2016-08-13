-- 创建lamp_shop库
create database if not exists lamp_shop;

-- 选择数据库
use lamp_shop;

-- 前台用户表
create table if not exists `user`(
	`id` int unsigned auto_increment primary key,
	`tel` char(11) not null unique comment '手机号',
	`nickname` varchar(30) comment '昵称',
	`pwd` char(32) not null comment '密码',
	`sex` tinyint(1) default 1 comment '1-男 2-女',
	`birthday` datetime comment '生日',
	`email` varchar(50) comment '邮箱',
	`icon` varchar(50) comment '头像',
	`status` tinyint(1) not null default 1 comment '1-激活 2-禁用',
	`regtime` int(10) not null comment '注册时间'
)engine=myisam default charset=utf8;

-- 管理员表
create table if not exists `admin`(
	`id` int unsigned auto_increment primary key,
	`name` varchar(50) not null unique comment '用户名',
	`pwd` char(32) not null comment '密码',
	`status` tinyint(1) not null default 1 comment '状态 1-激活 2-禁用',
	`createtime` int not null comment '创建时间'
)engine=myisam default charset=utf8;


-- 分类表
create table if not exists `category`(
	`id` int unsigned auto_increment primary key,
	`name` varchar(50) not null unique comment '分类名',
	`pid` int not null comment '父级的id',
	`path` varchar(255) not null comment '分类路径信息',
	`display` tinyint(1) default 2 comment '1-显示  2-隐藏'
)engine=myisam default charset=utf8;