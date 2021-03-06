/* 建库建表语句 */

/*==建库建表前先删除数据库==*/

drop database if exists myshop;
/*创建数据库myshop，指定数据库的字符编码用UTF-8*/
create database myshop character set utf8;

/*打开数据库*/
use myshop;


drop table if exists users;
/*创建用户表 users*/
create table users(
	id int(11) unsigned not null auto_increment primary key,
	username varchar(32) not null unique,
	name varchar(16),
	pass char(32) not null,
	sex tinyint(1),
	address varchar(255),
	code char(6),
	phone varchar(16),
	email varchar(50) not null unique,
	state enum('1','2','3') default '1',
	addtime int
)engine=myisam default charset=utf8;


drop table if exists type;
/*创建商品分类表 type*/
create table type(
	id int(11) unsigned not null auto_increment primary key,
	name varchar(32) not null unique,
	pid int(11) unsigned default '0',
	path varchar(255)
)engine=myisam default charset=utf8;


drop table if exists goods;
/*创建商品信息表 goods*/
create table goods(
	id int(11) unsigned not null auto_increment primary key,
	typeid int,
	constraint gtfk foreign key(typeid) references type(id),
	goods varchar(32) not null unique,
	company varchar(50),
	descr text,
	price double(6,2),
	picname varchar(255),
	state enum('1','2','3') default '1',
	store int default '0',
	num int default '0',
	clicknum int default '0',
	addtime int
)engine=myisam default charset=utf8; 


drop table if exists orders;
/*创建订单表 orders*/
create table orders(
	id int(11) unsigned not null auto_increment primary key,
	odid varchar(32),
	uid int,
	linkman varchar(32),
	address varchar(255),
	code char(6),
	phone varchar(16),
	descr text,
	evaluate text,
	addtime int,
	total double(8,2),
	status enum('1','2','3','4','5')
)engine=myisam default charset=utf8;


drop table if exists detail;
/*创建订单详情表 detail*/
create table detail(
	id int(11) unsigned not null auto_increment primary key,
	orderid int,
	constraint gtfk foreign key(orderid) references orders(id),
	goodsid int,
	name varchar(32),
	price double(6,2),
	num int,
	status enum('1','2') default '1'
)engine=myisam default charset=utf8;
