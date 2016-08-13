/* 建库建表语句 */

/*==建库建表前先删除数据库==*/

drop database if exists qt_vipmg;
/*创建数据库vipmg，指定数据库的字符编码用UTF-8*/
create database qt_vipmg character set utf8;

/*打开数据库*/
use qt_vipmg;



drop table if exists admin;
/*创建管理员表 admin*/
create table if not exists admin(
	id int(11) unsigned not null auto_increment primary key,
	icon varchar(50) comment '头像',
	username varchar(32) not null unique comment '昵称',
	name varchar(16) not null comment '姓名',
	passwd char(32) not null comment '密码',
	sex tinyint(1) default 1 comment '1-男 2-女',
	address varchar(255) comment '住址',
	phone varchar(16) not null comment '手机号',
	state enum('1','2')  not null default '2' comment '1-超级管理员 2-管理员',
	status enum('1','2')  not null default '1' comment '1-激活 2-禁用',
	logintime int(11) comment '最后登录时间'
)engine=myisam default charset=utf8;

/*插入超级管理员账号,默认账号：admin 密码：admin*/
insert into admin(icon,username,name,passwd,sex,address,phone,state,logintime) values ('','admin','admin','21232f297a57a5a743894a0e4a801fc3',1,'浙江省开化县','12345678912','1',1469409209);


drop table if exists users;
/*创建用户表 users*/
create table users(
	id int(11) unsigned not null auto_increment primary key,
    adminid int(11) not null default 1 comment '推荐人ID,默认admin1',
    constraint gtfk foreign key(adminid) references admin(id),
    addtime varchar(16) not null comment '入会时间',
	username varchar(16) not null unique comment '昵称',
	name varchar(16) not null comment '姓名',
	sex tinyint(1) comment '1-男 2-女',
    age int(3) comment '年龄',
    phone1 varchar(16) not null comment '常用手机号',
    phone2 varchar(16) comment '备用手机号',
    qq1 varchar(16) not null comment '常用QQ号',
    qq2 varchar(16) comment '备用QQ号',
    idcard varchar(32) not null comment '身份证号',
	address varchar(255) not null comment '身份证住址',
	nowaddr varchar(255) not null comment '现住址',
	alipay varchar(255) not null comment '支付宝账号',
	tenpay varchar(255) comment '财付通账号',
	picname varchar(255) not null comment '各种截图',
	status enum('1','2')  not null default '1' comment '1-激活 2-禁用'
)engine=myisam default charset=utf8;
