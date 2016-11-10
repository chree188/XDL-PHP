<?php
namespace Home\Controller;
use Think\Controller;
class PHPMailerController extends Controller {

    public function index(){
        if(IS_POST){
            //记录服务器信息   实际使用中应该在配置文件中将这些服务器信息写死  为了不暴露我的个人信息  每次在线收集信息
            $this->host = $_POST['host'];
            $this->port = $_POST['port'];
            $this->ssl = $_POST['ssl'];
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];

            $this->sendMail($_POST['sendTo'],$_POST['subject'],$_POST['body']);

        }else{
            $this->display();
        }
    }


    // 邮件发送
    protected function sendMail($sendTo,$subject='测试邮件',$body = '<h3>测试邮件</h3>'){
         //导入PHPMail 类文件
        //Vendor('PHPMailer.class#phpmailer');
        //Vendor('PHPMailer.class#smtp');
        require "./Application/Common/Vendor/PHPMailer/PHPMailerAutoload.php";
        //实例化对象(PHPMailer默认在全局命名空间下)
        $mail = new \PHPMailer;

        //采用smtp  默认是系统的mail函数发送
        $mail->isSMTP();
        //采用html格式发送
        $mail->isHtml();

        //设置字符集
        $mail->CharSet = 'utf-8';
        //编码方式
        $mail->Encoding = 'base64';

        //验证相关
        /*  SSL验证
        $mail->Host = 'smtp.exmail.qq.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = 'xxxxxx@qq.com';
        $mail->Password = '*********';
        */

        /*
        // 基本验证
        $mail->Host = 'smtp.126.com';
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->Username = 'xxxxx@126.com';
        $mail->Password = '************';
        */

        /*
        // QQ邮箱  也是SSL验证  必须开启独立密码 才能开启SMTP服务
        $mail->Host = 'smtp.qq.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = '123456@qq.com';
        $mail->Password = '*********';
        */

        // 基本验证   这些数据应该写死  或通过配置文件设置   由于方便测试  每次动态收集服务器信息
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = $this->ssl;
        $mail->Username = $this->username;
        $mail->Password = $this->password;


        //发送相关
        $mail->Subject = $subject;               //设置主题
        //$mail->From = 'xxxxx@126.com';
        $mail->From = $this->username;           // 发送人 通常就是用户名
        $mail->FromName = 'LampStudy';

        $mail->AddAddress($sendTo,'亲！');        //设置 收件人  称呼
        $mail->Body = $body;                     //设置邮件正文为参数内容

        //dump($mail);

        //发送
        if($mail->send()){
          echo 'Success!';
        }else{
          echo 'Error:'.$mail->ErrorInfo;

        }
    }
}
