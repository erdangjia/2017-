<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/Public/js/jquery-1.11.0.js"></script>
</head>
<body>
<div class="tab_nav">
    <div class="header">
        <div class="h-left">
            <a class="sb-back" href="javascript:window.history.go(-1)" title="返回" style="display: block; width: 45px; height: 45px;margin: auto; background: url(../images/arrow_left.png) no-repeat 15px center; background-size: auto 16px;"></a>
        </div>
        <div class="h-mid">
            <span style=" color: #fff;">充值</span>
        </div>
    </div>
</div>


<div class="screen-wrap fullscreen login">
    <div class="mui-content recharge">
<form action="/Application/Lib/Alipay/wappay/pay.php" method="post" id="zf_form" onsubmit="return sub_chk()">
    <div class="rec_top">
        <p>支付金额：</p>
        <div class="mui-input-row"><label>¥</label><input type="text" name="total" class="rec_money" id="rec_money"/></div>
    </div>

    </div>
    <button class="mui-btn mui-btn-block" >支付</button>
</form>
</div>
<script>
    function sub_chk(){
        var rec_money = $("#rec_money").val();
        if(!rec_money){
            alert("请输入准确的充值金额");
            return false;
        }else if(isNaN(rec_money)){
            alert("请输入准确的充值金额");
            return false;
        }else if($.trim(rec_money) == 0){
            alert("请输入准确的充值金额");
            return false;
        }else{
            return true;
        }
    }
</script>

<script>
    $('.rec_money').focus();
</script>
</body>
</html>