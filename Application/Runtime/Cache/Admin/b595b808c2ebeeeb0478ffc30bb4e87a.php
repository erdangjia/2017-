<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            margin: 50px 0;
            text-align: center;
        }
        .inp {
            border: 1px solid gray;
            padding: 0 10px;
            width: 200px;
            height: 30px;
            font-size: 18px;
        }
        .btn {
            border: 1px solid gray;
            width: 100px;
            height: 30px;
            font-size: 18px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<center>
    <form class="popup" action="<?php echo U('Index/index');?>" method="post">
        <h2>欢迎登录</h2>
        <br>
        <p>
            <label for="user">用户名：</label>
            <input class="inp" name="user" type="text" >
        </p>
        <br>
        <p>
            <label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
            <input class="inp" name="password" type="password">
        </p>

        <div id="captcha" style=""></div>


        <br>
        <input class="btn" id="embed-submit" type="submit" value="提交">
    </form>
</center>
<!--</div>-->
</body>
<script src="/Public/js/jquery-1.11.0.js"></script>
<script src="/Public/js/gt.js"></script>
<script>
    var handler = function (captchaObj) {
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#captcha");
    };
    // 获取验证码
    $.get("<?php echo U('Admin/Index/geetest_show_verify');?>", function(data) {
        // 使用initGeetest接口
        // 参数1：配置参数，与创建Geetest实例时接受的参数一致
        // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
        initGeetest({
            gt: data.gt,
            challenge: data.challenge,
            product: "float", // 产品形式
            offline: !data.success
        }, handler);
    },'json');
</script>
</html>