<?php

/*递归函数：自己调用自己
 必须加以控制，不让它无限的自己调用自己
 把它们看成两个不同的函数，因为它们每次被调用时，参数不一样*/

function test($n) {
	echo $n, '<br>';
	if ($n > 1) {
		test($n - 1);
	}
	echo $n, '<br>';
}

test(5);

/*
        test(5){
            echo 5;
                test(4){
                    echo 4;
                        test(3){
                              echo 3;
                                 test(2){
                                    echo 2;
                                      test(1){
                                        echo 1;
                                        echo 1;
                                      }
                                    echo 2;  
                                 }
                              echo 3;
                        }
                    echo 4;  
              }
            echo 5;
        }
    */