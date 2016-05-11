<?php 
    require '../init.php';
    //CONCAT(`path`,`id`,',')  0,1,  mysql的拼接函数
    $sql = "SELECT `id`,`cname`,`path`,CONCAT(`path`,`id`,',') AS bpath FROM ".PRE."category order by bpath";
    $cate = query($link, $sql);
    // p($cate);exit;
 ?>

<!DOCTYPE html>
<html lang="cn"
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>添加商品</h2>
    <form action="./action.php?a=add" method="post" enctype="multipart/form-data">
        商品名:
        <input type="text" name="gname" placeholder="请输入商品名"><br><br>
        商品分类:
        <select name="cate_id">
            <?php if (!empty($cate)): ?>
            <?php foreach ($cate as $val): ?>
            <option value="<?php echo $val['id'] ?>"><?php echo str_repeat('&nbsp;&nbsp;',substr_count($val['path'],',')).'|--'.$val['cname'] ?></option>
            <?php endforeach ?>
            <?php else: ?>
                
            <?php endif ?>
        </select><br><br>
        价格:
        <input type="text" name="price" placeholder="价格"><br><br>
        库存:
        <input type="text" name="stock" placeholder="库存"><br><br>
        是否上架:
        <input type="radio" name="state" value="0">下架
        <input type="radio" name="state" value="1" checked>上架<br><br>
        商品图片:
        <input type="file" name="file"><br><br>
        商品描述: <br>
        <textarea name="msg" cols="30" rows="5" placeholder="请输入600字以内的的描述" ></textarea><br><br>
        <input type="submit" value="确认添加">
    </form>
</body>
</html>