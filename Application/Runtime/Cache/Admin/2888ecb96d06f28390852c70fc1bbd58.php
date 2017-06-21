<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<center>
    <form id="reg" action="/Admin/Map/edit" method="post">
        <input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
        <p>公司名称：<input type="text" name="shop_name" value="<?php echo ($info['shop_name']); ?>"></p>
        <p>公司地址：<input type="text" name="address" value="<?php echo ($info['address']); ?>"></p>
        <p>公司电话：<input type="text" name="tel" value="<?php echo ($info['tel']); ?>"></p>
        <p>经度：<input type="text" class="input" name="jd" value="<?php echo ($info['jd']); ?>" /></p>
        <p style="margin:20px 0">纬度：<input type="text" class="input" name="wd" value="<?php echo ($info['wd']); ?>" /></p>
        <p><input type="submit" name="submit" class="btn" value="提交"/></p>
    </form>
</center>
</body>
</html>