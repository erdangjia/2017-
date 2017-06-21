<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/24
 * Time: 15:07
 */

namespace Admin\Controller;
use Think\Controller;
class MapController extends Controller
{
    public function _initialize()
    {
        if(empty($_SESSION['user'])){
            $this->redirect('Index/index');
        }
    }
    //所有数据
    public function index(){

        $data=M('Map')->select();
        $this->assign('data',$data);
        $this->display();
    }



    //添加
    public function add(){
        if(IS_POST){
            if(empty(I('post.jd'))||empty(I('post.wd'))||empty(I('post.shop_name'))||empty(I('post.address'))){
                $this->error('请填写完整信息');
            }
            $data['jd']=trim(I('post.jd'));
            $data['wd']=trim(I('post.wd'));
            $data['shop_name']=trim(I('post.shop_name'));
            $data['address']=trim(I('post.address'));
            $data['tel']=trim(I('post.tel'));
            $data['url']="http://api.map.baidu.com/marker?location=$data[wd],$data[jd]&title=位置&content=$data[shop_name]&output=html";
            $res=M('Map')->add($data);
            if($res){
                $this->redirect('Map/index');
            }
        }else{
            $this->display();
        }
    }
    //删除
    public function del(){
        $id=I('get.id','');
        $res=M('Map')->where("id=$id")->delete();
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    public function edit(){
        if(IS_POST){
            $id=trim(I('post.id'));
            $data['jd']=trim(I('post.jd'));
            $data['wd']=trim(I('post.wd'));
            $data['shop_name']=trim(I('post.shop_name'));
            $data['address']=trim(I('post.address'));
            $data['tel']=trim(I('post.tel'));
            $data['url']="http://api.map.baidu.com/marker?location=$data[wd],$data[jd]&title=位置&content=$data[shop_name]&output=html";
            $res=M('Map')->where("id=$id")->save($data);
            if($res){
                $this->success('成功','index');
            }
        }else{
            $id=I('get.id','');
            $info=M('Map')->where("id=$id")->find();
            $this->assign('info',$info);
            $this->display();
        }
    }

    public function  thum(){
        $image = new \Think\Image();
        var_dump($image);die;
        $image->open('1.jpg');
        // 生成一个缩放后填充大小150*150的缩略图并保存为thumb.jpg
        $image->thumb(150, 150,1)->save('thumb.jpg');
        echo 1;
    }

}