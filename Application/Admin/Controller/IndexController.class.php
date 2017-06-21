<?php
namespace Admin\Controller;
use Think\Controller;
use Org\YZ\Geetest;
class IndexController extends Controller {

    /**
     * geetest生成验证码
     */
    public function geetest_show_verify(){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new Geetest($geetest_id,$geetest_key);
        $user_id = "test";
        $status = $geetest->pre_process($user_id);
        $_SESSION['geetest']=array(
            'gtserver'=>$status,
            'user_id'=>$user_id
        );
        echo $geetest->get_response_str();
    }
    /**
     * geetest submit 提交验证
     */
    public function index(){
        if(IS_POST){
            $data=I('post.');
            if (geetest_chcek_verify($data)) {
                $name=trim(I('post.user'));
                $password=md5(trim(I('post.password')));
                if(empty($name)||empty($password)){
                    $this->error('用户名或密码不能为空');
                }else{
                    $where['user']=$name;
                    $where['password']=$password;
                    $res=M('User')->where($where)->find();
                    if($res){
                        $_SESSION['user']=$name;
                        $this->redirect('Map/index');
                    }else{
                        $this->error('用户名或密码错误');
                    }
                }
            }else{
                $this->error('验证码验证失败');
            }
        }else{
            session(null);
            $this->display();
        }
    }

}