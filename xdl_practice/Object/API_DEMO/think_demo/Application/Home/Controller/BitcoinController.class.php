<?php 
namespace Home\Controller;
use Think\Controller;
class BitcoinController extends Controller {
    //显示行情
    public function index(){
        $this->display();
    }

    //获取API行情
    public function getInfo()
    {
        //初始化 
        $curl = curl_init();

        //CURL配置
        //设置CURL的URL选项
        curl_setopt($curl, CURLOPT_URL, 'https://www.btc123.com/api/getTicker?symbol=huobibtccny');

        //将curl_exec()获取的信息 以文件流的形式返回,而不是直接输出.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //设定 为不验证证书SSL和host
        // CURLOPT_SSL_VERIFYHOST  / CURLOPT_SSL_VERIFYPEER
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //curl执行
        $data = curl_exec($curl);
        // var_dump($data);//得到结果 为JSON字串

        //关闭curl
        curl_close($curl);

        //直接返回JSON对象
        echo $data;
    }


}