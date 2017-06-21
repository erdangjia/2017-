<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 11:21
 */

namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{

    public function index(){
        $this->display();
    }

    /*
     * 初始化
     */
    public function _initialize(){
        //引入QQ登陆类
        require_once "Application/Lib/Connect/class/QC.class.php";
        //实例化
        $this->QC = new \QC;
    }
    //登录
    public function qq_login(){
        $this->QC->qq_login();
    }
    //
    public function qq_callback(){
        $token  = $this->QC->qq_callback();//获取token
        $openid = $this->QC->get_openid();//获取openid
        $QC = new \QC($token,$openid);
        $arr = $QC->get_user_info();//获取QQ用户信息
        $res=M('Qq')->where("openid=$openid")->find();
        //是否存在
        if($res){
            $time['update_time']=time();
            M('Qq')->where("openid=$openid")->save($time);
            $_SESSION['open_id']=$openid;
            $this->redirect("Index/index");
        }else{
            $data['nick_name']=$arr['nickname'];
            $data['open_id']=$openid;
            $data['header_img']=$arr['figureurl_qq_2'];
            $data['update_time']=time();
            M('Qq')->add($data);
            $_SESSION['open_id']=$openid;
            $this->redirect('Index/index');
        }
    }

}