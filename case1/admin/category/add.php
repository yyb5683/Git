<?php 
    require '../init.php';
    //直接产生PID
    //为空默认为0,不为空就是传值
    $pid = empty($_GET['pid'])?0:$_GET['pid'];
    //直接产生PATH
    //为空默认为0,  不为空就是传值 拼接pid + ,
    $path = empty($_GET['path'])?'0,':$_GET['path'].$pid.',';

 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>添加分类</h2>
    <form action="./action.php?a=add" method="post">
        分类名:
        <input type="text" name="cname" placeholder="请输入分类名"><br><br>
        pid:
        <input type="text" name="pid" value="<?php echo $pid ?>" readonly><br><br>
        path:
        <input type="text" name="path" value="<?php echo $path ?>" readonly><br><br>
        

        <input type="submit" value="确认添加">
    </form>
</body>
</html>