<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<center>
    <table border="1">
        <tr>
            <td>公司号</td>
            <td>公司名</td>
            <td>公司地址</td>
            <td>联系方式</td>
            <td>地图</td>
            <td><a href="<?php echo U('Index/all');?>">查看所有</a></td>
            <td><a href="<?php echo U('Index/pay');?>">打赏</a></td>
        </tr>
        <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                <td><?php echo ($val['id']); ?></td>
                <td><?php echo ($val['shop_name']); ?></td>
                <td><?php echo ($val['address']); ?></td>
                <td><?php echo ($val['tel']); ?></td>
                <td><a href="<?php echo ($val['url']); ?>">点击查看</a></td>
            </tr><?php endforeach; endif; ?>
    </table>
</center>
</body>
</html>