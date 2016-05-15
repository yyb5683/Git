<!-- 购物车页面 -->
<?php
    require './init.php'; 
    // p($_SESSION);
?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>seeker商城</title>
    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/my-c.css">
</head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>

<div class="container">
    <div class="row">
        <h1>已成功加入购物车</h1>
    </div>

    <div class="row">
        <?php if (empty($_SESSION['cart'])): ?>
            <h3>购物车空空如也....</h3>
            <p><a href="./index.php">[继续购物]</a></p>
        <?php else: ?>
            <table class="table">
                <tr>
                    <th>商品</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php $total = 0; //总价的初始值?>
                <?php foreach ($_SESSION['cart'] as $key => $val): ?>
                <tr>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo @$key ?>&gname=<?php echo @$val['gname'] ?>">
                            <img src="<?php echo @getpath(URL.'uploads/',$val['iname'],'b') ?>">
                        </a>
                    </td>
                    <td>
                        <!-- <a href="./contentinfo.php?id=<?php echo $key ?>&gname=<?php echo $val['msg'] ?>"> -->
                            <!--  <?#php echo $val['msg'] ?> -->
                        </a>
                    </td>
                    <!-- <td><?#php echo $val['price'] ?></td> -->
                    <td>
                       
                    
                        
                    </td>
                    <!-- <td><?php #echo $val['price'] * $val['qty']# ?></td> -->
                    <td>
                        <!-- <a href="./com/cartdo.php?a=del&goods_id=<?php echo $key ?>">删除</a> -->
                    </td>
                </tr>
                <?#php $total += $val['price'] * $val['qty'];//总价# ?？>
                <?php endforeach ?>
                <tr>
                    <td colspan="6" class="text-right">
                        <a href="./index.php" class="btn btn-success">返回继续购物</a>
                       <!--  <a href="./com/cartdo.php?a=alldel" class="btn btn-danger">清空购物车</a>
                        <a href="./index.php" class="btn btn-default">总计: <?php echo $total ?></a> -->
                        <a href="showcart.php" class="btn btn-primary">去购物车结算</a>
                    </td>
                </tr>
            </table>
        <?php endif ?>
    </div>
</div>


<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>

<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>