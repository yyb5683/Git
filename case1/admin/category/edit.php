<?php
    

     require '../init.php';
      // require'./index.php';

     $pid = empty($_GET['pid'])?0:$_GET['pid'];

     $path = empty($_GET['path'])?'0,':$_GET['path'].$pid.',';
    // echo '此页是编辑页面 自己写';
    // exit;
    $id = $_GET['id'];

       $sql = "SELECT `id`,`cname`,`pid`,`path`,`display` FROM ".PRE."category WHERE `id`='$id'";
       $result = mysqli_query($link,$sql);
        if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    }

    // echo '<pre>';
    // print_r($row);
    // exit;

 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>编辑用户</h2>
    <form action="./action.php?a=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

        分类名:
        <input type="text" name="cname" placeholder="请输入分类名" value="<?php echo $row['cname']?>"><br><br>
        pid:
        <input type="text" name="pid" value="<?php echo $pid ?>" readonly><br><br>
        path:
        <input type="text" name="path" value="<?php echo $path ?>" readonly><br><br>
        

        <input type="submit" value="确认编辑">
    </form>
</body>
</html>