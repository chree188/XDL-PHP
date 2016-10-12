<?php	
	/*
        数组,是一组相关的数据
    */

    //1.通过下标的形式定义
    $jingshui['name'] = 'jingshui';
    $jingshui['height'] = 175;
    $jingshui['age'] = 33;
    $jingshui['sex'] = '男';
    
    $arr[]='a'; // [ ]没有值,它会取数组中下标最大的值+1
    $arr[5]='b';
    $arr[]='c';
    $arr[]='d';
    print_r($arr);
    
    /*
        $jingshui 称之为  关联数组 (下标是字符串)
        $arr   称之为  索引数组  (下标是数字)
    */
    
    // echo $jingshui['sex']; //单独输出数组中一个元素值
    // echo $jingshui;  数组不能用echo输出,这样只能返回一个'Array'字符串
    echo '<pre>';
    // var_dump($jingshui);
    // print_r($jingshui); //打印整个数组
    
    //2. [] php5.4起用的
    $arr = ['a','b','c','d'];  //这两句等同
    // $arr = [0=>'a',1=>'b',2=>'c',3=>'d'];
    // echo $arr[0];
    
    //3. 
	//  $arr = array('name'=>'a','b','c','d');
    echo $arr[0];
