<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <center>
        <span>欢迎<?php echo ($_SESSION['user']); ?>的登录|<a href="<?php echo U('Index/index');?>">退出</a></span>
        <table border="1">
            <tr>
                <td>公司号</td>
                <td>公司名</td>
                <td>公司地址</td>
                <td>联系方式</td>
                <td>经度</td>
                <td>维度</td>
                <td>地图</td>
                <td>操作</td>
                <td><a href="/Admin/Map/add">添加</a>|<a href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/Home/Index/all">查看所有</a></td>
            </tr>
            <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                <td><?php echo ($val['id']); ?></td>
                <td><?php echo ($val['shop_name']); ?></td>
                <td><?php echo ($val['address']); ?></td>
                <td><?php echo ($val['tel']); ?></td>
                <td><?php echo ($val['jd']); ?></td>
                <td><?php echo ($val['wd']); ?></td>
                <td><a href="<?php echo ($val['url']); ?>">点击查看</a></td>
                <td><a href="<?php echo U('Map/del',array('id'=>$val['id']));?>">删除</a>|<a href="<?php echo U('Map/edit',array('id'=>$val['id']));?>">修改</a>|</td>
            </tr><?php endforeach; endif; ?>
        </table>
        <a href="<?php echo U('Mail/index');?>">群发Email</a>
    </center>
</body>
</html>