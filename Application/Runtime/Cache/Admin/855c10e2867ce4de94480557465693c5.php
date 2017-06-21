<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <td>商铺号</td>
                <td>经度</td>
                <td>维度</td>
                <td>url</td>
                <td>操作</td>
            </tr>
            <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                <td><?php echo ($val['id']); ?></td>
                <td><?php echo ($val['jd']); ?></td>
                <td><?php echo ($val['wd']); ?></td>
                <td><a href="<?php echo ($val['url]); ?>">查看</a></td>
                <td><a href="/Admin/Map/add">添加</a>|<a href="">修改</a><a href="">删除</a></td>
            </tr><?php endforeach; endif; ?>
        </table>
    </div>
</body>
</html>