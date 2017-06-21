<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 14:25
 */

namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct()
    {
        parent::__construct();

        // 验证是否登录
        $openid = session('open_id');
        if(!isset($openid))
        {
            $this->error('请先登录...',U('Login/index'));
        }


    }
}