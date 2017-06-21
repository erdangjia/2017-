<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <center>
        <form id="reg" action="/Admin/Map/add" method="post">
            <p>公司名称：<input type="text" name="shop_name"></p>
            <p>经度：<input type="text" class="input" name="jd" /></p>
            <p style="margin:20px 0">纬度：<input type="text" class="input" name="wd" /></p>
            <p><input type="submit" name="submit" class="btn" value="提交"/></p>
        </form>
    </center>
</body>
</html>