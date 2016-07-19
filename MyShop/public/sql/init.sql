/* 插入数据信息语句 */

/*打开myshop数据库*/
use myshop;

/*以下是管理员信息*/
/* md5错误了  insert into users(username,name,pass,sex,address,code,phone,email,addtime) 
values('admin','zwt',md5(zwt12345),1,'浙江省开化县','324300','13777399387','zwt0706@126.com',20160715); */
insert into users(username,pass,email) values('zs',md5(123),'zs@qq.com');
insert into users(username,pass,email) values('ls',md5(456),'ls@qq.com');
insert into users(username,pass,email) values('ww',md5(789),'ww@qq.com');

/*以下是商品分类信息*/
insert into type (name)values('食用油');
insert into type (name)values('五谷杂粮');
insert into type (name)values('菌菇');
insert into type (name)values('干果坚果');

/*以下是商品信息*/
insert into goods (typeid,goods,company,descr,price,picname,store,num,addtime) 
values(1,'芝麻油','绍兴清香食品厂','这是芝麻油',99.90,'../public/img/uploads/oil.jpg',100,15,20160715);
insert into goods (typeid,goods,company,descr,price,picname,store,num,addtime) 
values(1,'玉米油','嘉兴清香食品厂','这是玉米油',55.80,'../public/img/uploads/oil.jpg',50,6,20160715);
insert into goods (typeid,goods,company,descr,price,picname,state,store,num,addtime) 
values(1,'花生油','山东廉价食品厂','~~~这是花生油',49.50,'../public/img/uploads/oil.jpg',2,80,3,20160715);
insert into goods (typeid,goods,company,descr,price,picname,state,store,addtime) 
values(1,'橄榄油','上海旅游食品厂','这是橄榄油！！！',199.90,'../public/img/uploads/oil.jpg',3,30,20160715);
