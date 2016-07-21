/* 插入数据信息语句 */

/*打开myshop数据库*/
use myshop;

/*以下是管理员信息*/
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('12','rz','瑞兹','84d6c1089afa2c0a3e2f3c8a877df0f3','1','召唤师峡谷','458712','13777399112','rz@126.com','1','1468976982');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('9','js','剑圣','a40f8f12d1f0656b6185c83a89a47001','1','召唤师峡谷','145287','13777399388','js@126.com','0','1468930349');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('6','mgn','莫甘娜','e4eb4fd9377257d2011e193156003bf7','2','召唤师峡谷','124578','13777399001','mgn@126.com','1','1468926849');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('13','qj','千珏','55431fe6c0743b0e9afde1e6f4b3cb84','2','符文之地','847521','13777333444','qj@126.com','0','1469005102');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('8','ax','艾希','2384ecc9f4a1618d2cc06639c3a16f0b','2','瓦罗兰','451278','13421826813','ax@126.com','0','1468927033');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('11','gl','盖伦','f802b9669cdf882daa2c991724745b9b','1','德玛西亚','254187','13777399444','gl@126.com','1','1468936764');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('14','jh','剑豪','521289d32ac2ea23f1872e7c8339396e','1','召唤师峡谷','154287','13777333123','jh@126.com','1','1469020137');

/*以下是商品分类信息*/
insert into `type` (`id`, `name`, `pid`, `path`) values('1','食用油','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('2','干果坚果','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('3','五谷杂粮','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('4','水产','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('5','水果','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('6','鱼','4','0,4,');
insert into `type` (`id`, `name`, `pid`, `path`) values('7','鲫鱼','6','0,4,6,');
insert into `type` (`id`, `name`, `pid`, `path`) values('8','黄鱼','6','0,4,6,');
insert into `type` (`id`, `name`, `pid`, `path`) values('9','菜籽油','1','0,1,');

/*以下是商品信息*/
insert into goods (typeid,goods,company,descr,price,picname,store,num,addtime) 
values(1,'芝麻油','绍兴清香食品厂','这是芝麻油',99.90,'../public/img/uploads/oil.jpg',100,15,20160715);
insert into goods (typeid,goods,company,descr,price,picname,store,num,addtime) 
values(1,'玉米油','嘉兴清香食品厂','这是玉米油',55.80,'../public/img/uploads/oil.jpg',50,6,20160715);
insert into goods (typeid,goods,company,descr,price,picname,state,store,num,addtime) 
values(1,'花生油','山东廉价食品厂','~~~这是花生油',49.50,'../public/img/uploads/oil.jpg',2,80,3,20160715);
insert into goods (typeid,goods,company,descr,price,picname,state,store,addtime) 
values(1,'橄榄油','上海旅游食品厂','这是橄榄油！！！',199.90,'../public/img/uploads/oil.jpg',3,30,20160715);
