/* 插入数据信息语句 */

/*打开myshop数据库*/
use myshop;

/*以下是管理员信息*/
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('12','rz','瑞兹','84d6c1089afa2c0a3e2f3c8a877df0f3','1','召唤师峡谷','458712','13777399111','rz@126.com','2','1468976982');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('9','js','剑圣','a40f8f12d1f0656b6185c83a89a47001','1','召唤师峡谷','145287','13777399388','js@126.com','0','1468930349');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('6','mgn','莫甘娜','e4eb4fd9377257d2011e193156003bf7','0','召唤师峡谷','124578','13777399001','mgn@126.com','1','1468926849');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('7','jks','金克丝','5715cfbea4d5db379cdd3ac03e5d904a','0','皮城警备','215478','15381318020','jks@126.com','1','1468926932');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('8','ax','艾希','2384ecc9f4a1618d2cc06639c3a16f0b','0','瓦罗兰','451278','13421826813','ax@126.com','0','1468927033');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('11','gl','盖伦','f802b9669cdf882daa2c991724745b9b','1','德玛西亚','254187','13777399444','gl@126.com','1','1468936764');

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
