<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 14:35
 */

/*
 * 错误级别
 *      E_NOTICE
 *      E_WARNING
 *      E_ERROR
 * 错误配置
 *      php.ini
 *      diasplay_errors = off 关闭错误显示
 *      error_reporting(E_ALL^(E_NOTICE | E_WARNING));
 * 自定义错误
 *      set_error_handler('funName');
 * 错误日志
 *      log_errors = on 开启错误日志
 *
 * 异常
 *      处理逻辑错误(可预期错误),正常逻辑中出现的错误.
 *      语法:
 *          try{
 *              if (发生异常) {
 *                  throw new Exception('msg...');
 *              }
 *          } catch (Exception $e) {
 *              $e->...
 *          }
 *      特点:
 *          如果抛出异常,throw后面的代码会终止,
 *          try外面的代码,不受影响...
 */

//正常的过程
/*echo '睁眼<br>';
echo '啊,我睁不开眼了,继续睡....';
exit;
echo '下床<br>';
echo '洗脸<br>';
echo '吃饭<br>';
echo '路上<br>';
*/

//异常的过程
try{
    echo '睁眼<br>';
    if (true) {
//        抛出异常 throw(扔)
        throw new Exception('啊,我睁不开眼了,继续睡........');
    }
    echo '下床<br>';
    echo '洗脸<br>';
    echo '吃饭<br>';
    echo '路上<br>';
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '我是try外面的';    //外面代码依旧可以执行