/* 插入数据信息语句 */

/*打开myshop数据库*/
use myshop;

/*以下是管理员信息*/
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('1','rz','瑞兹','84d6c1089afa2c0a3e2f3c8a877df0f3','1','召唤师峡谷','458712','13777399112','rz@126.com','2','1468976982');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('2','js','剑圣','a40f8f12d1f0656b6185c83a89a47001','1','召唤师峡谷','145287','13777399388','js@126.com','1','1468930349');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('3','mgn','莫甘娜','e4eb4fd9377257d2011e193156003bf7','2','召唤师峡谷','124578','13777399001','mgn@126.com','2','1468926849');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('4','qj','千珏','55431fe6c0743b0e9afde1e6f4b3cb84','2','符文之地','847521','13777333444','qj@126.com','1','1469005102');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('5','ax','艾希','2384ecc9f4a1618d2cc06639c3a16f0b','2','瓦罗兰','451278','13421826813','ax@126.com','1','1468927033');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('6','gl','盖伦','f802b9669cdf882daa2c991724745b9b','1','德玛西亚','254187','13777399444','gl@126.com','2','1468936764');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('7','jh','剑豪','521289d32ac2ea23f1872e7c8339396e','1','召唤师峡谷','154287','13777333123','jh@126.com','2','1469020137');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('8','ktl','凯特琳','1147ec8fe6c96fa99b516ae017d0552c','2','皮城警备','758421','13777388387','ktl@126.com','2','1469088747');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('9','ktln','凯特琳娜','2c34e6eaca8165ae4d44373b7ada5bca','2','不知道','784851','13777852963','ktln@126.com','1','1469088810');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('10','nq','男枪','1dd88952cc1150db5a6be33932fff1c9','2','比尔吉沃特','758421','13777741852','nq@126.com','3','1469088874');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('11','hyj','好运姐','975caee8c7ffb6107f9d6683bfb170cf','2','海盗船','741852','13777789456','hyj@126.com','1','1469088946');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('12','zjx','章佳鑫','b01364ed815031f09e4cfac165491933','1','浙江省绍兴市','312000','13777398039','zjx@126.com','1','1469089006');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('13','root','ROOT','63a9f0ea7bb98050796b649e85481845','1','root','212121','13777333212','root@126.com','1','1469089044');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('14','admin','admin','21232f297a57a5a743894a0e4a801fc3','1','admin','111111','13777399333','admin@126.com','2','1469148435');
insert into `users` (`id`, `username`, `name`, `pass`, `sex`, `address`, `code`, `phone`, `email`, `state`, `addtime`) 
values('15','zx','赵信','f52f7720f135c6a848fae08d507914cf','1','德玛西亚','758421','13777399222','zx@126.com','1','1469409209');

/*以下是商品分类信息*/
insert into `type` (`id`, `name`, `pid`, `path`) values('1','食用油','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('2','干果坚果','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('3','五谷杂粮','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('4','水产','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('5','水果','0','0,');
insert into `type` (`id`, `name`, `pid`, `path`) values('13','草鱼','11','0,4,11,');
insert into `type` (`id`, `name`, `pid`, `path`) values('9','菜籽油','1','0,1,');
insert into `type` (`id`, `name`, `pid`, `path`) values('11','淡水鱼','4','0,4,');
insert into `type` (`id`, `name`, `pid`, `path`) values('15','热带水果','5','0,5,');
insert into `type` (`id`, `name`, `pid`, `path`) values('16','核桃','2','0,2,');
insert into `type` (`id`, `name`, `pid`, `path`) values('17','麦子','3','0,3,');
insert into `type` (`id`, `name`, `pid`, `path`) values('18','色拉油','1','0,1,');

/*以下是商品信息*/
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('1','9','江南菜籽油','江南粮油食品厂','江南黄金油菜籽油。。。江南黄金油菜籽油...','59.99','14694141879812.jpg','1','180','0','0','1469414187');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('2','9','东北香菜籽油','吉林粮油厂','东北香菜籽油东北香菜籽油。。。真香真香真真香','80.00','14694242758932.jpg','1','300','0','0','1469424275');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('10','18','金龙鱼','金龙鱼有限公司','金龙鱼花生调和油。。。。。。。。','59.90','14694445783402.jpg','2','56','0','0','1469444526');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('11','16','临安山核桃','临安','临安手剥山核桃','89.00','14694447521569.jpg','1','86','0','0','1469444752');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('12','17','清香小麦','绍兴粮食厂','绍兴粮食厂清香小麦','23.00','14694448022742.jpg','1','85','0','0','1469444802');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('13','11','鲤鱼','开化清水鱼','开化清水鱼，鲤鱼。。。。','26.00','14694448967589.jpg','1','6','0','0','1469444896');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('14','13','大草鱼','千岛湖','千岛湖大草鱼。。。。。。。。','26.00','14694449639705.jpg','1','53','0','0','1469444963');
insert into `goods` (`id`, `typeid`, `goods`, `company`, `descr`, `price`, `picname`, `state`, `store`, `num`, `clicknum`, `addtime`) 
values('15','15','香蕉','海南香蕉林','海南芝麻香蕉，好吃好吃真好吃','8.90','14694451724018.jpg','1','66','0','0','1469445172');