<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public  function index(){
        $data=M('Map')->select();
        $this->assign('data',$data);
        $this->display();
    }
    public  function all(){
        $data=M('Map')->field('shop_name,jd,wd,address')->select();
        foreach($data as $key=>$value){
            $array[$key]['title']=$data[$key]['shop_name'];
            $array[$key]['point']=$data[$key]['jd'].','.$data[$key]['wd'];
            $array[$key]['address']=$data[$key]['address'];
            $array[$key]['tel']=$data[$key]['tel'];
        }
        $center=$array[0]['point'];
        $list=json_encode($array);
        $this->assign('list',$list);
        $this->assign('center',$center);
        $this->display();
    }
    public function pay(){
        $this->display();
    }
}