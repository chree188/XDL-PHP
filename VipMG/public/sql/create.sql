/* 建库建表语句 */

/*==建库建表前先删除数据库==*/

drop database if exists vipmg;
/*创建数据库vipmg，指定数据库的字符编码用UTF-8*/
create database vipmg character set utf8;

/*打开数据库*/
use vipmg;



drop table if exists admin;
/*创建用户表 admin*/
create table admin(
	id int(11) unsigned not null auto_increment primary key,
	username varchar(32) not null unique,
	name varchar(16) not null,
	pass char(32) not null,
	sex tinyint(1),
	address varchar(255),
	phone varchar(16) not null,
	state enum('1','2')  not null default '2',
	status enum('1','2')  not null default '1',
	logintime int(11)
)engine=myisam default charset=utf8;

/*插入超级管理员账号*/
insert into admin(id,username,name,pass,sex,address,phone,state,logintime) values (1,'admin','admin','21232f297a57a5a743894a0e4a801fc3',1,'浙江省开化县','12345678912','1',1469409209);


drop table if exists users;
/*创建用户表 users*/
create table users(
	id int(11) unsigned not null auto_increment primary key,
    adminid int(11) not null,
    constraint gtfk foreign key(adminid) references admin(id),
    addtime varchar(16) not null,
	username varchar(16) not null unique,
	name varchar(16) not null,
	sex tinyint(1),
    age int(3),
    phone1 varchar(16) not null,
    phone2 varchar(16),
    qq1 varchar(16) not null,
    qq2 varchar(16),
    idcard varchar(32) not null,
	address varchar(255) not null,
	nowaddr varchar(255) not null,
	alipay varchar(255) not null,
	tenpay varchar(255),
	picname varchar(255) not null
)engine=myisam default charset=utf8;
