<?php
  //商品操作模型
  require "./model/db_cfg.php";
  require "./model/db.php";
	
	$_GET['tblname'] = 'shop_orders';
	$_GET['pk'] = 'oid';
 
//功能 得到订单信息
function getorders()
{
	$orders = select();
  return $orders;
}
function getgoods()
{
	$_GET['tblname'] = 'shop_goods';
	$_GET['pk'] = 'gid';
	$goods = select();
	return $goods;
}
