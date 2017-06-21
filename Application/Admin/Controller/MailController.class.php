<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 12:05
 */
namespace Admin\Controller;
use Think\Controller;
include 'Application/Admin/Common/class.phpmailer.php';

class MailController extends Controller {
    public function _initialize()
    {
        if(empty($_SESSION['user'])){
            $this->redirect('Index/index');
        }
    }

    public function index(){
        $data=M('Users')->field('username,email')->select();
        $this->assign('data',$data);
        $this->display();
    }

    public function send(){
        header("Content-type: text/html; charset=utf-8");
//        $where['id']=array('between',array('637126','637176'));
        $address=M('Users')->field('username,email')->order('id desc')->select();
        $i=0;$j=0;
        foreach ($address as $key => $value){
            $mail = new \PHPMailer(); //实例化
            $mail->IsSMTP(); // 启用SMTP
            $mail->Host = "smtp.qq.com"; //SMTP服务器
            $mail->Port = 25;  //邮件发送端口
            $mail->SMTPAuth = true;  //启用SMTP认证
            $mail->CharSet = "UTF-8"; //字符集
            $mail->Encoding = "base64"; //编码方式
            $email_system = "zhengzaoxia@yaxzb.com";
            $mail->Username = $email_system;  //你的邮箱
            $mail->Password = "ZX200711zx";  //你的密码
            $mail->Subject = "你好"; //邮件标题
            $mail->From = $email_system;  //发件人地址（也就是你的邮箱）
            $mail->FromName = "二当家";  //发件人姓名
            $mail->AddAddress($value['email'], $value['username']); //添加收件人（地址，昵称）
            $mail->IsHTML(true); //支持html格式内容
            $mail->Body = '你好, <b>朋友</b>! <br/>这是一封来自<a href="http://www.erdangjiade.com" target="_blank">erdangjiade.com</a>的测试邮件！<br/>'; //邮件主体内容
        //发送
            if (!$mail->Send()) {
                $i++;
                echo $value['email'].'发送失败<br>';
            } else {
                $j++;
                echo $value['email'].'发送成功<br>';
            }
        }
        echo '发送成功'.$j.'封<br>';
        echo '发送失败'.$i.'封<br>';
        die;
    }
}