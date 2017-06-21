<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<center>
    <span>欢迎<?php echo ($_SESSION['user']); ?>的登录|<a href="<?php echo U('Index/index');?>">退出</a></span>
    <a href="<?php echo U('Mail/send');?>">群发Email</a>
    <table border="1">
        <tr>
            <td>用户名</td>
            <td>邮箱</td>
        </tr>
        <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                <td><?php echo ($val['username']); ?></td>
                <td><?php echo ($val['email']); ?></td><?php endforeach; endif; ?>
    </table>
</center>
</body>
</html>