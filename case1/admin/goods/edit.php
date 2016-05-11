<?php
     require '../init.php';

     $id=$_GET['id'];
    $sql="SELECT `id`,`gname`,`price`,`stock`,`sale`,`zan`,`state`,`is_hot`,`is_new`, `msg` FROM ".PRE."goods WHERE `id`='$id'"; 
    $result = mysqli_query($link,$sql);
     if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    }
    // echo $id;
    // p($row);
    // exit;

    // echo '此页是编辑页面 自己写';
    // exit;
    $sql = "SELECT `id`,`cname`,`path`,CONCAT(`path`,`id`,',') AS bpath FROM ".PRE."category order by bpath";
    $cate = query($link, $sql);
    

  $sql = "
    SELECT g.id, g.gname, g.price, g.stock, g.sale, g.is_new, g.is_hot, g.state, g.zan, g.msg, c.cname, c.id AS cid 
    FROM ".PRE."goods g,".PRE."category c
    WHERE g.cate_id = c.id
     ";

    $list = query($link ,$sql);

    $list=$list['0'];
    // p($list);
    // exit;
 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>编辑商品</h2>
    <form action="./action.php?a=edit" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        商品名:
        <input type="text" name="gname" placeholder="请输入商品名" value="<?php echo $row['gname']?>"><br><br>

           商品分类:
        <select name="cate_id">
            <?php if (!empty($cate)): ?>
            <?php foreach ($cate as $val): ?>
            <option value="<?php echo $val['id'] ?>"<?php echo $val['id']==$list['cid']?'selected':''; ?>><?php echo str_repeat('&nbsp;&nbsp;',substr_count($val['path'],',')).'|--'.$val['cname'] ?></option>
            <?php endforeach ?>
            <?php else: ?>
                
            <?php endif ?>
        </select><br><br>
       
        价格:
        <input type="text" name="price" placeholder="价格"  value="<?php echo $row['price']?>"><br><br>
        库存:
        <input type="text" name="stock" placeholder="库存"  value="<?php echo $row['stock']?>"><br><br>
         销量:
        <input type="text" name="stock" placeholder="库存"  value="<?php echo $row['sale']?>" readonly><br><br>
         赞量:
        <input type="text" name="stock" placeholder="库存"  value="<?php echo $row['zan']?>" readonly><br><br>
        
        

        是否上架:
        <input type="radio" name="state"   value="<?php echo $row['state']?>">下架
        <input type="radio" name="state"   value="<?php echo $row['state']?>">上架<br><br>
       <!--  商品图片:
        <input type="file" name="file"><br><br> -->
        商品描述: <br>
        <textarea name="msg" cols="30" rows="5" placeholder="请输入600字以内的的描述 " ><?php echo $row['msg']?></textarea><br><br>
        <input type="submit" value="确认添加">
    </form>
</body>
</html>